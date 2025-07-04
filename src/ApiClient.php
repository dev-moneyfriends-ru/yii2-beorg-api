<?php

namespace mfteam\beorg;

use Exception;
use mfteam\beorg\exceptions\AccessDeniedException;
use mfteam\beorg\exceptions\BadRequestException;
use mfteam\beorg\exceptions\InProgressException;
use mfteam\beorg\exceptions\NotFoundException;
use mfteam\beorg\exceptions\QuestionaryAlreadyExistsException;
use mfteam\beorg\models\QuestionaryResult;
use mfteam\beorg\models\RequestFile;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\httpclient\Client;
use yii\httpclient\Request;
use yii\httpclient\Response;
use yii\web\NotFoundHttpException;

/**
 * Компонент для запросов к сервису
 */
class ApiClient extends Component
{
    /**
     * @var string
     */
    public $host = 'https://api.beorg.ru';
    
    /**
     * @var string ключ для аутентификации
     */
    public $token;
    
    /**
     * @var string Идентификатор кампании заказчика
     */
    public $campaignId;
    
    /**
     * @var string ключ для аутентификации
     */
    public $machineUid;

    protected $files = [];
    
    /**
     * @param string $token
     * @return ApiClient
     */
    public function setToken(string $token): ApiClient
    {
        $this->token = $token;
        return $this;
    }
    
    /**
     * @param string $campaignId
     * @return ApiClient
     */
    public function setCampaignId(string $campaignId): ApiClient
    {
        $this->campaignId = $campaignId;
        return $this;
    }
    
    /**
     * @param string $machineUid
     * @return ApiClient
     */
    public function setMachineUid(string $machineUid): ApiClient
    {
        $this->machineUid = $machineUid;
        return $this;
    }

    /**
     * Отправка запроса на распознавание документа
     * @return string
     * @throws AccessDeniedException
     * @throws BadRequestException
     * @throws InProgressException
     * @throws InvalidConfigException
     * @throws NotFoundException
     * @throws QuestionaryAlreadyExistsException
     * @throws \yii\base\Exception
     * @throws \yii\httpclient\Exception
     */
    public function send(): string
    {
        $request = $this->getRequest();
        $date = [
            'project_id' => $this->campaignId,
            'token' => $this->token,
            'machine_uid' => $this->machineUid,
            'images' => [],
            'process_info' => []
        ];
        foreach ($this->files as $file) {
            $date['images'][] = $file->getContent();
            $date['process_info'][] = $file->getProcessInfo();
        }
        $response = $request->setMethod('POST')
            ->setData($date)
            ->setUrl('/api/bescan/add_document')
            ->send();
        if ($response->isOk) {
            return $response->data['document_id'];
        }
        $this->parseError($response);
    }

    /**
     * @param RequestFile $file
     * @return string
     * @throws AccessDeniedException
     * @throws BadRequestException
     * @throws InProgressException
     * @throws InvalidConfigException
     * @throws NotFoundException
     * @throws QuestionaryAlreadyExistsException
     * @throws \yii\base\Exception
     * @throws \yii\httpclient\Exception
     */
    public function sendFile(RequestFile $file): string
    {
        $this->setFiles([$file]);
        return $this->send();
    }
    
    /**
     * @param string $questionaryId
     * @return QuestionaryResult
     * @throws InvalidConfigException
     * @throws \yii\httpclient\Exception
     * @throws Exception
     */
    public function result(string $questionaryId): QuestionaryResult
    {
        $request = $this->getRequest();
        $response = $request->setMethod('GET')
            ->setUrl('/api/document/result/' . $questionaryId . '?token=' . $this->token)
            ->send();
        if ($response->isOk) {
            return new QuestionaryResult($response->data);
        }
        $this->parseError($response);
    }
    
    /**
     * @return Request
     * @throws InvalidConfigException
     */
    private function getRequest(): Request
    {
        return (new Client([
            'baseUrl' => $this->host
        ]))
            ->createRequest()
            ->addHeaders([
                'Content-Type' => 'application/json',
            ])->setFormat(Client::FORMAT_JSON);
    }
    
    /**
     * @param Response $response
     * @return mixed
     * @throws AccessDeniedException
     * @throws BadRequestException
     * @throws InProgressException
     * @throws NotFoundException
     * @throws QuestionaryAlreadyExistsException
     * @throws \yii\base\Exception
     */
    private function parseError(Response $response)
    {
        switch ($response->statusCode) {
            case '425':
                {
                    $exception = new InProgressException('Document in progress', $response->statusCode);
                }
                break;
            case '404':
                {
                    $errors = ArrayHelper::getValue($response->data, 'errors');
                    $message = 'Not found';
                    if (is_array($errors) && ArrayHelper::getValue($errors, 'type') === 'CampaignNotFound') {
                        $message = ArrayHelper::getValue($errors, 'type') . ': ' . ArrayHelper::getValue(
                                $errors,
                                'message'
                            );
                    } elseif (is_array($errors) && !empty($errors['message'])) {
                        $message = $errors['message'];
                    }
                    $exception = new NotFoundException($message, $response->statusCode);
                }
                break;
            case '401':
                {
                    $exception = new AccessDeniedException('Access denied', $response->statusCode);
                }
                break;
            case '409':
                {
                    $questionaryId = ArrayHelper::getValue($response->data, 'error.data.questionary_id');
                    $exception = new QuestionaryAlreadyExistsException(
                        $questionaryId,
                        'Questionary already exits, id: ' . $questionaryId,
                        $response->statusCode
                    );
                }
                break;
            case '400':
                {
                    $exception = new BadRequestException('BadRequest');
                }
                break;
            default:
                $exception = new \yii\base\Exception('Unexpected value');
            
        }
        
        throw $exception;
    }

    public function getFiles(): array
    {
        return $this->files;
    }

    public function setFiles(array $files): ApiClient
    {
        $this->files = [];
        foreach ($files as $file) {
            $this->addFile($file);
        }
        return $this;
    }

    public function addFile(RequestFile $file): ApiClient
    {
        $this->files[] = $file;
        return $this;
    }
}

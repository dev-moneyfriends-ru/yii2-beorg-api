<?php

namespace mfteam\beorg\models;

use mfteam\beorg\exceptions\FileNotFoundException;
use yii\base\BaseObject;

class RequestFile extends BaseObject
{
    /**
     * Путь к файлу
     * @var string|null
     */
    private $filePath;

    /**
     * свободный ключ для разделения документов при загрузке и получении результатов
     * если не указан вместо него используется ключ type
     * @var string
     */
    public $key;

    /**
     * тип документа
     * @var string
     */
    public $type;

    /**
     * опции обработки документа
     * @var array
     */
    public $options = [
        'stages' => [
            'verification'
        ],
    ];
    /**
     * Содержимое файлй в base64
     * @var null|string
     */
    private $content;

    public function __construct(?string $filePath = null, ?string $content = null, $config = [])
    {
        if (empty($content) && !file_exists($filePath)) {
            throw new FileNotFoundException();
        }
        $this->filePath = $filePath;
        $this->content = $content;
        parent::__construct($config);
    }

    public function getContent(): string
    {
        if (empty($this->content)) {
            $this->content = base64_encode(file_get_contents($this->filePath));
        }

        return $this->content;
    }

    public function getProcessInfo(): array
    {
        return [
            'key' => $this->key,
            'type' => $this->type,
            'options' => $this->options,
        ];
    }

    public function setOptions(array $options): RequestFile
    {
        $this->options = $options;
        return $this;
    }

    public function setType(string $type): RequestFile
    {
        $this->type = $type;
        return $this;
    }

    public function setKey(string $key): RequestFile
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @param false|string $content
     * @return RequestFile
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
}

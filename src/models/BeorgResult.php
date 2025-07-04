<?php

namespace mfteam\beorg\models;

use yii\base\BaseObject;
use yii\helpers\ArrayHelper;

class BeorgResult extends BaseObject
{
    const PASSPORT_REG = 'PASSPORT_REG';
    protected $documentId;
    /**
     * @var mixed
     */
    protected $rawData;
    /**
     * @var array|PassportResponse[]
     */
    private $passports = [];

    public function __construct($data, $config = [])
    {
        $this->rawData = $data;
        $this->documentId = ArrayHelper::getValue($data, 'document_id');
        $documents = ArrayHelper::getValue($data, 'documents', []);
        foreach ($documents as $document) {
            $type = ArrayHelper::getValue($document, 'type');
            if($type === self::PASSPORT_REG) {
                $passport = new PassportResponse(ArrayHelper::getValue($document, 'data', []));
                $passport->setType(ArrayHelper::getValue($document, 'type'))
                    ->setKey(ArrayHelper::getValue($document, 'key'))
                    ->setMetadata(ArrayHelper::getValue($document, 'metadata', []));
                $this->passports[] = $passport;
            }
        }
        parent::__construct($config);
    }

    public function getPassports(): array
    {
        return $this->passports;
    }
}

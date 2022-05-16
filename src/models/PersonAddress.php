<?php

namespace mfteam\beorg\models;

use Exception;
use yii\base\BaseObject;
use yii\helpers\ArrayHelper;

/**
 * Адрес из документа
 *
 * @property-read null|string $address
 * @property-read array $rawData
 */
class PersonAddress extends BaseObject
{
    /**
     * @var array
     */
    private $_rawData;
    
    /**
     * @param array $data
     * @param $config
     */
    public function __construct(array $data, $config = [])
    {
        $this->_rawData = $data;
        parent::__construct($config);
    }
    
    /**
     * @return string|null
     * @throws Exception
     */
    public function getAddress(): ?string
    {
        return ArrayHelper::getValue($this->_rawData, 'Address');
    }
    
    /**
     * @return array
     */
    public function getRawData(): array
    {
        return $this->_rawData;
    }
}
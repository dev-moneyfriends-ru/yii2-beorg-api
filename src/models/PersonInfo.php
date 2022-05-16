<?php

namespace mfteam\beorg\models;

use Exception;
use yii\base\BaseObject;
use yii\helpers\ArrayHelper;

/**
 * Информация о человеке
 *
 * @property-read null|string $birthPlace
 * @property-read null|string $lastName
 * @property-read null|string $firstName
 * @property-read null|string $gender
 * @property-read null|string $citizenship
 * @property-read null|string $middleName
 * @property-read array $rawData
 * @property-read null|string $birthDate
 */
class PersonInfo extends BaseObject
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
    public function getFirstName(): ?string
    {
        return ArrayHelper::getValue($this->_rawData, 'FirstName');
    }
    
    /**
     * @return string|null
     * @throws Exception
     */
    public function getLastName(): ?string
    {
        return ArrayHelper::getValue($this->_rawData, 'LastName');
    }
    
    /**
     * @return string|null
     * @throws Exception
     */
    public function getMiddleName(): ?string
    {
        return ArrayHelper::getValue($this->_rawData, 'MiddleName');
    }
    
    /**
     * @return string|null
     * @throws Exception
     */
    public function getBirthDate(): ?string
    {
        return ArrayHelper::getValue($this->_rawData, 'BirthDate');
    }
    
    /**
     * @return string|null
     * @throws Exception
     */
    public function getBirthPlace(): ?string
    {
        return ArrayHelper::getValue($this->_rawData, 'BirthPlace');
    }
    
    /**
     * @return string|null
     * @throws Exception
     */
    public function getGender(): ?string
    {
        return ArrayHelper::getValue($this->_rawData, 'Gender');
    }
    
    /**
     * @return string|null
     * @throws Exception
     */
    public function getCitizenship(): ?string
    {
        return ArrayHelper::getValue($this->_rawData, 'Citizenship');
    }
    
    /**
     * @return array
     */
    public function getRawData(): array
    {
        return $this->_rawData;
    }
}
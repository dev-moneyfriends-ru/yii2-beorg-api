<?php

namespace mfteam\beorg\models;

use Exception;
use yii\base\BaseObject;
use yii\helpers\ArrayHelper;

/**
 * Информация о документе
 *
 * @property-read null|string $number
 * @property-read null|string $issueId
 * @property-read null|string $series
 * @property-read null|string $issuedBy
 * @property-read array $rawData
 * @property-read null|string $issueDate
 */
class PersonDocument extends BaseObject
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
    public function getSeries(): ?string
    {
        return ArrayHelper::getValue($this->_rawData, 'Series');
    }
    
    /**
     * @return string|null
     * @throws Exception
     */
    public function getNumber(): ?string
    {
        return ArrayHelper::getValue($this->_rawData, 'Number');
    }
    
    /**
     * @return string|null
     * @throws Exception
     */
    public function getIssueDate(): ?string
    {
        return ArrayHelper::getValue($this->_rawData, 'IssueDate');
    }
    
    /**
     * @return string|null
     * @throws Exception
     */
    public function getIssueId(): ?string
    {
        return ArrayHelper::getValue($this->_rawData, 'IssueId');
    }
    
    /**
     * @return string|null
     * @throws Exception
     */
    public function getIssuedBy(): ?string
    {
        return ArrayHelper::getValue($this->_rawData, 'IssuedBy');
    }
    
    /**
     * @return array
     */
    public function getRawData(): array
    {
        return $this->_rawData;
    }
}
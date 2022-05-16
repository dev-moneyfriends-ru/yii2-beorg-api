<?php

namespace mfteam\beorg\models;

use yii\base\BaseObject;
use yii\helpers\ArrayHelper;

/**
 * Результат обработки документа
 *
 * @property-read PersonAddress $personAddress
 * @property-read PersonDocument $personDocument
 * @property-read array $rawData
 * @property-read null|string $questionaryID
 * @property-read PersonInfo $personInfo
 */
class QuestionaryResult extends BaseObject
{
    /**
     * Идентификатор документа
     * @var string|null
     */
    private $_questionaryID;
    /**
     * @var array
     */
    private $_rawData;
    /**
     * @var PersonInfo
     */
    private $_personInfo;
    /**
     * @var PersonDocument
     */
    private $_personDocument;
    /**
     * @var PersonAddress
     */
    private $_personAddress;
    
    /**
     * @param array $data
     * @param $config
     * @throws \Exception
     */
    public function __construct(array $data, $config = [])
    {
        $this->_rawData = $data;
        $this->_questionaryID = ArrayHelper::getValue($data, 'QuestionaryID');
        $this->_personInfo = new PersonInfo(ArrayHelper::getValue($data, 'PersonInfo',[]));
        $this->_personDocument = new PersonDocument(ArrayHelper::getValue($data, 'PersonDocument',[]));
        $this->_personAddress = new PersonAddress(ArrayHelper::getValue($data, 'PersonAddress',[]));
        parent::__construct($config);
    }
    
    /**
     * @return PersonInfo
     */
    public function getPersonInfo(): PersonInfo
    {
        return $this->_personInfo;
    }
    
    /**
     * @return array
     */
    public function getRawData(): array
    {
        return $this->_rawData;
    }
    
    /**
     * @return string|null
     */
    public function getQuestionaryID()
    {
        return $this->_questionaryID;
    }
    
    /**
     * @return PersonDocument
     */
    public function getPersonDocument(): PersonDocument
    {
        return $this->_personDocument;
    }
    
    /**
     * @return PersonAddress
     */
    public function getPersonAddress(): PersonAddress
    {
        return $this->_personAddress;
    }
}
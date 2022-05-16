<?php

namespace mfteam\beorg\exceptions;

/**
 * Картинка уже была загружена ранее
 */
class QuestionaryAlreadyExistsException extends \yii\base\Exception
{
    /**
     * ID запроса
     * @var string
     */
    protected $_questionaryId;
    
    public function __construct(string $questionaryId, $message = "", $code = 0, \Throwable $previous = null)
    {
        $this->_questionaryId = $questionaryId;
        parent::__construct($message, $code, $previous);
    }
    
    /**
     * @return string
     */
    public function getQuestionaryId(): string
    {
        return $this->_questionaryId;
    }
}
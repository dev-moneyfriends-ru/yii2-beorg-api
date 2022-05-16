<?php

namespace mfteam\beorg\exceptions;

/**
 * Документ еще в работе
 */
class InProgressException extends \yii\base\Exception
{
    public function getName()
    {
        return 'InProgress';
    }
}
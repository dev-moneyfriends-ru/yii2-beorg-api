<?php

namespace mfteam\beorg\exceptions;

/**
 * Некорректные данные для доступа
 */
class AccessDeniedException extends \yii\base\Exception
{
    public function getName()
    {
        return 'AccessDenied';
    }
}
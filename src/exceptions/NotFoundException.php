<?php

namespace mfteam\beorg\exceptions;

/**
 * Указанная кампания не существует или неактивна
 */
class NotFoundException extends \yii\base\Exception
{
    public function getName()
    {
        return 'NotFound';
    }
}
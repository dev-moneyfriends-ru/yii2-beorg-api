<?php

namespace mfteam\beorg\exceptions;


use yii\base\Exception;

class BadRequestException extends Exception
{
    public function getName()
    {
        return 'BadRequest';
    }
}
<?php

namespace mfteam\beorg\exceptions;

use yii\base\Exception;

class FileNotFoundException extends Exception
{
    public function getName()
    {
        return 'FileNotFoundException';
    }
}

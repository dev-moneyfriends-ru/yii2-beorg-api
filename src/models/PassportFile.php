<?php

namespace mfteam\beorg\models;

use mfteam\beorg\models\RequestFile;

/**
 * Паспорт 2-3 страница
 */
class PassportFile extends RequestFile
{
    /**
     * свободный ключ для разделения документов при загрузке и получении результатов
     * если не указан вместо него используется ключ type
     * @var string
     */
    public $key = 'PASSPORT_REG1';

    /**
     * тип документа
     * @var string
     */
    public $type = 'PASSPORT_REG';
}

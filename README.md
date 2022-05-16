# YII2 BEORG API

## Описание

YII2 BEORG API предоставляет API для загрузки документов на обработку и получение результатов.
Для работы с API системы требуется получить ключи доступа.

## Установка

Добавить в `composer.json`

```
"repositories": [
    ...
    {
      "type": "vcs",
      "url": "https://github.com/dev-moneyfriends-ru/yii2-beorg-api.git"
    }
  ]
```

Запустить

```
composer require --prefer-dist mf-team/yii2-beorg-api dev-master
```

или добавить

```
"mf-team/yii2-beorg-api": "dev-master"
```

в `composer.json`.

## Использование

Добавить в конфиг компонент

```injectablephp
 'beorg' => [
            'class' => \mfteam\beorg\ApiClient::class,
            'token' => '',
            'machineUid' => '',
            'campaignId' => '',
        ]
```

или создать новый экземпляр

```injectablephp
$beorgClient = new \mfteam\beorg\ApiClient(
            'token' => '',
            'machineUid' => '',
            'campaignId' => '',
            );
```

### Создание запроса

```injectablephp
$filePath = '/tmp/image.jpg';
$file2Path = '/tmp/image2.jpg';
$file2Content = base64_encode(file_get_contents($file2Path));
$beorgClient = new \mfteam\beorg\ApiClient(
            'token' => '',
            'machineUid' => '',
            'campaignId' => '',
            );
//Отправка на распознавание файла            
$qId = $beorgClient->sendFile($filePath);
//Отправка на распознавание содержимого файла в кодировке base64
$qId2 = $beorgClient->send($file2Content);

//Получение результата
/** @var QuestionaryResult $questionaryResult */
$questionaryResult = $beorgClient->result($qId);

$personInfo = $questionaryResult->getPersonInfo();
$personDocument = $questionaryResult->getPersonDocument();
$personAddress = $questionaryResult->getPersonAddress();
```


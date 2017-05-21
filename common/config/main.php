<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'charset'=> 'UTF-8',
    'components' => [
        'db'=> require(dirname(__DIR__)."/config/db.php"),
         'user' => [
            'class' => 'yii\web\User',
           
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
    ],
];

<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'components' => [
        'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'dektrium\user\models\User',
            //'enableAutoLogin' => TRUE,
        ],
       'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'session' => [ 
            'class' => 'yii\web\Session'
        ],
    ],
    'modules' => [
        'user' => null,
        'rbac' => null,
    ],
    
    'params' => $params,
];

<?php
return [
    'language' => 'pl-PL',
    'sourceLanguage' => 'en-US',
    'timeZone' => 'Europe/Warsaw',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'user' => [
            'identityClass' => 'dektrium\user\models\User',
            'loginUrl' => ['user/security/login'],
        ],
        /*
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        */
    ],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableFlashMessages' => false,
            'enableRegistration' => false,
            'enableGeneratingPassword' => false,
            'enableConfirmation' => false,
            'enableUnconfirmedLogin' => true,
            'enablePasswordRecovery' => false,
            'enableAccountDelete' => false,
            'emailChangeStrategy' => \dektrium\user\Module::STRATEGY_DEFAULT,
            'confirmWithin' => 86400, // 24 hours
            'rememberFor' => 1209600, // 2 weeks
            'recoverWithin' => 21600,  // 6 hours
            'admins' => ['admin'],
            'adminPermission' => null,
            'cost' => 10,
            'urlPrefix' => 'user',
            'urlRules' => [], 
        ],
        'rbac' => 'dektrium\rbac\RbacWebModule',
    ],
    'as access' => [
        'class' => \yii\filters\AccessControl::className(),//AccessControl::className(),
        'rules' => [
            [
                'actions' => ['login', 'error'],
                'allow' => true,
            ],
            [
                'actions' => ['logout'], // add all actions to take guest to login page
                'allow' => true,
                'roles' => ['@'],
            ],
            [
                'allow' => true,
                'roles' => ['@'],
            ],
        ],
    ],
];

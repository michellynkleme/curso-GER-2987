<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

Yii::setAlias('@webroot', dirname(__DIR__).'/web');
Yii::setAlias('@web', (stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://' . $_SERVER['SERVER_NAME'] . ($_SERVER['SERVER_PORT'] !== '80' ? ':' . $_SERVER['SERVER_PORT'] : '')));

$config = [
    'id' => 'basic',
    'name' => 'Testando FRamework Yii',
    'version' => '2.5',
    'language' => 'pt_BR',
    'sourceLanguage' => 'pt-BR',
    'timeZone' => 'America/Fortaleza',
    'charset' => 'UTF-8',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@galeriaPath' => '/web/uploads/galerias',
        '@galeriaUrl' => 'http://localhost/curso-GER-2987/projectyii/web/index.php',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'ILUg2SbO_VXa04-L8hKBDcuPYzxojimk',
        ],
        'myComponent' => [
            'class' => 'app\classes\components\MyComponent',
            'string' => 'Yii2 Curso'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'class' => 'app\classes\components\MyFormatter',
                       'dateFormat' => 'dd/MM/YYYY'
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => true,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'pluralize' => false,
                    'controller' => 'api/default',
                ],
            ],
        ],
    ],
    'modules' => [
        'api' => [
            'class' =>'app\modules\api\ApiModule',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;

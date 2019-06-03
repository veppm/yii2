<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
use \yii\web\Request;

$config = [
    'id' => 'arkotte',
    'name' => 'Arkotte',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'puXgi_tqakNFZ8hFv9iK2NeP-uzy8jUG',
            'baseUrl' => str_replace('/web', '', (new Request)->getBaseUrl()),
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'demoac019@gmail.com',
                'password' => 'test@1234',
                'port' => '587',
                'encryption' => 'tls',
            ],
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
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        /* Override dektrium view file*/
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/dektrium',
                ],
            ],
        ],


        /*paypal details*/
        'PayPalRestApi'=>[
            'class'=>'app\components\PayPalRestApi',
            'redirectUrl'=>'/contest/success', // Redirect Url after payment
        ],
        
        
    ],
    /* Override dektrium Model, Controller etc. files */
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'controllerMap' => [
                'registration' => 'app\controllers\RegistrationController',
                'security'  => 'app\controllers\SecurityController',
                'admin'   => 'app\controllers\admin\AdminController',
                'settings'   => 'app\controllers\SettingsController',
                'profile'   => 'app\controllers\ProfileController',
            ],
            'mailer' => [
                'viewPath' => '@app/views/dektrium/mail',
            ],
            'enableRegistration'=> true,
            // If this option is to true, users will be able to log in even though they didn't confirm his account.
            'enableUnconfirmedLogin' => false,
            // If this option is to true, users will be able to recovery their forgotten passwords.
            'enablePasswordRecovery' => true,
            'confirmWithin' => 21600,  // 21600 = 6 hrs
            'recoverWithin'=> 21600,  // 21600 = 6 hrs
            'rememberFor'=> 1209600, // 1209600 = 2 weeks
            'cost' => 12,
            'modelMap' => [
                'User' => 'app\models\User',
                'Profile' => 'app\models\Profile',
                'RecoveryForm' => 'app\models\RecoveryForm',
                'Token' => 'app\models\Token',
              ],
            // 'admins' => ['admin']
        ],
    ],

    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    /* $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ]; */

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;

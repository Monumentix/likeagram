<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),        
    'controllerNamespace' => 'frontend\controllers',    
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        
        'urlManager' =>[
            'enablePrettyUrl' => true,
            'showScriptName' => true,	
            'rules' => [

                /*
                '<controller:(default|explore)>/' => 'likeagram/<controller>/index',
                '<controller:(default|explore)>/<action>' => 'likeagram/<controller>/<action>',          
                 */                 
            ],
        ],
        
        
        'view'=>[
            'theme' =>[
                'pathMap'=>[
                    '@dektrium/user/views' => '@app/modules/likeagram/views/overrides/yii2-user',
                ],
            ],
        ],    
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'modules'=>[               
        'likeagram' => [
            'class' => 'app\modules\likeagram\Module',
        ], 
        'user' => [          
            'controllerMap' => [
                'social' => 'app\modules\likeagram\controllers\SocialController',
                'settings' => 'app\modules\likeagram\controllers\SettingsController',
            ],              
        ],
        /*
        'debug' => [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['1.2.3.4', '127.0.0.1', '::1', '173.3.95.104'],
        ],
          */
    ],    
    'params' => $params,
];

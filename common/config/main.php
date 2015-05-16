<?php
return [
    
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,	
            'rules' => [                
                /*
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                //Used by Likeagram module but something tells me this can be set by the module maybe?
                // '<controller:(default|explore)>/' => 'likeagram/<controller>/index',
                // '<controller:(default|explore)>/<action>' => 'likeagram/<controller>/<action>',                

                //'pattern1'=>'route1', (it goes like this)
                 *                  
                 * 
                 */
    		],

	],
     ],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['Admin']
        ],           
    ] ,

];

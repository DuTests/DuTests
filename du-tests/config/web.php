<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'LtZwZbAL1Z0syBA-QaGdbP0xHQToujhn',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mail' => [
            'class' => 'yii\swiftmailer\Mailer',
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
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => array(
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'rules' => array(
				'' => 'site/index',
				'login' => 'site/login',
				'logout' => 'site/logout',
                                'showtests' =>'test/showtests',
                                'createtest' =>'test/createtest',
                                'updatetest' => 'test/updatetest',
                                'gettestsfeed' =>'test/gettestsfeed',
                                'passtest' => 'test/passtest',
                                'getquestionsfeed'=>'test/getquestionsfeed',
                                'createquestion' =>'test/createquestion',
                                'showquestionimage' =>'image/showquestionimage',
                                'updatequestion' => 'test/updatequestion',
                                'preparetest' => 'test/preparetest',
                                'createanswer' =>'test/createanswer',
                                'updateanswer' => 'test/updateanswer',
                                'showanswerimage' =>'image/showanswerimage',
                                'getanswersfeed' => 'test/getanswersfeed',
                                'completetest' => 'test/completetest',
                                'gettestresultsfeed'=>'test/gettestresultsfeed',
                                'updateresult'=>'test/updateresult',
                                'createresult'=>'test/createresult',
                                'getresultsfeed'=>'test/getresultsfeed',
                                'showresult'=>'test/showresult'
								
			),
		),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    /*$config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';*/
}

return $config;

<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-lecturer',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'lecturer\controllers',
    'modules' => [
        'osn' => [
            'class' => 'lecturer\modules\osn\Osn',
        ],
        'student' => [
            'class' => 'lecturer\modules\student\Student',
        ],
        'gridview' => [
            'class' => 'kartik\grid\Module',
        ],
        'gridviewKrajee' =>  [
            'class' => '\kartik\grid\Module',
            // your other grid module settings
        ]

    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-lecturer',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
            'identityCookie' => ['name' => '_identity-lecturer', 'httpOnly' => true],
        ],
     
        'session' => [
            'name' => 'advanced-lecturer',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        

        'assetManager' => [
            'bundles' => [
                'kartik\form\ActiveFormAsset' => [
                    'bsDependencyEnabled' => false // do not load bootstrap assets for a specific asset bundle
                ],
                'yii2mod\alert\AlertAsset' => [
                    'css' => [
                        'dist/sweetalert.css',
                        'themes/twitter/twitter.css',
                    ]
                ],
            ],
        ],
        //   'assetManager' => [
        //     'bundles' => [
        //         'yii2mod\alert\AlertAsset' => [
        //             'css' => [
        //                 'dist/sweetalert.css',
        //                 'themes/twitter/twitter.css',
        //             ]
        //         ],
        //     ],
        // ],

            'urlManagerBackend' => [
            'class' => 'yii\web\urlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'baseUrl' => 'http://localhost:8888/',
        ],

        'urlManagerBackend' => [
            'class' => 'yii\web\urlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'baseUrl' => 'http://localhost:8881/',
        ],
        
    ],
    'as beforeRequest' => [
        'class' => 'yii\filters\AccessControl',
        'rules' => [
            [
                'allow' => true,
                'actions' => ['login', 'logout','error', 'forgot', 'verify','osn','application','program','education','employment','document','declaration','exit','report','remove','courses'],
            ],
            [
                'allow' => true,
                'roles' => ['@'],
            ],
        ],
        'denyCallback' => function () {
            return Yii::$app->response->redirect(['site/login']);
        },
     ],
     
    'params' => $params,
];

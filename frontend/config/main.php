<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'osn' => [
            'class' => 'frontend\modules\osn\Osn',
        ],
        'student' => [
            'class' => 'frontend\modules\student\Student',
        ],
        'lecturer' => [
            'class' => 'frontend\modules\lecturer\lecturer',
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
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
     
        'session' => [
            'name' => 'advanced-frontend',
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

        

        // 'urlManagerLecturer' => [
        //     'class' => 'yii\web\urlManager',
        //     'enablePrettyUrl' => true,
        //     'showScriptName' => false,
        //     'baseUrl' => 'http://localhost:8883/',
        // ],

        // 'urlManagerBackend' => [
        //     'class' => 'yii\web\urlManager',
        //     'enablePrettyUrl' => true,
        //     'showScriptName' => false,
        //     'baseUrl' => 'http://localhost:8881/',
        // ],


        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [

                'course'=>'student/tbl-course/index',
                'result'=>'student/tbl-st-registration/result',
                'registered-courses'=>'student/tbl-st-registration/index',
                'profile'=>'student',
                'lecturer'=>'profile',
                'lecturer'=>'lecturer/lecturer/index',
                'lecturer-courses'=>'lecturer/lecturer/courses',
                'lecturer-result'=>'lecturer/lecturer/result',
                'lecturer-student-result'=>'lecturer/tbl-studs-result/index',
                'login'=>'site/login',
                'osn'=>'site/osn',
                'application'=>'site/application'
            ],
        ],
        
    ],
    'as beforeRequest' => [
        'class' => 'yii\filters\AccessControl',
        'rules' => [
            [
                'allow' => true,
                'actions' => ['login', 'verify','osn','application','program','education','employment','document','declaration','exit','report','remove','courses'],
            ],
            [
                'allow' => true,
                'roles' => ['lecturer','student'],
            ],
        ],
        'denyCallback' => function () {
            return Yii::$app->response->redirect(['site/login']);
        },
     ],
     
    'params' => $params,
];

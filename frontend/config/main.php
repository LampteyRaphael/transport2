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
        // 'osn' => [
        //     'class' => 'frontend\modules\osn\Osn',
        // ],
        // 'student' => [
        //     'class' => 'frontend\modules\student\Student',
        // ],
        // 'lecturer' => [
        //     'class' => 'frontend\modules\lecturer\lecturer',
        // ],
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
                        // 'themes/twitter/twitter.css',
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


        // 'urlManager' => [
        //     'enablePrettyUrl' => true,
        //     'showScriptName' => false,
        //     'rules' => [
        //         'course'=>'student/tbl-course/index',
        //         'result'=>'student/tbl-st-registration/result',
        //         'registered-courses'=>'student/tbl-st-registration/index',
        //         'profile'=>'student',
        //         'lecturer'=>'profile',
        //         'lecturer'=>'lecturer/lecturer/index',
        //         'lecturer-courses'=>'lecturer/lecturer/courses',
        //         'lecturer-result'=>'lecturer/lecturer/result',
        //         'lecturer-student-result'=>'lecturer/tbl-studs-result/index',
        //         'login'=>'site/login',
        //         'osn'=>'site/osn',
        //         'personal-details'=>'site/application',
        //         'program'=>'site/program',
        //         'education'=>'site/education',
        //         'employment'=>'site/employment',
        //         'document'=>'site/document',
        //         'declaration-summary'=>'site/declaration'
                
        //     ],
        // ],
        
    ],
    

    // 'access' => [
    //     'class' => AccessControl::className(),
    //     'denyCallback' => function ($rule, $action) {
    //         Yii::$app->user->logout();
    //         return Yii::$app->response->redirect(['site/login']);
    //     },
    //     'rules' => [
    //         [
    //             'actions' => ['login','forgot', 'error'],
    //             'allow' => true,
    //         ],
    //         [
    //             'allow' => true,
    //             'roles' => ['admin','user'],
    //         ],
    //     ],
    // ],
    'as beforeRequest' => [
        'class' => 'yii\filters\AccessControl',
        'rules' => [
            [
                'allow' => true,
                'actions' => ['login','error'],
            ],
  
            [
                'allow' => true,
                'roles' => ['user'],
            ]
        ],
        'denyCallback' => function () {
            return Yii::$app->response->redirect(['site/login']);
        },
    ],
     

    'as access' => [
        'class' => \yii\filters\AccessControl::className(),//AccessControl::className(),
        'rules' => [
            [
                'actions' => ['login', 'error'],
                'allow' => true,
            ],

            [
                'allow' => true,
                'roles' => ['user'],
            ]
        ],
        'denyCallback' => function () {
            return Yii::$app->response->redirect(['site/login']);
        },
    ],
        // 'access' => [
        //     'class' => AccessControl::className(),
        //     'rules' => [
        //         [
        //             'allow' => true,
        //             'roles' => ['admin', 'editor', 'expert'],
        //         ],
        //         [
        //             'actions' => ['login'],
        //             'allow' => true,
        //             'roles' => ['?'],
        //         ],
        //         [
        //             'actions' => ['delete'],
        //             'allow' => true,
        //             'roles' => ['admin'],
        //         ]
        //     ]
        // ],

    // 'as beforeRequest' => [
    //     'class' => 'yii\filters\AccessControl',
    //     'denyCallback' => function () {
    //         Yii::$app->user->logout();
    //         return Yii::$app->response->redirect(['site/login']);
    //     },
    //     'rules' => [
    //         [
    //             'actions' => ['login', 'error','forgot'],
    //             'allow' => true,
    //         ],
    //         [
    //             'allow' => true,
    //             'roles' => ['admin','user'],
    //         ],
    //     ],
    //  ],


    'params' => $params,
];

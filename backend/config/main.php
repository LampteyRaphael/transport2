<?php

use yii2mod\rbac\filters\AccessControl;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        //this module is for application stage
            'application' => [
                'class' => 'backend\modules\application\Module',
            ],
            //this model is for qualification 
            'qualification' => [
                'class' => 'backend\modules\qualification\Qualification',
            ],
            
            //this is admission stage
            'admission' => [
                'class' => 'backend\modules\admission\Admission',
            ],

            //this is user admins module

            'user' => [
                'class' => 'backend\modules\user\User',
            ],

            'departments' => [
                'class' => 'backend\modules\departments\Departments',
            ],

            //program modules that 

            'program' => [
                'class' => 'backend\modules\program\Program',
            ],


            'courses' => [
                'class' => 'backend\modules\courses\Courses',
            ],

            'staff' => [
                'class' => 'backend\modules\staff\Staff',
            ],

            'students' => [
                'class' => 'backend\modules\students\Students',
            ],
           
            'payment' => [
                'class' => 'backend\modules\payment\Payment',
            ],
            
            'gridview' => [
             'class' => 'kartik\grid\Module',
            ],

    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            //  'class' => 'common\models\User',
            // 'identityClass' => 'mdm\admin\models\User',
            // 'loginUrl' => ['admin/user/login'],
        ],

        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
        ],
      
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
       
 
        // 'authManager' => [
        //     'class' => 'yii\rbac\DbManager',
        //     'defaultRoles'=>['guest'],
        //     // uncomment if you want to cache RBAC items hierarchy
        //     // 'cache' => 'cache',
        // ],
        // 'urlManagerLogout' => [
        //     'class' => 'yii\web\urlManager',
        //     'enablePrettyUrl' => true,
        //     'showScriptName' => false,
        //     'baseUrl' => 'http://localhost:8888/',
        // ],
        
        'urlManager' => [
            // 'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                // 'home'=>'site/index',
                // 'login'=>'site/login',
                // 'admins'=>'user/tbl-user/index',
                // 'application'=>'application/app/index',
                // 'qualification'=>'qualification/tbl-app-quali/index',
                // 'admission'=>'admission/tbl-app-admission/index',
                // 'admitted-students'=>'students/tbl-stud/index',
                // 'registered-courses'=>'students/tbl-regis-course/index',
                // 'fees-payment'=>'payment/tbl-payment/index',
                // 'settings'=>'program/tbl-program/index'
            ],
        ],
        
        

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'viewPath' => '@common/mail',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'encryption' => 'tls',
                'host' => 'smtp.gmail.com',
                'port' => '587',
                'username'=>'ips.admin@upsamail.edu.gh',
                'password'=>'adminips123',
            ],             
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
        ]
    ],
  
    'as access' => [
        'class' => AccessControl::className(),
        'denyCallback' => function ($rule, $action) {
            Yii::$app->user->logout();
            return Yii::$app->response->redirect(['site/login']);
        },
        'rules' => [
            [
                'actions' => ['login', 'error'],
                'allow' => true,
            ],
            [
                'allow' => true,
                'roles' => ['staff','hod'],
            ],
        ],
    ],

    'as beforeRequest' => [
        'class' => 'yii\filters\AccessControl',
        'denyCallback' => function () {
            return Yii::$app->response->redirect(['site/login']);
        },
        'rules' => [
            [
                'actions' => ['login', 'error'],
                'allow' => true,
            ],
            [
                'allow' => true,
                'roles' => ['staff','hod'],
            ],
        ],
       
     ],

    'params' => $params,
];

<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Vehicles;
use common\models\Drivers;
use common\models\Insurance;
use common\models\Repairs;
use common\models\Servicings;
use common\models\AccidentRecords;
use common\models\User;
use common\models\RoadWorthy;

/**
 * Site controller
 */
class SiteController extends Controller
{
        /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'=>['logout'],
                'rules' => [
                    //  [
                    //    'allow' => true,
                    //    'actions' => ['login', 'forgot', 'verify'],
                    // ],
        
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
   
    public function actionIndex()
    {
        $vehicle=Vehicles::find()->select('id')->count();
        $drivers=Drivers::find()->select('id')->count();
        $repairs=Repairs::find()->select('id')->count();
        $insurances=Insurance::find()->select('id')->count();

        $accidentRecords=AccidentRecords::find()->select('id')->count();
        $users=User::find()->select('id')->count();
        $services=Servicings::find()->select('id')->count();

        $insurances=Insurance::find()->where(['<','expiringDate',date('Y-m-d')])->count();

        $roadworthy=RoadWorthy::find()->where(['<','expiringDate',date('Y-m-d')])->count();

        return $this->render('index',compact('vehicle','drivers','repairs','insurances','accidentRecords','users','services','insurances','roadworthy'));
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'main-login';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        //  $this->layout = 'main-login';
        Yii::$app->user->logout();
        Yii::$app->getSession()->destroy();
        return $this->redirect(['site/login']);
    }

    


    public function actionReset()
    {
        $this->layout = 'main-login';
        $model=new User();
       
        return  $this->render('reset',compact('model'));
    }




}

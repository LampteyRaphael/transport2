<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\TblApp;
use common\models\TblAppAdmission;
use common\models\TblAppQuali;
use common\models\TblLecturer;
use common\models\TblLevel;
use common\models\TblProgram;
use common\models\TblQualiLog;
use common\models\TblStaff;
use common\models\TblStud;
use common\models\User;

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
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['staff','hod'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post','get'],
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
       $qualification=TblAppQuali::find()->count();
       $admission=TblAppAdmission::find()->count();
       $application=TblApp::find()->select('id')->count();
       $students=TblStud::find()->select('id')->count();

       $lecturer=TblLecturer::find()->select('id')->count();

       $staff=TblStaff::find()->select('id')->count();

       $userAdmins=User::find()->select('id')->count();

       $programs=TblProgram::find()->all();

        return $this->render('index',[
            'qualification'=>$qualification,
            'admission'=>$admission,
            'application'=>$application,
            'lecturer'=>$lecturer,
            'students'=>$students,
            'staff'=>$staff,
            'userAdmins'=>$userAdmins,
            'programs'=>$programs,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'main-login';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

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
        $this->layout = 'main-login';
        Yii::$app->user->logout();
        return $this->goHome();
    }
}

<?php

namespace frontend\modules\student\controllers;

use common\models\TblAppPersDetails;
use common\models\TblStud;
use common\models\TblStudPersDetails;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

/**
 * Default controller for the `student` module
 */
class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup','index','contact'],
                'rules' => [
                    [
                        'actions' => ['logout','index','contact'],
                        'allow' => true,
                        'roles' => ['@'],
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
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('student')){

            $personal=TblStud::find()->where(['user_id'=>Yii::$app->user->identity->id])->one();
            
            return $this->render('index',
            [
                'personal'=>$personal??''
                
            ]);
        }else
        {
            Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
            return  $this->goBack(Yii::$app->request->referrer);
        } 
    
    }
}

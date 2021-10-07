<?php

namespace lecturer\modules\student\controllers;

use common\models\TblAppPersDetails;
use common\models\TblStud;
use common\models\TblStudPersDetails;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

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
        $personal=TblStud::find()->where(['user_id'=>Yii::$app->user->identity->id])->one();
        
        return $this->render('index',
        [
            'personal'=>$personal??''
            // 'model'=>$personal
            
        ]);
    }
}

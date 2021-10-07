<?php

namespace backend\modules\program\controllers;

use Yii;
use common\models\TblLevel;
use common\models\TblLevelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TblLevelController implements the CRUD actions for TblLevel model.
 */
class TblLevelController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    
    /*
    
    Showing Various Course Level 
    */
    public function actionIndex()
    {
        $searchModel = new TblLevelSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

   
    /*
    
    View Course Level with Level Primary ID
    */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    /*
    
    Create New Course Level 
    */
   
    public function actionCreate()
    {
        $model = new TblLevel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success','Successfully Created');

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    
    /*
    
    Update Course Level 
    */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success','Successfully Updated');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    
    /*
    
    Delete New Course Level 
    */
    public function actionDelete($id)
    {

        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('error','Successfully Deleted');
        return $this->redirect(['index']);
    }

   
    /*
    
    Find Course Level Using AN ID
    */
    protected function findModel($id)
    {
        if (($model = TblLevel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php

namespace frontend\modules\student\controllers;

use common\models\TblAppStudProgram;
use Yii;
use frontend\modules\student\models\TblStud;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * TblStudController implements the CRUD actions for TblStud model.
 */
class TblStudController extends Controller
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

    /**
     * Lists all TblStud models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('student')){
        $personal=TblStud::find()->where(['user_id'=>Yii::$app->user->identity->id])->one();
        

        $program=TblAppStudProgram::find()->where(['stud_per_id'=>($personal->personalDetails->id??'')])->all();
        
        return $this->render('index', [
            'program'=>$program
        ]);
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    }
    }

    /**
     * Displays a single TblStud model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id=null)
    {
        if(Yii::$app->user->can('student')){
        return $this->render('view', [
            'model' => $this->findModel(Yii::$app->user->identity->id),
        ]);
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    }
    }

    /**
     * Creates a new TblStud model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('student')){
        $model = new TblStud();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    }
    }

    /**
     * Updates an existing TblStud model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('student')){
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    }
    }

    /**
     * Deletes an existing TblStud model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('student')){
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    }
    }

    /**
     * Finds the TblStud model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblStud the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if(Yii::$app->user->can('student')){
        if (($model = TblStud::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    }
    }
}

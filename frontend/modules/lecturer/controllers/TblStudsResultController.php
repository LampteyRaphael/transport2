<?php

namespace frontend\modules\lecturer\controllers;

use common\models\TblStudsResult;
use common\models\TblStudsResultSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TblStudsResultController implements the CRUD actions for TblStudsResult model.
 */
class TblStudsResultController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all TblStudsResult models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('lecturer')){
             try{
            $searchModel = new TblStudsResultSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }catch (\Exception $e){

            return  $this->goBack(Yii::$app->request->referrer);
        }
        }else
        {
            Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
            return  $this->goBack(Yii::$app->request->referrer);
        }
    }

    /**
     * Displays a single TblStudsResult model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('lecturer')){
            try{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }catch (\Exception $e){

            return  $this->goBack(Yii::$app->request->referrer);
        }
        }else
        {
            Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
            return  $this->goBack(Yii::$app->request->referrer);
        }
    }

    /**
     * Creates a new TblStudsResult model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('lecturer')){
            try{
            $model = new TblStudsResult();

            if ($this->request->isPost) {
                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else {
                $model->loadDefaultValues();
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }catch (\Exception $e){

            return  $this->goBack(Yii::$app->request->referrer);
        }
        }else
        {
            Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
            return  $this->goBack(Yii::$app->request->referrer);
        }
    }

    /**
     * Updates an existing TblStudsResult model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('lecturer')){
            try{
            $model = $this->findModel($id);

            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }catch (\Exception $e){

            return  $this->goBack(Yii::$app->request->referrer);
        }
        }else
        {
            Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
            return  $this->goBack(Yii::$app->request->referrer);
        }
    }

/** Remove Selected Result Using Result ID */
    public function actionRemove(){

        if(Yii::$app->user->can('lecturer')){    
            try{
                $selection = (array) Yii::$app->request->post('selection');
        if (null==((array)Yii::$app->request->post('selection'))) {
            Yii::$app->session->setFlash('error', 'Sorry!. Checkbox is not selected');
            return $this->redirect(['index']);
        }

        foreach ($selection as $item)   {
            $this->findModel($item)->delete();
        }

        Yii::$app->session->setFlash('success', 'Successfully Removed The Selected Results');
        return $this->redirect(['index']);
           
        }catch (\Exception $e){
            return  $this->goBack(Yii::$app->request->referrer);
        }
        }else
        {
            Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
            return  $this->goBack(Yii::$app->request->referrer);
        }
        
    }

    /**
     * Deletes an existing TblStudsResult model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('lecturer')){    
            try{
            $this->findModel($id)->delete();
            Yii::$app->session->setFlash('success', 'Successfully Removed The Selected Results');
            return $this->redirect(['index']);
        }catch (\Exception $e){

            return  $this->goBack(Yii::$app->request->referrer);
        }
        }else
        {
            Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
            return  $this->goBack(Yii::$app->request->referrer);
        }
    }

    /**
     * Finds the TblStudsResult model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return TblStudsResult the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if(Yii::$app->user->can('lecturer')){
            try{
            if (($model = TblStudsResult::findOne($id)) !== null) {
                return $model;
            }

            throw new NotFoundHttpException('The requested page does not exist.');
        }catch (\Exception $e){

            return  $this->goBack(Yii::$app->request->referrer);
        }
        }else
        {
            Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
            return  $this->goBack(Yii::$app->request->referrer);
        }
    }
    
}

<?php

namespace backend\modules\publisher\controllers;

use common\models\TblStudsResult;
use common\models\TblStudsResultSearch;
use common\models\TblStudsTranscript;
use common\models\Validate;
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
        $searchModel = new TblStudsResultSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andWhere(['status'=>4,])->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblStudsResult model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblStudsResult model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
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
    }

    public function actionResult(){

        if(Yii::$app->user->can('publisher permission')){ 

            if(Yii::$app->request->post('submit') ==='Signed') {
                $this->rollback();

            }elseif(Yii::$app->request->post('submit')==='publish'){

                $this->publication();
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
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
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
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
        if (($model = TblStudsResult::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }




    protected function rollback(){
        try{
            $selection = (array) Yii::$app->request->post('selection');
    if (null==((array)Yii::$app->request->post('selection'))) {
        Yii::$app->session->setFlash('error', 'Sorry!. Checkbox is not selected');
        return $this->redirect(['index']);
    }

    foreach ($selection as $item)   {
         $status=$this->findModel($item);
         $status->status=3;
         $status->save();
    }

    Yii::$app->session->setFlash('success','Rollback Successfully');
    return $this->redirect(['index']);
       
    }catch (\Exception $e){
        return  $this->goBack(Yii::$app->request->referrer);
    }

    }

    // protected function transcript($status){
        
    // }


    protected function publication(){
        try{
            $selection = (array) Yii::$app->request->post('selection');
    if (null==((array)Yii::$app->request->post('selection'))) {
        Yii::$app->session->setFlash('error', 'Sorry!. Checkbox is not selected');
        return $this->redirect(['index']);
    }

    foreach ($selection as $item)   {
        $status=$this->findModel($item);

        $validate=new Validate();

        if(($transcheck=(TblStudsTranscript::find()->where(['student_result_id'=>$item])->one())) !==null){

           $publisher=$transcheck;
       }else{
          $publisher=new TblStudsTranscript();
       }

        $publisher->student_result_id =$validate->check_only_int($status->id);
        $publisher->student_id =$validate->check_only_int($status->student_id);
        $publisher->course_id= $validate->check_only_int($status->course_id);
        $publisher->semester= $validate->check_only_int($status->semester);
        $publisher->section_id= $validate->check_only_int($status->section_id);
        $publisher->class_marks= $validate->check_only_int($status->class_marks);
        $publisher->exams_marks= $validate->check_only_int($status->exams_marks);
        $publisher->total_marks= $validate->check_only_int($status->total_marks);
        $publisher->grade_id= $validate->check_only_int($status->grade_id);
        $publisher->status= $validate->check_only_int(5);
        $publisher->date_of_entry= $validate->check_only_int($status->date_of_entry);
        $publisher->course_lecture_id= $validate->check_only_int($status->course_lecture_id);
        $publisher->acadamic_year= $validate->check_only_int($status->acadamic_year);
        $publisher->save();

        //$this->transcript($status);
        $status->status=5;
        $status->save();
    }

    Yii::$app->session->setFlash('success', 'Successfully Posted Results For Publication');
    return $this->redirect(['index']);
       
    }catch (\Exception $e){
        return  $this->goBack(Yii::$app->request->referrer);
    }

    }
    



}

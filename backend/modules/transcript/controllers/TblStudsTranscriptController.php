<?php

namespace backend\modules\transcript\controllers;

use common\models\TblStudsResult;
use common\models\TblStudsTranscript;
use common\models\TblStudsTranscriptSearch;
use common\models\Validate;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TblStudsTranscriptController implements the CRUD actions for TblStudsTranscript model.
 */
class TblStudsTranscriptController extends Controller
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
     * Lists all TblStudsTranscript models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblStudsTranscriptSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblStudsTranscript model.
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
     * Creates a new TblStudsTranscript model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblStudsTranscript();

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

        if(Yii::$app->user->can('transcript permission')){ 
            
            try{
                $selection = (array) Yii::$app->request->post('selection');
        if (null==((array)Yii::$app->request->post('selection'))) {
            Yii::$app->session->setFlash('error', 'Sorry!. Checkbox is not selected');
            return $this->redirect(['index']);
        }
        
        foreach ($selection as $item)   {
            //$validate=new Validate();

            $status=$this->findModel($item);

            $publisher=TblStudsResult::find()->where(['id'=>$status->student_result_id])->one();

            // $publisher->student_id =$validate->check_only_int($status->student_id);
            // $publisher->course_id= $validate->check_only_int($status->course_id);
            // $publisher->semester= $validate->check_only_int($status->semester);
            // $publisher->section_id= $validate->check_only_int($status->section_id);
            // $publisher->class_marks= $validate->check_only_int($status->class_marks);
            // $publisher->exams_marks= $validate->check_only_int($status->exams_marks);
            // $publisher->total_marks= $validate->check_only_int($status->total_marks);
            // $publisher->grade_id= $validate->check_only_int($status->grade_id);

            $publisher->status= 4;

            // $publisher->date_of_entry= $validate->check_only_int($status->date_of_entry);
            // $publisher->course_lecture_id= $validate->check_only_int($status->course_lecture_id);
            // $publisher->acadamic_year= $validate->check_only_int($status->acadamic_year);
            $publisher->save();

            $status->status=6;

            $status->save();

        }

        Yii::$app->session->setFlash('success', 'Successfully Posted Results For Publication');
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
     * Updates an existing TblStudsTranscript model.
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
     * Deletes an existing TblStudsTranscript model.
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
     * Finds the TblStudsTranscript model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return TblStudsTranscript the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblStudsTranscript::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}

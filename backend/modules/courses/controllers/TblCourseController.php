<?php

namespace backend\modules\courses\controllers;

use Yii;
use common\models\TblCourse;
use backend\modules\courses\models\TblCourseSearch;
use common\models\Validate;
use Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TblCourseController implements the CRUD actions for TblCourse model.
 */
class TblCourseController extends Controller
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
     * Lists all TblCourse models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblCourseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model=new TblCourse();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=>$model
        ]);
    }

    /**
     * Displays a single TblCourse model.
     * @param integer $id
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
     * Creates a new TblCourse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        // Post Courses 
        try{
            $model = new TblCourse();
            if ($model->load(Yii::$app->request->post())) {
                //Posted Values to store
                $this->coursePost($model);

                if($model->save()){
                    Yii::$app->session->setFlash('success','Successfully saved');
                    return $this->redirect(['index', 'id' => $model->id]);
                }
            }
        }catch(Exception $e){

            Yii::$app->session->setFlash('error','Error');
            return $this->redirect(['index',]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TblCourse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        try{
            $model = $this->findModel($id);
            if ($model->load(Yii::$app->request->post())) {
                $this->coursePost($model);
                if($model->save()){
                    Yii::$app->session->setFlash('success','Successfully Updated');
                    return $this->redirect(['index', 'id' => $model->id]);
                }
            }
        }catch(Exception $e){
            Yii::$app->session->setFlash('error',$e->getMessage());
                return $this->redirect(['index', 'id' => $model->id]);
        }
       
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblCourse model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        try{
            $this->findModel($id)->delete();

        }catch(Exception $e){

            Yii::$app->session->setFlash('error','Not Successfully Deleted');
            return $this->redirect(['index']);
        }
        Yii::$app->session->setFlash('error','Successfully Deleted');
        return $this->redirect(['index']);
    }

    /**
     * Finds the TblCourse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblCourse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblCourse::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionDetails()  {

        if(isset($_POST['expandRowKey'])) {  
            $model = TblCourse::findOne($_POST['expandRowKey']);   
           return $this->renderPartial('_details.php',['model'=>$model]);  
      }  
      else  
      {  
         return '<div class="alert alert-danger">No data found</div>';  

      } 
    }
       //Course Posted
       protected function coursePost($model){
        $validate=new Validate();
        $model->courseName=$validate->replace2($_POST['TblCourse']['courseName']);
        $model->course_number=$validate->replace2($_POST['TblCourse']['course_number']);
        $model->level_id=$validate->check_only_int($_POST['TblCourse']['level_id']);
        $model->section_id=$validate->check_only_int($_POST['TblCourse']['section_id']);
        $model->program_id=$validate->check_only_int($_POST['TblCourse']['program_id']);
        $model->date=date('Y-m-d');
        $model->required_courses=$validate->check_only_int($_POST['TblCourse']['required_courses']);
        $model->semester=$validate->replace2($_POST['TblCourse']['semester']);
}


}

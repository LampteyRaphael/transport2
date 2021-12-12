<?php

namespace backend\modules\students\controllers;


use Yii;
use common\models\TblStud;
use backend\modules\students\models\TblStudtSearch;
use common\models\TblAppStudProgram;
use common\models\TblStudEduBg;
use common\models\TblStudEmployDetails;
use common\models\TblStudPersAddress;
use common\models\TblStudPersDetails;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        if(Yii::$app->user->can('backend students permission')){
            $searchModel = new TblStudtSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
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
    public function actionView($id)
    {
        // if(Yii::$app->user->can('backend students permission')){
        //  Applicant'spersonal details
         $modelp=$this->findPersonalDetails($id);

        //Applicant'spersonal address
         $modelad=$this->findAddressOfApplicant($id);

        // Applicant's programs
        $courses=$this->findAppProgram($id);
        
        //Applicant's educational details
        $modeledu=$this->findAppEducation($id);

        // Applicant's employment details
       $modelemp= $this->findEmploymentDetails($id);

        return $this->render('view', [
           'modelp' => $modelp,
            'modelad' => $modelad,
            'courses'=>  $courses,
            'modeledu'=>  $modeledu,
             'modelemp'=>  $modelemp,
             'id'=>$id,
        ]);
    // }else
    // {
    //     Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
    //     return  $this->goBack(Yii::$app->request->referrer);
    // }
    }

    /**
     * Creates a new TblStud model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('backend students permission')){
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
        if(Yii::$app->user->can('backend students permission')){
        $model = $this->findModel($id);

        //   $add=new TblStudPersDetails();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

           $_POST['TblStud']['first_name'];

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
        if(Yii::$app->user->can('backend students permission')){
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    }
    }



/* Query Student 
Information Using 
Student Primary ID
*/
protected function findStudent($id,$opt){

    if(Yii::$app->user->can('backend students permission')){
    if( !empty($model= TblStud::findOne($id))){

        return $model->$opt;
    }
    throw new NotFoundHttpException('The requested page does not exist. ');
}else
{
    Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
    return  $this->goBack(Yii::$app->request->referrer);
}

}

    //calling the personal details of the applicant information
    protected function findPersonalDetails($id)
    {
           $studentID=$this->findStudent($id,'personal_details_id');
        if (($model = TblStudPersDetails::findOne($studentID)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }


      //calling the personal details of the applicant information
      protected function findAddressOfApplicant($id)
      {
          $app=$this->findStudent($id,'personal_address_id');
          if (($model = TblStudPersAddress::findOne($app)) !== null) {
              return $model;
          }
          throw new NotFoundHttpException('The requested page does not exist.');
      }
  
  // Fetching applicant program and courses applied for
      protected function findAppProgram($id){
          $studprog=$this->findStudent($id,'personal_details_id');
          if(!empty( $prog=TblAppStudProgram::find()->where(['id'=>$studprog])->one())){
              return $prog;
          }
          throw new NotFoundHttpException('The requested page does not exist. ');
  
      }


      // fetching applicant educational background info
    protected function findAppEducation($id)
    {
        $app=$this->findStudent($id,'personal_details_id');

        if (($model = TblStudEduBg::find()->where(['stud_per_id'=>$app])->one()) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

//applicant employment details
    protected function findEmploymentDetails($id)
    {
        $app=$this->findStudent($id,'personal_details_id');

        if (($model = TblStudEmployDetails::find()->where(['stud_per_id'=>$app])->one()) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
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
        if (($model = TblStud::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionDetails()  {

        if(isset($_POST['expandRowKey'])) {  
             $model = TblStud::findOne($_POST['expandRowKey']);   

            return $this->renderPartial('_details.php',['model'=>$model]);  
       }  
       else  
       {  
          return '<div class="alert alert-danger">No data found</div>';  
       } 
    }



    
}

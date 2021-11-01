<?php

namespace backend\modules\application\controllers;

use common\models\TblAcademicYear;
use common\models\TblAppQualiSearch;
use common\models\TblApp;
use common\models\TblAppAddress;
use common\models\TblAppEduBg;
use common\models\TblAppEmpDetails;
use common\models\TblAppPersDetails;
use common\models\TblAppProgram;
use common\models\TblAppSearch;
use Yii;
use common\models\TblAppQuali;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AppController implements the CRUD actions for App model.
 */
class AppController extends Controller
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
     * Lists all App models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('application permission')){
            $searchModel = new TblAppSearch();
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



    public function actionQuali()
    {
        $searchModel = new TblAppQualiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('quali', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }




    /**
     * Displays a single App model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('application permission')){
        // Details from Applicant Personal Information
            $personalDetails= $this->findPersonalDetails($id);

            // Details from Applicant's Personal Address
            $personalAddress= $this->findPersonalAddress($id);

            // Query Applicant's Program Details
            $courses= $this->findAppProgram($id);

                //Applicant's educational details
                $modeledu=$this->findAppEducation($id);

                // Applicant's employment details
                $modelemp= $this->findEmploymentDetails($id);

                return $this->render('view', [
                    
                    'model'=>TblApp::findOne($id),

                    'modelp' => $personalDetails,
                    'modelad'=> $personalAddress,
                    'courses' => $courses,
                    'modeledu' => $modeledu,
                    'modelemp' => $modelemp,
                    'id' => $id,

                ]);
        }else
        {
            Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
            return  $this->goBack(Yii::$app->request->referrer);
        }
    }

    /**
     * Creates a new App model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblApp();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing App model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing App model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        return $id;

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the App model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return App the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblApp::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    protected function findPersonalAddress($id){

        $add= $this->findApp($id,'personal_address_id');

        if(($model=TblAppAddress::findOne($add)) !==null){

            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');

    }


    protected function findPersonalDetails($id)
    {
        //Fetching personal ID of the Applicant's
         $per=$this->findApp($id,'personal_details_id');

        if (($model = TblAppPersDetails::findOne($per)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');

    }


    // Fetching applicant program and courses applied for
    protected function findAppProgram($id){
        // Returning Personal ID
         $per=$this->findApp($id,'program_id');
        if(!empty( $model=TblAppProgram::find()->where(['id'=>$per])->one())){
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist. ');
    }


    // fetching applicant educational background info
    protected function findAppEducation($id)
    {
        $app=$this->findApp($id,'personal_education_id');

        if (($model = TblAppEduBg::findOne($app)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
      
    }

//applicant employment details
protected function findEmploymentDetails($id)
{
    $app=$this->findApp($id,'personal_employment_id');
    if (($model = TblAppEmpDetails::findOne($app)) !== null) {
        return $model;
    }
    throw new NotFoundHttpException('The requested page does not exist.');
}

    // Find or Fail from the main Applicant Table
    protected function findApp($id,$opt){

        if( !empty($model= TblApp::findOne($id))){

            return $model->$opt;
        }
        throw new NotFoundHttpException('The requested page does not exist. ');

    }


    public function actionQualification($id){

        if(Yii::$app->user->can('qualification permission')){
            $acadamic=TblAcademicYear::find()->where(['status'=>1])->select('id')->one();
            $app = TblApp::findOne($id);
            $quali =new TblAppQuali();
            $quali->application_id=$id;
            $quali->status=1;
            $quali->accadamin_year_id=$acadamic->id;
            $quali->user_id=Yii::$app->user->identity->id;
           if ($quali->save()){
               //after saving the information , go ahead and remove the applicants connec
               // $app->delete();
               Yii::$app->session->setFlash('success', 'Successfully Qualified Applicant','Good');
               return $this->redirect(['index']);
           }

        }else
        {
            Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
            return  $this->goBack(Yii::$app->request->referrer);
        }

    }

    public function actionDetails()  {


        if(isset($_POST['expandRowKey'])) {  
               $model = TblApp::findOne($_POST['expandRowKey']);   

            return $this->renderPartial('_details.php',['model'=>$model]);  
       }  
       else  
       {  
          return '<div class="alert alert-danger">No data found</div>';  

       } 

    }

    
}

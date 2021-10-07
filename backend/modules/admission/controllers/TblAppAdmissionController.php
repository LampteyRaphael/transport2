<?php

namespace backend\modules\admission\controllers;

use Codeception\Lib\Di;
use common\models\TblApp;
use common\models\TblAppAddress;
use common\models\TblStud;
use common\models\TblStudEduBg;
use common\models\TblStudEmployDetails;
use common\models\TblStudPersAddress;
use common\models\TblStudPersDetails;
use kartik\mpdf\Pdf;
use Yii;
use common\models\TblAppAdmission;
use common\models\TblAppAdmissionSearch;
use common\models\TblAppDocument;
use common\models\TblAppEduBg;
use common\models\TblAppEmpDetails;
use common\models\TblAppPersDetails;
use common\models\TblAppProgram;
use common\models\TblAppStudProgram;
use common\models\TblPayment;
use common\models\TblStudDoc;
use common\models\User;
use Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TblAppAdmissionController implements the CRUD actions for TblAppAdmission model.
 */
class TblAppAdmissionController extends Controller
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
     * Lists all TblAppAdmission models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admission permission')){
            $searchModel = new TblAppAdmissionSearch();
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
     * Displays a single TblAppAdmission model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('admission permission')){
            //Applicant'spersonal details
            $modelp=$this->findPersonalDetails($id);
            //Applicant'spersonal address
             $modelad=$this->findAddressOfApplicant($id);
               // Applicant's programs
              $courses=$this->findAppProgram($id);
               //Applicant's educational details
             $modeledu=$this->findAppEducation($id);
              // Applicant's employment details
             $modelemp= $this->findEmploymentDetails($id);
            if($modelp){
                return $this->render('view', [
                    'modelp' => $modelp,
                    'modelad' => $modelad,
                    'courses'=>  $courses,
                    'modeledu'=>  $modeledu,
                    'modelemp'=>  $modelemp,
                     'id'=>$id,
                ]);
            }
        }else
        {
            Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
            return  $this->goBack(Yii::$app->request->referrer);
        }
    }

    /**
     * Creates a new TblAppAdmission model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
     if(Yii::$app->user->can('admission permission')){
        $model = new TblAppAdmission();
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
     * Updates an existing TblAppAdmission model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('admission permission')){
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
     * Deletes an existing TblAppAdmission model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('admission permission')){
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }else
        {
            Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
            return  $this->goBack(Yii::$app->request->referrer);
        }
    }

    /**
     * Finds the TblAppAdmission model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblAppAdmission the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblAppAdmission::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }


    //calling the personal details of the applicant information
    protected function findPersonalDetails($id)
    {
           $app=$this->findApp($id,'personal_details_id');
        if (($model = TblAppPersDetails::findOne($app)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }


    //calling the personal details of the applicant information
    protected function findAddressOfApplicant($id)
    {
        $app=$this->findApp($id,'personal_address_id');
        if (($model = TblAppAddress::findOne($app)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

// Fetching applicant program and courses applied for
    protected function findAppProgram($id){
        $app=$this->findApp($id,'program_id');
        if(!empty( $model=TblAppProgram::find()->where(['id'=>$app])->one())){
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

    // Find or Fail from the main table
    protected function findApp($id,$opt){

        if( !empty($model= TblApp::findOne($id))){
            return $model->$opt;
        }
        throw new NotFoundHttpException('The requested page does not exist. ');
    }
    /*
       Query  Admitted Applicant  Details Using Applicant's ID
    */
    public  function application($id){
        if(!empty($app=TblApp::findOne($id)));
        return $app;
    }


   /*
    Migrating  Admitted Applicant Personal Details To Student Personal Details Table
  */
    public function saveStudentPersonalDetails($id){
        $register=$this->application($id);
        $personalD=new  TblStudPersDetails();
        $personalD->title=$register->personalDetails->title;
        $personalD->last_name=$register->personalDetails->last_name;
        $personalD->first_name=$register->personalDetails->first_name;
        $personalD->middle_name=$register->personalDetails->middle_name;
        $personalD->gender=$register->personalDetails->gender;
        $personalD->date_of_birth=$register->personalDetails->date_of_birth;
        $personalD->nationality=$register->personalDetails->nationality;
        $personalD->contact_person=$register->personalDetails->contact_person;
        $personalD->contact_number=$register->personalDetails->contact_number;
        $personalD->date_apply=$register->personalDetails->date_apply;
        $personalD->photo=$register->personalDetails->photo;
        $personalD->save();         
        return $personalD->id;
    }

    /*
        Migrating  Admitted Applicant Address Details To Student Address Table
    */
    public function saveStudentPersonalAddress($id){
        $register=$this->application($id);
        $add =new TblStudPersAddress();
        $add->address=$register->personalAddress->address;
        $add->city=$register->personalAddress->city;
        $add->voters_id=$register->personalAddress->voters_id;
        $add->voters_id_type=$register->personalAddress->voters_id_type;
        $add->gps=$register->personalAddress->gps;
        $add->country=$register->personalAddress->country;
        $add->email=$register->personalAddress->email;
        $add->telephone_number=preg_replace('/[^0-9\.]/','', trim($register->personalAddress->telephone_number));
        $add->save();
        return  $add->id;
    }

    /*
        Migrating  Admitted Applicant Empluyment Details To Student Employment Table
    */
    public function saveStudentPersonalEmployment($id,$persID){
        $register=$this->application($id);
        $emp= new TblStudEmployDetails();
        $emp->company_name= $register->personalEmployment->company_name;
        $emp->position=$register->personalEmployment->position;
        $emp->employer_address=$register->personalEmployment->employer_address;
        $emp->employer_telephone_number=$register->personalEmployment->employer_telephone_number;
        $emp->stud_per_id=$persID;
        $emp->save();
        return $emp->id;
    }

    /*
    Migrating  Admitted Applicant Educational Details To Student  Educational Table
 */
public function studEducationalBackground($id,$perID){
    $resg=$this->application($id);
    $edu= new TblStudEduBg();
    $edu->institution= $resg->personalEducation->institution;
    $edu->program_offered= $resg->personalEducation->program_offered;
    $edu->date= $resg->personalEducation->date;
    $edu->stud_per_id=$perID;
    $edu->save();
    return $edu->id;
}


/*
 The Admitted Student Program Applied For 
 * is Migrated To Students Program Table 
  */
public function studprograms($id,$perID){
    $prag=$this->application($id);
    $pro= TblAppProgram::find()->andwhere(['id'=>$prag->program_id])->one();
    // foreach($program as $pro){ 
        $stud=new TblAppStudProgram();
        $stud->tbl_program=$pro->tbl_program;
        // $stud->course_id=$pro->course_id;
        $stud->stud_per_id=$perID;
        $stud->save();
    // }   
}


public function studDoc($id,$perID){
    $prag=$this->application($id);
   $appDoc= TblAppDocument::find()->andwhere(['personalDetail_id'=>$prag->personal_details_id])->all();
    foreach($appDoc as $doc){ 
        $doc1=new TblStudDoc();
        $doc1->doc_name=$doc->doc_name;
        $doc1->stud_per_id=$perID;
        $doc1->save();
    } 
}



/** Migrating Admitted Applicant Bio Data To Student Table Using Admission Table ID */
    public function actionRegister($id){
        if(Yii::$app->user->can('admission permission')){
            $pay=0;

            $adminID=TblAppAdmission::find()->where(['application_id'=>$id])->select('id')->one();

            $payment=TblPayment::find()->where(['admission_id'=>$adminID->id])->all();
        
            foreach($payment as $amount){
                $pay +=$amount->amount;
            }
    
            if($pay<2000){
                Yii::$app->session->setFlash('error', 'Please Make Full Payment To Enable Student Migration');
                return $this->redirect(['view', 'id' => $id]);
            }else{
                try{
                    $admitt=$this->application($id);
                    $perID= $this->saveStudentPersonalDetails($id); 
                    $perAd=$this->saveStudentPersonalAddress($id);

                    $perEm= $this->saveStudentPersonalEmployment($id,$perID);
                    $perEd= $this->studEducationalBackground($id,$perID);
                    $this->studprograms($id,$perID);
                    $this->studDoc($id,$perID); 
                            
                    $userAdmin = new User();
                    $userAdmin->username=date('Y').rand(0001,9999);
                    $userAdmin->email= date('Y').rand(0001,9999).'@upsamail.edu.gh';
                    $userAdmin->role_id=1;
                    $userAdmin->password_hash = $userAdmin->setPassword($admitt->personalDetails->date_of_birth);
                    $userAdmin->status = 1;
                    $userAdmin->auth_key=$userAdmin->generateAuthKey();
                    $userAdmin->save();

                    $stu= new TblStud();
                    $stu->personal_details_id= $perID;
                    $stu->personal_address_id= $perAd;
                    $stu->personal_education_id=$perEd;
                    $stu->personal_employment_id=$perEm;
                    $stu->personal_document_id=$perID;
                    $stu->application_type=$admitt->application_type;
                    $stu->status=1;
                    $stu->user_id=$userAdmin->id;
                    $stu->program_id=$perID;
                    $stu->date=$admitt->date;
                    $stu->save();

                    Yii::$app->session->setFlash('success', 'Successfully Registered Applicant as Student');
                }catch(Exception $e){
                    Yii::$app->session->setFlash('error', 'Already Migrated'.$e->getMessage());
                    return $this->redirect(['index']);
                }
            }
            return $this->redirect(['index']);
        }else
        {
            Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
            return  $this->goBack(Yii::$app->request->referrer);
        }
    }


    public  function actionDownload($id)
    {
        if(Yii::$app->user->can('admission permission')){
          //Applicant'spersonal details
          $modelp=$this->findPersonalDetails($id);
          //Applicant'spersonal address
           $modelad=$this->findAddressOfApplicant($id);

             // Applicant's programs
            $courses=$this->findAppProgram($id);

            // Get Applicant Program Applied For
            foreach($courses as $course){
              $programCategoryName= $course->program->programCategory->name;
              $programCategoryID= $course->program->program_category_id;
            }


        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;

        $personal= TblStud::find()->where(['id'=>$id])->one();

        $image=Yii::$app->request->baseUrl.'../../../images/application/';
        $content=$this->renderPartial('_admission',['personal'=>$personal,'image'=>$image,'modelp'=>$modelp, 'modelad'=>$modelad,'programCategoryName'=>$programCategoryName]);
        
        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
            'destination' => Pdf::DEST_BROWSER,
            'content' => $content,
            
            'options' => [
                // any mpdf options you wish to set
            ],
            'methods' => [
                'SetTitle' => 'Institute Of Professional Studies',
                'SetSubject' => 'Generating PDF files via yii2-mpdf extension has never been easy',
                'SetHeader' => ['Institute Of Professional Studies||Generated On: ' . date("r")],
                'SetFooter' => ['|Page {PAGENO}|'],
                'SetAuthor' => 'Kartik Visweswaran',
                'SetCreator' => 'Kartik Visweswaran',
                'SetKeywords' => 'Krajee, Yii2, Export, PDF, MPDF, Output, Privacy, Policy, yii2-mpdf',
            ]
        ]);
        return $pdf->render();
        }else
        {
            Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
            return  $this->goBack(Yii::$app->request->referrer);
        }
    }

    public function actionDetails()  {
        if(Yii::$app->user->can('admission permission')){
        if(isset($_POST['expandRowKey'])) {  
             $model = TblStud::findOne($_POST['expandRowKey']);   
            return $this->renderPartial('_details.php',['model'=>$model]);  
       }  
       else  
       {  
          return '<div class="alert alert-danger">No data found</div>';  
       }
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    } 
    }

}

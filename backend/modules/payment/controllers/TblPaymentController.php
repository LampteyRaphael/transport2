<?php

namespace backend\modules\payment\controllers;

use common\models\TblApp;
use common\models\TblAppAddress;
use common\models\TblAppAdmission;
use common\models\TblAppDocument;
use common\models\TblAppEduBg;
use common\models\TblAppEmpDetails;
use common\models\TblAppPersDetails;
use common\models\TblAppProgram;
use common\models\TblAppStudProgram;
use Yii;
use common\models\TblPayment;
use common\models\TblPaymentLog;
use common\models\TblPayments;
use common\models\TblPaymentSearch;
use common\models\TblStud;
use common\models\TblStudDoc;
use common\models\TblStudEduBg;
use common\models\TblStudEmployDetails;
use common\models\TblStudPersAddress;
use common\models\TblStudPersDetails;
use common\models\User;
use common\models\Validate;
use Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * TblPaymentController implements the CRUD actions for TblPayment model.
 */
class TblPaymentController extends Controller
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

    public function admissionList(){
        $admissionApp=TblAppAdmission::find()->select('application_id')->column();
        $app=TblApp::find()->where(['id'=>$admissionApp])->select('personal_details_id')->column();
      return  TblAppPersDetails::find()->where(['id'=>$app])->all();
    }
    /**
     * Lists all TblPayment models.
     * select admission applican't for fees payment
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admission fees permission')){
        $personal=$this->admissionList();
        $searchModel = new TblPaymentSearch();
        $model=new TblPayments();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=>$model,
             'personal'=>$personal,
        ]);
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    }
    }

    /**
     * Displays a single TblPayment model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('admission fees permission')){
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    }
    }

    /**
     * Migrating admitted applicannts to students table after their fees payments
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('admission fees permission')){
        
        $personal=$this->admissionList();
        $amount=0;
        $model = new TblPayments();
        if ($model->load(Yii::$app->request->post())) {
            $amount=$_POST['TblPayments']['amount'];
            $app=TblApp::find()->where(['personal_details_id'=>$_POST['TblPayments']['admission_id']])->one();
            $admission=TblAppAdmission::find()->where(['application_id'=>$app->id])->one();  

            if(!empty($admiss=TblPayments::find()->where(['admission_id'=>$admission->id])->one())){
                $model1=$admiss;
                $model1->amount=$amount+$admiss->amount;
            }else{
                $model1=new TblPayments();
                $model1->amount=$amount;
            }


          if(($amount ?? 0)+ ($admiss->amount?? 0) >= $app->program->program->programCategory->amount){
            $model1->status=1;
            
                $id=$app->id;
                $admitt=$this->application($id);
                $perID= $this->saveStudentPersonalDetails($id); 

                $perAd=$this->saveStudentPersonalAddress($id);

                $perEm= $this->saveStudentPersonalEmployment($id,$perID);

                $perEd= $this->studEducationalBackground($id,$perID);

                $proID=$this->studprograms($id,$perID);
                $this->studDoc($id,$perID); 
     
                $stu= new TblStud();
                $stu->personal_details_id= $perID;
                $stu->personal_address_id= $perAd;
                $stu->personal_education_id=$perEd;
                $stu->personal_employment_id=$perEm;
                $stu->personal_document_id=$perID;
                $stu->program_id=$proID;
                $stu->application_type=$admitt->application_type;
                $stu->status=1;
                $stu->user_id=Yii::$app->user->identity->id;
                $stu->dates=date('Y-m-d');
                $stu->save();

                $mail=new Validate();

                $mail->userAdmins($admitt->personalDetails->date_of_birth,date('Y').rand(0001,9999),1,1);

                if(strtolower($app->program->program->programCategory->name)==='professional program'){
                    $email=strtolower($mail->filter_mail($app->personalAddress->email));
                    $mail->professionalMail($admitt->personalDetails->id,$app->program->program->programCategory->name,$app->program->program->programCategory->amount,$app->personalAddress->address,$admission->accadaminYear->academic_year,$app->program->program->program_name,$email);
                }else{
                    $email=strtolower($mail->filter_mail($app->personalAddress->email));
                  $mail->accessMail($admitt->personalDetails->id,$app->program->program->programCategory->name,$app->program->program->programCategory->amount,$app->personalAddress->address,$admission->accadaminYear->academic_year,$app->program->program->program_name,$email);
               }
            }else{
                $model1->status=2;
            } 

          $model1->admission_id=$admission->id;
          $model1->receipt_no=$_POST['TblPayments']['receipt_no'];
          $model1->dates=date('Y-m-d');
          $model1->user_id=Yii::$app->user->identity->id;
          $model1->save();


          $this->paymentLog($model1->id,$amount,$_POST['TblPayments']['receipt_no']);
          

          Yii::$app->session->setFlash('success', 'Successfully Saved');
          return $this->redirect(['index', 'id' => $model1->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'personal'=>$personal
        ]);
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    }
    }


    /** Payment Log */

    public function paymentLog($id,$amount,$reciept){
        $payLog=new TblPaymentLog();
        $payLog->payment_id=$id;
        $payLog->amount=$amount;
        $payLog->reciept_no=$reciept;
        $payLog->save();
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
    $valide=new Validate();  
    $register=$this->application($id);
    $personalD=new  TblStudPersDetails();
    $personalD->title=$valide->replace2($register->personalDetails->title);
    $personalD->last_name=$valide->replace2($register->personalDetails->last_name);
    $personalD->first_name=$valide->replace2($register->personalDetails->first_name);
    $personalD->middle_name=$valide->replace2($register->personalDetails->middle_name);
    $personalD->gender=$valide->replace2($register->personalDetails->gender);
    $personalD->date_of_birth=$valide->replace2($register->personalDetails->date_of_birth);
    $personalD->nationality=$valide->replace2($register->personalDetails->nationality);
    $personalD->contact_person=$valide->replace2($register->personalDetails->contact_person);
    $personalD->contact_number=$valide->check_only_int($register->personalDetails->contact_number);
    $personalD->date_apply=$valide->replace2($register->personalDetails->date_apply);
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
    $stud=new TblAppStudProgram();
    $stud->tbl_program=$pro->tbl_program;
    $stud->stud_per_id=$perID;
    $stud->save();
    return $stud->id;
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


    /**
     * Updates an existing TblPayment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('admission fees permission')){
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
     * Deletes an existing TblPayment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('admission fees permission')){
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    }
    }

    /**
     * Finds the TblPayment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblPayment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if(Yii::$app->user->can('admission fees permission')){
        if (($model = TblPayments::findOne($id)) !== null) {
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

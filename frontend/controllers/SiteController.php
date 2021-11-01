<?php
namespace frontend\controllers;

use common\models\TblApp;
use common\models\TblAppDocument;
use common\models\TblAppEduBg;
use common\models\TblAppEmpDetails;
use common\models\TblAppProgram;
use common\models\TblOsn;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use kartik\mpdf\Pdf;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\TblAppAddress;
use common\models\TblAppPersDetails;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\ContactForm;
use yii\helpers\Url;
use yii\web\UploadedFile;
use common\models\TblProgram;
use common\models\TblProgramType;
use Exception;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                     [
                'allow' => true,
                'actions' => ['login', 'verify','osn','application','program','education','employment','document','declaration','exit','report','remove','courses'],
            ],
                    [
                        'actions' => ['login', 'error','logout'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','resetPassword'],
                        'allow' => true,
                        'roles' => ['student','lecturer'],
                    ],
                ],
            ],
            
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post','get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('student')){
            // return  $this->goBack(Yii::$app->request->referrer);
            return $this->redirect(['index']);
         }else{
          
            return  $this->goBack(Yii::$app->request->referrer);
        } 
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        
        $this->layout = 'main-login';

        if (!Yii::$app->user->isGuest) {
         return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            if(Yii::$app->user->can('student')){

                return $this->redirect(['/student']);

            }else if(Yii::$app->user->can('lecturer')){

                return $this->redirect(['/lecturer']);
            }

            // return $this->redirect(['login']);
            else
            {                
                return $this->render('login', [
                    'model' => $model,
                ]);
            } 
        }else {
            $model->password = '';
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['site/login']);
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
       // $this->layout = 'main2';
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /*
    validating Osn
     and update transaction number
    */
    public function actionOsn()
    {
       $this->layout = 'main-osn';
        $model = new TblOsn();
        try {
            if ($model->load(Yii::$app->request->post())){
                // Query Applicant OSN Information
                $osn= TblOsn::find()->where(['osn_number'=> $_POST['TblOsn']['osn_number']])->one();
                // Fetch OSN Details, if grant access
                if(!empty($osn->osn_number)){
                    // Saving Transaction Number for the first Post
                    $osn->transaction_no=$_POST['TblOsn']['transaction_no'];
                    $osn->year= date('Y');
                    // Active =1 And Non Active=0
                    $osn->status=1;
                    $osn->save();

                    $osn=Yii::$app->session->set('osn',$osn->id);

                    return $this->redirect(['application']);

                } else  if(empty($osn->osn_number)) {
                    Yii::$app->session->setFlash('error', 'Error');
                    return $this->redirect(['osn']);
                }
            } 
           
        }catch (\Exception $e){

            return $this->redirect(['osn']);
        }
        return $this->render('osn',[
            'model'=>$model
        ]);
       
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
       // $this->layout = 'main2';
        try {
            if (isset($_POST['applicant'])){
                if ($_POST['applicant']==1){
                    Yii::$app->session->setFlash('success', 'Welcome Enter Your OSN');
                    return  $this->redirect('/site/osn');
                }elseif ($_POST['applicant']==2){
                    return  $this->redirect('/site/login');
                }
            }
        }catch (\Exception $exception){
            Yii::$app->session->setFlash('success', 'Welcome, Please Enter Your OSN');
            return  $this->redirect('signup');
        }
        return $this->render('signup', [
//            'model' => $model,
        ]);
    }



    // Applicant OSN ID
protected function osnID(){

    if(($osn=Yii::$app->session->get('osn')) !==null){
        return $osn;
    }
    // throw new HttpException('Error with your osn');
}
  

       /* Fetch Personal ID With OSN ID */
protected function personalDetails(){
    if(($model=TblAppPersDetails::find()->where(['osn_id'=>$this->osnID()])->one()) !==null){
        return $model;
    }
    // throw new HttpException('Error Fetching Data');
}


       /* Fetch Personal Address */
       protected function personalAddress(){
        if(($model=TblAppAddress::find()->where(['osn_id'=>$this->osnID()])->one()) !==null){
            return $model;
        }
        // throw new HttpException('Error Fetching Data');
    }

// Get Applicant ID
protected function applicantMainTable(){

    if(($model=TblApp::find()->where(['osn'=>$this->osnID()])->one()) !==null){

        return $model;
    }
}


//Get Applicant's Educational ID
protected  function  applicantEducation(){

    if(($model=TblAppEduBg::find()->where(['osn_id'=>$this->osnID()])->one()) !==null){

        return $model;
    }
}

//Get Applicant Employment ID
protected function  applicantEmployment(){
    if(($model=TblAppEmpDetails::find()->where(['osn_id'=>$this->osnID()])->one())){
        return $model;
    }
}

// Get Applicant Program ID
protected function applicantPrograms(){
    if(($model=TblAppProgram::find()->where(['osn_id'=>$this->osnID()])->one()) !==null){
      return  $model;
    }
    throw new NotFoundHttpException('The requested page does not exist.');
}


protected function applicantCourse($program){

    if(($program=TblProgram::find()->where(['program_category_id' => $program])->all()) !==null){
        
        return $program;
    }
}


/* Saving Applicant's Personal Details */
protected function applicantDetails($modelp){
        // $modelp->title = ValidateController::replace2($_POST['TblAppPersDetails']['title']);
    $modelp->last_name = $_POST['TblAppPersDetails']['last_name'];
    $modelp->first_name = $_POST['TblAppPersDetails']['first_name'];
    $modelp->middle_name = $_POST['TblAppPersDetails']['middle_name'];
    $modelp->gender =$_POST['TblAppPersDetails']['gender'];
    $modelp->date_of_birth =$_POST['TblAppPersDetails']['date_of_birth'];
    $modelp->nationality = $_POST['TblAppPersDetails']['nationality'];
    $modelp->contact_person =$_POST['TblAppPersDetails']['contact_person'];
    $modelp->contact_number = $_POST['TblAppPersDetails']['contact_number'];
    // Save OSN ID 
    $modelp->osn_id = $this->osnID();
    $modelp->date_apply = date('Y-m-d');
}


/* Saving Applicant's Personal Address */
protected function applicantAddress($modelad){
    $modelad->address = $_POST['TblAppAddress']['address'];
    $modelad->city = $_POST['TblAppAddress']['city'];
    $modelad->country = $_POST['TblAppAddress']['country'];
    $modelad->voters_id = $_POST['TblAppAddress']['voters_id'];
    $modelad->voters_id_type = $_POST['TblAppAddress']['voters_id_type'];
    $modelad->gps = $_POST['TblAppAddress']['gps'];
    $modelad->email = $_POST['TblAppAddress']['email'];
    $modelad->telephone_number = $_POST['TblAppAddress']['telephone_number'];
    $modelad->osn_id = $this->osnID();
}


/* Saving Applicant's Personal Photo */
protected  function applicantPhoto($imageFile, $modelp){
    if(isset($imageFile->size)){
        if(!file_exists(Url::to('application/images/'))){
            mkdir(Url::to('application/images/'),0777,true);
        }
        $fileName=time().''.$imageFile->baseName.'.'.$imageFile->extension;
        $imageName=Url::to('application/images/').$fileName;

        $imageFile->saveAs($imageName);
        $modelp->photo = $fileName;
}
    
}

// /* Saving Applicant's Personal Documents */
protected function applicantDocument($imageFile, $perID){
    if(isset($imageFile)){
        if(!file_exists(Url::to('application/documents/'))){
            mkdir(Url::to('application/documents'),0777,true);
        }
        foreach ($imageFile as $name){
            $modeld=new  TblAppDocument();
            $fileName= time().''.$name->baseName.'.'.$name->extension; 
            $modeld->doc_name=$fileName;
            $modeld->personalDetail_id = $perID->id;
            $modeld->osn_id=$this->osnID();  
            $imageName=Url::to('application/documents/').$fileName;
            $name->saveAs($imageName);
            $modeld->save();
        }
    }
}


/* Saving  applicant personal information, address and photo */
    public  function  actionApplication(){

                $this->layout = 'main2'; 

            if (!empty($this->osnID())){

                try{
                    if (!empty($per=$this->personalDetails())){
                        $modelp=$per;
                        $modelad =$this->personalAddress();
                    }else {
                        $modelp  = new TblAppPersDetails();
                        $modelad = new TblAppAddress();
                    }
                        if ($modelp->load(Yii::$app->request->post())) {
                            // Save Applicant Photo
                            $imageFile = UploadedFile::getInstance($modelp, 'photo');
                            // Store Images
                            $this->applicantPhoto($imageFile,$modelp);
                            //saving to personal details tabel
                            $this->applicantDetails($modelp);
                            //saving to personal address tab
                            $this->applicantAddress($modelad);
                            if ($modelp->save() && $modelad->save()) {
                                Yii::$app->session->set('person', $modelp->id);
                                Yii::$app->session->set('address', $modelad->id);
                                Yii::$app->session->setFlash('success', 'Step One has been successfully Saved');
                                return $this->redirect(['program']);
                            }
                        }
                        return $this->render('application', [
                            'modelp' => $modelp,
                            'modelad' => $modelad,
                        ]);
                }catch(Exception $e){
                    Yii::$app->session->setFlash('error', 'Error!! something went wrong');
                    return $this->redirect(['application']);
                }

            }else{
                return $this->redirect(['/site/osn']);
            }
    }

 //program applicant want to study
 public function actionProgram()
 {
     $this->layout = 'main2';
     if (!empty($this->osnID())) {

        try{
                $model=new TblProgramType();
            if ($model->load(Yii::$app->request->post())) {
                $program=TblProgram::find()->where(['program_category_id'=>$_POST['TblProgramType']['name']])->all();

                    return $this->render('program', [
                        'model' => $model,
                        'program'=>$program,
                    ]);
            }
        }catch(Exception $e){
            /* Preving Programes Loading Error */
            Yii::$app->session->setFlash('error', 'Error!! something went wrong');
            return $this->redirect(['program']);
        }

        return $this->render('program', [
            'model' => $model,
            'program'=>$_POST['TblProgramType']['name']??'',
        ]);

     }else{
         return $this->redirect(['/site/osn']);
     }
 }


      //Step two of the program applying for
 public function actionCourses(){
     if (!empty($this->osnID())) {
        //   $this->applicantPrograms();
    //  var_dump(TblAppProgram::find()->where(['osn_id'=>$this->osnID()])->one());
    //  die;
        try{
    if (isset($_POST['program'])){
    
        if (!empty($programs=TblAppProgram::find()->where(['osn_id'=>$this->osnID()])->one())){
            $program=$programs;
        }else {
            $program=new TblAppProgram();
        }
        $program->tbl_program= $_POST['program'];
        $program->osn_id=$this->osnID();
       if($program->save()){
        Yii::$app->session->set('program', $program->id);
            Yii::$app->session->setFlash('success', 'Program Successfully Selected');
            return $this->redirect(['site/program']);
       }else{
            Yii::$app->session->setFlash('error', 'Program Already Selected');
            return $this->redirect(['site/program']);
       }
    }else{
        Yii::$app->session->setFlash('error', 'Select At List One Program');
        return $this->redirect(['/site/program']);
    }

    }catch(Exception $e){
        Yii::$app->session->setFlash('error', 'Error!! something went wrong');
        return $this->redirect(['program']);
    }
 }else{
     return $this->redirect(['/site/osn']);
     }
 }

// Remove selected courses
    public function actionRemove(){
        //saving of the step two of the program applying for
        $this->layout = 'main2';
        if (!empty(Yii::$app->session->get('osn'))) {
      
       if (!empty($_POST['program'])){

        $removed=TblAppProgram::find()->where(['id'=>$_POST['program']])->one();
       if($removed->delete()){

        Yii::$app->session->setFlash('success', 'Selected course is successfully removed');
      
        return $this->redirect(['/site/program']);
       }
       }else{
           Yii::$app->session->setFlash('error', 'course is not selected');
           return $this->redirect(['/site/program']);
       }
    }else{
        return $this->redirect(['osn']);
        }
    }


   // Save or Store Applicant Educational Details
    public function actionEducation()
    {
        $this->layout = 'main2';
        if (!empty($this->osnID())) {

            try{
                // Check to see whether applicant has already fill the educational form
                if (!empty($ed=$this->applicantEducation())){
                    $model=$ed;
                }else {
                    $model = new TblAppEduBg();
                }
            if ($model->load(Yii::$app->request->post())) {
    
                $model->osn_id=$this->osnID();
    
                $model->institution= $_POST['TblAppEduBg']['institution'];
    
                $model->program_offered=$_POST['TblAppEduBg']['program_offered'];
                
                if ($model->save()) {
                    Yii::$app->session->set('education', $model->id);
                    Yii::$app->session->setFlash('success', 'Step three has been successfully Saved');
                    return $this->redirect(['site/employment']);
                }else
                    if (!$model->save()){
                        Yii::$app->session->setFlash('error', 'Step Four Already Saved');
                        return $this->redirect(['/site/employment']);
                    }
            }
    
            return $this->render('education', [
                'model' => $model,
            ]);

            }catch(Exception $e){
                Yii::$app->session->setFlash('error', 'Error!! something went wrong');
                return $this->redirect(['education']);
            }
        }else{
            return $this->redirect(['/site/osn']);
        }
    }

    public function actionEmployment(){

        $this->layout = 'main2';
        if (!empty($this->osnID())) {
            try{
                $em=$this->applicantEmployment();
                if (!empty($em)){
                    $model=$em;
                }else {
                    $model = new TblAppEmpDetails();
                }
                if ($model->load(Yii::$app->request->post())) {
                    $model->osn_id=$this->osnID();
                    if ($model->save()){
                        Yii::$app->session->set('employment', $model->id);
                        Yii::$app->session->setFlash('success', 'Step Four has been successfully Saved');
                        return $this->redirect(['/site/document']);
                    }else
                        if (!$model->save()){
                            Yii::$app->session->setFlash('error', 'Step Three Already Saved');
                            return $this->redirect(['/site/document']);
                        }
                }
                return $this->render('employment', [
                    'model' => $model,
                ]);

            }catch(Exception $e){
                Yii::$app->session->setFlash('error', 'Error!! something went wrong');
                return $this->redirect(['employment']);
            }
            
        }else{
            return $this->redirect(['/site/osn']);
        }
    }

    public function actionDocument()
    {
        $this->layout = 'main2';
        if (!empty($this->osnID())) {
            try{
                $perID=$this->personalDetails();
                 if($perID !==null){
                    $applications=$this->applicantMainTable();
                    $model=new  TblAppDocument();
                if ($model->load( Yii::$app->request->post())) {
                    $imageFile=UploadedFile::getInstances($model, 'doc_name');
                    // Save Applicant Documents
                    $this->applicantDocument($imageFile, $perID);
                    if (!empty($applications)){
                        $application=$applications;
                    }else {
                        /* creating new applicant table if it doesn't exist */
                        $application = new TblApp();
                    }
                   /* Main Applicant Table with foreign keys*/
                     $this->applicantMainStoreTable($application);  
                    // if(!empty($app->id)){
                     return $this->redirect(['declaration', 'personal' => $applications]);
                    // }              
                }
            return $this->render('document', [
                'model' => $model,
            ]);
                }else{
                    Yii::$app->session->setFlash('error', 'You Have Not Complete All The Steps');
                    return $this->redirect(['application']);
                }
             
    }catch(Exception $e){
        Yii::$app->session->setFlash('error', 'Error!! something went wrong');
        return $this->redirect(['document']);
    }
        }else{
            return $this->redirect(['/site/osn']);
        }
    }

    

    public function actionDeclaration(){
        $this->layout = 'main2';
        if (!empty(Yii::$app->session->get('osn'))) {
            try{
              $applications=$this->applicantMainTable();
              
                 if($applications !==null){
                    return $this->render('declaration', [ 'personal' => $applications]);
                }else{
                    Yii::$app->session->setFlash('error', 'You Have Not Complete All The Steps');
                    return $this->redirect(['document']);
                }
            }catch(Exception $e){
                return $this->redirect(['document']);
            }

            return $this->render('declaration', [ 'personal' => $applications]);

        }else{
            return $this->redirect(['/site/osn']);
        }
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ])  ;
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }



    public function actionReport($id) {
        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $personal= TblApp::find()->where(['id'=>$id])->one();
        //  $images= 'application/images/'.$personal->personalDetails->photo;
        $content=$this->renderPartial('_declaration',['personal'=>$personal]);
        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
            'destination' => Pdf::DEST_BROWSER,
            'content' => $content,
            
            'options' => [
                // any mpdf options you wish to set
            ],
            'methods' => [
                'SetTitle' => 'IPS',
                'SetSubject' => 'UPSA',
                'SetHeader' => ['Institute Of Professional Studies(IPS)||Generated On: ' . date("r")],
                'SetFooter' => ['|Page {PAGENO}|'],
                'SetAuthor' => 'UPSA',
                'SetCreator' => 'UPSA',
                'SetKeywords' => 'UPSA',
            ]
        ]);
        return $pdf->render();
        }

        
        public function actionExit()
        {
            Yii::$app->user->logout();
            Yii::$app->getSession()->destroy();
            return $this->redirect(['osn']);
        }



        protected function applicantMainStoreTable($application){        
            $application->personal_details_id = Yii::$app->session->get('person');
            $application->personal_address_id = Yii::$app->session->get('address');
            $application->personal_education_id = Yii::$app->session->get('education');
            $application->personal_employment_id = Yii::$app->session->get('employment');
            $application->personal_document_id = Yii::$app->session->get('person');
            $application->application_type =1;
            $application->program_id = Yii::$app->session->get('program');
            $application->status = 1;
            $application->osn = $this->osnID();
            $application->date = date('Y-m-d');
            $application->save();
            return $application->id;
        }

        public function actionForgot(){
            $model = new PasswordResetRequestForm();

            return $this->render('requestPasswordResetToken', [
                'model' => $model,
            ])  ;

        }
}

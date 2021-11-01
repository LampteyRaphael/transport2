<?php

namespace backend\modules\qualification\controllers;

use common\controllers\ValidateController;
use common\models\TblAdmissLog;
use common\models\TblApp;
use common\models\TblAppAddress;
use common\models\TblAppAdmission;
use common\models\TblAppEduBg;
use common\models\TblAppEmpDetails;
use common\models\TblAppPersDetails;
use common\models\TblAppProgram;
use common\models\TblAppQualiSearch;
use common\models\User;
use Yii;
use common\models\TblAppQuali;
use common\models\TblQualiLog;
use common\models\TblStud;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TblAppQualiController implements the CRUD actions for TblAppQuali model.
 */
class TblAppQualiController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'delete','index','update','view','details','bulk','qualification'],
                'rules' => [
                    [
                        'actions' => ['create', 'delete','index','update','view','details','bulk','qualification'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TblAppQuali models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('qualification permission')){
        $searchModel = new TblAppQualiSearch();
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
     * Displays a single TblAppQuali model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('qualification permission')){
           // Details from Applicant Personal Information
       $personalDetails= $this->findPersonalDetails($id);

       // Details from Applicant's Personal Address
       $personalAddress= $this->findPersonalAddress($id);

        // Applicant's programs
       $personalProgram = $this->findAppProgram($id);

        //Applicant's educational details
        $modeledu=$this->findAppEducation($id);

        // Applicant's employment details
        $modelemp= $this->findEmploymentDetails($id);
        return $this->render('view', [
            'modelp' => $personalDetails,
            'modelad'=> $personalAddress,
            'courses' => $personalProgram,
            'modeledu'=>  $modeledu,
            'modelemp'=>  $modelemp,
            'id'=> $id,
        ]);
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    }
    }

    /**
     * Creates a new TblAppQuali model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('qualification permission')){

        $model = new TblAppQuali();

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
     * Updates an existing TblAppQuali model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('qualification permission')){

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
     * Deletes an existing TblAppQuali model.
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
     * Finds the TblAppQuali model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblAppQuali the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblAppQuali::find()->where(['application_id'=>$id])->one()) !== null) {
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
    protected function findAppEducation($id){
        $app=$this->findApp($id,'personal_education_id');

        if (($model = TblAppEduBg::findOne($app)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
      
    }

//applicant employment details
protected function findEmploymentDetails($id){
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

// Applicant Details
    public function actionDetails()  {

        if(isset($_POST['expandRowKey'])) {  
            $model = TblAppQuali::findOne($_POST['expandRowKey']);   
           return $this->renderPartial('_details.php',['model'=>$model]);  
      }  
      else  
      {  
         return '<div class="alert alert-danger">No data found</div>';  

      } 
    }

    public function actionBulk(){
        if(Yii::$app->user->can('qualification permission')){
         $selection = (array) Yii::$app->request->post('selection');
        if (null==((array)Yii::$app->request->post('selection'))) {
            Yii::$app->session->setFlash('error', 'Sorry!. Checkbox is not selected');
            return $this->redirect(['index']);
        }

        foreach ($selection as $item)   {
            //changing the status of applicants who  has been selected
            $quali=TblAppQuali::findOne($item);
          //  $quali->status=Yii::$app->request->post('test');
            // $quali->user_id=Yii::$app->user->identity->id;
            // $quali->save();
            //sending the applicant who has qualified to admission process
            $toadminssion=new TblAppAdmission();
            $toadminssion->status=$quali->status;
            $toadminssion->user_id=Yii::$app->user->identity->id;
            // $toadminssion->doa= '2021-05-06';
            // $toadminssion->doc=	'2021-05-06';
            $toadminssion->application_id=$quali->application_id;
            $toadminssion->accadamin_year_id=$quali->accadamin_year_id;
            $toadminssion->save();
            
            //log of qualified applicant
            if($toadminssion->save()){
                $quaLoq=new TblQualiLog();
                $quaLoq->status=$quali->status;
                $quaLoq->user_id=Yii::$app->user->identity->id;
               $quaLoq->save();
            }else{

                Yii::$app->session->setFlash('error', 'Applicants Already Admitted');
                return $this->redirect(['index']);
            }
            

        }
        Yii::$app->session->setFlash('success', 'Successfully Qualified Applicant');
        return $this->redirect(['index']);
           
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    }
    }

    public function actionQualification($id){

        if(Yii::$app->user->can('admission permission')){
        $quali= $this->findModel($id);
        $adminssion=new TblAppAdmission();
        $adminssion->status=$quali->status;
        $adminssion->user_id=$quali->user_id;
        $adminssion->application_id=$quali->application_id;
        $adminssion->accadamin_year_id=$quali->accadamin_year_id;
        $adminssion->save();
            // Details from Applicant Personal Information
    //    $modelp= $this->findPersonalDetails($quali->application->personalDetails->id);

    //    // Details from Applicant's Personal Address
    //    $modelad= $this->findPersonalAddress($quali->application->personalAddress->id);

    //     // Applicant's programs
    //    $courses = $this->findAppProgram($quali->application->personalDetails->id);

    //      // Get Applicant Program Applied For
    //      foreach($courses as $course){
    //        $programCategoryName= $course->program->programCategory->name;
    //        $programCategoryID= $course->program->program_category_id;
    //      }

    //      $personal= TblStud::find()->where(['id'=>$id])->one();

        //  $image=Yii::getAlias('@app/web/image/logo.png');
          //   $content=$this->renderPartial('mail');
        //   $body= Yii::$app->view->renderFile('@common/mail/register.php',['personal'=>$personal,'image'=>$image,'modelp'=>$modelp, 'modelad'=>$modelad,'programCategoryName'=>$programCategoryName]);

        //   Yii::$app->mailer->compose()
        //   ->setFrom(['ips.admin@upsamail.edu.gh'=>'UPSA'])
        //   ->setTo($quali->application->personalAddress->email)
        //   ->setSubject('UPSA Admission')
        //   ->setHtmlBody($body)
        //  ->send();


        //  if( $adminssion->save()){
        //      $adminssionLog=new TblAdmissLog();
        //      $adminssionLog->user_id=Yii::$app->user->identity->id;
        //      $adminssionLog->status=$quali->status;

            // Creating Portal For Applicant User
        //    $this->appAccount($quali->application->personalDetails->date_of_birth,$quali->application->personalDetails->first_name);

            // //   $content=$this->renderPartial('mail');
            //   Yii::$app->mailer->compose('register',['quali'=>1])
            //   ->setFrom(['ips.admin@upsamail.edu.gh'=>'UPSA'])
            //   ->setTo($quali->application->personalAddress->email)
            //   ->setSubject('UPSA Admission')
            // //   ->setHtmlBody("")
            // //   ->setHtmlBody('Your Pass:'.$this->actionGetpass($quali->application->personalDetails->first_name).'And Your User Name :'.$quali->application->personalDetails->date_of_birth.$content)
            //  ->send();


            //     Yii::$app->mailer->compose(['html' => 'passsend-html'],['name'=>$name,'username'=>$username,'pass'=>$pass])
            //    ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name ])
            //    ->setTo($quali->application->personalAddress->email)
            //    ->setSubject('Your Credentials UPSA Hostel Management System')
            //    ->setTextBody("")
            //    ->send();

            //  if ($adminssionLog->save()){
            //      $quali->delete();
            //  }

            //  $model = new User();
            //  $model->username='20212021';
            //  $model->email=$quali->application->personalAddress->email;
            //  $model->role_id=3;
            //  $model->password_hash = $model->setPassword($quali->application->personalDetails->date_of_birth);
            //  $model->status = 10;
            //  $model->auth_key=$model->generateAuthKey();
            //  $model->save();

             

            Yii::$app->session->setFlash('success', 'Successfully Qualified Applicant');
            return $this->redirect(['index']);
    //    }else{
    //     Yii::$app->session->setFlash('error', 'Already Admitted');
    //      return $this->redirect(['index']);
    //    }
   

        // $selection = (array) Yii::$app->request->post('selection');
        // if (null==((array)Yii::$app->request->post('selection'))) {
        //     Yii::$app->session->setFlash('error', 'Sorry!. Checkbox is not selected');
        //     return $this->redirect(['index']);
        // }

        // foreach ($selection as $item)   {
        //     //changing the status of applicants who  has been selected
        //     $quali=TblAppQuali::findOne($item);
        //     $quali->status=Yii::$app->request->post('test');
        //     $quali->user_id=Yii::$app->user->identity->id;
        //     $quali->save();
        //     //sending the applicant who has qualified to admission process
        //     $toadminssion=new TblAppAdmission();
        //     $toadminssion->status=3;
        //     $toadminssion->user_id=Yii::$app->user->identity->id;
        //     // $toadminssion->doa= '2021-05-06';
        //     // $toadminssion->doc=	'2021-05-06';
        //     $toadminssion->application_id=$quali->application_id;
        //     $toadminssion->accadamin_year_id=1;
        //     $toadminssion->save();
            
        //     //log of qualified applicant
        //     // if(){
        //         $quaLoq=new TblQualiLog();
        //         $quaLoq->status=Yii::$app->request->post('test');
        //         $quaLoq->user_id=Yii::$app->user->identity->id;
        //        var_dump( $quaLoq->save());
        //     //}

        // }
           
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    }

    }



    // private  function actionGetpass($name) {
    //     $alphabet = "abcdefghijklmnopqrstuwxyz0123456789".$name;
    //     $pass = array(); //remember to declare $pass as an array
    //     $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    //     for ($i = 0; $i < 8; $i++) {
    //         $n = rand(0, $alphaLength);
    //         $pass[] = $alphabet[$n];
    //     }
    //     return implode($pass); //turn the array into a string
    // }



// Applicant Account
    // public function  appAccount($dob,$name){
    //     $model = new User();
    //     $model->username=$dob;
    //     $model->email= $dob.'@upsamail.edu.gh';
    //     $model->role_id=1;
    //     $model->password_hash = $model->setPassword($this->actionGetpass($name));
    //     $model->status = 1;
    //     $model->auth_key=$model->generateAuthKey();
    //     $model->save();

    // }


    
    


}

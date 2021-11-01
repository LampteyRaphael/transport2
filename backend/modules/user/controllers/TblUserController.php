<?php

namespace backend\modules\user\controllers;

use common\models\AuthAssignment;
use common\models\TblStaff;
use common\models\TblStaffList;
use common\models\TblUserSearch;
use common\models\User;
use common\models\Validate;
use Exception;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\UploadedFile;

/**
 * TblUserController implements the CRUD actions for TblUser model.
 */
class TblUserController extends Controller
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

  /*Creating Login Credentials For Users*/
    public function actionIndex()
    {
        if(Yii::$app->user->can('user-admin')){
            try{
                $searchModel = new TblUserSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $model=new User();
                $staff=new TblStaffList();
                $account=new Validate();
                if ($model->load(Yii::$app->request->post())){
                    $doa=$_POST['TblStaffList']['date_of_birth'];
                    $staffC=$_POST['TblStaffList']['staff_category_id'];
                    $department=$_POST['TblStaffList']['depart_id'];
                    $email=$_POST['User']['email'];
                    $role=1;
                    $status=1;
                    $userID=$account->userAdmins($doa,$email,$role,$status);
                    
                   if(!empty($userID)){
                    $staff->title=$_POST['TblStaffList']['title'];
                    $staff->first_name=$_POST['TblStaffList']['first_name'];
                    $staff->surname=$_POST['TblStaffList']['surname'];
                    $staff->date_of_birth=$doa;
                    $staff->ranks=$_POST['TblStaffList']['ranks'];
                    $staff->user_id=$userID;
                    $staff->program_id=$_POST['TblStaffList']['program_id'];
                    $staff->staff_category_id=$staffC;
                    $staff->depart_id=$department;
                    $staff->doa=$_POST['TblStaffList']['doa'];
                    $staff->dates=date('Y-m-d');
                    $staff->save();

                    // $staffCs=new TblStaff();
                    // $staffCs->department_id=$department;
                    // $staffCs->staff_id=$userID;
                    // $staffCs->save();

                 // assigning permission to registered users
                  foreach($_POST['User']['name'] as $roles){
                    $newPermission=new AuthAssignment();
                    $newPermission->user_id=$userID;
                    $newPermission->item_name=$roles;
                    $newPermission->save();
                  }
                 
                }
            }
              
        }catch (\Exception $e){
            
            Yii::$app->session->setFlash('error', $e->getMessage());

            return $this->redirect(['index']);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=>$model,
            'staff'=>$staff
        ]);
       
        }else
        {
            Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
          return  $this->goBack(Yii::$app->request->referrer);
        }
      
    }


      /* Saving Applicant's Personal Photo */
      protected  function Photo($imageFile, $modelp){
        if(isset($imageFile->size)){
            if(!file_exists(Url::to('@webfront/application/images/'))){
                mkdir(Url::to('@webfront/application/images/'),0777,true);
            }
            $fileName=time().''.$imageFile->baseName.'.'.$imageFile->extension;
            $imageName=Url::to('@webfront/application/images/').$fileName;
    
            $imageFile->saveAs($imageName);
            $modelp->photo = $fileName;
    }
}

    /**
     * Displays a single TblUser model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
       try{
        
            $user=$this->findModel($id);
            $staff=TblStaffList::find()->andwhere(['user_id'=>$id])->one();
           if(empty($staff)){
                Yii::$app->session->setFlash('error','Error');
                return  $this->goBack(Yii::$app->request->referrer);
           }
        }catch (\Exception $e){
            Yii::$app->session->setFlash('error','error');
            return $this->redirect(['view']);
        }
        return $this->render('view', [
            'model' => $user,
            'staff'=> $staff,
        ]);
      
    }

    /**
     * Creates a new TblUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
            if(Yii::$app->user->can('user-admin')){
            try{
                $model = new User();
                $account=new Validate();
                $staff=new TblStaffList();
                if ($model->load(Yii::$app->request->post())){
                    if ($model->validate()){
                        $imageFile = UploadedFile::getInstance($model, 'photo');
                        $this->photo($imageFile,$model);
                        $account->userAdmins($_POST['TblStaffList']['date_of_birth'],$_POST['User']['email'],$_POST['User']['role_id'],$_POST['User']['status']);
                        if (!empty($account)){
                            Yii::$app->getSession()->setFlash('success','Successfully Posted');
                            return  $this->redirect('index');
                        }
                    }
                }
                return $this->render('create', [
                    'model' => $model,
                    'staff'=>$staff
                ]);
            }catch(Exception $e){
                Yii::$app->getSession()->setFlash('error',$e->getMessage());
                return  $this->redirect('index'); 
            }
        }else
        {
            Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
            return  $this->goBack(Yii::$app->request->referrer);
        }
    }

    /**
     * Updates an existing TblUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate()
    {
              $id=$_POST['userID'];
            
            if(Yii::$app->user->can('user-admin')){
                $model=$this->findModel($id);
                $staff=TblStaffList::find()->andwhere(['user_id'=>$id])->one();
                $model = $this->findModel($id);
            if ($model->load(Yii::$app->request->post())) 
            {
                $model->email= $_POST['User']['email'];
                $model->role_id=$_POST['User']['role_id'];
                // $model->status = $_POST['User']['status'];
                $model->save();

                $staff->title=$_POST['TblStaffList']['title'];
                $staff->first_name=$_POST['TblStaffList']['first_name'];
                $staff->surname=$_POST['TblStaffList']['surname'];
                $staff->middle_name=$_POST['TblStaffList']['middle_name'];
                $staff->date_of_birth=$_POST['TblStaffList']['date_of_birth'];
                $staff->ranks=$_POST['TblStaffList']['ranks'];
                $staff->user_id=$model->id;
                $staff->staff_category_id=$_POST['TblStaffList']['staff_category_id'];
                $staff->depart_id=$_POST['TblStaffList']['depart_id'];
                $staff->country=$_POST['TblStaffList']['country'];
                $staff->city=$_POST['TblStaffList']['city'];
                $staff->telephone_number=$_POST['TblStaffList']['telephone_number'];
                $staff->doa=$_POST['TblStaffList']['doa'];
                $staff->dates=date('Y-m-d');
                $staff->save();

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
     * Deletes an existing TblUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
            if(Yii::$app->user->can('user-admin')){
            $this->findModel($id)->delete();
            Yii::$app->session->setFlash('success', 'Successfully Deleted');

            return $this->redirect(['index']);
        }else
        {
            Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
            return  $this->goBack(Yii::$app->request->referrer);
        }
    }

    /**
     * Finds the TblUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

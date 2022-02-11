<?php

namespace frontend\modules\lecturer\controllers;

use common\models\TblCourseLecturer;
use common\models\TblStaffList;
use common\models\TblStRegistration;
use common\models\TblStud;
use common\models\TblStudGrade;
use common\models\TblStudRegistYear;
use common\models\TblStudsResult;
use common\models\TblStudsResultSearch;
use common\models\User;
use common\models\Validate;
use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Writer_Excel2007;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\UploadedFile;

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
        if(Yii::$app->user->can('lecturer')){
             try{
                $id=Yii::$app->user->identity->id;
                $model= TblStaffList::find()->where(['user_id'=>$id])->one();
                $lecturer= TblCourseLecturer::find()->andwhere(['lecturer_id'=>$model->id])->andWhere(['course_lecture_status_id'=>1])->all();   
        
                $academic_year=TblStudRegistYear::find()->where(['status'=>1])->one();
                
            $searchModel = new TblStudsResultSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'model'=>new TblStRegistration(),
                'lecturer'=>$lecturer,
                'academic_year'=>$academic_year->id,
                'semester'=>$academic_year->semester,
            ]);
        }catch (\Exception $e){
            return  $this->goBack(Yii::$app->request->referrer);
        }
        }else{
            Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
            return  $this->goBack(Yii::$app->request->referrer);
        }
    }

    /**
     * Displays a single TblStudsResult model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('lecturer')){
            try{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
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
     * Creates a new TblStudsResult model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('lecturer')){
            try{
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
     * Updates an existing TblStudsResult model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('lecturer')){
            try{
            $model = $this->findModel($id);

            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }catch (\Exception $e){

            return  $this->goBack(Yii::$app->request->referrer);
        }
        }else
        {
            Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
            return  $this->goBack(Yii::$app->request->referrer);
        }
    }

/** Remove Selected Result Using Result ID */
    public function actionRemove(){

        if(Yii::$app->user->can('lecturer')){    

            if(Yii::$app->request->post('submit') ==='Signed') {

                try{
                    $selection = (array) Yii::$app->request->post('selection');
            if (null==((array)Yii::$app->request->post('selection'))) {
                Yii::$app->session->setFlash('error', 'Sorry!. Checkbox is not selected');
                return $this->redirect(['index']);
            }
    
            foreach ($selection as $item)   {
                $student= $this->findModel($item);
                $student->status=2;
                $student->save();
            }
    
            Yii::$app->session->setFlash('success', 'Successfully Removed The Selected Results');
            return $this->redirect(['index']);
               
            }catch (\Exception $e){
                return  $this->goBack(Yii::$app->request->referrer);
            }

            }elseif(Yii::$app->request->post('submit')==='remove'){

                try{
                    $selection = (array) Yii::$app->request->post('selection');
            if (null==((array)Yii::$app->request->post('selection'))) {
                Yii::$app->session->setFlash('error', 'Sorry!. Checkbox is not selected');
                return $this->redirect(['index']);
            }
    
            foreach ($selection as $item)   {
                $this->findModel($item)->delete();
            }
    
            Yii::$app->session->setFlash('success', 'Successfully Removed The Selected Results');
            return $this->redirect(['index']);
               
            }catch (\Exception $e){
                return  $this->goBack(Yii::$app->request->referrer);
            }
              
            }

        }else
        {
            Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
            return  $this->goBack(Yii::$app->request->referrer);
        }
        
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
        if(Yii::$app->user->can('lecturer')){    
            try{
            $this->findModel($id)->delete();
            Yii::$app->session->setFlash('success', 'Successfully Removed The Selected Results');
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




/** Downloading student course registered by lecturer */
public function actionDownload(){
    $valid=new Validate();

    /**Code Clean Up **/
   $course=  $valid->check_only_int ($_POST['course']);
   $semester= $valid->check_only_int ($_POST['semester']);
   $academic= $valid->check_only_int ($_POST['academic_year']);

   $reg_stud=TblStRegistration::find()
   ->andwhere(['courese_id'=>$course])
   ->andWhere(['acadamic_year'=>$academic])
   ->andWhere(['status'=>1])
   ->andWhere(['semester'=>$semester])
   ->all();

    // Instantiate a new PHPExcel object
    $objPHPExcel = new PHPExcel(); 
    // Set the active Excel worksheet to sheet 0
    $objPHPExcel->setActiveSheetIndex(0);
    // We fetch each database result row into $row in turn
    foreach($reg_stud as $key=>$row){ 
        // Set cell An to the "name" column from the database (assuming you have a column called name)
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$key, $row->stud->user->username); 
        // Set cell Bn to the "age" column from the database (assuming you have a column called age)
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$key, ''); 
        // Increment the Excel row counter 
    } 
    $objWriter  =   new PHPExcel_Writer_Excel2007($objPHPExcel);
    header('Content-Type: application/vnd.ms-excel'); //mime type
    header('Content-Disposition: attachment;filename="Students-Course-Registration.xlsx"'); //tell browser what's the file name
    header('Cache-Control: max-age=0'); //no cache
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
    $objWriter->save('php://output');

}


/* Uploading lecturer examination result*/
public function actionUpload(){

    if(Yii::$app->user->can('lecturer')){   
     try{
        $model=new TblStRegistration();
        // $model->file=UploadedFile::getInstance($model,'file');  
        $model->file=UploadedFile::getInstance($model,'file');  

        if(isset($model->file)){
        if(!file_exists(Url::to('uploads/'))){
            mkdir(Url::to('uploads/'),0777,true);
        }
        if($model->file !=null){
            $model->file->saveAs('uploads/'.time().$model->file);
        }
    }
        $inputFile='uploads/'.time().$model->file;
        $inputFileType= \PHPExcel_IOFactory::identify($inputFile);
        $objReader =    \PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($inputFile);

     }catch(\Exception $e){
        Yii::$app->session->setFlash('error', 'Upload Failed');
        return $this->goBack(Yii::$app->request->referrer);
     }
     $sheet = $objPHPExcel->getSheet(0);
     $highestRow = $sheet->getHighestRow();
     $highestColumn = $sheet->getHighestColumn();

     for($row =1; $row <= $highestRow; $row++){
         $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);
         if($row==1){
             continue;
         }
        
         try{
            $student= new TblStudsResult();

            $valid=new Validate();

            $user=User::find()->where(['username'=> $valid->check_only_int($rowData[0][0])])->one();

            $stud=TblStud::find()->where(['user_id'=>$user->id])->one();

            $academicYear=TblStudRegistYear::find()->where(['status'=>1])->one();

            //entrying new item that is not in the Item table  whiles importing to inventory table
            $total=($valid->check_only_int($rowData[0][1])+$valid->check_only_int($rowData[0][2]));
            $student->student_id=$stud->id;
            $student->course_id=1;
            $student->semester=1;
            $student->acadamic_year=$academicYear->id;
            $student->section_id=1;
            $student->class_marks=$valid->check_only_int($rowData[0][1]);
            $student->exams_marks=$valid->check_only_int($rowData[0][2]);
            $student->total_marks=$total;
            foreach(TblStudGrade::find()->all() as $grad){
                if($total >=$grad->from && $total <= $grad->to){
                    $student->grade_id=$grad->id;
                }
            }
            $student->status=1;
            $student->date_of_entry=date('Y-m-d');
            $student->course_lecture_id=Yii::$app->user->identity->id;
            $student->save();
         }catch(\Exception $e){

            Yii::$app->session->setFlash('error', 'Error');
            return  $this->goBack(Yii::$app->request->referrer);
         }
        
     }
     Yii::$app->session->setFlash('success', 'Successfully Uploaded Students Results');
     return  $this->goBack(Yii::$app->request->referrer);

    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    } 
    
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
        if(Yii::$app->user->can('lecturer')){
            try{
            if (($model = TblStudsResult::findOne($id)) !== null) {
                return $model;
            }

            throw new NotFoundHttpException('The requested page does not exist.');
        }catch (\Exception $e){

            return  $this->goBack(Yii::$app->request->referrer);
        }
        }else
        {
            Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
            return  $this->goBack(Yii::$app->request->referrer);
        }
    }
    
}

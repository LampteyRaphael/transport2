<?php

namespace frontend\modules\lecturer\controllers;

use common\models\TblCourse;
use common\models\TblCourseLecturer;
use common\models\TblLecturer;
use common\models\TblStaffList;
use common\models\TblStRegistration;
use common\models\TblStRegistrationSearch;
use common\models\TblStud;
use common\models\TblStudGrade;
use common\models\TblStudRegistYear;
use common\models\TblStudsResult;
use common\models\User;
use common\models\Validate;
use kartik\mpdf\Pdf;
use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Writer_Excel2007;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\UploadedFile;

class LecturerController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if(Yii::$app->user->can('lecturer')){
             try{
                $id=Yii::$app->user->identity->id;
                $model= TblStaffList::find()->where(['user_id'=>$id])->one();
                // $model1=TblLecturer::find()->where(['staff_id'=>$model->id])->one();
                $dataProvider=new ActiveDataProvider([
                    'query'=>TblCourseLecturer::find()->where(['lecturer_id'=>$model->id]),
                    'pagination'=>[
                        'pageSize'=>20,
                    ],
                    'sort'=>[
                        'defaultOrder'=>['id'=>SORT_ASC]
                    ]
                ]);
                return $this->render('index', [
                    'model' => $model,
                    // 'model1'=>$model1,
                    'dataProvider'=>$dataProvider
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


    public function actionCourses(){
        if(Yii::$app->user->can('lecturer')){
            // try{
        $id=Yii::$app->user->identity->id;
        $model= TblStaffList::find()->where(['user_id'=>$id])->one();
        // $model1=TblLecturer::find()->where(['staff_id'=>$model->id])->one();
        $dataProvider=new ActiveDataProvider([
            'query'=>TblCourseLecturer::find()->where(['lecturer_id'=>$model->id]),
            'pagination'=>[
                'pageSize'=>20,
            ],
            'sort'=>[
                'defaultOrder'=>['id'=>SORT_ASC]
            ]
        ]);
        return $this->render('course', [
            'model' => $model,
            // 'model1'=>$model1,
            'dataProvider'=>$dataProvider
        ]);
    // }catch (\Exception $e){

    //     return  $this->goBack(Yii::$app->request->referrer);
    // }
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    } 
    }


    public function actionView($id){
        if(Yii::$app->user->can('lecturer')){
            try{
        $searchModel = new TblStRegistrationSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andwhere(['status'=>2])->andwhere(['courese_id'=>$id]);
        return $this->render('view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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


    public function actionCourse($id){
        if(Yii::$app->user->can('lecturer')){
            try{
        $vote_record = TblStRegistration::find()
        ->andWhere(['level_id'=>Yii::$app->session->get('downloadLevel')])
        ->andWhere(['semester'=>Yii::$app->session->get('downloadsemester')])
        ->andWhere(['acadamic_year'=>Yii::$app->session->get('downloadacadamic')])
        ->andwhere(['courese_id'=>$id])->all();
       if($vote_record==[]){
            Yii::$app->session->setFlash('error', 'Class is empte');
            return $this->redirect(['result']);
       }else{


        $studID=User::find()->where(['username'=>20214830])->select('id')->one();

        $studentTID=TblStud::find()->where(['user_id'=>$studID->id])->select('id')->one();

        $registeredCourse=TblStRegistration::find()->where(['stud_Id'=>$studentTID->id])->one();

        $id=Yii::$app->user->identity->id;
        $model= TblStaffList::find()->where(['user_id'=>$id])->one();
        $model1=TblLecturer::find()->where(['staff_id'=>$model->id])->one();

        $result=new TblStudsResult();
        $result->student_id=$registeredCourse->stud_Id;
        $result->course_id= $registeredCourse->courese_id;
        $result->semester= $registeredCourse->semester;
        $result->section_id= $registeredCourse->section_id;
        $result->status=1;
        $result->marks= 1;
        $result->grade_id= 1;
        $result->date_of_entry=date('Y-m-d');
        $result->course_lecture_id=$model1->id;
        $result->save();
        
        Yii::$app->session->setFlash('success', 'Successfully Uploaded Students Results');
        return $this->redirect(['result']);
       }
    }catch (\Exception $e){

        return  $this->goBack(Yii::$app->request->referrer);
    }
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    } 
    
    }

    /** Upload Student Registered Courses Using Lecturer courese Id */
    public function actionResult(){
        if(Yii::$app->user->can('lecturer')){
             try{
        $id=Yii::$app->user->identity->id;
        $model= TblStaffList::find()->where(['user_id'=>$id])->one();
        $lecturer= TblCourseLecturer::find()->where(['lecturer_id'=>$model->id])->andWhere(['course_lecture_status_id'=>1])->all();   

        $academic_year=TblStudRegistYear::find()->where(['status'=>1])->one();

        return $this->render('result', [
            'model'=>new TblStRegistration(),
            'lecturer'=>$lecturer,
            'academic_year'=>$academic_year->id,
            'semester'=>$academic_year->semester,
        ]);
    }catch (\Exception $e){
        return $this->redirect(['result'.$e->getMessage()]);
        // return  $this->goBack(Yii::$app->request->referrer);
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
            Yii::$app->session->setFlash('error', 'Excel is not uploaded'.$e->getMessage());
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

                Yii::$app->session->setFlash('error', 'Error In Your Excel');
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


}




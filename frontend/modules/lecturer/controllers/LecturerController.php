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
use common\models\TblStudsResult;
use common\models\User;
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
                return $this->render('index', [
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

        // header("Content-type: application/csv");
        // header('Content-Disposition: attachment; filename="'. str_replace(" ", "_", strtolower('Students Registration')) . '_results.csv"');
        // header("Pragma: no-cache");
        // header("Expires: 0");
    
        // $handle = fopen('php://output', 'w');
        // if (count($vote_record) > 0) {
        //     fputcsv($handle, array('Students Name', 'Students ID', 'Student Marks'));
        //     foreach($vote_record as $st){
        //         fputcsv($handle, array($st->stud->personalDetails->first_name . ' ' . $st->stud->personalDetails->middle_name . ' ' . $st->stud->personalDetails->last_name ,$st->stud->user->username, ' ' ));
        //     }
        //     fclose($handle);
        //     exit;
        // }
        // ob_clean();
        // flush();
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

    public function actionResult(){
        if(Yii::$app->user->can('lecturer')){
            // try{
        $id=Yii::$app->user->identity->id;
        $model= TblStaffList::find()->where(['user_id'=>$id])->one();
        $lecC= TblCourseLecturer::find()->andwhere(['lecturer_id'=>$model->id])->all();

        $model=new TblCourse();
        
        return $this->render('result', [
             'model'=>new TblStRegistration(),
            // 'dataProvider'=>$dataProvider??'',
            'lecC'=>$lecC??''
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

/** Downloading student course registered by lecturer */
    public function actionDownload($id){
        $reg_stud=TblStRegistration::find()->where(['courese_id'=>$id])->all();
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



    public function actionUpload(){

        if(Yii::$app->user->can('lecturer')){
            
         try{
            $model=new TblStRegistration();
            $model->file=UploadedFile::getInstance($model,'file');  
            if($model->file !=null){
                $model->file->saveAs('uploads/'.time().$model->file);
            }
            $inputFile='uploads/'.time().$model->file;
            $inputFileType= \PHPExcel_IOFactory::identify($inputFile);
            $objReader =    \PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFile);

         }catch(\Exception $e){
            Yii::$app->session->setFlash('error', 'Excel is not uploaded');
            return $this->redirect(['result']);
         }
         $sheet = $objPHPExcel->getSheet(0);
         $highestRow = $sheet->getHighestRow();
         $highestColumn = $sheet->getHighestColumn();
 
         for($row =1; $row <= $highestRow; $row++){
             $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);
             if($row==1){
                 continue;
             }

               //entrying new item that is not in the Item table  whiles importing to inventory table
            $student= new TblStudsResult();

            $user=User::find()->where(['username'=>$rowData[0][0]])->select('id')->one();

            $stud=TblStud::find()->where(['user_id'=>$user->id])->one();

            $total=($rowData[0][1]+$rowData[0][2]);
            $student->student_id=$stud->id;
            $student->course_id=1;
            $student->semester=1;
            $student->section_id=1;
            $student->class_marks=$rowData[0][1];
            $student->exams_marks=$rowData[0][2];
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




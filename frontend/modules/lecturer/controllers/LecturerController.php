<?php

namespace frontend\modules\lecturer\controllers;

use common\models\TblCourse;
use common\models\TblCourseLecturer;
use common\models\TblLecturer;
use common\models\TblStaffList;
use common\models\TblStRegistration;
use common\models\TblStRegistrationSearch;
use common\models\TblStudsResult;
use kartik\mpdf\Pdf;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;

class LecturerController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if(Yii::$app->user->can('lecturer')){
        $id=Yii::$app->user->identity->id;
        $model= TblStaffList::find()->where(['user_id'=>$id])->one();
        $model1=TblLecturer::find()->where(['staff_id'=>$model->id])->one();
        $dataProvider=new ActiveDataProvider([
            'query'=>TblCourseLecturer::find()->where(['lecturer_id'=>$model1->id]),
            'pagination'=>[
                'pageSize'=>20,
            ],
            'sort'=>[
                'defaultOrder'=>['id'=>SORT_ASC]
            ]
        ]);
        return $this->render('index', [
            'model' => $model,
            'model1'=>$model1,
            'dataProvider'=>$dataProvider
        ]);
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    } 
    }


    public function actionCourses(){
        if(Yii::$app->user->can('lecturer')){
        $id=Yii::$app->user->identity->id;
        $model= TblStaffList::find()->where(['user_id'=>$id])->one();
        $model1=TblLecturer::find()->where(['staff_id'=>$model->id])->one();
        $dataProvider=new ActiveDataProvider([
            'query'=>TblCourseLecturer::find()->where(['lecturer_id'=>$model1->id]),
            'pagination'=>[
                'pageSize'=>20,
            ],
            'sort'=>[
                'defaultOrder'=>['id'=>SORT_ASC]
            ]
        ]);
        return $this->render('course', [
            'model' => $model,
            'model1'=>$model1,
            'dataProvider'=>$dataProvider
        ]);
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    } 
    }


    public function actionView($id){
        if(Yii::$app->user->can('lecturer')){
        $searchModel = new TblStRegistrationSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andwhere(['status'=>2])->andwhere(['courese_id'=>$id]);
        return $this->render('view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    } 
    }


    public function actionCourse($id){
        if(Yii::$app->user->can('lecturer')){
        $vote_record = TblStRegistration::find()
        ->andWhere(['level_id'=>Yii::$app->session->get('downloadLevel')])
        ->andWhere(['semester'=>Yii::$app->session->get('downloadsemester')])
        ->andWhere(['acadamic_year'=>Yii::$app->session->get('downloadacadamic')])
        ->andwhere(['courese_id'=>$id])->all();

       if($vote_record==empty(array())){

        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');

       }
        
        header("Content-type: application/csv");
        header('Content-Disposition: attachment; filename="'. str_replace(" ", "_", strtolower('Students Registration')) . '_results.csv"');
        header("Pragma: no-cache");
        header("Expires: 0");
    
        $handle = fopen('php://output', 'w');
        if (count($vote_record) > 0) {
            fputcsv($handle, array('Students Name', 'Students ID', 'Student Marks'));
            foreach($vote_record as $st){
                fputcsv($handle, array($st->stud->personalDetails->first_name . ' ' . $st->stud->personalDetails->middle_name . ' ' . $st->stud->personalDetails->last_name ,$st->stud->user->username, ' ' ));
            }
            fclose($handle);
            exit;
        }
        ob_clean();
        flush();
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    } 
    
    }

    public function actionResult(){
        if(Yii::$app->user->can('lecturer')){
        $id=Yii::$app->user->identity->id;
        $models= TblStaffList::find()->where(['user_id'=>$id])->one();
        $model1=TblLecturer::find()->where(['staff_id'=>$models->id])->one();


        $dataProvider=new ActiveDataProvider([
            'query'=>TblCourseLecturer::find()
            ->andwhere(['lecturer_id'=>$model1->id]),
            // ->andWhere(['acadamic_year'=>$_POST['TblCourse']['acadamic_year']]),
            'pagination'=>[
                'pageSize'=>20,
            ],
            'sort'=>[
                'defaultOrder'=>['id'=>SORT_ASC]
            ]
        ]);


            $model=new TblCourse();
        if ($model->load(Yii::$app->request->post())) {
        
            $dataProvider=new ActiveDataProvider([
                'query'=>TblCourseLecturer::find()
                ->andwhere(['lecturer_id'=>$model1->id]),
                //->andWhere(['acadamic_year'=>$_POST['TblCourse']['acadamic_year']]),
                'pagination'=>[
                    'pageSize'=>20,
                ],
                'sort'=>[
                    'defaultOrder'=>['id'=>SORT_ASC]
                ]
            ]);
            Yii::$app->session->set('downloadLevel',$_POST['TblCourse']['level_id']);
            Yii::$app->session->set('downloadsemester',$_POST['TblCourse']['semester']);
            Yii::$app->session->set('downloadacadamic',$_POST['TblCourse']['acadamic_year']);
            return $this->render('result', [
                'model' => $model,
                'model1'=>$model1,
                'dataProvider'=>$dataProvider,
            ]);

        }
        return $this->render('result', [
            'model'=>$model,
            'dataProvider'=>$dataProvider??'',
        ]);
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    } 
    }



    public function actionUpload(){
        if(Yii::$app->user->can('lecturer')){

        try{
            $model=new TblStudsResult();
            $model->file=UploadedFile::getInstance($model,'file');  
            if($model->file !=null){
                $model->file->saveAs('uploads/'.$model->file.''.$model->file->extension);
                $inputFile='uploads/'.$model->file;
            }
             $inputFileType= \PHPExcel_IOFactory::identify($inputFile);
             $objReader =    \PHPExcel_IOFactory::createReader($inputFileType);
             $objPHPExcel = $objReader->load($inputFile);
         }catch(\Exception $e){
             die('Error');
         }
         $sheet = $objPHPExcel->getSheet(0);
         $highestRow = $sheet->getHighestRow();
         $highestColumn = $sheet->getHighestColumn();
         
         for($row =1; $row <= $highestRow; $row++){
             $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);
             if($row==1){
                 continue;
             }

             var_dump($rowData[0][2]);
             die;
             //entrying new item that is not in the Item table  whiles importing to inventory table
            // $item1= new Item();
            // $item1->name=$rowData[0][0];
            // $item1->save();
            //return   print_r($item->getErrors());
         }
        }else
        {
            Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
            return  $this->goBack(Yii::$app->request->referrer);
        } 
        
    }


}




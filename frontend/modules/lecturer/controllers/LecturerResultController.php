<?php

namespace frontend\modules\lecturer\controllers;

use common\models\TblCourse;
use common\models\TblCourseLecturer;
use common\models\TblLecturer;
use common\models\TblStaffList;
use common\models\TblStRegistration;
use Yii;


class LecturerResultController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if(Yii::$app->user->can('lecturer')){
            try{
                $id=Yii::$app->user->identity->id;
                $model= TblStaffList::find()->where(['user_id'=>$id])->one();
                $model1=TblLecturer::find()->where(['staff_id'=>$model->id])->one();
                $model2=TblCourseLecturer::find()->where(['lecturer_id'=>$model1->id])->all();
                $courseLecture=TblCourse::find()->where(['id'=>$model2])->all();
                $model=new TblCourse();

                if ($model->load(Yii::$app->request->post())) {

                    $courses=TblStRegistration::find()->andwhere(['status'=>2])
                    ->andwhere(['courese_id'=>$_POST['TblCourse']['courseName']])
                    ->andwhere(['section_id'=>$_POST['TblCourse']['section_id']])
                    ->andwhere(['semester'=>$_POST['TblCourse']['semester']])
                    ->andwhere(['level_id'=>$_POST['TblCourse']['level_id']])
                    ->andwhere(['acadamic_year'=>$_POST['TblCourse']['acadamic_year']]);

                    $registeredCourses=$courses->count();
                    $a=$courses->one();
                    $courseN=$a->courese->courseName??'';
                    $courseC=$a->courese->course_number??'';
                    $ids=$a->courese->id??'';
                
                    return $this->render('index', [
                        'model'=>$model,
                        'courseLecture'=>$courseLecture,
                        'registeredCourses'=>$registeredCourses,
                        'courseN'=>$courseN,
                        'courseC'=>$courseC,
                        'ids'=>$ids,
                    ]);
                }
                return $this->render('index',[
                    'model'=>$model,
                    'courseLecture'=>$courseLecture,
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


    public function actionView(){
        if(Yii::$app->user->can('lecturer')){
            try{
            //$vote_record = TblStRegistration::find()->andwhere(['courese_id'=>$_POST['courseID']])->all();
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

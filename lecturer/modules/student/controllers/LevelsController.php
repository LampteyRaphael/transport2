<?php

namespace lecturer\modules\student\controllers;

use backend\modules\students\models\TblCourse;
use frontend\modules\student\models\TblStRegistration;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `student` module
 */
class LevelsController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model = new TblCourse();
        return $this->render('index', [
            'model' => $model,        
        ]);
    }


    public function actionCreate(){

        // $modelc = new TblCourse();
        $levels = $_POST['TblCourse']['level'];
        $semester = $_POST['TblCourse']['semester'];
         $model = new TblStRegistration();
        // if ($model->load(Yii::$app->request->post())) {
              $course = TblCourse::find()->where(['level'=>$levels])->andWhere(['semester'=>$semester])->all();
              $courser = TblStRegistration::find()->where(['stud_Id'=>Yii::$app->user->identity->student0->id])->andWhere(['status'=>2])->all();

                return $this->render('create', [
                    'model' => $model,
                    'levels'=>$levels,
                    'semesters'=>$semester,
                    'course'=> $course,
                    'courser'=> $courser,
                ]);
        // }
    }


    public function actionDelete($id)
    {
        $registered = TblStRegistration::find()->where(['id'=>$id])->one();
        $registered->delete();

        return $this->redirect(['index']);
    }

}

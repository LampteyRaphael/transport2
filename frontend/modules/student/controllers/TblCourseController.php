<?php

namespace frontend\modules\student\controllers;

use common\models\TblCourse;
use common\models\TblCourseSearch;
use common\models\TblStRegistration;
use common\models\TblStRegistrationSearch;
use common\models\TblStud;
use common\models\TblStudAcadamicYear;
use Exception;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * TblCourseController implements the CRUD actions for TblCourse model.
 */
class TblCourseController extends Controller
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
     *  Select Courses Registered with the status 1
     *  fronm the students course registrationn
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('student')){
            // try{
    $userId=TblStud::find()->where(['user_id'=>Yii::$app->user->identity->id])->one();
    // if(!empty(Yii::$app->request->post('selection'))){
    $selection = (array) Yii::$app->request->post('selection') ;
     foreach($selection as $item){
        $course= TblCourse::find()->where(['id'=>$item])->one();
        $student= new TblStRegistration();
        $student->stud_Id=$userId->id;
        $student->program_id=$course->program_id;
        $student->acadamic_year=1;
        $student->semester=$course->semester;
        $student->section_id=$course->section_id;
        $student->date_o_regis=date('Y-m-d');
        $student->level_id=$course->level_id;
        $student->courese_id=$course->id;
        $student->status=1;
        $student->save();
     };
     
        // if (null==((array)Yii::$app->request->post('selection'))) {
        //     Yii::$app->session->setFlash('error', 'Sorry!. Checkbox is not selected');
        //     return $this->redirect(['index']);
        // }

    // }
      
        $searchModel = new TblCourseSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andwhere(['level_id'=>$_POST['level_id']??''])
        // ->andwhere(['semester'=>$_POST['semester']??''])
        // ->andwhere(['section_id'=>$_POST['section']??''])
        // ->andWhere(['program_id'=>$userId->program->program->id])
            ->all();


       $searchModel = new TblStRegistrationSearch();
       $select= $searchModel->search($this->request->queryParams);
       $select->query->andWhere(['stud_Id'=>$userId->id])->andWhere(['status'=>1])
    //    ->andWhere(['program_id'=>$userId->program->program->id])
       ->all();


        $select1=TblStRegistration::find()->andWhere(['stud_Id'=>$userId->id])->andWhere(['status'=>1])
    //    ->andWhere(['program_id'=>$userId->program->program->id])
       ->count();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'data' => $select,
            'dataCount'=>$select1,
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


    public function actionApproved(){
        if(Yii::$app->user->can('student')){
        if(!empty(Yii::$app->request->post('selection'))){
            $selection = (array) Yii::$app->request->post('selection') ;
             foreach($selection as $item){
                $courseSelected=TblStRegistration::findOne($item);
                $courseSelected->status=2;
                $courseSelected->save();
             };
             return $this->redirect(['index']);
            
            }
        }else
        {
            Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
            return  $this->goBack(Yii::$app->request->referrer);
        } 
    }

    /**
     * Displays a single TblCourse model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('student')){
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
     * Creates a new TblCourse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('student')){
            $model = new TblCourse();
            $courses=null;
            $userId=TblStud::find()->where(['user_id'=>Yii::$app->user->identity->id])->one();
            $acadamic=$_POST['TblCourse']['acadamic_year']??'';
            $acadamicYear=TblStudAcadamicYear::find()->where(['id'=>$acadamic])->one();
         if ($this->request->isPost) {
            if ($model->load($this->request->post()) ) {
                 if(!empty($acadamicYear)){
                    $level=$_POST['TblCourse']['level_id'];
                    $semester=$_POST['TblCourse']['semester'];
                    $section=$_POST['TblCourse']['section_id'];
                    $courses=TblCourse::find()->andwhere(['level_id'=>$level])
                    ->andwhere(['semester'=>$semester])
                    ->andwhere(['section_id'=>$section])
                    ->andWhere(['program_id'=>$userId->program->program->id]);
                    return $this->render('create', [
                        'model' => $model,
                        'courses' => $courses,
                        'acadamic'=>$acadamic
                    ]);
                 }               
            }
        } else {
            $model->loadDefaultValues();
        }
        return $this->render('create', [
            'model' => $model,
            'courses' => $courses,
            'acadamic'=>$acadamicYear
        ]);
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    } 
    }


    /* Student Courses Registration using 
       Level_id
       Secton_id
       semester id
       acadamic year
    */
    public function actionRegistration()
    {
        if(Yii::$app->user->can('student')){
        if(isset($_POST['course']))
        {
               try {
                    $userId=TblStud::find()->where(['user_id'=>Yii::$app->user->identity->id])->one();
                    foreach($_POST['course'] as $course)
                    {
                        $student= new TblStRegistration();
                        $student->stud_Id=$userId->id;
                        $student->program_id=$_POST['program'];
                        $student->acadamic_year=$_POST['acadamic'];
                        $student->semester=$_POST['semester'];
                        $student->section_id=$_POST['section'];
                        $student->date_o_regis=date('Y-m-d');
                        $student->level_id=$_POST['level'];
                        $student->courese_id=$course;
                        $student->status=1;
                        $student->save();
                    }
                    Yii::$app->session->setFlash('success', 'Successfully Registered Courses');
                    return $this->redirect(['/student/tbl-course/create']);

            } catch (Exception $e) {
                Yii::$app->session->setFlash('error', 'Error!! something went wrong');
                return $this->redirect(['create']);
            }
        }

    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    } 
    


    }

    /**
     * Updates an existing TblCourse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('student')){
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
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
     * Deletes an existing TblCourse model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('student')){
            $courseSelected=TblStRegistration::findOne($id);
            $courseSelected->delete();
            return $this->redirect(['index']);
        }else
        {
            Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
            return  $this->goBack(Yii::$app->request->referrer);
        } 
    }

    /**
     * Finds the TblCourse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return TblCourse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if(Yii::$app->user->can('student')){
            if (($model = TblCourse::findOne($id)) !== null) {
                return $model;
            }
        }else
        {
            Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
            return  $this->goBack(Yii::$app->request->referrer);
        } 
    }
}

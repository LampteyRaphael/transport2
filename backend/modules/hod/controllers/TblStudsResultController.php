<?php

namespace backend\modules\hod\controllers;

use common\models\TblStudGrade;
use common\models\TblStudsResult;
use common\models\TblStudsResultSearch;
use common\models\Validate;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        $searchModel = new TblStudsResultSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andWhere(['status'=>2])->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblStudsResult model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblStudsResult model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
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
            $model = $this->findModel($id);
            $result=new TblStudsResult();
            $validate=new Validate();
        if ($this->request->isPost && $model->load($this->request->post())) {
            $total=$validate->check_only_int($_POST['TblStudsResult']['class_marks'])+$validate->check_only_int($_POST['TblStudsResult']['exams_marks']);
            $model->class_marks=$validate->check_only_int($_POST['TblStudsResult']['class_marks']);
            $model->exams_marks=$validate->check_only_int($_POST['TblStudsResult']['exams_marks']);
            foreach(TblStudGrade::find()->all() as $grad){
                if($total >=$grad->from && $total <= $grad->to){
                    $model->grade_id=$grad->id;
                }
            }
            $model->total_marks=$total;
            $model->save();
            Yii::$app->session->setFlash('success','Successfully change student Result');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /** Remove Selected Result Using Result ID */
    public function actionResult(){

        if(Yii::$app->user->can('hod')){    
            try{
                $selection = (array) Yii::$app->request->post('selection');
        if (null==((array)Yii::$app->request->post('selection'))) {
            Yii::$app->session->setFlash('error', 'Sorry!. Checkbox is not selected');
            return $this->redirect(['index']);
        }

        foreach ($selection as $item)   {
            $status=$this->findModel($item);
            $status->status=3;
            $status->save();
        }

        Yii::$app->session->setFlash('success', 'Successfully Posted Results To Dean');
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

    /**
     * Deletes an existing TblStudsResult model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
        if (($model = TblStudsResult::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

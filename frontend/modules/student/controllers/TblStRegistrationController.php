<?php

namespace frontend\modules\student\controllers;

use common\models\TblStRegistration;
use common\models\TblStRegistrationSearch;
use common\models\TblStud;
use common\models\TblStudsResultSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * TblStRegistrationController implements the CRUD actions for TblStRegistration model.
 */
class TblStRegistrationController extends Controller
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
     * Lists all TblStRegistration models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('student')){
        try{
        $id=Yii::$app->user->identity->id;
        
        $studId=TblStud::find()->where(['user_id'=>$id])->one();

        if(isset($_POST['semester']) && $_POST['level_id']){
            $searchModel = new TblStRegistrationSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);
            $dataProvider->query->andwhere(['status'=>2])->andwhere(['stud_Id'=>$studId->id])
            ->andWhere(['level_id'=>$_POST['level_id']])->andWhere(['semester'=>$_POST['semester']]);
            
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        $searchModel = new TblStRegistrationSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andwhere(['status'=>2])->andwhere(['stud_Id'=>$studId->id]);

        return $this->render('index', [
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


    public function actionResult(){
         if(Yii::$app->user->can('student')){
    try{
        $id=Yii::$app->user->identity->id;
        $studId=TblStud::find()->where(['user_id'=>$id])->one();
        $searchModel = new TblStudsResultSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andwhere(['student_id'=>$studId->id]);

        return $this->render('result', [
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

    /**
     * Displays a single TblStRegistration model.
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
     * Creates a new TblStRegistration model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('student')){
        $model = new TblStRegistration();

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
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    } 
    }
    





    /**
     * Updates an existing TblStRegistration model.
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
     * Deletes an existing TblStRegistration model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('student')){
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    } 
    }

    /**
     * Finds the TblStRegistration model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return TblStRegistration the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if(Yii::$app->user->can('student')){
        if (($model = TblStRegistration::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    } 
    }
}

<?php

namespace backend\modules\user\controllers;

use common\models\TblUserSearch;
use common\models\User;
use Exception;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

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

    /**
     * Lists all TblUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('user-admin')){

            $searchModel = new TblUserSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
            
        }else
        {
            Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
          return  $this->goBack(Yii::$app->request->referrer);
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
        return $this->render('user-admin', [
            'model' => $this->findModel($id),
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

            if ($model->load(Yii::$app->request->post())){
                if ($model->validate()){
                    $model->username=$_POST['User']['username'];
                    $model->email=$_POST['User']['email'];
                    $model->role_id=$_POST['User']['role_id'];
                    $model->password_hash = $model->setPassword($_POST['User']['password_hash']);
                    $model->status = $_POST['User']['status'];
                    $model->auth_key=$model->generateAuthKey();
                    if ($model->save()){
                        Yii::$app->getSession()->setFlash('success','Successfully Posted');
                        return  $this->redirect('index');
                    }
                }
            }

            return $this->render('create', [
                'model' => $model,
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
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('user-admin')){

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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

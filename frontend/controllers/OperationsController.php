<?php

namespace frontend\controllers;

use Yii;
use common\models\Operations;
use common\models\OperationsSearch;
use Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OperationsController implements the CRUD actions for Operations model.
 */
class OperationsController extends Controller
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
     * Lists all Operations models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OperationsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Operations model.
     * @param integer $id
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
     * Creates a new Operations model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // public function actionCreate()
    // {
    //     try{
    //         $model = new Operations();
    //     if ($model->load(Yii::$app->request->post())) {
           
    //         $model->driver_id=Yii::$app->user->identity->id;
    //         // $model->vehicle_id=$_POST['Operations']['vehicle_id'];
    //         // $model->trip_type=$_POST['Operations']['trip_type'];
    //         // $model->trip_start_location=$_POST['Operations']['trip_start_location'];
    //         // $model->trip_end_location=$_POST['Operations']['trip_end_location'];
    //         $model->trip_id='3';
    //         // $model->start_date=$_POST['Operations']['start_date'];
    //         // $model->end_date=$_POST['Operations']['end_date'];
    //         // $model->departureMileage=$_POST['Operations']['departureMileage'];
    //         $model->officerAssigned=Yii::$app->user->identity->id;
    //         // $model->amount=$_POST['Operations']['amount'];
            
    //         $model->save();
    //         return $this->redirect(['create']);
    //     }

    //     }catch(Exception $e){
    //         var_dump($e->getMessage());
    //     }

    //     return $this->render('create', [
    //         'model' => $model,
    //     ]);

    // }

    public function actionCreate()
    {
        try{
        $model = new Operations();
        if ($model->load(Yii::$app->request->post())) 
        {
            $model->officerAssigned=Yii::$app->user->identity->id??'';
            // $model->driver_id=Yii::$app->user->identity->id??'';
           
           if($model->save()){
            Yii::$app->session->setFlash('success','Booking Saved');
            return $this->redirect(['index']);
           };
        }
    }catch(Exception $e)
    {
        var_dump($e->getMessage());
    }
    return $this->render('create', [
        'model' => $model,
    ]);
}


    /**
     * Updates an existing Operations model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Operations model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Operations model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Operations the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Operations::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

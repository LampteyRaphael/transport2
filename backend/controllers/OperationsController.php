<?php

namespace backend\controllers;

use Yii;
use common\models\Operations;
use common\models\OperationsSearch;
use common\models\Repairs;
use common\models\Servicings;
use common\models\Vehicles;
use common\models\Insurance;
use common\models\RoadWorthy;
use common\models\AccidentRecords;
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
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id=null)
    {
    //     if(isset($_POST['expandRowKey'])) { 
    //         $model = $this->findModel($_POST['expandRowKey']);   
    //        return $this->renderPartial('view.php',['model'=>$model]);
    $model =  Operations::findOne($id);
    $status= $model->trip->name;
    $vehicle=Vehicles::findOne($model->vehicle_id);
    $vehicleService=Servicings::find()->where(['vehicle_id'=>$model->vehicle_id])->all();

    $vehicleRepairs=Repairs::find()->where(['vehicle_id'=>$model->vehicle_id])->all();

    $trips=Operations::find()->where(['vehicle_id'=>$model->vehicle_id])->all();

    $insurance=Insurance::find()->where(['vehicle_id'=>$model->vehicle_id])->all();

    $worthy=RoadWorthy::find()->where(['vehicle_id'=>$model->vehicle_id])->all();

    $accident=AccidentRecords::find()->where(['vehicle_id'=>$model->vehicle_id])->all();

    return $this->render('view', [
        'status' => $status,
        'model'=> $vehicle,
        'vehicleService'=>$vehicleService,
        'vehicleRepairs'=>$vehicleRepairs,
        'trips'=>$trips,
        'id'=>$id,
        'insurance'=>$insurance,
        'worthy'=>$worthy,
        'accident'=> $accident
    ]);
    }

    /**
     * Creates a new Operations model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Operations();
        if ($model->load(Yii::$app->request->post())) {
            $model->officerAssigned=Yii::$app->user->identity->id??'';
            $model->save();

            Yii::$app->session->setFlash('success','Booking Saved');
            return $this->redirect(['index']);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Operations model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success','Trip Status Successfully Change');
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Operations model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success','Trip Deleted');
        return $this->redirect(['index']);
    }

    /**
     * Finds the Operations model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
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

    public function actionOperation($id){

        $model =  Operations::findOne($id);
        if ($model) {
            $model->arrivalMileage='200000';
            $model->assignmentCompletionTime=date('Y-m-d H:i');
            $model->save();
            return $this->redirect(['index']);
        }
    }


}

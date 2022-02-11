<?php

namespace backend\controllers;

use common\models\Operations;
use common\models\Repairs;
use Yii;
use common\models\Servicings;
use common\models\ServicingsSearch;
use common\models\Vehicles;
use common\models\Insurance;
use common\models\RoadWorthy;
use common\models\AccidentRecords;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ServicingsController implements the CRUD actions for Servicings model.
 */
class ServicingsController extends Controller
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
     * Lists all Servicings models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ServicingsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Servicings model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id=null)
    {
 
    $model = $this->findModel($id);

    $vehicle=Vehicles::findOne($model->vehicle_id);

    $vehicleService=Servicings::find()->where(['vehicle_id'=>$model->vehicle_id])->all();

    $vehicleRepairs=Repairs::find()->where(['vehicle_id'=>$model->vehicle_id])->all();

    $trips=Operations::find()->where(['vehicle_id'=>$model->vehicle_id])->all();

    $insurance=Insurance::find()->where(['vehicle_id'=>$model->vehicle_id])->all();

    $worthy=RoadWorthy::find()->where(['vehicle_id'=>$model->vehicle_id])->all();

    $accident=AccidentRecords::find()->where(['vehicle_id'=>$model->vehicle_id])->all();
  
    return $this->render('view', [
        'model' => $model,
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
     * Creates a new Servicings model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Servicings();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success','Successfully Saved');
            return $this->redirect(['index', 'id' => $model->id]);

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Servicings model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success','Successfully Updated');

            return $this->redirect(['index', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Servicings model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success','Successfully Deleted');

        return $this->redirect(['index']);

    }

    /**
     * Finds the Servicings model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Servicings the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Servicings::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionServiced($id){

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('served', [
            'model' => $model,
        ]);

    }




}

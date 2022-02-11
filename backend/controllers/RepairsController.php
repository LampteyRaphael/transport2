<?php

namespace backend\controllers;

use common\models\Operations;
use Yii;
use common\models\Repairs;
use common\models\RepairsSearch;
use common\models\Servicings;
use common\models\Vehicles;
use common\models\Insurance;
use common\models\RoadWorthy;
use common\models\AccidentRecords;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RepairsController implements the CRUD actions for Repairs model.
 */
class RepairsController extends Controller
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
     * Lists all Repairs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RepairsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Repairs model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id=null)
    {
    //     if(isset($_POST['expandRowKey'])) { 
    //         $model = Repairs::findOne($_POST['expandRowKey']);  
    //        return $this->renderPartial('view.php',['model'=>$model]);  
    //   }

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
        'insurance'=>$insurance,
        'worthy'=>$worthy,
        'accident'=> $accident,
        'id'=>$id,
    ]);
    }

    /**
     * Creates a new Repairs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Repairs();

        if ($model->load(Yii::$app->request->post()))
        {
            
        //    $description= $_POST['Repairs']['description'];
        //    foreach($description as $item){
        //         $model->description=$item;
        //     }

           $model->save();
           Yii::$app->session->setFlash('success','Successfully Saved');
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Repairs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success','Successfully Updated');

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Repairs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
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
     * Finds the Repairs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Repairs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Repairs::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionRepairs($id){

        $model =  Repairs::findOne($id);
        if ($model) {
            $model->dateReturned=date('Y-m-d');
            $model->save();
            return $this->redirect(['index']);
        }
    }
}

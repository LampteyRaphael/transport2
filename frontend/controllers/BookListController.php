<?php

namespace frontend\controllers;

use common\models\Operations;
use common\models\OperationsSearch;
use Yii;
use common\models\Repairs;
use common\models\Servicings;
use common\models\Vehicles;
use DateTime;
use Exception;

class BookListController extends \yii\web\Controller
{
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
        $model = $this->findModel($id);

        $vehicle=Vehicles::findOne($model->vehicle_id);
    
        $vehicleService=Servicings::find()->where(['vehicle_id'=>$model->vehicle_id])->all();
    
        $vehicleRepairs=Repairs::find()->where(['vehicle_id'=>$model->vehicle_id])->all();
    
        $trips=Operations::find()->where(['vehicle_id'=>$model->vehicle_id])->all();
      
        return $this->render('view', [
            'model' => $model,
            'model'=> $vehicle,
            'vehicleService'=>$vehicleService,
            'vehicleRepairs'=>$vehicleRepairs,
            'trips'=>$trips
        ]);
    
    }


    public function actionCreate()
    {
    
        $model = new Operations();
        if ($model->load(Yii::$app->request->post())) {
            try{
            $model->driver_id=Yii::$app->user->identity->id;
            $model->vehicle_id=$_POST['Operations']['vehicle_id'];
            $model->trip_type=$_POST['Operations']['trip_type'];
            $model->trip_start_location=$_POST['Operations']['trip_start_location'];
            $model->trip_end_location=$_POST['Operations']['trip_end_location'];
            $model->trip_id=1;
            $model->start_date=$_POST['Operations']['start_date'];
            $model->end_date=$_POST['Operations']['end_date'];
            $model->departureMileage=$_POST['Operations']['departureMileage'];
            $model->officerAssigned=Yii::$app->user->identity->id;
            $model->amount=$_POST['Operations']['amount'];
            $model->save();

        }catch(\Exception $e){
            var_dump($e->getMessage());
        }


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
            return $this->redirect(['view', 'id' => $model->id]);
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

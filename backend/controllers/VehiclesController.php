<?php

namespace backend\controllers;

use Yii;
use common\models\Vehicles;
use common\models\VehiclesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\UploadedFile;
use common\models\Operations;
use common\models\Repairs;
use common\models\Servicings;
use common\models\Insurance;
use common\models\RoadWorthy;
use common\models\AccidentRecords;
/**
 * VehiclesController implements the CRUD actions for Vehicles model.
 */
class VehiclesController extends Controller
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
     * Lists all Vehicles models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VehiclesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Vehicles model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
            $model = $this->findModel($id);

            $vehicle=Vehicles::findOne($model->id);

            $vehicleService=Servicings::find()->where(['vehicle_id'=>$model->id])->all();

            $vehicleRepairs=Repairs::find()->where(['vehicle_id'=>$model->id])->all();

            $trips=Operations::find()->where(['vehicle_id'=>$model->id])->all();

            $insurance=Insurance::find()->where(['vehicle_id'=>$model->id])->all();

            $worthy=RoadWorthy::find()->where(['vehicle_id'=>$model->id])->all();

            $accident=AccidentRecords::find()->where(['vehicle_id'=>$model->id])->all();

            return $this->render('view', [
                'model' => $model,
                'vehicleService'=>$vehicleService,
                'vehicleRepairs'=>$vehicleRepairs,
                'trips'=>$trips,
                'insurance'=>$insurance,
                'worthy'=>$worthy,
                'accident'=>$accident,
            ]);
      }  

      /* Saving Applicant's Personal Photo */
protected  function applicantPhoto($imageFile, $model)
{
        if(isset($imageFile->size))
        {
            if(!file_exists(Url::to('images/')))
            {
                mkdir(Url::to('@webfront/application/images/'),0777,true);
            }
            $fileName =(time().$imageFile->baseName.$imageFile->extension);
            $imageName=Url::to('@webfront/application/images/').$fileName;
            $imageFile->saveAs($imageName);
            return  $imageName; 
        }
      
}

    /**
     * Creates a new Vehicles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        try{
        $model = new Vehicles();

        if ($model->load(Yii::$app->request->post())) 
        {
             $imageFile = UploadedFile::getInstance($model, 'file');
             $fileName =(time().$imageFile->baseName.$imageFile->extension);
            if(isset($imageFile->size))
            {
                if(!file_exists(('images/')))
                {
                    mkdir(('images/'),0777,true);
                }
                $imageName=('images/').$fileName;
                $imageFile->saveAs($imageName);
                $model->file=$fileName;
            }
               $model->make=$_POST['Vehicles']['make'];
               $model->regNo=$_POST['Vehicles']['regNo'];
               $model->chasisNo=$_POST['Vehicles']['chasisNo'];
               $model->engine_no=$_POST['Vehicles']['engine_no'];
               $model->vehicle_id=$_POST['Vehicles']['vehicle_id'];
               $model->status=$_POST['Vehicles']['status'];
               $model->yearMade=$_POST['Vehicles']['yearMade'];
               $model->purchaseDate=$_POST['Vehicles']['purchaseDate'];
               $model->colour=$_POST['Vehicles']['colour'];
               $model->countryOfOrigin=$_POST['Vehicles']['countryOfOrigin'];
               $model->cubicCentimeter=$_POST['Vehicles']['cubicCentimeter'];
               $model->fuel=$_POST['Vehicles']['fuel'];
               $model->no_passengers=$_POST['Vehicles']['no_passengers'];
               
               $model->save();


                 // assigning permission to registered users
                //  foreach($_POST['User']['name'] as $roles){
                //     $newPermission=new AuthAssignment();
                //     $newPermission->user_id=$userID;
                //     $newPermission->item_name=$roles;
                //     $newPermission->save();
                //   }
            
                Yii::$app->session->setFlash('success', 'Successfully Created');
                return  $this->redirect(['index']); 
            
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }catch(\Exception $e){

        var_dump($e->getMessage());
    }
    }

    /**
     * Updates an existing Vehicles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $imageFile = UploadedFile::getInstance($model, 'file');
           
           if(isset($imageFile->size))
           {
               $fileName =(time().$imageFile->baseName.$imageFile->extension);
               if(!file_exists(('images/')))
               {
                   mkdir(('images/'),0777,true);
               }
               $imageName=('images/').$fileName;
               $imageFile->saveAs($imageName);
               $model->file=$fileName;
           }
              $model->make=$_POST['Vehicles']['make'];
              $model->regNo=$_POST['Vehicles']['regNo'];
              $model->chasisNo=$_POST['Vehicles']['chasisNo'];
              $model->engine_no=$_POST['Vehicles']['engine_no'];
              $model->vehicle_id=$_POST['Vehicles']['vehicle_id'];
              $model->status=$_POST['Vehicles']['status'];
              $model->yearMade=$_POST['Vehicles']['yearMade'];
              $model->purchaseDate=$_POST['Vehicles']['purchaseDate'];
              $model->colour=$_POST['Vehicles']['colour'];
              $model->countryOfOrigin=$_POST['Vehicles']['countryOfOrigin'];
              $model->cubicCentimeter=$_POST['Vehicles']['cubicCentimeter'];
              $model->fuel=$_POST['Vehicles']['fuel'];
              $model->no_passengers=$_POST['Vehicles']['no_passengers'];
              
              $model->save();
              Yii::$app->session->setFlash('success','Successfully Updated');
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Vehicles model.
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
     * Finds the Vehicles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Vehicles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Vehicles::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

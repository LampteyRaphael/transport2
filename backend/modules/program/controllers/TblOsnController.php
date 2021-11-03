<?php

namespace backend\modules\program\controllers;

use common\models\TblOsn;
use Yii;
use common\models\TblOsnSearch;
use common\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TblOsnController implements the CRUD actions for TblOsn model.
 */
class TblOsnController extends Controller
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
     * Lists all TblOsn models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('osn permission')){
            $user=new User();
        $searchModel = new TblOsnSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=>$user
        ]);
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    } 
    }


    public function actionUpload(){
        if(Yii::$app->user->can('lecturer')){
            
            try{
               $model=new User();
               $model->file=UploadedFile::getInstance($model,'file');  
               if($model->file !=null){
                   $model->file->saveAs('uploads/'.time().$model->file);
               }
               $inputFile='uploads/'.time().$model->file;
               $inputFileType= \PHPExcel_IOFactory::identify($inputFile);
               $objReader =    \PHPExcel_IOFactory::createReader($inputFileType);
               $objPHPExcel = $objReader->load($inputFile);
   
            }catch(\Exception $e){
               Yii::$app->session->setFlash('error', 'Excel is not uploaded');
               return $this->redirect(['result']);
            }
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
    
            for($row =1; $row <= $highestRow; $row++){
                $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);
                if($row==1){
                    continue;
                }
                  $num=$rowData[0][0];
                  $osn=new TblOsn();
                  $osn->osn_number="$num";
                  $osn->status=0;
                  $osn->year=date('Y-m-d');
                  $osn->transaction_no='0';
                  $osn->save();
            }
            Yii::$app->session->setFlash('success', 'Successfully Uploaded Students Results');
            return  $this->goBack(Yii::$app->request->referrer);
   
           }else
           {
               Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
               return  $this->goBack(Yii::$app->request->referrer);
           } 

        
    }



    /**
     * Displays a single TblOsn model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('osn permission')){
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
     * Creates a new TblOsn model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('osn permission')){
        $model = new TblOsn();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
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
     * Updates an existing TblOsn model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('osn permission')){
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
     * Deletes an existing TblOsn model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('osn permission')){
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }else
    {
        Yii::$app->session->setFlash('error', 'You don\'t have permission to view this page');
        return  $this->goBack(Yii::$app->request->referrer);
    } 
    }

    /**
     * Finds the TblOsn model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblOsn the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if(Yii::$app->user->can('osn permission')){
        if (($model = TblOsn::findOne($id)) !== null) {
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

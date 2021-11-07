<?php

namespace backend\modules\program\controllers;

use Yii;
use backend\modules\program\models\TblProgramSearch;
use common\controllers\ValidateController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\TblProgram;
use Exception;

/**
 * TblProgramController implements the CRUD actions for TblProgram model.
 */
class TblProgramController extends Controller
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

    // function GetMAC(){
    //     ob_start();
    //     system('getmac');
    //     $Content = ob_get_contents();
    //     ob_clean();
    //     return substr($Content, strpos($Content,'\\')-20, 17);
    // }


    /**
     * Lists all TblProgram models.
     * @return mixed
     */
    public function actionIndex()
    {
           
        $model = new TblProgram();
        $searchModel = new TblProgramSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single TblProgram model.
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
     * Creates a new TblProgram model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        try{
            // Create New Program
               $model = new TblProgram();
            if ($model->load(Yii::$app->request->post())) {
                $model->program_name=$_POST['TblProgram']['program_name'];
                $model->program_code=$_POST['TblProgram']['program_code'];
                $model->program_category_id=$_POST['TblProgram']['program_category_id'];
                $model->level_id=$_POST['TblProgram']['level_id'];
                $model->amount=$_POST['TblProgram']['amount'];        
                if($model->save()){
                    Yii::$app->session->setFlash('success','Successfully saved');
                    return $this->redirect(['index', 'id' => $model->id]);
                }
            }
        }catch(Exception $e){
            Yii::$app->session->setFlash('error','Error');
            return $this->redirect(['index',]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TblProgram model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        //Updating Program Details

        try{
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success','Successfully Updated');
                return $this->redirect(['index', 'id' => $model->id]);
            }
        }catch(Exception $e){

            Yii::$app->session->setFlash('error','Not Successfully Updated'.$e->getMessage());
            return $this->redirect(['index']);
        }
       
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblProgram model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        try{
            $this->findModel($id)->delete();
        }catch(Exception $e){
            Yii::$app->session->setFlash('error','Not Successfully deleted');
            return $this->redirect(['index']);
        }
        Yii::$app->session->setFlash('error','Successfully Deleted');

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblProgram model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblProgram the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblProgram::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

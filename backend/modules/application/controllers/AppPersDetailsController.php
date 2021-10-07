<?php

namespace backend\modules\application\controllers;

use backend\modules\application\models\App;
use backend\modules\application\models\AppAddress;
use backend\modules\application\models\AppDocument;
use backend\modules\application\models\AppEduBg;
use backend\modules\application\models\AppEmpDetails;
use Yii;
use backend\modules\application\models\AppPersDetails;
use backend\modules\application\models\AppPersDetailsSearch;
use backend\modules\application\models\TblAppAddress;
use backend\modules\application\models\TblAppPersDetails;
use backend\modules\application\models\TblAppPersDetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AppPersDetailsController implements the CRUD actions for AppPersDetails model.
 */
class AppPersDetailsController extends Controller
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
     * Lists all AppPersDetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblAppPersDetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AppPersDetails model.
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
     * Creates a new AppPersDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelp = new TblAppPersDetails();
        $modelad = new TblAppAddress();
    
        if ($modelp->load(Yii::$app->request->post())) {
            //saving to personal details tabel
            $modelp->title=$_POST['TblAppPersDetails']['title'];
            $modelp->last_name=$_POST['TblAppPersDetails']['last_name'];
            $modelp->first_name=$_POST['TblAppPersDetails']['first_name'];
            $modelp->middle_name=$_POST['TblAppPersDetails']['middle_name'];
            $modelp->gender=$_POST['TblAppPersDetails']['gender'];
            $modelp->date_of_birth=$_POST['TblAppPersDetails']['date_of_birth'];
            $modelp->nationality=$_POST['TblAppPersDetails']['nationality'];
            $modelp->contact_person=$_POST['TblAppPersDetails']['contact_person'];
            $modelp->contact_number=$_POST['TblAppPersDetails']['contact_number'];	
            $modelp->date_apply=date('Y-m-d');
            // $personalDetailsID=$modelp->id;
            //saving to personal address table
            $modelad->address=$_POST['TblAppAddress']['address'];
            $modelad->city=$_POST['TblAppAddress']['city'];
            $modelad->country=$_POST['TblAppAddress']['country'];
            $modelad->voters_id=$_POST['TblAppAddress']['voters_id'];
            $modelad->voters_id_type=$_POST['TblAppAddress']['voters_id_type'];
            $modelad->gps=$_POST['TblAppAddress']['gps'];
            $modelad->email=$_POST['TblAppAddress']['email'];
            $modelad->telephone_number=$_POST['TblAppAddress']['telephone_number'];
            $modelad->address=$_POST['TblAppAddress']['address'];
           
            if( $modelp->save() &&  $modelad->save()){
                Yii::$app->session->setFlash('success', 'Step One has been successfully Saved');
            }
             return $this->redirect(['/application/tbl-app-program/create', 'id' => $modelp->id]);
        }

        return $this->render('create', [
            'modelp' => $modelp,
            'modelad' => $modelad,
        ]);
    }

    /**
     * Updates an existing AppPersDetails model.
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
     * Deletes an existing AppPersDetails model.
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
     * Finds the AppPersDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AppPersDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblAppPersDetails::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php

namespace backend\modules\application\controllers;

use backend\modules\application\models\TblAppSearch;
use Yii;
use yii\base\BaseObject;
use yii\web\Controller;

/**
 * Default controller for the `application` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->layout='main2';
        $searchModel = new TblAppSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // $dataProvider->query->andWhere(['or',
        //     ['status' => ['1,2,3,4']]
        //     // ['wp_type'=> 'Hot Work Permit'],
        //  ])
        //  ->orderBy(['status' => SORT_DESC ]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}

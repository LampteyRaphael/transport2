<?php

namespace frontend\modules\lecturer\controllers;

use yii\web\Controller;

/**
 * Default controller for the `lecturer` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionF($id){

        return   89000;
    }
}

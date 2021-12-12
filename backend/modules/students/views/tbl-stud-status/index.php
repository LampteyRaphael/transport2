<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\students\models\TblStudStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stud Statuses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-stud-status-index">

    <!-- Navigation Bar -->
    <?php include (Yii::getAlias('@backend/modules/layout/navbar.php'))?>
    <!-- End Of Navigation Bar -->


    <div class="card">
        <div class="card-header bg-primary">
            <h4>Students Status</h4>
        </div>
        <div class="card-body">
            <p class="card-text">    <?php Pjax::begin(); ?>
   
   <?= GridView::widget([
       'dataProvider' => $dataProvider,
       'filterModel' => $searchModel,
       'columns' => [
           ['class' => 'kartik\grid\SerialColumn'],

           'name',

           ['class' => 'kartik\grid\ActionColumn',
           'template' => '{view}',
           'buttons' => [
               'view' => function ($url, $model, $key) {
                   return Html::a ( 'view', ['view', 'id' => $model->id],['class'=>'btn btn-primary'] );
               },
               
           ],
       ],
       ],
   ]); ?>

   <?php Pjax::end(); ?></p>
        </div>
    </div>
</div>

<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\TblOsnSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Osns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-osn-index">
    <!-- Navigation Bar -->
    <?php include (Yii::getAlias('@backend/modules/layout/navbar.php'))?>
<!-- End Of Navigation Bar -->
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'containerOptions' => ['style'=>'overflow: auto'],
        'tableOptions' => ['class' => 'table table-striped table-hover table-condensed text-left'],
        'toolbar' =>  [
        [
            'content'=>
            Html::a('Create OSN', ['create'], ['class' => 'btn btn-primary']) 
         ],
            '{export}',
            '{toggleData}'
        ],

    'pjax'=>true,
    'bordered' => true,
    'striped' => true,
    'condensed' => false,
    'responsive' => true,
    'responsiveWrap' => false,
    'bootstrap'=>true,
    'hover' => true,
    'floatHeader' => false,
    'panel' => [
        // 'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Programs</h3>',
        'type' => GridView::TYPE_PRIMARY,
    ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'osn_number',
            
            [
                'attribute'=>'status',
                'label'=>'Status',
                'value'=>function($model){
                    return $model->status==1? 'Active':'Non Active';
                },
            ],
            
            'year',
            'transaction_no',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

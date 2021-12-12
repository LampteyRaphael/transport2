<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\TblQualiLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quali Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-quali-log-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'containerOptions' => ['style'=>'overflow: auto'],
        'toolbar' =>  [
            ['content'=>
            Html::a('Back To Qualification', ['/qualification/tbl-app-quali/index'],['class' => 'btn btn-primary mr-4']),
            ],
            '{export}',
            '{toggleData}'
        ],
    'pjax'=>true,
    'bordered' => true,
    'striped' => true,
    'condensed' => false,
    'responsive' => true,
   'bootstrap'=>true,
   'responsiveWrap' => false,
    'hover' => true,
    'floatHeader' => false,
    'panel' => [
       'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Quali Logs</h3>',
       'type' => GridView::TYPE_PRIMARY,
    ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            'created_at:datetime',
            [
                'attribute'=>'user_id',
                'label'=>'Authorize User',
                'value'=> 'user.username',
            ],
            [
                'attribute'=>'status',
                'label'=>'Status',
                'value'=> 'status0.name',
            ],

        ],
    ]); ?>


</div>

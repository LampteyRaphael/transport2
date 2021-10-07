<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\qualification\models\TblAppQualiStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Qualification Status';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-app-quali-status-index">

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showPageSummary'=>true,
        'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'containerOptions' => ['style'=>'overflow: auto'],
        'beforeHeader'=>[
            [
                'columns'=>[
                    ['content'=>'Qualification', 'options'=>['colspan'=>1, 'class'=>'text-center warning']], 
                    ['content'=>'', 'options'=>['colspan'=>1, 'class'=>'text-center warning']], 
                    ['content'=>'', 'options'=>['colspan'=>4, 'class'=>'text-center warning']], 
                    ['content'=>'', 'options'=>['colspan'=>3, 'class'=>'text-center warning']], 
                ],
                 'options'=>['class'=>'skip-export'] // remove this row from export
            ]
        ],

        'toolbar' =>  [
            ['content'=>
                Html::a('Create', ['create'], ['class' => 'btn btn-success','data-toggle'=>'modal', 'data-target'=>'#vv']),
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
    'hover' => true,
    'floatHeader' => false,
    'showPageSummary' => true,
    'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Qualification</h3>',
        'type' => GridView::TYPE_PRIMARY,
    ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\admission\models\TblAdmissLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admission Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-admiss-log-index">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'containerOptions' => ['style'=>'overflow: auto'],
        'beforeHeader'=>[
            [
                'columns'=>[
                    ['content'=>'Admission Log', 'options'=>['colspan'=>1, 'class'=>'text-center warning']], 
                    ['content'=>'', 'options'=>['colspan'=>1, 'class'=>'text-center warning']], 
                    ['content'=>'', 'options'=>['colspan'=>4, 'class'=>'text-center warning']], 
                    ['content'=>'', 'options'=>['colspan'=>3, 'class'=>'text-center warning']], 
                ],
                 'options'=>['class'=>'skip-export'] // remove this row from export
            ]
        ],

        'toolbar' =>  [
            ['content'=>
                Html::a('Create', ['Create'], ['class' => 'btn btn-success']),
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
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Admission</h3>',
        'type' => GridView::TYPE_PRIMARY,
    ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'created_at',
            
            [
                'attribute'=>'user_id',
                'label'=>'Auth user',
                'value'=>'user.username'
            ],
            [
                'attribute'=>'status',
                'label'=>'Action Performed',
                'value'=>'status0.name'
            ],
        
            // ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

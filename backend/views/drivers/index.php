<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\DriversSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Drivers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drivers-index">

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'containerOptions' => ['style'=>'overflow: auto'],
        'toolbar' =>  [
             ['content'=>    
                  Html::a('Add Driver', ['create'], ['class' => 'btn btn-success']),
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
    'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i>Drivers</h3>',
        'type' => GridView::TYPE_PRIMARY,
    ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            'name',
            'tel',
            'age',
            'email:email',
            'license_no',
            'license_expire_date',
            'date_of_join',
            'driver_status',
            'photo',
      
            ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view}',
            'width'=>'10%',
            'buttons' => [
                'view'=>function($url, $model,$key){
                    return Html::a ('<span><i class="fa fa-user"></i> <b>View</b></span>',['update','id'=>$model->id],['class'=>'btn btn-primary']);
                }
            ],
        ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

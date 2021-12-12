<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\TblStudAcadYearSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Student Academic Year';
$this->params['breadcrumbs'][] = $this->title;
?>

    <!-- Navigation Bar -->
    <?php include (Yii::getAlias('@backend/modules/layout/navbar.php'))?>
    <!-- End Of Navigation Bar -->

<div class="tbl-stud-acad-year-index">
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'containerOptions' => ['style'=>'overflow: auto'], 
        'tableOptions' => ['class' => 'table table-striped table-hover table-condensed text-left'],
        'toolbar' =>  [
        [
             'content'=> 
             Html::a(('Add New'),['create'], ['class' => 'btn btn-primary']),
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
        'heading'=>'<h3 class="panel-title">Academic Year</h3>',
        'type' => GridView::TYPE_PRIMARY,
    ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            [
                'attribute'=>'date_of_admission',
                'label'=>'Academic Year',
            ],
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
  

</div>

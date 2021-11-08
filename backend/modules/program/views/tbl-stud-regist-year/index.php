<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\TblStudRegistYearSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stud Regist Years';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-stud-regist-year-index">
    <!-- Navigation Bar -->
    <?php include (Yii::getAlias('@backend/modules/layout/navbar.php'))?>
<!-- End Of Navigation Bar -->
    <?php Pjax::begin(); ?>
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
                Html::a(('Add New'), ['create'],['class' => 'btn btn-primary']),
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
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i>Date Settings For course Registration</h3>',
            'type' => GridView::TYPE_PRIMARY,
        ],
            
            'columns' => [
                ['class' => 'kartik\grid\SerialColumn'],
                'date:date',
                'studAcadamicYear.date_of_admission',
                [
                    'attribute'=>'semester', 
                    'label'=>'Semester',
                    'value'=>'semester0.name'
                ],
                [
                    'attribute'=>'status', 
                    'label'=>'Status',
                    'value'=>'status0.name'
                ],
                ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a ( 'view', ['view', 'id' => $model->id],['class'=>'btn btn-primary'] );
                    },
                    
                ],
            ],
            ],
        ]); 
    ?>
    <?php Pjax::end(); ?>

</div>

<?php

use kartik\grid\GridView;
use yii\bootstrap4\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\TblAcadamicYearSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Acadamic Years';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-acadamic-year-index">

    <!-- Navigation Bar -->
    <?php include (Yii::getAlias('@backend/modules/layout/navbar.php'))?>
<!-- End Of Navigation Bar -->


    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
            Html::a('Add New Acadamic Year', ['create'], ['class' => 'btn btn-primary','data-toggle'=>"modal", 'data-target'=>"#acadamic"]) 
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
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Admission Academic Year</h3>',
        'type' => GridView::TYPE_PRIMARY,
    ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'academic_year', 
                'label'=>'Academic Year',
            ],
            [
                'attribute'=>'doa', 
                'label'=>'Date Of Admission',
            ],
            [
                'attribute'=>'doc', 
                'label'=>'Date Of Completion',
            ],
            [
                'attribute'=>'status', 
                'label'=>'Status',
                'value'=>'status0.name'
            ],
            
            ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view}',
            'buttons' => [
                'view' => function ($url, $model, $key) {
                    return Html::a ( 'View', ['view', 'id' => $model->id],['class'=>"btn btn-primary"] );
                },       
            ],
        ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
<!-- Creating New Courses -->
<div class="modal fade" id="acadamic" tabindex="-1"  aria-hidden="true" data-backdrop="static" data-keyboard="false"  aria-labelledby="staticBackdropLabel">
  <div class="modal-dialog modal-dialog-scrollable modal-xl">
    <div class="modal-content" style="background-color: lightblue;">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel"><b>Create New Section</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <div class="modal-body">
      <?php echo $this->render('create', ['model' => $model]); ?>
      </div>
    </div>
  </div>
</div> 
<!-- End New Courses -->

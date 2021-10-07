<?php

use kartik\grid\GridView;
use yii\bootstrap4\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\courses\models\TblSectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sections';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-section-index">
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
        'toolbar' =>  [   
        [
            'content'=> Html::a('Create',['create'],['class'=>'btn btn-success','data-toggle'=>"modal", 'data-target'=>"#addsection"]),
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
    'hover' => true,
    'panel' => [
        'heading'=>'<h3 class="panel-title">Sections</h3>',
        'type' => GridView::TYPE_PRIMARY,
    ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            [
                'attribute'=>'name',
                'label'=>'Session',
                'value'=>'name'
            ],
            ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view}',
            'buttons' => [
                'view' => function ($url, $model, $key) {
                    return Html::a ( 'View', ['/courses/tbl-section/view', 'id' => $model->id],['class'=>"btn btn-primary"] );
                },       
            ],
        ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
<!-- Creating New Courses -->
<div class="modal fade" id="addsection" tabindex="-1"  aria-hidden="true" data-backdrop="static" data-keyboard="false"  aria-labelledby="staticBackdropLabel">
  <div class="modal-dialog modal-dialog-scrollable modal-xl">
    <div class="modal-content" style="background-color: lightblue;">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel"><b>Create New Section</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <div class="modal-body">
      <?php echo $this->render('_create', ['model' => $model]); ?>
      </div>
    </div>
  </div>
</div> 
<!-- End New Courses -->

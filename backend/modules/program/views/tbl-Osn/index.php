<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\TblOsnSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Osn';
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

         [
            'content'=>
            Html::button(('Upload'), ['class' => 'btn btn-primary','data-toggle'=>"modal", 'data-target'=>"#exampleModal"]),
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

    <div class="modal fade" id="exampleModal" tabindex="-1"  aria-hidden="true" data-backdrop="static" data-keyboard="false"  aria-labelledby="staticBackdropLabel">
  <div class="modal-dialog modal-dialog-scrollable modal-xl">
    <div class="modal-content" style="background-color: lightblue;">
        <div class="modal-header bg-primary">
            <h5 class="modal-title" id="staticBackdropLabel">Add Online Serial Number</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <div class="modal-body">
      <?php echo $this->render('_upload', ['model' => $model]); ?>
      </div>
      <div class="modal-footer bg-primary">
       </div>
    </div>
  </div>
</div>

</div>

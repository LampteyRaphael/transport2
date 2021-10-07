<?php

use common\models\TblPaymentStatus;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;

$this->title = 'Payments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-payment-index">
<!-- Navigation Bar -->
<!-- <php include (Yii::getAlias('@backend/modules/layout/studentData.php'))?> -->
<!-- End Of Navigation Bar -->

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
             Html::button(('Make Payment'), ['class' => 'btn btn-primary','data-toggle'=>"modal", 'data-target'=>"#addpayment"]),
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
        'heading'=>'<h3 class="panel-title">Students Fees</h3>',
        'type' => GridView::TYPE_PRIMARY,
    ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'date:date',
            [
                'attribute'=>'admission_id',
                'label'=>'Admission',
                'value'=>function($model){
                    return ($model->admission->application->personalDetails->title0->name??'') .' '. ($model->admission->application->personalDetails->first_name??'') .' '. ($model->admission->application->personalDetails->middle_name??'') .' ' . ($model->admission->application->personalDetails->last_name??'');
                }
            ],
           [
               'attribute'=>'amount',
               'label'=>'Amount',
               'value'=>function($model){
                   return 'GHS '. number_format($model->amount,2);
               }
           ],
            'receipt_no',
            [
                'attribute'=>'balance',
                'label'=>'Balance',
                'value'=>function($model){
                    return 'GHS '. number_format($model->balance,2);
                }
            ],
            [
                'attribute'=>'program_id',
                'label'=>'Program',
                'value'=>function($model){
                    return $model->program->program_name??'';
                }
            ],

            [
                'attribute'=>'status',
                'label'=>'Status:',
                'value'=>'status0.name',
                'filter'=>ArrayHelper::map(TblPaymentStatus::find()->asArray()->all(),'name','name'),
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'options'=>['prompt'=>'Category'],
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'contentOptions' => function ($model, $key, $index, $column) {
                    return ['style' => 'color:'.($model->amount <2000 ? 'red' : 'green')];
                },
            ],

            [
                'attribute'=>'user_id',
                'label'=>'System User',
                'value'=>function($model){
                    return $model->user->username??"";
                }
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
<!-- Creating New Courses -->
<div class="modal fade" id="addpayment" tabindex="-1"  aria-hidden="true" data-backdrop="static" data-keyboard="false"  aria-labelledby="staticBackdropLabel">
  <div class="modal-dialog modal-dialog-scrollable modal-xl">
    <div class="modal-content" style="background-color: lightblue;">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel"><b>Enter Admission Payment Here</b></h5>
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


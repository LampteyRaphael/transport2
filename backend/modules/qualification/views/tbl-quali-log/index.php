<?php

use common\models\TblAppQualiStatus;
use common\models\User;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

$this->title = 'Qualification Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-quali-log-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showPageSummary'=>true,
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'containerOptions' => ['style'=>'overflow: auto'],
        'beforeHeader'=>[
            [
                'columns'=>[
                    ['content'=>'Qualification Stage Of All Applicant', 'options'=>['colspan'=>3, 'class'=>'text-center warning']], 
                    ['content'=>'', 'options'=>['colspan'=>1, 'class'=>'text-center warning']], 
                    ['content'=>'', 'options'=>['colspan'=>1, 'class'=>'text-center warning']], 
                ],
                 'options'=>['class'=>'skip-export'] // remove this row from export
            ]
        ],

        'toolbar' =>  [
            // ['content'=>
            // Html::submitButton('Submit', ['class' => 'btn btn-info','data-confirm'=>'Are you sure you want to qualify the applicants?']),
            // ],

         
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
            // ['class' => 'kartik\grid\CheckboxColumn'],

            'created_at:date',
            [
                'attribute'=>'user_id',
                'label'=>'Authorized User',
                'value'=>'user.username',
                'filter'=>ArrayHelper::map(User::find()->asArray()->all(),'username','username'),
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'options'=>['prompt'=>'Category'],
                    'pluginOptions'=>['allowClear'=>true],
                ],

                'contentOptions' => function ($model, $key, $index, $column) {
                    
                    if(!empty($model)){

                        return   ['class' => 'text-center text-success','style'=>'font-weight:bold'];
                    }else{
                        return   ['class' => 'text-center text-danger','style'=>'font-weight:bold'];
                    }
                },
            ],


            [
                'attribute'=>'status',
                'value'=>'status0.name',
                'filter'=>ArrayHelper::map(TblAppQualiStatus::find()->asArray()->all(),'name','name'),
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'options'=>['prompt'=>'Status'],
                    'pluginOptions'=>['allowClear'=>true],
                ],

                'contentOptions' => function ($model, $key, $index, $column) {
                    if($model->status0->id === 1){
                        return   ['class' => 'text-center text-success','style'=>'font-weight:bold'];
                    }else{
                        return   ['class' => 'text-center text-danger','style'=>'font-weight:bold'];
                    }
                },
            ],
           
        //     'updated_at:date', 
        
        //     ['class' => 'kartik\grid\ActionColumn',
        //     'template' => ' {delete} ',
        //     'width'=>100,
        //     'buttons' => [
        //         // 'view' => function ($url, $model, $key) {
        //         //     return Html::a ( '<span class="btn btn-success" aria-hidden="true"><i class="fa fa-edit"></i></span> ', ['/qualification/tbl-quali-log/update', 'id' => $model->id] );
        //         // },
  
        //         'delete' => function ($url, $model, $key) {
        //             return Html::a('<span class="btn btn-danger" aria-hidden="true"><i class="fa fa-trash"></i></span>',$url,['data-confirm' => 'Are you sure you want to deny this request?', 'data-method' =>'POST']);
        //         },
                
        //     ],
        // ],
        
        
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

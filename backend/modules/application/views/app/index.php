<?php

use common\models\TblAppStatus;
use common\models\TblApp;
use common\models\TblAppAddress;
use common\models\TblAppPersDetails;
use common\models\TblProgram;
use common\models\TblProgramType;
use yii\bootstrap\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AppSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

 $this->title = 'Application';
 $this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-index">

<?= Html::beginForm(['/application/app/qualification'], 'post'); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'containerOptions' => ['style'=>'overflow: auto;'],
        
    'pjax'=>true,
    'bordered' => true,
    'striped' => true,
    'condensed' => false,
    'responsive' => true,
    'responsiveWrap' => false,
    'bootstrap'=>true,
    'hover' => true,
    'floatHeader' => false,
//    'showPageSummary' => true,
    'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Applicants</h3>',
        'type' => GridView::TYPE_PRIMARY
        //'footer'=>true

    ],
    'tableOptions' => ['class' => 'table table-striped table-hover table-condensed text-left'],

        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            ['class' => 'kartik\grid\CheckboxColumn'],

            [  
              'class' =>'kartik\grid\ExpandRowColumn',  
              'value'=>function ($model, $key, $index,$column) {  
                        return GridView::ROW_COLLAPSED;  
               }, 
               'expandIcon' => '<i class="fa fa-expand text-success" aria-hidden="true"></i>',
               'collapseIcon' => '<i class="fa fa-close small" aria-hidden="true"></i>',
               'detailUrl'=> Url::to(['/application/app/details']),
            ], 

            [
                'attribute'=>'date',
                'label'=>'Date Of Application',
                'format' => ['date', 'php:jS F , Y'],
                'value'=>'date',
                'filter'=>ArrayHelper::map(TblApp::find()->asArray()->all(),'date','date'),
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'options'=>['prompt'=>'Category'],
                    'pluginOptions'=>['allowClear'=>true],
                ],
            ],

            
            [
                'attribute'=>'personal_details_id',
                'label'=>'Applicant\'s Name',
                'value'=>function($model){
                    if($model){
                        return  ucwords($model->personalDetails->title0->name . ' ' . $model->personalDetails->first_name . ' ' . $model->personalDetails->middle_name .' ' .  $model->personalDetails->last_name);
                    }
                },
                'filter'=>ArrayHelper::map(TblAppPersDetails::find()->asArray()->all(),'last_name','last_name'),
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'options'=>['prompt'=>'Name'],
                    'pluginOptions'=>['allowClear'=>true],
                ],
            ],

            [
                'attribute'=>'personal_address_id',
                'label'=>'Phone Number',
                'value'=>'personalAddress.telephone_number',
                'filter'=>ArrayHelper::map(TblAppAddress::find()->asArray()->all(),'telephone_number','telephone_number'),
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'options'=>['prompt'=>'Category'],
                    'pluginOptions'=>['allowClear'=>true],
                ],
            ],
         

            [
                'attribute'=>'program_id',
                'label'=>'Program Applied For:',
                'value'=>'program.program.programCategory.name',
                'filter'=>ArrayHelper::map(TblProgramType::find()->asArray()->all(),'name','name'),
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'options'=>['prompt'=>'Category'],
                    'pluginOptions'=>['allowClear'=>true],
                ],
            ],
            
            [
                'attribute'=>'status',
                'value'=>'status0.name',
                'filter'=>ArrayHelper::map(TblAppStatus::find()->asArray()->all(),'name','name'),
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'options'=>['prompt'=>'Category'],
                    'pluginOptions'=>['allowClear'=>true],
                ],

                'contentOptions' => function ($model, $key, $index, $column) {
                    return ['style' => 'color:'.($model->status0->name === 'Completed' ? 'green' : 'green'),];
                },
            ],
            // ['class' => 'yii\grid\ActionColumn'],
            ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view}',
            'buttons' => [
                'view' => function ($url, $model, $key) {
                 return   Html::a('View', ['/application/app/view', 'id' => $model->id], ['class' => 'btn btn-primary']);
//                    return Html::a ( '<span class="btn btn-success" aria-hidden="true"><i class="fa fa-edit"></i></span> ', ['/application/app/view', 'id' => $model->id] );
                },
            ],
        ],   


        ],
    ]);
    
    
    ?>

<?= Html::endForm(); ?>
</div>

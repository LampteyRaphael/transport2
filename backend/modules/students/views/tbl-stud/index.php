<?php

use common\models\TblApp;
use common\models\TblAppAddress;
use common\models\TblAppEduBg;
use common\models\TblAppPersDetails;
use common\models\TblAppStatus;
use common\models\TblStudStatus;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\students\models\TblStudtSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-stud-index">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        //  'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'containerOptions' => ['style'=>'overflow: auto'],
//        'beforeHeader'=>[
//            [
//                'columns'=>[
//                    ['content'=>'Registered Students', 'options'=>['colspan'=>4, 'class'=>'text-center warning']],
//                    ['content'=>'', 'options'=>['colspan'=>1, 'class'=>'text-center warning']],
//                    ['content'=>'', 'options'=>['colspan'=>1, 'class'=>'text-center warning']],
//                    ['content'=>'', 'options'=>['colspan'=>3, 'class'=>'text-center warning']],
//                ],
//                 'options'=>['class'=>'skip-export'] // remove this row from export
//            ]
//        ],

        'toolbar' =>  [
            //  ['content'=>    
            // //  Html::submitButton('Qualify Applicant', ['class' => 'btn btn-info','data-confirm'=>'Are you sure you want to qualify this applicants? Don\'t forget, you will be responsible for this actions']),
            //  ],
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
//    'showPageSummary' => true,
    'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i>Students</h3>',
        'type' => GridView::TYPE_PRIMARY,
        // 'footer'=>true

    ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'kartik\grid\CheckboxColumn'],

            [
                'attribute'=>'date',
                'label'=>'Date',
                'value'=>'date'
            ],
            [  
              'class' =>'kartik\grid\ExpandRowColumn',  
              'value'=>function ($model, $key, $index,$column) {  
                        return GridView::ROW_COLLAPSED;  
               }, 
               'detailUrl'=> Yii::$app->request->getBaseUrl().'/students/tbl-stud/details', 

            ],
            [
                'attribute'=>'personal_details_id',
                'label'=>'Students Name',
                'value'=>function($model){
                    if($model){
                        return  ucwords( ($model->personalDetails->first_name??'') . ' ' . ($model->personalDetails->middle_name??'') .' ' . ($model->personalDetails->last_name??''));
                    }
                },
                'filter'=>ArrayHelper::map(TblAppPersDetails::find()->asArray()->all(),'last_name','last_name'),
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'options'=>['prompt'=>'students Name'],
                    'pluginOptions'=>['allowClear'=>true],
                ],
            ],

            [
                'attribute'=>'personal_address_id',
                'value'=>'personalAddress.telephone_number',
                'label'=>'Phone Number',
                'filter'=>ArrayHelper::map(TblAppAddress::find()->asArray()->all(),'telephone_number','telephone_number'),
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'options'=>['prompt'=>'Phone Number'],
                    'pluginOptions'=>['allowClear'=>true],
                ],
            ],

            [
                'attribute'=>'personal_education_id',
                'label'=>'Education',
                'value'=>'personalEducation.institution',
                'filter'=>ArrayHelper::map(TblAppEduBg::find()->asArray()->all(),'institution','institution'),
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'options'=>['prompt'=>'Education'],
                    'pluginOptions'=>['allowClear'=>true],
                ],
            ],
            
            [
                'attribute'=>'status',
                'value'=>'status0.name',
                'filter'=>ArrayHelper::map(TblStudStatus::find()->asArray()->all(),'name','name'),
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'options'=>['prompt'=>'Status'],
                    'pluginOptions'=>['allowClear'=>true],
                ],

                // 'contentOptions' => function ($model, $key, $index, $column) {
                //     return ['style' => 'color:'.($model->status0->name === 'Completed' ? 'green' : 'red'),];
                // },
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

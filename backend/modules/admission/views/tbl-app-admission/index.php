<?php

use common\models\TblAcadamicYear;
use common\models\TblAppAdmissStatus;
use common\models\TblAppPersDetails;
use common\models\User;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\TblAppAdmissionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admissions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-app-admission-index">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
//        'showPageSummary'=>true,
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'containerOptions' => ['style'=>'overflow: auto'],
    
        'toolbar' =>  [
            // ['content'=>
            //     Html::a('Import Excel', ['Create'], ['class' => 'btn btn-success']),
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
   'responsiveWrap' => false,
    'hover' => true,
    'floatHeader' => false,
    'panel' => [
       'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Admissions</h3>',
       'type' => GridView::TYPE_PRIMARY,
    ],
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
               'detailUrl'=> Yii::$app->request->getBaseUrl().'/admission/tbl-app-admission/details', 
            ], 

            // 'created_at:date',

            [
                'attribute'=>'accadamin_year_id',
                'value'=>'accadaminYear.doa',
                'label'=>'DOA',
                'contentOptions'=>function($model){
                    return ['style'=>'color:green; font-weight:bold;',];
                }
            ],

            [
                'attribute'=>'accadamin_year_id',
                'value'=>'accadaminYear.doc',
                'label'=>'DOC',
                'contentOptions'=>function($model){
                    return ['style'=>'color:green; font-weight:bold;',];
                }
            ],

            [
                'attribute'=>'application_id',
                'value'=>function($model){

                    if($model){
                        return  ucwords(($model->application->personalDetails->title0->name??'').' ' . ($model->application->personalDetails->first_name??'') . ' ' . ($model->application->personalDetails->middle_name??'') .' ' .  ($model->application->personalDetails->last_name??''));
                    }
                },
                'filter'=>ArrayHelper::map(TblAppPersDetails::find()->asArray()->all(),'last_name','last_name'),
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'options'=>['prompt'=>'Last Name'],
                    'pluginOptions'=>['allowClear'=>true],
                ],
            ],
            


            [
                'attribute'=>'accadamin_year_id',
                'value'=>'accadaminYear.date_of_admission',
                'filter'=>ArrayHelper::map(TblAcadamicYear::find()->asArray()->all(),'date_of_admission','date_of_admission'),
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'options'=>['prompt'=>'Category'],
                    'pluginOptions'=>['allowClear'=>true],
                ],
            ],
             
            [
                'attribute'=>'status',
                'value'=>'status0.name',
                'filter'=>ArrayHelper::map(TblAppAdmissStatus::find()->asArray()->all(),'name','name'),
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'options'=>['prompt'=>'Category'],
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'contentOptions' => function ($model, $key, $index, $column) {
                    return ['style' =>'font-weight:bold; color:'.($model->status0->name === 3 ? 'green' : 'green')];
                },
            ],
            

            [
                'attribute'=>'user_id',
                'value'=>'user.username',
                'label'=>'Authorized User',
                'filter'=>ArrayHelper::map(User::find()->asArray()->all(),'username','username'),
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'options'=>['prompt'=>'Category'],
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'contentOptions'=>function($model){

                    return ['style'=>'color:green; font-weight:bold;',];
                }
            ],
            

            // 'updated_at',

            ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view}',
            'width'=>100,
            'buttons' => [
                'view' => function ($url, $model, $key) {
                    return Html::a ( 'View', ['view', 'id' => $model->application_id],['class'=>'btn btn-primary btn-xs'] );
                }
            ],
        ],
           // ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
    </div>
</div>

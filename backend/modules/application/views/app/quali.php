<?php

use backend\modules\admission\models\TblAcadamicYear;
use backend\modules\admission\models\TblUser;
use backend\modules\application\models\AppPersDetails;
use backend\modules\qualification\models\TblAppPersDetails;
use backend\modules\qualification\models\TblAppPersDetailsSearch;
use backend\modules\qualification\models\TblAppQualiStatus;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\qualification\models\TblAppQualiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Qualification';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-app-quali-index">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= Html::beginForm(['/qualification/tbl-app-quali/bulk'], 'post'); ?>

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
                    ['content'=>'Qualification Stage Of All Applicant', 'options'=>['colspan'=>5, 'class'=>'text-center warning']],
                    ['content'=>'', 'options'=>['colspan'=>1, 'class'=>'text-center warning']],
                    ['content'=>'', 'options'=>['colspan'=>4, 'class'=>'text-center warning']],
                    ['content'=>'', 'options'=>['colspan'=>3, 'class'=>'text-center warning']],
                ],
                'options'=>['class'=>'skip-export'] // remove this row from export
            ]
        ],

        'toolbar' =>  [
            // ['content'=>
            // Html::dropDownList(

            //     'test', //name
            //     '',
            //      ArrayHelper::map(TblAppQualiStatus::find()->asArray()->all(),'id','name'),
            //     ['class' => 'form-control', 'style'=>'background-color: #fcf8e3; color:green; font-weight:bold']
            //     //['onchange' => 'document.location.href="/site/web/dashboard/filter?by="+this.value',])

            //     //['onchange'=> 'showUser(this.value)'])

            // //    ['onchange' => 'this.form.submit()'], ['data-pjax' => 'transactions']

            // ),
            // ],

            ['content'=>
                Html::submitButton('Admit Applicants', ['class' => 'btn btn-info','data-confirm'=>'Are you sure you want to admit all the applicants?']),
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
        'showPageSummary' => true,
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Qualification</h3>',
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
                'detailUrl'=> Yii::$app->request->getBaseUrl().'/qualification/tbl-app-quali/details',
            ],

            [
                'attribute'=>'application_id',
                'value'=>function($model){

                    if($model){
                        return  ucwords(($model->application->personalDetails->title0->name??'').' ' . ($model->application->personalDetails->first_name??'') . ' ' . ($model->application->personalDetails->middle_name??'') .' ' .  ($model->application->personalDetails->last_name??''));
                    }
                },
                'filter'=>ArrayHelper::map(TblAppPersDetails::find()->asArray()->all(),'id','last_name'),
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
                'attribute'=>'user_id',
                'label'=>'Authorized User',
                'value'=>'user.username',
                'filter'=>ArrayHelper::map(TblUser::find()->asArray()->all(),'username','username'),
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


            // 'user_id',
            // 'accadamin_year_id',
            //'created_at',
            //'updated_at',

            //  ['class' => 'yii\grid\ActionColumn'],
            ['class' => 'kartik\grid\ActionColumn',
                'template' => '{view}',
                'width'=>100,
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a ( '<span class="btn btn-success" aria-hidden="true"><i class="fa fa-edit"></i></span> ', ['/qualification/tbl-app-quali/view', 'id' => $model->id] );
                    }

                    //   'delete' => function ($url, $model, $key) {
                    //       return Html::a('<span class="btn btn-danger" aria-hidden="true"><i class="fa fa-trash"></i></span>',$url,['data-confirm' => 'Are you sure you want to deny this request?', 'data-method' =>'POST']);
                    //   },

                ],
            ],

        ],
    ]); ?>

    <?php Pjax::end(); ?>
    <?= Html::endForm(); ?>

</div>

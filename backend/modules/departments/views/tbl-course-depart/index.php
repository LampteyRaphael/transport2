<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\departments\models\TblCourseDepartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departments & Course';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-course-depart-index">

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
                    ['content'=>'Departments & Courses', 'options'=>['colspan'=>2, 'class'=>'text-center warning']], 
                    ['content'=>'', 'options'=>['colspan'=>1, 'class'=>'text-center warning']], 
                    ['content'=>'', 'options'=>['colspan'=>1, 'class'=>'text-center warning']], 
                    ['content'=>'', 'options'=>['colspan'=>1, 'class'=>'text-center warning']], 
                ],
                 'options'=>['class'=>'skip-export']
            ]
            ],
        

        'toolbar' =>  [
            
        [
            'content'=> Html::a('Create',['create'],['class'=>'btn btn-success']),
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
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i>Department And  Courses</h3>',
        'type' => GridView::TYPE_PRIMARY,
    ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            [  
                'class' =>'kartik\grid\ExpandRowColumn',  
                'value'=>function ($model, $key, $index,$column) {  
                          return GridView::ROW_COLLAPSED;  
                 },  
                 'expandIcon' => '<i class="fa fa-expand text-success" aria-hidden="true"></i>',
                 'collapseIcon' => '<i class="fa fa-close small" aria-hidden="true"></i>',
                 'detailUrl'=> Yii::$app->request->getBaseUrl().'/departments/tbl-course-depart/details', 
              ], 
            'depart.department_name',
            'course.courseName',

            ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view} {delete} ',
            'width'=>100,
            'buttons' => [
                'view' => function ($url, $model, $key) {
                    return Html::a ( '<span class="btn btn-success" aria-hidden="true"><i class="fa fa-edit"></i></span> ', ['/departments/tbl-course-depart/update', 'id' => $model->id] );
                },

                'delete' => function ($url, $model, $key) {
                    return Html::a('<span class="btn btn-danger" aria-hidden="true"><i class="fa fa-trash"></i></span>',$url,['data-confirm' => 'Are you sure you want to deny this request?', 'data-method' =>'POST']);
                },
                
            ],
        ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

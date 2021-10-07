<?php

use kartik\grid\GridView;
use yii\bootstrap4\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\TblLevelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Level';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-level-index">
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
            Html::a('Create Level', ['create'], ['class' => 'btn btn-primary']) 
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
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Levels</h3>',
        'type' => GridView::TYPE_PRIMARY,
    ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'level_name',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view}',
            'buttons' => [
                'view' => function ($url, $model, $key) {
                    return Html::a ( 'view', ['/program/tbl-level/view', 'id' => $model->id],['class'=>'btn btn-primary'] );
                },
                
            ],
        ],

        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

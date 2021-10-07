<?php

use common\models\TblLevel;
use common\models\TblSection;
use common\models\TblSemester;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\TblStRegistrationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Course Registed';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-st-registration-index">

    <?php Pjax::begin(); ?>

    <?php Pjax::begin(); ?>
    <?= Html::beginForm(['/student/tbl-st-registration/index'], 'post'); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'containerOptions' => ['style'=>'overflow: auto'], 
        'tableOptions' => ['class' => 'table table-striped table-hover table-condensed text-left'],
        'toolbar' =>  [

            ['content'=>
               Html::dropDownList('level_id','levels', ArrayHelper::map(TblLevel::find()->asArray()->all(),'id','level_name'),['class' => 'form-control mr-5'])
            ],
    
            ['content'=>
              Html::dropDownList('semester','Semester', ArrayHelper::map(TblSemester::find()->asArray()->all(),'id','name'),['class' => 'form-control mr-5'])
            ],

            ['content'=>
            Html::submitButton('Search', ['class' => 'btn btn-primary mr-5'])
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
        'heading'=>'<h3 class="panel-title">Course Registered</h3>',
        'type' => GridView::TYPE_PRIMARY,
    ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'date_o_regis',
            'courese.courseName',
            'level.level_name',
            'semester0.name',
            'section.name',
            'acadamicYear.name',
            'status0.name',
        ],
    ]); ?>
<?= Html::endForm(); ?>

    <?php Pjax::end(); ?>

</div>

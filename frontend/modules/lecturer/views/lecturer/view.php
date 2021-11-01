<?php

use common\models\TblAcadamicYear;
use common\models\TblLevel;
use common\models\TblSection;
use common\models\TblSemester;
use common\models\TblStudAcadamicYear;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\TblStRegistrationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Registered Courses';
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['courses']];
?>
<div class="lecturer-view">
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
            Html::dropDownList('acadamic_year_id','Acadamic Year', ArrayHelper::map(TblStudAcadamicYear::find()->asArray()->all(),'id','name'),['class' => 'form-control mr-5'])
          ],
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
        'heading'=>'<h3 class="panel-title">'.$this->title.'</h3>',
        'type' => GridView::TYPE_PRIMARY,
    ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            // [
            //     'attribute'=>'date_o_regis',
            //     'label'=>'Date',
            //     'value'=>'date_o_regis',
            // ],
            [
                'attribute'=>'stud_id',
                'label'=>'Index Number',
                'value'=>function($model){
                  return ($model->stud->user->username);
                }
            ],

            [
                'attribute'=>'stud_id',
                'label'=>'Student',
                'value'=>function($model){
                  return ($model->stud->personalDetails->title0->name??''). ' ' . ($model->stud->personalDetails->first_name??'')  . ' ' . ($model->stud->personalDetails->middle_name??'') . ' ' .($model->stud->personalDetails->last_name??'');
                }
            ],
            [
                'attribute'=>'courese_id',
                'label'=>'Courses',
                'value'=>'courese.courseName',
            ],
            // [
            //     'attribute'=>'level_id',
            //     'label'=>'Levels',
            //     'value'=>'level.level_name',
            // ],
            [
                'attribute'=>'semester',
                'label'=>'Semester',
                'value'=>'semester0.name',
            ],
            [
                'attribute'=>'section_id',
                'label'=>'Session',
                'value'=>'section.name',
            ],
        ],
    ]); ?>
<?= Html::endForm(); ?>
</div>

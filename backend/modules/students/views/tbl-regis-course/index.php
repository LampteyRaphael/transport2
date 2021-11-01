<?php

use common\models\TblAcadamicYear;
use common\models\TblAppPersDetails;
use common\models\TblSemester;
use common\models\TblStudAcadamicYear;
use common\models\TblStudAcadYear;
use common\models\User;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\students\models\TblRegisCourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Regis Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-regis-course-index">
<?php include (Yii::getAlias('@backend/modules/students/views/include/header.php'))?>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'containerOptions' => ['style'=>'overflow: auto'], 
        'tableOptions' => ['class' => 'table table-striped table-hover table-condensed text-left'],

        'toolbar' =>  [
        [
            // 'content'=> 
            // Html::button(('Add New Course'), ['class' => 'btn btn-primary','data-toggle'=>"modal", 'data-target'=>"#addCourse"]),
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
        'heading'=>'<h3 class="panel-title">Registered Courses</h3>',
        'type' => GridView::TYPE_PRIMARY,
    ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'value'=> 'created_at:date',
            //  [
            //     'attribute'=>'created_at',
                
            //     'label'=>'Date',
            // ],
            // [
            //     'attribute'=>'stud_regis_id',
            //     'value'=>function($model){

            //         if($model){
            //           return  ucwords(($model->studRegis->stud->personalDetails->first_name??'') .' ' .($model->studRegis->stud->personalDetails->middle_name??'') . ' ' . ($model->studRegis->stud->personalDetails->last_name??''));
            //         }
            //     },
            //     'label'=>'Students',
            //     'filter'=>ArrayHelper::map(TblAppPersDetails::find()->asArray()->all(),'last_name','last_name'),
            //     'filterType'=>GridView::FILTER_SELECT2,
            //     'filterWidgetOptions'=>[
            //         'options'=>['prompt'=>'Category'],
            //         'pluginOptions'=>['allowClear'=>true],
            //     ],
            // ],

            [
                'attribute'=>'course_id',
                'value'=>'course.courseName',
                'label'=>'Courses',
                // 'filter'=>ArrayHelper::map(TblStudAcadamicYear::find()->asArray()->all(),'name','name'),
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'options'=>['prompt'=>'Category'],
                    'pluginOptions'=>['allowClear'=>true],
                ],
            ],
            [
                'attribute'=>'semester_id',
                'value'=>'semester.name',
                'label'=>'Semester',
                'filter'=>ArrayHelper::map(TblSemester::find()->asArray()->all(),'name','name'),
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'options'=>['prompt'=>'Category'],
                    'pluginOptions'=>['allowClear'=>true],
                ],
            ],

            [
                'attribute'=>'acadamic_year',
                'value'=>'acadamicYear.name',
                'label'=>'Academic Year',
                // 'filter'=>ArrayHelper::map(TblStudAcadYear::find()->asArray()->all(),'id','id'),
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'options'=>['prompt'=>'Category'],
                    'pluginOptions'=>['allowClear'=>true],
                ],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

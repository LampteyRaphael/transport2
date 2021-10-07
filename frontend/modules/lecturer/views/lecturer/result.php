<?php

use common\models\TblAcadamicYear;
use common\models\TblCourse;
use common\models\TblLevel;
use common\models\TblSection;
use common\models\TblSemester;
use common\models\TblStRegistration;
use common\models\TblStudAcadamicYear;
use kartik\form\ActiveForm;
use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = 'Students Course Registered';
$this->params['breadcrumbs'][] = $this->title;
// $this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index']];
?>
    <?php $form = ActiveForm::begin(['action' => Yii::$app->urlManager->createUrl(['/lecturer/lecturer/result'])]); ?>
        <div class="row">
       
            <div class="col-md-2">
                <?= $form->field($model, 'semester')->widget(Select2::className(),[
                    'data'=>ArrayHelper::map(TblSemester::find()->asArray()->all(),'id','name'),
                    'options'=>['placeholder'=>'semester'],
                    'language'=>'en',
                    'pluginOptions'=>[
                        'allowClear'=>true,
                    ]]) ?>
            </div>
           
            <div class="col-md-2">
                <?= $form->field($model, 'level_id')->widget(Select2::className(),[
                    'data'=>ArrayHelper::map(TblLevel::find()->asArray()->all(),'id','level_name'),
                    'options'=>['placeholder'=>'Level'],
                    'language'=>'en',
                    'pluginOptions'=>[
                        'allowClear'=>true,
                    ]]) ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'acadamic_year')->widget(Select2::className(),[
                    'data'=>ArrayHelper::map(TblStudAcadamicYear::find()->asArray()->all(),'id','name'),
                    'options'=>['placeholder'=>'Section'],
                    'language'=>'en',
                    'pluginOptions'=>[
                        'allowClear'=>true,
                    ]]) ?>
            </div>
            <div class="col-md-2">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success float-left mt-4','style'=>'margin-top:20px'])?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>          
       

<!-- < if(!empty($course)): ?> -->
<div class="col">
<?= Html::beginForm(['/lecturer/lecturer/upload'], 'post'); ?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
    'filterRowOptions'=>['class'=>'kartik-sheet-style'],
    'containerOptions' => ['style'=>'overflow: auto'], 
    'tableOptions' => ['class' => 'table table-striped table-hover table-condensed text-left'],

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
    'heading'=>'<h3 class="panel-title">Download Class List</h3>',
    'type' => GridView::TYPE_PRIMARY,
],
    'columns' => [
        ['class' => 'kartik\grid\SerialColumn'],
        [
            'attribute'=>'courseName',
            'label'=>'Courses',
            'value'=>'course.courseName',
        ],
        [
            'attribute'=>'course_number',
            'label'=>'Course Code',
            'value'=>'course.course_number',
        ],
        [
            'attribute'=>'semester',
            'label'=>'Semester',
            'value'=>'course.semester0.name',
        ],
        [
            'attribute'=>'section_id',
            'label'=>'Session',
            'value'=>'section.name',
        ],
        [
            'attribute'=>'level_id',
            'label'=>'Levels',
            'value'=>'course.level.level_name',
        ],
        [
            'attribute'=>'id',
            'label'=>'Total Students',
            'value'=>function($model){
                return TblStRegistration::find()->andwhere(['courese_id'=>$model->course_id])
                ->andWhere(['level_id'=>Yii::$app->session->get('downloadLevel')])
                 ->andWhere(['semester'=>Yii::$app->session->get('downloadsemester')])
                 ->andWhere(['acadamic_year'=>Yii::$app->session->get('downloadacadamic')])
                ->count();
            },
        ],
        ['class' => 'kartik\grid\ActionColumn',
        'template' => '{view} {update} {delete}',
        'width'=>100,
        'buttons' => [
            'view' => function ($url, $model, $key) {
                return Html::a( 'Download', ['/lecturer/lecturer/course','id'=>$model->course_id],[
                        'class'=>'btn btn-primary',
                        'data' => [
                            'method' => 'post',
                        ],
                ]);
            },
            'update' => function ($url, $model, $key) {
                return Html::fileInput('file');
            },
            'delete'=> function($url, $model, $key){
                return  Html::submitButton('Submit Upload',[
                    'class'=>'btn btn-primary',
                    'data' => [
                        'method' => 'post',
                    ],
                ]);
            },
        ],
    ],
        
    ],
]); ?>
<?= Html::endForm(); ?>
</div>
<!-- < endif; ?> -->


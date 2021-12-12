<?php
use yii\bootstrap4\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
$this->title = 'Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-course-index">
    <!-- Navigation Bar -->
    <?php include (Yii::getAlias('@backend/modules/layout/navbar.php'))?>
<!-- End Of Navigation Bar -->
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'containerOptions' => ['style'=>'overflow: auto'], 
        'tableOptions' => ['class' => 'table table-striped table-hover table-condensed text-left'],
        'toolbar' =>  [
        [
            'content'=> 
            Html::button(('Add New Course'), ['class' => 'btn btn-primary','data-toggle'=>"modal", 'data-target'=>"#addCourse"]),
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
        'heading'=>'<h3 class="panel-title">Courses</h3>',
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
                 'detailUrl'=> Yii::$app->request->getBaseUrl().'/courses/tbl-course/details/', 
              ],
            'date:date',
            [
                'attribute'=>'courseName',
                'value'=>'courseName',
                'label'=>'Courses'
            ],
            [
                'attribute'=>'course_number',
                'value'=>'course_number',
                'label'=>'Course Code'
            ],
            [
                'attribute'=>'program_id',
                'value'=>'program.program_name',
                'label'=>'Course Code',
            ],
            
            ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view}',
            'buttons' => [
                'view' => function ($url, $model, $key) {
                    return Html::a ( 'view', ['/courses/tbl-course/view', 'id' => $model->id],['class'=>'btn btn-primary'] );
                },
              ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
<!-- Creating New Courses -->
<div class="modal fade" id="addCourse" tabindex="-1"  aria-hidden="true" data-backdrop="static" data-keyboard="true"  aria-labelledby="staticBackdropLabel">
  <div class="modal-dialog modal-dialog-scrollable modal-xl">
    <div class="modal-content" style="background-color: lightblue;">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel"><b>Create New Course</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <div class="modal-body">
      <?php echo $this->render('_create', ['model' => $model]); ?>
      </div>
    </div>
  </div>
</div> 
<!-- End New Courses -->

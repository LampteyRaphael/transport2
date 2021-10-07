<?php

use common\models\TblAppProgramCategory;
use common\models\TblLevel;
use common\models\TblProgramType;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\program\models\TblProgramSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Programs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-program-index">
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
            Html::button(('Add Program'), ['class' => 'btn btn-primary','data-toggle'=>"modal", 'data-target'=>"#exampleModal"]),
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
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Professional Programs</h3>',
        'type' => GridView::TYPE_PRIMARY,
    ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            'created_at:date',
            'program_name',
            'program_code',

            [
                'attribute'=>'program_category_id',
                'label'=>'Program Category',
                'value'=>'programCategory.name',
                'filter'=>ArrayHelper::map(TblProgramType::find()->asArray()->all(),'name','name'),
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'options'=>['prompt'=>'Program Category'],
                    'pluginOptions'=>['allowClear'=>true],
                ],
            ],


            [
                'attribute'=>'level_id',
                'label'=>'Level',
                'value'=>'level.level_name',
                'filter'=>ArrayHelper::map(TblLevel::find()->asArray()->all(),'level_name','level_name'),
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'options'=>['prompt'=>'Level'],
                    'pluginOptions'=>['allowClear'=>true],
                ],
            ],


            ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view}',
            'width'=>100,
            'buttons' => [
                'view' => function ($url, $model, $key) {
                    return Html::a ( 'view', ['/program/tbl-program/view', 'id' => $model->id],['class'=>'btn btn-primary'] );
                },
                
            ],
        ],
           
        ],
    ]); ?>
    <?php Pjax::end(); ?>

    <div class="modal fade" id="exampleModal" tabindex="-1"  aria-hidden="true" data-backdrop="static" data-keyboard="false"  aria-labelledby="staticBackdropLabel">
  <div class="modal-dialog modal-dialog-scrollable modal-xl">
    <div class="modal-content" style="background-color: lightblue;">
        <div class="modal-header bg-primary">
            <h5 class="modal-title" id="staticBackdropLabel">Add New Program</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <div class="modal-body">
      <?php echo $this->render('_create', ['model' => $model]); ?>
      </div>
      <div class="modal-footer bg-primary">
       </div>
    </div>
  </div>
</div>

</div>
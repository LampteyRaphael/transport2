<?php

use kartik\detail\DetailView;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\modules\application\models\App */

$this->title = 'Applicant Details';
$this->params['breadcrumbs'][] = ['label' => 'Apps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="app-view">
<div class="container" style="background:lightblue; margin-top:-30px;">
<!-- APPLICANT PERSONAL DETAILS -->
<?php include (Yii::getAlias('@backend/modules/layout/personalDetails.php'))?>
<!-- END OF APPLICANT PERSONAL DETAILS -->

<!--  Persoanal Address -->
<?php include (Yii::getAlias('@backend/modules/layout/personalAddress.php'))?>
 <!-- End Of Persoanal Address -->

<!-- Program -->
<?php include (Yii::getAlias('@backend/modules/layout/personalProgram.php'))?>
 <!-- End of Program -->

<!-- Education -->
<?php include (Yii::getAlias('@backend/modules/layout/personalEducation.php'))?>
<!-- End of Education -->

    <!-- Employment -->
    <?php include (Yii::getAlias('@backend/modules/layout/personalEmployment.php'))?>
<!-- End Employment -->

<?php
  $attributes = [
    [
        'group'=>true,
        'label'=>'SECTION:Programs',
        'rowOptions'=>['class'=>'table-info']
    ],
  
    [
        'columns' => [
            [
                'attribute'=>'personal_details_id', 
                'label'=>'Title',
                 'format'=>'raw',
                'value'=>$model->personalDetails->title0->name??'',
                'type'=>DetailView::INPUT_TEXT, 
                'valueColOptions'=>['style'=>'width:30%'],
            ],
            [
                'attribute'=>'personal_details_id', 
                'label'=>'First Name',
                 'format'=>'raw',
                'value'=>$model->personalDetails->first_name??'',
                'type'=>DetailView::INPUT_TEXT, 
            ],
            [
                'attribute'=>'personal_details_id', 
                'label'=>'Middle Name',
                 'format'=>'raw',
                'value'=>$model->personalDetails->middle_name??'',
                'type'=>DetailView::INPUT_TEXT, 
            ],
            [
                'attribute'=>'personal_details_id', 
                'label'=>'Last Name',
                 'format'=>'raw',
                'value'=>$model->personalDetails->last_name??'',
                'type'=>DetailView::INPUT_TEXT, 
            ],
        ],
    ],

    // [
    //     'columns' => [
    //         [
    //             'attribute'=>'amount', 
    //             'label'=>'Amount',
    //             'format'=>'raw',
    //             'type'=>DetailView::INPUT_TEXT, 
    //             'valueColOptions'=>['style'=>'width:30%'],
    //         ],
    //         [
    //             'attribute'=>'program_category_id', 
    //             'label'=>'Program',
    //             'value'=>$model->programCategory->name,
    //             'format'=>'raw', 
    //             'type'=>DetailView::INPUT_SELECT2, 
    //             'widgetOptions'=>[
    //                 'data'=>ArrayHelper::map(TblProgramType::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
    //                 'options' => ['placeholder' => 'Select ...'],
    //                 'pluginOptions' => ['allowClear'=>true, 'width'=>'100%'],
    //             ],
    //             'valueColOptions'=>['style'=>'width:30%'], 
    //         ],
    //     ],
    // ],


    // [
    //     'columns' => [
    //         [
    //             'attribute'=>'created_at', 
    //             'label'=>'Created',
    //             'format'=>'raw',
    //             'displayOnly'=>true,
    //             'valueColOptions'=>['style'=>'width:30%'],
    //         ],
    //     ],
    // ],
    
];
?>

<?=
     DetailView::widget([
        'model' => $model,
        'attributes' => $attributes,
        'mode' => 'view',
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'vAlign'=>true,
        'fadeDelay'=>true,
        'panel' => [
            'heading'=>'',
             'type'=>DetailView::TYPE_PRIMARY,
            'footer' => '<div class="text-center text-muted">Levels</div>'
        ],
        'deleteOptions'=>[
            'params' => ['id' => $model->id, 'kvdelete'=>true],
            'url'=>['delete','id'=>$model->id,'kvdelete'=>true]
        ],
        'container' => ['id'=>'kv-demo'],
        'formOptions' => ['action' => Url::current(['update','id' => $model->id,'updating'=>true])]  // your action to delete
    
    ]);
    ?>



<?php  if(Yii::$app->user->can('qualification permission')):?>
     <?= Html::a('Qualify Applicant', ['qualification', 'id' => $id], ['class' => 'btn btn-primary float-right','data' => ['confirm' => 'Are you sure you want to qualify this applicant?','method' => 'post']]) ?>
<?php endif ?>
       
</div>
</div>

<script>
    document.getElementById('ips-header').style.display="none";
</script>


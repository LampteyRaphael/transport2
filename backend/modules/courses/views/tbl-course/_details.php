<?php

use backend\modules\application\models\App;
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\application\models\AppPersDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'Application Details';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-pers-details-index">
<fieldset>
      <legend>Course & Programs</legend>
      
      <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            [
                'attribute'=>'semester',
                'label'=>'Semester',
                 'value'=>$model->semester0->name??'',
            ],

            [
                'attribute'=>'section_id',
                'label'=>'Section',
                'value'=>$model->section->name??'',
            ],

            [
                'attribute'=>'program_id',
                'label'=>'Program',
                'value'=>$model->program->program_name,
            ],
            [
                'attribute'=>'program_id',
                'label'=>'Program Code',
                'value'=>$model->program->program_code,
            ],

            'course_description:ntext'
            
        ],
    ]) ?>
  </fieldset>


</div>

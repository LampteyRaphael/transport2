<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AccidentRecords */

$this->title = 'Create Accident Records';
$this->params['breadcrumbs'][] = ['label' => 'Accident Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accident-records-create">
<div class="card">
       <div class="card-header bg-primary">
       <h1><?= Html::encode($this->title) ?></h1>
       </div>
       <div class="card-body">
           <p class="card-text">
           <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
           </p>
       </div>
   </div>
</div>

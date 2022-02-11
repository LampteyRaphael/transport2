<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vehicles */

$this->title = 'Create Vehicles';
$this->params['breadcrumbs'][] = ['label' => 'Vehicles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicles-create">
<div class="card">
<div class="card-header bg-primary">
  <h3>Add Vehicle </h3>
</div>
   <div class="card-body">
   <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

   </div>
</div>
  
</div>

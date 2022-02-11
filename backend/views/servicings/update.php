<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Servicings */

$this->title = 'Update Servicing:';
$this->params['breadcrumbs'][] = ['label' => 'Servicings', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="servicings-update">

<div class="card">
   <div class="card-header bg-primary">
      <h1><?= $model->vehicle->make;?></h1> 
   </div>
   <div class="card-body">
      <p class="card-text"> <?= $this->render('_form', [
        'model' => $model,
    ]) ?></p>
   </div>
  
</div>
</div>

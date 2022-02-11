<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Servicings */

$this->title = 'Create Servicings';
$this->params['breadcrumbs'][] = ['label' => 'Servicings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicings-create">

<div class="card">
   <div class="card-header bg-primary">
      <h1>Add Vehicle Servicing</h1> 
   </div>
   <div class="card-body">
      <p class="card-text"> <?= $this->render('_form', [
        'model' => $model,
    ]) ?></p>
   </div>
  
</div>
</div>

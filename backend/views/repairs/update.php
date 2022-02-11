<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Repairs */

$this->title = 'Update Repairs: ' . $model->vehicle->make;
$this->params['breadcrumbs'][] = ['label' => 'Repairs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vehicle->make, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="repairs-update">

<div class="card">
    <div class="card-header bg-primary">
        <h3 class="">Repairs</h3>
    </div>
   <div class="card-body">
       <?= $this->render('_form', ['model' => $model]) ?>
   </div>

</div>
    

</div>

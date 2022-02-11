<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\VehicleGroup */

$this->title = 'Create Vehicle Group';
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-group-create">

<div class="card">
    <div class=" card-header bg-primary">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="card-body">
        <p class="card-text">
        <?= $this->render('_form', ['model' => $model]) ?>
        </p>
    </div>
</div>
  

</div>

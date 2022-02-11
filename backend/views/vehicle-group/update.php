<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\VehicleGroup */

$this->title = 'Update Vehicle Group: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vehicle-group-update">

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

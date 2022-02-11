<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Scrab */

$this->title = 'Update Scrab: ' . $model->vehicle->make;
$this->params['breadcrumbs'][] = ['label' => 'Scrabs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="scrab-update">

<div class="card">
    <div class="card-header bg-primary">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="card-body">
        <p class="card-text"> <?= $this->render('_form', [
        'model' => $model,
    ]) ?></p>
    </div>
</div>

</div>

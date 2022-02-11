<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Reminder */

$this->title = 'Update Reminder: ' . $model->vehicle->make;
$this->params['breadcrumbs'][] = ['label' => 'Reminders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vehicle->make, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reminder-update">

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

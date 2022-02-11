<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Drivers */

$this->title = 'Update Drivers: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Drivers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="drivers-update">
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

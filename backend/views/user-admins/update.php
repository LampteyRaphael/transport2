<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Update User: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

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

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\qualification\models\TblAppQuali */

$this->title = 'Update Tbl App Quali: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl App Qualis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-app-quali-update">
    <div class="box">
        <div class="box-body">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
        </div>
    </div>
</div>

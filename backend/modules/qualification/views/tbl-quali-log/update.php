<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblQualiLog */

$this->title = 'Update Tbl Quali Log: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Quali Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-quali-log-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

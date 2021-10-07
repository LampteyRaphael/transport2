<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\qualification\models\TblAppQualiStatus */

$this->title = 'Update Tbl App Quali Status: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tbl App Quali Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-app-quali-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

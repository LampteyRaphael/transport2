<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\students\models\TblStud */

$this->title = 'Update Tbl Stud: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Studs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-stud-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

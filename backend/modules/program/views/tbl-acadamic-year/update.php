<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblAcadamicYear */

$this->title = 'Update Tbl Acadamic Year: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Acadamic Years', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-acadamic-year-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\students\models\TblStudGrade */

$this->title = 'Update Tbl Stud Grade: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Stud Grades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-stud-grade-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\staff\models\TblStaffList */

$this->title = 'Update Tbl Staff List: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Staff Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-staff-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

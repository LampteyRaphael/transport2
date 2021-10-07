<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\admission\models\TblAppAdmissStatus */

$this->title = 'Update Tbl App Admiss Status: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tbl App Admiss Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-app-admiss-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

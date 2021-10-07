<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\admission\models\TblAdmissLog */

$this->title = 'Update Tbl Admiss Log: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Admiss Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-admiss-log-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

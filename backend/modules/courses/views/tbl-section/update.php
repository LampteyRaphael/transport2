<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\courses\models\TblSection */

$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
?>
<div class="tbl-section-update">

<div class="box">
    <div class="box-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
</div>

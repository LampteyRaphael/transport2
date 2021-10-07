<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblOsn */

$this->title = 'Update Tbl Osn: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Osns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-osn-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

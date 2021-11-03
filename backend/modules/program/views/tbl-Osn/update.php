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
<div class="card">
    <div class="card-header bg-primary">
        OSN Update
    </div>
    <div class="card-body">
        <p class="card-text">
        <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
        </p>
    </div>

</div>
    

</div>

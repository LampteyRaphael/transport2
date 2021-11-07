<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblStudRegistYear */

$this->title = 'Update Tbl Stud Regist Year';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Stud Regist Years', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-stud-regist-year-update">

<div class="card">
    <div class="card-header bg-primary">
        Header
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

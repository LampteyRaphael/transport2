<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblStudsResult */

$this->title = 'Students Results';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Studs Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-studs-result-update">

<div class="card">
    <div class="card-header bg-primary">
        <?= $this->title; ?>
    </div>
    <div class="card-body">
        <p class="card-text"> 
         <?= $this->render('_form', [
                'model' => $model,
        ]) ?></p>
    </div>
</div>
 

</div>

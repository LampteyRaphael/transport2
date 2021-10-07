<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\departments\models\TblDepart */

$this->title = 'Update Departments';
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
?>
<div class="tbl-depart-update">
<div class="box">
   <div class="box-body">
   
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
   </div>
</div>
</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\departments\models\TblDepart */

$this->title = 'Create Departments';
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-depart-create">

<div class="box">
   <div class="box-body">
   
   <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
   </div>
</div>
   
</div>

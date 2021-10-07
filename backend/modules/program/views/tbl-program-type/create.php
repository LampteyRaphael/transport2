<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\program\models\TblProgramType */

$this->title = 'Create Program Category';
$this->params['breadcrumbs'][] = ['label' => 'Program Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-program-type-create">
<div class="box">
 <div class="box-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
 </div>
</div>
</div>

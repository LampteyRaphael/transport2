<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\students\models\TblStudResultCategory */

$this->title = 'Create Result Category';
$this->params['breadcrumbs'][] = ['label' => 'Result Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-stud-result-category-create">

<div class="card">
    <div class="card-header bg-red">
        <h4>New Result category</h4>
    </div>
    <div class="card-body">
        <p class="card-text"> <?= $this->render('_form', [
        'model' => $model,
    ]) ?></p>
    </div>
</div>
   

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblStudRegistYear */

$this->title = 'Create Tbl Stud Regist Year';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Stud Regist Years', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-stud-regist-year-create">

<div class="card">
    <div class="card-header bg-primary">
    <h1>Create New</h1>

    </div>
    <div class="card-body">
        <p class="card-text"><?= $this->render('_form', [
        'model' => $model,
    ]) ?></p>
    </div>
</div>

    

</div>

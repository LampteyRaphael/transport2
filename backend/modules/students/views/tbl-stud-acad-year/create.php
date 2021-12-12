<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblStudAcadYear */

$this->title = 'Create Student Academic Year';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Stud Acad Years', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-stud-acad-year-create">

<div class="card">
    <div class="card-header bg-primary">
        <h4>Academic Year</h4>
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

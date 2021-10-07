<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\admission\models\TblAcadamicYear */

$this->title = 'Academic Year';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-acadamic-year-update">

<div class="box">
    <div class="box-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>

    

</div>

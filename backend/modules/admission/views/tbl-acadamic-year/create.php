<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\admission\models\TblAcadamicYear */

$this->params['breadcrumbs'][] = ['label' => 'Tbl Acadamic Years', 'url' => ['index']];
?>
<div class="tbl-acadamic-year-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

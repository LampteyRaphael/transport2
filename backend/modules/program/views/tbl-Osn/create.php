<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblOsn */

$this->title = 'Create Tbl Osn';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Osns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-osn-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

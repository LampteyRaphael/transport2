<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblOsn */

$this->title = 'Create Osn';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Osns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-osn-create">
<div class="card">
    <div class="card-header bg-primary">
        OSN
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

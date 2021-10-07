<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\staff\models\TblStaffList */

$this->title = 'Create Tbl Staff List';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Staff Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-staff-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

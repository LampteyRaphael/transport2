<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\staff\models\TblStaff */

$this->title = 'Create Tbl Staff';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-staff-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

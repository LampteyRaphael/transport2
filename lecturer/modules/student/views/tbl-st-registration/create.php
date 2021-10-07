<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblStRegistration */

$this->title = 'Create Tbl St Registration';
$this->params['breadcrumbs'][] = ['label' => 'Tbl St Registrations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-st-registration-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

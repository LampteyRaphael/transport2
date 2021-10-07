<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\admission\models\TblAppAdmissStatus */

$this->title = 'Create Tbl App Admiss Status';
$this->params['breadcrumbs'][] = ['label' => 'Tbl App Admiss Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-app-admiss-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

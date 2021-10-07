<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\user\models\TblUser */

$this->title = 'User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
?>
<div class="tbl-user-update">
    <div class="card">
        <div class="card-body">
            <p class="card-text">
            <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
            </p>
        </div>
    </div>
</div>

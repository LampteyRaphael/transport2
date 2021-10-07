<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\students\models\TblStudResultCategory */

$this->title = 'Create Tbl Stud Result Category';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Stud Result Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-stud-result-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

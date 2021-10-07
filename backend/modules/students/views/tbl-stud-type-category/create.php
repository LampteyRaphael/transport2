<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\students\models\TblStudTypeCategory */

$this->title = 'Create Tbl Stud Type Category';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Stud Type Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-stud-type-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

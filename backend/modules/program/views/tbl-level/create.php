<?php


/* @var $this yii\web\View */
/* @var $model common\models\TblLevel */

use yii\bootstrap4\Html;

$this->title = 'Level';
$this->params['breadcrumbs'][] = ['label' => 'Levels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-level-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

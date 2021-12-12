<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblStudsTranscript */

$this->title = 'Update Tbl Studs Transcript: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Studs Transcripts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-studs-transcript-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

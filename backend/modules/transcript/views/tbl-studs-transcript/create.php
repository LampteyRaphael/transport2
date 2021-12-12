<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblStudsTranscript */

$this->title = 'Create Tbl Studs Transcript';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Studs Transcripts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-studs-transcript-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Insurance */

$this->title = 'Update Insurance';
$this->params['breadcrumbs'][] = ['label' => 'Insurances', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="insurance-update">
    <div class="card">
       <div class="card-header bg-primary">
       <h1><?= Html::encode($this->title) ?></h1>
       </div>
       <div class="card-body">
           <p class="card-text">
           <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
           </p>
       </div>
   </div>
</div>

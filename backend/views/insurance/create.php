<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Insurance */

$this->title = 'Create Insurance';
$this->params['breadcrumbs'][] = ['label' => 'Insurances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="insurance-create">
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

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RoadWorthy */

$this->title = 'Update Road Worthy';
$this->params['breadcrumbs'][] = ['label' => 'Road Worthies', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="road-worthy-update">
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


<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Reminder */

$this->title = 'Create Reminder';
$this->params['breadcrumbs'][] = ['label' => 'Reminders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reminder-create">
<div class="card">
<div class="card-header bg-primary">
    <h1><?= Html::encode($this->title) ?></h1>
</div>
<div class="card-body">
        <p class="card-text"> 
            <?= $this->render('_form', ['model' => $model,]) ?>
       </p>
    </div>
</div>
   

</div>
      

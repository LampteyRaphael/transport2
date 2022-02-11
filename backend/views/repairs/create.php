<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Repairs */

$this->title = 'Create Repairs';
$this->params['breadcrumbs'][] = ['label' => 'Repairs', 'url' => ['index']];
?>
<div class="repairs-create">

<div class="card">
    <div class="card-header bg-primary">
        <h3 class="">Repairs</h3>
    </div>
   <div class="card-body">
       <?= $this->render('_form', ['model' => $model]) ?>
   </div>

</div>
    

</div>

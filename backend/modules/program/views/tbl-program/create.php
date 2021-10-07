<?php

use yii\helpers\Html;

$this->title = 'Create Program';
$this->params['breadcrumbs'][] = ['label' => 'Programs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-program-create">

<div class="box">
 <div class="box-body">
    <?= $this->render('_form', ['model' => $model]) ?>
 </div>
</div>
   

</div>

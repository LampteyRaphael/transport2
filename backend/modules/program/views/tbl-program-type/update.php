<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\program\models\TblProgramType */

$this->title = 'Program Category';
$this->params['breadcrumbs'][] = ['label' => 'Program Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<!-- Navigation Bar -->
<?php include (Yii::getAlias('@backend/modules/layout/navbar.php'))?>
<!-- End Of Navigation Bar -->
<div class="tbl-program-type-update">
<div class="box">
 <div class="box-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
 </div>
</div>
</div>

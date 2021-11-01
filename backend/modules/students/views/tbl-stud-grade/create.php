<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\students\models\TblStudGrade */

$this->title = 'Add  Grade';
$this->params['breadcrumbs'][] = ['label' => 'Stud Grades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-stud-grade-create">
<!-- Navigation Bar -->
<?php include (Yii::getAlias('@backend/modules/layout/navbar.php'))?>
<!-- End Of Navigation Bar -->
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

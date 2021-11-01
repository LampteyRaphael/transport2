<?php

use kartik\detail\DetailView;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\modules\application\models\App */

$this->title = 'Applicant Details';
$this->params['breadcrumbs'][] = ['label' => 'Apps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="app-view">
    <div class="container" style="background:lightblue; margin-top:-30px;">
    <!-- APPLICANT PERSONAL DETAILS -->
    <?php include (Yii::getAlias('@backend/modules/layout/personalDetails.php'))?>
    <!-- END OF APPLICANT PERSONAL DETAILS -->

    <!--  Persoanal Address -->
    <?php include (Yii::getAlias('@backend/modules/layout/personalAddress.php'))?>
    <!-- End Of Persoanal Address -->

    <!-- Program -->
    <?php include (Yii::getAlias('@backend/modules/layout/personalProgram.php'))?>
    <!-- End of Program -->

    <!-- Education -->
    <?php include (Yii::getAlias('@backend/modules/layout/personalEducation.php'))?>
    <!-- End of Education -->

        <!-- Employment -->
        <?php include (Yii::getAlias('@backend/modules/layout/personalEmployment.php'))?>
    <!-- End Employment -->

    <?php  if(Yii::$app->user->can('qualification permission')):?>

        <?= Html::a('Qualify Applicant', ['qualification', 'id' => $id], ['class' => 'btn btn-primary float-right','data' => ['confirm' => 'Are you sure you want to qualify this applicant?','method' => 'post']]) ?>
        
    <?php endif ?>
    <br><br><br>
        
    </div>
</div>

<script>
    document.getElementById('ips-header').style.display="none";
</script>


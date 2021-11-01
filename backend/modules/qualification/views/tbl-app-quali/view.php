<?php

use common\models\AppRegisteredCourses;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TblAppQuali */

$this->title = 'Qualification';
$this->params['breadcrumbs'][] = ['label' => 'Qualified Applicant', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-app-quali-view">  
   <div class="container" style="background:lightblue; margin-top:-30px;">
 <!-- APPLICANT PERSONAL INFORMATION -->
 <?php include (Yii::getAlias('@backend/modules/layout/personalDetails.php'))?>
<!-- END OF APPLICANT PERSONAL INFORMATIONS -->

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
<?php  if(Yii::$app->user->can('admission permission')):?>
  <?= Html::a('Admit Applicant\'s', ['qualification', 'id' => $id], ['class' => 'btn btn-success float-right','data' => ['confirm' => 'Are you sure you want to admit this applicant?','method' => 'post']]) ?>   
  <?= Html::a('Reject Applicant\'s', ['delete', 'id' => $id], ['class' => 'btn btn-danger float-right','data' => ['confirm' => 'Are you sure you want to admit this applicant?','method' => 'post']]) ?> 
<?php endif ?>
<br><br>
    </div>
</div>

<script>
    document.getElementById('ips-header').style.display="none";
</script>
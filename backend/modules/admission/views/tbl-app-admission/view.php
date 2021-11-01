<?php
use yii\bootstrap4\Html;
use yii\widgets\ActiveForm;
$this->title = 'Admission';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-app-admission-view">
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


            <?php  if(Yii::$app->user->can('admission permission')):?>

             <?= Html::a('Migrate Student', ['register','id' => $id], ['class' => 'btn btn-primary float-right','data' => ['method' => 'post']])?>  
            <!-- End Employment -->
            <?= Html::a('download admission letter', ['download','id' => $id], ['class' => 'btn btn-danger float-right','data' => ['confirm' => 'Are you sure you want to download admitted applicant admission letter?','method' => 'post']])?>

            <?php endif ?>
         
            <br><br>
    </div>
</div>
    <script>
        document.getElementById('ips-header').style.display="none";
    </script>
</div>




             


<!-- APPLICANT PERSONAL DETAILS -->

<!-- END OF APPLICANT PERSONAL DETAILS -->

<!--  PROGRAM APPLICANT APPLIED FOR -->

<!-- END OF PROGRAM APPLICANT APPLIED FOR -->

<!-- EDUCATIONAL BACKGROUND DETAILS -->

<!-- END OF EDUCATIONAL BACKGROUND -->

<!-- EMPLOYMENT DETAILS OF THE APPLICANT -->

              
     
<!-- END OF EMPLOYMENT DETAILS -->


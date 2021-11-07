<?php
$this->title='Student Info';
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
?>
<div class="tbl-stud-view">
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
   </div> 
</div>




<?php



/* @var $this yii\web\View */
/* @var $model backend\modules\students\models\TblStud */

use common\models\TblAppStudProgram;
use common\models\TblCountry;
use common\models\TblLevel;
use common\models\TblProgram;
use common\models\TblSection;
use common\models\TblSemester;
use common\models\TblStudPersDetails;
use common\models\TblTitleTb;
use kartik\detail\DetailView;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\Pjax;


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
<script>
    document.getElementById('ips-header').style.display="none";
</script>
</div>







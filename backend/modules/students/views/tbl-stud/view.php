<?php

use yii\bootstrap4\Nav;

$this->title='Student Info';
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
?>

<div class="tbl-stud-view">


<!-- Header -->

<div class="card">
        <div class="card-header bg-primary">
            <h4>
              <b><?= $modelp->title0->name . ' ' .  $modelp->first_name . ' ' . $modelp->middle_name. ' ' . $modelp->last_name; ?></b>
            </h4>
        </div>
        <div class="card-body">
            <p class="card-text">
            <?php
            echo Nav::widget([
              'options'=>['class'=>'nav nav-tabs','id'=>"nav-tab",'style'=>'font-size:15px; '],
              'items'=>[
                ['label'=>'Student Info','url'=>['/students/tbl-stud/view','id'=>$id],['class'=>'nav-link','id'=>'program','role'=>'tab']],
                ['label'=>'Registed Courses','url'=>['/students/tbl-st-registration/view','id'=>$id],['class'=>'nav-link','id'=>'level','role'=>'tab']],
                ['label' => 'Results', 'icon' => 'user', 'url' => ['/students/tbl-studs-result/view','id'=>$id]],  
                // ['label'=>'Semester','url'=>['/courses/tbl-semester/index'],['class'=>'nav-link','id'=>'semester','role'=>'tab']],
                // ['label'=>'Section','url'=>['/courses/tbl-section/index'],['class'=>'nav-link','id'=>'sec','role'=>'tab']],
                // ['label'=>'Accademic Year','url'=>['/program/tbl-acadamic-year/index'],['class'=>'nav-link','id'=>'doc','role'=>'tab']],
                // ['label'=>'Osn','url'=>['/program/tbl-osn/index'],['class'=>'nav-link','id'=>'dec','role'=>'tab']],
              ]
            ]);
            ?>
            </p>
        </div>
    </div>

<!-- End Of Header -->

<div class="card-body">
        <p class="card-text">
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
        </p>
    </div>
</div>




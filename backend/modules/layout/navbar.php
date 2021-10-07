<?php

use yii\bootstrap4\Nav;

?>
<div class="col-12">
    <?php
    echo Nav::widget([
      'options'=>['class'=>'nav nav-tabs nav-pills','id'=>"nav-tab",'style'=>'font-size:15px; '],
      'items'=>[
        ['label'=>'Programs','url'=>['/program/tbl-program/index'],['class'=>'nav-link','id'=>'program','role'=>'tab']],
        ['label'=>'Levels','url'=>['/program/tbl-level/index'],['class'=>'nav-link','id'=>'level','role'=>'tab']],
        ['label'=>'Courses','url'=>['/courses/tbl-course/index'],['class'=>'nav-link','id'=>'course','role'=>'tab']],
        ['label'=>'Semester','url'=>['/courses/tbl-semester/index'],['class'=>'nav-link','id'=>'semester','role'=>'tab']],
        ['label'=>'Session','url'=>['/courses/tbl-section/index'],['class'=>'nav-link','id'=>'sec','role'=>'tab']],
        ['label'=>'Academic Year','url'=>['/program/tbl-acadamic-year/index'],['class'=>'nav-link','id'=>'doc','role'=>'tab']],
        ['label'=>'Osn','url'=>['/program/tbl-osn/index'],['class'=>'nav-link','id'=>'dec','role'=>'tab']],
      ]
    ]);
    ?>
  </div>


  
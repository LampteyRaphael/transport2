<?php

use yii\bootstrap4\Nav;

?>
<div class="col-12">
    <?php
    echo Nav::widget([
      'options'=>['class'=>'nav nav-tabs nav-tabs','id'=>"nav-tab",'style'=>'font-size:15px; '],
      'items'=>[
        ['label'=>'Levels','url'=>['/'],['class'=>'nav-link','id'=>'level','role'=>'tab']],
        ['label'=>'Program','url'=>['/'],['class'=>'nav-link','id'=>'program','role'=>'tab']],
        ['label'=>'Courses','url'=>['/'],['class'=>'nav-link','id'=>'course','role'=>'tab']],
        ['label'=>'Semester','url'=>['/'],['class'=>'nav-link','id'=>'semester','role'=>'tab']],
        ['label'=>'Section','url'=>['/courses/tbl-section/index'],['class'=>'nav-link','id'=>'sec','role'=>'tab']],
        ['label'=>'Accademic Year','url'=>['/program/tbl-acadamic-year/index'],['class'=>'nav-link','id'=>'doc','role'=>'tab']],
        ['label'=>'Osn','url'=>['/program/tbl-osn/index'],['class'=>'nav-link','id'=>'dec','role'=>'tab']],
      ]
    ]);
    ?>
  </div>


  
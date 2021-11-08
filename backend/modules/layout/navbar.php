<?php

use yii\bootstrap4\Nav;

?>
<div class="col-12">
  <div class="card">
    <div class="card-header bg-primary">
      <h4>
        <b>Institute Of Professional Studies</b>
      </h4>
    </div>
    <div class="card-body">
      <p class="card-text">
          <?php
            echo Nav::widget([
              'options'=>['class'=>'nav nav-tabs','id'=>"nav-tab",'style'=>'font-size:15px; '],
              'items'=>[
                ['label'=>'Programs','url'=>['/program/tbl-program/index'],['class'=>'nav-link','id'=>'program','role'=>'tab']],
                ['label'=>'Levels','url'=>['/program/tbl-level/index'],['class'=>'nav-link','id'=>'level','role'=>'tab']],
                ['label'=>'Courses','url'=>['/courses/tbl-course/index'],['class'=>'nav-link','id'=>'course','role'=>'tab']],
                ['label'=>'Semester','url'=>['/courses/tbl-semester/index'],['class'=>'nav-link','id'=>'semester','role'=>'tab']],
                ['label'=>'Session','url'=>['/courses/tbl-section/index'],['class'=>'nav-link','id'=>'sec','role'=>'tab']],
                ['label'=>'Admission Academic Year','url'=>['/program/tbl-acadamic-year/index'],['class'=>'nav-link','id'=>'doc','role'=>'tab']],
                ['label'=>'Osn','url'=>['/program/tbl-osn/index'],['class'=>'nav-link','id'=>'dec','role'=>'tab']],
                ['label'=>'Grade','url'=>['/students/tbl-stud-grade/index'],['class'=>'nav-link','id'=>'dec','role'=>'tab']],
                ['label'=>'Result Category','url'=>['/students/tbl-stud-result-category/index'],['class'=>'nav-link','id'=>'dec','role'=>'tab']],
                ['label'=>'Students Status','url'=>['/students/tbl-stud-status/index'],['class'=>'nav-link','id'=>'dec','role'=>'tab']],
                ['label'=>'Programme Category','url'=>['/program/tbl-program-type/index'],['class'=>'nav-link','id'=>'dec','role'=>'tab']],
                ['label'=>'Students Academic Year','url'=>['/students/tbl-stud-acad-year/index'],['class'=>'nav-link','id'=>'dec','role'=>'tab']],
                ['label'=>'Students Course Registration','url'=>['/program/tbl-stud-regist-year'],['class'=>'nav-link','id'=>'dec','role'=>'tab']],
              ]
            ]);
          ?>
      </p>
    </div>
  
  </div>
  
  </div>


  
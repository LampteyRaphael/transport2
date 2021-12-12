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
                ['label'=>'Semesters','url'=>['/courses/tbl-semester/index'],['class'=>'nav-link','id'=>'semester','role'=>'tab']],
                ['label'=>'Sessions','url'=>['/courses/tbl-section/index'],['class'=>'nav-link','id'=>'sec','role'=>'tab']],
                ['label'=>'Admissions Academic Years','url'=>['/program/tbl-acadamic-year/index'],['class'=>'nav-link','id'=>'doc','role'=>'tab']],
                ['label'=>'Osn','url'=>['/program/tbl-osn/index'],['class'=>'nav-link','id'=>'dec','role'=>'tab']],
                ['label'=>'Grades','url'=>['/students/tbl-stud-grade/index'],['class'=>'nav-link','id'=>'dec','role'=>'tab']],
                // ['label'=>'Result Category','url'=>['/students/tbl-stud-result-category/index'],['class'=>'nav-link','id'=>'dec','role'=>'tab']],
                ['label'=>'Students Status','url'=>['/students/tbl-stud-status/index'],['class'=>'nav-link','id'=>'dec','role'=>'tab']],
                ['label'=>'Programmes Category','url'=>['/program/tbl-program-type/index'],['class'=>'nav-link','id'=>'dec','role'=>'tab']],
                ['label'=>'Students Academic Year','url'=>['/students/tbl-stud-acad-year/index'],['class'=>'nav-link','id'=>'dec','role'=>'tab']],
                ['label'=>'Students Course Registration','url'=>['/program/tbl-stud-regist-year/index'],['class'=>'nav-link','id'=>'dec','role'=>'tab']],
                ['label' => 'Permissions', 'url'=>['/admin/assignment/index'],'icon' => 'users'],
                ['label' => 'Roles', 'url'=>['/admin/role/index'],'icon' => 'users'],
              ]
            ]);
          ?>
      </p>
    </div>
  
  </div>
  
  </div>


  
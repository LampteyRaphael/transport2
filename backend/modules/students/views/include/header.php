<?php

use yii\bootstrap4\Nav;
?>
<?php


echo Nav::widget([
  'options'=>['class'=>'nav nav-tabs nav-pills','id'=>"nav-tab",'style'=>'font-size:15px; '],
  'items'=>[
    ['label'=>'Students And Course Registration','url'=>['/students/tbl-st-registration/index'],['class'=>'nav-link','id'=>'program','role'=>'tab']],
    ['label'=>'Registered Courses','url'=>['/students/tbl-regis-course/index'],['class'=>'nav-link','id'=>'level','role'=>'tab']],
    // ['label'=>'Courses','url'=>['/courses/tbl-course/index'],['class'=>'nav-link','id'=>'course','role'=>'tab']],
    // ['label'=>'Semester','url'=>['/courses/tbl-semester/index'],['class'=>'nav-link','id'=>'semester','role'=>'tab']],
    // ['label'=>'Section','url'=>['/courses/tbl-section/index'],['class'=>'nav-link','id'=>'sec','role'=>'tab']],
    // ['label'=>'Accademic Year','url'=>['/program/tbl-acadamic-year/index'],['class'=>'nav-link','id'=>'doc','role'=>'tab']],
    // ['label'=>'Osn','url'=>['/program/tbl-osn/index'],['class'=>'nav-link','id'=>'dec','role'=>'tab']],
  ]
]);
?>
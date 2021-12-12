<?php

use common\models\TblStudsResult;
use yii\bootstrap4\Nav;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TblStudsResult */

$this->title = 'Results';
$this->params['breadcrumbs'][] = ['label' => 'Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<!-- Header -->

<div class="card">
        <div class="card-header bg-primary">
            <h4>
                <b><?= $name;?></b>
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

<div class="tbl-studs-result-view">

<div class="row">
</div><div class="card">
    <div class="card-header bg-primary">
       <h4>
           <b>Results</b>
       </h4>
    </div>
    <div class="card-body">
        <p class="card-text">
        <div class=" table-responsive">
        <table class="table table-striped">
                <?php foreach($studAcad as $acadamicyear): ?>
                    <?php $result=TblStudsResult::find()->andwhere(['student_id'=>$id])->andWhere(['status'=>5])->andWhere(['acadamic_year'=>$acadamicyear->id])->all();?>
                    <thead>
                                <tr>
                                    <th><?= $acadamicyear->semester0->name??''?></th>
                                    <th><?= $acadamicyear->studAcadamicYear->date_of_admission?></th>
                                    <th></th>
                                </tr>
                                <tr class="thead-light">
                                        <th>Course No.</th>
                                        <th>Course Title</th>
                                        <th>Grade</th>
                                        <!-- <th>Grade Point</th> -->
                                    </tr>
                    </thead>
                    <?php foreach($result as $result): ?>
                    <tbody>
                        <tr>
                        <td><?= $result->course->course_number??''?></td>
                        <td><?= $result->course->courseName??''?></td>
                        <td><?= $result->grade->grade_name??''?></td>
                        <!-- <td>< $result->grade->grade_point??''?></td> -->
                    </tr>
                    </tbody>
                   
                    <?php endforeach;?>
                <?php endforeach;?>
               
        </table>
        </div>
        
        </p>
    </div>
  </div>

</div>


</div>

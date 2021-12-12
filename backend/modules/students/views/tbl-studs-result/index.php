<?php

use common\models\TblStudsResult;

$this->title = 'Results';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-studs-result-index">
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
                    <?php foreach(TblStudsResult::find()->andwhere(['student_id'=>$id])->andWhere(['acadamic_year'=>$acadamicyear->id])->all() as $result): ?>
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

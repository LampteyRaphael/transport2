<?php

use common\models\TblCourse;

$this->title = 'IPS Dashboard';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3><?= $admission??'';?></h3>

          <p>Application</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3><?= $qualification??''; ?><sup style="font-size: 20px"></sup></h3>

          <p>Qualification</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3><?= $admission??''; ?></h3>

          <p>Admission</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3><?= $admission??''; ?></h3>

          <p>Admission</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  
  </div>



  <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Lecturer</span>
          <span class="info-box-number">
            
            <small><?= $lecturer;?></small>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Staff</span>
          <span class="info-box-number"><?= $staff;?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Students</span>
          <span class="info-box-number"><?= $students;?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>

        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">System Admins</span>
          <span class="info-box-number"><?= $userAdmins;?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>

<div class="row">
  <div class="card col-6">
    <div class="card-header border-transparent">
      <h3 class="card-title">Program Details</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>

    
    <!-- /.card-header -->
    <div class="card-body p-0">
      <div class="table-responsive">
      <div id="billed_sample_today">1</div>
      <div id="bleeded_sample_today">2</div>
      <div id="completed_sample_today">3</div>
      <div id="pending_sample_today">4</div>

      <canvas id="myPieChart"></canvas>
     
      <!-- /.table-responsive -->
      </div>

  </div>

    </div>




    <div class="card col-6">
    <div class="card-header border-transparent">
      <h3 class="card-title">Programs</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>

    
    <!-- /.card-header -->
    <div class="card-body p-0">
      <div class="table-responsive">
      <div id="b1">1</div>
      <div id="b2">2</div>
      <div id="b3">3</div>
      <div id="b4">4</div>

      <canvas id="bchart"></canvas>
     
      <!-- /.table-responsive -->
      </div>

  </div>

    </div>


</div>



<?php if($programs):?>

          <?php foreach($programs as $program):?>
            
              <!-- < $course=TblCourse::find()->where(['program_id'=>$program->id])->select('id')->count();?> -->
            </div>

          <?php endforeach;?>
        
        <?php endif;?>
      

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3"></script>

<script>
  var mychart = document.getElementById("myPieChart").getContext('2d');
   new Chart(mychart, {
    type: 'doughnut',
    data: {
      labels: ['Billed Samples (Today)', 'Collected Samples (Today)', 'Completed Test (Today)', 'Pending For Validation'],
      datasets: [{
        lable: 'Samples',
        data: [
          document.getElementById('billed_sample_today').innerHTML,
          document.getElementById('bleeded_sample_today').innerHTML,
          document.getElementById('completed_sample_today').innerHTML,
          document.getElementById('pending_sample_today').innerHTML
        ],
        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }]
    }

  })

</script>

<script>
  var vp = document.getElementById("bchart").getContext('2d');
  new Chart(vp, {
    type: 'bar',
    data: {
      labels: ['Billed Samples (Today)', 'Collected Samples (Today)', 'Completed Test (Today)', 'Pending For Validation'],
      datasets: [{
        lable: 'Sampless',
        data: [
          document.getElementById('b1').innerHTML,
          document.getElementById('b2').innerHTML,
          document.getElementById('b3').innerHTML,
          document.getElementById('b4').innerHTML
        ],
        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 6)",
      }]
    }

  })

</script>





    <div>
</div>


</div>
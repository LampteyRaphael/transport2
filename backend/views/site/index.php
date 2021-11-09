<?php

use common\models\TblApp;
use common\models\TblCourse;
use common\models\TblStaffList;

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
          <h3><?= $osn??''; ?></h3>

          <p>Non Use OSN</p>
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
      <h3 class="card-title">Levels With Number Of Courses</h3>

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
      <canvas id="myPieChart"></canvas>
      <!-- /.table-responsive -->
      </div>

  </div>

    </div>




    <div class="card col-6">
    <div class="card-header border-transparent">
      <h3 class="card-title">Programmes With Number Of Courses</h3>

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
      <canvas id="bchart"></canvas>
      <!-- /.table-responsive -->
      </div>

  </div>
    </div>


    <div class="card col-6">
    <div class="card-header border-transparent">
      <h3 class="card-title">Application Chart</h3>

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
     <canvas id="myChart" ></canvas>
      </div>
  </div>
    </div>


    <div class="card col-6">
    <div class="card-header border-transparent">
      <h3 class="card-title">Department with Number Of Admins Chart</h3>

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
     <canvas id="myChart2" ></canvas>
      </div>
  </div>
    </div>


</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3"></script>

<script>
  var mychart = document.getElementById("myPieChart").getContext('2d');
   new Chart(mychart, {
    type: 'doughnut',
    data: {
      labels: [
        <?php foreach($levels as $level):?>
              "<?= $level->level_name?>",
        <?php endforeach;?>
      ],
      datasets: [{
        data: [
          <?php foreach($levels as $level):?>
              "<?= TblCourse::find()->where(['level_id'=>$level->id])->count();?>",
        <?php endforeach;?>
        ],
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],

        // backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#17a673', '#2c9faf'],
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
      labels: [
        <?php foreach($programs as $program):?>
              "<?= $program->program_name?>",
        <?php endforeach;?>
      ],
      datasets: [{
        data: [
          <?php foreach($programs as $program):?>
              "<?= TblCourse::find()->where(['program_id'=>$program->id])->count();?>",
        <?php endforeach;?>
        ],
        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc','#4e71df', '#1cc28a', '#30b9cc'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 6)",
      }]
    }
  })
</script>

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['jan','feb','mar','apr','may','june','july','aug','sep','oct','nov','dec'],
        datasets: [{
            label: '# of Monthly Application',
            data: [
              <?php for($num=1; $num<=12; $num++):?>

              "<?= TblApp::find()->andwhere(['year(created_at)'=>date('Y')])->andwhere(['month(created_at)'=>date($num)])->count();?>",

             <?php endfor;?>
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<script>
var ctx = document.getElementById('myChart2').getContext('2d');
new Chart(ctx, {
    type: 'horizontalBar',
    data: {
      labels: [
        <?php foreach($department as $departments):?>
              "<?= $departments->department_name?>",
        <?php endforeach;?>
      ],
      datasets: [{
        data: [
          <?php foreach($department as $departments):?>
              "<?= TblStaffList::find()->where(['depart_id'=>$departments->id])->count();?>",
        <?php endforeach;?>
        ],
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],

        // backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc','#4e71df', '#1cc28a', '#30b9cc'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 6)",
      }]
    }
  })
</script>

    <div>
</div>


</div>
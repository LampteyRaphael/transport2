<?php
$this->title = 'Starter Page';
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
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3><?= $reject??''; ?></h3>

          <p>Rejected</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
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
          <span class="info-box-text">System Admins</span>
          <span class="info-box-number">
            
            <small><?= $sysAdmins??'';?></small>
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
          <span class="info-box-text">Credits</span>
          <span class="info-box-number">41,410</span>
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
          <span class="info-box-text">Sales</span>
          <span class="info-box-number">760</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">New Members</span>
          <span class="info-box-number">2,000</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>



  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Monthly Recap Report</h5>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <div class="btn-group">
              <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                <i class="fas fa-wrench"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right" role="menu">
                <a href="#" class="dropdown-item">Action</a>
                <a href="#" class="dropdown-item">Another action</a>
                <a href="#" class="dropdown-item">Something else here</a>
                <a class="dropdown-divider"></a>
                <a href="#" class="dropdown-item">Separated link</a>
              </div>
            </div>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">
              <p class="text-center">
                <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
              </p>

              <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <!-- Sales Chart Canvas -->
                <canvas id="salesChart" height="360" style="height: 180px; display: block; width: 747px;" width="1494" class="chartjs-render-monitor"></canvas>
              </div>
              <!-- /.chart-responsive -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <p class="text-center">
                <strong>Goal Completion</strong>
              </p>

              <div class="progress-group">
                Add Products to Cart
                <span class="float-right"><b>160</b>/200</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-primary" style="width: 80%"></div>
                </div>
              </div>
              <!-- /.progress-group -->

              <div class="progress-group">
                Complete Purchase
                <span class="float-right"><b>310</b>/400</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-danger" style="width: 75%"></div>
                </div>
              </div>

              <!-- /.progress-group -->
              <div class="progress-group">
                <span class="progress-text">Visit Premium Page</span>
                <span class="float-right"><b>480</b>/800</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-success" style="width: 60%"></div>
                </div>
              </div>

              <!-- /.progress-group -->
              <div class="progress-group">
                Send Inquiries
                <span class="float-right"><b>250</b>/500</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-warning" style="width: 50%"></div>
                </div>
              </div>
              <!-- /.progress-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- ./card-body -->
        <div class="card-footer">
          <div class="row">
            <div class="col-sm-3 col-6">
              <div class="description-block border-right">
                <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                <h5 class="description-header">$35,210.43</h5>
                <span class="description-text">TOTAL REVENUE</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-6">
              <div class="description-block border-right">
                <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                <h5 class="description-header">$10,390.90</h5>
                <span class="description-text">TOTAL COST</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-6">
              <div class="description-block border-right">
                <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                <h5 class="description-header">$24,813.53</h5>
                <span class="description-text">TOTAL PROFIT</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-6">
              <div class="description-block">
                <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                <h5 class="description-header">1200</h5>
                <span class="description-text">GOAL COMPLETIONS</span>
              </div>
              <!-- /.description-block -->
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>

<div class="row">



  <div class="card col-6">
    <div class="card-header border-transparent">
      <h3 class="card-title">Latest asss</h3>

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
        <table class="table m-0">
          <thead>
          <tr>
            <th>Order ID</th>
            <th>Item</th>
            <th>Status</th>
            <th>Popularity</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td><a href="pages/examples/invoice.html">OR9842</a></td>
            <td>Call of Duty IV</td>
            <td><span class="badge badge-success">Shipped</span></td>
            <td>
              <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
            </td>
          </tr>
          <tr>
            <td><a href="pages/examples/invoice.html">OR1848</a></td>
            <td>Samsung Smart TV</td>
            <td><span class="badge badge-warning">Pending</span></td>
            <td>
              <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
            </td>
          </tr>
          <tr>
            <td><a href="pages/examples/invoice.html">OR7429</a></td>
            <td>iPhone 6 Plus</td>
            <td><span class="badge badge-danger">Delivered</span></td>
            <td>
              <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
            </td>
          </tr>
          <tr>
            <td><a href="pages/examples/invoice.html">OR7429</a></td>
            <td>Samsung Smart TV</td>
            <td><span class="badge badge-info">Processing</span></td>
            <td>
              <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
            </td>
          </tr>
          <tr>
            <td><a href="pages/examples/invoice.html">OR1848</a></td>
            <td>Samsung Smart TV</td>
            <td><span class="badge badge-warning">Pending</span></td>
            <td>
              <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
            </td>
          </tr>
          <tr>
            <td><a href="pages/examples/invoice.html">OR7429</a></td>
            <td>iPhone 6 Plus</td>
            <td><span class="badge badge-danger">Delivered</span></td>
            <td>
              <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
            </td>
          </tr>
          <tr>
            <td><a href="pages/examples/invoice.html">OR9842</a></td>
            <td>Call of Duty IV</td>
            <td><span class="badge badge-success">Shipped</span></td>
            <td>
              <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
      <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
    </div>
    <!-- /.card-footer -->
  </div>

    <div class="row">
        <div class="col-lg-6">
            <?= \hail812\adminlte\widgets\Alert::widget([
                'type' => 'success',
                'body' => '<h3>Congratulations!</h3>',
            ]) ?>
            <?= \hail812\adminlte\widgets\Callout::widget([
                'type' => 'danger',
                'head' => 'I am a danger callout!',
                'body' => 'There is a problem that we need to fix. A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.'
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Messages',
                'number' => '1,410',
                'icon' => 'far fa-envelope',
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Bookmarks',
                'number' => '410',
                 'theme' => 'success',
                'icon' => 'far fa-flag',
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Uploads',
                'number' => '13,648',
                'theme' => 'gradient-warning',
                'icon' => 'far fa-copy',
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Bookmarks',
                'number' => '41,410',
                'icon' => 'far fa-bookmark',
                'progress' => [
                    'width' => '70%',
                    'description' => '70% Increase in 30 Days'
                ]
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?php $infoBox = \hail812\adminlte\widgets\InfoBox::begin([
                'text' => 'Likes',
                'number' => '41,410',
                'theme' => 'success',
                'icon' => 'far fa-thumbs-up',
                'progress' => [
                    'width' => '70%',
                    'description' => '70% Increase in 30 Days'
                ]
            ]) ?>
            <?= \hail812\adminlte\widgets\Ribbon::widget([
                'id' => $infoBox->id.'-ribbon',
                'text' => 'Ribbon',
            ]) ?>
            <?php \hail812\adminlte\widgets\InfoBox::end() ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Events',
                'number' => '41,410',
                'theme' => 'gradient-warning',
                'icon' => 'far fa-calendar-alt',
                'progress' => [
                    'width' => '70%',
                    'description' => '70% Increase in 30 Days'
                ],
                'loadingStyle' => true
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => '150',
                'text' => 'New Orders',
                'icon' => 'fas fa-shopping-cart',
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?php $smallBox = \hail812\adminlte\widgets\SmallBox::begin([
                'title' => '150',
                'text' => 'New Orders',
                'icon' => 'fas fa-shopping-cart',
                'theme' => 'success'
            ]) ?>
            <?= \hail812\adminlte\widgets\Ribbon::widget([
                'id' => $smallBox->id.'-ribbon',
                'text' => 'Ribbon',
                'theme' => 'warning',
                'size' => 'lg',
                'textSize' => 'lg'
            ]) ?>
            <?php \hail812\adminlte\widgets\SmallBox::end() ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => '44',
                'text' => 'User Registrations',
                'icon' => 'fas fa-user-plus',
                'theme' => 'gradient-success',
                'loadingStyle' => true
            ]) ?>
        </div>
    </div>
</div>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="/images/logo.png" alt="IPS" class="brand-image elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>IPS</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= Yii::$app->user->identity->username??'' ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped  -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        < Sidebar Menu -->
        <nav class="mt-2">
        <?php if(Yii::$app->user->can('student')): ?>
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Student Info', 'url'=>['/student'], 'icon' => 'user'],
                    ['label' => 'Registered Courses', 'url' => ['/student/tbl-st-registration/index'], 'iconStyle' => 'fa fa-bookmark'],
                    ['label' => 'Course Registration',  'iconStyle' => 'far', 'url' => ['/student/tbl-course/index']],
                    ['label' => 'Examination Result',  'iconStyle' => 'far', 'url' => ['/student/tbl-st-registration/result']],

                ],
            ]);
            ?>
         <?php elseif(Yii::$app->user->can('lecturer')):?>
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Lecturer Info', 'url'=>['/lecturer/lecturer/index'], 'icon' => 'user'],
                    ['label' => 'Registered Courses', 'url' => ['/lecturer/lecturer/courses'], 'iconStyle' => 'fa fa-bookmark'],
                    ['label' => 'Result',  'iconStyle' => 'far', 'url' => ['/lecturer/lecturer/result']],
                    ['label' => 'Lecturer Result',  'iconStyle' => 'far', 'url' => ['/lecturer/tbl-studs-result/index']],
                ],
            ]);
            ?>
        <?php endif;  ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
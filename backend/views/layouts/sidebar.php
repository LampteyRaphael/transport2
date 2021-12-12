<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <b class=" tect-center text-uppercase">UNIVERSITY</b>
        <!-- <img src="/images/logo.png" alt="AdminLTE Logo" class="brand-image bg-white elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-bold text-uppercase"><b>-IPS</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="image/upsa3.jpg" class="img-circle elevation-2" alt="User Image">
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
            <?php
             
             $hod=[];
             $dean = [];
             $publisher = [];
             $transcript = [];

            if(Yii::$app->user->can('hod permission')){
               $hod= ['label' => 'Students Result',  'icon' => 'fa fa-reply', 'url' => ['/hod/tbl-studs-result/index']];
            }
            
            if(Yii::$app->user->can('dean permission')){
              $dean=['label' => 'Students Result', 'icon' => 'fa fa-reply', 'url' => ['/dean/tbl-studs-result/index']];
            }
            
            if(Yii::$app->user->can('publisher permission')){
                $publisher=['label' => 'Students Result', 'icon' => 'fa fa-reply', 'url' => ['/publisher/tbl-studs-result/index']];
            }
            
            if(Yii::$app->user->can('transcript permission')){
                $transcript=['label' => 'Students Transcript', 'icon' => 'fa fa-reply', 'url' => ['/transcript/tbl-studs-transcript/index']]; 
            }

            ?>
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Dashboard', 'url'=>['/site/index'], 'icon' => 'th', 'badge' => '<span class="right badge badge-danger">New</span>'],

                    ['label' => 'Users', 'url' => ['/user/tbl-user/index'], 'icon' => 'users'],
                   
                    // [
                    //     'label' => 'Applicants',
                    //     'icon' => 'tachometer-alt',
                        // 'badge' => '<span class="right badge badge-info">2</span>',
                        // 'items'=>[
                            // ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                            ['label' => 'Applications',  'icon' => 'fa fa-address-book', 'url' => ['/application/app/index']],
                            ['label' => 'Qualifications', 'icon' => 'fa fa-address-book', 'url' => ['/qualification/tbl-app-quali/index']],
                            ['label' => 'Admissions', 'icon' => 'fa fa-address-book', 'url' => ['/admission/tbl-app-admission/index']],
                        // ]
                    // ],

                    ['label' => 'Finance',  'icon' => 'fas fa-wallet', 'url' => ['/payment/tbl-payment/index']],


                    ['label' => 'Students', 'icon' => 'users', 'url' => ['/students/tbl-stud/index']],

                    [
                        'label' => 'Examinations',
                        'icon' => 'fa fa-tasks',
                        // 'badge' => '<span class="right badge badge-info">2</span>',
                        'items'=> [$hod,$dean,$publisher,$transcript],
                        // [
                            // ['label' => 'Students Result',  'icon' => 'fa fa-reply', 'url' => ['/hod/tbl-studs-result/index','visible' => Yii::$app->user->can('backend students permission')]],
                            // ['label' => 'Students Result', 'icon' => 'fa fa-reply', 'url' => ['/dean/tbl-studs-result/index']], 
                            // ['label' => 'Students Result', 'icon' => 'fa fa-reply', 'url' => ['/publisher/tbl-studs-result/index']],
                            // ['label' => 'Students Result', 'icon' => 'fa fa-reply', 'url' => ['/transcript/tbl-studs-transcript/index']],  
                            // ['label' => 'Students Result', 'iconStyle' => 'far', 'url' => ['/students/tbl-stud-result/index']],    
                        // ],
                    ],

                    // ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    
                    [
                        'label' => 'Departments',
                        'icon' => 'fa fa-landmark',
                        // 'badge' => '<span class="right badge badge-info">2</span>',
                        'items'=>[
                            ['label' => 'Departments',  'icon' => 'fa fa-reply', 'url' => ['/departments/tbl-depart/index']],
                            ['label' => 'Courses && Department ', 'icon' => 'fa fa-reply', 'url' => ['/departments/tbl-course-depart/index']], 
                            // ['label' => 'Students Result', 'iconStyle' => 'far', 'url' => ['/students/tbl-stud-result/index']],  
                            // ['label' => 'Students Result', 'iconStyle' => 'far', 'url' => ['/students/tbl-stud-result/index']],    
  
                        ],
                    ],



                 
                    [
                        'label' => 'Settings', 'icon' => 'cog', 'url' => ['/program/tbl-program/index'],
                
                    // [
                    //     'label' => 'System Users',
                    //     'icon' => 'fa fa-users',
                    //     'badge' => '<span class="right badge badge-info">2</span>',

                    //     'items' => [
                    //         ['label' => 'Permissions', 'url'=>['/admin/assignment/index'],'iconStyle' => 'far'],
                    //         ['label' => 'Roles', 'url'=>['/admin/role/index'],'iconStyle' => 'far'],
                    //     ]
                    // ],
                
                ],

                [
                    'label' => 'Logs',
                    'icon' => 'fa fa-landmark',
                    // 'badge' => '<span class="right badge badge-info">2</span>',
                    'items'=>[
                        ['label' => 'Qualifications Logs',  'iconStyle' => 'far', 'url' => ['/qualification/tbl-quali-log/index']],
                        ['label' => 'Admissions Logs ', 'iconStyle' => 'far', 'url' => ['/admission/tbl-admiss-log/index']], 
                       
                        // ['label' => 'Students Result', 'iconStyle' => 'far', 'url' => ['/students/tbl-stud-result/index']],    

                    ],
                ],

                
                    // ['label' => 'MULTI LEVEL EXAMPLE', 'header' => true],
                    // ['label' => 'Level1'],
                    // [
                    //     'label' => 'Level1',
                    //     'items' => [
                    //         ['label' => 'Level2', 'iconStyle' => 'far'],
                    //         [
                    //             'label' => 'Level2',
                    //             'iconStyle' => 'far',
                    //             'items' => [
                    //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                    //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                    //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle']
                    //             ]
                    //         ],
                    //         ['label' => 'Level2', 'iconStyle' => 'far']
                    //     ]
                    // ],
                    // ['label' => 'Level1'],
                    // ['label' => 'LABELS', 'header' => true],
                    // ['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
                    // ['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
                    // ['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
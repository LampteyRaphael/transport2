<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <b class=" tect-center text-uppercase">IPS</b>
        <!-- <img src="/images/logo.png" alt="AdminLTE Logo" class="brand-image bg-white elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-bold text-uppercase"><b>-MS</b></span>
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
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Dashboard', 'url'=>['/site/index'], 'icon' => 'th', 'badge' => '<span class="right badge badge-danger">New</span>'],

                    [
                        'label' => 'Users',
                        'icon' => 'fa fa-users',
                        'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            ['label' => 'Active Page', 'url' => ['/user/tbl-user/index'], 'iconStyle' => 'far'],
                            ['label' => 'Permissions', 'url'=>['/admin/assignment/index'],'iconStyle' => 'far'],
                            ['label' => 'Roles', 'url'=>['/admin/role/index'],'iconStyle' => 'far'],
                        ]
                    ],
                   
                    [
                        'label' => 'Applicants',
                        'icon' => 'tachometer-alt',
                        // 'badge' => '<span class="right badge badge-info">2</span>',
                        'items'=>[
                            // ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                            ['label' => 'Application',  'iconStyle' => 'far', 'url' => ['/application/app/index']],
                            ['label' => 'Qualification', 'iconStyle' => 'far', 'url' => ['/qualification/tbl-app-quali/index']],
                            ['label' => 'Admission', 'iconStyle' => 'far', 'url' => ['/admission/tbl-app-admission/index']],
                        ]
                    ],

                    [
                        'label' => 'Students',
                        'icon' => 'fa fa-user',
                        // 'badge' => '<span class="right badge badge-info">2</span>',
                        'items'=>[
                            ['label' => 'Students List', 'iconStyle' => 'far', 'url' => ['/students/tbl-stud/index']],
                            ['label' => 'Registered Courses', 'iconStyle' => 'far', 'url' => ['/students/tbl-regis-course/index']],    
                        ],
                    ],
                    ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Finance Report',  'iconStyle' => 'far', 'url' => ['/payment/tbl-payment/index']],

                    ['label' => 'Settings', 'iconStyle' => 'far', 'url' => ['/program/tbl-program/index']],
                    // ['label' => 'Stud. Course Registered', 'iconStyle' => 'far', 'url' => ['/students/tbl-regis-course']],

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
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <b class="tect-center text-uppercase ml-5">UPSA</b>
        <!-- <img src="/images/logo.png" alt="AdminLTE Logo" class="brand-image bg-white elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-bold text-uppercase"><b>-TMS</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="images/<?= Yii::$app->user->identity->photo??'' ?>" class="img-circle elevation-3" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block "><b><?= Yii::$app->user->identity->username??'' ?></b></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped 
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --

        < Sidebar Menu -->
        <nav class="mt-2">
            <?php

            // if(Yii::$app->user->can('hod permission')){
            //    $hod= ['label' => 'Students Result(hod)',  'icon' => 'fa fa-reply', 'url' => ['/hod/tbl-studs-result/index']];
            // }else{
            //     $hod=['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest];
            // }
            
            // if(Yii::$app->user->can('dean permission')){
            //   $dean=['label' => 'Students Result(dean)', 'icon' => 'fa fa-reply', 'url' => ['/dean/tbl-studs-result/index']];
            // }else{
            //     $dean=['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest];
            // }
            
            // if(Yii::$app->user->can('publisher permission')){
            //     $publisher=['label' => 'Students Result(academics)', 'icon' => 'fa fa-reply', 'url' => ['/publisher/tbl-studs-result/index']];
            // }else{
            //     $publisher=['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest];
            // }
            
            // if(Yii::$app->user->can('transcript permission')){
            //     $transcript=['label' => 'Students Transcript(transcript)', 'icon' => 'fa fa-reply', 'url' => ['/transcript/tbl-studs-transcript/index']]; 
            // }else{
            //     $transcript=['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest];
            // }

            ?>
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Dashboard', 'url'=>['/site/index'], 'icon' => 'th', 'badge' => '<span class="right badge badge-danger">New</span>'],

                    ['label' => 'Users', 'url' => ['/user-admins/index'], 'icon' => 'users'],
                    [
                        'label' => 'Drivers\'s','icon' => 'users','url' => ['#'],
                        'items' => [
                            ['label' => 'Drivers List', 'icon' => 'fa fa-share-square', 'url' => ['/drivers/index']],
                            ['label' => 'Add Drivers', 'icon' => 'fa fa-share-square', 'url' => ['/drivers/create']],
                        ],
                    ],
                    [
                        'label' => 'Vehicle\'s','icon' => 'car','url' => ['#'],
                        'items' => [
                            ['label' => 'Vehicles List', 'icon' => 'fa fa-share-square', 'url' => ['/vehicles/index']],
                            ['label' => 'Add Vehicles', 'icon' => 'fa fa-share-square', 'url' => ['/vehicles/create']],
                            ['label' => 'Vehicle Group', 'icon' => 'fa fa-share-square', 'url' => ['/vehicle-group/index']],
                        ],
                    ],

                    

                    [
                        'label' => 'Bookings','icon' => 'book','url' => ['#'],
                        'items' => [
                            ['label' => 'Bookings List', 'icon' => 'fa fa-share-square', 'url' => ['/operations/index']],
                            ['label' => 'Add Booking', 'icon' => 'fa fa-share-square', 'url' => ['/operations/create']],
                        ],
                    ],

                    [
                        'label' => 'Services','icon' => 'wrench','url' => ['#'],
                        'items' => [
                            ['label' => 'Services', 'icon' => 'fa fa-share-square', 'url' => ['/servicings/index']],
                            ['label' => 'Repairs', 'icon' => 'fa fa-share-square', 'url' => ['/repairs/index']],
                            ['label' => 'Add Service', 'icon' => 'fa fa-share-square', 'url' => ['/servicings/create']],
                            ['label' => 'Add Repair', 'icon' => 'fa fa-share-square', 'url' => ['/repairs/create']],
                        ],
                    ],
                    [
                        'label' => 'Road Worthy','icon' => 'fa fa-road','url' => ['#'],
                        'items' => [
                            ['label' => 'Road Worthy List', 'icon' => 'fa fa-share-square', 'url' => ['/road-worthy/index']],
                            ['label' => 'Add Worthy', 'icon' => 'fa fa-share-square', 'url' => ['/road-worthy/create']],
                        ],
                    ],

                    [
                        'label' => 'Insurances','icon' => 'fa fa-industry','url' => ['#'],
                        'items' => 
                        [
                            ['label' => 'Insurances List', 'icon' => 'fa fa-share-square', 'url' => ['/insurance/index']],
                            ['label' => 'Add Insurance', 'icon' => 'fa fa-share-square', 'url' => ['/insurance/create']],
                        ],
                    ],

                    [
                        'label' => 'Scraps','icon' => 'wrench','url' => ['#'],
                        'items' => 
                        [
                            ['label' => 'Scrap List', 'icon' => 'fa fa-share-square', 'url' => ['/scrab/index']],
                            ['label' => 'Add Scrap', 'icon' => 'fa fa-share-square', 'url' => ['/scrab/create']],
                        ],
                    ],

                    [
                        'label' => 'Reminder','icon' => 'fa fa-bell','url' => ['#'],
                        'items' => 
                        [
                            ['label' => 'Reminder List', 'icon' => 'fa fa-share-square', 'url' => ['/reminder/index']],
                            ['label' => 'Add Reminder', 'icon' => 'fa fa-share-square', 'url' => ['/reminder/create']],
                        ],
                    ],

                    ['label' => 'Accidents','icon' => 'car','url' => ['/accident-records/index']],
                    // ['label'=>'Vehicles To Renew','icon'=>'car','url'=>['insurance-renewal-dates-index']],

                    [
                        'label' => 'Settings',
                         'icon' => 'cogs', 
                         'url' => ['#'],
                         'items'=>[
                            // ['label' => 'Reset Password', 'icon' => 'key', 'url' => ['/user-request/reset']],
                            // ['label'=>'Admins','icon'=>'user','url'=>['/user/index']],
                            // ['label' =>'Add New Admins', 'icon'=>'circle-o', 'url'=>['/user/create']],
                             ['label'=>'Roles', 'icon'=>'circle-o','url'=>['/role/index']]
                            // ['label'=>'Add New Role','icon'=>'circle-o','url'=>['/role/create']],
                            // ['label'=>'Auth Assignment', 'icon'=>'circle-o','url'=>['/auth-assignment/index']],
                            // ['label'=>'New Assignment','icon'=>'circle-o','url'=>['/auth-assignment/create']],
                            // ['label'=>'Auth Child', 'icon'=>'circle-o','url'=>['/auth-item-child/index']],
                            // ['label'=>'Add New Auth Child','icon'=>'circle-o','url'=>['/auth-item-child/create']],
                            // ['label'=>'Auth Item', 'icon'=>'circle-o','url'=>['/auth-item/index']],
                            // ['label'=>'New Auth Item','icon'=>'circle-o','url'=>['/auth-item/create']],
                            // ],                    
                    ],
                    ]


                    // [
                    //     'label' => 'Password','icon' => 'key','url' => ['#'],
                    //     'items' => [
                    //         // ['label'=>'Requested Items','icon'=>'plus','url'=>['/request/create']],
                    //         ['label' => 'Reset Password', 'icon' => 'key', 'url' => ['/user-request/reset']],
                    //     ],
                    // ],
                    
                    //   ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    // [
                    //     'label' => 'Request','icon' => 'cog','url' => ['#'],
                    //     'items' => [
                    //         // ['label'=>'Requested Items','icon'=>'plus','url'=>['/request/create']],
                    //         ['label' => 'Make New Request', 'icon' => 'circle-o', 'url' => ['/user-request/create']],
                    //     ],
                    // ],

                    // [
                    //     'label' => 'Pending', 'icon' => 'cog', 'url' => ['#'],
                    //    'items'=>[
                    //        ['label'=>'Pending','icon'=>'circle-o','url'=>['//user-request/pending']],
                    //     //    ['label'=>'Add New Room','icon'=>'plus','url'=>['/room/create']],
                    //    ]
                    //   ],

                    //   [
                    //     'label' => 'Approved', 'icon' => 'cog', 'url' => ['/'],
                    //    'items'=>[
                    //        ['label'=>'Approved','icon'=>'circle-o','url'=>['//user-request/approved']],
                    //     //    ['label'=>'Add New Item','icon'=>'plus','url'=>['/item/create']],
                    //    ]
                    //   ],
                    //   [
                    //     'label' => 'Rejected', 'icon' => 'cog', 'url' => ['/'],
                    //    'items'=>[
                    //        ['label'=>'Rejected','icon'=>'circle-o','url'=>['//user-request/rejected']],
                    //     //    ['label'=>'Add New Brand','icon'=>'plus','url'=>['/brand/create']],
                    //    ]
                    //   ],

              
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user1-160x160.jpg" class="img-circle" alt=""/>
            </div>
            <div class="pull-left info">
                <p> <?= strtoupper(Yii::$app->user->identity->username)?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

<?php $admin= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Inventory', 'options' => ['class' => 'header']],
                    // [
                    //     'label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['/'],
                    //    'items'=>[
                    //        ['label'=>'Dashboard','icon'=>'users','url'=>['/site/index']],
                    //     ],
                    //   ],
                    
                    //   [
                    //     'label' => 'Password','icon' => 'key','url' => ['#'],
                    //     'items' => [
                    //         // ['label'=>'Requested Items','icon'=>'plus','url'=>['/request/create']],
                    //         // ['label' => 'Reset Password', 'icon' => 'key', 'url' => ['/user-request/reset']],
                    //     ],
                    // ],
                    
                    [
                        'label' => 'Admin Users',
                         'icon' => 'users', 
                         'url' => ['#'],
                         'items'=>[
                            ['label'=>'Users','icon'=>'','url'=>['/user/tbl-user/index']],
                            ['label' =>'Roles', 'icon'=>'circle-o', 'url' => ['/user/tbl-role/index']],
                            ['label'=>'User Status', 'icon'=>'circle-o', 'url' => ['/user/tbl-status-category/index']],
                            ['label'=>'Add New Role','icon'=>'circle-o','url' => ['/user/tbl-user-log/index']],
                            
                            ],                    
                    ],
 
                    // [
                    //     'label' => 'APPLICATION',
                    //      'icon' => 'users', 
                    //      'url' => ['#'],
                    //      'items'=>[
                    //         ['label'=>'Step 1','icon'=>'','url'=>['/application/app-pers-details/create']],
                    //         ['label' =>'Step 2', 'icon'=>'circle-o', 'url' => ['/application/tbl-app-program/create']],
                    //         ['label' =>'Step 3', 'icon'=>'circle-o', 'url' => ['/application/app-emp-details/create']],
                    //         ['label'=>'Step 4', 'icon'=>'circle-o', 'url' => ['/application/app-edu-bg/create']],
                    //         ['label'=>'Step 5','icon'=>'circle-o','url' => ['/application/app-document/create']],
                    //         ['label'=>'Summary & Declaration','icon'=>'circle-o','url' => ['/application/app-document/create']],
                    //         ],                    
                    // ],



                    [
                        'label' => 'ADMISSIONS',
                         'icon' => 'users', 
                         'url' => ['#'],
                         'items'=>[
                            ['label'=>'Applicantions','icon'=>'','url'=>['/application/app/index']],
                            ['label'=>'Qualified Applicants','icon'=>'reply','url'=>['/qualification/tbl-app-quali/index']],
                            ['label'=>'Admitted Applicants','icon'=>'','url'=>['/admission/tbl-app-admission/index']],
                            // ['label'=>'Admission Report','icon'=>'','url'=>['/application/app-pers-details/create']],
                            // ['label' =>'Application OSN', 'icon'=>'circle-o', 'url' => ['/application/app-emp-details/create']],
                            ],       
                    ],



                    [
                        'label' => 'SETUP',
                         'icon' => 'gears', 
                         'url' => ['#'],
                         'items'=>[
                            [
                                'label' => 'system Logs',
                                 'icon' => 'users', 
                                 'url' => ['#'],
                                 'items'=>[
                                    ['label'=>'Qualified Logs', 'icon'=>'circle-o', 'url' => ['/qualification/tbl-quali-log/index']],
                                    ['label'=>'Adminss Log', 'icon'=>'circle-o', 'url' => ['/admission/tbl-admiss-log']],
                                    ['label'=>'stud Log', 'icon'=>'circle-o', 'url' => ['/students/tbl-stud-regis-log']],
                                    ],                    
                            ],
                            [
                                'label' => 'Status',
                                 'icon' => 'users', 
                                 'url' => ['#'],
                                 'items'=>[
                                    ['label' =>'Applicants status', 'icon'=>'circle-o', 'url' => ['/application/tbl-app-status/index']],
                                    ['label' =>'Qualified Status', 'icon'=>'circle-o', 'url' => ['/qualification/tbl-app-quali-status']],
                                    ['label' =>'Adminss Status', 'icon'=>'circle-o', 'url' => ['/admission/tbl-app-admiss-status']],
                                    ['label' =>'Acadamic Year', 'icon'=>'circle-o', 'url' => ['/admission/tbl-acadamic-year']],
                                    ['label'=>'Studen Status', 'icon'=>'circle-o', 'url' => ['/students/tbl-stud-status']],
                                    ],                    
                            ],

                            ['label'=>'Students Grade', 'icon'=>'circle-o', 'url' => ['/students/tbl-stud-grade']],

                            
                            ],  
                            
                            
                    ],

                
                   


                    [
                        'label' => 'PROGRAMS',
                         'icon' => 'book', 
                         'url' => ['#'],
                         'items'=>[
                            ['label'=>'Programes','icon'=>'','url'=>['/program/tbl-program']],
                             ['label' =>'Program Status', 'icon'=>'circle-o', 'url' => ['/program/tbl-program-type/index']],
                            // ['label'=>'Adminss Log', 'icon'=>'circle-o', 'url' => ['/admission/tbl-admiss-log']],
                            // ['label'=>'Add New Role','icon'=>'circle-o','url' => ['/application/app-document/create/']],
                            
                            ],                    
                    ],

                    [
                        'label' => 'DEPARTMENT',
                         'icon' => 'book', 
                         'url' => ['#'],
                         'items'=>[
                            ['label'=>'departments','icon'=>'','url'=>['/departments/tbl-depart/index']],
                             ['label' =>'depart & Course', 'icon'=>'circle-o', 'url' => ['/departments/tbl-course-depart/index']],
                           //  ['label'=>'Sections', 'icon'=>'circle-o', 'url' => ['/courses/tbl-section/index']],
                            // ['label'=>'Add New Role','icon'=>'circle-o','url' => ['/application/app-document/create/']],
                            
                            ],                    
                    ],

                    [
                        'label' => 'COURSES',
                         'icon' => 'book', 
                         'url' => ['#'],
                         'items'=>[
                            ['label'=>'Course','icon'=>'','url'=>['/courses/tbl-course/index']],
                             ['label' =>'Semesters', 'icon'=>'circle-o', 'url' => ['/courses/tbl-semester/index']],
                             ['label'=>'Sections', 'icon'=>'circle-o', 'url' => ['/courses/tbl-section/index']],
                            // ['label'=>'Add New Role','icon'=>'circle-o','url' => ['/application/app-document/create/']],
                            
                            ],                    
                    ],
                   

                    [
                        'label' => 'STAFF',
                         'icon' => 'user', 
                         'url' => ['#'],
                         'items'=>[
                            ['label'=>'staff List','icon'=>'','url'=>['/staff/tbl-staff']],
                             ['label' =>'staff', 'icon'=>'circle-o', 'url' => ['/staff/tbl-staff-list']],
                            //  ['label'=>'Sections', 'icon'=>'circle-o', 'url' => ['/courses/tbl-section/index']],
                            
                            ],                    
                    ],


                    [
                        'label' => 'STUDENTS',
                         'icon' => 'users', 
                         'url' => ['#'],
                         'items'=>[
                            ['label'=>'students','icon'=>'','url'=>['/students/tbl-stud']],
                             ['label' =>'Category', 'icon'=>'circle-o', 'url' => ['/students/tbl-stud-type-category']],
                             ['label'=>'Result', 'icon'=>'circle-o', 'url' => ['/students/tbl-stud-result']],
                             ['label'=>'Result Category', 'icon'=>'circle-o', 'url' => ['/students/tbl-stud-result-category']],

                             ['label'=>'Registration', 'icon'=>'circle-o', 'url' => ['/students/tbl-st-registration']],
                             ['label'=>'Acadamin Yr Registration', 'icon'=>'circle-o', 'url' => ['/students/tbl-stud-acadamic-year']],
                             ['label'=>'Registered Courses', 'icon'=>'circle-o', 'url' => ['/students/tbl-regis-course']],

                             ['label'=>'Qualification', 'icon'=>'circle-o', 'url' => ['/students/tbl-stud-quali']],
                             ['label'=>'Qualification Year', 'icon'=>'circle-o', 'url' => ['/students/tbl-stud-acad-year']],

                             ['label'=>'Adminssion', 'icon'=>'circle-o', 'url' => ['/students/tbl-stud-admis']],

                             ['label'=>'Admission & Quali Status', 'icon'=>'circle-o', 'url' => ['/students/tbl-stud-admis-status']],
                             ['label'=>'qualification Year', 'icon'=>'circle-o', 'url' => ['/students/tbl-stud-acad-year']],
                             
                            ],                    
                    ],
                    
                    


                    // ['label'=>'Auth Assignment', 'icon'=>'circle-o','url'=>['/auth-assignment/index']],
                    //         ['label'=>'New Assignment','icon'=>'circle-o','url'=>['/auth-assignment/create']],
                    //         ['label'=>'Auth Child', 'icon'=>'circle-o','url'=>['/auth-item-child/index']],
                    //         ['label'=>'Add New Auth Child','icon'=>'circle-o','url'=>['/auth-item-child/create']],
                    //         ['label'=>'Auth Item', 'icon'=>'circle-o','url'=>['/auth-item/index']],
                    //         ['label'=>'New Auth Item','icon'=>'circle-o','url'=>['/auth-item/create']]

                ],
            ]
        ) ?>



<?php $users= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                     [
                      'label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['/'],
                     'items'=>[
                         ['label'=>'Dashboard','icon'=>'circle-o','url'=>['/site/index']],
                      ],
                    ],
                    [
                        'label' => 'Password','icon' => 'key','url' => ['#'],
                        'items' => [
                            // ['label'=>'Requested Items','icon'=>'plus','url'=>['/request/create']],
                            ['label' => 'Reset Password', 'icon' => 'key', 'url' => ['/user-request/reset']],
                        ],
                    ],
                    
                    //   ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Request','icon' => 'cog','url' => ['#'],
                        'items' => [
                            // ['label'=>'Requested Items','icon'=>'plus','url'=>['/request/create']],
                            ['label' => 'Make New Request', 'icon' => 'circle-o', 'url' => ['/user-request/create']],
                        ],
                    ],

                    [
                        'label' => 'Pending', 'icon' => 'cog', 'url' => ['#'],
                       'items'=>[
                           ['label'=>'Pending','icon'=>'circle-o','url'=>['//user-request/pending']],
                        //    ['label'=>'Add New Room','icon'=>'plus','url'=>['/room/create']],
                       ]
                      ],

                      [
                        'label' => 'Approved', 'icon' => 'cog', 'url' => ['/'],
                       'items'=>[
                           ['label'=>'Approved','icon'=>'circle-o','url'=>['//user-request/approved']],
                        //    ['label'=>'Add New Item','icon'=>'plus','url'=>['/item/create']],
                       ]
                      ],
                      [
                        'label' => 'Rejected', 'icon' => 'cog', 'url' => ['/'],
                       'items'=>[
                           ['label'=>'Rejected','icon'=>'circle-o','url'=>['//user-request/rejected']],
                        //    ['label'=>'Add New Brand','icon'=>'plus','url'=>['/brand/create']],
                       ]
                      ],
                ],
            ]
        ) ?>

        <?php
        // if(Yii::$app->user->can('admin')){
            echo $admin;
        // }elseif(Yii::$app->user->can('user')){
        //     echo $users;
        // }
        ?>

    </section>

</aside>

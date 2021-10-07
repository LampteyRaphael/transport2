<?php

use backend\assets\AppAsset;
use yii2mod\alert\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;

AppAsset::register($this)
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
        <src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" crossorigin="anonymous"></script>
       <?php $this->head() ?>
        <style type="text/css">

            .container1{
                width:100%;
            }
            @media screen and (max-width: 600px) {
                .container1,.title, #title{
                    font-size: 8px;
                }
                .col-lg-4{
                height: 900px; 
               }
            }

            #title{
               /* font-size: 12px; */
               font-weight: 600;
               font-style:italic;
               font-family: monospace;

            }

            .progressbar{
                counter-reset: step;
            }
            .progressbar li{
                list-style-type: none;
                float: left;
                width:19.25%;
                position: relative;
                text-align: center;
            }

            .progressbar li:before{
                content: counter(step);
                counter-increment: step;
                width: 40px;
                height: 40px;
                line-height: 40px;
                border: 1px solid #ddd;
                display: block;
                text-align: center;
                margin: 0 auto 10px auto;
                border-radius: 50%;
                background-color: white;
            }

            .progressbar li:after{
                content: '';
                position: absolute;
                width: 100%;
                height: 1px;
                background-color: #ddd;
                top: 15px;
                left: -50%;
                z-index: -1;
            }
            .progressbar li:first-child:after{
                content: none;
            }


            .progressbar li.active{
                color: #e9eee9;
            }
            .progressbar li.active:before{
                background-color: #008034;
                color: white;
            }

            .progressbar li.active+li:after{
                background-color: #007417;
                font-weight: bold;
            }

            .progressbar li.active {
                color: #0c820c;
                font-weight: bold;
            }

            .bg-dark {
                background-color: #28304e!important;
                height:200px;
                padding: 5px;
                /*margin-bottom: 50px;*/
                /*z-index: -5;*/
            }
            .bg-red{
                margin-top: -50px;
            }
            .badge-circle{
                border-radius:200%;
                padding: 10px;
                background-color: #d90000;
                color: #ffffff;
            }
            .title{
                color:   #d90000;
            }

            /* .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
                color: #fff;
                background-color:  #d90000;
            } */

            /*input[type='file'] {*/
            /*    color: rgba(0, 0, 0, 0)*/
            /*}*/

            .ml-auto{
                color: rgba(0, 0, 0, 0);
            }

            .wrapper{
                position: absolute;
                /*top: 0;*/
                /* z-index: -1; */
                width: 100%;
                height: 100%;
            }

    
           /* .panel.panel-active{
               background-color: lightblue;
           } */
            /* nav{
                background-color: #eeeeee;
                font-size: 1.6em;
                padding: 0.5rem 1rem;
                display: flex;
                color: #eeeeee;
                align-items: center;
                box-shadow: 0 0 4px rgba(0.0 , 0. 2);
            } */

            nav {
                background-color: #eeeeee00;
                font-size: 1.6em;
                padding: 0.5rem 1rem;
                display: flex;
                color: #eeeeee;
                align-items: center;
                box-shadow: 0 0 4px rgba(0.0 , 0. 2);
            }

            #w4{
                background-color: rgba(0, 0, 0, 0.03);
            }

            .hamburger{
                transform: translateY(3px);
                margin-right: 1rem;
                cursor: pointer;
                color: #0a0a0a;
            }

            .backdrop{
                position: fixed;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color:rgba(0,0,0,0.4);
                display: none;
                z-index: 1;
            }

            .backdrop--active{
                display: block;
            }


            .sidebar{
                position: fixed;
                top: 0;
                left: 0;
                width: 270px;
                /* max-width: 28rem; */
                height: 100%;
                transition: all 1s cubic-bezier(0.075,0.82,0.165,1);
                box-shadow: 0 0 4px rgba(0.0, 0.2 );
                background-color: #28304e!important;
                transform: translateX(-100%);
                z-index: 1;
                /* overflow: scroll; */
                overflow:auto;
            }

            .sidebar--active{
                transform: translateX(0);
            }

            .sidebar_profile{
                padding: 1rem 1.5rem;
                display: flex;
                border-bottom: 2px solid rgba(2,2,2,0.1);
                align-items: center;
            }

            .sidebar_profile h1{
                font-size: 1rem;
                margin-bottom: 6px;
                color: yellow;
            }

            .sidebar_profile p{
                font-size: 8px;
                color: white;
            }

            .sidebar_profile img{
                width: 6rem;
                height: 6rem;
                border-radius: 50%;
                margin-right: 1rem;
                transform: translateX(-0.3rem);
            }

            .sidebar_list{
                list-style: none;
            }

            .sidebar_list li a{
                text-decoration: none;
            }

            .sidebar_list li a:hover{
                color: white;
            }
            
            .sidebar_item{
                padding: 10px 25px;
                font-size: 15px;
                position: relative;
            }

            .sidebar_item a{
                text-decoration: none;
                color:rgba(255,255,255,.7);
                display: flex;
                align-items: center;
            }
           
            .sidebar_item i{
                margin-right:1rem;
            }
          

            .sidebar_item::after{
                content: '';
                position: absolute;
                left: 0;
                top: 0;
                height: 0;
                width: 2px;
                color: #ffffff;
                /* background-color: yellow; */
                transition: height 0.15s 0.14s, width 0.15s;
                z-index: -1;
            }

            .sidebar_item:hover::after{
                transition: height 0.5s 0.1s, width 0.5s 0.4s ;
                width: 100%;
                height: 100%;
            }

            .sidebar_item:hover{
                color: darkblue;
            }

            .menu-icon {
            position: relative;
            width: 40px;
            height: 40px;
            margin-top: auto;
            margin-bottom: auto;
            margin-left: auto;
            text-align: center;
            vertical-align: middle;
            border-radius: .25rem;
            padding: 10px;
            background: rgba(255,255,255,.1);
            font-size: larger;
            font-weight: 600;
            color: #28a745!important
          }

          table,label,input{
              text-align: left;
          }

        .hclose{
            top: 0;
            position: relative;
            color: #ffffff; 
            cursor: pointer;   
        }
        .hclose:hover{
            color: #ffffff;
            cursor: pointer;   
        }
        .hclose:active{
            color: #ffffff;
            cursor: pointer;   
        }

        .container-fluid.bg-dark {
                background-color: #28304e!important;
            }


            #w4 {
                   background-color: rgba(0, 0, 0, 0);
                   margin: 0px;
                   padding-top: 5px;
                   margin: 0px;
                   font-size:16px;
               }
       


    
              
        /* .tbl-course-index{
            overflow-x: scroll;
        }


        .tbl-course-index table{
            max-width: 100%;
            width: 100%;
        } */


        /* .grid-view th {
            white-space: nowrap;
        } */

/* .hclose--active{
    display: none;
}
   */
        </style>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <nav>
        <div class="hamburger">
            <b class="pl-2"><i class="ri-menu-line"></i></b> 
        </div>
    
        <div class="backdrop"></div>
        <div class="sidebar">
             <span class="hclose float-right m-1">
                <i class="ri-close-line"></i>
             </span>
            <div class="sidebar_profile">
                <img src="image/upsa1.jpg" alt="logo" height="100" width="100">
                <div>
                    <h1><?= Yii::$app->user->identity->username??'' ?></h1>
                    <p>Email.com</p>
                </div>
               
            </div>

            <div class="sidebar_list">
                <li class="sidebar_item">
                    <?=Html::a('<i class="ri-checkbox-blank-circle-line"></i>Dashboard<span class="menu-icon"><i class="ri-dashboard-fill"></i></span>',['/']) ?>               
                </li>
                <li class="sidebar_item">
                    <?= Html::a('<i class="ri-checkbox-blank-circle-line"></i>'.'Users'.'<span class="menu-icon"><i class="ri-admin-line"></i></span>',['/user/tbl-user/index'])?>
                </li>

                <li class="sidebar_item">
                    <?= Html::a('<i class="ri-checkbox-blank-circle-line"></i>'.'Roles'.'<span class="menu-icon"><i class="ri-admin-line"></i></span>',['/admin/role'])?>
                </li>

                <li class="sidebar_item">
                    <?= Html::a('<i class="ri-checkbox-blank-circle-line"></i>'.'Auth Assignment'.'<span class="menu-icon"><i class="ri-admin-line"></i></span>',['/admin'])?>
                </li>

                <li class="sidebar_item">
                    <?= Html::a('<i class="ri-checkbox-blank-circle-line"></i>Applications<span class="menu-icon"><i class="ri-chat-poll-fill"></i></span>',['/application/app/index'])?>
                </li>

                <li class="sidebar_item">
                    <?= Html::a('<i class="ri-checkbox-blank-circle-line"></i>Qualifications<span class="menu-icon"><i class="ri-bank-line"></i></span>',['/qualification/tbl-app-quali/index'])?>
                </li>

                <li class="sidebar_item">
                    <?= Html::a('<i class="ri-checkbox-blank-circle-line"></i>Admissions<span class="menu-icon"><i class="ri-user-settings-line"></i></span>',['/admission/tbl-app-admission/index']) ?>
                </li>

                <li class="sidebar_item">
                    <?=Html::a('<i class="ri-checkbox-blank-circle-line"></i>Finance Reports<span class="menu-icon"><i class="ri-user-3-fill"></i></span>',['/payment/tbl-payment/index']) ?>
                </li>
            
                <li class="sidebar_item">
                    <?=Html::a('<i class="ri-checkbox-blank-circle-line"></i>Student<span class="menu-icon"><i class="ri-user-3-fill"></i></span>',['/students/tbl-stud']) ?>
                </li>
                <li class="sidebar_item">
                    <?=Html::a('<i class="ri-checkbox-blank-circle-line"></i>Registrations<span class="menu-icon"><i class="ri-registered-fill"></i></span>',['/students/tbl-regis-course']) ?>
                </li>
                <li class="sidebar_item">
                    <?= Html::a('<i class="ri-checkbox-blank-circle-line"></i>Settings<span class="menu-icon"><i class="ri-settings-5-fill"></i></span>',['/program/tbl-program/index']) ?>
                </li>
                <li class="sidebar_item">
                <?= Html::a('<i class="ri-logout-circle-line"></i>Logout<span class="menu-icon"><i class="ri-logout-box-line"></i></span>',['/site/logout'],['data-method' => 'post']) ?>
                </li>
            </div>

        </div>
    </nav>
    <div class="wrapper">
        <div class="container-fluid bg-dark">
            <div class="container-fluid">
                <div class="col mt-5">
                <span id="" class="text-warning"><b>UNIVERSITY OF PROFESSIONAL STUDIES, ACCRA(UPSA)</b></span>
                </div>
            </div>
            <div class="container-fluid" style="width: 90%;">
                <div class=" pull-up mt-lg-5">
                    <div class="container-fluid m-auto">
                        <div class="card">
                        <div class="">
                            <?=  
                             Breadcrumbs::widget(
                                [
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                'options'=>['class'=>'float-sm-right bg-white small']
                                ]
                              ) 
                            ?> 
                         </div>
                            <div class="card-body">
                                <div class="text-center p-t-30 p-b-20">
                                    <?= Alert::widget(); ?>
                       
                                </div>
                                <!-- /.col -->
                                    <h5 id="ips-header" class="text-danger text-uppercase text-center "><b>Institute Of Professional Studies(IPS)</b></h5>
                                    <?= $content;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const hamburger=document.querySelector('.hamburger');
        const backdrop=document.querySelector('.backdrop');
        const sidebar=document.querySelector('.sidebar');
        const hclose = document.querySelector('.hclose');


        hamburger.addEventListener('click',()=>{
            toggleSidebar();
        });

        backdrop.addEventListener('click',()=>{
            toggleSidebar();
        });

        const toggleSidebar =()=>{
            backdrop.classList.toggle('backdrop--active');
            sidebar.classList.toggle('sidebar--active');
        }

        hclose.addEventListener('click',()=>{

            backdrop.classList.remove('backdrop--active');
            sidebar.classList.remove('sidebar--active');
        });

    </script>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>
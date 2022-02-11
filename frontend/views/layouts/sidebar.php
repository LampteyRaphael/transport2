<?php

use kartik\helpers\Html;
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
    <b class=" tect-center text-uppercase ml-4">UPSA - </b>
        <span class="brand-text"><b>TMS</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!-- < Html::img('@web'.'/application/images/'.Yii::$app->user->identity->photo,['height'=>'100','width'=>'100','class'=>'img-circle elevation-2'])?> -->
                <!-- <img src="images/upsa3.jpg" class="img-circle elevation-2" alt="User Image"> -->
            </div>
            <div class="info">
                <a href="#" class="d-block"> <?= Yii::$app->user->identity->username??'' ?></a>
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
        <?php if(Yii::$app->user->can('user')): ?>
            <?= \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Booking', 'url'=>['/student'], 'icon' => 'users'],
                    ['label' => 'Booking List', 'url' => ['/operations/index'], 'icon' => 'book'],
                    ['label' => 'Add Booking',  'icon' => 'plus-circle', 'url' => ['/operations/create']],
                    ['label' => 'Reminder',  'icon' => 'fa fa-bookmark', 'url' => ['/student/tbl-st-registration/result']],

                ],
            ]);
            ?>
            <?php endif;?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
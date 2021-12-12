<?php

use kartik\helpers\Html;
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
    <b class=" tect-center text-uppercase">UNIVERSITY - </b>
        <span class="brand-text"><b>IPS</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?= Html::img('@web'.'/application/images/'.Yii::$app->user->identity->photo,['height'=>'100','width'=>'100','class'=>'img-circle elevation-2'])?>
                <!-- <img src="images/upsa3.jpg" class="img-circle elevation-2" alt="User Image"> -->
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
                    ['label' => 'Student Info', 'url'=>['/student'], 'icon' => 'users'],
                    ['label' => 'Registered Courses', 'url' => ['/student/tbl-st-registration/index'], 'icon' => 'book'],
                    ['label' => 'Course Registration',  'icon' => 'pen', 'url' => ['/student/tbl-course/index']],
                    ['label' => 'Examination Result',  'icon' => 'fa fa-bookmark', 'url' => ['/student/tbl-st-registration/result']],

                ],
            ]);
            ?>
         <?php elseif(Yii::$app->user->can('lecturer')):?>
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Bio Data', 'url'=>['/lecturer/lecturer/index'], 'icon' => 'user'],
                    ['label' => 'Students Upload', 'icon' => 'fa fa-reply', 'url' => ['/lecturer/lecturer/result']], 
                    ['label' => 'Students Results',  'icon' => 'fa fa-reply', 'url' => ['/lecturer/tbl-studs-result/index']],
                ],
            ]);
            ?>
        <?php endif;  ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
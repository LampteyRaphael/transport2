<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- Styles -->
    <!--    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}-->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"> -->
    <style type="text/css">
        .banner{
            background:url('/images/upsa3.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 1000px;
        }

        @media screen and (max-width: 600px) {
            .banner{
                display: none;
            }
            .col-lg-4{
                height: 900px; 
            }
        }

        .container1{
            width:100%;
        }
        @media screen and (max-width: 600px) {
            .container1{
                font-size: 8px;
            }
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
            background-color: #d90000;
            color: white;
        }

        .progressbar li.active+li:after{
            background-color:  #d90000;
            font-weight: bold;
        }

        .progressbar li.active {
            color: #0c820c;
            font-weight: bold;
        }

        .bg-dark {
            background-color: #28304e;
            height:200px;
        }
        .bg-red{
            margin-top: -50px;
        }

        /* .login-page {
            width: 360px;
            padding: 8% 0 0;
            margin: auto;
        } */
        .form {
            position: relative;
            z-index: 1;
            /* background: #FFFFFF; */
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
            /*box-shadow: 0 0 0px 0 rgba(0, 0, 0, 0.1), 0 1px 1px 0 rgba(0, 0, 0, 0.1);*/
        }
        .form input {
            font-family: "Roboto", sans-serif;
            outline: 0;
            /* background: #f2f2f2; */
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .form button {
            font-family: "Roboto", sans-serif;
            /* text-transform: uppercase; */
            outline: 0;
            /* background: #4CAF50; */
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3 ease;
            transition: all 0.3 ease;
            cursor: pointer;
        }
       
        .form .message {
            margin: 15px 0 0;
            color: #b3b3b3;
            font-size: 12px;
        }
        .form .message a {
            color: #4CAF50;
            text-decoration: none;
        }
        .form .register-form {
            display: none;
        }
        .align-items-center{
            margin-top: -90px;
        }
    </style>
</head>
<body>
<?php $this->beginBody() ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4" style="padding-top: 100px; background-color:lightblue; margin: 0">
              <?= $content;?>
        </div>
        <div class="col-lg-8 banner">

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
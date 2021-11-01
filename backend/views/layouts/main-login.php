<?php

/* @var $this \yii\web\View */
/* @var $content string */

\hail812\adminlte3\assets\AdminLteAsset::register($this);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700');
$this->registerCssFile('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
\hail812\adminlte3\assets\PluginAsset::register($this)->add(['fontawesome', 'icheck-bootstrap']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>IPS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
    <style>
             .banner{
            background:url('image/upsa3.jpg');
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
<body class="hold-transition login-page">
<?php  $this->beginBody() ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4" style="padding-top: 100px; background-color:lightblue; margin: 0">
              <?= $content;?>
        </div>
        <div class="col-lg-8 banner">

        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
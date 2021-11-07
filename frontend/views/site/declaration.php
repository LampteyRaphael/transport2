<?php
/* @var $this yii\web\View */

use common\models\TblAppProgram;
use yii\bootstrap4\Html;
use yii\helpers\Url;

$this->title = 'Application';
?>
<div class="site-declaration">
    <div class="row">
    <div class="col">
        <table class="table table-borderless">
            <tr>
                <marquee class="text-danger">Remember to logout or exit after you print out summary and declaration</marquee>
            </tr>
            <tr>
                <td>
                <?php echo Html::img(Yii::getAlias('@web').'/images/logo.png',['width'=>'100','height'=>'70'],['alt' => 'alt image'], ['class' => 'img-fluid']);?>
                </td>
                <td>
                    <h4 id="title">Applicant Declaration</h4>
                    <h5 id="title" class="text-center">Summary of Applicant's information from online</h5>
                    <h6 id="title" class="text-center">Application For Admission Form</h6>
                </td>
                <td>
                     <?php echo Html::img(Yii::getAlias('@web').'/application/images/'.$personal->personalDetails->photo,['width'=>'100','height'=>'70'],['alt' => 'alt image'], ['class' => 'img-fluid']);?>
                </td>
            </tr>
        </table>
    </div>
    </div>
    <div class="col">

    <table class="table table-borderless ml-lg-5">
        <tr>
            <td class="text-left">
                <b>Name :</b>  <?= strtoupper(($personal->personalDetails->first_name??'') . ' ' . ($personal->personalDetails->middle_name??'') .'  ' . ($personal->personalDetails->last_name??''));?></li>
            </td>
            <td class="text-left">
            <b>Gender :</b> <?= strtoupper($personal->personalDetails->gender??'');?>
            </td>
        </tr>

        <tr>
            <td class="text-left"> 
            <b>Date Of Birth :</b> <?= strtoupper($personal->personalDetails->date_of_birth??'');?>
            </td>
            <td class="text-left">
                <b> Nationality :</b> <?= strtoupper($personal->personalDetails->nationality??'');?>
            </td>
        </tr>

        <tr>
            <td class="text-left">
            <b>Emergency Person :</b> <?= strtoupper($personal->personalDetails->contact_person??'');?>
            </td>
            <td class="text-left">
               <b>Emergency Contact : </b> <?= strtoupper($personal->personalDetails->contact_number??'');?>
            </td>
        </tr>
        <tr>
            <td class="text-left">
               <b>Program Applied For: </b> <?= strtoupper($personal->program->program->program_name??'');?>
            </td>
        </tr>
    </table>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p class="text-left pl-lg-5">
                I hereby declare that the information provided by me online  regarding the summary of my bio-data and entry
                qualification(s) as reproduced above are authentic <br>and reflect my true records.I further declare that i
                will bear any consequences for any invalid information provided.
            </p>
            <p class="text-left pl-lg-5">
                Applicant's Signature................................................................................................... Date Printed: <?= date('d-F-Y')?>
            </p>
        </div>
    </div>
    <div class="row">
    <div class="col-md-12">
        <h4 class="float-left pl-lg-5">WITNESS</h4>
    </div>
        <div class="col-md-12">
            <h5 class="text-left pl-lg-5">To be completed by witness:</h5>
        </div>

        <div class="col-md-12">
            <p class="text-left pl-lg-5 pr-lg-5">
                I certify that the photograph as captured on the front page of this declaration is the true likeness of the applicant,
                Mr/Ms/Mrs............................................................................................................who is personally known by me.
            </p>
            <p class="text-left pl-lg-5 pr-lg-5">
                 I have inspected the certificate(s) submitted by the applicant and to the best of my knowledge are
                genuine. The grades provided above are also exact replication of the grades indicated on the certificate(s).
            </p>

            <p class="text-left pl-lg-5 pr-lg-5">
                The witness must be someone of high repute(Charted member of any recognised Professional Body, Senior Public Servant or
                Head of last Education Institution attended by the applicant).
            </p>

            <p class="text-left pl-lg-5">
                Name:....................................................................................................................................................
            </p>
            <p class="text-left pl-lg-5">
                Signature/Stamp:.................................................................................................................................
            </p>
            <p class="text-left pl-lg-5">
                Status/Position:....................................................................................................................................
            </p>
            <p class="text-left pl-lg-5">
                Address:...............................................................................................................................................
            </p>
            <p class="text-left pl-lg-5">
                Date:.....................................................................................................................................................
            </p>


            <p class="pl-lg-5 text-left pr-lg-5">
                <b>
                    <i>
                        NB: The endorsed copy of this applicant's declaration slip must be submitted at the point of registration
                       together with all related documents such as certified copies of certificate(s), transcript, birth certificate,etc
                   </i>
               </b>
            </p>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">
      <?= Html::a('Back',['document'],['data-method' => 'post', 'class' => 'btn btn-primary float-left']) ?>

            <?= Html::a('Print', ['/site/report', 'id' => ($personal->id??'')], [
                'class' => 'btn btn-success float-right',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
           <?= Html::a('Exit',['site/exit'],['data-method' => 'post', 'class' => 'btn btn-danger btn-flat float-right']) ?>
        </div>
    </div>
</div>


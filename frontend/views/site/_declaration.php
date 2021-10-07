<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-12">
            <table>
                <tr>
                    <td class="text-left">
                    <img src="images/download.png" alt="" height="70" width="150">
                    </td>
                    <td>
                        <span class="text-center"><b>Applicant Declaration</b></span>
                        <br>
                        <h5 class="text-center"><b>Summary of Applicant's Information from the On-line </b></h5>
                        <br>
                        <h6 class="text-center"><b>Application For Admission Form</b></h6>
                    </td>
                    <td class="text-right">
                    <img src="application/images/<?=$personal->personalDetails->photo;?>" alt="" height="70" width="100">
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
    <table class="table">
            <tbody>
            <tr style="border: none;">
                <td>
                    <b>Name :</b>  <?= strtoupper($personal->personalDetails->first_name . ' ' . $personal->personalDetails->middle_name .'  ' . $personal->personalDetails->last_name);?></li>
                </td>
                <td>
                <b>Gender: </b><?= strtoupper($personal->personalDetails->gender??'');?>
                </td>
            </tr>
            <tr style="border: none;">
                <td>
                <b>Date Of Birth : </b> <?= strtoupper($personal->personalDetails->date_of_birth??'');?>
                </td>
                <td>
                <b>Nationality : </b><?= strtoupper($personal->personalDetails->nationality??'');?>
                </td>
            </tr>
            <tr style="border: none;">
              
                <td>
                <b>Emergency Person : </b><?= strtoupper($personal->personalDetails->contact_person??'');?>
                </td>
                <td>
                <b> Emergency Contact :</b> <?= strtoupper($personal->personalDetails->contact_number??'');?>
                </td>
            </tr>

            <tr style="border: none;">
                <td>
                <b>Email:</b><?= strtoupper($personal->personalAddress->email??'');?>
                </td>
                <td>
                <b> Highest Education :</b> <?= strtoupper($personal->personalEducation->institution??'');?>
                </td>
            </tr>
         <tr style="border: none;">
                <td colspan="12">
                  <b>Program Applied For :</b> <?= strtoupper($personal->program->program->program_name??'').' ,';?>  <?= strtoupper($personal->program->program->program_code??'')?> 
                </td>
            </tr>  
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <p class="text-left pl-lg-1">
            I hereby declare that the information provided by me online  regarding the summary of my bio-data and entry
            qualification(s) as reproduced above are authentic and reflect my true records.I further declare that i
            will bear any consequences for any invalid information provided.
        </p>
        <br><br>
        <p class="text-left pl-lg-1">
            Applicant's Signature....................................................................................... Date Printed: <?= date('d-F-Y')?>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h4 class="float-left pl-lg-1">WITNESS</h4>
    </div>
    <div class="col-md-12">
        <h5 class="text-left pl-lg-1">To be completed by witness:</h5>
    </div>

    <div class="col-md-12">
        <p class="text-left pl-lg-1 pr-lg-1">
            I certify that the photograph as captured on the front page of this declaration is the true likeness of the applicant,
            Mr/Ms/Mrs............................................................................................................who is personally known by me.
        </p>
        <p class="text-left pl-lg-5 pr-lg-5">
            I have inspected the certificate(s) submitted by the applicant and to the best of my knowledge are
            genuine. The grades provided above are also exact replication of the grades indicated on the certificate(s).
        </p>

        <p class="text-left pl-lg-5 pr-lg-1">
            The witness must be someone of high repute(Charted member of any recognised Professional Body, Senior Public Servant or
            Head of last Education Institution attended by the applicant).
        </p>
       

        <p class="text-left pl-lg-5">
            Name: .................................................................................................................................................................
        </p>
        
        <p class="text-left pl-lg-5">
            Signature/Stamp:...................................................................................................................................................
        </p>
       
        <p class="text-left pl-lg-5">
            Status/Position:.....................................................................................................................................................
        </p>
 
        <p class="text-left pl-lg-5">
            Address:................................................................................................................................................................
        </p>
   
        <p class="text-left pl-lg-5">
            Date:.....................................................................................................................................................................
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
</body>
</html>

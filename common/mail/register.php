<div class="container register" style="width: 80%; height:50%;">
            <table style="background-color: lightblue; padding: 50px;">
                <tr>
                    <td>
                        <img src="/images/download.png" alt="" height="50" width="200">
                    </td>
                    <td class="text-right" style="padding-left: 150px" colspan="5">
                          POST OFFICE BOX LG149, Accra, Ghana<br>
                        <b>Tel:</b> 0303-937542/44<br>
                        <b>Email:</b> admissions@upsamail.edu.gh
                        <b>Website:</b> www.upsa.edu.gh

                        <br>
                        <br>
                        <br>
                         <?php echo date('jS,F Y'); ?>
                    </td>
                </tr>
                <br>
                <br>
                <tr>
                    <td><b>My Ref. No:</b>AA/VJ/UPSA/520</td>
                </tr>
                <br>
                <br>

                <tr>
                    <td>
                        <?= strtoupper(($modelp->first_name??'' ). ' ' .( $modelp->middle_name??'') . ' ' . ($modelp->last_name??'')); ?>
                        <br>
                        <?= 'Post Office Box '.strtoupper($addresses??'');?>
                        <br>
                        <?= strtoupper($modelad->city??'');?>
                        <br>
                        <br>
                        Dear <?= strtoupper($modelp->first_name??'').',';?>
                    </td>
                </tr>
                <br>
                <br>

                <tr>
                    <td class="text-left" colspan="8">
                        <b><u><?= strtoupper($program??'')?> ADMISSIONS - <?= $academic_year??'' ?> ACADEMIC YEAR</u></b>
                    </td>
                </tr>
                <br>
                <br>

                <tr>
                    <td colspan="12">
                       I have the pleasure to offer you admission into the one-year 
                       <b><?= strtoupper($program_name??'');?>  <?= $program??''?> </b> intake <?= $academic_year??'' ?> acadamic year being delivered by the University of Professional Studies,Accra as follows:
                    </td>
                </tr>
                <br>
                <br>
                <!-- <tr>
                    <td colspan="8">
                        1. You are admitted to <b>Level 0 </b> and your session is <b><?= strtoupper($personal->program->program0->session??'')?></b>
                    </td>
                </tr> -->
                <br>
                <br>
                <tr>
                    <td colspan="12">
                        1. Your Index Number is :  <b><?= strtoupper($personal->user->username??'');?></b> and your email address is <b><?= strtoupper($personal->user->username??'');?>@upsamail.edu.gh.</b>
                    </td>
                </tr>
                <br>
                <br>
                <tr>
                    <td colspan="12">
                        2. The Program Start on 2<sup>nd</sup> September,2021.
                    </td>
                </tr>
                <br>
                <br>
                <tr>
                    <td colspan="12">
                       3.  You will be requred to pay a non-refundable programme fee of <b>One thousand, three hundred and fifty Ghana cedis (GHS <?= $amount;?>).
                        The fees must be paid in full into University's account below the commencement of the programme.</b>
                    </td>
                </tr>
                <br>
                <br>
                <tr>
                    <td>
                       <b> Account Name : </b>
                    </td>
                    <td>
                       <b> University Of Professional Studies, Accra </b>
                    </td>
                </tr>

                <tr>
                    <td>
                       <b> Account Number : </b>
                    </td>
                    <td>
                       <b> 030110-0000001824888</b>
                    </td>
                </tr>
                <tr>
                    <td>
                       <b> Bank/Branch : </b>
                    </td>
                    <td>
                       <b> Absa - Legon Main </b>
                    </td>
                </tr>
                <br>
                <br>
                <tr>
                    <td colspan="12">
                        4. It is your responsibility to register with the professional body of your choice and pay for your external examination.
                    </td>
                </tr>
                <br>
                <tr>
                    <td colspan="12">
                        5. All correspondence in relation to your admission should be address to:
                    </td>
                </tr>
                <br>
                <tr>
                    <td colspan="12">
                       <b>
                           The Head, Programmes Unit <br>
                           University Of Professional Studies, Accra(UPSA)
                           <br>
                           P . O . Box LG 149
                           <br>
                           Accra
                       </b>
                    </td>
                </tr>
                <br>
                <br>
                <tr>
                    <td>
                        <br>
                        Yours faithfully,
                        <br>
                        <br>
                    
                        <br>
                        <b>
                            Anthony Afeadie
                            <br>
                         (Ag. Director Of Academic Affairs)
                        <br>
                        for: REGISTRAR</b>
                    </td>
                    <td colspan="8" class="text-right">
                      <img src="/application/images/<?= $modelp->photo?>" height="50" width="50">
                    </td>
                </tr>
            </table>
    </div>
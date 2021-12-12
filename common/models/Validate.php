<?php

namespace common\models;

use Exception;
use Yii;
use yii\helpers\Url;
use yii\web\UploadedFile;

class Validate  extends  \yii\db\ActiveRecord
{
    
    public function check($data)
     {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return  ucwords(strtolower($data));
     }

     
    public function replace($string)
    {  
      $str = preg_replace('/[^a-zA-Z0-9-_\.]/','', trim($string));
      return trim($str);
    }

    public function replace2($string)
    {  
      $str = preg_replace('/[^a-zA-Z0-9-_\.]/','', $string);
      return ucwords($str);
    }

   public function filter_mail($string) 
   {
      return preg_replace('/[^A-Za-z0-9.@\-]/', '', $string); // We remove special chars and accept only Alphs&Nums&.&@
   }

    public function check_only_int($data)
    {
        $str= preg_replace('/[^0-9\.]/','', trim($data));
       return $str;
    }


    public function userAdmins($password,$email,$role,$status){
   
      $userAdmin = new User();
      $imageFile = UploadedFile::getInstance($userAdmin, 'photo');
      if(isset($imageFile->size)){
      if(!file_exists(Url::to('@webfront/application/images/'))){
          mkdir(Url::to('@webfront/application/images/'),0777,true);
      }
      $fileName=time().''.$imageFile->baseName.'.'.$imageFile->extension;
      $imageName=Url::to('@webfront/application/images/').$fileName;
      $imageFile->saveAs($imageName);
      }
      $SID=date('Y').rand(0001,9999);
      $userAdmin->photo = $fileName??'';
      $userAdmin->username=$SID;
      $userAdmin->email= $email;
      $userAdmin->role_id=$role;
      $userAdmin->password_hash = $userAdmin->setPassword($password);
      $userAdmin->status = $status;
      $userAdmin->auth_key=$userAdmin->generateAuthKey();
      $userAdmin->save();
      
      //    Yii::$app->mailer->compose()
        //   ->setFrom(['ips.admin@upsamail.edu.gh'=>'UPSA'])
        //   ->setTo($email)
        //   ->setSubject('UPSA Admission')
        //   ->setHtmlBody('')
        //  ->send();
      // Yii::$app->mailer->compose()
      // ->setFrom(['ips.admin@upsamail.edu.gh'=>'UPSA'])
      // ->setTo($email)
      // ->setSubject('Your Credentials IPS Portal')
      //   ->setHtmlBody('Your Pass:'.$password.' And Your Account Name is :'.$SID)
      // ->send();


              //  $image=Yii::getAlias('@app/web/image/logo.png');
            // $content=$this->renderPartial('mail');
          // $body= Yii::$app->view->renderFile('@common/mail/students-details.php',['username'=>$SID, 'email'=>$email]);

        //   Yii::$app->mailer->compose()
        //   ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name. ' robot'])
        //   ->setTo($email)
        //   ->setSubject('IPS Student Credentials Admission')
        //   ->setHtmlBody('')
        //  ->send();

  // return Yii::$app->mailer->compose(['html' => 'students-details'],['name'=>$SID])
  // ->setTo($email)
  // ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name ])
  // ->setSubject('Your Credentials UPSA Hostel Management System')
  // ->setTextBody("")
  // ->send();

      // return Yii::$app
      // ->mailer
      // ->compose(
      //     ['html' => 'students-details'],
      //     ['user' => $SID]
      // )
      // ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name. ' robot'])
      // ->setTo($email)
      //  ->setSubject('Account registration at ' . $password)
      //  ->setTextBody("")
      // ->send();
   return $userAdmin->id;
    }


  //   private  function actionGetpass($name) {
  //     $alphabet = "abcdefghijklmnopqrstuwxyz0123456789".$name;
  //     $pass = array(); //remember to declare $pass as an array
  //     $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
  //     for ($i = 0; $i < 8; $i++) {
  //         $n = rand(0, $alphaLength);
  //         $pass[] = $alphabet[$n];
  //     }
  //     return implode($pass); //turn the array into a string
  // }



  // public  function applicantPassword($name){

  //   return   $this->actionGetpass($name);
  // }

//Get the password for the user
// $pass = $this->actionGetpass($model->username);



#update the user details with new password
#salt the password_hash
// $salt_passwd ="UPSAISTD".$pass
// $msg_insert = Yii::$app->db->createCommand()->update('user',['password_hash' => Yii::$app->security->generatePasswordHash($salt_passwd),'email'=>$model->email],[
//                     'username'=>trim($model->username),
//                   ])
//            ->execute();


// #Send Email to the user 
// // $smail = new EmpInfo();

// $smail->sendEmail($model->email,$username,$username,$pass);

  // function sendEmail($email,$name,$username,$pass){
  // return Yii::$app->mailer->compose(['html' => 'passsend-html'],['name'=>$name,'username'=>$username,'pass'=>$pass])
  // ->setTo($email)
  // ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name ])
  // ->setSubject('Your Credentials UPSA Hostel Management System')
  // ->setTextBody("")
  // ->send();
// }


public function professionalMail($id,$program,$amount,$address,$academic_year,$programName,$email){

    $add=$this->check_only_int($address);
    Yii::$app->mailer->compose(['html' => 'register'],[
    'modelp' => TblAppPersDetails::find()->where(['id'=>$id])->one(),
    'program'=>$program,'amount'=>$amount,
    'addresses'=>$add,
    'academic_year'=>$academic_year,
    'program_name'=>$programName
    ])
  ->setFrom(['ips.admin@upsamail.edu.gh'=>'UPSA'])
      ->setTo($email)
      ->setSubject('UPSA ADMISSION')
      ->setTextBody("")
      ->send();
}


public function accessMail($id,$program,$amount,$address,$academic_year,$programName,$email){

  $add=$this->check_only_int($address);
    Yii::$app->mailer->compose(['html' => 'register'],[
    'modelp' => TblAppPersDetails::find()->where(['id'=>$id])->one(),
    'program'=>$program,'amount'=>$amount,
    'addresses'=>$add,
    'academic_year'=>$academic_year,
    'program_name'=>$programName
    ])
  ->setFrom(['ips.admin@upsamail.edu.gh'=>'UPSA'])
      ->setTo($this->filter_mail($email))
      ->setSubject('UPSA ADMISSION')
      ->setTextBody("")
      ->send();
}


}

?>




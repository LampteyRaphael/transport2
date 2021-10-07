<?php

namespace common\models;

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

//   function sendEmail($email,$name,$username,$pass){
//   return Yii::$app->mailer->compose(['html' => 'passsend-html'],['name'=>$name,'username'=>$username,'pass'=>$pass])
//   ->setTo($email)
//   ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name ])
//   ->setSubject('Your Credentials UPSA Hostel Management System')
//   ->setTextBody("")
//   ->send();
// }



}

?>




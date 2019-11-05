<?php
namespace App\Model;

class Validator {

    public function clean($data)
    {
    $cleanData= [];
    foreach($data as $key => $value){
         $value = trim($value);
         $value = stripslashes($value);
         $value = strip_tags($value);
         $value = htmlspecialchars($value);
         $cleanData[$key]=$value;
        }
      return $cleanData;
    }

    public function check_length($input,$value = "", $min,$max)
    {
        if((mb_strlen($value) < $min || mb_strlen($value) > $max)){
        return $errorMessage[]= "В поле $input необходимо ввести от $min до $max символов";
        }
    }

    public function check_letters($input,$name)
    {
        if( !preg_match("/^[a-zA-Zа-яА-ЯёЁ]+$/u",$name) ){
            return $errorMessage[]= "В поле $input должны быть только буквы";
        }
    }

    public function check_phone($phone)
    {
       if(!is_numeric($phone)){
           $errorMessage[]= "В поле phone должны быть только цифры";
       }
       $lengs=$this->check_length('phone',$phone, 7, 13);
       if($lengs!==null){
            $errorMessage[]=$lengs;
           }

       if($errorMessage) {
        return  $errorMessage;
        }
    }

    public function check_email($email)
    {
        $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL);
        if($email_validate==false){
            return $errorMessage[]= "Неверный формат email";
        }
    }

    public function check_name($name)
    {
        $letters=$this->check_letters('name',$name);
        
        if($letters!==null){
            $errorMessage[]=$letters;
        }
        $lengs=$this->check_length('name',$name, 2, 25);
        if($lengs!==null){
            $errorMessage[]=$lengs;
           }
        if($errorMessage) {
        return  $errorMessage;
        }
    }

    public function check_last_name($last_name)
    {
        $letters=$this->check_letters('lastName',$last_name);

        if($letters!==null){
            $errorMessage[]=$letters;
        }
        $lengs=$this->check_length('lastName',$last_name, 2, 30);

        if($lengs!==null){
            $errorMessage[]=$lengs;
           }
        if($errorMessage) {
        return  $errorMessage;
        }
    }

   /* public function validation($data)
    {
        foreach($data as $key => $value){
             if(empty($value)){
            $errorMessage[]="поле $key не заполнено\n";
            }
      }
     return $errorMessage;
    }
  */
}

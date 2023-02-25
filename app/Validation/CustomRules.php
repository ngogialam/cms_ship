<?php
namespace App\Validation;

class CustomRules{
  // public 
  // Rule is to validate mobile number digits
  // protected static $validation  =  \Config\Services::validation();

  public function phoneValidate(string $str, string &$error = null): bool
    {
        $phone =$str;
        if(preg_match('/(0[0])+([0-9]{9})\b/',$phone)){     
            return false;
        }else if(!preg_match('/^[0-9]+$/',$phone) && !preg_match('/(\+84)+([0-9]{9})\b|(0[2])+([0-9]{9})\b/',$phone) ){   
            return false;
        }else if (!preg_match('/(0[2|3|5|7|8|9])+([0-9]{8})\b|(\+84)+([0-9]{9})\b|(0[2])+([0-9]{9})\b/', $phone)) {    
            return false;
        }
        return true;
    }
    
    public function passwordValidate(string $str, string &$errors = null): bool
    {
        $password = $str;
        // echo $password;die;
        if(preg_match('/^(?=.{8,15}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/',$password)){
            return true;
        }
        return false;

    }

    public function fullNameValidate(string $str, string &$errors = null): bool
    {
        $fullName = $str;
        if(strlen($fullName) <= 4){
            return false;
        }
        return true;
    }

    // legalsAndRulesValidate

    public function legalsAndRulesValidate(string $str = null, string &$errors = null)
    {
        $legalsAndRules = trim($str);
        if($legalsAndRules == 1){
            return true;
        }
        return false;

    }
    public function checkNumberRemain($str = null, string $param)
    {
       $remain = $param;
       $amount = str_replace(',','',$str);
        if($remain < $amount ){
            return false;
        }
        return true;

    }
    public function checkMaxAmount($str = null, string $param)
    {
       $maxAmount = str_replace(',','',$param);
       $amount = str_replace(',','',$str);
        if($maxAmount < $amount ){
            return false;
        }
        return true;

    }
    public function checkMinAmount($str = null, string $param)
    {
       $minAmount = str_replace(',','',$param);
       $amount = str_replace(',','',$str);
        if($minAmount > $amount ){
            return false;
        }
        return true;

    }

    //FastOrder
    public function checkPickupType($str = null, string $param = null){
        $arr_check_pickup_type = ['1','2'];
        if(in_array($str,$arr_check_pickup_type)){
            return true;
        }else{
            return false;
        }
        die;
    }
    public function checkpaymentType($str = null, string $param = null){
        $arr_check_pickup_type = ['1','2'];
        if(in_array($str,$arr_check_pickup_type)){
            return true;
        }else{
            return false;
        }
        die;
    }
    public function checkorderType($str = null, string $param = null){
        $arr_check_pickup_type = ['1','2'];
        if(in_array($str,$arr_check_pickup_type)){
            return true;
        }else{
            return false;
        }
        die;
    }
    public function checkweight($str = null, string $param = null){
        if (!preg_match('/^[0-9]+$/', $str)) {
            return false;
        } else {
            return true;
          }
    }
    public function checkweightNull($str = null, string $param = null){
        if($str <= 0){
            return false;
        }else{
            return true;
        }
    }
    public function checklength($str = null, string $param = null){
        if (!preg_match('/^[0-9]+$/', $str)) {
            return false;
        } else {
            return true;
          }
    }
    public function checkheight($str = null, string $param = null){
        if (!preg_match('/^[0-9]+$/', $str)) {
            return false;
        } else {
            return true;
          }
    }
    public function checksumPriceOrder($str = null, string $param = null){
        if (!preg_match('/^[0-9]+$/', $str)) {
            return false;
        } else {
            return true;
          }
    }
    public function checkwidth($str = null, string $param = null){
        if (!preg_match('/^[0-9]+$/', $str)) {
            return false;
        } else {
            return true;
          }
    }
    public function checkrequireNote($str = null, string $param = null){
        $arr_require_note = ['1','2','3'];
        if(in_array($str,$arr_require_note)){
            return true;
        }else{
            return false;
        }
    }
    public function checkreceiverProvinceCode($str = null, string $param = null){
        echo $str;
        if($str != ''|| $str != 0){
            echo 1213;
            return true;
        }else{
            return false;
        }
    }
    public function checkreceiverDistrictCode($str = null, string $param = null){
        echo $str;die;
        if($str != ''|| $str != 0){
            return true;
        }else{
            return false;
        }
    }
    public function checkreceiverWardCode($str = null, string $param = null){
        echo $str;
        if($str != ''|| $str != 0){
            return true;
        }else{
            return false;
        }
    }
    public function countCharacter($str = null, string $param = null){
        $check = mb_strlen($str, 'UTF8');
        if ($check >= 200) {
            return false;
        } else {
            return true;
          }
    }
    //End FastOrder
}
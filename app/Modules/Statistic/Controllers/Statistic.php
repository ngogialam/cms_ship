<?php

namespace App\Modules\Statistic\Controllers;

class Statistic extends BaseController {
  public function thongke(){
    $data = [];
    $title = "Thống kê";
    $data['title'] = $title;

    //Prepare view
    $get = $this->request->getGet();
    $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
    $token = $dataUserAuthen->token;
    $sessionKey = $dataUserAuthen->sessionKey;
    $username = $dataUserAuthen->username;
    $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
    $dataProvince = $this->userCommon->getProvince($dataUserAuthen);
    //Get data warehouse
    $pickupAddress = $dataUser->pickupAddress;
    $data['pickupAddress'] = $pickupAddress;
    $data['dataUser'] = $dataUser;


    $data['view'] = 'App\Modules\Statistic\Views\thongke';
    return view('layoutShop/layout', $data);
  }
  
}
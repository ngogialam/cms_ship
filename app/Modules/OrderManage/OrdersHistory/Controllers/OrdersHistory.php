<?php

namespace App\Modules\OrderManage\OrdersHistory\Controllers;

class OrdersHistory extends BaseController {
    public function lsdonhang(){
        $data = [];
        $title = "Lịch sử đơn hàng";
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
  
        $data['view'] = 'App\Modules\OrderManage\OrdersHistory\Views\lichsudonhang';
        return view('layoutShop/layout', $data);
    }

    
}
<?php

namespace App\Modules\Authenticator\Controllers;

class ConsultOrders extends BaseController {
    
    public function ConsultOrders(){
        $krd = get_cookie('__krd');
        $auth = [];
        if($krd){
            $dataAuth = $this->redis->get($krd);
            if($dataAuth){
                $auth = (array)json_decode($dataAuth);
                $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
                $avatarUser = json_decode($this->redis->get($dataUserAuthen->username))->avatar;
              
            }
        }
        $get = $this->request->getGet();
        $order = '';
        $data = [];
        if(!empty($get)){
            $order = $get['searchOrders'];
            $dataCallSearch = [
                "orderDetailCodes" => $order
            ];
            $responseSearchOrder = $this->AuthenticatorModels->getOrderSearch($dataCallSearch);
            if($responseSearchOrder->status == 200){
                $dataOrders = $responseSearchOrder->data;
            }
        }
        $title = "";
        $data['dataDetailOrders'] = $dataOrders;
        $data['order'] = $order;
        $data['auth'] = $auth;
        $data['title'] = $title;
        $data['avatarUser'] = $avatarUser;
        $data['view'] = 'App\Modules\Authenticator\Views\consultOrders';
        return view('layout/layoutConsult', $data);
    }
}
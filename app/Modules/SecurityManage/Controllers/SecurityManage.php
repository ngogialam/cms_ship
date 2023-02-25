<?php

namespace App\Modules\SecurityManage\Controllers;

class SecurityManage extends BaseController {
    //Thay đổi mật khẩu
    public function changePassword(){
        $data = [];
        $title = lang('Label.lbl_changePassword');

        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $token = $dataUserAuthen->token;
        $username = $dataUserAuthen->username;
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;

        $post = $this->request->getPost();
        if(!empty($post)){
            $currentPassword = trim($post['currentPassword']);
            $newPassword = trim($post['newPassword']);
           
            
            //Check Validation form 
            $this->validation->setRules([
                'currentPassword'               => [
                    'label' => 'Label.password',
                    'rules' => 'required',
                    'errors' => [
                    ]
                ],
                'newPassword'               => [
                    'label' => 'Label.password',
                    'rules' => 'required|passwordValidate['.$newPassword.']',
                    'errors' => [
                    ]
                ],
                'reNewPassword'               => [
                    'label' => 'Label.password',
                    'rules' => 'required|matches[newPassword]',
                    'errors' => [
                    ]
                ]
            ]);

            
            if(!$this->validation->withRequest($this->request)->run()){
                $data['getErrors'] = $this->validation->getErrors();
                $data['view'] = 'App\Modules\SecurityManage\Views\changePassword';
                $data['listValues'] = $post;
                // return view('layout/layout', $data);
            }else{ 
              
                $headerGetListOrder = [
                    'Accept: application/json',
                    'Content-Type: application/json',
                    'Authorization:'.$token
                ];
              $dataParams = [
                  "oldPassword"=> md5($currentPassword),
                  "newPassword"=> $newPassword
              ];

              $result =  $this->SecurityManageModels->changePassword($dataParams, $username, $headerGetListOrder);
              $statusLogin = $result->status;
              if($statusLogin == 410){
                setcookie ("__update",'success^_^'.$result->message,time()+ (60*10) , '/');
                $krd = get_cookie('__krd');
                if($krd){
                    $this->redis->del($krd);
                    setcookie ("__krd",'',time()+ (1) , '/');
                }
                return redirect()->to('/dang-nhap');
              }else{
                setcookie ("__update",'false^_^'.$result->message,time()+ (60*10) , '/');
                return redirect()->to('/doi-mat-khau');
              }
            }
        }

        //Prepare view
        
        $data['title'] = $title;
        $data['dataUser'] = $dataUser;
        $data['view'] = 'App\Modules\SecurityManage\Views\changePassword';
        return view('layoutShop/layout', $data);
    }



    public function changePhone(){
        $data = [];
        $title = lang('Label.lbl_changePhone');
        $post = $this->request->getPost();
        if(!empty($post)){
            echo '<pre>';
            print_r($post);
            die;
        }

        //Prepare view
        $get = $this->request->getGet();
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $token = $dataUserAuthen->token;
        $sessionKey = $dataUserAuthen->sessionKey;
        $username = $dataUserAuthen->username;
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;
        $dataProvince = $this->userCommon->getProvince($dataUserAuthen);
        //Get data warehouse
        $pickupAddress = $dataUser->pickupAddress;
        $data['pickupAddress'] = $pickupAddress;
        $data['dataUser'] = $dataUser;

        $data['title'] = $title;
        $data['view'] = 'App\Modules\SecurityManage\Views\changePhone';
        return view('layoutShop/layout', $data);
    }
}
<?php

namespace App\Modules\Banks\Controllers;

class ConnectBank extends BaseController {
    public function cnBank(){
        $data = [];
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $token = $dataUserAuthen->token;
        $username = $dataUserAuthen->username;
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;

        if(empty($dataUserAuthen)){
            $this->authenticator->logOut();
        }
        $dataCallApi = Array(
            'withdrawType' => 0
        );
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:'.$token
        ];

        $listBanksCod = [];
        $result = $this->banksModels->getListBanks($username, $headers, $dataCallApi);
        if($result->status == 200){
            $listBanksCod = $result->data->banks;
        }

        $data['dataUser'] = $dataUser;
        $data['listBankCod'] = $listBanksCod;
        $title = lang('Label.lbl_addInfoBank');
        $data['title'] = $title;
        $data['view'] = 'App\Modules\Banks\Views\connectBank';
        return view('layoutShop/layout', $data);
    }
    public function addBank($reTry = 0){
        $data = [];
        $dataPost = [];
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $token = $dataUserAuthen->token;
        $username = $dataUserAuthen->username;
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;

        $bankInfo = json_decode($this->redis->get('BANK_INFO'));

        $title = lang('Label.lbl_bankLink');
        $post = $this->request->getPost();
        if($reTry == 1){
            $dataOld = json_decode($this->redis->get('__linkBank'.$username));
            if($dataOld != ''){
                $dataPost = Array(
                    "accountName" => $dataOld->accUsername,
                    "bankCode" => $dataOld->bankCode,
                    "accountNumber" => $dataOld->accountNo,
                    "accountNoType" => $dataOld->accountNoType
                );
            }
        }
        
        if(!empty($post)){

            $this->validation->setRules([
                'bankCode'               => [
                    'label' => 'Label.lbl_bankCode',
                    'rules' => 'required',
                    'errors' => [
                    ]
                ],
                'accountNumber'               => [
                    'label' => 'Label.lbl_accountNumber',
                    'rules' => 'required|min_length[1]|max_length[20]',
                    'errors' => [
                    ]
                ],
                'accountName'               => [
                    'label' => 'Label.lbl_inputAccountName',
                    'rules' => 'required',
                    'errors' => [
                    ]
                ]
            ]);
            if(! $this->validation->withRequest($this->request)->run())
            {
                $data['getErrors'] = $this->validation->getErrors();
                $data['bankInfo'] = $bankInfo;
                $data['dataUser'] = $dataUser;
                $data['dataPost'] = $post;
                $data['view'] = 'App\Modules\Banks\Views\addBank';
                $data['listValues'] = $post;
                return view('layoutShop/layout', $data);
            }else{
                $bankCode = $post['bankCode'];
                $optradio = $post['accountNoType'];
                $accountNumber = $post['accountNumber'];
                $accountName = $post['accountName'];

                // "accountNo" => $accountNumber,
                // "bankCode" => $bankCode,
                $dataCallApi = Array(
                    "username" => $username,
                    "accUsername" => $accountName,
                    "bankCode" => $bankCode,
                    "accountNo" => $accountNumber,
                    "accountNoType" => $optradio,
                );
                $headers = [
                    'Accept: application/json',
                    'Content-Type: application/json',
                    'Authorization:'.$token
                ];
                
                //Log redis
                $this->clog->info('WAREHOUSE','USERNAME:'.$username,'========CALL_CREATE_BANK_COD=========');
                $this->clog->info('WAREHOUSE','DATA_CREATE_BANK_COD_USERNAME:'.$username,$dataCallApi);
                //Log file
                $this->logger->info('USERNAME: '.$username .'========CALL_CREATE_BANK_COD=========', array(), 'CALLAPI');
                $this->logger->info('USERNAME: '.$username .'====DATA_CREATE_BANK_COD || ' .json_encode($dataCallApi,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
                //Call API
                $result = $this->callServer->PostJson(URL_API_PRIVATE.'user/addWithdrawBankAccount',$dataCallApi, $headers)['data'];

                $this->clog->info('WAREHOUSE','RESPONSE_CREATE_BANK_COD_USERNAME:'.$username,(array) $result);
                $this->clog->info('WAREHOUSE','USERNAME:'.$username,'========END_CREATE_BANK_COD=========');
                
                $this->logger->info('RESPONSE_CALL_API_USERNAME: '.$username.' || '.json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
                $this->logger->info('========END_CREATE_BANK_COD=========: '.$username.' || ', array(), 'CALLAPI');
                if($result->status == 200){                    
                    // setcookie ("__linkBank",'success',time()+ (60*10) , '/');
                    $this->redis->set('__linkBank'.$username, json_encode($dataCallApi),1);
                    if($reTry == 2){
                        return redirect()->to('/rut-tien');
                    }
                    $dataSuccess = Array(
                        "status" => $result->status,
                        "message" => $result->message
                    );
                    return $this->otpSuccess($dataSuccess);
                }else{
                    $dataCallApi = Array(
                        "username" => $username,
                        "accUsername" => $accountName,
                        "bankCode" => $bankCode,
                        "accountNo" => $accountNumber,
                        "accountNoType" => $optradio,
                        "status" => $result->status,
                        "message" => $result->message

                    );
                    $this->redis->set('__linkBank'.$username, json_encode($dataCallApi),3600);
                    // setcookie ("__linkBank",'false',time()+ (60*10) , '/');
                    return redirect()->to('/xac-thuc-that-bai');
                }

            }
        }
        $data['dataPost'] = $dataPost;
        $data['dataUser'] = $dataUser;
        $data['bankInfo'] = $bankInfo;
        $data['title'] = $title;
        $data['view'] = 'App\Modules\Banks\Views\addBank';
         return view('layoutShop/layout', $data);
    }
    public function otp(){
        $data = [];
        $title = lang('Label.lbl_addInfoBank');
        $data['title'] = $title;
        $dataUserAuthen = $this->userCommon->getDataUserAuthen($this->krd);
        $dataUser = $this->userCommon->getUser($dataUserAuthen);
        $dataUser->availableBalance = $this->dataBalance;
        $data['dataUser'] = $dataUser;
    

        $data['view'] = 'App\Modules\Banks\Views\otp';
         return view('layoutShop/layout', $data);
    }
    public function otpSuccess($dataSuccess = Array()){
        $dataSuccess = Array(
            "status" => '200',
            "message" => 'Thành công'
        );
        $data = [];
        if(empty($dataSuccess) || $dataSuccess['status' == 200]){
            return redirect()->to('lien-ket-ngan-hang');
        }
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $token = $dataUserAuthen->token;
        $username = $dataUserAuthen->username;
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;

        $data['dataUser'] = $dataUser;

        $title = lang('Label.lbl_addInfoBank');
        $data['title'] = $title;
        $data['dataSuccess'] = $dataSuccess;
        $data['view'] = 'App\Modules\Banks\Views\otpSuccess';
         return view('layoutShop/layout', $data);
    }
    public function otpFalse(){
        $data = [];
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $token = $dataUserAuthen->token;
        $username = $dataUserAuthen->username;
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;

        $title = lang('Label.lbl_bankLink');
        
        $dataOld = json_decode($this->redis->get('__linkBank'.$username));
        if($dataOld == ''){
            return redirect()->to('/lien-ket-ngan-hang');
        }
        $data['dataUser'] = $dataUser;

        $data['dataOld'] = $dataOld;
        $data['title'] = $title;
        $data['view'] = 'App\Modules\Banks\Views\otpFalse';
         return view('layoutShop/layout', $data);
    }
    public function allBank(){
        $data = [];

        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $token = $dataUserAuthen->token;
        $username = $dataUserAuthen->username;
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;

        $dataCallApi = Array(
            'withdrawType' => 0
        );
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:'.$token
        ];
        $result = $this->callServer->Get(URL_API_PRIVATE.'user/bank', $dataCallApi ,$headers)['data'];
        // echo '<pre>';
        // print_r($result);die;
        $title = lang('Label.lbl_bankLink');
        $data['dataUser'] = $dataUser;
        $data['title'] = $title;
        $data['view'] = 'App\Modules\Banks\Views\allBank';
         return view('layoutShop/layout', $data);
    }
    public function removeBank(){
        $post = $this->request->getPost();
        if(!empty($post)){
            $dataRemoveBank = [
                'id' => $post['bankId']
            ];
            $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
            $token = $dataUserAuthen->token;
            $username = $dataUserAuthen->username;
            $headers = [
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization:'.$token
            ];
            $resultRemoveBank = $this->banksModels->removeBank($username, $headers, $dataRemoveBank);
            if($resultRemoveBank->status == 200){
                echo json_encode(array('success' => true, 'message' => 'Thành công'));
            }else{
                echo json_encode(array('success' => false, 'message' => 'Không thành công'));
            }
        }
    }

   
   
}
<?php

namespace App\Modules\WarehouseManage\Controllers;

class WarehouseManage extends BaseController {
    
    //Danh sách kho
    public function listWarehouse($segment='', $page = 1){
        $listWareHouse = [];
        $title = lang('Label.lbl_listWarehouse');
        $getGet = $this->request->getGet();
        if(!empty($getGet)){
            $status = $getGet['status'];
            $page = $segment ? $segment: $page;
        }else{
            $status = 1;
            $page = $segment ? $segment: $page;
        }
        $size = PERPAGE; 
        $page = $page ? $page : 1;
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        
        if(empty($dataUserAuthen)){
            $this->authenticator->logOut();
        }
        // $dataUser = $this->userCommon->getUser($dataUserAuthen);
        $token = $dataUserAuthen->token;
        // $dataUser = $this->authenticatorDetailUser->getUser($dataUserAuthen);
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;
        $dataListAllWareHouse = json_decode($this->redis->get($dataUser->username));
        $listAllWarehouse = $dataListAllWareHouse->pickupAddress;
        if(empty($listAllWarehouse)){
            $countWarehouse = 0;
        }else{
            $countWarehouse = 1;
        }
        $dataCallApi = Array(
            'status' => $status,
            'page' => $page,
            'size' => $size
        );
        $headers = [
            'Authorization:'.$token
        ];
        // getListWareHouse
        $listWareHouseResult = $this->warehouseManageModel->getListWareHouse($dataUser->username,$dataCallApi,$headers);
        if($listWareHouseResult->status == 200){
            $listWareHouse = $listWareHouseResult->data->shopAddress; 
        }
        $primaryWarehouse = [];
        foreach($listWareHouse as $key => $wareHouse){
            if($wareHouse->isDefault == 1){
                $primaryWarehouse[] = $wareHouse; 
                unset($listWareHouse[$key]);
                break;
            }
        }
        $total = ($listWareHouseResult->data->total) ? $listWareHouseResult->data->total : 0;
        $data['pages'] = $this->pager->makeLinks($page, PERPAGE, $total, 'default_full', 3);
        $data['page'] = $page;
        $data['pager'] = $this->pager;
        $data['countWarehouse'] = $countWarehouse;
        $data['status'] = $status;
        $data['dataUser'] = $dataUser;
        $data['primaryWarehouse'] = $primaryWarehouse;
        $data['listWareHouse'] = $listWareHouse;
        $data['title'] = $title;
        $data['view'] = 'App\Modules\WarehouseManage\Views\listWarehouse';
        return view('layoutShop/layout', $data);
    }
    //Tạo mới kho
    public function createWarehouse(){
        $data = [];
        $title = lang('Label.lbl_createWarehouse');
        $post = $this->request->getPost();

        $dataUserAuthen = json_decode($this->redis->get($this->krd));
        if(empty($dataUserAuthen)){
            $this->authenticator->logOut();
        }
        $token = $dataUserAuthen->token;
        // $dataUser = $this->warehouseManageModel->getUser($dataUserAuthen);
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;
        $dataProvince = $this->userCommon->getProvince($dataUserAuthen);
        $username = $dataUser->username;
        $data['dataUser'] = $dataUser;
        $data['dataProvince'] = $dataProvince;
        $addressWarehouse = $post['addressWarehouse'];
        $mainWareHouse = 0;
        if(!empty($post)){
            $warehouseName = $post['warehouseName'];
            $senderName = $post['senderName'];
            $shopPhone = $post['phone'];
            $province = $post['province'];
            $district = $post['district'];
            $ward = $post['ward'];
            $this->validation->setRules([
                'warehouseName'               => [
                    'label' => 'Label.lbl_nameWarehouse',
                    'rules' => 'required',
                    'errors' => [
                    ]
                ],
                'senderName'               => [
                    'label' => 'Label.lbl_senderName',
                    'rules' => 'required',
                    'errors' => [
                    ]
                ],
                'phone'               => [
                    'label' => 'Label.phone',
                    'rules' => 'required|phoneValidate['.$shopPhone.']',
                    'errors' => [
                    ]
                ],
                'province'               => [
                    'label' => 'Label.lbl_chooseProvince',
                    'rules' => 'required',
                    'errors' => [
                    ]
                ],
                'district'               => [
                    'label' => 'Label.lbl_chooseDistrict',
                    'rules' => 'required',
                    'errors' => [
                    ]
                ],
                'ward'               => [
                    'label' => 'Label.lbl_chooseWard',
                    'rules' => 'required',
                    'errors' => [
                    ]
                ],
                'addressWarehouse'               => [
                    'label' => 'Label.lbl_addressWarehouse',
                    'rules' => 'required',
                    'errors' => [
                    ]
                ]
            ]);
            //Run validation
            if(!$this->validation->withRequest($this->request)->run())
            {
                $data['dataWareHouse'] = $post;
                
                $dataDistrict = $this->userCommon->getDistrict($post['province'], $post['district'] );
                $dataWards = $this->userCommon->dataWards($post['province'], $post['district'], $post['ward']);
                $data['dataProvince'] = $dataProvince;
                $data['dataDistrict'] = $dataDistrict;
                $data['dataWards'] = $dataWards;
                $data['title'] = $title;
                $data['getErrors'] = $this->validation->getErrors();
                $data['view'] = 'App\Modules\WarehouseManage\Views\createWarehouse';
                $data['listValues'] = $post;
                return view('layoutShop/layout', $data);
            }
            else{
                
                if(isset($post['mainWareHouse']) && $post['mainWareHouse'] == 'on'){
                    $mainWareHouse = 1;
                }
                $dataCallApi = Array(
                        "requestId"=> "CREATE_WAREHOUSE",
                        "username"=> $username,
                        "shopName"=> $warehouseName,
                        "senderName"=> $senderName,
                        "shopPhone"=> $shopPhone,
                        "provinceCode"=> $province,
                        "districtCode"=> $district,
                        "wardCode"=> $ward,
                        "addressDetail"=> $addressWarehouse,
                        "isDefault"=> $mainWareHouse
                );
                $headers = [
                    'Accept: application/json',
                    'Content-Type: application/json',
                    'Authorization:'.$token
                ];
                $result = $this->warehouseManageModel->createWareHouse($dataUser->username,$dataCallApi,$headers);
                if($result->status == 200){                    
                    setcookie ("__updateNoti",'success',time()+ (60*10) , '/');
                    return redirect()->to('/danh-sach-kho-hang');
                }else{
                    setcookie ("__updateNoti",'false',time()+ (60*10) , '/');
                    return redirect()->to('/danh-sach-kho-hang');
                }

            }
        }
        
        $data['title'] = $title;
        $data['view'] = 'App\Modules\WarehouseManage\Views\createWarehouse';
        return view('layoutShop/layout', $data);
    }
    //Cập nhật kho
    public function updateWarehouse($storeId = ''){
        $data = [];
        $title = lang('Label.lbl_updateWarehouse');
        $post = $this->request->getPost();
        $dataUserAuthen = json_decode($this->redis->get($this->krd));
        if(empty($dataUserAuthen)){
            $this->authenticator->logOut();
        }
        $token = $dataUserAuthen->token;
        // $dataUser = $this->userCommon->getUser($dataUserAuthen);
        // $dataUser = $this->warehouseManageModel->getUser($dataUserAuthen);
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;

        $username = $dataUser->username;
        $dataWareHouse = [];
        if($storeId != ''){
            $dataUserRedis = json_decode($this->redis->get($username));
            $dataWareHouseKey = array_search($storeId, array_column($dataUserRedis->pickupAddress, 'id'));
            
            if($dataWareHouseKey !== false){
                $dataWareHouse = $dataUserRedis->pickupAddress[$dataWareHouseKey];
            }else{
                return redirect()->to('/danh-sach-kho-hang');
            }
        }else{
            return redirect()->to('/danh-sach-kho-hang');
        }           

        if(empty($dataWareHouse)){
            return redirect()->to('/danh-sach-kho-hang');
        }
        $dataProvince = $this->userCommon->getProvince();
        if(!empty($post)){
            $warehouseName = $post['warehouseName'];
            $senderName = $post['senderName'];
            $shopPhone = $post['phone'];
            $province = $post['provinceCode'];
            $district = $post['districtId'];
            $ward = $post['wardId'];
            $addressWarehouse = $post['address'];
            
            $mainWareHouse = 0;
            if(isset($post['mainWareHouse']) && $post['mainWareHouse'] == 'on' || isset($post['mainWareHouse']) && $post['mainWareHouse'] == '1'){
                $mainWareHouse = 1;
            }
            $status = $post['status'];
            $this->validation->setRules([
                'warehouseName'               => [
                    'label' => 'Label.lbl_nameWarehouse',
                    'rules' => 'required',
                    'errors' => [
                    ]
                ],
                'senderName'               => [
                    'label' => 'Label.lbl_senderName',
                    'rules' => 'required',
                    'errors' => [
                    ]
                ],
                'phone'               => [
                    'label' => 'Label.phone',
                    'rules' => 'required|phoneValidate['.$shopPhone.']',
                    'errors' => [
                    ]
                ],
                'provinceCode'               => [
                    'label' => 'Label.lbl_chooseProvince',
                    'rules' => 'required',
                    'errors' => [
                    ]
                ],
                'districtId'               => [
                    'label' => 'Label.lbl_chooseDistrict',
                    'rules' => 'required',
                    'errors' => [
                    ]
                ],
                'wardId'               => [
                    'label' => 'Label.lbl_chooseWard',
                    'rules' => 'required',
                    'errors' => [
                    ]
                ],
                'address'               => [
                    'label' => 'Label.lbl_addressWarehouse',
                    'rules' => 'required',
                    'errors' => [
                    ]
                ]
            ]);
            //Run validation
            // || $errorsMainWarehouse == 1
            if(!$this->validation->withRequest($this->request)->run() )
            {
                $post['name'] = $post['warehouseName'];
                $data['dataWareHouse'] = $post;
                $getErrors = $this->validation->getErrors();
                // if($errorsMainWarehouse == 1){
                //     $getErrors['statusMainWarehouse'] = lang('Label.lbl_statusMainWarehouse');
                // }
                $data['dataUser'] = $dataUser;
                $dataDistrict = $this->userCommon->getDistrict($post['provinceCode'], $post['districtId'] );
                $dataWards = $this->userCommon->dataWards($post['provinceCode'], $post['districtId'], $post['wardId']);
                $data['dataProvince'] = $dataProvince;
                $data['dataDistrict'] = $dataDistrict;
                $data['dataWards'] = $dataWards;
                $data['title'] = $title;
                $data['getErrors'] = $getErrors;
                $data['view'] = 'App\Modules\WarehouseManage\Views\updateWarehouse';
                $data['listValues'] = $post;
                return view('layoutShop/layout', $data);
            }
            else{
                
                if(isset($post['mainWareHouse']) && $post['mainWareHouse'] == 'on' || isset($post['mainWareHouse']) && $post['mainWareHouse'] == '1'){
                    $mainWareHouse = 1;
                }
                $dataCallApi = Array(
                        "requestId"=> "UPDATE_WAREHOUSE",
                        "username"=> $username,
                        "shopAddressId"=> $storeId,
                        "shopName"=> $warehouseName,
                        "senderName"=> $senderName,
                        "shopPhone"=> $shopPhone,
                        "provinceCode"=> $province,
                        "districtCode"=> $district,
                        "wardCode"=> $ward,
                        "addressDetail"=> $addressWarehouse,
                        "isDefault"=> $mainWareHouse,
                        "status"=> $status,
                );
                
                $headers = [
                    'Accept: application/json',
                    'Content-Type: application/json',
                    'Authorization:'.$token
                ];
                $result = $this->warehouseManageModel->updateWareHouse($dataUser->username,$dataCallApi,$headers);
                if($result->status == 200){                    
                    setcookie ("__updateNoti",'success',time()+ (60*10) , '/');
                    return redirect()->to('/danh-sach-kho-hang');
                }else{
                    setcookie ("__updateNoti",'false',time()+ (60*10) , '/');
                    return redirect()->to('/danh-sach-kho-hang');
                }

            }
        }
        $provinceCode = $dataWareHouse->provinceCode;
        
        $districtCode = $dataWareHouse->districtId;
        $wardCode = $dataWareHouse->wardId;
        $dataDistrict = $this->userCommon->getDistrict($provinceCode, $districtCode );
        $dataWards = $this->userCommon->dataWards($provinceCode, $districtCode, $wardCode );
        $data['dataUser'] = $dataUser;
        $data['dataProvince'] = $dataProvince;
        $data['dataDistrict'] = $dataDistrict;
        $data['dataWards'] = $dataWards;
        $data['dataWareHouse'] = (array) $dataWareHouse;
        $data['title'] = $title;
        $data['view'] = 'App\Modules\WarehouseManage\Views\updateWarehouse';
        return view('layoutShop/layout', $data);
    }
}

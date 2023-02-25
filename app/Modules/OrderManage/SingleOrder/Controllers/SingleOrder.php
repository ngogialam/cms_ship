<?php

namespace App\Modules\OrderManage\SingleOrder\Controllers;

class SingleOrder extends BaseController {
    public function choosePacket(){
        $data = [];
        $title = lang('Label.lbl_newSingleOrder'); 
        //Prepare view
        $post = $this->request->getPost();
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $token = $dataUserAuthen->token;
        $sessionKey = $dataUserAuthen->sessionKey;
        $username = $dataUserAuthen->username;
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:'.$token
        ];
        $listPostage = $this->singleOrderModel->getListPostage($headers);
        // post
        $post = $this->request->getPost();
        if(!empty($post)){
            $orderId = get_cookie('__orderDraft');
            if($orderId == ''){
                $orderId = date("ymd"). random_int(100000, 999999);
                $setOrderDraft = setcookie ("__orderDraft",$orderId,time() + TIME_ORDER_DRAFT , '/');
                while ($setOrderDraft != 1 ) {
                    // $setKrd = setcookie ("__krd",$keyAuth,time()+ TIME_DEVICE, '/');
                    $setOrderDraft = setcookie ("__orderDraft",$orderId,time() + TIME_ORDER_DRAFT , '/');
                }
            }
            
            $this->common->createOrderRedis($orderId, $post, $username);
            echo json_encode(array('success' => true,'message' => 'Success','redirect' => '0', 'href'=> '/nhap-thong-tin-don-hang'));die;
        }

        $listPackageKm = [];
        $listPackageSp = [];
        if(isset($listPostage['packageKm']) && !empty($listPostage['packageKm'])){
            $listPackageKm = $listPostage['packageKm'];
        }
        if(isset($listPostage['packageSp']) && !empty($listPostage['packageSp'])){
            $listPackageSp = $listPostage['packageSp'];
        }

        //Check gói cước test km
        $accountTest = ACCOUNT_TEST;
		$dataAccountTest = explode(',',$accountTest);
        $packCodeTest = PACKCODE_TEST;
		$dataPackCodeTest = explode(',',$packCodeTest);

        $listCodePackKM = array_column($listPackageKm, 'code');
        
        $containsSearch = count(array_diff($listCodePackKM, $dataPackCodeTest));        

        $onPackage = 1;
        if(in_array($dataUser->username,$dataAccountTest) && !empty($listPackageKm)){
            $onPackage = 1;
        }
        if(!in_array($dataUser->username,$dataAccountTest) && !empty($listPackageKm) && $containsSearch != 0){
            $onPackage = 1;
        }
        $data['onPackage'] = $onPackage;
        $data['dataAccountTest'] = $dataAccountTest;

        $data['dataPackCodeTest'] = $dataPackCodeTest;

        $data['listPackageKm'] = $listPackageKm;
        $data['listPackageSp'] = $listPackageSp;
        $data['dataUser'] = $dataUser;
        $data['title'] = $title;
        $data['view'] = 'App\Modules\OrderManage\SingleOrder\Views\choosePacket';
        return view('layoutShop/layout', $data);
    }

    public function orderDetail(){
        $data = [];
        $title = lang('Label.lbl_newSingleOrder'); 
        $orderIdDraft = get_cookie('__orderDraft');

        // Get Data Orders Redis
        $dataOrders = new \stdClass;
        $dataOrders = json_decode($this->redis->get($orderIdDraft));

        if($orderIdDraft && $dataOrders){
            //Get redis
            $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
            $token = $dataUserAuthen->token;
            $sessionKey = $dataUserAuthen->sessionKey;
            $username = $dataUserAuthen->username;
            $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
            $dataUser->availableBalance = $this->dataBalance;
            $lastOrder = json_decode($this->redis->get('LAST_ORDER:'.$username));

            //Get Product Category
            $arrProductCategory = json_decode($this->redis->get('productCategory'));
            if(empty($arrProductCategory)){
                $arrProductCategory = Array(
                    '1' => 'Thời Trang Nam',
                    '2' => 'Thời Trang Nữ',
                    '3' => 'Mẹ & Bé',
                    '4' => 'Thực phẩm khô',
                    '5' => 'Thực phẩm tươi',
                    '6' => 'Mỹ Phẩm ',
                    '7' => 'Sức Khỏe',
                    '8' => 'Sách, Báo & Tạp Chí',
                    '9' => 'Đồ Gia Dụng',
                    '10' => 'Khác'
                );
                $this->redis->set('productCategory', json_encode($arrProductCategory, JSON_UNESCAPED_UNICODE));
            }
            $arrProductCategory = json_decode($this->redis->get('productCategory'));

            // Get Data Orders Redis
            $packType = $dataOrders->packType;

            //Get Data Pickup province - district - ward
            $pickupAddress = $dataUser->pickupAddress;
            $dataPickupDefault = $this->singleOrderModel->getPickupAddressID($username, $pickupAddress,$dataOrders->pickupAddressId);

            if ($dataPickupDefault && !isset($dataOrders->pickupAddressId)) {
                $dataOrders->pickupAddressId = $dataPickupDefault->id;
            }
            $dataProvinces = $this->singleOrderModel->getProvince();
            $dataPickDistricts = $this->singleOrderModel->getDistrict($dataOrders->pickProvince,$dataOrders->pickDistrict);
            $dataPickWards = $this->singleOrderModel->getWards($dataOrders->pickProvince,$dataOrders->pickDistrict,$dataOrders->pickWard);
            $data['dataOrders'] = $dataOrders;
            $data['lastOrder'] = $lastOrder;
            $data['packType'] = $packType;
            $data['arrProductCategory'] = $arrProductCategory;
            $data['pickupAddress'] = $pickupAddress;
            $data['dataUser'] = $dataUser;
            $data['dataProvinces'] = $dataProvinces;
            $data['dataPickDistricts'] = $dataPickDistricts;
            $data['dataPickWards'] = $dataPickWards;
            $data['dataPickup'] = $dataPickupDefault;
            $data['title'] = $title;

            $data['singleOrderModel'] = $this->singleOrderModel;

            $data['view'] = 'App\Modules\OrderManage\SingleOrder\Views\enterOrderInfo';
            return view('layoutShop/layout', $data);
        }else{
            return redirect()->to('tao-don-le');
        }
    }
    public function conFirm($orderId = ''){
        $data = [];
        $title = " Tạo đơn lẻ ";
        $data['title'] = $title;
        //Get redis
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $token = $dataUserAuthen->token;
        $sessionKey = $dataUserAuthen->sessionKey;
        $username = $dataUserAuthen->username;
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;

        //Get fees
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:'.$token,
            'Channel:WEB'
        ];
        if($orderId == ''){
            $typeOrder = 0;
            $orderIdDraft = get_cookie('__orderDraft');
        }else{
            $typeOrder = 1;
            $orderIdDraft = get_cookie('__orderEdit');
        }
        $post = $this->request->getPost();

        // Get Data Orders Redis
        $dataOrders = new \stdClass;
        $dataOrders = json_decode($this->redis->get($orderIdDraft));
        $headerGetPackage = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:'.$token
        ];
        $listPostage = $this->singleOrderModel->getListPostage($headerGetPackage);
        $listPackage = [];
        if($dataOrders->packType == 1){
            $listPackage = $listPostage['packageSp'];
        }else if($dataOrders->packType == 2){
            $listPackage = $listPostage['packageKm'];
        }
        $dataCallFees = $this->common->createDataOrders($orderIdDraft);
        $getFees = $this->singleOrderModel->getFees($username,$dataCallFees,$headers, $orderIdDraft);
        $dataFees = [];
        $dataFeesErrors = [];
        $dataDeliveryGeocoding = [];
        if($getFees->status == 200){
            $dataFees = $getFees->data;
            $dataDeliveryGeocoding = $getFees->data->deliveryPoint;
        }else{
            $dataFeesErrors = $getFees;
        }
        $accountTest = ACCOUNT_TEST;
		$dataAccountTest = explode(',',$accountTest);
        $data['dataAccountTest'] = $dataAccountTest;

        $packCodeTest = PACKCODE_TEST;
		$dataPackCodeTest = explode(',',$packCodeTest);
        $data['dataPackCodeTest'] = $dataPackCodeTest;

        if(!empty($post)){
            if($post['typeOrder'] == 1){
                $orderIdDraft = get_cookie('__orderEdit');
            }else{
                $orderIdDraft = get_cookie('__orderDraft');
                $orderLast = $this->common->createLastOrder($orderIdDraft);
                $this->redis->set('LAST_ORDER:'.$username, json_encode($orderLast, JSON_UNESCAPED_UNICODE));
            }
            $dataOrdersNew = $this->common->createDataOrders($orderIdDraft);
            $dataOrdersNew->paymentType = $post['orderPaymentType'];
            $dataOrdersNew->expectShipperPhone = $post['expectShipperPhone'];
            if($post['typeOrder'] == 1){
                $params = [
                    'orderCode' => $orderIdDraft
                ];
                $resultCreateOrder = $this->singleOrderModel->updateSingleOrder($username, $headers, $dataOrdersNew, $params);
            }else{
                $resultCreateOrder = $this->singleOrderModel->createSingleOrder($username,$dataOrdersNew,$headers);
            }

            if($resultCreateOrder->status == 600 || $resultCreateOrder->status == 707){
                //Tạo đơn thành công
                $resFornend = new \stdClass;
                $resFornend->packType = $dataOrders->packType;
                $resFornend->status = $resultCreateOrder->status;
                $resFornend->message = $resultCreateOrder->message;
                $resFornend->orderId = $resultCreateOrder->data->orderCode;
                echo json_encode(array('success' => true, 'data' => $resFornend, 'redirect' => ''));die;
            }else{
                //Tạo đơn không thành công.
                $resFornend = new \stdClass;
                $resFornend->packType = $dataOrders->packType;
                $resFornend->status = $resultCreateOrder->status;
                $resFornend->message = $resultCreateOrder->data;
                $resFornend->messageData = $resultCreateOrder->message;
                
                echo json_encode(array('success' => false, 'data' => $resFornend, 'redirect' => ''));die;
            }
        }
        //Get Product Category
        $arrProductCategory = json_decode($this->redis->get('productCategory'));
        if(empty($arrProductCategory)){
            $arrProductCategory = Array(
                '1' => 'Thời Trang Nam',
                '2' => 'Thời Trang Nữ',
                '3' => 'Mẹ & Bé',
                '4' => 'Thực phẩm khô',
                '5' => 'Thực phẩm tươi',
                '6' => 'Mỹ Phẩm ',
                '7' => 'Sức Khỏe',
                '8' => 'Sách, Báo & Tạp Chí',
                '9' => 'Đồ Gia Dụng',
                '10' => 'Khác'
            );
            $this->redis->set('productCategory', json_encode($arrProductCategory, JSON_UNESCAPED_UNICODE));
        }
        $arrProductCategory = json_decode($this->redis->get('productCategory'));
        // $requiredNoteArr = Array(
        //     '1' => lang('Label.lbl_txtRequiredNote1'),
        //     '2' => lang('Label.lbl_txtRequiredNote2'),
        //     '3' => lang('Label.lbl_txtRequiredNote3')
        // );
        //Get Data Pickup province - district - ward
        $pickupAddress = $dataUser->pickupAddress;
        $dataPickupDefault = $this->singleOrderModel->getPickupAddressID($username, $pickupAddress,$dataOrders->pickupAddressId);
        $data['dataPickupDefault'] = $dataPickupDefault;
        $data['typeOrder'] = $typeOrder;
        $data['dataUser'] = $dataUser;
        $data['listPackage'] = $listPackage;
        $data['dataDeliveryGeocoding'] = $dataDeliveryGeocoding;
        $data['dataFeesErrors'] = $dataFeesErrors;
        $data['dataFees'] = $dataFees;
        $data['requiredNoteArr'] = (array) $this->requiredNoteArr;
        $data['arrProductCategory'] = $arrProductCategory;
        $data['dataOrders'] = $dataOrders;
        $data['view'] = 'App\Modules\OrderManage\SingleOrder\Views\conFirmOrder';
        return view('layoutShop/layout', $data);
    }
    public function changeSingleOrderFees(){
        
        $post = $this->request->getPost();

        if(!empty($post)){

            if($post['typeOrder'] == '1'){
                $orderIdDraft = get_cookie('__orderEdit');
            }else{
                $orderIdDraft = get_cookie('__orderDraft');
            }

            //Get redis
            $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
            $token = $dataUserAuthen->token;
            $username = $dataUserAuthen->username;

            // Get Data Orders Redis
            $dataOrders = new \stdClass;
            $dataOrders = json_decode($this->redis->get($orderIdDraft));
            $dataOrders->packCode = $post['feeOrder'];
            //Change packageCode and save new data to redis
            $this->redis->set($orderIdDraft, json_encode($dataOrders, JSON_UNESCAPED_UNICODE), TIME_ORDER_DRAFT);
            //Get fees
            $headers = [
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization:'.$token
            ];
            $dataOrders = $this->common->createDataOrders($orderIdDraft);
            
            $responseChangeFees = $this->singleOrderModel->getFees($username,$dataOrders,$headers, $orderIdDraft );
            if($responseChangeFees->status == 200){
                $totalReceiverPay = 0;
                $dataLists = $dataOrders->deliveryPoint;
                foreach($dataLists as $keyPoint => $valuePoint){
                    $dataReceivers = $valuePoint->receivers;
                    foreach($dataReceivers as $valueReceiver){
                        //1: người gửi
                        //2: người nhận
                        if($valueReceiver->isFree == 2){
                            $totalReceiverPay += $responseChangeFees->data->totalFee;
                        }
                    }
                }
                echo json_encode(array('success' => true,'message' => 'True', 'data' => $responseChangeFees->data, 'totalReceiverPay' => $totalReceiverPay,'redirect' => '0'));die; 
            }else{
                echo json_encode(array('success' => false,'message' => 'False','redirect' => '0','data' => $responseChangeFees));die;
            }
        }else{
            echo json_encode(array('success' => false,'message' => 'False','redirect' => '0'));die; 
        }
    }
}
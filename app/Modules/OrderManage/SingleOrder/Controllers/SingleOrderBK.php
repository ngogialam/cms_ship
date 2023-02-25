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
        $listPostage = $this->singleOrderModel->getListPostage();
        // echo '<pre>';
        // print_r($listPostage);die;
        // $this->singleOrderModel
        $post = $this->request->getPost();
        if(!empty($post)){
            $packageType = $post['packageType'];
            $packageTime = $post['packageTime'];
            
            $orderId = get_cookie('__orderDraft');
            if($orderId == ''){
                $orderId = date("ymd"). random_int(100000, 999999);
                $setOrderDraft = setcookie ("__orderDraft",$orderId,time() + TIME_ORDER_DRAFT , '/');
                while ($setOrderDraft != 1 ) {
                    // $setKrd = setcookie ("__krd",$keyAuth,time()+ TIME_DEVICE, '/');
                    $setOrderDraft = setcookie ("__orderDraft",$orderId,time() + TIME_ORDER_DRAFT , '/');
                }
            }
            $messageDataOrder = Array(
                "packType"=> $packageType,
                "packCode"=> $packageTime,
                
            );
            $this->redis->set($orderId, json_encode($messageDataOrder),7200);
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
        // echo '<pre>';
        // print_r($listPackageKm);die;
        $data['listPackageKm'] = $listPackageKm;
        $data['listPackageSp'] = $listPackageSp;
        $data['dataUser'] = $dataUser;
        $data['title'] = $title;
        $data['view'] = 'App\Modules\OrderManage\SingleOrder\Views\choosePacket';
        return view('layoutShop/layout', $data);
    }
    public function postFormApi(){
        $post = $this->request->getPost();

        if(!empty($post) && isset($post['dataRedis'])){
            // print_r($messageDataOrder);
            $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
            $token = $dataUserAuthen->token;
            $dataRedis = json_encode($post['dataRedis']);
            // echo '<pre>';
            $dataPre =json_decode($dataRedis);
            unset($dataPre->pickName);
            unset($dataPre->pickPhone);
            unset($dataPre->pickAddress);
            unset($dataPre->pickDistrict);
            unset($dataPre->pickWard);
            unset($dataPre->pickProvince);
            // print_r($dataPre);die;
            
            $headers = [
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization:'.$token
            ];
            $result = $this->callServer->PostJson(URL_API_PRIVATE.'order',$dataPre,$headers)['data'];
            print_r($result);
            die;

        }
    }
    public function orderDetail(){

        $data = [];
        $title = lang('Label.lbl_newSingleOrder'); 
        $post = $this->request->getPost();
        $orderIdDraft = get_cookie('__orderDraft');
        
        //Prepare view
        $get = $this->request->getGet();
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        if($dataUserAuthen == ''){
            echo '<pre>';
            echo 1111;
            print_r($dataUserAuthen);die;
        }
        $token = $dataUserAuthen->token;
        $sessionKey = $dataUserAuthen->sessionKey;
        $username = $dataUserAuthen->username;
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataProvinces = $this->userCommon->getProvince($dataUserAuthen);
        $dataOrderIdDraw = json_decode($this->redis->get($orderIdDraft),true);
        
        // echo '<pre>';
        // print_r($dataOrderIdDraw);die;
        $packType = $dataOrderIdDraw['packType'];
        $packCode = $dataOrderIdDraw['packCode'];
        $dataDeliveryPoint = $dataOrderIdDraw['deliveryPoint'];
        if(isset($dataDeliveryPoint)){
            $dataDeliveryPoint = (array) $dataDeliveryPoint;
        }else{
            $dataDeliveryPoint = [];
        }
        if(!empty($post)){
            echo '<pre>';
            // print_r(json_encode($post,JSON_UNESCAPED_UNICODE));
            print_r($post);
            die;
            if(isset($post['pickupAddressId']) && $post['pickupAddressId'] == ''){
                $dataCreatePickup =  Array(
                    "requestId"=> "CREATE_WAREHOUSE",
                    "username"=> $username,
                    "shopName"=> $post['pickPhone'],
                    "senderName"=> $post['pickName'],
                    "shopPhone"=> $post['pickPhone'],
                    "provinceCode"=> $post['pickPhone'],
                    "districtCode"=> $post['pickProvince'],
                    "wardCode"=> $post['pickWard'],
                    "addressDetail"=> $post['pickAddress'],
                    "isDefault"=> '1'
                );
                $headers = [
                    'Accept: application/json',
                    'Content-Type: application/json',
                    'Authorization:'.$token
                ];
                // $result = $this->warehouseManageModel->createWareHouse($dataUser->username,$dataCreatePickup,$headers);
            }else{
                $pickupAddressId = $post['pickupAddressId'];
            }
            $dataApi = [];
            $dataApi['packCode'] = $post['packCode'];
            $dataApi['pickupAddressId'] = $pickupAddressId;
            $dataApi['pickupType'] = '1';
            $dataApi['expectShipperPhone'] = $post['expectShipperPhone'];
            $dataApi['deliveryPoint'] = [];
            print_r((object) $dataApi);
            die;
        }
        //Get data province - district - ward
        $dataDistricts  = $this->singleOrderModel->getDistrict($dataOrderIdDraw['pickProvince'],$dataOrderIdDraw['pickDistrict'] );
        $dataWards  = $this->singleOrderModel->getWards($dataOrderIdDraw['pickProvince'],$dataOrderIdDraw['pickDistrict'],$dataOrderIdDraw['pickWard'] );
        $arrProductCategory= Array(
            '1' => 'Quần áo trẻ em',
            '2' => 'Giày thể thao nam',
            '3' => 'Loại hàng hóa',
            '4' => 'Vợt cầu lông'
        );
        // $listPostage = $this->singleOrderModel->getListPostage();
        // $listPackageKm = [];
        // $listPackageSp = [];
        
        // if(isset($listPostage['packageKm']) && !empty($listPostage['packageKm'])){
        //     $listPackageKm = $listPostage['packageKm'];
        // }
        // if(isset($listPostage['packageSp']) && !empty($listPostage['packageSp'])){
        //     $listPackageSp = $listPostage['packageSp'];
        // }

        // $dataPackCode = array_search($packCode, array_column($listPostage, 'code'));
        //     if($dataPackCode !== false){
        //         $choosePickupAddress = $listPostage[$dataPackCode];
        //     }
        //     echo '<pre>';
        // print_r($dataOrderIdDraw);
        // die;
        //Get data warehouse
        $pickupAddress = $dataUser->pickupAddress;

        $data['dataOrderIdDraw'] = $dataOrderIdDraw;
        $data['dataDeliveryPoint'] = $dataDeliveryPoint;
        $data['packType'] = $packType;
        $data['packCode'] = $packCode;
        $data['arrProductCategory'] = $arrProductCategory;
        $data['pickupAddress'] = $pickupAddress;
        $data['dataUser'] = $dataUser;
        $data['dataProvinces'] = $dataProvinces;
        $data['dataDistricts'] = $dataDistricts;
        $data['dataWards'] = $dataWards;
        $data['title'] = $title;
        $data['view'] = 'App\Modules\OrderManage\SingleOrder\Views\orderDetail';
        return view('layoutShop/layout', $data);
    }
    public function get_address_location(){
            $post = $this->request->getPost();
            $post = $this->array_htmlspecialchars($post);
            if (!empty($post)) {
                $address['address'][] = $post['receiverSenderSub'];
                $resDataAddress = $this->api_location_address->getLocationAddress(json_encode($address));
                if ($resDataAddress) {
                    $resDataAddress = $resDataAddress->result;
                    echo json_encode(array('success' => true, 'data' => json_encode($resDataAddress['0'])));
                }
            }
    }
    //Chọn kho đã tồn tại
    public function choosePickupAddress(){
        $post = $this->request->getPost();
        if(!empty($post)){
            $pickupAddreddId = $post['pickUpAddress'];
            $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
            $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
            $pickupAddress = $dataUser->pickupAddress;
            $dataWareHouseKey = array_search($pickupAddreddId, array_column($pickupAddress, 'id'));
            if($dataWareHouseKey !== false){
                $choosePickupAddress = $pickupAddress[$dataWareHouseKey];
            }else{
                echo json_encode(array('success' => false,'message' => 'False','redirect' => '0'));die;
            }
            // $choosePickupAddress = $pickupAddress[$id];
            $htmlPickupAddress = '';
            $htmlPickupAddress .= ' <ul class="col-sm-4  mb-0 orDetail-input-show">
            <li>
              <img src="'.base_url("public/images/wh-kh1a.png").'" alt="">
            </li>
            <li class="orDetail-ttng-info ">'.$choosePickupAddress->name.'
            </li>
          </ul>';

          $htmlPickupAddress .= '
          <ul class="col-sm-4 mb-0 orDetail-input-show">
            <li>
            <img src="'.base_url("public/images/wh-kh1b.png").'" alt="">
            </li>
            <li class="orDetail-ttng-info">
            '.$choosePickupAddress->senderName.'
            </li>
          </ul>
          ';

          $htmlPickupAddress .= '
          <ul class="col-sm-4  mb-0 orDetail-input-show">
            <li>
            <img src="'.base_url("public/images/wh-kh1c.png").'" alt="">
            </li>
            <li class="orDetail-ttng-info">
            '.$choosePickupAddress->phone.'
            </li>
          </ul>
          ';
          $address = ($choosePickupAddress->address) ? $choosePickupAddress->address .', ' : '';
          $wardName = ($choosePickupAddress->wardName) ? $choosePickupAddress->wardName .', ' : '';
          $districtName = ($choosePickupAddress->districtName) ? $choosePickupAddress->districtName .', ' : '' ;
          $provinceName = ($choosePickupAddress->provinceName) ? $choosePickupAddress->provinceName  : '' ;
          $fullAddress = $address. $wardName . $districtName . $provinceName;
          $htmlPickupAddress .= '
          <ul class="col-sm-12  mb-0 orDetail-input-show">
            <li style="margin-left: -2px;">
            <img src="'.base_url("public/images/wh-kh1d.png").'" alt="">
            </li>
            <li class="orDetail-ttng-info">
              '.$address. $wardName . $districtName . $provinceName.'
            </li>
          </ul>
          ';

            // echo $htmlPickupAddress;
            echo json_encode(array('success' => true,'message' => 'true','redirect' => '0','fullAddress'=>$fullAddress, 'dataHtml' => $htmlPickupAddress));die;
            // die;
        }
    }
    public function array_htmlspecialchars($array = array()){
        if(!empty($array)){
            foreach ($array as $key => $value)
            {
                $array[$key] = @htmlspecialchars($value, ENT_QUOTES);
            }
        }
        return $array;
    }
    public function conFirm(){
        $data = [];
        $title = " Tạo đơn lẻ";
        $data['title'] = $title;
        $data['view'] = 'App\Modules\OrderManage\SingleOrder\Views\conFirm';
        return view('layoutShop/layout', $data);
    }
    public function allOrders(){
        $data = [];
        $title = " Danh sách đơn hàng";
        $data['title'] = $title;
        $data['view'] = 'App\Modules\OrderManage\SingleOrder\Views\dsdonhang';
        return view('layoutShop/layout', $data);
    }

    public function themdon(){
        $data = [];
        $title = " Danh sách đơn hàng";
        $data['title'] = $title;
        $data['view'] = 'App\Modules\OrderManage\SingleOrder\Views\themdonchitiet';
        return view('layoutShop/layout', $data);
    }

    public function addNewProductItem(){
        $post = $this->request->getPost();
        
        // if(!empty($post)){
            // echo '<pre>';
            // print_r($post);die;
        // }
        echo json_encode(array('success' => true, 'data' => '1'));
    }
    public function showOrderReceiverDetail(){
        $post = $this->request->getPost();
        if(!empty($post)){
            if(!empty($post) && isset($post['dataTransfer'])){
                $arrProduct = $post['dataTransfer'][0];
                $deliveryPointIndex = $arrProduct['deliveryPointIndex'];
                $receiverIndex = $arrProduct['receiverIndex'];
                $productIndex = $arrProduct['productIndex'];
                    $html = '';
                    $html .= '
                    <div class="row w100 afOrder_'.$deliveryPointIndex.'_'.$receiverIndex.'" style="line-height: 32px;padding: 10px 0;background: #F8F8F8;margin: 15px 20px!important;border-radius: 5px;">
                        <div class=" col-lg-3 col-md-12 senderItems" style="position: relative;">
                            <span class="or-dh-stt" style="background: #8D869D;position: absolute; line-height:12px;">'.$receiverIndex.'</span>
                            <ul style="padding: 0px 40px;">
                                <li class = "fz13"> '.$arrProduct['receiverPhone'].'</li>
                                <li class = "fz13" style="color:#68656D"> '.$arrProduct['receiverName'].'</li>

                            </ul>
                        </div>
                        <div class=" col-lg-8 col-md-12">';
                        $arrItems = $arrProduct['arrayProduct'];
                        foreach($arrItems as $item){
                            $html .= '
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13">
                                '.$item['productName'].'
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13">
                                    '.lang('Label.lbl_detailQuantity').': <span class="colorPurple">'.$item['productQuantity'].'</span>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13">
                                '.lang('Label.lbl_detailCOD').': <span class="colorOrange"> '.number_format($item['productCod']).'</span> đ
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13">
                                '.lang('Label.lbl_detailProductValue').': <span>'.number_format($item['productValue']).'</span> đ
                                </div>
                            </div>';
                        }                    
                            $html .= '</div>';

                        $html .= '
                        <div class=" col-lg-1 col-md-12 col-sm-6 col-xs-6 buttonItems">';
                        $html .='
                        <span> <img src="'.base_url('public/images/or-delete.png').'" alt="'.lang('Label.lbl_edit').'"> </span>
                        ';
                          
                        $html .='<span> <img class="updateAllProductItem" deliveryPointIndex="'. $deliveryPointIndex .'" receiverIndex="'. $receiverIndex .'" productIndex="'. $productIndex .'" src="'.base_url('public/images/or-edit.png').'" alt="'.lang('Label.lbl_delete').'"> </span>';
                        $html .='
                            </div>
                    </div>
                    ';
                    echo json_encode(array('success' => true, 'data' => $html));
            }else{
                echo json_encode(array('success' => false, 'data' => '1'));
            }
        }
    }
    //Thêm điểm giao
    public function addNewPickupAddress(){
        $post = $this->request->getPost();
        $getErrors = Array();
        if(!empty($post)){
            $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
            $dataProvince = $this->userCommon->getProvince($dataUserAuthen);
            $arrProductCategory= Array(
                '1' => 'Quần áo trẻ em',
                '2' => 'Giày thể thao nam',
                '3' => 'Loại hàng hóa',
                '4' => 'Vợt cầu lông'
            );
            $deliveryPointIndex = $post['deliveryPointIndex'];
            $receiverIndex = 1;
            $productIndex = 1;
            $getErrors =[];
            $html = '';
            $html .= '<div class="or-dgh-1 pb-3" style="margin-left: -40px;">
                    <span class="or-dh-stt" style="background-color: #2DB1DB;">'.$deliveryPointIndex.'</span>'.lang('Label.lbl_orderReceiver').'
                </div>';
            $html .= '<div class="or-ttdh row ">';

            $html .= '<ul class="or-dgh col-6">
                        <li class="or-dgh-2">
                            <input type="text" class="address_'.$deliveryPointIndex.'" onblur="addAddressDetail('.$deliveryPointIndex.')"  deliveryPointIndex="'.$deliveryPointIndex.'"
                                name="deliveryPoint['.$deliveryPointIndex.'][address]"
                                placeholder="'.lang('Label.lbl_orderAddressReceiver').'">
                            <span class=" err_messages err_address_'.$deliveryPointIndex .'">
                        </li>
                    </ul>';

            
            $html .= '<ul class="col-sm-6 row orDetail-input orderDetail-chosen pr-0 orderDetail_'.$deliveryPointIndex .' address_v2"
            style="padding-top: 24px;">';
                $html .= '<li class="col-md-4 mb-2 pr-0 provinceReceiver_'.$deliveryPointIndex.'">';
                $html .= '<select name="deliveryPoint['.$deliveryPointIndex.'][province]"
                index_prov="'.$deliveryPointIndex.'" id="provinceReceiver_'.$deliveryPointIndex.'"
                class="form-control frm-lg chosen-select order_province_code_from ">';
                $html .= '<option value="0">'.lang('Label.lbl_orderWareHouseProvince').'</option>';
                foreach($dataProvince as $province){
                    $html .= '<option value="'.$province['code'].'"> '.$province['name'].' </option>';
                }
                $html .= '</select>';
                $html .= '  <input type="hidden" class="province_find_pro_'.$deliveryPointIndex.'">
                            <input type="hidden" class="district_find_pro_'.$deliveryPointIndex.'">
                            <input type="hidden" class="wards_find_pro_'.$deliveryPointIndex.'">';
                $html .= '<span class=" err_messages err_province_'.$deliveryPointIndex.'">'.$getErrors['province'].'</span>';
                $html .= '</li>';
                
                $html .= '<li class="col-md-4 mb-2 pr-0 districtReceiver_'.$deliveryPointIndex .'">
                        <select name="deliveryPoint['.$deliveryPointIndex .'][district]"
                            index_dict="'.$deliveryPointIndex .'" placeholder=""
                            id="districtReceiver_'.$deliveryPointIndex.'"
                            class="form-control frm-lg chosen-select order_district_code_from ">
                            <option value="0">'.lang('Label.lbl_orderWareHouseDistrict') .'</option>
                        </select>
                        <span class=" err_messages err_district_'.$deliveryPointIndex.'">'.$getErrors['district'].'</span>
                    </li>';

                $html .= '<li class="col-md-4 mb-2 pr-0 wardReceiver_'.$deliveryPointIndex.'">
                    <select name="deliveryPoint['.$deliveryPointIndex .'][ward]"
                        index_ward="'.$deliveryPointIndex.'" index_ward="'.$deliveryPointIndex.'"
                        id="wardReceiver_'.$deliveryPointIndex.'"
                        class="form-control frm-lg chosen-select order_ward_code_from ">
                        <option value="0">'.lang('Label.lbl_orderWareHouseWard') .'</option>
                    </select>
                    <span class=" err_messages err_ward_'.$deliveryPointIndex.'">'.$getErrors['ward'].'</span>
                </li>';

                $html .= '<div class="row senderInfo">
                </div>';
            $html .= '</ul>';
            // Order detail
                $html .= '
                <!-- After click hoàn thành ( filter order detail) -->
                                <div class="or-ttng row  w100 afOrder_<?= $deliveryPointIndex?>" >
                                    
                                </div>
                            <!-- End click hoàn thành  -->';

                $html .='
                <div class="or-ttng row pickupOrder_'.$deliveryPointIndex.'_'.$receiverIndex.'">
                                <div class="chinhsua1 mb-1">
                                    <!-- ========HIỂN THỊ KHI CLICK VÀO SỬA ĐƠN HÀNG ========= -->
                                    <div id="orders" class="or-ttdh row qo-ttdhl receiver-'.$deliveryPointIndex.'-'.$receiverIndex.'">
                                        <ul class="or-dgh col-12 ">
                                            <li class="or-dgh-1 pt-0 mt-0">
                                                <span class="or-dh-stt"
                                                    style="background: #F0A616;">'.$receiverIndex .'</span><span
                                                    style="color: #68656D;">'.lang('Label.lbl_addOrderDetail').'</span>
                                            </li>
                                            <li class="or-ttnh">
                                                <ul>
                                                    <li class="or-ttnh-tt">
                                                    '.lang('Label.lbl_txtReceiverInfo').'
                                                    </li>
                                                </ul>
                                                <ul class="row">
                                                    <li class="col-md-3 col-sm-6 or-cgc-1">
                                                    '.lang('Label.lbl_txtReceiverPhone') .'<span
                                                            style="color: #885DE5;"> *</span> <br>
                                                        <input
                                                            name="deliveryPoint['. $deliveryPointIndex .'][receivers]['. $receiverIndex .'][phone]"
                                                            type="text" class="receiverPhone"
                                                            index_item="'.$receiverIndex .'"
                                                            onkeypress="return isNumber(event)"
                                                            placeholder="'.lang('Label.ph_phone') .'"><br>
                                                        <span
                                                            class=" err_messages err_receiverPhone_'. $deliveryPointIndex.'_'.$receiverIndex .'">'.$getErrors['ward'].'</span>
                                                    </li>

                                                    <li class="col-md-3 col-sm-6 or-cgc-1">
                                                    '.lang('Label.lbl_txtReceiverName') .'<span
                                                            style="color: #885DE5;"> *</span> <br>
                                                        <input
                                                            name="deliveryPoint['. $deliveryPointIndex .'][receivers]['. $receiverIndex .'][name]"
                                                            index_item="'. $receiverIndex .'" class="receiver unNumber"                                                        
                                                            value = ""
                                                            type="text"
                                                            placeholder="'. lang('Label.lbl_txtReceiverName') .'"><br>
                                                        <span
                                                            class=" err_messages err_receiver_'. $deliveryPointIndex.'_'.$receiverIndex .'">'.$getErrors['ward'].'</span>
                                                    </li>
                                                    <li class="col-md-3 col-sm-6 or-cgc-1">
                                                    '.lang('Label.lbl_txtReceiverDate') .'<span
                                                            style="color: #885DE5;"> *</span> <br>
                                                        <input
                                                            name="deliveryPoint['.$deliveryPointIndex .'][receivers]['.$receiverIndex .'][expectDate]"
                                                            index_item="'. $deliveryPointIndex.'" type="text"
                                                            value = ""
                                                            class="orderdatePicker expectDate"
                                                            style="padding-right: 10px;"><br>
                                                        <span
                                                            class=" err_messages err_expectDate_'. $deliveryPointIndex .'">'. $getErrors['ward'].'</span>
                                                    </li>
                                                    <li class="col-md-3 col-sm-6 or-cgc-1">
                                                    '.lang('Label.lbl_txtReceiverTime') .'<span
                                                            style="color: #885DE5;"> *</span> <br>
                                                        <input
                                                            name="deliveryPoint['. $deliveryPointIndex .'][receivers]['. $receiverIndex .'][expectTime]"
                                                            index_item="'. $receiverIndex .'" type="time"
                                                            value = ""
                                                            class="or-ttnh-input"><br>
                                                        <span
                                                            class=" err_messages err_expectTime_'.$receiverIndex .'">'.$getErrors['ward'].'</span>
                                                    </li>
                                                </ul>
                                            </li>

                                            <!-- Thông tin hàng hóa -->
                                            <li class="or-ttnh">
                                                <ul>
                                                    <li class="or-ttnh-tt">
                                                    '.lang('Label.lbl_txtGoodInfo').'
                                                    </li>
                                                </ul>
                                                
                                                <ul class="row">
                                                    <li class="col-md-6 col-sm-12">
                                                    '. lang('Label.lbl_txtGoodName') .'<span style="color: #885DE5;">
                                                            *</span> <br>
                                                        <input index_item="'. $receiverIndex .'"
                                                            class="productName productName_'. $deliveryPointIndex.'_'.$receiverIndex.'"
                                                            type="text" placeholder="'. lang('Label.lbl_inputGoodName') .'"
                                                            id="qo-tensp-ht">
                                                        <span
                                                            class=" err_messages err_productName_'. $deliveryPointIndex.'_'.$receiverIndex .'">'.$getErrors['ward'].'</span>
                                                    </li>
                                                    <li class="col-md-3 col-sm-6">
                                                    '.lang('Label.lbl_txtCod') .'<span style="color: #885DE5;">
                                                            *</span> <br>
                                                        <input index_item="'.$receiverIndex.'"
                                                            onkeypress="return isNumber(event)"
                                                            type="text" value="0"
                                                            class="or-cod productCOD_'.$deliveryPointIndex.'_'. $receiverIndex.'" id="qo-cod-ht">
                                                        <span style="margin-left: -34px;"> đ</span>
                                                        <span
                                                            class=" err_messages err_productCod_'.$deliveryPointIndex.'_'.$receiverIndex.'">'.$getErrors['ward'].'</span>
                                                    </li>
                                                    <li class="col-md-3 col-sm-6 or-cgc-1">
                                                        <input index_item="'.$receiverIndex.'" checked
                                                            name="checkProductValue" id="checkProductValue_'.$deliveryPointIndex.'_'. $receiverIndex.'" type="checkbox"
                                                            class="regular-checkbox mb-0 checkProductValue"
                                                            style="width: 10px;height: 10px;">
                                                        <label
                                                            for="checkProductValue">'.lang('Label.lbl_txtGoodValue').'</label><span
                                                            style="color: #885DE5;"> *</span> <br>
                                                        <input index_item="'.$receiverIndex.'" type="text" value="0"
                                                            onkeypress="return isNumber(event)"
                                                            class="or-ttnh-input or-gtkg productValue_'.$deliveryPointIndex.'_'. $receiverIndex.'"
                                                            id="qo-khaigia-ht"><span style="margin-left: -34px;"> đ</span>
                                                            </br>
                                                            <span class=" err_messages err_productValue_'.$deliveryPointIndex.'_'.$receiverIndex .'">'.$getErrors['ward'].'</span>
                                                    </li>
                                                </ul>
                                                <ul class="row">
                                                    <li class="col-md-6 col-sm-12">
                                                        '.lang('Label.lbl_txtGoodType').'<span style="color: #885DE5;">
                                                            *</span> <br>
                                                        <select style="padding-right: 10px;"
                                                            placeholder="Chọn loại hàng hóa" id="productCategory_'.$deliveryPointIndex.'_'. $receiverIndex .'"
                                                            class="chosen-select productCategory_'.$deliveryPointIndex.'_'. $receiverIndex .'">
                                                            <option value="0">Chọn loại hàng hóa</option>';
                                                            foreach($arrProductCategory as $keyProductCate => $productCategory):
                                                                $html .= '<option value="'.$keyProductCate.'">'. $productCategory .'</option>';
                                                            endforeach;
                                                        $html .='</select>
                                                    </li>
                                                    <li class="col-md-3 col-sm-6">
                                                    '.lang('Label.lbl_txtGoodQuantity').'<span
                                                            style="color: #885DE5;">
                                                            *</span> <br>
                                                        <input value="1"
                                                            onkeypress="return isNumber(event)"
                                                            style="padding-right: 10px;" id="qo-soluong-ht"
                                                            class="productQuatity_'.$deliveryPointIndex.'_'. $receiverIndex.'">
                                                            <span
                                                            class=" err_messages err_productQuatity_'. $deliveryPointIndex.'_'.$receiverIndex.'">'.$getErrors['ward'].'</span>
                                                    </li>
                                                    <li class="col-md-3 col-sm-6">
                                                        <br>
                                                        <button type="button" class="or-lhh-btn saveProduct"
                                                            id="qo-btn-thh-1-'.$deliveryPointIndex.'-'.$receiverIndex.'" deliveryPointIndex='.$deliveryPointIndex.'
                                                            receiverIndex='. $receiverIndex.'
                                                            productIndex='. $productIndex .'
                                                            >'.lang('Label.lbl_txtGoodSave').'</button>
                                                        <button type="button" deliveryPointIndex='. $deliveryPointIndex .'
                                                            receiverIndex='. $receiverIndex.'
                                                            productIndex='. $productIndex .'
                                                            class="or-lhh-btn qo-ed-a updateProduct" 
                                                            id="qo-btn-thh-2-'. $deliveryPointIndex.'-'.$receiverIndex .'">'. lang('Label.lbl_txtSaveInfo') .'</button>

                                                    </li>
                                                </ul>
                                                
                                            </li>
                                        </ul>
                                        <!-- Nếu có thêm mới hàng hóa thì phần này sẽ đươc hiện -->
                                        <div style="width: 100%;" class="ttsp" id="ttsp_'. $deliveryPointIndex.'_'.$receiverIndex .'">
                                                
                                        </div>
                                        <!-- END hàng hóa -->

                                        <ul class="col-12">
                                            <li class="or-dvht">
                                            '. lang('Label.lbl_txtSupportServices') .'
                                            </li>
                                        </ul>
                                        <ul class="col-md-3 col-sm-6 or-ctdh-1">
                                            <li>
                                            '. lang('Label.lbl_txtGoodSize') .'<span style="color: #885DE5;"> *</span>
                                                <br>
                                                <input
                                                    name="deliveryPoint['. $deliveryPointIndex.'][receivers]['. $receiverIndex.'][length]"
                                                    value=""
                                                    type="text" placeholder="Dài x rộng x cao"><span
                                                    style="margin-left: -34px;">Cm</span>
                                            </li>
                                        </ul>
                                        <ul class="col-md-3 col-sm-6 or-ctdh-1">
                                            <li>
                                            '. lang('Label.lbl_txtGoodWeight') .'<span style="color: #885DE5;">
                                                    *</span> <br>
                                                <input
                                                    value=""
                                                    name="deliveryPoint['. $deliveryPointIndex.'][receivers]['. $receiverIndex.'][weight]"
                                                    type="text" value=""><span style="margin-left: -50px;">Gram</span>
                                            </li>
                                        </ul>
                                        <ul class="col-md-6 col-sm-12 or-ctdh-1">
                                            <li>
                                            '.lang('Label.lbl_txtExtraNote') .'<span style="color: #885DE5;"> *</span>
                                                <br>
                                                <input
                                                    name="deliveryPoint['. $deliveryPointIndex .'][receivers]['. $receiverIndex .'][note]"
                                                    type="text" value="Cho xem hàng, nếu khách không lấy thu 20k tiền ship"
                                                    class="or-ttnh-input1">
                                            </li>
                                        </ul>

                                        <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                                            <li class="or-cgc-1">
                                            '. lang('Label.lbl_txtPayerFee') .'<span style="color: #885DE5;"> *</span>
                                                <br>
                                                <input type="radio" name="deliveryPoint['. $deliveryPointIndex .'][receivers]['. $receiverIndex .'][isFree]" class="or-radio-checked" id="orNtc1" value="1"> 
                                                <label for="orNtc1"> '. lang('Label.lbl_txtPayerFeeSender') .'</label>
                                                <br>

                                                <input type="radio" value="0" name="deliveryPoint['. $deliveryPointIndex .'][receivers]['. $receiverIndex .'][isFree]"  class="or-radio-checked" id="orNtc1a"> 
                                                <label for="orNtc1a">'. lang('Label.lbl_txtPayerFeeReceiver') .'</label>
                                            </li>
                                        </ul>
                                        <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                                            <li class="or-cgc-1">'. lang('Label.lbl_txtPartialDelivery') .'<span
                                                    style="color: #885DE5;"> *</span> <br>
                                                <input type="radio" value="1"
                                                    name="deliveryPoint['.$deliveryPointIndex .'][receivers]['.$receiverIndex .'][partialDelivery]"
                                                    class="or-radio-checked" id="gh1p1" checked>
                                                <label for="gh1p1">'. lang('Label.lbl_txtPartialDeliveryYes') .'
                                                </label><br>
                                                <input type="radio" value="0"
                                                    name="deliveryPoint['. $deliveryPointIndex .'][receivers]['. $receiverIndex .'][partialDelivery]"
                                                    class="or-radio-checked" id="gh1p1a"> <label
                                                    for="gh1p1a">'.lang('Label.lbl_txtPartialDeliveryNo').'</label>
                                            </li>
                                        </ul>
                                        <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                                            <li class="or-cgc-1">
                                            '. lang('Label.lbl_txtIsReturn') .' <br>
                                                <input type="radio" value="1"
                                                    name="deliveryPoint['. $deliveryPointIndex.'][receivers]['. $receiverIndex.'][isRefund]"
                                                    class="or-radio-checked" id="dvch1" checked>
                                                <label for="dvch1">'.lang('Label.lbl_txtPartialDeliveryYes').'</label>
                                                <br>
                                                <input type="radio" value="0"
                                                    name="deliveryPoint['. $deliveryPointIndex.'][receivers]['. $receiverIndex.'][isRefund]"
                                                    class="or-radio-checked" id="dvch1a"> <label
                                                    for="dvch1a">'.lang('Label.lbl_txtPartialDeliveryNo').'</label>
                                            </li>
                                        </ul>
                                        <ul class="col-xl-2 col-sm-3 or-ctdh-1 or-ctdh-2">
                                            <li class="or-cgc-1">
                                            '. lang('Label.lbl_txtExtraServices').' <br>
                                                <input type="checkbox"
                                                    
                                                    name="deliveryPoint['. $deliveryPointIndex .'][receivers]['. $receiverIndex .'][extraServices][isDoorDeliver]"
                                                    class="regular-checkbox or-radio-checked" id="dvthem1" /> <label
                                                    for="dvthem1">'.lang('Label.lbl_txtIsDoorDeliver').'</label>
                                                <br>
                                                <input type="checkbox"
                                                    name="deliveryPoint['. $deliveryPointIndex .'][receivers]['. $receiverIndex .'][extraServices][isPorter]"
                                                    class="regular-checkbox or-radio-checked" id="dvthem1a" /> <label
                                                    for="dvthem1a">'.lang('Label.lbl_txtIsPorter').'</label>
                                            </li>
                                        </ul>
                                        <ul class="col-xl-4 col-sm-12 or-ctdh-1">
                                            <li>
                                            '. lang('Label.lbl_txtNoteRequired').' <span style="color: #885DE5;">
                                                    *</span> <br>
                                                <select
                                                    name="deliveryPoint['. $deliveryPointIndex .'][receivers]['. $receiverIndex .'][requireNote]"
                                                    style="width: 100%;">
                                                    <option  value="1">'. lang('Label.lbl_txtNoteRequired1').'</option>
                                                    <option  value="2">'. lang('Label.lbl_txtNoteRequired2').'</option>
                                                    <option  value="3">'. lang('Label.lbl_txtNoteRequired3').'</option>
                                                </select>
                                            </li>
                                        </ul>
                                        <ul class="col-md-6 col-sm-0">
                                        </ul>
                                        <ul class="col-md-3 col-sm-6 or-ctdh-btn1">
                                            <button type="button" >'.lang('Label.lbl_txtCancel').'</button>
                                        </ul>
                                        <ul class="col-md-3 col-sm-6  or-ctdh-btn2">
                                            <button class=" closePickupOrder closePickupOrder_'. $deliveryPointIndex.'_'.$receiverIndex .'"
                                                deliveryPointIndex="'.$deliveryPointIndex.'" receiverIndex="'.$receiverIndex.'" productIndex="'.$productIndex.'"
                                                type="button">'.lang('Label.lbl_txtFinish').'</button>
                                        </ul>
                                    </div>
                                    <!-- ========HẾT PHẦN SỬA HÀNG HÓA========= -->
                                </div>
                            </div>
                            <div class="or-ttng row addReceiver_<?= $deliveryPointIndex ?> w100">

                            </div>';
            $html .= '</div>';

            echo json_encode(array('success' => true, 'html' => $html));
        }else{
            echo json_encode(array('success' => false, 'data' => '1'));
        }
    }
    public function updateCacheOrder(){
        $orderId = get_cookie('__orderDraft');
        if($orderId == ''){
            $orderId = date("ymd"). random_int(100000, 999999);
            $setOrderDraft = setcookie ("__orderDraft",$orderId,time() + TIME_ORDER_DRAFT , '/');
            while ($setOrderDraft != 1 ) {
                // $setKrd = setcookie ("__krd",$keyAuth,time()+ TIME_DEVICE, '/');
                $setOrderDraft = setcookie ("__orderDraft",$orderId,time() + TIME_ORDER_DRAFT , '/');
            }
        }
        $messageDataOrder = json_decode($this->redis->get($orderId));

        $post = $this->request->getPost();

        if(!empty($post) && isset($post['dataRedis'])){
            // print_r($messageDataOrder);
            $dataRedis = $post['dataRedis'];
            if(isset($dataRedis['pickupAddressId']) && ($dataRedis['pickupAddressId'] != '' || $dataRedis['pickupAddressId'] != '0')) {
                $pickupAddressId = $dataRedis['pickupAddressId'];
                $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
                $dataPickupAddress = $this->singleOrderModel->getPickupAddress($dataUserAuthen,$pickupAddressId );
                if(!empty($dataPickupAddress)){
                    $dataRedis['pickName'] = $dataPickupAddress->senderName;
                    $dataRedis['pickPhone'] = $dataPickupAddress->phone;
                    $dataRedis['pickAddress'] = $dataPickupAddress->address;
                    $dataRedis['pickProvince'] = $dataPickupAddress->provinceCode;
                    $dataRedis['pickDistrict'] = $dataPickupAddress->districtId;
                    $dataRedis['pickWard'] = $dataPickupAddress->wardId;
                }
            }
            // echo '<pre>';
            // print_r($dataRedis);
            // die;
            $packageType = $messageDataOrder->packType;
            $packageCode = $messageDataOrder->packCode;
            $dataRedis['packType'] = $packageType;
            $dataRedis['packCode'] = $packageCode;
            $this->redis->set($orderId, json_encode($dataRedis,true),7200);
            echo json_encode(array('success' => true, 'data' => '1'));
        }
        die;
    }

    public function addNewReceivers(){
        $post = $this->request->getPost();
        if(!empty($post)){
            $deliveryPointIndex = $post['deliveryPointIndex'];
            $productIndex = $post['productIndex'];
            $receiverIndex = $post['receiverIndex'];
            $getErrors = [];
            $arrProductCategory= Array(
                '1' => 'Quần áo trẻ em',
                '2' => 'Giày thể thao nam',
                '3' => 'Loại hàng hóa',
                '4' => 'Vợt cầu lông'
            );
            $html = '';
            $html .='
            <div class="or-ttng row pickupOrder_'.$deliveryPointIndex.'_'.$receiverIndex .'">
                            <div class="chinhsua1 mb-1">
            <div id="orders" class="or-ttdh row qo-ttdhl w100 receiver-'.$deliveryPointIndex.'-'.$receiverIndex.'">
                    <ul class="or-dgh col-12 ">
                        <li class="or-dgh-1 pt-0 mt-0">
                            <span class="or-dh-stt"
                                style="background: #F0A616;">'.$receiverIndex .'</span><span
                                style="color: #68656D;">'.lang('Label.lbl_addOrderDetail') .'</span>
                        </li>
                        <li class="or-ttnh">
                            <ul>
                                <li class="or-ttnh-tt">
                                    '.lang('Label.lbl_txtReceiverInfo') .'
                                </li>
                            </ul>
                            <ul class="row">
                                <li class="col-md-3 col-sm-6 or-cgc-1">
                                    '.lang('Label.lbl_txtReceiverPhone') .'<span
                                        style="color: #885DE5;"> *</span> <br>
                                    ';
                                    $html .= '<input
                                    name="deliveryPoint['.$deliveryPointIndex .'][receivers]['.$receiverIndex .'][phone]"';
                                    $html .= "
                                    type='text' class='receiverPhone'
                                    index_item='".$receiverIndex ."'
                                    onkeypress='return isNumber(event)'
                                    placeholder='".lang('Label.ph_phone') ."'><br>";
                                    $html.='
                                    <span
                                        class=" err_messages err_receiverPhone_'. $deliveryPointIndex.'_'.$receiverIndex .'">'. $getErrors['ward'] .'</span>
                                </li>

                                <li class="col-md-3 col-sm-6 or-cgc-1">
                                    '.lang('Label.lbl_txtReceiverName') .'<span
                                        style="color: #885DE5;"> *</span> <br>
                                    <input
                                        name="deliveryPoint['.$deliveryPointIndex .'][receivers]['.$receiverIndex .'][name]"
                                        index_item="'.$receiverIndex .'" class="receiver unNumber"
                                        type="text"
                                        placeholder="'.lang('Label.lbl_txtReceiverName') .'"><br>
                                    <span
                                        class=" err_messages err_receiver_'.$deliveryPointIndex.'_'.$receiverIndex.'">'.$getErrors['ward'] .'</span>
                                </li>
                                <li class="col-md-3 col-sm-6 or-cgc-1">
                                    '.lang('Label.lbl_txtReceiverDate') .'<span
                                        style="color: #885DE5;"> *</span> <br>
                                    <input
                                        name="deliveryPoint['. $deliveryPointIndex .'][receivers]['. $receiverIndex .'][expectDate]"
                                        index_item="'. $deliveryPointIndex .'" type="text"
                                        class="orderdatePicker expectDate"
                                        style="padding-right: 10px;"><br>
                                    <span
                                        class=" err_messages err_expectDate_'. $deliveryPointIndex .'">'.$getErrors['ward'] .'</span>
                                </li>
                                <li class="col-md-3 col-sm-6 or-cgc-1">
                                    '. lang('Label.lbl_txtReceiverTime') .'<span
                                        style="color: #885DE5;"> *</span> <br>
                                    <input
                                        name="deliveryPoint['. $deliveryPointIndex .'][receivers]['. $receiverIndex .'][expectTime]"
                                        index_item="'. $receiverIndex .'" type="time"
                                        class="or-ttnh-input"><br>
                                    <span
                                        class=" err_messages err_expectTime_'. $receiverIndex .'">'.$getErrors['ward'].'</span>
                                </li>
                            </ul>
                        </li>
                        <!-- Thông tin hàng hóa -->
                        <li class="or-ttnh">
                            <ul>
                                <li class="or-ttnh-tt">
                                    '.lang('Label.lbl_txtGoodInfo').'
                                </li>
                            </ul>

                            <ul class="row">
                                <li class="col-md-6 col-sm-12">
                                    '.lang('Label.lbl_txtGoodName').'<span style="color: #885DE5;">
                                        *</span> <br>
                                    <input index_item="'.$receiverIndex.'"
                                        class="productName productName_'.$deliveryPointIndex.'_'.$receiverIndex.'"
                                        type="text" placeholder="'.lang('Label.lbl_inputGoodName').'"
                                        id="qo-tensp-ht">
                                    <span
                                        class=" err_messages err_productName_'.$deliveryPointIndex.'_'.$receiverIndex.'">'.$getErrors['ward'].'</span>
                                </li>
                                <li class="col-md-3 col-sm-6">
                                    '. lang('Label.lbl_txtCod') .'<span style="color: #885DE5;">
                                        *</span> <br>';
                                        $html .="<input index_item='". $receiverIndex ."'
                                        onkeypress='return isNumber(event)'
                                        type='text' value='0'
                                        class='or-cod productCOD_".  $deliveryPointIndex."_". $receiverIndex."' id='qo-cod-ht'>
                                        ";
                                        
                                    $html.='<span style="margin-left: -34px;"> đ</span>
                                    <span
                                        class=" err_messages err_productCod_'. $deliveryPointIndex.'_'.$receiverIndex .'">'.$getErrors['ward'].'.</span>
                                </li>
                                <li class="col-md-3 col-sm-6 or-cgc-1">
                                    <input index_item="'. $receiverIndex .'" checked
                                        name="checkProductValue" id="checkProductValue_'.  $deliveryPointIndex.'_'. $receiverIndex.'" type="checkbox"
                                        class="regular-checkbox mb-0 checkProductValue"
                                        style="width: 10px;height: 10px;">
                                    <label
                                        for="checkProductValue">'. lang('Label.lbl_txtGoodValue') .'</label><span
                                        style="color: #885DE5;"> *</span> <br>';
                                        $html .="
                                        <input index_item='". $receiverIndex ."' type='text' value='0'
                                        onkeypress='return isNumber(event)'
                                        class='or-ttnh-input or-gtkg productValue_".  $deliveryPointIndex."_". $receiverIndex."'
                                        id='qo-khaigia-ht'><span style='margin-left: -34px;'> đ</span>
                                        ";
                                        $html .='
                                        </br>
                                        <span class=" err_messages err_productValue_'. $deliveryPointIndex.'_'.$receiverIndex .'">'.$getErrors['ward'].'</span>
                                </li>
                            </ul>
                            <ul class="row">
                                <li class="col-md-6 col-sm-12">
                                    '. lang('Label.lbl_txtGoodType') .'<span style="color: #885DE5;">
                                        *</span> <br>
                                    <select style="padding-right: 10px;"
                                        placeholder="Chọn loại hàng hóa" id="qo-loaisp-ht"
                                        class="chosen-select productCategory_'. $deliveryPointIndex.'_'. $receiverIndex .'">
                                        <option value="0">Chọn loại hàng hóa</option>';
                                        foreach($arrProductCategory as $keyProductCate => $productCategory):
                                            $html .= '
                                            <option value="'.$keyProductCate .'">'. $productCategory .'</option>';
                                         endforeach; 
                                    
                                    $html .='.</select>
                                </li>
                                <li class="col-md-3 col-sm-6">
                                    '.lang('Label.lbl_txtGoodQuantity') .'<span
                                        style="color: #885DE5;">
                                        *</span> <br>
                                    <input value="1"
                                        onkeypress="return isNumber(event)"
                                        style="padding-right: 10px;" id="qo-soluong-ht"
                                        class="productQuatity_'.$deliveryPointIndex.'_'. $receiverIndex .'">
                                        <span
                                        class=" err_messages err_productQuatity_'.$deliveryPointIndex.'_'.$receiverIndex .'">'.$getErrors['ward'].'</span>
                                </li>
                                <li class="col-md-3 col-sm-6">
                                    <br>';

                                    $html .= "
                                    <button type='button' class='or-lhh-btn saveProduct'
                                        id='qo-btn-thh-1-". $deliveryPointIndex ."-".$receiverIndex."' 
                                        deliveryPointIndex='". $deliveryPointIndex ."'
                                        receiverIndex='". $receiverIndex."'
                                        productIndex='". $productIndex ."'
                                    ";
                                    
                                    $html .= '>'.lang('Label.lbl_txtGoodSave').'</button>';
                                    $html .= '<button type="button" deliveryPointIndex="" receiverIndex="" productIndex=""
                                        class="or-lhh-btn qo-ed-a updateProduct" 
                                        id="qo-btn-thh-2-'. $deliveryPointIndex .'-'.$receiverIndex.'">'.lang('Label.lbl_txtSaveInfo') .'</button>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Nếu có thêm mới hàng hóa thì phần này sẽ đươc hiện -->
                    <div style="width: 100%;" class="ttsp" id="ttsp_'.$deliveryPointIndex.'_'.$receiverIndex.'">

                    </div>
                    <!-- END hàng hóa -->

                    <ul class="col-12">
                        <li class="or-dvht">
                            '.lang('Label.lbl_txtSupportServices') .'
                        </li>
                    </ul>

                    <ul class="col-md-3 col-sm-6 or-ctdh-1">
                        <li>
                            '.lang('Label.lbl_txtGoodSize') .'<span style="color: #885DE5;"> *</span>
                            <br>
                            <input
                                name="deliveryPoint['. $deliveryPointIndex .'][receivers]['. $receiverIndex .'][length]"
                                type="text" placeholder="Dài x rộng x cao"><span
                                style="margin-left: -34px;">Cm</span>
                        </li>
                    </ul>

                    <ul class="col-md-3 col-sm-6 or-ctdh-1">
                        <li>
                            '. lang('Label.lbl_txtGoodWeight') .'<span style="color: #885DE5;">
                                *</span> <br>
                            <input
                                name="deliveryPoint['. $deliveryPointIndex .'][receivers]['. $receiverIndex .'][weight]"
                                type="text" value="200"><span style="margin-left: -50px;">Gram</span>
                        </li>
                    </ul>
                    <ul class="col-md-6 col-sm-12 or-ctdh-1">
                        <li>
                            '. lang('Label.lbl_txtExtraNote') .'<span style="color: #885DE5;"> *</span>
                            <br>
                            <input
                                name="deliveryPoint['. $deliveryPointIndex .'][receivers]['. $receiverIndex .'][note]"
                                type="text" value="Cho xem hàng, nếu khách không lấy thu 20k tiền ship"
                                class="or-ttnh-input1">
                        </li>
                    </ul>
                    <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                        <li class="or-cgc-1">
                            '. lang('Label.lbl_txtPayerFee') .'<span style="color: #885DE5;"> *</span>
                            <br>
                            <input type="radio" name="deliveryPoint['. $deliveryPointIndex .'][receivers]['. $receiverIndex .'][isFree]" class="or-radio-checked" id="orNtc1" value="1" checked> <label for="orNtc1"> '. lang('Label.lbl_txtPayerFeeSender') .'</label>
                            <br>
                
                            <input type="radio" value="0" name="deliveryPoint['. $deliveryPointIndex .'][receivers]['. $receiverIndex .'][isFree]" class="or-radio-checked" id="orNtc1a"> 
                            <label for="orNtc1a">'. lang('Label.lbl_txtPayerFeeReceiver') .'</label>
                        </li>
                    </ul>

                    <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                        <li class="or-cgc-1">'. lang('Label.lbl_txtPartialDelivery').'<span
                                style="color: #885DE5;"> *</span> <br>
                            <input type="radio" value="1"
                                name="deliveryPoint['. $deliveryPointIndex.'][receivers]['. $receiverIndex.'][partialDelivery]"
                                class="or-radio-checked" id="gh1p1" checked>
                            <label for="gh1p1">'. lang('Label.lbl_txtPartialDeliveryYes').'
                            </label><br>
                            <input type="radio" value="0"
                                name="deliveryPoint['. $deliveryPointIndex.'][receivers]['. $receiverIndex.'][partialDelivery]"
                                class="or-radio-checked" id="gh1p1a"> <label
                                for="gh1p1a">'. lang('Label.lbl_txtPartialDeliveryNo').'</label>
                        </li>
                    </ul>
                    <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                        <li class="or-cgc-1">
                            '. lang('Label.lbl_txtIsReturn') .' <br>
                            <input type="radio" value="1"
                                name="deliveryPoint['. $deliveryPointIndex .'][receivers]['. $receiverIndex .'][isRefund]"
                                class="or-radio-checked" id="dvch1" checked>
                            <label for="dvch1">'. lang('Label.lbl_txtPartialDeliveryYes') .'</label>
                            <br>
                            <input type="radio" value="0"
                                name="deliveryPoint['. $deliveryPointIndex .'][receivers]['. $receiverIndex .'][isRefund]"
                                class="or-radio-checked" id="dvch1a"> <label
                                for="dvch1a">'. lang('Label.lbl_txtPartialDeliveryNo') .'</label>
                        </li>
                    </ul>
                    <ul class="col-xl-2 col-sm-3 or-ctdh-1 or-ctdh-2">
                        <li class="or-cgc-1">
                            '. lang('Label.lbl_txtExtraServices') .' <br>
                            <input type="checkbox"
                                name="deliveryPoint['. $deliveryPointIndex .'][receivers]['. $receiverIndex .'][extraServices][isDoorDeliver]"
                                class="regular-checkbox or-radio-checked" id="dvthem1" /> <label
                                for="dvthem1">'. lang('Label.lbl_txtIsDoorDeliver') .'</label>
                            <br>
                            <input type="checkbox"
                                name="deliveryPoint['. $deliveryPointIndex .'][receivers]['. $receiverIndex .'][extraServices][isPorter]"
                                class="regular-checkbox or-radio-checked" id="dvthem1a" /> <label
                                for="dvthem1a">'. lang('Label.lbl_txtIsPorter') .'</label>
                        </li>
                    </ul>
                    <ul class="col-xl-4 col-sm-12 or-ctdh-1">
                        <li>
                            '. lang('Label.lbl_txtNoteRequired') .' <span style="color: #885DE5;">
                                *</span> <br>
                                <select
                                name="deliveryPoint['. $deliveryPointIndex .'][receivers]['. $receiverIndex .'][requireNote]"
                                style="width: 100%;">
                                <option  value="1">'. lang('Label.lbl_txtNoteRequired1') .'</option>
                                <option  value="2">'. lang('Label.lbl_txtNoteRequired2') .'</option>
                                <option  value="3">'. lang('Label.lbl_txtNoteRequired3') .'</option>
                            </select>
                        </li>
                    </ul>
                    <ul class="col-md-6 col-sm-0">
                    </ul>
                    <ul class="col-md-3 col-sm-6 or-ctdh-btn1">
                        <button type="button"
                            onclick="chinhsuanone("chinhsua1","qo-ed-1")">'.lang('Label.lbl_txtCancel') .'</button>
                    </ul>
                    <ul class="col-md-3 col-sm-6  or-ctdh-btn2">
                        <button class=" closePickupOrder closePickupOrder_'.$deliveryPointIndex.'_'.$receiverIndex.'"
                            deliveryPointIndex="'. $deliveryPointIndex.'" receiverIndex="'. $receiverIndex.'" productIndex="'. $productIndex.'"
                            type="button">'.lang('Label.lbl_txtFinish') .'</button>
                    </ul>
                </div>
                </div>
                </div>
            ';
            echo json_encode(array('success' => true, 'html' => $html));
        }else{
            echo json_encode(array('success' => false, 'html' => ''));
        }

    }
}
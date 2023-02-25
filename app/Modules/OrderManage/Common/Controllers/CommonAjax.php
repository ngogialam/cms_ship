<?php

namespace App\Modules\OrderManage\Common\Controllers;

class CommonAjax extends BaseController {
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
    public function array_htmlspecialchars($array = array()){
        if(!empty($array)){
            foreach ($array as $key => $value)
            {
                $array[$key] = @htmlspecialchars($value, ENT_QUOTES);
            }
        }
        return $array;
    }
    
    //Chọn kho đã tồn tại
    public function choosePickupAddress(){
        $post = $this->request->getPost();
        if(!empty($post)){
            $pickupAddreddId = $post['pickUpAddress'];

            if($post['typeOrder'] == 1){
                $orderIdDraft = get_cookie('__orderEdit');
                $dataOrders = json_decode($this->redis->get($orderIdDraft));                
                $dataOrders->pickupAddressId = $pickupAddreddId;
                $this->redis->set($orderIdDraft, json_encode($dataOrders, JSON_UNESCAPED_UNICODE), TIME_ORDER_DRAFT);
            }
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

                $htmlPickupAddress .= '<ul class="col-sm-4 mb-0 orDetail-input-show">
                                        <li>
                                        <img src="'.base_url("public/images/wh-kh1b.png").'" alt="">
                                        </li>
                                        <li class="orDetail-ttng-info">
                                        '.$choosePickupAddress->senderName.'
                                        </li>
                                    </ul>
                                    ';

                $htmlPickupAddress .= '<ul class="col-sm-4  mb-0 orDetail-input-show">
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
        $fullAddress = $choosePickupAddress->name;
        $htmlPickupAddress .= '<ul class="col-sm-12  mb-0 orDetail-input-show">
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
}
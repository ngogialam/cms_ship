<?php 
namespace App\Modules\OrderManage\Common\Models;

use CodeIgniter\Model;
use App\Libraries\Credis;

class CommonModels extends Model{
	public function __construct() {
        parent::__construct();
        $this->redis = new Credis();
    }

    public function createOrderRedis($orderIdDraft, $post, $username){
        // Obj Orders
        $dataOrders = new \stdClass;
        $dataOrders->packType = $post['packageType'];
        $dataOrders->packCode = $post['packageCode'];
        $dataOrders->packName = $post['packageName'];
        $dataOrders->orderKeys = 1;

        //Set index
        $index = new \stdClass;
        $index->deliveryPointIndex      = 1;
        $index->deliveryPointIndexNext  = 1;
        $index->receiverIndex           = 1;
        $index->receiverIndexNext       = 1;
        $index->productIndex            = 1;
        $index->productIndexNext        = 1;
        // $dataOrders->index = $index;

        //Set DeliveryPoints
        $deliveryPoint = array();

        //Set Receivers
        $receivers = array();

        //Set Items
        $items = array();

        //Old Order Reciver
        $oldReciver = json_decode($this->redis->get('LAST_ORDER:'.$username));
        if($post['packageType'] == 1 && isset($oldReciver)){
            //Receiver Detail
            $receiverDetail = new \stdClass;
            $receiverDetail->length = $oldReciver->length;
            $receiverDetail->width = $oldReciver->width;
            $receiverDetail->height = $oldReciver->height;
            $receiverDetail->weight = $oldReciver->weight;
            $receiverDetail->partialDelivery = $oldReciver->partialDelivery;
            $receiverDetail->isFree = $oldReciver->isFree;
            $receiverDetail->note = $oldReciver->note;
            $receiverDetail->isRefund = $oldReciver->isRefund;
            $receiverDetail->deliverShift = $oldReciver->deliverShift;
            $receiverDetail->requireNote = $oldReciver->requireNote;
            $receiverDetail->extraServices = $oldReciver->extraServices;
            //Get Receiver
            $items = $oldReciver->items;
            //Create Items
            foreach ($items as $keyItem => $item) {
                //Items Detail
                $productDetail = new \stdClass;
                $productDetail->productIndex = $keyItem + 1;
                $productDetail->productName = $item->productName;
                $productDetail->productCOD = $item->productCOD;
                $productDetail->productValue = $item->productValue;
                $productDetail->productCateName = $item->productCateName;
                $productDetail->productCate = $item->productCate;
                $productDetail->productQuantity = $item->productQuantity;
                //Set Items Detail
                $items[$keyItem] = $productDetail;
            }
            //set index
            $receiverDetail->receiverIndex           = 1;
            $receiverDetail->productIndexNext       = count($items) + 1;
            //Set Items
            $receiverDetail->items = $items;
            //Set Receivers Detail
            $receivers[0] = $receiverDetail;

            //point Detail
            $deliveryPointDetail = new \stdClass;
            $deliveryPointDetail->deliveryPointIndex = 1;
            $deliveryPointDetail->receiverIndexNext = 2;
            $deliveryPointDetail->receivers = $receivers;
            //Add to Array Point
            $deliveryPoint['0'] = $deliveryPointDetail;

            $dataOrders->deliveryPointIndexNext = 2;
            $dataOrders->deliveryPoint = $deliveryPoint;
        }else{
            //Product Detail
            $productDetail = new \stdClass;
            $productDetail->productIndex = 1;
            $items['0'] = $productDetail;

            //Receiver Detail
            $receiverDetail = new \stdClass;
            $receiverDetail->receiverIndex           = 1;
            $receiverDetail->productIndexNext       = 1;
            $receiverDetail->items = $items;
            //Add to Array Receivers
            $receivers['0'] = $receiverDetail;

            //point Detail
            $deliveryPointDetail = new \stdClass;
            $deliveryPointDetail->deliveryPointIndex = 1;
            $deliveryPointDetail->receiverIndexNext = 2;
            $deliveryPointDetail->receivers = $receivers;
            //Add to Array Point
            $deliveryPoint['0'] = $deliveryPointDetail;

            $dataOrders->deliveryPointIndexNext = 2;
            $dataOrders->deliveryPoint = $deliveryPoint;
        }
        $this->redis->set($orderIdDraft, json_encode($dataOrders), TIME_ORDER_DRAFT);
    }

    public function updateOrderRedis($orderIdDraft, $post, $index)
    {
        //Obj Order Redis
        $dataOrders = new \stdClass;
        $dataOrders = json_decode($this->redis->get($orderIdDraft));
        $dataOrders->orderKeys = 2;

        //Get Delivery Point
        $deliveryPoint = array();
        $deliveryPoint = $dataOrders->deliveryPoint;

        //Get Receiver
        $receivers = array();
        $receivers = $deliveryPoint[$post['deliveryPointIndex']-1]->receivers;
       
        //Get Items
        $items = array();
        $items = $receivers[$post['receiverIndex']-1]->items;
        //Set index
        $dataOrders->index = $index;
        $deliveryPointIndex = $index->deliveryPointIndex;
        $deliveryPointIndexNext = $index->deliveryPointIndexNext;
        $receiverIndex = $index->receiverIndex;
        $receiverIndexNext = $index->receiverIndexNext;
        $productIndex = $index->productIndex;
        $productIndexNext = $index->productIndexNext;

        //Point Next
        $dataOrders->deliveryPointIndexNext = $deliveryPointIndexNext;
        $dataOrders->pickupType = (trim($post['pickupType']))? trim($post['pickupType']) : 2;
        $dataOrders->paymentType = (trim($post['paymentType']))? trim($post['paymentType']) : 2;

        if($post['pickupAddressId']){
            $dataOrders->pickupAddressId = $post['pickupAddressId'];
        }else{
            $dataOrders->pickupAddressId = '0';
            $dataOrders->pickName = trim($post['pickName']);
            $dataOrders->pickPhone = trim($post['pickPhone']);
            $dataOrders->pickAddress = trim($post['pickAddress']);
            $dataOrders->pickProvince = trim($post['pickProvince']);
            $dataOrders->pickDistrict = trim($post['pickDistrict']);
            $dataOrders->pickWard = trim($post['pickWard']);
        }
        
        //ExtraServices Detail
        $extraServicesDetail = new \stdClass;
        $extraServicesDetail->isDoorDeliver = (trim($post['isDoorDeliver'])) ? '1' : '0';
        $extraServicesDetail->isPorter = (trim($post['isPorter'])) ? '1' : '0';
        //Add to Array ExtraServices
        $extraServices['0'] = $extraServicesDetail;
        
        //Product Detail
        if($post['productIndex'] > 0){
            $productDetail = new \stdClass;
            $productDetail->productIndex = $productIndex;
            $productDetail->productName = trim($post['productName']);
            $productDetail->productCOD = trim($post['productCOD']);
            $productDetail->productValue = trim($post['productValue']);
            $productDetail->productCateName = trim($post['productCateName']);
            $productDetail->productCate = trim($post['productCate']);
            $productDetail->productQuantity = trim($post['productQuantity']);
            //Add to Array Items
            $items[$post['productIndex']-1] = $productDetail;
        }
        
        //Receiver Detail
        $receiverDetail = new \stdClass;
        $receiverDetail->receiverIndex = $receiverIndex;
        $receiverDetail->productIndexNext = $productIndexNext;
        $receiverDetail->receiverPhone = trim($post['receiverPhone']);
        $receiverDetail->receiverName = trim($post['receiverName']);
        $receiverDetail->expectDate = trim($post['expectDate']);
        $receiverDetail->expectTime = trim($post['expectTime']);
        $receiverDetail->weight = trim($post['weight']);
        $receiverDetail->length = trim($post['length']);
        $receiverDetail->width = trim($post['width']);
        $receiverDetail->height = trim($post['height']);
        $receiverDetail->partialDelivery = trim($post['partialDelivery']);
        $receiverDetail->isFree = trim($post['isFree']);
        $receiverDetail->note = trim($post['note']);
        $receiverDetail->requireNote = trim($post['requireNote']);
        $receiverDetail->requireNoteName = trim($post['requireNoteName']);
        $receiverDetail->isRefund = trim($post['isRefund']);
        $receiverDetail->deliverShift = trim($post['deliverShift']);
        // $receiverDetail->isReturn = trim($post['isReturn']);
        $receiverDetail->items = $items;
        $receiverDetail->extraServices = $extraServices;
        //Add to Array Receivers
        $receivers[$post['receiverIndex']-1] = $receiverDetail;

        //point Detail
        $deliveryPointDetail = new \stdClass;
        $deliveryPointDetail->deliveryPointIndex = $deliveryPointIndex;
        $deliveryPointDetail->receiverIndexNext = $receiverIndexNext;
        $deliveryPointDetail->deliveryAddress = trim($post['deliveryAddress']);
        $deliveryPointDetail->deliveryPorvince = trim($post['deliveryPorvince']);
        $deliveryPointDetail->deliveryDistrict = trim($post['deliveryDistrict']);
        $deliveryPointDetail->deliveryWard = trim($post['deliveryWard']);
        $deliveryPointDetail->receivers = $receivers;
        //Add to Array Point
        $deliveryPoint[$post['deliveryPointIndex']-1] = $deliveryPointDetail;

        $dataOrders->deliveryPoint = $deliveryPoint;
        $this->redis->set($orderIdDraft, json_encode($dataOrders, JSON_UNESCAPED_UNICODE), TIME_ORDER_DRAFT);
        return $dataOrders;
    }

    public function createDataOrders($orderIdDraft){
        //Obj Order Redis
        $dataOrders = new \stdClass;
        $dataOrders = json_decode($this->redis->get($orderIdDraft));
        //Create Data Order
        $dataOrdersApi = new \stdClass;

        $dataOrdersApi->packCode = $dataOrders->packCode;
        $dataOrdersApi->packName = $dataOrders->packName;
        $dataOrdersApi->pickupAddressId = $dataOrders->pickupAddressId;
        $dataOrdersApi->expectShipperPhone = $dataOrders->expectShipperPhone;
        $dataOrdersApi->pickupType = $dataOrders->pickupType;
        $dataOrdersApi->paymentType = $dataOrders->paymentType;

        //Get Delivery Point
        $deliveryPoint = array();
        $deliveryPoint = $dataOrders->deliveryPoint;

        //Create Data Point
        $deliveryPointApi = array();

        foreach ($deliveryPoint as $keyPoint => $point) {
            //point Detail
            $deliveryPointDetail = new \stdClass;
            $deliveryPointDetail->address = $point->deliveryAddress;
            $deliveryPointDetail->province = $point->deliveryPorvince;
            $deliveryPointDetail->district = $point->deliveryDistrict;
            $deliveryPointDetail->ward = $point->deliveryWard;
            //Get Receiver
            $receivers = $point->receivers;
            //Create Receiver
            $receiversApi = array();
            foreach ($receivers as $keyReceiver => $receiver) {
                //Receiver Detail
                $receiverDetail = new \stdClass;
                $receiverDetail->name = $receiver->receiverName;
                $receiverDetail->phone = $receiver->receiverPhone;
                $receiverDetail->expectDate = $receiver->expectDate;
                $receiverDetail->expectTime = $receiver->expectTime;
                $receiverDetail->length = $receiver->length;
                $receiverDetail->width = $receiver->width;
                $receiverDetail->height = $receiver->height;
                $receiverDetail->weight = $receiver->weight;
                $receiverDetail->partialDelivery = $receiver->partialDelivery;
                $receiverDetail->isFree = $receiver->isFree;
                $receiverDetail->note = $receiver->note;
                $receiverDetail->isRefund = $receiver->isRefund;
                $receiverDetail->deliverShift = $receiver->deliverShift;
                $receiverDetail->requireNote = $receiver->requireNote;
                $receiverDetail->extraServices = $receiver->extraServices;
                // $receiverDetail->isReturn = $receiver->isReturn;
                //Get Receiver
                $items = $receiver->items;
                //Create Items
                $itemsApi = array();
                foreach ($items as $keyItem => $item) {
                    //Items Detail
                    $productDetail = new \stdClass;
                    $productDetail->productName = $item->productName;
                    $productDetail->cod = $item->productCOD;
                    $productDetail->productValue = $item->productValue;
                    $productDetail->quantity = $item->productQuantity;
                    $productDetail->category = $item->productCate;
                    //Set Items Detail
                    $itemsApi[$keyItem] = $productDetail;
                }
                //Set Items
                $receiverDetail->items = $itemsApi;
                //Set Receivers Detail
                $receiversApi[$keyReceiver] = $receiverDetail;
            }
            //Set Receivers
            $deliveryPointDetail->receivers = $receiversApi;
            //Set deliveryPoint
            $deliveryPointApi[$keyPoint] = $deliveryPointDetail;
        }
        $dataOrdersApi->deliveryPoint = $deliveryPointApi;
        return $dataOrdersApi;
    }

    public function createLastOrder($orderIdDraft) {
        //Obj Order Redis
        $dataOrders = new \stdClass;
        $dataOrders = json_decode($this->redis->get($orderIdDraft));
        //Create Data Order
        $lastOrders = new \stdClass;

        //Get Delivery Point
        $deliveryPoint = array();
        $deliveryPoint = $dataOrders->deliveryPoint;

        foreach ($deliveryPoint as $keyPoint => $point) {
            //Get Receiver
            $receivers = $point->receivers;
            foreach ($receivers as $keyReceiver => $receiver) {
                //Receiver Detail
                $lastOrders->length = $receiver->length;
                $lastOrders->width = $receiver->width;
                $lastOrders->height = $receiver->height;
                $lastOrders->weight = $receiver->weight;
                $lastOrders->partialDelivery = $receiver->partialDelivery;
                $lastOrders->isFree = $receiver->isFree;
                $lastOrders->note = $receiver->note;
                $lastOrders->isRefund = $receiver->isRefund;
                $lastOrders->deliverShift = $receiver->deliverShift;
                $lastOrders->requireNote = $receiver->requireNote;
                $lastOrders->extraServices = $receiver->extraServices;
                //Get Receiver
                $items = $receiver->items;
                //Create Items
                $itemsApi = array();
                foreach ($items as $keyItem => $item) {
                    //Items Detail
                    $productDetail = new \stdClass;
                    $productDetail->productIndex = $keyItem + 1;
                    $productDetail->productName = $item->productName;
                    $productDetail->productCOD = $item->productCOD;
                    $productDetail->productValue = $item->productValue;
                    $productDetail->productQuantity = $item->productQuantity;
                    $productDetail->productCate = $item->productCate;
                    $productDetail->productCateName = $item->productCateName;
                    //Set Items Detail
                    $itemsApi[$keyItem] = $productDetail;
                }
                $lastOrders->productIndexNext = count($items) + 1;
                //Set Items
                $lastOrders->items = $itemsApi;
            }
        }
        return $lastOrders;
    }

    public function array_sort($arrayData) {
        $temp = array();
        foreach ($arrayData as $key => $value) {
            if (is_numeric($key)) {
                $temp[] = $value;
            }
        }
        return $temp;
    }

    //Tạo message đổi thông tin đơn hàng nhỏ
    public function makeMessagesOrder($orderId , $dataOrderDetail){
        $dataOrders = new \stdClass;
        $dataOrders->packCode = $dataOrderDetail->packCode;
        $dataOrders->shopOrderCode = null;
        $dataOrders->paymentType = $dataOrderDetail->paymentType;
        $dataOrders->pickupAddressId = $dataOrderDetail->shopAddressId;
        $shipper = $dataOrderDetail->shipper;
        
        if(!empty($shipper)){
            $shipperPhone = $shipper->phone;
        }else{
            $shipperPhone= '';
        }
        $dataOrders->expectShipperPhone = $shipperPhone;
        $dataOrders->pickupType = $dataOrderDetail->pickType;

        //Create Data Point
        $deliveryPointApi = array();

        //point Detail
        $deliveryPointDetail = new \stdClass;
        $deliveryPointDetail->address = $dataOrderDetail->deliveryAddress;
        $deliveryPointDetail->province = $dataOrderDetail->deliveryProvinceCode;
        $deliveryPointDetail->district = $dataOrderDetail->deliveryDistrictCode;
        $deliveryPointDetail->ward = $dataOrderDetail->deliveryWardCode;
        //Get Receiver
        $receivers = $dataOrderDetail->receivers;
        //Create Receiver
        $receiversApi = array();
            //Receiver Detail
            $receiverDetail = new \stdClass;
            $receiverDetail->orderDetailCode = $orderId;
            $receiverDetail->name = $dataOrderDetail->consignee;
            $receiverDetail->phone = $dataOrderDetail->phone;
            $receiverDetail->expectDate = '';
            $receiverDetail->expectTime = '';
            $receiverDetail->length = $dataOrderDetail->length;
            $receiverDetail->width = $dataOrderDetail->width;
            $receiverDetail->height = $dataOrderDetail->height;
            $receiverDetail->weight = $dataOrderDetail->weight;

            $receiverDetail->partialDelivery = $dataOrderDetail->isPartDelivery;
            $receiverDetail->isFree = $dataOrderDetail->isFree;
            $receiverDetail->confirmType = '';
            $receiverDetail->note = $dataOrderDetail->note;
            $receiverDetail->isRefund = $dataOrderDetail->isRefund;
            $receiverDetail->deliverShift = '';
            $receiverDetail->requireNote = $dataOrderDetail->requiredNote;

            $extraServices = array();
            $extraServicesData = new \stdClass;
            $extraServicesData->isDoorDeliver = $dataOrderDetail->isDoorDelivery;
            $extraServicesData->isPorter = $dataOrderDetail->isPorter;
            $extraServices[] = $extraServicesData;

            $receiverDetail->extraServices = $extraServices;

            //Get Receiver
            $items = $dataOrderDetail->products;
            //Create Items
            $itemsApi = array();
            foreach ($items as $keyItem => $item) {
                //Items Detail
                $productDetail = new \stdClass;
                $productDetail->id = $item->id;
                $productDetail->productName = $item->name;
                $productDetail->cod = $item->cod;
                $productDetail->productValue = $item->value;
                $productDetail->quantity = $item->quantity;
                $productDetail->category = $item->productCateId;
                //Set Items Detail
                $itemsApi[$keyItem] = $productDetail;
            }
            //Set Items
            $receiverDetail->items = $itemsApi;
            //Set Receivers Detail
            $receiversApi[] = $receiverDetail;
        //Set Receivers
        $deliveryPointDetail->receivers = $receiversApi;
        //Set deliveryPoint
        $deliveryPointApi[] = $deliveryPointDetail;
        $dataOrders->deliveryPoint = $deliveryPointApi;
        return $dataOrders;
    }

    //Tạo data redis cho chỉnh sửa đơn hàng to
    public function createDataEditOrderRedis($orderId, $dataOrder, $typeUrl){
        $requiredNoteArr = Array(
            '1' => lang('Label.lbl_txtRequiredNote1'),
            '2' => lang('Label.lbl_txtRequiredNote2'),
            '3' => lang('Label.lbl_txtRequiredNote3')
        );
        $arrProductCategory = (array) json_decode($this->redis->get('productCategory'));
        if (empty($arrProductCategory)) {
            $arrProductCategory = array(
                '1' => 'Thời Trang Nam',
                '2' => 'Thời Trang Nữ',
                '3' => 'Mẹ & Bé',
                '4' => 'Điện Thoại & Phụ Kiện',
                '5' => 'Thiết Bị Điện Tử',
                '6' => 'Máy Tính & Laptop',
                '7' => 'Máy Ảnh & Máy Quay Phim',
                '8' => 'Đồng Hồ',
                '9' => 'Giày Dép Nam',
                '10' => 'Thiết Bị Điện Gia Dụng',
                '11' => 'Thể Thao & Du Lịch',
                '12' => 'Ô Tô & Xe Máy & Xe Đạp',
                '13' => 'Balo & Túi Ví Nam',
                '14' => 'Đồ Chơi',
                '15' => 'Chăm Sóc Thú Cưng',
                '16' => 'Nhà Cửa & Đời Sống',
                '17' => 'Sắc Đẹp',
                '18' => 'Sức Khỏe',
                '19' => 'Giày Dép Nữ',
                '20' => 'Túi Ví Nữ',
                '21' => 'Phụ Kiện & Trang Sức Nữ',
                '22' => 'Sách, Báo & Tạp Chí',
                '23' => 'Thời Trang Trẻ Em',
                '24' => 'Giặt Giũ & Chăm Sóc Nhà Cửa'
            );
            $this->redis->set('productCategory', json_encode($arrProductCategory, JSON_UNESCAPED_UNICODE));
        }
        $dataOrdersApi = new \stdClass;
        $dataOrdersApi->packType = $dataOrder->packType;
        $dataOrdersApi->packCode = $dataOrder->packCode;
        $dataOrdersApi->packName = $dataOrder->packName;
        $dataOrdersApi->pickupType = $dataOrder->pickupType;
        $dataOrdersApi->paymentType = $dataOrder->paymentType;
        $dataOrdersApi->pickupAddressId = $dataOrder->pickupAddressId;
        $dataOrdersApi->orderKeys = 2;
        
        //Set index
        $index = new \stdClass;
        $index->deliveryPointIndex      = 1;
        $index->receiverIndex           = 1;
        $index->productIndex            = 1;

        $dataOrdersApi->index = $index;
        //Get Delivery Point
        $deliveryPointApi = array();
        $deliveryPoint = $dataOrder->deliveryPoint;
        $dataOrdersApi->deliveryPointIndexNext = count($deliveryPoint) + 1;
        foreach($deliveryPoint as $keyDeliveryPoint => $point){
            $receiverPoints = $point->receivers;
            $deliveryPointDetail = new \stdClass;
            $index->deliveryPointIndexNext  = $keyDeliveryPoint + 1;
            $deliveryPointDetail->deliveryPointIndex = $keyDeliveryPoint + 1;
            $deliveryPointDetail->receiverIndexNext = count($receiverPoints) + 1;
            $deliveryPointDetail->deliveryAddress = $point->address;
            $deliveryPointDetail->deliveryPorvince = $point->province;
            $deliveryPointDetail->deliveryDistrict = $point->district;
            $deliveryPointDetail->deliveryWard = $point->ward;

            // Get receivers 

            $receiversApi = array();
            foreach($receiverPoints as $keyReceiver => $receiver) {
                //Get Receiver
                $items = $receiver->items;
                $receiverDetail = new \stdClass;
                
                $index->receiverIndexNext       =  $keyReceiver + 1;
                $receiverDetail->receiverIndex = $keyReceiver + 1;
                $receiverDetail->productIndexNext = count($items) + 1;
                $receiverDetail->receiverName = $receiver->name;
                $receiverDetail->receiverPhone = $receiver->phone;
                $receiverDetail->expectDate = $receiver->expectDate;
                $receiverDetail->expectTime = $receiver->expectTime;
                $receiverDetail->weight = $receiver->weight;
                $receiverDetail->length = $receiver->length;
                $receiverDetail->width = $receiver->width;
                $receiverDetail->height = $receiver->height;
                $receiverDetail->partialDelivery = $receiver->partialDelivery;
                $receiverDetail->isFree = $receiver->isFree;
                $receiverDetail->note = $receiver->note;
                // $receiverDetail->requireNote = $receiver->requireNote;
                $receiverDetail->requireNote = 1;
                $receiverDetail->requireNoteName = $requiredNoteArr['$receiver->requireNote'];
                $receiverDetail->isRefund = $receiver->isRefund;
                $receiverDetail->deliverShift = $receiver->deliverShift;
                //ExtraServices Detail
                $extraServicesDetail = new \stdClass;
                $extraServicesDetail->isDoorDeliver = (trim($receiver->extraServices[0]->isDoorDeliver)) ? '1' : '0';
                $extraServicesDetail->isPorter = (trim($receiver->extraServices[0]->isPorter)) ? '1' : '0';
                //Add to Array ExtraServices
                $extraServices['0'] = $extraServicesDetail;
                $receiverDetail->deliverShift = $receiver->deliverShift;
                $receiverDetail->extraServices = $extraServices;
                    //Product Detail
                    $items = $receiver->items;
                    $itemApi = array();
                    foreach($items as $keyItem => $item){
                        $productDetail = new \stdClass;
                        
                        $index->productIndexNext        = $keyItem + 1;
                        $productDetail->productIndex = $keyItem + 1;
                        $productDetail->productName = $item->productName ;
                        $productDetail->productCOD = $item->cod ;
                        $productDetail->productValue = $item->productValue ;
                        $productDetail->productCateName = $arrProductCategory[$item->category];
                        $productDetail->productCate = $item->category ;
                        $productDetail->productQuantity = $item->quantity ;
                        $itemApi[$keyItem] = $productDetail;
                    }
                    //Set items
                    $receiverDetail->items = $itemApi;
                $receiversApi[$keyReceiver] = $receiverDetail;
            }
            //Set Receivers
            $deliveryPointDetail->receivers = $receiversApi;
            
            $deliveryPointApi[$keyDeliveryPoint] = $deliveryPointDetail;
        }
        //Set deliveryPoint
        $dataOrdersApi->deliveryPoint = $deliveryPointApi;
        $checkOrderId = $this->redis->get($orderId);
        if($typeUrl == 0){
            $dataOrdersApi = json_decode($checkOrderId);
        }else{
            $this->redis->set($orderId, json_encode($dataOrdersApi, JSON_UNESCAPED_UNICODE), TIME_ORDER_DRAFT);
        }
        return $dataOrdersApi;
    }

    public function convertOrderOptimize($arrayOrder){
        $arrProductCategory = (array) json_decode($this->redis->get('productCategory'));
        $dataOrders = new \stdClass;
        $deliveryPoint = $arrayOrder->deliveryPoint;
        $dataOrders->packType = $arrayOrder->packType;
        $dataOrders->packCode = $arrayOrder->packCode;
        $dataOrders->packName = $arrayOrder->packName;
        $dataOrders->deliveryPointIndexNext = count($deliveryPoint) + 1;
        $dataOrders->pickupType = $arrayOrder->pickupType;
        $dataOrders->paymentType = $arrayOrder->paymentType;
        $dataOrders->pickupAddressId = $arrayOrder->pickupAddressId;
        $dataOrders->expectShipperPhone = $arrayOrder->expectShipperPhone;
        // $dataOrders->orderKeys = $arrayOrder->packName;
        $dataOrders->deliveryPoint =  array();

        $deliveryPointApi = array();
        foreach($deliveryPoint as $keyPoint => $point){
            //point Detail
            $deliveryPointDetail = new \stdClass;
            $deliveryPointDetail->deliveryAddress = $point->address;
            $deliveryPointDetail->deliveryPorvince = $point->province;
            $deliveryPointDetail->deliveryDistrict = $point->district;
            $deliveryPointDetail->deliveryWard = $point->ward;
            $deliveryPointDetail->deliveryPointIndex = $keyPoint + 1;
            $receivers = $point->receivers;
            $deliveryPointDetail->receiverIndexNext = count($receivers) + 1;

            //Get Receiver
            $receivers = $point->receivers;
            //Create Receiver
            $receiversApi = array();
            foreach ($receivers as $keyReceiver => $receiver) {
                //Get Receiver
                $items = $receiver->items;
                //Receiver Detail
                $receiverDetail = new \stdClass;
                $receiverDetail->receiverIndex = $keyReceiver + 1;
                $receiverDetail->productIndexNext = count($items) + 1;
                $receiverDetail->receiverName = $receiver->name;
                $receiverDetail->receiverPhone = $receiver->phone;
                $receiverDetail->expectDate = $receiver->expectDate;
                $receiverDetail->expectTime = $receiver->expectTime;
                $receiverDetail->length = $receiver->length;
                $receiverDetail->width = $receiver->width;
                $receiverDetail->height = $receiver->height;
                $receiverDetail->weight = $receiver->weight;
                $receiverDetail->partialDelivery = $receiver->partialDelivery;
                $receiverDetail->isFree = $receiver->isFree;
                $receiverDetail->note = $receiver->note;
                $receiverDetail->isRefund = $receiver->isRefund;
                $receiverDetail->deliverShift = $receiver->deliverShift;
                $receiverDetail->requireNote = $receiver->requireNote;
                $receiverDetail->extraServices = $receiver->extraServices;
                // $receiverDetail->isReturn = $receiver->isReturn;
                
                //Create Items
                $itemsApi = array();
                foreach ($items as $keyItem => $item) {
                    //Items Detail
                    $productDetail = new \stdClass;
                    $productDetail->productIndex = $keyItem + 1;
                    $productDetail->productName = $item->productName;
                    $productDetail->productCOD = $item->cod;
                    $productDetail->productValue = $item->productValue;
                    $productDetail->productQuantity = $item->quantity;
                    $productDetail->productCate = $item->category;
                    $productDetail->productCateName = $arrProductCategory[$item->category];
                    //Set Items Detail
                    $itemsApi[$keyItem] = $productDetail;
                }
                //Set Items
                $receiverDetail->items = $itemsApi;
                //Set Receivers Detail
                $receiversApi[$keyReceiver] = $receiverDetail;
            }
            //Set Receivers
            $deliveryPointDetail->receivers = $receiversApi;
            //Set deliveryPoint
            $deliveryPointApi[$keyPoint] = $deliveryPointDetail;

        }
        $dataOrders->deliveryPoint = $deliveryPointApi;
        return $dataOrders;
    }


}
<?php

namespace App\Modules\OrderManage\ListOrders\Controllers;

class ListOrders extends BaseController
{
    public function listOrders($segment = '', $page = 1)
    {

        $data = [];
        $title = "Danh sách đơn hàng";
        $post = $this->request->getGet();

        //List map status
        //chờ duyệt: 900 = 900,999,1001
        //chờ lấy: 100 = 1002,100,103,104,906,909
        //lấy thất bại: 102 = 102,1021,1022,1023,1026,1029,1025
        //lưu kho 200 = 200,105,2001,2002,2005,300,301,303,400,401,402,403,921,3031,2011,2012
        //đã hoàn: 504 = 504
        //đang giao 500 = 500,904,908,910,922
        //Giao thất bại 511 = 511,5112,5113,5114,5116,5115
        //Chờ hoàn 505 = 505,2003,
        //Giao thành công 501 = 501
        //Đang hoàn 502 = 502,2004, 907
        //Chờ hủy 901 = 901
        //Có vấn đề 2006 = 2006,20061,20062,20063,20064,20065,2007,2008,2009
        //Hoàn thất bại 905 = 905,5021
        //Hủy 924 = 903,107,902,924
        //Sai cân nặng 923 = 923
        switch ($this->segment) {
            case 'cho-duyet':
                $orderStatus = 900;
                $returnMenu = 1;
                break;
            case 'cho-lay':
                $orderStatus = 100;
                $returnMenu = 1;
                break;
            case 'dang-giao':
                $orderStatus = 500;
                $returnMenu = 2;
                break;
            case 'cho-hoan':
                $orderStatus = 505;
                $returnMenu = 2;
                break;
            case 'lay-that-bai':
                $orderStatus = 102;
                $returnMenu = 2;
                break;
            case 'luu-kho':
                $orderStatus = 200;
                $returnMenu = 2;
                break;
            case 'giao-that-bai':
                $orderStatus = 511;
                $returnMenu = 2;
                break;
            case 'giao-thanh-cong':
                $orderStatus = 501;
                $returnMenu = 2;
                break;
            case 'dang-hoan':
                $orderStatus = 502;
                $returnMenu = 2;
                break;
            case 'hoan-that-bai':
                $orderStatus = 905;
                $returnMenu = 2;
                break;
            case 'da-hoan':
                $orderStatus = 504;
                $returnMenu = 2;
                break;
            case 'co-van-de':
                $orderStatus = 2006;
                $returnMenu = 2;
                break;
            case 'cho-huy':
                $orderStatus = 901;
                $returnMenu = 2;
                break;
            case 'huy':
                $orderStatus = 924;
                $returnMenu = 2;
                break;
            case 'sai-can-nang':
                $orderStatus = 923;
                $returnMenu = 2;
                break;
            case 'luu-nhap':
                $orderStatus = 0;
                $returnMenu = 2;
                break;
            case 'cho-xac-nhan':
                $orderStatus = 999;
                $returnMenu = 3;
                break;
            default:
                $orderStatus = '0';
                $returnMenu = 2;
                break;
        }
        $shopAddressId = '';
        $packCode = '';
        $dataGetListOrder = array(
            "searchKey" => "",
            "fromDate" => "5/8/2021",
            "toDate" => "",
            "orderStatus" => $orderStatus,
            "page" => $page,
            "size" => PERPAGE,
            "orderBy" => "1",
            "exportExcel" => "0",
            "packCode" => $packCode,
            "shopAddressId" => $shopAddressId,
        );
        $dataPost = [];
        if (!empty($post)) {
            $searchKey = $post['searchKey'];
            $fromDate = $post['fromDate'];
            $toDate = $post['toDate'];
            $shopAddressId = $post['shopAddressId'];
            $packCode = $post['packCode'];
            if($shopAddressId == 0){
                $shopAddressId = '';
            }
            if($packCode == 0){
                $packCode = '';
            }
            $dataGetListOrder = array(
                "searchKey" => $searchKey,
                "fromDate" => $fromDate,
                "toDate" => $toDate,
                "orderStatus" => $orderStatus,
                "page" => '',
                "size" => PERPAGE,
                "orderBy" => "1",
                "exportExcel" => "0",
                "packCode" => $packCode,
                "shopAddressId" => $shopAddressId,
            );
            $dataPost = $post;
            // echo '<pre>';
            // print_r($dataGetListOrder);die;

        }
        //Pagination

        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $token = $dataUserAuthen->token;
        $username = $dataUserAuthen->username;
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;
        $listPickupAddress = $dataUser->pickupAddress;
        $headerGetListOrder = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:' . $token,
        ];

        $responseTotalOrders = $this->listOrdersModel->getTotalOrders($username, $headerGetListOrder, $dataGetListOrder);
        $dataTotalOrder = [];
        if ($responseTotalOrders->status == 200) {
            $dataTotalOrder = (array) $responseTotalOrders->data;
        }
        //Get extent menu
        $extentMenu = get_cookie('menuFilter');
        $contract = $dataUser->contract;
        $showNotiContract = 0;
        //$getCheckShowNotiContract = get_cookie('__showNotiContract');
        // if(empty($contract) && $getCheckShowNotiContract == ''){
        //     $showNotiContract = 1;
        //     setcookie("__showNotiContract",'success',time() + TIME_SHOW_NOTI_CONTRACT, '/');
        // }
        $data['showNotiContract'] = $showNotiContract;
        //Get Total Order
        $page = $page ? $page : 1;
        $data['page'] = $page;
        $data['perPage'] = PERPAGE;
        $data['pager'] = $this->pager;

        $data['preUri'] = $this->preUri;
        $data['segment'] = $this->segment;
        $data['arrPrint'] = $this->arrPrint;
        $data['arrEdit'] = $this->arrEdit;
        $data['arrCancel'] = $this->arrCancel;
        $data['arrNotSupport'] = $this->arrNotSupport;
        $data['arrReturn'] = $this->arrReturn;
        $data['arrFindShipper'] = $this->arrFindShipper;
        $data['arrReturnAndCommunate'] = $this->arrReturnAndCommunate;
        $data['arrConfirm'] = $this->arrConfirm;
        $data['arrReDelivery'] = $this->arrReDelivery;
        $data['extentMenu'] = $extentMenu;
        $data['dataTotalOrder'] = $dataTotalOrder;
        $data['dataPost'] = $dataPost;
        $data['arrStatus'] = (array) $this->status;
        $data['dataUser'] = $dataUser;
        $data['title'] = $title;
        $data['listPickupAddress'] = $listPickupAddress;
        // echo '<pre>';
        // print_r($listPickupAddress);die;
        //Get List Data Order
        $listPackages = [];
        if ($returnMenu == 1) {
            //View đơn to
            $reponseListDataOrders = $this->listOrdersModel->getListOrders($username, $headerGetListOrder, $dataGetListOrder);
            $listAllData = [];
            if ($reponseListDataOrders->status == 200) {
                $listAllData = $reponseListDataOrders->data;
                $listPackages = $listAllData->packages;
            }
            //Data link Pagination
            $this->pager->setPath($this->preUri . '/danh-sach-don-hang/' . $segment);
            $total = ($listAllData->total) ? $listAllData->total : 0;
            $data['pages'] = $this->pager->makeLinks($page, PERPAGE, $total, 'default_full', 4);

            // echo '<pre>';
            // print_r($listAllData);die;
            $data['listAllData'] = $listAllData;
            $data['listPackages'] = $listPackages;
            
            $data['view'] = 'App\Modules\OrderManage\ListOrders\Views\listOrders';
            return view('layoutShop/layout', $data);
        } else {
            //View đơn nhỏ
            // getListOrdersDetail
            $reponseListDataOrders = $this->listOrdersModel->getListOrdersDetail($username, $headerGetListOrder, $dataGetListOrder);
            $listAllData = [];
            if ($reponseListDataOrders->status == 200) {
                $listAllData = $reponseListDataOrders->data;
                $listPackages = $listAllData->packages;
            }
            // echo '<pre>';
            // print_r($listAllData);die;
            //Data link Pagination
            $this->pager->setPath($this->preUri . '/danh-sach-don-hang/' . $segment);
            $total = ($listAllData->total) ? $listAllData->total : 0;
            $data['pages'] = $this->pager->makeLinks($page, PERPAGE, $total, 'default_full', 4);
            $data['returnMenu'] = $returnMenu;
            $data['listAllData'] = $listAllData;
            $data['listPackages'] = $listPackages;
            
            $data['view'] = 'App\Modules\OrderManage\ListOrders\Views\listOrdersOtherStatus';
            return view('layoutShop/layout', $data);
        }

    }
    public function setCookieNotiContract(){
        $post = $this->request->getPost();
        if(!empty($post)){
            $typeOrder = $post['typeOrder'];
            if($typeOrder == 1){
                setcookie("__createOrderSingle",'success',time() + TIME_SHOW_NOTI_CONTRACT, '/');
            }else{
                setcookie("__createOrderMulti3",'success',time() + TIME_SHOW_NOTI_CONTRACT, '/');
            }
        }
        echo json_encode(array('success' => true));die;
    }

    public function orderDetail($orderId)
    {
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $token = $dataUserAuthen->token;
        $username = $dataUserAuthen->username;
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;
        
        $header = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:' . $token,
        ];
        $dataCallApiOrderDetail = array(
            'orderId' => $orderId,
        );
        $responseOrder = $this->listOrdersModel->getDetailOrder($username, $header, $dataCallApiOrderDetail);
        if ($responseOrder->status == 200) {
            $dataDetailOrder = $responseOrder->data;
        } else {
            return redirect()->to('/danh-sach-don-hang');
        }
        $arrTracking = $dataDetailOrder->trackings;
        $dataTrackingCurrent = [];
        $dataTracking = [];
        if (!empty($arrTracking)) {
            for ($i = 0; $i < count($arrTracking); $i++) {
                if ($i == 0) {
                    $dataTrackingCurrent = $arrTracking[0];
                } else {
                    $dataTracking[] = $arrTracking[$i];
                }
            }
        }
        $action = explode(',', $dataDetailOrder->action);
        // print_r($action);die;
        //List array edit
        //Get Product Category
        // echo '<pre>';
        // print_r($dataTrackingCurrent);die;
        $dataProvinces = $this->singleOrderModel->getProvince();
        $dataPickDistricts = $this->singleOrderModel->getDistrict($dataDetailOrder->deliveryProvinceCode, $dataDetailOrder->deliveryDistrictCode);
        $dataPickWards = $this->singleOrderModel->getWards($dataDetailOrder->deliveryProvinceCode, $dataDetailOrder->deliveryDistrictCode, $dataDetailOrder->deliveryDistrictCode);
        $title = 'Đơn hàng chi tiết';
        $this->redis->set($orderId, json_encode($dataDetailOrder, JSON_UNESCAPED_UNICODE), TIME_ORDER_DRAFT);
        $data['title'] = $title;
        $data['action'] = $action;
        $data['arrEditCod'] = $this->arrEditCod;
        $data['arrEditReceiver'] = $this->arrEditReceiver;
        $data['arrEditSize'] = $this->arrEditSize;

        $data['arrPrint'] = $this->arrPrint;
        $data['arrEdit'] = $this->arrEdit;
        $data['arrCancel'] = $this->arrCancel;
        $data['arrNotSupport'] = $this->arrNotSupport;
        $data['arrReturn'] = $this->arrReturn;
        $data['arrFindShipper'] = $this->arrFindShipper;
        $data['arrReturnAndCommunate'] = $this->arrReturnAndCommunate;
        $data['arrConfirm'] = $this->arrConfirm;
        $data['arrReDelivery'] = $this->arrReDelivery;
        $data['orderId'] = $orderId;
        $data['arrProductCategory'] = (array) $this->arrProductCategory;
        $data['dataProvinces'] = $dataProvinces;
        $data['dataPickDistricts'] = $dataPickDistricts;
        $data['dataPickWards'] = $dataPickWards;
        $data['arrStatus'] = (array) $this->status;
        $data['dataTrackingCurrent'] = $dataTrackingCurrent;
        $data['dataTracking'] = $dataTracking;
        $data['arrTracking'] = $arrTracking;
        $data['dataDetailOrder'] = $dataDetailOrder;
        $data['dataUser'] = $dataUser;
        $data['view'] = 'App\Modules\OrderManage\ListOrders\Views\orderDetail';
        return view('layoutShop/layout', $data);
    }

    public function printOrder()
    {

        $type = htmlspecialchars($this->uri[2], ENT_QUOTES);
        $size = htmlspecialchars($this->uri[3], ENT_QUOTES);
        $orderId = htmlspecialchars($this->uri[4], ENT_QUOTES);
        $arrOrderId = explode(',', $orderId);
        $groupStatus = '';
        $searchKey = '';
        $fromDate = '';
        $packCode = '';
        $shopAddressId = '';
        $toDate = '';
        $orderBy = 1;
        if ($arrOrderId[0] == 'ALL') {
            $segment = $arrOrderId[1];
            switch ($segment) {
                case 'cho-duyet':
                    $groupStatus = '900';
                    break;
                case 'cho-lay':
                    $groupStatus = '100';
                    break;
                case 'dang-giao':
                    $groupStatus = '500';
                    break;
                case 'cho-hoan':
                    $groupStatus = '505';
                    break;
                case 'lay-that-bai':
                    $groupStatus = '102';
                    break;
                case 'luu-kho':
                    $groupStatus = '200';
                    break;
                case 'giao-that-bai':
                    $groupStatus = '511';
                    break;
                case 'giao-thanh-cong':
                    $groupStatus = '501';
                    break;
                case 'dang-hoan':
                    $groupStatus = '502';
                    break;
                case 'hoan-that-bai':
                    $groupStatus = '905';
                    break;
                case 'da-hoan':
                    $groupStatus = '504';
                    break;
                case 'co-van-de':
                    $groupStatus = '2006';
                    break;
                case 'cho-huy':
                    $groupStatus = '901';
                    break;
                case 'huy':
                    $groupStatus = '924';
                    break;
                case 'sai-can-nang':
                    $groupStatus = '923';
                    break;
                case 'luu-nhap':
                    $groupStatus = '0';
                    break;
                default:
                    $groupStatus = '';
                    break;
            }
            $orderId = $arrOrderId[0];
            $get = $this->request->getGet();
            $searchKey = $get['searchKey'];
            $fromDate = $get['fromDate'];
            $packCode = $get['packCode'];
            $shopAddressId = $get['shopAddressId'];
            if($shopAddressId == 0){
                $shopAddressId = '';
            }
            if($packCode == 0){
                $packCode = '';
            }
            $toDate = $get['toDate'];
        }
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $token = $dataUserAuthen->token;
        $username = $dataUserAuthen->username;
        $header = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:' . $token,
        ];
        $dataOrder = [];
        $dataCallApi = array(
            "orderCodes" => $orderId,
            "type" => $type,
            "orderStatus" => $groupStatus,
            "searchKey" => $searchKey,
            "fromDate" => $fromDate,
            "packCode" => $packCode,
            "toDate" => $toDate,
            "orderBy" => $orderBy,
            "shopAddressId" => $shopAddressId,
        );
        
        $arrOrder = $this->listOrdersModel->getDataPrint($username, $header, $dataCallApi);
        if ($arrOrder->status == 200) {
            $dataOrder = $arrOrder->data;
        }

        $data['dataOrder'] = $dataOrder;
        $data['requiredNoteArr'] = (array) $this->requiredNoteArr;
        $data['title'] = 'In đơn hàng';
        $data['view'] = 'App\Modules\OrderManage\ListOrders\Views\print' . $size;
        return view('layoutShop/layout_print' . $size, $data);
    }

}

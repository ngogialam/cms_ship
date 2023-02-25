<?php

namespace App\Modules\OrderManage\ListOrders\Controllers;

use App\Libraries\QRCode;
use App\Libraries\generateBarcode;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class OrderHandle extends BaseController
{


    //Duyệt đơn
    public function ApprovalOrder()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $orderID = $post['orderID'];
            $countOrder = $post['countOrder'];
            $detail = $post['detail'];

            $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
            $token = $dataUserAuthen->token;
            $username = $dataUserAuthen->username;

            $header = [
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization:' . $token
            ];
            $dataCallApiApproveOrder = [
                'orderCodes' => $orderID
            ];
            $responseCall = $this->listOrdersModel->approveOrder($username, $header, $dataCallApiApproveOrder);
            if ($countOrder < 2) {
                if ($responseCall->status == 609 || $responseCall->status == 612) {
                    if ($detail != 0) {
                        setcookie("__updateOrder_" . $detail, 'success^_^' . $responseCall->message, time() + (60 * 10), '/');
                        echo json_encode(array('success' => true, 'message' => 'true'));
                        die;
                    } else {
                        setcookie("__createOrder", 'success^_^' . $responseCall->status, time() + (60 * 10), '/');
                        echo json_encode(array('success' => true, 'message' => 'true'));
                        die;
                    }
                } else {
                    echo json_encode(array('success' => false, 'message' => $responseCall->message, 'status' => $responseCall->status, 'data' => $responseCall->data));
                    die;
                }
            } else {
                if ($responseCall->status == 609) {
                    echo json_encode(array('success' => false, 'message' => 'false', 'status' => $responseCall->status, 'data' => $responseCall->data));
                    die;
                } else {
                    echo json_encode(array('success' => false, 'message' => 'false', 'status' => $responseCall->status, 'data' => $responseCall->data));
                    die;
                }
            }
        }
    }
    //Duyệt tất cả
    public function ApprovalOrderAll()
    {

        $post = $this->request->getPost();
        if (!empty($post)) {

            $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
            $token = $dataUserAuthen->token;
            $username = $dataUserAuthen->username;

            $header = [
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization:' . $token
            ];
            $dataCallApiApproveOrder = [
                'orderCodes' => '',
                'action' => 'ALL'
            ];
            $responseCall = $this->listOrdersModel->approveOrder($username, $header, $dataCallApiApproveOrder);
            if ($responseCall->status == 609 || $responseCall->status == 612) {
                echo json_encode(array('success' => true, 'message' => 'true', 'status' => $responseCall->status, 'data' => $responseCall->data));
                die;
            } else {
                setcookie("__createOrder", 'false^_^' . $responseCall->status, time() + (60 * 10), '/');
                echo json_encode(array('success' => false, 'message' => 'false', 'status' => $responseCall->status, 'data' => $responseCall->data));
                die;
            }
        }
    }
    // Hủy đơn 
    public function cancelOrderMulti()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {

            $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
            $token = $dataUserAuthen->token;
            $username = $dataUserAuthen->username;
            $orderID = $post['orderID'];
            $type = $post['type'];
            $header = [
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization:' . $token
            ];
            $dataCallApiApproveOrder = [
                'orderCode' => $orderID,
                'type' => $type,
                'groupStatus' => '',

            ];
            $responseCall = $this->listOrdersModel->cancelOrder($username, $header, $dataCallApiApproveOrder);
            if ($responseCall->status == 760) {
                // setcookie ("__createOrder",'success^_^'.$responseCall->status,time()+ (60*10) , '/');
                echo json_encode(array('success' => true, 'message' => 'true'));
                die;
            } else {
                setcookie("__createOrder", 'false^_^' . $responseCall->status, time() + (60 * 10), '/');
                echo json_encode(array('success' => false, 'message' => 'false'));
                die;
            }
        } else {
            setcookie("__createOrder", 'false^_^500', time() + (60 * 10), '/');
            echo json_encode(array('success' => false, 'message' => 'False'));
            die;
        }
    }
    //Change info order
    public function changeInfo()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $orderId = $post['orderId'];
            $order = $this->redis->get($orderId);
            if ($order != '') {

                $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
                $token = $dataUserAuthen->token;
                $username = $dataUserAuthen->username;

                $header = [
                    'Accept: application/json',
                    'Content-Type: application/json',
                    'Authorization:' . $token
                ];
                $orderDetail = json_decode($order);

                if (in_array($orderDetail->status, $this->arrEditReceiver)) {
                    if (isset($post['receiverName']) && $post['receiverName'] != '' && $post['receiverName'] != $orderDetail->consignee) {
                        $orderDetail->consignee = $post['receiverName'];
                    }
                    if (isset($post['receiverPhone']) && $post['receiverPhone'] != '') {
                        $orderDetail->phone = $post['receiverPhone'];
                    }

                    if (isset($post['receiverAddress']) && $post['receiverAddress'] != '' && $post['receiverAddress'] != $orderDetail->deliveryAddress) {
                        $orderDetail->deliveryAddress = $post['receiverAddress'];
                    }
                    if (isset($post['receiverProvinceCode']) && $post['receiverProvinceCode'] != '' && $post['receiverProvinceCode'] != $orderDetail->deliveryProvinceCode) {
                        $orderDetail->deliveryProvinceCode = $post['receiverProvinceCode'];
                    }
                    if (isset($post['receiverDistrictCode']) && $post['receiverDistrictCode'] != '' && $post['receiverDistrictCode'] != $orderDetail->deliveryDistrictCode) {
                        $orderDetail->deliveryDistrictCode = $post['receiverDistrictCode'];
                    }

                    if (isset($post['receiverWardCode']) && $post['receiverWardCode'] != '' && $post['receiverWardCode'] != $orderDetail->deliveryWardCode) {
                        $orderDetail->deliveryWardCode = $post['receiverWardCode'];
                    }
                }

                if (in_array($orderDetail->status, $this->arrEditSize)) {
                    if (isset($post['length']) && $post['length'] != '' && $post['length'] != $orderDetail->length) {
                        $orderDetail->length = $post['length'];
                    }
                    if (isset($post['width']) && $post['width'] != '' && $post['width'] != $orderDetail->width) {
                        $orderDetail->width = $post['width'];
                    }
                    if (isset($post['height']) && $post['height'] != '' && $post['height'] != $orderDetail->height) {
                        $orderDetail->height = $post['height'];
                    }
                    if (isset($post['productWeight']) && $post['productWeight'] != '' && $post['productWeight'] != $orderDetail->weight) {
                        $orderDetail->weight = $post['productWeight'];
                    }
                }
                $dataOrders = $this->common->makeMessagesOrder($orderId, $orderDetail);
                $params = [
                    'orderDetailCode' => $orderId
                ];
                $responseUpdate = $this->listOrdersModel->changeInfoReceiver($username, $header, $dataOrders, $params);
                if ($responseUpdate->status == 700 || $responseUpdate->status == 707) {
                    setcookie("__updateOrder_" . $orderId, 'success', time() + (60 * 10), '/');
                    echo json_encode(array('success' => true, 'message' => 'true'));
                    die;
                } else {
                    setcookie("__updateOrder_" . $orderId, 'false^_^' . $responseUpdate->message, time() + (60 * 10), '/');
                    echo json_encode(array('success' => false, 'message' => 'false'));
                    die;
                }
            } else {
                echo json_encode(array('success' => false, 'message' => 'False'));
                die;
            }
        } else {
            echo json_encode(array('success' => false, 'message' => 'False'));
            die;
        }
    }
    //Change COD
    public function changeInfoOrder()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $orderId = $post['orderId'];
            $typeOrder = $post['typeOrder'];
            $order = $this->redis->get($orderId);
            if ($order != '') {

                $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
                $token = $dataUserAuthen->token;
                $username = $dataUserAuthen->username;

                $header = [
                    'Accept: application/json',
                    'Content-Type: application/json',
                    'Authorization:' . $token
                ];
                $orderDetail = json_decode($order);

                if (in_array($orderDetail->status, $this->arrEditCod)) {
                    $arrCod = $post['arrCod'];
                    $arrProduct = $orderDetail->products;
                    foreach ($arrProduct as $keyProduct => $product) {
                        $product->cod = $arrCod[$keyProduct];
                    }
                }
                $headers = [
                    'Accept: application/json',
                    'Content-Type: application/json',
                    'Authorization:' . $token
                ];
                if ($typeOrder == 2) {
                    $items = $orderDetail->products;
                    $itemProducts = [];
                    if (!empty($items)) {
                        foreach ($items as $key => $itemProduct) {
                            $productDetail = new \stdClass;
                            $productDetail->productName = $itemProduct->name;
                            $productDetail->cod = $itemProduct->cod;
                            $productDetail->productValue = $itemProduct->value;
                            $productDetail->quantity = $itemProduct->quantity;
                            $productDetail->category = $itemProduct->productCateId;
                            //Set Items Detail
                            $itemProducts[$key] = $productDetail;
                        }
                    }
                    $dataCheckCodValue = [
                        'items' => $itemProducts
                    ];
                    $resultCheckCod = $this->singleOrderModel->checkCodValue($headers, $dataCheckCodValue, $username);
                    if ($resultCheckCod->status == 200 && $resultCheckCod->data->valid == false) {
                        echo json_encode(array('success' => false, 'data' => $resultCheckCod->data->message, 'redirect' => 0, 'status' => 1));
                        die;
                    }
                }
                $dataOrders = $this->common->makeMessagesOrder($orderId, $orderDetail);
                $params = [
                    'orderDetailCode' => $orderId
                ];
                $responseUpdate = $this->listOrdersModel->changeInfoOrder($username, $header, $dataOrders, $params);
                if ($responseUpdate->status == 705 || $responseUpdate->status == 700 || $responseUpdate->status == 707) {
                    setcookie("__updateOrder_" . $orderId, 'success^_^' . $responseUpdate->message, time() + (60 * 10), '/');
                    echo json_encode(array('success' => true, 'message' => 'true'));
                    die;
                } else {
                    setcookie("__updateOrder_" . $orderId, 'false^_^' . $responseUpdate->message, time() + (60 * 10), '/');
                    echo json_encode(array('success' => false, 'message' => 'false'));
                    die;
                }
            } else {
                echo json_encode(array('success' => false, 'message' => 'False'));
                die;
            }
        } else {
            echo json_encode(array('success' => false, 'message' => 'False'));
            die;
        }
    }

    //Yêu cầu giao lại
    public function reDelivery()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $orderId = $post['orderId'];
            if ($orderId != '') {

                $type = $post['type'];
                $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
                $token = $dataUserAuthen->token;
                $username = $dataUserAuthen->username;

                $header = [
                    'Accept: application/json',
                    'Content-Type: application/json',
                    'Authorization:' . $token
                ];
                $dataOrders = [];
                $params = [
                    'orderDetailCode' => $orderId
                ];

                $responseUpdate = $this->listOrdersModel->reDelivery($username, $header, $dataOrders, $params);
                if ($responseUpdate->status == 750) {
                    if ($type == 1) {
                        setcookie("__updateOrder_" . $orderId, 'success^_^' . $responseUpdate->message, time() + (60 * 10), '/');
                    } else {
                        setcookie("__createOrder", 'success^_^' . $responseUpdate->status, time() + (60 * 10), '/');
                    }

                    echo json_encode(array('success' => true, 'message' => 'true'));
                    die;
                } else {
                    if ($type == 1) {
                        setcookie("__updateOrder_" . $orderId, 'false^_^' . $responseUpdate->message, time() + (60 * 10), '/');
                    } else {
                        setcookie("__createOrder", 'false^_^' . $responseUpdate->status, time() + (60 * 10), '/');
                    }
                    echo json_encode(array('success' => false, 'message' => 'false'));
                    die;
                }
            } else {
                echo json_encode(array('success' => false, 'message' => 'False'));
                die;
            }
        } else {
            echo json_encode(array('success' => false, 'message' => 'False'));
            die;
        }
    }
    //Chuyển hoàn đơn hàng
    public function refundOrder()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $orderId = $post['orderId'];
            if ($orderId != '') {
                $type = $post['type'];
                $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
                $token = $dataUserAuthen->token;
                $username = $dataUserAuthen->username;

                $header = [
                    'Accept: application/json',
                    'Content-Type: application/json',
                    'Authorization:' . $token
                ];
                $dataOrders = [];
                $params = [
                    'orderDetailCode' => $orderId
                ];
                $responseUpdate = $this->listOrdersModel->refundOrder($username, $header, $dataOrders, $params);
                if ($responseUpdate->status == 770) {
                    if ($type == 1) {
                        setcookie("__updateOrder_" . $orderId, 'success^_^' . $responseUpdate->message, time() + (60 * 10), '/');
                    } else {
                        setcookie("__createOrder", 'success^_^' . $responseUpdate->status, time() + (60 * 10), '/');
                    }
                    echo json_encode(array('success' => true, 'message' => 'true'));
                    die;
                } else {
                    if ($type == 1) {
                        setcookie("__updateOrder_" . $orderId, 'false^_^' . $responseUpdate->message, time() + (60 * 10), '/');
                    } else {
                        setcookie("__createOrder", 'false^_^' . $responseUpdate->status, time() + (60 * 10), '/');
                    }
                    echo json_encode(array('success' => false, 'message' => 'false'));
                    die;
                }
            } else {
                echo json_encode(array('success' => false, 'message' => 'False'));
                die;
            }
        } else {
            echo json_encode(array('success' => false, 'message' => 'False'));
            die;
        }
    }
    //Hủy đơn hàng
    public function cancelOrder()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $orderId = $post['orderId'];
            if ($orderId != '') {
                $type = $post['type'];
                $reload = $post['reload'];
                $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
                $token = $dataUserAuthen->token;
                $username = $dataUserAuthen->username;

                $header = [
                    'Accept: application/json',
                    'Content-Type: application/json',
                    'Authorization:' . $token
                ];
                $dataOrders = [
                    'orderCode' => $orderId,
                    'type' => $type
                ];

                $responseUpdate = $this->listOrdersModel->cancelOrder($username, $header, $dataOrders);
                if ($responseUpdate->status == 760) {
                    if ($reload == 1) {
                        setcookie("__updateOrder_" . $orderId, 'success^_^' . $responseUpdate->message, time() + (60 * 10), '/');
                    } else {
                        setcookie("__createOrder", 'success^_^' . $responseUpdate->status, time() + (60 * 10), '/');
                    }
                    echo json_encode(array('success' => true, 'message' => 'true'));
                    die;
                } else {
                    if ($reload == 1) {
                        setcookie("__updateOrder_" . $orderId, 'false^_^' . $responseUpdate->message, time() + (60 * 10), '/');
                    } else {
                        setcookie("__createOrder", 'false^_^' . $responseUpdate->status, time() + (60 * 10), '/');
                    }
                    echo json_encode(array('success' => false, 'message' => 'false'));
                    die;
                }
            } else {
                echo json_encode(array('success' => false, 'message' => 'False'));
                die;
            }
        } else {
            echo json_encode(array('success' => false, 'message' => 'False'));
            die;
        }
    }
    //Hủy toàn bộ đơn hàng
    public function cancelOrderAll()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $type = $post['type'];
            if ($type != '') {

                $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
                $token = $dataUserAuthen->token;
                $username = $dataUserAuthen->username;

                $header = [
                    'Accept: application/json',
                    'Content-Type: application/json',
                    'Authorization:' . $token
                ];
                //100: tab chờ lấy
                $dataOrders = [
                    'orderCode' => '',
                    'type' => $type,
                    'groupStatus' => '100'
                ];

                $responseUpdate = $this->listOrdersModel->cancelOrder($username, $header, $dataOrders);
                if ($responseUpdate->status == 760) {
                    // setcookie ("__createOrder",'success^_^'.$responseUpdate->status,time()+ (60*10) , '/');
                    echo json_encode(array('success' => true, 'message' => 'true'));
                    die;
                } else {
                    setcookie("__createOrder", 'false^_^' . $responseUpdate->status, time() + (60 * 10), '/');
                    echo json_encode(array('success' => false, 'message' => 'false'));
                    die;
                }
            } else {
                echo json_encode(array('success' => false, 'message' => 'False'));
                die;
            }
        } else {
            echo json_encode(array('success' => false, 'message' => 'False'));
            die;
        }
    }

    public function partialConfirm()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $orderId = $post['orderId'];
            if ($orderId != '') {
                $type = $post['type'];
                $partialRequestId = $post['partialRequestId'];
                $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
                $token = $dataUserAuthen->token;
                $username = $dataUserAuthen->username;

                $header = [
                    'Accept: application/json',
                    'Content-Type: application/json',
                    'Authorization:' . $token
                ];
                $dataOrders = [
                    'orderCode' => $orderId,
                    'partialRequestId' => $partialRequestId,
                    'confirmed' => $type
                ];

                $responseUpdate = $this->listOrdersModel->partialConfirm($username, $header, $dataOrders);
                if ($responseUpdate->status == 780 ||  $responseUpdate->status == 782) {
                    setcookie("__updateOrder_" . $orderId, 'success^_^' . $responseUpdate->message, time() + (60 * 10), '/');
                    echo json_encode(array('success' => true, 'message' => 'true'));
                    die;
                } else {
                    setcookie("__updateOrder_" . $orderId, 'false^_^' . $responseUpdate->message, time() + (60 * 10), '/');
                    echo json_encode(array('success' => false, 'message' => 'false'));
                    die;
                }
            } else {
                setcookie("__updateOrder_" . $orderId, 'false^_^', time() + (60 * 10), '/');
                echo json_encode(array('success' => false, 'message' => 'False'));
                die;
            }
        } else {
            setcookie("__updateOrder_", 'false^_^', time() + (60 * 10), '/');
            echo json_encode(array('success' => false, 'message' => 'False'));
            die;
        }
    }

    public function editOrderPending($orderId, $typeUrl = 0)
    {
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $token = $dataUserAuthen->token;
        $username = $dataUserAuthen->username;
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;
        $header = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:' . $token
        ];
        $dataCallApiOrderDetail = array(
            'orderDetailCode' => $orderId
        );
        $responseOrder = $this->listOrdersModel->getOrderPending($username, $header, $dataCallApiOrderDetail);
        $statusResponseOrder = $responseOrder->status;

        $setOrderEdit = setcookie("__orderEdit", $orderId, time() + TIME_ORDER_DRAFT, '/');
        while ($setOrderEdit != 1) {
            $setOrderDraft = setcookie("__orderEdit", $orderId, time() + TIME_ORDER_DRAFT, '/');
        }

        $typeEdit = 1;
        if ($statusResponseOrder == 200) {
            $dataOrder = $responseOrder->data;
            $dataOrders = $this->common->createDataEditOrderRedis($orderId, $dataOrder, $typeUrl);

            if ($typeUrl == 1) {
                header("Location: " . base_url($this->preUri . '/chinh-sua-don-hang/' . $orderId));
                die;
            }
            // echo '<pre>';
            // print_r($dataOrders);die;
            $dataProvinces = $this->singleOrderModel->getProvince();
            $dataPickDistricts = $this->singleOrderModel->getDistrict($dataOrders->pickProvince, $dataOrders->pickDistrict);
            $dataPickWards = $this->singleOrderModel->getWards($dataOrders->pickProvince, $dataOrders->pickDistrict, $dataOrders->pickWard);
            // $lastOrder = json_decode($this->redis->get('LAST_ORDER:'.$username));
            // Get Data Orders Redis
            $packType = $dataOrders->packType;
            //Get Data Pickup province - district - ward
            $pickupAddress = $dataUser->pickupAddress;
            $dataPickupDefault = $this->singleOrderModel->getPickupAddressID($username, $pickupAddress, $dataOrders->pickupAddressId);
            $title = lang('Label.lbl_newSingleOrder');
            $data['dataOrders'] = $dataOrders;
            // echo '<pre>';
            // print_r($dataOrders);die;
            // $data['lastOrder'] = $lastOrder;
            $data['packType'] = $packType;
            $data['arrProductCategory'] = $this->arrProductCategory;
            $data['pickupAddress'] = $pickupAddress;
            $data['dataUser'] = $dataUser;
            $data['dataProvinces'] = $dataProvinces;
            $data['dataPickDistricts'] = $dataPickDistricts;
            $data['dataPickWards'] = $dataPickWards;
            $data['dataPickup'] = $dataPickupDefault;
            $data['title'] = $title;
            $data['orderId'] = $orderId;
            $data['typeEdit'] = $typeEdit;
            $data['singleOrderModel'] = $this->singleOrderModel;
            if ($packType == 2) {
                $data['view'] = 'App\Modules\OrderManage\ListOrders\Views\editOrderKm';
            } else {
                $data['view'] = 'App\Modules\OrderManage\ListOrders\Views\editOrder';
            }
            return view('layoutShop/layout', $data);
        } else {
            // call and noti listOrder
            setcookie("__createOrder", 'false^_^xxx', time() + (60 * 10), '/');
            header("Location: " . base_url('/danh-sach-don-hang'));
            die;
        }
    }

    public function generateQRCode()
    {
        $x = (isset($_GET["x"])     ? $_GET["x"] : "1");
        $y = (isset($_GET["y"])     ? $_GET["y"] : "1");
        $this->generateBarcode            = new QRCode();
        $text           = (isset($_GET["text"])         ? $_GET["text"] : "0");
        $qr = QRCode::getMinimumQRCode($text, QR_ERROR_CORRECT_LEVEL_L);
        $barCode = $qr->createImage($x, 1);

        header("Content-type: image/gif");
        imagegif($barCode);

        imagedestroy($barCode);
        return $barCode;
    }
    public function generateBarcode()
    {
        $this->generateBarcode            = new generateBarcode();
        $filepath       = (isset($_GET["filepath"])     ? $_GET["filepath"] : "");
        $text           = (isset($_GET["text"])         ? $_GET["text"] : "0");
        $size           = (isset($_GET["size"])         ? $_GET["size"] : "20");
        $orientation    = (isset($_GET["orientation"])  ? $_GET["orientation"] : "horizontal");
        $code_type      = (isset($_GET["codetype"])     ? $_GET["codetype"] : "code128");
        $print          = (isset($_GET["print"]) && $_GET["print"] == 'true' ? true : false);
        $sizefactor     = (isset($_GET["sizefactor"])   ? $_GET["sizefactor"] : "1");
        $barCode        = $this->generateBarcode->barcode($filepath = "", $text, $size, $orientation = "horizontal", $code_type = "code128", $print = false, $sizefactor);
        header("Content-type: image/gif");
        imagegif($barCode);

        imagedestroy($barCode);
        return $barCode;
    }
    //Duyệt đơn
    public function DeleteOrder()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $orderID = $post['orderID'];
            $type = $post['type'];
            $countOrder = $post['countOrder'];

            $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
            $token = $dataUserAuthen->token;
            $username = $dataUserAuthen->username;

            $header = [
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization:' . $token
            ];
            $dataCallApiApproveOrder = [
                'orderCodes' => $orderID
            ];
            $responseCall = $this->listOrdersModel->deleteOrder($username, $header, $dataCallApiApproveOrder);
            if ($responseCall->code == 200) {
                setcookie("__createOrder", 'success^_^delete^_^' . $responseCall->message, time() + (60 * 10), '/');
                $redirect = 0;
                if ($type == 1) {
                    $redirect = 1;
                }
                echo json_encode(array('success' => true, 'message' => 'true', 'redirect' => $redirect));
                die;
            } else {
                setcookie("__createOrder", 'false^_^delete^_^' . $responseCall->message, time() + (60 * 10), '/');
                $redirect = 0;
                if ($type == 1) {
                    $redirect = 1;
                }
                echo json_encode(array('success' => false, 'message' => 'false', 'status' => $responseCall->status, 'data' => $responseCall->data, 'redirect' => $redirect));
                die;
            }
        }
    }

    public function DeleteAllOrder()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $orderID = $post['orderID'];
            $countOrder = $post['countOrder'];

            $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
            $token = $dataUserAuthen->token;
            $username = $dataUserAuthen->username;

            $header = [
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization:' . $token
            ];
            if ($post['segment'] == 'cho-duyet' || $post['segment'] == 'huy') {
                if ($post['segment'] == 'cho-duyet') {
                    $groupStatus = 900;
                } else if ($post['segment'] == 'huy') {
                    $groupStatus = 924;
                }
                $dataCallApiApproveOrder = [
                    'orderCodes' => '',
                    'groupStatus' => $groupStatus
                ];
                $responseCall = $this->listOrdersModel->deleteAllOrder($username, $header, $dataCallApiApproveOrder);
                if ($responseCall->code == 200) {
                    setcookie("__createOrder", 'success^_^delete^_^' . $responseCall->message, time() + (60 * 10), '/');
                    echo json_encode(array('success' => true, 'message' => 'true'));
                    die;
                } else {
                    setcookie("__createOrder", 'false^_^delete^_^' . $responseCall->message, time() + (60 * 10), '/');
                    echo json_encode(array('success' => false, 'message' => 'false', 'status' => $responseCall->status, 'data' => $responseCall->data));
                    die;
                }
            } else {
                setcookie("__createOrder", 'false^_^delete^_^Trạng thái không được phép xóa đơn', time() + (60 * 10), '/');
                echo json_encode(array('success' => false, 'message' => 'false'));
                die;
            }
        }
    }

    public function exportExcel()
    {
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;
        $token = $dataUserAuthen->token;
        $username = $dataUserAuthen->username;
        $post =  $this->request->getPost();
        if (!empty($post)) {

            $searchKey = $post['searchKey'];
            $fromDate = $post['fromDate'];
            $toDate = $post['toDate'];
            $segment = $post['segment'];
            switch ($segment) {
                case 'cho-duyet':
                    $orderStatus = 900;
                    break;
                case 'cho-lay':
                    $orderStatus = 100;
                    break;
                case 'dang-giao':
                    $orderStatus = 500;
                    break;
                case 'cho-hoan':
                    $orderStatus = 505;
                    break;
                case 'lay-that-bai':
                    $orderStatus = 102;
                    break;
                case 'luu-kho':
                    $orderStatus = 200;
                    break;
                case 'giao-that-bai':
                    $orderStatus = 511;
                    break;
                case 'giao-thanh-cong':
                    $orderStatus = 501;
                    break;
                case 'dang-hoan':
                    $orderStatus = 502;
                    break;
                case 'hoan-that-bai':
                    $orderStatus = 905;
                    break;
                case 'da-hoan':
                    $orderStatus = 504;
                    break;
                case 'co-van-de':
                    $orderStatus = 2006;
                    break;
                case 'cho-huy':
                    $orderStatus = 901;
                    break;
                case 'huy':
                    $orderStatus = 924;
                    break;
                case 'sai-can-nang':
                    $orderStatus = 923;
                    break;
                case 'luu-nhap':
                    $orderStatus = 0;
                    break;
                default:
                    $orderStatus = '';
                    break;
            }

            $dataGetListOrder = array(
                "searchKey" => $searchKey,
                "fromDate" => $fromDate,
                "toDate" => $toDate,
                "orderStatus" => $orderStatus,
                "page" => '',
                "size" => PERPAGE,
                "orderBy" => "1",
                "exportExcel" => "1",
            );

            $headerGetListOrder = [
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization:' . $token,
            ];

            $reponseListDataOrders = $this->listOrdersModel->getListOrdersDetail($username, $headerGetListOrder, $dataGetListOrder);
            if ($reponseListDataOrders->status == 200) {
                $dataExcel = $reponseListDataOrders->data;
                $pickUpAddress = $dataUser->pickupAddress;
                if (!empty($dataExcel->data)) {
                    $fileTitle = 'Danh sách đơn hàng lỗi';
                    $fileName = $fileTitle . '.xlsx';
                    $spreadsheet = new Spreadsheet();
                    $sheet = $spreadsheet->getActiveSheet();
                    $rowsMerge = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'Q', 'R', 'S', 'AB', 'AC'];
                    foreach ($rowsMerge as $row_merge) {

                        $sheet->getStyle($row_merge . "3")
                            ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                        $sheet->getStyle($row_merge . "3")
                            ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

                        $sheet->getStyle($row_merge . "3")
                            ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $sheet->getStyle($row_merge . "3")
                            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                        $sheet->getStyle($row_merge . "3")
                            ->getAlignment()->setWrapText(true);

                        $sheet->getStyle($row_merge . "4")
                            ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                        $sheet->getStyle($row_merge . "4")
                            ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

                        $sheet->getStyle($row_merge . "4")
                            ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $sheet->getStyle($row_merge . "4")
                            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                        $sheet->getStyle($row_merge . "4")
                            ->getAlignment()->setWrapText(true);

                        $sheet->mergeCells($row_merge . "3:" . $row_merge . "4");
                        $sheet->getStyle($row_merge . "3")->getFont()->setSize(11);
                        $sheet->getStyle($row_merge . "3")->getFont()->setBold(true);
                        if ($row_merge == 'A') {
                            $sheet->getColumnDimension($row_merge)->setWidth(10);
                        } else {
                            $sheet->getColumnDimension($row_merge)->setWidth(20);
                        }
                    }
                    $sheet->setCellValue('A3', "STT");
                    $sheet->setCellValue('B3', "Mã đơn hàng");
                    $sheet->setCellValue('C3', "Mã đơn khách hàng");
                    $sheet->setCellValue('D3', "Gói cước ");
                    $sheet->setCellValue('E3', "Trạng thái");
                    $sheet->setCellValue('F3', "Ghi chú bưu tá");
                    $sheet->setCellValue('G3', "Ghi chú");

                    $sheet->mergeCells("H3:K3");
                    $sheet->setCellValue('H3', "Thông tin sản phẩm");

                    $sheet->setCellValue('H4', "Tên hàng hóa");
                    $sheet->setCellValue('I4', "Giá trị khai giá");
                    $sheet->setCellValue('J4', "Khối lượng dự kiến (gram)");
                    $sheet->setCellValue('K4', "Khối lượng thực tế (gram)");

                    $sheet->mergeCells("L3:P3");
                    $sheet->setCellValue('L3', "Thông tin phí");

                    $sheet->setCellValue('L4', "Phí vận chuyển");
                    $sheet->setCellValue('M4', "Phí thu hộ");
                    $sheet->setCellValue('N4', "Phí chuyển hoàn");
                    $sheet->setCellValue('O4', "Phí khai giá");
                    $sheet->setCellValue('P4', "Tổng phí");
                    $sheet->setCellValue('Q3', "COD");
                    $sheet->setCellValue('R3', "COD thực nhận");
                    $sheet->setCellValue('S3', "Ngày cập nhật");

                    $rowsMerge = ['T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'L', 'M', 'N', 'O', 'P', 'H', 'I', 'J', 'K'];
                    $sheet->mergeCells("T3:V3");
                    $sheet->setCellValue('T3', "Thông tin người gửi");
                    $sheet->mergeCells("W3:AA3");
                    $sheet->setCellValue('W3', "Thông tin người nhận");
                    foreach ($rowsMerge as $row_merge) {
                        $sheet->getStyle($row_merge . "3")
                            ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                        $sheet->getStyle($row_merge . "3")
                            ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $sheet->getStyle($row_merge . "3")
                            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);

                        $sheet->getStyle($row_merge . "4")
                            ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                        $sheet->getStyle($row_merge . "4")
                            ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $sheet->getStyle($row_merge . "4")
                            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);

                        $sheet->getStyle($row_merge . "3")->getFont()->setSize(11);
                        $sheet->getStyle($row_merge . "3")->getFont()->setBold(true);
                        $sheet->getStyle($row_merge . "4")->getFont()->setSize(11);
                        $sheet->getStyle($row_merge . "4")->getFont()->setBold(true);
                    }
                    $sheet->setCellValue('T4', "Họ tên");
                    $sheet->setCellValue('U4', "Số điện thoại");
                    $sheet->setCellValue('V4', "Địa chỉ");

                    $sheet->setCellValue('W4', "Họ tên");
                    $sheet->setCellValue('X4', "Số điện thoại");
                    $sheet->setCellValue('Y4', "Địa chỉ");
                    $sheet->setCellValue('Z4', "Quận/Huyện");
                    $sheet->setCellValue('AA4', "Tỉnh/Thành phố");
                    $sheet->setCellValue('AB3', "Ghi chú cuối");
                    $sheet->setCellValue('AC3', "Ngày tạo");

                    $j = 0;
                    $dataExportExcel = $dataExcel->data;
                    foreach ($dataExportExcel as $order) {

                        $dataPickupDefault = $this->singleOrderModel->getPickupAddress($dataUserAuthen, $order->shopAddressId);
                        $countLength = strlen($order->carrierOrderId);
                        $carrierOrder = $order->carrierOrderId;
                        if ($countLength > 14) {
                            $carrierOrderId = explode('.', $order->carrierOrderId);
                            $carrierOrder  = end($carrierOrderId);
                        }
                        $j++;

                        $sheet->setCellValue('A' . ($j + 4), $j);
                        $sheet->setCellValue('B' . ($j + 4), ' ' . $carrierOrder);
                        $sheet->setCellValue('C' . ($j + 4), ' ' . $order->shopOrderId);
                        $sheet->setCellValue('D' . ($j + 4), $order->packName);
                        $sheet->setCellValue('E' . ($j + 4), $order->statusMobile->name);
                        $sheet->setCellValue('F' . ($j + 4), $order->lastNote);
                        $sheet->setCellValue('G' . ($j + 4), $order->note);
                        $sheet->setCellValue('H' . ($j + 4), $order->productNameAll);
                        $sheet->setCellValue('I' . ($j + 4), $order->productValueAll ? ' ' . number_format($order->productValueAll) : 0);
                        $sheet->setCellValue('J' . ($j + 4), $order->weight ? ' ' . number_format($order->weight, 0, '', '.') : $order->weight);
                        $sheet->setCellValue('K' . ($j + 4), $order->weight ? ' ' . number_format($order->weight, 0, '', '.') : $order->weight);
                        $sheet->setCellValue('L' . ($j + 4), $order->transport_FEE ? ' ' . number_format($order->transport_FEE) : '');

                        $sheet->setCellValue('M' . ($j + 4), $order->cod_FEE ? ' ' . number_format($order->cod_FEE) : '');
                        $sheet->setCellValue('N' . ($j + 4), $order->refund_FEE ? ' ' . number_format($order->refund_FEE) : '');
                        $sheet->setCellValue('O' . ($j + 4), $order->insurance_FEE ? ' ' . number_format($order->insurance_FEE) : '');
                        $sheet->setCellValue('P' . ($j + 4), $order->totalDetailFee ? ' ' . number_format($order->totalDetailFee) : $order->totalDetailFee);
                        $sheet->setCellValue('Q' . ($j + 4), $order->expectCod ? ' ' . number_format($order->expectCod) : $order->expectCod);
                        $sheet->setCellValue('R' . ($j + 4), $order->realityCod ? ' ' . number_format($order->realityCod) : $order->realityCod);
                        $sheet->setCellValue('S' . ($j + 4), $order->utimestamp);
                        $sheet->setCellValue('T' . ($j + 4), $dataPickupDefault->senderName);
                        $sheet->setCellValue('U' . ($j + 4), $dataPickupDefault->phone);
                        // ? date("d/m/Y H:i:s ", strtotime($order->utimestamp)): ''

                        $sheet->setCellValue('V' . ($j + 4), $dataPickupDefault->address . '-' . $dataPickupDefault->wardName . '-' . $dataPickupDefault->districtName . '-' . $dataPickupDefault->provinceCode);
                        $sheet->setCellValue('W' . ($j + 4), $order->consignee);
                        $sheet->setCellValue('X' . ($j + 4), $order->phone);
                        $sheet->setCellValue('Y' . ($j + 4), $order->deliveryAddress . '-' . $order->deliveryWard);

                        $sheet->setCellValue('Z' . ($j + 4), $order->deliveryDistrict);
                        $sheet->setCellValue('AA' . ($j + 4), $order->deliveryProvince);
                        $sheet->setCellValue('AB' . ($j + 4), $order->lastNote);
                        $sheet->setCellValue('AC' . ($j + 4), $order->createAt);
                    }
                    $startJ = 5;
                    $endJ = $j + 4;

                    $styleArray = [
                        'alignment' => [
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                        ],
                        'wrapText' => [
                            'wrapText' => 'true',
                        ],
                        'borders' => [
                            'bottom' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            ],
                            'top' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            ],
                            'right' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            ],
                            'left' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            ],
                            'inside' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            ],
                        ],
                    ];
                    $spreadsheet->getActiveSheet()->getStyle("A" . $startJ . ":AC" . $endJ)->applyFromArray($styleArray);
                    $writer = new Xlsx($spreadsheet);
                    header('Content-Type: application/vnd.ms-excel');
                    header('Content-Disposition: attachment;filename="' . $fileName . '.xlsx"');
                    header('Cache-Control: max-age=0');
                    ob_start();
                    $writer->save('php://output');
                    $xlsData = ob_get_contents();
                    ob_end_clean();

                    $response = array(
                        'href' => base_url('/quan-ly-don-hang'),
                        'file' => "data:application/vnd.ms-excel;base64," . base64_encode($xlsData),
                        'status' => "1",
                    );
                    // print_r($response);
                    $this->logger->info('Kết thúc xuất EXCEL');
                    die(json_encode($response));
                } else {
                    $response = array(
                        'href' => base_url('/quan-ly-don-hang'),
                        'file' => "",
                        'status' => "0",
                    );
                    die(json_encode($response));
                }
            } else {
                $response = array(
                    'href' => base_url('/quan-ly-don-hang'),
                    'file' => "",
                    'status' => "0",
                );
                die(json_encode($response));
            }
        } else {
            $response = array(
                'href' => base_url('/quan-ly-don-hang'),
                'file' => "",
                'status' => "0",
            );
            die(json_encode($response));
        }
    }

    public function searchOrdersMulti()
    {
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $token = $dataUserAuthen->token;
        $username = $dataUserAuthen->username;
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;

        $get = $this->request->getGet();
        $order = '';
        $data = [];
        if (!empty($get)) {
            $order = $get['searchOrders'];
            $dataCallSearch = [
                "orderDetailCodes" => $order
            ];
            $header = [
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization:' . $token
            ];
            $responseSearchOrder = $this->listOrdersModel->getOrderSearch($username, $dataCallSearch, $header);
            if ($responseSearchOrder->status == 200) {
                $dataOrders = $responseSearchOrder->data;
            }
        }
        $title = 'Tra cứu hành trình đơn hàng';
        $data['order'] = $order;
        $data['title'] = $title;
        $data['dataDetailOrders'] = $dataOrders;
        $data['dataUser'] = $dataUser;
        $data['view'] = 'App\Modules\OrderManage\ListOrders\Views\consultOrders';
        return view('layoutShop/layout', $data);
    }
}

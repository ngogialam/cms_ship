<?php

namespace App\Modules\OrderManage\SingleOrder\Controllers;

use PhpParser\Node\Expr\PreInc;

class PostAjax extends BaseController
{
    public function saveProductItem()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            if ($post['deliveryPointIndex'] && $post['receiverIndex'] && $post['productIndex']) {
                if ($post['pickupAddressId'] == 0 || $post['pickupAddressId'] == null) {
                    $this->validation->setRules([
                        'pickName'               => [
                            'label' => 'Label.lbl_txtNamePickup',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'pickPhone'               => [
                            'label' => 'Label.phone',
                            'rules' => 'required|phoneValidate[' . $post['pickPhone'] . ']',
                            'errors' => [
                                'phoneValidate' => 'Validation.phoneValidate',
                            ]
                        ],
                        'pickAddress'               => [
                            'label' => 'Label.lbl_senderAddress',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'pickProvince'               => [
                            'label' => 'Label.lbl_orderWareHouseProvince',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'pickDistrict'               => [
                            'label' => 'Label.lbl_orderWareHouseDistrict',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'pickWard'               => [
                            'label' => 'Label.lbl_orderWareHouseWard',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'deliveryAddress'               => [
                            'label' => 'Label.lbl_deliveryAddress',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'deliveryPorvince'               => [
                            'label' => 'Label.lbl_orderWareHouseProvince',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'deliveryDistrict'               => [
                            'label' => 'Label.lbl_orderWareHouseDistrict',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'deliveryWard'               => [
                            'label' => 'Label.lbl_orderWareHouseWard',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'deliveryWard'               => [
                            'label' => 'Label.lbl_orderWareHouseWard',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'receiverPhone'               => [
                            'label' => 'Label.lbl_txtReceiverPhone',
                            'rules' => 'required|phoneValidate[' . $post['receiverPhone'] . ']',
                            'errors' => [
                                'phoneValidate' => 'Validation.phoneValidate',
                            ]
                        ],
                        'receiverName'               => [
                            'label' => 'Label.lbl_txtReceiverName',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'productName'               => [
                            'label' => 'Label.lbl_txtGoodName',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'productCOD'               => [
                            'label' => 'Label.lbl_txtCod',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'productValue'               => [
                            'label' => 'Label.lbl_txtGoodValue',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'productCate'               => [
                            'label' => 'Label.lbl_txtGoodType',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'productQuantity'               => [
                            'label' => 'Label.lbl_txtGoodQuantity',
                            'rules' => 'required',
                            'errors' => []
                        ],
                    ]);
                } else {
                    $this->validation->setRules([
                        'deliveryAddress'               => [
                            'label' => 'Label.lbl_deliveryAddress',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'deliveryPorvince'               => [
                            'label' => 'Label.lbl_orderWareHouseProvince',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'deliveryDistrict'               => [
                            'label' => 'Label.lbl_orderWareHouseDistrict',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'deliveryWard'               => [
                            'label' => 'Label.lbl_orderWareHouseWard',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'receiverPhone'               => [
                            'label' => 'Label.lbl_txtReceiverPhone',
                            'rules' => 'required|phoneValidate[' . $post['receiverPhone'] . ']',
                            'errors' => [
                                'phoneValidate' => 'Validation.phoneValidate',
                            ]
                        ],
                        'receiverName'               => [
                            'label' => 'Label.lbl_txtReceiverName',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'productName'               => [
                            'label' => 'Label.lbl_txtGoodName',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'productCOD'               => [
                            'label' => 'Label.lbl_txtCod',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'productValue'               => [
                            'label' => 'Label.lbl_txtGoodValue',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'productCate'               => [
                            'label' => 'Label.lbl_txtGoodType',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'productQuantity'               => [
                            'label' => 'Label.lbl_txtGoodQuantity',
                            'rules' => 'required',
                            'errors' => []
                        ],
                    ]);
                }

                if (!$this->validation->withRequest($this->request)->run()) {
                    $validationError = $this->validation->getErrors();
                    $resData = array(
                        'deliveryPointIndex' => $post['deliveryPointIndex'],
                        'receiverIndex' => $post['receiverIndex'],
                        'productIndex' => $post['productIndex'],
                        'validationError' => $validationError
                    );
                    echo json_encode(array('success' => false, 'resData' => json_encode($resData, JSON_UNESCAPED_UNICODE), 'redirect' => '0'));
                    die;
                } else {
                    if ($post['typeOrder'] == 1) {
                        $orderIdDraft = get_cookie('__orderEdit');
                    } else {
                        $orderIdDraft = get_cookie('__orderDraft');
                    }
                    //Get Product Category
                    $post['productCateName'] = $this->singleOrderModel->getProductCateName($post['productCate']);
                    if ($post['type'] == "addProduct") {
                        //Set index redis
                        $index = new \stdClass;
                        $index->deliveryPointIndex = $post['deliveryPointIndex'];
                        $index->deliveryPointIndexNext = $post['deliveryPointIndex'] + 1;
                        $index->receiverIndex = $post['receiverIndex'];
                        $index->receiverIndexNext = $post['receiverIndex'] + 1;
                        $index->productIndex = $post['productIndex'];
                        $index->productIndexNext = $post['productIndex'] + 1;

                        $dataOrders = $this->common->updateOrderRedis($orderIdDraft, $post, $index);

                        echo json_encode(array('success' => true, 'type' => 'addProduct', 'dataOrders' => json_encode($dataOrders, JSON_UNESCAPED_UNICODE), 'index' => json_encode($index, JSON_UNESCAPED_UNICODE), 'resData' => json_encode($post, JSON_UNESCAPED_UNICODE), 'redirect' => '0'));
                        die;
                    }
                    if ($post['type'] == "editProduct") {
                        //Set index redis
                        $index = new \stdClass;
                        $index->deliveryPointIndex = $post['deliveryPointIndex'];
                        $index->deliveryPointIndexNext = $post['deliveryPointIndex'] + 1;
                        $index->receiverIndex = $post['receiverIndex'];
                        $index->receiverIndexNext = $post['receiverIndex'] + 1;
                        $index->productIndex = $post['productIndex'];
                        $index->productIndexNext = $post['productIndexNext'];

                        $dataOrders = $this->common->updateOrderRedis($orderIdDraft, $post, $index);

                        echo json_encode(array('success' => true, 'type' => 'editProduct', 'dataOrders' => json_encode($dataOrders, JSON_UNESCAPED_UNICODE), 'index' => json_encode($index, JSON_UNESCAPED_UNICODE), 'resData' => json_encode($post, JSON_UNESCAPED_UNICODE), 'redirect' => '0'));
                        die;
                    }
                }
            } else {
                echo json_encode(array('success' => false, 'message' => 'False', 'redirect' => '0'));
                die;
            }
        } else {
            echo json_encode(array('success' => false, 'message' => 'False', 'redirect' => '0'));
            die;
        }
    }

    public function removeProduct()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            if ($post['typeOrder'] == 1) {
                $orderIdDraft = get_cookie('__orderEdit');
            } else {
                $orderIdDraft = get_cookie('__orderDraft');
            }
            $dataOrders = json_decode($this->redis->get($orderIdDraft));

            $point = $dataOrders->deliveryPoint[$post['deliveryPointIndex'] - 1];
            $receiver = $point->receivers[$post['receiverIndex'] - 1];
            $items = $receiver->items;

            //Xử lý
            unset($items[$post['productIndex'] - 1]);
            $items = $this->common->array_sort($items);
            foreach ($items as $key => $value) {
                $items[$key]->productIndex = $key + 1;
            }
            $receiver->productIndexNext = count($items) + 1;
            $receiver->items = $items;
            $this->redis->set($orderIdDraft, json_encode($dataOrders, JSON_UNESCAPED_UNICODE), TIME_ORDER_DRAFT);
            echo json_encode(array('success' => true, 'dataOrders' => json_encode($dataOrders, JSON_UNESCAPED_UNICODE), 'redirect' => '0'));
            die;
        }
    }

    public function removeReceiver()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            if ($post['typeOrder'] == 1) {
                $orderIdDraft = get_cookie('__orderEdit');
            } else {
                $orderIdDraft = get_cookie('__orderDraft');
            }
            $dataOrders = json_decode($this->redis->get($orderIdDraft));
            $point = $dataOrders->deliveryPoint[$post['deliveryPointIndex'] - 1];
            $receivers = $point->receivers;
            //Xử lý
            unset($receivers[$post['receiverIndex'] - 1]);
            $receivers = $this->common->array_sort($receivers);
            foreach ($receivers as $key => $value) {
                $receivers[$key]->receiverIndex = $key + 1;
            }
            if ($receivers == null) {
                //Set Items
                $items = array();
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
            }
            $point->receiverIndexNext = count($receivers) + 1;
            $point->receivers = $receivers;

            $this->redis->set($orderIdDraft, json_encode($dataOrders, JSON_UNESCAPED_UNICODE), TIME_ORDER_DRAFT);
            echo json_encode(array('success' => true, 'dataOrders' => json_encode($dataOrders, JSON_UNESCAPED_UNICODE), 'redirect' => '0'));
            die;
        }
    }

    public function saveReceiverItem()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            if ($post['deliveryPointIndex'] && $post['receiverIndex']) {
                if ($post['pickupAddressId'] == 0 || $post['pickupAddressId'] == null) {
                    $this->validation->setRules([
                        'pickName'               => [
                            'label' => 'Label.lbl_txtNamePickup',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'pickPhone'               => [
                            'label' => 'Label.phone',
                            'rules' => 'required|phoneValidate[' . $post['pickPhone'] . ']',
                            'errors' => [
                                'phoneValidate' => 'Validation.phoneValidate',
                            ]
                        ],
                        'pickAddress'               => [
                            'label' => 'Label.lbl_senderAddress',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'pickProvince'               => [
                            'label' => 'Label.lbl_orderWareHouseProvince',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'pickDistrict'               => [
                            'label' => 'Label.lbl_orderWareHouseDistrict',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'pickWard'               => [
                            'label' => 'Label.lbl_orderWareHouseWard',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'deliveryAddress'               => [
                            'label' => 'Label.lbl_deliveryAddress',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'deliveryPorvince'               => [
                            'label' => 'Label.lbl_orderWareHouseProvince',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'deliveryDistrict'               => [
                            'label' => 'Label.lbl_orderWareHouseDistrict',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'deliveryWard'               => [
                            'label' => 'Label.lbl_orderWareHouseWard',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'deliveryWard'               => [
                            'label' => 'Label.lbl_orderWareHouseWard',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'receiverPhone'               => [
                            'label' => 'Label.lbl_txtReceiverPhone',
                            'rules' => 'required|phoneValidate[' . $post['receiverPhone'] . ']',
                            'errors' => [
                                'phoneValidate' => 'Validation.phoneValidate',
                            ]
                        ],
                        'receiverName'               => [
                            'label' => 'Label.lbl_txtReceiverName',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'length'               => [
                            'label' => 'Label.lbl_txtLength',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'width'               => [
                            'label' => 'Label.lbl_txtWidth',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'height'               => [
                            'label' => 'Label.lbl_txtHeight',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'weight'               => [
                            'label' => 'Label.lbl_txtGoodWeight',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'requireNote'               => [
                            'label' => 'Label.lbl_txtNoteRequired',
                            'rules' => 'required',
                            'errors' => []
                        ]
                    ]);
                } else {
                    $this->validation->setRules([
                        'deliveryAddress'               => [
                            'label' => 'Label.lbl_deliveryAddress',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'deliveryPorvince'               => [
                            'label' => 'Label.lbl_orderWareHouseProvince',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'deliveryDistrict'               => [
                            'label' => 'Label.lbl_orderWareHouseDistrict',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'deliveryWard'               => [
                            'label' => 'Label.lbl_orderWareHouseWard',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'deliveryWard'               => [
                            'label' => 'Label.lbl_orderWareHouseWard',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'receiverPhone'               => [
                            'label' => 'Label.lbl_txtReceiverPhone',
                            'rules' => 'required|phoneValidate[' . $post['receiverPhone'] . ']',
                            'errors' => [
                                'phoneValidate' => 'Validation.phoneValidate',
                            ]
                        ],
                        'receiverName'               => [
                            'label' => 'Label.lbl_txtReceiverName',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'length'               => [
                            'label' => 'Label.lbl_txtLength',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'width'               => [
                            'label' => 'Label.lbl_txtWidth',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'height'               => [
                            'label' => 'Label.lbl_txtHeight',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'weight'               => [
                            'label' => 'Label.lbl_txtGoodWeight',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'requireNote'               => [
                            'label' => 'Label.lbl_txtNoteRequired',
                            'rules' => 'required',
                            'errors' => []
                        ]
                    ]);
                }
                if (!$this->validation->withRequest($this->request)->run()) {
                    $validationError = $this->validation->getErrors();
                    $resData = array(
                        'deliveryPointIndex' => $post['deliveryPointIndex'],
                        'receiverIndex' => $post['receiverIndex'],
                        'validationError' => $validationError
                    );
                    echo json_encode(array('success' => false, 'resData' => json_encode($resData, JSON_UNESCAPED_UNICODE), 'redirect' => '0'));
                    die;
                } else {
                    if ($post['typeOrder'] == 1) {
                        $orderIdDraft = get_cookie('__orderEdit');
                    } else {
                        $orderIdDraft = get_cookie('__orderDraft');
                    }
                    $dataOrders = json_decode($this->redis->get($orderIdDraft));
                    if ($post['type'] == "addReceiver") {
                        $points = $dataOrders->deliveryPoint;
                        $totalPoints = count($points);
                        //Set index redis
                        $index = new \stdClass;
                        $index->deliveryPointIndex = $post['deliveryPointIndex'];
                        $index->deliveryPointIndexNext = $totalPoints + 1;
                        $index->receiverIndex = $post['receiverIndex'];
                        $index->receiverIndexNext = $post['receiverIndex'] + 1;
                        $index->productIndexNext = $post['productIndexNext'];

                        // $size = explode("-",$post['size']);
                        // $post['length'] = trim($size['0']);
                        // $post['width'] = trim($size['1']);
                        // $post['height'] = trim($size['2']);
                        //Get Require Note
                        $post['requireNoteName'] = $this->singleOrderModel->getRequireNoteName($post['requireNote']);
                        // if ($post['isRefund'] == 0) {
                            $deliveryPointIndex = $post['deliveryPointIndex'];
                            $receiverIndex = $post['receiverIndex'];
                            // echo '<pre>';
                            // print_r($post);
                            // print_r($dataOrders);
                            // $items = $dataOrders->deliveryPoint[$deliveryPointIndex - 1]->receivers[$receiverIndex - 1]->items;
                            // $checkRefund = 0;

                            // $classPoint = '';
                            // foreach ($items as $item) {
                            //     if ($item->productCOD != 0) {
                            //         $checkRefund = 1;
                            //     }
                            // }
                            // // echo $classPoint;die;
                            // if ($checkRefund == 1) {
                            //     echo json_encode(array('success' => false, 'classCheckRefund' => true,  'redirect' => '0'));
                            //     die;
                            // }
                        // }
                        
                        $items = $dataOrders->deliveryPoint[$deliveryPointIndex - 1]->receivers[$receiverIndex - 1]->items;
                        $dataUserAuthen = json_decode($this->redis->get($this->krd));
                        $token = $dataUserAuthen->token;
                        $username = $dataUserAuthen->username;
                        $headers = [
                            'Accept: application/json',
                            'Content-Type: application/json',
                            'Authorization:' . $token
                        ];
                        $itemProducts = [];
                        if (!empty($items)) {
                            foreach ($items as $key => $itemProduct) {
                                $productDetail = new \stdClass;
                                $productDetail->productName = $itemProduct->productName;
                                $productDetail->cod = $itemProduct->productCOD;
                                $productDetail->productValue = $itemProduct->productValue;
                                $productDetail->quantity = $itemProduct->productQuantity;
                                $productDetail->category = $itemProduct->productCate;
                                //Set Items Detail
                                $itemProducts[$key] = $productDetail;
                            }
                        }
                        $dataCheckCodValue = [
                            'items' => $itemProducts
                        ];
                        $resultCheckCod = $this->singleOrderModel->checkCodValue($headers, $dataCheckCodValue, $username);
                        if($resultCheckCod->status == 200 && $resultCheckCod->data->valid == false){
                            echo json_encode(array('success' => false, 'data' => $resultCheckCod->data->message, 'redirect' => 0, 'status' => 1));die;
                        }

                        $dataOrders = $this->common->updateOrderRedis($orderIdDraft, $post, $index);
                        $index->productIndex = 1;

                        echo json_encode(array('success' => true, 'type' => 'addReceiver', 'dataOrders' => json_encode($dataOrders, JSON_UNESCAPED_UNICODE), 'index' => json_encode($index, JSON_UNESCAPED_UNICODE), 'resData' => json_encode($post, JSON_UNESCAPED_UNICODE), 'redirect' => '0'));
                        die;
                    }
                    if ($post['type'] == "editReceiver") {
                        //Set index redis
                        $index = new \stdClass;
                        $index->deliveryPointIndex = $post['deliveryPointIndex'];
                        $index->receiverIndex = $post['receiverIndex'];

                        $point = $dataOrders->deliveryPoint[$post['deliveryPointIndex'] - 1];
                        $receivers = $point->receivers;
                        $receiver = $point->receivers[$post['receiverIndex'] - 1];
                        $items = $receiver->items;

                        $index->receiverIndexNext = count($receivers) + 1;
                        $index->productIndexNext = count($items) + 1;

                        // $size = explode("-",$post['size']);
                        // $post['length'] = trim($size['0']);
                        // $post['width'] = trim($size['1']);
                        // $post['height'] = trim($size['2']);
                        //Get Require Note
                        $post['requireNoteName'] = $this->singleOrderModel->getRequireNoteName($post['requireNote']);
                        // if ($post['isRefund'] == 0) {
                        //     $deliveryPointIndex = $post['deliveryPointIndex'];
                        //     $receiverIndex = $post['receiverIndex'];
                        //     // echo '<pre>';
                        //     // print_r($post);
                        //     // print_r($dataOrders);
                        //     $items = $dataOrders->deliveryPoint[$deliveryPointIndex - 1]->receivers[$receiverIndex - 1]->items;
                        //     $checkRefund = 0;

                        //     $classPoint = '';
                        //     foreach ($items as $item) {
                        //         if ($item->productCOD != 0) {
                        //             $checkRefund = 1;
                        //         }
                        //     }
                        //     // echo $classPoint;die;
                        //     if ($checkRefund == 1) {
                        //         echo json_encode(array('success' => false, 'classCheckRefund' => true,  'redirect' => '0'));
                        //         die;
                        //     }
                        // }
                        $deliveryPointIndex = $post['deliveryPointIndex'];
                        $receiverIndex = $post['receiverIndex'];
                        $items = $dataOrders->deliveryPoint[$deliveryPointIndex - 1]->receivers[$receiverIndex - 1]->items;
                        $dataUserAuthen = json_decode($this->redis->get($this->krd));
                        $token = $dataUserAuthen->token;
                        $username = $dataUserAuthen->username;
                        $headers = [
                            'Accept: application/json',
                            'Content-Type: application/json',
                            'Authorization:' . $token
                        ];
                        $itemProducts = [];
                        if (!empty($items)) {
                            foreach ($items as $key => $itemProduct) {
                                $productDetail = new \stdClass;
                                $productDetail->productName = $itemProduct->productName;
                                $productDetail->cod = $itemProduct->productCOD;
                                $productDetail->productValue = $itemProduct->productValue;
                                $productDetail->quantity = $itemProduct->productQuantity;
                                $productDetail->category = $itemProduct->productCate;
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
                        $dataOrders = $this->common->updateOrderRedis($orderIdDraft, $post, $index);
                        $index->productIndex = 1;
                        echo json_encode(array('success' => true, 'type' => 'editReceiver', 'dataOrders' => json_encode($dataOrders, JSON_UNESCAPED_UNICODE), 'index' => json_encode($index, JSON_UNESCAPED_UNICODE), 'resData' => json_encode($post, JSON_UNESCAPED_UNICODE), 'redirect' => '0'));
                        die;
                    }
                }
            }
        }
    }

    public function getReceiverItem()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            if ($post['typeOrder'] == 1) {
                $orderIdDraft = get_cookie('__orderEdit');
            } else {
                $orderIdDraft = get_cookie('__orderDraft');
            }
            $dataOrders = json_decode($this->redis->get($orderIdDraft));
            $index = $dataOrders->index;

            if ($dataOrders->index != '') {
                $point = $dataOrders->deliveryPoint[$post['deliveryPointIndex'] - 1];

                $receivers = $point->receivers[$post['receiverIndex'] - 1];
                $items = $receivers->items;
                $index->productIndexNext = count($items) + 1;
                $dataOrders->index = $index;
            }

            $this->redis->set($orderIdDraft, json_encode($dataOrders, JSON_UNESCAPED_UNICODE), TIME_ORDER_DRAFT);

            echo json_encode(array('success' => true, 'type' => 'editProduct', 'dataOrders' => json_encode($dataOrders, JSON_UNESCAPED_UNICODE), 'redirect' => '0'));
            die;
        }
    }

    public function addPoint()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $dataProvinces = $this->singleOrderModel->getProvince();
            $arrProductCategory = json_decode($this->redis->get('productCategory'));
            $deliveryPointIndex = $post['deliveryPointIndex'];
            $receiverIndex = 1;
            $productIndex = 1;
            //html view
            $html = '<div id="point_' . $deliveryPointIndex . '">';
            $html .= '<div class="or-dgh-1 pb-3 w-100" style="margin-left: -40px;">';
            $html .= '<span class="or-dh-stt" style="background-color: #2DB1DB;">' . $deliveryPointIndex . '</span>' . lang('Label.lbl_orderReceiver');
            $html .= '<span class="removeDeliveryPoint mr-2 removeDeliveryPoint_' . $deliveryPointIndex . '" onclick="removeDeliveryPointConfirm(' . $deliveryPointIndex . ')" > ' . lang('Label.lbl_removeDeliveryPoint') . '<img class="pl-1" src="' . base_url('public/images/delete.svg') . '"' . '</span>';

            $html .= '</div>';
            $html .= '<div class="or-ttdh row pb-0">';
            $html .= '<div class="row col-12 address-order-responsive">';
            $html .= '<ul class="or-dgh col-xl-6 mb-0">';
            $html .= '<li class="or-dgh-2">';
            $html .= '<!-- Địa chỉ người nhận -->';
            $html .= '<input name="pointAddress" onkeyup="keyUpAddress(' . $deliveryPointIndex . ')" autocomplete="off" type="text" class="pointAddress address address_' . $deliveryPointIndex . '" onblur="addAddressDetail(' . $deliveryPointIndex . ')" deliverypointindex="' . $deliveryPointIndex . '" value="" placeholder="' . lang('Label.lbl_orderAddressReceiver') . '">';
            $html .= '<span class=" err_messages err_address err_address_' . $deliveryPointIndex . '"></span>';
            $html .= '<div class="dropdown-menu suggestAddress suggestAddress-' . $deliveryPointIndex . '" >';
            $html .= '</div>';
            $html .= '<input type="hidden" class="suggestionAddressDetail-' . $deliveryPointIndex . '" value="" />';

            $html .= '</li>';

            $html .= '</ul>';
            $html .= '<!-- Change Province -->';
            $html .= '<ul class="col-xl-6 ml-0 row orDetail-input orDetail-appen-responsive orderDetail-chosen pr-0 orderDetail_' . $deliveryPointIndex . ' address_v2" style="padding-top: 15px; margin-bottom: 0px;">';
            $html .= '<!-- Receiver province -->';
            $html .= '<li class="col-md-4 mb-2 pr-0 provinceReceiver_' . $deliveryPointIndex . '">';
            $html .= '<select name="pointProvice" auto_change="1" index_prov="' . $deliveryPointIndex . '" id="provinceReceiver_' . $deliveryPointIndex . '" class="form-control provinceReceiverChange_' . $deliveryPointIndex . ' frm-lg chosen-select order_province_code_from">';
            $html .= '<option value="0">' . lang('Label.lbl_orderWareHouseProvince') . '</option>';
            foreach ($dataProvinces as $province) {
                $html .= '<option value="' . $province['code'] . '">' . $province['name'] . '</option>';
            }
            $html .= '</select>';
            $html .= '<input type="hidden" class="province_find_pro_' . $deliveryPointIndex . '">';
            $html .= '<input type="hidden" class="district_find_pro_' . $deliveryPointIndex . '">';
            $html .= '<input type="hidden" class="wards_find_pro_' . $deliveryPointIndex . '">';
            $html .= '<span class=" err_messages err_province_' . $deliveryPointIndex . '"></span>';
            $html .= '</li>';
            $html .= '<!-- Receiver district -->';
            $html .= '<li class="col-md-4 mb-2 pr-0 districtReceiver_' . $deliveryPointIndex . '">';
            $html .= '<select name="pointDistrict" auto_change="1" index_dict="' . $deliveryPointIndex . '" placeholder="" id="districtReceiver_' . $deliveryPointIndex . '" class="form-control districtChangeReceiver_' . $deliveryPointIndex . ' frm-lg chosen-select order_district_code_from">';
            $html .= '<option value="0">' . lang('Label.lbl_orderWareHouseDistrict') . '</option>';
            $html .= '</select>';
            $html .= '<span class=" err_messages err_district_' . $deliveryPointIndex . '"></span>';
            $html .= '</li>';
            $html .= '<!-- Receiver ward -->';
            $html .= '<li class="col-md-4 mb-2 pr-0 wardReceiver_' . $deliveryPointIndex . '">';
            $html .= '<select name="pointWard" auto_change="1" index_ward="' . $deliveryPointIndex . '" placeholder="" id="wardReceiver_' . $deliveryPointIndex . '" class="form-control wardChangeReceiver_' . $deliveryPointIndex . ' frm-lg chosen-select order_ward_code_from">';
            $html .= '<option value="0">' . lang('Label.lbl_orderWareHouseWard') . '</option>';
            $html .= '</select>';
            $html .= '<span class=" err_messages err_ward_' . $deliveryPointIndex . '"></span>';
            $html .= '</li>';
            $html .= '<span style="margin-left:10px;" class=" err_messages errAddressDetail_' . $deliveryPointIndex . '"></span>';

            $html .= '</ul>';
            $html .= '</div>';
            $html .= '<!-- End Address Points -->';
            $html .= '<!-- After click hoàn thành ( filter order detail) -->';
            $html .= '<div class="or-ttng receiverInfo row w100 afOrder_' . $deliveryPointIndex . '" style="display: none">';
            $html .= '</div>';
            $html .= '<!-- End click hoàn thành -->';
            $html .= '<div class="btn-add-orders pl-0">';
            $html .= '<button type="button" onclick="addReceiver(' . $deliveryPointIndex . ', ' . $receiverIndex . ')" class="or-tctdn-btn dpn addReceiver addReceiver_' . $deliveryPointIndex . '">';
            $html .= '<img src="' . base_url('public/images/tdg2.png') . '" alt="" class="float-left pl-2">' . lang('Label.lbl_addOrderDetail');
            $html .= '</button>';
            $html .= '</div>';
            $html .= '<!-- Order info -->';
            $html .= '<div class="or-ttng row pb-0 w100 pt-0 form_receiverOrder_' . $deliveryPointIndex . ' receiverOrder_' . $deliveryPointIndex . '_' . $receiverIndex . '">';
            $html .= '<div class="chinhsua1">';
            $html .= '<!-- ========HIỂN THỊ KHI CLICK VÀO SỬA ĐƠN HÀNG ========= -->';
            $html .= '<div id="orders" class="or-ttdh row qo-ttdhl pb-0 receiver_' . $deliveryPointIndex . '_' . $receiverIndex . '">';
            $html .= '<ul class="or-dgh col-12 ">';
            $html .= '<li class="or-dgh-1 pt-0 mt-0">';
            $html .= '<span class="or-dh-stt form_receiverIndex" style="background: #F0A616;">' . $receiverIndex . '</span>';
            $html .= '<span class="text_receiverIndex_' . $receiverIndex . '" style="color: #68656D;">' . lang('Label.lbl_addNewOrderProduct') . '</span>';
            $html .= '</li>';
            $html .= '<li class="or-ttnh">';
            $html .= '<ul><li class="or-ttnh-tt">' . lang('Label.lbl_txtReceiverInfo') . '</li></ul>';
            $html .= '<ul class="row w-100">';
            $html .= '<li class="col-md-3 col-sm-6 or-cgc-1">' . lang('Label.lbl_txtReceiverPhone') . '<span style="color: #885DE5;"> *</span> <br>';
            $html .= '<!-- receiver phone -->';
            $html .= '<input name="receiverPhone" value="" onblur="ValidateReceiverPhone(' . $deliveryPointIndex . ', ' . $receiverIndex . ')" type="text" class="receiverPhone receiverPhone_' . $deliveryPointIndex . '_' . $receiverIndex . '" onkeypress="return isNumber(event)" placeholder="' . lang('Label.ph_phone') . '"><br>';
            $html .= '<span class="err_messages err_receiverPhone err_receiverPhone_' . $deliveryPointIndex . '_' . $receiverIndex . '"></span>';
            $html .= '</li>';
            $html .= '<li class="col-md-3 col-sm-6 or-cgc-1">' . lang('Label.lbl_txtReceiverName') . '<span style="color: #885DE5;"> *</span> <br>';
            $html .= '<!-- receiver name -->';
            $html .= '<input name="receiverName" value="" onblur="ValidateReceiverName(' . $deliveryPointIndex . ', ' . $receiverIndex . ')" class="receiverName unNumber receiverName_' . $deliveryPointIndex . '_' . $receiverIndex . '" type="text" placeholder="' . lang('Label.lbl_txtReceiverName') . '"><br>';
            $html .= '<span class="err_messages err_receiverName err_receiverName_' . $deliveryPointIndex . '_' . $receiverIndex . '"></span>';
            $html .= '</li>';
            $html .= '<li class="col-md-3 col-sm-6 or-cgc-1">' . lang('Label.lbl_txtReceiverDate') . '<br>';
            $html .= '<!-- expectDate -->';
            $html .= '<input name="receiverExpectDate" type="text" value="" class="orderdatePicker expectDate expectDate_' . $deliveryPointIndex . '_' . $receiverIndex . '" style="padding-right: 10px;">';
            $html .= '</li>';
            $html .= '<li class="col-md-3 col-sm-6 or-cgc-1">' . lang('Label.lbl_txtReceiverTime') . '<br>';
            $html .= '<!-- expectTime -->';
            $html .= '<input name="receiverExpectTime" value="" type="time" class="or-ttnh-input expectTime expectTime_' . $deliveryPointIndex . '_' . $receiverIndex . '">';
            $html .= '</li>';
            $html .= '</ul>';
            $html .= '</li>';
            $html .= '<!-- Thông tin hàng hóa -->';
            $html .= '<li class="or-ttnh">';
            $html .= '<ul><li class="or-ttnh-tt">' . lang('Label.lbl_txtGoodInfo') . '</li></ul>';
            $html .= '<!-- Nếu có thêm mới hàng hóa thì phần này sẽ đươc hiện -->';
            $html .= '<div style="width: 100%;" class="ttsp productSuccess productSuccess_' . $deliveryPointIndex . '_' . $receiverIndex . '" id="ttsp_' . $deliveryPointIndex . '_' . $receiverIndex . '"></div>';
            $html .= '<!-- END hàng hóa -->';
            $html .= '<div class="btn-add-orders 4">';
            $html .= '<button type="button" onclick="addProduct(' . $deliveryPointIndex . ', ' . $receiverIndex . ')"';
            $html .= 'class="or-tctdn-btn addProduct addProduct_' . $deliveryPointIndex . '_' . $receiverIndex . ' dpn">';
            $html .= '<img src="' . base_url('public/images/tdg2.png') . '" alt="" class="float-left pl-2">' . lang('Label.lbl_addNewOrderProduct');
            $html .= '</button>';
            $html .= '</div>';
            $html .= '<div class="product_form product_form_' . $deliveryPointIndex . '_' . $receiverIndex . '">';
            $html .= '<ul class="row w-100">';
            $html .= '<!-- product name -->';
            $html .= '<li class="col-md-6 col-sm-12">' . lang('Label.lbl_txtGoodName') . '<span style="color: #885DE5;">*</span> <br>';
            $html .= '<input name="productName" vallue="" onblur="ValidateProductName(' . $deliveryPointIndex . ', ' . $receiverIndex . ', ' . $productIndex . ')" class="productName_' . $deliveryPointIndex . '_' . $receiverIndex . ' productName_' . $deliveryPointIndex . '_' . $receiverIndex . '_' . $productIndex . '" type="text" placeholder="' . lang('Label.lbl_inputGoodName') . '" id="qo-tensp-ht">';
            $html .= '<span class="err_messages err_productName_' . $deliveryPointIndex . '_' . $receiverIndex . ' err_productName_' . $deliveryPointIndex . '_' . $receiverIndex . '_' . $productIndex . '"></span>';
            $html .= '</li>';
            $html .= '<!-- product COD -->';
            $html .= '<li class="col-md-3 col-sm-6">' . lang('Label.lbl_txtCod') . '<span style="color: #885DE5;">*</span> <br>';
            $onclick = "number_format('productCOD_" . $deliveryPointIndex . "_" . $receiverIndex . "_" . $productIndex . "', 1)";
            $html .= '<input name="productCOD" value="0" onblur="ValidateProductCOD(' . $deliveryPointIndex . ', ' . $receiverIndex . ', ' . $productIndex . ')" onkeyup="' . $onclick . '" onkeypress="return isNumber(event)" type="text" class="or-cod productCOD_' . $deliveryPointIndex . '_' . $receiverIndex . ' productCOD_' . $deliveryPointIndex . '_' . $receiverIndex . '_' . $productIndex . '" id="qo-cod-ht" style="color:#F0A616!important"><span style="margin-left: -34px;"> đ</span>';
            $html .= '<p class="err_messages err_productCOD_' . $deliveryPointIndex . '_' . $receiverIndex . ' err_productCOD_' . $deliveryPointIndex . '_' . $receiverIndex . '_' . $productIndex . '"></p>';
            $html .= '</li>';
            $html .= '<!-- product value -->';
            $html .= '<li class="col-md-3 col-sm-6 or-cgc-1">';
            $html .= '<label class="m-0"> <input name="checkProductValue" value="1" checked type="checkbox" class="frm-check regular-checkbox mb-0 checkProductValue_' . $deliveryPointIndex . '_' . $receiverIndex . ' checkProductValue_' . $deliveryPointIndex . '_' . $receiverIndex . '_' . $productIndex . '" style="width: 10px;height: 10px;"> <span>' . lang('Label.lbl_txtGoodValue') . '</span><span style="color: #885DE5;"> *</span></label> <br>';
            $onclick = "number_format('productValue_" . $deliveryPointIndex . "_" . $receiverIndex . "_" . $productIndex . "', 1)";
            $html .= '<input name="productValue" value="0" onblur="ValidateProductValue(' . $deliveryPointIndex . ', ' . $receiverIndex . ', ' . $productIndex . ')" onkeyup="' . $onclick . '" type="text" onkeypress="return isNumber(event)" onkeypress="return isNumber(event)" class="or-ttnh-input or-gtkg productValue_' . $deliveryPointIndex . '_' . $receiverIndex . ' productValue_' . $deliveryPointIndex . '_' . $receiverIndex . '_' . $productIndex . '" id="qo-khaigia-ht" style="color:#885DE5!important"><span style="margin-left: -34px"> đ</span><br>';
            $html .= '<span class="err_messages err_productValue_' . $deliveryPointIndex . '_' . $receiverIndex . ' err_productValue_' . $deliveryPointIndex . '_' . $receiverIndex . '_' . $productIndex . '"></span>';
            $html .= '</li>';
            $html .= '</ul>';
            $html .= '<ul class="row w-100">';
            $html .= '<!-- product category -->';
            $html .= '<li class="col-md-6 col-sm-12 lastProductInput">' . lang('Label.lbl_txtGoodType') . '<span style="color: #885DE5;">*</span> <br>';
            $html .= '<select name="productCategory" style="padding-right: 10px;" placeholder="' . lang('Label.lbl_txtCategory') . '" id="productCategory_' . $deliveryPointIndex . '_' . $receiverIndex . '_' . $productIndex . '" class="chosen-select productCategory productCategory_' . $deliveryPointIndex . '_' . $receiverIndex . ' productCategory_' . $deliveryPointIndex . '_' . $receiverIndex . '_' . $productIndex . '" onkeypress="return isNumber(event)" onchange="ValidateProductCate(' . $deliveryPointIndex . ', ' . $receiverIndex . ', ' . $productIndex . ')">';
            $html .= '<option value="0">' . lang('Label.lbl_txtCategory') . '</option>';
            foreach ($arrProductCategory as $key => $value) {
                $html .= '<option value="' . $key . '">' . $value . '</option>';
            }
            $html .= '</select><br>';
            $html .= '<span class="err_messages err_productCategory_' . $deliveryPointIndex . '_' . $receiverIndex . ' err_productCategory_' . $deliveryPointIndex . '_' . $receiverIndex . '_' . $productIndex . '"></span>';
            $html .= '</li>';
            $html .= '<!-- product quantity -->';
            $html .= '<li class="col-md-3 col-sm-6 lastProductInput">' . lang('Label.lbl_txtGoodQuantity') . '<span style="color: #885DE5;"> *</span> <br>';
            $html .= '<input name="productQuantity" value="1" onblur="ValidateProductQuantity(' . $deliveryPointIndex . ', ' . $receiverIndex . ', ' . $productIndex . ')" onkeypress="return isNumber(event)" style="padding-right: 10px;" id="qo-soluong-ht" class="productQuantity_' . $deliveryPointIndex . '_' . $receiverIndex . ' productQuantity_' . $deliveryPointIndex . '_' . $receiverIndex . '_' . $productIndex . '"><br>';
            $html .= '<span class="err_messages err_productQuantity_' . $deliveryPointIndex . '_' . $receiverIndex . ' err_productQuantity_' . $deliveryPointIndex . '_' . $receiverIndex . '_' . $productIndex . '"></span>';
            $html .= '</li>';
            $html .= '<!-- btn save -->';
            $html .= '<li class="col-md-3 col-sm-6 lastProductInput"><br>';
            $html .= '<input type="hidden" class="productIndexNext_' . $deliveryPointIndex . '_' . $receiverIndex . '" name="" value="">';
            if ($post['typeOrder'] == 1) {
                $html .= '<button type="button" class="or-lhh-btn saveProduct_' . $deliveryPointIndex . '_' . $receiverIndex . '_' . $productIndex . '" onclick="saveProduct(' . $deliveryPointIndex . ', ' . $receiverIndex . ', ' . $productIndex . ', \'addProduct\')" id="qo-btn-thh-1-1-2">' . lang('Label.lbl_txtGoodSave') . '</button>';
            } else {
                $html .= '<button type="button" class="or-lhh-btn saveProduct_' . $deliveryPointIndex . '_' . $receiverIndex . '_' . $productIndex . '" onclick="saveProduct(' . $deliveryPointIndex . ', ' . $receiverIndex . ', ' . $productIndex . ', \'addProduct\')" id="qo-btn-thh-1-1-2">' . lang('Label.lbl_txtGoodSave') . '</button>';
            }
            $html .= '</li>';
            $html .= '</ul>';
            $html .= '</div>';
            $html .= '</li>';
            $html .= '</ul>';
            $html .= '<ul class="col-12"><li class="or-dvht">' . lang('Label.lbl_txtSupportServices') . '</li></ul>';
            $html .= '<ul class="col-xl-3 col-sm-6 or-ctdh-1 pr-xl-0">';
            $html .= '<li>' . lang('Label.lbl_txtGoodSize') . '<span style="color: #885DE5;"> *</span><br>';
            $html .= '<div class="col-md-4 col-sm-4 input_size">';
            $html .= '<input name="length" value="10" type="text" placeholder="' . lang('Label.lbl_txtLength1') . '" onkeypress="return isNumber(event)" class="length length_' . $deliveryPointIndex . '_' . $receiverIndex . '" onblur="ValidateLength(' . $deliveryPointIndex . ', ' . $receiverIndex . ')"><span style="margin-left: -34px;">Cm</span>';
            $html .= '</div>';
            $html .= '<div class="col-md-4 col-sm-4 input_size">';
            $html .= '<input name="width" value="10" type="text" placeholder="' . lang('Label.lbl_txtWidth1') . '" onkeypress="return isNumber(event)" class="width width_' . $deliveryPointIndex . '_' . $receiverIndex . '" onblur="ValidateWidth(' . $deliveryPointIndex . ', ' . $receiverIndex . ')"><span style="margin-left: -34px;">Cm</span>';
            $html .= '</div>';
            $html .= '<div class="col-md-4 col-sm-4 input_size">';
            $html .= '<input name="height" value="10" type="text" placeholder="' . lang('Label.lbl_txtHeight1') . '" onkeypress="return isNumber(event)" class="height height_' . $deliveryPointIndex . '_' . $receiverIndex . '" onblur="ValidateHeight(' . $deliveryPointIndex . ', ' . $receiverIndex . ')"><span style="margin-left: -34px;">Cm</span>';
            $html .= '</div>';
            $html .= '<br><span class="err_messages err_size err_size_' . $deliveryPointIndex . '_' . $receiverIndex . '"> </span>';
            $html .= '</li>';
            $html .= '</ul>';
            $html .= '<!-- weight -->';
            $html .= '<ul class="col-xl-3 col-sm-6 or-ctdh-1 pr-xl-0">';
            $html .= '<li>' . lang('Label.lbl_txtGoodWeight') . '<span style="color: #885DE5;"> *</span><br>';
            $onclick = "number_format('weight_" . $deliveryPointIndex . "_" . $receiverIndex . "',2)";
            $html .= '<input value="0" name="weight" type="text" class="weight weight_' . $deliveryPointIndex . '_' . $receiverIndex . '" onblur="ValidateWeight(' . $deliveryPointIndex . ', ' . $receiverIndex . ')" onkeypress="return isNumber(event)" onkeyup="' . $onclick . '"><span style="margin-left: -50px;">Gram</span><br>';
            $html .= '<span class="err_messages err_weight err_weight_' . $deliveryPointIndex . '_' . $receiverIndex . '"> </span>';
            $html .= '</li>';
            $html .= '</ul>';
            $html .= '<!-- note -->';
            $html .= '<ul class="col-xl-6 col-sm-12 or-ctdh-1">';
            $html .= '<li style="padding-bottom:20px">' . lang('Label.lbl_txtExtraNote') . '<br>';
            $html .= '<input name="note" value="" type="text" class="or-ttnh-input1 note note_' . $deliveryPointIndex . '_' . $receiverIndex . '">';
            $html .= '</ul>';
            $html .= '<!-- isFree -->';
            $html .= '<ul class="col-xl-2 col-sm-3 or-ctdh-1">';
            $html .= '<li class="or-cgc-1">' . lang('Label.lbl_txtPayerFee') . '<span style="color: #885DE5;"> *</span><br>';
            $html .= '<input type="radio" name="isFree' . $deliveryPointIndex . '_' . $receiverIndex . '" class="or-radio-checked isFreeYes isFreeYes_' . $deliveryPointIndex . '_' . $receiverIndex . '" id="orNtc' . $deliveryPointIndex . '_' . $receiverIndex . '" value="1" checked="checked"><label for="orNtc' . $deliveryPointIndex . '_' . $receiverIndex . '">' . lang('Label.lbl_txtPayerFeeSender') . '</label><br>';
            $html .= '<input type="radio" value="2" name="isFree' . $deliveryPointIndex . '_' . $receiverIndex . '" class="or-radio-checked isFreeNo isFreeNo_' . $deliveryPointIndex . '_' . $receiverIndex . '" id="orNtc' . $deliveryPointIndex . '_' . $receiverIndex . 'a"><label for="orNtc' . $deliveryPointIndex . '_' . $receiverIndex . 'a">' . lang('Label.lbl_txtPayerFeeReceiver') . '</label>';
            $html .= '</li>';
            $html .= '</ul>';
            $html .= '<!-- partialDelivery -->';
            // $html .= '<ul class="col-xl-2 col-sm-3 or-ctdh-1">';
            //     $html .= '<li class="or-cgc-1">'.lang('Label.lbl_txtPartialDelivery').'<span style="color: #885DE5;"> *</span><br>';
            //         $html .= '<input type="radio" value="1" name="partialDelivery" class="or-radio-checked partialDeliveryYes partialDeliveryYes_'.$deliveryPointIndex.'_'.$receiverIndex.'" id="gh1p1"><label for="gh1p1">'.lang('Label.lbl_txtPartialDeliveryYes').'</label><br>';
            //         $html .= '<input type="radio" value="0" name="partialDelivery" class="or-radio-checked partialDeliveryNo partialDeliveryNo_'.$deliveryPointIndex.'_'.$receiverIndex.'" id="gh1p1a" checked="checked"><label for="gh1p1a">'.lang('Label.lbl_txtPartialDeliveryNo').'</label>';
            //     $html .= '</li>';
            // $html .= '</ul>';
            $html .= '<!-- isRefund -->';
            $html .= '<ul class="col-xl-2 col-sm-3 or-ctdh-1">';
            $html .= '<li class="or-cgc-1">' . lang('Label.lbl_txtIsReturn') . '<br>';
            $html .= '<input type="radio" value="1" keyPoint="' . $deliveryPointIndex . '_1" name="isRefund' . $deliveryPointIndex . '_' . $receiverIndex . '" class="or-radio-checked isRefundKm isRefund isRefundYes isRefundYes_' . $deliveryPointIndex . ' isRefundYes_' . $deliveryPointIndex . '_' . $receiverIndex . '" id="dvch' . $deliveryPointIndex . '_' . $receiverIndex . '" ="" checked><label for="dvch' . $deliveryPointIndex . '_' . $receiverIndex . '">' . lang('Label.lbl_txtPartialDeliveryYes') . '</label><br>';
            $html .= '<input type="radio" value="0" keyPoint="' . $deliveryPointIndex . '_1" name="isRefund' . $deliveryPointIndex . '_' . $receiverIndex . '" class="or-radio-checked isRefundKm isRefund isRefundNo isRefundNo_' . $deliveryPointIndex . ' isRefundNo_' . $deliveryPointIndex . '_' . $receiverIndex . '" id="dvch' . $deliveryPointIndex . '_' . $receiverIndex . 'a" ><label for="dvch' . $deliveryPointIndex . '_' . $receiverIndex . 'a">' . lang('Label.lbl_txtPartialDeliveryNo') . '</label>';
            $html .= '</li>';
            $html .= '</ul>';

            // $html .= '<!-- isReturn -->';
            // $html .= '<ul class="col-xl-2 col-sm-3 or-ctdh-1">';
            // $html .= '<li class="or-cgc-1">' . lang('Label.lbl_txtIsBack') . '<br>';
            // $html .= '<input type="radio" value="1" name="isReturn' . $deliveryPointIndex . '_' . $receiverIndex . '" class="or-radio-checked isReturnYes isReturnYes_' . $deliveryPointIndex . '_' . $receiverIndex . '" id="qldg' . $deliveryPointIndex . '_' . $receiverIndex . '" checked=""><label for="qldg' . $deliveryPointIndex . '_' . $receiverIndex . '">' . lang('Label.lbl_txtPartialDeliveryYes') . '</label><br>';
            // $html .= '<input type="radio" value="0" name="isReturn' . $deliveryPointIndex . '_' . $receiverIndex . '" class="or-radio-checked isReturnNo isReturnNo_' . $deliveryPointIndex . '_' . $receiverIndex . '" id="qldg' . $deliveryPointIndex . '_' . $receiverIndex . 'a"><label for="qldg' . $deliveryPointIndex . '_' . $receiverIndex . 'a">' . lang('Label.lbl_txtPartialDeliveryNo') . '</label>';
            // $html .= '</li>';
            // $html .= '</ul>';

            $html .= '<!-- extraServices -->';
            $html .= '<ul class="col-xl-2 col-sm-3 or-ctdh-1 or-ctdh-2">';
            $html .= '<li class="or-cgc-1">' . lang('Label.lbl_txtExtraServices') . '<br>';
            $html .= '<label><input type="checkbox" name="isDoorDeliver" class="frm-hìnhcheck regular-checkbox or-radio-checked isDoorDeliver isDoorDeliver_' . $deliveryPointIndex . '_' . $receiverIndex . '" id="dvthem1"> <span class="pr-1"></span>' . lang('Label.lbl_txtIsDoorDeliver') . ' </label> <br>';
            $html .= '<label><input type="checkbox" name="isPorter" class="frm-check regular-checkbox or-radio-checked isPorter isPorter_' . $deliveryPointIndex . '_' . $receiverIndex . '" id="dvthem1a"><span class="pr-1"></span>' . lang('Label.lbl_txtIsPorter') . '</label>';
            $html .= '</li>';
            $html .= '</ul>';
            $html .= '<!-- requireNote -->';
            $html .= '<ul class="col-xl-4 col-sm-12 or-ctdh-1">';
            $html .= '<li>' . lang('Label.lbl_txtNoteRequired') . '<span style="color: #885DE5;"> *</span><br>';
            $html .= '<select class="chosen-select requireNote requireNote_' . $deliveryPointIndex . '_' . $receiverIndex . '" id="requireNote_' . $deliveryPointIndex . '_' . $receiverIndex . '" name="requireNote" style="width: 100%;">';
            $html .= '<option value="1">Không cho xem hàng</option>';
            $html .= '<option value="2">Cho thử hàng</option>';
            $html .= '<option value="3" selected>Cho xem hàng không cho thử</option>';
            $html .= '</select>';
            $html .= '</li>';
            $html .= '</ul>';
            $html .= '<ul class="col-md-6 col-sm-0"></ul>';
            $html .= '<ul class="col-md-3 col-sm-6 or-ctdh-btn1">';
            $html .= '<button type="button" class="cancelReceiver_' . $deliveryPointIndex . '_' . $receiverIndex . '" onclick="removeReceiver(' . $deliveryPointIndex . ', ' . $receiverIndex . ')">' . lang('Label.lbl_txtCancel') . '</button>';
            $html .= '</ul>';
            $html .= '<ul class="col-md-3 col-sm-6  or-ctdh-btn2">';
            if ($post['typeOrder'] == 1) {
                $html .= '<button class="closePickupOrder saveReceiver_' . $deliveryPointIndex . '_' . $receiverIndex . ' closePickupOrder_' . $deliveryPointIndex . '_' . $receiverIndex . '" onclick="saveReceiver(' . $deliveryPointIndex . ', ' . $receiverIndex . ', \'addReceiver\')" type="button">' . lang('Label.lbl_txtFinish') . '</button>';
            } else {
                $html .= '<button class="closePickupOrder saveReceiver_' . $deliveryPointIndex . '_' . $receiverIndex . ' closePickupOrder_' . $deliveryPointIndex . '_' . $receiverIndex . '" onclick="saveReceiver(' . $deliveryPointIndex . ', ' . $receiverIndex . ', \'addReceiver\')" type="button">' . lang('Label.lbl_txtFinish') . '</button>';
            }
            $html .= '<br><span class="err_messages err_saveReceiver_' . $deliveryPointIndex . '"> </span>';
            $html .= '</ul>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            echo json_encode(array('success' => true, 'type' => 'addPoint', 'html' => $html, 'redirect' => '0'));
            die;
        }
    }

    public function nextPostageKm()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {

            if ($post['pickupAddressId'] == 0 || $post['pickupAddressId'] == null) {
                $this->validation->setRules([
                    'pickName'               => [
                        'label' => 'Label.lbl_txtNamePickup',
                        'rules' => 'required',
                        'errors' => []
                    ],
                    'pickPhone'               => [
                        'label' => 'Label.phone',
                        'rules' => 'required|phoneValidate[' . $post['pickPhone'] . ']',
                        'errors' => [
                            'phoneValidate' => 'Validation.phoneValidate',
                        ]
                    ],
                    'pickAddress'               => [
                        'label' => 'Label.lbl_senderAddress',
                        'rules' => 'required',
                        'errors' => []
                    ],
                    'pickProvince'               => [
                        'label' => 'Label.lbl_orderWareHouseProvince',
                        'rules' => 'required',
                        'errors' => []
                    ],
                    'pickDistrict'               => [
                        'label' => 'Label.lbl_orderWareHouseDistrict',
                        'rules' => 'required',
                        'errors' => []
                    ],
                    'pickWard'               => [
                        'label' => 'Label.lbl_orderWareHouseWard',
                        'rules' => 'required',
                        'errors' => []
                    ]
                ]);
                if (!$this->validation->withRequest($this->request)->run()) {
                    $validationError = $this->validation->getErrors();
                    $resData = array(
                        'deliveryPointIndex' => $post['deliveryPointIndex'],
                        'receiverIndex' => $post['receiverIndex'],
                        'validationError' => $validationError
                    );
                    echo json_encode(array('success' => false, 'resData' => json_encode($resData, JSON_UNESCAPED_UNICODE), 'redirect' => '0'));
                    die;
                }
            }
            $expectShipperPhone = $post['expectShipperPhone'];
            if ($post['typeOrder'] == 1) {
                $orderIdDraft = get_cookie('__orderEdit');
            } else {
                $orderIdDraft = get_cookie('__orderDraft');
            }
            $dataOrders = json_decode($this->redis->get($orderIdDraft));

            if ($post['optimizerOrder'] == 1) {
                if ($post['typeOrder'] == 1) {
                    $orderIdDraft = get_cookie('__orderEdit');
                } else {
                    $orderIdDraft = get_cookie('__orderDraft');
                }
                $dataUserAuthen = json_decode($this->redis->get($this->krd));
                $headers = [
                    'Accept: application/json',
                    'Content-Type: application/json',
                    'Authorization:' . $dataUserAuthen->token
                ];

                $orderLast = $this->common->createDataOrders($orderIdDraft);
                $username = $dataUserAuthen->username;
                $resultCreateOrder = $this->singleOrderModel->optimizeOrder($username, $orderLast, $headers);
                $dataOrdersNews = $resultCreateOrder->data;
                // $dataOrdersOld = 
                $dataOrders = $this->common->convertOrderOptimize($dataOrdersNews);
                $dataOrders->packType = 2;
            }

            // Get UserInfo
            $dataUserAuthen = json_decode($this->redis->get($this->krd));
            if ($post['pickupAddressId'] == 0 || $post['pickupAddressId'] == null) {
                $dataPickupAddress = array(
                    'requestId' => time() . rand(100, 999),
                    'username' => $dataUserAuthen->username,
                    'shopName' => $post['pickName'],
                    'senderName' => $post['pickName'],
                    'shopPhone' => $post['pickPhone'],
                    'provinceCode' => $post['pickProvince'],
                    'districtCode' => $post['pickDistrict'],
                    'wardCode' => $post['pickWard'],
                    'addressDetail' => $post['pickAddress'],
                    'isDefault' => 0
                );
                $headers = [
                    'Accept: application/json',
                    'Content-Type: application/json',
                    'Authorization:' . $dataUserAuthen->token
                ];
                $result = $this->warehouseManageModels->createWareHouse($dataUserAuthen->username, $dataPickupAddress, $headers);
                if ($result->status == 200) {
                    $dataOrders->pickupAddressId = $result->data->id;
                } else {
                    echo json_encode(array('success' => false, 'data' => $result, 'redirect' => '0'));
                    die;
                }
            }
            $dataOrders->expectShipperPhone = $expectShipperPhone;
            $this->redis->set($orderIdDraft, json_encode($dataOrders, JSON_UNESCAPED_UNICODE), TIME_ORDER_DRAFT);

            if ($post['typeOrder'] == 1) {
                echo json_encode(array('success' => true, 'data' => $dataOrders, 'redirect' => base_url($this->preUri . '/xac-nhan-don-le/' . $orderIdDraft)));
            } else {
                echo json_encode(array('success' => true, 'data' => $dataOrders, 'redirect' => base_url($this->preUri . '/xac-nhan-don-le')));
            }
            die;
        }
    }

    public function nextPostageSp()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            if ($post['deliveryPointIndex'] && $post['receiverIndex']) {
                if ($post['pickupAddressId'] == 0 || $post['pickupAddressId'] == null) {
                    $this->validation->setRules([
                        'pickName'               => [
                            'label' => 'Label.lbl_txtNamePickup',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'pickPhone'               => [
                            'label' => 'Label.phone',
                            'rules' => 'required|phoneValidate[' . $post['pickPhone'] . ']',
                            'errors' => [
                                'phoneValidate' => 'Validation.phoneValidate',
                            ]
                        ],
                        'pickAddress'               => [
                            'label' => 'Label.lbl_senderAddress',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'pickProvince'               => [
                            'label' => 'Label.lbl_orderWareHouseProvince',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'pickDistrict'               => [
                            'label' => 'Label.lbl_orderWareHouseDistrict',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'pickWard'               => [
                            'label' => 'Label.lbl_orderWareHouseWard',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'deliveryAddress'               => [
                            'label' => 'Label.lbl_deliveryAddress',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'deliveryPorvince'               => [
                            'label' => 'Label.lbl_orderWareHouseProvince',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'deliveryDistrict'               => [
                            'label' => 'Label.lbl_orderWareHouseDistrict',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'deliveryWard'               => [
                            'label' => 'Label.lbl_orderWareHouseWard',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'deliveryWard'               => [
                            'label' => 'Label.lbl_orderWareHouseWard',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'receiverPhone'               => [
                            'label' => 'Label.lbl_txtReceiverPhone',
                            'rules' => 'required|phoneValidate[' . $post['receiverPhone'] . ']',
                            'errors' => [
                                'phoneValidate' => 'Validation.phoneValidate',
                            ]
                        ],
                        'receiverName'               => [
                            'label' => 'Label.lbl_txtReceiverName',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'length'               => [
                            'label' => 'Label.lbl_txtLength',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'width'               => [
                            'label' => 'Label.lbl_txtWidth',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'height'               => [
                            'label' => 'Label.lbl_txtHeight',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'weight'               => [
                            'label' => 'Label.lbl_txtGoodWeight',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'requireNote'               => [
                            'label' => 'Label.lbl_txtNoteRequired',
                            'rules' => 'required',
                            'errors' => []
                        ]
                    ]);
                } else {
                    $this->validation->setRules([
                        'deliveryAddress'               => [
                            'label' => 'Label.lbl_deliveryAddress',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'deliveryPorvince'               => [
                            'label' => 'Label.lbl_orderWareHouseProvince',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'deliveryDistrict'               => [
                            'label' => 'Label.lbl_orderWareHouseDistrict',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'deliveryWard'               => [
                            'label' => 'Label.lbl_orderWareHouseWard',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'deliveryWard'               => [
                            'label' => 'Label.lbl_orderWareHouseWard',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'receiverPhone'               => [
                            'label' => 'Label.lbl_txtReceiverPhone',
                            'rules' => 'required|phoneValidate[' . $post['receiverPhone'] . ']',
                            'errors' => [
                                'phoneValidate' => 'Validation.phoneValidate',
                            ]
                        ],
                        'receiverName'               => [
                            'label' => 'Label.lbl_txtReceiverName',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'length'               => [
                            'label' => 'Label.lbl_txtLength',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'width'               => [
                            'label' => 'Label.lbl_txtWidth',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'height'               => [
                            'label' => 'Label.lbl_txtHeight',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'weight'               => [
                            'label' => 'Label.lbl_txtGoodWeight',
                            'rules' => 'required',
                            'errors' => []
                        ],
                        'requireNote'               => [
                            'label' => 'Label.lbl_txtNoteRequired',
                            'rules' => 'required',
                            'errors' => []
                        ]
                    ]);
                }
                if (!$this->validation->withRequest($this->request)->run()) {
                    $validationError = $this->validation->getErrors();
                    $resData = array(
                        'deliveryPointIndex' => $post['deliveryPointIndex'],
                        'receiverIndex' => $post['receiverIndex'],
                        'validationError' => $validationError
                    );
                    echo json_encode(array('success' => false, 'resData' => json_encode($resData, JSON_UNESCAPED_UNICODE), 'redirect' => '0'));
                    die;
                } else {
                    if ($post['typeOrder'] == 1) {
                        $orderIdDraft = get_cookie('__orderEdit');
                    } else {
                        $orderIdDraft = get_cookie('__orderDraft');
                    }
                    $dataOrders = json_decode($this->redis->get($orderIdDraft));
                    // Get UserInfo
                    $dataUserAuthen = json_decode($this->redis->get($this->krd));
                    
                    if (($dataOrders->pickupAddressId <= 0 || $dataOrders->pickupAddressId == null) && ($post['pickupAddressId'] <= 0 || $post['pickupAddressId'] == null)) {
                        $dataPickupAddress = array(
                            'requestId' => time() . rand(100, 999),
                            'username' => $dataUserAuthen->username,
                            'shopName' => $post['pickName'],
                            'senderName' => $post['pickName'],
                            'shopPhone' => $post['pickPhone'],
                            'provinceCode' => $post['pickProvince'],
                            'districtCode' => $post['pickDistrict'],
                            'wardCode' => $post['pickWard'],
                            'addressDetail' => $post['pickAddress'],
                            'isDefault' => 0
                        );
                        $headers = [
                            'Accept: application/json',
                            'Content-Type: application/json',
                            'Authorization:' . $dataUserAuthen->token
                        ];
                        $result = $this->warehouseManageModels->createWareHouse($dataUserAuthen->username, $dataPickupAddress, $headers);
                        if ($result->status == 200) {
                            $dataOrders->pickupAddressId = $result->data->id;
                            $post['pickupAddressId'] = $result->data->id;
                        } else {
                            echo json_encode(array('success' => false, 'data' => $result, 'redirect' => '0'));
                            die;
                        }
                    }
                    $deliveryPointIndex = $post['deliveryPointIndex'] - 1;
                    $receiverIndex = $post['receiverIndex'] - 1;

                    $productDetails = $dataOrders->deliveryPoint[$deliveryPointIndex]->receivers[$receiverIndex]->items;
                    // $totalCod = 0;
                    // $totalValue = 0;
                    // foreach($items as $itemProduct){
                    //     $totalCod += (int)$itemProduct->productCOD;
                    //     $totalValue += (int)$itemProduct->productValue;
                    // }
                    $dataUserAuthen = json_decode($this->redis->get($this->krd));
                    $token = $dataUserAuthen->token;
                    $username = $dataUserAuthen->username;
                    $headers = [
                        'Accept: application/json',
                        'Content-Type: application/json',
                        'Authorization:' . $token
                    ];
                    // $itemProducts = [];
                    // if (!empty($productDetails)) {
                    //     foreach ($productDetails as $key => $itemProduct) {
                    //         $productDetail = new \stdClass;
                    //         $productDetail->productName = $itemProduct->productName;
                    //         $productDetail->cod = $itemProduct->productCOD;
                    //         $productDetail->productValue = $itemProduct->productValue;
                    //         $productDetail->quantity = $itemProduct->productQuantity;
                    //         $productDetail->category = $itemProduct->productCate;
                    //         //Set Items Detail
                    //         $itemProducts[$key] = $productDetail;
                    //     }
                    // }
                    // $dataCheckCodValue = [
                    //     'items' => $itemProducts
                    // ];
                    // $resultCheckCod = $this->singleOrderModel->checkCodValue($headers, $dataCheckCodValue, $username);
                    // if($resultCheckCod->status == 200 && $resultCheckCod->data->message != ''){
                    //     echo json_encode(array('success' => false, 'data' => $resultCheckCod->data->message, 'redirect' => 0, 'status' => 1));die;
                    // }

                    $points = $dataOrders->deliveryPoint;
                    $totalPoints = count($points);
                    //Set index redis
                    $index = new \stdClass;
                    $index->deliveryPointIndex = $post['deliveryPointIndex'];
                    $index->deliveryPointIndexNext = $totalPoints + 1;
                    $index->receiverIndex = $post['receiverIndex'];
                    $index->receiverIndexNext = $post['receiverIndex'] + 1;
                    $index->productIndexNext = $post['productIndexNext'];

                    // $size = explode("-",$post['size']);
                    // $post['length'] = trim($size['0']);
                    // $post['width'] = trim($size['1']);
                    // $post['height'] = trim($size['2']);
                    //Get Require Note
                    $post['requireNoteName'] = $this->singleOrderModel->getRequireNoteName($post['requireNote']);

                    $dataOrders = $this->common->updateOrderRedis($orderIdDraft, $post, $index);
                    // print_r($dataOrders);die;
                    if ($post['typeOrder'] == 1) {
                        echo json_encode(array('success' => true, 'data' => $dataOrders, 'redirect' => base_url($this->preUri . '/xac-nhan-don-le/' . $orderIdDraft)));
                    } else {
                        echo json_encode(array('success' => true, 'data' => $dataOrders, 'redirect' => base_url($this->preUri . '/xac-nhan-don-le')));
                    }
                    die;
                }
            }
        }
    }

    function saveOrderDraft()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $orderIdDraft = get_cookie('__orderDraft');
            $dataOrders = json_decode($this->redis->get($orderIdDraft));
            $dataOrders->orderPaymentType = $post['orderPaymentType'];

            $dataCallApi = new \stdClass;
            $dataCallApi->orderId = $orderIdDraft;
            $dataCallApi->orderDetail = $dataOrders;

            $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
            $token = $dataUserAuthen->token;
            $username = $dataUserAuthen->username;

            $headers = [
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization:' . $token
            ];
            $resCreateOrderDraft = $this->singleOrderModel->createOrderDraft($username, $dataCallApi, $headers);
            if ($resCreateOrderDraft->status == 200) {
                //Tạo đơn thành công
                setcookie("__createOrder", 'success', time() + (60 * 10), '/');
                echo json_encode(array('success' => true, 'redirect' => base_url('/danh-sach-don-hang')));
                die;
            } else {
                //Tạo đơn không thành công.
                setcookie("__createOrder", 'false^_^' . $resCreateOrderDraft->status, time() + (60 * 10), '/');
                echo json_encode(array('success' => false, 'redirect' => ''));
                die;
            }
        }
    }
    public function removeDeliveryPoint()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            if ($post['typeOrder'] == 1) {
                $orderIdDraft = get_cookie('__orderEdit');
            } else {
                $orderIdDraft = get_cookie('__orderDraft');
            }
            $dataOrders = json_decode($this->redis->get($orderIdDraft));
            // [$post['deliveryPointIndex']-1]
            $point = $dataOrders->deliveryPoint;


            //Xử lý
            unset($point[$post['deliveryPointIndex'] - 1]);
            $point = $this->common->array_sort($point);
            $dataOrders->deliveryPointIndexNext = $dataOrders->deliveryPointIndexNext - 1;
            $dataOrders->index->deliveryPointIndexNext = $dataOrders->deliveryPointIndexNext - 1;
            foreach ($point as $key => $value) {
                $point[$key]->deliveryPointIndex = $key + 1;
            }
            $dataOrders->deliveryPoint = $point;
            $this->redis->set($orderIdDraft, json_encode($dataOrders, JSON_UNESCAPED_UNICODE), TIME_ORDER_DRAFT);
            echo json_encode(array('success' => true, 'dataOrders' => json_encode($dataOrders, JSON_UNESCAPED_UNICODE), 'redirect' => '0'));
            die;
        }
    }
    public function updateAddressAjax()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $orderIdDraft = get_cookie('__orderEdit');
            $dataOrders = json_decode($this->redis->get($orderIdDraft));

            $deliveryPointKey = $post['deliveryPointIndex'];
            $dataOrders->deliveryPoint[$deliveryPointKey - 1]->deliveryAddress = $post['addressNew'];
            $dataOrders->deliveryPoint[$deliveryPointKey - 1]->deliveryPorvince = $post['provinceNew'];
            $dataOrders->deliveryPoint[$deliveryPointKey - 1]->deliveryDistrict = $post['districtNew'];
            $dataOrders->deliveryPoint[$deliveryPointKey - 1]->deliveryWard = $post['wardsNew'];
            $this->redis->set($orderIdDraft, json_encode($dataOrders, JSON_UNESCAPED_UNICODE), TIME_ORDER_DRAFT);
        }
    }

    public function addProductAppend()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $orderId = $post['orderId'];
            $dataOrders = json_decode($this->redis->get($orderId));
            $deliveryPoint = $dataOrders->deliveryPoint;
            $receiverPoint = $deliveryPoint[$post['deliveryPointIndex'] - 1]->receivers;
            $productIndexNext = $receiverPoint[$post['receiverIndex'] - 1]->productIndexNext;
            echo json_encode(array('success' => true, 'productIndexNext' => json_encode($productIndexNext, JSON_UNESCAPED_UNICODE)));
            die;
        }
    }
    public function suggestionAddress()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
            $token = $dataUserAuthen->token;
            $username = $dataUserAuthen->username;

            $headers = [
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization:' . $token
            ];
            $dataCallApi = [
                'short_address' => $post['receiverSenderSub']
            ];

            $resSuggestionAddress = $this->singleOrderModel->getSuggestionAddress($username, $dataCallApi, $headers);
            if ($resSuggestionAddress->status == 200) {
                $dataSuggestionAddress = $resSuggestionAddress->data;
                $html = '';
                if (!empty($dataSuggestionAddress)) {

                    foreach ($dataSuggestionAddress as $key => $item) {
                        $addressFull = $item->address . ', ' . $item->ward_NAME . ', ' . $item->district_NAME . ', ' . $item->province_NAME;
                        $html .= '<div class="dropdown-item pl-0 orDetail-data-select" href="#" style="padding-left: 21px!important;" onclick="addAddressDetail(' . $post['deliveryPointIndex'] . ', 1, ' . $key . ')">';
                        $html .= '<span style="color: #28262B;font-size: 14px;">' . $item->address . '</span>';
                        $html .= '<br>';
                        $html .= '<span style="color: #68656D;font-size: 12px;">' . $item->ward_NAME . ', ' . $item->district_NAME . ', ' . $item->province_NAME . '</span>';
                        $html .= '<input type="hidden" class="suggestionAddress-' . $post['deliveryPointIndex'] . '-' . $key . '" value="' . $item->address . '" />';
                        $html .= '<input type="hidden" class="suggestionAddressDetail-' . $post['deliveryPointIndex'] . '-' . $key . '" value="' . $addressFull . '" />';
                        $html .= '</div>';
                    }
                    echo json_encode(array('success' => true, 'html' => $html));
                    die;
                } else {
                    echo json_encode(array('success' => false));
                    die;
                }
            } else {
                echo json_encode(array('success' => false));
                die;
            }
        } else {
            echo json_encode(array('success' => false));
            die;
        }
    }
}

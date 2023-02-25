<?php

namespace App\Modules\OrderManage\MultipleOrders\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class MultipleOrders extends BaseController
{
    public function multipleOrders()
    {
        $data = [];
        $title = lang('Label.lbl_newFastOrder');
        //Prepare view
        $get = $this->request->getGet();
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $token = $dataUserAuthen->token;
        $sessionKey = $dataUserAuthen->sessionKey;
        $username = $dataUserAuthen->username;
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;
        $dataProvinces = $this->userCommon->getProvince($dataUserAuthen);
        //clear cache redis order files
        // $this->redis->set('__listOrderFiles'.$username, '',1);
        //Get data warehouse
        $dataCallListPickupApi = array(
            'status' => 1,
            'page' => 1,
            'size' => 20,
        );
        $headers = [
            'Authorization:' . $token,
        ];
        // getListWareHouse
        $createPickup = 0;
        $primaryPickupAddress = [];
        $pickupAddress = [];
        $pickupAddress = $dataUser->pickupAddress;
        if(!empty($pickupAddress)){
            foreach ($pickupAddress as $key => $wareHouse) {
                if ($wareHouse->isDefault == 1 && $wareHouse->status == 1) {
                    $primaryPickupAddress = $wareHouse;
                    break;
                } else {
                    if($wareHouse->status == 1){   
                        $primaryPickupAddress = $pickupAddress[$key];
                        break;
                    }
                }
            }
        }
        $post = $this->request->getPost();
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:' . $token,
        ];
        $checkErrors = 0;
        if (!empty($post)) {

            //Check new or old pickupAddress
            if (isset($post['pickupAddressId']) && $post['pickupAddressId'] != '') {
                $pickupAddressId = trim($post['pickupAddressId']);
                $primaryPickupAddress = $this->multipleOrders->getPickupAddressDetail($username, $pickupAddressId);
            } else {
                $shopPhone = $post['phone'];
                $this->validation->setRules([
                    'pickName' => [
                        'label' => 'Label.lbl_senderName',
                        'rules' => 'required',
                        'errors' => [
                        ],
                    ],
                    'pickPhone' => [
                        'label' => 'Label.phone',
                        'rules' => 'required|phoneValidate[' . $shopPhone . ']',
                        'errors' => [
                        ],
                    ],
                    'pickProvince' => [
                        'label' => 'Label.lbl_chooseProvince',
                        'rules' => 'required',
                        'errors' => [
                        ],
                    ],
                    'pickDistrict' => [
                        'label' => 'Label.lbl_chooseDistrict',
                        'rules' => 'required',
                        'errors' => [
                        ],
                    ],
                    'pickWard' => [
                        'label' => 'Label.lbl_chooseWard',
                        'rules' => 'required',
                        'errors' => [
                        ],
                    ],
                    'pickAddress' => [
                        'label' => 'Label.lbl_addressWarehouse',
                        'rules' => 'required',
                        'errors' => [
                        ],
                    ],
                ]);

                //Validate upload files without pickupAddress
                if (!$this->validation->withRequest($this->request)->run()) {
                    $data['getErrors'] = $this->validation->getErrors();
                    $extens = '#.+\.(xlsx)$#i';
                    if (preg_match($extens, $_FILES['import_excel']['name']) != 1) {
                        $data['getErrors']['files'] = lang('Label.lbl_txtWrongTypeFile');
                    }
                    if ($_FILES['import_excel']['size'] <= 0) {
                        $data['getErrors']['files'] = lang('Label.lbl_txtRequireFile');
                    }
                    $dataDistrict = $this->userCommon->getDistrict($post['pickProvince'], $post['pickDistrict']);
                    $dataWards = $this->userCommon->dataWards($post['pickProvince'], $post['pickDistrict'], $post['pickWard']);
                    $data['dataParams'] = $post;
                    $data['dataUser'] = $dataUser;
                    $data['pickupAddress'] = $pickupAddress;
                    $data['dataProvinces'] = $dataProvinces;
                    $data['dataDistricts'] = $dataDistrict;
                    $data['dataWards'] = $dataWards;
                    $data['title'] = $title;
                    $data['view'] = 'App\Modules\OrderManage\MultipleOrders\Views\MultipleOrders';
                    return view('layoutShop/layout', $data);
                } else {
                    // Create PickupAddress
                    $pickName = $post['pickName'];
                    $pickPhone = $post['pickPhone'];
                    $pickAddress = $post['pickAddress'];
                    $pickProvince = $post['pickProvince'];
                    $pickDistrict = $post['pickDistrict'];
                    $pickWard = $post['pickWard'];
                    $dataCallApi = array(
                        "requestId" => "CREATE_WAREHOUSE",
                        "username" => $username,
                        "shopName" => $pickName,
                        "senderName" => $pickName,
                        "shopPhone" => $pickPhone,
                        "provinceCode" => $pickProvince,
                        "districtCode" => $pickDistrict,
                        "wardCode" => $pickWard,
                        "addressDetail" => $pickAddress,
                        "isDefault" => 0,
                    );
                    $headers = [
                        'Accept: application/json',
                        'Content-Type: application/json',
                        'Authorization:' . $token,
                    ];
                    $responseCreatePickupAddress = $this->warehouseManageModel->createWareHouse($username, $dataCallApi, $headers);
                    if ($responseCreatePickupAddress->status == 200) {
                        $pickupAddressId = $responseCreatePickupAddress->data->id;
                        $createPickup = 1;
                    } else {
                        $data['dataUser'] = $dataUser;
                        $data['title'] = $title;
                        $data['view'] = 'App\Modules\OrderManage\MultipleOrders\Views\MultipleOrders';
                        return view('layoutShop/layout', $data);
                    }
                }
            }
            //End check new or old pickupAddress

            //Upload file excel
            if (isset($post['import'])) {
                if ($_FILES['import_excel']['size'] > 0) {
                    $extens = '#.+\.(xlsx)$#i';
                    if (preg_match($extens, $_FILES['import_excel']['name']) == 1) {
                        $file = $_FILES['import_excel']['tmp_name'];
                        $filename = $_FILES['import_excel']['name'];
                        $sheetname = 'Danh sach don hang';
                        $filename = str_replace('.xlsx', '', $filename);
                    }
                    $data['getErrors'] = [];
                    if (!preg_match('/' . FILE_NAME_IMPORT_EXCEL_NEW . '/', $filename, $matches)) {
                        $data['getErrors']['files'] = lang('Label.lbl_txtWrongTypeFile');
                        $dataDistrict = $this->userCommon->getDistrict($post['pickProvince'], $post['pickDistrict']);
                        $dataWards = $this->userCommon->dataWards($post['pickProvince'], $post['pickDistrict'], $post['pickWard']);
                        $data['dataParams'] = $post;
                        $data['dataUser'] = $dataUser;
                        $data['pickupAddress'] = $pickupAddress;
                        $data['dataProvinces'] = $dataProvinces;
                        $data['dataDistricts'] = $dataDistrict;
                        $data['dataWards'] = $dataWards;
                        $data['title'] = $title;
                    }
                    if (empty($data['getErrors'])) {
                        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
                        $spreadsheet = $spreadsheet->getActiveSheet();
                        $arr_data = $spreadsheet->toArray();

                        $numStt = 0;

                        array_splice($arr_data, 0, 3);
                        if (isset($arr_data)) {
                            foreach ($arr_data as $key => $data) {
                                if ($data[0] != '') {
                                    $numStt++;
                                }
                            }
                            array_filter($arr_data);

                            if ($numStt > 1000) {
                                $data['data_import'] = array();
                                $data['error'] = 'Hiện tại HolaShip.vn chỉ hỗ trợ tạo tối đa 1000 đơn / 1 lần';
                            } else {
                                $arr_index = array();
                                $arr_data_import = array();
                                $i = 0;
                                $j = 0;
                                $numOrderError = '';
                                $strParam = '';
                                // start foreach
                                foreach ($arr_data as $row) {
                                    if (isset($row['0']) && $row['0'] != '') {
                                        if (
                                            array_key_exists('0', $row) && array_key_exists('1', $row) &&
                                            array_key_exists('2', $row) && array_key_exists('3', $row) &&
                                            array_key_exists('4', $row) && array_key_exists('5', $row) &&
                                            array_key_exists('6', $row) && array_key_exists('7', $row) &&
                                            array_key_exists('9', $row) && array_key_exists('10', $row) &&
                                            array_key_exists('11', $row) && array_key_exists('12', $row) &&
                                            array_key_exists('13', $row) && array_key_exists('15', $row) &&
                                            array_key_exists('16', $row) && array_key_exists('17', $row) &&
                                            array_key_exists('18', $row) && array_key_exists('19', $row)) {
                                            // if ($row['2'] != NULL) {
                                            $index = trim($row[0]);
                                            $arrPackageShip = explode('-', $row[1]);
                                            $packageShip = end($arrPackageShip);
                                            $arrOrderPayment = explode('-', $row[2]);
                                            $orderPayment = trim($arrOrderPayment[0]);
                                            $arrPaymentType = explode('-', $row[3]);
                                            $paymentType = trim($arrPaymentType[0]);
                                            $arrPickupType = explode('-', $row[4]);
                                            $pickupType = trim($arrPickupType[0]);

                                            $moneyCollect = (trim($row[5]) == '' ? 0 : str_replace(array(',', '.', '  ', '   '), '', trim($row[5])));
                                            $orderType = (trim($row[5]) == '' ? 0 : 1);
                                            $sumPriceOrder = (trim($row[6]) == '' ? 0 : str_replace(array(',', '.', '  ', '   '), '', trim($row[6])));
                                            $productName = $this->functionCommon->replace_special_char($row[7]);
                                            $weight = $this->functionCommon->replace_money_char($row[8]);
                                            $length = (trim($row[9]) == '' ? 1 : trim($row[9]));
                                            $width = (trim($row[10]) == '' ? 1 : trim($row[10]));
                                            $height = (trim($row[11]) == '' ? 1 : trim($row[11]));
                                            $arrRequireNote = explode('-', $row[12]);
                                            $requireNote = trim($arrRequireNote[0]);
                                            $arrPartialDelivery = explode('-', $row[13]);
                                            $partialDelivery = trim($arrPartialDelivery[0]);
                                            $note = $this->functionCommon->replace_special_char($row[14]);
                                            $receiverName = $this->functionCommon->replace_special_char($row[15]);
                                            $receiverPhone = $this->functionCommon->replace_money_char($row[16]);
                                            $receiverAddress = $this->functionCommon->replace_special_char($row[17]);
                                            $shopOrderId = trim($row[18]);
                                            $discountCoupon = trim($row[19]);
                                            $receiverPhone = preg_replace('/[^0-9]/', '', $receiverPhone);
                                            $productName = preg_replace('/[^a-z0-9A-Z_[:space:]ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂ ưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\/,.?:_-]/u', '', $productName);

                                            $arr_index[] = $index;
                                            if ($orderType == 0) {
                                                $moneyCollect = 0;
                                            } else {
                                                $moneyCollect = ($moneyCollect == '' ? 0 : $moneyCollect);
                                            }
                                            //Fix số dư ví Hola
                                            $paymentType = 2;
                                            $post = array();
                                            $post['index__' . $index] = $index;
                                            $post['packageCode__' . $index] = trim($packageShip);
                                            $post['orderPayment__' . $index] = $orderPayment;
                                            $post['pickupType__' . $index] = $pickupType;
                                            $post['paymentType__' . $index] = $paymentType;
                                            $post['orderType__' . $index] = $orderType;
                                            $post['moneyCollect__' . $index] = $moneyCollect;
                                            $post['productName__' . $index] = $productName;
                                            $post['weight__' . $index] = $weight;
                                            $post['length__' . $index] = $length;
                                            $post['width__' . $index] = $width;
                                            $post['height__' . $index] = $height;
                                            $post['sumPriceOrder__' . $index] = $sumPriceOrder;
                                            $post['partialDelivery__' . $index] = $partialDelivery;
                                            $post['requireNote__' . $index] = $requireNote;
                                            $post['note__' . $index] = $note;
                                            $post['receiverName__' . $index] = $receiverName;
                                            $post['receiverPhone__' . $index] = $receiverPhone;
                                            $post['receiverAddress__' . $index] = $receiverAddress;
                                            $post['discountCoupon__' . $index] = $discountCoupon;
                                            $post['shopOrderId__' . $index] = $shopOrderId;
                                            $post['pickupAddressId'] = $pickupAddressId;

                                            $post = $this->functionCommon->array_htmlspecialchars($post);
                                            $this->validation->setRules([
                                                'packageCode__' . $index => [
                                                    'label' => 'Validation.checkpackageCode',
                                                    'rules' => 'required',
                                                    'errors' => [
                                                    ],
                                                ],
                                                'orderPayment__' . $index => [
                                                    'label' => 'Validation.checkorderPayment',
                                                    'rules' => 'required',
                                                    'errors' => [
                                                    ],
                                                ],
                                                'pickupType__' . $index => [
                                                    'label' => 'Label.lbl_txtPickupType',
                                                    'rules' => 'required|checkPickupType',
                                                    'errors' => [
                                                    ],
                                                ],
                                                'paymentType__' . $index => [
                                                    'label' => 'Validation.checkpaymentTypeRe',
                                                    'rules' => 'required|checkpaymentType',
                                                    'errors' => [
                                                    ],
                                                ],
                                                'productName__' . $index => [
                                                    'label' => 'Label.lbl_txtProductName',
                                                    'rules' => 'required|max_length[200]',
                                                    'errors' => [
                                                    ],
                                                ],
                                                'weight__' . $index => [
                                                    'label' => 'Label.lbl_txtWeightDetailOrders',
                                                    'rules' => 'required|checkweight|checkweightNull',
                                                    'errors' => [
                                                    ],
                                                ],
                                                'length__' . $index => [
                                                    'label' => 'Label.lbl_txtLength',
                                                    'rules' => 'required|checklength',
                                                    'errors' => [
                                                    ],
                                                ],
                                                'width__' . $index => [
                                                    'label' => 'Label.lbl_txtWidth',
                                                    'rules' => 'required|checkwidth',
                                                    'errors' => [
                                                    ],
                                                ],
                                                'height__' . $index => [
                                                    'label' => 'Label.lbl_txtHeight',
                                                    'rules' => 'required|checkheight',
                                                    'errors' => [
                                                    ],
                                                ],
                                                'sumPriceOrder__' . $index => [
                                                    'label' => 'Label.lbl_txtSumPriceOrder',
                                                    'rules' => 'required|checksumPriceOrder',
                                                    'errors' => [
                                                    ],
                                                ],
                                                'partialDelivery__' . $index => [
                                                    'label' => 'Validation.checkpartialDelivery',
                                                    'rules' => 'required',
                                                    'errors' => [
                                                    ],
                                                ],
                                                'requireNote__' . $index => [
                                                    'label' => 'Label.lbl_txtNoteRequired',
                                                    'rules' => 'required|checkrequireNote',
                                                    'errors' => [
                                                    ],
                                                ],
                                                'note__' . $index => [
                                                    'label' => 'Label.lbl_txtNote',
                                                    'rules' => 'max_length[200]',
                                                    'errors' => [
                                                    ],
                                                ],
                                                'receiverName__' . $index => [
                                                    'label' => 'Label.lbl_txtReceiverName',
                                                    'rules' => 'required|max_length[100]',
                                                    'errors' => [
                                                    ],
                                                ],
                                                'receiverPhone__' . $index => [
                                                    'label' => 'Label.lbl_txtReceiverPhone',
                                                    'rules' => 'required|phoneValidate',
                                                    'errors' => [
                                                    ],
                                                ],
                                                'receiverAddress__' . $index => [
                                                    'label' => 'Label.lbl_txtReceiverAddress',
                                                    'rules' => 'required|max_length[150]',
                                                    'errors' => [
                                                    ],
                                                ],
                                                'shopOrderId__' . $index => [
                                                    'label' => 'Label.lbl_txtShopOrderId',
                                                    'rules' => 'trim',
                                                    'errors' => [
                                                    ],
                                                ],
                                                'discountCoupon__' . $index => [
                                                    'label' => 'Label.lbl_txtDiscountCoupon',
                                                    'rules' => 'trim',
                                                    'errors' => [
                                                    ],
                                                ],
                                            ]);
                                            if (!$this->validation->run($post)) {
                                                $checkErrors = 1;
                                                $data['getErrors'][] = $this->validation->getErrors();
                                            }
                                            $itemsParams = new \stdClass;
                                            // "product_name" => $productName,
                                            $productQuantity = 1;

                                            $itemsParams->productName = $productName;
                                            $itemsParams->quantity = $productQuantity;
                                            $itemsParams->cod = $moneyCollect;
                                            $itemsParams->productValue = $sumPriceOrder;
                                            $dataAddress['address'][] = $receiverAddress;
                                            $paramAddress['address'] = $receiverAddress;
                                            $dataParams[] = array(
                                                "index" => $index,
                                                "shopID" => '',
                                                "pickupAddressID" => $pickupAddressId,
                                                "packageCode" => ($packageShip == 'Tất cả' ? 'ALL' : $packageShip),
                                                "orderPayment" => $orderPayment,
                                                "paymentType" => $paymentType,
                                                "pickupType" => $pickupType,
                                                "weight" => $weight,
                                                "length" => $length,
                                                "width" => $width,
                                                "height" => $height,
                                                "requireNote" => $requireNote,
                                                "partialDelivery" => $partialDelivery,
                                                "note" => $note,
                                                "expectTime" => '',
                                                "expectDate" => '',

                                                "receiverName" => $receiverName,
                                                "receiverPhone" => $receiverPhone,
                                                "receiverAddress" => $receiverAddress,
                                                "receiverProvinceCode" => "",
                                                "receiverDistrictCode" => "",
                                                "receiverWardCode" => "",
                                                "shopOrderId" => $shopOrderId,
                                                "discountCoupon" => $discountCoupon,
                                                "isReturn" => 1,
                                                "isPorter" => 0,
                                                "isDoorDeliver" => 0,
                                                "products" => array(
                                                    $itemsParams,
                                                ),
                                            );
                                        }

                                    }
                                }

                                $resDataAddress = $this->api_location_address->getLocationAddress(json_encode($dataAddress))->result;
                                // end foreach
                                //AnhTT - Check mảng tuần tự
                                $checkSortIndex = $this->checkSortIndex($arr_index);
                                if ($checkSortIndex == 0) {
                                    $data['data_import'] = array();
                                    $data['getErrors']['files'] = 'Vui lòng kiểm tra lại số thứ tự các đơn hàng.';
                                    $dataDistrict = $this->userCommon->getDistrict($post['pickProvince'], $post['pickDistrict']);
                                    $dataWards = $this->userCommon->dataWards($post['pickProvince'], $post['pickDistrict'], $post['pickWard']);
                                    $data['primaryPickupAddress'] = $primaryPickupAddress;
                                    $data['dataParams'] = $post;
                                    $data['dataUser'] = $dataUser;
                                    $data['pickupAddress'] = $pickupAddress;
                                    $data['dataProvinces'] = $dataProvinces;
                                    $data['dataDistricts'] = $dataDistrict;
                                    $data['dataWards'] = $dataWards;
                                    $data['title'] = $title;
                                    $data['view'] = 'App\Modules\OrderManage\MultipleOrders\Views\MultipleOrders';
                                    return view('layoutShop/layout', $data);
                                }
                                //Validate files
                                if ($checkErrors == 1) {
                                    $data['getErrors'] = end((array_values($data['getErrors'])));
                                    foreach ($data['getErrors'] as $keyErr => $valErr) {

                                        $explode = explode('__', $keyErr);
                                        $fieldName = $explode[0];
                                        $fieldNumber = $explode[1];

                                        $arrError[$fieldNumber][$fieldName] = $valErr;
                                    }
                                    $data['arrErrorImport'] = $arrError;
                                    $data['dataParams'] = $post;
                                    $data['primaryPickupAddress'] = $primaryPickupAddress;
                                    $data['requiredNoteArr'] = (array) $this->requiredNoteArr;
                                    $data['dataProvinces'] = $dataProvinces;
                                    $data['pickupAddress'] = $pickupAddress;
                                    $data['dataUser'] = $dataUser;
                                    $data['title'] = $title;

                                    $data['view'] = 'App\Modules\OrderManage\MultipleOrders\Views\MultipleOrders';
                                    return view('layoutShop/layout', $data);

                                } else {
                                    foreach ($dataParams as $key => $value) {
                                        $index = $value['index'] - 1;
                                        $dataDistrictsIndex = $this->singleOrderModel->getDistrict($resDataAddress[$index]->province_code, $resDataAddress[$index]->district_code);
                                        // lay danh sach phuong xa theo quan huyen
                                        $dataWardsIndex = $this->singleOrderModel->getWards($resDataAddress[$index]->province_code, $resDataAddress[$index]->district_code, $resDataAddress[$index]->ward_code);
                                        $dataDistricts[$index] = $dataDistrictsIndex;
                                        $dataWards[$index] = $dataWardsIndex;
                                    }

                                    if ($createPickup == 1) {
                                        $dataCallListPickupApi = array(
                                            'status' => 1,
                                            'page' => 1,
                                            'size' => 20,
                                        );
                                        $headers = [
                                            'Authorization:' . $token,
                                        ];
                                        $listWareHouseResult = $this->warehouseManageModel->getListWareHouse($dataUser->username, $dataCallListPickupApi, $headers);
                                        if ($listWareHouseResult->status == 200) {
                                            $pickupAddress = $listWareHouseResult->data->shopAddress;
                                            $dataWareHouseKey = array_search($pickupAddressId, array_column($pickupAddress, 'id'));
                                            if ($dataWareHouseKey !== false) {
                                                $primaryPickupAddress = $pickupAddress[$dataWareHouseKey];
                                            }
                                        }
                                    }

                                    //Get Product Category
                                    $data['arrProductCategory'] = $this->arrProductCategory;
                                    $data['requiredNoteArr'] = (array) $this->requiredNoteArr;
                                    $data['resDataAddress'] = $resDataAddress;
                                    $data['primaryPickupAddress'] = $primaryPickupAddress;
                                    $data['dataProvinces'] = $dataProvinces;
                                    $data['dataDistricts'] = $dataDistricts;
                                    $data['dataWards'] = $dataWards;
                                    $data['dataUser'] = $dataUser;
                                    $data['pickupAddress'] = $pickupAddress;
                                    $data['dataParams'] = $dataParams;
                                    $data['view'] = 'App\Modules\OrderManage\MultipleOrders\Views\listOrders';
                                    return view('layoutShop/layout', $data);
                                }
                            }
                        }
                    }
                } else {
                    // Check file false
                    $data['getErrors'] = $this->validation->getErrors();
                    $extens = '#.+\.(xlsx)$#i';
                    if (preg_match($extens, $_FILES['import_excel']['name']) != 1) {
                        $data['getErrors']['files'] = lang('Label.lbl_txtWrongTypeFile');
                    }
                    if ($_FILES['import_excel']['size'] <= 0) {
                        $data['getErrors']['files'] = lang('Label.lbl_txtRequireFile');
                    }
                    $dataDistrict = $this->userCommon->getDistrict($post['pickProvince'], $post['pickDistrict']);
                    $dataWards = $this->userCommon->dataWards($post['pickProvince'], $post['pickDistrict'], $post['pickWard']);
                    $data['dataParams'] = $post;
                    $data['dataUser'] = $dataUser;
                    $data['pickupAddress'] = $pickupAddress;
                    $data['dataProvinces'] = $dataProvinces;
                    $data['dataDistricts'] = $dataDistrict;
                    $data['dataWards'] = $dataWards;
                    $data['title'] = $title;
                }
            } else {
                //Upload file false
                $data['getErrors'] = $this->validation->getErrors();
                $extens = '#.+\.(xlsx)$#i';
                if (preg_match($extens, $_FILES['import_excel']['name']) != 1) {
                    $data['getErrors']['files'] = lang('Label.lbl_txtWrongTypeFile');
                }
                if ($_FILES['import_excel']['size'] <= 0) {
                    $data['getErrors']['files'] = lang('Label.lbl_txtRequireFile');
                }

                $dataDistrict = $this->userCommon->getDistrict($post['pickProvince'], $post['pickDistrict']);
                $dataWards = $this->userCommon->dataWards($post['pickProvince'], $post['pickDistrict'], $post['pickWard']);
                $data['dataParams'] = $post;
                $data['dataUser'] = $dataUser;
                $data['pickupAddress'] = $pickupAddress;
                $data['dataProvinces'] = $dataProvinces;
                $data['dataDistricts'] = $dataDistrict;
                $data['dataWards'] = $dataWards;
                $data['title'] = $title;
            }
            //Step Pricing
            if (isset($post['checkPricing']) && $post['checkPricing'] == 'pricing') {

                $pickupAddressId = $post['pickupAddressId'];
                for ($i = 1; $i <= $post['index']; $i++) {
                    $index = $i;
                    $checkErrors = 0;

                    $itemsArray = [];
                    if (isset($post['check']) && in_array($i, $post['check'])) {
                        $remove = $post['remove_' . $i];
                        $receiverIndex = $post['receiverIndex_' . $i];
                        $packageShip = $post['packageShip_' . $i];
                        $receiverAddress = $post['receiverAddress_' . $i];
                        $receiverPhone = $post['receiverPhone_' . $i];
                        $receiverName = $post['receiverName_' . $i];
                        $note = $post['note_' . $i];
                        $orderPayment = $post['orderPayment_' . $i];
                        $paymentType = $post['paymentType_' . $i];
                        $pickupType = $post['pickupType_' . $i];
                        $weight = $post['weight_' . $i];
                        $length = $post['length_' . $i];
                        $width = $post['width_' . $i];
                        $height = $post['height_' . $i];
                        $requireNote = $post['requireNote_' . $i];
                        $partialDelivery = $post['partialDelivery_' . $i];
                        $shopOrderId = $post['shopOrderId_' . $i];
                        $discountCoupon = $post['discountCoupon_' . $i];
                        $isReturn = $post['isReturn_' . $i];
                        $isPorter = 0;
                        $isDoorDeliver = 0;
                        $receiverProvinceCode = $post['receiverProvinceCode_' . $i];
                        $receiverDistrictCode = $post['receiverDistrictCode_' . $i];
                        $receiverWardCode = $post['receiverWardCode_' . $i];
                        $itemIndex = $post['itemIndex_' . $i];
                        for ($j = 1; $j <= $itemIndex; $j++) {
                            if (isset($post['productName_' . $i . '_' . $j]) && $post['productName_' . $i . '_' . $j] != '') {
                                $itemsParams = new \stdClass;
                                $itemsParams->productName = $post['productName_' . $i . '_' . $j];
                                $itemsParams->quantity = $post['quantity_' . $i . '_' . $j];
                                $itemsParams->cod = $post['cod_' . $i . '_' . $j];
                                $itemsParams->productValue = $post['productValue_' . $i . '_' . $j];
                                $itemsParams->productCateId = $post['productCate_' . $i . '_' . $j];
                                $itemsArray[] = $itemsParams;
                            }
                        }
                        if ($remove == 1) {
                            $dataParamsGetListFees[] = array(
                                "index" => $receiverIndex,
                                "shopID" => '',
                                "pickupAddressID" => $pickupAddressId,
                                "packageCode" => trim($packageShip),
                                "orderPayment" => $orderPayment,
                                "paymentType" => $paymentType,
                                "pickupType" => $pickupType,
                                "weight" => $weight,
                                "length" => $length,
                                "width" => $width,
                                "height" => $height,
                                "requireNote" => $requireNote,
                                "partialDelivery" => $partialDelivery,
                                "note" => $note,
                                "receiverName" => $receiverName,
                                "receiverPhone" => $receiverPhone,
                                "receiverAddress" => $receiverAddress,
                                "receiverProvinceCode" => $receiverProvinceCode,
                                "receiverDistrictCode" => $receiverDistrictCode,
                                "receiverWardCode" => $receiverWardCode,
                                "shopOrderId" => $shopOrderId,
                                "discountCoupon" => $discountCoupon,
                                "isReturn" => $isReturn,
                                "isPorter" => $isPorter,
                                "isDoorDeliver" => $isDoorDeliver,
                                "products" => $itemsArray,
                            );
                        }
                    }
                }
                if (!empty($dataParamsGetListFees)) {
                    //Save cache redis list orders

                    //send api get fees
                    $dataCall = $this->multipleOrders->getFees($username, $headers, $dataParamsGetListFees);

                    if ($dataCall->status == 200) {
                        $dataResponse = $dataCall->data;
                        $this->redis->set('__listOrderFiles' . $username, json_encode($dataResponse, JSON_UNESCAPED_UNICODE), TIME_ORDER_DRAFT);
                        $this->redis->set('__pickUplistOrderFiles' . $username, $pickupAddressId, TIME_ORDER_DRAFT);
                        header("Location: " . base_url('/xac-nhan-don-nhanh'));
                        die;
                    } else {
                        $data['getErrors']['files'] = lang('Label.lbl_wrongCallApiLoadFiles');
                    }
                } else {
                    $data['getErrors']['files'] = lang('Label.lbl_dontHaveOrder');
                }
            }
        }
        $requireNoteArr = (array) $this->requiredNoteArr;
        $data['primaryPickupAddress'] = $primaryPickupAddress;
        $data['requiredNoteArr'] = $requireNoteArr;
        $data['dataProvinces'] = $dataProvinces;
        $data['pickupAddress'] = $pickupAddress;
        $data['dataUser'] = $dataUser;
        $data['title'] = $title;
        $data['view'] = 'App\Modules\OrderManage\MultipleOrders\Views\MultipleOrders';
        return view('layoutShop/layout', $data);
    }
    //AnhTT add validate upload excel
    public function checkSortIndex($arrIndex)
    {
        if (array() === $arrIndex) {
            return 0;
        }

        $j = 1;
        for ($i = 0; $i < count($arrIndex); $i++) {
            if ($arrIndex[$i] != ($j)) {
                return 0;
            }
            $j++;
        }
        return 1;
    }

    public function ttDonNhanh()
    {
        $data = [];
        $title = " Tạo đơn nhanh";
        //Prepare view
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $token = $dataUserAuthen->token;
        $sessionKey = $dataUserAuthen->sessionKey;
        $username = $dataUserAuthen->username;
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;
        $dataProvince = $this->userCommon->getProvince($dataUserAuthen);
        $pickupAddress = $dataUser->pickupAddress;
        $post = $this->request->getPost();
        $dataCallPickUpAddressApi = array(
            'status' => 1,
            'page' => 1,
            'size' => 20,
        );
        $headers = [
            'Authorization:' . $token,
        ];
        $listPickupAddressResponse = $this->warehouseManageModel->getListWareHouse($dataUser->username, $dataCallPickUpAddressApi, $headers);

        $data['listPickupAddressResponse'] = $listPickupAddressResponse;
        $data['pickupAddress'] = $pickupAddress;
        $data['title'] = $title;
        $data['view'] = 'App\Modules\OrderManage\MultipleOrders\Views\listOrders';
        return view('layoutShop/layout', $data);
    }

    public function confirmMultipleOrders()
    {
        $data = [];
        $title = " Tạo đơn nhanh";
        //Prepare view
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $token = $dataUserAuthen->token;
        $username = $dataUserAuthen->username;
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;
        $dataProvinces = $this->userCommon->getProvince($dataUserAuthen);
        $dataMultipleOrder = json_decode($this->redis->get('__listOrderFiles' . $username));
        $pickUplistOrderFiles = json_decode($this->redis->get('__pickUplistOrderFiles' . $username));
        //Get data warehouse
        $dataCallApi = array(
            'status' => 1,
            'page' => 1,
            'size' => 20,
        );
        $headers = [
            'Authorization:' . $token,
        ];
        $listWareHouseResult = $this->warehouseManageModel->getListWareHouse($dataUser->username, $dataCallApi, $headers);
        $data['pickupAddress'] = $listWareHouseResult;
        $primaryPickupAddress = [];
        if ($listWareHouseResult->status == 200) {
            $pickupAddress = $listWareHouseResult->data->shopAddress;
            $dataWareHouseKey = array_search($pickUplistOrderFiles, array_column($pickupAddress, 'id'));

            if ($dataWareHouseKey !== false) {
                $primaryPickupAddress = $pickupAddress[$dataWareHouseKey];
            }
        }

        $accountTest = ACCOUNT_TEST;
		$dataAccountTest = explode(',',$accountTest);
        $data['dataAccountTest'] = $dataAccountTest;

        $packCodeTest = PACKCODE_TEST;
		$dataPackCodeTest = explode(',',$packCodeTest);
        $data['dataPackCodeTest'] = $dataPackCodeTest;

        foreach ($dataMultipleOrder as $key => $value) {
            $index = $value->index - 1;
            $dataDistrictsIndex = $this->singleOrderModel->getDistrict($value->receiverProvinceCode, $value->receiverDistrictCode);
            // lay danh sach phuong xa theo quan huyen
            $dataWardsIndex = $this->singleOrderModel->getWards($value->receiverProvinceCode, $value->receiverDistrictCode, $value->receiverWardCode);
            $dataDistricts[$key] = $dataDistrictsIndex;
            $dataWards[$key] = $dataWardsIndex;
        }
        $data['dataResponse'] = [];
        $post = $this->request->getPost();
        if (!empty($post)) {
            $pickupAddressId = $post['pickupAddressId'];
            for ($i = 1; $i <= $post['index']; $i++) {
                if (isset($post['check']) && in_array($i, $post['check'])) {
                    $itemsArray = [];
                    $receiverIndex = $post['receiverIndex_' . $i];
                    $packageShip = $post['packageShip_' . $i];
                    $receiverAddress = $post['receiverAddress_' . $i];
                    $receiverPhone = $post['receiverPhone_' . $i];
                    $receiverName = $post['receiverName_' . $i];
                    $note = $post['note_' . $i];
                    $orderPayment = $post['orderPayment_' . $i];
                    $paymentType = $post['paymentType_' . $i];
                    $pickupType = $post['pickupType_' . $i];
                    $weight = $post['weight_' . $i];
                    $length = $post['length_' . $i];
                    $width = $post['width_' . $i];
                    $height = $post['height_' . $i];
                    $requireNote = $post['requireNote_' . $i];
                    $partialDelivery = $post['partialDelivery_' . $i];
                    $shopOrderId = $post['shopOrderId_' . $i];
                    $discountCoupon = $post['discountCoupon_' . $i];
                    $isReturn = $post['isReturn_' . $i];
                    $isPorter = 0;
                    $isDoorDeliver = 0;
                    $receiverProvinceCode = $post['receiverProvinceCode_' . $i];
                    $receiverDistrictCode = $post['receiverDistrictCode_' . $i];
                    $receiverWardCode = $post['receiverWardCode_' . $i];
                    $itemIndex = $post['itemIndex_' . $i];
                    for ($j = 1; $j <= $itemIndex; $j++) {
                        if (isset($post['productName_' . $i . '_' . $j]) && $post['productName_' . $i . '_' . $j] != '') {
                            $itemsParams = new \stdClass;
                            $itemsParams->productName = $post['productName_' . $i . '_' . $j];
                            $itemsParams->quantity = $post['quantity_' . $i . '_' . $j];
                            $itemsParams->cod = $post['cod_' . $i . '_' . $j];
                            $itemsParams->productValue = $post['productValue_' . $i . '_' . $j];
                            $itemsParams->productCateId = $post['productCate_' . $i . '_' . $j];
                            $itemsArray[] = $itemsParams;
                        }
                    }
                    //Fix số dư ví
                    $paymentType = 2;
                    $dataParamsCreateOrders[] = array(
                        "index" => $receiverIndex,
                        "shopID" => '',
                        "pickupAddressID" => $pickupAddressId,
                        "packageCode" => $packageShip,
                        "orderPayment" => $orderPayment,
                        "paymentType" => $paymentType,
                        "pickupType" => $pickupType,
                        "weight" => $weight,
                        "length" => $length,
                        "width" => $width,
                        "height" => $height,
                        "requireNote" => $requireNote,
                        "partialDelivery" => $partialDelivery,
                        "note" => $note,
                        "receiverName" => $receiverName,
                        "receiverPhone" => $receiverPhone,
                        "receiverAddress" => $receiverAddress,
                        "receiverProvinceCode" => $receiverProvinceCode,
                        "receiverDistrictCode" => $receiverDistrictCode,
                        "receiverWardCode" => $receiverWardCode,
                        "shopOrderId" => $shopOrderId,
                        "discountCoupon" => $discountCoupon,
                        "isReturn" => $isReturn,
                        "isPorter" => $isPorter,
                        "isDoorDeliver" => $isDoorDeliver,
                        "products" => $itemsArray,
                    );
                }
            }
            if (!empty($dataParamsCreateOrders)) {
                //Save cache redis list orders

                $headers = [
                    'Accept: application/json',
                    'Content-Type: application/json',
                    'Authorization:' . $token,
                ];
                //send api get fees
                $dataCall = $this->multipleOrders->createOrderFile($username, $headers, $dataParamsCreateOrders);
                if ($dataCall->status == 600) {
                    $data['dataResponse'] = $dataCall->data;
                } else {
                    $data['dataResponse'] = $dataCall;
                }
            } else {
                // setcookie ("__createOrder",'false',time()+ (60*10) , '/');
                //     header("Location: ".base_url('/danh-sach-don-hang'));
                // echo '<pre>';
                // print_r($dataParamsCreateOrders);
                //     die;
            }
        }
        $dataParams = [];
        $dataParamErrors = [];
        foreach ($dataMultipleOrder as $keyData => $dataOrder) {
            if (empty($dataOrder->fees)) {
                $dataParamErrors[] = $dataOrder;
            }
        }
        if (!empty($dataParamErrors)) {
            $this->redis->set('__listOrderErrorFiles' . $username, json_encode($dataParamErrors, JSON_UNESCAPED_UNICODE), TIME_ORDER_DRAFT);
        }
        $data['pickupAddress'] = $pickupAddress;
        $data['primaryPickupAddress'] = $primaryPickupAddress;
        $data['requiredNoteArr'] = (array) $this->requiredNoteArr;
        $data['dataProvinces'] = $dataProvinces;
        $data['dataDistricts'] = $dataDistricts;
        $data['dataWards'] = $dataWards;
        $data['dataParamErrors'] = $dataParamErrors;
        $data['dataProvinces'] = $dataProvinces;
        $data['dataParams'] = $dataMultipleOrder;
        $data['dataUser'] = $dataUser;
        $data['title'] = $title;
        $data['view'] = 'App\Modules\OrderManage\MultipleOrders\Views\confirmOrderFile';
        return view('layoutShop/layout', $data);
    }

    public function choosePickupAddressFast()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $pickupAddressId = $post['pickUpAddress'];
            $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
            $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
            $dataUser->availableBalance = $this->dataBalance;
            $pickupAddress = $dataUser->pickupAddress;
            $dataWareHouseKey = array_search($pickupAddressId, array_column($pickupAddress, 'id'));
            if ($dataWareHouseKey !== false) {
                $choosePickupAddress = $pickupAddress[$dataWareHouseKey];
            } else {
                echo json_encode(array('success' => false, 'message' => 'False', 'redirect' => '0'));die;
            }

            $address = ($choosePickupAddress->address) ? $choosePickupAddress->address . ', ' : '';
            $wardName = ($choosePickupAddress->wardName) ? $choosePickupAddress->wardName . ', ' : '';
            $districtName = ($choosePickupAddress->districtName) ? $choosePickupAddress->districtName . ', ' : '';
            $provinceName = ($choosePickupAddress->provinceName) ? $choosePickupAddress->provinceName : '';
            $fullAddress = $address . $wardName . $districtName . $provinceName;
            $htmlPickupAddress = '
                <div class="row col-12 oldPickup qo-dcng pb-0">
                    <div class="col-sm-4 pr-0">
                        <img src="' . base_url('public/images/qo-img-1.png') . '" alt="">
                        <span>' . $choosePickupAddress->name . '</span>
                    </div>
                    <div class="col-sm-4 pr-0">
                        <img src="' . base_url('public/images/manager.png') . '" alt="">
                        <span>' . $choosePickupAddress->senderName . '</span>
                    </div>
                    <div class="col-sm-4 pr-0">
                        <img src="' . base_url('public/images/phone.png') . '" alt="">
                        <span>' . $choosePickupAddress->phone . '</span>
                    </div>
                </div>
                <div class="col-12 oldPickup qo-dcng-1 qo-dcng">
                    <img src="' . base_url('public/images/place.png') . '" alt=""> <span>
                        ' . $fullAddress . '
                    </span>
                </div>
        ';
            // echo $htmlPickupAddress;
            echo json_encode(array('success' => true, 'message' => 'true', 'redirect' => '0', 'fullAddress' => $fullAddress, 'dataHtml' => $htmlPickupAddress));die;
            // die;
        }
    }
    public function changeFees()
    {
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $username = $dataUserAuthen->username;
        $dataMultipleOrder = json_decode($this->redis->get('__listOrderFiles' . $username));
        $post = $this->request->getPost();
        if (!empty($post)) {
            $index = $post['index'];
            $packageShipKey = $post['packageShipKey'];
            $dataOrder = $dataMultipleOrder[$index];
            $dataFee = $dataOrder->fees;
            $dataFeeKey = array_search($packageShipKey, array_column($dataFee, 'packageCode'));
            if ($dataFeeKey !== false) {
                $dataChangeFee = $dataFee[$dataFeeKey];
                echo json_encode(array('success' => true, 'message' => 'true', 'data' => $dataChangeFee));die;
            } else {
                echo json_encode(array('success' => false, 'message' => 'False', 'data' => ''));die;
            }
            die;
        }
    }
    public function reCaculateFees()
    {
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $token = $dataUserAuthen->token;
        $username = $dataUserAuthen->username;
        $post = $this->request->getPost();
        $dataMultipleOrder = json_decode($this->redis->get('__listOrderFiles' . $username));
        $dataRecaculate = $dataMultipleOrder[$post['index']];
        $index = $post['index'] + 1;
        $dataRecaculate->receiverProvinceCode = $post['province'];
        $dataRecaculate->receiverDistrictCode = $post['district'];
        $dataRecaculate->receiverWardCode = $post['ward'];
        $dataRecaculate->receiverAddress = $post['pickAddress'];
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:' . $token,
        ];

        $dataRecaculateApi[] = (array) $dataRecaculate;
        $dataCall = $this->multipleOrders->getFees($username, $headers, $dataRecaculateApi);

        if ($dataCall->status == 200) {
            $dataMultipleOrder[$post['index']] = $dataCall->data[0];
            $this->redis->set('__listOrderFiles' . $username, json_encode($dataMultipleOrder, JSON_UNESCAPED_UNICODE), TIME_ORDER_DRAFT);
            $dataResponse = $dataCall->data[0]->fees;
            $htmlSelect = '';
            //$htmlSelect .='<select name="packageShip_'. $index.'" onchange="changeFees('.$post['index'].')" class="chosen-select w100" style="padding-left: 4%;">';
            foreach ($dataResponse as $key => $value) {

                $htmlSelect .= '
                <option value="' . $value->packageCode . '">' . $value->packageCode . ' - ' . $value->packageName . '</option>';
            }
            echo json_encode(array('success' => true, 'message' => 'true', 'data' => $htmlSelect, 'arrData' => $dataResponse));die;
        }
        die;
    }

    public function exportExcelErrorFiles()
    {
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $token = $dataUserAuthen->token;
        $username = $dataUserAuthen->username;
        $listOrderErrors = json_decode($this->redis->get('__listOrderErrorFiles' . $username));
        if (!empty($listOrderErrors)) {
            $fileTitle = 'Danh sách đơn hàng lỗi';
            $fileName = $fileTitle . '.xlsx';
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $rowsMerge = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'U'];
            foreach ($rowsMerge as $row_merge) {

                $sheet->getStyle($row_merge . "1")
                    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle($row_merge . "1")
                    ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

                $sheet->getStyle($row_merge . "1")
                    ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $sheet->getStyle($row_merge . "1")
                    ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $sheet->getStyle($row_merge . "1")
                    ->getAlignment()->setWrapText(true);

                $sheet->getStyle($row_merge . "2")
                    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle($row_merge . "2")
                    ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

                $sheet->getStyle($row_merge . "2")
                    ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $sheet->getStyle($row_merge . "2")
                    ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $sheet->getStyle($row_merge . "2")
                    ->getAlignment()->setWrapText(true);

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

                $sheet->mergeCells($row_merge . "1:" . $row_merge . "3");
                $sheet->getStyle($row_merge . "1")->getFont()->setSize(11);
                $sheet->getStyle($row_merge . "1")->getFont()->setBold(true);
                if ($row_merge == 'A') {
                    $sheet->getColumnDimension($row_merge)->setWidth(10);
                } else {
                    $sheet->getColumnDimension($row_merge)->setWidth(20);
                }
            }
            $sheet->setCellValue('A1', "STT");
            $sheet->setCellValue('B1', "Chọn đơn vị và gói vận chuyển");
            $sheet->setCellValue('C1', "Người thanh toán phí vận chuyển");
            $sheet->setCellValue('D1', "Hình thức thanh toán phí");
            $sheet->setCellValue('E1', "Giao hàng ra bưu cục");
            $sheet->setCellValue('F1', "Tiền thu hộ");
            $sheet->setCellValue('G1', "Tổng giá trị tiền hàng (VNĐ)");

            $sheet->mergeCells("H1:L1");
            $sheet->setCellValue('H1', "Thông tin hàng hóa");
            $rowsMerge = ['H', 'I'];
            foreach ($rowsMerge as $row_merge) {
                $sheet->getStyle($row_merge . "1")
                    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle($row_merge . "1")
                    ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $sheet->getStyle($row_merge . "1")
                    ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $sheet->getStyle($row_merge . "1")
                    ->getAlignment()->setWrapText(true);

                $sheet->getStyle($row_merge . "2")
                    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle($row_merge . "2")
                    ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $sheet->getStyle($row_merge . "2")
                    ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $sheet->getStyle($row_merge . "2")
                    ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                $sheet->getStyle($row_merge . "2")
                    ->getAlignment()->setWrapText(true);

                $sheet->getStyle($row_merge . "3")
                    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle($row_merge . "3")
                    ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $sheet->getStyle($row_merge . "3")
                    ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $sheet->getStyle($row_merge . "3")
                    ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                $sheet->getStyle($row_merge . "3")
                    ->getAlignment()->setWrapText(true);

                $sheet->mergeCells($row_merge . "2:" . $row_merge . "3");
                $sheet->getStyle($row_merge . "2")->getFont()->setSize(11);
                $sheet->getStyle($row_merge . "2")->getFont()->setBold(true);

                $sheet->getStyle($row_merge . "1")->getFont()->setSize(11);
                $sheet->getStyle($row_merge . "1")->getFont()->setBold(true);
                $sheet->getColumnDimension($row_merge)->setWidth(20);
            }
            $rowsMerge = ['H', 'J', 'K', 'L'];

            $sheet->mergeCells("J2:L2");
            foreach ($rowsMerge as $row_merge) {
                $sheet->getStyle($row_merge . "1")
                    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle($row_merge . "1")
                    ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $sheet->getStyle($row_merge . "1")
                    ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);

                $sheet->getStyle($row_merge . "2")
                    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle($row_merge . "2")
                    ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $sheet->getStyle($row_merge . "2")
                    ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);

                $sheet->getStyle($row_merge . "3")
                    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle($row_merge . "3")
                    ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $sheet->getStyle($row_merge . "3")
                    ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);

                $sheet->getStyle($row_merge . "1")->getFont()->setSize(11);
                $sheet->getStyle($row_merge . "1")->getFont()->setBold(true);
                $sheet->getStyle($row_merge . "2")->getFont()->setSize(11);
                $sheet->getStyle($row_merge . "2")->getFont()->setBold(true);
                $sheet->getStyle($row_merge . "3")->getFont()->setBold(true);
                $sheet->getStyle($row_merge . "3")->getFont()->setSize(11);
                if ($row_merge != 'H') {
                    $sheet->getColumnDimension($row_merge)->setWidth(10);
                }
            }

            $sheet->setCellValue('H2', "Tên sản phẩm");
            $sheet->setCellValue('I2', "Khối lượng (Gram)");

            $sheet->setCellValue('J2', "Kích thước (cm)");
            $sheet->setCellValue('J3', "Dài");
            $sheet->setCellValue('K3', "Rộng");
            $sheet->setCellValue('L3', "Cao");

            $sheet->mergeCells("M1:O1");
            $sheet->mergeCells("P1:T1");
            $rowsMerge = ['M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T'];
            foreach ($rowsMerge as $row_merge) {
                $sheet->getStyle($row_merge . "1")
                    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle($row_merge . "1")
                    ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $sheet->getStyle($row_merge . "1")
                    ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $sheet->getStyle($row_merge . "1")
                    ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                $sheet->getStyle($row_merge . "1")
                    ->getAlignment()->setWrapText(true);

                $sheet->mergeCells($row_merge . "2:" . $row_merge . "3");
                $sheet->getStyle($row_merge . "2")
                    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle($row_merge . "2")
                    ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $sheet->getStyle($row_merge . "2")
                    ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $sheet->getStyle($row_merge . "2")
                    ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                $sheet->getStyle($row_merge . "2")
                    ->getAlignment()->setWrapText(true);

                $sheet->getStyle($row_merge . "3")
                    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle($row_merge . "3")
                    ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $sheet->getStyle($row_merge . "3")
                    ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $sheet->getStyle($row_merge . "3")
                    ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                $sheet->getStyle($row_merge . "3")
                    ->getAlignment()->setWrapText(true);

                $sheet->getStyle($row_merge . "1")->getFont()->setSize(11);
                $sheet->getStyle($row_merge . "1")->getFont()->setBold(true);
                $sheet->getStyle($row_merge . "2")->getFont()->setSize(11);
                $sheet->getStyle($row_merge . "2")->getFont()->setBold(true);
                $sheet->getStyle($row_merge . "3")->getFont()->setSize(11);
                $sheet->getStyle($row_merge . "3")->getFont()->setBold(true);
                $sheet->getColumnDimension($row_merge)->setWidth(20);
                if ($row_merge == 'R') {
                    $sheet->getColumnDimension($row_merge)->setWidth(45);
                }
                if ($row_merge == 'S' || $row_merge == 'T') {
                    $sheet->getColumnDimension($row_merge)->setWidth(25);
                }
            }
            $sheet->setCellValue('M1', "Ghi chú");
            $sheet->setCellValue('M2', "Ghi chú bắt buộc");
            $sheet->setCellValue('N2', "Giao hàng 1 phần");
            $sheet->setCellValue('O2', "Ghi chú hàng hóa");
            $sheet->setCellValue('P1', "Thông tin người nhận");
            $sheet->setCellValue('P2', "Người nhận");
            $sheet->setCellValue('Q2', "Điện thoại");
            $sheet->setCellValue('R2', "Địa chỉ nhận hàng");
            $sheet->setCellValue('S2', "Mã đơn khách hàng");
            $sheet->setCellValue('T2', "Mã giảm giá");
            $sheet->setCellValue('U1', "Mã lỗi");
            $j = 0;
            foreach ($listOrderErrors as $order) {
                $product = $order->products[0];
                $j++;
                $feeReasons = $order->feeReason;
                $reasons = '';
                if (!empty($feeReasons)) {
                    $reasons = rtrim($feeReasons, ', ');
                }
                
                $rows = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U'];
                foreach ($rows as $row) {
                    $sheet->getStyle($row . ($j + 3))
                        ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                }
                $requiredNoteArr = (array) $this->requiredNoteArr;
                $sheet->setCellValue('A' . ($j + 3), $j);
                $sheet->setCellValue('B' . ($j + 3), $order->packageCode . '-' . $order->packName);
                $sheet->setCellValue('C' . ($j + 3), ($order->orderPayment == 2) ? $order->orderPayment . ' - Người nhận hàng' : $order->orderPayment . ' - Người gửi hàng');
                $sheet->setCellValue('D' . ($j + 3), ($order->paymentType == 1) ? $order->paymentType . ' - Tiền mặt' : $order->paymentType . ' - Ví Hola');
                $sheet->setCellValue('E' . ($j + 3), ($order->pickupType == 1) ? $order->pickupType . ' - Có' : $order->pickupType . ' - Không');
                $sheet->setCellValue('F' . ($j + 3), $product->cod ? number_format($product->cod) : $product->cod);
                $sheet->setCellValue('G' . ($j + 3), $product->productValue ? number_format($product->productValue) : '');
                $sheet->setCellValue('H' . ($j + 3), $product->productName);
                $sheet->setCellValue('I' . ($j + 3), $order->weight ? ' '.number_format($order->weight,0,'','.') : $order->weight);
                $sheet->setCellValue('J' . ($j + 3), $order->length);
                $sheet->setCellValue('K' . ($j + 3), $order->width);
                $sheet->setCellValue('L' . ($j + 3), $order->height);
                $sheet->setCellValue('M' . ($j + 3), $order->requireNote .' - '.$requiredNoteArr[$order->requireNote]);
                $sheet->setCellValue('N' . ($j + 3), ($order->partialDelivery == 1) ? $order->partialDelivery. ' - Có' : $order->partialDelivery. ' - Không');
                $sheet->setCellValue('O' . ($j + 3), $order->note);
                $sheet->setCellValue('P' . ($j + 3), $order->receiverName);
                $sheet->setCellValue('Q' . ($j + 3), $order->receiverPhone);
                $sheet->setCellValue('R' . ($j + 3), $order->receiverAddress);
                $sheet->setCellValue('S' . ($j + 3), $order->shopOrderId);
                $sheet->setCellValue('T' . ($j + 3), $order->discountCoupon);
                $sheet->setCellValue('U' . ($j + 3), $reasons);
            }

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
            );
            // print_r($response);
            $this->logger->info('Kết thúc xuất EXCEL');
            die(json_encode($response));
        }
        echo '<pre>';
        print_r($listOrderErrors);die;

    }
}

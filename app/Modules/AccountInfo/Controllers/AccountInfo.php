<?php

namespace App\Modules\AccountInfo\Controllers;

use Dompdf\Dompdf;
use stdClass;

class AccountInfo extends BaseController
{
    //Thông tin tài khoản
    public function accountInfo()
    {
        $data = [];
        $dataUser = [];
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $token = $dataUserAuthen->token;
        $username = $dataUserAuthen->username;
        $dataCallApiGetUser = array(
            'username' => $username
        );
        //Set Authorization
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:' . $token
        ];
        $responseDataUser = $this->AccountInfoModels->getUserInfo($username, $headers, $dataCallApiGetUser);
        if ($responseDataUser->status == 200) {
            $dataUser = $responseDataUser->data;
            $dataUser->availableBalance = $this->dataBalance;
        }

        if (empty($dataUserAuthen)) {
            $this->authenticator->logOut();
        }
        $dataUserCache = json_decode($this->redis->get($dataUserAuthen->username));
        $provinceCode = $dataUserCache->address->provinceCode;
        $districtCode = $dataUserCache->address->districtCode;
        $wardCode = $dataUserCache->address->wardCode;

        $dataProvince = $this->userCommon->getProvince($dataUserAuthen);
        $dataDistrict = $this->userCommon->getDistrict($provinceCode, $districtCode);
        $dataWards = $this->userCommon->dataWards($provinceCode, $districtCode, $wardCode);

        $CookieAccount = get_cookie('__account');
        setcookie("__account", 'success', time() + (1), '/');
        $checkCookieAccount = '';
        $updateMessage = '';
        if ($CookieAccount != '') {
            $arrCookieAccount = explode("|", $CookieAccount);
            if (isset($arrCookieAccount[1]) && $arrCookieAccount[1] != '') {
                $updateMessage = $arrCookieAccount[1];
            }
            $checkCookieAccount = $arrCookieAccount[0];
        }
        $contract = $dataUser->contract;
        if ($contract == '') {
            $contract = [];
        }
        $title = lang('Label.lbl_infoAccount');

        $data['contract'] = $contract;
        $data['dataUser'] = $dataUser;
        $data['updateMessage'] = $updateMessage;

        $data['checkCookieAccount'] = $checkCookieAccount;
        $data['dataUserCache'] = $dataUserCache;

        $data['userLogin'] =  md5($dataUser->username);
        $data['dataProvince'] = $dataProvince;
        $data['dataDistrict'] = $dataDistrict;
        $data['dataWards'] = $dataWards;
        $data['title'] = $title;
        $data['view'] = 'App\Modules\AccountInfo\Views\accountInfo';
        return view('layoutShop/layout', $data);
    }
    public function editAcount()
    {
        $data = [];
        $dataUser = [];
        // Get Key redis  
        $post = $this->request->getPost();


        $dataUserAuthen = json_decode($this->redis->get($this->krd));
        if (empty($dataUserAuthen)) {
            $this->authenticator->logOut();
        }
        $dataUser = $this->userCommon->getUser($dataUserAuthen);
        $dataUser->availableBalance = $this->dataBalance;
        $provinceCode = $dataUser->address->provinceCode;
        $districtCode = $dataUser->address->districtCode;
        $wardCode = $dataUser->address->wardCode;

        $dataProvince = $this->userCommon->getProvince($dataUserAuthen);
        $dataDistrict = $this->userCommon->getDistrict($provinceCode, $districtCode);
        $dataWards = $this->userCommon->dataWards($provinceCode, $districtCode, $wardCode);
        $username = $dataUser->username;
        $phoneOTP = $dataUser->phoneOTP;
        $token = $dataUserAuthen->token;
        $sessionKey = $dataUserAuthen->sessionKey;
        $title = lang('Label.lbl_updateAccount');
        if (!empty($post)) {
            //Check Validation form 
            $this->validation->setRules([
                'fullName'               => [
                    'label' => 'Label.lbl_fullName',
                    'rules' => 'required|fullNameValidate[' . $post['fullName'] . ']',
                    'errors' => [
                        'fullNameValidate' => 'Validation.minFullName'
                    ]
                ],
                'company'               => [
                    'label' => 'Label.lbl_company',
                    'rules' => 'required',
                    'errors' => []
                ],
                'email'               => [
                    'label' => 'Label.lbl_email',
                    'rules' => 'required|valid_email',
                    'errors' => []
                ],
                'dob'               => [
                    'label' => 'Label.lbl_dob',
                    'rules' => 'required',
                    'errors' => []
                ],
                'sex'               => [
                    'label' => 'Label.lbl_sex',
                    'rules' => 'required',
                    'errors' => []
                ],
                'district'               => [
                    'label' => 'Label.lbl_district',
                    'rules' => 'required',
                    'errors' => []
                ],
                'province'               => [
                    'label' => 'Label.lbl_province',
                    'rules' => 'required',
                    'errors' => []
                ],
                'ward'               => [
                    'label' => 'Label.lbl_ward',
                    'rules' => 'required',
                    'errors' => []
                ],
                'address'               => [
                    'label' => 'Label.lbl_detailUser',
                    'rules' => 'required',
                    'errors' => []
                ]
            ]);

            if (!$this->validation->withRequest($this->request)->run()) {
                $data['validate'] = 1;
                $data['dataUser'] = $dataUser;
                $data['dataPost'] = $post;
                $data['phoneOtp'] = $dataUser->phoneOTP;
                $data['dataProvince'] = $dataProvince;
                $data['dataDistrict'] = $dataDistrict;
                $data['dataWards'] = $dataWards;
                $data['getErrors'] = $this->validation->getErrors();
                $data['view'] = 'App\Modules\AccountInfo\Views\editAccountInfo';
                $data['listValues'] = $post;
                return view('layoutShop/layout', $data);
            } else {

                $fullName = $post['fullName'];
                $email = $post['email'];
                $dob = $post['dob'];
                $sex = $post['sex'];
                $district = $post['district'];
                $province = $post['province'];
                $company = $post['company'];
                $ward = $post['ward'];
                $address = $post['address'];
                $cid = $post['cid'];
                $cidDate = $post['cidDate'];
                $cidPlace = $post['cidPlace'];
                //prepare data send API
                $dataCallApi = array(
                    "username" => $username,
                    "name" => $fullName,
                    "avatar" => "",
                    "birthday" => $dob,
                    "phoneOTP" => $phoneOTP,
                    "company" => $company,
                    "email" => $email,
                    "identityCard" => $cid,
                    "dateIdCard" => $cidDate,
                    "placeIdCard" => $cidPlace,
                    "sex" => $sex,
                    "address" => array(
                        "id" => null,
                        "provinceId" => null,
                        "provinceName" => "",
                        "provinceCode" => $province,
                        "districtId" => null,
                        "districtName" => "",
                        "districtCode" => $district,
                        "wardId" => null,
                        "wardName" => "",
                        "wardCode" => $ward,
                        "address" => $address
                    )
                );
                //Set Authorization
                $headers = [
                    'Accept: application/json',
                    'Content-Type: application/json',
                    'Authorization:' . $token,
                    'SessionKey:' . $sessionKey
                ];
                $result = $this->AccountInfoModels->updateAccountInfo($username, $headers, $dataCallApi);
                if ($result->status == 200) {
                    setcookie("__account", 'success', time() + (60 * 5), '/');
                    return redirect()->to('/thong-tin-tai-khoan');
                } else {
                    setcookie("__account", 'false|' . $result->message, time() + (60 * 5), '/');
                    return redirect()->to('/thong-tin-tai-khoan');
                }
            }
        }

        $data['editAccount'] = 1;
        $data['validate'] = 0;
        $data['dataUser'] = $dataUser;
        $data['userLogin'] =  md5($username);
        $data['dataProvince'] = $dataProvince;
        $data['dataDistrict'] = $dataDistrict;
        $data['dataWards'] = $dataWards;
        // print_r($dataProvince);die;
        $data['title'] = $title;
        $data['view'] = 'App\Modules\AccountInfo\Views\editAccountInfo';
        return view('layoutShop/layout', $data);
    }
    public function editContractInfo()
    {
        $data = [];
        $dataUser = [];
        // Get Key redis  
        $post = $this->request->getPost();
        $dataUserAuthen = json_decode($this->redis->get($this->krd));
        if (empty($dataUserAuthen)) {
            $this->authenticator->logOut();
        }
        $dataUser = $this->userCommon->getUser($dataUserAuthen);
        $dataUser->availableBalance = $this->dataBalance;


        $username = $dataUser->username;
        $phoneOTP = $dataUser->phoneOTP;
        $token = $dataUserAuthen->token;
        $sessionKey = $dataUserAuthen->sessionKey;

        $dataUserCache = json_decode($this->redis->get($dataUserAuthen->username));
        $title = lang('Label.lbl_updateAccount');
        $dataCallApi = array(
            'withdrawType' => 0
        );
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:' . $token
        ];

        $reposeListBank = $this->AccountInfoModels->getListBank($username, $headers, $dataCallApi);
        $listBanks = [];
        $primaryBanks = [];
        if ($reposeListBank->status == 200) {
            $listBanks = $reposeListBank->data->banks;
            $primaryBanks = end($listBanks);
        }
        $bankInfo = json_decode($this->redis->get('BANK_INFO'));
        if (!empty($post)) {
            //Check Validation form
            if ($post['contractType'] == 2) {
                //Doanh nghiệp
                $this->validation->setRules([
                    'companyName'               => [
                        'label' => 'Label.lbl_companyName',
                        'rules' => 'required',
                        'errors' => []
                    ],
                    'representative'               => [
                        'label' => 'Label.lbl_surrogater',
                        'rules' => 'required',
                        'errors' => []
                    ],
                    'businessPosition'               => [
                        'label' => 'Label.lbl_position',
                        'rules' => 'required',
                        'errors' => []
                    ],
                    'addressByBR'               => [
                        'label' => 'Label.lbl_addressBusinessRegistration',
                        'rules' => 'required',
                        'errors' => []
                    ],
                    'bsPhone'               => [
                        'label' => 'Label.lbl_bsPhone',
                        'rules' => 'required',
                        'errors' => []
                    ],
                    'bsTax'               => [
                        'label' => 'Label.lbl_bsTax',
                        'rules' => 'required',
                        'errors' => []
                    ],
                    'bankIdchosen'               => [
                        'label' => 'Label.lbl_bankCode',
                        'rules' => 'required|greater_than[0]',
                        'errors' => []
                    ],
                ]);
            } else {
                // Cá nhân
                $this->validation->setRules([

                    'representativePerson'               => [
                        'label' => 'Label.lbl_surrogater',
                        'rules' => 'required',
                        'errors' => []
                    ],
                    'personPosition'               => [
                        'label' => 'Label.lbl_position',
                        'rules' => 'required',
                        'errors' => []
                    ],
                    'addressByID'               => [
                        'label' => 'Label.lbl_addressByID',
                        'rules' => 'required',
                        'errors' => []
                    ],
                    'personDob'               => [
                        'label' => 'Label.lbl_dob',
                        'rules' => 'required',
                        'errors' => []
                    ],
                    'personIdDate'               => [
                        'label' => 'Label.lbl_cidDate',
                        'rules' => 'required',
                        'errors' => []
                    ],
                    'personId'               => [
                        'label' => 'Label.lbl_cid',
                        'rules' => 'required|numeric|min_length[9]|max_length[12]',
                        'errors' => []
                    ],
                    'personIdAddress'               => [
                        'label' => 'Label.lbl_cidPlace',
                        'rules' => 'required',
                        'errors' => []
                    ],
                    'bankIdchosen'               => [
                        'label' => 'Label.lbl_bankCode',
                        'rules' => 'required|greater_than[0]',
                        'errors' => []
                    ],
                ]);
            }
            $errfrontCid = 0;
            $errbackCid = 0;
            //Validate ảnh
            $arrTypeImg = ['image/jpeg', 'image/jpg', 'image/png'];
            if ($post['contractType'] == 1) {

                if ($post['oldFrontId'] == '') {
                    $errfrontCid = 1;
                    $errFrontBs = lang('Validation.lbl_frontCidErr');
                }
                if ($post['oldBackId'] == '') {
                    $errbackCid = 1;
                    $errBackBs = lang('Validation.lbl_backCidErr');
                }
            }
            $checkImg = 1;
            if ($post['contractType'] == 2) {
                $checkImg = $post['checkImg'];
            }

            $getErrors = [];
            if (!$this->validation->withRequest($this->request)->run() || $checkImg == 0 || $errfrontCid == 1 || $errbackCid == 1) {
                $getErrors = $this->validation->getErrors();
                if ($post['contractType'] == 1) {
                    if ($errbackCid == 1) {
                        $getErrors['backCid'] = $errBackBs;
                    }
                    if ($errfrontCid == 1) {
                        $getErrors['frontCid'] = $errFrontBs;
                    }
                }
                if ($checkImg == 0) {
                    $errBackBs = lang('Validation.lbl_BsRegisErr');
                    $getErrors['bsRegister'] = lang('Validation.lbl_BsRegisErr');
                }
                $contract = new \stdClass;
                $contract->type = $post['contractType'];
                // $contract->owner = $post['representativePerson']; 
                $contract->companyName = $post['companyName'];
                $contract->position =  ($post['contractType'] == 1) ? $post['personPosition'] : $post['businessPosition'];
                $contract->owner = ($post['contractType'] == 1) ? $post['representativePerson'] : $post['representative'];
                if ($post['contractType'] == 1) {
                    $addressByID = $post['addressByID'];
                } else {
                    $addressByID = $post['addressByBR'];
                }

                $contract->address = $addressByID;
                $contract->dob = $post['personDob'];
                $contract->idCard = $post['personId'];
                $contract->idCardDate = $post['personIdDate'];
                $contract->idCardPlace = $post['personIdAddress'];
                $contract->companyName = $post['companyName'];
                $contract->authorityNumber = $post['businessAuthority'];
                $contract->phone = $post['bsPhone'];
                $contract->fax = $post['bsFax'];
                $contract->taxCode = $post['bsTax'];

                $data['primaryBanks'] = $primaryBanks;
                $data['bankInfo'] = $bankInfo;
                $data['listBanks'] = $listBanks;
                $data['getErrors'] = $getErrors;
                $data['validate'] = 1;
                $data['dataUser'] = $dataUser;
                $data['dataPost'] = $post;
                $data['contract'] = $contract;
                $data['phoneOtp'] = $dataUser->phoneOTP;
                $data['dataUserCache'] = $dataUserCache;
                $data['view'] = 'App\Modules\AccountInfo\Views\editContractInfo';
                $data['listValues'] = $post;
                return view('layoutShop/layout', $data);
            } else {
                if ($post['contractType'] == 1) {

                    $previewFrontIdPath = $post['oldFrontId'];
                    $previewBackIdPath = $post['oldBackId'];
                    $post['previewFrontPath'] = $previewFrontIdPath;
                    $post['previewBackPath'] = $previewBackIdPath;
                } else {

                    $img = $post['inputImg'];
                    $post['previewFrontPath'] = $img[0];
                    $post['previewBackPath'] = '';
                    if (isset($img[1])) {
                        $post['previewBackPath'] = $img[1];
                    }
                }
                $this->redis->set('ACCOUNT_INFO_' . $username, json_encode($post, JSON_UNESCAPED_UNICODE), TIME_ORDER_DRAFT);
                return redirect()->to('/chi-tiet-thay-doi-thong-tin');
            }
        }
        $contract = [];
        if ($dataUser->contract != '') {
            $contract = $dataUser->contract;
            $primaryBanks = $contract->bankAccount;
        }
        $data['primaryBanks'] = $primaryBanks;
        $data['contract'] = $contract;
        $data['bankInfo'] = $bankInfo;
        $data['listBanks'] = $listBanks;
        $data['validate'] = 0;
        $data['dataUser'] = $dataUser;
        $data['userLogin'] =  md5($username);
        $data['dataUserCache'] = $dataUserCache;
        // print_r($dataProvince);die;
        $data['title'] = $title;
        $data['view'] = 'App\Modules\AccountInfo\Views\editContractInfo';
        return view('layoutShop/layout', $data);
    }

    public function resizeImage($fileImg, $base64 = 0)
    {
        if ($base64 == 1) {

            $image = imagecreate(500, 300);

            $output_file = FCPATH . "uploads/imgTmp/";
            $fileName = time() . rand(1000, 9999);
            imagejpeg($image, $output_file . $fileName . '.jpg');

            // move_uploaded_file($image,$output_file);
            // echo 1111;die;
            $ifp = fopen($output_file . $fileName . '.jpg', 'wb');

            $data = explode(',', $fileImg);
            fwrite($ifp, base64_decode($data[1]));

            fclose($ifp);
            $sourceProperties = getimagesize($output_file . $fileName . '.jpg');

            $ext = 'jpg';
            $file = $output_file . $fileName . '.jpg';
        } else {
            $file = $fileImg['tmp_name'];
            $sourceProperties = getimagesize($file);
            $ext = pathinfo($fileImg['name'], PATHINFO_EXTENSION);
        }

        $fileNewName = time();
        $folderPath = FCPATH . "uploads/imgTmp/";
        $imageType = $sourceProperties[2];
        $newName = $fileNewName . "_thump." . $ext;
        switch ($imageType) {

            case IMAGETYPE_PNG:
                $imageResourceId = imagecreatefrompng($file);
                $targetLayer = $this->imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1], $base64);
                imagepng($targetLayer, $folderPath . $newName);
                break;
                
            // case IMAGETYPE_WEBP:
            //     $imageResourceId = imagecreatefromwebp($file);
            //     $targetLayer = $this->imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1], $base64);
            //     imagepng($targetLayer, $folderPath . $newName);
            //     break;

            case IMAGETYPE_JPEG:
                $imageResourceId = imagecreatefromjpeg($file);
                $targetLayer = $this->imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1], $base64);
                imagejpeg($targetLayer, $folderPath . $newName);
                break;


            default:
                echo "Invalid Image type.";
                exit;
                break;
        }
        // move_uploaded_file($file, $folderPath. $fileNewName. ".". $ext);
        if ($base64 == 1) {
            $path = $output_file . $fileName . '.jpg';
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            $arrayResult = [
                'data' => $base64,
                'src' => $output_file . $fileName . '.jpg',
                'srcResize' => $folderPath . $newName,
            ];
            return $arrayResult;
        } else {

            $arrayImg['name'] = $newName;
            $arrayImg['tmp_name'] = $folderPath . $newName;
            $arrayImg['error'] = 0;
            $arrayImg['type'] = $sourceProperties['mime'];
            $arrayImg['size'] = 1;

            return $arrayImg;
        }
    }

    function imageResize($imageResourceId, $width, $height, $base64)
    {
        if ($base64 == 1) {
            $targetWidth  = 300;
            $targetHeight = 169;
        } else {
            $targetWidth  = 500;
            $targetHeight = 500;
        }
        $targetLayer = imagecreatetruecolor($targetWidth, $targetHeight);
        imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);

        return $targetLayer;
    }

    public function uploadImgs()
    {
        if (!empty($_FILES)) {
            $dataUserAuthen = json_decode($this->redis->get($this->krd));
            $dataUser = $this->userCommon->getUser($dataUserAuthen);
            $username = $dataUser->username;
            $_FILES['file'] = $this->resizeImage($_FILES['file']);
            $backCid = $_FILES['file'];
            $dataUploadImgBack = [
                'file' => $backCid['tmp_name'],
                'username' => $username,
                'file_type' => '1',
                'type' => $_FILES['file']['type'],
            ];

            $fileName = 'backCid_' . $username . '.jpg';
            $responseUploadBack = $this->AccountInfoModels->uploadImage($username, $dataUploadImgBack, $fileName);

            if ($responseUploadBack['status'] == 200) {
                $previewBackIdPath = $responseUploadBack['data']->file_url;
                $srcImg = URL_API_UPLOADIMG . $responseUploadBack['data']->file_url;
                $srcValue = $responseUploadBack['data']->file_url;
                unlink($backCid['tmp_name']);
                echo json_encode(array('success' => true, 'message' => 'succcess', 'status' => $responseUploadBack['status'], 'data' => $previewBackIdPath, 'srcImg' => $srcImg, 'srcValue' => $srcValue));
                die;
            } else {
                $headerBack = json_decode($responseUploadBack['header']);
                echo json_encode(array('success' => false, 'message' => 'false', 'status' =>  $responseUploadBack['status'], 'data' => $headerBack->message));
                die;
            }
        } else {
            echo json_encode(array('success' => false, 'message' => 'false', 'status' => '', 'data' => ''));
            die;
        }
        die;
    }
    public function addBanksContract()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            $dataUserAuthen = json_decode($this->redis->get($this->krd));
            $dataUser = $this->userCommon->getUser($dataUserAuthen);
            $dataUser->availableBalance = $this->dataBalance;

            $username = $dataUser->username;
            $bankCode = $post['bankCode'];
            $optradio = $post['accountNoType'];
            $accountNumber = $post['accountNumber'];
            $accountName = $post['accountName'];
            $token = $dataUserAuthen->token;
            // "accountNo" => $accountNumber,
            // "bankCode" => $bankCode,
            $dataCallApi = array(
                "username" => $username,
                "accUsername" => $accountName,
                "bankCode" => $bankCode,
                "accountNo" => $accountNumber,
                "accountNoType" => $optradio,
            );
            $headers = [
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization:' . $token
            ];

            $reponseAddBank = $this->banksModels->addBank($username, $headers, $dataCallApi);

            if ($reponseAddBank->status == 200) {
                $dataBank = $reponseAddBank->data;
                $dataHtml = '';
                $onclick = "changeBanks(" . $dataBank->id . ",'" . $dataBank->bankShortName . "','" . base_url('public/images/Bank_Logos/' . $dataBank->bankShortName . '.png') . "','" . $dataBank->bankAccount . "')";
                $dataHtml .= '<div class="dropdown-item pl-0  orDetail-data-select" href="#" style="padding-left: 21px!important;" onclick="' . $onclick . '">';
                $dataHtml .= '<span style="color: #28262B;font-size: 14px;">' . $dataBank->bankShortName . ' ' . $dataBank->bankAccount . '</span><br>';
                $dataHtml .= '<img src="' . base_url('public/images/Bank_Logos/' . $dataBank->bankShortName . '.png') . '" alt="">';
                $dataHtml .= '<span style="color: #68656D;font-size: 12px;">' . $dataBank->bankShortName . '</span>';
                $dataHtml .= '</div>';

                echo json_encode(array('success' => true, 'message' => 'succcess', 'status' => $reponseAddBank->status, 'data' => $reponseAddBank->message, 'dataHtml' => $dataHtml));
                die;
            } else {
                echo json_encode(array('success' => false, 'message' => 'false', 'status' => $reponseAddBank->status, 'data' => $reponseAddBank->message));
                die;
            }
        } else {
            echo json_encode(array('success' => false, 'message' => 'false', 'status' => '', 'data' => ''));
            die;
        }
    }
    public function previewUpdate()
    {
        $data = [];
        $dataUser = [];
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $dataUserCache = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser = $this->userCommon->getUser($dataUserAuthen);
        $dataUser->availableBalance = $this->dataBalance;

        $username = $dataUserAuthen->username;

        $dataAccountRedis = $this->redis->get('ACCOUNT_INFO_' . $username);
        if ($dataAccountRedis == '') {
            setcookie("__account", 'false|Có lỗi khi cập nhật hợp đồng. Vui lòng liên hệ admin.', time() + (60 * 5), '/');
            return redirect()->to('/thong-tin-tai-khoan');
        } else {
            $dataAccount = json_decode($dataAccountRedis);
        }
        $token = $dataUserAuthen->token;
        $dataCallApi = array(
            'withdrawType' => 0
        );
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:' . $token
        ];
        $reposeListBank = $this->AccountInfoModels->getListBank($username, $headers, $dataCallApi);
        $dataBank = [];
        if ($reposeListBank->status == 200) {
            $dataBanks = $reposeListBank->data->banks;
            $dataBank = $this->AccountInfoModels->getBankById($username, $dataBanks, $dataAccount->bankIdchosen);
        }
        $data['listBanks'] = $dataBank;
        $data['dataUserCache'] = $dataUserCache;
        $data['dataUser'] = $dataUser;
        $data['dataAccount'] = $dataAccount;

        $data['title'] = 'Chi tiêt hợp đồng';
        $data['view'] = 'App\Modules\AccountInfo\Views\previewUpdateInfo';
        return view('layoutShop/layout', $data);
    }
    public function detailContract()
    {
        $data = [];
        $dataUser = [];
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $username = $dataUserAuthen->username;
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;
        if (empty($dataUserAuthen)) {
            $this->authenticator->logOut();
        }
        $token = $dataUserAuthen->token;
        $dataCallApi = array(
            'withdrawType' => 0
        );
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:' . $token
        ];
        $reposeListBank = $this->AccountInfoModels->getListBank($username, $headers, $dataCallApi);

        $dataUserCache = json_decode($this->redis->get($dataUserAuthen->username));

        $dataAccountRedis = $this->redis->get('ACCOUNT_INFO_' . $username);
        if ($dataAccountRedis == '') {
            setcookie("__account", 'false|Có lỗi khi cập nhật hợp đồng. Vui lòng liên hệ admin.', time() + (60 * 5), '/');
            return redirect()->to('/thong-tin-tai-khoan');
        } else {
            $dataAccount = json_decode($dataAccountRedis);
        }

        $token = $dataUserAuthen->token;
        $dataCallApi = array(
            'withdrawType' => 0
        );
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:' . $token
        ];
        $reposeListBank = $this->AccountInfoModels->getListBank($username, $headers, $dataCallApi);
        $dataBank = [];
        if ($reposeListBank->status == 200) {
            $dataBanks = $reposeListBank->data->banks;
            $dataBank = $this->AccountInfoModels->getBankById($username, $dataBanks, $dataAccount->bankIdchosen);
        }
        $data['listBanks'] = $dataBank;

        $data['dataAccount'] = $dataAccount;
        $data['dataUser'] = $dataUser;
        $data['dataUserCache'] = $dataUserCache;
        $data['dataAccount'] = $dataAccount;


        $data['title'] = 'Chi tiêt hợp đồng';
        $data['view'] = 'App\Modules\AccountInfo\Views\detailContract';
        return view('layoutShop/layout', $data);
    }
    public function exportPdf()
    {
        $dataUserAuthen = json_decode($this->redis->get($this->krd));
        if (empty($dataUserAuthen)) {
            $this->authenticator->logOut();
        }
        $dataUser = $this->userCommon->getUser($dataUserAuthen);
        $dataUser->availableBalance = $this->dataBalance;
        $username = $dataUser->username;
        $token = $dataUserAuthen->token;
        $dataCallApi = array(
            'withdrawType' => 0
        );
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:' . $token
        ];
        $reposeListBank = $this->AccountInfoModels->getListBank($username, $headers, $dataCallApi);
        $listBanks = [];
        if ($reposeListBank->status == 200) {
            $dataBanks = $reposeListBank->data->banks;
            $listBanks = end($dataBanks);
        }

        $dataAccountRedis = $this->redis->get('ACCOUNT_INFO_' . $username);
        if ($dataAccountRedis == '') {
            setcookie("__account", 'false|Có lỗi khi cập nhật hợp đồng. Vui lòng liên hệ admin.', time() + (60 * 5), '/');
            return redirect()->to('/thong-tin-tai-khoan');
        } else {
            $dataAccount = json_decode($dataAccountRedis);
        }
        $data['listBanks'] = $listBanks;
        $data['dataUser'] = $dataUser;
        $data['dataAccount'] = $dataAccount;

        $dompdf = new Dompdf();
        $dataView = view('App\Modules\AccountInfo\Views\exportPdfView', $data);

        $dompdf->set_option('isRemoteEnabled', true);;
        $dompdf->loadHtml($dataView, 'UTF-8');
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->getOptions()->set('defaultFont', 'Inter');
        $dompdf->render();

        // the same call as in my previous example
        $pdf = $dompdf->output();
        //Save file PDF local
        $file_location = FCPATH . "/uploads/contracts_pdf/contract_" . $username . ".pdf";
        file_put_contents($file_location, $pdf);
        $fileName = "contract_" . $username . ".pdf";
        $dataUploadImg = [
            'file' => $file_location,
            'username' => $username,
            'file_type' => '1',
            'type' => 'application/pdf'
        ];

        //Push file pdf to server
        $responseUpload = $this->AccountInfoModels->uploadImage($username, $dataUploadImg, $fileName);
        if ($responseUpload['status'] == 200) {
            $headerContract = json_decode($responseUpload['header']);

            $previewContractPathDoc = $responseUpload['data']->file_url;
            //Create contract;\

            $representative = ($dataAccount->contractType == 1)  ? $dataAccount->representativePerson : $dataAccount->representative;

            $companyName = ($dataAccount->contractType == 2)  ? $dataAccount->companyName : $dataUser->company;
            $position = ($dataAccount->contractType == 2)  ? $dataAccount->businessPosition : $dataAccount->personPosition;
            $address = ($dataAccount->contractType == 2)  ? $dataAccount->addressByBR : $dataAccount->addressByID;
            $dob = ($dataAccount->contractType == 2)  ? '' : $dataAccount->personDob;
            $cid = ($dataAccount->contractType == 2)  ? '' : $dataAccount->personId;
            $cidDate = ($dataAccount->contractType == 2)  ? '' : $dataAccount->personIdDate;
            $cidPlace = ($dataAccount->contractType == 2)  ? '' : $dataAccount->personIdAddress;
            $phone = ($dataAccount->contractType == 2)  ? $dataAccount->bsPhone : $dataUser->phoneOTP;
            $tax = ($dataAccount->contractType == 2)  ? $dataAccount->bsTax : '';
            $fax = ($dataAccount->contractType == 2)  ? $dataAccount->bsFax : '';
            $type = $dataAccount->contractType;
            $bankIdchosen = $dataAccount->bankIdchosen;
            $businessAuthority = $dataAccount->businessAuthority;
            $previewBackPath = $dataAccount->previewBackPath;
            $previewFrontPath = $dataAccount->previewFrontPath;
            $previewContractPath = $previewContractPathDoc;

            $dataCreateContract = [
                "companyName" => $companyName,
                "owner" =>  $representative,
                "phone" =>  $phone,
                "position" =>  $position,
                "address" =>  $address,
                "dob" =>  $dob,
                "fax" =>  $fax,
                "idCard" =>  $cid,
                "idCardDate" =>  $cidDate,
                "idCardPlace" =>  $cidPlace,
                "authorityNumber" =>  $businessAuthority,
                "bankAccountId" =>  $bankIdchosen,
                "cardBackUrl" =>  $previewBackPath,
                "cardFrontUrl" =>  $previewFrontPath,
                "contractFileUrl" =>  $previewContractPath,
                "signatureUrl" =>  $previewContractPath,
                "taxCode" =>  $tax,
                "type" =>  $type
            ];

            $headers = [
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization:' . $token
            ];
            $responseCreateContract = $this->AccountInfoModels->createContract($username, $headers, $dataCreateContract);
            if ($responseCreateContract->status == 200) {
                setcookie("__account", 'success|Cập nhật hợp đồng thành công.', time() + (60 * 5), '/');
                return redirect()->to('/thong-tin-tai-khoan');
            } else {
                setcookie("__account", 'false|Có lỗi khi cập nhật hợp đồng. Vui lòng liên hệ admin.', time() + (60 * 5), '/');
                return redirect()->to('/thong-tin-tai-khoan');
            }
        } else {
            setcookie("__account", 'false|Có lỗi khi cập nhật hợp đồng. Vui lòng liên hệ admin.', time() + (60 * 5), '/');
            return redirect()->to('/thong-tin-tai-khoan');
        }
    }
    public function exportPdfView()
    {
        $dataUserAuthen = json_decode($this->redis->get($this->krd));
        if (empty($dataUserAuthen)) {
            $this->authenticator->logOut();
        }
        $dataUser = $this->userCommon->getUser($dataUserAuthen);
        $username = $dataUser->username;
        $dataAccountRedis = $this->redis->get('ACCOUNT_INFO_' . $username);
        if ($dataAccountRedis == '') {
            setcookie("__account", 'false|Có lỗi khi cập nhật hợp đồng. Vui lòng liên hệ admin.', time() + (60 * 5), '/');
            return redirect()->to('/thong-tin-tai-khoan');
        } else {
            $dataAccount = json_decode($dataAccountRedis);
        }
        $token = $dataUserAuthen->token;
        $dataCallApi = array(
            'withdrawType' => 0
        );
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:' . $token
        ];
        $reposeListBank = $this->AccountInfoModels->getListBank($username, $headers, $dataCallApi);
        $listBanks = [];
        if ($reposeListBank->status == 200) {
            $dataBanks = $reposeListBank->data->banks;
            $listBanks = end($dataBanks);
        }
        $data['dataUser'] = $dataUser;
        $data['listBanks'] = $listBanks;
        $data['dataAccount'] = $dataAccount;
        $data['title'] = 'Chi tiêt hợp đồng';
        $get = $this->request->getGet();
        if (!empty($get)) {
            $dompdf = new Dompdf();
            $dataView = view('App\Modules\AccountInfo\Views\exportPdfView', $data);

            $dompdf->set_option('isRemoteEnabled', true);;
            $dompdf->loadHtml($dataView, 'UTF-8');
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->getOptions()->set('defaultFont', 'Inter');
            $dompdf->render();
            $dompdf->stream();
        }
        $data['view'] = 'App\Modules\AccountInfo\Views\exportPdfView';
        return view('App\Modules\AccountInfo\Views\exportPdfView', $data);
    }
    public function uploadImage($data)
    {
        $upload_path = FCPATH . 'uploads/contracts_pdf';
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, TRUE);
        }
        $newName = $data->getRandomName();

        $data->move($upload_path, $newName);
        return 'uploads/contracts_pdf/' . $newName;
    }

    public function editAcountSignature()
    {
        $data = [];
        $dataUser = [];
        // Get Key redis  
        $post = $this->request->getPost();
        // print_r($post);die;
        $dataUserAuthen = json_decode($this->redis->get($this->krd));
        if (empty($dataUserAuthen)) {
            $this->authenticator->logOut();
        }
        $dataUser = $this->userCommon->getUser($dataUserAuthen);
        $dataUser->availableBalance = $this->dataBalance;
        $username = $dataUser->username;
        $title = lang('Label.lbl_updateAccount');
        $dataAccountRedis = $this->redis->get('ACCOUNT_INFO_' . $username);
        
        if (!empty($post)) {
            $dataAccountRedis = $this->redis->get('ACCOUNT_INFO_' . $username);
            if ($dataAccountRedis == '') {
                setcookie("__account", 'false|Có lỗi khi cập nhật hợp đồng. Vui lòng liên hệ admin.', time() + (60 * 5), '/');
                return redirect()->to('/thong-tin-tai-khoan');
            } else {
                $dataAccount = json_decode($dataAccountRedis);
            }

            $dataCallApi = array(
                'withdrawType' => 0
            );

            $token = $dataUserAuthen->token;
            $headers = [
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization:' . $token
            ];
            $reposeListBank = $this->AccountInfoModels->getListBank($username, $headers, $dataCallApi);
            $listBanks = [];
            if ($reposeListBank->status == 200) {
                $dataBanks = $reposeListBank->data->banks;
                $listBanks = end($dataBanks);
            }
            $dataAccount->imgSignatureValue = $post['imgSignaturePreview'];
            $data['listBanks'] = $listBanks;
            $data['dataUser'] = $dataUser;
            $resizeSignal = $this->resizeImage($dataAccount->imgSignatureValue, 1);
            unlink($resizeSignal['src']);
            unlink($resizeSignal['srcResize']);
            $dataAccount->imgSignatureValue = $resizeSignal['data'];
            $data['dataAccount'] = $dataAccount;
            $dompdf = new Dompdf();
            $dataView = view('App\Modules\AccountInfo\Views\exportPdfView', $data);

            $dompdf->set_option('isRemoteEnabled', true);;
            $dompdf->loadHtml($dataView, 'UTF-8');
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->getOptions()->set('defaultFont', 'Inter');
            $dompdf->render();

            // the same call as in my previous example
            $pdf = $dompdf->output();
            //Save file PDF local
            $file_location = FCPATH . "/uploads/contracts_pdf/contract_" . $username . ".pdf";
            try {
                file_put_contents($file_location, $pdf);
            } catch (\Throwable $th) {
                $this->logger->info('SIGNATURE - PUSH FILE - USERNAME_ERRORS: ' . $username . '|| ' . $th, array(), 'CALLAPI');
            }
            $fileName = "contract_" . $username . ".pdf";
            $dataUploadImg = [
                'file' => $file_location,
                'username' => $username,
                'file_type' => '1',
                'type' => 'application/pdf'
            ];

            //Push file pdf to server
            $responseUpload = $this->AccountInfoModels->uploadImage($username, $dataUploadImg, $fileName);
            if ($responseUpload['status'] == 200) {
                // $headerContract = json_decode($responseUpload['header']);
                $previewContractPathDoc = $responseUpload['data']->file_url;
            } else {
                setcookie("__account", 'false|Có lỗi khi cập nhật hợp đồng. Vui lòng liên hệ admin.', time() + (60 * 5), '/');
                return redirect()->to('/thong-tin-tai-khoan');
            }
            //Create contract;\

            $representative = ($dataAccount->contractType == 1)  ? $dataAccount->representativePerson : $dataAccount->representative;

            $companyName = ($dataAccount->contractType == 2)  ? $dataAccount->companyName : $dataUser->company;
            $position = ($dataAccount->contractType == 2)  ? $dataAccount->businessPosition : $dataAccount->personPosition;
            $address = ($dataAccount->contractType == 2)  ? $dataAccount->addressByBR : $dataAccount->addressByID;
            $dob = ($dataAccount->contractType == 2)  ? $dataUser->birthday : $dataAccount->personDob;
            $cid = ($dataAccount->contractType == 2)  ? '' : $dataAccount->personId;
            $cidDate = ($dataAccount->contractType == 2)  ? '' : $dataAccount->personIdDate;
            $cidPlace = ($dataAccount->contractType == 2)  ? '' : $dataAccount->personIdAddress;
            $phone = ($dataAccount->contractType == 2)  ? $dataAccount->bsPhone : $dataUser->phoneOTP;
            $tax = ($dataAccount->contractType == 2)  ? $dataAccount->bsTax : '';
            $fax = ($dataAccount->contractType == 2)  ? $dataAccount->bsFax : '';
            $type = $dataAccount->contractType;
            $bankIdchosen = $dataAccount->bankIdchosen;
            $businessAuthority = $dataAccount->businessAuthority;
            $previewBackPath = $dataAccount->previewBackPath;
            $previewFrontPath = $dataAccount->previewFrontPath;
            $previewContractPath = $previewContractPathDoc;
            $imgSignaturePath = $post['imgSignaturePath'];

            $dataCreateContract = [
                "companyName" => $companyName,
                "owner" =>  $representative,
                "phone" =>  $phone,
                "position" =>  $position,
                "address" =>  $address,
                "dob" =>  $dob,
                "fax" =>  $fax,
                "idCard" =>  $cid,
                "idCardDate" =>  $cidDate,
                "idCardPlace" =>  $cidPlace,
                "authorityNumber" =>  $businessAuthority,
                "bankAccountId" =>  $bankIdchosen,
                "cardBackUrl" =>  $previewBackPath,
                "cardFrontUrl" =>  $previewFrontPath,
                "contractFileUrl" =>  $previewContractPath,
                "signatureUrl" =>  $imgSignaturePath,
                "taxCode" =>  $tax,
                "type" =>  $type
            ];
            
            $responseCreateContract = $this->AccountInfoModels->createContract($username, $headers, $dataCreateContract);
            if ($responseCreateContract->status == 200) {
                setcookie("__account", 'success|Cập nhật hợp đồng thành công.', time() + (60 * 5), '/');
                echo json_encode(array('success' => true, 'message' => 'succcess', 'status' => $responseCreateContract->status, 'data' => $responseCreateContract->message, 'href' => base_url('/thong-tin-tai-khoan')));
                die;
                die;
            } else {
                setcookie("__account", 'false|' . $responseCreateContract->message, time() + (60 * 5), '/');
                echo json_encode(array('success' => false, 'message' => 'false', 'status' => $responseCreateContract->status, 'data' => $responseCreateContract->message, 'href' => base_url('/thong-tin-tai-khoan')));
                die;
            }
        }
        $data['validate'] = 0;
        $data['dataUser'] = $dataUser;
        $data['userLogin'] =  md5($username);
        // print_r($dataProvince);die;
        $data['title'] = $title;
        $data['view'] = 'App\Modules\AccountInfo\Views\accountInfoSignature';
        return view('layoutShop/layout', $data);
    }

    public function checkVA()
    {
        //  print_r("antu");die;
        $dataUser = json_decode($this->redis->get($this->krd));


        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: ' . $dataUser->token,
        ];


        $respon = $this->AccountInfoModels->checkVA($headers);

        $html = '';
        if ($respon->data == null && $respon->code == 200) {
            $html .= '<div class="modal-dialog modal-lg">';
            $html .= '    <div class="modal-content">';
            $html .= '        <div class="modal-header">';
            $html .= '            <h4 class="modal-title text-center w-100 pt-10"> Thông báo </h4>';
            $html .= '           <button type="button" class="close" data-dismiss="modal">&times;</button>';
            $html .= '        </div>';
            $html .= '        <div class="modal-body">';
            $html .= '            <p class="text-center"> Quý khách vui lòng <br> nạp tiền vào tài khoản định danh để sử dụng dịch vụ </p>';
            $html .= '            <button type="button" class="activeVA" onclick="activeVA()"> Kích hoạt tài khoản định danh </button> ';
            $html .= '        </div>';
            $html .= '    </div>';
            $html .= '</div>';
            echo json_encode(array('success' => true, 'message' => 'Check tài khoản định danh thành công', 'data' => $respon, 'html' => $html));
            die;
        } else if ($respon->data != null && $respon->code == 200) {
            if ($respon->data->shopCode != null || $respon->data->shipCode != null) {
                $codeVA = 0;
                if ($respon->data->shipCode != null) {
                    $codeVA = $respon->data->shipCode;
                } else if ($respon->data->shopCode != null) {
                    $codeVA = $respon->data->shopCode;
                }
            }
            $html .= '<div class="modal-dialog modal-lg">';
            $html .= '    <div class="modal-content">';
            $html .= '      <div class="modal-header">';
            $html .= '       <h4 class="modal-title text-center w-100 pt-10"> Thông báo </h4>';
            $html .= '       <button type="button" class="close" data-dismiss="modal">&times;</button>';
            $html .= '      </div>';
            $html .= '      <div class="modal-body pt-2">';
            $html .= '        <p class="text-center"> Quý khách vui lòng <br> nạp tiền vào tài khoản định danh để sử dụng dịch vụ</p>';
            $html .= '        <div class="card-imedia-bank"><img src="' . base_url('public/images/Theimedia.svg') . '"> ';
            $html .= ' <div class="logo-bank"><img class="bankImg" src="' . base_url('public/images/Bank_Logos/' . $respon->data->bankName) . '.png"  alt="">';
            $html .= '  <span class="bankName">' . $respon->data->bankName . '</span></div><span>';
            $html .=         substr($codeVA, 0, 4) . ' ' . substr($codeVA, 4, 4) . ' ' . substr($codeVA, 8, 4) . ' ' . substr($codeVA, 12, 4) . ' ' . substr($codeVA, 16, 4) . '</span></div><br>';
            $html .= '       <span> Trong trường hợp cần gấp,<br> Quý Khách vui lòng liên hệ Hotline <a href="tel:1900234539">1900 2345 39 </a>  để được hỗ trợ </span>';
            $html .= '     </div>';
            $html .= '   </div>';
            $html .= '  </div>';
            echo json_encode(array('success' => true, 'message' => 'Check tài khoản định danh thành công', 'data' => $respon, 'html' => $html));
            die;
        } else {
            echo json_encode(array('success' => false, 'message' => 'Có lỗi trong quá trình lấy VA', 'data' => $respon));
            die;
        }
    }

    public function activeVA()
    {
        $dataUser = json_decode($this->redis->get($this->krd));
        $username = $dataUser->username;
        $sessionKey = $dataUser->sessionKey;

        $data = [
            'username' => $username,
            'sessionKey' => $sessionKey,
        ];

        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: ' . $dataUser->token,
        ];

        $activeVA = $this->AccountInfoModels->activeVA($data, $headers);

        if ($activeVA->status == 200) {
            $respon = $this->AccountInfoModels->checkVA($headers);
            $html = '';
            if ($respon->data->shopCode != null || $respon->data->shipCode != null) {
                $codeVA = 0;
                if ($respon->data->shipCode != null) {
                    $codeVA = $respon->data->shipCode;
                } else if ($respon->data->shopCode != null) {
                    $codeVA = $respon->data->shopCode;
                }
            }
            $html .= '<div class="modal-dialog modal-lg">';
            $html .= '    <div class="modal-content">';
            $html .= '      <div class="modal-header">';
            $html .= '       <h4 class="modal-title text-center w-100 pt-10"> Thông báo </h4>';
            $html .= '       <button type="button" class="close" data-dismiss="modal">&times;</button>';
            $html .= '      </div>';
            $html .= '      <div class="modal-body pt-2">';
            $html .= '        <p class="text-center"> Quý khách vui lòng <br>nạp tiền vào tài khoản định danh để sử dụng dịch vụ </p>';
            $html .= '        <div class="card-imedia-bank"><img src="' . base_url('public/images/hst/Theimedia.svg') . '"> ';
            $html .= ' <div class="logo-bank"><img class="bankImg" src="' . base_url('public/images/Bank_Logos/' . $respon->data->bankName) . '.png"  alt="">';
            $html .= '  <span class="bankName">' . $respon->data->bankName . '</span></div><span>';
            $html .=         substr($codeVA, 0, 4) . ' ' . substr($codeVA, 4, 4) . ' ' . substr($codeVA, 8, 4) . ' ' . substr($codeVA, 12, 4) . ' ' . substr($codeVA, 16, 4) . '</span></div><br>';
            $html .= '       <span> Trong trường hợp cần gấp,<br> Quý Khách vui lòng liên hệ Hotline <a href="tel:1900234539">1900 2345 39 </a> để được hỗ trợ </span>';
            $html .= '     </div>';
            $html .= '   </div>';
            $html .= '  </div>';
            echo json_encode(array('success' => true, 'message' => 'Kích hoạt tài khoản định danh thành công', 'data' => $respon, 'html' => $html));
            die;
        } else {
            echo json_encode(array('success' => false, 'message' => 'Có lỗi trong quá trình kích hoạt VA', 'data' => $activeVA));
            die;
        }
    }
    public function updateContractCustomer()
    {
        $dataUserAuthen = json_decode($this->redis->get($this->krd));
        if (empty($dataUserAuthen)) {
            $this->authenticator->logOut();
        }
        $dataUser = $this->userCommon->getUser($dataUserAuthen);
        $dataUser->availableBalance = $this->dataBalance;
        $title = 'Cập nhật hợp đồng cho khách';
        $token = $dataUserAuthen->token;
        $username = $dataUserAuthen->username;
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:' . $token
        ];

        $resultGetListUser = $this->AccountInfoModels->getListUserContract($headers);
        $dataListUser = [];
        if($resultGetListUser->status == 200){
            $dataListUser = $resultGetListUser->data;
        }
        $token = $dataUserAuthen->token;
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:' . $token
        ];
        
        $dataCallApi = array(
            'withdrawType' => 0
        );
        $reposeListBank = $this->AccountInfoModels->getListBank($username, $headers, $dataCallApi);
        $listBanks = [];
        if ($reposeListBank->status == 200) {
            $dataBanks = $reposeListBank->data->banks;
            $listBanks = end($dataBanks);
        }
        $post = $this->request->getPost();
        if(!empty($post)){
            $imgSignaturePath = $post['imgSignaturePath'];
            $userIdContract = $post['userIdContract'];
            $dataGetDetail = [
                'appUserId'=> $userIdContract
            ];
            $previewContractPathDoc = '';
            $dataAcountInfo = [];
            $responseGetInfoContractUser = $this->AccountInfoModels->getDetailUserContract($headers, $dataGetDetail);
            if($responseGetInfoContractUser->status == 200 ){
                $inputArr[0] = $responseGetInfoContractUser->data->cardFrontUrl;
                $inputArr[1] = $responseGetInfoContractUser->data->cardBackUrl;
                $dataAcountInfo = [
                    'contractType' => '1',
                    'representativePerson' => $responseGetInfoContractUser->data->owner,
                    'personPosition' => $responseGetInfoContractUser->data->position,
                    'addressByID' => $responseGetInfoContractUser->data->address,
                    'personDob' => $responseGetInfoContractUser->data->idCardDate,
                    'personId' => $responseGetInfoContractUser->data->idCard,
                    'personIdDate' => $responseGetInfoContractUser->data->idCardDate,
                    'personIdAddress' => $responseGetInfoContractUser->data->idCardPlace,
                    'oldFrontId' => $responseGetInfoContractUser->data->cardFrontUrl,
                    'frontCid' => '',
                    'oldBackId' => $responseGetInfoContractUser->data->previewBackPath,
                    'backCid' => '',
                    'companyName' => $responseGetInfoContractUser->data->companyName,
                    'representative' => $responseGetInfoContractUser->data->owner,
                    'businessPosition' => $responseGetInfoContractUser->data->position,
                    'businessAuthority' => '',
                    'addressByBR' => $responseGetInfoContractUser->data->address,
                    'bsPhone' => $responseGetInfoContractUser->data->phone,
                    'bsFax' => $responseGetInfoContractUser->data->fax,
                    'bsTax' => $responseGetInfoContractUser->data->taxCode,
                    'inputImg' => $inputArr,
                    'checkImg' => '1',
                    'frontBsRegis' => '',
                    'bankIdchosen' =>  $responseGetInfoContractUser->data->bankAccountId,
                    'bankCode' => '0',
                    'accountName' => '',
                    'accountNoType' => '0',
                    'accountNumber' => '',
                    'previewFrontPath' => $responseGetInfoContractUser->data->cardFrontUrl,
                    'previewBackPath' => $responseGetInfoContractUser->data->cardBackUrl,
                ];
                $dataAccount = (object) $dataAcountInfo;
    
                $dataAccount->imgSignatureValue = $post['imgSignatureValue'];
                $resizeSignal = $this->resizeImage($dataAccount->imgSignatureValue, 1);
                unlink($resizeSignal['src']);
                unlink($resizeSignal['srcResize']);
                $dataAccount->imgSignatureValue = $resizeSignal['data'];
                
                $data['listBanks'] = $listBanks;
                $data['dataUser'] = $dataUser;
                $data['dataAccount'] = $dataAccount;
                //Push PDF 
                $dompdf = new Dompdf();
                $dataView = view('App\Modules\AccountInfo\Views\exportPdfView', $data);
    
                $dompdf->set_option('isRemoteEnabled', true);;
                $dompdf->loadHtml($dataView, 'UTF-8');
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->getOptions()->set('defaultFont', 'Inter');
                $dompdf->render();
    
                // the same call as in my previous example
                $pdf = $dompdf->output();
                //Save file PDF local
                $file_location = FCPATH . "/uploads/contracts_pdf/contract_" . $username . ".pdf";
                try {
                    file_put_contents($file_location, $pdf);
                } catch (\Throwable $th) {
                    $this->logger->info('SIGNATURE - PUSH FILE - USERNAME_ERRORS: ' . $username . '|| ' . $th, array(), 'CALLAPI');
                }
                $fileName = "contract_" . $username . ".pdf";
                $dataUploadImg = [
                    'file' => $file_location,
                    'username' => $username,
                    'file_type' => '1',
                    'type' => 'application/pdf'
                ];
    
                //Push file pdf to server
                $responseUpload = $this->AccountInfoModels->uploadImage($username, $dataUploadImg, $fileName);
                if ($responseUpload['status'] == 200) {
                    // $headerContract = json_decode($responseUpload['header']);
                    $previewContractPathDoc = $responseUpload['data']->file_url;
                } else {
                    setcookie("__updateContract", 'false^_^Có lỗi khi cập nhật hợp đồng. Vui lòng liên hệ admin.', time() + (30), '/');
                    return redirect()->to('/thong-tin-tai-khoan');
                }
                //End push PDF
                if($previewContractPathDoc != ''){
                    $dataUpdateContract = [
                        "appUserId" => $userIdContract,
                        "contractFileUrl" => $previewContractPathDoc,
                        "signatureUrl" => $imgSignaturePath
                    ];
                    $resultUpdateContract = $this->AccountInfoModels->updateContractCustomer($username, $headers, $dataUpdateContract);
                    if($resultUpdateContract->status == 200){
                        setcookie("__updateContract", 'success^_^Cập nhật hợp đồng cho khách thành công', time() + (30), '/');
                        // echo 1111;die;
                        echo json_encode(array('success' => true, 'message' => 'true'));
                    }else{
                        setcookie("__updateContract", 'false^_^Có lỗi khi cập nhật hợp đồng. Vui lòng liên hệ admin.', time() + (30), '/');
                        // echo 2222;die;
                        echo json_encode(array('success' => false, 'message' => 'true'));
                    }
                }else{
                    setcookie("__updateContract", 'false^_^Có lỗi khi cập nhật hợp đồng. Vui lòng liên hệ admin.', time() + (30), '/');
                    // echo 333;die;
                    echo json_encode(array('success' => false, 'message' => 'true'));
                }


            }else{
                setcookie("__updateContract", 'false^_^Có lỗi khi cập nhật hợp đồng. Vui lòng liên hệ admin.', time() + (30), '/');
                echo json_encode(array('success' => false, 'message' => 'true'));
            }
            
        }
        $data['dataUser'] = $dataUser;
        $data['dataListUser'] = $dataListUser;
        $data['title'] = $title;
        $data['view'] = 'App\Modules\AccountInfo\Views\updateContractCustomer';
        return view('layoutShop/layout', $data);
    }
}

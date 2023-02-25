<?php

namespace App\Modules\WalletManage\Controllers;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use stdClass;

class WalletManage extends BaseController
{
    // const MAX_VALUE_WITHDRAW = 200;

    //Biến động số dư
    public function balanceFluctuations($page = 0)
    {
        $data = [];
        $title = lang('Label.lbl_balanceFluctuations');
        $post = $this->request->getPost();
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $token = $dataUserAuthen->token;
        $username = $dataUserAuthen->username;
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;

        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:' . $token,
        ];

        $size = PERPAGE;
        //Get Balance
        $resultBalance = $this->callServer->Get(URL_API_PRIVATE . 'user/balances', $data, $headers)['data'];

        $dataTypeTransaction = array(
            "0" => lang('Label.lbl_typeTransaction0'),
            "2" => lang('Label.lbl_typeTransaction2'),
            "3" => lang('Label.lbl_typeTransaction3'),
            "1" => lang('Label.lbl_typeTransaction1'),
            "4" => lang('Label.lbl_typeTransaction4'),
            "5" => lang('Label.lbl_typeTransaction4'),
        );
        $dataTypeTransactionFilter = array(
            "0" => lang('Label.lbl_typeTransaction0'),
            "2" => lang('Label.lbl_typeTransaction2'),
            // "3" => lang('Label.lbl_typeTransaction3'),
            "1" => lang('Label.lbl_typeTransaction1'),
            // "4" => lang('Label.lbl_typeTransaction4')
        );
        $dataBalance = $resultBalance->data;

        $getFilterTmp = get_cookie('__filterLogs_' . $username);
        if ($getFilterTmp != '') {
            $getFilterTmp = (array) json_decode($getFilterTmp);

        }
        $type = null;
        $fromDate = null;
        $toDate = null;
        $orderId = '';

        $dataPost = [];
        //set nhảy trang khi tìm kiếm
        if ($page != 0) {
            $dataPost = $getFilterTmp;
            $dataPost['transactionType'] = $dataPost['status'];
            $type = $getFilterTmp['type'];
            if ($type == -1) {
                $type = null;
            }
            $fromDate = $getFilterTmp['fromDate'];
            $toDate = $getFilterTmp['toDate'];
            $orderId = $getFilterTmp['orderId'];
            $transactionType = $getFilterTmp['status'];
        } else {
            setcookie("__filterLogs_" . $username, json_encode($post), time() + 1, '/');
        }
        //Get detail Balance
        $dataCallApiDetailBalance = array(
            "username" => $username,
            "orderId" => $orderId,
            "fromDate" => $fromDate,
            "toDate" => $toDate,
            "type" => $type,
            "page" => $page,
            "size" => $size,
            "status" => $transactionType,
            "exportExcel" => 0,
        );
        $page = $page ? $page : 0;
        $data['page'] = $page;
        $data['perPage'] = PERPAGE;
        $data['pager'] = $this->pager;
        $listBalanceFluctuations = $this->walletManageModels->getBalanceFluctuations($username, $dataCallApiDetailBalance, $headers);
        $dataWallet = $listBalanceFluctuations->data->logs;

        //Fillter
        if (!empty($post)) {
            $orderId = $post['orderId'];
            $transactionType = $post['transactionType'];
            $type = $post['type'];
            if ($type == -1) {
                $type = null;
            }
            $fromDate = $post['fromDate'];
            $toDate = $post['toDate'];
            //Get data filter
            $dataCallApiFilter = array(
                "username" => $username,
                "orderId" => trim($orderId),
                "fromDate" => $fromDate,
                "toDate" => $toDate,
                "type" => $type,
                "page" => 0,
                "size" => $size,
                "status" => $transactionType,
                "exportExcel" => 0,
            );
            $listBalanceFluctuations = $this->walletManageModels->getBalanceFluctuations($username, $dataCallApiFilter, $headers);
            $dataWallet = $listBalanceFluctuations->data->logs;
            $dataPost = $post;
            $setFilterTmp = setcookie("__filterLogs_" . $username, json_encode($dataCallApiFilter), time() + TIME_LOGIN, '/');
            $lang = get_cookie('__locale');
            return redirect()->to('/' . $lang . '/vi-hola/1');
        }

        $this->pager->setPath('vi/vi-hola');
        $page = $page ? $page : 1;
        $total = ($listBalanceFluctuations->data->total) ? $listBalanceFluctuations->data->total : 0;
        // $listBalanceFluctuations->data->total
        $data['pages'] = $this->pager->makeLinks($page, PERPAGE, $total, 'default_full', 3);

        $data['total'] = $listBalanceFluctuations->data->total;
        $data['dataWallet'] = $dataWallet;
        $data['dataPost'] = $dataPost;
        $data['dataTypeTransactionFilter'] = $dataTypeTransactionFilter;
        $data['dataTypeTransaction'] = $dataTypeTransaction;
        $data['dataBalance'] = $dataBalance;
        $data['dataUser'] = $dataUser;
        $data['title'] = $title;
        $data['view'] = 'App\Modules\WalletManage\Views\balanceFluctuations';
        return view('layoutShop/layout', $data);
    }
    //Nạp tiền
    public function payIn()
    {
        $data = [];
        $title = lang('Label.lbl_payin');
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $token = $dataUserAuthen->token;
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;

        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:' . $token,
        ];
        $resultBalance = $this->callServer->Get(URL_API_PRIVATE . 'user/balances', $data, $headers)['data'];
        $dataBalance = $resultBalance->data;

        $data['dataBalance'] = $dataBalance;
        $data['dataUser'] = $dataUser;
        $data['title'] = $title;
        $data['view'] = 'App\Modules\WalletManage\Views\payIn';
        return view('layoutShop/layout', $data);
    }

    // Nạp tiền ví VA

    public function payInVAWallet()
    {
        $data = [];
        $dataBankVA = [];
        $title = lang('Label.lbl_payinVA');
        $post = $this->request->getPost();

        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $token = $dataUserAuthen->token;
        $username = $dataUserAuthen->username;
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;
        $sessionKey = $dataUserAuthen->sessionKey;

        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:' . $token,
        ];

        //Call API GET VA
        $this->clog->info('WALLET', 'USERNAME:' . $username, '========GET_VA=========');
        $this->logger->info('USERNAME: ' . $username . '|| ========GET_VA=========', array(), 'CALLAPI');

        $bankVA = $this->callServer->Get(URL_API_PRIVATE . 'user/bankVA', $data, $headers)['data'];

        $this->clog->info('WALLET', 'RESPONSE_GET_VA_USERNAME:' . $username, (array) $bankVA);
        $this->clog->info('WALLET', 'END_USERNAME:' . $username, '========END_GET_VA=========');
        $this->logger->info('RESPONSE_GET_VA_USERNAME: ' . $username . '|| ' . json_encode($bankVA, JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
        $this->logger->info('USERNAME: ' . $username . '|| ========END_GET_VA=========', array(), 'CALLAPI');

        if ($bankVA->status == 200) {
            $dataBankVA = $bankVA->data;
        }
        if (!empty($post)) {
            $activeVa = $post['activeVa'];
            if ($activeVa) {
                //Set Authorization

                $dataCallApi = array(
                    "username" => $username,
                    "sessionKey" => $sessionKey,
                );
                // Logger
                $this->clog->info('WALLET', 'USERNAME:' . $username, '========REGISTER_VA=========');
                $this->clog->info('WALLET', 'DATA_REGISTER_VA_USERNAME:' . $username, $dataCallApi);

                $this->logger->info('USERNAME: ' . $username . '|| ========REGISTER_VA=========', array(), 'CALLAPI');
                $this->logger->info('DATA_REGISTER_VA_USERNAME: ' . $username . '|| ' . json_encode($dataCallApi, JSON_UNESCAPED_UNICODE) . '|| headers:' . json_encode($headers), array(), 'CALLAPI');
                $result = $this->callServer->PostJson(URL_API_PRIVATE . 'user/registerVA', $dataCallApi, $headers)['data'];

                $this->clog->info('WALLET', 'RESPONSE_REGISTER_VA_USERNAME:' . $username, (array) $result);
                $this->clog->info('WALLET', 'END_USERNAME:' . $username, '========END_REGISTER_VA=========');

                $this->logger->info('RESPONSE_REGISTER_VA_USERNAME: ' . $username . '|| ' . json_encode($result, JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
                $this->logger->info('USERNAME: ' . $username . '|| ========END_REGISTER_VA=========', array(), 'CALLAPI');
                if ($result->status == 200) {
                    echo json_encode(array('success' => true, 'status' => $result->status, 'message' => 'Thành công', 'data' => $result->data->va));die;
                } else {
                    echo json_encode(array('success' => false, 'status' => $result->status, 'message' => 'Kthành công', 'data' => lang('Label.err_' . $result->status)));die;
                }

            }
        }

        $data['dataBankVA'] = $dataBankVA;
        $data['dataUser'] = $dataUser;
        $data['title'] = $title;
        $data['view'] = 'App\Modules\WalletManage\Views\payInVAWallet';
        return view('layoutShop/layout', $data);
    }

    // Nạp tiền tài khoản IMEDIA
    public function payInImediaWallet()
    {
        $data = [];
        $title = lang('Label.lbl_payinVA');
        $post = $this->request->getPost();
        if (!empty($post)) {
            echo '<pre>';
            print_r($post);
            die;
        }
        //Prepare view
        $get = $this->request->getGet();
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $token = $dataUserAuthen->token;
        $username = $dataUserAuthen->username;
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;

        $sessionKey = $dataUserAuthen->sessionKey;
        //Get data warehouse
        $pickupAddress = $dataUser->pickupAddress;
        $data['pickupAddress'] = $pickupAddress;
        $data['dataUser'] = $dataUser;

        $data['title'] = $title;
        $data['view'] = 'App\Modules\WalletManage\Views\payInImediaWallet';
        return view('layoutShop/layout', $data);
    }

    // Nạp tiền qua ngân hàng

    //Rút tiền
    public function withDraw()
    {

        // withDraw ->confirmTransaction ->otp->kqgiaodich
        $data = [];
        $title = lang('Label.lbl_withDraw');

        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $username = $dataUserAuthen->username;
        $token = $dataUserAuthen->token;
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;

        $dataCallApi = array(
            'withdrawType' => 0,
        );
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:' . $token,
        ];
        //Api get list bank
        $listBank = $this->walletManageModels->getBankList($dataUser->username, $dataCallApi, $headers);
        $listBankCod = $listBank->data->banks;
        $allowWithdraw = $listBank->data->allowWithdraw;
        if($allowWithdraw == 0){
            setcookie("__withDraw", 'withDrawIgnore', time() + (60 * 10), '/');
                header("Location: " . base_url('/vi-hola'));
                die;
        }
        // $accountIgnoreWithDraw = $this->redis->get('IGNORE_WITHDRAW');
        // if ($accountIgnoreWithDraw) {
        //     $arrAccIgnore = (array) json_decode($accountIgnoreWithDraw);
        //     if (in_array($dataUser->username, $arrAccIgnore)) {
        //         setcookie("__withDraw", 'withDrawIgnore', time() + (60 * 10), '/');
        //         header("Location: " . base_url('/vi-hola'));
        //         die;
        //     }
        // }
        
        // echo("<pre>");
        // print_r( $listBankCod); die;
        $maxValueWithDraw = $listBank->data->maxWithdraw;
        $minxWithdraw = $listBank->data->minxWithdraw;
        $transactionFee = $listBank->data->transactionFee;
        //Get Balances
        $resultBalance = $this->authenticatorDetailUser->getBalances($dataUser->username, $data, $headers);
        $dataBalance = $resultBalance->data;
        $post = $this->request->getPost();
        //
        if (!empty($post)) {
            $post['amount'] = (isset($post['amount'])) ? str_replace(',', '', $post['amount']) : 0;
            $this->validation->setRules([
                'bankId' => [
                    'label' => 'Label.lbl_errorAccountNumber',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Label.lbl_errorAccountNumber',
                    ],
                ],
                'amount' => [
                    'label' => 'Label.lbl_errorNumberWithDraw',
                    'rules' => 'required|checkNumberRemain[' . $dataBalance->withDrawBalance . ']|checkMaxAmount[' . number_format($maxValueWithDraw) . ']|checkMinAmount[' . number_format($minxWithdraw) . ']',
                    'errors' => [
                        'required' => 'Label.lbl_errorNumberWithDraw',
                        'checkNumberRemain' => 'Validation.checkNumberRemain',
                        'checkMaxAmount' => 'Validation.checkMaxAmount',
                        'checkMinAmount' => 'Validation.checkMinAmount',
                    ],
                ],
            ]);
            if (!$this->validation->withRequest($this->request)->run()) {
                $data['getErrors'] = $this->validation->getErrors();
                $data['dataBalance'] = $dataBalance;
                $data['listBankCod'] = $listBankCod;
                $data['dataUser'] = $dataUser;
                $data['transactionFee'] = $transactionFee;
                $data['dataPost'] = $post;
                $data['view'] = 'App\Modules\WalletManage\Views\withDraw';
                $data['listValues'] = $post;
                return view('layoutShop/layout', $data);
            } else {
                $dataCache = $post;
                $key = array_search($post['bankId'], array_column($listBankCod, 'id'));
                $dataCache['transactionFee'] = $transactionFee;
                $dataCache['bankInfo'] = $listBankCod[$key];
                $this->redis->set('__withDraw' . $username, json_encode($dataCache), 3600);
                return redirect()->to('/xac-nhan-giao-dich');
            }
        }
        $data['dataBalance'] = $dataBalance;
        $data['transactionFee'] = $transactionFee;
        $data['listBankCod'] = $listBankCod;
        $data['dataUser'] = $dataUser;
        $data['title'] = $title;
        $data['view'] = 'App\Modules\WalletManage\Views\withDraw';
        return view('layoutShop/layout', $data);
    }

    public function otp()
    {
        $data = [];
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $username = $dataUserAuthen->username;
        $token = $dataUserAuthen->token;
        $dataUser = $this->authenticatorDetailUser->getUser($dataUserAuthen);
        $dataUser->availableBalance = $this->dataBalance;
        $sessionKey = $dataUserAuthen->sessionKey;
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:' . $token,
        ];
        $resultBalance = $this->callServer->Get(URL_API_PRIVATE . 'user/balances', $data, $headers)['data'];

        $post = $this->request->getPost();
        $dataOld = json_decode($this->redis->get('__withDraw' . $username));
        if ($dataOld == '') {
            return redirect()->to('/rut-tien');
        }
        if (!empty($post)) {
            // echo '<pre>';
            $dataCallApiWithDraw = array(
                "username" => $username,
                "amount" => $dataOld->amount,
                "bankAccount" => $dataOld->bankInfo->bankAccount,
                "bankCode" => $dataOld->bankInfo->bankCode,
                "otpCode" => $post['withDrawOtp'],
                "sessionKey" => $sessionKey,
            );

            $resultWithDraw = $this->walletManageModels->withDraw($dataUser->username, $dataCallApiWithDraw, $headers);

            if ($resultWithDraw->status == 135) {
                echo json_encode(array('success' => false, 'status' => $resultWithDraw->status, 'message' => 'Không thành công', 'redirect' => '0', 'data' => lang('Label.err_' . $resultWithDraw->status)));die;
            }
            // else if($resultWithDraw->status == 500){}
            else {

                $dataOld->resultTransaction = $resultWithDraw->data;
                $this->redis->set('__withDraw' . $username, json_encode($dataOld), 3600);
                echo json_encode(array('success' => true, 'status' => $resultWithDraw->status, 'message' => 'Thành công', 'redirect' => '1', 'href' => '/ket-qua-giao-dich', 'data' => lang('Label.err_' . $resultWithDraw->status)));die;
            }
        }
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:' . $token,
        ];
        // echo '<pre>';
        // print_r($dataUser);die;
        $title = lang('Label.lbl_withDrawOTP');
        $dataBalance = $resultBalance->data;
        $data['dataBalance'] = $dataBalance;
        $data['dataUser'] = $dataUser;
        $data['title'] = $title;
        $data['view'] = 'App\Modules\WalletManage\Views\otprut';
        return view('layoutShop/layout', $data);
    }

    public function kqgiaodich()
    {
        
        $data = [];
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $username = $dataUserAuthen->username;
        $token = $dataUserAuthen->token;
        // $dataUser = $this->authenticatorDetailUser->getUser($dataUserAuthen);
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:' . $token,
        ];

        $resultBalance = $this->authenticatorDetailUser->getBalances($dataUser->username, $data, $headers);
        $dataOld = json_decode($this->redis->get('__withDraw' . $username));
        $this->redis->del('__withDraw' . $username);
        $data['withDraw'] = 1;
        $data['dataWithDraw'] = $dataOld;
        $data['dataUser'] = $dataUser;
        $dataBalance = $resultBalance->data;
        $data['dataBalance'] = $dataBalance;
        $title = lang('Label.lbl_withDrawResult');
        $data['title'] = $title;
        $data['view'] = 'App\Modules\WalletManage\Views\kqgiaodich';
        return view('layoutShop/layout', $data);
    }
    public function confirmTransaction()
    {

        $data = [];
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $username = $dataUserAuthen->username;
        $token = $dataUserAuthen->token;
        // $dataUser = $this->authenticatorDetailUser->getUser($dataUserAuthen);
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;

        $dataOld = json_decode($this->redis->get('__withDraw' . $username));
        $transactionFee = $dataOld->transactionFee;
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:' . $token,
        ];

        if ($dataOld == '') {
            return redirect()->to('/rut-tien');
        }
        $data['callModal'] = 0;
        $sendedOTP = $this->redis->get('OTP' . $username);
        // if($sendedOTP > MAX_OTP_TO_DAY){
        //     $data['callModal'] = 1;
        // }else{
        $post = $this->request->getPost();
        if (!empty($post)) {
            $resultBalance = $this->authenticatorDetailUser->getBalances($dataUser->username, $data, $headers);
            $deviceId = get_cookie('__dvc');
            $dataApiGenerateOtp = [
                "requestId" => "",
                "username" => $username,
                "phone" => $dataUser->phoneOTP,
                "deviceId" => $deviceId,
            ];
            if ($sendedOTP >= MAX_OTP_TO_DAY) {
                $data['callModal'] = 1;
            } else {
                $this->logger->info('RESEND_OTP :  ' . json_encode($dataApiGenerateOtp), array(), 'CALLAPI');
                $getOTP = $this->callServer->PostJson(URL_API_PUBLIC . 'getOTP', $dataApiGenerateOtp);
                return redirect()->to('/xac-nhan-otp');
            }
        }
        // }
        $resultBalance = $this->authenticatorDetailUser->getBalances($dataUser->username, $data, $headers);

        $data['dataOld'] = $dataOld;
        $data['dataUser'] = $dataUser;
        $dataBalance = $resultBalance->data;
        $data['dataBalance'] = $dataBalance;
        $data['transactionFee'] = $transactionFee;
        $data['BankCod'] = $dataOld->bankInfo;
        $title =  lang('Label.lbl_withDraw');
        $data['title'] = $title;
        $data['view'] = 'App\Modules\WalletManage\Views\xacnhan';
        return view('layoutShop/layout', $data);
    }

    public function exportExcelBalance(){
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;
        $token = $dataUserAuthen->token;
        $username = $dataUserAuthen->username;
        $post =  $this->request->getPost();
        if(!empty($post)){
            $orderId = $post['orderId'];
            $fromDate = $post['fromDate'];
            $toDate = $post['toDate'];
            $type = $post['type'];
            $headers = [
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization:' . $token,
            ];
            $transactionType = $post['transactionType'];
            if ($type == -1) {
                $type = null;
            }
            $dataCallApiDetailBalance = array(
                "username" => $username,
                "orderId" => $orderId,
                "fromDate" => $fromDate,
                "toDate" => $toDate,
                "type" => $type,
                "page" => 0,
                "size" => 20,
                "status" => $transactionType,
                "exportExcel" => 1,
            );
            $dataTypeTransaction = array(
                "0" => lang('Label.lbl_typeTransaction0'),
                "2" => lang('Label.lbl_typeTransaction2'),
                "3" => lang('Label.lbl_typeTransaction3'),
                "1" => lang('Label.lbl_typeTransaction1'),
                "4" => lang('Label.lbl_typeTransaction4'),
                "5" => lang('Label.lbl_typeTransaction4'),
            );
            $listBalanceFluctuations = $this->walletManageModels->getBalanceFluctuations($username, $dataCallApiDetailBalance, $headers);
            $dataExcel = $listBalanceFluctuations->data->logs;
            if(!empty($dataExcel)){
                $fileTitle = 'Danh sách biến động số dư';
                $fileName = $fileTitle . '.xlsx';
                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
                $rowsMerge = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
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
                $sheet->setCellValue('B3', "Mã giao dịch");
                $sheet->setCellValue('C3', "Mã đơn nhà vận chuyển");
                $sheet->setCellValue('D3', "Trạng thái giao dịch");
                $sheet->setCellValue('E3', "Loại giao dịch");
                $sheet->setCellValue('F3', "Phí giao dịch");
                $sheet->setCellValue('G3', "Số tiền");
                $sheet->setCellValue('H3', "Số dư sau giao dịch");
                $sheet->setCellValue('I3', "Nội dung giao dịch");
                $sheet->setCellValue('J3', "Thời gian");

                $j = 0;
                foreach($dataExcel as $order){
                    $j++;
                    $rows = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
                    foreach ($rows as $row) {
                        $sheet->getStyle($row . ($j + 4))
                            ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    }
                    $typeName = '';
                    if(in_array($order->type,['1','2','3'])){
                        $typeName = 'Cộng tiền';
                    }
                    if(in_array($order->type,['10','11','12'])){
                        $typeName = 'Trừ tiền';
                    }
                    $sheet->setCellValue('A' . ($j + 4), $j);
                    $sheet->setCellValue('B' . ($j + 4), $order->code);
                    $sheet->setCellValue('C' . ($j + 4), ' '.$order->orderId);
                    $sheet->setCellValue('D' . ($j + 4), $dataTypeTransaction[$order->status]);
                    $sheet->setCellValue('E' . ($j + 4), $typeName);
                    $sheet->setCellValue('F' . ($j + 4), number_format($order->cost));
                    $sheet->setCellValue('G' . ($j + 4), number_format($order->changeBase));
                    $sheet->setCellValue('H' . ($j + 4), number_format($order->toBase));
                    $sheet->setCellValue('I' . ($j + 4), $order->reason);
                    $sheet->setCellValue('J' . ($j + 4), date("d/m/Y H:i:s ", strtotime($order->createAt)));
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
                    'href' => base_url('/vi-hola'),
                    'file' => "data:application/vnd.ms-excel;base64," . base64_encode($xlsData),
                    'status' => '1'
                );
                $this->logger->info('Kết thúc xuất EXCEL');
                die(json_encode($response));
            }else{
                $response = array(
                    'href' => base_url('/vi-hola'),
                    'status' => '0'
                );
                die(json_encode($response));
            }
        }
    }
    public function controlCycle(){
        $data = [];
        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $username = $dataUserAuthen->username;
        $token = $dataUserAuthen->token;
        // $dataUser = $this->authenticatorDetailUser->getUser($dataUserAuthen);
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $dataUser->availableBalance = $this->dataBalance;
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:' . $token,
        ];
        $resultBalance = $this->authenticatorDetailUser->getBalances($dataUser->username, $data, $headers);
        $post = $this->request->getPost();

        //$arrCross = (array) json_decode($this->redis->get('CROSS_CHECK'));

        $getErrors['controlCycle'] = '';
        $userControlCycle = $this->walletManageModels->getControlCycle($headers, $username);
        $userControl = 0;
        if($userControlCycle->status == 200){
            if($userControlCycle->data->selectedTemplateId != ''){
                $userControl = $userControlCycle->data->selectedTemplateId;
            }
        }
        if(!empty($post)){
            $controlCycle = $post['controlCycle'];
            if($controlCycle == 0){
                $getErrors['controlCycle'] = 'Kỳ đối soát không được để trống';
            }else{
                $data = [
                    'templateId' => $controlCycle
                ];
                $result = $this->walletManageModels->addControlCycle($data, $headers, $username);
                if($result->status == 200){
                    setcookie ("__updateCycle",'success^_^Cập nhật thành công',time()+ (60*10) , '/');
                }else{
                    setcookie ("__updateCycle",'false^_^'.$result->message,time()+ (60*10) , '/');
                }
                header("Location: ".base_url('/chu-ky-doi-soat'));
			    die;
            }
        }
        $data['dataUser'] = $dataUser;
        $data['userControl'] = $userControl;
        $dataBalance = $resultBalance->data;
        $data['dataBalance'] = $dataBalance;
        $title =  lang('Label.lbl_controlCycleMethod');
        $data['getErrors'] = $getErrors;
        $data['arrCross'] = $this->crossCheck;
        $data['title'] = $title;
        $data['view'] = 'App\Modules\WalletManage\Views\controlCycle';
        return view('layoutShop/layout', $data);
    }
}

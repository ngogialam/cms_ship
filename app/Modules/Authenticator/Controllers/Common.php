<?php

namespace App\Modules\Authenticator\Controllers;

use PhpOffice\PhpSpreadsheet\Reader\Xls\MD5;

class Common extends BaseController {
    public function changeLanguage(){
        $post = $this->request->getPost();
        if(!empty($post)){
            setcookie ("__locale",'',time()+ (1) , '/');
            setcookie ("__locale",$post['locale'],time()+ TIME_DEVICE , '/');
            $hrefOld = $post['hrefOld'];
            $uriArr = explode('/', $hrefOld);
            $uriArr[3] = $post['locale'];
            $href = implode('/',$uriArr);
            echo json_encode(array('success' => true, 'message' => 'Thành công','href' => $href));
        }
    }

    public function loginSocial($dataGG = array()){
        
        $data = [];
        $post = $this->request->getPost();
        if(!empty($post) || !empty($dataGG)){
            $loginGG = '';
            if(!empty($dataGG)){
                $post = $dataGG;
                $loginGG = $post['loginGG'];
            }
            
            $socialId = $post['socialId'];
            $accessToken = $post['accessToken'];
            $dataRedis = $this->redis->get('SOCIAL_ID');
		    $dataSocial = json_decode($dataRedis)->socialInfos;
            $type = $post['type'];
            $key = array_search($socialId, array_column($dataSocial, 'socialId'));
            $username = '';
            if(isset($post['phone'])){
                $username = $post['phone'];
            }
            //check key và user name. Không tồn tại -> nhập thêm số điện thoại
            if(!$key && $username == ''){
                echo json_encode(array('success' => true, 'status' => '-1', 'data' => 'Không có số điện thoại'));die;
            }else if($key){
                $username = $dataSocial[$key]->username;
            }
            
            //Get - Set deviceId
            if($this->getCookie('__dvc')){
                $deviceId  = $this->getCookie('__dvc');
            }else{
                $keyVariable = implode('-', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6));
                // $deviceId  = $this->generateDeviceId('deviceId');
                $deviceId  = $keyVariable;
            }

            //Generate key redis
            $keyAuth = $this->generateKrd($username,$deviceId);
            $kath = setcookie ("__kath",$keyAuth,time()+  TIME_LOGIN , '/',DOMAIN_COOKIE);
            $dataCallApi = [
                "username"      => $username,
                "password"      => "",
                "deviceId"      => $deviceId,
                "accessToken"   => $accessToken,
                "loginFrom"     => 1,
                "key"           => trim($keyAuth),
                "socialId"      => $socialId,
                "email"         => "",
                "rememberMe"    => 1,
                "requestId"     => ''
            ];
            $sendedOTP = $this->redis->get('OTP'.$username);
            
            if($sendedOTP >= MAX_OTP_TO_DAY){
                echo json_encode(array('success' => false,'status' => '211', 'message' => 'Không thành công', 'data_message' => lang('Label.err_2112')));die;
            }
            $this->logger->info('=====LOGIN SOCIAL=======', array(), 'CALLAPI');
            $this->logger->info('DATA_CALL_API : '. json_encode($dataCallApi), array(), 'CALLAPI');
            //Call API Login fb
            // echo '<pre>';
            // print_r($dataCallApi);die;

            $result = $this->callServer->PostJson(URL_API_PUBLIC.'authenticate',$dataCallApi);
            $result = $result['data'];
            $this->logger->info('DATA_RESPONSE : '. json_encode($result), array(), 'CALLAPI');
            
            $this->redis->set('tmp_'.$keyAuth, json_encode($dataCallApi),1000);

            // $setKrd = setcookie ("__krd",$keyAuth,time()+ TIME_DEVICE , '/');
            $setPhoneTmp = setcookie ("__phone_tmp",$username,time()+  1000 , '/');

            while ( $setPhoneTmp != 1 ) {
                // $setKrd = setcookie ("__krd",$keyAuth,time()+ TIME_DEVICE, '/');
                $setPhoneTmp = setcookie ("__phone_tmp",$username,time()+  1000, '/');
            }
            //LOGIN GG
            if($loginGG){
                $title = lang('Label.lbl_login');
                $data['title'] = $title;
                if($result->status == 501 ||$result->status == 201 ){
                    return $this->verifyOTP();
                }else if($result->status == 200){
                    $setKrd = setcookie ("__krd",$keyAuth,time()+ TIME_LOGIN, '/',DOMAIN_COOKIE);
                    while ( $setKrd != 1 ) {
                        $setKrd = setcookie ("__krd",$keyAuth,time()+ TIME_LOGIN, '/',DOMAIN_COOKIE);
                    }
                    return redirect()->to('/thong-tin-tai-khoan');
                }else{
                    $loginGoogle = $this->google_client->createAuthUrl();
                    $data['loginGoogle'] = $loginGoogle;
                    $data['view'] = 'App\Modules\Authenticator\Views\login';
                    $data['error'] = lang('Label.err_'.$result->status);
                    return view('layout/layout', $data);
                    return redirect()->to('/dang-nhap');
                }
                
            }
            // Login FACEBOOK Ajax
            if($result->status == 201 || $result->status == 501){
                $this->logger->info('DATA_RESPONSE201-501 : '. json_encode($result), array(), 'CALLAPI');
                //login facebook thành công tạo tài khoản mới
                // Đăng nhập lần đầu trên thiết bị mới gửi OTP
                echo json_encode(array('success' => true, '__krd' => $keyAuth, 'status' => $result->status, 'phone' => $username, 'message' => 'Gửi OTP thành công', 'data_message' => lang('Label.err_'.$result->status) ,'deviceId' => $deviceId));
            }else if($result->status == 200){
                $setKrd = setcookie ("__krd",$keyAuth,time()+ TIME_LOGIN, '/',DOMAIN_COOKIE);
                    while ( $setKrd != 1 ) {
                        $setKrd = setcookie ("__krd",$keyAuth,time()+ TIME_LOGIN, '/',DOMAIN_COOKIE);
                    }
                echo json_encode(array('success' => true, 'status' => $result->status,'__krd' => $keyAuth, 'message' => 'Đăng nhập thành công', 'data_message' => lang('Label.err_'.$result->status) ,'deviceId' => $deviceId));
            }else if($result->status == 401){
                echo json_encode(array('success' => false, 'status' => $result->status, 'message' => 'Không thành công', 'data_message' => lang('Label.err_'.$result->status)));
            }else if($result->status == 140){
                echo json_encode(array('success' => false, 'status' => $result->status, 'message' => 'Không thành công', 'data_message' => lang('Label.err_'.$result->status)));
            }else{
                echo json_encode(array('success' => false, 'status' => $result->status, 'message' => 'Không thành công - 1', 'data_message' => lang('Label.err_'.$result->status)));
            }
        }       
    }

    public function ggLogin(){
        $data = [];
        $post = $this->request->getPost();
        if(isset($_GET['code'])){ 
            $token = $this->google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
            $client = $this->google_client->getOAuth2Service();

            $result = $this->callServer->Get(GG_API,$token);
            if($result['status'] == 200){
                $dataGoogle = $result['data'];
                // $dataGoogle['ggToken'] = $token['access_token'];
                $dataGoogle->{"ggToken"} = $token['access_token'];
                $data['dataGoogle'] = $dataGoogle;
                // echo '<pre>';
                // print_r($dataGoogle);die;$title = " Đăng ký";
                $socialId = $dataGoogle->id;
                $dataRedis = $this->redis->get('SOCIAL_ID');
                $dataSocial = json_decode($dataRedis)->socialInfos;
                $key = array_search($socialId, array_column($dataSocial, 'socialId'));
                if($key){
                    $socialId = $post['socialId'];
                    $accessToken = $post['accessToken'];
                    $dataGG = Array(
                        'socialId' => $dataGoogle->id,
                        'accessToken' => $dataGoogle->ggToken,
                        'loginGG' => 1
                    );
                    return $this->loginSocial($dataGG);
                }else{
                    $title = " Đăng nhập";
                    $data['title'] = $title;
                    $data['view'] = 'App\Modules\Authenticator\Views\login';
                    return view('layout/layout', $data);
                }
            }
            die;
        }
        
    }

    public function generateDeviceId($key = 'deviceId'){
        echo 'inherer';
        helper("cookie");
        $keyVariable = implode('-', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6));
        $getToken = $this->setCookie($key,$keyVariable);

        $getTokenResult = $this->getCookie($key);
        return $getTokenResult;
    }
    public function getCookie($key){
        helper("cookie");
        return get_cookie($key);
    }
    public function setCookie($key, $value){
        set_cookie($key, $value, time()+60*60*24*365, '', false,false);
        return  true;
        // return set_cookie($key, $value, time()+60*60*24*365);
    }
    
    public function verifyOTP(){
        // $getGet = $this->request->getGet();
        $phone = get_cookie('__phone_tmp');
        $dataList = [
            'phone' => $phone,
            'username' => $phone
        ];
        $post = $this->request->getPost();
        if(!empty($post) && isset($post['otp']) || !empty($dataGG)){
            $loginGG = '';
            if(!empty($dataGG)){
                $post = $dataGG;
                $loginGG = $post['loginGG'];
            }
            $otp = $post['otp'];
            $phone = $post['phone'];
            $deviceId = $this->getCookie('__dvc');
            // $krdTmp = get_cookie('__kath');
            $krdTmp = get_cookie('__kath');
            $lgn = get_cookie('__lgn');
            $this->logger->info('DATA_CALL_API : '. json_encode($krdTmp), array(), 'CALLAPI');
            if($otp!=''){
                $dataApiGenerateOtp = [
                    'username' => $phone,
                    'otpCode' => $otp,
                    'deviceId' => $deviceId,
                ];
                $dataCallApi = $this->redis->get('tmp_'.$krdTmp);
                $this->logger->info('DATA_CALL_API_krdtmp : '. json_encode($dataCallApi), array(), 'CALLAPI');

                $this->logger->info('=====VERIFY OTP=======', array(), 'CALLAPI');
                $this->logger->info('DATA_CALL_API : '. json_encode($dataApiGenerateOtp), array(), 'CALLAPI');
                $otpSMS =  $this->callServer->PostJson(URL_API_PUBLIC.'verifyOTP',$dataApiGenerateOtp)['data'];
                $this->logger->info('RESULT_API : '. json_encode($otpSMS), array(), 'CALLAPI');
                if($otpSMS->status == 200){

                    //Login affter otp
                    $this->logger->info('DATA_RESPONSE_OTP : '. json_encode($dataCallApi), array(), 'CALLAPI');
                    $result = $this->callServer->PostJson(URL_API_PUBLIC.'authenticate',json_decode($dataCallApi));
                    $result = $result['data'];
                    $this->logger->info('DATA_RESPONSE_OTP : '. json_encode($result), array(), 'CALLAPI');
                    $this->logger->info('lgn : '. $lgn, array(), 'CALLAPI');
                    if($result->status == 200){
                        $setKrd = setcookie ("__krd",$krdTmp,time()+ TIME_LOGIN , '/',DOMAIN_COOKIE);
                         echo json_encode(array('success' => true,'status'=> 200, 'message' => 'Xac thuc OTP thanh cong', 'data' => lang('Label.err_'.$result->status) ) );die;
                    }else{
                        echo json_encode(array('success' => false,'status'=> $result->status, 'message' => '', 'data' => lang('Label.err_'.$result->status)));die;
                    }
                    
                }else{
                    $this->logger->info('DATA_RESPONSE_OTP : FALSE', array(), 'CALLAPI');
                    echo json_encode(array('success' => false, 'message' => '', 'data' => lang('Label.err_'.$otpSMS->status)));die;
                }
            }
        }
        $title = " Xác thực số điện thoại";
        $data['title'] = $title;
        $data['data'] = $dataList;
        $data['view'] = 'App\Modules\Authenticator\Views\otp';
        return view('layout/layout', $data);
    }
    public function generateKrd($username,$deviceId){
        return md5($username.'_'.$deviceId.'_'.date("d"));
    }

}
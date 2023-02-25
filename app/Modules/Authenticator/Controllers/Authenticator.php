<?php

namespace App\Modules\Authenticator\Controllers;

class Authenticator extends BaseController {

    public static $sdt;
    
    public function home(){
        $krd = get_cookie('__krd');
        $auth = [];
        if($krd){
            $dataAuth = $this->redis->get($krd);
            if($dataAuth){
                $auth = (array)json_decode($dataAuth);
                $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
                $avatarUser = json_decode($this->redis->get($dataUserAuthen->username))->avatar;
              
            }
        }
        // $this->logger->info('=====LOGIN SOCIAL=======', array(), 'CALLAPI');
        $data = [];
        $title = "";
        $data['auth'] = $auth;
        $data['title'] = $title;
        $data['avatarUser'] = $avatarUser;
        $data['view'] = 'App\Modules\Authenticator\Views\index';
        return view('layout/layout', $data);
    }
    public function ConsultOrders(){
        $krd = get_cookie('__krd');
        $auth = [];
        if($krd){
            $dataAuth = $this->redis->get($krd);
            if($dataAuth){
                $auth = (array)json_decode($dataAuth);
                $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
                $avatarUser = json_decode($this->redis->get($dataUserAuthen->username))->avatar;
              
            }
        }
        // $this->logger->info('=====LOGIN SOCIAL=======', array(), 'CALLAPI');
        $data = [];
        $title = "";
        $data['auth'] = $auth;
        $data['title'] = $title;
        $data['avatarUser'] = $avatarUser;
        $data['view'] = 'App\Modules\Authenticator\Views\consultOrders';
        return view('layout/layout', $data);
    }

    public function redirectHome(){
        header("Location: ".base_url('/'));
        die;
    }
    
    public function login(){
        $deviceId = get_cookie('__dvc');
        if(!$deviceId){
			$deviceId = implode('-', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6));
			setcookie ("__dvc",$deviceId,time() + ( 365 * 24 * 60 * 60) , '/');
		}
        $data = [];
        $title = lang('Label.lbl_login');
        $data['title'] = $title;
        $post = $this->request->getPost();
        $data['callModal'] = 0;
        if(!empty($post)){
            $username = trim($post['username']);
            $remember_pass = trim($post['remember_pass']);
            $password = $post['password'];
            
            //Check Validation form 
            $this->validation->setRules([
                'username'               => [
                    'label' => 'Label.lbl_usernameCheck',
                    'rules' => 'required',
                    'errors' => [
                    ]
                ],
                'password'               => [
                    'label' => 'Label.password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Validation.password.required'
                    ]
                ]
            ]);
            //Run validation
            if(!$this->validation->withRequest($this->request)->run())
            {
                
                $data['title'] = $title;
                $data['getErrors'] = $this->validation->getErrors();
                $data['view'] = 'App\Modules\Authenticator\Views\login';
                $data['listValues'] = $post;
                return view('layout/layout', $data);
            }else{
                if(isset($post['remember_pass'])){
                    $remember_pass = 1;
                }else{
                    $remember_pass = 0;
                }
                $keyAuth = $this->common->generateKrd($username,$deviceId);
                $kath = setcookie ("__kath",$keyAuth,time()+  TIME_LOGIN , '/',DOMAIN_COOKIE);
                $data = [
                    'username'      =>  $username,
                    'password'      =>  md5($password),
                    'deviceId'      =>  $deviceId,
                    'accessToken'   =>  '',
                    'loginFrom'     =>  0,
                    'key'           =>  $keyAuth,
                    'email'         =>  '',
                    'rememberMe'    =>  $remember_pass,
                    ];
                    
                //Log file
                $result = $this->AuthenticatorModels->login($username, $data );
                $statusLogin = $result->status;
                
                if($statusLogin == 200){
                    $domain = 'imediatech.com.vn';
                    if($remember_pass == 1){
                        $setKrd = setcookie ("__krd",$keyAuth,time()+ TIME_REMEMBER_LOGIN , '/',DOMAIN_COOKIE);
                    }else{
                        $setKrd = setcookie ("__krd",$keyAuth,time()+ TIME_LOGIN , '/',DOMAIN_COOKIE);
                    }
                    return redirect()->to('/danh-sach-don-hang');
                }else if($statusLogin == 501 || $statusLogin == 201 ){
                    // $setKrd = setcookie ("__krd",$keyAuth,time()+ TIME_DEVICE , '/');
                    $setPhoneTmp = setcookie ("__phone_tmp",$username,time()+ (3600) , '/');
                    $this->redis->set('tmp_'.$keyAuth, json_encode($data),3600);
                    return redirect()->to('/xac-thuc-so-dien-thoai');
                    
                }else if($statusLogin == 211){
                    $data['oldData'] = $post;
                    $data['title'] = $title;
                    $data['callModal'] = 1;
                }else if($statusLogin == 100 ){
                    $data['oldData'] = $post;
                    $data['title'] = $title;
                    $data['error'] = lang('Label.err_'.$statusLogin);
                }else{
                    $data['oldData'] = $post;
                    $data['title'] = $title;
                    $data['error'] = lang('Label.err_'.$statusLogin);

                }
            }
        }
        
        $loginGoogle = $this->google_client->createAuthUrl();
        $data['loginGoogle'] = $loginGoogle;
        $data['view'] = 'App\Modules\Authenticator\Views\login';
        return view('layout/layout', $data);
    }
    
    public function registration(){
        $deviceId = get_cookie('__dvc');
        $data = [];
        $title = lang('Label.lbl_register');
        $post = $this->request->getPost();
        if(!empty($post)){
            $phone = trim($post['phone']);
            $email = trim($post['email']);
            $password = $post['password'];
            $rePassword = $post['rePassword'];
            $legalsAndRules = 'fail';
            if(isset($post['legalsAndRules'])){
                $legalsAndRules = $post['legalsAndRules'];
            }
            $sendedOTP = $this->redis->get('OTP'.$phone);
            //Check Validation form
            $this->validation->setRules([
                'phone'               => [
                    'label' => 'Label.phone',
                    'rules' => 'required|phoneValidate['.$phone.']',
                    'errors' => [
                        'required' => 'Validation.phone.required'
                    ]
                ],
                'password'               => [
                    'label' => 'Label.password',
                    'rules' => 'required|passwordValidate['.$password.']',
                    'errors' => [
                        'required' => 'Validation.password.required',
                        'passwordValidate' => 'Validation.password.passwordValidate',
                    ]
                ],
                'rePassword'               => [
                    'label' => 'Label.rePassword',
                    'rules' => 'required|matches[password]',
                    'errors' => [
                        'required' => 'Validation.password.required'
                    ]
                ],
                'email'               => [
                    'label' => 'Label.email',
                    'rules' => 'required|min_length[10]|valid_email',
                    'errors' => [
                        'required' => 'Validation.email.required'
                    ]
                ],
                'legalsAndRules'               => [
                    'label' => 'Label.legalsAndRules',
                    'rules' => 'legalsAndRulesValidate['.$legalsAndRules.']',
                    'errors' => [
                        'required' => 'Validation.legalsAndRulesValidate.required'
                    ]
                ]
            ]);
            //Run validation
            if(!$this->validation->withRequest($this->request)->run()){
                $data['getErrors'] = $this->validation->getErrors();
                $data['view'] = 'App\Modules\Authenticator\Views\registration';
                $data['listValues'] = $post;
                // return view('layout/layout', $data);
            }else if($sendedOTP >= MAX_OTP_TO_DAY){
                $data['oldData'] = $post;
                $data['title'] = $title;
                $data['callModal'] = 1;
            }
            else{ 
                $this->logger->info('====REGISTER====', array(), 'CALLAPI');
                $dataList = [
                    "requestId"=> "",
                    'username'=>  $phone,
                    'email'   =>  $email,
                    'password'=>  $password,
                    'deviceId'=>  $deviceId,
                ];
                $keyAuth = $this->common->generateKrd($phone,$deviceId);
                $kath = setcookie ("__kath",$keyAuth,time()+  TIME_LOGIN , '/',DOMAIN_COOKIE);

                //Đăng ký tài khoản
                // $result = $this->callServer->PostJson(URL_API_PUBLIC.'register', $dataList)['data'];
                $result = $this->AuthenticatorModels->registrationUser($phone, $dataList );
                
                $time = time()+ TIME_DEVICE;
                
                $statusSignup = $result->status;

                //Set Cookie 
                $setPhoneTmp = setcookie ("__phone_tmp",$phone,time()+  1000 , '/');

                while ($setPhoneTmp != 1 ) {
                    // $setKrd = setcookie ("__krd",$keyAuth,time()+ TIME_DEVICE, '/');
                    $setPhoneTmp = setcookie ("__phone_tmp",$phone,time()+  1000, '/');
                }
                if($statusSignup == 200 ){
                    $data = [
                        'username'      =>  $phone,
                        'password'      =>  md5($password),
                        'deviceId'      =>  $deviceId,
                        'accessToken'   =>  '',
                        'loginFrom'     =>  0,
                        'key'           =>  $keyAuth,
                        'email'         =>  '',
                        "rememberMe"    => 1,
                        "requestId"     => ''
                    ];
                    $this->redis->set('tmp_'.$keyAuth, json_encode($data),1000);
                    $dataApiGenerateOtp = [
                        'username' => $phone,
                        'phone' => $phone,
                        'deviceId' =>  $deviceId,
                    ];
                    $this->logger->info('SEND_OTP_SIGNUP:  '.json_encode($dataApiGenerateOtp), array(), 'CALLAPI');
                    // $resultOtp = $this->authenticatorModel->getOtp(URL_API_WALLET_REGISTER,$dataApiGenerateOtp);
                    $resultOtp =  $this->callServer->PostJson(URL_API_PUBLIC.'getOTP',$dataApiGenerateOtp)['data'];
                    $this->logger->info('RESPONSE_OTP_SIGNUP:  '.json_encode($resultOtp), array(), 'CALLAPI');

                    return redirect()->to('/xac-thuc-so-dien-thoai');
                    $this->getOtp($dataApiGenerateOtp); //=============================Đẩy giữ liệu qua funtion khác ============================
                    //return $this->getOtp($dataApiGenerateOtp);
                }else{
                    
                    $data['listValues'] = $post;
                    $loginGoogle = $this->google_client->createAuthUrl();
                    $data['loginGoogle'] = $loginGoogle;
                    $data['title'] = $title;
                    $data['error'] = lang('Label.err_'.$statusSignup);
                    $data['view'] = 'App\Modules\Authenticator\Views\registration';
                    return view('layout/layout', $data);
                }
            }
        }
        $loginGoogle = $this->google_client->createAuthUrl();
        $data['loginGoogle'] = $loginGoogle;
        $data['title'] = $title;
        $data['view'] = 'App\Modules\Authenticator\Views\registration';
        return view('layout/layout', $data);
    }

    public function getOtp($data= []){
        $deviceId = get_cookie('__dvc');
        $phone = $data['username'];
        // $dataList = $data;
        if(!empty($post) && isset($post['otp'])){
            $post = $this->request->getPost();
            $otp = $post['otp'];
            $phone = $post['phone'];
            $lengOTP = strlen($otp);
            if($lengOTP==6){ 
                $dataApiGenerateOtp = [
                    'username' => $phone,
                    'otpCode' => $otp,
                    'deviceId' => $deviceId,
                ];
                $otpSMS =  $this->callServer->PostJson(URL_API_PUBLIC.'verifyOTP',$dataApiGenerateOtp)['data'];
                $this->logger->info('DATA_CALL_API : '. json_encode($otpSMS), array(), 'CALLAPI');
                if($otpSMS->status == 200){
                    echo json_encode(array('success' => true, 'message' => 'Xac thuc OTP thanh cong !!!!', 'data' => $otpSMS->message));
                    return redirect()->to('/thong-tin-tai-khoan?phone='.$phone);
                }else{
                    echo json_encode(array('success' => false, 'message' => 'Thong bao tu he thong tra ve ', 'data' => $otpSMS->message));
                }
            }
        }
        $title = " Đăng ký";
        $data['title'] = $title;
        $data['data'] = $data;
        $data['view'] = 'App\Modules\Authenticator\Views\otp';
        return view('layout/layout', $data);
    }
    
    public function reSendOtp(){
        $post = $this->request->getPost();

        if(!empty($post)){
            if(isset($post['username'])){
                $username = $post['username'];
            }else{
                $username = $post['phoneOtp'];
            }
            
            $sendedOTP = $this->redis->get('OTP'.$username);
            if($sendedOTP >= MAX_OTP_TO_DAY){
                echo json_encode(array('success' => false, 'otp'=>'1','off'=>'0', 'message' => lang('Label.err_211')));die;
            }
            $phone = trim($post['phoneOtp']);
            $deviceId = get_cookie('__dvc');
            $dataApiGenerateOtp = [
                "requestId"=>"",
                "username"=> $username,
                "phone"=> $phone,
                "deviceId"=> $deviceId
            ];
            // print_r($dataApiGenerateOtp);die;
            // echo URL_API_GENERATE_OTP;
            $this->logger->info('RESEND_OTP :  '.json_encode($dataApiGenerateOtp), array(), 'CALLAPI');
            $result = $this->callServer->PostJson(URL_API_PUBLIC.'getOTP',$dataApiGenerateOtp);
            $this->logger->info('RESPONSE_RESEND_OTP_'.$phone.': '.json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');

            if(!empty($result) && isset($result['data'])){
                if($result['data']->status == 200){
                    // lang('Label.err_'.$result['data']->code);
                    echo json_encode(array('success' => true, 'otp'=>'1','off'=>'1', 'message' => lang('Label.err_'.$result['data']->status)));
                }else{
                    echo json_encode(array('success' => false, 'otp'=>'1','off'=>'1', 'message' => lang('Label.err_'.$result['data']->status)));
                }
            }else{
                echo json_encode(array('success' => false, 'otp'=>'1','off'=>'1', 'message' => lang('Label.error')));
            }
        }
    }

    public function forgotPass(){
        $data = [];
        $post = $this->request->getPost();
        $title = lang('Label.lbl_forgotPasswordTitle');
        if(!empty($post)){
            if(isset($post['otpBackup'])){
                $post['otp'] = $post['otpBackup'];
            }
            $otp = $post['otp'];
            $phone = $post['phoneGetOtp'];
            $password = $post['password'];
            $rePassword = $post['rePassword'];
            //Check Validation form 
            $this->validation->setRules([
                'phoneGetOtp'               => [
                    'label' => 'Label.phone',
                    'rules' => 'required|phoneValidate['.$phone.']',
                    'errors' => [
                        'required' => 'Validation.phone.required'
                    ]
                ],
                'otpBackup'               => [
                    'label' => 'Label.lbl_otp',
                    'rules' => 'required|exact_length[6]',
                    'errors' => [
                        'required' => 'Validation.otp.required'
                    ]
                ],
                'password'               => [
                    'label' => 'Label.password',
                    'rules' => 'required|passwordValidate['.$password.']',
                    'errors' => [
                        'required' => 'Validation.password.required',
                        'passwordValidate' => 'Validation.password.passwordValidate',
                    ]
                ],
                'rePassword'               => [
                    'label' => 'Label.rePassword',
                    'rules' => 'required|matches[password]',
                    'errors' => [
                        'required' => 'Validation.rePassword.required'
                    ]
                ]
            ]);
            //Run validation
            if(!$this->validation->withRequest($this->request)->run()){
                $data['title'] = $title;
                $data['validate'] = 1;
                $data['getOTP'] = $otp;
                $data['numberPhone'] = $phone;
                $data['getErrors'] = $this->validation->getErrors();
                $data['view'] = 'App\Modules\Authenticator\Views\forgotpassword';
                $data['listValues'] = $post;
                return view('layout/layout', $data);
            }
            else{  
                $dataRePass = [
                    "username"=> $phone,
                    "otpCode"=> $otp,
                    "newPassword"=> $rePassword
                ];
                
                $result =  $this->callServer->PostJson(URL_API_PUBLIC.'user/resetPass',$dataRePass)['data']; 
                if($result->status == 200){
                    return redirect()->to('/dang-nhap');
                }
                else{
                    $data['title'] = $title;
                    $data['errorStatus'] = $result->status;
                    $data['errorRePass'] = lang('Label.err_'.$result->status);
                    $data['validate'] = 1;
                    $data['getOTP'] = $otp;
                    $data['numberPhone'] = $phone;
                    $data['getErrors'] = $this->validation->getErrors();
                    $data['view'] = 'App\Modules\Authenticator\Views\forgotpassword';
                    $data['listValues'] = $post;
                    return view('layout/layout', $data);
                }
            }
        }
    
        
        $data['title'] = $title;
        $data['view'] = 'App\Modules\Authenticator\Views\forgotpassword';
        return view('layout/layout', $data);
    }

    public function info(){
        $data = [];
        $title = "";
        $data['title'] = $title;
        $data['view'] = 'Authenticator/infoUser';
        return view('layout/layout', $data);
    }
    public function logOut(){
        $krd = get_cookie('__krd');
        if($krd){
            $this->redis->del($krd);
            setcookie ("__krd",'',time()+ (1) , '/',DOMAIN_COOKIE);
        }
        header("Location: ".base_url('/'));
        die;
    }

    public function verifyAccount(){
        $title = " Xác thực tài khoản";
        $data['title'] = $title;
        $data['data'] = $data;
        $data['view'] = 'App\Modules\Authenticator\Views\verifyAccount';
        return view('layout/layout', $data);
    }
    public function modalAlert(){
        $data['view'] = 'App\Modules\Authenticator\Views\modalAlert';
        return view('layout/layout', $data);
    }
}
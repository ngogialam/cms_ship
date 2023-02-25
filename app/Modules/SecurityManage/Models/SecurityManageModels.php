<?php

namespace App\Modules\SecurityManage\Models;
use App\Libraries\CallServer;
use App\Libraries\Clogger;
use App\Libraries\Credis;
use Psr\Log\LoggerInterface;

class SecurityManageModels{
    protected $logger;
    //Thay đổi mật khẩu
    public function __construct(LoggerInterface $logger) {
		$this->callServer    			= new CallServer();
        $this->clog = new Clogger(\Config\Services::request());
        $this->logger = $logger; 
        $this->redis = new Credis();
    }


    public function changePassword($dataParams, $username, $headers){
        
        // $result = $this->callServer->PostJson(URL_API_PRIVATE.'user/changePass',$data,$headerGetListOrder)['data'];
        // return $result;
        try {

            $this->clog->info('SECURITY','DATA_CHANGE_PASS_USERNAME:'.$username,json_encode($dataParams,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - DATA_CHANGE_PASS_USERNAME || ' . json_encode($dataParams,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            $result = $this->callServer->PostJson(URL_API_PRIVATE.'user/changePass', $dataParams ,$headers)['data'];
            $this->clog->info('SECURITY','RESPONSE_DATA_CHANGE_PASS_USERNAME:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_DATA_CHANGE_PASS_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('SECURITY','DATA_CHANGE_PASS_USERNAME:'.$username,$th);
            $this->logger->info('SECURITY - DATA_CHANGE_PASS - USERNAME: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }  
}
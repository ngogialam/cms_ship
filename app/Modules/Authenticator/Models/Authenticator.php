<?php 
namespace App\Modules\Authenticator\Models;
/**
 * PHP Redis Custom
 * 
 * Create by QTA
 * Date: 2021-07-06 20:50:00
 */
use App\Libraries\CallServer;
use App\Libraries\Clogger;
use App\Libraries\Credis;
use Psr\Log\LoggerInterface;

class Authenticator {
    /**
	 * Constructor.
	 *
	 * @param LoggerInterface   $logger
	 *
	 */
    protected $logger;

    public function __construct(LoggerInterface $logger) {
		$this->callServer    			= new CallServer();
        $this->clog = new Clogger(\Config\Services::request());
        $this->logger = $logger; 
        $this->redis = new Credis();
    }

    public function registrationUser($username, $data){
        try {
            $this->clog->info('REGISTER','DATA_REGISTER_USERNAME:'.$username,json_encode($data,JSON_UNESCAPED_UNICODE));
            $this->logger->info('REGISTER: '.$username .' - DATA_REGISTER_USERNAME || ' . json_encode($data,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');

            $result = $this->callServer->PostJson(URL_API_PUBLIC.'register',$data)['data'];
            
            $this->clog->info('REGISTER','RESPONSE_DATA_REGISTER_USERNAME:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('REGISTER: '.$username .' - RESPONSE_DATA_REGISTER_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('REGISTER','DATA_REGISTER_USERNAME_ERRORS:'.$username,$th);
            $this->logger->info('REGISTER - DATA_GET_REGISTER - USERNAME_ERRORS: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }
    public function login($username, $data){
        try {
            $this->clog->info('LOGIN','DATA_LOGIN_USERNAME:'.$username,json_encode($data,JSON_UNESCAPED_UNICODE));
            $this->logger->info('LOGIN: '.$username .' - DATA_LOGIN_USERNAME || ' . json_encode($data,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');

            $result = $this->callServer->PostJson(URL_API_PUBLIC.'authenticate',$data)['data'];
            
            $this->clog->info('LOGIN','RESPONSE_DATA_LOGIN_USERNAME:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('LOGIN: '.$username .' - RESPONSE_DATA_LOGIN_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('LOGIN','DATA_LOGIN_USERNAME_ERRORS:'.$username,$th);
            $this->logger->info('LOGIN - DATA_GET_LOGIN - USERNAME_ERRORS: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }
    public function getOrderSearch($data){
        try {
            $this->logger->info('SEARCH_ORDER || ' . json_encode($data,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');

            $result = $this->callServer->PostJson(URL_API_PUBLIC.'consultOrders',$data)['data'];
            
            $this->logger->info('RESPONSE_SEARCH_ORDER || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->logger->info('SEARCH_ORDER - USERNAME_ERRORS: '.$data .'|| ' . $th, array(), 'CALLAPI');
        }
    }
}
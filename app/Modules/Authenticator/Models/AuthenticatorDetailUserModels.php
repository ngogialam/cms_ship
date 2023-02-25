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

use Psr\Log\LoggerInterface;

class AuthenticatorDetailUserModels
{
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
    }

    public function getUser($dataUserAuthen){
        $this->callServer    			= new CallServer();
        $token = $dataUserAuthen->token;
        $sessionKey = $dataUserAuthen->sessionKey;
        $username = $dataUserAuthen->username;
        $dataUser = Array();
        $dataCallApiGetUser = array(
            'username' => $username
        );
        //Set Authorization
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:'.$token
        ];
        $this->clog->info('USER','USERNAME:'.$username,'========GET_USER=========');
        $this->clog->info('USER','DATA_GET_USER_USERNAME:'.$username,$dataCallApiGetUser);

        //Log file
        $this->logger->info('USERNAME: '.$username .'========GET_USER=========', array(), 'CALLAPI');
        $this->logger->info('USERNAME: '.$username .'====DATA_GET_USER || ' .json_encode($dataCallApiGetUser), array(), 'CALLAPI');

        $result = $this->callServer->Get(URL_API_PRIVATE.'user',$dataCallApiGetUser,$headers)['data'];

        $this->clog->info('USER','RESPONSE_GET_USER_USERNAME:'.$username,(array) $result);
        $this->clog->info('USER','USERNAME:'.$username,'========END_GET_USER=========');
        $this->logger->info('RESPONSE_GET_USER_USERNAME: '.$username.' || '.json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
        $this->logger->info('========END_GET_USER=========: '.$username.' || ', array(), 'CALLAPI');

        if($result->status == 200){
            $dataUser = $result->data;
        }
        return $dataUser;
    }
    public function getBalances($username, $dataCallApi, $headers){
        //Log redis
        $this->clog->info('USER','USERNAME:'.$username,'========GET_BALANCES=========');
        $this->clog->info('USER','DATA_GET_BALANCES_USERNAME:'.$username,$dataCallApi);
        //Log file
        $this->logger->info('USERNAME: '.$username .'========GET_BALANCES=========', array(), 'CALLAPI');
        $this->logger->info('USERNAME: '.$username .'====DATA_GET_BALANCES || ' .json_encode($dataCallApi), array(), 'CALLAPI');

        $result = $this->callServer->Get(URL_API_PRIVATE.'user/balances',$dataCallApi,$headers)['data'];

        $this->clog->info('USER','RESPONSE_GET_BALANCES_USERNAME:'.$username,(array) $result);
        $this->clog->info('USER','USERNAME:'.$username,'========END_GET_BALANCES=========');
        $this->logger->info('RESPONSE_GET_BALANCES_USERNAME: '.$username.' || '.json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
        $this->logger->info('========END_GET_BALANCES=========: '.$username.' || ', array(), 'CALLAPI');
        return $result;
    }
}
?>
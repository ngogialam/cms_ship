<?php
namespace App\Modules\WarehouseManage\Models;
/**
 * PHP Redis Custom
 * 
 * Create by QTA
 * Date: 2021-07-06 20:50:00
 */
use App\Libraries\CallServer;
use App\Libraries\Clogger;

use Psr\Log\LoggerInterface;

class WarehouseManageModels
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
        $result = $this->callServer->Get(URL_API_PRIVATE.'user',$dataCallApiGetUser,$headers)['data'];
        if($result->status == 200){
            $dataUser = $result->data;
        }
        return $dataUser;
    }
    public function getListWareHouse($username, $dataCallApi, $headers){
        try {
            $listWareHouseResult = $this->callServer->Get(URL_API_PRIVATE.'pickupAddress',$dataCallApi, $headers)['data'];
            return $listWareHouseResult;
        } catch (\Throwable $th) {
            $this->clog->info('WAREHOUSE','CALL_LIST_WAREHOUSE:'.$username,$th);
            $this->logger->info('WAREHOUSE - CALL_LIST_WAREHOUSE - USERNAME: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }

        // $this->clog->info('WAREHOUSE','USERNAME: '.$username,'========CALL_LIST_WAREHOUSE=========');
        // $this->logger->info('USERNAME: '.$username .'========CALL_LIST_WAREHOUSE=========', array(), 'CALLAPI');
        // $this->logger->info('USERNAME: '.$username .'====DATA_LIST_BANK_COD || ' .json_encode($dataCallApi,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
        // $this->clog->info('WAREHOUSE','DATA_LIST_BANK_COD_USERNAME:'.$username,$dataCallApi);
        // $listWareHouseResult = $this->callServer->Get(URL_API_PRIVATE.'pickupAddress',$dataCallApi, $headers)['data'];
		// $this->clog->info('WAREHOUSE','RESPONSE_CALL_LIST_WAREHOUSE_USERNAME: '.$username,(array) $listWareHouseResult);
        // $this->logger->info('RESPONSE_CALL_LIST_WAREHOUSE_USERNAME: '.$username .'| ' .json_encode($listWareHouseResult,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
        
        // $this->logger->info('USERNAME: '.$username .'========END_CALL_LIST_WAREHOUSE=========', array(), 'CALLAPI');
		// $this->clog->info('WAREHOUSE','USERNAME: '.$username,'========END_CALL_LIST_WAREHOUSE=========');
        // return $listWareHouseResult;
    }
    public function createWareHouse($username, $dataCallApi, $headers){
        $this->clog->info('WAREHOUSE','USERNAME:'.$username,'========CALL_CREATE_WAREHOUSE=========');
        $this->clog->info('WAREHOUSE','DATA_CREATE_WAREHOUSE_USERNAME:'.$username,$dataCallApi);
        //Log file
        $this->logger->info('USERNAME: '.$username .'========CALL_CREATE_WAREHOUSE=========', array(), 'CALLAPI');
        $this->logger->info('USERNAME: '.$username .'====DATA_CREATE_WAREHOUSE || ' .json_encode($dataCallApi,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
        $result = $this->callServer->PostJson(URL_API_PRIVATE.'pickupAddress',$dataCallApi, $headers)['data'];
        $this->clog->info('WAREHOUSE','RESPONSE_CREATE_WAREHOUSE_USERNAME:'.$username,(array) $result);
        $this->clog->info('WAREHOUSE','USERNAME:'.$username,'========END_CREATE_WAREHOUSE=========');
        
        $this->logger->info('RESPONSE_CALL_API_USERNAME: '.$username.' || '.json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
        $this->logger->info('========END_CREATE_WAREHOUSE=========: '.$username.' || ', array(), 'CALLAPI');
        return $result;
    }

    public function updateWareHouse($username, $dataCallApi, $headers){
        $this->clog->info('WAREHOUSE','USERNAME:'.$username,'========CALL_UPDATE_WAREHOUSE=========');
        $this->clog->info('WAREHOUSE','DATA_UPDATE_WAREHOUSE_USERNAME:'.$username,$dataCallApi);

        $this->logger->info('USERNAME: '.$username .'========CALL_UPDATE_WAREHOUSE=========', array(), 'CALLAPI');
        $this->logger->info('USERNAME: '.$username .'====DATA_UPDATE_WAREHOUSE || ' .json_encode($dataCallApi,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
        
        $result = $this->callServer->PostJson(URL_API_PRIVATE.'pickupAddress/update',$dataCallApi, $headers)['data'];
        $this->logger->info('DATA_CALL_API_UPDATE_WAREHOUSE_USERNAME:  '.$username .'|| '.json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
        
        $this->clog->info('WAREHOUSE','RESPONSE_UPDATE_WAREHOUSE_USERNAME:'.$username,(array) $result);
        
        $this->logger->info('USERNAME: '.$username .'========END_UPDATE_WAREHOUSE=========', array(), 'CALLAPI');
        $this->clog->info('WAREHOUSE','USERNAME:'.$username,'========END_UPDATE_WAREHOUSE=========');
        return $result;
    }
}
?>
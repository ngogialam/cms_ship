<?php
namespace App\Modules\Banks\Models;
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

class BanksModels
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
        $this->redis = new Credis();
    }

    public function getListBanks($username, $headers, $dataCallApi){
        //Log redis
        $this->clog->info('WAREHOUSE','USERNAME:'.$username,'========CALL_LIST_BANK_COD=========');
        $this->clog->info('WAREHOUSE','DATA_LIST_BANK_COD_USERNAME:'.$username,$dataCallApi);
        //Log file
        $this->logger->info('USERNAME: '.$username .'========CALL_LIST_BANK_COD=========', array(), 'CALLAPI');
        $this->logger->info('USERNAME: '.$username .'====DATA_LIST_BANK_COD || ' .json_encode($dataCallApi,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
        //Call API

        $result = $this->callServer->Get(URL_API_PRIVATE.'user/bank', $dataCallApi ,$headers)['data'];

        $this->clog->info('WAREHOUSE','RESPONSE_LIST_BANK_COD_USERNAME:'.$username,(array) $result);
        $this->clog->info('WAREHOUSE','USERNAME:'.$username,'========END_LIST_BANK_COD=========');
        
        $this->logger->info('RESPONSE_CALL_API_USERNAME: '.$username.' || '.json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
        $this->logger->info('========END_LIST_BANK_COD=========: '.$username.' || ', array(), 'CALLAPI');
        return $result;
    }

    public function addBank($username, $headers, $dataCallApi){
        try {
            //Log redis
            $this->clog->info('WAREHOUSE','USERNAME:'.$username,'========CALL_CREATE_BANK_COD=========');
            $this->clog->info('WAREHOUSE','DATA_CREATE_BANK_COD_USERNAME:'.$username,$dataCallApi);
            //Log file
            $this->logger->info('USERNAME: '.$username .'========CALL_CREATE_BANK_COD=========', array(), 'CALLAPI');
            $this->logger->info('USERNAME: '.$username .'====DATA_CREATE_BANK_COD || ' .json_encode($dataCallApi,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            //Call API
            $result = $this->callServer->PostJson(URL_API_PRIVATE.'user/addWithdrawBankAccount',$dataCallApi, $headers)['data'];

            $this->clog->info('WAREHOUSE','RESPONSE_CREATE_BANK_COD_USERNAME:'.$username,(array) $result);
            $this->clog->info('WAREHOUSE','USERNAME:'.$username,'========END_CREATE_BANK_COD=========');
            
            $this->logger->info('RESPONSE_CREATE_BANK_COD_USERNAME: '.$username.' || '.json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            $this->logger->info('========END_CREATE_BANK_COD=========: '.$username.' || ', array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('ACCOUNT_INFO','CREATE_CONTRACT_USER_ERRORS:'.$username,$th);
            $this->logger->info('ACCOUNT_INFO - DATA_GET_DELETE_ORDER - USERNAME_ERRORS: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }
    public function removeBank($username, $headers, $dataCallApi){
        try {
            $this->logger->info('USERNAME: '.$username .'========CALL_REMOVE_BANK_COD=========', array(), 'CALLAPI');
            $this->logger->info('USERNAME: '.$username .'====DATA_REMOVE_BANK_COD || ' .json_encode($dataCallApi,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            //Call API
            $result = $this->callServer->PostJsonUpdate(URL_API_PRIVATE.'user/deleteBankAccount',$dataCallApi, $headers, $dataCallApi)['data'];

            $this->logger->info('RESPONSE_REMOVE_BANK_COD_USERNAME: '.$username.' || '.json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            $this->logger->info('========END_REMOVE_BANK_COD=========: '.$username.' || ', array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('ACCOUNT_INFO','CREATE_CONTRACT_USER_ERRORS:'.$username,$th);
            $this->logger->info('ACCOUNT_INFO - DATA_GET_DELETE_ORDER - USERNAME_ERRORS: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }

}
?>
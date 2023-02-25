<?php
namespace App\Modules\AccountInfo\Models;
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

class AccountInfoModels
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
    public function getUserInfo($username, $headers, $dataCallApi){
        try {
            $this->clog->info('ACOUNT_INFO','GET_USER_INFO:'.$username,json_encode($dataCallApi,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - GET_USER_INFO || ' . json_encode($dataCallApi,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            $result = $this->callServer->Get(URL_API_PRIVATE.'user',$dataCallApi,$headers)['data'];
            $this->clog->info('ACOUNT_INFO','RESPONSE_GET_USER_INFO:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_GET_USER_INFO || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('LIST_ORDERS','GET_USER_INFO_ERRORS:'.$username,$th);
            $this->logger->info('LIST_ORDERS - GET_USER_INFO - USERNAME_ERRORS: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }
    public function getBankById($username, $data, $pickId = ''){
        try {
            $returnKey ='';
            foreach ($data as $key => $value) {
                if($pickId && $value->id == $pickId){
                    $returnKey = $key;
                    break;
                }
            }
            if($returnKey == ''){
                foreach ($data as $key => $value) {
                    if($value->status == 1){   
                        $returnKey = $key;
                        break;
                    }
                }
            }
            return $data[$returnKey] ? $data[$returnKey] : array();
        } catch (\Throwable $th) {
            $this->clog->info('ORDER_SINGLE',$username.'|| GET_PICKUP_ADDRESS', $th);
            $this->logger->info('USERNAME: '.$username.'|| '.$th, array(), 'ORDER_SINGLE');
        }
    }
    public function uploadImage($username, $dataParams, $fileName){
        try {
            $this->clog->info('ACOUNT_INFO','UPLOADIMG:'.$username,json_encode($dataParams,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - UPLOADIMG || ' . json_encode($dataParams,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            $this->logger->info('USERNAME: '.$username .' - UPLOADIMG_URL || ' . json_encode(URL_API_UPLOADIMG.'imedia/auth/media/upload_file'), array(), 'CALLAPI');
            $result = $this->callServer->PostUploadImageNew(URL_API_UPLOADIMG.'imedia/auth/media/upload_file', $dataParams,$fileName);
            $this->clog->info('ACOUNT_INFO','RESPONSE_UPLOADIMG:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_UPLOADIMG || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('LIST_ORDERS','UPLOADIMG_ERRORS:'.$username,$th);
            $this->logger->info('LIST_ORDERS - UPLOADIMG - USERNAME_ERRORS: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }

    public function updateAccountInfo($username, $headers, $dataCallApi){
        try{
            $this->clog->info('ACCOUNT_INFO','USERNAME:'.$username,'========UPDATE_ACCOUNT_INFO=========');
            $this->clog->info('ACCOUNT_INFO','DATA_UPDATE_ACCOUNT_INFO_USERNAME:'.$username,$dataCallApi);

            $this->logger->info('UPDATE_USER_INFO_USERNAME: '.$username .'|| ========UPDATE_ACCOUNT_INFO=========', array(), 'CALLAPI');
            //Set Authorization
            
            $this->logger->info('UPDATE_USER_INFO_USERNAME: '.$username .'|| '.json_encode($dataCallApi) .'|| headers:'. json_encode($headers), array(), 'CALLAPI');
            $result = $this->callServer->PostJson(URL_API_PRIVATE.'user',$dataCallApi, $headers)['data'];

            $this->clog->info('ACCOUNT_INFO','RESPONSE_UPDATE_ACCOUNT_INFO_USERNAME:'.$username,(array)$result);
            $this->clog->info('ACCOUNT_INFO','USERNAME:'.$username,'========END_UPDATE_ACCOUNT_INFO=========');

            $this->logger->info('RESPONSE_UPDATE_USER_INFO_USERNAME: '.$username .'|| '.json_encode($result), array(), 'CALLAPI');
            $this->logger->info('UPDATE_USER_INFO_USERNAME: '.$username .'|| ========END_UPDATE_ACCOUNT_INFO=========', array(), 'CALLAPI');
            return $result;
        }catch (\Throwable $th) {
            $this->clog->info('LIST_ORDERS','DATA_GET_LIST_ORDERS_USERNAME_ERRORS:'.$username,$th);
            $this->logger->info('LIST_ORDERS - DATA_GET_LIST_ORDERS - USERNAME_ERRORS: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }
    public function getListBank($username, $headers, $dataCallApi){
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

    public function createContract($username, $headers, $dataCallApi){
        try {
            $this->clog->info('ACCOUNT_INFO','CREATE_CONTRACT_USER:'.$username,json_encode($dataCallApi,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - CREATE_CONTRACT_USER || ' . json_encode($dataCallApi,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');

            $result = $this->callServer->PostJson(URL_API_PRIVATE.'user/contract',$dataCallApi,$headers)['data'];
            
            $this->clog->info('ACCOUNT_INFO','RESPONSE_CREATE_CONTRACT_USER:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_CREATE_CONTRACT_USER || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('ACCOUNT_INFO','CREATE_CONTRACT_USER_ERRORS:'.$username,$th);
            $this->logger->info('ACCOUNT_INFO - DATA_GET_DELETE_ORDER - USERNAME_ERRORS: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }
    
    public function checkVA($headers){
        $data = [];
        $this->logger->info('CALL SERVER CHECK VA : '. json_encode($data,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
        $result = $this->callServer->Get(URL_API_HOLA_PRIVATE.'user/bankVA',$data,$headers)['data'];
        $this->logger->info('DATA RESPON CHECK VA: '. json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
        return $result;
    }

    public function activeVA($data,$headers){
        $this->logger->info('CALL SERVER ACTIVE VA : '. json_encode($data,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
        $result = $this->callServer->PostJson(URL_API_HOLA_PRIVATE.'user/registerVA',$data,$headers)['data'];
        $this->logger->info('DATA RESPON ACTIVE VA: '. json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
        return $result;
    }
    public function getListUserContract($headers){
        $data = [];
        $this->logger->info('GET_LIST_USER_CONTRACT : '. json_encode($data,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
        $result = $this->callServer->Get(URL_API_HOLA_PRIVATE.'infoContractUsers',$data,$headers)['data'];
        $this->logger->info('RESPONSEGET_LIST_USER_CONTRACT: '. json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
        return $result;
    }
    public function getDetailUserContract($headers, $data){
        $this->logger->info('GET_DETAIL_USER_CONTRACT : '. json_encode($data,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
        $result = $this->callServer->Get(URL_API_HOLA_PRIVATE.'infoContractUser',$data,$headers)['data'];
        $this->logger->info('RESPONSE_GET_DETAIL_USER_CONTRACT: '. json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
        return $result;
    }
    public function updateContractCustomer($username, $headers, $dataCallApi){
        try {
            $this->logger->info('USERNAME: '.$username .' - UPDATE_CONTRACT_CUSTOMER || ' . json_encode($dataCallApi,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');

            $result = $this->callServer->PostJson(URL_API_PRIVATE.'contracts/edit',$dataCallApi,$headers)['data'];
            
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_UPDATE_CONTRACT_CUSTOMER || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->logger->info('ACCOUNT_INFO - UPDATE_CONTRACT_CUSTOMER - USERNAME_ERRORS: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }
}
?>
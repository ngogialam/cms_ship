<?php
namespace App\Modules\OrderManage\MultipleOrders\Models;
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

class MultipleOrdersModel
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

    
    public function getPickupAddressDetail($username, $pickupAddressId){
        try {
            $arrData = json_decode($this->redis->get($username));
            $arrPickupAddress = $arrData->pickupAddress;
            $dataWareHouseKey = array_search($pickupAddressId, array_column($arrPickupAddress, 'id'));
            if($dataWareHouseKey !== false){
                return $dataWareHouse = $arrPickupAddress[$dataWareHouseKey];
            }else{
                return [];
            }
        } catch (\Throwable $th) {
            $this->clog->info('CREATE_ORDER','DATA_CREATE_ORDER_USERNAME:'.$username,$th);
            $this->logger->info('USERNAME: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }

    public function getListPackages($username, $headers, $dataParams){
        try {

            $this->clog->info('MULTIPLE_ORDER','DATA_GET_LIST_PACKAGES_USERNAME:'.$username,json_encode($dataParams,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - DATA_GET_LIST_PACKAGES_USERNAME || ' . json_encode($dataParams,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            $result = $this->callServer->PostJson(URL_API_PRIVATE.'orderFile/calculateFee', $dataParams ,$headers)['data'];
            $this->clog->info('MULTIPLE_ORDER','RESPONSE_GET_LIST_PACKAGES_USERNAME:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_GET_LIST_PACKAGES_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('MULTIPLE_ORDER','GET_LIST_PACKAGES:'.$username,$th);
            $this->logger->info('MULTIPLE_ORDER - GET_LIST_PACKAGES - USERNAME: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }

    public function getFees($username, $headers, $dataParams){
        try {

            $this->clog->info('MULTIPLE_ORDER','DATA_GET_LIST_FEES_USERNAME:'.$username,json_encode($dataParams,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - DATA_GET_LIST_FEES_USERNAME || ' . json_encode($dataParams,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            $result = $this->callServer->PostJson(URL_API_PRIVATE.'orderFile/calculateFee', $dataParams ,$headers)['data'];
            $this->clog->info('MULTIPLE_ORDER','RESPONSE_DATA_GET_LIST_FEES_USERNAME:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_DATA_GET_LIST_FEES_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('MULTIPLE_ORDER','DATA_GET_LIST_FEES_USERNAME:'.$username,$th);
            $this->logger->info('MULTIPLE_ORDER - DATA_GET_LIST_FEES - USERNAME: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }
    public function createOrderFile($username, $headers, $dataParams){
        try {
            $this->logger->info('TOKEN-USERNAME: '.$username .' - DATA_CREATE_ORDER_FILE_USERNAME || ' . json_encode($headers,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            $this->clog->info('MULTIPLE_ORDER','DATA_CREATE_ORDER_FILE_USERNAME:'.$username,json_encode($dataParams,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - DATA_CREATE_ORDER_FILE_USERNAME || ' . json_encode($dataParams,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            $result = $this->callServer->PostJson(URL_API_PRIVATE.'orderFile', $dataParams ,$headers)['data'];
            $this->clog->info('MULTIPLE_ORDER','RESPONSE_DATA_CREATE_ORDER_FILE_USERNAME:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_DATA_CREATE_ORDER_FILE_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('MULTIPLE_ORDER','CREATE_ORDER_FILE_USERNAME: '.$username,$th);
            $this->logger->info('MULTIPLE_ORDER - CREATE_ORDER_FILE - USERNAME: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }
}
?>
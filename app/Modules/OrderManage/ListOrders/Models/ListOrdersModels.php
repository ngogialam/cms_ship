<?php
namespace App\Modules\OrderManage\ListOrders\Models;
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

class ListOrdersModels
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

    public function getListOrders($username, $headers, $dataParams){
        try {
            $this->clog->info('LIST_ORDERS','DATA_GET_LIST_ORDERS_USERNAME:'.$username,json_encode($dataParams,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - DATA_GET_LIST_ORDERS_USERNAME || ' . json_encode($dataParams,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            $result = $this->callServer->PostJson(URL_API_PRIVATE.'getOrders', $dataParams ,$headers)['data'];
            $this->clog->info('LIST_ORDERS','RESPONSE_DATA_GET_LIST_ORDERS_USERNAME:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_DATA_GET_LIST_ORDERS_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('LIST_ORDERS','DATA_GET_LIST_ORDERS_USERNAME_ERRORS:'.$username,$th);
            $this->logger->info('LIST_ORDERS - DATA_GET_LIST_ORDERS - USERNAME_ERRORS: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }
    public function getListOrdersDetail($username, $headers, $dataParams){
        try {
            $this->clog->info('LIST_ORDERS','DATA_GET_LIST_ORDERS_USERNAME:'.$username,json_encode($dataParams,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - DATA_GET_LIST_ORDERS_USERNAME || ' . json_encode($dataParams,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            $this->logger->info('USERNAME: '.$username .' - DATA_GET_LIST_ORDERS_USERNAME || ' . URL_API_PRIVATE.'getOrderDetails', array(), 'CALLAPI');
            $result = $this->callServer->PostJson(URL_API_PRIVATE.'getOrderDetails', $dataParams ,$headers)['data'];
            $this->clog->info('LIST_ORDERS','RESPONSE_DATA_GET_LIST_ORDERS_USERNAME:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_DATA_GET_LIST_ORDERS_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('LIST_ORDERS','DATA_GET_LIST_ORDERS_USERNAME_ERRORS:'.$username,$th);
            $this->logger->info('LIST_ORDERS - DATA_GET_LIST_ORDERS - USERNAME_ERRORS: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }

    public function getTotalOrders($username, $headers, $dataParams){
        try {
            $this->clog->info('LIST_ORDERS','DATA_GET_TOTAL_ORDERS_USERNAME:'.$username,json_encode($dataParams,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - DATA_GET_TOTAL_ORDERS_USERNAME || ' . json_encode($dataParams,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            $result = $this->callServer->PostJson(URL_API_PRIVATE.'getSumOrderStatus', $dataParams ,$headers)['data'];
            $this->clog->info('LIST_ORDERS','RESPONSE_DATA_GET_TOTAL_ORDERS_USERNAME:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_DATA_GET_TOTAL_ORDERS_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('LIST_ORDERS','DATA_GET_TOTAL_ORDERS_USERNAME_ERRORS:'.$username,$th);
            $this->logger->info('LIST_ORDERS - DATA_GET_TOTAL_ORDERS - USERNAME_ERRORS: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }

    public function getDetailOrder($username, $headers, $orderId){
        try {
            $this->clog->info('LIST_ORDERS','DATA_GET_ORDER_DETAIL_USERNAME:'.$username,json_encode($orderId,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - DATA_GET_ORDER_DETAIL_USERNAME || ' . json_encode($orderId,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            $result = $this->callServer->Get(URL_API_PRIVATE.'getOrderDetail',$orderId,$headers)['data'];
            
            $this->clog->info('LIST_ORDERS','RESPONSE_DATA_GET_ORDER_DETAIL_USERNAME:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_DATA_GET_ORDER_DETAIL_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('LIST_ORDERS','DATA_GET_ORDER_DETAIL_USERNAME_ERRORS:'.$username,$th);
            $this->logger->info('LIST_ORDERS - DATA_GET_GET_ORDER_DETAIL - USERNAME_ERRORS: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }

    public function getAllDetailOrder($username, $headers, $orderId){
        try {
            $this->clog->info('LIST_ORDERS','DATA_GET_ORDER_DETAIL_USERNAME:'.$username,json_encode($orderId,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - DATA_GET_ORDER_DETAIL_USERNAME || ' . json_encode($orderId,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            $result = $this->callServer->PostJson(URL_API_PRIVATE.'getOrders',$orderId,$headers)['data'];
            
            $this->clog->info('LIST_ORDERS','RESPONSE_DATA_GET_ORDER_DETAIL_USERNAME:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_DATA_GET_ORDER_DETAIL_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('LIST_ORDERS','DATA_GET_ORDER_DETAIL_USERNAME_ERRORS:'.$username,$th);
            $this->logger->info('LIST_ORDERS - DATA_GET_GET_ORDER_DETAIL - USERNAME_ERRORS: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }

    public function approveOrder($username, $headers, $orderId){
        try {
            $this->clog->info('LIST_ORDERS','DATA_CONFIRM_ORDER_USERNAME:'.$username,json_encode($orderId,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - DATA_CONFIRM_ORDER_USERNAME || ' . json_encode($orderId,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            $result = $this->callServer->PostJson(URL_API_PRIVATE.'confirmOrder',$orderId,$headers)['data'];
            
            $this->clog->info('LIST_ORDERS','RESPONSE_DATA_CONFIRM_ORDER_USERNAME:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_DATA_CONFIRM_ORDER_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('LIST_ORDERS','DATA_CONFIRM_ORDER_USERNAME_ERRORS:'.$username,$th);
            $this->logger->info('LIST_ORDERS - DATA_GET_CONFIRM_ORDER - USERNAME_ERRORS: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }
    public function changeInfoReceiver($username, $headers, $orderId, $params){
        try {
            $this->clog->info('LIST_ORDERS','DATA_CHANGEINFO_USERNAME:'.$username,json_encode($orderId,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - DATA_CHANGEINFO_USERNAME || ' . json_encode($params,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');

            $result = $this->callServer->PostJsonUpdate(URL_API_PRIVATE.'updateOrder',$orderId,$headers, $params)['data'];
            
            $this->clog->info('LIST_ORDERS','RESPONSE_DATA_CHANGEINFO_USERNAME:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_DATA_CHANGEINFO_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('LIST_ORDERS','DATA_CHANGEINFO_USERNAME_ERRORS:'.$username,$th);
            $this->logger->info('LIST_ORDERS - DATA_GET_CHANGEINFO - USERNAME_ERRORS: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }
    public function changeInfoOrder($username, $headers, $orderId, $params){
        try {
            $this->clog->info('LIST_ORDERS','DATA_CHANGEINFO_USERNAME:'.$username,json_encode($orderId,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - DATA_CHANGEINFO_USERNAME || ' . json_encode($params,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            $this->logger->info('USERNAME: '.$username .' - DATA_CHANGEINFO_USERNAME || ' . json_encode($orderId,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');

            $result = $this->callServer->PostJsonUpdate(URL_API_PRIVATE.'changeCod',$orderId,$headers, $params)['data'];
            
            $this->clog->info('LIST_ORDERS','RESPONSE_DATA_CHANGEINFO_USERNAME:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_DATA_CHANGEINFO_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('LIST_ORDERS','DATA_CHANGEINFO_USERNAME_ERRORS:'.$username,$th);
            $this->logger->info('LIST_ORDERS - DATA_GET_CHANGEINFO - USERNAME_ERRORS: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }
    public function reDelivery($username, $headers, $orderId, $params){
        try {
            $this->clog->info('LIST_ORDERS','DATA_REDELIVERY_USERNAME:'.$username,json_encode($params,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - DATA_REDELIVERY_USERNAME || ' . json_encode($params,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');

            $result = $this->callServer->PostJsonUpdate(URL_API_PRIVATE.'reDelivery',$orderId,$headers, $params)['data'];
            
            $this->clog->info('LIST_ORDERS','RESPONSE_DATA_REDELIVERY_USERNAME:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_DATA_REDELIVERY_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('LIST_ORDERS','DATA_REDELIVERY_USERNAME_ERRORS:'.$username,$th);
            $this->logger->info('LIST_ORDERS - DATA_GET_REDELIVERY - USERNAME_ERRORS: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }
    public function refundOrder($username, $headers, $orderId, $params){
        try {
            $this->clog->info('LIST_ORDERS','DATA_REFUNDORDER_USERNAME:'.$username,json_encode($params,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - DATA_REFUNDORDER_USERNAME || ' . json_encode($params,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');

            $result = $this->callServer->PostJsonUpdate(URL_API_PRIVATE.'refundOrder',$orderId,$headers, $params)['data'];
            
            $this->clog->info('LIST_ORDERS','RESPONSE_DATA_REFUNDORDER_USERNAME:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_DATA_REFUNDORDER_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('LIST_ORDERS','DATA_REFUNDORDER_USERNAME_ERRORS:'.$username,$th);
            $this->logger->info('LIST_ORDERS - DATA_GET_REFUNDORDER - USERNAME_ERRORS: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }
    public function cancelOrder($username, $headers, $dataOrder){
        try {
            $this->clog->info('LIST_ORDERS','DATA_CANCELORDER_USERNAME:'.$username,json_encode($dataOrder,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - DATA_CANCELORDER_USERNAME || ' . json_encode($dataOrder,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');

            $result = $this->callServer->PostJson(URL_API_PRIVATE.'cancelOrder',$dataOrder,$headers)['data'];
            
            $this->clog->info('LIST_ORDERS','RESPONSE_DATA_CANCELORDER_USERNAME:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_DATA_CANCELORDER_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('LIST_ORDERS','DATA_CANCELORDER_USERNAME_ERRORS:'.$username,$th);
            $this->logger->info('LIST_ORDERS - DATA_GET_CANCELORDER - USERNAME_ERRORS: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }
    public function partialConfirm($username, $headers, $dataOrder){
        try {
            $this->clog->info('LISTORDER','DATA_PARTIAL_CONFIRM_USERNAME:'.$username,json_encode($dataOrder,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - DATA_PARTIAL_CONFIRM_USERNAME || ' . json_encode($dataOrder,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');

            $result = $this->callServer->PostJson(URL_API_PRIVATE.'confirmPartialRequest',$dataOrder,$headers)['data'];
            
            $this->clog->info('LISTORDER','RESPONSE_DATA_PARTIAL_CONFIRM_USERNAME:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_DATA_PARTIAL_CONFIRM_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('LISTORDER','DATA_PARTIAL_CONFIRM_USERNAME_ERRORS:'.$username,$th);
            $this->logger->info('LISTORDER - DATA_GET_PARTIAL_CONFIRM - USERNAME_ERRORS: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }

    public function getOrderPending($username, $headers, $dataCallApiOrderDetail){
        try {
            // $this->clog->info('LIST_ORDERS','DATA_GET_ORDER_PENDING_USERNAME:'.$username,json_encode($dataCallApiOrderDetail,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - DATA_GET_ORDER_PENDING_USERNAME || ' . json_encode($dataCallApiOrderDetail,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            $this->logger->info('USERNAME: '.$username .' - DATA_GET_ORDER_PENDING_USERNAME || ' . json_encode($headers,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');

            // $result = $this->callServer->PostJsonUpdate(URL_API_PRIVATE.'getWTCOrder',$orderId,$headers, $params)['data'];
            $result = $this->callServer->Get(URL_API_PRIVATE.'getWTCOrder',$dataCallApiOrderDetail,$headers)['data'];
            
            // $this->clog->info('LIST_ORDERS','RESPONSE_DATA_GET_ORDER_PENDING_USERNAME:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_DATA_GET_ORDER_PENDING_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('LIST_ORDERS','DATA_GET_ORDER_PENDING_USERNAME_ERRORS:'.$username,$th);
            $this->logger->info('LIST_ORDERS - DATA_GET_GET_ORDER_PENDING - USERNAME_ERRORS: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }

    public function getDataPrint($username, $headers, $dataCallApiOrderDetail){
        try {
            $this->logger->info('USERNAME: '.$username .' - DATA_GET_ORDER_PRINT_USERNAME || ' . json_encode($dataCallApiOrderDetail,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            $result = $this->callServer->PostJson(URL_API_PRIVATE.'printOrders',$dataCallApiOrderDetail,$headers)['data'];
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_DATA_GET_ORDER_PRINT_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;
        } catch (\Throwable $th) {
            $this->clog->info('LIST_ORDERS','DATA_GET_ORDER_PRINT_USERNAME_ERRORS:'.$username,$th);
            $this->logger->info('LIST_ORDERS - DATA_GET_ORDER_PRINT_USERNAME_ERRORS: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }
    public function deleteOrder($username, $headers, $dataOrder){
        try {
            $this->clog->info('LIST_ORDERS','DATA_DELETE_ORDER_USERNAME:'.$username,json_encode($dataOrder,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - DATA_DELETE_ORDER_USERNAME || ' . json_encode($dataOrder,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');

            $result = $this->callServer->PostJson(URL_API_PRIVATE.'deleteOrder',$dataOrder,$headers)['data'];
            
            $this->clog->info('LIST_ORDERS','RESPONSE_DATA_DELETE_ORDER_USERNAME:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_DATA_DELETE_ORDER_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('LIST_ORDERS','DATA_DELETE_ORDER_USERNAME_ERRORS:'.$username,$th);
            $this->logger->info('LIST_ORDERS - DATA_GET_DELETE_ORDER - USERNAME_ERRORS: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }
    public function deleteAllOrder($username, $headers, $dataOrder){
        try {
            $this->clog->info('LIST_ORDERS','DATA_DELETE_ORDER_USERNAME:'.$username,json_encode($dataOrder,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - DATA_DELETE_ORDER_USERNAME || ' . json_encode($dataOrder,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');

            $result = $this->callServer->PostJson(URL_API_PRIVATE.'deleteOrder',$dataOrder,$headers)['data'];
            
            $this->clog->info('LIST_ORDERS','RESPONSE_DATA_DELETE_ORDER_USERNAME:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_DATA_DELETE_ORDER_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('LIST_ORDERS','DATA_DELETE_ORDER_USERNAME_ERRORS:'.$username,$th);
            $this->logger->info('LIST_ORDERS - DATA_GET_DELETE_ORDER - USERNAME_ERRORS: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }
    public function getOrderSearch($username, $data, $headers){
        try {
            $this->logger->info('SEARCH_ORDER || ' . json_encode($data,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            $this->logger->info('SEARCH_ORDER_HEADER || ' . json_encode($headers,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');

            $result = $this->callServer->PostJson(URL_API_PUBLIC.'consultOrders',$data,$headers)['data'];
            
            $this->logger->info('RESPONSE_SEARCH_ORDER || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->logger->info('SEARCH_ORDER - USERNAME_ERRORS: '.$data .'|| ' . $th, array(), 'CALLAPI');
        }
    }
    
}
?>
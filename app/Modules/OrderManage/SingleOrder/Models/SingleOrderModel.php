<?php
namespace App\Modules\OrderManage\SingleOrder\Models;
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

class SingleOrderModel
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

    public function getUser($dataUserAuthen){
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

    public function createOrder($username,$dataCallApiDetailBalance,$headers){
        $this->clog->info('CREATE_ORDER','USERNAME:'.$username,'========CREATE_ORDER=========');
        $this->clog->info('CREATE_ORDER','DATA_CREATE_ORDER_USERNAME:'.$username,$dataCallApiDetailBalance);
        
        $this->logger->info('USERNAME: '.$username .'|| ========CREATE_ORDER=========', array(), 'CALLAPI');
        $this->logger->info('DATA_CREATE_ORDER_USERNAME: '.$username .'|| '.json_encode($dataCallApiDetailBalance,JSON_UNESCAPED_UNICODE) .'|| headers:'. json_encode($headers), array(), 'CALLAPI');
        $result = $this->callServer->PostJson(URL_API_PRIVATE.'user/CREATE_ORDERLogs',$dataCallApiDetailBalance,$headers)['data'];
        
        $this->clog->info('CREATE_ORDER','RESPONSE_CREATE_ORDER_USERNAME:'.$username,(array)$result);
        $this->clog->info('CREATE_ORDER','END_USERNAME:'.$username,'========END_CREATE_ORDER=========');
        
        $this->logger->info('RESPONSE_CREATE_ORDER_USERNAME: '.$username .'|| '.json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
        $this->logger->info('USERNAME: '.$username .'|| ========END_CREATE_ORDER=========', array(), 'CALLAPI');
        return $result;
    }

    public function getListPostage($header = []){
        $data = [];
        $result = $this->callServer->Get(URL_API_PUBLIC.'postage',$data, $header)['data'];
        $this->logger->info('====GET-LIST-POSTAGE || '.json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
        $this->logger->info('====HEADER-GET-LIST-POSTAGE || '.json_encode($header,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');

        if($result->status == 200){
            return (array) $result->data;
        }else{
            return [];
        }
    }

    public function getProvince(){
		$this->redis = new Credis();
        $dataProvince = Array();
        $addressValue = json_decode($this->redis->get('ADDRESS_INFO'));
        foreach ($addressValue as $key =>$value){
            $dataProvince[] = Array(
                'name' => $value->name,
                'code' => $value->code,
            );
        }
        return $this->cleanArray($dataProvince);
    }

    public function getDistrict($provinceCode, $districtCode){
		$this->redis = new Credis();
        $dataDistrict = Array();
        $addressValue = json_decode($this->redis->get('ADDRESS_INFO'));
        if($districtCode){
            $provinceCode = $provinceCode;
            $dataDistrictTmp = $addressValue->$provinceCode;
            // echo '<pre>';
            // print_r($dataDistrictTmp);die;
            if(!empty($dataDistrictTmp)){
                foreach($dataDistrictTmp as $value){
                    $dataDistrict[] = Array(
                        'name' => $value->name,
                        'code' => $value->code,
                    );
                }
            }
        }
        return $this->cleanArray($dataDistrict);
    }

    function cleanArray($array)
    {
        if (is_array($array))
        {
            foreach ($array as $key => $sub_array)
            {
                $result = $this->cleanArray($sub_array);
                if ($result === false)
                {
                    unset($array[$key]);
                }
                else
                {
                    $array[$key] = $result;
                }
            }
        }

        if (empty($array))
        {
            return false;
        }

        return $array;
    }
    public function getWards($provinceCode, $districtCode, $wardCode){
        $this->redis = new Credis();
        $dataWards = Array();
        $addressValue = json_decode($this->redis->get('ADDRESS_INFO'));
        if($wardCode && $districtCode){
            $districtCode = $districtCode;
            $provinceCode = $provinceCode;
            $dataDistrictTmp = $addressValue->$provinceCode;
            if(!empty($dataDistrictTmp)){
                foreach($dataDistrictTmp->$districtCode as $value){
                    $dataWards[] = Array(
                        'name' => $value->name,
                        'code' => $value->code,
                    );
                };
            }
        }
        return $this->cleanArray($dataWards);
    }
    public function getPickupAddress($dataUserAuthen, $pickupAddressId){
        $this->redis = new Credis();
        $dataUser = json_decode($this->redis->get($dataUserAuthen->username));
        $pickupAddress = $dataUser->pickupAddress;
        $dataWareHouseKey = array_search($pickupAddressId, array_column($pickupAddress, 'id'));
        if($dataWareHouseKey !== false){
            $choosePickupAddress = $pickupAddress[$dataWareHouseKey];
            return $choosePickupAddress;
        }else{
            return [];
        }
    }

    public function getPickupAddressID($username, $data, $pickId = ''){
        try {
            foreach ($data as $key => $value) {
                if($pickId && $value->id == $pickId){
                    $returnKey = $key;
                    break;
                }else{
                    if ($value->status == 1 && $value->isDefault == 1)
                        $returnKey = $key;
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

    public function getProductCateName($cateId){
        $productCategory = json_decode($this->redis->get('productCategory'), true);
        return $productCategory[$cateId];
    }

    public function getRequireNoteName($requireNoteId){
        $requireNotes = Array(
            '1' => 'Không cho xem hàng',
            '2' => 'Cho thử hàng',
            '3' => 'Cho xem không cho thử'
        );
        return $requireNotes[$requireNoteId];
    }
    public function getFees($username,$dataParams,$headers,$orderID){
        try {

            $this->clog->info('SINGLE_ORDER','DATA_GET_FEE_USERNAME:'.$username.'| ORDER_ID: '.$orderID,json_encode($dataParams,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - DATA_GET_FEE_USERNAME || ' . json_encode($dataParams,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            $result = $this->callServer->PostJson(URL_API_PRIVATE.'order/calculateFee', $dataParams ,$headers)['data'];
            $this->clog->info('SINGLE_ORDER','RESPONSE_DATA_GET_FEE_USERNAME:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_DATA_GET_FEE_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('SINGLE_ORDER','GET_FEE_USERNAME: '.$username,$th);
            $this->logger->info('SINGLE_ORDER - GET_FEE - USERNAME: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }
    public function createSingleOrder($username,$dataParams,$headers){
        try {

            $this->clog->info('SINGLE_ORDER','DATA_CREATE_ORDER_SINGLE_USERNAME:'.$username,json_encode($dataParams,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - DATA_CREATE_ORDER_SINGLE_USERNAME || ' . json_encode($dataParams,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            $result = $this->callServer->PostJson(URL_API_PRIVATE.'order', $dataParams ,$headers)['data'];
            $this->clog->info('SINGLE_ORDER','RESPONSE_DATA_CREATE_ORDER_SINGLE_USERNAME:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_DATA_CREATE_ORDER_SINGLE_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('SINGLE_ORDER','CREATE_ORDER_SINGLE_USERNAME: '.$username,$th);
            $this->logger->info('SINGLE_ORDER - CREATE_ORDER_SINGLE - USERNAME: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }
    public function createOrderDraft($username,$dataParams,$headers){
        try {
            $this->clog->info('SINGLE_ORDER','DATA_CREATE_ORDER_DRAFT_USERNAME:'.$username,json_encode($dataParams,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - DATA_CREATE_ORDER_DRAFT_USERNAME || ' . json_encode($dataParams,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            $result = $this->callServer->PostJson(URL_API_PRIVATE.'orderDraft', $dataParams ,$headers)['data'];
            $this->clog->info('SINGLE_ORDER','RESPONSE_DATA_CREATE_ORDER_DRAFT_USERNAME:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_DATA_CREATE_ORDER_DRAFT_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;
        } catch (\Throwable $th) {
            $this->clog->info('SINGLE_ORDER','CREATE_ORDER_DRAFT_USERNAME: '.$username,$th);
            $this->logger->info('SINGLE_ORDER - CREATE_ORDER_DRAFT - USERNAME: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }
    public function updateSingleOrder($username, $headers, $orderId, $params){
        try {
            $this->clog->info('LIST_ORDERS','DATA_EDIT_ORDER_PENDING_USERNAME:'.$username,json_encode($orderId,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - DATA_EDIT_ORDER_PENDING_USERNAME || ' . json_encode($orderId,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');

            $result = $this->callServer->PostJsonUpdate(URL_API_PRIVATE.'updateWTCOrder',$orderId,$headers, $params)['data'];
            $this->clog->info('LIST_ORDERS','RESPONSE_DATA_EDIT_ORDER_PENDING_USERNAME:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_DATA_EDIT_ORDER_PENDING_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('LIST_ORDERS','DATA_EDIT_ORDER_PENDING_USERNAME_ERRORS:'.$username,$th);
            $this->logger->info('LIST_ORDERS - DATA_GET_EDIT_ORDER_PENDING - USERNAME_ERRORS: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }

    public function optimizeOrder($username,$dataParams,$headers){
        try {

            $this->clog->info('SINGLE_ORDER','DATA_OPTIMIZER_ORDER_USERNAME:'.$username,json_encode($dataParams,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - DATA_OPTIMIZER_ORDER_USERNAME || ' . json_encode($dataParams,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            $result = $this->callServer->PostJson(URL_API_PRIVATE.'optimizeOrder', $dataParams ,$headers)['data'];
            $this->clog->info('SINGLE_ORDER','RESPONSE_DATA_OPTIMIZER_ORDER_USERNAME:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_DATA_OPTIMIZER_ORDER_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('SINGLE_ORDER','CREATE_ORDER_SINGLE_USERNAME: '.$username,$th);
            $this->logger->info('SINGLE_ORDER - CREATE_ORDER_SINGLE - USERNAME: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }

    public function getSuggestionAddress($username,$dataParams,$headers){
        try {

            $this->logger->info('USERNAME: '.$username .' - GET_SUGGESTION_ADDRESS || ' . json_encode($dataParams,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            $result = $this->callServer->Get(URL_API_SUGGEST_LOCATION_ADDRESS.'addresses',$dataParams, $headers)['data'];
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_GET_SUGGESTION_ADDRESS || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->logger->info('SINGLE_ORDER - GET_SUGGESTION_ADDRESS - USERNAME: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }
    public function checkCodValue($headers,$dataParams,$username){
        try {

            $this->logger->info('USERNAME: '.$username .' - CHECK_COD_VALUE || ' . json_encode($dataParams,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            $result = $this->callServer->PostJson(URL_API_PRIVATE.'validCod', $dataParams ,$headers)['data'];
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_CHECK_COD_VALUE || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->logger->info('SINGLE_ORDER - CHECK_COD_VALUE - USERNAME: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }
}

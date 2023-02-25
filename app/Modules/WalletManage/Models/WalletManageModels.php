<?php
namespace App\Modules\WalletManage\Models;

/**
 * PHP Redis Custom
 *
 * Create by QTA
 * Date: 2021-07-06 20:50:00
 */
use App\Libraries\CallServer;
use App\Libraries\Clogger;
use Psr\Log\LoggerInterface;

class WalletManageModels
{
    /**
     * Constructor.
     *
     * @param LoggerInterface   $logger
     *
     */
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->callServer = new CallServer();
        $this->clog = new Clogger(\Config\Services::request());
        $this->logger = $logger;
    }

    public function getUser($dataUserAuthen)
    {
        $this->callServer = new CallServer();
        $token = $dataUserAuthen->token;
        $sessionKey = $dataUserAuthen->sessionKey;
        $username = $dataUserAuthen->username;
        $dataUser = array();
        $dataCallApiGetUser = array(
            'username' => $username,
        );
        //Set Authorization
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:' . $token,
        ];
        $result = $this->callServer->Get(URL_API_PRIVATE . 'user', $dataCallApiGetUser, $headers)['data'];
        if ($result->status == 200) {
            $dataUser = $result->data;
        }
        return $dataUser;
    }
    public function getBalanceFluctuations($username, $dataCallApiDetailBalance, $headers)
    {
        $this->clog->info('WALLET', 'USERNAME:' . $username, '========GET_LIST_WALLET=========');
        $this->clog->info('WALLET', 'DATA_GET_LIST_WALLET_USERNAME:' . $username, $dataCallApiDetailBalance);

        $this->logger->info('USERNAME: ' . $username . '|| ========GET_LIST_WALLET=========', array(), 'CALLAPI');
        $this->logger->info('DATA_GET_LIST_WALLET_USERNAME: ' . $username . '|| ' . json_encode($dataCallApiDetailBalance, JSON_UNESCAPED_UNICODE) . '|| headers:' . json_encode($headers), array(), 'CALLAPI');
        $result = $this->callServer->PostJson(URL_API_PRIVATE . 'user/walletLogs', $dataCallApiDetailBalance, $headers)['data'];

        $this->clog->info('WALLET', 'RESPONSE_GET_LIST_WALLET_USERNAME:' . $username, (array) $result);
        $this->clog->info('WALLET', 'END_USERNAME:' . $username, '========END_GET_LIST_WALLET=========');

        $this->logger->info('RESPONSE_GET_LIST_WALLET_USERNAME: ' . $username . '|| ' . json_encode($result, JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
        $this->logger->info('USERNAME: ' . $username . '|| ========END_GET_LIST_WALLET=========', array(), 'CALLAPI');
        return $result;
    }
    public function getBankList($username, $dataCallApi, $headers)
    {
        //Log redis
        $this->clog->info('WALLET', 'USERNAME:' . $username, '========CALL_LIST_BANK_COD=========');
        $this->clog->info('WALLET', 'DATA_LIST_BANK_COD_USERNAME:' . $username, $dataCallApi);
        //Log file
        $this->logger->info('USERNAME: ' . $username . '========CALL_LIST_BANK_COD=========', array(), 'CALLAPI');
        $this->logger->info('USERNAME: ' . $username . '====DATA_LIST_BANK_COD || ' . json_encode($dataCallApi), array(), 'CALLAPI');
        //Call API

        $result = $this->callServer->Get(URL_API_PRIVATE . 'user/bank', $dataCallApi, $headers)['data'];

        $this->clog->info('WALLET', 'RESPONSE_LIST_BANK_COD_USERNAME:' . $username, (array) $result);
        $this->clog->info('WALLET', 'USERNAME:' . $username, '========END_LIST_BANK_COD=========');
        $this->logger->info('RESPONSE_LIST_BANK_COD_USERNAME: ' . $username . ' || ' . json_encode($result, JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
        $this->logger->info('========END_LIST_BANK_COD=========: ' . $username . ' || ', array(), 'CALLAPI');
        return $result;
    }

    public function withDraw($username, $dataCallApiWithDraw, $headers)
    {
        $this->clog->info('WWALLET', 'USERNAME:' . $username, '========CALL_WALLET_WITHDRAW=========');
        $this->clog->info('WWALLET', 'DATA_WALLET_WITHDRAW_USERNAME:' . $username, $dataCallApiWithDraw);
        //Log file
        $this->logger->info('USERNAME: ' . $username . '========CALL_WALLET_WITHDRAW=========', array(), 'CALLAPI');
        $this->logger->info('USERNAME: ' . $username . '====DATA_WALLET_WITHDRAW || ' . json_encode($dataCallApiWithDraw, JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
        //Call API

        $result = $this->callServer->PostJson(URL_API_PRIVATE . 'user/withdraw', $dataCallApiWithDraw, $headers)['data'];
        $this->clog->info('WWALLET', 'RESPONSE_WALLET_WITHDRAW_USERNAME:' . $username, (array) $result);
        $this->clog->info('WWALLET', 'USERNAME:' . $username, '========END_WALLET_result=========');

        $this->logger->info('RESPONSE_CALL_API_USERNAME: ' . $username . ' || ' . json_encode($result, JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
        $this->logger->info('========END_WALLET_WITHDRAW=========: ' . $username . ' || ', array(), 'CALLAPI');

        return $result;
    }

    public function crossCheck($username, $dataCallApiWithDraw, $headers){
        $this->clog->info('WWALLET', 'USERNAME:' . $username, '========CALL_WALLET_WITHDRAW=========');
        $this->clog->info('WWALLET', 'DATA_WALLET_WITHDRAW_USERNAME:' . $username, $dataCallApiWithDraw);
        //Log file
        $this->logger->info('USERNAME: ' . $username . '========CALL_WALLET_WITHDRAW=========', array(), 'CALLAPI');
        $this->logger->info('USERNAME: ' . $username . '====DATA_WALLET_WITHDRAW || ' . json_encode($dataCallApiWithDraw, JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
        //Call API

        $result = $this->callServer->PostJson(URL_API_PRIVATE . 'user/withdraw', $dataCallApiWithDraw, $headers)['data'];
        $this->clog->info('WWALLET', 'RESPONSE_WALLET_WITHDRAW_USERNAME:' . $username, (array) $result);
        $this->clog->info('WWALLET', 'USERNAME:' . $username, '========END_WALLET_result=========');

        $this->logger->info('RESPONSE_CALL_API_USERNAME: ' . $username . ' || ' . json_encode($result, JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
        $this->logger->info('========END_WALLET_WITHDRAW=========: ' . $username . ' || ', array(), 'CALLAPI');

        return $result;
    }

    public function addControlCycle($dataParams, $headers, $username){
        try {

            $this->clog->info('SINGLE_ORDER','DATA_CONTROL_CYCLE_USERNAME:'.$username.'| ',json_encode($dataParams,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - DATA_CONTROL_CYCLE_USERNAME || ' . json_encode($dataParams,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            $result = $this->callServer->PostJson(URL_API_PRIVATE.'select-user-crossCheck', $dataParams ,$headers)['data'];
            $this->clog->info('SINGLE_ORDER','RESPONSE_DATA_CONTROL_CYCLE_USERNAME:'.$username,json_encode($result,JSON_UNESCAPED_UNICODE));
            $this->logger->info('USERNAME: '.$username .' - RESPONSE_DATA_CONTROL_CYCLE_USERNAME || ' . json_encode($result,JSON_UNESCAPED_UNICODE), array(), 'CALLAPI');
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('SINGLE_ORDER','CONTROL_CYCLE_USERNAME: '.$username,$th);
            $this->logger->info('SINGLE_ORDER - CONTROL_CYCLE - USERNAME: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }        
    }
    public function getControlCycle($headers, $username){
        try {
            $dataParams= [];
            $result = $this->callServer->Get(URL_API_PRIVATE.'user-crossCheck', $dataParams ,$headers)['data'];
            return $result;

        } catch (\Throwable $th) {
            $this->clog->info('SINGLE_ORDER','CONTROL_CYCLE_USERNAME: '.$username,$th);
            $this->logger->info('SINGLE_ORDER - CONTROL_CYCLE - USERNAME: '.$username .'|| ' . $th, array(), 'CALLAPI');
        }
    }

}

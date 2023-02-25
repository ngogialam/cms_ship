<?php
namespace App\Libraries;
/**
 * Libraries CallServer
 **/
use App\Libraries\CallServer;
use App\Libraries\Credis;
use App\Libraries\AuthenticatorUser;
class getDataBalance
{
	function getDataBalance() {
		$this->callServer    			= new CallServer();
        $this->redis = new Credis();
		$this->authenticatorUser = new AuthenticatorUser();

        $dataUserAuthen = $this->authenticatorUser->getAuthenticator();
        $token = $dataUserAuthen->token;
        $username = $dataUserAuthen->username;
		$headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:' . $token,
        ];
        $data = [];
        $resultBalance = $this->callServer->Get(URL_API_PRIVATE . 'user/balances', $data, $headers)['data'];
		if($resultBalance->status == 200){
			return $resultBalance->data->availableBalance;
		}
		return 0;
	}
}
<?php 
namespace App\Modules\Authenticator\Models;

use CodeIgniter\Model;
use App\Libraries\CallServer;

class Authenticator {
	public function __construct() {
		$this->callServer    			= new CallServer();
    }

    public function getOtp($url, $dataApiGenerateOtp){
        echo '<pre>';
        print_r($url);
        print_r($dataApiGenerateOtp);
        $result = $this->callServer->PostJson($url, $dataApiGenerateOtp);
        print_r($result);die;
        return $result['data'];
    }
    public function registrationUser($url, $dataCallApi){
        
        $result = $this->callServer->PostJson($url, $dataCallApi);
        // echo '<pre>';
        // print_r($result);
        // die;
        return $result['data'];
    }
    public function login(){
        
    }
}
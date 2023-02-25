<?php
namespace App\Libraries;
/**
 * PHP Redis Custom
 * 
 * Create by QTA
 * Date: 2021-07-06 20:50:00
 */

use App\Libraries\Credis;
class AuthenticatorUser
{
    public function getAuthenticator()
    {
        $this->redis = new Credis();
        $krd = get_cookie('__krd');
        if(!$krd){
            header("Location: ".base_url('/'));
			die;
        }
        $result = $this->redis->get($krd);
        if(empty($result)){
            header("Location: ".base_url('/'));
			die;
        }
        return json_decode($result);
    }
}
?>
<?php
namespace App\Libraries;
/**
 * PHP Redis Custom
 * 
 * Create by QTA
 * Date: 2021-07-06 20:50:00
 */
class getApiLocation
{
    public function getLocationAddress($dataRequest){
		try {
            $responseData = $this->callApi('POST', URL_API_LOCATION_ADDRESS, $dataRequest);
            log_message('error', "kq tach dia chi: ". $responseData);
            
            if($responseData == 'err'){
                log_message('error', "Loi --- API tach dia chi tra ve rong ---");
                return false;
            }            
            $jResponse  = json_decode($responseData);

            if ($jResponse->errorCode == 0 && $jResponse->message == 'success') {
                return $jResponse;
            }else{
                return false;
            }
        } catch ( \Exception $e ) {
            return false;
        }
	}

	function callApi($method, $url, $data){
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL             => $url,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_SSL_VERIFYPEER  => false,
            CURLOPT_ENCODING        => "",
            CURLOPT_MAXREDIRS       => 10,
            CURLOPT_TIMEOUT         => 0,
            CURLOPT_FOLLOWLOCATION  => true,
            CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST   => $method,
            CURLOPT_POSTFIELDS      => $data,
            CURLOPT_HTTPHEADER      => array(
              "Content-Type: application/json; charset=utf-8"
            ),
        ));

        // EXECUTE:
        $result = curl_exec($curl);
        curl_close($curl);
        
        if(!$result){
            return 'err';
        }
        
        return $result;
    }
}
?>
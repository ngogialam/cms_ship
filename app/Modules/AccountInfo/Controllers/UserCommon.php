<?php

namespace App\Modules\AccountInfo\Controllers;
use App\Libraries\CallServer;
use Predis\Client;

class UserCommon extends BaseController {
    public function getDataUserAuthen($krd){
        $this->redis = new Client();
        $dataUserAuthen = json_decode($this->redis->get($krd));
        if(empty($dataUserAuthen)){
            $this->authenticator->logOut();
        }
        return $dataUserAuthen;
    }
    public function getUser($dataUserAuthen){
        $this->callServer    			= new CallServer();
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
            $dataUser->availableBalance = $this->dataBalance;
        }
        return $dataUser;
    }
    public function getProvince(){
        $this->redis = new Client();
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
        $this->redis = new Client();
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
    public function dataWards($provinceCode, $districtCode, $wardCode){
        $this->redis = new Client();
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

    public function getWareHouse(){
        $this->callServer    			= new CallServer();
    }

    
    //get address - provice
    public function getDistrictsAjax(){
        if ($this->request->getPost()) {
            $post = $this->request->getPost();
            $html= '<option value="0">'.lang('Label.lbl_chooseDistrict').'</option>';
            $html_ward= '<option value="0">'.lang('Label.lbl_chooseWard').'</option>';
            $province = trim($post['province']);

            if (!empty($post) && $province != '0') {
                $province = trim($post['province']);
                $addressValue = json_decode($this->redis->get('ADDRESS_INFO'));
                $listAddress = $addressValue->$province;
                if (!empty($addressValue)) {
                    foreach ($listAddress as $key =>$value){
                        $html .= '<option value="'.$value->code.'">'.$value->name.'</option>'; 
                    }
                    echo json_encode(array('success' => true, 'message' => 'Thành công', 'data' => $html,'html_ward'=>$html_ward));
                } else {
                    echo json_encode(array('success' => false, 'message' => 'Lấy thông tin tin quận huyên chưa chính xác', 'data' => $html,'html_ward'=>$html_ward));
                }
            }else {
                
                echo json_encode(array('success' => false, 'message' => 'Lấy thông tin không thành công',  'data' => $html, 'html_ward'=>$html_ward));
            }
        }
    }

    //get address - provice
    public function getWardsAjax(){
        if ($this->request->getPost()) {
            $post = $this->request->getPost();
            $html = '<option value="0">'.lang('Label.lbl_chooseWard').'</option>';
            if (!empty($post) && $post['district'] != '' && $post['district'] != 0) {
                
                $province = trim($post['province']);
                $district = trim($post['district']);
                $addressValue = json_decode($this->redis->get('ADDRESS_INFO'));
                $listWards = $addressValue->$province->$district;
                
                if (!empty($addressValue)) {
                    foreach ($listWards as $key =>$value){
                         $html .= '<option value="'.$value->code.'">'.$value->name.'</option>'; 
                    }
                    echo json_encode(array('success' => true, 'message' => 'Thành công', 'data' => $html));
                } else {
                    echo json_encode(array('success' => false, 'message' => 'Lấy thông tin tin quận huyên chưa chính xác','data' => $html));
                }
            }else {
                echo json_encode(array('success' => false, 'message' => 'Lấy thông tin','data' => $html));
            }
        }
    }

    //Get Avatar
    public function getAvatar(){
        $dataUser = [];
        if($this->krd){
            $dataUser = json_decode($this->redis->get($this->krd));
            $dataUser->availableBalance = $this->dataBalance;
            if ($this->request->getPost()) {
                $post = $this->request->getPost();
                if (!empty($post)) {
                    $username = trim($post['username']);
                    $avatarUrl = trim($post['avatarUrl']);
                    $token = $dataUser->token;
                    $username = $dataUser->username;
                    $dataCallApiGetUser = array(
                        'username' => $username
                    );
                    //Set Authorization
                    $headers = [
                        'Accept: application/json',
                        'Content-Type: application/json',
                        'Authorization:'.$token
                    ];
                    $data = [
                        'username'      =>  $username,
                        'avatarUrl'      =>  $avatarUrl,
                    ];
                    $result = $this->callServer->PostJson(URL_API_PRIVATE.'user/updateAvatar',$data,$headers)['data'];
                    if ($result->status == 200) {             
                        echo json_encode(array('success' => true, 'message' => 'Updata avatar thanh cong'));
                    } else {
                        echo json_encode(array('success' => false, 'message' => 'Updata avatar chua thanh cong','Error : ' => $result->message));
                    }
                }
            }
        }
    }

    
}
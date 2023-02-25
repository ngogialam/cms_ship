<?php 
// namespace App\Modules\WarehouseManage\Models;

// use CodeIgniter\Controller;
// use App\Libraries\CallServer;
// use Predis\Client;

// class wareHouseModels extends BaseController{
// 	public function __construct() {
//         parent::__construct();
		
//     }
    
//     public function getProvince(){$this->callServer    			= new CallServer();
//         $this->addressValue = json_decode($this->redis->get('ADDRESS_INFO'));
//         $this->redis = new Client();
//         foreach ($this->addressValue as $key =>$value){
//             $dataProvince[] = Array(
//                 'name' => $value->name,
//                 'code' => $value->code,
//             );   
//         }
//         return $dataProvince;
//     }

//     public function getDistrict(){

//     }
// }
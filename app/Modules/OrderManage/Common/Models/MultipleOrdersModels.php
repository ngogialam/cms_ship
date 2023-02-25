<?php 
namespace App\Modules\OrderManage\Common\Models;

use CodeIgniter\Model;

class MultipleOrdersModels extends Model{
	public function __construct() {
        parent::__construct();
    }
    public function test(){
        return 'ahihi';
    }
}
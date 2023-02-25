<?php 
namespace App\Modules\OrderManage\Common\Models;

use CodeIgniter\Model;

class SingleModels extends Model{
	public function __construct() {
        parent::__construct();
    }
    public function test(){
        $data = [];
        $title = lang('Label.lbl_newSingleOrder');
        $post = $this->request->getPost();
        if(!empty($post)){
            echo '<pre>';
            print_r($post);
            die;
        }
        
        $data['title'] = $title;
        $data['view'] = 'App\Modules\OrderManage\Views\SingleOrder\singleOrder';
        return view('layoutShop/layout', $data);
    }
}
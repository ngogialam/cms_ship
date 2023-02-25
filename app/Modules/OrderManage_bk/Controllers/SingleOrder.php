<?php

namespace App\Modules\OrderManage\Controllers;

class singleOrder extends BaseController {
    public function singleOrder(){
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

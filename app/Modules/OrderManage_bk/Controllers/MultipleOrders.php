<?php

namespace App\Modules\OrderManage\Controllers;

class multipleOrders extends BaseController {
    public function multipleOrders(){
        $data = [];
        $title = lang('Label.lbl_newFastOrder');
        $post = $this->request->getPost();
        if(!empty($post)){
            echo '<pre>';
            print_r($post);
            die;
        }
        
        $data['title'] = $title;
        $data['view'] = 'App\Modules\OrderManage\Views\MultipleOrders\fastOrder';
        return view('layoutShop/layout', $data);
    }
}

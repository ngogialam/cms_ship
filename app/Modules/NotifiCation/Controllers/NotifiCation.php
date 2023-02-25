<?php

namespace App\Modules\NotifiCation\Controllers;

class NotifiCation extends BaseController {
    public function thongbao(){
        $data = [];
        $title = " Tin tức - Khuyến mại";
        $data['title'] = $title;
        $data['view'] = 'App\Modules\NotifiCation\Views\thongbao';
        return view('layout/layout', $data);
    }

    public function thongbaoCT(){
        $data = [];
        $title = " Tin tức - Khuyến mại";
        $data['title'] = $title;
        $data['view'] = 'App\Modules\NotifiCation\Views\thongbao-detail';
        return view('layout/layout', $data);
    }

    public function thongbaoUser(){
        $data = [];
        $title = "Thông báo";
        $data['title'] = $title;
        $data['view'] = 'App\Modules\NotifiCation\Views\notifyCationAfter\thongbao';
        return view('layoutShop/layout', $data);
    }

    public function thongbaoVi(){
        $data = [];
        $title = "Thông báo";
        $data['title'] = $title;
        $data['view'] = 'App\Modules\NotifiCation\Views\notifyCationAfter\thongbaovi';
        return view('layoutShop/layout', $data);
    }
    
   
}
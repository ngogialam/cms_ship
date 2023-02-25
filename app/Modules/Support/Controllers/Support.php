<?php

namespace App\Modules\Support\Controllers;

class Support extends BaseController {
    public function support(){
        $data = [];
        $title = " Hỗ trợ";
        $data['title'] = $title;
        $data['view'] = 'App\Modules\Support\Views\support';
        return view('layout/layout', $data);
    }

    public function supportDT(){
        $data = [];
        $title = " Hỗ trợ";
        $data['title'] = $title;
        $data['view'] = 'App\Modules\Support\Views\support-detail';
        return view('layout/layout', $data);
    }
   
    public function csdk(){
        $data = [];
        $title = " Chính sách - Điều khoản";
        $data['title'] = $title;
        $data['view'] = 'App\Modules\Support\Views\csdk';
        return view('layout/layout', $data);
    }
    public function banggia(){
        $data = [];
        $title = " Bảng giá";
        $data['title'] = $title;
        $data['view'] = 'App\Modules\Support\Views\banggia';
        return view('layout/layout', $data);
    }
    public function boithuong(){
        $data = [];
        $title = " Chính sách bồi thường";
        $data['title'] = $title;
        $data['view'] = 'App\Modules\Support\Views\boithuong';
        return view('layout/layout', $data);
    }
    public function camvan(){
        $data = [];
        $title = " Hàng hoá cấm vận";
        $data['title'] = $title;
        $data['view'] = 'App\Modules\Support\Views\camvan';
        return view('layout/layout', $data);
    }
    public function khieunai(){
        $data = [];
        $title = " Quy trình khiếu nại ";
        $data['title'] = $title;
        $data['view'] = 'App\Modules\Support\Views\khieunai';
        return view('layout/layout', $data);
    }

    public function hopdong(){
        $data = [];
        $title = " Hợp đồng";
        $data['title'] = $title;
        $data['view'] = 'App\Modules\Support\Views\hopdong';
        return view('layout/layout', $data);
    }
   
}

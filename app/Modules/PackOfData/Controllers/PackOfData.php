<?php

namespace App\Modules\PackOfData\Controllers;

class PackOfData extends BaseController {
    public function goiCuoc(){
        $data = [];
        $title = " Gói cước";
        $data['title'] = $title;
        $data['view'] = 'App\Modules\PackOfData\Views\goicuoc';
        return view('layout/layout', $data);
    }
    
    public function buuCuc(){
        $data = [];
        $title = " Bưu cục";
        $data['title'] = $title;
        $data['view'] = 'App\Modules\PackOfData\Views\buucuc';
        return view('layout/layout', $data);
    }
    public function lienHe(){
        $data = [];
        $title = " Liên hệ";
        $data['title'] = $title;
        $data['view'] = 'App\Modules\PackOfData\Views\lienhe';
        return view('layout/layout', $data);
    }
    public function recruitmentPartner(){
        $data = [];
        $title = " Tuyển dụng";
        $data['title'] = $title;
        $data['view'] = 'App\Modules\PackOfData\Views\recruitmentPartner';
        return view('layout/layoutRecruiment', $data);
    }
}

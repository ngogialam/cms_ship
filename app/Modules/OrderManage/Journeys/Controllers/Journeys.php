<?php

namespace App\Modules\OrderManage\Journeys\Controllers;

class Journeys extends BaseController {
  public function hanhtrinh(){
    $data = [];
    $title = "Hành trình đơn";
    $data['title'] = $title;
    $data['view'] = 'App\Modules\OrderManage\Journeys\Views\hanhtrinh';
    return view('layoutShop/layout', $data);
  }
  
}
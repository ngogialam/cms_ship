<?php

namespace App\Modules\TicketManage\Controllers;

class TicketManage extends BaseController {
  public function khieunai(){
    $data = [];
    $title = "Tạo khiếu nại";
    $data['title'] = $title;
    $data['view'] = 'App\Modules\TicketManage\Views\complain';
    return view('layoutShop/layout', $data);
  }
  public function dskhieunai(){
      $data = [];
      $title = "Danh sách khiếu nại";
      $data['title'] = $title;
      $data['view'] = 'App\Modules\TicketManage\Views\listcomplain';
      return view('layoutShop/layout', $data);
  }
  public function ctkhieunai(){
      $data = [];
      $title = "Chi tiết khiêu nại";
      $data['title'] = $title;
      $data['view'] = 'App\Modules\TicketManage\Views\complainView';
      return view('layoutShop/layout', $data);
  }
}
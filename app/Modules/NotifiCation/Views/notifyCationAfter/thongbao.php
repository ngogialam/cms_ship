<!-- Danh sách thông báo
    ====== An Tú DEV =========
-->
<section id="warehouse">
  <div class="warehouse-banner-title">
    <ul class="p-0">
      <li>
        <img src="<?php echo base_url('public/images/Home.png');?>" alt="">
      </li>
      <li style="margin-top: 2px;font-size: 13px;">
        > <span><?php echo $title ?></span>
      </li>
    </ul>
  </div>
</section>

<section id="list-notification">
  <div class="list-ct-title">
    <ul class="list-unstyled pt-3 pl-3 pr-3">
      <li class="list-ct-title-1"><span>Danh sách thông báo</span>
        <select name="" id="" class="pl-2 float-right chosen-select">
          <option value="">Tất cả</option>
          <option value="">Chưa đọc</option>
          <option value="">Đã xem</option>
        </select>
      </li>
    </ul>
    <ul class="list-unstyled mt-3 ml-3 mr-3 list-ct-dstb">
      <a href="<?php echo base_url('/thong-bao');?>">
        <li class="mt-3 pb-3">
          <ul class="list-unstyled mt-2 w-100 d-flex position-relative">
            <li style="width: 65px;">
              <img src="<?php echo base_url('public/images/loa.png');?>" alt=""
                style="width: 50px; height: 50px;float: right;margin: 0px;">
            </li>
            <li class="w-100 pt-2 pl-3" style="line-height: 15px;padding-right: 60px;">
              <span class="list-ct-title-2">Tin tức - sự kiện </span><br>
              <span class="list-ct-title-3">Thôgn tin khuyến mãi, thông báo hệ thống</span>
              <span class="list-ct-title-4">12</span>
              <img src="<?php echo base_url('public/images/tdl-bd3.png');?>" class="list-ct-title-5">
            </li>
          </ul>
        </li>
      </a>
      <a href="<?php echo base_url('/thong-bao-vi-tien');?>">
        <li class="mt-3 pb-3">
          <ul class="list-unstyled mt-2 w-100 d-flex position-relative">
            <li style="width: 65px;">
              <img src="<?php echo base_url('public/images/vi.png');?>" alt=""
                style="width: 50px; height: 50px;float: right;margin: 0px;">
            </li>
            <li class="w-100 pt-2 pl-3" style="line-height: 15px;padding-right: 60px;">
              <span class="list-ct-title-2">Ví tiền </span><br>
              <span class="list-ct-title-3">Thông báo hoạt động NẠP/RÚT tiền</span>
              <span class="list-ct-title-4">12</span>
              <img src="<?php echo base_url('public/images/tdl-bd3.png');?>" class="list-ct-title-5">
            </li>

          </ul>
        </li>
      </a>
      <a href="">
        <li class="mt-3 pb-3">
          <ul class="list-unstyled mt-2 w-100 d-flex position-relative">
            <li style="width: 65px;">
              <img src="<?php echo base_url('public/images/taikhoan.png');?>" alt=""
                style="width: 50px; height: 50px;float: right;margin: 0px;">
            </li>
            <li class="w-100 pt-2 pl-3" style="line-height: 15px;padding-right: 60px;">
              <span class="list-ct-title-2">Tài khoản </span><br>
              <span class="list-ct-title-3">Thông tin liên quan đến tài khoản cá nhân</span>
              <span class="list-ct-title-4">12</span>
              <img src="<?php echo base_url('public/images/tdl-bd3.png');?>" class="list-ct-title-5">
            </li>
          </ul>
        </li>
      </a>
    </ul>
  </div>

  <!-- =====Cập nhật đơn hàng========== -->
  <div class="lst-ntf-bd ml-3 mr-3 mb-3">
    <ul class="list-unstyled pl-3 position-relative">
      <li class="pt-2">
        <b>Cập nhật đơn hàng</b>
        <span class="lst-ntf-bd-1">Đọc tất cả (5)</span>
      </li>
    </ul>

    <ul class="list-unstyled mt-2 w-100 d-flex position-relative pt-2 pb-2 lst-ntf-bd-2 dstb-detail">
      <li style="width: 65px;">
        <img src="<?php echo base_url('public/images/box.png');?>" alt=""
          style="width: 50px; height: 50px;float: right;margin: 0px;">
      </li>
      <li class="w-100 pt-2 pl-3" style="line-height: 16px">
        <span class="list-ct-title-2">Chờ xác nhận </span><br>
        <span class="list-ct-title-3">Trạng thái: Đơn hủy bởi chủ shop - Mã đơn:
          S10724276.B.MB26.K1.D.12.874216502</span><br>
        <span class="list-ct-title-3">27/04/2021 18:09:22</span>
        <img src="<?php echo base_url('public/images/tdl-bd3.png');?>" class="lst-ntf-bd-3">
      </li>
    </ul>

    <ul class="list-unstyled   w-100 d-flex position-relative pt-2 pb-2 lst-ntf-bd-2 dstb-detail">
      <li style="width: 65px;">
        <img src="<?php echo base_url('public/images/box.png');?>" alt=""
          style="width: 50px; height: 50px;float: right;margin: 0px;">
      </li>
      <li class="w-100 pt-2 pl-3" style="line-height: 16px">
        <span class="list-ct-title-2">Tìm tài xế </span><br>
        <span class="list-ct-title-3">Trạng thái: Đã tìm được tài xế - Mã đơn:
          S10724276.B.MB26.K1.D.12.874216502</span><br>
        <span class="list-ct-title-3">27/04/2021 18:09:22</span>
        <img src="<?php echo base_url('public/images/tdl-bd3.png');?>" class="lst-ntf-bd-3">
      </li>
    </ul>
    <ul class="list-unstyled  w-100 d-flex position-relative pt-2 pb-2 lst-ntf-bd-2 dstb-detail">
      <li style="width: 65px;">
        <img src="<?php echo base_url('public/images/box.png');?>" alt=""
          style="width: 50px; height: 50px;float: right;margin: 0px;">
      </li>
      <li class="w-100 pt-2 pl-3" style="line-height: 16px">
        <span class="list-ct-title-2">Tài khoản </span><br>
        <span class="list-ct-title-3">Thông tin liên quan đến tài khoản cá nhân</span><br>
        <span class="list-ct-title-3">27/04/2021 18:09:22</span>
        <img src="<?php echo base_url('public/images/tdl-bd3.png');?>" class="lst-ntf-bd-3">
      </li>
    </ul>
    <ul class="list-unstyled  w-100 d-flex position-relative pt-2 pb-2 lst-ntf-bd-2 dstb-detail">
      <li style="width: 65px;">
        <img src="<?php echo base_url('public/images/box.png');?>" alt=""
          style="width: 50px; height: 50px;float: right;margin: 0px;">
      </li>
      <li class="w-100 pt-2 pl-3" style="line-height: 16px">
        <span class="list-ct-title-2">Tài khoản </span><br>
        <span class="list-ct-title-3">Thông tin liên quan đến tài khoản cá nhân</span><br>
        <span class="list-ct-title-3">27/04/2021 18:09:22</span>
        <img src="<?php echo base_url('public/images/tdl-bd3.png');?>" class="lst-ntf-bd-3">
      </li>
    </ul>

    <ul class="list-unstyled  w-100 d-flex position-relative pt-2 pb-2 lst-ntf-bd-2 dstb-detail">
      <li style="width: 65px;">
        <img src="<?php echo base_url('public/images/box.png');?>" alt=""
          style="width: 50px; height: 50px;float: right;margin: 0px;">
      </li>
      <li class="w-100 pt-2 pl-3" style="line-height: 16px">
        <span class="list-ct-title-2">Tài khoản </span><br>
        <span class="list-ct-title-3">Thông tin liên quan đến tài khoản cá nhân</span><br>
        <span class="list-ct-title-3">27/04/2021 18:09:22</span>
        <img src="<?php echo base_url('public/images/tdl-bd3.png');?>" class="lst-ntf-bd-3">
      </li>
    </ul>

    <ul class="list-unstyled  w-100 d-flex position-relative pt-2 pb-2 lst-ntf-bd-2 dstb-detail">
      <li style="width: 65px;">
        <img src="<?php echo base_url('public/images/box.png');?>" alt=""
          style="width: 50px; height: 50px;float: right;margin: 0px;">
      </li>
      <li class="w-100 pt-2 pl-3" style="line-height: 16px">
        <span class="list-ct-title-2">Tài khoản </span><br>
        <span class="list-ct-title-3">Thông tin liên quan đến tài khoản cá nhân</span><br>
        <span class="list-ct-title-3">27/04/2021 18:09:22</span>
        <img src="<?php echo base_url('public/images/tdl-bd3.png');?>" class="lst-ntf-bd-3">
      </li>
    </ul>

    <ul class="list-unstyled  w-100 d-flex position-relative pt-2 pb-2 lst-ntf-bd-2 dstb-detail">
      <li style="width: 65px;">
        <img src="<?php echo base_url('public/images/box.png');?>" alt=""
          style="width: 50px; height: 50px;float: right;margin: 0px;">
      </li>
      <li class="w-100 pt-2 pl-3" style="line-height: 16px">
        <span class="list-ct-title-2">Tài khoản </span><br>
        <span class="list-ct-title-3">Thông tin liên quan đến tài khoản cá nhân</span><br>
        <span class="list-ct-title-3">27/04/2021 18:09:22</span>
        <img src="<?php echo base_url('public/images/tdl-bd3.png');?>" class="lst-ntf-bd-3">
      </li>
    </ul>

    <ul class="list-unstyled  w-100 d-flex position-relative pt-2 pb-2 lst-ntf-bd-2 dstb-detail">
      <li style="width: 65px;">
        <img src="<?php echo base_url('public/images/box.png');?>" alt=""
          style="width: 50px; height: 50px;float: right;margin: 0px;">
      </li>
      <li class="w-100 pt-2 pl-3" style="line-height: 16px">
        <span class="list-ct-title-2">Tài khoản </span><br>
        <span class="list-ct-title-3">Thông tin liên quan đến tài khoản cá nhân</span><br>
        <span class="list-ct-title-3">27/04/2021 18:09:22</span>
        <img src="<?php echo base_url('public/images/tdl-bd3.png');?>" class="lst-ntf-bd-3">
      </li>
    </ul>

  </div>
</section>
<!-- =====Chỗ này phân trang nhoé==== -->
<div class="w-100 mt-2">
  <ul class="list-unstyled d-flex w-100">
    <li class="w-50">
      Hiển thị từ 1 - 25 trong tổng số 500 bản ghi
    </li>
    <li class="w-50 text-right">
      < 1 - 2 - 3 - 4 - 5>
    </li>
  </ul>
</div>
<style>
.chosen-container {
  float: right;
}
</style>
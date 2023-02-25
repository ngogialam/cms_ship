<?php 
  $requestUri = explode("/",$_SERVER['REQUEST_URI'])[2];
  $uri = explode("?",$requestUri)[0];
  $uris = explode("/",$_SERVER['REQUEST_URI'])[3];
  
?>
<div class="container-fluid page-body-wrapper">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">

            <li class="nav-item nav-profile">
                <a href="<?= base_url('thong-tin-tai-khoan'); ?>" class="nav-link">
                    <div class="nav-profile-image">
                        <img src="<?= ($dataUser->avatar) ? $dataUser->avatar : base_url('public/assets/images/ava.png')?>"
                            alt="profile">
                        <span class="login-status online"></span>
                    </div>
                    <div class="nav-profile-text d-flex flex-column">
                        <span
                            class=" mb-2"><?= ($dataUser->company) ? $dataUser->company : $dataUser->username ?></span>
                        <span class="text-small bonus-point"><img
                                src="<?= base_url('public/assets/images/iconBonus.png'); ?>"
                                alt=""><span><?= ($dataUser->walletInfo->W3696c56a1836f1c2bef27f2c35e4dbe7->remain_balance) ? number_format($dataUser->walletInfo->W3696c56a1836f1c2bef27f2c35e4dbe7->remain_balance) : 0 ?></span>
                            <?= lang('Label.lbl_pointBonus'); ?></span>
                    </div>
                </a>
            </li>

            <li class="nav-item avatar-navbar" id="avatar-navbar">
                <a class="nav-link" aria-expanded="false" href="<?= base_url('thong-tin-tai-khoan'); ?>">
                    <img src="<?= ($dataUser->avatar) ? $dataUser->avatar : base_url('public/assets/images/ava.png')?>"
                        alt="profile">
                </a>
            </li>

            <li
                class="nav-item <?php if( $uri=="danh-sach-don-hang" || $uri=="tao-don-nhanh"  || $uri=="hanh-trinh-don"  ){echo "active";}?>">
                <a class="nav-link" data-toggle="collapse" href="#orderToggle" aria-expanded="false"
                    aria-controls="orderToggle">
                    <img src="<?php echo base_url('public/assets/images/icons/order.png'); ?>" alt="">
                    <span class="menu-title"><?= lang('Label.lbl_order'); ?></span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse <?php if($uri=="danh-sach-don-hang" || $uri=="hanh-trinh-don" ||  $uris == 'cho-duyet' ){echo "show";}?>"
                    id="orderToggle">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link <?php if($uri=="danh-sach-don-hang" && $uris == "" ){echo "active";}?>"
                                href="<?= base_url('danh-sach-don-hang'); ?>"><?= lang('Label.lbl_listOrders'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($uris=="cho-xac-nhan"){echo "active";}?>"
                                href="<?= base_url('vi/danh-sach-don-hang/cho-xac-nhan'); ?>"><?= lang('Label.stt_choXacNhan'); ?></a>
                        </li>
                        <!-- <li class="nav-item">
              <a class="nav-link <?php if($uri=="danh-sach-don-hang"){echo "active";}?>"
                href="<?= base_url('danh-sach-don-hang'); ?>"><?= lang('Label.lbl_listOrders'); ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($uri=="danh-sach-don-hang"){echo "active";}?>"
                href="<?= base_url('danh-sach-don-hang'); ?>"><?= lang('Label.lbl_listOrders'); ?></a>
            </li> -->
                        <!-- <li class="nav-item"> <a
                class="nav-link  <?php if($uri=="tao-don-le" || $uri=="nhap-don-le" || $uri=="xac-nhan-don-le" || $uri == 'nhap-thong-tin-don-hang'){echo "active";}?>"
                href="<?= base_url('tao-don-le'); ?>"><?= lang('Label.lbl_newSingleOrder'); ?></a></li>
            <li class="nav-item "> <a
                class="nav-link <?php if($uri=="tao-don-nhanh" || $uri == 'xac-nhan-don-nhanh' ){echo "active";}?>"
                href="<?= base_url('tao-don-nhanh'); ?>"><?= lang('Label.lbl_newFastOrder'); ?></a></li> -->
                        <!-- <li class="nav-item"> <a class="nav-link <?php //if($uri=="hanh-trinh-don"){echo "active";}?>"
                href="hanh-trinh-don"><?php //echo lang('Label.lbl_orderTrackings'); ?></a> -->
            </li>
        </ul>
</div>
</li>

<!-- Wallet -->
<li
    class="nav-item <?php if($uri=="vi-hola" || $uri=="nap-tien" || $uri=="rut-tien"  || $uri=="xac-nhan-giao-dich" || $uri=="ket-qua-giao-dich" || $uri=="xac-nhan-otp" || $uri=="nap-tien-vi-VA" || $uri=="chu-ky-doi-soat" ){echo "active";}?>">
    <a class="nav-link" data-toggle="collapse" href="#walletToggle" aria-expanded="false" aria-controls="walletToggle">
        <img src="<?php echo base_url('public/assets/images/icons/wallet.png'); ?>" alt="">
        <span class="menu-title"><?= lang('Label.lbl_wallet'); ?></span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse <?php if($uri=="vi-hola" || $uri=="nap-tien" || $uri=="rut-tien"  || $uri=="xac-nhan-giao-dich" || $uri=="ket-qua-giao-dich" || $uri=="xac-nhan-otp" || $uri=="nap-tien-vi-VA" || $uri=="chu-ky-doi-soat" ){echo "show";}?>"
        id="walletToggle">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link  <?php if($uri=="vi-hola"){echo 'active';}?>"
                    href="<?= base_url('vi-hola') ?>"><?= lang('Label.lbl_balanceFluctuations'); ?></a></li>
            <li class="nav-item"> <a
                    class="nav-link <?php if($uri=="nap-tien" || $uri=="nap-tien-vi-VA" ){echo 'active';}?>"
                    href="<?= base_url('nap-tien') ?>"><?= lang('Label.lbl_payin'); ?></a></li>
            <?php //if(!in_array($data->username, $arrAccIgnore)): ?>
            <li class="nav-item"> <a
                    class="nav-link <?php if($uri=="rut-tien"  || $uri=="xac-nhan-giao-dich" || $uri=="ket-qua-giao-dich" || $uri=="xac-nhan-otp" ){echo 'active';}?>"
                    href="<?= base_url('rut-tien') ?>"><?= lang('Label.lbl_withDraw'); ?></a></li>
            <?php // endif; ?>
            <li class="nav-item"> <a
                    class="nav-link <?php if($uri=="chu-ky-doi-soat" ){echo 'active';}?>"
                    href="<?= base_url('chu-ky-doi-soat') ?>"><?= lang('Label.lbl_controlCycle'); ?></a></li>
        </ul>
    </div>
</li>

<!-- <li
  class="nav-item <?php if($uri=="khieu-nai" || $uri=="danh-sach-khieu-nai" || $uri=="chi-tiet-khieu-nai"){echo "show";}?>">
  <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
    <img src="<?php echo base_url('public/assets/images/icons/ticket.png'); ?>" alt="">
    <span class="menu-title"><?= lang('Label.lbl_tickets'); ?></span>
    <i class="menu-arrow"></i>
  </a>
  <div
    class="collapse <?php if($uri=="khieu-nai" || $uri=="danh-sach-khieu-nai" || $uri=="chi-tiet-khieu-nai"){echo "show";}?>"
    id="ui-basic">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"> <a class="nav-link  <?php if($uri=="khieu-nai"){echo 'active';}?>"
          href="<?= base_url('khieu-nai') ?>"><?= lang('Label.lbl_createTichet'); ?></a></li>
      <li class="nav-item"> <a
          class="nav-link <?php if($uri=="chi-tiet-khieu-nai" || $uri=="danh-sach-khieu-nai" ){echo 'active';}?>"
          href="<?= base_url('danh-sach-khieu-nai') ?>"><?= lang('Label.lbl_listTicket'); ?></a></li>
    </ul>
  </div>
</li> -->
<li class="nav-item">
    <!-- <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <img src="<?php //echo base_url('public/assets/images/icons/order_history.png'); ?>" alt="">
                <span class="menu-title">Lịch sử đơn hàng</span>
                <i class="menu-arrow"></i>
              </a> -->
    <!-- <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Biến động số dư</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Nạp tiền</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Rút tiền</a></li>
                </ul>
              </div> -->
</li>
<li
    class="nav-item <?php if($uri=="danh-sach-kho-hang" || $uri=="cap-nhat-kho-hang" || $uri=="them-kho-hang"){echo "active";}?>">
    <a class="nav-link" data-toggle="collapse" href="#warehouserToggle" aria-expanded="false"
        aria-controls="warehouserToggle">
        <img src="<?php echo base_url('public/assets/images/icons/warehouse.png'); ?>" alt="">
        <span class="menu-title"><?= lang('Label.lbl_warehouseManage'); ?></span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse <?php if($uri=="danh-sach-kho-hang" || $uri=="cap-nhat-kho-hang" || $uri=="them-kho-hang"){echo "show";}?>"
        id="warehouserToggle">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a
                    class="nav-link <?php if($uri=="danh-sach-kho-hang" || $uri=="cap-nhat-kho-hang" ){echo "active";}?>"
                    href="<?= base_url('danh-sach-kho-hang') ?>"><?= lang('Label.lbl_listWarehouse'); ?></a></li>
            <li class="nav-item"> <a class="nav-link <?php if($uri=="them-kho-hang"){echo "active";}?>"
                    href="<?= base_url('them-kho-hang') ?>"><?= lang('Label.lbl_createWarehouse'); ?></a></li>
        </ul>
    </div>
</li>
<li
    class="nav-item <?php if($uri=="thong-tin-tai-khoan" || $uri=="cap-nhap-thong-tin-tai-khoan"|| $uri=="lien-ket-ngan-hang" || $uri=="them-lien-ket" || $uri=="xac-thuc-that-bai" || $uri=="xac-thuc-thanh-cong" || $uri=="cap-nhat-hop-dong-khach"){echo "active";}?>">
    <a class="nav-link" data-toggle="collapse" href="#accountInfo" aria-expanded="false" aria-controls="accountInfo">
        <img src="<?php echo base_url('public/assets/images/icons/account_info.png'); ?>" alt="">
        <span class="menu-title"><?= lang('Label.lbl_accountInfo'); ?></span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse <?php if($uri=="thong-tin-tai-khoan" || $uri=="cap-nhap-thong-tin-tai-khoan"|| $uri=="lien-ket-ngan-hang" || $uri=="them-lien-ket" || $uri=="xac-thuc-that-bai" || $uri=="xac-thuc-thanh-cong"|| $uri=="cap-nhat-hop-dong-khach"){echo "show";}?>"
        id="accountInfo">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a
                    class="nav-link <?php if($uri=="thong-tin-tai-khoan" || $uri=="cap-nhap-thong-tin-tai-khoan"){echo "active";}?>"
                    href="<?= base_url('/thong-tin-tai-khoan') ?>"><?= lang('Label.lbl_updateAccount'); ?></a></li>
            <li class="nav-item"> <a
                    class="nav-link <?php if($uri=="lien-ket-ngan-hang" || $uri=="them-lien-ket" || $uri=="xac-thuc-that-bai" || $uri=="xac-thuc-thanh-cong" ){echo "active";}?>"
                    href="<?= base_url('/lien-ket-ngan-hang') ?>"><?= lang('Label.lbl_bankLink'); ?></a></li>

                    <?php
                        $arrUserUpdateContract = explode(',', ACCOUNT_UPDATE_CONTRACT);
                        if(in_array($dataUser->username, $arrUserUpdateContract)):
                    ?>
            <li class="nav-item"> <a
                    class="nav-link <?php if( $uri=="cap-nhat-hop-dong-khach" ){echo "active";}?>"
                    href="<?= base_url('/cap-nhat-hop-dong-khach') ?>"><?= lang('Label.lbl_reUpdateContract'); ?></a></li>
                    <?php endif; ?>
        </ul>
    </div>
</li>
<li
    class="nav-item <?php if($uri=="doi-mat-khau" || $uri=="doi-so-dien-thoai"|| $uri=="xac-thuc-tai-khoan" ){echo "active";}?>">
    <a class="nav-link" data-toggle="collapse" href="#securitySetting" aria-expanded="false"
        aria-controls="securitySetting">
        <img src="<?php echo base_url('public/assets/images/icons/security_setting.png'); ?>" alt="">
        <span class="menu-title"><?= lang('Label.lbl_securitySetting'); ?></span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse <?php if($uri=="doi-mat-khau" || $uri=="doi-so-dien-thoai"|| $uri=="xac-thuc-tai-khoan" ){echo "show";}?>"
        id="securitySetting">
        <ul class="nav flex-column sub-menu">
            <!-- <li class="nav-item <?php if($uri=="xac-thuc-tai-khoan" ){echo "active";}?>">
        <a class="nav-link" href="#"><?= lang('Label.lbl_verifyAccount'); ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link  <?php if($uri=="doi-so-dien-thoai"){echo "active";}?>"
          href="<?= base_url('doi-so-dien-thoai'); ?>"><?= lang('Label.lbl_changePhone'); ?></a>
      </li> -->
            <li class="nav-item">
                <a class="nav-link   <?php if($uri=="doi-mat-khau" ){echo "active";}?>"
                    href="<?= base_url('doi-mat-khau'); ?>"><?= lang('Label.lbl_changePassword'); ?></a>
            </li>
        </ul>
    </div>
</li>
<li class="nav-item" id="sidebar-home">
    <a class="nav-link" data-toggle="collapse" href="#homepage" aria-expanded="false" aria-controls="homepage">
        <img src="<?php echo base_url('public/images/Home.png'); ?>" alt="">
        <span class="menu-title"><?= lang('Label.lbl_home'); ?></span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="homepage">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link"
                    href="pages/ui-features/buttons.html"><?= lang('Label.lbl_statistic'); ?></a></li>
            <li class="nav-item"> <a class="nav-link"
                    href="pages/ui-features/typography.html"><?= lang('Label.lbl_orderHistory'); ?></a></li>
            <li class="nav-item"> <a class="nav-link"
                    href="<?= base_url('doi-mat-khau'); ?>"><?= lang('Label.modalHeader'); ?></a></li>
            <li class="nav-item"> <a class="nav-link"
                    href="<?= base_url('doi-mat-khau'); ?>"><?= lang('Label.lbl_support'); ?></a></li>
            <li class="nav-item"> <a class="nav-link"
                    href="<?= base_url('/dang-xuat'); ?>"><?= lang('Label.lbl_logOut'); ?></a></li>
        </ul>
    </div>
</li>
</ul>
</nav>




<div class="main-panel">
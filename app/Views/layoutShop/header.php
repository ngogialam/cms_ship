<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HOLASHOP</title>
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicons -->
    <link rel="icon" href="<?php echo base_url('public/favicon.ico') ?>">
    <link rel="apple-touch-icon" href="<?php echo base_url('public/favicon.ico') ?>">
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo base_url('public/assets/vendors/mdi/css/materialdesignicons.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/vendors/css/vendor.bundle.base.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/main.css?v=' .microtime(true)) ?>">
    <!-- <link rel="stylesheet" href="<?php echo base_url('public/assets/css/main.min.css?v=' .microtime(true)) ?>"> -->

    <link rel="stylesheet" href="<?php echo base_url('public/css/font-awesome.min.css'); ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link href="<?php echo base_url('public/vendor/owl.carousel/assets/owl.carousel.min.css') ?> " rel="stylesheet">
    <!-- Layout styles -->
    <!-- <link rel="stylesheet" href="<?php echo base_url('public/assets/css/styles.min.css') ?>"> -->

    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/anhtt.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/tupa.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/jquery.datetimepicker.min.css') ?>">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?php echo base_url('public/assets/images/favicon.png') ?>" />

    <link rel="stylesheet" href="<?=base_url('public/assets/chosen/chosen.css')?>">
    <link rel="stylesheet" href="<?=base_url('public/assets/chosen/chosen-custom.css')?>">

    <script src="<?= base_url('public/lib/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('public/lib/jquery/jquery-migrate.min.js') ?>"></script>
    <script src="<?= base_url('public/lib/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="<?php echo base_url('public/lib/owlcarousel/owl.carousel.min.js'); ?>"></script>

    <script src="<?php echo base_url('public/assets/js/vendor.bundle.base.js') ?>"></script>

    <script src="<?php echo base_url('public/assets/js/functionjs.js?v='.microtime(true).''); ?>"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600&display=swap"
        rel="stylesheet">

    <link href="<?php echo base_url('public/lib/aos/aos.css?v=').microtime(true) ?>" rel="stylesheet">
    <script src="<?php echo base_url('public/lib/aos/aos.js?v=').microtime(true) ?>"></script>


</head>

<body>
    <div id="loader" class="show fullscreen ">
        <svg svg class="circular " width="80px" height="80px">
            <circle class="loader-path" cx="40" cy="40" r="30" fill="none" stroke="#2DB1DB" stroke-width="1"></circle>
            <circle class="path" cx="40" cy="40" r="30" fill="none" stroke-width="7" stroke-miterlimit="10"
                stroke="#F0A616">
            </circle>
        </svg>
    </div>

    <div id="modalNotify" class="modal fade" style="top:10%" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="display:block">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title notify-title"><?= lang('Label.modalHeader') ?></h4>
                </div>
                <div class="modal-body">
                    <p class="notifyDetail" style="text-align:center"></p>
                </div>
                <div class="modal-footer" style="border-top:none">
                    <button type="button" class="btn btn-default"
                        data-dismiss="modal"><?= lang('Label.modalClose') ?></button>
                </div>
            </div>

        </div>
    </div>
    <div class="element-banner">
        <ul>
            <a href="<?php echo base_url('tao-don-le')?>">
                <li id="element-none2">
                    <img src="<?php echo base_url('public/images/Group33.png')?>" alt="">
                </li>
            </a>
            <li id="element-none1">
                <a href="<?php echo FANPAGE_SHIP; ?>" target="_blank"><img src="<?php echo base_url('public/images/Group32.png')?>" alt=""></a>
            </li>

            <li id="element-none">
                <img src="<?php echo base_url('public/images/Group31.png')?>" alt="">

            </li>
            <li id="element-block" class="rotate" onclick="banner()">
                <img src="<?php echo base_url('public/images/home-show-service.svg')?>" alt="">
            </li>
        </ul>
    </div>

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 fixed-top d-flex flex-row">
            <div class="row navBarTop" style="font-size: 14px;">
                <!-- ======= Top Bar ======= -->
                <section id="topbar" class="d-none d-lg-block">
                    <div class="container-fluid text-center">

                        <div class="app-info topbar-right mr-auto">

                            <div class="fll tbr dropdownapptest d-none">

                                <a class=" topbar-line tl-no-border nav-link count-indicator dropdown-toggle"
                                    id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                                    Tải ứng dụng
                                </a>
                                <!-- <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list downloadapp"
                                    aria-labelledby="messageDropdown">
                                    <img src="<?php echo base_url('public/images/qrc21.png'); ?>" alt="">
                                    <ul class="ul-lsn">
                                        <a href="">
                                        <li class="dr-gp">Google Play</li>
                                        </a>
                                        <a href="">
                                        <li class="dr-as">Apple Store</li>
                                        </a>
                                    </ul>
                                </div> -->

                            </div>

                            <div class="fll tbr">
                                <a href="tel:1900234539" class="hotline-header"><span class="topbar-line">Hotline: <span
                                            class="clr-or">1900
                                            2345 39</span></span></a>
                            </div>

                            <div class="fll tbr hd-connect">
                                <span class="topbar-line">Kết nối</span>
                                <a href="#">
                                    <img id="icon-header-1a" onchange="outIconHeader()"
                                        src="<?php echo base_url('public/assets/images/icons/instagram.png') ?>" alt="">
                                    <img id="icon-header-1b"
                                        src="<?php echo base_url('public/images/instagram1.png') ?>" alt=""></a>
                                <a href="#">
                                    <img id="icon-header-2a"
                                        src="<?php echo base_url('public/assets/images/icons/fb.png') ?>" alt="">
                                    <img id="icon-header-2b" src="<?php echo base_url('public/images/fb1.png') ?>"
                                        alt=""></a>
                                <a href="#">
                                    <img id="icon-header-3a"
                                        src="<?php echo base_url('public/assets/images/icons/tiktok.png') ?>" alt="">
                                    <img id="icon-header-3b" src="<?php echo base_url('public/images/tiktok1.png') ?>"
                                        alt=""></a>
                            </div>
                        </div>

                        <div class=" contact-info">

                            <div class="fll tbr mgr7">
                                <!-- <img src="<?php //echo base_url('public/assets/images/icons/walletColor.png') ?>" alt=""> -->
                                <span class="topbar-line-right">Số dư ví: <span class="clr-or">
                                        <?= number_format($dataUser->availableBalance) ?>
                                        đ</span></span>
                                <div class="btn-header-recharge-wallet" data-toggle="modal" data-target="#modalCallVA">
                                    Nạp ví
                                </div>
                            </div>

                            <div class="fll tbr user-logout">

                                <div class="d-flex dropdown header-after-login" id="user-logout">
                                    <div data-toggle="dropdown" class="dropdown-header-after-login">
                                        <img src="<?php echo base_url('public/images/icon-showHome.svg') ?>" alt=""
                                            id="header-img-2">
                                        <img src="<?php echo base_url('public/images/icon-showHome1.svg') ?>" alt=""
                                            id="header-img-1">
                                    </div>
                                    <div
                                        class="dropdown-menu pl-2 dropdown-menu-right preview-list  service-payment-home-page mt-0 pt-0 pb-0">

                                        <a href="<?= DOMAIN_HOME ?>" class="d-flex align-items-center">
                                            <img src="<?php echo base_url('public/images/HolaLife.svg') ?>" alt="">
                                            <span><?= lang('Label.lbl_headerHolaHome') ?></span>
                                        </a>

                                        <a href="<?= DOMAIN_FOOD ?>" class="d-flex align-items-center">
                                            <img src="<?php echo base_url('public/images/HolaFood.svg') ?>" alt="">
                                            <span><?= lang('Label.lbl_headerHolaFood') ?></span>
                                        </a>



                                        <a href="<?php echo base_url('/danh-sach-don-hang') ?>"
                                            class="d-flex align-items-center">
                                            <img src="<?php echo base_url('public/images/Holaship.png') ?>" alt="">
                                            <span><?= lang('Label.lbl_headerHolaShip') ?></span>
                                        </a>



                                        <!-- <a href="<?php // DOMAIN_TOPUP ?>nap-tien-truc-tiep"
                                            class="d-flex align-items-center">
                                            <img src="<?php echo base_url('public/images/didong.png') ?>" alt="">
                                            <span><?= lang('Label.lbl_headerPaymentPhone') ?></span>
                                        </a>



                                        <a href="<?php // DOMAIN_TOPUP ?>mua-ma-the" class="d-flex align-items-center">
                                            <img src="<?php echo base_url('public/images/mathe.png') ?>" alt="">
                                            <span><?= lang('Label.lbl_headerCodeCard') ?></span>
                                        </a>



                                        <a href="<?php // DOMAIN_TOPUP ?>thanh-toan-tien-dien"
                                            class="d-flex align-items-center">
                                            <img src="<?php echo base_url('public/images/thanhtoan.png') ?>" alt="">
                                            <span><?= lang('Label.lbl_headerPaymentOrders') ?></span>
                                        </a>



                                        <a href="<?php // DOMAIN_TOPUP ?>nap-tien-truc-tiep"
                                            class="d-flex align-items-center">
                                            <img src="<?php echo base_url('public/images/taichinh.png') ?>" alt="">
                                            <span><?= lang('Label.lbl_headerSupportMoney') ?></span>
                                        </a>

                                        <a href="<?php // DOMAIN_TOPUP ?>nap-tien-truc-tiep"
                                            class="d-flex align-items-center">
                                            <img src="<?php echo base_url('public/images/muasam.png') ?>" alt="">
                                            <span><?= lang('Label.lbl_headerBuy') ?></span>
                                        </a> -->

                                    </div>
                                </div>
                                <div class="fll tbr mgr7 dropdown">
                                    <span class="topbar-line-right " data-toggle="dropdown">
                                        <img src="<?=  $dataUser->avatar!="" ? $dataUser->avatar : base_url('/public/assets/images/ava.png') ?> "
                                            alt="" class="avatar-home">
                                    </span>
                                    <div
                                        class="dropdown-menu dropdown-menu-right preview-list  service-payment-home-page show-menu-header-avatar">
                                        <ul class="mb-0 text-left pl-0 menu-header-user-info">
                                            <li>
                                                <a href="<?= DOMAIN_HOME.'/vi-hola' ?>" class="d-flex">
                                                    <div>
                                                        <img src="<?php echo base_url('public/assets/images/icon/vihola.svg'); ?>"
                                                            alt="" class="p-0 logout-header-img logout-header-btn">
                                                    </div>

                                                    <span class="w-100"><?= lang('Label.lbl_wallet') ?></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= DOMAIN_HOME.'/thong-tin-tai-khoan' ?>" class="d-flex">
                                                    <div>
                                                        <img src="<?php echo base_url('public/assets/images/icon/user.svg'); ?>"
                                                            alt="" class="p-0 logout-header-img">
                                                    </div>

                                                    <span class="w-100"><?= lang('Label.lbl_infoAccount') ?></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('/danh-sach-don-hang') ?>" class="d-flex">
                                                    <div>
                                                        <img src="<?php echo base_url('public/images/listOrders.svg'); ?>"
                                                            alt="" class="p-0 logout-header-img">
                                                    </div>
                                                    <span class="w-100"><?= lang('Label.lbl_listOrders') ?></span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="<?= base_url('/dang-xuat'); ?>" class="ml-0 d-flex">
                                                    <div>
                                                        <img src="<?php echo base_url('public/images/logout.png'); ?>"
                                                            alt="" class="p-0 m-0">
                                                    </div>

                                                    <span class="w-100"><?= lang('Label.lbl_logOut') ?></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div id="header" class="row navBarTop navBarRes">
                <div class="navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo" href="<?=base_url('/'); ?>">
                        <img src="<?php echo base_url('public/assets/images/logo_be.png') ?>" alt="logo"
                            class="logo-header" /></a>
                    <a class="navbar-brand brand-logo-mini" href="<?php echo base_url('/') ?>">
                        <img src="<?php echo base_url('public/assets/images/logo_be.png') ?>" alt="logo"
                            class="logo-header" /></a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center rotate" type="button"
                        data-toggle="minimize" id="show-navbar" onclick="showAvatar()">
                        <span class="mdi mdi-menu "></span>
                    </button>
                    <script>
                    $(".rotate").click(function() {
                        $(this).toggleClass("down");
                    })
                    </script>

                    <nav class="nav-menu d-none d-lg-block">
                        <ul class="d-flex align-items-center">
                            <!-- <li><a href="<?php echo base_url('/thong-ke') ?>">Thống kê</a></li>
              <li><a href="<?php echo base_url('/lich-su-don-hang') ?>">Lịch sử đơn hàng</a></li> -->
                            <li><a href="javascript:void(0)">Thống kê</a></li>
                            <li><a href="javascript:void(0)">Lịch sử đơn hàng</a></li>
                            <!-- <li><a href="#">Tra cứu</a></li>
              <li><a href="#">Lịch sử đơn hàng</a></li> -->
                        </ul>
                    </nav>
                    <!-- <div class="search-bar d-none d-md-block"> -->
                    <form class="search-bar inner-addon right-addon w-100" style="margin-right: 226px;">
                        <button class="btnSearch btnSearchOrder" type="button">
                            <i class=" fa fa-search searchIcon"></i>
                        </button>
                        <input type="text" name="searchOrders" value="<?php echo $order;?>" autocomplete="off"
                            class="form-control input-order-home searchOrders" id="searchOrders"
                            placeholder="Có thể nhập 30 mã đơn, mỗi đơn cách nhau bởi dấu phẩy">
                    </form>

                    <?php
                        // Check bổ sung thông báo tạo hợp đồng
                        $contract = $dataUser->contract;
                        
                        // $getCheckShowNotiSingleOrder = get_cookie('__createOrderSingle');
                        // $getCheckShowNotiMultiOrder = get_cookie('__createOrderMulti3');
                        $getCheckShowNotiSingleOrder = 1;
                        $getCheckShowNotiMultiOrder = 1;

                        ?>
                            <nav class="nav-menu create-order-btn-wrap d-none d-lg-block">
                                <ul>
                                    <!-- <li class="mr-2 btn-create-order-a"><a href="<?php //echo base_url('/tao-don-le') ?>"  data-toggle="modal" data-target="#notiShowContractOrder" -->
                                    <?php if(empty($contract) && $getCheckShowNotiSingleOrder == ''){ ?>
                                    <li class="mr-2 btn-create-order-a"><a href="javascript:void(0)" onclick="openModalContract(1, '<?php echo base_url('/tao-don-le') ?>','<?= lang('Label.lbl_newSingleOrder') ?>',<?php echo TIME_SHOW_NOTI_CONTRACT_JS; ?>)"
                                            class="form-control btn createOrderSingle urlOrder"> <span><?= lang('Label.lbl_newSingleOrder') ?> </span></a>
                                    </li>
                                    <?php } else{ ?>
                                        <li class="mr-2 btn-create-order-a"><a href="<?php echo base_url('/tao-don-le') ?>" class="form-control btn"> <span><?= lang('Label.lbl_newSingleOrder') ?> </span></a>
                                    </li>
                                        <?php } ?>

                                        <?php if(empty($contract) && $getCheckShowNotiMultiOrder == ''){ ?>
                                    <li class="btn-create-order-a"><a href="javascript:void(0)" onclick="openModalContract(2, '<?php echo base_url('/tao-don-nhanh') ?>','<?= lang('Label.lbl_newFastOrder') ?>',<?php echo TIME_SHOW_NOTI_CONTRACT_JS; ?>)"
                                            class="form-control btn createOrderMulti urlOrder"> <span><?= lang('Label.lbl_newFastOrder') ?></span></a>
                                    </li>
                                    <?php } else{ ?>
                                        <li class="btn-create-order-a"><a href="<?php echo base_url('/tao-don-nhanh') ?>"
                                            class="form-control btn"> <span><?= lang('Label.lbl_newFastOrder') ?></span></a>
                                    </li>
                                        <?php } ?>
                                </ul>
                            </nav>

                    <!-- Tạo modal khi tạo đơn. -->

                    <div class="modal" id="notiShowContractOrder">
                        <div class="modal-dialog">
                            <div class="modal-content" style="margin-top: 17%;">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h5 class="modal-title headerFalse">
                                        <?=lang('Label.lbl_notificationConfirm')?>
                                    </h5>
                                    <button type="button" class="close m-0 p-0" onclick="closeModalContract()" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="row modal-body-content">
                                        <div class="col-12 textCenter notiContractBody">
                                            <p class="fz13 modalNotiContract" style="color: black;"> <?php echo lang('Label.txt_updateContractNow1'); ?></p>
                                            <p class="fz13 modalNotiContract" style="color: black;"> <?php echo lang('Label.txt_updateContractNow2'); ?></p>
                                            <p class="fz13 modalNotiContract" style="color: black;"> <?php echo lang('Label.txt_updateContractNow3'); ?></p>
                                            <p class="fz13 modalNotiContract" style="color: black;"> <?php echo lang('Label.txt_updateContractNow4'); ?></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer customize-approve">
                                    <button type="button" class="btn btn-modal btn-modalClose btnCloseOrder" data-dismiss="modal"><?=lang('Label.modalClose');?></button>
                                    <a class="btn btn-modal btn-confirmCustom btnCfm"
                                        href="<?php echo base_url('/thong-tin-tai-khoan') ?>"><?=lang('Label.lbl_updateContractNow');?></a>
                                    <a class="btn btnCreateOrder" href=""><?=lang('Label.lbl_updateContractNow');?></a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas" onclick="showAvatar()">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <div class="row navBarTop navBarBelow">
                        <section id="topbarbelow" class=" d-lg-block">
                            <div class="container-fluid text-center">
                                <div class="fll tbr mgr7">
                                    <!-- <img src="<?php //echo base_url('public/assets/images/icons/walletColor.png') ?>" alt=""> -->
                                    <span class="topbar-line-right" style="width: 220px;">Số dư ví: <span
                                            class="clr-or">
                                            <?= ($dataUser->walletInfo->W73017ed33b64273d17b85efaa30e4492->remain_balance) ? number_format($dataUser->walletInfo->W73017ed33b64273d17b85efaa30e4492->remain_balance) : 0 ?>
                                            đ</span></span>
                                    <div class="btn-header-recharge-wallet" data-toggle="modal"
                                        data-target="#modalCallVA">
                                        Nạp ví
                                    </div>

                                </div>
                            </div>
                        </section>

                        <div class="resp-btn-creat-or">
                            <a
                                href="<?php echo base_url('tao-don-le') ?>"><button><?= lang('Label.lbl_newSingleOrder')?></button></a>
                            <a
                                href="<?php echo base_url('tao-don-nhanh') ?>"><button><?= lang('Label.lbl_newFastOrder') ?></button></a>
                        </div>
                    </div>
                </div>
                <div id="header" class="row navBarTop searchBarMobile">
                    <form class="search-bar inner-addon right-addon">
                        <button class="btnSearch btnSearchOrder" type="button">
                            <i class=" fa fa-search searchIcon"></i>
                        </button>
                        <input type="text" name="searchOrders" value="<?php echo $order;?>" autocomplete="off"
                            class="form-control input-order-home searchOrders" id="searchOrders"
                            placeholder="Có thể nhập 30 mã đơn, mỗi đơn cách nhau bởi dấu phẩy">
                    </form>
                </div>
            </div>
        </nav>
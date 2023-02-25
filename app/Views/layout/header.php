<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>HOLASHOP</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="google-signin-client_id"
        content="232834827067-oq2lj0ovpa2t80b3je992k8cc60elgl4.apps.googleusercontent.com">
    <!-- Favicons -->
    <link rel="icon" href="<?php echo base_url('public/favicon.ico') ?>">
    <link rel="apple-touch-icon" href="<?php echo base_url('public/favicon.ico') ?>">

    <!-- Google Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet"> -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600&display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="<?php echo base_url('public/lib/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Libraries CSS Files -->
    <link href="<?php echo base_url('public/vendor/icofont/icofont.min.css') ?> " rel="stylesheet">
    <link href="<?php echo base_url('public/vendor/boxicons/css/boxicons.min.css') ?> " rel="stylesheet">
    <link href="<?php echo base_url('public/vendor/animate.css/animate.min.css') ?> " rel="stylesheet">
    <link href="<?php echo base_url('public/vendor/remixicon/remixicon.css') ?> " rel="stylesheet">
    <link href="<?php echo base_url('public/vendor/venobox/venobox.css') ?> " rel="stylesheet">
    <link href="<?php echo base_url('public/vendor/owl.carousel/assets/owl.carousel.min.css') ?> " rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('public/css/font-awesome.min.css'); ?>">

    <link href="<?php echo base_url('public/css/main.css?v=').microtime(true) ?> " rel="stylesheet">
    <link href="<?php echo base_url('public/css/anhtt.css?v=').microtime(true) ?> " rel="stylesheet">
    <!-- <link href="<?php echo base_url('public/css/main.min.css?v=').microtime(true) ?> " rel="stylesheet"> -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.3/angular.min.js"></script>
    <script src="<?php echo base_url('public/lib/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/lib/jquery/jquery-migrate.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/lib/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/otpInputDirective.min.js')?>"></script>

    <script src="https://www.google.com/recaptcha/api.js"></script>
    <link rel="stylesheet" href="<?=base_url('public/assets/chosen/chosen.css')?>">
    <link rel="stylesheet" href="<?=base_url('public/assets/chosen/chosen-custom.css')?>">
    <!-- <script src="https://www.google.com/recaptcha/api.js?render=6Lc-TqsbAAAAANgipMHwdruxmLCD1eEJqCyu4AEv"></script> -->

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

    <?php
          $link = $_SERVER['REQUEST_URI'];
          $link_array = explode('/',$link);
          $page = $link_array[2];
          $searchOrder = explode('?',$page);
          $searchOrderUrl = $searchOrder[0];
  ?>
    <!-- ======= Header ======= -->
    <?php if($page != '' && $searchOrderUrl != 'tra-cuu-hanh-trinh-don-hang'){ ?>
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center p-0">
            <div class="logo logo-page mr-auto">
                <a href="/"><img src="<?php echo base_url('public/images/logo.png'); ?>" alt="" class="img-fluid"></a>
                <span class="nav_title"><?php echo $title?> </span>
            </div>
    </header>
    <?php }else{ ?>
    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-lg-block">
        <div class="<?php if(!empty($auth)){ echo('container d-flex');}?>  p-0">
            <div class="container header-home-respon">
                <div class="contact-info topbar-right mr-auto">
                    <div class="fll tbr dropdownapptest posfixed d-none" id="downloadApp">
                        <a class="pl-0 ml-0 topbar-line tl-no-border nav-link count-indicator hvdownload " href="#"
                            data-toggle="dropdown" aria-expanded="false">
                            <?= lang('Label.lbl_downloadApp') ?>
                        </a>
                        <!-- <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list downloadapp"
                            aria-labelledby="downloadApp">
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
                        <a href="tel:1900234539"><span class="topbar-line" style="border-left:none ; padding-left: 0px;">Hotline: <span class="clr-or">1900 2345
                                    39</span></span></a>
                    </div>
                    <div class="fll tbr">
                        <span class="topbar-line"><?= lang('Label.lbl_connect') ?></span>
                        <a href="https://www.instagram.com/holaship.vn/">
                            <img id="icon-header-1a" onchange="outIconHeader()"
                                src="<?php echo base_url('public/assets/images/icons/instagram.png') ?>" alt="">
                            <img id="icon-header-1b" src="<?php echo base_url('public/images/instagram1.png') ?>"
                                alt=""></a>
                        <a href="https://www.facebook.com/holaship.vn">
                            <img id="icon-header-2a" src="<?php echo base_url('public/assets/images/icons/fb.png') ?>"
                                alt="">
                            <img id="icon-header-2b" src="<?php echo base_url('public/images/fb1.png') ?>" alt=""></a>
                        <a href="https://www.tiktok.com/@holaship.official">
                            <img id="icon-header-3a"
                                src="<?php echo base_url('public/assets/images/icons/tiktok.png') ?>" alt="">
                            <img id="icon-header-3b" src="<?php echo base_url('public/images/tiktok1.png') ?>"
                                alt=""></a>
                    </div>
                </div>

                <div class="topbar-right tbr-lg ">
                    <!-- <div class="fll tbr posfixed dropnoti hd-home-hover">
                        <img src="<?php echo base_url('public/images/bell.png') ?>" alt="">
                        <a class=" topbar-line tl-no-border nav-link count-indicator noti  clw pl-2 pb-1" href="#" data-toggle="dropdown"
                            aria-expanded="false">
                            <?= lang('Label.lbl_notification') ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list notiMess"
                            aria-labelledby="messageDropdown">
                            <div class="tac noLogin">
                            <img src="<?php echo base_url('public/images/noNoti.png'); ?>" alt="">
                            <p><?= lang('Label.lbl_loginToSeeNotification') ?></p>
                            <a href="<?= base_url('dang-nhap'); ?>" alt="Đăng nhập"
                                class="btn btn-login"><?= lang('Label.lbl_login') ?></a>
                            <a href="<?= base_url('dang-ky.html'); ?>" alt="Đăng ký"
                                class="btn btn-register"><?= lang('Label.lbl_register') ?></a>
                            </div>
                        </div>
                        </div>

                    <div class="fll tbr mgr7 pt-1 ">
                    <img src="<?php echo base_url('public/images/question.png') ?>" alt="">
                    <span class="topbar-line-right"><?= lang('Label.lbl_support') ?></span>
                    </div>
                    -->

                    <?php
                 if(empty($auth)){ ?>
                    <div class="fll frm-lg">
                        <div class="fll tbr ">
                            <img src="<?php echo base_url('public/images/icon-login.png') ?>" alt="">
                            <a href="<?= '/dang-nhap' ?>"><span
                                    class="topbar-line-right hd-home-hover2"><?= lang('Label.lbl_login') ?></span></a>
                        </div>
                        <div class="fll tbr lg-reg ">
                            <a href="<?= '/dang-ky.html'; ?>"> <span
                                    class="topbar-line-right hd-home-hover2"><?= lang('Label.lbl_register') ?></span></a>
                        </div>
                    </div>
                    <?php } else{ ?>
                    <div class="d-flex dropdown header-after-login" id="user-logout">
                        <div data-toggle="dropdown" class="dropdown-header-after-login">
                            <img src="<?php echo base_url('public/images/icon-showHome.svg') ?>" alt=""
                                id="header-img-2">
                            <img src="<?php echo base_url('public/images/icon-showHome1.svg') ?>" alt=""
                                id="header-img-1">
                        </div>
                        <div class="dropdown-menu dropdown-menu-right preview-list  service-payment-home-page mt-2">
                            <div>
                                <a href="<?= DOMAIN_HOME ?>">
                                    <img src="<?php echo base_url('public/images/HolaLife.svg') ?>" alt="">
                                    <?= lang('Label.lbl_headerHolaHome') ?>
                                </a>
                            </div>


                            <div>
                                <a href="<?= DOMAIN_FOOD ?>">
                                    <img src="<?php echo base_url('public/images/HolaFood.svg') ?>" alt="">
                                    <?= lang('Label.lbl_headerHolaFood') ?>
                                </a>
                            </div>


                            <div>
                                <a href="<?php echo base_url('/danh-sach-don-hang') ?>">
                                    <img src="<?php echo base_url('public/images/Holaship.png') ?>" alt="">
                                    <?= lang('Label.lbl_headerHolaShip') ?>
                                </a>
                            </div>

                            <!-- An Tú 06/12 -->
                            <div>
                                <a href="<?= DOMAIN_TOPUP.'nap-tien-truc-tiep' ?>" class="d-flex"
                                    style="align-items: center;">
                                    <img src="<?php echo base_url('public/images/didong.png') ?>" alt="">
                                    <span><?= lang('Label.lbl_headerPaymentPhone') ?></span>
                                </a>
                            </div>

                            <div>
                                <a href="<?= DOMAIN_TOPUP.'mua-ma-the'?>" class="d-flex">
                                    <img src="<?php echo base_url('public/images/mathe.png') ?>" alt="">
                                    <span><?= lang('Label.lbl_headerCodeCard') ?></span>
                                </a>
                            </div>

                            <div>
                                <a href="<?= DOMAIN_TOPUP.'thanh-toan-tien-dien'?>" class="d-flex"
                                    style="align-items: center;">
                                    <img src="<?php echo base_url('public/images/thanhtoan.png') ?>" alt="">
                                    <span><?= lang('Label.lbl_headerPaymentOrders') ?></span>
                                </a>
                            </div>

                            <div>
                                <a href="<?= DOMAIN_TOPUP.'nap-tien-truc-tiep' ?>" class="d-flex"
                                    style="align-items: center;">
                                    <img src="<?php echo base_url('public/images/taichinh.png') ?>" alt="">
                                    <span><?= lang('Label.lbl_headerSupportMoney') ?></span>
                                </a>
                            </div>
                            <div>
                                <a href="<?= DOMAIN_TOPUP.'nap-tien-truc-tiep' ?>" class="d-flex"
                                    style="align-items: center;">
                                    <img src="<?php echo base_url('public/images/muasam.png') ?>" alt="">
                                    <span><?= lang('Label.lbl_headerBuy') ?></span>
                                </a>
                            </div>
                            <!-- An Tú 06/12 -->

                        </div>
                    </div>

                    <div class="fll tbr mgr7 dropdown">
                        <span class="topbar-line-right " data-toggle="dropdown">
                            <img src=" <?php  if($avatarUser!=""){ echo ($avatarUser); }else{ echo base_url('/public/assets/images/ava.png'); } ?> "
                                alt="" class="avatar-home">
                        </span>
                        <div class="dropdown-menu dropdown-menu-right preview-list  service-payment-home-page show-menu-header-avatar"
                            style="top: 0px!important;">
                            <ul class="mb-1 mt-1 text-left">
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
                                            <img src="<?php echo base_url('public/images/listOrders.svg'); ?>" alt=""
                                                class="p-0 logout-header-img">
                                        </div>

                                        <span class="w-100"><?= lang('Label.lbl_listOrders') ?></span>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?= base_url('/dang-xuat'); ?>" class="ml-0 d-flex">
                                        <div>
                                            <img src="<?php echo base_url('public/images/logout.png'); ?>" alt=""
                                                class="p-0 logout-header-img">
                                        </div>
                                        <span class="w-100"><?= lang('Label.lbl_logOut') ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>


                </div>

                <?php } ?>
            </div>
        </div>
        <!--  </div> -->

        <!-- ======= Header ======= -->

        <header id="header" class="d-flex align-items-center w-100">
            <div class="navbar navbar-default navbar-fixed-top nav container p-0">
                <div class="align-items-center p-0 navbar-header w-100" id="header-menu">
                    <div class="logo text-center" id="logo-header">
                        <span class="float-left menu-left-none btn-body-menu-top"> <img
                                src="<?php echo base_url('public/images/Menu.png') ?>" alt=""
                                onclick="openNav()"></span>
                        <a href="/"><img src="<?php echo base_url('public/images/logo.png'); ?>" alt=""
                                class="img-fluid">

                        </a>
                    </div>
                    <div id="mySidenavbar" class="mySidenavbar">
                        <div class="h-100 position-relative">
                            <div style="background-color: white;">
                                <ul style="display: flex; padding: 20px 0 20px 10px;" class="list-unstyled">
                                    <li>
                                        <span class="float-left menu-left-none btn-body-menu-top"> <img
                                                src="<?php echo base_url('public/images/Menu.png') ?>" alt=""
                                                onclick="closeNav()"></span>
                                    </li>
                                    <li class="w-100">
                                        <a href="/"><img src="<?php echo base_url('public/images/logo.png'); ?>" alt=""
                                                class="img-fluid"></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- User -->
                            <?php if(!isset($avatarUser)){ ?>
                            <div style="padding-left: 16px;">
                                <ul class="d-flex list-unstyled sidebar-home-1">
                                    <li>
                                        <img src="<?php echo base_url('public/images/av.png') ?>" alt="">
                                    </li>
                                    <li class="sidebar-login">
                                        <a href="<?= '/dang-nhap' ?>"><?= lang('Label.lbl_login') ?></a></a>
                                    </li>
                                    <li>
                                        <a href="<?= '/dang-ky.html'; ?>"> <?= lang('Label.lbl_register') ?></a>
                                    </li>
                                </ul>
                            </div>
                            <?php }?>

                            <div class="sidebar-home-2">
                                <ul class="list-unstyled">
                                    <li>
                                        <img src="<?php echo base_url('public/images/Home1.png') ?>" alt="">
                                    </li>
                                    <li>
                                        <a href="/"><?= lang('Label.lbl_home') ?></a>
                                    </li>
                                </ul>
                                <ul class="sidebar-home-3">
                                    <li>
                                        <a href="<?= base_url('goi-cuoc') ?>"><?= lang('Label.lbl_txtFees') ?></a>
                                    </li>
                                </ul>
                                <ul class="sidebar-home-3">
                                    <li>
                                        <a href="<?= base_url('buu-cuc') ?>"><?= lang('Label.lbl_postOffices') ?></a>
                                    </li>
                                </ul>
                                <ul class="sidebar-home-3">
                                    <li>
                                        <a href="<?= base_url('tin-tuc') ?>"><?= lang('Label.lbl_notifyCation') ?></a>
                                    </li>
                                </ul>
                                <ul class="sidebar-home-3">
                                    <li>
                                        <a href="<?= base_url('lien-he') ?>"><?= lang('Label.lbl_contact') ?></a>
                                    </li>
                                </ul>
                                <ul class="sidebar-home-3">
                                    <li>
                                        <a href="javascript:void(0)"><?= lang('Label.modalHeader') ?></a>
                                    </li>
                                </ul>
                                <ul class="sidebar-home-3">
                                    <li>
                                        <a href="<?= base_url('ho-tro') ?>"><?= lang('Label.alt_support') ?></a>
                                    </li>
                                </ul>
                            </div>

                            <?php if(isset($avatarUser)){ ?>
                            <div class="sidebar-home-2">
                                <ul class="list-unstyled">
                                    <li>
                                        <img src="<?php echo base_url('public/images/Home1.png') ?>" alt="">
                                    </li>
                                    <li>
                                        <a href="/">Dịch vụ</a>
                                    </li>
                                </ul>
                                <ul class="sidebar-home-3">
                                    <li>
                                        <a
                                            href="<?= base_url('thong-tin-tai-khoan') ?>"><?= lang('Label.lbl_infoAccount') ?></a>
                                    </li>
                                </ul>
                                <ul class="sidebar-home-3">
                                    <li>
                                        <a
                                            href="<?= base_url('tao-don-le') ?>"><?= lang('Label.lbl_newSingleOrder') ?></a>
                                    </li>
                                </ul>
                                <ul class="sidebar-home-3">
                                    <li>
                                        <a
                                            href="<?= base_url('tao-don-nhanh') ?>"><?= lang('Label.lbl_newFastOrder') ?></a>
                                    </li>
                                </ul>

                            </div>
                            <div class="sidebar-home-2">
                                <ul class="list-unstyled">
                                    <li>
                                        <img src="<?php echo base_url('public/images/Home1.png') ?>" alt="">
                                    </li>
                                    <li>
                                        <a href="/dang-xuat"> <?= lang('Label.lbl_logOut') ?></a>
                                    </li>
                                </ul>
                            </div>
                            <?php }?>
                            <div class="sidebar-home-footter position-absolute text-center w-100">
                                <?= lang('Label.navBar_copyright') ?> <br />
                                <?= lang('Label.navBar_imedia') ?>
                            </div>
                        </div>
                        <!--============ -->
                    </div>
                    <nav class="nav-menu d-none d-lg-block w-50">
                        <ul>
                            <li><a href="<?= base_url('buu-cuc') ?>">Bưu cục</a></li>
                            <li><a href="<?= base_url('lien-he') ?>">Liên hệ</a></li>
                            <li><a href="<?= base_url('tuyen-dung-doi-tac') ?>">Dành cho tài xế</a></li>

                            <!--  <li><a href="<?= base_url('thong-bao') ?>">Tin tức</a></li>
            <li><a href="<?= base_url('lien-he') ?>">Liên hệ</a></li> -->
                            <!-- <li><a href="javascript:void(0)">Gói cước</a></li>
              <li><a href="javascript:void(0)">Bưu cục</a></li>
              <li><a href="javascript:void(0)">Tin tức</a></li>
              <li><a href="javascript:void(0)">Liên hệ</a></li> -->
                        </ul>
                    </nav>
                    <!-- <form class="search-bar inner-addon right-addon"> -->

                    <input type="hidden" class="signInCheck" name="signInCheck"
                        value="<?php echo (!empty($auth)) ? '1' : '0' ?>">
                    <button
                        class="btnSearch <?php if(!empty($auth)){ echo 'btnSearchOrderSignin'; }else{ echo 'btnSearchOrder'; } ?> "
                        type="button">
                        <i class=" fa fa-search searchIcon"></i>
                    </button>
                    <input type="text" name="searchOrders" value="<?php echo $order;?>" autocomplete="off"
                        class="form-control search-bar input-order-home" id="searchOrders"
                        placeholder="Có thể nhập 30 mã đơn, mỗi đơn cách nhau bởi dấu phẩy">
                    <!-- </form> -->
                </div>
            </div>
        </header>

        <!-- End Header -->

        <?php } ?>
    </section>
    <!--==========================
    Intro Section
  ============================-->


    <main id="main">
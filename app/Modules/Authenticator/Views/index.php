<!-- ================An Tú DEV=============== -->
<!-- <div id="popup" style="display: none;" class="hola-popup hola-pop-up hola-popup__overlay">
  <div class="container hola-ctn ">
    <div class="hola-img-wrap">
      <span class="hola-png-icon holaCloseButton"><img src="<?php //echo base_url('public/images/xxx.svg') ?>"></span>

      <img src="<?php //echo base_url('public/images/popup.png') ?>" alt="Image" class="hola-img">

    </div>
  </div>
</div> -->

<div class="element" data-aos="fade-up" data-aos-duration="1000">
    <ul class="home-none">
        <li>
            <a href="<?php echo base_url('tao-don-le') ?>">
                <img src="<?php echo base_url('public/images/Union2.png') ?>" alt="">
            </a>
        </li>
        <li>
            <img src="<?php echo base_url('public/images/Vector11.png') ?>" alt="">
        </li>
        <li>
            <img src="<?php echo base_url('public/images/bx_bxs-phone-call.png') ?>" alt="">
        </li>
        <li>
            <img src="<?php echo base_url('public/images/home-show-service.png') ?>" alt=""
                style="transform: rotate(180deg);" onclick="noneServiceHome()">
        </li>
    </ul>
    <div class="home-show" onclick="showServiceHome()">
        <img src="<?php echo base_url('public/images/home-show-service.svg') ?>" alt="" class="home-show w-100 h-100">
    </div>
</div>


<section id="hero" class="index-banner" data-aos="fade-up" data-aos-duration="1000">
    <div class="hero-container" style="margin-top:22px;">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active" style="height: auto;">
                    <img src="<?php echo base_url('public/images/Bannerweb/Banner2.png') ?>" alt="" class="w-100">
                </div>
                <div class="carousel-item " style="height: auto;">
                    <img src="<?php echo base_url('public/images/Bannerweb/Banner.png') ?>" alt="" class="w-100">
                </div>

            </div>

            <a class="carousel-control-prev carousel-control-prev-home " href="#heroCarousel" role="button"
                data-slide="prev">
                <img src="<?php echo base_url('public/images/prevHeaderHome.svg') ?>" alt="">
                <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next carousel-control-prev-home-2" href="#heroCarousel" role="button"
                data-slide="next">
                <img src="<?php echo base_url('public/images/nextHeaderHome.svg') ?>" alt="">
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div>
</section>
<!-- End Hero -->


<!-- <section class="wow bounceInUp" data-wow-duration="1s" data-wow-delay="1s" data-wow-iteration="1">đợi 3 giây</section>
 -->

<section id="hm-body" data-aos="fade-up" data-aos-duration="1000">
    <div class="container hm-utp">
        <div class="row">
            <div class="col-12">
                <p>ƯỚC TÍNH PHÍ</p>
            </div>
            <div class="col-md-4 col-12 hm-sl-1">
                <ul class="list-styled p-2 m-0" style="background: #F8F8F8;border-radius: 5px;">
                    <span class="color-885DE5">Điểm lấy hàng</span>
                    <br>
                    <select name="sex" id="sex" class="form-control frm-lg chosen-select sex">
                        <option value="">
                            Chọn Tỉnh/Thành Phố
                        </option>
                        <option value="">
                            Thành phố Hà Nội
                        </option>
                        <option value="">
                            Thành phố Hồ Chí Minh
                        </option>
                        <option value="">
                            Thành phố Hải Dương
                        </option>

                    </select>

                    <select class="chosen-select ">
                        <option value=""><?=lang('Label.lbl_chooseDistrict')?></option>
                        <option value="Internet Explorer">
                        <option value="Chrome">
                        <option value="Opera">
                        <option value="Safari">
                    </select>
                </ul>

            </div>
            <div class="col-md-4 col-12 hm-sl-1">
                <ul class="list-styled p-2 m-0" style="background: #F8F8F8;border-radius: 5px;">
                    <span class="color-885DE5">Điểm nhận hàng</span>
                    <br>
                    <select name="sex" id="sex" class="form-control frm-lg chosen-select sex">
                        <option value="">
                            Chọn Tỉnh/Thành Phố
                        </option>
                        <option value="">
                            Thành phố Hà Nội
                        </option>
                        <option value="">
                            Thành phố Hồ Chí Minh
                        </option>
                        <option value="">
                            Thành phố Hải Dương
                        </option>

                    </select>

                    <select class="chosen-select ">
                        <option value=""><?=lang('Label.lbl_chooseDistrict')?></option>
                        <option value="Internet Explorer">
                        <option value="Chrome">
                        <option value="Opera">
                        <option value="Safari">
                    </select>
                </ul>
            </div>
            <div class="col-md-4 col-12 hm-sl-1 pb-1">
                <ul class="list-styled  m-0 pt-2 pl-2 pr-2 weight-home">
                    <span class="color-885DE5"> Trọng lượng</span>
                    <br>
                    <div class="form-group pb-2">
                        <input class="form-control frm-lg weight-home-1" id="" placeholder="Trọng lượng" type="number">
                        <span class="field-icon-eye hm-tl">Gram</span>
                        <button class="mb-2">Tra cứu chi phí</button>
                    </div>
                </ul>
            </div>
        </div>
    </div>

    <!-- ============Tin tức khuyến mãi================ -->
    <div class="hm-tt-km">
        <div class="container hm-menu-sv">
            <div class="row">
                <div class="col-12 row hm-menu-sv-1" data-aos="fade-up" data-aos-duration="2000">
                    <div class="col-lg-2 col-sm-4 col-6">
                        <div class="hm-icon-menu">
                            <div>
                                <img src="<?php echo base_url('public/images/emojione_closed-book.png') ?>" alt="">
                            </div>
                        </div>
                        <div class="text-center">
                            Bảng giá
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-4 col-6">
                        <div class="hm-icon-menu">
                            <div>
                                <img src="<?php echo base_url('public/images/Group24.png') ?>" alt="">
                            </div>
                        </div>
                        <div class="text-center">
                            Đơn hàng
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-4 col-6">
                        <div class="hm-icon-menu">
                            <div>
                                <img src="<?php echo base_url('public/images/wallet11.png') ?>" alt="">
                            </div>
                        </div>
                        <div class="text-center">
                            Ví Hola
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-4 col-6">
                        <div class="hm-icon-menu">
                            <div>
                                <img src="<?php echo base_url('public/images/Location.png') ?>" alt="">
                            </div>
                        </div>
                        <div class="text-center">
                            Hành trình
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-4 col-6">
                        <div class="hm-icon-menu">
                            <div>
                                <img src="<?php echo base_url('public/images/delivery-man1.png') ?>" alt="">
                            </div>
                        </div>
                        <div class="text-center">
                            Tìm tài xế
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-4 col-6">
                        <div class="hm-icon-menu">
                            <div>
                                <img src="<?php echo base_url('public/images/delivery-man.png') ?>" alt="">
                            </div>
                        </div>
                        <div class="text-center">
                            Thống kê
                        </div>
                    </div>
                </div>

                <div class="hm-menu-sv-line"></div>

                <div class="col-12 row hm-menu-sv-2" data-aos="fade-up" data-aos-duration="2000">
                    <div class="col-lg-2 col-sm-4 col-6">
                        <a href="<?php echo  DOMAIN_TOPUP.'nap-tien-truc-tiep' ?>" style="color:#444444">
                            <div class="hm-icon-menu">
                                <div>
                                    <img src="<?php echo base_url('public/images/Mobile.png') ?>" alt="">
                                </div>
                            </div>
                            <div class="text-center">
                                Nạp điện <br />thoại
                            </div>
                        </a>
                    </div>


                    <div class="col-lg-2 col-sm-4 col-6">
                        <a href="<?php echo DOMAIN_TOPUP.'mua-ma-the' ?>" style="color:#444444">
                            <div class="hm-icon-menu">
                                <div>
                                    <img src="<?php echo base_url('public/images/Data.png') ?>" alt="" class="pt-2">
                                </div>
                            </div>
                            <div class="text-center">
                                Thẻ ĐT, Game <br> Datacode
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-sm-4 col-6">
                        <a href="<?php echo DOMAIN_TOPUP.'thanh-toan-tien-dien' ?>" style="color:#444444">
                            <div class="hm-icon-menu">
                                <div>
                                    <img src="<?php echo base_url('public/images/Game.png') ?>" alt="">
                                </div>
                            </div>
                            <div class="text-center">
                                Thanh toán <br> hóa đơn
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-sm-4 col-6">
                        <a href="javascript:void(0)" style="color:#444444">
                            <div class="hm-icon-menu">
                                <div>
                                    <img src="<?php echo base_url('public/images/httc.png') ?>" alt="" class="pt-2">
                                </div>
                            </div>
                            <div class="text-center">
                                Hỗ trợ <br> tài chính
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-sm-4 col-6">
                        <a href="javascript:void(0)" style="color:#444444">
                            <div class="hm-icon-menu">
                                <div>
                                    <img src="<?php echo base_url('public/images/muasam.png') ?>" alt="">
                                </div>
                            </div>
                            <div class="text-center">
                                Mua sắm <br> giải trí, đi lại
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-sm-4 col-6">
                        <a href="<?php echo DOMAIN_TOPUP.'lich-su-giao-dich' ?>" style="color:#444444">
                            <div class="hm-icon-menu">
                                <div>
                                    <img src="<?php echo base_url('public/images/history.png') ?>" alt="">
                                </div>
                            </div>
                            <div class="text-center">
                                Lịch sử <br> mua hàng
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <div class="container home-body-ttkm">
            <div class="row">
                <div class="col-md-12 hm-title">
                    <p>TIN TỨC - KHUYẾN MẠI</p>
                </div>
                <div class="col-md-4 hm-tt-mn" data-aos="fade-up" data-aos-duration="1500">
                    <div>
                        <a href="">
                            <img src="<?php echo base_url('public/images/Bannerweb/news1.png') ?>" alt="">
                            <ul class="pb-4">
                                <li class="hm-tt-mn1">
                                    Chung tay tiêu thụ nông sản giúp người dân vượt qua đại dịch
                                </li>
                                <li class="hm-tt-mn2">
                                    <img src="<?php echo base_url('public/images/ei_clock.svg') ?>" alt="">
                                    <span>02/08/2021</span>
                                </li>
                                <li class="hm-tt-mn3">

                                </li>

                                <!-- <li class="hm-tt-mn4">
                  <span><a href="">Xem thêm>></a></span>
                </li> -->
                            </ul>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 hm-tt-mn" data-aos="fade-down" data-aos-duration="1000">
                    <div>
                        <a href="">
                            <img src="<?php echo base_url('public/images/Bannerweb/news2.png') ?>" alt="">
                            <ul class="pb-4">
                                <li class="hm-tt-mn1">
                                    Bưu Tá HolaShip - Giao gần giao xa, tuân thủ nghiêm quy tắc 5K
                                </li>
                                <li class="hm-tt-mn2">
                                    <img src="<?php echo base_url('public/images/ei_clock.svg') ?>" alt="">
                                    <span>12/08/2021</span>
                                </li>
                                <li class="hm-tt-mn3">

                                </li>

                                <!-- <li class="hm-tt-mn4">
                  <span><a href="">Xem thêm>></a></span>
                </li> -->
                            </ul>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 hm-tt-mn" data-aos="fade-up" data-aos-duration="1000">
                    <div>
                        <a href="">
                            <img src="<?php echo base_url('public/images/Bannerweb/news3.png') ?>" alt="">
                            <ul class="pb-4">
                                <li class="hm-tt-mn1">
                                    15K đồng giá, chỉ tính cước với đơn hàng giao thành công
                                </li>
                                <li class="hm-tt-mn2">
                                    <img src="<?php echo base_url('public/images/ei_clock.svg') ?>" alt="">
                                    <span>21/09/2021</span>
                                </li>
                                <li class="hm-tt-mn3">

                                </li>
                                <!-- <li class="hm-tt-mn4">
                  <span><a href="">Xem thêm>></a></span>
                </li> -->
                            </ul>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container hm-vsc " data-aos="fade-up" data-aos-anchor-placement="center-bottom">
        <div class="row">
            <div class="col-md-4 img-left wow " id="home-vsc-left" data-wow-duration="1s" data-wow-iteration="1">
                <img src="<?php echo base_url('public/images/Bannerweb/cod.png') ?>" alt="" class="hm-svc-img1">
                <img src="<?php echo base_url('public/images/Rectangle5.png') ?>" alt="" class="hm-svc-img2">
                <img src="<?php echo base_url('public/images/Bannerweb/cskh.png') ?>" alt="" class="hm-svc-img3">
            </div>
            <div class="col-md-8 hm-vsc-2 wow" id="home-vsc-right" data-wow-duration="1s" data-wow-iteration="1">
                <ul>
                    <li class="hm-vsc-1" style="margin-left: 40px;">
                        <p>VÌ SAO CHỌN HOLASHIP</p>
                    </li>
                </ul>
                <section id="services" class="services  section-bg">
                    <div class="icon-box why1">
                        <img class="srim1" src="<?=base_url('public/images/why_1.png');?>" alt="">
                        <h4 class="services-active srti1">Nhận COD ngay lập tức</h4>
                        <p>Ngay khi bưu tá xác nhận giao hàng thành công, tiền sẽ NGAY LẬP TỨC nổi trong tài khoản
                            Holaship
                            của shop. Shop có thể bấm rút tiền về tài khoản ngân hàng NGAY LẬP TỨC 24/7.</p>
                        <span class="line"></span>
                    </div>
                    <div class="icon-box why2">
                        <img class="srim2" src="<?=base_url('public/images/why_2.png');?>" alt="">
                        <h4 class="srti2">Đền bù 100% không cần VAT</h4>
                        <p>Đối với các đơn hàng giao qua J&T và GHTK có giá trị dưới 3 triệu. Đền bù 100% không cần hóa
                            đơn nếu
                            shop mua bảo hiểm hàng hóa (miễn phí bảo hiểm với hàng hóa giá trị dưới 1 triệu).</p>
                        <span class="line"></span>
                    </div>

                    <div class="icon-box why3">
                        <img class="srim3" src="<?=base_url('public/images/why_3.png');?>" alt="">
                        <h4 class="srti3">Hỗ trợ - chăm sóc riêng 24/7</h4>
                        <p>Có nhân viên chăm sóc, hỗ trợ xử lý đơn riêng cho từng Khách hàng. Đối với KH có lượng đơn
                            từ 200 đơn/ ngày, hỗ trợ nhân viên đóng gói hàng hóa, lên đơn.</p>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div class="wrap-qt-gn-seccion-bd">
        <div class="section-bg wrap-qt-gn-seccion">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="header-service">
                        <h2 class="section-title-underline">
                            <span>Quy trình giao nhận</span>
                        </h2>
                    </div>
                </div>
                <div class="row" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="300"
                    data-aos-offset="0">
                    <div class="col-lg-12">
                        <div class="wrap-qt-gn">
                            <ul class="list-qt-gn">
                                <li class="qt-dkdn">
                                    <div class="img-qt-gn">
                                        <span class="qt-line"></span>
                                        <img src="<?php echo base_url('public/images/dkdn.png'); ?>"
                                            alt="Đăng ký / Đăng nhập" class="img-fluid">
                                        <div class="text-qt-gn">Đăng ký / Đăng nhập</div>
                                    </div>
                                </li>
                                <li class="qt-taodon line-bottom-item">
                                    <div class="img-qt-gn">
                                        <img src="<?php echo base_url('public/images/td.svg'); ?>" alt="Chọn gói cước "
                                            class="img-fluid">
                                        <div class="text-qt-gn">Chọn gói cước</div>
                                    </div>
                                </li>
                                <li class="qt-cnvc">
                                    <div class="img-qt-gn">
                                        <img src="<?php echo base_url('public/images/vc.svg'); ?>" alt="Tạo đơn"
                                            class="img-fluid">
                                        <div class="text-qt-gn">Tạo đơn</div>
                                    </div>
                                </li>
                                <li class="qt-layhang line-bottom-item">
                                    <div class="img-qt-gn">
                                        <img src="<?php echo base_url('public/images/lh.png'); ?>" alt="Lấy hàng"
                                            class="img-fluid">
                                        <div class="text-qt-gn">Lấy hàng</div>
                                    </div>
                                </li>
                                <li class="qt-giaohang">
                                    <div class="img-qt-gn">
                                        <img src="<?php echo base_url('public/images/gh.png'); ?>" alt="Giao hàng"
                                            class="img-fluid">
                                        <div class="text-qt-gn">Giao hàng</div>
                                    </div>
                                </li>
                                <li class="qt-tdht line-bottom-item">
                                    <div class="img-qt-gn">
                                        <img src="<?php echo base_url('public/images/ht.png'); ?>"
                                            alt="Theo dõi hành trình" class="img-fluid">
                                        <div class="text-qt-gn">Theo dõi hành trình</div>
                                    </div>
                                </li>
                                <li class="qt-ruttien">
                                    <div class="img-qt-gn">
                                        <img src="<?php echo base_url('public/images/rt.png'); ?>" alt="Rút tiền"
                                            class="img-fluid">
                                        <div class="text-qt-gn">Rút tiền</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div>
        <img src="<?php echo base_url('public/images/banner_boot.png') ?>" alt=""
            style="width: 100%;max-height: 400px;">
    </div>
    <div class="hm-tt-km" style="padding-bottom: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 hm-title">
                    <p>ĐỐI TÁC CỦA HOLASHIP</p>
                </div>
                <div class="col-md-12">
                    <div id="owl-partners-introduce2-home" class="owl-carousel owl-theme wow owl-list-partner"
                        data-wow-delay="0.6s">
                        <div class="hm-bgr">
                            <img src="<?php echo base_url('public/images/bidv.svg') ?>" alt="">
                        </div>
                        <div class="hm-bgr">
                            <img src="<?php echo base_url('public/images/pancake.svg') ?>" alt="">
                        </div>
                        <div class="hm-bgr">
                            <img src="<?php echo base_url('public/images/jtexpress.svg') ?>" alt="">
                        </div>
                        <div class="hm-bgr">
                            <img src="<?php echo base_url('public/images/giaohangnhanh.svg') ?>" alt="">
                        </div>
                        <div class="hm-bgr">
                            <img src="<?php echo base_url('public/images/tpot.svg') ?>" alt="">
                        </div>
                        <div class="hm-bgr">
                            <img src="<?php echo base_url('public/images/viettelpost.svg') ?>" alt="">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
var width = $(window).width()
$(document).ready(function() {
    $(".hola-popup").delay(1000).fadeIn();
    $('.hola-svg-icon').click(function(e) // You are clicking the close button
        {
            $('.hola-popup').fadeOut(); // Now the pop up is hiden.
        });
    $('.hola-popup__overlay').click(function(e) {
        $('.hola-popup').fadeOut();
    });
    // $(".hola-popup").delay(3000).fadeOut();
});

if (width > 992) {
    var position = $(window).scrollTop();
    console.log("run");
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 1000) {
            // console.log("Chạm ngưỡng");
            $("#home-vsc-left").addClass("slideInLeft")
            $("#home-vsc-right").addClass("slideInRight")
            // $('#').show();
        }
        if (scroll > position) {
            $('#header').css({
                'height': '50px'
            });

        } else {
            $('#header').css({
                'height': '60px'
            });
        }
        position = scroll;
    });
}

AOS.init();
</script>
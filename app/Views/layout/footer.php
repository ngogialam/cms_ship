</main>
<!--==========================
    Footer
  ============================-->
<div class="footer">
    <div class="container footer-responsive-none">
        <div class="row wrap-footer-top">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 wrap-item-footer wrap-item-logo">
                <a href="/"><img src="<?php echo base_url('public/images/logo.png'); ?>" alt=""
                        class="img-fluid wrap-item-logo-ft"></a>
                <ul class="list-unstyled">
                    <li><a href="javascript:void(0)">Giới thiệu về HolaShip</a></li>
                    <li><a href="javascript:void(0)">Tuyển dụng</a></li>
                    <li><a href="<?php echo base_url('hoi-dap');?>">Hỏi đáp (Q&amp;A)</a></li>
                    <li><a href="<?php echo base_url('lien-he');?>">Liên hệ</a></li>
                </ul>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 info-footer wrap-item-footer">
                <p class="title-footer">Thông tin dịch vụ</p>
                <ul class="list-unstyled">
                    <li><a href="<?php echo base_url('bang-gia');?>">Bảng giá</a></li>
                    <li><a href="javascript:void(0)">Khuyến mãi</a></li>
                    <li><a href="javascript:void(0)">Quy trình gửi hàng</a></li>
                    <li><a href="<?php echo base_url('hang-hoa-cam-van');?>">Hàng hóa cấm vận chuyển</a></li>
                </ul>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 info-footer info-footer-cs wrap-item-footer">
                <p class="title-footer">Chính sách</p>
                <ul class="list-unstyled">
                    <li><a href="<?php echo base_url('chinh-sach-boi-thuong');?>">Chính sách bồi thường</a></li>
                    <li><a href="<?php echo base_url('chinh-sach-dieu-khoan');?>">Chính sách và điều khoản</a></li>
                    <li><a href="<?php echo base_url('quy-trinh-khieu-nai');?>">Quy trình khiếu nại</a></li>
                </ul>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 info-last-footer wrap-item-footer">
                <div class="footer-des">
                    <p class="title-footer-last title-company">Công ty cổ phần <br>Công nghệ và dịch vụ Imedia</p>
                    <p class="phone-footer">(+84) 24 6295 8884</p>
                    <p class="email-footer">cj@imediatech.com.vn</p>
                    <p class="address-footer">Tầng 18, tòa nhà Peakview Tower, <br>36 Hoàng Cầu, quận Đống Đa, Hà Nội
                    </p>
                </div>
            </div>
        </div>
        <div class="row footer-bottom">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 footer-dk-new wrap-bo-ct">
                <a href="http://online.gov.vn/Home/WebDetails/70480" target="_blank"><img
                        src="<?php echo base_url('public/images/hls-bct.png'); ?>" alt="" class=""></a>
            </div>
            <div class="input-group col-xl-5 col-lg-4 col-md-12 col-sm-12 col-12 mgt25">
                <input type="text" class="form-control" placeholder="Nhập email hoặc số điện thoại của bạn" id="demo"
                    name="email">
                <div class="input-group-append">
                    <span class="input-group-text btn-cus-default">Nhận tin</span>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 mgt25 footer-dk-new-last ">
                <?php
                $lang = get_cookie('__locale');
            //   $lang = \Config\Services::session()->get('lang');
            ?>
                <select name="people" id="people" class="changeLanguage">
                    <option value="vi" <?= ($lang == 'vi') ? 'selected' : '' ?> data-class="avatar"
                        data-style="background-image: url(<?php echo base_url('/public/images/iconLanguage-VN.svg'); ?>);">
                        Tiếng Việt</option>
                    <option value="en" <?= ($lang == 'en') ? 'selected' : '' ?> data-class="avatar"
                        data-style="background-image: url(<?php echo base_url('/public/images/iconLanguage-EN.svg'); ?>);">
                        Tiếng Anh</option>
                </select>
            </div>
        </div>
    </div>
    <div class="container-fliud d-md-flex footer-copy" style="background-color: #885DE5;">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-12 ft-bt-text copyright copyright-befor-login-1 ft-bt-text-1 ">
                    <span>Copyright © 2021 Công ty cổ phần</span> <span>công nghệ và dịch vụ iMedia.</span>
                </div>
                <div class="col-xl-6 col-0 ft-bt-text ft-bt-text-2 pr-0">
                    <div class="social-links text-center text-md-right pt-3 pt-md-0 copyright-befor-login">
                        <span class="copyright">Kết nối với Holaship</span>

                        <div class="footer-social footer-social-left"><a href="mailto:cj@imediatech.com.vn"><img
                                    src="<?php echo base_url('public/images/email-bot.png'); ?>" alt="" class=""></a>
                        </div>
                        <div class="footer-social"><a href="https://www.instagram.com/holaship.vn/"><img
                                    src="<?php echo base_url('public/images/instagram-bot.png'); ?>" alt=""
                                    class=""></a></div>
                        <div class="footer-social"><a href="#"><img
                                    src="<?php echo base_url('public/images/in-bot.png'); ?>" alt="" class=""></a></div>
                        <div class="footer-social"><a href="https://www.facebook.com/holaship.vn"><img
                                    src="<?php echo base_url('public/images/fb-bot.png'); ?>" alt="" class=""></a></div>
                        <div class="footer-social"><a href="#"><img
                                    src="<?php echo base_url('public/images/twitter-bot.png'); ?>" alt="" class=""></a>
                        </div>
                        <div class="footer-social"><a href="#"><img
                                    src="<?php echo base_url('public/images/youtube-bot.png'); ?>" alt="" class=""></a>
                        </div>
                        <div class="footer-social"><a href="#"><img
                                    src="<?php echo base_url('public/images/pinterest-bot.png'); ?>" alt=""
                                    class=""></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- JavaScript Libraries -->

<script src="<?php echo base_url('public/lib/easing/easing.min.js'); ?>"></script>
<script src="<?php echo base_url('public/lib/superfish/hoverIntent.js'); ?>"></script>
<script src="<?php echo base_url('public/lib/superfish/superfish.min.js'); ?>"></script>
<script src="<?php echo base_url('public/lib/wow/wow.min.js'); ?>"></script>
<script src="<?php echo base_url('public/lib/waypoints/waypoints.min.js'); ?>"></script>
<script src="<?php echo base_url('public/lib/counterup/counterup.min.js'); ?>"></script>
<script src="<?php echo base_url('public/lib/owlcarousel/owl.carousel.min.js'); ?>"></script>
<script src="<?php echo base_url('public/lib/isotope/isotope.pkgd.min.js'); ?>"></script>
<script src="<?php echo base_url('public/lib/lightbox/js/lightbox.min.js'); ?>"></script>
<script src="<?php echo base_url('public/lib/touchSwipe/jquery.touchSwipe.min.js'); ?>"></script>
<script src="<?php echo base_url('public/lib/aos/aos.js'); ?>"></script>
<script src="<?=base_url('public/assets/chosen/chosen.jquery.js') ?>"></script>
<script src="<?=base_url('public/assets/chosen/docsupport/init.js'); ?>"></script>

<script src="<?php echo base_url('public/lib/jquery-sticky/jquery.sticky.js'); ?>"></script>

<script src="<?php echo base_url('public/lib/venobox/venobox.min.js'); ?>"></script>

<script src="<?php echo base_url('public/js/jquery-ui.js'); ?>"></script>
<!-- Contact Form JavaScript File -->

<!-- Template Main Javascript File -->

<script src="<?php echo base_url('public/js/mainjs.js?v='.microtime(true).''); ?>"></script>
<script src="<?php echo base_url('public/js/functions.js?v='.microtime(true).''); ?>"></script>
<script src="<?php echo base_url('public/js/validate.js?v='.microtime(true).''); ?>"></script>
<!-- Change language -->
<script>
$(function() {
    $.widget("custom.iconselectmenu", $.ui.selectmenu, {
        _renderItem: function(ul, item) {
            var li = $("<li>"),
                wrapper = $("<div>", {
                    text: item.label
                });

            if (item.disabled) {
                li.addClass("ui-state-disabled");
            }

            $("<span>", {
                    style: item.element.attr("data-style"),
                    "class": "ui-icon " + item.element.attr("data-class")
                })
                .appendTo(wrapper);

            return li.append(wrapper).appendTo(ul);
        }
    });
    $("#people")
        .iconselectmenu({
            change: function(event, ui) {
                locale = ui.item.value;
                hrefOld = window.location.href;
                $.ajax({
                    url: '/vi/changeLanguage',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        'locale': locale,
                        'hrefOld': hrefOld
                    },
                    success: function(res) {
                        console.log(res);
                        window.location.href = res.href;
                        // location.reload();
                    },
                    error: function() {
                        location.reload();
                    }
                });
            }
        })
        .iconselectmenu("menuWidget")
        .addClass("ui-menu-icons avatar");
});
</script>

<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-storage.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-analytics.js"></script>

<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-messaging.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>

<script src="<?php echo base_url('public/js/loader.js?v='.microtime(true)) ?>"></script>

<!-- Config firebase -->
<script>
var firebaseConfig = {
    apiKey: '<?php echo APIKEY_FIREBASE; ?>',
    authDomain: '<?php echo AUTHDOMAIN_FIREBASE; ?>',
    projectId: '<?php echo PROJECTID_FIREBASE; ?>',
    databaseURL: '<?php echo DATABASE_URL_FIREBASE; ?>',
    storageBucket: '<?php echo STORAGE_BUCKET_FIREBASE; ?>',
    messagingSenderId: '<?php echo MESSAGING_SENDER_ID_FIREBASE; ?>',
    appId: '<?php echo APP_ID_FIREBASE; ?>',
    measurementId: '<?php echo MEASUREMENT_ID_FIREBASE; ?>'
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
firebase.analytics();

let oldCookie = getCookie('__dvc');
const messaging = firebase.messaging();
if ("serviceWorker" in navigator) {
    navigator.serviceWorker
        .register("./firebase-messaging-sw.js")
        .then(function(registration) {
            messaging.getToken({
                    vapidKey: '<?php echo VAPID_KEY_FIREBASE; ?>',
                    serviceWorkerRegistration: registration
                })
                .then((currentToken) => {
                    if (currentToken) {
                        if (currentToken != oldCookie) {
                            setCookie('__dvc', currentToken, '365');
                        }

                    } else {
                        console.log('No registration token available. Request permission to generate one.');
                    }
                }).catch((err) => {
                    console.log('An error occurred while retrieving token. ', err);
                });
        })
        .catch(function(err) {
            console.log("Service worker registration failed, error:", err);
        });
}
</script>
<!-- END Config firebase -->

<!-- CONFIG FB -->
<script>
window.fbAsyncInit = function() {
    FB.init({
        appId: '<?php echo APP_ID_FB; ?>',
        cookie: true,
        xfbml: true,
        version: 'v1.0'
    });

    FB.AppEvents.logPageView();

};

(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function checkLoginState() {
    console.log('login');
    FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
    });
}

function statusChangeCallback(response) {
    if (response.status === 'connected') {
        let accessTokenFB = response.authResponse.accessToken;
        let socialId = response.authResponse.userID;
        FB.api('/me?fields=id,name,email', function(response) {
            type = 1;
            //Call API login
            $.ajax({
                url: '/vi/loginSocial',
                type: 'post',
                dataType: 'json',
                data: {
                    'type': type,
                    'socialId': socialId,
                    'accessToken': accessTokenFB
                },
                success: function(res) {
                    if (res.success) {
                        if (res.status == 501 || res.status == 201) {
                            window.location.href = "/xac-thuc-so-dien-thoai";
                        } else if (res.status == 200) {
                            window.location.href = "/thong-tin-tai-khoan";
                        } else if (res.status == -1) {
                            openNav();
                            $(".form-add-phone-ext").append(
                                '<input id="socialId" name="socialId" value="' + socialId +
                                '" type="hidden" />');
                            $(".form-add-phone-ext").append(
                                '<input id="accessToken" name="accessToken" value="' +
                                accessTokenFB + '" type="hidden" />');
                            $(".form-add-phone-ext").append(
                                '<input name="socialType" id="socialType" value="1" type="hidden" />'
                            );
                        } else {
                            $(".err_phone").html(res.data_message);
                            window.location.href = '/dang-nhap';
                        }
                    } else {
                        if (res.status == 211) {
                            openModal(res.data_message, 5000)
                        } else {
                            $(".err_phone").html(res.data_message);
                            window.location.href('/dang-nhap');
                        }
                    }
                },
                error: function(res) {
                    $(".err_phone").html(res.data_message);
                    window.location.href('/dang-nhap');
                }
            });
        });
    } else {
        // The person is not logged into your app or we are unable to tell.
        //document.getElementById('status').innerHTML = 'Please log ' +
        // 'into this app.';
    }
}
</script>
<!-- END CONFIG FB -->


</body>

</html>
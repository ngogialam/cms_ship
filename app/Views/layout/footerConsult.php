
</main>
<!--==========================
    Footer
  ============================-->
<div class="footer footerConsult">

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
</body>

</html>
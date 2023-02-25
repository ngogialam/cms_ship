$(document).ready(function() {

    //Hover why choose holaship
    $(".why1").hover(function() {
        $('.srim1').css("background-color", "#885DE5");
        $('.srti1').css("color", "#885DE5");
        $('.srim2').css("background-color", "#F0A616");
        $('.srti2').css("color", "#F0A616");
        $('.srim3').css("background-color", "#F0A616");
        $('.srti3').css("color", "#F0A616");
        $('.hm-svc-img2').css("display", "none");
        $('.hm-svc-img1').css("display", "block");
        $('.hm-svc-img3').css("display", "none");
    });

    $(".why2").mouseover(function() {
        $('.srim2').css("background-color", "#885DE5");
        $('.srti2').css("color", "#885DE5");
        $('.srim1').css("background-color", "#F0A616");
        $('.srti1').css("color", "#F0A616");
        $('.srim3').css("background-color", "#F0A616");
        $('.srti3').css("color", "#F0A616");
        $('.hm-svc-img1').css("display", "none");
        $('.hm-svc-img2').css("display", "block");
        $('.hm-svc-img3').css("display", "none");
    });
    $(".why3").mouseover(function() {
        $('.srim3').css("background-color", "#885DE5");
        $('.srti3').css("color", "#885DE5");
        $('.srim1').css("background-color", "#F0A616");
        $('.srti1').css("color", "#F0A616");
        $('.srim2').css("background-color", "#F0A616");
        $('.srti2').css("color", "#F0A616");
        $('.hm-svc-img2').css("display", "none");
        $('.hm-svc-img1').css("display", "none");
        $('.hm-svc-img3').css("display", "block");
    });
    $('body').on('change', ".phoneForgot", function() {
        var phone = $('.phoneForgot').val();
        $('.err_passwordForgot').html('');
    });
    $('body').on('click', ".btnSearchOrder", function() {
        var searchOrders = $('#searchOrders').val();
        if(searchOrders != ''){
            var searchHtml = '?searchOrders=' + searchOrders;
            window.location.href = "/tra-cuu-hanh-trinh-don-hang"+searchHtml;
        }else{
            $('#searchOrders').attr('placeholder','Bạn chưa nhập mã đơn hàng');
        }
    });
    $('body').on('click', ".btnSearchOrderSignin", function() {
        var searchOrders = $('#searchOrders').val();
        if(searchOrders != ''){
            var searchHtml = '?searchOrders=' + searchOrders;
            window.location.href = "/tra-cuu-hanh-trinh-don"+searchHtml;
        }else{
            $('#searchOrders').attr('placeholder','Bạn chưa nhập mã đơn hàng');
        }
    });

    //Check re password
    $("#repassword").keyup(function() {
        var password = $("#password").val();
        $(".err_repassword").html(password == $(this).val() ? "" : "Nhập lại mật khẩu không khớp");
    });
    //Call countdown time
    countDownTimer(30);

    //Hover dropdown App
    $(".dropdownapptest").hover(
        function() {
            $(".downloadapp").addClass('show');
        },
        function() {
            $(".downloadapp").removeClass('show');
        }
    );
    //Hover Home DropdownNoti
    $(".dropnoti").hover(
        function() {
            $(".notiMess").addClass('show');
        },
        function() {
            $(".notiMess").removeClass('show');
        }
    );


    // Slide home partner
    $("#owl-partners-introduce2").owlCarousel({
        rtl: true,
        loop: true,
        stagePadding: 10,
        margin: 48,
        autoplay: false,
        smartSpeed: 200,
        autoplaySpeed: 1500,
        autoplayHoverPause: true,
        nav: true,
        dots: false,
        responsive: {
            200: {
                items: 3
            },
            400: {
                items: 3
            },
            600: {
                items: 6
            },
            1000: {
                items: 6
            },
            1200: {
                items: 6
            }
        }
    });
    $("#owl-partners-introduce2-home").owlCarousel({
        rtl: true,
        loop: true,
        stagePadding: 10,
        margin: 48,
        autoplay: true,
        smartSpeed: 200,
        autoplaySpeed: 1500,
        autoplayHoverPause: true,
        nav: true,
        dots: false,
        responsive: {
            200: {
                items: 3
            },
            400: {
                items: 3
            },
            600: {
                items: 6
            },
            1000: {
                items: 6
            },
            1200: {
                items: 6
            }
        }
    });

    //Function search Order
});
function openNav() {
    document.getElementById("mySidenavbar").style.width = "100%";
}

function closeNav() {
    document.getElementById("mySidenavbar").style.width = "0%";
}

function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function eraseCookie(name) {
    document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

function showServiceHome() {
    $(".home-show").hide("slow");
    $(".home-none").show("slow");
}

function noneServiceHome() {
    $(".home-show").show("slow");
    $(".home-none").hide("slow");
}


$(document).ready(function() {
    var scrollTop = 0;
    $(window).scroll(function() {
        scrollTop = $(window).scrollTop();
        $('.counter').html(scrollTop);

        if (scrollTop >= 150) {
            $('#topbar').addClass('scrolled-nav');
            $('#topbar').css('margin-top', -69);

        } else {
            $('#topbar').removeClass('scrolled-nav');
        }

    });

});
// $('body').on('keyup', '#searchOrders', function(e) {
//     var key=e.keyCode || e.which;
//     alert(key);
//     if (key==13){
//         alert('123');
//         var searchOrders = $('#searchOrders').val();
//         console.log(searchOrders)
//         e.preventdefault()
//         if(searchOrders != ''){
//             var searchHtml = '?searchOrders=' + searchOrders;
//             window.location.href = "/tra-cuu-hanh-trinh-don-hang"+searchHtml;
//         }else{
//             $('.searchOrders').attr('placeholder','Bạn chưa nhập mã đơn hàng');
//         }
//     }
// });

$('body').on('keyup', '#searchOrders', function(e) {
    var key=e.keyCode || e.which;
    var checkSignIn =  $('.signInCheck').val();
    if (key==13){
        var searchOrders = $('#searchOrders').val();
        if(searchOrders != ''){
            var searchHtml = '?searchOrders=' + searchOrders;
            if(checkSignIn == 1){
                window.location.href = "/tra-cuu-hanh-trinh-don"+searchHtml;
            }else{
                window.location.href = "/tra-cuu-hanh-trinh-don-hang"+searchHtml;
            }
        }else{
            $('#searchOrders').attr('placeholder','Bạn chưa nhập mã đơn hàng');
        }
    }
});
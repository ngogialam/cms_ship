$(document).ready(function() {
    //Check re password
    // $("#repassword").keyup(function() {
    //     var password = $("#password").val();
    //     $(".err_repassword").html(password == $(this).val() ? "" : "Mật khẩu không khớp");
    // });

    //Validate Phone Social Login
    $('body').on('change', "#addPhoneInput", function() {
        var phone = $('#addPhoneInput').val();
        var checkPhoneValidate = validatePhone(phone);
        if (phone == '') {
            $('.err_phone').html('Số điện thoại không được để trống');
        } else if (!checkPhoneValidate) {
            $('.err_phone').html('Số điện thoại sai định dạng');
        } else {
            $('.err_phone').html('');
        }
    });
    $('body').on('change', ".userPhone", function() {
        var phone = $('.userPhone').val();
        console.log(phone)
        var checkPhoneValidate = validatePhone(phone);
        if (phone == '') {
            $('.err_phone').html('Số điện thoại không được để trống');
        } else if (!checkPhoneValidate) {
            $('.err_phone').html('Số điện thoại sai định dạng');
        } else {
            $('.err_phone').html('');
        }
    });
    $('body').on('change', ".validatePass", function() {
        var password = $('.validatePass').val();
        const re = /^(?=.{8,15}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/;
        test = re.test(password);
        if (password == '') {
            $('.err_password').html('Mật khẩu không được để trống');
        } else if (test == false) {
            $('.err_password').html('Mật khẩu từ 8 - 15 ký tự và phải có ít nhất 1 ký tự đặc biệt, in hoa, chữ thường, ký tự số.');

        }
    });

    $('body').on('click', "#addPhone", function() {
        phone = $('#addPhoneInput').val();
        socialId = $('#socialId').val();
        accessToken = $('#accessToken').val();
        type = $('#socialType').val()
        error = 0;
        var checkPhoneValidate = validatePhone(phone);
        if (phone == '') {
            $('.err_phone').html('Số điện thoại không được để trống');
            error = 1;
        } else if (!checkPhoneValidate) {
            $('.err_phone').html('Số điện thoại sai định dạng');
            error = 1;
        } else {
            $('.err_phone').html('');
        }
        if (error == 0) {
            $.ajax({
                url: '/vi/loginSocial',
                type: 'post',
                dataType: 'json',
                data: { 'type': type, 'socialId': socialId, 'accessToken': accessToken, 'phone': phone },
                success: function(res) {
                    // console.log(res)
                    if (res.success) {
                        if (res.status == 501 || res.status == 201) {
                            window.location.href = "/xac-thuc-so-dien-thoai?phone=" + res.phone;
                        } else if (res.status == 200) {
                            window.location.href = "/";
                        } else if (res.status == -1) {
                            openNav();
                            $(".form-add-phone-ext").append('<input id="socialId" name="socialId" value="' + socialId + '" type="hidden" />');
                            $(".form-add-phone-ext").append('<input id="accessToken" name="accessToken" value="' + accessToken + '" type="hidden" />');
                            $(".form-add-phone-ext").append('<input name="socialType" id="socialType" value="1" type="hidden" />');
                        } else {
                            closeNav();
                        }
                    } else {
                        // closeNav();
                        $(".err_phone").html(res.data_message);
                    }
                },
                error: function(res) {
                    $(".err_phone").html(res.data_message);
                }
            });
        }
    });

});

function validatePass(password, repassword) {
    if (password != repassword) {
        return 1;
    } else if (password == '') {
        return 2;
    } else if (password == '') {
        return 3;

    }
    return true;
}

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validatePhone(phone) {
    let number = phone;
    if (/(0[0])+([0-9]{9})\b/.test(number)) {
        return false;
    } else if (!/^[0-9]+$/.test(number)) {
        return false;
    } else if (!/(0[2|3|5|7|8|9])+([0-9]{8})\b|(\+84)+([0-9]{9})\b|(0[2])+([0-9]{9})\b/.test(number)) {
        return false;
    }
    return true;
}
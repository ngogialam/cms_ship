$(document).ready(function() { //Validate Account Info
    $('body').on('change', '.fullName', function() {
        fullName = $('.fullName').val();
        if (fullName.length == 0) {
            $('.err_fullName').html('Họ và tên đầy đủ không được để trống');
        } else if (fullName.length < 4) {
            $('.err_fullName').html('Họ và tên không hợp lệ');
        } else {
            $('.err_fullName').html('');
        }
    });
    $('body').on('change', '.company', function() {
        company = $('.company').val();
        if (company.length == 0) {
            $('.err_shopName').html('Tên cửa hàng không được để trống');
        } else {
            $('.err_shopName').html('');
        }
    });

    $('body').on('change', '.email', function() {
        email = $('.email').val();
        checkEmail = validateEmail(email);
        if (email.length == 0) {
            $('.err_email').html('Email không được để trống');
        } else if (checkEmail == false) {
            $('.err_email').html('Email không hợp lệ');
        } else {
            $('.err_email').html('');
        }
    });
    $('body').on('change', '.address', function() {
        address = $('.address').val();
        if (address.length == 0) {
            $('.err_address').html('Địa chỉ chi tiết không được để trống');
        } else {
            $('.err_address').html('');
        }
    });
    $('body').on('change', '.userIdContract', function() {
        userIdContract = $('.userIdContract').val();
        if (userIdContract == 0) {
            $('.errUserIdContract').html('Vui lòng chọn khách hàng.');
        } else {
            $('.errUserIdContract').html('');
        }
    });
    $('body').on('change', '.dob', function() {
        dob = $('.dob').val();
        if (dob.length == 0) {
            $('.err_dob').html('Ngày sinh không được để trống');
        } else {
            $('.err_dob').html('');
        }
    });
    $('body').on('change', '.sex', function() {
        sex = $('.sex').val();
        if (sex.length == 0) {
            $('.err_sex').html('Giới tính không được để trống');
        } else {
            $('.err_sex').html('');
        }
    });

    $('body').on('change', '.ward_code_from', function() {
        ward_code_from = $('.ward_code_from').val();
        if (ward_code_from.length == 0) {
            $('.err_ward').html('Phường/Xã không được để trống');
        } else {
            $('.err_ward').html('');
        }
    });

    $('body').on('change', '.cid', function() {
        cid = $('.cid').val();
        if (cid.length == 0) {
            $('.err_cid').html('Số căn cước/CMND không được để trống');
        } else if (cid.length < 9) {
            $('.err_cid').html('Số căn cước/CMND không hợp lệ');
        } else if (cid.length > 12) {
            $('.err_cid').html('Số căn cước/CMND không hợp lệ');
        } else {
            $('.err_cid').html('');
        }
    });

    $('body').on('change', '.cidDate', function() {
        cidDate = $('.cidDate').val();
        if (cidDate.length == 0) {
            $('.err_cidDate').html('Ngày cấp không được để trống');
        } else {
            $('.err_cidDate').html('');
        }
    });

    $('body').on('change', '.cidPlace', function() {
        cidPlace = $('.cidPlace').val();
        if (cidPlace.length == 0) {
            $('.err_cidPlace').html('Nơi cấp không được để trống');
        } else {
            $('.err_cidPlace').html('');
        }
    });

    //Warehouse Validate
    $('body').on('blur', '.warehouseName', function() {
        warehouseName = $('.warehouseName').val();
        if (warehouseName.length == 0) {
            $('.err_warehouseName').html('Tên kho hàng không được để trống');
        } else {
            $('.err_warehouseName').html('');
        }
    });
    $('body').on('blur', '.senderName', function() {
        senderName = $('.senderName').val();
        if (senderName.length == 0) {
            $('.err_senderName').html('Đầu mối liên hệ lấy hàng không được để trống');
        } else if (senderName.length < 1) {
            $('.err_senderName').html('Đầu mối liên hệ lấy hàng không hợp lệ');
        } else {
            $('.err_senderName').html('');
        }
    });

    $('body').on('blur', '.senderPhone', function() {
        senderPhone = $('.senderPhone').val();
        // console.log(   senderPhone)
        if (senderPhone == '') {
            $('.err_senderPhone').html('Số điện thoại không được bỏ trống');
        } else {
            checkSenderPhone = validatePhone(senderPhone);
            if (!checkSenderPhone) {
                $('.err_senderPhone').html('Số điện thoại không hợp lệ');
            } else {
                $('.err_senderPhone').html('');
            }
        }
    });
    $('body').on('blur', '.addressWarehouse', function() {
        addressWarehouse = $('.addressWarehouse').val();
        if (addressWarehouse.length == 0) {
            $('.err_addressWarehouse').html('Địa chỉ chi tiết không được để trống');
        } else {
            $('.err_addressWarehouse').html('');
        }
    });

    $('body').on('change', '.bankCode', function() {
        bankCode = $('.bankCode').val();
        if (bankCode.length == 0) {
            $('.err_bankCode').html('Ngân hàng không được để trống');
        } else {
            $('.err_bankCode').html('');
        }
    });

    $('body').on('blur', '.accountName', function(e) {
        accountName = $('.accountName').val();
        unUnicode = removeAccents(accountName);
        if (accountName.length == 0) {
            $('.err_accountName').html('Tên chủ tài khoản không được để trống');
        } else if (accountName.length < 4) {
            $('.err_accountName').html('Tên chủ tài khoản không hợp lệ');
        } else {
            $('.err_accountName').html('');
        }
        $('.accountName').val(unUnicode);
    });
    $('body').on('blur', '.accountNumber', function() {
        accountNumber = $('.accountNumber').val();
        if (accountNumber.length == 0) {
            $('.err_accountNumber').html('Vui lòng nhập số tài khoản/ số thẻ');
        } else if (accountNumber.length < 1 || accountNumber.length > 20) {
            $('.err_accountNumber').html(' Số tài khoản/số thẻ không hợp lệ');
        } else {
            $('.err_accountNumber').html('');
        }
    });

    //Rút tiền
    $('body').on('blur', '.NumberWithDraw', function() {
        NumberWithDraw = parseInt($('.NumberWithDraw').val().replace(/\,/g, ''), 10);
        remainBalance = parseInt($('.remainBalance').val(), 10);
        if (digits_count(NumberWithDraw) == 0) {
            $('.err_NumberWithDraw').html('Vui lòng nhập số tiền muốn rút');
        } else if (remainBalance < NumberWithDraw) {
            $('.err_NumberWithDraw').html('Số tiền muốn rút vượt quá số dư có thể rút');
        } else {
            $('.err_NumberWithDraw').html('');
        }
    });
    $('body').on('click', '.AccountNumber', function() {
        AccountNumber = $('input[name="bankId"]:checked').val();
        if (AccountNumber.length == 0) {
            $('.err_AccountNumber').html('Vui lòng nhập số tiền muốn rút');
        } else {
            $('.err_AccountNumber').html('');
        }
    });
    $('body').on('click', ".btnSearchOrder", function() {
        var searchOrders = $('.searchOrders').val();
        if(searchOrders != ''){
            var searchHtml = '?searchOrders=' + searchOrders;
            window.location.href = "/tra-cuu-hanh-trinh-don"+searchHtml;
        }else{
            $('.searchOrders').attr('placeholder','Bạn chưa nhập mã đơn hàng');
        }
    });
    $('body').on('change', ".checkCustomer-user", function() {
        contractType = $('input[name=contractType]:checked').val();
        if(contractType == 2){  
            $('.personalContract').fadeOut();
            $('.businessContract').fadeIn();
        }else{
            $('.personalContract').fadeIn();
            $('.businessContract').fadeOut();
        }
    });
    
    //Check contract
    $('body').on('blur', ".companyName", function() {
        companyName = $('.companyName').val();
        if(companyName == '' || typeof companyName == 'undefined'){
            $('.err_companyName').html('Tên công ty không được để trống');
        }else{
            $('.err_companyName').html('');
        }
        
    });
    $('body').on('blur', ".representative", function() {
        representative = $('.representative').val();
        if(representative == '' || typeof representative == 'undefined'){
            $('.err_representative').html('Tên đại diện không được để trống');
        }else{
            $('.err_representative').html('');
        }
        
    });
    $('body').on('blur', ".businessPosition", function() {
        businessPosition = $('.businessPosition').val();
        if(businessPosition == '' || typeof businessPosition == 'undefined'){
            $('.err_businessPosition').html('Vị trí không được để trống');
        }else{
            $('.err_businessPosition').html('');
        }
        
    });
    $('body').on('blur', ".addressByBR", function() {
        addressByBR = $('.addressByBR').val();
        if(addressByBR == '' || typeof addressByBR == 'undefined'){
            $('.err_addressByBR').html('Địa chỉ không được để trống');
        }else{
            $('.err_addressByBR').html('');
        }
        
    });
    $('body').on('blur', ".bsPhone", function() {
        bsPhone = $('.bsPhone').val();
        if(bsPhone == '' || typeof bsPhone == 'undefined'){
            $('.err_bsPhone').html('Điện thoại không được để trống');
        }else{
            $('.err_bsPhone').html('');
        }
        
    });
    $('body').on('blur', ".bsTax", function() {
        bsTax = $('.bsTax').val();
        if(bsTax == '' || typeof bsTax == 'undefined'){
            $('.err_bsTax').html('Mã số thuế không được để trống');
        }else{
            $('.err_bsTax').html('');
        }
        
    });
    // $('body').on('click', ".choseListBank", function() {
        // $('.choosenPickup').toggle();
    // });
    // $('body').on('click', ".chooseBankFastNew", function() {
    //     $('.choosenPickup').toggle();
    // });
});
function updateAccountInfo(){
    contractType = $('input[name=contractType]:checked').val();
    console.log(contractType)
    err = 0;
    if(contractType == 1){
        companyName = $('.companyName').val();
        if(companyName == '' || typeof companyName == 'undefined'){
            $('.err_companyName').html('Tên công ty không được để trống');
            err = 1;
        }
        representative = $('.representative').val();
        if(representative == '' || typeof representative == 'undefined'){
            $('.err_representative').html('Tên đại diện không được để trống');
            err = 1;
        }
        businessPosition = $('.businessPosition').val();
        if(businessPosition == '' || typeof businessPosition == 'undefined'){
            $('.err_businessPosition').html('Vị trí không được để trống');
            err = 1;
        }
        businessAuthority = $('.businessAuthority').val();
        if(businessAuthority == '' || typeof businessAuthority == 'undefined'){
            $('.err_businessAuthority').html('Ủy quyền không được để trống');
            err = 1;
        }
        addressByBR = $('.addressByBR').val();
        if(addressByBR == '' || typeof addressByBR == 'undefined'){
            $('.err_addressByBR').html('Địa chỉ không được để trống');
            err = 1;
        }
        bsPhone = $('.bsPhone').val();
        if(bsPhone == '' || typeof bsPhone == 'undefined'){
            $('.err_bsPhone').html('Điện thoại không được để trống');
            err = 1;
        }
        bsTax = $('.bsTax').val();
        if(bsTax == '' || typeof bsTax == 'undefined'){
            $('.err_bsTax').html('Mã số thuế không được để trống');
            err = 1;
        }
        bsFax = $('.bsFax').val();
        if(bsFax == '' || typeof bsFax == 'undefined'){
            $('.err_bsFax').html('Fax không được để trống');
            err = 1;
        }
        var fd = new FormData();
        var files = $('#frontBsRegis')[0].files;
        console.log(files[0])
        if(files.length > 0 ){
            fd.append('file',files[0]);
        }
        console.log(fd)
        // if(err == 0){
        //     var fd = new FormData();
        //     var files = $('.frontBsRegis')[0].files;
        //     if(files.length > 0 ){
        //         fd.append('file',files[0]);
        //     }
        //     console.log(fd)
        // }
    }else{

    }

}


var loadFile = function(event, idName = '', classErr = '', check = 0) {
    var img = event.target.files[0];
    console.log(img)
    let allowedExtension = ['image/jpeg', 'image/jpg','image/png'];
    type = img.type;
    size = img.size;
    validate = 0;

    if(allowedExtension.indexOf(img.type) < 0){
        validate = 1;
    }
    // else if(size > 2097152){
    //     validate = 2;
    // }
    if(validate == 0 && check == 0){
        var output = document.getElementById(idName);
        $(output).removeClass("w-100");
        $(output).width("100");
        output.src = URL.createObjectURL(event.target.files[0]);
        console.log(output.src);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    }else if(validate == 1){
        $('.'+classErr).html('Chỉ cho phép chọn định dạng ảnh: jpg, jpeg, png.')
    }else if(validate == 2){
        $('.'+classErr).html('Ảnh vượt quá dung lượng tối đa 2 MB.')
    }
  };

function uploadImgJs(event, classErr = '', classAppend = '', check = 0, typeContract = 2, idName = '', classSrc = 0){
    // typeContract = 1: Cá nhân
    // typeContract = 2: Doanh nghiệp
    var img = event.target.files[0];
    let allowedExtension = ['image/jpeg', 'image/jpg','image/png'];
    type = img.type;
    size = img.size;
    validate = 0;

    if(allowedExtension.indexOf(img.type) < 0){
        validate = 1;
    }
    $('#loader').addClass('show');
    // else if(size > 2097152){
    //     validate = 2;
    // }
    let checkID = $(".inputImgBs").length;
    if(checkID < 2 || typeContract == 1){
        if(validate == 0 && check == 0){
            var myFormData = new FormData();
                myFormData.append('file', img);
                $.ajax({
                    url: "/vi/uploadImgs", 
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: myFormData, 
                    type: 'post',
                    success: function(res) {
                      if(res.success){
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            // $($.parseHTML('<img>')).attr('src', event.target.result).width("100").css('margin-right', '15px').css('margin-bottom', '15px').appendTo(idName);
                            if(typeContract == 2){
                                var html = '<div class="wrapImgAppend wrapImgAppend_'+checkID+'"> <span class="spanClose" onclick="removeImgAppend('+checkID+')" >x</span> <img class="imgAppend inputImgBs_'+checkID+'" src="'+event.target.result+'" alt=""> <input type="hidden" class="inputImgBs inputImgBs_'+checkID+'" value="'+res.data+'" name="inputImg[]"> </div>'
                                $('.checkImg').val(1)
                                $('.'+classAppend).append(html);
                            }else if(typeContract == 1){
                                var output = document.getElementById(idName);
                                $(output).removeClass("w-100");
                                $(output).width("100");
                                $('#'+idName).on("load", function() {
                                }).attr("src", res.srcImg);
                                $('.'+classSrc).val(res.srcValue)
                            }
                            $('#loader').removeClass('show');
                        }
                        reader.readAsDataURL(img);
                      }else{
                          $('#loader').removeClass('show');
                          $('.err_frontBsRegisErr').html(res.data)
                      }
                    },
                    error: function(res) {
                        alert('Lỗi khi tải ảnh. Vui lòng liên hệ admin.')
                        $('#loader').removeClass('show');
                    }
                });
        }else if(validate == 1){
            $('.'+classErr).html('Chỉ cho phép chọn định dạng ảnh: jpg, jpeg, png.')
            $('#loader').removeClass('show');
        }
        // else if(validate == 2){
        //     $('.'+classErr).html('Ảnh vượt quá dung lượng tối đa 2 MB.')
        // }
    }else{
        $('.'+classErr).html('Tải tối đa 2 ảnh.')
    }
    
}
function removeImgAppend(idAppend){
    $('.wrapImgAppend_'+idAppend).remove();
}

function removeAccents(str) {
    var AccentsMap = [
        "aàảãáạăằẳẵắặâầẩẫấậ",
        "AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬ",
        "dđ", "DĐ",
        "eèẻẽéẹêềểễếệ",
        "EÈẺẼÉẸÊỀỂỄẾỆ",
        "iìỉĩíị",
        "IÌỈĨÍỊ",
        "oòỏõóọôồổỗốộơờởỡớợ",
        "OÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢ",
        "uùủũúụưừửữứự",
        "UÙỦŨÚỤƯỪỬỮỨỰ",
        "yỳỷỹýỵ",
        "YỲỶỸÝỴ"
    ];
    for (var i = 0; i < AccentsMap.length; i++) {
        var re = new RegExp('[' + AccentsMap[i].substr(1) + ']', 'g');
        var char = AccentsMap[i][0];
        str = str.replace(re, char);
    }
    return str;
}

function generateZeroNumber(amount, number) {
    let min = 5;
    let max = 8;
    let multiZeroMin = parseInt(min) - parseInt(number);
    let multiZeroMax = parseInt(max) - parseInt(number);
    let arrayHintAmount = [];
    let j = 1;
    if ((max - number) >= 0) {
        for (i = multiZeroMin; i <= multiZeroMax; i++) {
            for (k = 0; k <= (i); k++) {
                j += '0';
            }
            thousand = parseInt(amount) * parseInt(j);
            let format = String(thousand).replace(/(.)(?=(\d{3})+$)/g, '$1,');
            arrayHintAmount.push(format);
            if (i < 0) {
                arrayHintAmount.splice(0);
            }
            j = 1
        }
    }
    return arrayHintAmount;
}

function digits_count(n) {
    var count = 0;
    if (n >= 1) ++count;

    while (n / 10 >= 1) {
        n /= 10;
        ++count;
    }
    return count;
}

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
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

function clickAddImage() {
    document.getElementById('imageFile').click();
}

var typingTimer; //timer identifier
var doneTypingInterval = 500; //time in ms, 5 second for example
function generateNumberAmount() {
    NumberWithDraw = parseInt($('.NumberWithDraw').val());
    length = digits_count(NumberWithDraw);
    clearTimeout(typingTimer);
    if (NumberWithDraw) {
        typingTimer = setTimeout(function() {
            //do stuff here e.g ajax call etc....
            NumberWithDraw = String(NumberWithDraw).replace(/(.)(?=(\d{3})+$)/g, '$1,');;
            if (NumberWithDraw != 'NaN') {
                $('#NumberWithDraw').val(NumberWithDraw)
            }
        }, doneTypingInterval);
    }
    // autocomplete(document.getElementById("NumberWithDraw"), amountHint);
}

function chooseFile() {
    document.getElementById("chooseFile").click();
}

function change(e) {
    const image = event.target.files[0];
    document.getElementById('chooseFileOK').value = event.target.files[0].name
    const reader = new FileReader();
    reader.readAsDataURL(image);
    reader.onload = (e) => {
        this.avatarDefault = e.target.result;
    };
}

function ordersError() {
    //Nút đơn lỗi => chuyển qua màu đỏ
    document.getElementById("qo-doi-mau-red").style.border = "0.5px solid #D46F6F";
    document.getElementById("qo-doi-mau-red").style.color = "#D46F6F";
    document.getElementById("qo-doi-mau-vang").style.border = "0.5px solid #D8D8D8";
    document.getElementById("qo-doi-mau-vang").style.color = "#8D869D";

}

function ordersDoubts() {
    //Nút đơn nghi vấn => chuyển qua màu vàng
    document.getElementById("qo-doi-mau-vang").style.border = "0.5px solid #F0A616";
    document.getElementById("qo-doi-mau-vang").style.color = "#F0A616";
    document.getElementById("qo-doi-mau-red").style.border = "0.5px solid #D8D8D8"
    document.getElementById("qo-doi-mau-red").style.color = "#8D869D";

}
function btnDefau() {
    document.getElementById("qo-doi-mau-vang").style.border = "0.5px solid #D8D8D8";
    document.getElementById("qo-doi-mau-vang").style.color = "#8D869D";
    document.getElementById("qo-doi-mau-red").style.border = "0.5px solid #D8D8D8"
    document.getElementById("qo-doi-mau-red").style.color = "#8D869D";

}

// =========Tắt  hiển thị chỉnh sửa================ 
function outEdit(a, b) {
    document.getElementsByClassName(a)[0].style.display = "none";
    document.getElementById(b).style.display = "flex";
}
function showInfoConfirm(id, images) {
    document.getElementById(id).style.display = "flex";
    document.getElementsByClassName(images)[0].style.display = "none";
    document.getElementsByClassName(images + 'a')[0].style.display = "block";

}

function defaultInfoConfirm(id, images) {
    console.log(images)
    document.getElementById(id).style.display = "none";
    document.getElementsByClassName(images)[0].style.display = "block";
    document.getElementsByClassName(images + 'a')[0].style.display = "none";

}

//Ẩn thông tin hàng hóa
function noneInfo(a, b) {
    document.getElementById(a + 'a').style.display = "none";
    document.getElementById(a).style.display = "inline";
    document.getElementById(b).style.display = "none";
}
//Xóa thông tin 1 cột hàng hóa
function deleteRowInfo(a) {
    document.getElementById(a).remove();
}

//lấy thông tin hàng hóa hiển thị lên thẻ input
function editDetailOrders(ten, sl, lh, cod, kg, tenht, slht, lhht, codht, kght, thh, shh) {
    document.getElementById(thh).style.display = "none";
    document.getElementById(shh).style.display = "block";
    // Lấy thông tin đơn hàng
    var a = document.getElementById(ten).innerHTML;
    var b = document.getElementById(sl).innerHTML;
    var c = document.getElementById(lh).innerHTML;
    var d = document.getElementById(cod).innerHTML;
    var e = document.getElementById(kg).innerHTML;

    //Đưa vào thẻ input để sửa
    document.getElementById(tenht).value = a;
    document.getElementById(slht).value = b;
    document.getElementById(lhht).value = c;
    document.getElementById(codht).value = d;
    document.getElementById(kght).value = e;
}

var display = true;

function banner() {
    if (display) {
        $("#element-none").show("fast");
        $("#element-none1").show("fast");
        $("#element-none2").show("fast");
        display = false
    } else {
        $("#element-none").hide("fast");
        $("#element-none1").hide("fast");
        $("#element-none2").hide("fast");
        display = true
    }
}


var widthPage = $(window).width();
if (widthPage > 992) {
    var avatar = true;
} else {
    var avatar = false;
}

function showAvatar() {
    if (avatar) {
        $("#avatar-navbar").css("display", "block");
        avatar = false
    } else {
        $("#avatar-navbar").css("display", "none");
        avatar = true;
    }
}

function addBanksContract(){
    var bankCode = $('.bankCode ') .val();
    var accountName = $('.accountName').val();
    var accountNumber = $('.accountNumber').val();
    var accountNoType = $('input[name=accountNoType]:checked').val();
    err = 0;
    if (accountNumber.length == 0) {
        $('.err_accountNumber').html('Vui lòng nhập số tài khoản/ số thẻ');
        err = 1;
    } else if (accountNumber.length < 1 || accountNumber.length > 20) {
        $('.err_accountNumber').html(' Số tài khoản/số thẻ không hợp lệ');
        err = 1;
    } else {
        $('.err_accountNumber').html('');
        err = 0;
    }

    unUnicode = removeAccents(accountName);
    if (accountName.length == 0) {
        $('.err_accountName').html('Tên chủ tài khoản không được để trống');
        err = 1;
    } else if (accountName.length < 4) {
        $('.err_accountName').html('Tên chủ tài khoản không hợp lệ');
        err = 1;
    } else {
        $('.err_accountName').html('');
        err = 0;
    }
    
    if(bankCode == 0){
        $('.err_bankCode').html('Bạn chưa chọn ngân hàng');
        err = 1;
    }

    if(err == 0){
        $.ajax({
            url: '/vi/addBanksContract',
            type: 'post',
            dataType: 'json',
            data: { 
                'bankCode': bankCode,
                'accountName': accountName,
                'accountNumber': accountNumber,
                'accountNoType': accountNoType,
             },
            success: function(res) {
                if (res.status == 200) {
                    $('.appendBankNew').append(res.dataHtml);
                    $('.err_allMess').html(res.data);
                    setTimeout(function() {
                        $('#addBanks').modal('hide');
                    }, 3000);
                } else {
                    $('.err_allMess').html(res.data);
                }
            },
            error: function(res) {
                $('.err_allMess').html(res);
            }
        });
    }
}

function changeBanks(bankId, bankName, bankImg, bankAccount){
    err = 0;
    if(bankId == '' || bankId == '0'){
        err = 1;
    }
    if(bankName == '' || bankName == '0'){
        err = 1;
    }
    if(bankImg == '' || bankImg == '0'){
        err = 1;
    }
    if(err == 0){
        var bankNameNew = bankName + ' ' + bankAccount;
        $(".bankLogo").attr("src",bankImg);
        $('.chooseBankFastNew ').val(bankNameNew);
        $('.bankIdchosen ').val(bankId);
    }
}


$('.imgSignature').on( 'change', function(event){
    var imgSignatureType = $('.imgSignatureType').val();

    var canvas  = $("#canvas"),
        context = canvas.get(0).getContext("2d"),
        $result = $('.imgSignaturePreview');
    if (this.files && this.files[0]) {
        
      if ( this.files[0].type.match(/^image\//) ) {
        var typeImage = this.files[0].type;
        console.log(typeImage)
        $('.typeImage').val(typeImage);
        var reader = new FileReader();
        reader.onload = function(evt) {
           var img = new Image();
           img.onload = function() {
             context.canvas.height = img.height;
             context.canvas.width  = img.width;
             context.drawImage(img, 0, 0);
            var image = document.querySelector('#canvas');
            var cropper = new Cropper(image, {
                dragMode: 'move',
                aspectRatio: 16 / 9, 
                viewMode: 1,
                autoCropArea: 0.65,
                restore: false,
                guides: false,
                center: false,
                highlight: false,
                cropBoxMovable: false,
                cropBoxResizable: false,
                toggleDragModeOnDblclick: false,
              });
              
            $('#btnReset').click(function() {
                $('#crop').cropper('destroy');
            });
             $('.btnCrop').click(function() {
                // Get a string base 64 data url
                if(imgSignatureType == 0){
                    $('.btnUpdateContract').prop("disabled", false);
                    $('.btnUpdateContract').attr('onclick', 'submitUpdateContract()');
                    
                }else{
                    $('.btnImgSignature').prop("disabled", false);
                    $('.btnImgSignature').attr('onclick', 'submitSignature()');
                }

                var croppedImageDataURL = cropper.getCroppedCanvas().toDataURL();
                
                $result.css('width','300');
                $result.attr('src', croppedImageDataURL) ;
                $("#imgSignature").remove();
                document.getElementsByName("imgSignatureValue")[0].setAttribute("value", croppedImageDataURL);

                var imgSignatureUpload = event.target.files[0];
                var myFormData = new FormData();
                myFormData.append('file', imgSignatureUpload);
                $.ajax({
                    url: "/vi/uploadImgs", 
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: myFormData, 
                    type: 'post',
                    success: function(res) {
                      if(res.success){
                          console.log(res)
                          $('.imgSignaturePath').val(res.srcValue);
                      }else{
                          $('#loader').removeClass('show');
                          $('.err_frontBsRegisErr').html(res.data)
                      }
                    },
                    error: function(res) {
                        alert('Lỗi khi tải ảnh. Vui lòng liên hệ admin.')
                    }
                });
             });
             $('.btnZoomIn').click(function() {
                var croppedImageDataURL = cropper.zoom(0.2);
             });
             $('.btnZoomOut').click(function() {
                var croppedImageDataURL = cropper.zoom(-0.2);
             });
             
           };
           img.src = evt.target.result;
				};
        reader.readAsDataURL(this.files[0]);
      }
      else {
        alert("Invalid file type! Please select an image file.");
      }
    }
    else {
      alert('No file(s) selected.');
    }
});
function resetImg(){
       location.reload();
}
function submitSignature(){
    var imgSignaturePreview  = $('.imgSignaturePreview ').attr('src');
    var typeImage = $('.typeImage').val();
    var imgSignaturePath = $('.imgSignaturePath').val();
    var imgSignatureValue = $('.imgSignatureValue').val();
    $('#loader').addClass('show');
    $.ajax({
        url: '/vi/ky-xac-nhan',
        type: 'post',
        dataType: 'json',
        data: {
            'imgSignaturePreview': imgSignaturePreview,
            'typeImage': typeImage,
            'imgSignaturePath': imgSignaturePath,
        },
        success: function(res) {
            // alert('ok')
            window.location.href = res.href;
        },
        error: function(res) {
            location.reload();
            // alert('notok')
        }
    });
}
function submitUpdateContract(){
    var imgSignaturePath = $('.imgSignaturePath').val();
    var userIdContract = $('.userIdContract').val();
    var imgSignatureValue = $('.imgSignatureValue').val();
    console.log(userIdContract)
    if(userIdContract != 0){
        $('#loader').addClass('show');
        $.ajax({
            url: '/vi/cap-nhat-hop-dong-khach',
            type: 'post',
            dataType: 'json',
            data: {
                'imgSignaturePath': imgSignaturePath,
                'userIdContract': userIdContract,
                'imgSignatureValue': imgSignatureValue,
            },
            success: function(res) {
                // alert('ok')
                // window.location.href = res.href;
                location.reload();
            },
            error: function(res) {
                location.reload();
                // alert('notok')
            }
        });
    }else{
        $('.errUserIdContract').html('Vui lòng chọn khách hàng.')
    }
}

function downloadContract(url,fileName){
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.responseType = "blob";
    xhr.onload = function(){
        var urlCreator = window.URL || window.webkitURL;
        var imageUrl = urlCreator.createObjectURL(this.response);
        var tag = document.createElement('a');
        tag.href = imageUrl;
        tag.download = fileName;
        document.body.appendChild(tag);
        tag.click();
        document.body.removeChild(tag);
    }
    xhr.send();
}

    $('body').on('keyup', '.searchOrders', function(e) {
        var key=e.keyCode || e.which;
        if (key==13){
            var searchOrders = $('.searchOrders').val();
            if(searchOrders != ''){
                var searchHtml = '?searchOrders=' + searchOrders;
                window.location.href = "/tra-cuu-hanh-trinh-don"+searchHtml;
            }else{
                $('.searchOrders').attr('placeholder','Bạn chưa nhập mã đơn hàng');
            }
        }
    });
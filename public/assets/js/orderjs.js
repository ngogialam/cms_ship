$(document).ready(function() {
    $('.unNumber').keydown(function (e) {
        var charCode = e.keyCode;
            if ((charCode >= 48 && charCode <= 57) || (charCode >= 96 && charCode <= 105) || charCode >186 && charCode < 222 ) {
                    e.preventDefault();
                }
        });
    $('body').on('blur', '.pickName',function(){
        pickName = $('.pickName').val();
        if(pickName.length == 0){
            $('.err_pickName').html('Tên người gửi không được để trống');
        }else if(pickName.length < 2){
            $('.err_pickName').html('Tên người gửi quá ngắn');
        }else{
            $('.err_pickName').html('');
        }
    });

    $('body').on('blur', '.pickAddress',function(){
        pickAddress = $('.pickAddress').val();
        if(pickAddress.length == 0){
            $('.err_pickAddress').html('Địa chỉ gửi hàng không được để trống');
            $('#pickProvince').parent().removeClass('address_success');
            $('#pickProvince').parent().removeClass('address_edit');
            $('#pickProvince').parent().removeClass('address_edit');
            $('#pickDistrict').parent().removeClass('address_edit');
            $('#pickDistrict').parent().removeClass('address_success');
            $('#pickDistrict').parent().removeClass('address_edit');
            $('#pickWard').parent().removeClass('address_success');
            $('#pickWard').parent().removeClass('address_edit');
            $('#pickWard').parent().removeClass('address_edit');
        }else{
            $('.err_pickAddress').html('');
        }
    });

    $('body').on('blur', '.pickPhone',function(){
        pickPhone = $(this).val();
        if(pickPhone == ''){
            $('.err_pickPhone').html('Số điện thoại không được bỏ trống');
        }else{
            checkpickPhone = validatePhone(pickPhone);
            if(!checkpickPhone){
                $('.err_pickPhone').html('Số điện thoại không hợp lệ');
            }else{
                $('.err_pickPhone').html('');
            }
        }
    });
    $('body').on('blur', '.receiverPhone',function(){
        receiverPhone = $(this).val();
        receiverPhoneIndex = $(this).attr('index_item');
        if(receiverPhone == ''){
            $('.err_receiverPhone_'+receiverPhoneIndex).html('Số điện thoại không được bỏ trống');
        }else{
            checkreceiverPhone = validatePhone(receiverPhone);
            if(!checkreceiverPhone){
                $('.err_receiverPhone_'+receiverPhoneIndex).html('Số điện thoại không hợp lệ');
            }else{
                $('.err_receiverPhone_'+receiverPhoneIndex).html('');
            }
        }
    });
    $('body').on('blur', '.receiver',function(){
        receiver = $(this).val();
        receiverIndex = $(this).attr('index_item');
        if(receiver.length == 0){
            $('.err_receiver_'+receiverIndex).html('Tên người gửi không được để trống');
        }else if(receiver.length < 4){
            $('.err_receiver_'+receiverIndex).html('Tên người gửi không hợp lệ');
        }else{
            $('.err_receiver_'+receiverIndex).html('');
        }
    });
    $('body').on('blur', '.productName',function(){
        productName = $(this).val();
        productNameIndex = $(this).attr('index_item');
        if(productName.length == 0){
            $('.err_productName_'+productNameIndex).html('Tên hàng hóa không được để trống');
        }else{
            $('.err_productName_'+productNameIndex).html('');
        }
    });
    
    
    // $('.order_province_code_from').change(function(){
    $('body').on('change', '.order_province_code_from',function(){
        var receiverProductIndex = $(this).attr('index_prov');
        
        
        var autoChange = $(this).attr('auto_change');
        if(autoChange == 0){
            $('.provinceReceiver_'+receiverProductIndex).removeClass('address_success');
            $('.provinceReceiver_'+receiverProductIndex).removeClass('address_edit');
            $('.provinceReceiver_'+receiverProductIndex).removeClass('address_error');
            $('.suggestAddress-'+receiverProductIndex).css('display','none');
            $('.errAddressDetail_'+receiverProductIndex).html('');
        }
        // $('.provinceReceiver_'+receiverProductIndex).addClass('address_edit');
    });


    // $('.order_district_code_from').change(function(){
    $('body').on('change', '.order_district_code_from',function(){
        var receiverDistrictIndex = $(this).attr('index_dict');
        var checkerr_district = $('.err_district_'+receiverDistrictIndex).html();
        var autoChange = $(this).attr('auto_change');
        if(autoChange == 0 && checkerr_district == ''){
            $('.districtReceiver_'+receiverDistrictIndex).removeClass('address_success');
            $('.districtReceiver_'+receiverDistrictIndex).removeClass('address_edit');
            $('.districtReceiver_'+receiverDistrictIndex).removeClass('address_error');
            $('.suggestAddress-'+receiverDistrictIndex).css('display','none');
            $('.errAddressDetail_'+receiverDistrictIndex).html('');
        }
        // $('.districtReceiver_'+receiverDistrictIndex).addClass('address_edit');
    });
    
    
    // $('.order_ward_code_from').change(function(){
    $('body').on('change', '.order_ward_code_from',function(){
        var receiverWardIndex = $(this).attr('index_ward');
        
        var autoChange = $(this).attr('auto_change');
        if(autoChange == 0){
            $('.wardReceiver_'+receiverWardIndex).removeClass('address_success');
            $('.wardReceiver_'+receiverWardIndex).removeClass('address_edit');
            $('.wardReceiver_'+receiverWardIndex).removeClass('address_error');
            $('.err_ward_'+receiverWardIndex).html('');
            $('.suggestAddress-'+receiverWardIndex).css('display','none');
            $('.errAddressDetail_'+receiverWardIndex).html('');
        }
        // $('.wardReceiver_'+receiverWardIndex).addClass('address_edit');
    });

    $('body').on('click', '.choosePostage',function(event){
        var packageCode = $(this).attr('packageCode');
        var packageType = $(this).attr('packageType');
        var packageName = $(this).attr('packageName');
        if(packageCode != '' && packageCode != 0){
            $.ajax({
                url: '/vi/tao-don-le',
                type: 'post',
                dataType: 'json',
                data: {
                    'packageCode': packageCode,
                    'packageType': packageType,
                    'packageName': packageName
                },
                success: function(res) {
                    if (res.success) {
                        window.location.href = res.href;
                    } else {
                    }
                },
                error: function() {
    
                }
            });
        }
    });
    $('body').on('click', '.checkProductValue',function(){
        checkProductValue = $(this).is(":checked");
        var deliveryPointIndex = $(this).attr('deliveryPointIndex');
        var receiverIndex = $(this).attr('receiverIndex');
        var productIndex = $(this).attr('productIndex');
        
        if(checkProductValue == true){
            $("#qo-khaigia-ht").removeAttr("disabled");
        }else{
            $("#qo-khaigia-ht").attr("disabled", true);
            $('.err_productValue_'+deliveryPointIndex+'_'+receiverIndex+'_'+productIndex).html('');
        }
    });

    $('body').on('click', '.addProductItem',function(){
        var receiverIndex = parseInt($(this).attr('receiverIndex'));
        var productIndex = parseInt($(this).attr('productIndex'));
        var deliveryPointIndex = parseInt($(this).attr('deliveryPointIndex'));
        
        $.ajax({
            url: '/vi/addNewReceivers',
            type: 'post',
            dataType: 'json',
            data: {
                'deliveryPointIndex': deliveryPointIndex,
                'productIndex': productIndex,
                'receiverIndex': receiverIndex
            },
            success: function(res) {
                $('.addReceiver_'+deliveryPointIndex).append(res.html)
                $('.addReceiver_'+deliveryPointIndex).find(".orderdatePicker").datetimepicker({
                    timepicker: false,
                    format: 'd/m/Y',
                    minDate: new Date()
                });
            },
            error: function(res) {
                
            }
        });

    })

    $('body').on('click', '.updateAllProductItem',function(){
        var receiverIndex = parseInt($(this).attr('receiverIndex'));
        var productIndex = parseInt($(this).attr('productIndex'));
        var deliveryPointIndex = parseInt($(this).attr('deliveryPointIndex'));
        $('.afOrder_'+deliveryPointIndex+'_'+receiverIndex).hide();
        $('.pickupOrder_'+deliveryPointIndex+'_'+receiverIndex).removeClass('dpn');
        $('.pickupOrder_'+deliveryPointIndex+'_'+receiverIndex).addClass('dpb');
        $('#productCategory_'+deliveryPointIndex+'_'+receiverIndex+'_chosen').css("width", "100%");
        $('#productCategory_'+deliveryPointIndex+'_'+receiverIndex).trigger("chosen:updated");

    });
});


function choosePickupAddress(id, typeOrder = 0){
    
    if(id == 0){
        $('.pickInput').css("display", "flex");
        $('.senderInfo').css("display", "none");
        $('.orDetail-input').show();
        $(".orDetail-input-show").hide();
        $('.choosePickUpAddress').val('Thêm mới điểm gửi');
        $('.err_orderSender').html('');
        $('.err_orderSenderAddress').html('');
        $('.err_orderSenderPhone').html('');
        $('.pickName').val('');
        $('.pickPhone').val('');
        $('.pickAddress').val('');
        $('.pickProvince').val('');
        $('.pickDistrict').val('');
        $('.pickWard').val('');
        $('.pickupAddressId').val('');
        $('.choosePickUpAddress').attr('pickupAddressId','');
        $('#pickProvince_chosen').width("100%");
        $('#pickDistrict_chosen').width("100%");
        $('#pickWard_chosen').width("100%");
    }
    $.ajax({
        url: '/vi/choose-pickup-address',
        type: 'post',
        dataType: 'json',
        data: {
            'pickUpAddress': id,
            'typeOrder': typeOrder,
            
        },
        success: function(res) {
            if (res.success) {
                $('.pickInput').css("display", "none");
                $('.senderInfo').css("display", "flex");
                $('.orDetail-input').hide();
                $('.choosePickUpAddress').val(res.fullAddress);
                $('.pickupAddressId').val(id);
                $('.choosePickUpAddress').attr('pickupAddressId',id);
                $('.senderInfo').html(res.dataHtml);
                $(".orDetail-input-show").css("display", "flex");
            } else {
                
                
            }
        },
        error: function(res) {
            
            
        }
    });   
}

//Get ajax append 
// function addNewProductItem(ttsp){
    
// }
function removeProduct(productId,receiverIndex,productIndex){
    document.getElementById(productId).remove();
    $('.productItem_'+receiverIndex+'_'+productIndex).remove()
}

function updateProduct(){
    
}
function clearValueProduct(deliverypointindex,receiverIndex){
    $('.productName_'+deliverypointindex+'_'+receiverIndex).val('');
    $('.productCOD_'+deliverypointindex+'_'+receiverIndex).val('0');
    $('.productValue_'+deliverypointindex+'_'+receiverIndex).val('0');
    $('.productCategory_'+deliverypointindex+'_'+receiverIndex).val('0');
    $('.productQuatity_'+deliverypointindex+'_'+receiverIndex).val('1');
    $('.productCategory_'+deliverypointindex+'_'+receiverIndex).trigger("chosen:updated");
}

function addNewPickupAddress(maxPickupAddress = 5){
    deliveryPointNumber = $('[name="deliveryPointNumber"]').val();
    deliveryPointIndex = parseInt(deliveryPointNumber) + 1 ;
    $.ajax({
        url: '/vi/addNewPickupAddress',
        type: 'post',
        dataType: 'json',
        data: { 'deliveryPointIndex' : deliveryPointIndex
        },
        success: function(res) {
            $('.ttdh-main').append(res.html);
            // setTimeout(function(){ 
                $(".chosen-select").chosen();
            //  }, 300);
            $('[name="deliveryPointNumber"]').val(deliveryPointIndex)
            if(deliveryPointNumber == (parseInt(maxPickupAddress) -1 )){
                $('.btn-add-orders').hide();
            }
        },
        error: function() {
            //Call Modal Thông báo lỗi
        }
    });
}
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    console.log(charCode)
    if ((charCode > 31 && (charCode < 48 || charCode > 57) ) && charCode!= 44 && charCode!= 45 ) {
        return false;
    }
    return true;
}

function isNumberWithoutDash(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    console.log(charCode)
    if ((charCode > 31 && (charCode < 48 || charCode > 57) ) && charCode!= 44 && charCode== 45 ) {
        return false;
    }
    return true;
}

function addAddressDetail(deliveryPointIndex, type = 0, keySuggestion = 0){
    
    var receiverSenderSub = '';
    
    if(type == 1){
        let suggestionAddressDetail =  $('.suggestionAddressDetail-'+deliveryPointIndex+'-'+keySuggestion).val();
        let suggestionAddress =  $('.suggestionAddress-'+deliveryPointIndex+'-'+keySuggestion).val();
        receiverSenderSub = suggestionAddressDetail;
        $('.suggestAddress-'+deliveryPointIndex).css('display','none');
        $('.address_'+deliveryPointIndex).val(suggestionAddress);
    }
    else{
        receiverSenderSub = $('.address_'+deliveryPointIndex).val();
    }
    var receiverProductIndex = deliveryPointIndex;

    
        //Remove all class 
        $('.districtReceiver_'+receiverProductIndex).removeClass('address_success');
        $('.districtReceiver_'+receiverProductIndex).removeClass('address_edit');
        $('.districtReceiver_'+receiverProductIndex).removeClass('address_error');
        $('.provinceReceiver_'+receiverProductIndex).removeClass('address_success');
        $('.provinceReceiver_'+receiverProductIndex).removeClass('address_edit');
        $('.provinceReceiver_'+receiverProductIndex).removeClass('address_error');
        $('.wardReceiver_'+receiverProductIndex).removeClass('address_success');
        $('.wardReceiver_'+receiverProductIndex).removeClass('address_edit');
        $('.wardReceiver_'+receiverProductIndex).removeClass('address_error');
        if(receiverSenderSub.length <= 0){
            $('#provinceReceiver_'+receiverProductIndex).trigger("chosen:updated");
            $('#districtReceiver_'+receiverProductIndex).trigger("chosen:updated");
            $('#wardReceiver_'+receiverProductIndex).trigger("chosen:updated");

            $('#provinceReceiver_'+receiverProductIndex+'_chosen').css("width", "100%");
            $('#districtReceiver_'+receiverProductIndex+'_chosen').css("width", "100%");
            $('#wardReceiver_'+receiverProductIndex+'_chosen').css("width", "100%");
            $(".orderDetail_"+receiverProductIndex).removeClass('address_show');
            $(".orderDetail_"+receiverProductIndex).addClass('address_v2');
            $('.err_address_'+receiverProductIndex).html('Địa chỉ gửi hàng không được để trống');
        }else{
            $('.err_address_'+receiverProductIndex).html('');
            $.ajax({
                url: '/vi/get-address-location',
                type: 'post',
                dataType: 'json',
                data: {
                    'receiverSenderSub': receiverSenderSub
                },
                success: function(res) {
                    setTimeout(function(){ 
                        
                        $('.districtChangeReceiver_'+receiverProductIndex).attr('auto_change','0');
                        $('.provinceReceiverChange_'+receiverProductIndex).attr('auto_change','0');
                        $('.wardChangeReceiver_'+receiverProductIndex).attr('auto_change','0');
                    }, 500);
                    
                    $('.suggestAddress-'+deliveryPointIndex).css('display','none');
                    if (res.success) {
                        if(res.data != 1){
                            var obj          = jQuery.parseJSON(res.data);
                            

                            if (obj.ward_prob >= 0.9 && obj.ward_code) {
                                // $('.wardReceiver_'+receiverProductIndex).addClass('address_success');
                                $('.wardReceiver_'+receiverProductIndex).removeClass('address_success');
                                $('.wardReceiver_'+receiverProductIndex).removeClass('address_error');
                                $('.wardReceiver_'+receiverProductIndex).removeClass('address_edit');
                                $('.err_ward_' + receiverProductIndex).html('');
                            }else if((0.7 <= obj.ward_prob) && (obj.ward_prob < 0.9) && obj.ward_code){
                                $('.wardReceiver_'+receiverProductIndex).addClass('address_edit');
                                $('.err_ward_' + receiverProductIndex).html('Vui lòng kiểm tra Phường/Xã do có sự sai lệch về vị trí.');
                            }else{
                                $('.wardReceiver_'+receiverProductIndex).addClass('address_error');
                                $('.err_ward_' + receiverProductIndex).html('Vui lòng kiểm tra Phường/Xã do có sự sai lệch về vị trí.');
                            }
                            if (obj.district_prob >= 0.9 && obj.district_code) {
                                // $('.districtReceiver_'+receiverProductIndex).addClass('address_success');
                                
                                $('.districtReceiver_'+receiverProductIndex).removeClass('address_success');
                                $('.districtReceiver_'+receiverProductIndex).removeClass('address_error');
                                $('.districtReceiver_'+receiverProductIndex).removeClass('address_edit');
                                $('.err_district_' + receiverProductIndex).html('');
                                
                            }else if((0.7 <= obj.district_prob) && (obj.district_code < 0.9) && obj.district_code){
                                
                                $('.districtReceiver_'+receiverProductIndex).addClass('address_edit');
                                $('.err_district_' + receiverProductIndex).html('Vui lòng kiểm tra Quận/Huyện do có sự sai lệch về vị trí.');
                            }else{
                                $('.districtReceiver_'+receiverProductIndex).addClass('address_error');
                                $('.err_district_' + receiverProductIndex).html('Vui lòng kiểm tra Quận/Huyện do có sự sai lệch về vị trí.');
                            }

                            if (obj.province_prob >= 0.9 && obj.province_code) {
                                // $('.provinceReceiver_'+receiverProductIndex).addClass('address_success');
                                $('.provinceReceiver_'+receiverProductIndex).removeClass('address_error');
                                $('.provinceReceiver_'+receiverProductIndex).removeClass('address_success');
                                $('.provinceReceiver_'+receiverProductIndex).removeClass('address_edit');
                                $('.err_province_' + receiverProductIndex).html('');
                            }else if((0.7 <= obj.province_prob) && (obj.province_code < 0.9) && obj.province_code){
                                $('.provinceReceiver_'+receiverProductIndex).addClass('address_edit');
                                $('.err_province_' + receiverProductIndex).html('Vui lòng kiểm tra Tỉnh/Thành do có sự sai lệch về vị trí.');
                            }else{
                                $('.provinceReceiver_'+receiverProductIndex).addClass('address_error');
                                $('.err_province_' + receiverProductIndex).html('Vui lòng kiểm tra Tỉnh/Thành do có sự sai lệch về vị trí.');
                            }
                            $('#provinceReceiver_'+receiverProductIndex).trigger("chosen:updated");
                            $('#districtReceiver_'+receiverProductIndex).trigger("chosen:updated");
                            $('#wardReceiver_'+receiverProductIndex).trigger("chosen:updated");

                            $('#provinceReceiver_'+receiverProductIndex+'_chosen').css("width", "100%");
                            $('#districtReceiver_'+receiverProductIndex+'_chosen').css("width", "100%");
                            $('#wardReceiver_'+receiverProductIndex+'_chosen').css("width", "100%");
                            $(".orderDetail_"+receiverProductIndex).addClass('address_show');
                            $(".orderDetail_"+receiverProductIndex).removeClass('address_v2');

                            if(obj.province_prob >= 0.7 && obj.province_code){
                                $(".province_find_pro_"+receiverProductIndex).val(obj.province_code);
                                if (obj.district_prob >= 0.7 && obj.district_code) {
                                    $(".district_find_pro_"+receiverProductIndex).val(obj.district_code);
                                    if (obj.ward_prob >= 0.7 && obj.ward_code) {
                                        $(".wards_find_pro_"+receiverProductIndex).val(obj.ward_code);
                                    }else{
                                        $(".wards_find_pro_"+receiverProductIndex).val('0');
                                    }
                                }else{
                                    $(".district_find_pro_"+receiverProductIndex).val('0');
                                    $(".wards_find_pro_"+receiverProductIndex).val('0');
                                }
                                $('#provinceReceiver_'+receiverProductIndex).val(obj.province_code).trigger("chosen:updated");
                                $('#provinceReceiver_'+receiverProductIndex).trigger('change');
                                $('.errAddressDetail_'+receiverProductIndex).html('');
                            }else{
                                $('.districtReceiver_'+receiverProductIndex).removeClass('address_success');
                                $('.districtReceiver_'+receiverProductIndex).removeClass('address_edit');
                                $('.districtReceiver_'+receiverProductIndex).removeClass('address_edit');
                                $('.provinceReceiver_'+receiverProductIndex).removeClass('address_edit');
                                $('.provinceReceiver_'+receiverProductIndex).removeClass('address_success');
                                $('.provinceReceiver_'+receiverProductIndex).removeClass('address_edit');
                                $('.wardReceiver_'+receiverProductIndex).removeClass('address_success');
                                $('.wardReceiver_'+receiverProductIndex).removeClass('address_edit');
                                $('.wardReceiver_'+receiverProductIndex).removeClass('address_edit');
                                
                                $('.districtReceiver_'+receiverProductIndex).addClass('address_error');
                                $('.provinceReceiver_'+receiverProductIndex).addClass('address_error');
                                $('.wardReceiver_'+receiverProductIndex).addClass('address_error');
                                $(".province_find_pro_"+receiverProductIndex).val('0');
                                $(".district_find_pro_"+receiverProductIndex).val('0');
                                $(".wards_find_pro_"+receiverProductIndex).val('0');
                                $('#provinceReceiver_'+receiverProductIndex).val(0).trigger("chosen:updated");
                                $('#districtReceiver_'+receiverProductIndex).val(0).trigger("chosen:updated");
                                $('#wardReceiver_'+receiverProductIndex).val(0).trigger("chosen:updated");

                                $('.err_province_'+receiverProductIndex).html('');
                                $('.err_district_'+receiverProductIndex).html('');
                                $('.err_ward_'+receiverProductIndex).html('');
                                $('.errAddressDetail_'+receiverProductIndex).html('Vui lòng kiểm tra lại Tỉnh/Thành phố, Quận/Huyện, Phường/Xã do có sự sai lệch về vị trí');
                                
                            }
                        }

                    } else {
                        
                    }
                },
                error: function() {
                }
            });

            
        }
}
// function addProductItem(){
//     var receiverIndex = parseInt($(this).attr('receiverIndex'));
//     var productIndex = parseInt($(this).attr('productIndex'));
//     var deliveryPointIndex = parseInt($(this).attr('deliveryPointIndex'));



// }
function btnFinished(deliveryPointIndex = 1,receiverIndex = 1,productIndex = 1){
    var dataRedis = {};
    var deliveryPoint = [];
    var items = [];
    var receivers = [];
    var extraServices = [];
    
    for (let p = 0; p < deliveryPointIndex; p++) {
            deliveryPoint[p] = {};
            deliveryPoint[p]['receivers'] = {};
            deliveryPoint[p]['address'] = $('[name="deliveryPoint['+(parseInt(p) + 1)+'][address]"]').val();
            deliveryPoint[p]['province'] = $('[name="deliveryPoint['+(parseInt(p) + 1)+'][province]"]').val();
            deliveryPoint[p]['district'] = $('[name="deliveryPoint['+(parseInt(p) + 1)+'][district]"]').val();
            deliveryPoint[p]['ward'] = $('[name="deliveryPoint['+(parseInt(p) + 1)+'][ward]"]').val();

            for (let r = 0; r < receiverIndex; r++) {
                    receivers[r]={};
                    receivers[r]['items'] ={};
                    receivers[r]['extraServices'] ={};
                    receivers[r]['phone'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][phone]"]').val();
                    receivers[r]['name'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][name]"]').val();
                    // receivers[r]['length'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][length]"]').val();
                    receivers[r]['length'] = '10';
                    receivers[r]['width'] = '10';
                    receivers[r]['height'] = '10';
                    receivers[r]['weight'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][weight]"]').val();
                    receivers[r]['note'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][note]"]').val();
                    receivers[r]['expectDate'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][expectDate]"]').val();
                    receivers[r]['expectTime'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][expectTime]"]').val();
                    receivers[r]['isFree'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][isFree]"]:checked').val();
                    // receivers[r]['isPorter'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][extraServices][isPorter]"]').val();
                    // receivers[r]['isDoorDeliver'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][extraServices][isDoorDeliver]"]').val();
                    receivers[r]['partialDelivery'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][partialDelivery]"]:checked').val();
                    receivers[r]['isRefund'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][isRefund]"]:checked').val();
                    receivers[r]['requireNote'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][requireNote]"]').val();
                    receivers[r]['extraServices']['isPorter'] = '1';
                    // receivers[r]['extraServices']['isPorter'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][extraServices][isPorter]"]:checked').val();
                    // receivers[r]['extraServices']['isDoorDeliver'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][extraServices][isDoorDeliver]"]:checked').val();
                    receivers[r]['extraServices']['isDoorDeliver'] = '1';
                    
                    for (let i = 0; i < productIndex; i++) {
                        
                        
                        
                        items[i] = {};
                        items[i]['productName']  = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+(parseInt(r) + 1)+'][items]['+(parseInt(i) + 1)+'][productName]"]').val();
                        items[i]['quantity']  = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+(parseInt(r) + 1)+'][items]['+(parseInt(i) + 1)+'][quantity]"]').val();
                        items[i]['cod']  = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+(parseInt(r) + 1)+'][items]['+(parseInt(i) + 1)+'][cod]"]').val();
                        items[i]['productValue']  = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+(parseInt(r) + 1)+'][items]['+(parseInt(i) + 1)+'][productValue]"]').val();
                        items[i]['category']  = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+(parseInt(r) + 1)+'][items]['+(parseInt(i) + 1)+'][category]"]').val();
                    }
                    receivers[r]['items'] = items;
        
            }
            deliveryPoint[p]['receivers'] = receivers;
    }
    dataRedis['pickupAddressId'] = $('[name="pickupAddressId"]').val();
    dataRedis['pickName'] = $('[name="pickName"]').val();
    dataRedis['pickPhone'] = $('[name="pickPhone"]').val();
    dataRedis['pickAddress'] = $('[name="pickAddress"]').val();
    dataRedis['pickProvince'] = $('[name="pickProvince"]').val();
    dataRedis['pickDistrict'] = $('[name="pickDistrict"]').val();
    dataRedis['pickWard'] = $('[name="pickWard"]').val();
    dataRedis['packCode'] = $('[name="packCode"]').val();
    dataRedis['pickupType'] = $('[name="packType"]').val();
    dataRedis['expectShipperPhone'] = $('[name="expectShipperPhone"]').val();
    dataRedis['deliveryPoint'] = deliveryPoint;

    $.ajax({
        url: '/vi/postFormApi',
        type: 'post',
        dataType:'json',
        data: {
            dataRedis: dataRedis
        },
        success: function(res) {
        },
        error: function() {
            //Call Modal Thông báo lỗi
        }
    });
}
function getAllValue(deliveryPointIndex = 1,receiverIndex = 1,productIndex = 1){
    var dataRedis = {};
    var deliveryPoint = [];
    var items = [];
    var receivers = [];
    var extraServices = [];
    
    for (let p = 0; p <deliveryPointIndex; p++) {
            deliveryPoint[p] = {};
            deliveryPoint[p]['receivers'] = {};
            deliveryPoint[p]['address'] = $('[name="deliveryPoint['+(parseInt(p) + 1)+'][address]"]').val();
            deliveryPoint[p]['province'] = $('[name="deliveryPoint['+(parseInt(p) + 1)+'][province]"]').val();
            deliveryPoint[p]['district'] = $('[name="deliveryPoint['+(parseInt(p) + 1)+'][district]"]').val();
            deliveryPoint[p]['ward'] = $('[name="deliveryPoint['+(parseInt(p) + 1)+'][ward]"]').val();

            for (let r = 0; r <receiverIndex; r++) {
                    receivers[r]={};
                    receivers[r]['items'] ={};
                    receivers[r]['extraServices'] ={};
                    receivers[r]['phone'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][phone]"]').val();
                    receivers[r]['name'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][name]"]').val();
                    receivers[r]['length'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][length]"]').val();
                    receivers[r]['weight'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][weight]"]').val();
                    receivers[r]['note'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][note]"]').val();
                    receivers[r]['expectDate'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][expectDate]"]').val();
                    receivers[r]['expectTime'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][expectTime]"]').val();
                    receivers[r]['isFree'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][isFree]"]:checked').val();
                    // receivers[r]['isPorter'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][extraServices][isPorter]"]').val();
                    // receivers[r]['isDoorDeliver'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][extraServices][isDoorDeliver]"]').val();
                    receivers[r]['partialDelivery'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][partialDelivery]"]:checked').val();
                    receivers[r]['isRefund'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][isRefund]"]:checked').val();
                    receivers[r]['requireNote'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][requireNote]"]').val();
                    receivers[r]['extraServices']['isPorter'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][extraServices][isPorter]"]:checked').val();
                    receivers[r]['extraServices']['isDoorDeliver'] = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+ (parseInt(r) + 1)+'][extraServices][isDoorDeliver]"]:checked').val();
                    
                    for (let i = 0; i < productIndex; i++) {
                        items[i] = {};
                        items[i]['productName']  = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+(parseInt(r) + 1)+'][items]['+(parseInt(i) + 1)+'][productName]"]').val();
                        items[i]['productQuantity']  = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+(parseInt(r) + 1)+'][items]['+(parseInt(i) + 1)+'][quantity]"]').val();
                        items[i]['productCod']  = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+(parseInt(r) + 1)+'][items]['+(parseInt(i) + 1)+'][cod]"]').val();
                        items[i]['productValue']  = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+(parseInt(r) + 1)+'][items]['+(parseInt(i) + 1)+'][productValue]"]').val();
                        items[i]['productCategory']  = $('[name="deliveryPoint['+ (parseInt(p) + 1)+'][receivers]['+(parseInt(r) + 1)+'][items]['+(parseInt(i) + 1)+'][category]"]').val();
                    }
                    receivers[r]['items'] = items;
        
            }
            deliveryPoint[p]['receivers'] = receivers;
    }
    dataRedis['pickupAddressId'] = $('[name="pickupAddressId"]').val();
    dataRedis['pickName'] = $('[name="pickName"]').val();
    dataRedis['pickPhone'] = $('[name="pickPhone"]').val();
    dataRedis['pickAddress'] = $('[name="pickAddress"]').val();
    dataRedis['pickProvince'] = $('[name="pickProvince"]').val();
    dataRedis['pickDistrict'] = $('[name="pickDistrict"]').val();
    dataRedis['pickWard'] = $('[name="pickWard"]').val();
    dataRedis['expectShipperPhone'] = $('[name="expectShipperPhone"]').val();
    dataRedis['deliveryPoint'] = deliveryPoint;

    //Update cache
    $.ajax({
        url: '/vi/updateCacheOrder',
        type: 'post',
        dataType:'json',
        data: {
            dataRedis: dataRedis
        },
        success: function(res) {
        },
        error: function() {
            //Call Modal Thông báo lỗi
        }
    });

}

function keyUpAddress(deliveryPointIndex){
    var receiverSenderSub = $('.address_'+deliveryPointIndex).val();
    var receiverProductIndex = deliveryPointIndex;
    clearTimeout(typingTimer);
    if(receiverSenderSub.length >= 0){
        typingTimer = setTimeout(function() {
            $.ajax({
                url: '/vi/suggestionAddress',
                type: 'post',
                dataType:'json',
                data: {
                    'receiverSenderSub': receiverSenderSub,
                    'deliveryPointIndex': deliveryPointIndex,
                },
                success: function(res) {
                    if(res.success){
                        $('.suggestAddress-'+deliveryPointIndex).css('display','block');
                        $('.suggestAddress-'+deliveryPointIndex).html(res.html);
                    }else{
                        $('.suggestAddress-'+deliveryPointIndex).css('display','none');
                    }
                },
                error: function() {
                    //Call Modal Thông báo lỗi
                }
            });
        }, 500);
    }
}

function chooseNewAddress(keySuggestion, deliveryPoint){
    let suggestionAddress =  $('.suggestionAddress-'+deliveryPoint).val();
    let suggestionAddressDetail =  $('.suggestionAddressDetail-'+deliveryPoint+'-'+keySuggestion).val();
    
    $('.address_'+deliveryPoint).val(suggestionAddress);
    $('.suggestionAddressDetail-'+deliveryPoint).val(suggestionAddressDetail);
    $('.suggestAddress-'+deliveryPoint).css('display','none');
    
}
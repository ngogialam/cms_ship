$(document).ready(function() {
    $('.pickAddress').change(function() {
        var pickAddress = $('.pickAddress').val();
        if (pickAddress.length <= 0) {
            $('#pickProvince').val(0).trigger("chosen:updated");
            $('#pickDistrict').val(0).trigger("chosen:updated");
            $('#pickWard').val(0).trigger("chosen:updated");

            $('#pickProvince').parent().removeClass('address_success');
            $('#pickProvince').parent().removeClass('address_warning');
            $('#pickProvince').parent().removeClass('address_edit');
            $('#pickProvince').parent().removeClass('address_error');
            $('#pickDistrict').parent().removeClass('address_warning');
            $('#pickDistrict').parent().removeClass('address_success');
            $('#pickDistrict').parent().removeClass('address_error');
            $('#pickDistrict').parent().removeClass('address_edit');
            $('#pickWard').parent().removeClass('address_success');
            $('#pickWard').parent().removeClass('address_warning');
            $('#pickWard').parent().removeClass('address_edit');
            $('#pickWard').parent().removeClass('address_error');
        } else {
            $.ajax({
                url: '/vi/get-address-location',
                type: 'post',
                dataType: 'json',
                data: {
                    'receiverSenderSub': pickAddress
                },
                success: function(res) {
                    if (res.success) {
                        if (res.data != 1) {
                            var obj = jQuery.parseJSON(res.data);

                            if (obj.ward_prob >= 0.9 && obj.ward_code) {
                                $('#pickWard').parent().addClass('address_success');
                            } else if ((0.7 <= obj.ward_prob) && (obj.ward_prob < 0.9) && obj.ward_code) {
                                $('#pickWard').parent().addClass('address_warning');
                            } else {
                                $('#pickWard').parent().addClass('address_error');
                            }

                            if (obj.district_prob >= 0.9 && obj.district_code) {
                                $('#pickDistrict').parent().addClass('address_success');
                            } else if ((0.7 <= obj.district_prob) && (obj.district_code < 0.9) && obj.district_code) {
                                $('#pickDistrict').parent().addClass('address_warning');
                            } else {
                                $('#pickDistrict').parent().addClass('address_error');
                            }

                            if (obj.province_prob >= 0.9 && obj.province_code) {
                                $('#pickProvince').parent().addClass('address_success');
                            } else if ((0.7 <= obj.province_prob) && (obj.province_code < 0.9) && obj.province_code) {
                                $('#pickProvince').parent().addClass('address_warning');
                            } else {
                                $('#pickProvince').parent().addClass('address_error');
                            }

                            $('#pickProvince').trigger("chosen:updated");
                            $('#pickDistrict').trigger("chosen:updated");
                            $('#pickWard').trigger("chosen:updated");
                            if (obj.province_prob >= 0.7 && obj.province_code) {

                                $(".province_find_pro").val(obj.province_code);
                                if (obj.district_prob >= 0.7 && obj.district_code) {
                                    $(".district_find_pro").val(obj.district_code);
                                    if (obj.ward_prob >= 0.7 && obj.ward_code) {
                                        $(".wards_find_pro").val(obj.ward_code);
                                    } else {
                                        $(".wards_find_pro").val('0');
                                    }
                                } else {
                                    $(".district_find_pro").val('0');
                                    $(".wards_find_pro").val('0');
                                }
                                $('#pickProvince').val(obj.province_code).trigger("chosen:updated");
                                $('#pickProvince').trigger('change');
                            } else {
                                $('#pickProvince').parent().removeClass('address_success');
                                $('#pickProvince').parent().removeClass('address_warning');
                                $('#pickProvince').parent().removeClass('address_edit');
                                $('#pickDistrict').parent().removeClass('address_warning');
                                $('#pickDistrict').parent().removeClass('address_success');
                                $('#pickDistrict').parent().removeClass('address_edit');
                                $('#pickWard').parent().removeClass('address_success');
                                $('#pickWard').parent().removeClass('address_warning');
                                $('#pickWard').parent().removeClass('address_edit');

                                $('#pickDistrict').parent().addClass('address_error');
                                $('#pickProvince').parent().addClass('address_error');
                                $('#pickWard').parent().addClass('address_error');
                                $(".province_find_pro").val('0');
                                $(".district_find_pro").val('0');
                                $(".wards_find_pro").val('0');
                                $('#pickProvince').val(0).trigger("chosen:updated");
                                $('#pickDistrict').val(0).trigger("chosen:updated");
                                $('#pickWard').val(0).trigger("chosen:updated");
                            }
                        }

                    } else {
                        console.log(res)
                    }
                },
                error: function() {

                }
            });
        }
    });

    // $('.isRefund').change(function(){
    //     checked = $(this).val();
    //     keyPoint = $(this).attr('keyPoint');
    //     console.log(keyPoint)
    //     if(checked == 0){
    //         var countCodCheck = $('.codHide_'+keyPoint).length;
    //         for(var i = 1; i <= countCodCheck; i++){
    //             var codCheck = $('.codHide_'+keyPoint+'_'+i).val()
    //             if(codCheck != 0){
    //                 $('.isRefundYes_' + keyPoint).prop('checked',true);
    //                 console.log('.isRefundYes_' + keyPoint)
    //                 $('#modalConfirmChangeRefund').modal('show')
    //                 return false;
    //             }
    //         }
            
    //     }
    // })
});

// function changeRefundPoint(keyPoint){
//     $.ajax({
//         url: '/vi/changeRefundPoint',
//         type: 'post',
//         dataType: 'json',
//         data: { 
//             'keyPoint': keyPoint
//             },
//         success: function(res) {
//         },
//         error: function(res) {
//         }
//     });
// }
function ValidateReceiverPhone(deliveryPointIndex, receiverIndex) {
    var receiverPhone = $('.receiverPhone_' + deliveryPointIndex + '_' + receiverIndex).val();
    if (receiverPhone == '') {
        $('.err_receiverPhone_' + deliveryPointIndex + '_' + receiverIndex).html('Số điện thoại không được bỏ trống');
    } else {
        checkreceiverPhone = validatePhone(receiverPhone);
        if (!checkreceiverPhone) {
            $('.err_receiverPhone_' + deliveryPointIndex + '_' + receiverIndex).html('Số điện thoại không hợp lệ');
        } else {
            $('.err_receiverPhone_' + deliveryPointIndex + '_' + receiverIndex).html('');
        }
    }
};

function ValidateReceiverName(deliveryPointIndex, receiverIndex) {
    var receiverName = $('.receiverName_' + deliveryPointIndex + '_' + receiverIndex).val();
    if (receiverName == '') {
        $('.err_receiverName_' + deliveryPointIndex + '_' + receiverIndex).html('Tên người nhận không được bỏ trống');
    } else {
        $('.err_receiverName_' + deliveryPointIndex + '_' + receiverIndex).html('');
    }
};

function ValidateProductName(deliveryPointIndex, receiverIndex, productIndex) {
    var productName = $('.productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val();
    var productCOD = $('.productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val().replace(/\,/g, '');
    var productValue = $('.productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val().replace(/\,/g, '');
    var productCate = $('.productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val();
    var checked = 0;
    $('input.checkProductValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex + ':checkbox:checked').each(function() {
        checked = $(this).val();
    });
    var productQuantity = $('.productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val().replace(/\,/g, '');
    var saveProduct = $('saveProduct_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).attr('onclick');
    if (productName != '' && productName != null && productCOD != '' && productCOD != null && ((checked == 1 && productValue > 0) || (checked == 0)) && productQuantity > 0 && productCate > 0) {
        // this.saveProduct(deliveryPointIndex, receiverIndex, productIndex);
    } else {
        // console.log('Thiếu điều kiện');
    }

    if (productName == '' || productName == null) {
        $('.err_productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).html('Tên hàng hoá không được bỏ trống');
    } else {
        $('.err_productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).html('');
    }
};

function ValidateProductCOD(deliveryPointIndex, receiverIndex, productIndex) {
    var productName = $('.productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val();
    var productCOD = $('.productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val().replace(/\,/g, '');
    var productValue = $('.productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val().replace(/\,/g, '');
    var productCate = $('.productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val();
    var checked = 0;
    $('input.checkProductValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex + ':checkbox:checked').each(function() {
        checked = $(this).val();
    });
    var productQuantity = $('.productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val().replace(/\,/g, '');
    if (productName != '' && productName != null && productCOD != '' && productCOD != null && ((checked == 1 && productValue > 0) || (checked == 0)) && productQuantity > 0 && productCate > 0) {
        this.saveProduct(deliveryPointIndex, receiverIndex, productIndex);
    } else {
        console.log('Thiếu điều kiện');
    }

    if (productCOD == '' || productCOD == null) {
        $('.productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val(0);
    } else if (productCOD > 100000000) {
        $('.productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val('100,000,000');
        $('.err_productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).html('Tiền COD bạn nhập quá lớn');
    } else {
        $('.err_productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).html('');
    }
}

function ValidateProductValue(deliveryPointIndex, receiverIndex, productIndex) {
    var productName = $('.productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val();
    var productCOD = $('.productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val().replace(/\,/g, '');
    var productValue = $('.productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val().replace(/\,/g, '');
    var productCate = $('.productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val();
    var checked = 0;
    $('input.checkProductValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex + ':checkbox:checked').each(function() {
        checked = $(this).val();
    });
    var productQuantity = $('.productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val().replace(/\,/g, '');
    if (productName != '' && productName != null && productCOD != '' && productCOD != null && ((checked == 1 && productValue > 0) || (checked == 0)) && productQuantity > 0 && productCate > 0) {
        this.saveProduct(deliveryPointIndex, receiverIndex, productIndex);
    } else {
        console.log('Thiếu điều kiện');
    }

    if (checked == 1 && productValue <= 0) {
        $('.err_productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).html('Giá trị hàng hoá phải lớn hơn 0');
    } else if (checked = 1 && productValue > 100000000) {
        $('.productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val('100,000,000');
        $('.err_productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).html('Giá trị hàng hoá bạn nhập quá lớn');
    } else {
        $('.err_productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).html('');
    }
}

function ValidateProductCate(deliveryPointIndex, receiverIndex, productIndex) {
    var productName = $('.productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val();
    var productCOD = $('.productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val().replace(/\,/g, '');
    var productValue = $('.productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val().replace(/\,/g, '');
    var productCate = $('.productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val();
    var checked = 0;
    $('input.checkProductValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex + ':checkbox:checked').each(function() {
        checked = $(this).val();
    });
    var productQuantity = $('.productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val().replace(/\,/g, '');
    if (productName != '' && productName != null && productCOD != '' && productCOD != null && ((checked == 1 && productValue > 0) || (checked == 0)) && productQuantity > 0 && productCate > 0) {
        this.saveProduct(deliveryPointIndex, receiverIndex, productIndex);
    } else {
        console.log('Thiếu điều kiện');
    }

    if (productCate <= 0) {
        $('.err_productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).html('Loại hàng hoá không được để trống');
    } else {
        $('.err_productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).html('');
    }
}

function ValidateProductQuantity(deliveryPointIndex, receiverIndex, productIndex) {
    var productName = $('.productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val();
    var productCOD = $('.productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val().replace(/\,/g, '');
    var productValue = $('.productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val().replace(/\,/g, '');
    var productCate = $('.productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val();
    var checked = 0;
    $('input.checkProductValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex + ':checkbox:checked').each(function() {
        checked = $(this).val();
    });
    var productQuantity = $('.productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val().replace(/\,/g, '');
    if (productName != '' && productName != null && productCOD != '' && productCOD != null && ((checked == 1 && productValue > 0) || (checked == 0)) && productQuantity > 0 && productCate > 0) {
        this.saveProduct(deliveryPointIndex, receiverIndex, productIndex);
    } else {
        console.log('Thiếu điều kiện');
    }

    if (productQuantity <= 0) {
        $('.productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val(1);
    } else if (productQuantity > 100) {
        $('.productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val(100);
        $('.err_productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).html('Số lượng bạn nhập quá lớn');
    } else {
        $('.err_productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).html('');
    }
}

function ValidateWeight(deliveryPointIndex, receiverIndex) {
    var weight = $('.weight_' + deliveryPointIndex + '_' + receiverIndex).val().replace(/\./g, '');
    if (weight == '' || weight == null) {
        $('.err_weight_' + deliveryPointIndex + '_' + receiverIndex).html('Không được để trống');
    } else if (weight <= 0) {
        $('.err_weight_' + deliveryPointIndex + '_' + receiverIndex).html('Cân nặng lớn hơn 0');
    } else {
        $('.err_weight_' + deliveryPointIndex + '_' + receiverIndex).html('');
    }
}

function ValidateLength(deliveryPointIndex, receiverIndex) {
    var length = $('.length_' + deliveryPointIndex + '_' + receiverIndex).val();
    if (length == '' || length == null) {
        $('.err_size_' + deliveryPointIndex + '_' + receiverIndex).html('Chiều dài không được để trống');
    } else if (length <= 0) {
        $('.err_size_' + deliveryPointIndex + '_' + receiverIndex).html('Chiều dài phải lớn hơn 0');
    } else {
        $('.err_size_' + deliveryPointIndex + '_' + receiverIndex).html('');
    }
}

function ValidateWidth(deliveryPointIndex, receiverIndex) {
    var width = $('.width_' + deliveryPointIndex + '_' + receiverIndex).val();
    if (width == '' || width == null) {
        $('.err_size_' + deliveryPointIndex + '_' + receiverIndex).html('Chiều rộng không được để trống');
    } else if (width <= 0) {
        $('.err_size_' + deliveryPointIndex + '_' + receiverIndex).html('Chiều rộng phải lớn hơn 0');
    } else {
        $('.err_size_' + deliveryPointIndex + '_' + receiverIndex).html('');
    }
}

function ValidateHeight(deliveryPointIndex, receiverIndex) {
    var height = $('.height_' + deliveryPointIndex + '_' + receiverIndex).val();
    if (height == '' || height == null) {
        $('.err_size_' + deliveryPointIndex + '_' + receiverIndex).html('Chiều cao không được để trống');
    } else if (height <= 0) {
        $('.err_size_' + deliveryPointIndex + '_' + receiverIndex).html('Chiều cao phải lớn hơn 0');
    } else {
        $('.err_size_' + deliveryPointIndex + '_' + receiverIndex).html('');
    }
}
function saveProduct(deliveryPointIndex, receiverIndex, productIndex, type, typeOrder = 0) {
    var error = 0;
    // Người gửi
    var pickupAddressId = 0;
    var pickName = '';
    var pickPhone = '';
    var pickAddress = '';
    var pickProvince = '';
    var pickDistrict = '';
    var pickWard = '';
    pickupAddressId = $('#orders').find('.choosePickUpAddress').attr('pickupaddressid');
    var orderId = $('.orderId').val();
    if(orderId != 0){
        typeOrder = 1;
    }
    if (pickupAddressId <= 0 || pickupAddressId == '' || pickupAddressId == null) {
        pickName = $('#orders').find('.pickName').val();
        pickPhone = $('#orders').find('.pickPhone').val();
        pickAddress = $('#orders').find('.pickAddress').val();
        pickProvince = $('#orders').find('.pickProvince').val();
        pickDistrict = $('#orders').find('.pickDistrict').val();
        pickWard = $('#orders').find('.pickWard').val();
        if (pickName == '' || pickName == null) {
            $('.err_pickName').html('Tên người gửi không được để trống');
            error = 1;
        }
        if (pickPhone == '' || pickPhone == null) {
            error = 1;
            $('.err_pickPhone').html('Số điện thoại người gửi không được để trống');
        } else {
            checkpickPhone = validatePhone(pickPhone);
            if (!checkpickPhone) {
                $('.err_pickPhone').html('Số điện thoại người gửi không hợp lệ');
                error = 1;
            } else {
                $('.err_pickPhone').html('');
            }
        }
        if (pickAddress == '' || pickAddress == null) {
            $('.err_pickAddress').html('Địa chỉ người gửi không được để trống');
            error = 1;
        }
        if (pickProvince <= 0 || pickProvince == '' || pickProvince == null) {
            $('.err_pickProvince').html('Tỉnh/thành người gửi không được để trống');
            error = 1;
        }
        if (pickDistrict <= 0 || pickDistrict == '' || pickDistrict == null) {
            $('.err_pickDistrict').html('Quận/huyện người gửi không được để trống');
            error = 1;
        }
        if (pickWard <= 0 || pickWard == '' || pickWard == null) {
            $('.err_pickWard').html('Phường/xã người gửi không được để trống');
            error = 1;
        }
    }

    //Điểm giao & thông tin người nhận
    var deliveryPointIndex = deliveryPointIndex;
    var receiverIndex = receiverIndex;
    var productIndex = productIndex;

    // Địa chỉ người nhận
    var deliveryAddress = $('#OrderSingle').find('.address_' + deliveryPointIndex).val();
    var deliveryPorvince = $('#OrderSingle').find('#provinceReceiver_' + deliveryPointIndex).val();
    var deliveryDistrict = $('#OrderSingle').find('#districtReceiver_' + deliveryPointIndex).val();
    var deliveryWard = $('#OrderSingle').find('#wardReceiver_' + deliveryPointIndex).val();

    if (deliveryAddress == '' || deliveryAddress == null) {
        $('.err_address_' + deliveryPointIndex).html('Địa chỉ người nhận không được để trống');
        error = 1;
        // if(forcusIndex == 0){
        //     scrrolToError('err_address_' + deliveryPointIndex);
        // }
        // forcusIndex = 1;
    }
    if (deliveryPorvince == '' || deliveryPorvince == null || deliveryPorvince == 0) {
        $('.err_province_' + deliveryPointIndex).html('Tỉnh/thành người nhận không được để trống');
        error = 1;
        // if(forcusIndex == 0){
        //         scrrolToError('err_province_' + deliveryPointIndex);
        //     }
        //     forcusIndex = 1;
    }
    if (deliveryDistrict == '' || deliveryDistrict == null || deliveryDistrict == null) {
        $('.err_district_' + deliveryPointIndex).html('Quận/huyện người nhận không được để trống');
        error = 1;
        // if(forcusIndex == 0){
        //         scrrolToError('err_district_' + deliveryPointIndex);
        //     }
        //     forcusIndex = 1;
    }
    if (deliveryWard == '' || deliveryWard == null || deliveryWard == null) {
        $('.err_ward_' + deliveryPointIndex).html('Phường/xã người nhận không được để trống');
        error = 1;
        // if(forcusIndex == 0){
        //     scrrolToError('err_ward_' + deliveryPointIndex);
        // }
        // forcusIndex = 1;
    }

    // Thông tin người nhận
    var receiverPhone = $('#OrderSingle').find('.receiverPhone_' + deliveryPointIndex + '_' + receiverIndex).val();
    var receiverName = $('#OrderSingle').find('.receiverName_' + deliveryPointIndex + '_' + receiverIndex).val();
    var expectDate = $('#OrderSingle').find('.expectDate_' + deliveryPointIndex + '_' + receiverIndex).val();
    var expectTime = $('#OrderSingle').find('.expectTime_' + deliveryPointIndex + '_' + receiverIndex).val();

    if (receiverPhone == '' || receiverPhone == null) {
        $('.err_receiverPhone_' + deliveryPointIndex + '_' + receiverIndex).html('Số điện thoại người nhận không được để trống');
        error = 1;
    } else {
        check = validatePhone(receiverPhone);
        if (!check) {
            $('.err_receiverPhone_' + deliveryPointIndex + '_' + receiverIndex).html('Số điện thoại người nhận không hợp lệ');
            error = 1;
        } else {
            $('.err_receiverPhone_' + deliveryPointIndex + '_' + receiverIndex).html('');
        }
    }
    if (receiverName.length == 0) {
        $('.err_receiverName_' + deliveryPointIndex + '_' + receiverIndex).html('Tên người nhận không được để trống');
        error = 1;
    } else if (receiverName.length < 2) {
        $('.err_receiverName_' + deliveryPointIndex + '_' + receiverIndex).html('Tên người nhận quá ngắn');
        error = 1;
    } else {
        $('.err_receiverName_' + deliveryPointIndex + '_' + receiverIndex).html('');
    }

    // Thông tin sản phẩm
    var productName = $('#OrderSingle').find('.productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val();
    var productCOD = $('#OrderSingle').find('.productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val().replace(/\,/g, '');
    var productValue = $('#OrderSingle').find('.productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val().replace(/\,/g, '');
    var productCate = $('#OrderSingle').find('.productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val();
    var productQuantity = $('#OrderSingle').find('.productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val().replace(/\,/g, '');
    if (productName == '' || productName == null) {
        $('.err_productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).html('Tên hàng hoá không được bỏ trống');
        error = 1;
    } else {
        $('.err_productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).html('');
    }
    if (productCOD == '' || productCOD == null || productCOD < 0) {
        $('.productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val(0);
    } else if (productCOD > 100000000) {
        $('.productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val(100000000);
        $('.err_productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).html('Tiền COD bạn nhập quá lớn');
        error = 1;
    } else {
        $('.err_productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).html('');
    }
    console.log(productCOD,productValue)
    
    var checked = 0;
    if ($('.checkProductValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).is(":checked") == true) {
        checked = 1;
    }
    // if(checked == 1 && parseInt(productCOD) > parseInt(productValue)){
    //     $('.err_productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).html('Tiền COD nhỏ hơn hoặc bằng giá trị khai giá');
    //     error = 1
    // }else if(checked == 1 && parseInt(productCOD) == 0 && parseInt(productValue) > 1000000){
    //     $('.err_productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).html('Tiền COD nhỏ hơn hoặc bằng giá trị khai giá');
    // }else{
    //     $('.err_productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).html('');
    //     error = 0
    // }

    

    if(checked == 0){
        $('#OrderSingle').find('.productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val('0');
        productValue = 0;
    }
    if (checked == 1 && productValue <= 0) {
        $('.err_productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).html('Giá trị hàng hoá phải lớn hơn 0');
        error = 1;
    } else if (checked == 1 && productValue > 100000000) {
        $('.productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val(100000000);
        $('.err_productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).html('Giá trị hàng hoá bạn nhập quá lớn');
        error = 1;
    } else {
        $('.err_productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).html('');
    }
    if (productCate <= 0) {
        $('.err_productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).html('Loại hàng hoá không được để trống');
        error = 1;
    } else {
        $('.err_productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).html('');
    }
    if (productQuantity <= 0) {
        $('.productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val(1);
    } else if (productQuantity > 100) {
        $('.productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val(100);
        $('.err_productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).html('Số lượng bạn nhập quá lớn');
        error = 1;
    } else {
        $('.err_productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).html('');
    }

    var productIndexNext = $('.productIndexNext_' + deliveryPointIndex + '_' + receiverIndex).val();
    $('.err_saveProduct_' + deliveryPointIndex + '_' + receiverIndex + '_1').html('');
    // Xử lý Ajax thêm sản phẩm
    var isRefund = 0;
    $('input.isRefundYes_' + deliveryPointIndex + '_' + receiverIndex + ':radio:checked').each(function() {
        isRefund = $(this).val();
    });
    console.log(type)
    if(isRefund == 0){
        console.log('zzzzzzzz')
        // if(productCOD > 0){
        //     $('#modalConfirmChangeRefund').modal('show')
        //     error = 1;
        // }
    }
    if (error == 0) {
        $.ajax({
            url: '/vi/saveProductItem',
            type: 'post',
            dataType: 'json',
            data: {
                'deliveryPointIndex': deliveryPointIndex,
                'receiverIndex': receiverIndex,
                'productIndex': productIndex,
                'productIndexNext': productIndexNext,
                'pickupAddressId': pickupAddressId,
                'pickName': pickName,
                'pickPhone': pickPhone,
                'pickAddress': pickAddress,
                'pickProvince': pickProvince,
                'pickDistrict': pickDistrict,
                'pickWard': pickWard,
                'deliveryAddress': deliveryAddress,
                'deliveryPorvince': deliveryPorvince,
                'deliveryDistrict': deliveryDistrict,
                'deliveryWard': deliveryWard,
                'receiverPhone': receiverPhone,
                'receiverName': receiverName,
                'expectDate': expectDate,
                'expectTime': expectTime,
                'productName': productName,
                'productCOD': productCOD,
                'productValue': productValue,
                'productCate': productCate,
                'productQuantity': productQuantity,
                'type': type,
                'typeOrder': typeOrder
            },
            success: function(res) {
                if (res.success) {
                    var index = jQuery.parseJSON(res.index);
                    var resData = jQuery.parseJSON(res.resData);
                    if (res.type == "addProduct") {
                        var html = '<ul class="col-12 productDetail productDetail_' + index.deliveryPointIndex + ' productDetail_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex + '">';
                        html += '<li class="or-ttdh-add">';
                        html += '<ul class="row">';
                        html += '<li class="or-dh-tt col-sm-3 pl-2">';
                        html += '<span class="or-dh-stt" style="background: #885DE5;">' + index.productIndex + '</span>';
                        html += '<span class="success_productName_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex + '" productName="' + resData.productName + '">' + resData.productName + '</span>';
                        html += '</li>';
                        html += '<li class="or-dh-sp col-sm-3">';
                        html += '<span class="success_productCate_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex + '" productCate="' + resData.productCate + '">' + resData.productCateName + '</span>';
                        html += '</li>';
                        html += '<li class="or-dh-sl col-sm-1">';
                        html += 'SL: <span class="success_productQuantity_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex + '" productQuantity="' + resData.productQuantity + '">' + (new Intl.NumberFormat().format(resData.productQuantity)) + '</span>';
                        html += '</li>';
                        html += '<li class="or-dh-cod col-sm-2">';
                        html += 'COD: <span class="success_productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex + '" productCOD="' + (resData.productCOD * resData.productQuantity) + '">' + (new Intl.NumberFormat().format(resData.productCOD * resData.productQuantity)) + '</span> đ';
                        html += '</li>';
                        html += '<li class="or-dh-kg col-sm-2">';
                        html += 'Khai giá: <span class="success_productValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex + '" productValue="' + (resData.productValue * resData.productQuantity) + '">' + (new Intl.NumberFormat().format(resData.productValue * resData.productQuantity)) + '</span> đ';
                        html += '</li>';
                        html += '<li class="or-dh-ed col-sm-1">';
                        html += '<img src="/public/images/or-delete.png" onclick="removeProductConfirm(' + index.deliveryPointIndex + ', ' + index.receiverIndex + ', ' + index.productIndex + ', ' + typeOrder + ')">';
                        html += '<img src="/public/images/or-edit.png" onclick="editProduct(' + index.deliveryPointIndex + ', ' + index.receiverIndex + ', ' + index.productIndex + ', ' + typeOrder + ')">';
                        html += '</li>';
                        html += '</ul>';
                        html += '</li>';
                        html += '</ul>';
                        html += "<input type='hidden' class='codHide codHide_"+ index.deliveryPointIndex + '_' + index.receiverIndex +" codHide_"+ index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex +"' value='" + (resData.productCOD * resData.productQuantity) +"' />";
                        $('.productSuccess_' + index.deliveryPointIndex + '_' + index.receiverIndex).append(html);
                    } else if (res.type == "editProduct") {
                        //Product Name
                        $('.success_productName_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex).html(resData.productName);
                        $('.success_productName_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex).attr('productname', resData.productName);
                        //Product COD
                        $('.success_productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex).html(new Intl.NumberFormat().format(resData.productCOD * resData.productQuantity));
                        $('.success_productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex).attr('productcod', resData.productCOD * resData.productQuantity);
                        //Product Value
                        $('.success_productValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex).html(new Intl.NumberFormat().format(resData.productValue * resData.productQuantity));
                        $('.success_productValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex).attr('productvalue', resData.productValue * resData.productQuantity);
                        //Product Category
                        $('.success_productCate_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex).html(resData.productCateName);
                        $('.success_productCate_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex).attr('productcate', resData.productCate);
                        //Product Quantity
                        $('.success_productQuantity_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex).html(new Intl.NumberFormat().format(resData.productQuantity));
                        $('.success_productQuantity_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex).attr('productQuantity', resData.productQuantity);
                        $('.codHide_'+ index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex).val(resData.productCOD * resData.productQuantity)
                    }

                    //Product Name
                    $('.productName_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex).addClass('productName_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext);
                    $('.productName_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).removeClass('productName_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex);
                    $('.err_productName_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex).addClass('err_productName_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext);
                    $('.err_productName_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).removeClass('err_productName_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex);
                    $('.productName_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).attr('onblur', 'ValidateProductName(' + index.deliveryPointIndex + ', ' + index.receiverIndex + ', ' + index.productIndexNext + ')');

                    //Product COD
                    $('.productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex).addClass('productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext);
                    $('.productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).removeClass('productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex);
                    $('.err_productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex).addClass('err_productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext);
                    $('.err_productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).removeClass('err_productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex);
                    $('.productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).attr('onblur', 'ValidateProductCOD(' + index.deliveryPointIndex + ', ' + index.receiverIndex + ', ' + index.productIndexNext + ')');
                    $('.productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).attr('onkeyup', 'number_format("productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext + '", 1)');

                    //Product Value
                    $('.checkProductValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex).addClass('checkProductValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext);
                    $('.checkProductValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).removeClass('checkProductValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex);
                    $('.productValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex).addClass('productValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext);
                    $('.productValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).removeClass('productValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex);
                    $('.err_productValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex).addClass('err_productValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext);
                    $('.err_productValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).removeClass('err_productValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex);
                    $('.productValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).attr('onblur', 'ValidateProductValue(' + index.deliveryPointIndex + ', ' + index.receiverIndex + ', ' + index.productIndexNext + ')');
                    $('.productValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).attr('onkeyup', 'number_format("productValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext + '", 1)');

                    //Product Category
                    $('.productCategory_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex).addClass('productCategory_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext);
                    $('.productCategory_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).removeClass('productCategory_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex);
                    $('.err_productCategory_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex).addClass('err_productCategory_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext);
                    $('.err_productCategory_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).removeClass('err_productCategory_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex);
                    $('.productCategory_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).attr('onchange', 'ValidateProductCate(' + index.deliveryPointIndex + ', ' + index.receiverIndex + ', ' + index.productIndexNext + ')');

                    //Product Quantity
                    $('.productQuantity_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex).addClass('productQuantity_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext);
                    $('.productQuantity_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).removeClass('productQuantity_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex);
                    $('.err_productQuantity_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex).addClass('err_productQuantity_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext);
                    $('.err_productQuantity_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).removeClass('err_productQuantity_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex);
                    $('.productQuantity_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).attr('onblur', 'ValidateProductQuantity(' + index.deliveryPointIndex + ', ' + index.receiverIndex + ', ' + index.productIndexNext + ')');

                    //Button Save Product
                    $('.saveProduct_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex).addClass('saveProduct_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext);
                    $('.saveProduct_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).removeClass('saveProduct_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex);
                    $('.saveProduct_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).attr('onclick', 'saveProduct(' + index.deliveryPointIndex + ', ' + index.receiverIndex + ', ' + index.productIndexNext + ', "addProduct",' + typeOrder + ')');

                    //Clear value
                    $('.productName_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).val('');
                    $('.productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).val('0');
                    $('.checkProductValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).attr('checked');
                    $('.productValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).val('0');
                    $('.productCategory_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).val('0').trigger("chosen:updated");
                    $('.productQuantity_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).val('1');

                    //Input
                    $('.productIndexNext_' + index.deliveryPointIndex + '_' + index.receiverIndex).val(index.productIndexNext);
                    $('.addProduct_' + index.deliveryPointIndex + '_' + index.receiverIndex).removeClass('dpn');
                    $('.product_form_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('dpn');
                } else {
                    console.log('uh false mẹ nó rồi');
                }
            },
            error: function(res) {
                console.log(res);
            }
        });
    } else {
        console.log('ok oẳng rồi');
    }

    // console.log(pickProvince);
}

function addProduct(deliveryPointIndex, receiverIndex) {
    $('.addProduct_' + deliveryPointIndex + '_' + receiverIndex).addClass('dpn');
    $('.product_form_' + deliveryPointIndex + '_' + receiverIndex).removeClass('dpn');
    $('.productCategory').chosen();
    $('.chosen-container').css("width", "100%");
}

function editProduct(deliveryPointIndex, receiverIndex, productIndex, typeOrder = 0) {
    var productName = $('.success_productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).attr('productname');
    var productQuantity = $('.success_productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).attr('productquantity');
    var productCate = $('.success_productCate_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).attr('productcate');
    var productCOD = $('.success_productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).attr('productcod');
    var productValue = $('.success_productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).attr('productvalue');
    var productIndexNext = $('.productIndexNext_' + deliveryPointIndex + '_' + receiverIndex).val();

    productCOD = productCOD / productQuantity;
    productValue = productValue / productQuantity;

    $('.addProduct_' + deliveryPointIndex + '_' + receiverIndex).addClass('dpn');
    $('.product_form_' + deliveryPointIndex + '_' + receiverIndex).removeClass('dpn');
    $('.productCategory').chosen();
    $('.chosen-container').css("width", "100%");

    //Product Name
    $('.productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext).addClass('productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex);
    $('.productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).removeClass('productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext);
    $('.err_productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext).addClass('err_productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex);
    $('.err_productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).removeClass('err_productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext);
    $('.productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).attr('onblur', 'ValidateProductName(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + productIndex + ')');

    //Product COD
    $('.productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext).addClass('productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex);
    $('.productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).removeClass('productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext);
    $('.err_productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext).addClass('err_productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex);
    $('.err_productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).removeClass('err_productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext);
    $('.productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).attr('onblur', 'ValidateProductCOD(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + productIndex + ')');
    $('.productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).attr('onkeyup', 'number_format("productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex + '", 1)');

    //Product Value
    $('.checkProductValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext).addClass('checkProductValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex);
    $('.checkProductValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).removeClass('checkProductValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext);
    $('.productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext).addClass('productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex);
    $('.productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).removeClass('productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext);
    $('.err_productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext).addClass('err_productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex);
    $('.err_productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).removeClass('err_productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext);
    $('.productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).attr('onblur', 'ValidateProductValue(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + productIndex + ')');
    $('.productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).attr('onkeyup', 'number_format("productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex + '", 1)');

    //Product Category
    $('.productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext).addClass('productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex);
    $('.productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).removeClass('productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext);
    $('.err_productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext).addClass('err_productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex);
    $('.err_productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).removeClass('err_productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext);
    $('.productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).attr('onchange', 'ValidateProductCate(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + productIndex + ')');

    //Product Quantity
    $('.productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext).addClass('productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex);
    $('.productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).removeClass('productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext);
    $('.err_productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext).addClass('err_productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex);
    $('.err_productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).removeClass('err_productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext);
    $('.productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).attr('onblur', 'ValidateProductQuantity(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + productIndex + ')');

    //Set Value
    // (new Intl.NumberFormat().format(productCOD)
    formatCOD = new Intl.NumberFormat().format(productCOD);
    formatValue = new Intl.NumberFormat().format(productValue);

    $('.productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val(productName);
    $('.productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val(formatCOD);
    $('.productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val(formatValue);
    $('.productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val(productCate).trigger('chosen:updated');
    $('.productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val(productQuantity);
    $('.productIndexNext_' + deliveryPointIndex + '_' + receiverIndex).val(productIndexNext);

    //Button Save Product
    $('.saveProduct_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext).addClass('saveProduct_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex);
    $('.saveProduct_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).removeClass('saveProduct_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext);
    $('.saveProduct_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).attr('onclick', 'saveProduct(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + productIndex + ', "editProduct",' + typeOrder + ')');
}

function saveReceiver(deliveryPointIndex, receiverIndex, type, typeOrder = 0) {
    var error = 0;
    var orderId = $('.orderId').val();
    if(orderId != 0){
        typeOrder = 1;
    }
    // Người gửi
    var pickupAddressId = 0;
    var pickName = '';
    var pickPhone = '';
    var pickAddress = '';
    var pickProvince = '';
    var pickDistrict = '';
    var pickWard = '';
    pickupAddressId = $('#orders').find('.choosePickUpAddress').attr('pickupaddressid');
    if (pickupAddressId <= 0 || pickupAddressId == '' || pickupAddressId == null) {
        pickName = $('#orders').find('.pickName').val();
        pickPhone = $('#orders').find('.pickPhone').val();
        pickAddress = $('#orders').find('.pickAddress').val();
        pickProvince = $('#orders').find('.pickProvince').val();
        pickDistrict = $('#orders').find('.pickDistrict').val();
        pickWard = $('#orders').find('.pickWard').val();
        if (pickName == '' || pickName == null) {
            $('.err_pickName').html('Tên người gửi không được để trống');
            error = 1;
        }
        if (pickPhone == '' || pickPhone == null) {
            $('.err_pickPhone').html('Số điện thoại người gửi không được để trống');
        } else {
            checkpickPhone = validatePhone(pickPhone);
            if (!checkpickPhone) {
                $('.err_pickPhone').html('Số điện thoại người gửi không hợp lệ');
                error = 1;
            } else {
                $('.err_pickPhone').html('');
            }
        }
        if (pickAddress == '' || pickAddress == null) {
            $('.err_pickAddress').html('Địa chỉ người gửi không được để trống');
            error = 1;
        }
        if (pickProvince <= 0 || pickProvince == '' || pickProvince == null) {
            $('.err_pickProvince').html('Tỉnh/thành người gửi không được để trống');
            error = 1;
        }
        if (pickDistrict <= 0 || pickDistrict == '' || pickDistrict == null) {
            $('.err_pickDistrict').html('Quận/huyện người gửi không được để trống');
            error = 1;
        }
        if (pickWard <= 0 || pickWard == '' || pickWard == null) {
            $('.err_pickWard').html('Phường/xã người gửi không được để trống');
            error = 1;
        }
    }

    //Điểm giao & thông tin người nhận
    var deliveryPointIndex = deliveryPointIndex;
    var receiverIndex = receiverIndex;

    // Địa chỉ người nhận
    var deliveryAddress = $('#OrderSingle').find('.address_' + deliveryPointIndex).val();
    var deliveryPorvince = $('#OrderSingle').find('#provinceReceiver_' + deliveryPointIndex).val();
    var deliveryDistrict = $('#OrderSingle').find('#districtReceiver_' + deliveryPointIndex).val();
    var deliveryWard = $('#OrderSingle').find('#wardReceiver_' + deliveryPointIndex).val();
    if (deliveryAddress == '' || deliveryAddress == null) {
        $('.err_address_' + deliveryPointIndex).html('Địa chỉ người nhận không được để trống');
        error = 1;
    }
    if (deliveryPorvince == '' || deliveryPorvince == null || deliveryPorvince == 0) {
        $('.err_province_' + deliveryPointIndex).html('Tỉnh/thành người nhận không được để trống');
        error = 1;
    }
    if (deliveryDistrict == '' || deliveryDistrict == null || deliveryDistrict == 0) {
        $('.err_district_' + deliveryPointIndex).html('Quận/huyện người nhận không được để trống');
        error = 1;
    }
    if (deliveryWard == '' || deliveryWard == null || deliveryWard == 0) {
        $('.err_ward_' + deliveryPointIndex).html('Phường/xã người nhận không được để trống');
        error = 1;
    }

    // Thông tin người nhận
    var receiverPhone = $('#OrderSingle').find('.receiverPhone_' + deliveryPointIndex + '_' + receiverIndex).val();
    var receiverName = $('#OrderSingle').find('.receiverName_' + deliveryPointIndex + '_' + receiverIndex).val();
    var expectDate = $('#OrderSingle').find('.expectDate_' + deliveryPointIndex + '_' + receiverIndex).val();
    var expectTime = $('#OrderSingle').find('.expectTime_' + deliveryPointIndex + '_' + receiverIndex).val();

    if (receiverPhone == '' || receiverPhone == null) {
        $('.err_receiverPhone_' + deliveryPointIndex + '_' + receiverIndex).html('Số điện thoại người nhận không được để trống');
        error = 1;
    } else {
        check = validatePhone(receiverPhone);
        if (!check) {
            $('.err_receiverPhone_' + deliveryPointIndex + '_' + receiverIndex).html('Số điện thoại người nhận không hợp lệ');
            error = 1;
        } else {
            $('.err_receiverPhone_' + deliveryPointIndex + '_' + receiverIndex).html('');
        }
    }
    if (receiverName.length == 0) {
        $('.err_receiverName_' + deliveryPointIndex + '_' + receiverIndex).html('Tên người nhận không được để trống');
        error = 1;
    } else if (receiverName.length < 2) {
        $('.err_receiverName_' + deliveryPointIndex + '_' + receiverIndex).html('Tên người nhận quá ngắn');
        error = 1;
    } else {
        $('.err_receiverName_' + deliveryPointIndex + '_' + receiverIndex).html('');
    }

    //Thông tin đơn hàng
    if ($('ul').hasClass('productDetail_' + deliveryPointIndex + '_' + receiverIndex + '_1') == false) {
        $('.err_saveProduct_' + deliveryPointIndex + '_' + receiverIndex + '_1').html('Bạn chưa lưu sản phẩm nào');
        error = 1;
    } else {
        $('.err_saveProduct_' + deliveryPointIndex + '_' + receiverIndex + '_1').html('');
    }

    //Thông tin đơn hàng
    var length = $('.length_' + deliveryPointIndex + '_' + receiverIndex).val();
    var width = $('.width_' + deliveryPointIndex + '_' + receiverIndex).val();
    var height = $('.height_' + deliveryPointIndex + '_' + receiverIndex).val();
    var weight = $('.weight_' + deliveryPointIndex + '_' + receiverIndex).val().replace(/\./g, '');
    var note = $('.note_' + deliveryPointIndex + '_' + receiverIndex).val();
    var requireNote = $('.requireNote_' + deliveryPointIndex + '_' + receiverIndex).val();
    var isFree = 1;
    var partialDelivery = 0;
    var isRefund = 0;
    var isDoorDeliver = 0;
    var isPorter = 0;
    var pickupType = 2;
    var isReturn = 0;
    // sizeSplit = size.split("-", 3);
    // var length = sizeSplit['0'];
    // var width = sizeSplit['1'];
    // var height = sizeSplit['2'];

    $('input.isFreeNo_' + deliveryPointIndex + '_' + receiverIndex + ':radio:checked').each(function() {
        isFree = $(this).val();
    });
    // $('input.partialDeliveryYes_' + deliveryPointIndex + '_' + receiverIndex + ':radio:checked').each(function() {
    //     partialDelivery = $(this).val();
    // });
    $('input.isRefundYes_' + deliveryPointIndex + '_' + receiverIndex + ':radio:checked').each(function() {
        isRefund = $(this).val();
    });
    $('input.pickupTypeYes_' + deliveryPointIndex + '_' + receiverIndex + ':radio:checked').each(function() {
        pickupType = $(this).val();
    });
    if ($('.isDoorDeliver_' + deliveryPointIndex + '_' + receiverIndex).is(":checked") == true) {
        isDoorDeliver = 1;
    }
    if ($('.isPorter_' + deliveryPointIndex + '_' + receiverIndex).is(":checked") == true) {
        isPorter = 1;
    }
    if (length == '' || length == null) {
        $('.err_size_' + deliveryPointIndex + '_' + receiverIndex).html('Chiều dài không được để trống');
        error = 1;
    } else if (length <= 0) {
        $('.err_size_' + deliveryPointIndex + '_' + receiverIndex).html('Chiều dài phải lớn hơn 0');
        error = 1;
    }
    if (width == '' || width == null) {
        $('.err_size_' + deliveryPointIndex + '_' + receiverIndex).html('Chiều rộng không được để trống');
        error = 1;
    } else if (width <= 0) {
        $('.err_size_' + deliveryPointIndex + '_' + receiverIndex).html('Chiều rộng phải lớn hơn 0');
        error = 1;
    }
    if (height == '' || height == null) {
        $('.err_size_' + deliveryPointIndex + '_' + receiverIndex).html('Chiều cao không được để trống');
        error = 1;
    } else if (height <= 0) {
        $('.err_size_' + deliveryPointIndex + '_' + receiverIndex).html('Chiều cao phải lớn hơn 0');
        error = 1;
    }
    if (weight == '' || weight == null) {
        $('.err_weight_' + deliveryPointIndex + '_' + receiverIndex).html('Không được để trống');
        error = 1;
    } else if (weight <= 0) {
        $('.err_weight_' + deliveryPointIndex + '_' + receiverIndex).html('Cân nặng lớn hơn 0');
        error = 1;
    }

    // $('input.isReturnYes_' + deliveryPointIndex + '_' + receiverIndex + ':radio:checked').each(function() {
    //     isReturn = $(this).val();
    // });
    var productIndexNext = $('#OrderSingle').find('.productIndexNext_' + deliveryPointIndex + '_' + receiverIndex).val();
    // Xử lý Ajax thêm sản phẩm
    if (error == 0) {
        $.ajax({
            url: '/vi/saveReceiverItem',
            type: 'post',
            dataType: 'json',
            data: {
                'deliveryPointIndex': deliveryPointIndex,
                'receiverIndex': receiverIndex,
                'productIndexNext': productIndexNext,
                'pickupAddressId': pickupAddressId,
                'pickName': pickName,
                'pickPhone': pickPhone,
                'pickAddress': pickAddress,
                'pickProvince': pickProvince,
                'pickDistrict': pickDistrict,
                'pickWard': pickWard,
                'deliveryAddress': deliveryAddress,
                'deliveryPorvince': deliveryPorvince,
                'deliveryDistrict': deliveryDistrict,
                'deliveryWard': deliveryWard,
                'receiverPhone': receiverPhone,
                'receiverName': receiverName,
                'expectDate': expectDate,
                'expectTime': expectTime,
                'length': length,
                'width': width,
                'height': height,
                'weight': weight,
                'note': note,
                'requireNote': requireNote,
                'isFree': isFree,
                'partialDelivery': partialDelivery,
                'isRefund': isRefund,
                'isDoorDeliver': isDoorDeliver,
                'isPorter': isPorter,
                'pickupType': pickupType,
                'type': type,
                'typeOrder': typeOrder,
                'isReturn': isReturn
            },
            success: function(res) {
                if (res.success) {
                    var index = jQuery.parseJSON(res.index);
                    var resData = jQuery.parseJSON(res.resData);
                    var dataOrders = jQuery.parseJSON(res.dataOrders);
                    var points = dataOrders.deliveryPoint;
                    var receivers = points[deliveryPointIndex - 1].receivers[receiverIndex - 1];
                    var items = receivers.items;
                    var totalPoints = points.length;

                    if (res.type == "addReceiver") {
                        $('.receiverInfo').show();
                        var html = '<div class="row w100 successReceiver afOrder_' + index.deliveryPointIndex + '_' + index.receiverIndex + '">';
                        html += '<div class=" col-lg-3 col-md-12 senderItems" style="position: relative;">';
                        html += '<span class="or-dh-stt success_receiverIndex_' + index.deliveryPointIndex + '_' + index.receiverIndex + '" style="background: #8D869D;position: absolute; line-height:15px;">' + index.receiverIndex + '</span>';
                        html += '<ul style="padding: 0px 40px;">';
                        html += '<li class = "fz13 success_receiverPhone_' + index.deliveryPointIndex + '_' + index.receiverIndex + '">' + resData.receiverPhone + '</li>';
                        html += '<li class = "fz13 success_receiverName_' + index.deliveryPointIndex + '_' + index.receiverIndex + '" style="color:#68656D">' + resData.receiverName + '</li>';
                        html += '</ul>';
                        html += '</div>';
                        html += '<div class=" col-lg-8 col-md-12">';
                        $.each(items, function(i, item) {
                            html += '<div class="row">';
                            html += '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13 success_receiverItem_productName_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + (i + 1) + '"><span>' + item.productName + '</span></div>';
                            html += '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13 success_receiverItem_productQuantity_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + (i + 1) + '">SL: <span class="colorPurple">' + (new Intl.NumberFormat().format(item.productQuantity)) + '</span></div>';
                            html += '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13 success_receiverItem_productCod_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + (i + 1) + '">COD: <span class="colorOrange">' + (new Intl.NumberFormat().format(item.productCOD * item.productQuantity)) + '</span> đ</div>';
                            html += '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13 success_receiverItem_productValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + (i + 1) + '">Khai giá: ' + (new Intl.NumberFormat().format(item.productValue * item.productQuantity)) + ' đ</div>';
                            html += '</div>';
                        });
                        html += '</div>';
                        html += '<div class=" col-lg-1 col-md-12 col-sm-6 col-xs-6 buttonItems">';
                        html += '<span><img class="removeReceiver" src="/public/images/or-delete.png" onclick="removeReceiverConfirm(' + index.deliveryPointIndex + ', ' + index.receiverIndex + ',' + typeOrder + ')"></span>';
                        html += '<span><img class="editReceiver" src="/public/images/or-edit.png" onclick="editReceiver(' + index.deliveryPointIndex + ', ' + index.receiverIndex + ',' + typeOrder + ')"></span>';
                        html += '</div>';
                        html += '</div>';
                        $('.afOrder_' + index.deliveryPointIndex).append(html);
                        if (totalPoints > index.deliveryPointIndex) {
                            $('.form_receiverOrder_' + index.deliveryPointIndex).hide(300);
                            $('.addProductItem_' + index.deliveryPointIndex).removeClass('dpn');
                        }
                    } else if (res.type == "editReceiver") {
                        $('.success_receiverIndex_' + index.deliveryPointIndex + '_' + index.receiverIndex).html(index.receiverIndex);
                        $('.success_receiverPhone_' + index.deliveryPointIndex + '_' + index.receiverIndex).html(receivers.receiverPhone);
                        $('.success_receiverName_' + index.deliveryPointIndex + '_' + index.receiverIndex).html(receivers.receiverName);

                        var html = '<div class=" col-lg-3 col-md-12 senderItems" style="position: relative;">';
                        html += '<span class="or-dh-stt success_receiverIndex_' + index.deliveryPointIndex + '_' + index.receiverIndex + '" style="background: #8D869D;position: absolute; line-height:15px;">' + index.receiverIndex + '</span>';
                        html += '<ul style="padding: 0px 40px;">';
                        html += '<li class = "fz13 success_receiverPhone_' + index.deliveryPointIndex + '_' + index.receiverIndex + '">' + receivers.receiverPhone + '</li>';
                        html += '<li class = "fz13 success_receiverName_' + index.deliveryPointIndex + '_' + index.receiverIndex + '" style="color:#68656D">' + receivers.receiverName + '</li>';
                        html += '</ul>';
                        html += '</div>';
                        html += '<div class=" col-lg-8 col-md-12">';
                        $.each(items, function(i, item) {
                            html += '<div class="row">';
                            html += '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13 success_receiverItem_productName_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + (i + 1) + '"><span>' + item.productName + '</span></div>';
                            html += '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13 success_receiverItem_productQuantity_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + (i + 1) + '">SL: <span class="colorPurple">' + (new Intl.NumberFormat().format(item.productQuantity)) + '</span></div>';
                            html += '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13 success_receiverItem_productCod_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + (i + 1) + '">COD: <span class="colorOrange">' + (new Intl.NumberFormat().format(item.productCOD * item.productQuantity)) + '</span> đ</div>';
                            html += '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13 success_receiverItem_productValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + (i + 1) + '">Khai giá: ' + (new Intl.NumberFormat().format(item.productValue * item.productQuantity)) + ' đ</div>';
                            html += '</div>';
                        });
                        html += '</div>';
                        html += '<div class=" col-lg-1 col-md-12 col-sm-6 col-xs-6 buttonItems">';
                        html += '<span><img class="removeReceiver" src="/public/images/or-delete.png" onclick="removeReceiverConfirm(' + index.deliveryPointIndex + ', ' + index.receiverIndex + ',' + typeOrder + ')"></span>';
                        html += '<span><img class="editReceiver" src="/public/images/or-edit.png" onclick="editReceiver(' + index.deliveryPointIndex + ', ' + index.receiverIndex + ',' + typeOrder + ')"></span>';
                        html += '</div>';
                        $('.afOrder_' + index.deliveryPointIndex + '_' + index.receiverIndex).html('');
                        $('.afOrder_' + index.deliveryPointIndex + '_' + index.receiverIndex).append(html);
                    }

                    //Receiver Info
                    //Receiver Phone
                    $('.receiverPhone_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('receiverPhone_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.receiverPhone_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('receiverPhone_' + index.deliveryPointIndex + '_' + index.receiverIndex);
                    $('.err_receiverPhone_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('err_receiverPhone_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.err_receiverPhone_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('err_receiverPhone_' + index.deliveryPointIndex + '_' + index.receiverIndex);
                    $('.receiverPhone_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).attr('onblur', 'ValidateReceiverPhone(' + index.deliveryPointIndex + ', ' + index.receiverIndexNext + ')');

                    //Receiver Name
                    $('.receiverName_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('receiverName_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.receiverName_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('receiverName_' + index.deliveryPointIndex + '_' + index.receiverIndex);
                    $('.err_receiverName_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('err_receiverName_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.err_receiverName_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('err_receiverName_' + index.deliveryPointIndex + '_' + index.receiverIndex);
                    $('.receiverName_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).attr('onblur', 'ValidateReceiverName(' + index.deliveryPointIndex + ', ' + index.receiverIndexNext + ')');

                    //Receiver ExpectDate
                    $('.expectDate_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('expectDate_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.expectDate_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('expectDate_' + index.deliveryPointIndex + '_' + index.receiverIndex);

                    //Receiver ExpectTime
                    $('.expectTime_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('expectTime_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.expectTime_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('expectTime_' + index.deliveryPointIndex + '_' + index.receiverIndex);

                    //Receiver Service (Length)
                    $('.length_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('length_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.length_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('length_' + index.deliveryPointIndex + '_' + index.receiverIndex);
                    $('.err_length_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('err_length_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.err_length_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('err_length_' + index.deliveryPointIndex + '_' + index.receiverIndex);
                    $('.length_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).attr('onblur', 'ValidateLength(' + index.deliveryPointIndex + ', ' + index.receiverIndexNext + ')');

                    //Receiver Service (Width)
                    $('.width_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('width_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.width_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('width_' + index.deliveryPointIndex + '_' + index.receiverIndex);
                    $('.err_width_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('err_width_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.err_width_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('err_width_' + index.deliveryPointIndex + '_' + index.receiverIndex);
                    $('.width_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).attr('onblur', 'ValidateWidth(' + index.deliveryPointIndex + ', ' + index.receiverIndexNext + ')');

                    //Receiver Service (Height)
                    $('.height_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('height_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.height_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('height_' + index.deliveryPointIndex + '_' + index.receiverIndex);
                    $('.err_height_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('err_height_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.err_height_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('err_height_' + index.deliveryPointIndex + '_' + index.receiverIndex);
                    $('.height_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).attr('onblur', 'ValidateHeight(' + index.deliveryPointIndex + ', ' + index.receiverIndexNext + ')');

                    //Receiver Service (Weight)
                    $('.weight_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('weight_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.weight_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('weight_' + index.deliveryPointIndex + '_' + index.receiverIndex);
                    $('.err_weight_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('err_weight_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.err_weight_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('err_weight_' + index.deliveryPointIndex + '_' + index.receiverIndex);
                    $('.weight_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).attr('onblur', 'ValidateWeight(' + index.deliveryPointIndex + ', ' + index.receiverIndexNext + ')');
                    $('.weight_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).attr('onkeyup', "number_format('weight_" + index.deliveryPointIndex + "_" + index.receiverIndexNext + "', 2)");

                    //Receiver Service (Note)
                    $('.note_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('note_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.note_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('note_' + index.deliveryPointIndex + '_' + index.receiverIndex);

                    //Receiver Service (isFree)
                    $('.isFreeYes_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('isFreeYes_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.isFreeYes_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('isFreeYes_' + index.deliveryPointIndex + '_' + index.receiverIndex);
                    $('.isFreeNo_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('isFreeNo_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.isFreeNo_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('isFreeNo_' + index.deliveryPointIndex + '_' + index.receiverIndex);

                    //Receiver Service (Partial Delivery)
                    $('.partialDeliveryYes_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('partialDeliveryYes_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.partialDeliveryYes_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('partialDeliveryYes_' + index.deliveryPointIndex + '_' + index.receiverIndex);
                    $('.partialDeliveryNo_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('partialDeliveryNo_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.partialDeliveryNo_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('partialDeliveryNo_' + index.deliveryPointIndex + '_' + index.receiverIndex);

                    //Receiver Service (isFree)
                    $('.isRefundYes_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('isRefundYes_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.isRefundYes_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('isRefundYes_' + index.deliveryPointIndex + '_' + index.receiverIndex);
                    $('.isRefundYes_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).attr('keypoint', index.deliveryPointIndex + '_' + index.receiverIndex);
                    $('.isRefundNo_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('isRefundNo_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.isRefundNo_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('isRefundNo_' + index.deliveryPointIndex + '_' + index.receiverIndex);
                    $('.isRefundNo_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).attr('keypoint', index.deliveryPointIndex + '_' + index.receiverIndex);

                    
                    //Receiver Service (isReturn)
                    $('.isReturnYes_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('isReturnYes_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.isReturnYes_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('isReturnYes_' + index.deliveryPointIndex + '_' + index.receiverIndex);
                    $('.isReturnNo_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('isReturnNo_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.isReturnNo_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('isReturnNo_' + index.deliveryPointIndex + '_' + index.receiverIndex);

                    //Receiver Service (isDoorDeliver, isPorter)
                    $('.isDoorDeliver_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('isDoorDeliver_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.isDoorDeliver_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('isDoorDeliver_' + index.deliveryPointIndex + '_' + index.receiverIndex);
                    $('.isPorter_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('isPorter_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.isPorter_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('isPorter_' + index.deliveryPointIndex + '_' + index.receiverIndex);

                    //Receiver Service (pickupType)
                    $('.pickupTypeYes_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('pickupTypeYes_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.pickupTypeYes_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('pickupTypeYes_' + index.deliveryPointIndex + '_' + index.receiverIndex);
                    $('.pickupTypeNo_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('pickupTypeNo_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.pickupTypeNo_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('pickupTypeNo_' + index.deliveryPointIndex + '_' + index.receiverIndex);

                    //Receiver Service (requireNote)
                    $('.requireNote_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('requireNote_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.requireNote_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('requireNote_' + index.deliveryPointIndex + '_' + index.receiverIndex);

                    //Button Cancel
                    $('.cancelReceiver_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('cancelReceiver_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.cancelReceiver_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('cancelReceiver_' + index.deliveryPointIndex + '_' + index.receiverIndex);
                    $('.cancelReceiver_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).attr('onclick', 'removeReceiver(' + index.deliveryPointIndex + ', ' + index.receiverIndexNext + ')');

                    //Button Save Receiver
                    $('.saveReceiver_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('saveReceiver_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.saveReceiver_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('saveReceiver_' + index.deliveryPointIndex + '_' + index.receiverIndex);
                    $('.saveReceiver_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).attr('onclick', 'saveReceiver(' + index.deliveryPointIndex + ', ' + index.receiverIndexNext + ', "addReceiver", ' + typeOrder + ')');

                    //Clear Receiver value
                    $('.form_receiverIndex').html(index.receiverIndexNext);
                    $('.productSuccess_' + index.deliveryPointIndex + '_' + index.receiverIndex).html('');
                    $('.receiverPhone_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).val('');
                    $('.receiverName_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).val('');
                    $('.expectDate_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).val(' ');
                    $('.expectTime_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).val('');
                    $('.length_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).val('10');
                    $('.width_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).val('10');
                    $('.height_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).val('10');
                    $('.weight_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).val('0');
                    $('.note_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).val('');
                    $('.isFreeYes_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).prop('checked',true);
                    $('.partialDeliveryYes_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).prop('checked',true);
                    $('.isRefundYes_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).prop('checked',true);
                    $('.isReturnNo_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).prop('checked',true);
                    $('.isDoorDeliver_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeAttr('checked');
                    $('.isPorter_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeAttr('checked');
                    $('.pickupTypeNo_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).prop('checked',true);
                    $('.requireNote_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).val('3').trigger("chosen:updated");

                    //Product Info
                    //Product Success
                    $('.productSuccess_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('productSuccess_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.productSuccess_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('productSuccess_' + index.deliveryPointIndex + '_' + index.receiverIndex);

                    //Product Name
                    $('.productName_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).addClass('productName_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex);
                    $('.productName_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex).removeClass('productName_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext);
                    $('.err_productName_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).addClass('err_productName_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex);
                    $('.err_productName_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex).removeClass('err_productName_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext);
                    $('.productName_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex).attr('onblur', 'ValidateProductName(' + index.deliveryPointIndex + ', ' + index.receiverIndexNext + ', ' + index.productIndex + ')');

                    //Product COD
                    $('.productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).addClass('productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex);
                    $('.productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex).removeClass('productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext);
                    $('.err_productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).addClass('err_productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex);
                    $('.err_productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex).removeClass('err_productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext);
                    $('.productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex).attr('onblur', 'ValidateProductCOD(' + index.deliveryPointIndex + ', ' + index.receiverIndexNext + ', ' + index.productIndex + ')');
                    $('.productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex).attr('onkeyup', 'number_format("productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex + '", 1)');

                    //Product Value
                    $('.checkProductValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).addClass('checkProductValue_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex);
                    $('.checkProductValue_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex).removeClass('checkProductValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext);
                    $('.productValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).addClass('productValue_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex);
                    $('.productValue_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex).removeClass('productValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext);
                    $('.err_productValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).addClass('err_productValue_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex);
                    $('.err_productValue_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex).removeClass('err_productValue_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext);
                    $('.productValue_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex).attr('onblur', 'ValidateProductValue(' + index.deliveryPointIndex + ', ' + index.receiverIndexNext + ', ' + index.productIndex + ')');
                    $('.productValue_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex).attr('onkeyup', 'number_format("productValue_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex + '", 1)');

                    //Product Category
                    $('.productCategory_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).addClass('productCategory_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex);
                    $('.productCategory_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex).removeClass('productCategory_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext);
                    $('.err_productCategory_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).addClass('err_productCategory_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex);
                    $('.err_productCategory_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex).removeClass('err_productCategory_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext);
                    $('.productCategory_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex).attr('onchange', 'ValidateProductCate(' + index.deliveryPointIndex + ', ' + index.receiverIndexNext + ', ' + index.productIndex + ')');

                    //Product Quantity
                    $('.productQuantity_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).addClass('productQuantity_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex);
                    $('.productQuantity_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex).removeClass('productQuantity_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext);
                    $('.err_productQuantity_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).addClass('err_productQuantity_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex);
                    $('.err_productQuantity_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex).removeClass('err_productQuantity_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext);
                    $('.productQuantity_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex).attr('onblur', 'ValidateProductQuantity(' + index.deliveryPointIndex + ', ' + index.receiverIndexNext + ', ' + index.productIndex + ')');

                    //Button Save Product
                    $('.saveProduct_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext).addClass('saveProduct_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex);
                    $('.saveProduct_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex).removeClass('saveProduct_' + index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndexNext);
                    $('.saveProduct_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex).attr('onclick', 'saveProduct(' + index.deliveryPointIndex + ', ' + index.receiverIndexNext + ', ' + index.productIndex + ', "addProduct",' + typeOrder + ')');

                    //Product Index Next
                    $('.productIndexNext_' + index.deliveryPointIndex + '_' + index.receiverIndex).addClass('productIndexNext_' + index.deliveryPointIndex + '_' + index.receiverIndexNext);
                    $('.productIndexNext_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).removeClass('productIndexNext_' + index.deliveryPointIndex + '_' + index.receiverIndex);

                    //Clear Product value
                    $('.productName_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex).val('');
                    $('.productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex).val('0');
                    $('.checkProductValue_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex).attr('checked');
                    $('.productValue_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex).val('0');
                    $('.productCategory_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex).val('0').trigger("chosen:updated");
                    $('.productQuantity_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex).val('1');
                    $('.productIndexNext_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).val(index.productIndex);

                    $('.form_receiverOrder_' + index.deliveryPointIndex).hide();
                    $('.addReceiver_' + index.deliveryPointIndex).removeClass('dpn');
                    $('.addReceiver_' + index.deliveryPointIndex).attr('onclick', 'addReceiver(' + index.deliveryPointIndex + ', ' + index.receiverIndex + ')');
                } else {
                    console.log('res', res)
                    // if(res.classCheckRefund){
                        // $('#modalConfirmChangeRefund').modal('show');
                    // }
                    if(res.status == 1){
                        $('#modalConfirmChangeRefund').modal('show');
                        $('.bodyCheckCodValueText').html(res.data)
                    }
                }
            },
            error: function(res) {
                console.log(res);
            }
        });
    } else {
        console.log('ok oẳng rồi');
    }
}

function editReceiver(deliveryPointIndex, receiverIndex, typeOrder = 0) {
    $('.text_receiverIndex_' + receiverIndex).html('Sửa đơn hàng chi tiết');
    $.ajax({
        url: '/vi/getReceiverItem',
        type: 'post',
        dataType: 'json',
        data: {
            'deliveryPointIndex': deliveryPointIndex,
            'receiverIndex': receiverIndex,
            'typeOrder': typeOrder,
        },
        success: function(res) {
            if (res.success) {
                var dataOrders = jQuery.parseJSON(res.dataOrders);
                var point = dataOrders.deliveryPoint[deliveryPointIndex - 1];
                var receivers = point.receivers[receiverIndex - 1];
                var items = receivers.items;
                console.log(res)

                //Receiver Info
                //Receiver Phone
                $('.receiverPhone_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('receiverPhone_' + deliveryPointIndex + '_' + receiverIndex);
                $('.receiverPhone_' + deliveryPointIndex + '_' + receiverIndex).removeClass('receiverPhone_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);
                $('.err_receiverPhone_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('err_receiverPhone_' + deliveryPointIndex + '_' + receiverIndex);
                $('.err_receiverPhone_' + deliveryPointIndex + '_' + receiverIndex).removeClass('err_receiverPhone_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);
                $('.receiverPhone_' + deliveryPointIndex + '_' + receiverIndex).attr('onblur', 'ValidateReceiverPhone(' + deliveryPointIndex + ', ' + receiverIndex + ')');

                //Receiver Name
                $('.receiverName_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('receiverName_' + deliveryPointIndex + '_' + receiverIndex);
                $('.receiverName_' + deliveryPointIndex + '_' + receiverIndex).removeClass('receiverName_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);
                $('.err_receiverName_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('err_receiverName_' + deliveryPointIndex + '_' + receiverIndex);
                $('.err_receiverName_' + deliveryPointIndex + '_' + receiverIndex).removeClass('err_receiverName_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);
                $('.receiverName_' + deliveryPointIndex + '_' + receiverIndex).attr('onblur', 'ValidateReceiverName(' + deliveryPointIndex + ', ' + receiverIndex + ')');

                //Receiver ExpectDate
                $('.expectDate_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('expectDate_' + deliveryPointIndex + '_' + receiverIndex);
                $('.expectDate_' + deliveryPointIndex + '_' + receiverIndex).removeClass('expectDate_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);

                //Receiver ExpectTime
                $('.expectTime_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('expectTime_' + deliveryPointIndex + '_' + receiverIndex);
                $('.expectTime_' + deliveryPointIndex + '_' + receiverIndex).removeClass('expectTime_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);

                //Receiver Service (Length)
                $('.length_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('length_' + deliveryPointIndex + '_' + receiverIndex);
                $('.length_' + deliveryPointIndex + '_' + receiverIndex).removeClass('length_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);
                $('.err_length_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('err_length_' + deliveryPointIndex + '_' + receiverIndex);
                $('.err_length_' + deliveryPointIndex + '_' + receiverIndex).removeClass('err_length_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);
                $('.length_' + deliveryPointIndex + '_' + receiverIndex).attr('onblur', 'ValidateLength(' + deliveryPointIndex + ', ' + receiverIndex + ')');

                //Receiver Service (Width)
                $('.width_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('width_' + deliveryPointIndex + '_' + receiverIndex);
                $('.width_' + deliveryPointIndex + '_' + receiverIndex).removeClass('width_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);
                $('.err_width_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('err_width_' + deliveryPointIndex + '_' + receiverIndex);
                $('.err_width_' + deliveryPointIndex + '_' + receiverIndex).removeClass('err_width_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);
                $('.width_' + deliveryPointIndex + '_' + receiverIndex).attr('onblur', 'ValidateWidth(' + deliveryPointIndex + ', ' + receiverIndex + ')');

                //Receiver Service (Height)
                $('.height_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('height_' + deliveryPointIndex + '_' + receiverIndex);
                $('.height_' + deliveryPointIndex + '_' + receiverIndex).removeClass('height_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);
                $('.err_height_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('err_height_' + deliveryPointIndex + '_' + receiverIndex);
                $('.err_height_' + deliveryPointIndex + '_' + receiverIndex).removeClass('err_height_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);
                $('.height_' + deliveryPointIndex + '_' + receiverIndex).attr('onblur', 'ValidateHeight(' + deliveryPointIndex + ', ' + receiverIndex + ')');

                //Receiver Service (Weight)
                $('.weight_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('weight_' + deliveryPointIndex + '_' + receiverIndex);
                $('.weight_' + deliveryPointIndex + '_' + receiverIndex).removeClass('weight_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);
                $('.err_weight_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('err_weight_' + deliveryPointIndex + '_' + receiverIndex);
                $('.err_weight_' + deliveryPointIndex + '_' + receiverIndex).removeClass('err_weight_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);
                $('.weight_' + deliveryPointIndex + '_' + receiverIndex).attr('onblur', 'ValidateWeight(' + deliveryPointIndex + ', ' + receiverIndex + ')');
                $('.weight_' + deliveryPointIndex + '_' + receiverIndex).attr('onkeyup', "number_format('weight_" + deliveryPointIndex + "_" + receiverIndex + "', 2)");

                //Receiver Service (Note)
                $('.note_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('note_' + deliveryPointIndex + '_' + receiverIndex);
                $('.note_' + deliveryPointIndex + '_' + receiverIndex).removeClass('note_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);

                //Receiver Service (isFree)
                $('.isFreeYes_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('isFreeYes_' + deliveryPointIndex + '_' + receiverIndex);
                $('.isFreeYes_' + deliveryPointIndex + '_' + receiverIndex).removeClass('isFreeYes_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);
                $('.isFreeNo_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('isFreeNo_' + deliveryPointIndex + '_' + receiverIndex);
                $('.isFreeNo_' + deliveryPointIndex + '_' + receiverIndex).removeClass('isFreeNo_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);

                //Receiver Service (Partial Delivery)
                $('.partialDeliveryYes_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('partialDeliveryYes_' + deliveryPointIndex + '_' + receiverIndex);
                $('.partialDeliveryYes_' + deliveryPointIndex + '_' + receiverIndex).removeClass('partialDeliveryYes_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);
                $('.partialDeliveryNo_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('partialDeliveryNo_' + deliveryPointIndex + '_' + receiverIndex);
                $('.partialDeliveryNo_' + deliveryPointIndex + '_' + receiverIndex).removeClass('partialDeliveryNo_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);

                //Receiver Service (isRefund)
                $('.isRefundYes_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('isRefundYes_' + deliveryPointIndex + '_' + receiverIndex);
                $('.isRefundYes_' + deliveryPointIndex + '_' + receiverIndex).removeClass('isRefundYes_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);
                $('.isRefundNo_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('isRefundNo_' + deliveryPointIndex + '_' + receiverIndex);
                $('.isRefundNo_' + deliveryPointIndex + '_' + receiverIndex).removeClass('isRefundNo_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);

                //Receiver Service (isDoorDeliver, isPorter)
                $('.isDoorDeliver_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('isDoorDeliver_' + deliveryPointIndex + '_' + receiverIndex);
                $('.isDoorDeliver_' + deliveryPointIndex + '_' + receiverIndex).removeClass('isDoorDeliver_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);
                $('.isPorter_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('isPorter_' + deliveryPointIndex + '_' + receiverIndex);
                $('.isPorter_' + deliveryPointIndex + '_' + receiverIndex).removeClass('isPorter_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);

                //Receiver Service (pickupType) 
                $('.pickupTypeYes_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('pickupTypeYes_' + deliveryPointIndex + '_' + receiverIndex);
                $('.pickupTypeYes_' + deliveryPointIndex + '_' + receiverIndex).removeClass('pickupTypeYes_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);
                $('.pickupTypeNo_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('pickupTypeNo_' + deliveryPointIndex + '_' + receiverIndex);
                $('.pickupTypeNo_' + deliveryPointIndex + '_' + receiverIndex).removeClass('pickupTypeNo_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);

                //Receiver Service (requireNote)
                $('.requireNote_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('requireNote_' + deliveryPointIndex + '_' + receiverIndex);
                $('.requireNote_' + deliveryPointIndex + '_' + receiverIndex).removeClass('requireNote_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);

                //Button Cancel
                $('.cancelReceiver_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('cancelReceiver_' + deliveryPointIndex + '_' + receiverIndex);
                $('.cancelReceiver_' + deliveryPointIndex + '_' + receiverIndex).removeClass('cancelReceiver_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);
                $('.cancelReceiver_' + deliveryPointIndex + '_' + receiverIndex).attr('onclick', 'removeReceiverEdit(' + deliveryPointIndex + ', ' + receiverIndex + ')');

                //Button Save Receiver
                $('.saveReceiver_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('saveReceiver_' + deliveryPointIndex + '_' + receiverIndex);
                $('.saveReceiver_' + deliveryPointIndex + '_' + receiverIndex).removeClass('saveReceiver_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);
                $('.saveReceiver_' + deliveryPointIndex + '_' + receiverIndex).attr('onclick', 'saveReceiver(' + deliveryPointIndex + ', ' + receiverIndex + ', "editReceiver",' + typeOrder + ')');
                // + ' - ' + receivers.width + ' - ' + receivers.height
                //Set Receiver value
                $('.form_receiverIndex').html(receiverIndex);
                var weight = receivers.weight;
                $('.receiverPhone_' + deliveryPointIndex + '_' + receiverIndex).val(receivers.receiverPhone);
                $('.receiverName_' + deliveryPointIndex + '_' + receiverIndex).val(receivers.receiverName);
                $('.expectDate_' + deliveryPointIndex + '_' + receiverIndex).val(receivers.expectDate);
                $('.expectTime_' + deliveryPointIndex + '_' + receiverIndex).val(receivers.expectTime);
                $('.length_' + deliveryPointIndex + '_' + receiverIndex).val(receivers.length);
                $('.width_' + deliveryPointIndex + '_' + receiverIndex).val(receivers.width);
                $('.height_' + deliveryPointIndex + '_' + receiverIndex).val(receivers.height);
                $('.weight_' + deliveryPointIndex + '_' + receiverIndex).val(weight.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
                $('.note_' + deliveryPointIndex + '_' + receiverIndex).val(receivers.note);
                if (receivers.isFree == 1) {
                    $('.isFreeYes_' + deliveryPointIndex + '_' + receiverIndex).prop('checked', 'checked');
                } else {
                    $('.isFreeNo_' + deliveryPointIndex + '_' + receiverIndex).prop('checked', 'checked');
                }
                if (receivers.partialDelivery == 1) {
                    $('.partialDeliveryYes_' + deliveryPointIndex + '_' + receiverIndex).prop('checked', 'checked');
                } else {
                    $('.partialDeliveryNo_' + deliveryPointIndex + '_' + receiverIndex).prop('checked', 'checked');
                }
                if (receivers.isRefund == 1) {
                    $('.isRefundYes_' + deliveryPointIndex + '_' + receiverIndex).prop('checked', 'checked');
                } else {
                    $('.isRefundNo_' + deliveryPointIndex + '_' + receiverIndex).prop('checked', 'checked');
                }
                if (point.pickupType == 1) {
                    $('.pickupTypeYes_' + deliveryPointIndex + '_' + receiverIndex).prop('checked', 'checked');
                } else {
                    $('.pickupTypeNo_' + deliveryPointIndex + '_' + receiverIndex).prop('checked', 'checked');
                }
                if (receivers.extraServices[0].isDoorDeliver == 1) {
                    $('.isDoorDeliver_' + deliveryPointIndex + '_' + receiverIndex).prop('checked', true);
                } else {
                    $('.isDoorDeliver_' + deliveryPointIndex + '_' + receiverIndex).prop('checked', false);
                }
                if (receivers.extraServices[0].isPorter == 1) {
                    $('.isPorter_' + deliveryPointIndex + '_' + receiverIndex).prop('checked', true);
                } else {
                    $('.isPorter_' + deliveryPointIndex + '_' + receiverIndex).prop('checked', false);
                }
                $('.requireNote_' + deliveryPointIndex + '_' + receiverIndex).val(receivers.requireNote).trigger("chosen:updated");

                //Product Info
                //Product Success
                $('.productSuccess_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('productSuccess_' + deliveryPointIndex + '_' + receiverIndex);
                $('.productSuccess_' + deliveryPointIndex + '_' + receiverIndex).removeClass('productSuccess_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);

                var html = '';
                var productIndexNext = Object.keys(items).length + 1;
                $.each(items, function(i, item) {
                    html += '<ul class="col-12 productDetail productDetail_' + deliveryPointIndex + ' productDetail_' + deliveryPointIndex + '_' + receiverIndex + '_' + (i + 1) + '" id="tdl-tthh-' + (i + 1) + '">';
                    html += '<li class="or-ttdh-add">';
                    html += '<ul class="row">';
                    html += '<li class="or-dh-tt col-sm-3 pl-2">';
                    html += '<span class="or-dh-stt" style="background: #885DE5;">' + (i + 1) + '</span>';
                    html += '<span class="success_productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + (i + 1) + '" productName="' + item.productName + '">' + item.productName + '</span>';
                    html += '</li>';
                    html += '<li class="or-dh-sp col-sm-3">';
                    html += '<span class="success_productCate_' + deliveryPointIndex + '_' + receiverIndex + '_' + (i + 1) + '" productCate="' + item.productCate + '">' + item.productCateName + '</span>';
                    html += '</li>';
                    html += '<li class="or-dh-sl col-sm-1">';
                    html += 'SL: <span class="success_productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + (i + 1) + '" productQuantity="' + item.productQuantity + '">' + (new Intl.NumberFormat().format(item.productQuantity)) + '</span>';
                    html += '</li>';
                    html += '<li class="or-dh-cod col-sm-2">';
                    html += 'COD: <span class="success_productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + (i + 1) + '" productCOD="' + (item.productCOD * item.productQuantity) + '">' + (new Intl.NumberFormat().format(item.productCOD * item.productQuantity)) + '</span> đ';
                    html += '</li>';
                    html += '<li class="or-dh-kg col-sm-2">';
                    html += 'Khai giá: <span class="success_productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + (i + 1) + '" productValue="' + (item.productValue * item.productQuantity) + '">' + (new Intl.NumberFormat().format(item.productValue * item.productQuantity)) + '</span> đ';
                    html += '</li>';
                    html += '<li class="or-dh-ed col-sm-1">';
                    html += '<img src="/public/images/or-delete.png" onclick="removeProductConfirm(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + (i + 1) + ', ' + typeOrder + ')">';
                    html += '<img src="/public/images/or-edit.png" onclick="editProduct(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + (i + 1) + ', ' + typeOrder + ')">';
                    html += '</li>';
                    html += '</ul>';
                    html += '</li>';
                    html += '</ul>';
                    html += "<input type='hidden' class='codHide codHide_"+ deliveryPointIndex + '_' + receiverIndex +" codHide_"+ deliveryPointIndex + '_' + receiverIndex + '_' + item.productIndex +"' value='" + (item.productCOD * item.productQuantity) +"' />";
                });

                $('.productSuccess_' + deliveryPointIndex + '_' + receiverIndex).html('');
                $('.productSuccess_' + deliveryPointIndex + '_' + receiverIndex).append(html);

                //Product Name
                $('.productName_' + point.deliveryPointIndex + '_' + point.receiverIndexNext + '_1').addClass('productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext);
                $('productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).removeClass('.productName_' + point.deliveryPointIndex + '_' + point.receiverIndexNext + '_1');
                $('.err_productName_' + point.deliveryPointIndex + '_' + point.receiverIndexNext + '_1').addClass('err_productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext);
                $('.err_productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).removeClass('err_productName_' + point.deliveryPointIndex + '_' + point.receiverIndexNext + '_1');
                $('.productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).attr('onblur', 'ValidateProductName(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + receivers.productIndexNext + ')');

                //Product COD
                $('.productCOD_' + point.deliveryPointIndex + '_' + point.receiverIndexNext + '_1').addClass('productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext);
                $('productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).removeClass('.productCOD_' + point.deliveryPointIndex + '_' + point.receiverIndexNext + '_1');
                $('.err_productCOD_' + point.deliveryPointIndex + '_' + point.receiverIndexNext + '_1').addClass('err_productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext);
                $('.err_productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).removeClass('err_productCOD_' + point.deliveryPointIndex + '_' + point.receiverIndexNext + '_1');
                $('.productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).attr('onblur', 'ValidateProductCOD(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + receivers.productIndexNext + ')');
                $('.productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).attr('onkeyup', 'number_format("productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext + '", 1)');

                //Product Value
                $('.checkProductValue_' + point.deliveryPointIndex + '_' + point.receiverIndexNext + '_1').addClass('checkProductValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext);
                $('checkProductValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).removeClass('.checkProductValue_' + point.deliveryPointIndex + '_' + point.receiverIndexNext + '_1');
                $('.productValue_' + point.deliveryPointIndex + '_' + point.receiverIndexNext + '_1').addClass('productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext);
                $('productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).removeClass('.productValue_' + point.deliveryPointIndex + '_' + point.receiverIndexNext + '_1');
                $('.err_productValue_' + point.deliveryPointIndex + '_' + point.receiverIndexNext + '_1').addClass('err_productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext);
                $('.err_productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).removeClass('err_productValue_' + point.deliveryPointIndex + '_' + point.receiverIndexNext + '_1');
                $('.productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).attr('onblur', 'ValidateProductValue(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + receivers.productIndexNext + ')');
                $('.productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).attr('onkeyup', 'number_format("productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext + '", 1)');

                //Product Category
                $('.productCategory_' + point.deliveryPointIndex + '_' + point.receiverIndexNext + '_1').addClass('productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext);
                $('productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).removeClass('.productCategory_' + point.deliveryPointIndex + '_' + point.receiverIndexNext + '_1');
                $('.err_productCategory_' + point.deliveryPointIndex + '_' + point.receiverIndexNext + '_1').addClass('err_productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext);
                $('.err_productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).removeClass('err_productCategory_' + point.deliveryPointIndex + '_' + point.receiverIndexNext + '_1');
                $('.productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).attr('onblur', 'ValidateProductCate(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + receivers.productIndexNext + ')');

                //Product Quantity
                $('.productQuantity_' + point.deliveryPointIndex + '_' + point.receiverIndexNext + '_1').addClass('productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext);
                $('productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).removeClass('.productQuantity_' + point.deliveryPointIndex + '_' + point.receiverIndexNext + '_1');
                $('.err_productQuantity_' + point.deliveryPointIndex + '_' + point.receiverIndexNext + '_1').addClass('err_productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext);
                $('.err_productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).removeClass('err_productQuantity_' + point.deliveryPointIndex + '_' + point.receiverIndexNext + '_1');
                $('.productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).attr('onblur', 'ValidateProductQuantity(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + receivers.productIndexNext + ')');

                //Button Save Product
                $('.saveProduct_' + point.deliveryPointIndex + '_' + point.receiverIndexNext + '_1').addClass('saveProduct_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext);
                $('.saveProduct_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).removeClass('saveProduct_' + point.deliveryPointIndex + '_' + point.receiverIndexNext + '_1');
                $('.saveProduct_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).attr('onclick', 'saveProduct(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + receivers.productIndexNext + ', "addProduct", ' + typeOrder + ')');

                //Product Index Next
                $('.productIndexNext_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('productIndexNext_' + deliveryPointIndex + '_' + receiverIndex);
                $('.productIndexNext_' + deliveryPointIndex + '_' + receiverIndex).removeClass('productIndexNext_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);

                //Clear Product value
                $('.productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).val('');
                $('.productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).val('0');
                $('.checkProductValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).attr('checked');
                $('.productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).val('0');
                $('.productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).val('0').trigger("chosen:updated");
                $('.productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).val('1');
                $('.productIndexNext_' + deliveryPointIndex + '_' + receiverIndex).val(receivers.productIndexNext);

                $('.form_receiverOrder_' + deliveryPointIndex).show();
                $('.addReceiver_' + deliveryPointIndex).addClass('dpn');

                $('.addProduct_' + deliveryPointIndex + '_' + point.receiverIndexNext).removeClass('dpn');
                $('.product_form_' + deliveryPointIndex + '_' + point.receiverIndexNext).addClass('dpn');

                $('.productCategory').chosen();
                $('.requireNote').chosen();
                $('.chosen-container').css("width", "100%");

                //Config date
                $('.datePicker').datetimepicker({
                    timepicker: false,
                    format: 'd/m/Y',
                    maxDate: new Date()
                });

                $('.orderdatePicker').datetimepicker({
                    timepicker: false,
                    format: 'd/m/Y',
                    minDate: new Date()
                });

                $('.orderTimePicker').datetimepicker({
                    datepicker: false,
                    minuteStep: 15,
                    format: 'H:m',
                    autoclose: true,
                    showMeridian: true,
                    startView: 1,
                    maxView: 1
                });
            } else {
                console.log(1111)
                console.log('1111-res', res)
                // if(res.classCheckRefund){
                //     $('#modalConfirmChangeRefund').modal('show');
                // }
            }
        },
        error: function(res) {
            console.log(res);
        }
    });
}

function addReceiver(deliveryPointIndex, receiverIndex) {
    $('.form_receiverOrder_' + deliveryPointIndex).show();
    $('.addReceiver_' + deliveryPointIndex).addClass('dpn');

    $('.addProduct_' + deliveryPointIndex + '_' + receiverIndex).addClass('dpn');
    $('.product_form_' + deliveryPointIndex + '_' + receiverIndex).removeClass('dpn');
    // $('.productCategory').chosen();
    // $('.chosen-container').css("width", "100%");
    $('.productCategory').chosen();
    $('.requireNote').chosen();
    // $('.productCategory_' + deliveryPointIndex + '_chosen').css('width', '100%');
    // $('.requireNote_' + deliveryPointIndex + '_chosen').css('width', '100%');
    $('.chosen-container').css("width", "100%");

    //Config date
    $('.datePicker').datetimepicker({
        timepicker: false,
        format: 'd/m/Y',
        maxDate: new Date()
    });

    $('.orderdatePicker').datetimepicker({
        timepicker: false,
        format: 'd/m/Y',
        minDate: new Date()
    });

    $('.orderTimePicker').datetimepicker({
        datepicker: false,
        minuteStep: 15,
        format: 'H:m',
        autoclose: true,
        showMeridian: true,
        startView: 1,
        maxView: 1
    });

    var receiverIndexNext = parseInt(receiverIndex) + 1;
    console.log(deliveryPointIndex+'_'+receiverIndexNext)
    $('.isRefundYes_' + deliveryPointIndex + '_' + receiverIndexNext).attr('keypoint', deliveryPointIndex + '_' + receiverIndexNext);
    $('.isRefundNo_' + deliveryPointIndex + '_' + receiverIndexNext).attr('keypoint', deliveryPointIndex + '_' + receiverIndexNext);

}

function addDeliveryPoint(deliveryPointIndex, typeOrder = 0) {
    //Thông tin receiver
    var error = 0;
    if ($('div').hasClass('afOrder_' + (deliveryPointIndex - 1) + '_1') == false) {
        $('.err_saveReceiver_' + (deliveryPointIndex - 1)).html('Bạn chưa có người nhận nào');
        error = 1;
    } else {
        $('.err_saveReceiver_' + (deliveryPointIndex - 1)).html('');
    }
    if (error == 0) {
        var i = deliveryPointIndex;
        while (i > 0) {
            $('.form_receiverOrder_' + i).hide();
            $('.addReceiver_' + i).removeClass('dpn');
            i = i - 1;
        }
        $.ajax({
            url: '/vi/addPoint',
            type: 'post',
            dataType: 'json',
            data: { 'deliveryPointIndex': deliveryPointIndex, 'typeOrder': typeOrder},
            success: function(res) {
                if (res.success) {
                    $('#OrderSingle').append(res.html);
                    $('.chosen-container').css("width", "100%");
                    $('.order_province_code_from').chosen();
                    $('.order_district_code_from').chosen();
                    $('.order_ward_code_from').chosen();
                    $('.productCategory').chosen();
                    $('.requireNote').chosen();
                    $('.addDeliveryPoint').attr('onclick', 'addDeliveryPoint(' + (deliveryPointIndex + 1) + ')');
                    $('.addDeliveryPoint').attr('totalPoint', (deliveryPointIndex + 1));

                    //Config date
                    $('.datePicker').datetimepicker({
                        timepicker: false,
                        format: 'd/m/Y',
                        maxDate: new Date()
                    });

                    $('.orderdatePicker').datetimepicker({
                        timepicker: false,
                        format: 'd/m/Y',
                        minDate: new Date()
                    });

                    $('.orderTimePicker').datetimepicker({
                        datepicker: false,
                        minuteStep: 15,
                        format: 'H:m',
                        autoclose: true,
                        showMeridian: true,
                        startView: 1,
                        maxView: 1
                    });
                }
            },
            error: function(res) {
                console.log(res);
            }
        });
    }
}
function confirmOptimizeOrder(typeOrder = 0,optimizerOrder = 0){
    var totalPoint = parseInt($('.addDeliveryPoint').attr('totalPoint')) ;
    // if(typeOrder == 0){
    // }else{
    //     var totalPoint = parseInt($('.addDeliveryPoint').attr('totalPoint')) - 1 ;
    // }
    var error = 0;
    for(var i = 1; i <= totalPoint; i++){
        var wardReceiver = $('#wardReceiver_'+i).val();
        if(wardReceiver == '' || wardReceiver == 0){
            error = 1;
            $('.err_ward_'+i).html('Phường/xã không được để trống');
        }
    }
    if(error == 0){
        if(totalPoint == 1){
            nextPostageKm(typeOrder,optimizerOrder);
        }else{
            $('#optimizerOrder').modal('show');
        }
    }
}

function nextPostageKm(typeOrder = 0, optimizerOrder = 0) {
        //Thông tin receiver
    $('#loader').addClass('show');
    var error = 0;
    if ($('div').hasClass('afOrder_1_1') == false) {
        $('.err_saveReceiver_1').html('Bạn chưa có người nhận nào');
        error = 1;
    } else {
        $('.err_saveReceiver_1').html('');
    }
    var totalPoint = $('.addDeliveryPoint').attr('totalPoint');
    if (totalPoint > 0) {
        for (i = 1; i <= (parseInt(totalPoint) - 1); i++) {
            // Địa chỉ người nhận
            var deliveryAddress = $('#OrderSingle').find('.address_' + i).val();
            var deliveryPorvince = $('#OrderSingle').find('#provinceReceiver_' + i).val();
            var deliveryDistrict = $('#OrderSingle').find('#districtReceiver_' + i).val();
            var deliveryWard = $('#OrderSingle').find('#wardReceiver_' + i).val();

            if (deliveryAddress == '' || deliveryAddress == null) {
                $('.err_address_' + i).html('Địa chỉ người nhận không được để trống');
                error = 1;
            }
            if (deliveryPorvince == '' || deliveryPorvince == null || deliveryPorvince == 0) {
                $('.err_province_' + i).html('Tỉnh/thành người nhận không được để trống');
                error = 1;
            }
            if (deliveryDistrict == '' || deliveryDistrict == null || deliveryDistrict == 0) {
                $('.err_district_' + i).html('Quận/huyện người nhận không được để trống');
                error = 1;
            }
            if (deliveryWard == '' || deliveryWard == null || deliveryWard == 0) {
                $('.err_ward_' + i).html('Phường/xã người nhận không được để trống');
                error = 1;
            }
        }
    }
    // Người gửi
    var pickupAddressId = 0;
    var pickName = '';
    var pickPhone = '';
    var pickAddress = '';
    var pickProvince = '';
    var pickDistrict = '';
    var pickWard = '';
    pickupAddressId = $('#orders').find('.choosePickUpAddress').attr('pickupaddressid');
    if (pickupAddressId <= 0 || pickupAddressId == '' || pickupAddressId == null) {
        pickName = $('#orders').find('.pickName').val();
        pickPhone = $('#orders').find('.pickPhone').val();
        pickAddress = $('#orders').find('.pickAddress').val();
        pickProvince = $('#orders').find('.pickProvince').val();
        pickDistrict = $('#orders').find('.pickDistrict').val();
        pickWard = $('#orders').find('.pickWard').val();
        if (pickName == '' || pickName == null) {
            $('.err_pickName').html('Tên người gửi không được để trống');
            error = 1;
        }
        if (pickPhone == '' || pickPhone == null) {
            $('.err_pickPhone').html('Số điện thoại người gửi không được để trống');
        } else {
            checkpickPhone = validatePhone(pickPhone);
            if (!checkpickPhone) {
                $('.err_pickPhone').html('Số điện thoại người gửi không hợp lệ');
                error = 1;
            } else {
                $('.err_pickPhone').html('');
            }
        }
        if (pickAddress == '' || pickAddress == null) {
            $('.err_pickAddress').html('Địa chỉ người gửi không được để trống');
            error = 1;
        }
        if (pickProvince <= 0 || pickProvince == '' || pickProvince == null) {
            $('.err_pickProvince').html('Tỉnh/thành người gửi không được để trống');
            error = 1;
        }
        if (pickDistrict <= 0 || pickDistrict == '' || pickDistrict == null) {
            $('.err_pickDistrict').html('Quận/huyện người gửi không được để trống');
            error = 1;
        }
        if (pickWard <= 0 || pickWard == '' || pickWard == null) {
            $('.err_pickWard').html('Phường/xã người gửi không được để trống');
            error = 1;
        }
    }
    if (error == 0) {
        var expectShipperPhone = $('.expectShipperPhone').val();
        $.ajax({
            url: '/vi/nextPostageKm',
            type: 'post',
            dataType: 'json',
            data: {
                'expectShipperPhone': expectShipperPhone,
                'pickupAddressId': pickupAddressId,
                'pickName': pickName,
                'pickPhone': pickPhone,
                'pickAddress': pickAddress,
                'pickProvince': pickProvince,
                'pickDistrict': pickDistrict,
                'pickWard': pickWard,
                'typeOrder': typeOrder,
                'optimizerOrder': optimizerOrder,
            },
            success: function(res) {
                if (res.success == true) {
                    window.location = res.redirect;
                }
                $('#loader').addClass('show');
            },
            error: function(res) {
                $('#loader').removeClass('show');
                console.log(res);
            }
        });
    }
}

function nextPostageSp(typeOrder = 0) {
    var error = 0;

    // Người gửi
    var pickupAddressId = 0;
    var pickName = '';
    var pickPhone = '';
    var pickAddress = '';
    var pickProvince = '';
    var pickDistrict = '';
    var pickWard = '';
    pickupAddressId = $('#orders').find('.choosePickUpAddress').attr('pickupaddressid');
    if (pickupAddressId <= 0 || pickupAddressId == '' || pickupAddressId == null) {
        pickName = $('#orders').find('.pickName').val();
        pickPhone = $('#orders').find('.pickPhone').val();
        pickAddress = $('#orders').find('.pickAddress').val();
        pickProvince = $('#orders').find('.pickProvince').val();
        pickDistrict = $('#orders').find('.pickDistrict').val();
        pickWard = $('#orders').find('.pickWard').val();
        if (pickName == '' || pickName == null) {
            $('.err_pickName').html('Tên người gửi không được để trống');
            error = 1;
        }
        if (pickPhone == '' || pickPhone == null) {
            $('.err_pickPhone').html('Số điện thoại người gửi không được để trống');
        } else {
            checkpickPhone = validatePhone(pickPhone);
            if (!checkpickPhone) {
                $('.err_pickPhone').html('Số điện thoại người gửi không hợp lệ');
                error = 1;
            } else {
                $('.err_pickPhone').html('');
            }
        }
        if (pickAddress == '' || pickAddress == null) {
            $('.err_pickAddress').html('Địa chỉ người gửi không được để trống');
            error = 1;
        }
        if (pickProvince <= 0 || pickProvince == '' || pickProvince == null) {
            $('.err_pickProvince').html('Tỉnh/thành người gửi không được để trống');
            error = 1;
        }
        if (pickDistrict <= 0 || pickDistrict == '' || pickDistrict == null) {
            $('.err_pickDistrict').html('Quận/huyện người gửi không được để trống');
            error = 1;
        }
        if (pickWard <= 0 || pickWard == '' || pickWard == null) {
            $('.err_pickWard').html('Phường/xã người gửi không được để trống');
            error = 1;
        }
    }

    //Điểm giao & thông tin người nhận
    var deliveryPointIndex = 1;
    var receiverIndex = 1;

    // Địa chỉ người nhận
    var deliveryAddress = $('#OrderSingle').find('.address_' + deliveryPointIndex).val();
    var deliveryPorvince = $('#OrderSingle').find('#provinceReceiver_' + deliveryPointIndex).val();
    var deliveryDistrict = $('#OrderSingle').find('#districtReceiver_' + deliveryPointIndex).val();
    var deliveryWard = $('#OrderSingle').find('#wardReceiver_' + deliveryPointIndex).val();

    if (deliveryAddress == '' || deliveryAddress == null) {
        $('.err_address_' + deliveryPointIndex).html('Địa chỉ người nhận không được để trống');
        error = 1;
    }
    if (deliveryPorvince == '' || deliveryPorvince == null || deliveryPorvince == 0) {
        $('.err_province_' + deliveryPointIndex).html('Tỉnh/thành người nhận không được để trống');
        error = 1;
    }
    if (deliveryDistrict == '' || deliveryDistrict == null || deliveryDistrict == 0) {
        $('.err_district_' + deliveryPointIndex).html('Quận/huyện người nhận không được để trống');
        error = 1;
    }
    if (deliveryWard == '' || deliveryWard == null || deliveryWard == 0) {
        $('.err_ward_' + deliveryPointIndex).html('Phường/xã người nhận không được để trống');
        error = 1;
    }

    // Thông tin người nhận
    var receiverPhone = $('#OrderSingle').find('.receiverPhone_' + deliveryPointIndex + '_' + receiverIndex).val();
    var receiverName = $('#OrderSingle').find('.receiverName_' + deliveryPointIndex + '_' + receiverIndex).val();
    var expectDate = $('#OrderSingle').find('.expectDate_' + deliveryPointIndex + '_' + receiverIndex).val();
    var expectTime = $('#OrderSingle').find('.expectTime_' + deliveryPointIndex + '_' + receiverIndex).val();

    if (receiverPhone == '' || receiverPhone == null) {
        $('.err_receiverPhone_' + deliveryPointIndex + '_' + receiverIndex).html('Số điện thoại người nhận không được để trống');
        error = 1;
    } else {
        check = validatePhone(receiverPhone);
        if (!check) {
            $('.err_receiverPhone_' + deliveryPointIndex + '_' + receiverIndex).html('Số điện thoại người nhận không hợp lệ');
            error = 1;
        } else {
            $('.err_receiverPhone_' + deliveryPointIndex + '_' + receiverIndex).html('');
        }
    }
    if (receiverName.length == 0) {
        $('.err_receiverName_' + deliveryPointIndex + '_' + receiverIndex).html('Tên người nhận không được để trống');
        error = 1;
    } else if (receiverName.length < 2) {
        $('.err_receiverName_' + deliveryPointIndex + '_' + receiverIndex).html('Tên người nhận quá ngắn');
        error = 1;
    } else {
        $('.err_receiverName_' + deliveryPointIndex + '_' + receiverIndex).html('');
    }

    //Thông tin đơn hàng
    var length = $('.length_' + deliveryPointIndex + '_' + receiverIndex).val();
    var width = $('.width_' + deliveryPointIndex + '_' + receiverIndex).val();
    var height = $('.height_' + deliveryPointIndex + '_' + receiverIndex).val();
    // sizeSplit = size.split("-", 3);
    // var length = sizeSplit['0'];
    // var width = sizeSplit['1'];
    // var height = sizeSplit['2'];

    var weight = $('.weight_' + deliveryPointIndex + '_' + receiverIndex).val().replace(/\./g, '');
    var note = $('.note_' + deliveryPointIndex + '_' + receiverIndex).val();
    var requireNote = $('.requireNote_' + deliveryPointIndex + '_' + receiverIndex).val();
    var isFree = 1;
    var partialDelivery = 0;
    var isRefund = 1;
    var pickupType = 1;

    $('input.isFreeNo_' + deliveryPointIndex + '_' + receiverIndex + ':radio:checked').each(function() {
        isFree = $(this).val();
    });
    $('input.partialDeliveryYes_' + deliveryPointIndex + '_' + receiverIndex + ':radio:checked').each(function() {
        partialDelivery = $(this).val();
    });
    $('input.pickupTypeNo_' + deliveryPointIndex + '_' + receiverIndex + ':radio:checked').each(function() {
        pickupType = $(this).val();
    });
    if (length == '' || length == null) {
        $('.err_size_' + deliveryPointIndex + '_' + receiverIndex).html('Chiều dài không được để trống');
        error = 1;
    } else if (length <= 0) {
        $('.err_size_' + deliveryPointIndex + '_' + receiverIndex).html('Chiều dài phải lớn hơn 0');
        error = 1;
    }
    if (width == '' || width == null) {
        $('.err_size_' + deliveryPointIndex + '_' + receiverIndex).html('Chiều rộng không được để trống');
        error = 1;
    } else if (width <= 0) {
        $('.err_size_' + deliveryPointIndex + '_' + receiverIndex).html('Chiều rộng phải lớn hơn 0');
        error = 1;
    }
    if (height == '' || height == null) {
        $('.err_size_' + deliveryPointIndex + '_' + receiverIndex).html('Chiều cao không được để trống');
        error = 1;
    } else if (height <= 0) {
        $('.err_size_' + deliveryPointIndex + '_' + receiverIndex).html('Chiều cao phải lớn hơn 0');
        error = 1;
    }
    if (weight == '' || weight == null || weight == 0) {
        $('.err_weight_' + deliveryPointIndex + '_' + receiverIndex).html('Không được để trống');
        error = 1;
    }
    $('input.isRefundNo_' + deliveryPointIndex + '_' + receiverIndex + ':radio:checked').each(function() {
        isRefund = $(this).val();
    });
    var productIndexNext = $('#OrderSingle').find('.productIndexNext_' + deliveryPointIndex + '_' + receiverIndex).val();
    var countItemProduct = $('.countItemProduct').val();
    var productName = $('.success_productName_1_1_1').html();
    console.log('productName',productName)
    if (typeof productName == 'undefined' && countItemProduct == 0 || productName == '' && countItemProduct == 0) {
        console.log(countItemProduct)
        $('.err_saveProduct_1_1').html('Bạn chưa có sản phẩm nào.')
        error = 1;
    } else {
        $('.err_saveProduct_1_1').html('');
    }
    if (error == 0) {
        $.ajax({
            url: '/vi/nextPostageSp',
            type: 'post',
            dataType: 'json',
            data: {
                'deliveryPointIndex': deliveryPointIndex,
                'receiverIndex': receiverIndex,
                'productIndexNext': productIndexNext,
                'pickupAddressId': pickupAddressId,
                'pickName': pickName,
                'pickPhone': pickPhone,
                'pickAddress': pickAddress,
                'pickProvince': pickProvince,
                'pickDistrict': pickDistrict,
                'pickWard': pickWard,
                'deliveryAddress': deliveryAddress,
                'deliveryPorvince': deliveryPorvince,
                'deliveryDistrict': deliveryDistrict,
                'deliveryWard': deliveryWard,
                'receiverPhone': receiverPhone,
                'receiverName': receiverName,
                'expectDate': expectDate,
                'expectTime': expectTime,
                'length': length,
                'width': width,
                'height': height,
                'weight': weight,
                'note': note,
                'requireNote': requireNote,
                'isFree': isFree,
                'partialDelivery': partialDelivery,
                'isRefund': isRefund,
                'pickupType': pickupType,
                'typeOrder': typeOrder
            },
            success: function(res) {
                window.location = res.redirect;
                // if (res.success == true) {
                // } else {
                    // if(res.status == 1){
                    //     $('#modalConfirmChangeRefund').modal('show');
                    //     $('.bodyCheckCodValueText').html(res.data)
                    // }
                // }
            },
            error: function(res) {
                console.log(res);
            }
        });
    }
}

function number_format(className, type) {
    var numberFormat = '';
    if (type == 2) {
        numberFormat = parseInt($('.' + className).val().replace(/\./g, ''));
    } else {
        numberFormat = parseInt($('.' + className).val().replace(/\,/g, ''));
    }
    clearTimeout(typingTimer);
    if (numberFormat) {
        typingTimer = setTimeout(function() {
            if (type == 2) {
                numberFormat = String(numberFormat).replace(/(.)(?=(\d{3})+$)/g, '$1.');
            } else {
                numberFormat = String(numberFormat).replace(/(.)(?=(\d{3})+$)/g, '$1,');
            }
            if (numberFormat != 'NaN') {
                $('.' + className).val(numberFormat);
            }
        }, 500);
    }
}

function removeProductConfirm(deliveryPointIndex, receiverIndex, productIndex, typeOrder = 0) {
    $('.modal-title').html('Xóa sản phẩm');
    $('.textCenter').html('<p class="fz13">Bạn có chắc chắn muốn xóa sản phẩm này?</p>');
    $('.btn-confirmCustom').html('Đồng ý');
    $('.btn-confirmCustom').attr('onclick', 'removeProduct(' + deliveryPointIndex + ',' + receiverIndex + ',' + productIndex + ' ,' + typeOrder + ')');

    setTimeout(function() {
        $('#removeConfirm').modal('show');
    }, 400);
}

function removeProduct(deliveryPointIndex, receiverIndex, productIndex, typeOrder) {
    $.ajax({
        url: '/vi/removeProduct',
        type: 'post',
        dataType: 'json',
        data: { 'deliveryPointIndex': deliveryPointIndex, 'receiverIndex': receiverIndex, 'productIndex': productIndex, 'typeOrder': typeOrder },
        success: function(res) {
            if (res.success == true) {
                location.reload();
            }
        },
        error: function(res) {
            console.log(res);
        }
    });
}

function removeReceiverConfirm(deliveryPointIndex, receiverIndex, typeOrder) {
    $('.modal-title').html('Xóa chi tiết đơn hàng');
    $('.textCenter').html('<p class="fz13">Bạn có chắc chắn muốn xóa chi tiết đơn hàng này?</p>');
    $('.btn-confirmCustom').html('Đồng ý');
    $('.btn-confirmCustom').attr('onclick', 'removeReceiver(' + deliveryPointIndex + ',' + receiverIndex + ',' + typeOrder + ')');

    setTimeout(function() {
        $('#removeConfirm').modal('show');
    }, 400);
}

function removeReceiver(deliveryPointIndex, receiverIndex, typeOrder = 0) {
    $.ajax({
        url: '/vi/removeReceiver',
        type: 'post',
        dataType: 'json',
        data: { 'deliveryPointIndex': deliveryPointIndex, 'receiverIndex': receiverIndex, 'typeOrder': typeOrder },
        success: function(res) {
            if (res.success == true) {
                location.reload();
            }
        },
        error: function(res) {
            console.log(res);
        }
    });
}

function singleOrderChangeFees(typeOrder = 0) {
    var feeOrder = $('.feeOrder').find(':selected').val();
    if (feeOrder) {
        $.ajax({
            url: '/vi/changeSingleOrderFees',
            type: 'post',
            dataType: 'json',
            data: {
                'feeOrder': feeOrder,
                'typeOrder': typeOrder
            },
            success: function(res) {
                if (res.success) {
                    $('.transportFee').html(new Intl.NumberFormat().format(res.data.fees.transportFee));
                    $('.insuranceFee').html(new Intl.NumberFormat().format(res.data.fees.insuranceFee));
                    $('.codFee').html(new Intl.NumberFormat().format(res.data.fees.codFee));
                    $('.pickupFee').html(new Intl.NumberFormat().format(res.data.fees.pickupFee));
                    $('.porterFee').html(new Intl.NumberFormat().format(res.data.fees.porterFee));
                    $('.partialFee').html(new Intl.NumberFormat().format(res.data.fees.partialFee));
                    $('.handoverFee').html(new Intl.NumberFormat().format(res.data.fees.handoverFee));
                    $('.otherFee').html(new Intl.NumberFormat().format(res.data.fees.otherFee));
                    $('.orderTotalFee').html(new Intl.NumberFormat().format(res.data.totalFee));
                    var totalCODOld = $('.totalProductCOD').attr('totalCOD');
                    var totalCOD = parseInt(totalCODOld) + parseInt(res.totalReceiverPay);
                    if (isNaN(totalCOD)) {
                        totalCOD = 0;
                    }
                    $('.totalReceiverPay').html(new Intl.NumberFormat().format(totalCOD));
                    $('.total_fee').show();
                    $('#owl-fees').show();
                    $('.error_fee').hide();
                    $('.createOrders').removeAttr('disabled');
                    location.reload();
                } else {
                    $('.feeErrors').html(res.data.message)
                    $('.total_fee').hide();
                    $('#owl-fees').hide();
                    $('.error_fee').show();
                    $('.createOrders').attr('disabled', true);
                }
            },
            error: function(res) {
                console.log(res)
            }
        });
    }
}

function singleOrderCreateOrder(typeOrder = 0) {
    $('#loader').addClass('show');
    var orderPaymentType = $('.orderPaymentType').find(':selected').val();
    var error = 0;
    if (orderPaymentType == 0 || orderPaymentType == '') {
        error = 1;
        $('.err_orderPaymentType').html('Hình thức thanh toán không được để trống');
    } else {
        $('.err_orderPaymentType').html('');
    }
    var expectShipperPhone = $('.expectShipperPhone').val();
    if (error == 0) {
        $.ajax({
            url: '/vi/xac-nhan-don-le',
            type: 'post',
            dataType: 'json',
            data: { 'orderPaymentType': orderPaymentType, 'expectShipperPhone': expectShipperPhone, 'typeOrder': typeOrder },
            success: function(res) {
                $('#loader').removeClass('show');
                if (res.success == true) {
                    if (res.data.packType == 2) {
                        if (res.data.status == 707) {
                            $('.modal-title').html('Kết quả cập nhật');
                            $('.textCenter').html('<p class="fz13">Cập nhật thành công đơn hàng <b>' + res.data.orderId + '</b> của bạn.<br>Theo dõi đơn hàng tại Quản lý đơn hàng </p>');
                            $('.modal-footer').html('<a class="btn btn-modal" href="/vi/danh-sach-don-hang">Quản lý đơn hàng</a>' +
                                '<a class="btn btn-modal btn-confirmCustom" href="/vi/tao-don-le">Tạo thêm đơn hàng</a>');
                        } else {

                            $('.modal-title').html('Kết quả tạo đơn');
                            $('.textCenter').html('<p class="fz13">Đang tìm tài xế cho đơn hàng <b>' + res.data.orderId + '</b> của bạn.<br>Theo dõi đơn hàng tại Quản lý đơn hàng => Chờ duyệt.</p>');
                            $('.modal-footer').html('<a class="btn btn-modal" href="/vi/danh-sach-don-hang/cho-duyet">Quản lý đơn hàng</a>' +
                                '<a class="btn btn-modal btn-confirmCustom" href="/vi/tao-don-le">Tạo thêm đơn hàng</a>');
                        }
                    } else {
                        if (res.data.status == 707) {
                            $('.modal-title').html('Kết quả cập nhật');
                            $('.textCenter').html('<p class="fz13">Cập nhật thành công đơn hàng <b>' + res.data.orderId + '</b> của bạn.<br>Theo dõi đơn hàng tại Quản lý đơn hàng </p>');
                            $('.modal-footer').html('<a class="btn btn-modal" href="/vi/danh-sach-don-hang">Quản lý đơn hàng</a>' +
                                '<a class="btn btn-modal btn-confirmCustom" href="/vi/tao-don-le">Tạo thêm đơn hàng</a>');
                        } else {

                            $('.modal-title').html('Kết quả tạo đơn');
                            $('.textCenter').html('<p class="fz13">Đã tạo thành công đơn hàng <b>' + res.data.orderId + '</b> của bạn.<br>Theo dõi đơn hàng tại Quản lý đơn hàng => Chờ lấy.</p>');
                            $('.modal-footer').html('<a class="btn btn-modal" href="/vi/danh-sach-don-hang/cho-lay">Quản lý đơn hàng</a>' +
                                '<a class="btn btn-modal btn-confirmCustom" href="/vi/tao-don-le">Tạo thêm đơn hàng</a>');
                        }
                    }
                } else {
                    $('.modal-title').html('Kết quả tạo đơn');
                    // +res.data.message
                    if (res.data.message == null || res.data.message == '') {
                        $('.textCenter').html('<p class="fz13">' + res.data.messageData + ' </p> ');
                        $('.modal-footer').html('<a class="btn btn-modal" href="/vi/danh-sach-don-hang">Quản lý đơn hàng</a>');
                    } else {
                        $('.textCenter').html('<p class="fz13">Số dư khả dụng của Quý khách không đủ để duyệt đơn.</p>' +
                            '<p class="fz13">Quý khách vui lòng nạp tiền vào ví Hola tối thiểu <strong class="colorPurple">' + new Intl.NumberFormat().format(res.data.message.minimumMoneyToConfirm) + ' đ </strong> để tiếp tục duyệt đơn.</p> ' +
                            '<p class="fz13">Kiểm tra đơn hàng chờ duyệt đã được lưu tại Quản lý đơn hàng.</p>');
                        $('.modal-footer').html('<a class="btn btn-modal" href="/vi/danh-sach-don-hang/cho-duyet">Quản lý đơn hàng</a>' +
                            '<a class="btn btn-modal btn-confirmCustom" href="/vi/nap-tien">Ví Hola</a>');
                    }

                    // console.log(res.data);
                    // if (res.data.packType == 2) {
                    //     console.log(2)
                    //     $('.modal-title').html('Kết quả tạo đơn');
                    //     $('.textCenter').html('<p class="fz13">'+res.data.message);
                    //     $('.modal-footer').html('<a class="btn btn-modal" href="/vi/danh-sach-don-hang">Quản lý đơn hàng</a>'
                    //                             +'<a class="btn btn-modal btn-confirmCustom" href="/vi/nap-tien">Ví Hola</a>');
                    // }else{
                    //     //
                    //     console.log(1)
                    //     $('.modal-title').html('Kết quả tạo đơn');
                    //     $('.textCenter').html('<p class="fz13">'+res.data.message);
                    //     $('.modal-footer').html('<a class="btn btn-modal" href="/vi/danh-sach-don-hang">Quản lý đơn hàng</a>'
                    //                             +'<a class="btn btn-modal btn-confirmCustom" href="/vi/nap-tien">Ví Hola</a>');
                    // }
                }
                setTimeout(function() {
                    $('#modalNotiOrderSingle').css('display', 'block');
                }, 300);
            },
            error: function(res) {
                console.log(res);
            }
        });
    }
}

function redirectUrl(params) {
    window.location = params;
}

function saveOrderDraft() {
    $('#loader').show();
    var orderPaymentType = $('.orderPaymentType').find(':selected').val();
    $.ajax({
        url: '/vi/saveOrderDraft',
        type: 'post',
        dataType: 'json',
        data: { 'orderPaymentType': orderPaymentType },
        success: function(res) {
            if (res.success == true) {
                window.location = res.redirect;
            }
        },
        error: function(res) {
            console.log(res);
        }
    });
}

function removeReceiverEdit(deliveryPointIndex, receiverIndex) {
    location.reload();
}

function removeDeliveryPointConfirm(deliveryPointIndex, typeOrder = 0) {

    var numdeliveryPoint = $('.removeDeliveryPoint').length

    if (numdeliveryPoint > 1) {
        $('.headerFalse').html('Thông báo')
        $('.notiText').html('Xóa điểm giao sẽ xóa tất cả đơn hàng chi tiết thuộc điểm giao. Bạn chắc chắn muốn xóa điểm giao?')
        $('.btn-confirmCustom').show();
        $('.btn-confirmCustom').html('Xác nhận')
        $('.btn-confirmCustom').attr('onclick', 'removeDeliveryPoint(' + deliveryPointIndex + ', '+typeOrder+')');
        $('#removeConfirm').modal('show');
    } else {
        $('.headerFalse').html('Thông báo')
        $('.notiText').html('Bạn không thể xóa điểm giao vì đơn hàng bắt buộc phải có ít nhất 1 điểm giao.')
        $('.btn-confirmCustom').hide();
        $('#removeConfirm').modal('show');
    }
}

function removeDeliveryPoint(deliveryPointIndex, typeOrder = 0) {
    var numdeliveryPoint = $('.removeDeliveryPoint').length
    if (numdeliveryPoint > 1) {

        $('#loader').addClass('show');
        $.ajax({
            url: '/vi/removeDeliveryPoint',
            type: 'post',
            dataType: 'json',
            data: { 'deliveryPointIndex': deliveryPointIndex, 'typeOrder': typeOrder },
            success: function(res) {
                if (res.success == true) {
                    location.reload();
                }else{   
                    $('#loader').removeClass('show');
                }
            },
            error: function(res) {
                $('#loader').addClass('show');
                console.log(res);
            }
        });
    }
}
function updateAddressDetail(deliveryPointIndex, typeOrder = 1){
    setTimeout(function() {
        var addressNew = $('#OrderSingle').find('.address_' + deliveryPointIndex).val();
        var provinceNew = $('#OrderSingle').find('#provinceReceiver_' + deliveryPointIndex).val();
        var districtNew = $('#OrderSingle').find('#districtReceiver_' + deliveryPointIndex).val();
        var wardsNew = $('#OrderSingle').find('#wardReceiver_' + deliveryPointIndex).val();
        if(wardsNew != ''){
            $.ajax({
                url: '/vi/updateAddressAjax',
                type: 'post',
                dataType: 'json',
                data: { 
                    'deliveryPointIndex': deliveryPointIndex,
                     'typeOrder': typeOrder,
                     'provinceNew': provinceNew,
                     'districtNew': districtNew,
                     'wardsNew': wardsNew,
                     'addressNew': addressNew,
                    },
                success: function(res) {
                },
                error: function(res) {
                }
            });
        }
    }, 1500);
}
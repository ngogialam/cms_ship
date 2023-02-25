$(document).ready(function() {
    // $('body').on('change', '#import_excel',function(){
    // });
    $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $('.custom-file-upload').html(fileName)
    });

    $(".checkAllCustom").change(function() {
        if (this.checked) {
            $(".checkSingleCustom").each(function() {
                this.checked = true;
            });
            $(".checkAllCustom").each(function() {
                this.checked = true;
            });
        } else {
            $(".checkSingleCustom").each(function() {
                this.checked = false;
            });
            $(".checkAllCustom").each(function() {
                this.checked = false;
            });
        }
    });

    $(".checkSingleCustom").click(function() {
        if ($(this).is(":checked")) {
            var isAllChecked = 0;

            $(".checkSingleCustom").each(function() {
                if (!this.checked)
                    isAllChecked = 1;
            });

            if (isAllChecked == 0) {
                $(".checkAllCustom").prop("checked", true);
            }
        } else {
            $(".checkAllCustom").prop("checked", false);
        }
    });

    $('body').on('blur', '.pickupName', function() {
        pickupName = $('.pickupName').val();
        if (pickupName.length == 0) {
            $('.err_pickupName').html('Tên điểm gửi không được để trống');
        } else if (pickupName.length < 2) {
            $('.err_pickupName').html('Tên điểm gửi quá ngắn');
        } else {
            $('.err_pickupName').html('');
        }
    });

    // Slide payment order js 
    // Slide home partner
    $("#owl-fees").owlCarousel({
        loop: false,
        // stagePadding: 10,
        // margin: 15,
        autoplay: false,
        // smartSpeed: 200,
        // autoplaySpeed: 1500,
        // autoplayTimeout: 2000,
        // autoplayHoverPause: true,
        nav: false,
        dots: false,
        responsive: {
            200: {
                items: 1
            },
            400: {
                items: 1
            },
            600: {
                items: 1
            },
            800: {
                items: 2
            },
            1000: {
                items: 3
            },
            1200: {
                items: 3
            }
        }
    });

    $('.order_province_code_list').change(function() {
        var receiverProductIndex = $(this).attr('index_prov');
        $('.provinceReceiver_' + receiverProductIndex).removeClass('address_success');
        $('.provinceReceiver_' + receiverProductIndex).removeClass('address_warning');
        $('.provinceReceiver_' + receiverProductIndex).removeClass('address_error');
        $('.provinceReceiver_' + receiverProductIndex).addClass('address_edit');
    });


    $('.order_district_code_list').change(function() {
        var receiverDistrictIndex = $(this).attr('index_dict');
        $('.districtReceiver_' + receiverDistrictIndex).removeClass('address_success');
        $('.districtReceiver_' + receiverDistrictIndex).removeClass('address_warning');
        $('.districtReceiver_' + receiverDistrictIndex).removeClass('address_error');
        $('.districtReceiver_' + receiverDistrictIndex).addClass('address_edit');
    });


    $('.order_ward_code_list').change(function() {
        var receiverWardIndex = $(this).attr('index_ward');
        $('.deliveryPoint_' + receiverWardIndex).removeClass('card_error');
        $('.deliveryPoint_' + receiverWardIndex).removeClass('card_error_' + receiverWardIndex);
        $('.wardReceiver_' + receiverWardIndex).removeClass('address_success');
        $('.wardReceiver_' + receiverWardIndex).removeClass('address_warning');
        $('.wardReceiver_' + receiverWardIndex).removeClass('address_error');
        $('.deliveryPoint_' + receiverWardIndex).addClass('card_warning');
        $('.wardReceiver_' + receiverWardIndex).addClass('address_edit');
    });

});

function choosePickupAddressFast(id) {
    // console.log(id)
    if (id == 0) {
        $('.newPickupFast').show();
        $('.oldPickup').hide();
        $('.choosePickUpAddressFastNew').val('Thêm mới điêm gửi');
        $('.err_orderSender').html('');
        $('.err_orderSenderAddress').html('');
        $('.err_orderSenderPhone').html('');
        $('.pickName').val('');
        $('.pickPhone').val('');
        $('.pickUpAddress').val('');
        $('.pickUpAddressProvince').val('');
        $('.pickUpAddressDistrict').val('');
        $('.pickUpAddressWard').val('');
        $('.pickupAddressId').val('');
        $('.chosen-container').css("width", "100%");
    } else {

        $.ajax({
            url: '/vi/choosePickupAddressFast',
            type: 'post',
            dataType: 'json',
            data: {
                'pickUpAddress': id
            },
            success: function(res) {
                if (res.success) {
                    $('.newPickupFast').hide();
                    $('.choosePickUpAddressFastNew').val(res.fullAddress);
                    $('.pickupAddressId').val(id);
                    $('.senderInfo').html(res.dataHtml);
                } else {
                    console.log(1234)
                    console.log(res)
                }
            },
            error: function(res) {
                console.log(12345)
                console.log(res)
            }
        });
    }
}
//Hiển thị thông tin hàng hóa


function changeFees(index) {
    let key = parseInt(index) + 1;
    var packageShipKey = $('[name="packageShip_' + key + '"]').find(":selected").val();
    if (index !== '') {
        $.ajax({
            url: '/vi/changeFees',
            type: 'post',
            dataType: 'json',
            data: {
                'index': index,
                'packageShipKey': packageShipKey
            },
            success: function(res) {
                if (res.success) {

                    $('.changeFee_' + index).html(new Intl.NumberFormat().format(res.data.totalFee));
                    $('.totalFee_' + index).html(new Intl.NumberFormat().format(res.data.totalFee) + ' đ');
                    if (res.data.feeDetail.transportFee != 0) {
                        $('.transportFee_' + index).html(new Intl.NumberFormat().format(res.data.feeDetail.transportFee) + ' đ');
                    }
                    if (res.data.feeDetail.insuranceFee != 0) {
                        $('.insuranceFee_' + index).html(new Intl.NumberFormat().format(res.data.feeDetail.insuranceFee) + ' đ');
                    }
                    if (res.data.feeDetail.pickupFee != 0) {
                        $('.pickupFee_' + index).html(new Intl.NumberFormat().format(res.data.feeDetail.pickupFee) + ' đ');
                    }
                    if (res.data.feeDetail.porterFee != 0) {
                        $('.porterFee_' + index).html(new Intl.NumberFormat().format(res.data.feeDetail.porterFee) + ' đ');
                    }
                    if (res.data.feeDetail.partialFee != 0) {
                        $('.partialFee_' + index).html(new Intl.NumberFormat().format(res.data.feeDetail.partialFee) + ' đ');
                    }
                    if (res.data.feeDetail.handoverFee != 0) {
                        $('.handoverFee_' + index).html(new Intl.NumberFormat().format(res.data.feeDetail.handoverFee) + ' đ');
                    }
                    if (res.data.feeDetail.codFee != 0) {
                        $('.codFee_' + index).html(new Intl.NumberFormat().format(res.data.feeDetail.codFee) + ' đ');
                    }
                    if (res.data.feeDetail.otherFee != 0) {
                        $('.otherFee_' + index).html(new Intl.NumberFormat().format(res.data.feeDetail.otherFee) + ' đ');
                    }
                } else {
                    console.log(1234)
                    console.log(res)
                }
            },
            error: function(res) {
                console.log(12345)
                console.log(res)
            }
        });
    }
}

function changeProvinceAddress(index) {
    var province = $('#pickProvince_' + index).find(':selected').val();

    $('#pickProvince_' + index).parent().removeClass('address_error');
    $('#pickProvince_' + index).parent().removeClass('address_success');
    $('#pickProvince_' + index).parent().removeClass('address_warning');
    $('#pickProvince_' + index).parent().addClass('address_edit');
    var reveiverDistrict = $('.district_find_pro_' + index).val();
    var reveiverWards = $('.district_find_pro_' + index).val();

    $('.err_Province' + index).html('');
    $.ajax({
        url: '/vi/getDistrictsAjax',
        type: 'post',
        dataType: 'json',
        data: { 'province': province },
        success: function(res) {

            $('#pickDistrict_' + index).html(res.data);
            $('#pickDistrict_' + index).trigger("change");
            $('#pickDistrict_' + index).trigger("chosen:updated");

            $('#pickDistrict_' + index).val(reveiverDistrict).trigger("chosen:updated");

            $('#pickWard_' + index).html(res.html_ward);
            $('#pickWard_' + index).val(0);
            $('#pickWard_' + index).trigger("chosen:updated");

        },
        error: function(res) {
            $('#pickDistrict_' + index).val(0);
            $('#pickDistrict_' + index).trigger("chosen:updated");
            $('#pickWard_' + index).val(0);
            $('#pickWard_' + index).trigger("chosen:updated");
            $('#loading_image').fadeOut(300);

        }
    });
}

function changeDistrictAddress(index) {
    var reveiverProvince = $('.province_find_pro_' + index).val();
    var reveiverWards = $('.wards_find_pro_' + index).val();
    var reveiverDistrict = $('#pickDistrict_' + index).find(':selected').val();
    if (reveiverDistrict == 0) {
        reveiverDistrict = $('.district_find_pro_' + index).val();
    }
    if (reveiverProvince == 0) {
        reveiverProvince = $('#pickProvince_' + index).find(':selected').val();
    }
    if (reveiverDistrict.length == 0 || reveiverDistrict == 0) {
        $('.err_district_' + index).html('Quận/Huyện không được để trống.');
    } else {
        $('.err_district_' + index).html('');
    }
    $('#pickDistrict_' + index).parent().removeClass('address_error');
    $('#pickDistrict_' + index).parent().removeClass('address_success');
    $('#pickDistrict_' + index).parent().removeClass('address_warning');
    $('#pickDistrict_' + index).parent().addClass('address_edit');

    $('.err_District' + index).html('');
    $.ajax({
        url: '/vi/getWardsAjax',
        type: 'post',
        dataType: 'json',
        data: { 'province': reveiverProvince, 'district': reveiverDistrict },
        success: function(res) {
            $('#pickWard_' + index).html(res.data);
            $('#pickWard_' + index).trigger("change");
            $('#pickWard_' + index).val(reveiverWards).trigger("chosen:updated");
        },
        error: function(res) {
            $('.pickWard_' + index).val(0);
            $('.pickWard_' + index).trigger("chosen:updated");
            $('#loading_image').fadeOut(300);

        }
    });
}

function changeReceiverAddress(index) {
    var pickAddress = $('.receiverAddress_' + index).val();
    if (pickAddress.length <= 0) {

        $('#pickDistrict_' + index).html('<option value="0">Chọn Quận/Huyện </option>');
        $('#pickWard_' + index).html('<option value="0">Chọn Phường/Xã </option>');
        $('#pickProvince_' + index).val(0).trigger("chosen:updated");
        $('#pickDistrict_' + index).val(0).trigger("chosen:updated");
        $('#pickWard_' + index).val(0).trigger("chosen:updated");

        $('.err_Province' + index).html('Tỉnh/Thành phố không được để trống.');
        $('.err_District' + index).html('Quận/Huyện không được để trống.');
        $('.err_Ward' + index).html('Phường/Xã không được để trống.');
        $('.err_receiverAddress_' + index).html('Địa chỉ người nhận không được để trống');

        $('#pickProvince_' + index).parent().removeClass('address_success');
        $('#pickProvince_' + index).parent().removeClass('address_warning');
        $('#pickProvince_' + index).parent().removeClass('address_edit');
        $('#pickDistrict_' + index).parent().removeClass('address_warning');
        $('#pickDistrict_' + index).parent().removeClass('address_success');
        $('#pickDistrict_' + index).parent().removeClass('address_edit');
        $('#pickWard_' + index).parent().removeClass('address_success');
        $('#pickWard_' + index).parent().removeClass('address_warning');
        $('#pickWard_' + index).parent().removeClass('address_edit');
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
                            $('#pickWard_' + index).parent().addClass('address_success');
                        } else if ((0.7 <= obj.ward_prob) && (obj.ward_prob < 0.9) && obj.ward_code) {
                            $('#pickWard_' + index).parent().addClass('address_warning');
                        } else {
                            $('#pickWard_' + index).parent().addClass('address_error');
                        }

                        if (obj.district_prob >= 0.9 && obj.district_code) {
                            $('#pickDistrict_' + index).parent().addClass('address_success');
                        } else if ((0.7 <= obj.district_prob) && (obj.district_code < 0.9) && obj.district_code) {
                            $('#pickDistrict_' + index).parent().addClass('address_warning');
                        } else {
                            $('#pickDistrict_' + index).parent().addClass('address_error');
                        }

                        if (obj.province_prob >= 0.9 && obj.province_code) {
                            $('#pickProvince_' + index).parent().addClass('address_success');
                        } else if ((0.7 <= obj.province_prob) && (obj.province_code < 0.9) && obj.province_code) {
                            $('#pickProvince_' + index).parent().addClass('address_warning');
                        } else {
                            $('#pickProvince_' + index).parent().addClass('address_error');
                        }

                        $('#pickProvince_' + index).trigger("chosen:updated");
                        $('#pickDistrict_' + index).trigger("chosen:updated");
                        $('#pickWard_' + index).trigger("chosen:updated");
                        if (obj.province_prob >= 0.7 && obj.province_code) {

                            $(".province_find_pro_" + index).val(obj.province_code);
                            if (obj.district_prob >= 0.7 && obj.district_code) {
                                $(".district_find_pro_" + index).val(obj.district_code);
                                if (obj.ward_prob >= 0.7 && obj.ward_code) {
                                    $(".wards_find_pro_" + index).val(obj.ward_code);
                                } else {
                                    $(".wards_find_pro_" + index).val('0');
                                }
                            } else {
                                $(".district_find_pro_" + index).val('0');
                                $(".wards_find_pro_" + index).val('0');
                            }
                            $('#pickProvince_' + index).val(obj.province_code).trigger("chosen:updated");
                            $('#pickProvince_' + index).trigger('change');
                        } else {

                            $('#pickProvince_' + index).parent().removeClass('address_success');
                            $('#pickProvince_' + index).parent().removeClass('address_warning');
                            $('#pickProvince_' + index).parent().removeClass('address_edit');
                            $('#pickDistrict_' + index).parent().removeClass('address_warning');
                            $('#pickDistrict_' + index).parent().removeClass('address_success');
                            $('#pickDistrict_' + index).parent().removeClass('address_edit');
                            $('#pickWard_' + index).parent().removeClass('address_success');
                            $('#pickWard_' + index).parent().removeClass('address_warning');
                            $('#pickWard_' + index).parent().removeClass('address_edit');

                            $('#pickDistrict_' + index).parent().addClass('address_error');
                            $('#pickProvince_' + index).parent().addClass('address_error');
                            $('#pickWard_' + index).parent().addClass('address_error');
                            $(".province_find_pro_" + index).val('0');
                            $(".district_find_pro_" + index).val('0');
                            $(".wards_find_pro_" + index).val('0');
                            $('#pickProvince_' + index).val(0).trigger("chosen:updated");
                            $('#pickDistrict_' + index).val(0).trigger("chosen:updated");
                            $('#pickWard_' + index).val(0).trigger("chosen:updated");
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
}
//RecaculateFees
function reCaculateFees(key, index) {
    var reveiverProvince = $('.province_find_pro_' + index).val();
    var reveiverDistrict = $('.district_find_pro_' + index).val();
    var reveiverWards = $('.wards_find_pro_' + index).val();
    if (reveiverProvince == '') {
        reveiverProvince = $('#pickProvince_' + index).find(':selected').val();
    }
    if (reveiverDistrict == '') {
        reveiverDistrict = $('#pickDistrict_' + index).find(':selected').val();
    }
    if (reveiverWards == '') {
        reveiverWards = $('#pickWard_' + index).find(':selected').val();
    }
    var pickAddress = $('.receiverAddress_' + index).val();
    $.ajax({
        url: '/vi/reCaculateFees',
        type: 'post',
        dataType: 'json',
        data: { 'index': key, 'province': reveiverProvince, 'district': reveiverDistrict, 'ward': reveiverWards, 'pickAddress': pickAddress },
        success: function(res) {
            if (res.success) {
                $('.reChangeFee_' + index).html(res.data);
                $('.reChangeFee_' + index).trigger("change");
                $('.reChangeFee_' + index).trigger("chosen:updated");
                var newFees = res.arrData[0];
                $('.changeTotalFee_' + key).html(new Intl.NumberFormat().format(newFees.totalFee));
                $('.changeValueFee_' + key).html(new Intl.NumberFormat().format(newFees.transportFee));
                $('.changeCodFee_' + key).html(new Intl.NumberFormat().format(newFees.codFee));
                $('.changeFee_' + key).html(new Intl.NumberFormat().format(newFees.otherFee));
            } else {
                console.log(1)
                console.log(res)
            }
        },
        error: function(res) {
            console.log(res)
        }
    });
}
// =========Hiển thị chỉnh sửa================
function editOrders(deliveryPointIndex, receiverIndex, productIndex) {
    document.getElementsByClassName('editOrderDetailFile_' + (parseInt(deliveryPointIndex) - 1))[0].style.display = "block";
    document.getElementsByClassName('orderDetailFile_' + (deliveryPointIndex))[0].style.display = "none";
    $('#productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex + '_chosen').css("width", "100%");

    $('.productCategory_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).val('0').trigger("chosen:updated");
    $('#requiredNote_' + deliveryPointIndex + '_chosen').css("width", "100%");

    $('.requiredNote_' + deliveryPointIndex).trigger("chosen:updated");
}

function ValidateOrderFileProductName(deliveryPointIndex, receiverIndex, productIndex) {
    var productName = $('.productTextName_' + deliveryPointIndex + '_' + receiverIndex).val();
    if (productName == '' || productName == null) {
        $('.err_productName_' + deliveryPointIndex + '_' + receiverIndex).html('Tên hàng hoá không được bỏ trống');
    } else {
        $('.err_productName_' + deliveryPointIndex + '_' + receiverIndex).html('');
    }
};

function ValidateOrderFileProductCOD(deliveryPointIndex, receiverIndex, productIndex) {

    let productCOD = $('.productTextCOD_' + deliveryPointIndex + '_' + receiverIndex).val().replace(/\,/g, '');
    if (productCOD == '' || productCOD == null) {
        $('.productCOD_' + deliveryPointIndex + '_' + receiverIndex).val('0');
    } else if (productCOD > 100000000) {
        $('.productCOD_' + deliveryPointIndex + '_' + receiverIndex).val(100, 000, 000);
        $('.err_productCOD_' + deliveryPointIndex + '_' + receiverIndex).html('Tiền COD bạn nhập quá lớn');
    } else {
        $('.err_productCOD_' + deliveryPointIndex + '_' + receiverIndex).html('');
    }
}

function ValidateOrderFileProductValue(deliveryPointIndex, receiverIndex, productIndex) {
    var productValue = $('.productTextValue_' + deliveryPointIndex + '_' + receiverIndex).val().replace(/\,/g, '');
    var checked = 0;
    $('input.checkProductValue_' + deliveryPointIndex + '_' + receiverIndex + ':checkbox:checked').each(function() {
        checked = $(this).val();
    });
    if (checked = 1 && productValue <= 0) {
        $('.err_productValue_' + deliveryPointIndex + '_' + receiverIndex).html('Giá trị hàng hoá phải lớn hơn 0');
    } else if (checked = 1 && productValue > 100000000) {
        $('.productValue_' + deliveryPointIndex + '_' + receiverIndex).val(100, 000, 000);
        $('.err_productValue_' + deliveryPointIndex + '_' + receiverIndex).html('Giá trị hàng hoá bạn nhập quá lớn');
    } else {
        $('.err_productValue_' + deliveryPointIndex + '_' + receiverIndex).html('');
    }
}

function ValidateOrderFileProductCate(deliveryPointIndex, receiverIndex, productIndex) {
    var productCate = $('.productTextCategory_' + deliveryPointIndex + '_' + receiverIndex).val();
    if (productCate <= 0) {
        $('.err_productCategory_' + deliveryPointIndex + '_' + receiverIndex).html('Loại hàng hoá không được để trống');
    } else {
        $('.err_productCategory_' + deliveryPointIndex + '_' + receiverIndex).html('');
    }
}

function ValidateOrderFileProductQuantity(deliveryPointIndex, receiverIndex, productIndex) {
    let productQuantity = $('.productTextQuantity_' + deliveryPointIndex + '_' + receiverIndex).val().replace(/\,/g, '');
    if (productQuantity <= 0) {
        $('.productQuantity_' + deliveryPointIndex + '_' + receiverIndex).val('1');
        $('.err_productQuantity_' + deliveryPointIndex + '_' + receiverIndex).html('');
    } else if (productQuantity > 100) {
        $('.productQuantity_' + deliveryPointIndex + '_' + receiverIndex).val('100');
        $('.err_productQuantity_' + deliveryPointIndex + '_' + receiverIndex).html('Số lượng bạn nhập quá lớn');
    } else {
        $('.err_productQuantity_' + deliveryPointIndex + '_' + receiverIndex).html('');
    }
}

function saveProductOrderFiles(deliveryPointIndex, receiverIndex, productIndex, type) {
    // Thông tin sản phẩm
    var productName = $('#quick-orders').find('.productTextName_' + deliveryPointIndex + '_' + receiverIndex).val();
    var productCOD = $('#quick-orders').find('.productTextCOD_' + deliveryPointIndex + '_' + receiverIndex).val().replace(/\,/g, '');
    var productValue = $('#quick-orders').find('.productTextValue_' + deliveryPointIndex + '_' + receiverIndex).val().replace(/\,/g, '');
    var productCate = $('#quick-orders').find('.productTextCategory_' + deliveryPointIndex + '_' + receiverIndex).val();
    var productCateText = $('.productTextCategory_' + deliveryPointIndex + '_' + receiverIndex).find(":selected").text();

    var productQuantity = $('#quick-orders').find('.productTextQuantity_' + deliveryPointIndex + '_' + receiverIndex).val().replace(/\,/g, '');

    let error = 0;
    if (productName == '' || productName == null) {
        $('.err_productName_' + deliveryPointIndex + '_' + receiverIndex).html('Tên hàng hoá không được bỏ trống');
        error = 1;
    } else {
        $('.err_productName_' + deliveryPointIndex + '_' + receiverIndex).html('');
    }

    if (productCOD == '' || productCOD == null || productCOD < 0) {
        $('.productTextCOD_' + deliveryPointIndex + '_' + receiverIndex).val(0);
    } else if (productCOD > 100000000) {
        $('.productTextCOD_' + deliveryPointIndex + '_' + receiverIndex).val(100, 000, 000);
        $('.err_productCOD_' + deliveryPointIndex + '_' + receiverIndex).html('Tiền COD bạn nhập quá lớn');
        error = 1;
    } else {
        $('.err_productCOD_' + deliveryPointIndex + '_' + receiverIndex).html('');
    }

    var checked = 0;
    $('input.checkProductValue_' + deliveryPointIndex + '_' + receiverIndex + ':checkbox:checked').each(function() {
        checked = $(this).val();
    });

    if (checked == 1 && productValue <= 0) {
        $('.err_productValue_' + deliveryPointIndex + '_' + receiverIndex).html('Giá trị hàng hoá phải lớn hơn 0');
        error = 1;
    } else if (checked == 1 && productValue > 100000000) {
        $('.productTextValue_' + deliveryPointIndex + '_' + receiverIndex).val(100, 000, 000);
        $('.err_productValue_' + deliveryPointIndex + '_' + receiverIndex).html('Giá trị hàng hoá bạn nhập quá lớn');
        error = 1;
    } else {
        $('.err_productValue_' + deliveryPointIndex + '_' + receiverIndex).html('');
    }

    if (productCate <= 0) {
        $('.err_productCategory_' + deliveryPointIndex + '_' + receiverIndex).html('Loại hàng hoá không được để trống');
        error = 1;
    } else {
        $('.err_productCategory_' + deliveryPointIndex + '_' + receiverIndex).html('');
    }

    if (productQuantity <= 0) {
        $('.productTextQuantity_' + deliveryPointIndex + '_' + receiverIndex).val(1);
    } else if (productQuantity > 100) {
        $('.productTextQuantity_' + deliveryPointIndex + '_' + receiverIndex).val(100);
        $('.err_productQuantity_' + deliveryPointIndex + '_' + receiverIndex).html('Số lượng bạn nhập quá lớn');
        error = 1;
    } else {
        $('.err_productQuantity_' + deliveryPointIndex + '_' + receiverIndex).html('');
    }

    var productIndexNext = $('.productIndexNext').val();
    if (error == 0) {
        if (type == 'addProduct') {
            let
                html = '<div class="w100 itemOrderFile countItemOrder_' + deliveryPointIndex + ' productItem_' + deliveryPointIndex + '_' + productIndex + '">'
            html += '<div class="row w100 orderDetailFile"> ';
            html += '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 fz13 wrapCountProduct_' + deliveryPointIndex + '">';
            html += '<span class="or-dh-stt countProduct_' + deliveryPointIndex + '_' + productIndex + '" style="background: #885DE5;">' + productIndex + '</span>';
            html += '<span class="success_productName_' + deliveryPointIndex + '_' + productIndex + '">' + productName + '</span>';
            html += '</div>';

            html += '<div class="col-lg-1 col-md-1 col-sm-6 col-xs-6 fz13">';
            html += 'SL: <span class="colorPurple success_productQuantity_' + deliveryPointIndex + '_' + productIndex + '">' + productQuantity + '</span>';
            html += '</div>';

            html += '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 fz13">';
            html += '<span class="success_productCate_' + deliveryPointIndex + '_' + productIndex + '">' + productCateText + '</span>';
            html += '</div>';

            html += '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 fz13">';
            html += 'COD: <span class="colorOrange success_cod_' + deliveryPointIndex + '_' + productIndex + '">' + (new Intl.NumberFormat().format((productCOD * productQuantity))) + ' </span> đ';
            html += '</div>';

            html += '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 fz13">';
            html += 'Khai giá: <span class="success_productValue_' + deliveryPointIndex + '_' + productIndex + '">' + (new Intl.NumberFormat().format(productValue * productQuantity)) + ' đ</span>';
            html += '</div>';

            html += '<div class="col-lg-1 col-md-1 col-sm-6 col-xs-6 fz13 text-right">';
            // data-toggle="modal" data-target="#confirm-delete-<?= $deliveryPointIndex.'_'.$itemIndex ?>
            // onclick="deleteProductOrderFiles('+deliveryPointIndex+',' +receiverIndex+','+(productIndex)+')"
            html += '<img class="cursorPointer" src="' + location.origin + '/public/images/or-delete.png' + '" data-toggle="modal" data-target="#confirm-delete-' + deliveryPointIndex + '_' + productIndex + '"> ';
            html += '<img class="cursorPointer" src="' + location.origin + '/public/images/or-edit.png' + '" onclick="editProductOrderFiles(' + deliveryPointIndex + ',' + receiverIndex + ',' + (productIndex) + ')">';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '<input type="hidden" class="product_' + deliveryPointIndex + '_' + productIndex + ' productName_' + deliveryPointIndex + '_' + productIndex + '" name="productName_' + deliveryPointIndex + '_' + productIndex + '" value="' + productName + '">';
            html += '<input type="hidden" class="product_' + deliveryPointIndex + '_' + productIndex + ' quantity_' + deliveryPointIndex + '_' + productIndex + '" name="quantity_' + deliveryPointIndex + '_' + productIndex + '"  value="' + productQuantity + '">';
            html += '<input type="hidden" class="product_' + deliveryPointIndex + '_' + productIndex + ' cod_' + deliveryPointIndex + '_' + productIndex + '" name="cod_' + deliveryPointIndex + '_' + productIndex + '"  value="' + productCOD + '">';
            html += '<input type="hidden" class="product_' + deliveryPointIndex + '_' + productIndex + ' productCate_' + deliveryPointIndex + '_' + productIndex + '" name="productCate_' + deliveryPointIndex + '_' + productIndex + '"  value="' + productCate + '">';
            html += '<input type="hidden" class="product_' + deliveryPointIndex + '_' + productIndex + ' productValue_' + deliveryPointIndex + '_' + productIndex + '" name="productValue_' + deliveryPointIndex + '_' + productIndex + '"  value="' + productValue + '">';

            //Update count item
            $('.itemIndex_' + deliveryPointIndex).val(productIndex);
            htmlItem = '<div class="row itemDetail itemDetail_' + deliveryPointIndex + '_' + (parseInt(productIndex)) + '">';
            htmlItem += '<div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 fz13">';
            htmlItem += '<span class="itemDetailName_' + deliveryPointIndex + '_' + (parseInt(productIndex)) + '"><strong>' + productName + '</strong></span>'
            htmlItem += '</div>'

            htmlItem += '<div class="col-lg-2 col-md-6 col-sm-2 col-xs-6 fz13">';
            htmlItem += 'SL: <span class="colorPurple itemDetailQuantity_' + deliveryPointIndex + '_' + (parseInt(productIndex)) + '"><strong>' + productQuantity + '</strong></span>'
            htmlItem += '</div>'

            htmlItem += '<div class="col-lg-3 col-md-6 col-sm-3 col-xs-6 fz13">';
            htmlItem += 'COD: <span class="colorOrange colorOrange itemDetailCOD_' + deliveryPointIndex + '_' + (parseInt(productIndex)) + '">' + (new Intl.NumberFormat().format(productCOD)) + ' </span> đ'
            htmlItem += '</div>'

            htmlItem += '<div class="col-lg-3 col-md-6 col-sm-3 col-xs-6 fz13">';
            htmlItem += 'Khai giá: <span class="itemDetailValue_' + deliveryPointIndex + '_' + (parseInt(productIndex)) + '">' + (new Intl.NumberFormat().format(productValue)) + ' </span> đ'
            htmlItem += '</div>'

            htmlItem += '</div>'

            //Button Save Product
            $('.saveProduct_' + deliveryPointIndex + '_' + receiverIndex).attr('onclick', 'saveProductOrderFiles(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + (parseInt(productIndex) + 1) + ', "addProduct")');
            $('.saveProduct_' + deliveryPointIndex + '_' + receiverIndex).attr('productindex', (parseInt(productIndex) + 1));

            $('.closePickupOrder_' + deliveryPointIndex + '_' + receiverIndex).attr('onclick', 'closeOrderDetailFile(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + (parseInt(productIndex)) + ', "addProduct")');
            $('.itemOrderFile_' + deliveryPointIndex).append(html);
            $('.wrapperItem_' + deliveryPointIndex).append(htmlItem);
        } else if (type == 'editProduct') {

            // productCOD = productCOD / productQuantity;
            // productValue = productValue / productQuantity;
            //Set value
            $('.success_productName_' + deliveryPointIndex + '_' + productIndex).html(productName);
            $('.success_productQuantity_' + deliveryPointIndex + '_' + productIndex).html(productQuantity);
            $('.success_cod_' + deliveryPointIndex + '_' + productIndex).html((new Intl.NumberFormat().format(productCOD * productQuantity)));
            $('.success_productValue_' + deliveryPointIndex + '_' + productIndex).html((new Intl.NumberFormat().format(productValue * productQuantity)));
            $('.success_productCate_' + deliveryPointIndex + '_' + productIndex).html(productCateText);

            //Set value input hidden
            $('.productName_' + deliveryPointIndex + '_' + productIndex).val(productName);
            $('.quantity_' + deliveryPointIndex + '_' + productIndex).val(productQuantity);
            $('.cod_' + deliveryPointIndex + '_' + productIndex).val(productCOD);
            $('.productValue_' + deliveryPointIndex + '_' + productIndex).val(productValue);
            $('.productCate_' + deliveryPointIndex + '_' + productIndex).val(productCate);

            $('.itemDetailName_' + deliveryPointIndex + '_' + productIndex).text(productName);
            $('.itemDetailQuantity_' + deliveryPointIndex + '_' + productIndex).text(productQuantity);
            $('.itemDetailCOD_' + deliveryPointIndex + '_' + productIndex).text((new Intl.NumberFormat().format(productCOD * productQuantity)));
            $('.itemDetailValue_' + deliveryPointIndex + '_' + productIndex).text((new Intl.NumberFormat().format(productValue * productQuantity)));

            //Button Save Product
            $('.saveProduct_' + deliveryPointIndex + '_' + receiverIndex).attr('onclick', 'saveProductOrderFiles(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + (parseInt(productIndex) + 1) + ', "addProduct")');
            $('.saveProduct_' + deliveryPointIndex + '_' + receiverIndex).attr('productindex', (parseInt(productIndex) + 1));

            $('.closePickupOrder_' + deliveryPointIndex + '_' + receiverIndex).attr('onclick', 'closeOrderDetailFile(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + (parseInt(productIndex)) + ', "addProduct")');
        }
        //Add modal delete
        let htmlDelete = '';
        htmlDelete += '<div class="modal fade" id="confirm-delete-' + deliveryPointIndex + '_' + productIndex + '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
        htmlDelete += '<div class="modal-dialog">';
        htmlDelete += '<div class="modal-content">';
        htmlDelete += '<div class="modal-header">';
        htmlDelete += '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
        htmlDelete += '<h4 class="modal-title" id="myModalLabel"></h4>';
        htmlDelete += '</div>';

        htmlDelete += '<div class="modal-body">';
        htmlDelete += '<p>Bạn có chắc chắn muốn xóa</p>';
        htmlDelete += '<p class="debug-url"></p>';
        htmlDelete += '</div>';

        htmlDelete += '<div class="modal-footer">';
        htmlDelete += '<button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>';
        htmlDelete += '<button type="button" onclick="deleteProductOrderFiles(' + deliveryPointIndex + ',' + receiverIndex + ',' + productIndex + ')" class="btn btn-danger btn-ok" data-dismiss="modal">Xóa</button>';
        htmlDelete += '</div>';

        htmlDelete += '</div>';
        htmlDelete += '</div>';
        htmlDelete += '</div>';

        $('.modalDeleteItem').append(htmlDelete);
        //Clear value
        $('.productTextName_' + deliveryPointIndex + '_' + receiverIndex).val('');
        $('.productTextCOD_' + deliveryPointIndex + '_' + receiverIndex).val('0');
        $('.checkProductValue_' + deliveryPointIndex + '_' + receiverIndex).attr('checked');
        $('.productTextValue_' + deliveryPointIndex + '_' + receiverIndex).val('0');
        $('.productTextCategory_' + deliveryPointIndex + '_' + receiverIndex).val('0').trigger("chosen:updated");
        $('.productTextQuantity_' + deliveryPointIndex + '_' + receiverIndex).val('1');
    }

}

function editProductOrderFiles(deliveryPointIndex, receiverIndex, productIndexNext) {
    var productName = $('#quick-orders').find('.productName_' + deliveryPointIndex + '_' + productIndexNext).val();
    var productCOD = $('#quick-orders').find('.cod_' + deliveryPointIndex + '_' + productIndexNext).val().replace(/\,/g, '');
    var productValue = $('#quick-orders').find('.productValue_' + deliveryPointIndex + '_' + productIndexNext).val().replace(/\,/g, '');
    var productCate = $('#quick-orders').find('.productCate_' + deliveryPointIndex + '_' + productIndexNext).val();
    var productQuantity = $('#quick-orders').find('.quantity_' + deliveryPointIndex + '_' + productIndexNext).val();
    var productCateText = $('.productCate_' + deliveryPointIndex + '_' + productIndexNext).find(":selected").text();
    if (productCate == '') {
        productCate = 0;
    }
    // productCOD = productCOD/productQuantity;
    // productValue = productValue/productQuantity;
    //Set Value
    $('.productTextName_' + deliveryPointIndex + '_' + receiverIndex).val(productName);
    $('.productTextCOD_' + deliveryPointIndex + '_' + receiverIndex).val((new Intl.NumberFormat().format(productCOD)));
    $('.productTextValue_' + deliveryPointIndex + '_' + receiverIndex).val((new Intl.NumberFormat().format(productValue)));
    $('.productTextCategory_' + deliveryPointIndex + '_' + receiverIndex).val(productCate).trigger('chosen:updated');
    $('.productTextQuantity_' + deliveryPointIndex + '_' + receiverIndex).val(productQuantity);

    //Button Save Product
    $('.saveProduct_' + deliveryPointIndex + '_' + receiverIndex).attr('onclick', 'saveProductOrderFiles(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + (parseInt(productIndexNext)) + ', "editProduct")');
}

function closeOrderDetailFile(deliveryPointIndex, receiverIndex, productIndex) {

    // let orderPayment = $('.editOrderPayment_'+deliveryPointIndex).val();
    // let partialDelivery = $('.editPartialDelivery_'+deliveryPointIndex).val();
    let orderPayment = '';
    let partialDelivery = '';
    let isReturn = '';
    let isDoorDeliver = '';
    let isDoor = '';
    let length = '';
    let width = '';
    let height = '';
    let weight = '';
    let note = '';
    let requiredNote = '';
    let expectDate = '';
    let expectTime = '';
    let receiverPhone = '';
    let receiverName = '';
    let pickupType = '';

    //Get value
    $('input.editOrderPayment_' + deliveryPointIndex + ':radio:checked').each(function() {
        orderPayment = $(this).val();
    });
    $('input.editPartialDelivery_' + deliveryPointIndex + ':radio:checked').each(function() {
        partialDelivery = $(this).val();
    });
    $('input.editIsReturn_' + deliveryPointIndex + ':radio:checked').each(function() {
        isReturn = $(this).val();
    });
    $('input.editpickUpType_' + deliveryPointIndex + ':radio:checked').each(function() {
        pickupType = $(this).val();
    });

    size = $('.editSize_' + deliveryPointIndex).val();
    expectDate = $('.editExpectDate_' + deliveryPointIndex + '_' + receiverIndex).val();
    expectTime = $('.editExpectTime_' + deliveryPointIndex + '_' + receiverIndex).val();
    fullSize = size.split("-");

    if (typeof fullSize !== 'undefined' && fullSize.length > 0) {
        length = fullSize[0]
        width = fullSize[1]
        height = fullSize[2]
    }
    weight = $('.editWWeight_' + deliveryPointIndex).val().replace('.', '');
    note = $('.editNote_' + deliveryPointIndex).val();
    requiredNote = $('.requiredNote_' + deliveryPointIndex).find(':selected').val();
    receiverPhone = $('.receiverPhone_' + deliveryPointIndex + '_' + receiverIndex).val();
    receiverName = $('.receiverName_' + deliveryPointIndex + '_' + receiverIndex).val();

    //Set value to input
    $('.length_' + deliveryPointIndex).val(length);
    $('.height_' + deliveryPointIndex).val(height);
    $('.width_' + deliveryPointIndex).val(width);
    $('.weight_' + deliveryPointIndex).val(weight);
    $('.note_' + deliveryPointIndex).val(note);
    $('.orderPayment_' + deliveryPointIndex).val(orderPayment);
    $('.partialDelivery_' + deliveryPointIndex).val(partialDelivery);
    $('.isReturn_' + deliveryPointIndex).val(isReturn);
    // $('.isDoorDeliver_'+deliveryPointIndex).val(isDoorDeliver);
    // $('.isDoor_'+deliveryPointIndex).val(isDoor);
    $('.requireNote_' + deliveryPointIndex).val(requiredNote);
    $('.expectDate_' + deliveryPointIndex).val(expectDate);
    $('.expectTime_' + deliveryPointIndex).val(expectTime);
    $('.receiverPhone_' + deliveryPointIndex).val(receiverPhone);
    $('.receiverName_' + deliveryPointIndex).val(receiverName);
    $('.pickupType_' + deliveryPointIndex).val(pickupType);

    //set html
    // htmlSize<?= $deliveryPointIndex ?>

    if (orderPayment == 1) {
        textOrderPayment = 'Người gửi';
    } else {
        textOrderPayment = 'Người nhận';
    }

    if (partialDelivery == 1) {
        textpartialDelivery = 'Có';
    } else {
        textpartialDelivery = 'Không';
    }

    if (isReturn == 1) {
        textisReturn = 'Có';
    } else {
        textisReturn = 'Không';
    }

    if (pickupType == 1) {
        textpickupType = 'Có';
    } else {
        textpickupType = 'Không';
    }
    if (requiredNote == 1) {
        textrequiredNote = 'Không cho xem hàng';
    } else if (requiredNote == 2) {
        textrequiredNote = 'Cho thử hàng';
    } else if (requiredNote == 3) {
        textrequiredNote = 'Cho xem hàng không cho thử';
    } else {
        textrequiredNote = '';
    }
    $('.expectDate_' + deliveryPointIndex).val(expectDate);
    $('.expectTime_' + deliveryPointIndex).val(expectTime);
    if (expectDate != '') {
        textExpect = expectDate + ' - ' + expectTime;
    } else if (expectTime != '') {
        textExpect = expectTime;
    } else {
        textExpect = '';
    }
    $('.htmlSize' + deliveryPointIndex).html(length + '-' + height + '-' + height);
    $('.htmlWeight' + deliveryPointIndex).html(String(weight).replace(/(.)(?=(\d{3})+$)/g, '$1.'));
    $('.htmlNote' + deliveryPointIndex).html(note);
    $('.htmlOrderPayment' + deliveryPointIndex).html(textOrderPayment);
    $('.htmlPartialDelivery' + deliveryPointIndex).html(textpartialDelivery);
    $('.htmlIsReturn' + deliveryPointIndex).html(textisReturn);
    $('.htmlPickupType' + deliveryPointIndex).html(textpickupType);
    $('.htmlRequireNote' + deliveryPointIndex).html(textrequiredNote);
    $('.htmlExpectDateTime' + deliveryPointIndex).html(textExpect);
    $('.htmlReceiverPhone_' + deliveryPointIndex).html(receiverPhone);
    $('.htmlReceiverName_' + deliveryPointIndex).html(receiverName);
    let error = 0;
    if (size == '') {
        $('.err_size_' + deliveryPointIndex).html('Kích thước không được để trống');
        error = 1;
    }
    if (weight == '' || weight == 0) {
        $('.err_weight_' + deliveryPointIndex).html('Cân nặng không được để trống');
    }
    if (receiverPhone == '') {
        $('.err_receiverPhone_' + deliveryPointIndex + '_' + receiverIndex).html('Số điện thoại không được bỏ trống');
        error = 1;
    } else {
        checkreceiverPhone = validatePhone(receiverPhone);
        if (!checkreceiverPhone) {
            $('.err_receiverPhone_' + deliveryPointIndex + '_' + receiverIndex).html('Số điện thoại không hợp lệ');
            error = 1;
        }
    }
    if (note.length > 300) {
        $('.err_note_' + deliveryPointIndex).html('Ghi chú vượt quá 300 ký tự');
        error = 1;
    } else {
        $('.err_note_' + deliveryPointIndex).html('');
        error = 0;
    }
    if (receiverName == '') {
        $('.err_receiverName_' + deliveryPointIndex + '_' + receiverIndex).html('Tên người nhận không được bỏ trống');
        error = 1;
    } else {
        $('.err_receiverName_' + deliveryPointIndex + '_' + receiverIndex).html('');
    }
    if (error == 0) {
        document.getElementsByClassName('editOrderDetailFile_' + (parseInt(deliveryPointIndex) - 1))[0].style.display = "none";
        document.getElementsByClassName('orderDetailFile_' + (deliveryPointIndex))[0].style.display = "block";
    }
}

function deleteProductOrderFiles(deliveryPointIndex, receiverIndex, productIndex) {

    var numItems = $('.countItemOrder_' + deliveryPointIndex).length;
    if (numItems > 1) {
        $(".productItem_" + deliveryPointIndex + "_" + productIndex).remove();
        $(".product_" + deliveryPointIndex + "_" + productIndex).remove();
        $(".itemDetail_" + deliveryPointIndex + "_" + productIndex).remove();
        setTimeout(function() {
            j = 1;
            for (i = 1; i <= numItems; i++) {
                $('.countProduct_' + deliveryPointIndex + '_' + (i)).html((j));
                $('.countProduct_' + deliveryPointIndex + '_' + (i)).addClass('countProduct_' + deliveryPointIndex + '_' + (j));
                //$('.countProduct_'+deliveryPointIndex+'_'+(i)).removeClass('countProduct_'+deliveryPointIndex+'_'+(i));
                if (i != productIndex) {
                    j++;
                }
            }
        }, 300);
        $('#confirm-delete-' + deliveryPointIndex + '_' + receiverIndex).modal('hide');
    } else {
        $('.err_countProduct_' + deliveryPointIndex).html('Đơn hàng phải có ít nhất 1 sản phẩm');
        $('#confirm-delete-' + deliveryPointIndex + '_' + receiverIndex).modal('hide');
    }
}

function inArray(needle, haystack) {
    var length = haystack.length;
    for (var i = 0; i < length; i++) {
        if (haystack[i] == needle) return true;
    }
    return false;
}

function btnPricingConfirm(deliveryPoint) {
    var totalItem = $('.checkSingleCustom:checked').length;
    error = 0;

    if (totalItem > 0) {
        ids = '';
        $('.checkSingleCustom:checked').each(function() {
            ids += $(this).val() + ',';
        });
        ids = ids.slice(0, -1);
        var arrChecked = ids.split(',');
        for (let i = 1; i <= deliveryPoint; i++) {
            if (inArray(i, arrChecked)) {
                var card_error = $('.card_error_' + i).length;
                receiverAddress = $('.receiverAddress_' + i).val();
                receiverProvinceCode = $('[name="receiverProvinceCode_' + i + '"]').find(':selected').val();
                receiverDistrictCode = $('[name="receiverDistrictCode_' + i + '"]').find(':selected').val();
                receiverWardCode = $('[name="receiverWardCode_' + i + '"]').find(':selected').val();
                if (receiverAddress == '') {
                    $('.err_receiverAddress_' + i).html('Địa chỉ người nhận không được để trống');
                    error = 1;
                }
                if (typeof receiverProvinceCode === 'undefined' || receiverProvinceCode == 0 || receiverProvinceCode == '') {
                    $('.err_Province' + i).html('Tỉnh/Thành phố không được để trống.');
                    error = 1;
                }
                if (typeof receiverDistrictCode === 'undefined' || receiverDistrictCode == 0 || receiverDistrictCode == '') {
                    $('.err_District' + i).html('Quận/Huyện không được để trống.');
                    error = 1;
                }
                if (typeof receiverWardCode === 'undefined' || receiverWardCode == 0 || receiverWardCode == '') {
                    $('.err_Ward' + i).html('Phường/Xã không được để trống.');
                    error = 1;
                }
                if (card_error > 0) {
                    error = 1;
                    $('.card_success').hide(500);
                    $('.card_warning').hide(500);
                    $('.card_error').show(500);
                    $('.ordersError').addClass('brdActive');
                    $('.ordersDoubts').removeClass('brdActive');
                    $('.ordersAll').removeClass('brdActive');
                }
            }
        }

        var pickUpAddressProvince = $('#quick-orders').find('.pickUpAddressProvince').val();
        var pickUpAddressDistrict = $('#quick-orders').find('.pickUpAddressDistrict').val();
        var pickUpAddressWard = $('#quick-orders').find('.pickUpAddressWard').val();
        var pickupAddressId = $('#quick-orders').find('.pickupAddressId').val();
        var pickName = $('.pickName').val();
        var pickPhone = $('.pickPhone').val();
        var pickUpAddress = $('.pickUpAddress').val();
        // check tạo điểm gửi mới
        if (pickupAddressId == 0 || pickupAddressId == '') {
            if (typeof pickUpAddressProvince === 'undefined' || pickUpAddressProvince == null || pickUpAddressProvince == 0 || pickUpAddressProvince == '') {
                $('.err_province').html('Tỉnh/Thành phố không được để trống');
                error = 1;
            }
            if (typeof pickUpAddressDistrict === 'undefined' || pickUpAddressDistrict == 0 || pickUpAddressDistrict == '') {
                $('.err_district').html('Quận/Huyện không được để trống');
                error = 1;
            }
            if (typeof pickUpAddressWard === 'undefined' || pickUpAddressWard == 0 || pickUpAddressWard == '') {
                $('.err_ward').html('Phường/Xã không được để trống');
                error = 1;
            }
            if (typeof pickUpAddress === 'undefined' || pickUpAddress == 0 || pickUpAddress == '') {
                $('.err_pickAddress').html('Địa chỉ gửi hàng không được để trống');
                error = 1;
            }
            if (pickPhone != '') {
                checkreceiverPhone = validatePhone(pickPhone);
                if (!checkreceiverPhone) {
                    $('.err_pickPhone').html('Số điện thoại không hợp lệ');
                    error = 1;
                }
            } else {
                $('.err_pickPhone').html('Số điện thoại không được để trống');
                error = 1;
            }
            if (pickName.length == 0) {
                $('.err_pickName').html('Tên người gửi không được để trống');
                error = 1;
            } else if (pickName.length < 2) {
                $('.err_pickName').html('Tên người gửi quá ngắn');
                error = 1;
            } else {
                $('.err_pickName').html('');
                error = 0;
            }
        }

        if (error == 0) {

            //Percentage circle loading 
            $('#loading-image').hide();
            $('#loading').show();
            $('.my-progress-bar').show();
            var count = $("[type='checkbox']:checked").length;
            timeLoading = 3000;
            if (count > 0 && count <= 50) {
                timeLoading = 5000;
            } else if (count > 50 && count <= 100) {
                timeLoading = 9000;
            } else if (count > 100 && count <= 150) {
                timeLoading = 11000;
            } else if (count > 150 && count <= 200) {
                timeLoading = 13000;
            } else if (count > 200) {
                timeLoading = 16000;
            }

            $(".my-progress-bar").circularProgress({
                line_width: 10,
                color: "#885DE5",
                starting_position: 0, // 12.00 o' clock position, 25 stands for 3.00 o'clock (clock-wise)
                percent: 0, // percent starts from
                percentage: true,
                text: ""
            }).circularProgress('animate', 95, timeLoading);
            $('.addPricing').val('pricing')
                // addPricing
            $('#form-order-fast').submit();
        }
    } else {
        $('#stepTwoOrderFiles').modal('show');
    }
}

function ordersError() {
    $('.card_success').hide(500);
    $('.card_warning').hide(500);
    $('.card_error').show(500);
    $('.ordersError').addClass('brdActive');
    $('.ordersDoubts').removeClass('brdActive');
    $('.ordersAll').removeClass('brdActive');
}

function ordersDoubts() {
    $('.card_error').hide(500);
    $('.card_success').hide(500);
    $('.card_warning').show(500);
    $('.ordersError').removeClass('brdActive');
    $('.ordersDoubts').addClass('brdActive');
    $('.ordersAll').removeClass('brdActive');
}

function orderAll() {
    $('.card_success').show(500);
    $('.card_warning').show(500);
    $('.card_error').show(500);
    $('.ordersError').removeClass('brdActive');
    $('.ordersDoubts').removeClass('brdActive');
    $('.ordersAll').addClass('brdActive');
}

// Danh sách đơn hàng
function hideMenuFilter() {
    $(".extentMenu1").slideUp(300).fadeOut();
    setTimeout(function() {
        $(".extentMenu0").slideDown(600).fadeIn();
    }, 300);
    setCookie("menuFilter", 0, 1);
}

function showMenuFilter() {
    $(".extentMenu0").slideUp(300).fadeOut();
    setTimeout(function() {
        $(".extentMenu1").slideDown(600).fadeIn();
    }, 300);
    setCookie("menuFilter", 1, 1);
}

function returnFormatValue(deliveryPointIndex, receiverIndex, productIndex, type, number) {
    if (number == 1) {
        numberFormat = parseInt($('.' + type + '_' + deliveryPointIndex).val().replace('.', ''));
    } else {
        numberFormat = parseInt($('.' + type + '_' + deliveryPointIndex + '_' + receiverIndex).val().replace(/\,/g, ''));
    }
    length = digits_count(numberFormat);
    clearTimeout(typingTimer);
    if (numberFormat) {
        typingTimer = setTimeout(function() {
            if (number == 1) {
                numberFormat = String(numberFormat).replace(/(.)(?=(\d{3})+$)/g, '$1.');
            } else {
                numberFormat = String(numberFormat).replace(/(.)(?=(\d{3})+$)/g, '$1,');
            }
            if (numberFormat != 'NaN') {
                if (number == 1) {
                    $('.' + type + '_' + deliveryPointIndex).val(numberFormat)
                } else {
                    $('.' + type + '_' + deliveryPointIndex + '_' + receiverIndex).val(numberFormat)
                }
            }
        }, doneTypingInterval);
    }
}

function disabledCheckValue(deliveryPointIndex, receiverIndex, productIndex) {
    checkProductValue = $('.checkProductValue_' + deliveryPointIndex + '_' + receiverIndex).is(":checked");
    if (checkProductValue == true) {
        $('.productTextValue_' + deliveryPointIndex + '_' + receiverIndex).removeAttr("disabled");
        $('.err_productValue_' + deliveryPointIndex + '_' + receiverIndex).html('');
    } else {
        $('.productTextValue_' + deliveryPointIndex + '_' + receiverIndex).attr("disabled", true);
        setTimeout(function() {
            $('.productTextValue_' + deliveryPointIndex + '_' + receiverIndex).val('0');
            $('.productTextValue_' + deliveryPointIndex + '_' + receiverIndex).html('0');
        }, doneTypingInterval);
        $('.err_productValue_' + deliveryPointIndex + '_' + receiverIndex).html('');
    }
}

function checkNote(deliveryPointIndex, receiverIndex, productIndex) {
    let editNote = $('.editNote_' + deliveryPointIndex).val();
    if (editNote.length > 300) {
        $('.err_note_' + deliveryPointIndex).html('Ghi chú vượt quá 300 ký tự');
    } else {
        $('.err_note_' + deliveryPointIndex).html('');
    }
}

function deleteDeliveryPointOrderFiles(deliveryPointIndex, receiverIndex, productIndex) {
    var numItems = $('.tltReceiver').length;
    $('#confirm-delete-delivery-point-' + deliveryPointIndex).modal('hide');
    if (numItems > 1) {
        // $('.btnPricing').attr('onclick','btnPricingConfirm('+(parseInt(numItems) - 1)+')');
        $('.remove_' + deliveryPointIndex).val('0');
        setTimeout(function() {
            $('.deliveryPoint_' + deliveryPointIndex).hide();
        }, 300);
    }
}

function dropDownList() {
    document.getElementById("myDropdown").classList.toggle("dropDownShow");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}

function showLoader() {
    $('#loader').addClass('show');
}

function exportExcelErrorFiles() {
    $('#loader').addClass('show');
    $.ajax({
        url: '/vi/export-excel-error-files',
        type: 'post',
        dataType: 'json',
        data: {}
    }).done(function(data) {
        var $a = $("<a>");
        $a.attr("href", data.file);
        $("body").append($a);
        $a.attr("download", "Danh sách đơn hàng lỗi.xlsx");
        $a[0].click();
        $a.remove();
        // window.location.href = data.href;
        setTimeout(function() {
            $('#loader').removeClass('show');
        }, 1000);
    });
}

function closeModalCustom() {
    $('#resultApproveMultiOrder').fadeOut('slow');
}
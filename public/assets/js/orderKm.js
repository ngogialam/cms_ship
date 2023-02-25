$(document).ready(function() {

    $('body').on('change','.isRefundKm',function() {
        checked = $(this).val();
        keyPoint = $(this).attr('keyPoint');
        console.log(keyPoint)
        if(checked == 0){
            var countCodCheck = $('.codHide_'+keyPoint).length;
            console.log(countCodCheck)
            let keyPointFirst = keyPoint.split('_');
            for(var i = 1; i <= countCodCheck; i++){
                var codCheck = $('.codHide_'+keyPoint+'_'+i).val()
                if(codCheck != 0){
                    $('.isRefundYes_' + keyPoint).prop('checked',true);
                    $('.isRefundYes_' + keyPointFirst[0]).prop('checked',true);
                    console.log('.isRefundYes_' + keyPoint)
                    $('#modalConfirmChangeRefund').modal('show')
                    return false;
                }
            }
            
        }
    });
});


function addProductAppend(deliveryPointIndex, receiverIndex, orderId){
    orderId = $('.orderId').val();
    $('.addProduct_' + deliveryPointIndex ).addClass('dpn');
    $('.product_form_' + deliveryPointIndex ).removeClass('dpn');
    $('.productCategory').chosen();
    $('.chosen-container').css("width", "100%");
    $.ajax({
        url: '/vi/addProductAppend',
        type: 'post',
        dataType: 'json',
        data: { 
            'orderId': orderId,
            'deliveryPointIndex': deliveryPointIndex,
            'receiverIndex': receiverIndex
            },
        success: function(res) {
            productIndexNext = res.productIndexNext;
            $('.saveProduct_'+deliveryPointIndex).attr('onclick', 'saveProductKm(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + productIndexNext + ', "addProduct")');
            $('.productName_' + deliveryPointIndex).addClass('productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext);
            $('.productCOD_' + deliveryPointIndex).addClass('productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext);
            $('.checkProductValue_' + deliveryPointIndex).addClass('productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext);
            $('.productValue_' + deliveryPointIndex).addClass('productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext);
            $('.productCategory_' + deliveryPointIndex).addClass('productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext);
            $('.productQuantity_' + deliveryPointIndex).addClass('productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexNext);
        },
        error: function(res) {
        }
    });
}
function saveProductKm(deliveryPointIndex, receiverIndex, productIndex, type, typeOrder = 0) {
    var error = 0;
    // Người gửi
    var pickupAddressId = 0;
    var pickName = '';
    var pickPhone = '';
    var pickAddress = '';
    var pickProvince = '';
    var pickDistrict = '';
    var pickWard = '';
    // var forcusIndex = 0;
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
            // if(forcusIndex == 0){
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
    }
    if (deliveryPorvince == '' || deliveryPorvince == null || deliveryPorvince == 0) {
        $('.err_province_' + deliveryPointIndex).html('Tỉnh/thành người nhận không được để trống');
        error = 1;
    }
    if (deliveryDistrict == '' || deliveryDistrict == null || deliveryDistrict == null) {
        $('.err_district_' + deliveryPointIndex).html('Quận/huyện người nhận không được để trống');
        error = 1;
    }
    if (deliveryWard == '' || deliveryWard == null || deliveryWard == null) {
        $('.err_ward_' + deliveryPointIndex).html('Phường/xã người nhận không được để trống');
        error = 1;
    }

    // Thông tin người nhận
    console.log('receiverPhone___ '+deliveryPointIndex)
    var receiverPhone = $('#OrderSingle').find('.receiverPhone_' + deliveryPointIndex ).val();
    var receiverName = $('#OrderSingle').find('.receiverName_' + deliveryPointIndex ).val();
    var expectDate = $('#OrderSingle').find('.expectDate_' + deliveryPointIndex ).val();
    var expectTime = $('#OrderSingle').find('.expectTime_' + deliveryPointIndex ).val();

    if (receiverPhone == '' || receiverPhone == null) {
        $('.err_receiverPhone_' + deliveryPointIndex ).html('Số điện thoại người nhận không được để trống');
        error = 1;
    } else {
        check = validatePhone(receiverPhone);
        if (!check) {
            $('.err_receiverPhone_' + deliveryPointIndex ).html('Số điện thoại người nhận không hợp lệ');
            error = 1;
        } else {
            $('.err_receiverPhone_' + deliveryPointIndex ).html('');
        }
    }
    if (receiverName.length == 0) {
        $('.err_receiverName_' + deliveryPointIndex ).html('Tên người nhận không được để trống');
        error = 1;
    } else if (receiverName.length < 2) {
        $('.err_receiverName_' + deliveryPointIndex ).html('Tên người nhận quá ngắn');
        error = 1;
    } else {
        $('.err_receiverName_' + deliveryPointIndex ).html('');
    }

    // Thông tin sản phẩm
    var productName = $('#OrderSingle').find('.productName_' + deliveryPointIndex ).val();
    var productCOD = $('#OrderSingle').find('.productCOD_' + deliveryPointIndex ).val().replace(/\,/g, '');
    var productValue = $('#OrderSingle').find('.productValue_' + deliveryPointIndex ).val().replace(/\,/g, '');
    var productCate = $('#OrderSingle').find('.productCategory_' + deliveryPointIndex ).val();
    var productQuantity = $('#OrderSingle').find('.productQuantity_' + deliveryPointIndex ).val().replace(/\,/g, '');
    if (productName == '' || productName == null) {
        $('.err_productName_' + deliveryPointIndex ).html('Tên hàng hoá không được bỏ trống');
        error = 1;
    } else {
        $('.err_productName_' + deliveryPointIndex ).html('');
    }
    if (productCOD == '' || productCOD == null || productCOD < 0) {
        $('.productCOD_' + deliveryPointIndex ).val(0);
    } else if (productCOD > 100000000) {
        $('.productCOD_' + deliveryPointIndex ).val(100000000);
        $('.err_productCOD_' + deliveryPointIndex ).html('Tiền COD bạn nhập quá lớn');
        error = 1;
    } else {
        $('.err_productCOD_' + deliveryPointIndex ).html('');
    }
    var checked = 0;
    if ($('.checkProductValue_' + deliveryPointIndex ).is(":checked") == true) {
        checked = 1;
    }
    if (checked == 1 && productValue <= 0) {
        $('.err_productValue_' + deliveryPointIndex ).html('Giá trị hàng hoá phải lớn hơn 0');
        error = 1;
    } else if (checked == 1 && productValue > 100000000) {
        $('.productValue_' + deliveryPointIndex ).val(100000000);
        $('.err_productValue_' + deliveryPointIndex ).html('Giá trị hàng hoá bạn nhập quá lớn');
        error = 1;
    } else {
        $('.err_productValue_' + deliveryPointIndex ).html('');
    }
    if (productCate <= 0) {
        $('.err_productCategory_' + deliveryPointIndex ).html('Loại hàng hoá không được để trống');
        error = 1;
    } else {
        $('.err_productCategory_' + deliveryPointIndex ).html('');
    }
    if (productQuantity <= 0) {
        $('.productQuantity_' + deliveryPointIndex ).val(1);
    } else if (productQuantity > 100) {
        $('.productQuantity_' + deliveryPointIndex ).val(100);
        $('.err_productQuantity_' + deliveryPointIndex ).html('Số lượng bạn nhập quá lớn');
        error = 1;
    } else {
        $('.err_productQuantity_' + deliveryPointIndex ).html('');
    }

    var productIndexNext = $('.productIndexNext_' + deliveryPointIndex).val();
    $('.err_saveProduct_' + deliveryPointIndex + '_' + receiverIndex + '_1').html('');
    // Xử lý Ajax thêm sản phẩm
    var isRefund = 0;
    $('input.isRefundYes_' + deliveryPointIndex + ':radio:checked').each(function() {
        isRefund = $(this).val();
    });
    if(isRefund == 0){
        if(productCOD > 0){
            console.log('hererrr ')
            $('#modalConfirmChangeRefund').modal('show')
            error = 1;
        }
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
                        html += '<img src="/public/images/or-edit.png" onclick="editProductKm(' + index.deliveryPointIndex + ', ' + index.receiverIndex + ', ' + index.productIndex + ', ' + typeOrder + ')">';
                        html += '</li>';
                        html += '</ul>';
                        html += '</li>';
                        html += '</ul>';
                        html += "<input type='hidden' class='codHide codHide_"+ index.deliveryPointIndex + '_' + index.receiverIndex +" codHide_"+ index.deliveryPointIndex + '_' + index.receiverIndex + '_' + index.productIndex +"' value='" + (resData.productCOD * resData.productQuantity) +"' />";
                        
                        $('.productSuccess_' + index.deliveryPointIndex).append(html);
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
                    $('.productName_' + index.deliveryPointIndex).attr('onblur', 'ValidateProductNameKm(' + index.deliveryPointIndex + ', ' + index.receiverIndex + ', ' + index.productIndexNext + ')');

                    //Product COD
                    $('.productCOD_' + index.deliveryPointIndex ).attr('onblur', 'ValidateProductCODKm(' + index.deliveryPointIndex + ', ' + index.receiverIndex + ', ' + index.productIndexNext + ')');
                    $('.productCOD_' + index.deliveryPointIndex ).attr('onkeyup', 'number_format("productCOD_' + index.deliveryPointIndex + '", 1)');

                    //Product Value
                    $('.productValue_' + index.deliveryPointIndex).attr('onblur', 'ValidateProductValueKm(' + index.deliveryPointIndex + ', ' + index.receiverIndex + ', ' + index.productIndexNext + ')');
                    $('.productValue_' + index.deliveryPointIndex).attr('onkeyup', 'number_format("productValue_' + index.deliveryPointIndex + '", 1)');

                    //Product Category
                    $('.productCategory_' + index.deliveryPointIndex ).attr('onchange', 'ValidateProductCateKm(' + index.deliveryPointIndex + ', ' + index.receiverIndex + ', ' + index.productIndexNext + ')');

                    //Product Quantity
                    $('.productQuantity_' + index.deliveryPointIndex).attr('onblur', 'ValidateProductQuantityKm(' + index.deliveryPointIndex + ', ' + index.receiverIndex + ', ' + index.productIndexNext + ')');

                    //Button Save Product
                    $('.saveProduct_' + index.deliveryPointIndex ).attr('onclick', 'saveProductKm(' + index.deliveryPointIndex + ', ' + index.receiverIndex + ', ' + index.productIndexNext + ', "addProduct",' + typeOrder + ')');

                    //Clear value
                    $('.productName_' + index.deliveryPointIndex).val('');
                    $('.productCOD_' + index.deliveryPointIndex).val('0');
                    $('.checkProductValue_' + index.deliveryPointIndex).attr('checked');
                    $('.productValue_' + index.deliveryPointIndex).val('0');
                    $('.productCategory_' + index.deliveryPointIndex).val('0').trigger("chosen:updated");
                    $('.productQuantity_' + index.deliveryPointIndex).val('1');

                    //Input
                    $('.productIndexNext_' + index.deliveryPointIndex).val(index.productIndexNext);
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
var productIndexOld = 0;
function editProductKm(deliveryPointIndex, receiverIndex, productIndex, typeOrder = 0) {
    
    orderId = $('.orderId').val();
    $('.productName_' + deliveryPointIndex + '_' + receiverIndex ).removeClass('productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexOld);
    var productName = $('.success_productName_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).attr('productname');
    var productQuantity = $('.success_productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).attr('productquantity');
    var productCate = $('.success_productCate_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).attr('productcate');
    var productCOD = $('.success_productCOD_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).attr('productcod');
    var productValue = $('.success_productValue_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).attr('productvalue');
    var productIndexNext = $('.productIndexNext_' + deliveryPointIndex).val();
    productCOD = productCOD / productQuantity;
    productValue = productValue / productQuantity;

    $('.addProduct_' + deliveryPointIndex ).addClass('dpn');
    $('.product_form_' + deliveryPointIndex ).removeClass('dpn');
    $('.productCategory').chosen();
    $('.chosen-container').css("width", "100%");
    //Product Name
    $('.productName_' + deliveryPointIndex).attr('onblur', 'ValidateProductNameKm(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + productIndex + ')');

    //Product COD
    $('.productCOD_' + deliveryPointIndex).attr('onkeyup', 'number_format("productCOD_' + deliveryPointIndex + '", 1)');
    $('.productCOD_' + deliveryPointIndex + '_' + receiverIndex ).attr('onblur', 'ValidateProductCOD(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + productIndex + ')');

    //Product Value
    $('.productValue_' + deliveryPointIndex).attr('onblur', 'ValidateProductValueKm(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + productIndex + ')');
    $('.productValue_' + deliveryPointIndex).attr('onkeyup', 'number_format("productValue_' + deliveryPointIndex + '", 1)');

    //Product Category
    $('.productCategory_' + deliveryPointIndex).attr('onchange', 'ValidateProductCateKm(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + productIndex + ')');

    //Product Quantity
    $('.err_productQuantity_' + deliveryPointIndex ).removeClass('err_productQuantity_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexOld);
    $('.productQuantity_' + deliveryPointIndex).attr('onblur', 'ValidateProductQuantityKm(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + productIndex + ')');

    //Set Value
    // (new Intl.NumberFormat().format(productCOD)
    formatCOD = new Intl.NumberFormat().format(productCOD);
    formatValue = new Intl.NumberFormat().format(productValue);

    $('.productName_' + deliveryPointIndex ).val(productName);
    $('.productCOD_' + deliveryPointIndex ).val(formatCOD);
    $('.productValue_' + deliveryPointIndex ).val(formatValue);
    $('.productCategory_' + deliveryPointIndex ).val(productCate).trigger('chosen:updated');
    $('.productQuantity_' + deliveryPointIndex ).val(productQuantity);
    
    $('.productIndexNext_' + deliveryPointIndex).val(productIndexNext);

    //Button Save Product
    
    $('.saveProduct_' + deliveryPointIndex ).addClass('saveProduct_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex);
    $('.saveProduct_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).removeClass('saveProduct_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndexOld);
    $('.saveProduct_' + deliveryPointIndex + '_' + receiverIndex + '_' + productIndex).attr('onclick', 'saveProductKm(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + productIndex + ', "editProduct",' + typeOrder + ')');
    productIndexOld = productIndex;
}
function editReceiverKm(deliveryPointIndex, receiverIndex, typeOrder = 0, packType = 1, productIndexNextOld = 1) {
    $('.product_form_' + deliveryPointIndex).addClass('dpn');
    orderId = $('.orderId').val();
    $('.text_receiverIndex_' + receiverIndex).html('Sửa đơn hàng chi tiết');
    console.log('receiverIndex:'+receiverIndex)
    $.ajax({
        url: '/vi/getReceiverItem',
        type: 'post',
        dataType: 'json',
        data: {
            'deliveryPointIndex': deliveryPointIndex,
            'receiverIndex': receiverIndex,
            'typeOrder': typeOrder,
            'packType': packType,
        },
        success: function(res) {
            if (res.success) {
                var dataOrders = jQuery.parseJSON(res.dataOrders);
                var point = dataOrders.deliveryPoint[deliveryPointIndex - 1];
                var receivers = point.receivers[receiverIndex - 1];
                var items = receivers.items;
                console.log(items)

                //Receiver Info
                $('.receiverPhone_' + deliveryPointIndex ).attr('onblur', 'ValidateReceiverPhoneKm(' + deliveryPointIndex + ', ' + receiverIndex + ')');

                //Receiver Name
                $('.receiverName_' + deliveryPointIndex ).attr('onblur', 'ValidateReceiverNameKm(' + deliveryPointIndex + ', ' + receiverIndex + ')');

                //Receiver Service (Length)
                $('.length_' + deliveryPointIndex ).attr('onblur', 'ValidateLengthKm(' + deliveryPointIndex + ', ' + receiverIndex + ')');

                //Receiver Service (Width)
                $('.width_' + deliveryPointIndex ).attr('onblur', 'ValidateWidthKm(' + deliveryPointIndex + ', ' + receiverIndex + ')');

                //Receiver Service (Height)
                $('.height_' + deliveryPointIndex ).attr('onblur', 'ValidateHeightKm(' + deliveryPointIndex + ', ' + receiverIndex + ')');

                //Receiver Service (Weight)
                $('.weight_' + deliveryPointIndex ).attr('onblur', 'ValidateWeightKm(' + deliveryPointIndex + ', ' + receiverIndex + ')');
                $('.weight_' + deliveryPointIndex ).attr('onkeyup', "number_format('weight_" + deliveryPointIndex + "', 2)");

                //Button Cancel
                $('.cancelReceiver_' + point.deliveryPointIndex + '_' + point.receiverIndexNext).addClass('cancelReceiver_' + deliveryPointIndex + '_' + receiverIndex);
                $('.cancelReceiver_' + deliveryPointIndex + '_' + receiverIndex).removeClass('cancelReceiver_' + point.deliveryPointIndex + '_' + point.receiverIndexNext);
                $('.cancelReceiver_' + deliveryPointIndex + '_' + receiverIndex).attr('onclick', 'removeReceiverEdit(' + deliveryPointIndex + ', ' + receiverIndex + ')');

                //Button Save Receiver
                $('.saveReceiver_' + deliveryPointIndex).attr('onclick', 'saveReceiverKm(' + deliveryPointIndex + ', ' + receiverIndex + ', "editReceiver",' + typeOrder + ')');
                // + ' - ' + receivers.width + ' - ' + receivers.height
                //Set Receiver value
                $('.form_receiverIndex').html(receiverIndex);
                var weight = receivers.weight;
                $('.receiverPhone_' + deliveryPointIndex ).val(receivers.receiverPhone);
                $('.receiverName_' + deliveryPointIndex ).val(receivers.receiverName);
                $('.expectDate_' + deliveryPointIndex ).val(receivers.expectDate);
                $('.expectTime_' + deliveryPointIndex ).val(receivers.expectTime);
                $('.length_' + deliveryPointIndex ).val(receivers.length);
                $('.width_' + deliveryPointIndex ).val(receivers.width);
                $('.height_' + deliveryPointIndex ).val(receivers.height);
                $('.weight_' + deliveryPointIndex ).val(weight.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
                $('.note_' + deliveryPointIndex ).val(receivers.note);
                if (receivers.isFree == 1) {
                    $('.isFreeYes_' + deliveryPointIndex).attr('checked', 'checked');
                } else {
                    $('.isFreeNo_' + deliveryPointIndex).attr('checked', 'checked');
                }
                if (receivers.partialDelivery == 1) {
                    $('.partialDeliveryYes_' + deliveryPointIndex).attr('checked', 'checked');
                } else {
                    $('.partialDeliveryNo_' + deliveryPointIndex).attr('checked', 'checked');
                }
                if (receivers.isRefund == 1) {
                    $('.isRefundYes_' + deliveryPointIndex).attr('checked', 'checked');
                } else {
                    $('.isRefundNo_' + deliveryPointIndex).attr('checked', 'checked');
                }
                if (point.pickupType == 1) {
                    $('.pickupTypeYes_' + deliveryPointIndex).attr('checked', 'checked');
                } else {
                    $('.pickupTypeNo_' + deliveryPointIndex).attr('checked', 'checked');
                }
                if (receivers.extraServices[0].isDoorDeliver == 1) {
                    $('.isDoorDeliver_' + deliveryPointIndex).prop('checked', true);
                } else {
                    $('.isDoorDeliver_' + deliveryPointIndex).prop('checked', false);
                }
                if (receivers.extraServices[0].isPorter == 1) {
                    $('.isPorter_' + deliveryPointIndex).prop('checked', true);
                } else {
                    $('.isPorter_' + deliveryPointIndex).prop('checked', false);
                }
                $('.requireNote_' + deliveryPointIndex).val(receivers.requireNote).trigger("chosen:updated");

                //Product Info
                //Product Success
                console.log('receiverIndex:'+receiverIndex)
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
                    html += '<img src="/public/images/or-edit.png" onclick="editProductKm(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + (i + 1) + ', ' + typeOrder + ')">';
                    html += '</li>';
                    html += '</ul>';
                    html += '</li>';
                    html += '</ul>';
                    html += "<input type='hidden' class='codHide codHide_"+ deliveryPointIndex + '_' + receiverIndex +" codHide_"+ deliveryPointIndex + '_' + receiverIndex + '_' + item.productIndex +"' value='" + (item.productCOD * item.productQuantity) +"' />";
                });

                $('.productSuccess_' + deliveryPointIndex).html('');
                $('.productSuccess_' + deliveryPointIndex).append(html);

                //Product Name
                $('.productName_' + deliveryPointIndex).attr('onblur', 'ValidateProductNameKm(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + receivers.productIndexNext + ')');

                //Product COD
                $('.productCOD_' + deliveryPointIndex).attr('onblur', 'ValidateProductCODKm(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + receivers.productIndexNext + ')');
                $('.productCOD_' + deliveryPointIndex).attr('onkeyup', 'number_format("productCOD_' + deliveryPointIndex + '", 1)');

                //Product Value
                $('.productValue_' + deliveryPointIndex).attr('onblur', 'ValidateProductValueKm(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + receivers.productIndexNext + ')');
                $('.productValue_' + deliveryPointIndex).attr('onkeyup', 'number_format("productValue_' + deliveryPointIndex + '", 1)');

                //Product Category
                $('.productCategory_' + deliveryPointIndex).attr('onblur', 'ValidateProductCateKm(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + receivers.productIndexNext + ')');

                //Product Quantity
                $('.productQuantity_' + deliveryPointIndex).attr('onblur', 'ValidateProductQuantityKm(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + receivers.productIndexNext + ')');

                //Button Save Product
                $('.saveProduct_' + point.deliveryPointIndex + '_' + point.receiverIndexNext + '_1').addClass('saveProduct_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext);
                $('.saveProduct_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).removeClass('saveProduct_' + point.deliveryPointIndex + '_' + point.receiverIndexNext + '_1');
                $('.saveProduct_' + deliveryPointIndex + '_' + receiverIndex + '_' + receivers.productIndexNext).attr('onclick', 'saveProductKm(' + deliveryPointIndex + ', ' + receiverIndex + ', ' + items.productIndexNext + ', "addProduct", ' + typeOrder + ')');

                //Product Index Next
                // $('.productIndexNext_' + point.deliveryPointIndex ).addClass('productIndexNext_' + deliveryPointIndex );
                // $('.productIndexNext_' + deliveryPointIndex ).removeClass('productIndexNext_' + point.deliveryPointIndex);
                console.log('receiverIndex:'+receiverIndex)
                //Clear Product value
                $('.productName_' + deliveryPointIndex).val('');
                $('.productCOD_' + deliveryPointIndex).val('0');
                $('.checkProductValue_' + deliveryPointIndex).attr('checked');
                $('.productValue_' + deliveryPointIndex).val('0');
                $('.productCategory_' + deliveryPointIndex).val('0').trigger("chosen:updated");
                $('.productQuantity_' + deliveryPointIndex).val('1');
                $('.productIndexNext_' + deliveryPointIndex).val(receivers.productIndexNext);

                $('.form_receiverOrder_' + deliveryPointIndex).show();
                $('.addReceiver_' + deliveryPointIndex).addClass('dpn');

                $('.addProduct_' + deliveryPointIndex + '_' + point.receiverIndexNext).removeClass('dpn');
                $('.product_form_' + deliveryPointIndex + '_' + point.receiverIndexNext).addClass('dpn');

                $('.productCategory').chosen();
                $('.requireNote').chosen();
                $('.chosen-container').css("width", "100%");
                $('.addProduct_'+deliveryPointIndex).attr('onclick', 'addProductAppend(' + deliveryPointIndex + ', ' + receiverIndex + ', '+orderId+')');
                console.log('receiverIndex---:'+receiverIndex)
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

            }
        },
        error: function(res) {
            console.log(res);
        }
    });
}



function ValidateReceiverPhoneKm(deliveryPointIndex, receiverIndex = 0) {
    var receiverPhone = $('.receiverPhone_' + deliveryPointIndex).val();
    if (receiverPhone == '') {
        $('.err_receiverPhone_' + deliveryPointIndex).html('Số điện thoại không được bỏ trống');
    } else {
        checkreceiverPhone = validatePhone(receiverPhone);
        if (!checkreceiverPhone) {
            $('.err_receiverPhone_' + deliveryPointIndex).html('Số điện thoại không hợp lệ');
        } else {
            $('.err_receiverPhone_' + deliveryPointIndex).html('');
        }
    }
};

function ValidateReceiverNameKm(deliveryPointIndex, receiverIndex = 0) {
    var receiverName = $('.receiverName_' + deliveryPointIndex ).val();
    if (receiverName == '') {
        $('.err_receiverName_' + deliveryPointIndex ).html('Tên người nhận không được bỏ trống');
    } else {
        $('.err_receiverName_' + deliveryPointIndex ).html('');
    }
};

function ValidateProductNameKm(deliveryPointIndex, receiverIndex = 0, productIndex = 0) {
    var checked = 0;
    $('input.checkProductValue_' + deliveryPointIndex  + ':checkbox:checked').each(function() {
        checked = $(this).val();
    });

    if (productName == '' || productName == null) {
        $('.err_productName_' + deliveryPointIndex ).html('Tên hàng hoá không được bỏ trống');
    } else {
        $('.err_productName_' + deliveryPointIndex ).html('');
    }
};

function ValidateProductCODKm(deliveryPointIndex, receiverIndex = 0, productIndex = 0) {
    var productCOD = $('.productCOD_' + deliveryPointIndex ).val().replace(/\,/g, '');

    if (productCOD == '' || productCOD == null) {
        $('.productCOD_' + deliveryPointIndex ).val(0);
    } else if (productCOD > 100000000) {
        $('.productCOD_' + deliveryPointIndex ).val('100,000,000');
        $('.err_productCOD_' + deliveryPointIndex ).html('Tiền COD bạn nhập quá lớn');
    } else {
        $('.err_productCOD_' + deliveryPointIndex ).html('');
    }
}

function ValidateProductValueKm(deliveryPointIndex, receiverIndex = 0, productIndex = 0) {
    var productValue = $('.productValue_' + deliveryPointIndex ).val().replace(/\,/g, '');
    var checked = 0;
    console.log('checked: '+ checked)
    $('input.checkProductValue_' + deliveryPointIndex  + ':checkbox:checked').each(function() {
        checked = $(this).val();
    });

    if (checked == 1 && productValue <= 0) {
        $('.err_productValue_' + deliveryPointIndex ).html('Giá trị hàng hoá phải lớn hơn 0');
    } else if (checked = 1 && productValue > 100000000) {
        $('.productValue_' + deliveryPointIndex ).val('100,000,000');
        $('.err_productValue_' + deliveryPointIndex ).html('Giá trị hàng hoá bạn nhập quá lớn');
    } else {
        $('.err_productValue_' + deliveryPointIndex ).html('');
    }
}

function ValidateProductCateKm(deliveryPointIndex, receiverIndex = 0, productIndex = 0) {
    
    var productCate = $('.productCategory_' + deliveryPointIndex ).val();
    if (productCate <= 0) {
        $('.err_productCategory_' + deliveryPointIndex ).html('Loại hàng hoá không được để trống');
    } else {
        $('.err_productCategory_' + deliveryPointIndex ).html('');
    }
}

function ValidateProductQuantityKm(deliveryPointIndex, receiverIndex = 0, productIndex = 0) {
    
    var productQuantity = $('.productQuantity_' + deliveryPointIndex ).val().replace(/\,/g, '');
    if (productQuantity <= 0) {
        $('.productQuantity_' + deliveryPointIndex ).val(1);
    } else if (productQuantity > 100) {
        $('.productQuantity_' + deliveryPointIndex ).val(100);
        $('.err_productQuantity_' + deliveryPointIndex ).html('Số lượng bạn nhập quá lớn');
    } else {
        $('.err_productQuantity_' + deliveryPointIndex ).html('');
    }
}

function ValidateWeightKm(deliveryPointIndex, receiverIndex = 0) {
    var weight = $('.weight_' + deliveryPointIndex).val().replace(/\./g, '');
    if (weight == '' || weight == null) {
        $('.err_weight_' + deliveryPointIndex).html('Không được để trống');
    } else if (weight <= 0) {
        $('.err_weight_' + deliveryPointIndex).html('Cân nặng lớn hơn 0');
    } else {
        $('.err_weight_' + deliveryPointIndex).html('');
    }
}

function ValidateLengthKm(deliveryPointIndex, receiverIndex = 0) {
    var length = $('.length_' + deliveryPointIndex).val();
    if (length == '' || length == null) {
        $('.err_size_' + deliveryPointIndex).html('Chiều dài không được để trống');
    } else if (length <= 0) {
        $('.err_size_' + deliveryPointIndex).html('Chiều dài phải lớn hơn 0');
    } else {
        $('.err_size_' + deliveryPointIndex).html('');
    }
}

function ValidateWidthKm(deliveryPointIndex, receiverIndex = 0) {
    var width = $('.width_' + deliveryPointIndex).val();
    if (width == '' || width == null) {
        $('.err_size_' + deliveryPointIndex).html('Chiều rộng không được để trống');
    } else if (width <= 0) {
        $('.err_size_' + deliveryPointIndex).html('Chiều rộng phải lớn hơn 0');
    } else {
        $('.err_size_' + deliveryPointIndex).html('');
    }
}

function ValidateHeightKm(deliveryPointIndex, receiverIndex = 0) {
    var height = $('.height_' + deliveryPointIndex).val();
    if (height == '' || height == null) {
        $('.err_size_' + deliveryPointIndex).html('Chiều cao không được để trống');
    } else if (height <= 0) {
        $('.err_size_' + deliveryPointIndex).html('Chiều cao phải lớn hơn 0');
    } else {
        $('.err_size_' + deliveryPointIndex).html('');
    }
}

function saveReceiverKm(deliveryPointIndex, receiverIndex = 0, type, typeOrder = 0) {
    console.log('typeOrder: ---- ' + typeOrder)
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
    var receiverPhone = $('#OrderSingle').find('.receiverPhone_' + deliveryPointIndex).val();
    var receiverName = $('#OrderSingle').find('.receiverName_' + deliveryPointIndex).val();
    var expectDate = $('#OrderSingle').find('.expectDate_' + deliveryPointIndex).val();
    var expectTime = $('#OrderSingle').find('.expectTime_' + deliveryPointIndex).val();

    if (receiverPhone == '' || receiverPhone == null) {
        $('.err_receiverPhone_' + deliveryPointIndex ).html('Số điện thoại người nhận không được để trống');
        error = 1;
    } else {
        check = validatePhone(receiverPhone);
        if (!check) {
            $('.err_receiverPhone_' + deliveryPointIndex ).html('Số điện thoại người nhận không hợp lệ');
            error = 1;
        } else {
            $('.err_receiverPhone_' + deliveryPointIndex ).html('');
        }
    }
    if (receiverName.length == 0) {
        $('.err_receiverName_' + deliveryPointIndex).html('Tên người nhận không được để trống');
        error = 1;
    } else if (receiverName.length < 2) {
        $('.err_receiverName_' + deliveryPointIndex).html('Tên người nhận quá ngắn');
        error = 1;
    } else {
        $('.err_receiverName_' + deliveryPointIndex).html('');
    }

    //Thông tin đơn hàng
    if ($('ul').hasClass('productDetail_' + deliveryPointIndex) == false) {
        $('.err_saveProduct_' + deliveryPointIndex).html('Bạn chưa lưu sản phẩm nào');
        error = 1;
    } else {
        $('.err_saveProduct_' + deliveryPointIndex).html('');
    }

    //Thông tin đơn hàng
    var length = $('.length_' + deliveryPointIndex ).val();
    var width = $('.width_' + deliveryPointIndex ).val();
    var height = $('.height_' + deliveryPointIndex ).val();
    var weight = $('.weight_' + deliveryPointIndex ).val().replace(/\./g, '');
    var note = $('.note_' + deliveryPointIndex ).val();
    var requireNote = $('.requireNote_' + deliveryPointIndex ).val();
    var isFree = 1;
    var partialDelivery = 0;
    var isRefund = 0;
    var isDoorDeliver = 0;
    var isPorter = 0;
    var pickupType = 2;
    var isReturn = 0;

    $('input.isFreeNo_' + deliveryPointIndex + ':radio:checked').each(function() {
        isFree = $(this).val();
    });
    $('input.isRefundYes_' + deliveryPointIndex + ':radio:checked').each(function() {
        isRefund = $(this).val();
    });
    $('input.pickupTypeYes_' + deliveryPointIndex + ':radio:checked').each(function() {
        pickupType = $(this).val();
    });
    if ($('.isDoorDeliver_' + deliveryPointIndex).is(":checked") == true) {
        isDoorDeliver = 1;
    }
    if ($('.isPorter_' + deliveryPointIndex).is(":checked") == true) {
        isPorter = 1;
    }
    if (length == '' || length == null) {
        $('.err_size_' + deliveryPointIndex).html('Chiều dài không được để trống');
        error = 1;
    } else if (length <= 0) {
        $('.err_size_' + deliveryPointIndex).html('Chiều dài phải lớn hơn 0');
        error = 1;
    }
    if (width == '' || width == null) {
        $('.err_size_' + deliveryPointIndex).html('Chiều rộng không được để trống');
        error = 1;
    } else if (width <= 0) {
        $('.err_size_' + deliveryPointIndex).html('Chiều rộng phải lớn hơn 0');
        error = 1;
    }
    if (height == '' || height == null) {
        $('.err_size_' + deliveryPointIndex).html('Chiều cao không được để trống');
        error = 1;
    } else if (height <= 0) {
        $('.err_size_' + deliveryPointIndex).html('Chiều cao phải lớn hơn 0');
        error = 1;
    }
    if (weight == '' || weight == null) {
        $('.err_weight_' + deliveryPointIndex).html('Không được để trống');
        error = 1;
    } else if (weight <= 0) {
        $('.err_weight_' + deliveryPointIndex).html('Cân nặng lớn hơn 0');
        error = 1;
    }

    $('input.isReturnYes_' + deliveryPointIndex + ':radio:checked').each(function() {
        isReturn = $(this).val();
    });
    var productIndexNext = $('#OrderSingle').find('.productIndexNext_' + deliveryPointIndex).val();
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
                        html += '<span><img class="editReceiver" src="/public/images/or-edit.png" onclick="editReceiverKm(' + index.deliveryPointIndex + ', ' + index.receiverIndex + ',' + typeOrder + ')"></span>';
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
                        html += '<span><img class="editReceiver" src="/public/images/or-edit.png" onclick="editReceiverKm(' + index.deliveryPointIndex + ', ' + index.receiverIndex + ',' + typeOrder + ')"></span>';
                        html += '</div>';
                        $('.afOrder_' + index.deliveryPointIndex + '_' + index.receiverIndex).html('');
                        $('.afOrder_' + index.deliveryPointIndex + '_' + index.receiverIndex).append(html);
                    }

                    //Receiver Info
                    //Receiver Phone
                    $('.receiverPhone_' + index.deliveryPointIndex).attr('onblur', 'ValidateReceiverPhoneKm(' + index.deliveryPointIndex + ')');

                    //Receiver Name
                    $('.receiverName_' + index.deliveryPointIndex).attr('onblur', 'ValidateReceiverNameKm(' + index.deliveryPointIndex + ')');

                    //Receiver Service (Length)
                    $('.length_' + index.deliveryPointIndex).attr('onblur', 'ValidateLengthKm(' + index.deliveryPointIndex + ')');

                    //Receiver Service (Width)
                    $('.width_' + index.deliveryPointIndex).attr('onblur', 'ValidateWidthKm(' + index.deliveryPointIndex + ')');

                    //Receiver Service (Height)
                    $('.height_' + index.deliveryPointIndex).attr('onblur', 'ValidateHeightKm(' + index.deliveryPointIndex + ')');

                    //Receiver Service (Weight)
                    $('.weight_' + index.deliveryPointIndex).attr('onblur', 'ValidateWeightKm(' + index.deliveryPointIndex + ')');
                    $('.weight_' + index.deliveryPointIndex).attr('onkeyup', "number_format('weight_" + index.deliveryPointIndex + "_" + index.receiverIndexNext + "', 2)");

                    //Button Cancel
                    $('.cancelReceiver_' + index.deliveryPointIndex).attr('onclick', 'removeReceiver(' + index.deliveryPointIndex + ')');

                    //Button Save Receiver
                    $('.saveReceiver_' + index.deliveryPointIndex).attr('onclick', 'saveReceiverKm(' + index.deliveryPointIndex + ', "addReceiver", ' + typeOrder + ')');

                    //Clear Receiver value
                    $('.form_receiverIndex').html(index.receiverIndexNext);
                    $('.productSuccess_' + index.deliveryPointIndex ).html('');
                    $('.receiverPhone_' + index.deliveryPointIndex).val('');
                    $('.receiverName_' + index.deliveryPointIndex).val('');
                    $('.expectDate_' + index.deliveryPointIndex).val(' ');
                    $('.expectTime_' + index.deliveryPointIndex).val('');
                    $('.length_' + index.deliveryPointIndex).val('10');
                    $('.width_' + index.deliveryPointIndex).val('10');
                    $('.height_' + index.deliveryPointIndex).val('10');
                    $('.weight_' + index.deliveryPointIndex).val('0');
                    $('.note_' + index.deliveryPointIndex).val('');
                    $('.isFreeYes_' + index.deliveryPointIndex).attr('checked');
                    $('.partialDeliveryYes_' + index.deliveryPointIndex).attr('checked');
                    $('.isRefundYes_' + index.deliveryPointIndex).attr('checked');
                    $('.isDoorDeliver_' + index.deliveryPointIndex).removeAttr('checked');
                    $('.isPorter_' + index.deliveryPointIndex).removeAttr('checked');
                    $('.pickupTypeNo_' + index.deliveryPointIndex).attr('checked');
                    $('.requireNote_' + index.deliveryPointIndex).val('3').trigger("chosen:updated");

                    $('.productName_' + index.deliveryPointIndex).attr('onblur', 'ValidateProductNameKm(' + index.deliveryPointIndex + ', ' + index.receiverIndexNext + ', ' + index.productIndex + ')');

                    //Product COD
                    $('.productCOD_' + index.deliveryPointIndex).attr('onblur', 'ValidateProductCODKm(' + index.deliveryPointIndex + ', ' + index.receiverIndexNext + ', ' + index.productIndex + ')');
                    $('.productCOD_' + index.deliveryPointIndex).attr('onkeyup', 'number_format("productCOD_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex + '", 1)');

                    //Product Value
                    $('.productValue_' + index.deliveryPointIndex).attr('onblur', 'ValidateProductValueKm(' + index.deliveryPointIndex + ', ' + index.receiverIndexNext + ', ' + index.productIndex + ')');
                    $('.productValue_' + index.deliveryPointIndex).attr('onkeyup', 'number_format("productValue_' + index.deliveryPointIndex + '_' + index.receiverIndexNext + '_' + index.productIndex + '", 1)');

                    //Product Category
                    $('.productCategory_' + index.deliveryPointIndex).attr('onchange', 'ValidateProductCateKm(' + index.deliveryPointIndex + ', ' + index.receiverIndexNext + ', ' + index.productIndex + ')');

                    //Product Quantity
                    $('.productQuantity_' + index.deliveryPointIndex).attr('onblur', 'ValidateProductQuantityKm(' + index.deliveryPointIndex + ', ' + index.receiverIndexNext + ', ' + index.productIndex + ')');

                    //Button Save Product
                    $('.saveProduct_' + index.deliveryPointIndex).attr('onclick', 'saveProductKm(' + index.deliveryPointIndex + ', ' + index.receiverIndexNext + ', ' + index.productIndex + ', "addProduct",' + typeOrder + ')');

                    //Clear Product value
                    $('.productName_' + index.deliveryPointIndex).val('');
                    $('.productCOD_' + index.deliveryPointIndex).val('0');
                    $('.checkProductValue_' + index.deliveryPointIndex).attr('checked');
                    $('.productValue_' + index.deliveryPointIndex).val('0');
                    $('.productCategory_' + index.deliveryPointIndex).val('0').trigger("chosen:updated");
                    $('.productQuantity_' + index.deliveryPointIndex).val('1');
                    $('.productIndexNext_' + index.deliveryPointIndex + '_' + index.receiverIndexNext).val(index.productIndex);

                    $('.form_receiverOrder_' + index.deliveryPointIndex).hide();
                    $('.addReceiver_' + index.deliveryPointIndex).removeClass('dpn');
                    $('.addReceiver_' + index.deliveryPointIndex).attr('onclick', 'addReceiverKm(' + index.deliveryPointIndex + ', ' + index.receiverIndexNext + ')');
                } else {
                    if(res.classCheckRefund){
                        $('#modalConfirmChangeRefund').modal('show');
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

function addReceiverKm(deliveryPointIndex, receiverIndex) {

    //Clear Product value
    $('.productName_' + deliveryPointIndex).val('');
    $('.productCOD_' + deliveryPointIndex).val('0');
    $('.checkProductValue_' + deliveryPointIndex).attr('checked');
    $('.productValue_' + deliveryPointIndex).val('0');
    $('.productCategory_' + deliveryPointIndex).val('0').trigger("chosen:updated");
    $('.productQuantity_' + deliveryPointIndex).val('1');
    $('.productSuccess_' + deliveryPointIndex ).html('');
    $('.receiverPhone_' + deliveryPointIndex).val('');
    $('.receiverName_' + deliveryPointIndex).val('');
    $('.expectDate_' + deliveryPointIndex).val(' ');
    $('.expectTime_' + deliveryPointIndex).val('');
    $('.length_' + deliveryPointIndex).val('10');
    $('.width_' + deliveryPointIndex).val('10');
    $('.height_' + deliveryPointIndex).val('10');
    $('.weight_' + deliveryPointIndex).val('0');
    $('.note_' + deliveryPointIndex).val('');
    $('.isFreeYes_' + deliveryPointIndex).prop('checked',true);
    $('.partialDeliveryYes_' + deliveryPointIndex).prop('checked',true);
    $('.isRefundNo_' + deliveryPointIndex).prop('checked',true);
    $('.isDoorDeliver_' + deliveryPointIndex).removeAttr('checked');
    $('.isPorter_' + deliveryPointIndex).removeAttr('checked');
    $('.pickupTypeNo_' + deliveryPointIndex).prop('checked',true);
    $('.requireNote_' + deliveryPointIndex).val('3').trigger("chosen:updated");
    $('.addReceiver_' + deliveryPointIndex).attr('onclick', 'addReceiverKm(' + deliveryPointIndex + ', ' + receiverIndex + ')');
    $('.saveReceiver_' + deliveryPointIndex).attr('onclick', 'saveReceiverKm(' + deliveryPointIndex + ', ' + receiverIndex + ', "addReceiver")');
    $('.form_receiverIndex').html(receiverIndex)

    $('.isRefundYes_' + deliveryPointIndex).attr('keyPoint',deliveryPointIndex+'_'+receiverIndex);
    $('.isRefundNo_' + deliveryPointIndex).attr('keyPoint',deliveryPointIndex+'_'+receiverIndex);

    $('.form_receiverOrder_' + deliveryPointIndex).show();
    $('.addReceiver_' + deliveryPointIndex).addClass('dpn');

    $('.addProduct_' + deliveryPointIndex).addClass('dpn');
    $('.product_form_' + deliveryPointIndex).removeClass('dpn');
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
}

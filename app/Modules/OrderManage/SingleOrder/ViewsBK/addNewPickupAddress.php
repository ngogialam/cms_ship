<div class="ttdh-main">
    <div class="or-dgh-1 pb-3" style="margin-left: -40px;">
        <span class="or-dh-stt" style="background-color: #2DB1DB;">1</span>
        <?= lang('Label.lbl_orderReceiver') ?>
    </div>
    <div class="or-ttdh row ">
        <ul class="or-dgh col-6">
            <li class="or-dgh-2">
                <input type="text" class="address_<?= $deliveryPointIndex ?>"
                    onblur="addAddressDetail(<?= $deliveryPointIndex ?>)"
                    deliveryPointIndex="<?= $deliveryPointIndex ?>"
                    name="deliveryPoint[<?= $deliveryPointIndex ?>][address]"
                    placeholder="<?= lang('Label.lbl_orderAddressReceiver'); ?>">
                <span
                    class=" err_messages err_address_<?= $deliveryPointIndex ?>"><?php echo $getErrors['address']; ?>
            </li>
        </ul>
        <!-- Change Province -->

        <ul class="col-sm-6 row orDetail-input orderDetail-chosen pr-0 orderDetail_<?= $deliveryPointIndex ?> address_v2"
            style="padding-top: 24px;">
            <li class="col-md-4 mb-2 pr-0 provinceReceiver_<?= $deliveryPointIndex?>">
                <select name="deliveryPoint[<?= $deliveryPointIndex ?>][province]"
                    index_prov="<?= $deliveryPointIndex ?>"
                    id="provinceReceiver_<?= $deliveryPointIndex?>"
                    class="form-control frm-lg chosen-select order_province_code_from ">
                    <option value="0"><?= lang('Label.lbl_orderWareHouseProvince'); ?></option>
                    <?php foreach($dataProvinces as $province): ?>
                    <option value="<?= $province['code']; ?>"> <?= $province['name']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>

                <input type="hidden" class="province_find_pro_<?= $deliveryPointIndex?>">
                <input type="hidden" class="district_find_pro_<?= $deliveryPointIndex?>">
                <input type="hidden" class="wards_find_pro_<?= $deliveryPointIndex?>">

                <span
                    class=" err_messages err_province_<?= $deliveryPointIndex?>"><?php echo $getErrors['province']; ?></span>
            </li>
            <li class="col-md-4 mb-2 pr-0 districtReceiver_<?= $deliveryPointIndex?>">

                <select name="deliveryPoint[<?= $deliveryPointIndex ?>][district]"
                    index_dict="<?= $deliveryPointIndex ?>" placeholder=""
                    id="districtReceiver_<?= $deliveryPointIndex?>"
                    class="form-control frm-lg chosen-select order_district_code_from ">
                    <option value="0"><?= lang('Label.lbl_orderWareHouseDistrict'); ?></option>
                </select>
                <span
                    class=" err_messages err_district_<?= $deliveryPointIndex?>"><?php echo $getErrors['district']; ?></span>
            </li>

            <li class="col-md-4 mb-2 pr-0 wardReceiver_<?= $receiverIndex?>">

                <select name="deliveryPoint[<?= $receiverIndex ?>][ward]"
                    index_ward="<?= $receiverIndex ?>" index_ward="<?= $receiverIndex ?>"
                    id="wardReceiver_<?= $receiverIndex?>"
                    class="form-control frm-lg chosen-select order_ward_code_from ">
                    <option value="0"><?= lang('Label.lbl_orderWareHouseWard'); ?></option>
                </select>
                <span
                    class=" err_messages err_ward_<?= $deliveryPointIndex?>"><?php echo $getErrors['ward']; ?></span>
            </li>
        </ul>
        <!-- After click hoàn thành ( filter order detail) -->

            <div class="or-ttng row  w100 afOrder_<?= $deliveryPointIndex.'_'.$receiverIndex ?>" style="line-height: 32px;background: #F8F8F8;margin: 0 20px!important;border-radius: 5px; display:none">
                
            </div>
        <!-- End click hoàn thành  -->

        <!-- Order info -->
        <div class="or-ttng row pickupOrder_<?= $deliveryPointIndex.'_'.$receiverIndex ?>">
            <div class="chinhsua1 mb-1">
                <!-- ========HIỂN THỊ KHI CLICK VÀO SỬA ĐƠN HÀNG ========= -->
                <div id="orders" class="or-ttdh row qo-ttdhl">
                    <ul class="or-dgh col-12 ">
                        <li class="or-dgh-1 pt-0 mt-0">
                            <span class="or-dh-stt"
                                style="background: #F0A616;"><?= $deliveryPointIndex ?></span><span
                                style="color: #68656D;"><?= lang('Label.lbl_addOrderDetail') ?></span>
                        </li>
                        <li class="or-ttnh">
                            <ul>
                                <li class="or-ttnh-tt">
                                    <?= lang('Label.lbl_txtReceiverInfo') ?>
                                </li>
                            </ul>
                            <ul class="row">
                                <li class="col-md-3 col-sm-6 or-cgc-1">
                                    <?= lang('Label.lbl_txtReceiverPhone') ?><span
                                        style="color: #885DE5;"> *</span> <br>
                                    <input
                                        name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][phone]"
                                        type="text" class="receiverPhone"
                                        index_item="<?= $receiverIndex ?>"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                        placeholder="<?= lang('Label.ph_phone') ?>"><br>
                                    <span
                                        class=" err_messages err_receiverPhone_<?= $deliveryPointIndex.'_'.$receiverIndex ?>"><?php echo $getErrors['ward']; ?></span>
                                </li>

                                <li class="col-md-3 col-sm-6 or-cgc-1">
                                    <?= lang('Label.lbl_txtReceiverName') ?><span
                                        style="color: #885DE5;"> *</span> <br>
                                    <input
                                        name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][name]"
                                        index_item="<?= $receiverIndex ?>" class="receiver unNumber"
                                        type="text"
                                        placeholder="<?= lang('Label.lbl_txtReceiverName') ?>"><br>
                                    <span
                                        class=" err_messages err_receiver_<?= $deliveryPointIndex.'_'.$receiverIndex ?>"><?php echo $getErrors['ward']; ?></span>
                                </li>
                                <li class="col-md-3 col-sm-6 or-cgc-1">
                                    <?= lang('Label.lbl_txtReceiverDate') ?><span
                                        style="color: #885DE5;"> *</span> <br>
                                    <input
                                        name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][expectDate]"
                                        index_item="<?= $deliveryPointIndex ?>" type="text"
                                        class="orderdatePicker expectDate"
                                        style="padding-right: 10px;"><br>
                                    <span
                                        class=" err_messages err_expectDate_<?= $deliveryPointIndex ?>"><?php echo $getErrors['ward']; ?></span>
                                </li>
                                <li class="col-md-3 col-sm-6 or-cgc-1">
                                    <?= lang('Label.lbl_txtReceiverTime') ?><span
                                        style="color: #885DE5;"> *</span> <br>
                                    <input
                                        name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][expectTime]"
                                        index_item="<?= $receiverIndex ?>" type="time"
                                        class="or-ttnh-input"><br>
                                    <span
                                        class=" err_messages err_expectTime_<?= $receiverIndex ?>"><?php echo $getErrors['ward']; ?></span>
                                </li>
                            </ul>
                        </li>

                        <!-- Thông tin hàng hóa -->
                        <li class="or-ttnh">
                            <ul>
                                <li class="or-ttnh-tt">
                                    <?= lang('Label.lbl_txtGoodInfo') ?>
                                </li>
                            </ul>

                            <ul class="row">
                                <li class="col-md-6 col-sm-12">
                                    <?= lang('Label.lbl_txtGoodName') ?><span style="color: #885DE5;">
                                        *</span> <br>
                                    <input index_item="<?= $receiverIndex ?>"
                                        class="productName productName_<?= $deliveryPointIndex.'_'.$receiverIndex?>"
                                        type="text" placeholder="<?= lang('Label.lbl_inputGoodName') ?>"
                                        id="qo-tensp-ht">
                                    <span
                                        class=" err_messages err_productName_<?= $deliveryPointIndex.'_'.$receiverIndex ?>"><?php echo $getErrors['ward']; ?></span>
                                </li>
                                <li class="col-md-3 col-sm-6">
                                    <?= lang('Label.lbl_txtCod') ?><span style="color: #885DE5;">
                                        *</span> <br>
                                    <input index_item="<?= $receiverIndex ?>"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                        type="text" value="0"
                                        class="or-cod productCOD_<?=  $deliveryPointIndex.'_'. $receiverIndex?>" id="qo-cod-ht">
                                    <span style="margin-left: -34px;"> đ</span>
                                    <span
                                        class=" err_messages err_productCod_<?= $deliveryPointIndex.'_'.$receiverIndex ?>"><?php echo $getErrors['ward']; ?></span>
                                </li>
                                <li class="col-md-3 col-sm-6 or-cgc-1">
                                    <input index_item="<?= $receiverIndex ?>" checked
                                        name="checkProductValue" id="checkProductValue_<?=  $deliveryPointIndex.'_'. $receiverIndex?>" type="checkbox"
                                        class="regular-checkbox mb-0 checkProductValue"
                                        style="width: 10px;height: 10px;">
                                    <label
                                        for="checkProductValue"><?= lang('Label.lbl_txtGoodValue') ?></label><span
                                        style="color: #885DE5;"> *</span> <br>
                                    <input index_item="<?= $receiverIndex ?>" type="text" value="0"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                        class="or-ttnh-input or-gtkg productValue_<?=  $deliveryPointIndex.'_'. $receiverIndex?>"
                                        id="qo-khaigia-ht"><span style="margin-left: -34px;"> đ</span>
                                        </br>
                                        <span class=" err_messages err_productValue_<?= $deliveryPointIndex.'_'.$receiverIndex ?>"><?php echo $getErrors['ward']; ?></span>
                                </li>
                            </ul>
                            <ul class="row">
                                <li class="col-md-6 col-sm-12">
                                    <?= lang('Label.lbl_txtGoodType'); ?><span style="color: #885DE5;">
                                        *</span> <br>
                                    <select style="padding-right: 10px;"
                                        placeholder="Chọn loại hàng hóa" id="productCategory_<?= $deliveryPointIndex.'_'. $receiverIndex ?>"
                                        class="chosen-select productCategory_<?= $deliveryPointIndex.'_'. $receiverIndex ?>">
                                        <option value="0">Chọn loại hàng hóa</option>
                                        <?php foreach($arrProductCategory as $keyProductCate => $productCategory): ?>
                                            <option value="<?= $keyProductCate ?>"><?= $productCategory ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </li>
                                <li class="col-md-3 col-sm-6">
                                    <?= lang('Label.lbl_txtGoodQuantity'); ?><span
                                        style="color: #885DE5;">
                                        *</span> <br>
                                    <input value="1"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                        style="padding-right: 10px;" id="qo-soluong-ht"
                                        class="productQuatity_<?= $deliveryPointIndex.'_'. $receiverIndex ?>">
                                        <span
                                        class=" err_messages err_productQuatity_<?= $deliveryPointIndex.'_'.$receiverIndex ?>"><?php echo $getErrors['ward']; ?></span>
                                </li>
                                <li class="col-md-3 col-sm-6">
                                    <br>
                                    <button type="button" class="or-lhh-btn saveProduct"
                                        id="qo-btn-thh-1-<?= $deliveryPointIndex.'-'.$receiverIndex ?>" 
                                        deliveryPointIndex=<?= $deliveryPointIndex ?>
                                        receiverIndex=<?= $receiverIndex?>
                                        productIndex=<?= $productIndex ?>
                                        ><?= lang('Label.lbl_txtGoodSave') ?></button>
                                    <button type="button" 
                                        deliveryPointIndex=<?= $deliveryPointIndex ?>
                                        receiverIndex=<?= $receiverIndex?>
                                        productIndex=<?= $productIndex ?>
                                        class="or-lhh-btn qo-ed-a updateProduct"
                                        id="qo-btn-thh-2-<?= $deliveryPointIndex.'-'.$receiverIndex ?>"><?= lang('Label.lbl_txtSaveInfo') ?></button>

                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- Nếu có thêm mới hàng hóa thì phần này sẽ đươc hiện -->
                    <div style="width: 100%;" class="ttsp" id="ttsp_<?= $deliveryPointIndex.'_'.$receiverIndex ?>">

                    </div>
                    <!-- END hàng hóa -->

                    <ul class="col-12">
                        <li class="or-dvht">
                            <?= lang('Label.lbl_txtSupportServices') ?>
                        </li>
                    </ul>
                    <ul class="col-md-3 col-sm-6 or-ctdh-1">
                        <li>
                            <?= lang('Label.lbl_txtGoodSize') ?><span style="color: #885DE5;"> *</span>
                            <br>
                            <input
                                name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][length]"
                                type="text" placeholder="Dài x rộng x cao"><span
                                style="margin-left: -34px;">Cm</span>
                        </li>
                    </ul>
                    <ul class="col-md-3 col-sm-6 or-ctdh-1">
                        <li>
                            <?= lang('Label.lbl_txtGoodWeight') ?><span style="color: #885DE5;">
                                *</span> <br>
                            <input
                                name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][weight]"
                                type="text" value="200"><span style="margin-left: -50px;">Gram</span>
                        </li>
                    </ul>
                    <ul class="col-md-6 col-sm-12 or-ctdh-1">
                        <li>
                            <?= lang('Label.lbl_txtExtraNote') ?><span style="color: #885DE5;"> *</span>
                            <br>
                            <input
                                name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][note]"
                                type="text" value="Cho xem hàng, nếu khách không lấy thu 20k tiền ship"
                                class="or-ttnh-input1">
                        </li>
                    </ul>

                    <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                        <li class="or-cgc-1">
                            <?= lang('Label.lbl_txtPayerFee') ?><span style="color: #885DE5;"> *</span>
                            <br>
                            <input type="radio" name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][isFree]" class="or-radio-checked" id="orNtc1" value="1" checked> <label for="orNtc1"> <?= lang('Label.lbl_txtPayerFeeSender') ?></label>
                            <br>

                            <input type="radio" value="0" name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][isFree]" class="or-radio-checked" id="orNtc1a"> 
                            <label for="orNtc1a"><?= lang('Label.lbl_txtPayerFeeReceiver') ?></label>
                        </li>
                    </ul>
                    <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                        <li class="or-cgc-1"><?= lang('Label.lbl_txtPartialDelivery') ?><span
                                style="color: #885DE5;"> *</span> <br>
                            <input type="radio" value="1"
                                name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][partialDelivery]"
                                class="or-radio-checked" id="gh1p1" checked>
                            <label for="gh1p1"><?= lang('Label.lbl_txtPartialDeliveryYes') ?>
                            </label><br>
                            <input type="radio" value="0"
                                name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][partialDelivery]"
                                class="or-radio-checked" id="gh1p1a"> <label
                                for="gh1p1a"><?= lang('Label.lbl_txtPartialDeliveryNo') ?></label>
                        </li>
                    </ul>
                    <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                        <li class="or-cgc-1">
                            <?= lang('Label.lbl_txtIsReturn') ?> <br>
                            <input type="radio" value="1"
                                name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][isRefund]"
                                class="or-radio-checked" id="dvch1" checked>
                            <label for="dvch1"><?= lang('Label.lbl_txtPartialDeliveryYes') ?></label>
                            <br>
                            <input type="radio" value="0"
                                name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][isRefund]"
                                class="or-radio-checked" id="dvch1a"> <label
                                for="dvch1a"><?= lang('Label.lbl_txtPartialDeliveryNo') ?></label>
                        </li>
                    </ul>
                    <ul class="col-xl-2 col-sm-3 or-ctdh-1 or-ctdh-2">
                        <li class="or-cgc-1">
                            <?= lang('Label.lbl_txtExtraServices') ?> <br>
                            <input type="checkbox"
                                name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][extraServices][isDoorDeliver]"
                                class="regular-checkbox or-radio-checked" id="dvthem1" /> <label
                                for="dvthem1"><?= lang('Label.lbl_txtIsDoorDeliver') ?></label>
                            <br>
                            <input type="checkbox"
                                name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][extraServices][isPorter]"
                                class="regular-checkbox or-radio-checked" id="dvthem1a" /> <label
                                for="dvthem1a"><?= lang('Label.lbl_txtIsPorter') ?></label>
                        </li>
                    </ul>
                    <ul class="col-xl-4 col-sm-12 or-ctdh-1">
                        <li>
                            <?= lang('Label.lbl_txtNoteRequired') ?> <span style="color: #885DE5;">
                                *</span> <br>
                                <select
                                name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][requireNote]"
                                style="width: 100%;">
                                <option <?= ($receiver['requireNote'] == 1) ? 'selected' : '' ?> value="1"><?= lang('Label.lbl_txtNoteRequired1') ?></option>
                                <option <?= ($receiver['requireNote'] == 1) ? 'selected' : '' ?> value="2"><?= lang('Label.lbl_txtNoteRequired2') ?></option>
                                <option <?= ($receiver['requireNote'] == 1) ? 'selected' : '' ?> value="3"><?= lang('Label.lbl_txtNoteRequired3') ?></option>
                            </select>
                        </li>
                    </ul>
                    <ul class="col-md-6 col-sm-0">
                    </ul>
                    <ul class="col-md-3 col-sm-6 or-ctdh-btn1">
                        <button type="button"
                            onclick="chinhsuanone('chinhsua1','qo-ed-1')"><?= lang('Label.lbl_txtCancel') ?></button>
                    </ul>
                    <ul class="col-md-3 col-sm-6  or-ctdh-btn2">
                        <button class=" closePickupOrder closePickupOrder_<?= $deliveryPointIndex.'_'.$receiverIndex ?>"
                            deliveryPointIndex='<?= $deliveryPointIndex ?>' receiverIndex='<?= $receiverIndex ?>' productIndex='<?= $productIndex ?>'
                            type="button"><?= lang('Label.lbl_txtFinish') ?></button>
                    </ul>
                </div>
                <!-- ========HẾT PHẦN SỬA HÀNG HÓA========= -->
            </div>
        </div>
        <div class="or-ttng row addReceiver_<?= $deliveryPointIndex ?> w100">

        </div>
        <div class="btn-add-orders">
            <button type="button" deliveryPointIndex='' receiverIndex='' productIndex='' class="or-tctdn-btn dpn addProductItem addProductItem_<?= $deliveryPointIndex ?>">
                <img src="<?php echo base_url('public/images/tdg2.png');?>" alt=""
                    class="float-left pl-2">
                <?= lang('Label.lbl_addNewOrderProduct') ?>
            </button>
        </div>
    </div>

</div>
<div class="btn-add-orders">
    <div>
        <img src="<?php echo base_url('public/images/Group284.png');?>" alt="" class="or-img-tdg">
    </div>
    <button type="button" class="or-tdg-btn" onclick="addNewPickupAddress()">
        <img src="<?php echo base_url('public/images/tdg2.png');?>" alt="" class="float-left pl-2">
        <?= lang('Label.lbl_txtExtraAddress') ?></button>
</div>
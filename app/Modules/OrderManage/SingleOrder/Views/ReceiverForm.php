<!-- ========HIỂN THỊ KHI CLICK VÀO SỬA ĐƠN HÀNG ========= -->
<div id="orders" class="or-ttdh row qo-ttdhl receiver-<?= $index->deliveryPointIndex.'-'.$index->receiverIndex?>">
    <ul class="or-dgh col-12 ">
        <li class="or-dgh-1 pt-0 mt-0">
            <span class="or-dh-stt"
                style="background: #F0A616;"><?= $index->receiverIndex ?></span><span
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
                    <!-- receiver phone -->
                    <input
                        name="receiverPhone"
                        value=""
                        type="text" class="receiverPhone"
                        receiverIndex="<?= $index->receiverIndex ?>"
                        deliveryPointIndex="<?= $index->deliveryPointIndex ?>"
                        onkeypress="return isNumber(event)"
                        placeholder="<?= lang('Label.ph_phone') ?>"><br>
                    <span
                        class=" err_messages err_receiverPhone_<?= $index->deliveryPointIndex.'_'.$index->receiverIndex ?>"> </span>
                </li>
                <li class="col-md-3 col-sm-6 or-cgc-1">
                    <?= lang('Label.lbl_txtReceiverName') ?><span
                        style="color: #885DE5;"> *</span> <br>
                    <!-- receiver name -->
                    <input
                        name = "receiverName"
                        value = ""
                        receiverIndex="<?= $index->receiverIndex ?>"
                        deliveryPointIndex="<?= $index->deliveryPointIndex ?>" 
                        class="receiver unNumber"
                        type="text"
                        placeholder="<?= lang('Label.lbl_txtReceiverName') ?>"><br>
                    <span
                        class=" err_messages err_receiver_<?= $index->deliveryPointIndex.'_'.$index->receiverIndex ?>"> </span>
                </li>
                <li class="col-md-3 col-sm-6 or-cgc-1">
                    <?= lang('Label.lbl_txtReceiverDate') ?><br>
                        <!-- expectDate -->
                    <input
                        name="expectDate"
                        receiverIndex="<?= $index->receiverIndex ?>"
                        deliveryPointIndex="<?= $index->deliveryPointIndex ?>"
                        type="text"
                        value = ""
                        class="orderdatePicker expectDate"
                        style="padding-right: 10px;"><br>
                    <span
                        class=" err_messages err_expectDate_<?= $index->deliveryPointIndex ?>"> </span>
                </li>
                <li class="col-md-3 col-sm-6 or-cgc-1">
                    <?= lang('Label.lbl_txtReceiverTime') ?><br>
                        <!-- expectTime -->
                    <input
                        name="expectTime"
                        receiverIndex="<?= $index->receiverIndex ?>"
                        deliveryPointIndex="<?= $index->deliveryPointIndex ?>"
                        type="time"
                        value = "<?= $receiver['expectTime'] ?>"
                        class="or-ttnh-input"><br>
                    <span
                        class=" err_messages err_expectTime_<?= $index->receiverIndex ?>"> </span>
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
                        <!-- product name -->
                    <input index_item="<?= $index->receiverIndex ?>"
                        class="productName productName_<?= $index->deliveryPointIndex.'_'.$index->receiverIndex?>"
                        type="text" placeholder="<?= lang('Label.lbl_inputGoodName') ?>"
                        id="qo-tensp-ht">
                    <span
                        class=" err_messages err_productName_<?= $index->deliveryPointIndex.'_'.$index->receiverIndex ?>"><?php echo $getErrors['ward']; ?></span>
                </li>
                <li class="col-md-3 col-sm-6">
                    <?= lang('Label.lbl_txtCod') ?><span style="color: #885DE5;">
                        *</span> <br>
                        <!-- product COD -->
                    <input index_item="<?= $index->receiverIndex ?>"
                        onkeypress="return isNumber(event)"
                        type="text" value="0"
                        class="or-cod productCOD_<?=  $index->deliveryPointIndex.'_'. $index->receiverIndex?>" id="qo-cod-ht">
                    <span style="margin-left: -34px;"> đ</span>
                    <span
                        class=" err_messages err_productCod_<?= $index->deliveryPointIndex.'_'.$index->receiverIndex ?>"><?php echo $getErrors['ward']; ?></span>
                </li>
                <li class="col-md-3 col-sm-6 or-cgc-1">
                    <!-- product value check -->
                    <input index_item="<?= $index->receiverIndex ?>" checked
                        name="checkProductValue" id="checkProductValue_<?=  $index->deliveryPointIndex.'_'. $index->receiverIndex?>" type="checkbox"
                        class="regular-checkbox mb-0 checkProductValue"
                        style="width: 10px;height: 10px;">
                    <label
                        for="checkProductValue"><?= lang('Label.lbl_txtGoodValue') ?></label><span
                        style="color: #885DE5;"> *</span> <br>
                    <!-- product value -->
                    <input index_item="<?= $index->receiverIndex ?>" type="text" value="0"
                        onkeypress="return isNumber(event)"
                        class="or-ttnh-input or-gtkg productValue_<?=  $index->deliveryPointIndex.'_'. $index->receiverIndex?>"
                        id="qo-khaigia-ht"><span style="margin-left: -34px;"> đ</span>
                        </br>
                        <span class=" err_messages err_productValue_<?= $index->deliveryPointIndex.'_'.$index->receiverIndex ?>"><?php echo $getErrors['ward']; ?></span>
                </li>
            </ul>
            <ul class="row">
                <li class="col-md-6 col-sm-12">
                    <?= lang('Label.lbl_txtGoodType'); ?><span style="color: #885DE5;">
                        *</span> <br>
                        <!-- product category -->
                    <select style="padding-right: 10px;"
                        placeholder="Chọn loại hàng hóa" id="productCategory_<?= $index->deliveryPointIndex.'_'. $index->receiverIndex ?>"
                        class="chosen-select productCategory_<?= $index->deliveryPointIndex.'_'. $index->receiverIndex ?>">
                        <option value="0"><?= lang('Label.lbl_txtCategory') ?></option>
                        <?php foreach($arrProductCategory as $keyProductCate => $productCategory): ?>
                            <option value="<?= $keyProductCate ?>"><?= $productCategory ?></option>
                        <?php endforeach; ?>
                    </select>
                </li>
                <li class="col-md-3 col-sm-6">
                    <?= lang('Label.lbl_txtGoodQuantity'); ?><span
                        style="color: #885DE5;">
                        *</span> <br>
                        <!-- product quantity -->
                    <input value="1"
                        onkeypress="return isNumber(event)"
                        style="padding-right: 10px;" id="qo-soluong-ht"
                        class="productQuatity_<?= $index->deliveryPointIndex.'_'. $index->receiverIndex ?>">
                        <span
                        class=" err_messages err_productQuatity_<?= $index->deliveryPointIndex.'_'.$index->receiverIndex ?>"><?php echo $getErrors['ward']; ?></span>
                </li>
                <li class="col-md-3 col-sm-6">
                    <br>
                    <!-- btn save -->
                    <button type="button" class="or-lhh-btn saveProduct"
                    id="qo-btn-thh-1-<?= $index->deliveryPointIndex.'-'.$index->receiverIndex ?>" deliveryPointIndex=<?= $index->deliveryPointIndex ?>
                    receiverIndex=<?= $index->receiverIndex?>
                    productIndex=<?= $index->productIndex ?>
                    ><?= lang('Label.lbl_txtGoodSave') ?></button>
                    <!-- btn edit -->
                    <button type="button" deliveryPointIndex=<?= $index->deliveryPointIndex ?>
                        receiverIndex=<?= $index->receiverIndex?>
                        productIndex=<?= $index->productIndex ?>
                        class="or-lhh-btn qo-ed-a updateProduct" 
                        id="qo-btn-thh-2-<?= $index->deliveryPointIndex.'-'.$index->receiverIndex ?>"><?= lang('Label.lbl_txtSaveInfo') ?></button>

                </li>
            </ul>
            
        </li>
    </ul>
    <!-- Nếu có thêm mới hàng hóa thì phần này sẽ đươc hiện -->
    <div style="width: 100%;" class="ttsp" id="ttsp_<?= $index->deliveryPointIndex.'_'.$index->receiverIndex ?>">
            
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
            <!-- length -->
            <input
                name=""
                value="<?= $receiver['length'] ?>"
                type="text" placeholder="Dài x rộng x cao"><span
                style="margin-left: -34px;">Cm</span>
        </li>
    </ul>
    <ul class="col-md-3 col-sm-6 or-ctdh-1">
        <li>
            <?= lang('Label.lbl_txtGoodWeight') ?><span style="color: #885DE5;">
                *</span> <br>
                <!-- weight -->
            <input
                value=""
                name=""
                type="text" ><span style="margin-left: -50px;">Gram</span>
        </li>
    </ul>
    <ul class="col-md-6 col-sm-12 or-ctdh-1">
        <li>
            <?= lang('Label.lbl_txtExtraNote') ?><span style="color: #885DE5;"> *</span>
            <br>
            <!-- note -->
            <input
                name=""
                type="text" value=""
                class="or-ttnh-input1">
        </li>
    </ul>

    <ul class="col-xl-2 col-sm-3 or-ctdh-1">
        <li class="or-cgc-1">
            <?= lang('Label.lbl_txtPayerFee') ?><span style="color: #885DE5;"> *</span>
            <br>
            <!-- isFree -->
            <input type="radio" name="isFree" class="or-radio-checked" id="orNtc1" value="1" > 
            <label for="orNtc1"> <?= lang('Label.lbl_txtPayerFeeSender') ?></label>
            <br>

            <input type="radio" value="0" name="isFree" class="or-radio-checked" id="orNtc1a"> 
            <label for="orNtc1a"><?= lang('Label.lbl_txtPayerFeeReceiver') ?></label>

        </li>
    </ul>
    <ul class="col-xl-2 col-sm-3 or-ctdh-1">
        <li class="or-cgc-1"><?= lang('Label.lbl_txtPartialDelivery') ?><span
                style="color: #885DE5;"> *</span> <br>

            <!-- partialDelivery -->
            <input type="radio" value="1"
                name="partialDelivery"
                class="or-radio-checked" id="gh1p1" checked>
            <label for="gh1p1"><?= lang('Label.lbl_txtPartialDeliveryYes') ?>
            </label><br>

            <input type="radio" value="0"
                name="partialDelivery"
                class="or-radio-checked" id="gh1p1a"> <label
                for="gh1p1a"><?= lang('Label.lbl_txtPartialDeliveryNo') ?></label>
        </li>
    </ul>
    <ul class="col-xl-2 col-sm-3 or-ctdh-1">
        <li class="or-cgc-1">
            <?= lang('Label.lbl_txtIsReturn') ?> <br>
            <!-- isRefund -->
            <input type="radio" value="1"
                name="isRefund"
                class="or-radio-checked" id="dvch1" checked>
            <label for="dvch1"><?= lang('Label.lbl_txtPartialDeliveryYes') ?></label>
            <br>
            <input type="radio" value="0"
                name="isRefund"
                class="or-radio-checked" id="dvch1a"> <label
                for="dvch1a"><?= lang('Label.lbl_txtPartialDeliveryNo') ?></label>
        </li>
    </ul>
    <ul class="col-xl-2 col-sm-3 or-ctdh-1 or-ctdh-2">
        <li class="or-cgc-1">
            <?= lang('Label.lbl_txtExtraServices') ?> <br>

            <input type="checkbox"
                name="extraServices[isDoorDeliver]"
                class="regular-checkbox or-radio-checked" id="dvthem1" /> <label
                for="dvthem1"><?= lang('Label.lbl_txtIsDoorDeliver') ?></label>
            <br>
            <input type="checkbox"
                name="extraServices[isPorter]"
                class="regular-checkbox or-radio-checked" id="dvthem1a" /> <label
                for="dvthem1a"><?= lang('Label.lbl_txtIsPorter') ?></label>
        </li>
    </ul>
    <ul class="col-xl-4 col-sm-12 or-ctdh-1">
        <li>
            <?= lang('Label.lbl_txtNoteRequired') ?> <span style="color: #885DE5;">
                *</span> <br>
            <select class="chosen-select"
                name="requireNote"
                style="width: 100%;">
                <option value="1"><?= lang('Label.lbl_txtNoteRequired1') ?></option>
                <option value="2"><?= lang('Label.lbl_txtNoteRequired2') ?></option>
                <option value="3"><?= lang('Label.lbl_txtNoteRequired3') ?></option>
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
        <button class=" closePickupOrder closePickupOrder_<?= $index->deliveryPointIndex.'_'.$index->receiverIndex ?>"
            deliveryPointIndex='<?= $index->deliveryPointIndex ?>' receiverIndex='<?= $index->receiverIndex ?>' productIndex='<?= $index->productIndex ?>'
            type="button"><?= lang('Label.lbl_txtFinish') ?></button>
    </ul>
</div>
<!-- ========HẾT PHẦN SỬA HÀNG HÓA========= -->
<?php if (!empty($dataResponse)): ?>
<div class="modal" id="resultApproveMultiOrder" style="display:block;  background: rgb(218 218 218 / 75%);">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 17%;">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title headerFalse">
                    <?=lang('Label.lbl_resultApproveOrver')?>
                </h5>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row modal-body-content">
                    <div class="col-12 textCenter bodyOrderFalse">
                        <?php if (isset($dataResponse->totalPendingSuccess)) {?>
                        <p class="fz15">
                            <?=lang('Label.lbl_txtYes')?>
                            <strong class="numberSuccess colorOrange"> <?=$dataResponse->totalPendingSuccess?>
                            </strong>
                            <?=lang('Label.lbl_approveOrderMulti1')?>
                            <strong class="numberError colorOrange"> <?=$dataResponse->totalPendingError?> </strong>
                            <?=lang('Label.lbl_approveOrderMulti2')?>
                            <?php if ($dataResponse->totalError > 0) {?>
                            <strong class="numberError colorOrange"> <?=$dataResponse->totalError?> </strong>
                            <?=lang('Label.lbl_approveOrderMulti3')?>
                            <?php }?>
                        </p>
                        <?php if ($dataResponse->remainMoneyToConfirm > 0) {?>
                        <p class="fz13">
                            <?=lang('Label.lbl_payInOrder1')?>
                        </p>
                        <p class="fz13">
                            <?=lang('Label.lbl_payInOrder2')?>
                            <strong class="colorPurple">
                                <?=number_format($dataResponse->remainMoneyToConfirm) . ' đ'?></strong>
                            <?=lang('Label.lbl_payInOrder3')?>
                        </p>
                        <p class="fz13">
                            <?=lang('Label.lbl_payInOrder4')?>
                        </p>
                        <?php }?>
                        <?php } else {?>
                        <p class="fz13">
                            <?=$dataResponse->message?>
                        </p>
                        <?php }?>

                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer customize-approve">
                <?php if (isset($dataResponse->totalPendingSuccess)) {?>
                <a class="btn btn-modal btn-cancelCustom" href="<?=base_url('/danh-sach-don-hang');?>">
                    <?=lang('Label.lbl_manageOrder')?></a>
                <?php if ($dataResponse->totalError > 0) {?>
                <button type="button" class="btn btn-modal"
                    data-dismiss="modal"><?=lang('Label.lbl_txtDownloadOrderWrongFile');?></button>
                <?php }?>
                <?php if ($dataResponse->remainMoneyToConfirm > 0): ?>
                <a class="btn btn-confirmCustom btn-ok" href="<?=base_url('/nap-tien');?>">
                    <?=lang('Label.lbl_wallet')?></a>
                <?php endif;?>
                <?php } else {?>
                <button type="button" class="btn btn-modal" onclick="closeModalCustom()"
                    data-dismiss="modal"><?=lang('Label.modalClose');?></button>
                <?php }?>
            </div>

        </div>
    </div>
</div>
<?php endif;?>
<section id="orders">

    <!-- Tiêu đề -->
    <div class="warehouse-banner-title row">
        <ul class="col-md-3 pr-0 mb-0">
            <li>
                <img src="<?php echo base_url('public/images/Home.png'); ?>">
            </li>
            <li style="margin-top: 4px;">
                ><b> <?=lang('Label.lbl_order')?></b> ><span><?php echo $title ?></span>
            </li>
        </ul>
        <div class="col-md-6 row pr-0 mb-0 ml-0">
            <div class="txtStep col-md-4 pl-0 pr-0">
                <ul class="or-banner1">
                    <li style="background: #2DB1DB!important;color: white!important;line-height: 20px;">
                        1
                    </li>
                    <li style="color: #2DB1DB!important;" class="or-cgc-1">
                        <?=lang('Label.lbl_txtUploadFile')?>
                    </li>
                </ul>
            </div>
            <div class="txtStep col-md-4 pr-0">
                <a href="#" onclick="history.back();">
                <ul class="or-banner1">
                    <li>
                        2
                    </li>
                    <li class="or-cgc-1">
                        <?=lang('Label.lbl_txtEnterInfo')?>
                    </li>
                </ul>
                </a>
            </div>

            <div class="txtStep col-md-4 pr-0">
                <ul class="or-banner ml-0">
                    <li style="line-height: 23px;">
                        3
                    </li>
                    <li class="or-cgc-1">
                        <?=lang('Label.lbl_confirmOrder')?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ============= -->
</section>


<section id="quick-orders">
    <form action="" id="form-order-fast" method="POST" enctype="multipart/form-data">
        <!-- Thông tin người gửi -->
        <div class="qo-ttng row">
            <ul class="row col-sm-12 mb-0 pr-0 txtTtng">
                <li class="col-sm-4 qo-ttng-2">
                    <b> <?=lang('Label.lbl_txtInfoSender')?></b>
                </li>
            </ul>
            <!-- choose pickupAddress -->
            <div class="row w100 newPickupFast" <?=(empty($primaryPickupAddress)) ? '' : 'style="display:none"'?>>

                <ul class="col-sm-6 orDetail-input ">
                    <!-- Tên người gửi -->
                    <li>
                        <?=lang('Label.lbl_txtNamePickup')?><span style="color: #885DE5;"> *</span>
                    </li>
                    <li>
                        <input type="text" class=" ipt pickName unNumber" name="pickName" value=""
                            placeholder="<?=lang('Label.lbl_setNameSender')?>">
                        <span class=" err_messages err_pickName"><?php echo $getErrors['pickName']; ?></span>
                    </li>
                </ul>
                <ul class="col-sm-6 orDetail-input">
                    <li>
                        <?=lang('Label.phone')?><span style="color: #885DE5;"> *</span>
                    </li>
                    <li>
                        <!-- SĐT người gửi -->
                        <input type="text" class=" ipt pickPhone" name="pickPhone" onkeypress="return isNumber(event)"
                            value="" placeholder="<?=lang('Label.ph_phone')?>">

                        <span class=" err_messages err_pickPhone"><?php echo $getErrors['pickPhone']; ?></span>
                    </li>
                </ul>
                <ul class="col-sm-6 orDetail-input">
                    <!-- địa chỉ chi tiết -->
                    <li>
                        <?=lang('Label.lbl_senderAddress')?><span style="color: #885DE5;"> *</span>
                    </li>
                    <li>
                        <input type="text" name="pickAddress" class="ipt pickAddress" value=""
                            placeholder="<?=lang('Label.lbl_inputDetailAddress')?>">
                        <span class=" err_messages err_pickAddress"></span>
                    </li>
                </ul>
                <ul class="col-sm-6 row orDetail-input pr-0" style="padding-top: 30px;">
                    <!-- Tỉnh thành -->
                    <li class="col-md-4 mb-2 pr-0">
                        <select name="pickProvince" id="province"
                            class="form-control frm-lg pickProvince chosen-select province_code_from ">
                            <option value="0"><?=lang('Label.lbl_orderWareHouseProvince');?></option>
                            <?php foreach ($dataProvinces as $province): ?>
                            <option value="<?=$province['code'];?>"> <?=$province['name'];?>
                            </option>
                            <?php endforeach;?>
                        </select>
                        <span class=" err_messages err_province"><?php echo $getErrors['pickProvince']; ?></span>
                    </li>
                    <!-- Phường xã -->
                    <li class="col-md-4 mb-2 pr-0">
                        <select name="pickDistrict" id="district"
                            class="form-control pickDistrict frm-lg chosen-select district_code_from ">
                            <option value=""><?=lang('Label.lbl_orderWareHouseDistrict');?></option>
                            <?php
if (!empty($dataDistricts)) {
    foreach ($dataDistricts as $district): ?>
                            <option value="<?=$district['code'];?>"> <?=$district['name'];?>
                                <?php endforeach;
}
?>
                        </select>
                        <span class=" err_messages err_district"><?php echo $getErrors['pickDistrict']; ?></span>
                    </li>
                    <!-- Quận huyện -->
                    <li class="col-md-4 mb-2 pr-0">
                        <select name="pickWard" id="ward"
                            class="form-control frm-lg pickWard chosen-select ward_code_from ">
                            <option value=""><?=lang('Label.lbl_orderWareHouseWard');?></option>
                            <?php
if (!empty($dataWards)) {
    foreach ($dataWards as $ward): ?>
                            <option value="<?=$ward['code'];?>"> <?=$ward['name'];?>
                                <?php endforeach;
}
?>
                        </select>
                        <span class=" err_messages err_ward"><?php echo $getErrors['pickWard']; ?></span>
                    </li>
                </ul>
            </div>
            <div class="row senderInfo">
                <?php if (!empty($primaryPickupAddress)): ?>
                <div class="row col-12 oldPickup qo-dcng pb-0">
                    <div class="col-sm-4 pr-0">
                        <img src="<?php echo base_url('public/images/qo-img-1.png'); ?>" alt="">
                        <span><?=$primaryPickupAddress->name?></span>
                    </div>
                    <div class="col-sm-4 pr-0">
                        <img src="<?php echo base_url('public/images/manager.png'); ?>" alt="">
                        <span><?=$primaryPickupAddress->senderName?></span>
                    </div>
                    <div class="col-sm-4 pr-0">
                        <img src="<?php echo base_url('public/images/phone.png'); ?>" alt="">
                        <span><?=$primaryPickupAddress->phone?></span>
                    </div>
                </div>
                <div class="col-12 oldPickup qo-dcng-1 qo-dcng">
                    <img src="<?php echo base_url('public/images/place.png'); ?>" alt=""> <span>
                        <?php
echo ($primaryPickupAddress->address) ? $primaryPickupAddress->address . ', ' : '';
echo ($primaryPickupAddress->wardName) ? $primaryPickupAddress->wardName . ', ' : '';
echo ($primaryPickupAddress->districtName) ? $primaryPickupAddress->districtName . ', ' : '';
echo ($primaryPickupAddress->provinceName) ? $primaryPickupAddress->provinceName : '';
?>
                    </span>
                </div>
                <input type="hidden" name="pickupAddressId<?=$index?>" value="<?=$primaryPickupAddress->id?>">
                <?php endif;?>
            </div>
        </div>
        <div class="qo-dhtf">
            <ul class="mb-0">
                <li>
                    <b><?=lang('Label.lbl_ordersInFile')?></b>
                </li>
            </ul>
            <div class="row btnListOrders">
                <div class="col-lg-3 col-md-3 col-sm-3 checkAllConfirm alignItem">
                    <!-- <div class=" txtStep col-lg-6 col-md-6 col-sm-12"> -->
                        <label for="checkAllCustom"
                            class="lblCheckAllCustom fz13">   
                        <input class="checkAllCustom frm-check" id="checkAllCustom" checked="checked" value="all-order"
                            name="check[]" type="checkbox">
                        <span><?=lang('Label.lbl_selectAll')?></span>
                        </label>
                    <!-- </div> -->
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <div class="row">
                        <div class=" txtStep col-lg-4 col-md-4 col-sm-4">
                            <a href="<?php echo base_url('/tao-don-nhanh'); ?>">
                                <button type="button" class="tabClassify"> <?=lang('Label.lbl_dowloadOrders')?>
                                </button></a>
                        </div>
                        <div class=" txtStep col-lg-4 col-md-4 col-sm-4">
                            <button class="tabClassify" type="button" id="ve-mac-dinh"
                                <?= (count($dataParamErrors) >0) ? 'onclick="exportExcelErrorFiles()"' : '' ?>><?=lang('Label.lbl_txtDownloadOrderWrongFile') . ' (' . count($dataParamErrors) . ')'?></button>
                        </div>
                        <div class=" txtStep col-lg-4 col-md-4 col-sm-4">
                            <button class="btnPricing" name="pricing" type="submit"
                                value="pricing"><?=lang('Label.lbl_txtCreateOrderFile')?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
if (isset($dataParams) && !empty($dataParams)) {
    $i = 1;
    foreach ($dataParams as $key => $value):
        if (!empty($value->fees)):
            $value = (array) $value;
            $index = $key + 1;
            $indexAddress = $key;
            // lay danh sach quan huyen theo tinh thanh
            $dataDistrict = $dataDistricts[$key];
            // lay danh sach phuong xa theo quan huyen
            $dataWard = $dataWards[$key];

            ?>
        <div class="qo-dgh-1 tltReceiver confirm-order-file" style="margin-top: 15px;">
            <div class="qo-dgh-tt-1 wq123 row">
                <div class="col-lg-9 col-md-9 col-sm-9 tltDelivery">
                    <label>
                        <input class="checkSingleCustom frm-check" name="check[]" value="<?=$index?>" checked="checked"
                            type="checkbox"><span></span>
                    </label>
                    <input type="hidden" name="index" value="<?=$index?>">
                    <span class="or-dgh-icon-1"><?=$i;?></span> <span class="fz13"
                        style="color: #2DB1DB;"><?=lang('Label.lbl_orderReceiver')?></span>
                </div>
                <!-- <div class="col-lg-3 col-md-3 col-sm-3" style="text-align: right;"> -->
                <!-- <span class="qo-xdg fz13"><?php //lang('Label.lbl_deleteIntersection') ?></span> <img
				                    src="<?php //echo base_url('public/images/iconTrash.png');?>" class="qo-xdg-img"> -->
                <!-- </div> -->
            </div>
            <div class="qo-ttgh-1 row mg0 pt-0">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <input name="receiverIndex_<?=$index?>" type="hidden" class="qo-ttgh-1-sl" name=""
                        value="<?=$index?>">
                    <input type="text" class="qo-ttgh-1-sl receiverAddress_<?=$index?>" disabled
                        onchange="changeReceiverAddress(<?=$index?>)" name="" value="<?=$value['receiverAddress']?>">
                    <input type="hidden" name="receiverAddress_<?=$index?>" value="<?=$value['receiverAddress']?>">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pr-0">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cpdw">
                            <select name="receiverProvinceCode_<?=$index?>" disabled
                                onchange="changeProvinceAddress(<?=$index?>)" id="pickProvince_<?=$index?>"
                                class="form-control frm-lg pickProvince chosen-select order_province_code_from ">
                                <option value="0"><?=lang('Label.lbl_orderWareHouseProvince');?></option>
                                <?php foreach ($dataProvinces as $province): ?>
                                <option <?=($value['receiverProvinceCode'] == $province['code']) ? 'selected' : ''?>
                                    value="<?=$province['code'];?>"> <?=$province['name'];?>
                                </option>
                                <?php endforeach;?>
                            </select>
                            <input type="hidden" name="receiverProvinceCode_<?=$index?>"
                                value="<?=$value['receiverProvinceCode']?>">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cpdw">
                            <select name="receiverDistrictCode_<?=$index?>" disabled
                                onchange="changeDistrictAddress(<?=$index?>)" id="pickDistrict_<?=$index?>"
                                class="form-control pickDistrict frm-lg chosen-select order_district_code_from ">
                                <option value=""><?=lang('Label.lbl_orderWareHouseDistrict');?></option>
                                <?php
    if (!empty($dataDistrict)) {
            foreach ($dataDistrict as $district): ?>
                                <option <?=($value['receiverDistrictCode'] == $district['code']) ? 'selected' : ''?>
                                    value="<?=$district['code'];?>"> <?=$district['name'];?>
                                    <?php endforeach;
    }
    ?>
                            </select>
                            <input type="hidden" name="receiverDistrictCode_<?=$index?>"
                                value="<?=$value['receiverDistrictCode']?>">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cpdw">
                            <select name="receiverWardCode_<?=$index?>" disabled id="pickWard_<?=$index?>"
                                class="form-control frm-lg pickWard chosen-select order_ward_code_from "
                                onchange="reCaculateFees(<?=$key?>, <?=$index?>)">
                                <option value=""><?=lang('Label.lbl_orderWareHouseWard');?></option>
                                <?php
if (!empty($dataWard)) {
        foreach ($dataWard as $ward): ?>
                                <option <?=($value['receiverWardCode'] == $ward['code']) ? 'selected' : ''?>
                                    value="<?=$ward['code'];?>"> <?=$ward['name'];?>
                                    <?php endforeach;
    }
    ?>
                            </select>
                            <input type="hidden" name="receiverWardCode_<?=$index?>"
                                value="<?=$value['receiverWardCode']?>">
                        </div>
                        <input type="hidden" class="province_find_pro_<?=$index?>" value="">
                        <input type="hidden" class="district_find_pro_<?=$index?>" value="">
                        <input type="hidden" class="wards_find_pro_<?=$index?>" value="">
                    </div>
                </div>
            </div>
            <!-- ===========Đơn hàng thứ nhất============== -->
            <div class="or-ttng mg0 w100">
                <div class="row infoItems">

                    <div class=" col-lg-3 col-md-3 col-sm-12 col-xs-12 senderItems" style="position: relative;">
                        <span class="or-dh-stt"
                            style="background: #8D869D;position: absolute; line-height:12px;"><?=$receiverIndex?></span>
                        <ul style="padding: 0px 20px;">
                            <li class="fz13">
                                <span class="or-dgh-icon-2"></span> <?=$value['receiverPhone']?> <img
                                    src="<?php echo base_url('public/images/antoan.svg'); ?>" class="tdn-btn-downx">
                            </li>
                            <li class="fz13" style="color:#68656D"> <?=$value['receiverName']?></li>
                            <input type="hidden" name="receiverPhone_<?=$index?>" value="<?=$value['receiverPhone']?>">
                            <input type="hidden" name="receiverName_<?=$index?>" value="<?=$value['receiverName']?>">
                        </ul>
                    </div>

                    <div class=" col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <?php
$totalCODItem = 0;
    $totalValue = 0;
    $items = $value['products'];
    foreach ($items as $keyItem => $item):
        $keyProduct = $keyItem + 1;

        $totalCODItem += ($item->cod * $item->quantity);
        $totalValue += ($item->productValue * $item->quantity);
        ?>
                        <div class="row itemDetail">
                            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 fz13">
                                <strong><?=$item->productName?></strong>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-2 col-xs-6 fz13">
                                <?=lang('Label.lbl_detailQuantity')?>: <span
                                    class="colorPurple"><?=($item->quantity) ? $item->quantity : '1'?></span>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-3 col-xs-6 fz13">
                                <?=lang('Label.lbl_detailCOD')?>: <span
                                    class="colorOrange"><?=number_format($item->cod * $item->quantity)?></span> đ
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-3 col-xs-6 fz13">
                                <?=lang('Label.lbl_detailProductValue')?>:
                                <span><?=number_format($item->productValue * $item->quantity)?></span> đ
                            </div>
                        </div>
                        <input type="hidden" name="productName_<?=$index . '_' . $keyProduct?>"
                            value="<?=$item->productName?>">
                        <input type="hidden" name="quantity_<?=$index . '_' . $keyProduct?>"
                            value="<?=($item->quantity) ? $item->quantity : '1'?>">
                        <input type="hidden" name="cod_<?=$index . '_' . $keyProduct?>" value="<?=$item->cod?>">
                        <input type="hidden" name="productValue_<?=$index . '_' . $keyProduct?>"
                            value="<?=$item->productValue?>">
                        <input type="hidden" name="productCate_<?=$index . '_' . $keyProduct?>"
                            value="<?=$item->productCateId?>">

                        <?php endforeach;?>
                    </div>
                    <input type="hidden" name="itemIndex_<?=$index?>" value="<?=count($items)?>">
                    <!-- <div class=" col-lg-1 col-md-1 col-sm-12 col-xs-12 fedit">
                    <span class="">
                        <img src="<?php //echo base_url('public/images/edit.png');?>"
                            onclick="editOrders('chinhsua3','qo-ed-7')" id="qo-ed-7" class="tdn-btn-downx">
                    </span>
                </div> -->
                </div>
                <div class="row info-donhang" id="info-donhang-<?=$key?>">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <ul class="">
                            <li>
                                <?=lang('Label.lbl_txtSizeDetailOrders')?>: <span class="colorPurple">
                                    <?=$value['length'] . ' x ' . $value['width'] . ' x ' . $value['height']?> </span>cm
                            </li>
                            <li>
                                <?=lang('Label.lbl_txtWeightDetailOrders')?>: <span class="colorPurple">
                                    <?=number_format($value['weight'], 0, "", ".")?></span> gram
                            </li>
                            <li>
                                <?=lang('Label.lbl_txtReceivingTimeDetailOrders')?>: <span class="colorPurple"></span>
                            </li>
                            <li>
                                <?=lang('Label.lbl_txtExtraNote')?>: <span
                                    class="colorPurple"><?=$value['note']?></span>
                            </li>
                        </ul>

                    </div>
                    <div class="col-lg-6 col-md-5 col-sm-6 col-xs-12">
                        <ul class="">
                            <li>
                                <?=lang('Label.lbl_txtPayerFee')?>:
                                <span
                                    class="colorPurple"><?=($value['orderPayment'] == 1) ? lang('Label.lbl_txtPayerFeeSender') : lang('Label.lbl_txtPayerFeeReceiver');?></span>
                            </li>
                            <li>
                                <?=lang('Label.lbl_txtPartialDelivery')?>:
                                <span
                                    class="colorPurple"><?=($value['partialDelivery'] == 1) ? lang('Label.lbl_txtPartialDeliveryYes') : lang('Label.lbl_txtPartialDeliveryNo');?></span>
                            </li>
                            <li>
                                <?=lang('Label.lbl_txtIsReturn')?>:
                                <span
                                    class="colorPurple"><?=($value['isReturn'] == 1) ? lang('Label.lbl_txtPartialDeliveryYes') : lang('Label.lbl_txtPartialDeliveryNo');?></span>
                            </li>
                            <li>
                                <?=lang('Label.lbl_txtPickupType')?>:
                                <span class="colorPurple">
                                    <?=($value['pickupType'] == 1) ? lang('Label.lbl_txtPartialDeliveryYes') : lang('Label.lbl_txtPartialDeliveryNo')?>
                                </span>
                            </li>
                            <li>
                                <?=lang('Label.lbl_txtNoteRequired')?>: <span
                                    class="colorPurple"><?=isset($requiredNoteArr[$value['requireNote']]) ? $requiredNoteArr[$value['requireNote']] : ''?></span>
                            </li>
                        </ul>

                    </div>


                    <input type="hidden" name="length_<?=$index?>" value="<?=$value['length']?>">
                    <input type="hidden" name="width_<?=$index?>" value="<?=$value['width']?>">
                    <input type="hidden" name="height_<?=$index?>" value="<?=$value['height']?>">
                    <input type="hidden" name="weight_<?=$index?>" value="<?=$value['weight']?>">
                    <input type="hidden" name="note_<?=$index?>" value="<?=$value['note']?>">
                    <input type="hidden" name="shopOrderId_<?=$index?>" value="<?=$value['shopOrderId']?>">
                    <input type="hidden" name="discountCoupon_<?=$index?>" value="<?=$value['discountCoupon']?>">
                    <input type="hidden" name="requireNote_<?=$index?>" value="<?=$value['requireNote']?>">
                    <input type="hidden" name="paymentType_<?=$index?>" value="<?=$value['paymentType']?>">
                    <input type="hidden" name="pickupType_<?=$index?>" value="<?=$value['pickupType']?>">
                    <input type="hidden" name="orderPayment_<?=$index?>" value="<?=$value['orderPayment']?>">
                    <input type="hidden" name="partialDelivery_<?=$index?>" value="<?=$value['partialDelivery']?>">
                    <input type="hidden" name="isReturn_<?=$index?>" value="<?=$value['isReturn']?>">
                    <input type="hidden" name="isPorter_<?=$index?>" value="<?=$value['isPorter']?>">
                    <input type="hidden" name="isDoorDeliver_<?=$index?>" value="<?=$value['isDoorDeliver']?>">

                    <!-- =========== Hết đơn hàng thứ nhất============== -->
                </div>

                <!-- ============HẾT ĐƠN THỨ 2============ -->

                <div class="col-12 qo-duong-ke"></div>

                <!-- Chọn phương thức thành toán -->
                <div class="row listPack">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 qo-ttdh-1">
                        <div class="row listPackages">
                            <div class="col-12">
                                <select name="paymentType_<?=$index?>" class="chosen-select w100"
                                    style="padding-left: 4%;">

                                    <!-- <option <?=($value['paymentType'] == '') ? 'selected' : ''?> value="">
                                        <?php //echo lang('Label.lbl_txtPaymentType') ?></option>
                                    <option <?=($value['paymentType'] == 1) ? 'selected' : ''?> value="1">
                                        <?php //echo lang('Label.lbl_txtPaymentTypeCash') ?></option> -->
                                    <option <?=($value['paymentType'] == 2) ? 'selected' : ''?> value="2">
                                        <?php echo lang('Label.lbl_txtPaymentTypeHolaWallet') ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Chọn mã giảm giá -->
                <div class="row listPack">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 qo-ttdh-1">
                        <div class="row listPackages">
                            <div class="col-12">

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chọn gói cước -->
                <div class="row listPack alignItem">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 qo-ttdh-1">
                        <div class="row listPackages">
                            <div class="col-1">
                                <img class="" src="<?php echo base_url('public/images/Time.png'); ?>">
                            </div>
                            <div class="col-8">
                                <select name="packageShip_<?php echo $index ?>" onchange="changeFees(<?=$key?>)"
                                    class="chosen-select w100 reChangeFee_<?php echo $key ?>" style="padding-left: 4%;">
                                    <?php
                                        $dataFees = $value['fees'];
                                            if (!empty($dataFees)) {
                                                foreach ($dataFees as $fee):
                                                    if(in_array($dataUser->username,$dataAccountTest) && in_array($fee->packageCode,$dataPackCodeTest) ){
                                    ?>
                                    <option value="<?php echo $fee->packageCode ?>">
                                        <?php echo $fee->packageName . ' - ' . $fee->packageCode ?></option>
                                    <?php } 
                                            if(!in_array($fee->packageCode,$dataPackCodeTest)){ ?>
                                            <option value="<?php echo $fee->packageCode ?>">
                                        <?php echo $fee->packageName . ' - ' . $fee->packageCode ?></option>

                                             <?php } endforeach;} else {?>
                                    <option value="0"><?php echo 'Nothing' ?></option>
                                    <?php }?>

                                </select>
                            </div>
                            <div class="col-1">
                                <img class="" src="<?php echo base_url('public/images/Info.png'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-6 col-xs-6 listCost">
                        <div class="row ">
                            <?php
                                $dataFees = $value['fees'][0];
                            ?>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <span class="fz13">
                                    <?php
                                        $totalreceiver = 0;
                                            if ($value['orderPayment'] == 1) {
                                                $totalreceiver = $totalCODItem;
                                                // $dataFees->totalFee = 0;
                                            } else {
                                                $totalreceiver = $dataFees->totalFee + $totalCODItem;
                                            }
                                        ?>
                                    <?php echo lang('Label.lbl_txtTotalFeeReceiver') . ': <span class="colorPurple changeTotalFee_' . $key . '"> ' . number_format($totalreceiver) . '</span> đ' ?>
                                </span>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <span class="fz13">
                                    <?php echo lang('Label.lbl_detailProductValue') . ': <span class="colorPurple changeValueFee_' . $key . '"> ' . number_format($totalValue) . '</span> đ' ?>
                                </span>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <span class="fz13">
                                    <?php echo lang('Label.lbl_txtCODDetailOrders') . ': <span class="colorOrange changeCodFee_' . $key . '"> ' . number_format($totalCODItem) . '</span> đ' ?>
                                </span>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <span class="fz13">
                                    <?php echo lang('Label.lbl_txtTotalFee') . ': <span class="colorPurple changeFee_' . $key . '"> ' . number_format($dataFees->totalFee) . '</span> đ' ?>
                                </span>
                                <img src="<?php echo base_url('public/images/Info.svg'); ?>" alt=""
                                    style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1 cursorPointer"
                                    data-toggle="modal" data-target="#myModal_<?=$key?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
if (!empty($value['fees'])) {
        foreach ($value['fees'] as $fee):
        ?>
        <div class="modal" id="myModal_<?=$key?>">
            <div class="modal-dialog">
                <div class="modal-content" style="margin-top: 17%;    ">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" style="margin: 0px auto;">
                            <b><?=lang('Label.lbl_feeInfo')?></b>
                        </h4>
                        <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">

                        <?php
$totalFeesDetail = 0;
        $arrDetailFees = $valueOrderDetail->detailFees;
        if (!empty($fee)) {
            ?>
                        <div class="row modal-body-content">

                            <?php
$feeDetail = $fee->feeDetail;
            if (!empty($feeDetail)):
                foreach ($feeDetail as $keyFee => $feeDetail):
                    if ($feeDetail != 0):
                    ?>
                            <div class="col-6">
                                <?=lang('Label.lbl_' . $keyFee)?>
                            </div>
                            <div class="col-6 textAlignRight">
                                <span class="<?=$keyFee . '_' . $key?> ">
                                    <?=number_format($feeDetail)?>đ
                                </span>
                            </div>
                            <?php endif;endforeach;endif;?>

                        </div>
                        <?php }?>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer text-center" style="margin: 0px auto;">
                        <?=lang('Label.lbl_txtTotalFee')?> :
                        <span class="totalFee_<?=$key?> " style="color: #885DE5;">
                            <?=' ' . number_format($fee->totalFee)?>
                            đ</span>
                    </div>
                </div>
            </div>
        </div>
        <?php
endforeach;
    }
    ?>
        <?php
//End if check fees
    endif;
    $i++;
    endforeach;
}
//End check dataParams
?>
        <!-- ================================END Điểm giao  2========= -->
        <div class="row btnListOrders mgt15">
            <div class="col-lg-3 col-md-3 col-sm-3 checkAllConfirm alignItem">
                <!-- <div class=" txtStep col-lg-6 col-md-6 col-sm-12"> -->
                    <label for="checkAllCustom" class="lblCheckAllCustom fz13">
                        <input class="checkAllCustom frm-check" id="checkAllCustom" checked="checked" value="all-order" name="check[]"
                            type="checkbox">
                        <span><?=lang('Label.lbl_selectAll')?></span>
                    </label>
                <!-- </div> -->
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9">
                <div class="row">
                    <div class=" txtStep col-lg-4 col-md-4 col-sm-4">
                        <a href="<?php echo base_url('/tao-don-nhanh'); ?>">
                            <button type="button" class="tabClassify"> <?=lang('Label.lbl_dowloadOrders')?>
                            </button></a>
                    </div>
                    <div class=" txtStep col-lg-4 col-md-4 col-sm-4"
                        <?= (count($dataParamErrors) >0) ? 'onclick="exportExcelErrorFiles()"' : '' ?>>
                        <button class="tabClassify" id="ve-mac-dinh"
                            type="button"><?=lang('Label.lbl_txtDownloadOrderWrongFile') . ' (' . count($dataParamErrors) . ')'?></button>
                    </div>
                    <div class=" txtStep col-lg-4 col-md-4 col-sm-4">
                        <button class="btnPricing" name="pricing" type="submit"
                            value="pricing"><?=lang('Label.lbl_txtCreateOrderFile')?></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
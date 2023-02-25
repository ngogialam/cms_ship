<section id="orders">
    <div class="warehouse-banner-title row">
        <ul class="col-md-3" style="margin-bottom: 9px;">
            <li><img src="<?php echo base_url('public/images/Home.png');?>" alt=""></li>
            <li class="mt2-config title-page">
                ><span> <?= lang('Label.lbl_order') ?> </span>> <span><?php echo $title ?></span></li>
        </ul>
        <div class="col-md-6 row ml-0 menu-header-order">
            <div class="col-sm-4 pl-0 back-choose-packet">
                <a href="<?php echo base_url('/tao-don-le');?>">
                    <ul class="or-banner1 ol-0">
                        <li style="background: #2DB1DB!important;color: white!important;line-height: 20px;">1</li>
                        <li style="color: #2DB1DB!important;" class="or-cgc-1"><?=$dataOrders->packName;?></li>
                    </ul>
                </a>
            </div>
            <div class=" col-sm-4  pl-0">
                <ul class="or-banner">
                    <li>2</li>
                    <li class="or-cgc-1 "><?= lang('Label.lbl_setInfo'); ?></li>
                </ul>
            </div>
            <div class="col-sm-4  pl-0">
                <ul class="or-banner1">
                    <li style="line-height: 20px;">3</li>
                    <li class="or-cgc-1"><?= lang('Label.lbl_confirmOrder'); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <input type="hidden" name="packCode" value="<?= $packCode ?>">
    <input type="hidden" name="packType" value="<?= $packType ?>">
    <input type="hidden" name="orderId" class="orderId" value="<?= $orderId ?>">
    <div class="d-flex main-orders">
        <div class="line-left-orders">
            <div>
                <img src="<?php echo base_url('public/images/Polygon8.png');?>" alt="">
            </div>
        </div>
        <div class="w100">
            <!-- Start Sender Infomation -->
            <div class="or-ttng row ">
                <ul class="col-sm-6 mb-0">
                    <li><b><?= lang('Label.lbl_txtInfoSender') ?></b></li>
                </ul>
                <!-- Choose old pickupAddress -->
                <ul class="col-sm-6 ordersDetail-ttng-select mb-0">
                    <li style="height: 30px;" class="float-right">
                        <div class="dropdown orDetail-select-address ">
                            <input class="dropdown-toggle choosePickUpAddress" type="button" id="dropdownMenuButton"
                                pickupAddressId="<?=($dataOrders->pickupAddressId)?>" data-toggle="dropdown"
                                value="<?=($dataOrders->pickupAddressId)? $dataPickup->name : lang('Label.lbl_createNewWareHouse') ?>" />
                            <input type="hidden" class="pickupAddressId" value="" name="pickupAddressId">
                            <img src="<?php echo base_url('public/images/iconDownX.png');?>" alt="">
                            <div class="dropdown-menu choosenPickup" aria-labelledby="dropdownMenuButton">
                                <div class="dropdown-item pl-0 orDetail-data-select" href="#"
                                    style="padding-left: 21px!important;" 
                                    <?php if($dataOrders->packType == 2){ ?>
                                        onclick="choosePickupAddress(0, 1)"
                                    <?php }else{ ?> 
                                        onclick="choosePickupAddress(0)"
                                    <?php } ?>
                                        >
                                    <img src="<?php echo base_url('public/images/add.png');?>" alt="">
                                    <span
                                        style="color: #885DE5;font-size: 14px; padding-left: 4px;"><?= lang('Label.lbl_newAddress') ?></span>
                                </div>
                                <?php foreach($pickupAddress as $warehouse): 
                                    if($warehouse->status == 1){ ?>
                                <div class="dropdown-item pl-0  orDetail-data-select" href="#"
                                    style="padding-left: 21px!important;"
                                    <?php if($dataOrders->packType == 2){ ?>
                                        onclick="choosePickupAddress(<?= $warehouse->id ?>, 1)"
                                    <?php }else{ ?> 
                                        onclick="choosePickupAddress(<?= $warehouse->id ?>)"
                                    <?php } ?>
                                    >
                                    <span style="color: #28262B;font-size: 14px;"><?= $warehouse->name ?></span>
                                    <br>
                                    <span style="color: #68656D;font-size: 12px;">
                                        <?php
                                            echo ($warehouse->address) ? $warehouse->address .', ' : '' ;
                                            echo ($warehouse->wardName) ? $warehouse->wardName .', ' : '' ;
                                            echo ($warehouse->districtName) ? $warehouse->districtName .', ' : '' ;
                                            echo ($warehouse->provinceName) ? $warehouse->provinceName  : '' ;
                                        ?>
                                    </span>
                                </div>
                                <?php } endforeach; ?>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- End choose old pickupAddress -->
                <!-- choose pickupAddress -->
                <div class="row pickInput"
                    <?=($dataOrders->pickupAddressId)? 'style="display: none"' : 'style="display: flex"'?>>
                    <ul class="col-sm-6 orDetail-input">
                        <!-- Tên người gửi -->
                        <li>
                            <?= lang('Label.lbl_txtNamePickup') ?><span style="color: #885DE5;"> *</span>
                        </li>
                        <li>
                            <input type="text" class="pickName" name="pickName" value="<?=$dataOrders->pickName?>"
                                placeholder="<?= lang('Label.lbl_txtNamePickup') ?>">
                            <span class=" err_messages err_pickName"><?php echo $getErrors['pickName']; ?></span>
                        </li>
                    </ul>
                    <ul class="col-sm-6 orDetail-input">
                        <li>
                            <?= lang('Label.phone') ?><span style="color: #885DE5;"> *</span>
                        </li>
                        <li>
                            <!-- SĐT người gửi -->
                            <input type="text" class="pickPhone" name="pickPhone" onkeypress="return isNumber(event)"
                                value="<?=$dataOrders->pickPhone?>" placeholder="<?= lang('Label.ph_phone') ?>">
                            <span class=" err_messages err_pickPhone"><?php echo $getErrors['pickPhone']; ?></span>
                        </li>
                    </ul>
                    <ul class="col-sm-6 orDetail-input">
                        <!-- địa chỉ chi tiết -->
                        <li>
                            <?= lang('Label.lbl_senderAddress') ?><span style="color: #885DE5;"> *</span>
                        </li>
                        <li>
                            <input type="text" name="pickAddress" class="pickAddress"
                                value="<?=$dataOrders->pickAddress?>"
                                placeholder="<?= lang('Label.lbl_inputDetailAddress') ?>">
                            <span class=" err_messages err_pickAddress">
                            </span>
                        </li>
                    </ul>
                    <ul class="col-sm-6 row orDetail-input pr-0" style="padding-top: 24px;">
                        <!-- Tỉnh thành -->
                        <li class="col-md-4 mb-2 pr-0">
                            <select name="pickProvince" id="pickProvince"
                                class="form-control frm-lg pickProvince chosen-select province_code_from ">
                                <option value="0"><?= lang('Label.lbl_orderWareHouseProvince'); ?></option>
                                <?php foreach($dataProvinces as $province): ?>
                                <option value="<?= $province['code']; ?>"
                                    <?= ($dataOrders->pickProvince == $province['code'] ) ?'selected' : '' ?>>
                                    <?= $province['name']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <input type="hidden" name="district_find_pro" id="district_find_pro"
                                class="district_find_pro " value="<?=$dataOrders->pickDistrict?>" />
                            <input type="hidden" name="wards_find_pro" id="wards_find_pro" class="wards_find_pro"
                                value="<?=$dataOrders->pickWard?>" />
                            <span class=" err_messages err_pickProvince"><?php echo $getErrors['pickProvince']; ?>
                            </span>
                        </li>
                        <!-- Quận huyện -->
                        <li class="col-md-4 mb-2 pr-0">
                            <select name="pickDistrict" id="pickDistrict"
                                class="form-control pickDistrict frm-lg chosen-select district_code_from ">
                                <option value=""><?= lang('Label.lbl_orderWareHouseDistrict'); ?></option>
                                <?php
                                    if(!empty($dataPickDistricts)){
                                        foreach($dataPickDistricts as $district): ?>
                                <option value="<?= $district['code']; ?>"
                                    <?= ($dataOrders->pickDistrict == $district['code'] ) ?'selected' : '' ?>>
                                    <?= $district['name']; ?>
                                    <?php endforeach;
                                    }
                                ?>
                            </select>
                            <span
                                class=" err_messages err_pickDistrict"><?php echo $getErrors['pickDistrict']; ?></span>
                        </li>
                        <!-- Phường xã -->
                        <li class="col-md-4 mb-2 pr-0">
                            <select name="pickWard" id="pickWard"
                                class="form-control frm-lg pickWard chosen-select ward_code_from ">
                                <option value=""><?= lang('Label.lbl_orderWareHouseWard'); ?></option>
                                <?php
                                    if(!empty($dataPickWards)){
                                        foreach($dataPickWards as $ward): ?>
                                <option value="<?= $ward['code']; ?>"
                                    <?= ($dataOrders->pickWard == $ward['code'] ) ?'selected' : '' ?>>
                                    <?= $ward['name']; ?>
                                    <?php endforeach;
                                    }
                                ?>
                            </select>
                            <span class=" err_messages err_pickWard"><?php echo $getErrors['pickWard']; ?></span>
                        </li>
                    </ul>
                </div>
                <!-- End choose pickupAddress -->

                <!-- RENDER if choose pickup -->
                <div class="row senderInfo"
                    <?=($dataOrders->pickupAddressId)? 'style="display: flex"' : 'style="display: none"'?>>
                    <ul class="col-sm-4  mb-0 orDetail-input-show" style="display: flex">
                        <li><img src="<?php echo base_url("public/images/wh-kh1a.png")?>" alt=""></li>
                        <li class="orDetail-ttng-info "><?=($dataPickup->name)? $dataPickup->name : ''?></li>
                    </ul>
                    <ul class="col-sm-4 mb-0 orDetail-input-show" style="display: flex">
                        <li><img src="<?php echo base_url("public/images/wh-kh1b.png")?>" alt=""></li>
                        <li class="orDetail-ttng-info"><?=($dataPickup->senderName)? $dataPickup->senderName : ''?></li>
                    </ul>
                    <ul class="col-sm-4  mb-0 orDetail-input-show" style="display: flex">
                        <li><img src="<?php echo base_url("public/images/wh-kh1c.png")?>" alt=""></li>
                        <li class="orDetail-ttng-info"><?=($dataPickup->phone)? $dataPickup->phone : ''?></li>
                    </ul>
                    <ul class="col-sm-12  mb-0 orDetail-input-show" style="display: flex">
                        <li style="margin-left: -2px;"><img src="<?php echo base_url("public/images/wh-kh1d.png")?>"
                                alt=""></li>
                        <?php $full = $dataPickup->address .', '. $dataPickup->wardName .', '. $dataPickup->districtName .', '. $dataPickup->provinceName; ?>
                        <li class="orDetail-ttng-info"><?=($full)? $full : ''?></li>
                    </ul>
                </div>
                <!-- Show Address -->
            </div>
            <!-- End Sender Infomation -->
            <!-- Order detail -->
            <div class="ttdh-main" id="OrderSingle">
                <!-- Delivery Point -->
                <?php $points = $dataOrders->deliveryPoint; 
                if (!empty($points)) {
                    $totalPoints = count($points);
                    foreach ($points as $keyPoints => $point) { ?>
                <div id="point_<?= $point->deliveryPointIndex ?>">
                    <div class="or-dgh-1 pb-3 w-100 " style="margin-left: -40px;">
                        <span class="or-dh-stt "
                            style="background-color: #2DB1DB;padding: 2px 7px"><?= $point->deliveryPointIndex ?></span>
                        <?= lang('Label.lbl_orderReceiver') ?>
                        <span class="removeDeliveryPoint d-flex removeDeliveryPoint_<?= $point->deliveryPointIndex ?>"
                            onclick="removeDeliveryPointConfirm(<?= $point->deliveryPointIndex ?>, 1)">
                            <span class="mr-1"><?= lang('Label.lbl_removeDeliveryPoint') ?></span>
                            <img src="<?php echo base_url("public/images/delete.svg")?>" alt="">
                        </span>
                    </div>
                    <div class="or-ttdh row mb-0 pb-0 mt-0">
                        <!-- Address Points -->
                        <div class="row w100 col-12 ml-0 p-0">
                            <!-- Địa chỉ người nhận -->
                            <ul class="or-dgh col-sm-6 mb-0">
                                <li class="or-dgh-2">
                                    <input name="pointAddress" type="text"
                                        class="pointAddress address_<?= $point->deliveryPointIndex ?>"
                                        onkeyup="keyUpAddress(<?php echo $point->deliveryPointIndex ?>)" autocomplete="off"
                                        onblur="addAddressDetail(<?= $point->deliveryPointIndex ?>)"
                                        <?php if($dataOrders->packType == 2){ ?>
                                        onchange="updateAddressDetail(<?= $point->deliveryPointIndex?>)"
                                        <?php } ?>
                                        deliveryPointIndex="<?= $point->deliveryPointIndex ?>"
                                        value="<?= $point->deliveryAddress ?>"
                                        placeholder="<?= lang('Label.lbl_orderAddressReceiver'); ?>">
                                    <span class=" err_messages err_address_<?= $point->deliveryPointIndex ?>"></span>
                                    <div class="dropdown-menu suggestAddress suggestAddress-<?php echo $point->deliveryPointIndex ?>" >
                                                
                                    </div>
                                    <input type="hidden" class="suggestionAddressDetail-<?= $point->deliveryPointIndex ?>" value="" />
                                </li>
                            </ul>
                            <!-- Change Province -->
                            <ul class="col-sm-6 row orDetail-input orderDetail-chosen pr-0 orderDetail_<?= $point->deliveryPointIndex ?> <?= $point->deliveryAddress ? 'address_show' : 'address_v2'; ?>"
                                style="padding-top: 15px; margin-bottom: 0px;">
                                <!-- Receiver province -->
                                <li class="col-md-4 pr-0 provinceReceiver_<?= $point->deliveryPointIndex?>">
                                    <select name="pointProvice" index_prov="<?= $point->deliveryPointIndex ?>"
                                        id="provinceReceiver_<?= $point->deliveryPointIndex?>"
                                        auto_change='1'
                                        class="form-control frm-lg chosen-select order_province_code_from provinceReceiverChange_<?= $point->deliveryPointIndex?>">
                                        <option value="0"><?= lang('Label.lbl_orderWareHouseProvince'); ?></option>
                                        <?php foreach($dataProvinces as $province): ?>
                                        <option <?= ($point->deliveryPorvince == $province['code'] ) ?'selected' : '' ?>
                                            value="<?= $province['code']; ?>"> <?= $province['name']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <input type="hidden" class="province_find_pro_<?= $point->deliveryPointIndex?>">
                                    <input type="hidden" class="district_find_pro_<?= $point->deliveryPointIndex?>">
                                    <input type="hidden" class="wards_find_pro_<?= $point->deliveryPointIndex?>">
                                    <span
                                        class=" err_messages err_province_<?= $point->deliveryPointIndex?>"><?php echo $getErrors['province']; ?></span>
                                </li>
                                <!-- Receiver district -->
                                <li class="col-md-4 pr-0 districtReceiver_<?= $point->deliveryPointIndex ?>">
                                    <select name="pointDistrict" index_dict="<?= $point->deliveryPointIndex ?>"
                                        placeholder="" id="districtReceiver_<?= $point->deliveryPointIndex?>"
                                        auto_change='1'
                                        class="form-control frm-lg chosen-select order_district_code_from districtChangeReceiver_<?= $point->deliveryPointIndex?>">
                                        <option value="0"><?= lang('Label.lbl_orderWareHouseDistrict'); ?></option>
                                        <?php
                                                    $dataPickDistricts = $singleOrderModel->getDistrict($point->deliveryPorvince,$point->deliveryDistrict);
                                                    if(!empty($dataPickDistricts)){
                                                        foreach($dataPickDistricts as $district): ?>
                                        <option <?= ($point->deliveryDistrict == $district['code'] ) ?'selected' : '' ?>
                                            value="<?= $district['code']; ?>"> <?= $district['name']; ?>
                                            <?php endforeach;
                                                    }
                                                ?>
                                    </select>
                                    <span
                                        class=" err_messages err_district_<?= $point->deliveryPointIndex?>"><?php echo $getErrors['district']; ?></span>
                                </li>
                                <!-- Receiver ward -->
                                <li class="col-md-4 pr-0 wardReceiver_<?= $point->deliveryPointIndex?>">
                                    <select name="pointWard" index_ward="<?= $point->deliveryPointIndex?>"
                                        id="wardReceiver_<?= $point->deliveryPointIndex?>"
                                        auto_change='1'
                                        <?php if($dataOrders->packType == 2){ ?>
                                        onchange="updateAddressDetail(<?= $point->deliveryPointIndex?>)"
                                        <?php } ?>
                                        class="form-control frm-lg chosen-select order_ward_code_from wardChangeReceiver_<?= $point->deliveryPointIndex?>">
                                        <option value="0"><?= lang('Label.lbl_orderWareHouseWard'); ?></option>
                                        <?php
                                                    $dataPickWards = $singleOrderModel->getWards($point->deliveryPorvince,$point->deliveryDistrict, $point->deliveryWard);
                                                    if(!empty($dataPickWards)){
                                                        foreach($dataPickWards as $ward): ?>
                                        <option <?= ($point->deliveryWard == $ward['code'] ) ?'selected' : '' ?>
                                            value="<?= $ward['code']; ?>"> <?= $ward['name']; ?>
                                            <?php endforeach;
                                                    }
                                                ?>
                                    </select>
                                    <span
                                        class=" err_messages err_ward_<?= $point->deliveryPointIndex ?>"><?php echo $getErrors['ward']; ?></span>
                                </li>
                                <span style="margin-left:10px;" class=" err_messages errAddressDetail_<?= $point->deliveryPointIndex ?>"></span>
                            </ul>
                        </div>

                        <!-- End Address Points -->
                        <!-- Receiver Info -->
                        <?php $receivers = $point->receivers; 
                            if(!empty($receivers)){
                                if($point->deliveryPointIndex < $totalPoints){ ?>
                                    <!-- Success Receiver -->
                                    <div class="or-ttng receiverInfo row w100 afOrder_<?= $point->deliveryPointIndex ?>">
                                        <?php foreach ($receivers as $keyReceivers => $receiver){ 
                                            ?>
                                        <div
                                            class="row w100 successReceiver afOrder_<?= $point->deliveryPointIndex .'_'. $receiver->receiverIndex ?>">
                                            <div class=" col-lg-3 col-md-12 senderItems" style="position: relative;">
                                                <span
                                                    class="or-dh-stt success_receiverIndex_<?= $point->deliveryPointIndex .'_'.$receiver->receiverIndex ?>"><?= $receiver->receiverIndex ?></span>
                                                <ul style="padding: 0px 40px;">
                                                    <li
                                                        class="fz13 success_receiverPhone_<?= $point->deliveryPointIndex .'_'.$receiver->receiverIndex ?>">
                                                        <?= $receiver->receiverPhone ?></li>
                                                    <li class="fz13 success_receiverName_<?= $point->deliveryPointIndex .'_'.$receiver->receiverIndex ?>"
                                                        style="color:#68656D"><?= $receiver->receiverName ?></li>
                                                </ul>
                                            </div>
                                            <div class=" col-lg-8 col-md-12">
                                                <?php $items = $receiver->items;
                                                                        foreach($items as $keyItem => $item):
                                                                    ?>
                                                <div class="row">
                                                    <div
                                                        class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13 success_receiverItem_productName_<?= $point->deliveryPointIndex ?>_<?= $receiver->receiverIndex ?>_<?= $item->productIndex ?>">
                                                        <span><?= $item->productName ?></span>
                                                    </div>
                                                    <div
                                                        class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13 success_receiverItem_productQuantity_<?= $point->deliveryPointIndex ?>_<?= $receiver->receiverIndex ?>_<?= $item->productIndex ?>">
                                                        <?= lang('Label.lbl_detailQuantity') ?>: <span
                                                            class="colorPurple"><?= number_format($item->productQuantity) ?></span>
                                                    </div>
                                                    <div
                                                        class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13 success_receiverItem_productCod_<?= $point->deliveryPointIndex ?>_<?= $receiver->receiverIndex ?>_<?= $item->productIndex ?>">
                                                        <?= lang('Label.lbl_detailCOD') ?>: <span
                                                            class="colorOrange"><?= number_format($item->productQuantity * $item->productCOD) ?></span>
                                                        đ
                                                    </div>
                                                    <div
                                                        class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13 success_receiverItem_productValue_<?= $point->deliveryPointIndex ?>_<?= $receiver->receiverIndex ?>_<?= $item->productIndex ?>">
                                                        <?= lang('Label.lbl_detailProductValue') ?>:
                                                        <?= number_format($item->productQuantity * $item->productValue) ?> đ</div>
                                                </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <div class=" col-lg-1 col-md-12 col-sm-6 col-xs-6 buttonItems">
                                                <span><img class="removeReceiver" src="/public/images/or-delete.png"
                                                        onclick="removeReceiverConfirm(<?= $point->deliveryPointIndex ?>, <?= $receiver->receiverIndex ?>)"></span>
                                                <span><img class="editReceiver 21323" src="/public/images/or-edit.png"
                                                        onclick="editReceiver(<?= $point->deliveryPointIndex ?>, <?= $receiver->receiverIndex ?>, 1)"></span>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <!-- Button Add Receiver -->
                                    <?php if($dataOrders->packType == 2){ ?>
                                    <div class="btn-add-orders">
                                        <button type="button" onclick="addReceiver(<?= $point->deliveryPointIndex ?>, <?= $point->receiverIndexNext - 1 ?>)"
                                            class="or-tctdn-btn addReceiver addReceiver_<?= $point->deliveryPointIndex ?>">
                                            <img src="<?php echo base_url('public/images/tdg2.png');?>" alt=""
                                                class="float-left pl-2">
                                            <?= lang('Label.lbl_addNewOrderReciver') ?>
                                        </button>
                                    </div>
                                    <?php } ?>
                                    <!-- End Button Add Receiver -->
                                    <!-- End Success Receiver -->
                                    <!-- Receiver From -->
                                    <div class="or-ttng row w100 form_receiverOrder_<?= $point->deliveryPointIndex ?> receiverOrder_<?= $point->deliveryPointIndex.'_'.$point->receiverIndexNext ?>"
                                        style="display: none;">
                                        <div class="chinhsua1 mb-1">
                                            <div id="orders"
                                                class="or-ttdh row qo-ttdhl receiver-<?= $point->deliveryPointIndex.'-'.$point->receiverIndexNext?>">
                                                <ul class="or-dgh col-12 mb-2">
                                                    <li class="or-dgh-1 pt-0 mt-0">
                                                        <span class="or-dh-stt form_receiverIndex "
                                                            style="background: #F0A616;"><?= $point->receiverIndexNext ?></span>
                                                        <span class="text_receiverIndex_<?= $point->receiverIndexNext ?>"
                                                            style="color: #68656D;"><?= lang('Label.lbl_addOrderDetail') ?></span>
                                                    </li>
                                                    <!-- Receiver Form Info -->
                                                    <li class="or-ttnh">
                                                        <ul>
                                                            <li class="or-ttnh-tt">
                                                                <?= lang('Label.lbl_txtReceiverInfo') ?>
                                                            </li>
                                                        </ul>
                                                        <ul class="row ">
                                                            <!-- receiver phone -->
                                                            <li class="col-md-3 col-sm-6 or-cgc-1">
                                                                <?= lang('Label.lbl_txtReceiverPhone') ?><span
                                                                    style="color: #885DE5;"> *</span> <br>
                                                                <input name="receiverPhone" type="text" value=""
                                                                    onkeypress="return isNumber(event)"
                                                                    onblur="ValidateReceiverPhone(<?= $point->deliveryPointIndex ?>, <?= $point->receiverIndexNext ?>)"
                                                                    class="receiverPhone receiverPhone_<?= $point->deliveryPointIndex.'_'.$point->receiverIndexNext ?>"
                                                                    placeholder="<?= lang('Label.ph_phone') ?>"><br>
                                                                <span
                                                                    class=" err_messages err_receiverPhone_<?= $point->deliveryPointIndex.'_'.$point->receiverIndexNext ?>">
                                                                </span>
                                                            </li>
                                                            <!-- receiver name -->
                                                            <li class="col-md-3 col-sm-6 or-cgc-1">
                                                                <?= lang('Label.lbl_txtReceiverName') ?><span
                                                                    style="color: #885DE5;"> *</span> <br>
                                                                <input name="receiverName" value="" type="text"
                                                                    onblur="ValidateReceiverName(<?= $point->deliveryPointIndex ?>, <?= $point->receiverIndexNext ?>)"
                                                                    class="receiverName unNumber receiverName_<?= $point->deliveryPointIndex.'_'.$point->receiverIndexNext ?>"
                                                                    placeholder="<?= lang('Label.lbl_txtReceiverName') ?>"><br>
                                                                <span
                                                                    class=" err_messages err_receiverName_<?= $point->deliveryPointIndex.'_'.$point->receiverIndexNext ?>">
                                                                </span>
                                                            </li>
                                                            <!-- expectDate -->
                                                            <li class="col-md-3 col-sm-6 or-cgc-1">
                                                                <?= lang('Label.lbl_txtReceiverDate') ?><br>
                                                                <input name="receiverExpectDate" type="text" value=""
                                                                    autocomplete="off"
                                                                    class="orderdatePicker receiverExpectDate pr-10 expectDate expectDate_<?= $point->deliveryPointIndex.'_'.$point->receiverIndexNext ?>">
                                                            </li>
                                                            <!-- expectTime -->
                                                            <li class="col-md-3 col-sm-6 or-cgc-1">
                                                                <?= lang('Label.lbl_txtReceiverTime') ?><br>
                                                                <input name="receiverExpectTime" value="" type="time"
                                                                    class="or-ttnh-input expectTime expectTime_<?= $point->deliveryPointIndex.'_'.$point->receiverIndexNext ?>">
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Receiver Form Info -->
                                                    <!-- Product Form Info -->

                                                    <li class="or-ttnh">
                                                        <ul>
                                                            <li class="or-ttnh-tt"><?= lang('Label.lbl_txtGoodInfo') ?></li>
                                                        </ul>
                                                        <!-- Product Success -->
                                                        <div style="width: 100%;"
                                                            class=" 123 ttsp productSuccess_<?= $point->deliveryPointIndex.'_'.$point->receiverIndexNext ?>"
                                                            id="ttsp_<?= $point->deliveryPointIndex.'_'.$point->receiverIndexNext ?>">
                                                        </div>
                                                        <!-- End Product Success -->
                                                        <!-- Product Form -->
                                                        <div class="btn-add-orders">
                                                            <button type="button" onclick="addProduct(<?= $point->deliveryPointIndex ?>, <?=$point->receiverIndexNext ?>)"
                                                                class="or-tctdn-btn addProduct addProduct_<?= $point->deliveryPointIndex.'_'.$point->receiverIndexNext ?> dpn">
                                                                <img src="<?php echo base_url('public/images/tdg2.png');?>" alt=""
                                                                    class="float-left pl-2 pr-2">
                                                                <?= lang('Label.lbl_addNewOrderProduct') ?>
                                                            </button>
                                                        </div>
                                                        <div class="product_form product_form_<?= $point->deliveryPointIndex.'_'.$point->receiverIndexNext ?>">
                                                            <ul class="row ">
                                                                <!-- product name -->
                                                                <li class="col-md-6 col-sm-12">
                                                                    <?= lang('Label.lbl_txtGoodName') ?><span
                                                                        style="color: #885DE5;">*</span> <br>
                                                                    <input name="productName" vallue="" type="text"
                                                                        placeholder="<?= lang('Label.lbl_inputGoodName') ?>"
                                                                        id="qo-tensp-ht"
                                                                        onblur="ValidateProductName(<?= $point->deliveryPointIndex ?>, <?= $point->receiverIndexNext ?>, 1)"
                                                                        class="productName productName_<?= $point->deliveryPointIndex.'_'.$point->receiverIndexNext.'_1' ?>">
                                                                    <span
                                                                        class=" err_messages err_productName err_productName_<?= $point->deliveryPointIndex.'_'.$point->receiverIndexNext.'_1' ?>"><?php echo $getErrors['productName']; ?></span>
                                                                </li>
                                                                <!-- product COD -->
                                                                <li class="col-md-3 col-sm-6"><?= lang('Label.lbl_txtCod') ?><span
                                                                        style="color: #885DE5;">*</span> <br>
                                                                    <input name="productCOD" value="0"
                                                                        onkeypress="return isNumber(event)" type="text"
                                                                        onblur="ValidateProductCOD(<?= $point->deliveryPointIndex ?>, <?= $point->receiverIndexNext ?>, 1)"
                                                                        class="or-cod productCOD receiverExpectDate productCOD_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext.'_1' ?>"
                                                                        id="qo-cod-ht"
                                                                        onkeyup="number_format('productCOD_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext.'_1' ?>', 1)"
                                                                        style="color:#F0A616!important">
                                                                    <span style="margin-left: -34px;"> đ</span>
                                                                    <span
                                                                        class=" err_messages err_productCOD err_productCOD_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext.'_1' ?>"><?php echo $getErrors['ward']; ?></span>
                                                                </li>
                                                                <!-- product value check -->
                                                                <li class="col-md-3 col-sm-6 or-cgc-1">
                                                                    <label>
                                                                        <input name="checkProductValue" value="1" checked
                                                                            type="checkbox" style="width: 10px;height: 10px;"
                                                                            class="regular-checkbox mb-0 frm-check checkProductValue checkProductValue_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext.'_1' ?>">
                                                                        <span><?= lang('Label.lbl_txtGoodValue') ?></span><span
                                                                            style="color: #885DE5;"> *</span></label> <br>
                                                                    <!-- product value -->
                                                                    <input name="productValue" value="0" type="text"
                                                                        id="qo-khaigia-ht" onkeypress="return isNumber(event)"
                                                                        onblur="ValidateProductValue(<?= $point->deliveryPointIndex ?>, <?= $point->receiverIndexNext ?>, 1)"
                                                                        class="or-ttnh-input or-gtkg productValue productValue_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext.'_1' ?>"
                                                                        onkeyup="number_format('productValue_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext.'_1' ?>', 1)"
                                                                        style="color:#885DE5!important">
                                                                    <span style="margin-left: -34px;"> đ</span></br>
                                                                    <span
                                                                        class=" err_messages err_productValue err_productValue_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext.'_1' ?>"><?php echo $getErrors['ward']; ?></span>
                                                                </li>
                                                            </ul>
                                                            <ul class="row mr-0">
                                                                <!-- product category -->
                                                                <li class="col-md-6 col-sm-12 lastProductInput">
                                                                    <?= lang('Label.lbl_txtGoodType'); ?><span
                                                                        style="color: #885DE5;">*</span> <br>
                                                                    <select name="productCategory"
                                                                        placeholder="<?= lang('Label.lbl_txtCategory') ?>"
                                                                        onchange="ValidateProductCate(<?= $point->deliveryPointIndex ?>, <?= $point->receiverIndexNext ?>, 1)"
                                                                        id="productCategory_<?= $point->deliveryPointIndex ?>"
                                                                        class="chosen-select pr10 w100 productCategory productCategory_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext.'_1' ?>">
                                                                        <option value="0"><?= lang('Label.lbl_txtCategory') ?>
                                                                        </option>
                                                                        <?php foreach($arrProductCategory as $keyProductCate => $productCategory): ?>
                                                                        <option value="<?= $keyProductCate ?>">
                                                                            <?= $productCategory ?>
                                                                        </option>
                                                                        <?php endforeach; ?>
                                                                    </select><br>
                                                                    <span
                                                                        class=" err_messages err_productCategory err_productCategory_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext.'_1' ?>"><?php echo $getErrors['ward']; ?></span>
                                                                </li>
                                                                <!-- product quantity -->
                                                                <li class="col-md-3 col-sm-6 lastProductInput">
                                                                    <?= lang('Label.lbl_txtGoodQuantity'); ?><span
                                                                        style="color: #885DE5;"> *</span><br>
                                                                    <input name="productQuantity" value="1"
                                                                        onkeypress="return isNumber(event)" id="qo-soluong-ht"
                                                                        onblur="ValidateProductQuantity(<?= $point->deliveryPointIndex ?>, <?= $point->receiverIndexNext ?>, 1)"
                                                                        class="productQuantity receiverExpectDate pr10 productQuantity_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext.'_1' ?>"><br>
                                                                    <span
                                                                        class=" err_messages err_productQuantity err_productQuantity_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext.'_1' ?>"><?php echo $getErrors['ward']; ?></span>
                                                                </li>
                                                                <!-- btn save -->
                                                                <li class="col-md-3 col-sm-6 lastProductInput"><br>
                                                                    <input type="hidden"
                                                                        class="productIndexNext_<?= $point->deliveryPointIndex.'_'.$point->receiverIndexNext ?>"
                                                                        name="" value="1">
                                                                    <button type="button"
                                                                        id="qo-btn-thh-1-<?= $point->deliveryPointIndex.'-'.$point->receiverIndexNext ?>"
                                                                        class="or-lhh-btn saveProduct_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?> saveProduct_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext.'_1' ?>"
                                                                        onclick="saveProduct(<?= $point->deliveryPointIndex ?>, <?= $point->receiverIndexNext ?>, 1, 'addProduct')"><?= lang('Label.lbl_txtGoodSave') ?>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- End Product Form -->
                                                    </li>
                                                    <!-- End Product Form Info -->
                                                </ul>
                                                <!-- Receiver Service Form -->
                                                <ul class="col-12">
                                                    <li class="or-dvht">
                                                        <?= lang('Label.lbl_txtSupportServices') ?>
                                                    </li>
                                                </ul>
                                                <!-- size -->
                                                <ul class="col-md-3 col-sm-6 or-ctdh-1">
                                                    <li><?= lang('Label.lbl_txtGoodSize') ?><span style="color: #885DE5;">
                                                            *</span><br>
                                                    <div class="col-md-4 col-sm-4 input_size">
                                                        <input name="length" value="10" type="text"
                                                            placeholder="<?=lang('Label.lbl_txtLength1')?>"
                                                            class="length length_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            onblur="ValidateLength(<?= $point->deliveryPointIndex ?>, <?= $point->receiverIndexNext ?>)">
                                                            <span style="margin-left: -34px;">Cm</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 input_size">
                                                        <input name="width" value="10" type="text"
                                                            placeholder="<?=lang('Label.lbl_txtWidth1')?>"
                                                            class="width width_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            onblur="ValidateWidth(<?= $point->deliveryPointIndex ?>, <?= $point->receiverIndexNext ?>)">
                                                            <span style="margin-left: -34px;">Cm</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 input_size">
                                                        <input name="height" value="10" type="text"
                                                            placeholder="<?=lang('Label.lbl_txtHeight1')?>"
                                                            class="height height_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            onblur="ValidateHeight(<?= $point->deliveryPointIndex ?>, <?= $point->receiverIndexNext ?>)">
                                                            <span style="margin-left: -34px;">Cm</span>
                                                    </div>
                                                            <br><span
                                                            class="err_messages err_size err_size_<?= $point->deliveryPointIndex.'_'.$point->receiverIndexNext ?>">
                                                        </span>
                                                    </li>
                                                </ul>
                                                <!-- weight -->
                                                <ul class="col-md-3 col-sm-6 or-ctdh-1">
                                                    <li><?= lang('Label.lbl_txtGoodWeight') ?><span style="color: #885DE5;">
                                                            *</span><br>
                                                        <input value="" name="weight" type="text"
                                                            class="weight weight_<?= $point->deliveryPointIndex.'_'.$point->receiverIndexNext ?>"
                                                            onblur="ValidateWeight(<?= $point->deliveryPointIndex ?>, <?= $point->receiverIndexNext ?>)"
                                                            onkeyup="number_format('weight_<?= $point->deliveryPointIndex ?>_<?= $point->receiverIndexNext ?>', 2)">
                                                        <span style="margin-left: -50px;">Gram</span>
                                                        <br><span
                                                            class="err_messages err_weight err_weight_<?= $point->deliveryPointIndex.'_'.$point->receiverIndexNext ?>">
                                                        </span>
                                                    </li>
                                                </ul>
                                                <!-- note -->
                                                <ul class="col-md-6 col-sm-12 or-ctdh-1">
                                                    <li><?= lang('Label.lbl_txtExtraNote') ?><br>
                                                        <input name="note" value="" type="text"
                                                            class="note or-ttnh-input1 note_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>">
                                                    </li>
                                                </ul>
                                                <?php if($dataOrders->packType == 2){ ?>
                                                <!-- isFree -->
                                                <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                                                    <li class="or-cgc-1"><?= lang('Label.lbl_txtPayerFee') ?><span
                                                            style="color: #885DE5;"> *</span><br>
                                                        <input type="radio"
                                                            name="isFree_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            class="or-radio-checked isFreeYes isFreeYes_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            id="orNtc1" value="1" checked="checked" />
                                                        <label for="orNtc1"><?= lang('Label.lbl_txtPayerFeeSender') ?></label><br>
                                                        <input type="radio" value="2"
                                                            name="isFree_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            class="or-radio-checked isFreeNo isFreeNo_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            id="orNtc1a" />
                                                        <label for="orNtc1a"><?= lang('Label.lbl_txtPayerFeeReceiver') ?></label>
                                                    </li>
                                                </ul>
                                                <!-- partialDelivery -->
                                                <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                                                    <li class="or-cgc-1"><?= lang('Label.lbl_txtPartialDelivery') ?><span
                                                            style="color: #885DE5;">
                                                            *</span><br>
                                                        <input type="radio" value="1"
                                                            name="partialDelivery_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            class="or-radio-checked partialDeliveryYes partialDeliveryYes_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            id="gh1p1" />
                                                        <label for="gh1p1"><?= lang('Label.lbl_txtYes') ?></label><br>
                                                        <input type="radio" value="0"
                                                            name="partialDelivery_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            class="or-radio-checked partialDeliveryNo partialDeliveryNo_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            id="gh1p1a" checked="checked" />
                                                        <label for="gh1p1a"><?= lang('Label.lbl_txtNo') ?></label>
                                                    </li>
                                                </ul>
                                                <!-- isRefund -->
                                                <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                                                    <li class="or-cgc-1"><?= lang('Label.lbl_txtIsReturn') ?><br>
                                                        <input type="radio" value="1"
                                                            name="isRefund_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            class="or-radio-checked isRefundYes isRefundYes_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            id="dvch1" checked="checked" />
                                                        <label for="dvch1"><?= lang('Label.lbl_txtYes') ?></label><br>
                                                        <input type="radio" value="0"
                                                            name="isRefund_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            class="or-radio-checked isRefundNo isRefundNo_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            id="dvch1a" />
                                                        <label for="dvch1a"><?= lang('Label.lbl_txtNo') ?></label>
                                                    </li>
                                                </ul>
                                                <!-- extraServices -->
                                                <ul class="col-xl-2 col-sm-3 or-ctdh-1 or-ctdh-2">
                                                    <li class="or-cgc-1"><?= lang('Label.lbl_txtExtraServices') ?><br>
                                                        <label><input type="checkbox"
                                                                name="isDoorDeliver_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                                class="frm-check regular-checkbox or-radio-checked isDoorDeliver isDoorDeliver_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                                id="dvthem1" />
                                                            <span><?= lang('Label.lbl_txtIsDoorDeliver') ?></span></label><br>
                                                        <input type="checkbox"
                                                            name="isPorter_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            class="regular-checkbox or-radio-checked isPorter isPorter_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            id="dvthem1a" />
                                                        <label for="dvthem1a"><?= lang('Label.lbl_txtIsPorter') ?></label>
                                                    </li>
                                                </ul>
                                                <!-- requireNote -->
                                                <ul class="col-xl-4 col-sm-12 or-ctdh-1">
                                                    <li><?= lang('Label.lbl_txtNoteRequired') ?><span style="color: #885DE5;">
                                                            *</span><br>
                                                        <select
                                                            class="chosen-select w100 requireNote requireNote_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            name="requireNote_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            style="width: 100%;" id="requireNote_<?= $point->deliveryPointIndex ?>">
                                                            <option value="1"><?= lang('Label.lbl_txtNoteRequired1') ?></option>
                                                            <option value="2"><?= lang('Label.lbl_txtNoteRequired2') ?></option>
                                                            <option value="3" selected><?= lang('Label.lbl_txtNoteRequired3') ?>
                                                            </option>
                                                        </select>
                                                        <br><span
                                                            class="err_messages err_requireNote err_requireNote_<?= $point->deliveryPointIndex.'_'.$point->receiverIndexNext ?>">
                                                        </span>
                                                    </li>
                                                </ul>
                                                <?php }else{ ?>
                                                <ul class="col-xl-3 col-sm-4 or-ctdh-1">
                                                    <li class="or-cgc-1">
                                                        <?= lang('Label.lbl_txtPayerFee') ?><span style="color: #885DE5;">
                                                            *</span><br>
                                                        <!-- isFree -->
                                                        <input type="radio"
                                                            name="isFree_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            class="or-radio-checked isFreeYes isFreeYes_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            id="orNtc1" value="1" checked="checked" />
                                                        <label for="orNtc1"><?= lang('Label.lbl_txtPayerFeeSender') ?></label><br>
                                                        <input type="radio" value="2"
                                                            name="isFree_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            class="or-radio-checked isFreeNo isFreeNo_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            id="orNtc1a" />
                                                        <label for="orNtc1a"><?= lang('Label.lbl_txtPayerFeeReceiver') ?></label>
                                                    </li>
                                                </ul>
                                                <ul class="col-xl-3 col-sm-4 or-ctdh-1">
                                                    <li class="or-cgc-1"><?= lang('Label.lbl_txtPartialDelivery') ?><span
                                                            style="color: #885DE5;">
                                                            *</span><br>
                                                        <!-- partialDelivery -->
                                                        <input type="radio" value="1"
                                                            name="partialDelivery_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            class="or-radio-checked partialDeliveryYes partialDeliveryYes_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            id="gh1p1" />
                                                        <label for="gh1p1"><?= lang('Label.lbl_txtYes') ?></label><br>
                                                        <input type="radio" value="0"
                                                            name="partialDelivery_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            class="or-radio-checked partialDeliveryNo partialDeliveryNo_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            id="gh1p1a" checked="checked" />
                                                        <label for="gh1p1a"><?= lang('Label.lbl_txtNo') ?></label>
                                                    </li>
                                                </ul>
                                                <ul class="col-xl-3 col-sm-4 or-ctdh-1">
                                                    <li class="or-cgc-1">
                                                        <?= lang('Label.lbl_txtPickupType') ?><br>
                                                        <!-- isRefund -->
                                                        <input type="radio" value="1"
                                                            name="pickupType_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            class="or-radio-checked pickupTypeYes pickupTypeYes_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            id="dvch1" />
                                                        <label for="dvch1"><?= lang('Label.lbl_txtYes') ?></label><br>
                                                        <input type="radio" value="2"
                                                            name="pickupType_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            class="or-radio-checked pickupTypeNo pickupTypeNo_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            id="dvch1a" checked="checked" />
                                                        <label for="dvch1a"><?= lang('Label.lbl_txtNo') ?></label>
                                                    </li>
                                                </ul>
                                                <ul class="col-xl-3 col-sm-12 or-ctdh-1">
                                                    <li>
                                                        <?= lang('Label.lbl_txtNoteRequired') ?><span style="color: #885DE5;">
                                                            *</span><br>
                                                        <select
                                                            class="chosen-select w100 requireNote requireNote_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            name="requireNote_<?= $point->deliveryPointIndex.'_'. $point->receiverIndexNext ?>"
                                                            style="width: 100%;" id="requireNote_<?= $point->deliveryPointIndex ?>">
                                                            <option value="1"><?= lang('Label.lbl_txtNoteRequired1') ?></option>
                                                            <option value="2"><?= lang('Label.lbl_txtNoteRequired2') ?></option>
                                                            <option value="3" selected><?= lang('Label.lbl_txtNoteRequired3') ?>
                                                            </option>
                                                        </select>
                                                        <br><span
                                                            class="err_messages err_requireNote err_requireNote_<?= $point->deliveryPointIndex.'_'.$point->receiverIndexNext ?>">
                                                        </span>
                                                    </li>
                                                </ul>
                                                <?php } ?>
                                                <!-- End Receiver Service Form -->
                                                <!-- Button Save Receiver -->
                                                <?php if($dataOrders->packType == 2){ ?>
                                                <ul class="col-md-6 col-sm-0">
                                                </ul>
                                                <ul class="col-md-3 col-sm-6 or-ctdh-btn1">
                                                    <button type="button"
                                                        class="cancelReceiver_<?= $point->deliveryPointIndex.'_'.$point->receiverIndexNext ?>"
                                                        onclick="removeReceiver(<?= $point->deliveryPointIndex ?>, <?= $point->receiverIndexNext ?>)"><?= lang('Label.lbl_txtCancel') ?></button>
                                                </ul>
                                                <ul class="col-md-3 col-sm-6  or-ctdh-btn2">
                                                    <button
                                                        class="closePickupOrder saveReceiver_<?= $point->deliveryPointIndex.'_'.$point->receiverIndexNext ?> closePickupOrder_<?= $point->deliveryPointIndex.'_'.$point->receiverIndexNext ?>"
                                                        onclick="saveReceiver(<?= $point->deliveryPointIndex ?>, <?= $point->receiverIndexNext ?>, 'addReceiver')"
                                                        type="button"><?= lang('Label.lbl_txtFinish') ?>
                                                    </button>
                                                </ul>
                                                <?php } ?>
                                                <!-- End Button Save Receiver -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Receiver From -->
                                <?php }else{ $totalReceiver = count($receivers); $receiver = array(); ?>
                                    <!-- Success Receiver -->
                                    <div class="or-ttng receiverInfo row w100 afOrder_<?= $point->deliveryPointIndex ?>"
                                        <?php echo($receivers[0]->weight > 0 && ($receivers[0]->receiverPhone != null || $receivers[0]->receiverPhone != ''))? '' : 'style="display: none"'?>>
                                        <?php foreach ($receivers as $keyReceivers => $receiver) { ?>
                                        <?php if($receiver->weight > 0 && ($receiver->receiverPhone != null || $receiver->receiverPhone != '')){ ?>
                                        <div
                                            class="row w100 successReceiver afOrder_<?= $point->deliveryPointIndex .'_'. $receiver->receiverIndex ?>">
                                            <div class=" col-lg-3 col-md-12 senderItems" style="position: relative;">
                                                <span
                                                    class="or-dh-stt or-dh-stt-2 success_receiverIndex_<?= $point->deliveryPointIndex .'_'.$receiver->receiverIndex ?>"><?= $receiver->receiverIndex ?></span>
                                                <ul style="padding: 0px 40px;">
                                                    <li
                                                        class="fz13 success_receiverPhone_<?= $point->deliveryPointIndex .'_'.$receiver->receiverIndex ?>">
                                                        <?= $receiver->receiverPhone ?></li>
                                                    <li class="fz13 success_receiverName_<?= $point->deliveryPointIndex .'_'.$receiver->receiverIndex ?>"
                                                        style="color:#68656D"><?= $receiver->receiverName ?></li>
                                                </ul>
                                            </div>
                                            <div class=" col-lg-8 col-md-12">
                                                <?php $items = $receiver->items;
                                                                        foreach($items as $keyItem => $item):
                                                                    ?>
                                                <div class="row">
                                                    <div
                                                        class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13 success_receiverItem_productName_<?= $point->deliveryPointIndex ?>_<?= $receiver->receiverIndex ?>_<?= $item->productIndex ?>">
                                                        <span><?= $item->productName ?></span>
                                                    </div>
                                                    <div
                                                        class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13 success_receiverItem_productQuantity_<?= $point->deliveryPointIndex ?>_<?= $receiver->receiverIndex ?>_<?= $item->productIndex ?>">
                                                        <?= lang('Label.lbl_detailQuantity') ?>: <span
                                                            class="colorPurple"><?= number_format($item->productQuantity) ?></span>
                                                    </div>
                                                    <div
                                                        class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13 success_receiverItem_productCod_<?= $point->deliveryPointIndex ?>_<?= $receiver->receiverIndex ?>_<?= $item->productIndex ?>">
                                                        <?= lang('Label.lbl_detailCOD') ?>: <span
                                                            class="colorOrange"><?= number_format($item->productQuantity * $item->productCOD) ?></span>
                                                        đ
                                                    </div>
                                                    <div
                                                        class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13 success_receiverItem_productValue_<?= $point->deliveryPointIndex ?>_<?= $receiver->receiverIndex ?>_<?= $item->productIndex ?>">
                                                        <?= lang('Label.lbl_detailProductValue') ?>:
                                                        <?= number_format($item->productQuantity * $item->productValue) ?> đ</div>
                                                </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <div class=" col-lg-1 col-md-12 col-sm-6 col-xs-6 buttonItems">
                                                <span><img class="removeReceiver" src="/public/images/or-delete.png"
                                                        onclick="removeReceiverConfirm(<?= $point->deliveryPointIndex ?>, <?= $receiver->receiverIndex ?>, 1)"></span>
                                                <span><img class="editReceiver 222" src="/public/images/or-edit.png"
                                                        onclick="editReceiver(<?= $point->deliveryPointIndex ?>, <?= $receiver->receiverIndex ?>, 1)"></span>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <?php } ?>
                                    </div>
                                    <?php $countItem = $receiver->items; ?>
                                    <input class="countItemProduct" value="<?php echo count($countItem); ?>" type="hidden" />
                            <?php if($receiver->weight > 0 && ($receiver->receiverPhone != null || $receiver->receiverPhone != '') && $typeEdit != 1){
                                $receiver = array();
                                $receiverIndex = $point->receiverIndexNext;
                                $productIndex = 1;
                            }else {
                                $receiverIndex = 1;
                                $productIndex = 1;
                                // if($receivers[0]->weight > 0){
                                    // $receiverIndex = $receiver->receiverIndex;
                                    // echo $receiverIndex;die;
                                    // $productIndex = $receiver->productIndexNext;
                                // }
                            } ?>
                        <!-- End Success Receiver -->
                        <!-- Button Add Receiver -->
                        <?php if($dataOrders->packType == 2){ ?>
                        <div class="btn-add-orders">
                            <button type="button" onclick="addReceiver(<?= $point->deliveryPointIndex ?>, <?= $point->receiverIndexNext - 1 ?>)"
                                class="or-tctdn-btn addReceiver addReceiver_<?= $point->deliveryPointIndex ?> <?php echo($receivers[0]->weight > 0)? '': 'dpn' ?>">
                                <img src="<?php echo base_url('public/images/tdg2.png');?>" alt=""
                                    class="float-left pl-2">
                                <?= lang('Label.lbl_addNewOrderReciver') ?>
                            </button>
                        </div>
                        <?php } ?>
                        <!-- End Button Add Receiver -->
                        <!-- Receiver From -->
                        <div class="or-ttng pt-0 row w100 pb-0 form_receiverOrder_<?= $point->deliveryPointIndex ?> receiverOrder_<?= $point->deliveryPointIndex.'_'.$receiverIndex ?>"
                            <?php echo($receivers[0]->weight > 0 && ($receivers[0]->receiverPhone != null || $receivers[0]->receiverPhone != ''))? 'style="display: none"': '' ?>>
                            <div class="chinhsua1 mb-1">
                                <div id="orders"
                                    class="or-ttdh row pb-0 qo-ttdhl receiver-<?= $point->deliveryPointIndex.'-'.$receiverIndex?>">
                                    <ul class="or-dgh col-12 mb-3">
                                        <li class="or-dgh-1 pt-0 mt-0">
                                            <span class="or-dh-stt form_receiverIndex "
                                                style="background: #F0A616;"><?= $receiverIndex ?></span>
                                            <span class="text_receiverIndex_<?= $receiverIndex ?>"
                                                style="color: #68656D;"><?= lang('Label.lbl_addOrderDetail') ?></span>
                                        </li>
                                        <!-- Receiver Form Info -->
                                        <li class="or-ttnh">
                                            <ul>
                                                <li class="or-ttnh-tt">
                                                    <?= lang('Label.lbl_txtReceiverInfo') ?>
                                                </li>
                                            </ul>
                                            <ul class="row mr-0">
                                                <!-- receiver phone -->
                                                <li class="col-md-3 col-sm-6 or-cgc-1">
                                                    <?= lang('Label.lbl_txtReceiverPhone') ?><span
                                                        style="color: #885DE5;"> *</span> <br>
                                                    <input name="receiverPhone" type="text"
                                                        onkeypress="return isNumber(event)"
                                                        value="<?=$receiver->receiverPhone ?>"
                                                        onblur="ValidateReceiverPhone(<?= $point->deliveryPointIndex ?>, <?= $receiverIndex ?>)"
                                                        class="receiverPhone receiverPhone_<?= $point->deliveryPointIndex.'_'.$receiverIndex ?>"
                                                        placeholder="<?= lang('Label.ph_phone') ?>"><br>
                                                    <span
                                                        class=" err_messages err_receiverPhone_<?= $point->deliveryPointIndex.'_'.$receiverIndex ?>">
                                                    </span>
                                                </li>
                                                <!-- receiver name -->
                                                <li class="col-md-3 col-sm-6 or-cgc-1">
                                                    <?= lang('Label.lbl_txtReceiverName') ?><span
                                                        style="color: #885DE5;"> *</span> <br>
                                                    <input name="receiverName" value="<?=$receiver->receiverName ?>"
                                                        type="text"
                                                        onblur="ValidateReceiverName(<?= $point->deliveryPointIndex ?>, <?= $receiverIndex ?>)"
                                                        class="receiverName unNumber receiverName_<?= $point->deliveryPointIndex.'_'.$receiverIndex ?>"
                                                        placeholder="<?= lang('Label.lbl_txtReceiverName') ?>"><br>
                                                    <span
                                                        class=" err_messages err_receiverName_<?= $point->deliveryPointIndex.'_'.$receiverIndex ?>">
                                                    </span>
                                                </li>
                                                <!-- expectDate -->
                                                <li class="col-md-3 col-sm-6 or-cgc-1">
                                                    <?= lang('Label.lbl_txtReceiverDate') ?><br>
                                                    <input name="receiverExpectDate" type="text"
                                                        value="<?=$receiver->expectDate ?>" autocomplete="off"
                                                        class="orderdatePicker receiverExpectDate pr10 expectDate expectDate_<?= $point->deliveryPointIndex.'_'.$receiverIndex ?>">
                                                </li>
                                                <!-- expectTime -->
                                                <li class="col-md-3 col-sm-6 or-cgc-1">
                                                    <?= lang('Label.lbl_txtReceiverTime') ?><br>
                                                    <input name="receiverExpectTime" type="time"
                                                        value="<?=$receiver->expectTime ?>"
                                                        class="or-ttnh-input expectTime receiverExpectDate expectTime_<?= $point->deliveryPointIndex.'_'.$receiverIndex ?>">
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- End Receiver Form Info -->
                                        <!-- Product Form Info -->
                                        <li class="or-ttnh">
                                            <ul>
                                                <li class="or-ttnh-tt"><?= lang('Label.lbl_txtGoodInfo') ?></li>
                                            </ul>
                                            <!-- Product Success -->
                                            <div style="width: 100%;"
                                                class=" 21 ttsp productSuccess_<?= $point->deliveryPointIndex.'_'.$receiverIndex ?>"
                                                id="ttsp_<?= $point->deliveryPointIndex.'_'.$receiverIndex ?>">
                                                <?php if($receiver){ 
                                                    $items = $receiver->items;
                                                    if(!empty($items)){
                                                        foreach ($items as $keyItems => $item) {
                                                            if($item->productName != null && $item->productCate > 0 && $item->productQuantity > 0 && $item->productCOD != null && $item->productValue != null){ 
                                                                $productIndex = $item->productIndex + 1;
                                                            ?>
                                                                <ul
                                                                    class="col-12 productSuccess productDetail productDetail_<?= $point->deliveryPointIndex.'_'.$receiver->receiverIndex.'_'.$item->productIndex ?>">
                                                                    <li class="or-ttdh-add">
                                                                        <ul class="row">
                                                                            <li class="or-dh-tt col-sm-3 pl-2">
                                                                                <span class="or-dh-stt"
                                                                                    style="background: #885DE5;"><?=$item->productIndex?></span>
                                                                                <span
                                                                                    class="success_productName_<?=$point->deliveryPointIndex?>_<?=$receiver->receiverIndex?>_<?=$item->productIndex?>"
                                                                                    productname="<?=$item->productName?>"><?=$item->productName?></span>
                                                                            </li>
                                                                            <li class="or-dh-sp col-sm-3">
                                                                                <span
                                                                                    class="success_productCate_<?=$point->deliveryPointIndex?>_<?=$receiver->receiverIndex?>_<?=$item->productIndex?>"
                                                                                    productcate="<?=$item->productCate?>"><?=$item->productCateName?></span>
                                                                            </li>
                                                                            <li class="or-dh-sl col-sm-1">
                                                                                <?= lang('Label.lbl_detailQuantity') ?>: <span
                                                                                    class="success_productQuantity_<?=$point->deliveryPointIndex?>_<?=$receiver->receiverIndex?>_<?=$item->productIndex?>"
                                                                                    productquantity="<?=$item->productQuantity?>"><?=$item->productQuantity?></span>
                                                                            </li>
                                                                            <li class="or-dh-cod col-sm-2">
                                                                                <?= lang('Label.lbl_detailCOD') ?>: <span
                                                                                    class="success_productCOD_<?=$point->deliveryPointIndex?>_<?=$receiver->receiverIndex?>_<?=$item->productIndex?>"
                                                                                    productcod="<?=$item->productCOD * $item->productQuantity?>"><?=number_format($item->productCOD * $item->productQuantity)?></span>
                                                                                đ
                                                                            </li>
                                                                            <li class="or-dh-kg col-sm-2">
                                                                                <?= lang('Label.lbl_detailProductValue') ?>: <span
                                                                                    class="success_productValue_<?=$point->deliveryPointIndex?>_<?=$receiver->receiverIndex?>_<?=$item->productIndex?>"
                                                                                    productvalue="<?=$item->productValue * $item->productQuantity?>"><?=number_format($item->productValue * $item->productQuantity)?></span>
                                                                                đ
                                                                            </li>
                                                                            <li class="or-dh-ed col-sm-1">
                                                                                <img src="/public/images/or-delete.png"
                                                                                    onclick="removeProductConfirm(<?=$point->deliveryPointIndex?>, <?=$receiver->receiverIndex?>, <?=$item->productIndex?>)">
                                                                                <img src="/public/images/or-edit.png"
                                                                                    onclick="editProduct(<?=$point->deliveryPointIndex?>, <?=$receiver->receiverIndex?>, <?=$item->productIndex?>, 1)">
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                                <?php }
                                                                }
                                                            }
                                                        }?>
                                            </div>
                                            <!-- End Product Success -->
                                            <!-- Product Form -->
                                            <div class="btn-add-orders">
                                                <button type="button" onclick="addProduct(<?= $point->deliveryPointIndex ?>, <?=$receiverIndex ?>)"
                                                    class="or-tctdn-btn addProduct addProduct_<?= $point->deliveryPointIndex.'_'.$receiverIndex ?> <?php echo($receiver->items[$productIndex - 2]->productQuantity > 0)? '': 'dpn' ?>">
                                                    <img src="<?php echo base_url('public/images/tdg2.png');?>" alt=""
                                                        class="float-left pl-2 pr-2">
                                                    <?= lang('Label.lbl_addNewOrderProduct') ?>
                                                </button>
                                            </div>
                                            <div class="product_form 112121 product_form_<?= $point->deliveryPointIndex.'_'.$receiverIndex ?> <?php echo($receiver->items[$productIndex - 2]->productQuantity > 0)? 'dpn': '' ?>">
                                                <ul class="row mr-0 mt-3">
                                                    <!-- product name -->
                                                    <li class="col-md-6 col-sm-12">
                                                        <?= lang('Label.lbl_txtGoodName') ?><span
                                                            style="color: #885DE5;">*</span> <br>
                                                        <input name="productName" vallue="" id="qo-tensp-ht"
                                                            onblur="ValidateProductName(<?= $point->deliveryPointIndex ?>, <?= $receiverIndex ?>, <?= $productIndex ?>)"
                                                            class="productName productName_<?= $point->deliveryPointIndex.'_'.$receiverIndex.'_'.$productIndex ?>"
                                                            type="text"
                                                            placeholder="<?= lang('Label.lbl_inputGoodName') ?>">
                                                        <span
                                                            class=" err_messages err_productName err_productName_<?= $point->deliveryPointIndex.'_'.$receiverIndex.'_'.$productIndex ?>"><?php echo $getErrors['productName']; ?></span>
                                                    </li>
                                                    <!-- product COD -->
                                                    <li class="col-md-3 col-sm-6"><?= lang('Label.lbl_txtCod') ?><span
                                                            style="color: #885DE5;">*</span> <br>
                                                        <input name="productCOD" value="0" type="text"
                                                            onkeypress="return isNumber(event)"
                                                            onblur="ValidateProductCOD(<?= $point->deliveryPointIndex ?>, <?= $receiverIndex ?>, <?= $productIndex ?>)"
                                                            class="or-cod productCOD  receiverExpectDate productCOD_<?= $point->deliveryPointIndex.'_'. $receiverIndex.'_'.$productIndex ?>"
                                                            id="qo-cod-ht"
                                                            onkeyup="number_format('productCOD_<?= $point->deliveryPointIndex.'_'. $receiverIndex.'_'.$productIndex ?>', 1)"
                                                            style="color:#F0A616!important">
                                                        <span style="margin-left: -34px;"> đ</span>
                                                        <span
                                                            class=" err_messages err_productCOD err_productCOD_<?= $point->deliveryPointIndex.'_'. $receiverIndex.'_'.$productIndex ?>"><?php echo $getErrors['ward']; ?></span>
                                                    </li>
                                                    <!-- product value check -->
                                                    <li class="col-md-3 col-sm-6 or-cgc-1">
                                                        <label>
                                                            <input name="checkProductValue" value="1" checked
                                                                type="checkbox" style="width: 10px;height: 10px;"
                                                                class="regular-checkbox frm-check mb-0 checkProductValue checkProductValue_<?= $point->deliveryPointIndex.'_'. $receiverIndex.'_'.$productIndex ?>">
                                                            <span><?= lang('Label.lbl_txtGoodValue') ?></span><span
                                                                style="color: #885DE5;"> *</span>
                                                        </label> <br>
                                                        <!-- product value -->
                                                        <input name="productValue" value="0" type="text"
                                                            onkeypress="return isNumber(event)" id="qo-khaigia-ht"
                                                            onblur="ValidateProductValue(<?= $point->deliveryPointIndex ?>, <?= $receiverIndex ?>, <?= $productIndex ?>)"
                                                            class="or-ttnh-input or-gtkg productValue receiverExpectDate productValue_<?= $point->deliveryPointIndex.'_'. $receiverIndex.'_'.$productIndex ?>"
                                                            onkeyup="number_format('productValue_<?= $point->deliveryPointIndex.'_'. $receiverIndex.'_'.$productIndex ?>', 1)"
                                                            style="color:#885DE5!important">
                                                        <span style="margin-left: -34px;"> đ</span></br>
                                                        <span
                                                            class=" err_messages err_productValue err_productValue_<?= $point->deliveryPointIndex.'_'. $receiverIndex.'_'.$productIndex ?>"><?php echo $getErrors['ward']; ?></span>
                                                    </li>
                                                </ul>
                                                <ul class="row mr-0">
                                                    <!-- product category -->
                                                    <li
                                                        class="col-md-6 col-sm-12 lastProductInput select-choose-category-order">
                                                        <?= lang('Label.lbl_txtGoodType'); ?><span
                                                            style="color: #885DE5;">*</span> <br>
                                                        <select name="productCategory"
                                                            placeholder="<?= lang('Label.lbl_txtCategory') ?>"
                                                            onchange="ValidateProductCate(<?= $point->deliveryPointIndex ?>, <?= $receiverIndex ?>, <?= $productIndex ?>)"
                                                            id="productCategory_<?= $point->deliveryPointIndex.'_'. $receiverIndex.'_'.$productIndex ?>"
                                                            class="chosen-select productCategory pr10 productCategory_<?= $point->deliveryPointIndex.'_'. $receiverIndex.'_'.$productIndex ?>">
                                                            <option value="0"><?= lang('Label.lbl_txtCategory') ?>
                                                            </option>
                                                            <?php foreach($arrProductCategory as $keyProductCate => $productCategory): ?>
                                                            <option value="<?= $keyProductCate ?>">
                                                                <?= $productCategory ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select><br>
                                                        <span
                                                            class=" err_messages err_productCategory err_productCategory_<?= $point->deliveryPointIndex.'_'. $receiverIndex.'_'.$productIndex ?>"><?php echo $getErrors['ward']; ?></span>
                                                    </li>
                                                    <!-- product quantity -->
                                                    <li class="col-md-3 col-sm-6 lastProductInput">
                                                        <?= lang('Label.lbl_txtGoodQuantity'); ?><span
                                                            style="color: #885DE5;"> *</span><br>
                                                        <input name="productQuantity" value="1"
                                                            onkeypress="return isNumber(event)" id="qo-soluong-ht"
                                                            onblur="ValidateProductQuantity(<?= $point->deliveryPointIndex ?>, <?= $receiverIndex ?>, <?= $productIndex ?>)"
                                                            class="productQuantity receiverExpectDate pr10 productQuantity_<?= $point->deliveryPointIndex.'_'. $receiverIndex.'_'.$productIndex ?>">
                                                        <br><span
                                                            class=" err_messages err_productQuantity err_productQuantity_<?= $point->deliveryPointIndex.'_'. $receiverIndex.'_'.$productIndex ?>"><?php echo $getErrors['ward']; ?></span>
                                                    </li>
                                                    <!-- btn save -->
                                                    <li class="col-md-3 col-sm-6 lastProductInput"><br>
                                                        <input type="hidden"
                                                            class="productIndexNext_<?= $point->deliveryPointIndex.'_'.$receiverIndex ?>"
                                                            name="" value="<?= $productIndex ?>">
                                                        <button type="button"
                                                            id="qo-btn-thh-1-<?= $point->deliveryPointIndex.'-'.$receiverIndex ?>"
                                                            class="or-lhh-btn saveProduct_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?> saveProduct_<?= $point->deliveryPointIndex.'_'. $receiverIndex.'_'.$productIndex ?>"
                                                            onclick="saveProduct(<?= $point->deliveryPointIndex ?>, <?= $receiverIndex ?>, <?= $productIndex ?>, 'addProduct')"><?= lang('Label.lbl_txtGoodSave') ?>
                                                        </button><br>
                                                        <span
                                                            class=" err_messages err_saveProduct_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?> err_saveProduct_<?= $point->deliveryPointIndex.'_'. $receiverIndex.'_'.$productIndex ?>"></span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- End Product Form -->
                                        </li>
                                        <!-- End Product Form Info -->
                                    </ul>
                                    <!-- Receiver Service Form -->
                                    <!-- length -->
                                    <ul class="col-md-4 col-sm-12 or-ctdh-1">
                                        <li><?= lang('Label.lbl_txtGoodSize')?><span style="color: #885DE5;">
                                                *</span><br>
                                            <div class="col-md-4 col-sm-4 input_size">
                                                <input name="length"
                                                    value="<?= $receiver->length ? $receiver->length : '10'?>"
                                                    type="text" placeholder="<?=lang('Label.lbl_txtLength1')?>"
                                                    onkeypress="return isNumber(event)"
                                                    class="length length_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?>"
                                                    onblur="ValidateLength(<?= $point->deliveryPointIndex ?>, <?= $receiverIndex ?>)">
                                                <span style="margin-left: -34px;">Cm</span>
                                            </div>
                                            <div class="col-md-4 col-sm-4 input_size">
                                                <input name="width"
                                                    value="<?= $receiver->width ? $receiver->width : '10' ?>"
                                                    type="text" placeholder="<?=lang('Label.lbl_txtWidth1')?>"
                                                    onkeypress="return isNumber(event)"
                                                    class="width width_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?>"
                                                    onblur="ValidateWidth(<?= $point->deliveryPointIndex ?>, <?= $receiverIndex ?>)">
                                                <span style="margin-left: -34px;">Cm</span>
                                            </div>
                                            <div class="col-md-4 col-sm-4 input_size">
                                                <input name="height"
                                                    value="<?= $receiver->height ? $receiver->height : '10' ?>"
                                                    type="text" placeholder="<?=lang('Label.lbl_txtHeight1')?>"
                                                    onkeypress="return isNumber(event)"
                                                    class="height height_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?>"
                                                    onblur="ValidateHeight(<?= $point->deliveryPointIndex ?>, <?= $receiverIndex ?>)">
                                                <span style="margin-left: -34px;">Cm</span>
                                            </div>
                                            <br><span class="err_messages err_size err_size_<?= $point->deliveryPointIndex.'_'.$receiverIndex ?>">
                                            </span>
                                        </li>
                                    </ul>


                                    <!-- weight -->
                                    <ul class="col-md-2 col-sm-6 or-ctdh-1">
                                        <li><?= lang('Label.lbl_txtGoodWeight') ?><span style="color: #885DE5;">
                                                *</span><br>
                                            <input value="<?= $receiver->weight ?>" name="weight" type="text"
                                                class="weight weight_<?= $point->deliveryPointIndex.'_'.$receiverIndex ?>"
                                                onkeypress="return isNumber(event)"
                                                onblur="ValidateWeight(<?= $point->deliveryPointIndex ?>, <?= $receiverIndex ?>)"
                                                onkeyup="number_format('weight_<?= $point->deliveryPointIndex ?>_<?= $receiverIndex ?>', 2)">
                                            <span style="margin-left: -50px;">Gram</span>
                                            <br><span
                                                class="err_messages err_weight err_weight_<?= $point->deliveryPointIndex.'_'.$receiverIndex ?>">
                                            </span>
                                        </li>
                                    </ul>
                                    <!-- note -->
                                    <ul class="col-md-6 col-sm-12 or-ctdh-1">
                                        <li><?= lang('Label.lbl_txtExtraNote') ?><br>
                                            <input name="note" value="<?= $receiver->note ?>" type="text"
                                                class="note or-ttnh-input1 note_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?>">
                                        </li>
                                    </ul>
                                    <ul class="col-12">
                                        <li class="or-dvht">
                                            <b><?= lang('Label.lbl_txtSupportServices') ?></b>
                                        </li>
                                    </ul>
                                    <!-- isFree -->
                                    <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                                        <li class="or-cgc-1"><?= lang('Label.lbl_txtPayerFee') ?><span
                                                style="color: #885DE5;"> *</span><br>
                                            <input type="radio"
                                                name="isFree_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?>"
                                                class="or-radio-checked isFreeYes isFreeYes_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?>"
                                                id="orNtc1" value="1"
                                                <?php echo($receiver->isFree != '2')? 'checked' : '' ?> />
                                            <label for="orNtc1"><?= lang('Label.lbl_txtPayerFeeSender') ?></label><br>
                                            <input type="radio" value="2"
                                                name="isFree_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?>"
                                                class="or-radio-checked isFreeNo isFreeNo_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?>"
                                                id="orNtc1a" <?php echo($receiver->isFree == '2')? 'checked' : '' ?> />
                                            <label for="orNtc1a"><?= lang('Label.lbl_txtPayerFeeReceiver') ?></label>
                                        </li>
                                    </ul>
                                    <!-- partialDelivery -->
                                    <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                                        <li class="or-cgc-1"><?= lang('Label.lbl_txtPartialDelivery') ?><span
                                                style="color: #885DE5;">
                                                *</span><br>
                                            <input type="radio" value="1"
                                                name="partialDelivery_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?>"
                                                class="or-radio-checked partialDeliveryYes partialDeliveryYes_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?>"
                                                id="gh1p1"
                                                <?php echo($receiver->partialDelivery == '1')? 'checked' : '' ?> />
                                            <label for="gh1p1"><?= lang('Label.lbl_txtYes') ?></label><br>
                                            <input type="radio" value="0"
                                                name="partialDelivery_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?>"
                                                class="or-radio-checked partialDeliveryNo partialDeliveryNo_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?>"
                                                id="gh1p1a"
                                                <?php echo($receiver->partialDelivery != '1')? 'checked' : '' ?> />
                                            <label for="gh1p1a"><?= lang('Label.lbl_txtNo') ?></label>
                                        </li>
                                    </ul>


                                    <!-- isRefund -->
                                    <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                                        <li class="or-cgc-1"><?= lang('Label.lbl_txtIsReturn') ?><br>
                                            <input type="radio" value="1"
                                                name="isRefund_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?>"
                                                class="or-radio-checked isRefundYes isRefundYes_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?>"
                                                id="dvch1" <?php echo($receiver->isRefund != '0')? 'checked' : '' ?> />
                                            <label for="dvch1"><?= lang('Label.lbl_txtYes') ?></label><br>
                                            <input type="radio" value="0"
                                                name="isRefund_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?>"
                                                class="or-radio-checked isRefundNo isRefundNo_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?>"
                                                id="dvch1a" <?php echo($receiver->isRefund == '0')? 'checked' : '' ?> />
                                            <label for="dvch1a"><?= lang('Label.lbl_txtNo') ?></label>
                                        </li>
                                    </ul>
                                    <?php if($dataOrders->packType == 2){ ?>
                                    <!-- extraServices -->
                                    <ul class="col-xl-2 col-sm-3 or-ctdh-1 or-ctdh-2">
                                        <li class="or-cgc-1"><?= lang('Label.lbl_txtExtraServices') ?><br>
                                            <label>
                                                <input type="checkbox"
                                                    name="isDoorDeliver_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?>"
                                                    class="frm-check regular-checkbox or-radio-checked isDoorDeliver isDoorDeliver_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?>"
                                                    id="dvthem1"
                                                    <?php echo($receiver->extraServices[0]->isDoorDeliver)? 'checked' : '' ?> />
                                                <span class="pl-1">
                                                    <?= lang('Label.lbl_txtIsDoorDeliver') ?></span></label><br>
                                            <label>
                                                <input type="checkbox"
                                                    name="isPorter_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?>"
                                                    class="frm-check regular-checkbox or-radio-checked isPorter isPorter_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?>"
                                                    id="dvthem1a"
                                                    <?php echo($receiver->extraServices[0]->isPorter)? 'checked' : '' ?> />
                                                <span class="pl-1"><?= lang('Label.lbl_txtIsPorter') ?></span></label>
                                        </li>
                                    </ul>
                                    <?php }else{ ?>
                                    <!-- pickupType -->
                                    <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                                        <li class="or-cgc-1">
                                            <?= lang('Label.lbl_txtPickupType') ?><br>
                                            <input type="radio" value="1"
                                                name="pickupType_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?>"
                                                class="or-radio-checked pickupTypeYes pickupTypeYes_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?>"
                                                id="pickupType"
                                                <?php echo($dataOrders->pickupType == '1')? 'checked' : '' ?> />
                                            <label for="pickupType"><?= lang('Label.lbl_txtYes') ?></label><br>
                                            <input type="radio" value="2"
                                                name="pickupType_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?>"
                                                class="or-radio-checked pickupTypeNo pickupTypeNo_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?>"
                                                id="pickupTypea"
                                                <?php echo($dataOrders->pickupType != '1')? 'checked' : '' ?> />
                                            <label for="pickupTypea"><?= lang('Label.lbl_txtNo') ?></label>
                                        </li>
                                    </ul>
                                    <?php } ?>
                                    <!-- requireNote -->
                                    <ul class="col-xl-4 col-sm-12 or-ctdh-1">
                                        <li><?= lang('Label.lbl_txtNoteRequired') ?><span style="color: #885DE5;">
                                                *</span><br>
                                            <select
                                                class="chosen-select requireNote requireNote_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?>"
                                                name="requireNote_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?>"
                                                style="width: 100%;"
                                                id="requireNote_<?= $point->deliveryPointIndex.'_'. $receiverIndex ?>">
                                                <option value="1"><?= lang('Label.lbl_txtNoteRequired1') ?></option>
                                                <option value="2"><?= lang('Label.lbl_txtNoteRequired2') ?></option>
                                                <option value="3" selected><?= lang('Label.lbl_txtNoteRequired3') ?>
                                                </option>
                                            </select>
                                            <br><span
                                                class="err_messages err_requireNote err_requireNote_<?= $point->deliveryPointIndex.'_'.$receiverIndex ?>">
                                            </span>
                                        </li>
                                    </ul>

                                    <!-- End Receiver Service Form -->
                                    <!-- Button Save Receiver -->
                                    <?php if($dataOrders->packType == 2){ ?>
                                    <ul class="col-md-6 col-sm-0">
                                    </ul>
                                    <ul class="col-md-3 col-sm-6 or-ctdh-btn1">
                                        <button type="button"
                                            class="cancelReceiver_<?= $point->deliveryPointIndex.'_'.$receiverIndex ?>"
                                            onclick="removeReceiver(<?= $point->deliveryPointIndex ?>, <?= $receiverIndex ?>)"><?= lang('Label.lbl_txtCancel') ?></button>
                                    </ul>
                                    <ul class="col-md-3 col-sm-6  or-ctdh-btn2">
                                        <button
                                            class="closePickupOrder saveReceiver_<?= $point->deliveryPointIndex.'_'.$receiverIndex ?> closePickupOrder_<?= $point->deliveryPointIndex.'_'.$receiverIndex ?>"
                                            onclick="saveReceiver(<?= $point->deliveryPointIndex ?>, <?= $receiverIndex ?>, 'addReceiver')"
                                            type="button"><?= lang('Label.lbl_txtFinish') ?>
                                        </button>
                                        <br><span
                                            class="err_messages err_saveReceiver_<?= $point->deliveryPointIndex ?>">
                                        </span>
                                    </ul>
                                    <?php } ?>
                                    <!-- End Button Save Receiver -->
                                </div>
                            </div>
                        </div>
                        <!-- End Receiver From -->
                        <?php } ?>
                        <?php } ?>
                        <!-- End Receiver Info -->
                    </div>
                    <?php if($dataOrders->packType == 1){ ?>
                    <div class="or-tttx-in-line">
                        <img src="<?php echo base_url('public/images/Rectangle88.png');?>" alt="">
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
                <?php } ?>
                <!-- End Delivery Point -->
            </div>
            <!-- Button Add Delivery Point -->
            <?php if($dataOrders->packType == 2){ ?>
            <div class="btn-add-orders ">
                <div>
                    <img src="<?php echo base_url('public/images/Group284.png');?>" alt="" class="or-img-tdg">
                </div>
                <button type="button" class="or-tdg-btn addDeliveryPoint"
                    totalPoint="<?= $dataOrders->deliveryPointIndexNext -1 ?>"
                    onclick="addDeliveryPoint(<?= $dataOrders->deliveryPointIndexNext ?>, 1)">
                    <img src="<?php echo base_url('public/images/tdg2.png');?>" alt="" class="float-left pl-2">
                    <?= lang('Label.lbl_txtExtraAddress') ?></button>
            </div>
            <div class="or-tttx row mb-0">
                <ul class="col-md-3 col-sm-12 or-tttx-1">
                    <div class="or-tttx-in-line">
                        <img src="<?php echo base_url('public/images/Rectangle88.png');?>" alt="">
                    </div>
                    <li>
                        <b><?= lang('Label.lbl_txtShipperInfo') ?></b>
                    </li>
                </ul>
                <ul class="col-md-3 col-4 or-tttx-2 or-cgc-1">
                    <li>
                        <?= lang('Label.lbl_txtShipperPhone') ?>
                    </li>
                </ul>
                <ul class="col-sm-6  col-12 or-tttx-3">
                    <li>
                        <!-- expectShipperPhone -->
                        <input name="expectShipperPhone" class="expectShipperPhone" value="" type="text"
                            placeholder="<?= lang('Label.lbl_txtExpectShipperPhone') ?>">
                    </li>
                </ul>
            </div>
            <?php } ?>
            <!-- End Button Add Delivery Point -->
        </div>
    </div>
    <!-- Button Next Step -->
    <?php if($dataOrders->packType == 2){ ?>
    <div class="or-btn-tt">
        <ul class="row">
            <li class="col-md-9 col-sm-6 col-0"></li>
            <li class="col-md-3 col-sm-6 col-12 or-ttnh-input">
            <button class="nextPostageKm" onclick="confirmOptimizeOrder(1,1)"><?= lang('Label.lbl_txtNext') ?></button>
            </li>
        </ul>
    </div>
    <?php }else if($dataOrders->packType == 1){ ?>
    <div class="or-btn-tt">
        <ul class="row">
            <li class="col-md-9 col-sm-6 col-0"></li>
            <li class="col-md-3 col-sm-6 col-12 or-ttnh-input">
                <button class="nextPostageSp" onclick="nextPostageSp(1)"><?= lang('Label.lbl_txtNext') ?></button>
            </li>
        </ul>
    </div>
    <?php } ?>
    <!-- End Button Next Step -->
</section>

<!-- modal -->
<div class="modal" id="removeConfirm">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 17%;">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title headerFalse"></h5>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row modal-body-content">
                    <div class="col-12 textCenter bodyOrderFalse">
                        <p class="fz13 notiText"></p>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer customize-approve">
                <button type="button" class="btn btn-modal" data-dismiss="modal">
                    <?= lang('Label.modalClose'); ?>
                </button>
                <button type="button" class="btn btn-modal btn-confirmCustom" data-dismiss="modal">
                </button>
            </div>
        </div>
    </div>
</div>

<!-- modal optimizer order -->

<div class="modal" id="optimizerOrder">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 17%;">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title headerFalse"><?php echo lang('Label.modalHeader'); ?></h5>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row modal-body-content">
                    <div class="col-12 textCenter bodyOrderFalse">
                        <p class="fz13 notiText"><?php echo lang('Label.lbl_optimizerOrderConfirm') ?></p>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer customize-approve">
                <button type="button" onclick="nextPostageKm(1,0)" class="btn btn-modal"> <?= lang('Label.lbl_optimizerNo'); ?> </button>
                <button type="button" onclick="nextPostageKm(1,1)" class="btn btn-modal btn-confirmCustom"> <?= lang('Label.lbl_optimizerYes'); ?> </button>
            </div>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal" id="modalConfirmChangeRefund" style="background: rgb(218 218 218 / 75%);">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 17%;">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title headerFalse">Thông báo</h5>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row modal-body-content">
                    <div class="col-12 textCenter bodyOrderFalse ">
                        <p class="bodyCheckCodValueText"><?php echo lang('Label.lbl_checkConfirmChangeRefund') ?></p>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer customize-approve">
                <button type="button" data-dismiss="modal" class="btn btn-modal btn-confirmChangeRefund"> <?= lang('Label.lbl_confirmOrder'); ?> </button>
            </div>
        </div>
    </div>
</div>

<style>
.dropdown .dropdown-menu .dropdown-item:hover {
    background-color: white;
    cursor: pointer;
}
</style>
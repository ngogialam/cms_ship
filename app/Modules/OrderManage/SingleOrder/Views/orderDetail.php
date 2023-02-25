<section id="orders">
    <div class="warehouse-banner-title row">
        <ul class="col-md-3" style="margin-bottom: 9px;">
            <li><img src="<?php echo base_url('public/images/Home.png');?>" alt=""></li>
            <li class="mt2-config title-page"> > <span><?= lang('Label.lbl_order') ?> </span> > <span><?php echo $title ?></span></li>
        </ul>
        <div class="col-md-6 row" style="margin-bottom: 9px;">
            <div class="col-4 pr-0">
                <ul class="or-banner1 ol-0">
                    <li style="background: #2DB1DB!important;color: white!important;line-height: 20px;">1</li>
                    <li style="color: #2DB1DB!important;" class="or-cgc-1"><?=$dataOrders->packName;?></li>
                </ul>
            </div>
            <div class=" col-4 pr-0">
                <ul class="or-banner">
                    <li>2</li>
                    <li class="or-cgc-1 "><?= lang('Label.lbl_setInfo'); ?></li>
                </ul>
            </div>
            <div class="col-4 pr-0 pl-0">
                <ul class="or-banner1">
                    <li style="line-height: 20px;">3</li>
                    <li class="or-cgc-1"><?= lang('Label.lbl_confirmOrder'); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <input type="hidden" name="packCode" value="<?= $packCode ?>">
    <input type="hidden" name="packType" value="<?= $packType ?>">
    <input type="hidden" name="deliveryPointNumber" value="<?= ($keyPoints+1) ?>">
    <div class="d-flex main-orders">
        <div class="line-left-orders">
            <div>
                <img src="<?php echo base_url('public/images/Polygon8.png');?>" alt="">
            </div>
        </div>
        <div class="w100">
            <!-- Start Sender Infomation -->
            <div class="or-ttng row ">
                <ul class="col-sm-6">
                    <li><b><?= lang('Label.lbl_txtInfoSender') ?></b></li>
                </ul>
                <!-- Choose old pickupAddress -->
                <ul class="col-sm-6 ordersDetail-ttng-select">
                    <li style="height: 30px;" class="float-right">
                        <div class="dropdown orDetail-select-address">
                            <input class="dropdown-toggle choosePickUpAddress" type="button" id="dropdownMenuButton"
                                pickupAddressId="<?=($dataOrders->pickupAddressId)?>" data-toggle="dropdown"
                                value="<?=($dataOrders->pickupAddressId)? $dataPickup->name : lang('Label.lbl_createNewWareHouse') ?>"
                                style="border: none;" />
                            <input type="hidden" class="pickupAddressId" value="" name="pickupAddressId">
                            <img src="<?php echo base_url('public/images/iconDownX.png');?>" alt="">
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="dropdown-item pl-0 orDetail-data-select" href="#"
                                    style="padding-left: 21px!important;" onclick="choosePickupAddress(0)">
                                    <img src="<?php echo base_url('public/images/add.png');?>" alt="">
                                    <span
                                        style="color: #885DE5;font-size: 14px; padding-left: 4px;"><?= lang('Label.lbl_newAddress') ?></span>
                                </div>
                                <?php foreach($pickupAddress as $warehouse): ?>
                                <div class="dropdown-item pl-0  orDetail-data-select" href="#"
                                    style="padding-left: 21px!important;"
                                    onclick="choosePickupAddress(<?= $warehouse->id ?>)">
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
                                <?php endforeach; ?>
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
                            <?= lang('Label.lbl_txtNameSender') ?><span style="color: #885DE5;"> *</span>
                        </li>
                        <li>
                            <input type="text" class="pickName unNumber" name="pickName" value=""
                                placeholder="<?= lang('Label.lbl_setNameSender') ?>">
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
                                value="" placeholder="<?= lang('Label.ph_phone') ?>">
                            <span class=" err_messages err_pickPhone"><?php echo $getErrors['pickPhone']; ?></span>
                        </li>
                    </ul>
                    <ul class="col-sm-6 orDetail-input">
                        <!-- địa chỉ chi tiết -->
                        <li>
                            <?= lang('Label.lbl_senderAddress') ?><span style="color: #885DE5;"> *</span>
                        </li>
                        <li>
                            <input type="text" name="pickAddress" class="pickAddress" value=""
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
                                <option value="<?= $province['code']; ?>"> <?= $province['name']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <input type="hidden" name="district_find_pro" id="district_find_pro"
                                class="district_find_pro " value="" />
                            <input type="hidden" name="wards_find_pro" id="wards_find_pro" class="wards_find_pro"
                                value="" />
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
                                <option value="<?= $district['code']; ?>"> <?= $district['name']; ?>
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
                                <option value="<?= $ward['code']; ?>"> <?= $ward['name']; ?>
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
            <!-- New order -->
            <div class="ttdh-main" id="OrderSingle">
                <?php $points = $dataOrders->deliveryPoint; 
                if (!empty($points)) {
                    $totalPoints = count($points);
                    foreach ($points as $keyPoints => $point) { ?>
                <div id="point_<?= ($keyPoints+1) ?>">
                    <div class="or-dgh-1 pb-3" style="margin-left: -40px;">
                        <span class="or-dh-stt" style="background-color: #2DB1DB;"><?= ($keyPoints+1) ?></span>
                        <?= lang('Label.lbl_orderReceiver') ?>
                    </div>
                    <div class="or-ttdh row">
                        <!-- Address Points -->
                        <div class="row w100 col-12 receiverWrapper">
                            <ul class="or-dgh col-sm-6 mb-0">
                                <li class="or-dgh-2">
                                    <!-- Địa chỉ người nhận -->
                                    <input name="pointAddress" type="text"
                                        class="pointAddress address_<?= ($keyPoints+1) ?>"
                                        onblur="addAddressDetail(<?= ($keyPoints+1) ?>)"
                                        deliveryPointIndex="<?= ($keyPoints+1) ?>"
                                        value="<?= $point->deliveryAddress ?>"
                                        placeholder="<?= lang('Label.lbl_orderAddressReceiver'); ?>">
                                    <span class=" err_messages err_address_<?= ($keyPoints+1) ?>"></span>
                                </li>
                            </ul>
                            <!-- Change Province -->
                            <ul class="col-sm-6 row orDetail-input orderDetail-chosen pr-0 orderDetail_<?= ($keyPoints+1) ?> <?= $point->deliveryAddress? 'address_show' : 'address_v2'; ?>"
                                style="padding-top: 24px;">
                                <!-- Receiver province -->
                                <li class="col-md-4 mb-2 pr-0 provinceReceiver_<?= ($keyPoints+1)?>">
                                    <select name="pointProvice" index_prov="<?= ($keyPoints+1) ?>"
                                        id="provinceReceiver_<?= ($keyPoints+1)?>"
                                        class="form-control frm-lg chosen-select order_province_code_from ">
                                        <option value="0"><?= lang('Label.lbl_orderWareHouseProvince'); ?></option>
                                        <?php foreach($dataProvinces as $province): ?>
                                        <option <?= ($point->deliveryPorvince == $province['code'] ) ?'selected' : '' ?>
                                            value="<?= $province['code']; ?>"> <?= $province['name']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <input type="hidden" class="province_find_pro_<?= ($keyPoints+1)?>">
                                    <input type="hidden" class="district_find_pro_<?= ($keyPoints+1)?>">
                                    <input type="hidden" class="wards_find_pro_<?= ($keyPoints+1)?>">
                                    <span
                                        class=" err_messages err_province_<?= ($keyPoints+1)?>"><?php echo $getErrors['province']; ?></span>
                                </li>
                                <!-- Receiver district -->
                                <li class="col-md-4 mb-2 pr-0 districtReceiver_<?= ($keyPoints+1)?>">
                                    <select name="pointDistrict" index_dict="<?= ($keyPoints+1) ?>" placeholder=""
                                        id="districtReceiver_<?= ($keyPoints+1)?>"
                                        class="form-control frm-lg chosen-select order_district_code_from ">
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
                                        class=" err_messages err_district_<?= ($keyPoints+1)?>"><?php echo $getErrors['district']; ?></span>
                                </li>
                                <!-- Receiver ward -->
                                <li class="col-md-4 mb-2 pr-0 wardReceiver_<?= $index->receiverIndex?>">
                                    <select name="pointWard" index_ward="<?= $index->receiverIndex ?>"
                                        id="wardReceiver_<?= ($keyPoints+1)?>"
                                        class="form-control frm-lg chosen-select order_ward_code_from ">
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
                                        class=" err_messages err_ward_<?= ($keyPoints+1)?>"><?php echo $getErrors['ward']; ?></span>
                                </li>
                            </ul>
                        </div>
                        <!-- End Address Points -->
                        <?php $receivers = $point->receivers;
                                    if(!empty($receivers)){
                                        if(($keyPoints + 1) < $totalPoints){ ?>
                        <!-- After click hoàn thành ( filter order detail) -->
                        <div class="or-ttng receiverInfo row w100 afOrder_<?= ($keyPoints+1) ?>">
                            <?php foreach ($receivers as $keyReceivers => $receiver): ?>
                            <div class="row w100 1 afOrder_<?= ($keyPoints+1) .'_'. (($keyReceivers+1)) ?>"
                                style="line-height: 32px;padding: 10px 0;background: #F8F8F8;margin: 15px 20px!important;border-radius: 5px;">
                                <div class=" col-lg-3 col-md-12 senderItems" style="position: relative;">
                                    <span
                                        class="or-dh-stt success_receiverIndex_<?= ($keyPoints+1) .'_'.($keyReceivers+1) ?>"
                                        style="background: #8D869D;position: absolute; line-height:12px;"><?= ($keyReceivers+1) ?></span>
                                    <ul style="padding: 0px 40px;">
                                        <li
                                            class="fz13 success_receiverPhone_<?= ($keyPoints+1) .'_'.($keyReceivers+1) ?>">
                                            <?= $receiver->receiverPhone ?></li>
                                        <li class="fz13 success_receiverName_<?= ($keyPoints+1) .'_'.($keyReceivers+1) ?>"
                                            style="color:#68656D"><?= $receiver->receiverName ?></li>
                                    </ul>
                                </div>
                                <div class=" col-lg-8 col-md-12">
                                    <?php
                        $items = $receiver->items;
                        foreach($items as $keyItem => $item):
                            $productIndex = $keyItem + 1;
                    ?>
                                    <div class="row">
                                        <div
                                            class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13 success_receiverItem_productName_<?= ($keyPoints+1) ?>_<?= ($keyReceivers+1) ?>_<?= ($keyItem+1) ?>">
                                            <span><?= $item->productName ?></span>
                                        </div>
                                        <div
                                            class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13 success_receiverItem_productQuantity_<?= ($keyPoints+1) ?>_<?= ($keyReceivers+1) ?>_<?= ($keyItem+1) ?>">
                                            <?= lang('Label.lbl_detailQuantity') ?>: <span
                                                class="colorPurple"><?= number_format($item->productQuantity) ?></span>
                                        </div>
                                        <div
                                            class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13 success_receiverItem_productCod_<?= ($keyPoints+1) ?>_<?= ($keyReceivers+1) ?>_<?= ($keyItem+1) ?>">
                                            <?= lang('Label.lbl_detailCOD') ?>: <span
                                                class="colorOrange"><?= number_format($item->productQuantity * $item->productCOD) ?></span>
                                            đ
                                        </div>
                                        <div
                                            class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13 success_receiverItem_productValue_<?= ($keyPoints+1) ?>_<?= ($keyReceivers+1) ?>_<?= ($keyItem+1) ?>">
                                            <?= lang('Label.lbl_detailProductValue') ?>:
                                            <?= number_format($item->productQuantity * $item->productValue) ?> đ</div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class=" col-lg-1 col-md-12 col-sm-6 col-xs-6 buttonItems">
                                    <span><img class="delReceiver" src="/public/images/or-delete.png"
                                            onclick="delReceiver(<?= ($keyPoints+1) ?>, <?= ($keyReceivers+1) ?>)"></span>
                                    <span><img class="editReceiver" src="/public/images/or-edit.png"
                                            onclick="editReceiver(<?= ($keyPoints+1) ?>, <?= ($keyReceivers+1) ?>)"></span>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <!-- End click hoàn thành -->
                        <?php }else{ 
                                            $totalReceiver = count($receivers); ?>
                        <!-- After click hoàn thành ( filter order detail) -->
                        <div class="or-ttng receiverInfo row w100 afOrder_<?= ($keyPoints+1)?>"
                            <?php echo($totalReceiver == 1)? 'style="display: none"' : '' ?>>
                            <?php foreach ($receivers as $keyReceivers => $receiver) { ?>
                            <?php if(($keyReceivers + 1) < $totalReceiver){ ?>
                            <div class="row w100 2 afOrder_<?= ($keyPoints+1) .'_'.($keyReceivers+1) ?>"
                                style="line-height: 32px;padding: 10px 0;background: #F8F8F8;margin: 15px 20px!important;border-radius: 5px;">
                                <div class=" col-lg-3 col-md-12 senderItems" style="position: relative;">
                                    <span
                                        class="or-dh-stt success_receiverIndex_<?= ($keyPoints+1) .'_'.($keyReceivers+1) ?>"
                                        style="background: #8D869D;position: absolute; line-height:12px;"><?= ($keyReceivers+1) ?></span>
                                    <ul style="padding: 0px 40px;">
                                        <li
                                            class="fz13 success_receiverPhone_<?= ($keyPoints+1) .'_'.($keyReceivers+1) ?>">
                                            <?= $receiver->receiverPhone ?></li>
                                        <li class="fz13 success_receiverName_<?= ($keyPoints+1) .'_'.($keyReceivers+1) ?>"
                                            style="color:#68656D"><?= $receiver->receiverName ?></li>
                                    </ul>
                                </div>
                                <div class=" col-lg-8 col-md-12">
                                    <?php
                                                                        $items = $receiver->items;
                                                                        foreach($items as $keyItem => $item):
                                                                            $productIndex = $keyItem + 1;
                                                                    ?>
                                    <div class="row">
                                        <div
                                            class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13 success_receiverItem_productName_<?= ($keyPoints+1) ?>_<?= ($keyReceivers+1) ?>_<?= ($keyItem+1) ?>">
                                            <span><?= $item->productName ?></span>
                                        </div>
                                        <div
                                            class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13 success_receiverItem_productQuantity_<?= ($keyPoints+1) ?>_<?= ($keyReceivers+1) ?>_<?= ($keyItem+1) ?>">
                                            <?= lang('Label.lbl_detailQuantity') ?>: <span
                                                class="colorPurple"><?= number_format($item->productQuantity) ?></span>
                                        </div>
                                        <div
                                            class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13 success_receiverItem_productCod_<?= ($keyPoints+1) ?>_<?= ($keyReceivers+1) ?>_<?= ($keyItem+1) ?>">
                                            <?= lang('Label.lbl_detailCOD') ?>: <span
                                                class="colorOrange"><?= number_format($item->productQuantity * $item->productCOD) ?></span>
                                            đ
                                        </div>
                                        <div
                                            class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13 success_receiverItem_productValue_<?= ($keyPoints+1) ?>_<?= ($keyReceivers+1) ?>_<?= ($keyItem+1) ?>">
                                            <?= lang('Label.lbl_detailProductValue') ?>:
                                            <?= number_format($item->productQuantity * $item->productValue) ?> đ</div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class=" col-lg-1 col-md-12 col-sm-6 col-xs-6 buttonItems">
                                    <span><img class="delReceiver" src="/public/images/or-delete.png"
                                            onclick="delReceiver(<?= ($keyPoints+1) ?>, <?= ($keyReceivers+1) ?>)"></span>
                                    <span><img class="editReceiver" src="/public/images/or-edit.png"
                                            onclick="editReceiver(<?= ($keyPoints+1) ?>, <?= ($keyReceivers+1) ?>)"></span>
                                </div>
                            </div>
                            <?php }
                                                } ?>
                        </div>
                        <!-- End click hoàn thành -->
                        <?php if($dataOrders->packType == 2){ ?>
                        <div class="btn-add-orders">
                            <button type="button" deliveryPointIndex='<?= ($keyPoints+1) ?>'
                                receiverIndex='<?= $index->receiverIndex ?>' productIndex='1'
                                onclick="addReceiver(<?= ($keyPoints+1) ?>)"
                                class="or-tctdn-btn dpn addProductItem addProductItem_<?= ($keyPoints+1) ?>">
                                <img src="<?php echo base_url('public/images/tdg2.png');?>" alt=""
                                    class="float-left pl-2">
                                <?= lang('Label.lbl_addNewOrderProduct') ?>
                            </button>
                        </div>
                        <?php } ?>
                        <!-- Order info -->
                        <div
                            class="or-ttng row w100 form_receiverOrder_<?= ($keyPoints+1) ?> receiverOrder_<?= ($keyPoints+1).'_'.$index->receiverIndex ?>">
                            <div class="chinhsua1 mb-1">
                                <!-- ========HIỂN THỊ KHI CLICK VÀO SỬA ĐƠN HÀNG ========= -->
                                <div id="orders"
                                    class="or-ttdh row qo-ttdhl receiver-<?= ($keyPoints+1).'-'.$index->receiverIndex?>">
                                    <ul class="or-dgh col-12 ">
                                        <li class="or-dgh-1 pt-0 mt-0">
                                            <span class="or-dh-stt form_receiverIndex"
                                                style="background: #F0A616;"><?= $index->receiverIndex ?></span>
                                            <span style="color: #68656D;"><?= lang('Label.lbl_addOrderDetail') ?></span>
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
                                                    <input name="receiverPhone" value="<?=$receiver->receiverPhone?>"
                                                        receiverIndex="<?= $index->receiverIndex ?>"
                                                        deliveryPointIndex="<?= ($keyPoints+1) ?>"
                                                        onblur="ValidateReceiverPhone(<?= ($keyPoints+1) ?>, <?= $index->receiverIndex ?>)"
                                                        type="text"
                                                        class="receiverPhone receiverPhone_<?= ($keyPoints+1).'_'.$index->receiverIndex ?>"
                                                        onkeypress="return isNumber(event)"
                                                        placeholder="<?= lang('Label.ph_phone') ?>"><br>
                                                    <span
                                                        class=" err_messages err_receiverPhone_<?= ($keyPoints+1).'_'.$index->receiverIndex ?>">
                                                    </span>
                                                </li>
                                                <li class="col-md-3 col-sm-6 or-cgc-1">
                                                    <?= lang('Label.lbl_txtReceiverName') ?><span
                                                        style="color: #885DE5;"> *</span> <br>
                                                    <!-- receiver name -->
                                                    <input name="receiverName" value="<?=$receiver->receiverName?>"
                                                        receiverIndex="<?= $index->receiverIndex ?>"
                                                        deliveryPointIndex="<?= ($keyPoints+1) ?>"
                                                        onblur="ValidateReceiverName(<?= ($keyPoints+1) ?>, <?= $index->receiverIndex ?>)"
                                                        class="receiverName unNumber receiverName_<?= ($keyPoints+1).'_'.$index->receiverIndex ?>"
                                                        type="text"
                                                        placeholder="<?= lang('Label.lbl_txtReceiverName') ?>"><br>
                                                    <span
                                                        class=" err_messages err_receiverName_<?= ($keyPoints+1).'_'.$index->receiverIndex ?>">
                                                    </span>
                                                </li>
                                                <li class="col-md-3 col-sm-6 or-cgc-1">
                                                    <?= lang('Label.lbl_txtReceiverDate') ?><br>
                                                    <!-- expectDate -->
                                                    <input name="receiverExpectDate"
                                                        receiverIndex="<?= $index->receiverIndex ?>"
                                                        deliveryPointIndex="<?= ($keyPoints+1) ?>" type="text"
                                                        value="<?=$receiver->expectDate?>"
                                                        class="orderdatePicker expectDate expectDate_<?= ($keyPoints+1).'_'.$index->receiverIndex ?>"
                                                        style="padding-right: 10px;">
                                                </li>
                                                <li class="col-md-3 col-sm-6 or-cgc-1">
                                                    <?= lang('Label.lbl_txtReceiverTime') ?><br>
                                                    <!-- expectTime -->
                                                    <input name="receiverExpectTime" value="<?=$receiver->expectTime?>"
                                                        receiverIndex="<?= $index->receiverIndex ?>"
                                                        deliveryPointIndex="<?= ($keyPoints+1) ?>" type="time"
                                                        class="or-ttnh-input expectTime_<?= ($keyPoints+1).'_'.$index->receiverIndex ?>">
                                                </li>
                                            </ul>
                                        </li>

                                        <!-- Thông tin hàng hóa -->
                                        <li class="or-ttnh">
                                            <ul>
                                                <li class="or-ttnh-tt"><?= lang('Label.lbl_txtGoodInfo') ?></li>
                                            </ul>
                                            <!-- Nếu có thêm mới hàng hóa thì phần này sẽ đươc hiện -->
                                            <div style="width: 100%;"
                                                class="ttsp productSuccess_<?= ($keyPoints+1).'_'.$index->receiverIndex ?>"
                                                id="ttsp_<?= ($keyPoints+1).'_'.$index->receiverIndex ?>">
                                                <?php $items = $receiver->items;
                                                                    foreach ($items as $keyItems => $item) {
                                                                        if($item->productName && $item->productCate && $item->productQuantity && $item->productCOD && $item->productValue){ ?>
                                                <ul
                                                    class="col-12 productDetail productDetail_<?= ($keyPoints+1).'_'.$index->receiverIndex.'_'.($keyItems+1) ?>">
                                                    <li class="or-ttdh-add">
                                                        <ul class="row">
                                                            <li class="or-dh-tt col-sm-3 pl-2">
                                                                <span class="or-dh-stt"
                                                                    style="background: #885DE5;"><?=($keyItems+1)?></span>
                                                                <span
                                                                    class="success_productName_<?=($keyPoints+1)?>_<?=($keyReceivers+1)?>_<?=($keyItems+1)?>"
                                                                    productname="<?=$item->productName?>"><?=$item->productName?></span>
                                                            </li>
                                                            <li class="or-dh-sp col-sm-3">
                                                                <span
                                                                    class="success_productCate_<?=($keyPoints+1)?>_<?=($keyReceivers+1)?>_<?=($keyItems+1)?>"
                                                                    productcate="<?=$item->productCate?>"><?=$item->productCateName?></span>
                                                            </li>
                                                            <li class="or-dh-sl col-sm-1">
                                                                SL: <span
                                                                    class="success_productQuantity_<?=($keyPoints+1)?>_<?=($keyReceivers+1)?>_<?=($keyItems+1)?>"
                                                                    productquantity="<?=$item->productQuantity?>"><?=$item->productQuantity?></span>
                                                            </li>
                                                            <li class="or-dh-cod col-sm-2">
                                                                COD: <span
                                                                    class="success_productCOD_<?=($keyPoints+1)?>_<?=($keyReceivers+1)?>_<?=($keyItems+1)?>"
                                                                    productcod="<?=$item->productCOD?>"><?=number_format($item->productCOD)?></span>
                                                                đ
                                                            </li>
                                                            <li class="or-dh-kg col-sm-2">
                                                                Khai giá: <span
                                                                    class="success_productValue_<?=($keyPoints+1)?>_<?=($keyReceivers+1)?>_<?=($keyItems+1)?>"
                                                                    productvalue="<?=$item->productValue?>"><?=number_format($item->productValue)?></span>
                                                                đ
                                                            </li>
                                                            <li class="or-dh-ed col-sm-1">
                                                                <img src="/public/images/or-delete.png"
                                                                    onclick="removeProduct(<?=($keyPoints+1)?>, <?=($keyReceivers+1)?>, <?=($keyItems+1)?>)">
                                                                <img src="/public/images/or-edit.png"
                                                                    onclick="editProduct(<?=($keyPoints+1)?>, <?=($keyReceivers+1)?>, <?=($keyItems+1)?>)">
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <?php }
                                                                    }
                                                                ?>
                                            </div>
                                            <!-- END hàng hóa -->
                                            <ul class="row">
                                                <li class="col-md-6 col-sm-12">
                                                    <?= lang('Label.lbl_txtGoodName') ?><span
                                                        style="color: #885DE5;">*</span> <br>
                                                    <!-- product name -->
                                                    <input name="productName" vallue=""
                                                        deliveryPointIndex="<?= ($keyPoints+1) ?>"
                                                        receiverIndex="<?= $index->receiverIndex ?>"
                                                        productIndex="<?= $index->productIndexNext ?>"
                                                        onblur="ValidateProductName(<?= ($keyPoints+1) ?>, <?= $index->receiverIndex ?>, <?= $index->productIndexNext ?>)"
                                                        class="productName productName_<?= ($keyPoints+1).'_'.$index->receiverIndex.'_'.$index->productIndexNext ?>"
                                                        type="text" placeholder="<?= lang('Label.lbl_inputGoodName') ?>"
                                                        id="qo-tensp-ht">
                                                    <span
                                                        class=" err_messages err_productName err_productName_<?= ($keyPoints+1).'_'.$index->receiverIndex.'_'.$index->productIndexNext ?>"><?php echo $getErrors['productName']; ?></span>
                                                </li>
                                                <li class="col-md-3 col-sm-6">
                                                    <?= lang('Label.lbl_txtCod') ?><span
                                                        style="color: #885DE5;">*</span> <br>
                                                    <!-- product COD -->
                                                    <input name="productCOD" value="0"
                                                        deliveryPointIndex="<?= ($keyPoints+1) ?>"
                                                        receiverIndex="<?= $index->receiverIndex ?>"
                                                        productIndex="<?= $index->productIndexNext ?>"
                                                        onblur="ValidateProductCOD(<?= ($keyPoints+1) ?>, <?= $index->receiverIndex ?>, <?= $index->productIndexNext ?>)"
                                                        onkeypress="return isNumber(event)" type="text"
                                                        class="or-cod productCOD productCOD_<?= ($keyPoints+1).'_'. $index->receiverIndex.'_'.$index->productIndexNext ?>"
                                                        id="qo-cod-ht">
                                                    <span style="margin-left: -34px;"> đ</span>
                                                    <span
                                                        class=" err_messages err_productCOD err_productCOD_<?= ($keyPoints+1).'_'. $index->receiverIndex.'_'.$index->productIndexNext ?>"><?php echo $getErrors['ward']; ?></span>
                                                </li>
                                                <li class="col-md-3 col-sm-6 or-cgc-1">
                                                    <!-- product value check -->
                                                    <input name="checkProductValue" value="1"
                                                        deliveryPointIndex="<?= ($keyPoints+1) ?>"
                                                        receiverIndex="<?= $index->receiverIndex ?>"
                                                        productIndex="<?= $index->productIndexNext ?>" checked
                                                        type="checkbox"
                                                        class="regular-checkbox mb-0 checkProductValue checkProductValue_<?= ($keyPoints+1).'_'. $index->receiverIndex.'_'.$index->productIndexNext ?>"
                                                        style="width: 10px;height: 10px;">
                                                    <label
                                                        for="checkProductValue"><?= lang('Label.lbl_txtGoodValue') ?></label><span
                                                        style="color: #885DE5;"> *</span> <br>
                                                    <!-- product value -->
                                                    <input name="productValue" value="0"
                                                        deliveryPointIndex="<?= ($keyPoints+1) ?>"
                                                        receiverIndex="<?= $index->receiverIndex ?>"
                                                        productIndex="<?= $index->productIndexNext ?>"
                                                        onblur="ValidateProductValue(<?= ($keyPoints+1) ?>, <?= $index->receiverIndex ?>, <?= $index->productIndexNext ?>)"
                                                        type="text" onkeypress="return isNumber(event)"
                                                        class="or-ttnh-input or-gtkg productValue productValue_<?= ($keyPoints+1).'_'. $index->receiverIndex.'_'.$index->productIndexNext ?>"
                                                        id="qo-khaigia-ht">
                                                    <span style="margin-left: -34px;"> đ</span></br>
                                                    <span
                                                        class=" err_messages err_productValue err_productValue_<?= ($keyPoints+1).'_'. $index->receiverIndex.'_'.$index->productIndexNext ?>"><?php echo $getErrors['ward']; ?></span>
                                                </li>
                                            </ul>
                                            <ul class="row">
                                                <li class="col-md-6 col-sm-12">
                                                    <?= lang('Label.lbl_txtGoodType'); ?><span
                                                        style="color: #885DE5;">*</span> <br>
                                                    <!-- product category -->
                                                    <select name="productCategory"
                                                        deliveryPointIndex="<?= ($keyPoints+1) ?>"
                                                        receiverIndex="<?= $index->receiverIndex ?>"
                                                        productIndex="<?= $index->productIndexNext ?>"
                                                        onchange="ValidateProductCate(<?= ($keyPoints+1) ?>, <?= $index->receiverIndex ?>, <?= $index->productIndexNext ?>)"
                                                        style="padding-right: 10px;"
                                                        placeholder="<?= lang('Label.lbl_txtCategory') ?>"
                                                        id="productCategory_<?= ($keyPoints+1).'_'. $index->receiverIndex.'_'.$index->productIndexNext ?>"
                                                        class="chosen-select productCategory productCategory_<?= ($keyPoints+1).'_'. $index->receiverIndex.'_'.$index->productIndexNext ?>">
                                                        <option value="0"><?= lang('Label.lbl_txtCategory') ?></option>
                                                        <?php foreach($arrProductCategory as $keyProductCate => $productCategory): ?>
                                                        <option value="<?= $keyProductCate ?>"><?= $productCategory ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <span
                                                        class=" err_messages err_productCategory err_productCategory_<?= ($keyPoints+1).'_'. $index->receiverIndex.'_'.$index->productIndexNext ?>"><?php echo $getErrors['ward']; ?></span>
                                                </li>
                                                <li class="col-md-3 col-sm-6">
                                                    <?= lang('Label.lbl_txtGoodQuantity'); ?><span
                                                        style="color: #885DE5;">
                                                        *</span> <br>
                                                    <!-- product quantity -->
                                                    <input name="productQuantity" value="1"
                                                        deliveryPointIndex="<?= ($keyPoints+1) ?>"
                                                        receiverIndex="<?= $index->receiverIndex ?>"
                                                        productIndex="<?= $index->productIndexNext ?>"
                                                        onblur="ValidateProductQuantity(<?= ($keyPoints+1) ?>, <?= $index->receiverIndex ?>, <?= $index->productIndexNext ?>)"
                                                        onkeypress="return isNumber(event)" style="padding-right: 10px;"
                                                        id="qo-soluong-ht"
                                                        class="productQuantity productQuantity_<?= ($keyPoints+1).'_'. $index->receiverIndex.'_'.$index->productIndexNext ?>">
                                                    <span
                                                        class=" err_messages err_productQuantity err_productQuantity_<?= ($keyPoints+1).'_'. $index->receiverIndex.'_'.$index->productIndexNext ?>"><?php echo $getErrors['ward']; ?></span>
                                                </li>
                                                <li class="col-md-3 col-sm-6">
                                                    <br>
                                                    <!-- btn save -->
                                                    <input type="hidden" class="productIndexNext" name="" value="">
                                                    <button type="button" class="or-lhh-btn saveProduct"
                                                        onclick="saveProduct(<?= ($keyPoints+1) ?>, <?= $index->receiverIndex ?>, <?= $index->productIndexNext ?>, 'addProduct')"
                                                        deliveryPointIndex="<?= ($keyPoints+1) ?>"
                                                        receiverIndex="<?= $index->receiverIndex ?>"
                                                        productIndex="<?= $index->productIndexNext ?>"
                                                        id="qo-btn-thh-1-<?= ($keyPoints+1).'-'.$index->receiverIndex ?>"><?= lang('Label.lbl_txtGoodSave') ?>
                                                    </button>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul class="col-12">
                                        <li class="or-dvht">
                                            <?= lang('Label.lbl_txtSupportServices') ?>
                                        </li>
                                    </ul>
                                    <ul class="col-md-3 col-sm-6 or-ctdh-1">
                                        <li>
                                            <?= lang('Label.lbl_txtGoodSize') ?><span style="color: #885DE5;">
                                                *</span><br>
                                            <!-- length -->
                                            <input name="size"
                                                value="<?= $receiver->length ? $receiver->length.' - ' : ''?><?= $receiver->width ? $receiver->width.' - ' : '' ?><?= $receiver->height ?>"
                                                type="text" placeholder="<?=lang('Label.lbl_txtPlaceholderSize')?>"
                                                class="size_<?= ($keyPoints+1).'_'. $index->receiverIndex ?>"
                                                onblur="ValidateSize(<?= ($keyPoints+1) ?>, <?= $index->receiverIndex ?>)">
                                            <span style="margin-left: -34px;">Cm</span>
                                            <br><span
                                                class="err_messages err_size_<?= ($keyPoints+1).'_'.$index->receiverIndex ?>">
                                            </span>
                                        </li>
                                    </ul>
                                    <ul class="col-md-3 col-sm-6 or-ctdh-1">
                                        <li>
                                            <?= lang('Label.lbl_txtGoodWeight') ?><span style="color: #885DE5;">
                                                *</span><br>
                                            <!-- weight -->
                                            <input value="<?= $receiver->weight ?>" name="weight" type="text"
                                                class="weight_<?= ($keyPoints+1).'_'.$index->receiverIndex ?>"
                                                onblur="ValidateWeight(<?= ($keyPoints+1) ?>, <?= $index->receiverIndex ?>)">
                                            <span style="margin-left: -50px;">Gram</span>
                                            <br><span
                                                class="err_messages err_weight_<?= ($keyPoints+1).'_'.$index->receiverIndex ?>">
                                            </span>
                                        </li>
                                    </ul>
                                    <ul class="col-md-6 col-sm-12 or-ctdh-1">
                                        <li>
                                            <?= lang('Label.lbl_txtExtraNote') ?><br>
                                            <!-- note -->
                                            <input name="note" value="<?= $receiver->note ?>" type="text"
                                                class="or-ttnh-input1 note_<?= ($keyPoints+1).'_'. $index->receiverIndex ?>">
                                        </li>
                                    </ul>
                                    <?php if($dataOrders->packType == 2){ ?>
                                    <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                                        <li class="or-cgc-1">
                                            <?= lang('Label.lbl_txtPayerFee') ?><span style="color: #885DE5;">
                                                *</span><br>
                                            <!-- isFree -->
                                            <input type="radio" name="isFree"
                                                class="or-radio-checked isFreeYes_<?= ($keyPoints+1).'_'. $index->receiverIndex ?>"
                                                id="orNtc1" value="1"
                                                <?php echo($receiver->isFree == '0')? '' : 'checked' ?> />
                                            <label for="orNtc1"><?= lang('Label.lbl_txtPayerFeeSender') ?></label><br>
                                            <input type="radio" value="0" name="isFree"
                                                class="or-radio-checked isFreeNo_<?= ($keyPoints+1).'_'. $index->receiverIndex ?>"
                                                id="orNtc1a" <?php echo($receiver->isFree == '0')? 'checked' : '' ?> />
                                            <label for="orNtc1a"><?= lang('Label.lbl_txtPayerFeeReceiver') ?></label>
                                        </li>
                                    </ul>
                                    <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                                        <li class="or-cgc-1"><?= lang('Label.lbl_txtPartialDelivery') ?><span
                                                style="color: #885DE5;">
                                                *</span><br>
                                            <!-- partialDelivery -->
                                            <input type="radio" value="1" name="partialDelivery"
                                                class="or-radio-checked partialDeliveryYes_<?= ($keyPoints+1).'_'. $index->receiverIndex ?>"
                                                id="gh1p1"
                                                <?php echo($receiver->partialDelivery == '0')? '' : 'checked' ?> />
                                            <label for="gh1p1"><?= lang('Label.lbl_txtYes') ?></label><br>
                                            <input type="radio" value="0" name="partialDelivery"
                                                class="or-radio-checked partialDeliveryNo_<?= ($keyPoints+1).'_'. $index->receiverIndex ?>"
                                                id="gh1p1a"
                                                <?php echo($receiver->partialDelivery == '0')? 'checked' : '' ?> />
                                            <label for="gh1p1a"><?= lang('Label.lbl_txtNo') ?></label>
                                        </li>
                                    </ul>
                                    <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                                        <li class="or-cgc-1">
                                            <?= lang('Label.lbl_txtIsReturn') ?><br>
                                            <!-- isRefund -->
                                            <input type="radio" value="1" name="isRefund"
                                                class="or-radio-checked isRefundYes_<?= ($keyPoints+1).'_'. $index->receiverIndex ?>"
                                                id="dvch1" <?php echo($receiver->isRefund == '0')? '' : 'checked' ?> />
                                            <label for="dvch1"><?= lang('Label.lbl_txtYes') ?></label><br>
                                            <input type="radio" value="0" name="isRefund"
                                                class="or-radio-checked isRefundNo_<?= ($keyPoints+1).'_'. $index->receiverIndex ?>"
                                                id="dvch1a" <?php echo($receiver->isRefund == '0')? 'checked' : '' ?> />
                                            <label for="dvch1a"><?= lang('Label.lbl_txtNo') ?></label>
                                        </li>
                                    </ul>
                                    <ul class="col-xl-2 col-sm-3 or-ctdh-1 or-ctdh-2">
                                        <li class="or-cgc-1">
                                            <?= lang('Label.lbl_txtExtraServices') ?><br>
                                            <!-- extraServices -->
                                            <input type="checkbox" name="isDoorDeliver"
                                                class="regular-checkbox or-radio-checked isDoorDeliver_<?= ($keyPoints+1).'_'. $index->receiverIndex ?>"
                                                id="dvthem1" <?php echo($receiver->isDoorDeliver)? 'checked' : '' ?> />
                                            <label for="dvthem1"><?= lang('Label.lbl_txtIsDoorDeliver') ?></label><br>
                                            <input type="checkbox" name="isPorter"
                                                class="regular-checkbox or-radio-checked isPorter_<?= ($keyPoints+1).'_'. $index->receiverIndex ?>"
                                                id="dvthem1a" <?php echo($receiver->isPorter)? 'checked' : '' ?> />
                                            <label for="dvthem1a"><?= lang('Label.lbl_txtIsPorter') ?></label>
                                        </li>
                                    </ul>
                                    <ul class="col-xl-4 col-sm-12 or-ctdh-1">
                                        <li>
                                            <?= lang('Label.lbl_txtNoteRequired') ?><span style="color: #885DE5;">
                                                *</span><br>
                                            <select
                                                class="chosen-select requireNote requireNote_<?= ($keyPoints+1).'_'. $index->receiverIndex ?>"
                                                name="requireNote" style="width: 100%;"
                                                id="requireNote_<?= ($keyPoints+1).'_'. $index->receiverIndex ?>">
                                                <option value="1"
                                                    <?php echo($receiver->requireNote == '1')? 'selected' : '' ?>>
                                                    <?= lang('Label.lbl_txtNoteRequired1') ?></option>
                                                <option value="2"
                                                    <?php echo($receiver->requireNote == '2')? 'selected' : '' ?>>
                                                    <?= lang('Label.lbl_txtNoteRequired2') ?></option>
                                                <option value="3"
                                                    <?php echo($receiver->requireNote != '1' || $receiver->requireNote != '2')? 'selected' : '' ?>>
                                                    <?= lang('Label.lbl_txtNoteRequired3') ?></option>
                                            </select>
                                        </li>
                                    </ul>
                                    <?php }else{ ?>
                                    <ul class="col-xl-3 col-sm-4 or-ctdh-1">
                                        <li class="or-cgc-1">
                                            <?= lang('Label.lbl_txtPayerFee') ?><span style="color: #885DE5;">
                                                *</span><br>
                                            <!-- isFree -->
                                            <input type="radio" name="isFree"
                                                class="or-radio-checked isFreeYes_<?= ($keyPoints+1).'_'. $index->receiverIndex ?>"
                                                id="orNtc1" value="1"
                                                <?php echo($receiver->isFree == '0')? '' : 'checked' ?> />
                                            <label for="orNtc1"><?= lang('Label.lbl_txtPayerFeeSender') ?></label><br>
                                            <input type="radio" value="0" name="isFree"
                                                class="or-radio-checked isFreeNo_<?= ($keyPoints+1).'_'. $index->receiverIndex ?>"
                                                id="orNtc1a" <?php echo($receiver->isFree == '0')? 'checked' : '' ?> />
                                            <label for="orNtc1a"><?= lang('Label.lbl_txtPayerFeeReceiver') ?></label>
                                        </li>
                                    </ul>
                                    <ul class="col-xl-3 col-sm-4 or-ctdh-1">
                                        <li class="or-cgc-1"><?= lang('Label.lbl_txtPartialDelivery') ?><span
                                                style="color: #885DE5;">
                                                *</span><br>
                                            <!-- partialDelivery -->
                                            <input type="radio" value="1" name="partialDelivery"
                                                class="or-radio-checked partialDeliveryYes_<?= ($keyPoints+1).'_'. $index->receiverIndex ?>"
                                                id="gh1p1"
                                                <?php echo($receiver->partialDelivery == '0')? '' : 'checked' ?> />
                                            <label for="gh1p1"><?= lang('Label.lbl_txtYes') ?></label><br>
                                            <input type="radio" value="0" name="partialDelivery"
                                                class="or-radio-checked partialDeliveryNo_<?= ($keyPoints+1).'_'. $index->receiverIndex ?>"
                                                id="gh1p1a"
                                                <?php echo($receiver->partialDelivery == '0')? 'checked' : '' ?> />
                                            <label for="gh1p1a"><?= lang('Label.lbl_txtNo') ?></label>
                                        </li>
                                    </ul>
                                    <ul class="col-xl-3 col-sm-4 or-ctdh-1">
                                        <li class="or-cgc-1">
                                            <?= lang('Label.lbl_txtPickupType') ?><br>
                                            <!-- isRefund -->
                                            <input type="radio" value="1" name="pickupType"
                                                class="or-radio-checked pickupTypeYes_<?= ($keyPoints+1).'_'. $index->receiverIndex ?>"
                                                id="dvch1"
                                                <?php echo($dataOrders->pickupType == '2')? '' : 'checked' ?> />
                                            <label for="dvch1"><?= lang('Label.lbl_txtYes') ?></label><br>
                                            <input type="radio" value="2" name="pickupType"
                                                class="or-radio-checked pickupTypeNo_<?= ($keyPoints+1).'_'. $index->receiverIndex ?>"
                                                id="dvch1a"
                                                <?php echo($dataOrders->pickupType == '2')? 'checked' : '' ?> />
                                            <label for="dvch1a"><?= lang('Label.lbl_txtNo') ?></label>
                                        </li>
                                    </ul>
                                    <ul class="col-xl-3 col-sm-12 or-ctdh-1">
                                        <li>
                                            <?= lang('Label.lbl_txtNoteRequired') ?><span style="color: #885DE5;">
                                                *</span><br>
                                            <select
                                                class="chosen-select requireNote requireNote_<?= ($keyPoints+1).'_'. $index->receiverIndex ?>"
                                                name="requireNote" style="width: 100%;"
                                                id="requireNote_<?= ($keyPoints+1).'_'. $index->receiverIndex ?>">
                                                <option value="1"
                                                    <?php echo($receiver->requireNote == '1')? 'selected' : '' ?>>
                                                    <?= lang('Label.lbl_txtNoteRequired1') ?></option>
                                                <option value="2"
                                                    <?php echo($receiver->requireNote == '2')? 'selected' : '' ?>>
                                                    <?= lang('Label.lbl_txtNoteRequired2') ?></option>
                                                <option value="3"
                                                    <?php echo($receiver->requireNote != '1' || $receiver->requireNote != '2')? 'selected' : '' ?>>
                                                    <?= lang('Label.lbl_txtNoteRequired3') ?></option>
                                            </select>
                                        </li>
                                    </ul>
                                    <?php } ?>
                                    <?php if($dataOrders->packType == 2){ ?>
                                    <ul class="col-md-6 col-sm-0">
                                    </ul>
                                    <ul class="col-md-3 col-sm-6 or-ctdh-btn1">
                                        <button type="button"
                                            onclick="chinhsuanone('chinhsua1','qo-ed-1')"><?= lang('Label.lbl_txtCancel') ?></button>
                                    </ul>
                                    <ul class="col-md-3 col-sm-6  or-ctdh-btn2">
                                        <button
                                            class="closePickupOrder saveReceiver closePickupOrder_<?= ($keyPoints+1).'_'.$index->receiverIndex ?>"
                                            onclick="saveReceiver(<?= ($keyPoints+1) ?>, <?= $index->receiverIndex ?>, 'addReceiver')"
                                            type="button"><?= lang('Label.lbl_txtFinish') ?>
                                        </button>
                                    </ul>
                                    <?php } ?>
                                </div>
                                <!-- ========HẾT PHẦN SỬA HÀNG HÓA========= -->
                            </div>
                        </div>
                        <?php } 
                                    } ?>
                    </div>
                    <?php if($dataOrders->packType == 1){ ?>
                    <div class="or-tttx-in-line">
                        <img src="<?php echo base_url('public/images/Rectangle88.png');?>" alt="">
                    </div>
                    <?php } ?>
                </div>
                <?php }
                } ?>
            </div>
            <?php if($dataOrders->packType == 2){ ?>
            <div class="btn-add-orders ">
                <div>
                    <img src="<?php echo base_url('public/images/Group284.png');?>" alt="" class="or-img-tdg">
                </div>
                <button type="button" class="or-tdg-btn addDeliveryPoint"
                    onclick="addDeliveryPoint(<?= ($keyPoints+1) ?>)">
                    <img src="<?php echo base_url('public/images/tdg2.png');?>" alt="" class="float-left pl-2">
                    <?= lang('Label.lbl_txtExtraAddress') ?></button>
            </div>
            <div class="or-tttx row">
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
                <ul class="col-md-6  col-8 or-tttx-3">
                    <li>
                        <!-- expectShipperPhone -->
                        <input name="expectShipperPhone" class="expectShipperPhone" value="" type="text"
                            placeholder="<?= lang('Label.lbl_txtExpectShipperPhone') ?>">
                    </li>
                </ul>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php if($dataOrders->packType == 2){ ?>
    <div class="or-btn-tt">
        <ul class="row">
            <li class="col-md-9 col-sm-6 col-0"></li>
            <li class="col-md-3 col-sm-6 col-12 or-ttnh-input">
                <button class="nextPostageKm" onclick="nextPostageKm()"><?= lang('Label.lbl_txtNext') ?></button>
            </li>
        </ul>
    </div>
    <?php }else if($dataOrders->packType == 1){ ?>
    <div class="or-btn-tt">
        <ul class="row">
            <li class="col-md-9 col-sm-6 col-0"></li>
            <li class="col-md-3 col-sm-6 col-12 or-ttnh-input">
                <button class="nextPostageSp" onclick="nextPostageSp()"><?= lang('Label.lbl_txtNext') ?></button>
            </li>
        </ul>
    </div>
    <?php } ?>

</section>

<style>
.dropdown .dropdown-menu .dropdown-item:hover {
    background-color: white;
    cursor: pointer;
}
</style>
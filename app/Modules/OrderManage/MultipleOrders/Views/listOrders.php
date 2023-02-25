<div id="loading">
  <img id="loading-image" src="<?php echo base_url('public/assets/images/giphy.gif')?>" alt="Loading..." />
  <div class="my-progress-bar" style="display:none"></div>
</div>
<section id="orders">

  <!-- Tiêu đề -->
  <div class="warehouse-banner-title row">
    <ul class="col-sm-3 pr-0 mb-0">
      <li>
        <img src="<?php echo base_url('public/images/Home.png');?>">
      </li>
      <li style="margin-top: 4px;">
        ><b> <?= lang('Label.lbl_order') ?></b> ><span> <?= lang('Label.lbl_newFastOrder') ?></span>
      </li>
    </ul>
    <div class="col-sm-6 row pr-0 mb-0">
      <div class="txtStep col-sm-4 pl-0 pr-0">
        <a href="">
          <ul class="or-banner1 ml-0">
            <li style="background: #2DB1DB!important;color: white!important;line-height: 20px;">
              1
            </li>
            <li style="color: #2DB1DB!important;" class="or-cgc-1">
              <?= lang('Label.lbl_txtUploadFile') ?>
            </li>
          </ul>
        </a>
      </div>

      <div class="txtStep col-sm-4 pr-0">

        <ul class="or-banner">
          <li style="width:25px;padding-left: 8px;">
            2
          </li>
          <li class="or-cgc-1">
            <?= lang('Label.lbl_txtEnterInfo') ?>
          </li>
        </ul>

      </div>

      <div class="txtStep col-sm-4 pr-0">
        <ul class="or-banner1 ml-0">
          <li style="line-height: 18px;padding-left: 5px;">
            3
          </li>
          <li class="or-cgc-1">
            <?= lang('Label.lbl_confirmOrder') ?>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- ============= -->
</section>


<section id="quick-orders" class="order-flash">
  <form action="" id="form-order-fast" method="POST" enctype="multipart/form-data">
    <!-- Thông tin người gửi -->
    <div class="qo-ttng row">
      <ul class="row col-sm-12 mb-0 pr-0 txtTtng">
        <li class="col-sm-4 qo-ttng-2">
          <b> <?= lang('Label.lbl_txtInfoSender') ?></b>
        </li>
        <li class="col-sm-8 text-right pr-0">
          <div class="dropdown orDetail-select-address">
            <input class="dropdown-toggle choosePickUpAddressFastNew p-0 pr-2" type="button" id="dropdownMenuButton"
              data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"
              value="<?= (!empty($primaryPickupAddress)) ? $primaryPickupAddress->name : lang('Label.lbl_createNewWareHouse') ?>"
              style="border: none; background: none;font-size: 13px; width: 190px;" />
            <input type="hidden" class="pickupAddressId"
              value="<?= (!empty($primaryPickupAddress)) ? $primaryPickupAddress->id : ''; ?>" name="pickupAddressId">
            <img src="<?php echo base_url('public/images/iconDownX.png');?>" alt="">

            <div class="dropdown-menu choosenPickup" aria-labelledby="dropdownMenuButton">
              <div class="dropdown-item pl-0 orDetail-data-select" href="#" style="padding-left: 21px!important;"
                onclick="choosePickupAddressFast(0)">
                <img src="<?php echo base_url('public/images/add.png');?>" alt="">
                <span
                  style="color: #885DE5;font-size: 14px; padding-left: 4px;"><?= lang('Label.lbl_newAddress') ?></span>
              </div>
              <?php foreach($pickupAddress as $warehouse): ?>

              <div class="dropdown-item pl-0  orDetail-data-select" href="#" style="padding-left: 21px!important;"
                onclick="choosePickupAddressFast(<?= $warehouse->id ?>)">
                <span style="color: #28262B;font-size: 14px;"><?= $warehouse->name ?></span> <br>
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
      <!-- choose pickupAddress -->
      <div class="row w100 newPickupFast" <?= (empty($primaryPickupAddress)) ?'' :'style="display:none"' ?>>
        <ul class="col-sm-6 orDetail-input ">
          <!-- Tên người gửi -->
          <li>
            <?= lang('Label.lbl_txtNamePickup') ?><span style="color: #885DE5;"> *</span>
          </li>
          <li>
            <input type="text" class=" ipt pickName unNumber" name="pickName" value=""
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
            <input type="text" class=" ipt pickPhone" name="pickPhone" onkeypress="return isNumber(event)" value=""
              placeholder="<?= lang('Label.ph_phone') ?>">

            <span class=" err_messages err_pickPhone"><?php echo $getErrors['pickPhone']; ?></span>
          </li>
        </ul>
        <ul class="col-sm-6 orDetail-input">
          <!-- địa chỉ chi tiết -->
          <li>
            <?= lang('Label.lbl_senderAddress') ?><span style="color: #885DE5;"> *</span>
          </li>
          <li>
            <input type="text" name="pickAddress" class="ipt pickAddress pickUpAddress" value=""
              placeholder="<?= lang('Label.lbl_inputDetailAddress') ?>">
            <span class=" err_messages err_pickAddress"></span>
          </li>
        </ul>
        <ul class="col-sm-6 row orDetail-input pr-0" style="padding-top: 30px;">
          <!-- Tỉnh thành -->
          <li class="col-md-4 mb-2 pr-0">
            <select name="pickProvince" id="province"
              class="form-control frm-lg pickProvince pickUpAddressProvince chosen-select province_code_from ">
              <option value="0"><?= lang('Label.lbl_orderWareHouseProvince'); ?></option>
              <?php foreach($dataProvinces as $province): ?>
              <option value="<?= $province['code']; ?>"> <?= $province['name']; ?>
              </option>
              <?php endforeach; ?>
            </select>
            <span class=" err_messages err_province"><?php echo $getErrors['pickProvince']; ?></span>
          </li>
          <!-- Phường xã -->
          <li class="col-md-4 mb-2 pr-0">
            <select name="pickDistrict" id="district"
              class="form-control pickDistrict pickUpAddressDistrict frm-lg chosen-select district_code_from ">
              <option value=""><?= lang('Label.lbl_orderWareHouseDistrict'); ?></option>
              <?php
                            if(!empty($dataDistricts)){
                                foreach($dataDistricts as $district): ?>
              <option value="<?= $district['code']; ?>"> <?= $district['name']; ?>
                <?php endforeach;
                            }
                        ?>
            </select>
            <span class=" err_messages err_district"><?php echo $getErrors['pickDistrict']; ?></span>
          </li>
          <!-- Quận huyện -->
          <li class="col-md-4 mb-2 pr-0">
            <select name="pickWard" id="ward" class="form-control frm-lg pickWard pickUpAddressWard chosen-select ward_code_from ">
              <option value=""><?= lang('Label.lbl_orderWareHouseWard'); ?></option>
              <?php
                            if(!empty($dataWards)){
                                foreach($dataWards as $ward): ?>
              <option value="<?= $ward['code']; ?>"> <?= $ward['name']; ?>
                <?php endforeach;
                            }
                        ?>
            </select>
            <span class=" err_messages err_ward"><?php echo $getErrors['pickWard']; ?></span>
          </li>
        </ul>
      </div>
      <div class="row senderInfo">
        <?php if(!empty($primaryPickupAddress)): ?>
        <div class="row col-12 oldPickup qo-dcng pb-0">
          <div class="col-sm-4 pr-0">
            <img src="<?php echo base_url('public/images/qo-img-1.png');?>" alt="">
            <span><?= $primaryPickupAddress->name ?></span>
          </div>
          <div class="col-sm-4 pr-0">
            <img src="<?php echo base_url('public/images/manager.png');?>" alt="">
            <span><?= $primaryPickupAddress->senderName ?></span>
          </div>
          <div class="col-sm-4 pr-0">
            <img src="<?php echo base_url('public/images/phone.png');?>" alt="">
            <span><?= $primaryPickupAddress->phone ?></span>
          </div>
        </div>
        <div class="col-12 oldPickup qo-dcng-1 qo-dcng">
          <img src="<?php echo base_url('public/images/place.png');?>" alt=""> <span>
            <?php
                    echo ($primaryPickupAddress->address) ? $primaryPickupAddress->address .', ' : '' ;
                    echo ($primaryPickupAddress->wardName) ? $primaryPickupAddress->wardName .', ' : '' ;
                    echo ($primaryPickupAddress->districtName) ? $primaryPickupAddress->districtName .', ' : '' ;
                    echo ($primaryPickupAddress->provinceName) ? $primaryPickupAddress->provinceName  : '' ;
                    ?>
          </span>
        </div>
        <?php endif; ?>
      </div>
      <!-- End choose pickupAddress -->
    </div>
    <!-- =============== -->

    <!-- Thông tin đơn hàng theo file -->
    <div class="qo-dhtf">
      <!-- filter -->
      <ul class="mb-0">
        <li>
          <b><?= lang('Label.lbl_ordersInFile') ?></b>
        </li>
      </ul>
      <!-- <div class="row btnListOrders">
                <div class=" txtStep col-lg-2 col-md-2 checkall">
                    <input class="checkAllCustom" id="checkAllCustom" checked="checked" value="all-order" name="check[]"
                        type="checkbox">
                    <label for="checkAllCustom"
                        class="lblCheckAllCustom fz13"><?= lang('Label.lbl_selectAll') ?></label>
                </div>
                <div class=" txtStep col-lg-2 col-md-2">
                    <a href="<?php echo base_url('/tao-don-nhanh');?>">
                        <button type="button" class="tabClassify"> <?= lang('Label.lbl_dowloadOrders') ?> </button></a>
                </div>
                <div class=" col-lg-2 col-md-2">
                    <button class="tabClassify ordersError" type="button" onclick="ordersError()">
                        <?= lang('Label.lbl_ordersError') ?></button>
                </div>
                <div class=" col-lg-2 col-md-2">
                    <button class="tabClassify ordersDoubts" type="button"
                        onclick="ordersDoubts()"><?= lang('Label.lbl_ordersDoubts') ?></button>
                </div>
                <div class=" col-lg-2 col-md-2">
                    <button class="tabClassify ordersAll brdActive" type="button"
                        onclick="orderAll()"><?= lang('Label.lbl_statusNull') ?></button>
                </div>
                <div class=" txtStep col-lg-2 col-md-2">
                    <button class="btnPricing" name="pricing" type="button"
                        onclick="btnPricingConfirm(<?= count($dataParams) ?>)"
                        value="pricing"><?= lang('Label.lbl_txtNext') ?></button>
                </div>
            </div> -->
      <div class="qo-dhtf row qo-dhtf-end btnListOrders">
        <div class=" col-lg-2 col-md-2 checkall pl-2">
          <label>
          <input class="checkAllCustom frm-check" id="checkAllCustom" checked="checked" value="all-order" name="check[]"
            type="checkbox">
          <span class="lblCheckAllCustom fz13"></span><?= lang('Label.lbl_selectAll') ?></label>
        </div>
        <div class=" col-lg-2 col-md-2">
          <a href="<?php echo base_url('/tao-don-nhanh');?>">
            <button type="button" class="tabClassify"> <?= lang('Label.lbl_dowloadOrders') ?> </button></a>
        </div>
        <div class=" col-lg-2 col-md-2">
          <button class="tabClassify ordersError" type="button" onclick="ordersError()">
            <?= lang('Label.lbl_ordersError') ?></button>
        </div>
        <div class=" col-lg-2 col-md-2">
          <button class="tabClassify ordersDoubts" type="button"
            onclick="ordersDoubts()"><?= lang('Label.lbl_ordersDoubts') ?></button>
        </div>
        <div class=" col-lg-2 col-md-2">
          <button class="tabClassify ordersAll brdActive" type="button"
            onclick="orderAll()"><?= lang('Label.lbl_statusNull') ?></button>
        </div>
        <div class=" col-lg-2 col-md-2 ">
          <input type="hidden" class="addPricing" name="checkPricing" value="">
          <button class="btnPricing" name="pricing" type="button" value="pricing"
            onclick="btnPricingConfirm(<?= count($dataParams) ?>)"><?= lang('Label.lbl_txtNext') ?></button>
        </div>
      </div>
      <!-- ================== -->
    </div>


    <!--==================================Điểm giao  2===============================-->
    <?php 
    if (isset($resDataAddress) && !empty($resDataAddress) && isset($dataParams) && !empty($dataParams)){
        
        foreach($dataParams as $key => $value):
            $index = $key + 1;
            $indexAddress = $key;
        // lay danh sach quan huyen theo tinh thanh
        $dataDistrict  = $dataDistricts[$key];
        // lay danh sach phuong xa theo quan huyen
        $dataWard  = $dataWards[$key];

        $ward_prob = trim($resDataAddress[$key]->ward_prob);
        $ward_code = trim($resDataAddress[$key]->ward_code);
        if ($ward_prob >= 0.9 && $ward_code){
            $ward_succes = 'address_success';
            $card_error = '';
            $check_error = '';
        }elseif((0.7 <= $ward_prob) && ($ward_prob < 0.9) && $ward_code){
            $ward_succes = 'address_warning';
        }else{
            $ward_succes = 'address_error';
        }

        $district_prob = trim($resDataAddress[$key]->district_prob);
        $district_code = trim($resDataAddress[$key]->district_code);
        if ($district_prob >= 0.9 && $district_code) {
            $district_succes = 'address_success';
            $card_error = '';
            $card_error_ids = '';
            $check_error = '';
        }elseif((0.7 <= $district_prob) && ($district_prob < 0.9) && $district_code){
            $district_succes = 'address_warning';
        }else{
            $district_succes = 'address_error';
        }

        $province_prob = trim($resDataAddress[$key]->province_prob);
        $province_code = trim($resDataAddress[$key]->province_code);
        if ($province_prob >= 0.9 && $province_code) {
            $province_succes = 'address_success';
            $card_error = '';
            $card_error_ids = '';
            $check_error = '';
        }elseif((0.7 <= $province_prob) && ($province_prob < 0.9) && $province_code){
            $province_succes = 'address_warning';
        }else{
            $province_succes = 'address_error';
        }

        if ($province_succes == 'address_error' || $district_succes == 'address_error' || $ward_succes == 'address_error'){
            $card_error = 'card_error';
            $card_error_ids = 'card_error_'.$index;
            $check_error = 'check_error';
        }
        elseif($ward_succes == 'address_warning' || $district_succes == 'address_warning' || $province_succes == 'address_warning'){
            $card_error = 'card_warning';
            $card_error_ids = 'card_warning_'.$index;
            $check_error = 'check_warning';
        }
        else{
            $card_error = 'card_success';
            $card_error_ids = 'card_success_'.$index;
            $check_error = 'check_success';
        }

        $deliveryPointIndex = $index;
        $receiverIndex = 1;
        $productIndex = 1;
    ?>
    <div class="qo-dgh-1 tltReceiver deliveryPoint_<?= $deliveryPointIndex ?> <?= $card_error ?> <?= $card_error_ids ?>"
      style="margin-top: 15px;">
      <div class="qo-dgh-tt-1 wq123 row">
        <div class="col-lg-9 col-md-9 col-sm-9 tltDelivery">
          <label class="mb-0">
            <input class="checkSingleCustom frm-check" name="check[]" value="<?= $index ?>" checked="checked" type="checkbox">
            <span></span>
          </label>
          <input type="hidden" name="index" value="<?= $index ?>">
          <span class="or-dgh-icon-1"><?= $index; ?></span> <span class="fz13"
            style="color: #2DB1DB;"><?= lang('Label.lbl_orderReceiver') ?></span>
        </div>
        <!-- <div class="col-lg-3 col-md-3 col-sm-3" data-toggle="modal"
          data-target="#confirm-delete-delivery-point-<?php //echo $deliveryPointIndex ?>" style="text-align: right;">
          <span class="qo-xdg fz13 cursorPointer">
            <? //echo lang('Label.lbl_deleteIntersectiondetail') ?>
          </span>
          <img src="<?php //echo base_url('public/images/iconTrash.png');?>" class="qo-xdg-img">
        </div> -->
        <!-- Confirm delete deliveryPoint -->

        <!-- modal -->
        <div class="modal fade" id="confirm-delete-delivery-point-<?= $deliveryPointIndex?>" tabindex="-1" role="dialog"
          aria-labelledby="myModa2lLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 17%;">
              <!-- Modal Header -->
              <div class="modal-header">
                <h5 class="modal-title headerFalse"><?= lang('Label.lbl_notificationConfirm') ?></h5>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body">
                <div class="row modal-body-content">
                  <div class="col-12 textCenter bodyOrderFalse">
                    <p><?= lang('Label.lbl_txtConfirmDeleteDeliveryPoint') ?></p>
                  </div>
                </div>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer customize-approve">
                <button type="button" class="btn btn-modal"
                  data-dismiss="modal"><?= lang('Label.lbl_txtCancel'); ?></button>
                <button type="button"
                  onclick="deleteDeliveryPointOrderFiles(<?=$deliveryPointIndex?>, <?=$receiverIndex?>, <?=$itemIndex?>)"
                  class="btn btn-modal btn-confirmCustom"><?= lang('Label.lbl_delete') ?></button>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="qo-ttgh-1 row mg0 pt-0">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
          <input name="receiverIndex_<?= $index ?>" type="hidden" class="qo-ttgh-1-sl" name="" value="<?= $index ?>">
          <input name="receiverAddress_<?= $index ?>" type="text" class="qo-ttgh-1-sl receiverAddress_<?= $index ?>"
            onchange="changeReceiverAddress(<?= $index ?>)" name="" value="<?= $value['receiverAddress'] ?>">
          <span class="err_messages err_receiverAddress_<?= $index ?>"> </span>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="row ml-0 mr-0">
            <div
              class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cpdw provinceReceiver_<?= $index ?> <?php echo $province_succes ?> ">
              <select name="receiverProvinceCode_<?= $index ?>" onchange="changeProvinceAddress(<?= $index ?>)"
                id="pickProvince_<?= $index ?>" index_prov="<?= $index ?>"
                class="form-control frm-lg pickProvince order_province_code_list chosen-select receiverProvinceCode_<?= $index ?>">
                <option value="0"><?= lang('Label.lbl_orderWareHouseProvince'); ?></option>
                <?php foreach($dataProvinces as $province): ?>
                <option <?= ($resDataAddress[$indexAddress]->province_code == $province['code']) ? 'selected': ''  ?>
                  value="<?= $province['code']; ?>"> <?= $province['name']; ?>
                </option>
                <?php endforeach; ?>
              </select>
              <span class="err_messages err_Province<?= $index?>"> </span>
            </div>
            <div
              class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cpdw districtReceiver_<?= $index ?> <?php echo $district_succes ?> ">
              <select name="receiverDistrictCode_<?= $index ?>" onchange="changeDistrictAddress(<?= $index ?>)"
                id="pickDistrict_<?= $index ?>" index_dict="<?= $index ?>"
                class="form-control pickDistrict frm-lg order_district_code_list chosen-select receiverDistrictCode_<?= $index ?>">
                <option value="0"><?= lang('Label.lbl_orderWareHouseDistrict'); ?></option>
                <?php
                            if(!empty($dataDistrict)){
                                foreach($dataDistrict as $district): ?>
                <option <?= ($resDataAddress[$indexAddress]->district_code == $district['code']) ? 'selected': ''  ?>
                  value="<?= $district['code']; ?>"> <?= $district['name']; ?>
                  <?php endforeach;
                            }
                        ?>
              </select>
              <span class="err_messages err_District<?= $index?>"> </span>
            </div>
            <div
              class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cpdw wardReceiver_<?= $index ?> <?php echo $ward_succes ?> ">
              <select name="receiverWardCode_<?= $index ?>" index_ward="<?= $index ?>" id="pickWard_<?= $index ?>"
                class="form-control frm-lg pickWard order_ward_code_list chosen-select receiverWardCode_<?= $index ?>">
                <option value="0"><?= lang('Label.lbl_orderWareHouseWard'); ?></option>
                <?php
                            if(!empty($dataWard)){
                                foreach($dataWard as $ward): ?>
                <option <?= ($resDataAddress[$indexAddress]->ward_code == $ward['code']) ? 'selected': ''  ?>
                  value="<?= $ward['code']; ?>"> <?= $ward['name']; ?>
                  <?php endforeach;
                            }
                        ?>
              </select>
              <span class="err_messages err_Ward<?= $index?>"> </span>
            </div>
            <input type="hidden" class="province_find_pro_<?= $index ?>" value="">
            <input type="hidden" class="district_find_pro_<?= $index ?>" value="">
            <input type="hidden" class="wards_find_pro_<?= $index ?>" value="">
          </div>
        </div>
      </div>
      <!-- ===========Đơn hàng thứ nhất============== -->
      <div class="or-ttng mg0 w100 orderDetailFile_<?= $index ?>">
        <div class="row infoItems">

          <div class=" col-lg-3 col-md-3 col-sm-12 col-xs-12 senderItems" style="position: relative;">
            <ul style="padding: 0px 20px;">
              <li class="fz13">
                <span class="or-dgh-icon-2 htmlReceiverPhone_<?= $deliveryPointIndex ?>">
                  <?= $value['receiverPhone'] ?> </span>
                <img src="<?php echo base_url('public/images/antoan.svg');?>" class="tdn-btn-downx">
              </li>
              <li class="fz13" style="color:#68656D"> <span class="htmlReceiverName_<?= $deliveryPointIndex ?>">
                  <?= $value['receiverName'] ?>
                </span></li>

            </ul>
          </div>
          <?php 
                        $items = $value['products'];
                        foreach($items as $keyItem => $item):
                            $keyProduct = $keyItem + 1;
                    ?>
          <div class=" col-lg-8 col-md-8 col-sm-12 col-xs-12 wrapperItem_<?= $deliveryPointIndex ?>">
            <div class="row itemDetail itemDetail_<?=$deliveryPointIndex.'_'.$keyProduct ?>">
              <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 fz13">
                <span
                  class="itemDetailName_<?=$deliveryPointIndex.'_'.$keyProduct ?>"><strong><?= $item->productName ?></strong></span>
              </div>
              <div class="col-lg-2 col-md-6 col-sm-2 col-xs-6 fz13">
                <?= lang('Label.lbl_detailQuantity') ?>:
                <span
                  class="colorPurple itemDetailQuantity_<?=$deliveryPointIndex.'_'.$keyProduct ?> "><?= ($item->quantity) ? $item->quantity : '1'  ?></span>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-3 col-xs-6 fz13">
                <?= lang('Label.lbl_detailCOD') ?>:
                <span
                  class="colorOrange itemDetailCOD_<?=$deliveryPointIndex.'_'.$keyProduct ?>"><?= number_format($item->cod) ?></span>
                đ
              </div>
              <div class="col-lg-3 col-md-6 col-sm-3 col-xs-6 fz13">
                <?= lang('Label.lbl_detailProductValue') ?>:
                <span
                  class="itemDetailValue_<?=$deliveryPointIndex.'_'.$keyProduct ?>"><?= number_format($item->productValue) ?></span>
                đ
              </div>
            </div>
          </div>
          <input type="hidden" class="product_<?= $index.'_'.$keyProduct ?> productName_<?= $index.'_'.$keyProduct ?>"
            name="productName_<?= $index.'_'.$keyProduct ?>" value="<?= $item->productName ?>">
          <input type="hidden" class="product_<?= $index.'_'.$keyProduct ?> quantity_<?= $index.'_'.$keyProduct ?>"
            name="quantity_<?= $index.'_'.$keyProduct ?>" value="<?= ($item->quantity) ? $item->quantity : '1'  ?>">
          <input type="hidden" class="product_<?= $index.'_'.$keyProduct ?> cod_<?= $index.'_'.$keyProduct ?>"
            name="cod_<?= $index.'_'.$keyProduct ?>" value="<?= $item->cod ?>">
          <input type="hidden" class="product_<?= $index.'_'.$keyProduct ?> productCate_<?= $index.'_'.$keyProduct ?>"
            name="productCate_<?= $index.'_'.$keyProduct ?>" value="<?= $item->productCate ?>">
          <input type="hidden" class="product_<?= $index.'_'.$keyProduct ?> productValue_<?= $index.'_'.$keyProduct ?>"
            name="productValue_<?= $index.'_'.$keyProduct ?>" value="<?= $item->productValue ?>">

          <?php endforeach; ?>
          <div class=" col-lg-1 col-md-1 col-sm-12 col-xs-12 fedit">
            <span class="">
              <img src="<?php echo base_url('public/images/edit.png');?>"
                onclick="editOrders('<?= $deliveryPointIndex ?>','<?= $receiverIndex ?>','<?= $productIndex ?>')"
                id="qo-ed-7" class="tdn-btn-downx">
            </span>
          </div>
        </div>
        <div class="row info-donhang" id="info-donhang-<?= $key ?>">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <ul class="">
              <li>
                <?= lang('Label.lbl_txtSizeDetailOrders') ?>: <span
                  class="htmlSize<?= $deliveryPointIndex ?> colorPurple">
                  <?= $value['length'] .'-'.$value['width'].'-'.$value['height'] ?> </span> cm
              </li>
              <li>
                <?= lang('Label.lbl_txtWeightDetailOrders') ?>: <span
                  class="htmlWeight<?= $deliveryPointIndex ?> colorPurple">
                  <?= number_format($value['weight'],0,"",".") ?></span> gram
              </li>
              <li>
                <?= lang('Label.lbl_txtReceivingTimeDetailOrders') ?>: <span
                  class="colorPurple  htmlExpectDateTime<?= $deliveryPointIndex ?>"></span>
              </li>
              <li>
                <?= lang('Label.lbl_txtExtraNote') ?>: <span
                  class="colorPurple htmlNote<?= $deliveryPointIndex ?>"><?= $value['note'] ?></span>
              </li>
            </ul>

          </div>
          <div class="col-lg-6 col-md-5 col-sm-6 col-xs-12">
            <ul class="">
              <li>
                <?= lang('Label.lbl_txtPayerFee') ?>:
                <span
                  class="colorPurple htmlOrderPayment<?= $deliveryPointIndex ?>"><?= ($value['orderPayment'] == 1)? lang('Label.lbl_txtPayerFeeSender') : lang('Label.lbl_txtPayerFeeReceiver'); ?></span>
              </li>
              <li>
                <?= lang('Label.lbl_txtPartialDelivery') ?>:
                <span
                  class="colorPurple htmlPartialDelivery<?= $deliveryPointIndex ?>"><?= ($value['partialDelivery'] == 1)? lang('Label.lbl_txtPartialDeliveryYes') : lang('Label.lbl_txtPartialDeliveryNo'); ?></span>
              </li>
              <li>
                <?= lang('Label.lbl_txtIsReturn') ?>:
                <span
                  class="colorPurple htmlIsReturn<?= $deliveryPointIndex ?>"><?= ($value['isReturn'] == 1)? lang('Label.lbl_txtPartialDeliveryYes') : lang('Label.lbl_txtPartialDeliveryNo'); ?></span>
              </li>
              <li>
                <?= lang('Label.lbl_txtPickupType') ?>:
                <span class="colorPurple htmlPickupType<?= $deliveryPointIndex ?>">
                  <?= ($value['pickupType'] == 1) ? lang('Label.lbl_txtPartialDeliveryYes') : lang('Label.lbl_txtPartialDeliveryNo') ?>
                </span>
              </li>
              <li>
                <?= lang('Label.lbl_txtNoteRequired') ?>: <span
                  class="colorPurple htmlRequireNote<?= $deliveryPointIndex ?>"><?= isset($requiredNoteArr[$value['requireNote']]) ? $requiredNoteArr[$value['requireNote']] : '' ?></span>
              </li>
            </ul>

          </div>
          <input type="hidden" class="remove_<?= $index ?>" name="remove_<?= $index ?>" value="1">
          <input type="hidden" class="receiverPhone_<?= $index ?>" name="receiverPhone_<?= $index ?>"
            value="<?= $value['receiverPhone'] ?>">
          <input type="hidden" class="receiverName_<?= $index ?>" name="receiverName_<?= $index ?>"
            value="<?= $value['receiverName'] ?>">
          <input type="hidden" class=" length_<?= $deliveryPointIndex ?>" name="length_<?= $deliveryPointIndex ?>"
            value="<?= $value['length'] ?>">
          <input type="hidden" class=" width_<?= $deliveryPointIndex ?>" name="width_<?= $deliveryPointIndex ?>"
            value="<?= $value['width'] ?>">
          <input type="hidden" class=" height_<?= $deliveryPointIndex ?>" name="height_<?= $deliveryPointIndex ?>"
            value="<?= $value['height'] ?>">
          <input type="hidden" class=" weight_<?= $deliveryPointIndex ?>" name="weight_<?= $deliveryPointIndex ?>"
            value="<?= $value['weight'] ?>">
          <input type="hidden" class=" note_<?= $deliveryPointIndex ?>" name="note_<?= $deliveryPointIndex ?>"
            value="<?= $value['note'] ?>">
          <input type="hidden" class=" shopOrderId_<?= $deliveryPointIndex ?>"
            name="shopOrderId_<?= $deliveryPointIndex ?>" value="<?= $value['shopOrderId'] ?>">
          <input type="hidden" class=" discountCoupon_<?= $deliveryPointIndex ?>"
            name="discountCoupon_<?= $deliveryPointIndex ?>" value="<?= $value['discountCoupon'] ?>">
          <input type="hidden" class=" requireNote_<?= $deliveryPointIndex ?>"
            name="requireNote_<?= $deliveryPointIndex ?>" value="<?= $value['requireNote'] ?>">
          <input type="hidden" class=" paymentType_<?= $deliveryPointIndex ?>"
            name="paymentType_<?= $deliveryPointIndex ?>" value="<?= $value['paymentType'] ?>">
          <input type="hidden" class=" pickupType_<?= $deliveryPointIndex ?>"
            name="pickupType_<?= $deliveryPointIndex ?>" value="<?= $value['pickupType'] ?>">
          <input type="hidden" class=" orderPayment_<?= $deliveryPointIndex ?>"
            name="orderPayment_<?= $deliveryPointIndex ?>" value="<?= $value['orderPayment'] ?>">
          <input type="hidden" class=" partialDelivery_<?= $deliveryPointIndex ?>"
            name="partialDelivery_<?= $deliveryPointIndex ?>" value="<?= $value['partialDelivery'] ?>">
          <input type="hidden" class=" isReturn_<?= $deliveryPointIndex ?>" name="isReturn_<?= $deliveryPointIndex ?>"
            value="<?= $value['isReturn'] ?>">

          <input type="hidden" class=" itemIndex_<?= $deliveryPointIndex ?>" name="itemIndex_<?= $deliveryPointIndex ?>"
            value="<?= count($value['products']) ; ?>">
          <input type="hidden" class=" packageShip_<?= $deliveryPointIndex ?>"
            name="packageShip_<?= $deliveryPointIndex ?>" value="<?= $value['packageCode'] ?>">
          <input type="hidden" class=" expectDate_<?= $deliveryPointIndex ?>"
            name="expectDate_<?= $deliveryPointIndex ?>" value="<?= $value['expectDate'] ?>">
          <input type="hidden" class=" expectTime_<?= $deliveryPointIndex ?>"
            name="expectTime_<?= $deliveryPointIndex ?>" value="<?= $value['expectTime'] ?>">

          <!-- =========== Hết đơn hàng thứ nhất============== -->
        </div>

        <!-- ============HẾT ĐƠN THỨ 2============ -->

        <div class="col-12 qo-duong-ke"></div>

        <!-- Chọn phương thức thành toán -->
        <div class="row listPack pb-3">
          <!-- Chọn phương thức thành toán -->
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 qo-ttdh-1">
            <div class="row listPackages">
              <div class="col-12">
                <select name="paymentType_<?= $index ?>" class="chosen-select w100" style="padding-left: 4%;">

                  <!-- <option <?= ($value['paymentType'] == '') ? 'selected' : '' ?> value="">
                                        <?php // echo lang('Label.lbl_txtPaymentType') ?></option>-->
                  <option <?= ($value['paymentType'] == 1) ? 'selected' : '' ?> value="2">
                    <?php echo lang('Label.lbl_txtPaymentTypeHolaWallet') ?></option>
                  <!--<option <?= ($value['paymentType'] == 2) ? 'selected' : '' ?> value="1">
                                        <?php //echo lang('Label.lbl_txtPaymentTypeCash') ?></option> -->
                </select>
              </div>
            </div>
          </div>
          <!-- Chọn mã giảm giá -->
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 qo-ttdh-1">
            <div class="row listPackages">
              <div class="col-12">
                <input type="text" disabled class="fz13 discountCoupon_<?= $deliveryPointIndex ?>"
                  name="discountCoupon_<?= $deliveryPointIndex ?>" value="<?= $value['discountCoupon'] ?>">
              </div>
            </div>
          </div>
        </div>

        <!-- Chọn gói cước -->
        <!-- <div class="row listPack">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 qo-ttdh-1">
                    <div class="row listPackages">
                        <div class="col-1">
                            <img class="" src="<?php //echo base_url('public/images/Time.png');?>">
                        </div>
                        <div class="col-8">
                            <select name="packageShip_<?php //$index ?>" class="chosen-select w100" style="padding-left: 4%;">
                            <?php 
                                // $dataFees = $value->fees;
                                // if(!empty($dataFees)){
                                // foreach($dataFees as $fee):
                            ?>
                                <option value="<?php //$fee->packageCode ?>"><?php //$fee->packageCode .' - '. $fee->packageName ?></option>
                            <?php //endforeach; } else{ ?>
                                <option value="0"><?php //'Nothing' ?></option>
                            <?php //} ?>

                            </select>
                        </div>
                        <div class="col-1">
                            <img class="" src="<?php //echo base_url('public/images/info.png');?>">
                        </div>
                    </div>
                </div>
            </div> -->
      </div>
      <!-- qo-ed-a -->
      <div id="orders" class="editOrderDetailFile_<?= $key ?> qo-ed-a show-all-order-file">
        <!-- ========HIỂN THỊ KHI CLICK VÀO SỬA ĐƠN HÀNG ========= -->

        <div class="or-ttdh row ">
          <ul class="or-dgh col-12">
            <li class="or-dgh-1 pt-0 mt-0">
              <span class="or-dh-stt" style="background: #F0A616;"><?= $deliveryPointIndex ?></span><span
                style="color: #68656D;"><?= lang('Label.lbl_addOrderDetail') ?></span>
            </li>
            <li class="or-ttnh">
              <ul>
                <li class="or-ttnh-tt">
                  <?= lang('Label.lbl_txtReceiverInfo') ?>
                </li>
              </ul>
              <ul class="row w-100 p-0 m-0">
                <li class="col-md-3 col-sm-6 or-cgc-1">
                  <?= lang('Label.lbl_txtReceiverPhone') ?><span style="color: #885DE5;"> *</span>
                  <br>
                  <!-- receiver phone -->
                  <input name="receiverPhone" value="<?= ($value['receiverPhone']) ? $value['receiverPhone'] : '' ?>"
                    receiverIndex="<?= $receiverIndex ?>" deliveryPointIndex="<?= $deliveryPointIndex ?>"
                    onblur="ValidateReceiverPhone(<?= $deliveryPointIndex ?>, <?= $receiverIndex ?>)" type="text"
                    class="receiverPhone receiverPhone_<?= $deliveryPointIndex .'_'.$receiverIndex ?>"
                    onkeypress="return isNumber(event)" placeholder="<?= lang('Label.ph_phone') ?>"><br>
                  <span class=" err_messages err_receiverPhone_<?= $deliveryPointIndex.'_'.$receiverIndex ?>">
                  </span>
                </li>
                <li class="col-md-3 col-sm-6 or-cgc-1">
                  <?= lang('Label.lbl_txtReceiverName') ?><span style="color: #885DE5;"> *</span> <br>
                  <!-- receiver name -->
                  <input name="receiverName" value="<?= ($value['receiverName']) ? $value['receiverName'] : '' ?>"
                    receiverIndex="<?= $receiverIndex ?>" deliveryPointIndex="<?= $deliveryPointIndex ?>"
                    onblur="ValidateReceiverName(<?= $deliveryPointIndex ?>, <?= $receiverIndex ?>)"
                    class="receiverName unNumber receiverName_<?= $deliveryPointIndex.'_'.$receiverIndex ?>" type="text"
                    placeholder="<?= lang('Label.lbl_txtReceiverName') ?>"><br>
                  <span class=" err_messages err_receiverName_<?= $deliveryPointIndex.'_'.$receiverIndex ?>">
                  </span>
                </li>
                <li class="col-md-3 col-sm-6 or-cgc-1">
                  <?= lang('Label.lbl_txtReceiverDate') ?><br>
                  <!-- expectDate -->
                  <input name="receiverExpectDate" receiverIndex="<?= $receiverIndex ?>"
                    deliveryPointIndex="<?= $deliveryPointIndex ?>" type="text" value="<?= $receiver['expectDate'] ?>"
                    class="orderdatePicker expectDate editExpectDate_<?= $deliveryPointIndex.'_'.$receiverIndex ?>"
                    style="padding-right: 10px;"><br>
                  <span class=" err_messages err_expectDate_<?= $deliveryPointIndex.'_'.$receiverIndex ?>">
                  </span>
                </li>
                <li class="col-md-3 col-sm-6 or-cgc-1">
                  <?= lang('Label.lbl_txtReceiverTime') ?><br>
                  <!-- expectTime -->
                  <input name="receiverExpectTime" receiverIndex="<?= $receiverIndex ?>"
                    deliveryPointIndex="<?= $deliveryPointIndex ?>" type="time" value="<?= $receiver['expectTime'] ?>"
                    class="or-ttnh-input editExpectTime_<?= $deliveryPointIndex.'_'.$receiverIndex ?>"><br>
                  <span class=" err_messages err_expectTime_<?= $deliveryPointIndex.'_'.$receiverIndex ?>">
                  </span>
                </li>
              </ul>
            </li>
            <li class="or-ttnh">
              <ul>
                <li class="or-ttnh-tt">
                  <?= lang('Label.lbl_txtGoodInfo') ?>
                  <!-- <br>
                  <span class=" err_messages err_countProduct_<?= $deliveryPointIndex?>"> </span> -->
                </li>
              </ul>
              <!-- Nếu có thêm mới hàng hóa thì phần này sẽ đươc hiện -->
              <div class=" w100 mg0 row itemOrderFile_<?= $deliveryPointIndex ?>">

                <?php
                $items = $value['products'];
                foreach($items as $keyItem => $item):
                    $itemIndex = $keyItem + 1;
            ?>
                <div
                  class="w100 itemOrderFile countItemOrder_<?= $deliveryPointIndex ?> productItem_<?= $deliveryPointIndex.'_'.$itemIndex ?>">
                  <div class="row w100 orderDetailFile">

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 fz13 wrapCountProduct_<?= $deliveryPointIndex ?>">
                      <span class="or-dh-stt countProduct_<?= $deliveryPointIndex.'_'.$itemIndex ?>"
                        style="background: #885DE5;"><?= $itemIndex ?></span>
                      <span
                        class="success_productName_<?= $deliveryPointIndex.'_'.$itemIndex ?>"><?= $item->productName ?></span>

                    </div> 
                    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6 fz13">
                      <?= lang('Label.lbl_detailQuantity') ?>: <span
                        class="colorPurple success_productQuantity_<?= $deliveryPointIndex.'_'.$itemIndex ?>"><?= ($item->productQuantity) ? $item->productQuantity : '1' ?></span>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 fz13">
                      <span class="success_productCate_<?= $deliveryPointIndex.'_'.$itemIndex ?>">
                        <?= ($item->productCateId) ? $item->productCateId : ''; ?>
                      </span>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 fz13">
                      <?= lang('Label.lbl_detailCOD') ?>: <span
                        class="colorOrange success_cod_<?= $deliveryPointIndex.'_'.$itemIndex ?>"><?= number_format($item->cod) ?></span>
                      đ
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 fz13">
                      <?= lang('Label.lbl_detailProductValue') ?>: <span
                        class="success_productValue_<?= $deliveryPointIndex.'_'.$itemIndex ?>"><?= number_format($item->productValue) ?></span>
                      đ
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6 fz13 text-right">
                      <img class="cursorPointer" src="/public/images/or-delete.png" data-toggle="modal"
                        data-target="#confirm-delete-<?= $deliveryPointIndex.'_'.$itemIndex ?>">
                      <img class="cursorPointer" src="/public/images/or-edit.png"
                        onclick="editProductOrderFiles(<?=$deliveryPointIndex?>, <?=$receiverIndex?>, <?=$itemIndex?>)">
                    </div>
                  </div>
                </div>

                <!-- Confirm delete item -->
                <div class="modal fade" id="confirm-delete-<?= $deliveryPointIndex.'_'.$itemIndex ?>" tabindex="-1"
                  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                      </div>

                      <div class="modal-body">
                        <p><?= lang('Label.lbl_txtConfirmDeleteItem') ?></p>
                        <p class="debug-url"></p>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                          data-dismiss="modal"><?= lang('Label.lbl_txtCancel'); ?></button>
                        <button type="button"
                          onclick="deleteProductOrderFiles(<?=$deliveryPointIndex?>, <?=$receiverIndex?>, <?=$itemIndex?>)"
                          class="btn btn-danger btn-ok"><?= lang('Label.lbl_delete') ?></button>
                      </div>
                    </div>
                  </div>
                </div>

                <?php endforeach; ?>

              </div>
              <!-- Nếu có thêm mới hàng hóa thì phần này sẽ đươc hiện -->
              <div style="width: 100%;" class="ttsp productInfo"
                id="ttsp_<?= $deliveryPointIndex.'_'.$receiverIndex ?>">
              </div>
              <!-- END hàng hóa -->
              <ul class="row w-100 m-0 p-0">
                <li class="col-md-6 col-sm-12">
                  <?= lang('Label.lbl_txtGoodName') ?><span style="color: #885DE5;">*</span> <br>
                  <!-- product name -->
                  <input name="productName" vallue="" deliveryPointIndex="<?= $deliveryPointIndex ?>"
                    receiverIndex="<?= $receiverIndex ?>" productIndex="<?= $productIndex ?>"
                    onblur="ValidateOrderFileProductName(<?= $deliveryPointIndex ?>, <?= $receiverIndex ?>, <?= $productIndex ?>)"
                    class="productName productTextName_<?= $deliveryPointIndex.'_'.$receiverIndex ?> " type="text"
                    placeholder="<?= lang('Label.lbl_inputGoodName') ?>" id="qo-tensp-ht">
                  <span
                    class=" err_messages err_productName_<?= $deliveryPointIndex.'_'.$receiverIndex ?>"><?php echo $getErrors['productName']; ?></span>
                </li>
                <li class="col-md-3 col-sm-6">
                  <?= lang('Label.lbl_txtCod') ?><span style="color: #885DE5;">*</span> <br>
                  <!-- product COD -->
                  <input name="productCOD" value="0" deliveryPointIndex="<?= $deliveryPointIndex ?>"
                    receiverIndex="<?= $receiverIndex ?>" productIndex="<?= $productIndex ?>"
                    onblur="ValidateOrderFileProductCOD(<?= $deliveryPointIndex ?>, <?= $receiverIndex ?>, <?= $productIndex ?>)"
                    onkeyup="returnFormatValue(<?= $deliveryPointIndex ?>, <?= $receiverIndex ?>, <?= $productIndex ?>,'productTextCOD','2')"
                    onkeypress="return isNumber(event)" type="text"
                    class="or-cod productTextCOD_<?= $deliveryPointIndex.'_'. $receiverIndex ?> " id="qo-cod-ht">
                  <span style="margin-left: -34px;"> đ</span>
                  <span class=" err_messages err_productCOD_<?= $deliveryPointIndex.'_'. $receiverIndex ?>"></span>
                </li>
                <li class="col-md-3 col-sm-6 or-cgc-1">
                  <!-- product value check -->
                  <label
                    for="checkProductValue_<?= $deliveryPointIndex ?>">
                  <input name="checkProductValue " id="checkProductValue_<?= $deliveryPointIndex ?>" value="1"
                    deliveryPointIndex="<?= $deliveryPointIndex ?>" receiverIndex="<?= $receiverIndex ?>"
                    productIndex="<?= $productIndex ?>" checked type="checkbox"
                    onclick="disabledCheckValue(<?= $deliveryPointIndex ?>,<?= $receiverIndex ?>,<?= $productIndex ?>)"
                    class="frm-check regular-checkbox mb-0 checkProductValue_<?= $deliveryPointIndex.'_'. $receiverIndex ?>">
                  <span><?= lang('Label.lbl_txtGoodValue') ?></span></label><span
                    style="color: #885DE5;"> *</span> <br>
                  <!-- product value -->
                  <input name="productValue" value="0" deliveryPointIndex="<?= $deliveryPointIndex ?>"
                    receiverIndex="<?= $receiverIndex ?>" productIndex="<?= $productIndex ?>"
                    onblur="ValidateOrderFileProductValue(<?= $deliveryPointIndex ?>, <?= $receiverIndex ?>, <?= $productIndex ?>)"
                    onkeyup="returnFormatValue(<?= $deliveryPointIndex ?>, <?= $receiverIndex ?>, <?= $productIndex ?>,'productTextValue','2')"
                    type="text" onkeypress="return isNumber(event)"
                    class="or-ttnh-input or-gtkg productValue productTextValue_<?= $deliveryPointIndex.'_'. $receiverIndex ?> ">
                  <span style="margin-left: -34px;"> đ</span></br>
                  <span
                    class=" err_messages err_productValue_<?= $deliveryPointIndex.'_'. $receiverIndex ?>"><?php echo $getErrors['ward']; ?></span>
                </li>

              </ul>
              <ul class="row w-100 m-0 p-0 pb-3">
                <li class="col-md-6 col-sm-12">
                  <?= lang('Label.lbl_txtGoodType'); ?><span style="color: #885DE5;">*</span> <br>
                  <!-- product category -->
                  <select name="productCategory" deliveryPointIndex="<?= $deliveryPointIndex ?>"
                    receiverIndex="<?= $receiverIndex ?>" productIndex="<?= $productIndex ?>"
                    onchange="ValidateOrderFileProductCate(<?= $deliveryPointIndex ?>, <?= $receiverIndex ?>, <?= $productIndex ?>)"
                    style="padding-right: 10px;" placeholder="Chọn loại hàng hóa"
                    id="productCategory_<?= $deliveryPointIndex.'_'. $receiverIndex.'_'.$productIndex ?>"
                    class="chosen-select productCategory productTextCategory_<?= $deliveryPointIndex.'_'. $receiverIndex ?> ">
                    <option value="0"><?= lang('Label.lbl_txtCategory') ?></option>
                    <?php foreach($arrProductCategory as $keyProductCate => $productCategory): ?>
                    <option value="<?= $keyProductCate ?>"><?= $productCategory ?></option>
                    <?php endforeach; ?>
                  </select>
                  <span
                    class=" err_messages err_productCategory_<?= $deliveryPointIndex.'_'. $receiverIndex ?>"><?php echo $getErrors['ward']; ?></span>
                </li>
                <li class="col-md-3 col-sm-6">
                  <?= lang('Label.lbl_txtGoodQuantity'); ?><span style="color: #885DE5;">
                    *</span> <br>
                  <!-- product quantity -->
                  <input name="productQuantity" value="1" deliveryPointIndex="<?= $deliveryPointIndex ?>"
                    receiverIndex="<?= $receiverIndex ?>" productIndex="<?= $productIndex ?>"
                    onblur="ValidateOrderFileProductQuantity(<?= $deliveryPointIndex ?>, <?= $receiverIndex ?>, <?= $productIndex ?>)"
                    onkeypress="return isNumber(event)" style="padding-right: 10px;" id="qo-soluong-ht"
                    class="productQuantity productTextQuantity_<?= $deliveryPointIndex.'_'. $receiverIndex ?> ">
                  <span
                    class=" err_messages err_productQuantity_<?= $deliveryPointIndex.'_'. $receiverIndex ?>"><?php echo $getErrors['ward']; ?></span>
                </li>
                <li class="col-md-3 col-sm-6">
                  <br>
                  <!-- btn save -->
                  <button type="button" class="or-lhh-btn saveProduct_<?= $deliveryPointIndex.'_'.$receiverIndex ?>"
                    onclick="saveProductOrderFiles(<?= $deliveryPointIndex ?>, <?= $receiverIndex ?>, <?= $productIndex + 1 ?>,'addProduct')"
                    id="qo-btn-thh-1-<?= $deliveryPointIndex.'-'.$receiverIndex ?>"
                    deliveryPointIndex=<?= $deliveryPointIndex ?> receiverIndex=<?= $receiverIndex?>
                    productIndex=<?= $productIndex + 1 ?>><?= lang('Label.lbl_txtGoodSave') ?>
                  </button>
                  <input type="hidden" class="productIndexNext" name="" value="">
                </li>
              </ul>
            </li>
          </ul>


          <!-- END hàng hóa -->
          <ul class="col-12 mt-2 mb-0">
            <li class="or-dvht">
              <?= lang('Label.lbl_txtSupportServices') ?>
            </li>
          </ul>
          <ul class="col-md-3 col-sm-6 or-ctdh-1">
            <li>
              <?= lang('Label.lbl_txtGoodSize') ?><span style="color: #885DE5;"> *</span>
              <br>
              <!-- length -->
              <input name="" value="<?= $value['length'].'-'.$value['width'].'-'. $value['height'] ?>"
                class=" editSize_<?= $deliveryPointIndex ?>" onkeypress="return isNumber(event)" type="text"
                placeholder="Dài-rộng-cao">
              <span style="margin-left: -34px;">Cm</span>
              <br>
              <span class=" err_messages err_size_<?= $deliveryPointIndex ?>"></span>
            </li>
          </ul>
          <ul class="col-md-3 col-sm-6 or-ctdh-1">
            <li>
              <?= lang('Label.lbl_txtGoodWeight') ?><span style="color: #885DE5;">
                *</span> <br>
              <!-- weight -->
              <input value="<?= number_format($value['weight'],0,"",".");?>" name=""
                class="editWWeight_<?= $deliveryPointIndex ?>" onkeypress="return isNumber(event)"
                onkeyup="returnFormatValue(<?= $deliveryPointIndex ?>, <?= $receiverIndex ?>, <?= $productIndex ?>,'editWWeight','1')"
                type="text">
              <span style="margin-left: -50px;">Gram</span>
              <br>
              <span class=" err_messages err_weight_<?= $deliveryPointIndex ?>"></span>
            </li>
          </ul>
          <ul class="col-md-6 col-sm-12 or-ctdh-1">
            <li>
              <?= lang('Label.lbl_txtExtraNote') ?><span style="color: #885DE5;"></span>
              <br>
              <!-- note -->
              <input name="" onblur="checkNote(<?= $deliveryPointIndex ?>, <?= $receiverIndex ?>, <?= $productIndex ?>)"
                type="text" value="<?= $value['note'];?>" class="or-ttnh-input1 editNote_<?= $deliveryPointIndex ?>">
              <span class=" err_messages err_note_<?= $deliveryPointIndex ?>"></span>
            </li>
          </ul>

          <ul class="col-xl-2 col-sm-3 or-ctdh-1">
            <li class="or-cgc-1">
              <?= lang('Label.lbl_txtPayerFee') ?><span style="color: #885DE5;"> *</span>
              <br>
              <!-- isFree -->

              <input type="radio" name="orderPayment_<?= $deliveryPointIndex ?>"
                <?= ($value['orderPayment'] == 1)? 'checked' : ''; ?> value="1"
                class="or-radio-checked editOrderPayment_<?= $deliveryPointIndex ?>" id="orderPayment_<?= $index ?>">
              <label for="orderPayment_<?= $deliveryPointIndex ?>">
                <?= lang('Label.lbl_txtPayerFeeSender') ?></label>

              <br>

              <input type="radio" name="orderPayment_<?= $deliveryPointIndex ?>"
                <?= ($value['orderPayment'] == 2)? 'checked' : ''; ?> value="2"
                class="or-radio-checked editOrderPayment_<?= $deliveryPointIndex ?>" id="orderPaymenta_<?= $index ?>">
              <label for="orderPaymenta_<?= $deliveryPointIndex ?>"><?= lang('Label.lbl_txtPayerFeeReceiver') ?></label>

            </li>
          </ul>
          <ul class="col-xl-2 col-sm-3 or-ctdh-1">
            <li class="or-cgc-1"><?= lang('Label.lbl_txtPartialDelivery') ?><span style="color: #885DE5;">
                *</span> <br>

              <!-- partialDelivery -->
              <input type="radio" name="partialDelivery_<?= $deliveryPointIndex?>" value="1"
                class="or-radio-checked editPartialDelivery_<?= $deliveryPointIndex ?>"
                id="gh1p1_<?= $deliveryPointIndex ?>" <?= ($value['partialDelivery'] == 1)? 'checked' : ''; ?>>
              <label for="gh1p1_<?= $deliveryPointIndex ?>"><?= lang('Label.lbl_txtPartialDeliveryYes') ?>
              </label><br>

              <input type="radio" name="partialDelivery_<?= $deliveryPointIndex?>" value="0"
                class="or-radio-checked editPartialDelivery_<?= $deliveryPointIndex ?>"
                id="gh1p1a_<?= $deliveryPointIndex ?>" <?= ($value['partialDelivery'] == 0)? 'checked' : ''; ?>>
              <label for="gh1p1a_<?= $deliveryPointIndex ?>"><?= lang('Label.lbl_txtPartialDeliveryNo') ?></label>
            </li>
          </ul>
          <ul class="col-xl-2 col-sm-3 or-ctdh-1">
            <li class="or-cgc-1">
              <?= lang('Label.lbl_txtIsReturn') ?> <br>
              <!-- isRefund -->
              <input type="radio" name="isReturn_<?= $deliveryPointIndex ?>" value="1"
                <?= ($value['isReturn'] == 1)? 'checked' : '' ; ?>
                class="or-radio-checked editIsReturn_<?= $deliveryPointIndex ?>" id="dvch1_<?= $deliveryPointIndex ?>">
              <label for="dvch1_<?= $deliveryPointIndex ?>"><?= lang('Label.lbl_txtPartialDeliveryYes') ?></label>
              <br>
              <input type="radio" name="isReturn_<?= $deliveryPointIndex ?>" value="0"
                <?= ($value['isReturn'] == 0)? 'checked' : '' ; ?>
                class="or-radio-checked editIsReturn_<?= $deliveryPointIndex ?>" id="dvch1a_<?= $deliveryPointIndex ?>">
              <label for="dvch1a_<?= $deliveryPointIndex ?>"><?= lang('Label.lbl_txtPartialDeliveryNo') ?></label>
            </li>
          </ul>
          <ul class="col-xl-2 col-sm-3 or-ctdh-1 or-ctdh-2">
            <!-- <li class="or-cgc-1">
                <?php //lang('Label.lbl_txtExtraServices') ?> <br>

                <input type="checkbox" class="regular-checkbox or-radio-checked editIsDoorDeliver_<?php //$deliveryPointIndex ?>" id="dvthem1_<?php //$deliveryPointIndex ?>" <?php //($value['isDoorDeliver'] == 1) ? 'checked' : '' ?> /> 
                <label for="dvthem1_<?php //$deliveryPointIndex ?>"><?php //lang('Label.lbl_txtIsDoorDeliver') ?></label>
                
                <br>
                
                <input type="checkbox" class="regular-checkbox or-radio-checked editIsDoor_<?php //$deliveryPointIndex ?>" id="dvthem1a_<?php //$deliveryPointIndex ?>" <?php //($value['isPorter'] == 1) ? 'checked' : '' ?> />
                <label for="dvthem1a_<?php //$deliveryPointIndex ?>"><?php //lang('Label.lbl_txtIsPorter') ?></label>

                <br>
                
                <input type="checkbox" class="regular-checkbox or-radio-checked editPickUpType_<?php //$deliveryPointIndex ?>" id="dvthem1b_<?php //$deliveryPointIndex ?>" <?php //($value['pickupType'] == 1) ? 'checked' : '' ?> />
                <label for="dvthem1b_<?php //$deliveryPointIndex ?>"><?php //lang('Label.lbl_txtPickupType') ?></label>
            </li> -->
            <li class="or-cgc-1">
              <?= lang('Label.lbl_txtPickupType') ?> <br>
              <!-- isRefund -->
              <input type="radio" name="pickUpType<?= $deliveryPointIndex ?>" value="1"
                <?= ($value['pickupType'] == 1)? 'checked' : '' ; ?>
                class="or-radio-checked editpickUpType_<?= $deliveryPointIndex ?>"
                id="pickupType_<?= $deliveryPointIndex ?>">
              <label for="pickupType_<?= $deliveryPointIndex ?>"><?= lang('Label.lbl_txtPartialDeliveryYes') ?></label>
              <br>
              <input type="radio" name="pickUpType<?= $deliveryPointIndex ?>" value="2"
                <?= ($value['pickupType'] == 2)? 'checked' : '' ; ?>
                class="or-radio-checked editpickUpType_<?= $deliveryPointIndex ?>"
                id="pickupTypeA_<?= $deliveryPointIndex ?>">
              <label for="pickupTypeA_<?= $deliveryPointIndex ?>"><?= lang('Label.lbl_txtPartialDeliveryNo') ?></label>
            </li>
          </ul>
          <ul class="col-xl-4 col-sm-12 or-ctdh-1">
            <li>
              <?= lang('Label.lbl_txtNoteRequired') ?> <span style="color: #885DE5;">
                *</span> <br>
              <select class="requiredNote_<?= $deliveryPointIndex ?> chosen-select"
                id="requiredNote_<?= $deliveryPointIndex ?>" name="requireNote" style="width: 100%;">
                <option <?= ($value['requireNote'] == 1) ? 'selected' : ''; ?> value="1">
                  <?= lang('Label.lbl_txtNoteRequired1') ?></option>
                <option <?= ($value['requireNote'] == 2) ? 'selected' : ''; ?> value="2">
                  <?= lang('Label.lbl_txtNoteRequired2') ?></option>
                <option <?= ($value['requireNote'] == 3) ? 'selected' : ''; ?> value="3">
                  <?= lang('Label.lbl_txtNoteRequired3') ?></option>
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
              deliveryPointIndex='<?= $deliveryPointIndex ?>' receiverIndex='<?= $receiverIndex ?>'
              productIndex='<?= $productIndex ?>'
              onclick="closeOrderDetailFile(<?= $deliveryPointIndex ?>, <?= $receiverIndex ?>, <?= $productIndex?>)"
              type="button"><?= lang('Label.lbl_txtFinish') ?></button>
          </ul>
          <!-- <ul style="border-bottom: 0.5px dashed #BCB8C6; width: 90%; margin: 0px auto;" class="col-12"></ul> -->
        </div>
      </div>
    </div>
    <?php 
        endforeach;
    }
    //End check dataParams
    ?>
    <!-- ================================END Điểm giao  2========= -->
    <div class="qo-dhtf row qo-dhtf-end btnListOrders">
      <div class=" col-lg-2 col-md-2 checkall pl-2">
      <label> 
         <input class="checkAllCustom frm-check" id="checkAllCustom" checked="checked" value="all-order" name="check[]"
          type="checkbox">
        <span class="lblCheckAllCustom fz13"><?= lang('Label.lbl_selectAll') ?></span> </lable> 
      </div>
      <div class=" col-lg-2 col-md-2">
        <a href="<?php echo base_url('/tao-don-nhanh');?>">
          <button type="button" class="tabClassify"> <?= lang('Label.lbl_dowloadOrders') ?> </button></a>
      </div>
      <div class=" col-lg-2 col-md-2">
        <button class="tabClassify ordersError" type="button" onclick="ordersError()">
          <?= lang('Label.lbl_ordersError') ?></button>
      </div>
      <div class=" col-lg-2 col-md-2">
        <button class="tabClassify ordersDoubts" type="button"
          onclick="ordersDoubts()"><?= lang('Label.lbl_ordersDoubts') ?></button>
      </div>
      <div class=" col-lg-2 col-md-2">
        <button class="tabClassify ordersAll brdActive" type="button"
          onclick="orderAll()"><?= lang('Label.lbl_statusNull') ?></button>
      </div>
      <div class=" col-lg-2 col-md-2 ">
        <input type="hidden" class="addPricing" name="checkPricing" value="">
        <button class="btnPricing" name="pricing" type="button" value="pricing"
          onclick="btnPricingConfirm(<?= count($dataParams) ?>)"><?= lang('Label.lbl_txtNext') ?></button>
      </div>
    </div>
  </form>

  <div class="modalDeleteItem">
  </div>
</section>

<div class="modal" id="stepTwoOrderFiles">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top: 17%;">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title headerFalse">
          <?= lang('Label.lbl_notificationConfirm') ?>
        </h5>
        <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row modal-body-content">
          <div class="col-12 textCenter bodyOrderFalse">
            <p class="fz13">
              <?= lang('Label.lbl_nothingOrder') ?>
            </p>
          </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer customize-approve">
        <button type="button" class="btn btn-modal" data-dismiss="modal"><?= lang('Label.modalClose'); ?></button>
      </div>

    </div>
  </div>
</div>
<?php 
	$deliveryPointIndex = 1;
    $receiverIndex = 1;
    $productIndex = 1;
?>
<section id="orders">
  <div class="warehouse-banner-title row">
    <ul class="col-md-3" style="margin-bottom: 9px;">
      <li>
        <img src="<?php echo base_url('public/images/Home.png');?>" alt="">
      </li>
      <li class="mt2-config title-page">
        > <span> <?= lang('Label.lbl_order') ?> </span> > <span><?php echo $title ?></span>
      </li>
    </ul>
    <div class="col-md-6 row" style="margin-bottom: 9px;">
      <div class="col-4 pr-0">
        <ul class="or-banner1 ol-0">
          <li style="background: #2DB1DB!important;color: white!important;line-height: 20px;">
            1
          </li>
          <li style="color: #2DB1DB!important;" class="or-cgc-1">
            GN1
          </li>
        </ul>
      </div>
      <div class=" col-4 pr-0">
        <ul class="or-banner">
          <li>
            2
          </li>
          <li class="or-cgc-1 ">
            <?= lang('Label.lbl_setInfo'); ?>
          </li>
        </ul>
      </div>
      <div class="col-4 pr-0 pl-0">
        <ul class="or-banner1">
          <li style="line-height: 20px;">
            3
          </li>
          <li class="or-cgc-1">
            <?= lang('Label.lbl_confirmOrder'); ?>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <!-- <span onclick="getAllValue()"> Get All Value</span> -->
  <form action="" id="form-warehouse-user" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="packCode" value="<?= $packCode ?>">
    <input type="hidden" name="packType" value="<?= $packType ?>">
    <input type="hidden" name="deliveryPointNumber" value="<?= $deliveryPointIndex ?>">
    <div class="d-flex main-orders">
      <div class="line-left-orders">
        <div>
          <img src="<?php echo base_url('public/images/Polygon8.png');?>" alt="">
        </div>
      </div>
      <div>
        <!-- Start Sender Infomation -->
        <div class="or-ttng row ">
          <ul class="col-sm-6">
            <li>
              <b><?= lang('Label.lbl_txtInfoSender') ?></b>
            </li>
          </ul>
          <!-- Choose old pickupAddress -->
          <ul class="col-sm-6 ordersDetail-ttng-select">
            <li style="height: 30px;" class="float-right">
              <div class="dropdown orDetail-select-address">
                <input class="dropdown-toggle choosePickUpAddress" type="button" id="dropdownMenuButton"
                  data-toggle="dropdown" value="<?= lang('Label.lbl_createNewWareHouse') ?>" style="border: none;" />
                <input type="hidden" class="pickupAddressId" value="" name="pickupAddressId">
                <img src="<?php echo base_url('public/images/iconDownX.png');?>" alt="">

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <div class="dropdown-item pl-0 orDetail-data-select" href="#" style="padding-left: 21px!important;"
                    onclick="choosePickupAddress(0)">
                    <img src="<?php echo base_url('public/images/add.png');?>" alt="">
                    <span
                      style="color: #885DE5;font-size: 14px; padding-left: 4px;"><?= lang('Label.lbl_newAddress') ?></span>
                  </div>
                  <?php foreach($pickupAddress as $warehouse): ?>

                  <div class="dropdown-item pl-0  orDetail-data-select" href="#" style="padding-left: 21px!important;"
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
          <div class="row pd20">
            <ul class="col-sm-6 orDetail-input">
              <li>
                <?= lang('Label.lbl_txtNameSender') ?><span style="color: #885DE5;"> *</span>
              </li>
              <li>
                <input type="text" class="pickName unNumber" name="pickName" value="<?= $dataOrderIdDraw['pickName'] ?>"
                  placeholder="<?= lang('Label.lbl_setNameSender') ?>">
                <span class=" err_messages err_pickName"><?php echo $getErrors['pickName']; ?></span>
              </li>
            </ul>
            <ul class="col-sm-6 orDetail-input">
              <li>
                <?= lang('Label.phone') ?><span style="color: #885DE5;"> *</span>
              </li>
              <li>
                <input type="text" class="pickPhone" name="pickPhone" value="<?= $dataOrderIdDraw['pickPhone'] ?>"
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
                <input type="text" name="pickAddress" class="pickAddress" value="<?= $dataOrderIdDraw['pickAddress'] ?>"
                  placeholder="<?= lang('Label.lbl_inputDetailAddress') ?>">
                <span class=" err_messages err_pickAddress"><?php echo $getErrors['pickAddress']; ?></span>
              </li>
            </ul>
            <ul class="col-sm-6 row orDetail-input pr-0" style="padding-top: 24px;">
              <li class="col-md-4 mb-2 pr-0">
                <select name="pickProvince" id="province"
                  class="form-control frm-lg pickProvince chosen-select province_code_from ">
                  <option value="0"><?= lang('Label.lbl_orderWareHouseProvince'); ?></option>
                  <?php foreach($dataProvinces as $province): ?>
                  <option <?= ($dataOrderIdDraw['pickProvince'] == $province['code']) ? 'selected': ''  ?>
                    value="<?= $province['code']; ?>"> <?= $province['name']; ?>
                  </option>
                  <?php endforeach; ?>
                </select>
                <span class=" err_messages err_province"><?php echo $getErrors['pickProvince']; ?></span>
              </li>
              <li class="col-md-4 mb-2 pr-0">
                <select name="pickDistrict" id="district"
                  class="form-control pickDistrict frm-lg chosen-select district_code_from ">
                  <option value=""><?= lang('Label.lbl_orderWareHouseDistrict'); ?></option>
                  <?php
                                        if(!empty($dataDistricts)){
                                            foreach($dataDistricts as $district): ?>
                  <option <?= ($dataOrderIdDraw['pickDistrict'] == $district['code']) ? 'selected': ''  ?>
                    value="<?= $district['code']; ?>"> <?= $district['name']; ?>
                    <?php endforeach;
                                        }
                                    ?>
                </select>
                <span class=" err_messages err_district"><?php echo $getErrors['pickDistrict']; ?></span>
              </li>
              <li class="col-md-4 mb-2 pr-0">
                <select name="pickWard" id="ward" class="form-control frm-lg pickWard chosen-select ward_code_from ">
                  <option value=""><?= lang('Label.lbl_orderWareHouseWard'); ?></option>
                  <?php
                                        if(!empty($dataWards)){
                                            foreach($dataWards as $ward): ?>
                  <option <?= ($dataOrderIdDraw['pickWard'] == $ward['code']) ? 'selected': ''  ?>
                    value="<?= $ward['code']; ?>"> <?= $ward['name']; ?>
                    <?php endforeach;
                                        }
                                    ?>
                </select>
                <span class=" err_messages err_ward"><?php echo $getErrors['pickWard']; ?></span>
              </li>
            </ul>
          </div>
          <!-- End choose pickupAddress -->

          <div class="row senderInfo">

          </div>

          <!-- Show Address -->

        </div>
        <!-- End Sender Infomation -->

        <!-- Order detail -->
        <?php
                if(!empty($dataDeliveryPoint)){
                    foreach($dataDeliveryPoint as $key => $deliveryPoint):
                        $deliveryPointIndex = $key +1;
                 ?>
        <div class="ttdh-main">
          <div class="or-dgh-1 pb-3" style="margin-left: -40px;">
            <span class="or-dh-stt" style="background-color: #2DB1DB;"><?= $receiverIndex ?></span>
            <?= lang('Label.lbl_orderReceiver') ?>
          </div>
          <div class="or-ttdh row ">
            <ul class="or-dgh col-6">
              <li class="or-dgh-2">
                <input type="text" class="address_<?= $deliveryPointIndex ?>"
                  onblur="addAddressDetail(<?= $deliveryPointIndex ?>)" deliveryPointIndex="<?= $deliveryPointIndex ?>"
                  name="deliveryPoint[<?= $deliveryPointIndex ?>][address]" value="<?= $deliveryPoint['address'] ?>"
                  placeholder="<?= lang('Label.lbl_orderAddressReceiver'); ?>">
                <span class=" err_messages err_address_<?= $deliveryPointIndex ?>"><?php echo $getErrors['address']; ?>
              </li>
            </ul>
            <!-- Change Province -->

            <ul
              class="col-sm-6 row orDetail-input orderDetail-chosen pr-0 orderDetail_<?= $deliveryPointIndex ?> address_v2"
              style="padding-top: 24px;">
              <li class="col-md-4 mb-2 pr-0 provinceReceiver_<?= $deliveryPointIndex?>">
                <select name="deliveryPoint[<?= $deliveryPointIndex ?>][province]"
                  index_prov="<?= $deliveryPointIndex ?>" id="provinceReceiver_<?= $deliveryPointIndex?>"
                  class="form-control frm-lg chosen-select order_province_code_from ">
                  <option value="0"><?= lang('Label.lbl_orderWareHouseProvince'); ?></option>
                  <?php foreach($dataProvinces as $province): ?>
                  <option <?= ($deliveryPoint['province'] == $province['code'] ) ?'selected' : '' ?>
                    value="<?= $province['code']; ?>"> <?= $province['name']; ?>
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
                  index_dict="<?= $deliveryPointIndex ?>" placeholder="" id="districtReceiver_<?= $deliveryPointIndex?>"
                  class="form-control frm-lg chosen-select order_district_code_from ">
                  <option value="0"><?= lang('Label.lbl_orderWareHouseDistrict'); ?></option>
                </select>
                <span
                  class=" err_messages err_district_<?= $deliveryPointIndex?>"><?php echo $getErrors['district']; ?></span>
              </li>

              <li class="col-md-4 mb-2 pr-0 wardReceiver_<?= $receiverIndex?>">

                <select name="deliveryPoint[<?= $receiverIndex ?>][ward]" index_ward="<?= $receiverIndex ?>"
                  index_ward="<?= $receiverIndex ?>" id="wardReceiver_<?= $receiverIndex?>"
                  class="form-control frm-lg chosen-select order_ward_code_from ">
                  <option value="0"><?= lang('Label.lbl_orderWareHouseWard'); ?></option>
                </select>
                <span class=" err_messages err_ward_<?= $deliveryPointIndex?>"><?php echo $getErrors['ward']; ?></span>
              </li>
            </ul>
            <!-- After click hoàn thành ( filter order detail) -->
            <div class="or-ttng row  w100 afOrder_<?= $deliveryPointIndex?>">
              <?php
                                    $receivers = $deliveryPoint['receivers'];
                                    foreach($receivers as $keyReceiver => $receiver):
                                        $receiverIndex = $keyReceiver +1;
                                ?>

              <div class="row w100 afOrder_<?= $deliveryPointIndex .'_'.$receiverIndex ?>"
                style="line-height: 32px;padding: 10px 0;background: #F8F8F8;margin: 15px 20px!important;border-radius: 5px;">
                <div class=" col-lg-3 col-md-12 senderItems" style="position: relative;">
                  <span class="or-dh-stt"
                    style="background: #8D869D;position: absolute; line-height:12px;"><?= $receiverIndex ?></span>
                  <ul style="padding: 0px 40px;">
                    <li class="fz13"> <?= $receiver['phone'] ?></li>
                    <li class="fz13" style="color:#68656D"> <?= $receiver['name'] ?></li>

                  </ul>
                </div>
                <div class=" col-lg-8 col-md-12">
                  <?php
                                            $items = $receiver['items'];
                                            foreach($items as $keyItem => $item):
                                                $productIndex = $keyItem + 1;
                                        ?>
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13">
                      <?= $item['productName'] ?>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13">
                      <?= lang('Label.lbl_detailQuantity') ?>: <span
                        class="colorPurple"><?= $item['productQuantity'] ?></span>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13">
                      <?= lang('Label.lbl_detailCOD') ?>: <span class="colorOrange"><?= $item['productCod'] ?></span> đ
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 fz13">
                      <?= lang('Label.lbl_detailProductValue') ?>: <span><?= $item['productValue'] ?></span> đ
                    </div>
                  </div>
                  <?php endforeach; ?>
                </div>

                <div class=" col-lg-1 col-md-12 col-sm-6 col-xs-6 buttonItems">
                  <span> <img class="deleteAllProductItem" deliveryPointIndex='<?= $deliveryPointIndex ?>'
                      receiverIndex='<?= $receiverIndex ?>' productIndex='<?= $productIndex ?>'
                      src="<?= base_url('public/images/or-delete.png') ?>" alt="<?= lang('Label.lbl_edit') ?>"> </span>
                  <span> <img class="updateAllProductItem" deliveryPointIndex="<?= $deliveryPointIndex ?>"
                      receiverIndex='<?= $receiverIndex ?>' productIndex='<?= $productIndex ?>'
                      src="<?= base_url('public/images/or-edit.png')?>" alt="<?= lang('Label.lbl_delete')?>"> </span>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
            <!-- End click hoàn thành  -->

            <!-- Order info -->
            <?php 
                        $receivers = $deliveryPoint['receivers'];
                        foreach($receivers as $keyReceiver => $receiver):
                            $receiverIndex = $keyReceiver +1;
                        ?>
            <div class="or-ttng row dpn pickupOrder_<?= $deliveryPointIndex.'_'.$receiverIndex ?>">
              <div class="chinhsua1 mb-1">
                <!-- ========HIỂN THỊ KHI CLICK VÀO SỬA ĐƠN HÀNG ========= -->
                <div id="orders" class="or-ttdh row qo-ttdhl receiver-<?= $deliveryPointIndex.'-'.$receiverIndex?>">
                  <ul class="or-dgh col-12 ">
                    <li class="or-dgh-1 pt-0 mt-0">
                      <span class="or-dh-stt" style="background: #F0A616;"><?= $receiverIndex ?></span><span
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
                          <?= lang('Label.lbl_txtReceiverPhone') ?><span style="color: #885DE5;"> *</span> <br>
                          <input
                            name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][phone]"
                            type="text" class="receiverPhone" value="<?= $receiver['phone'] ?>"
                            index_item="<?= $receiverIndex ?>" onkeypress="return isNumber(event)"
                            placeholder="<?= lang('Label.ph_phone') ?>"><br>
                          <span
                            class=" err_messages err_receiverPhone_<?= $deliveryPointIndex.'_'.$receiverIndex ?>"><?php echo $getErrors['ward']; ?></span>
                        </li>

                        <li class="col-md-3 col-sm-6 or-cgc-1">
                          <?= lang('Label.lbl_txtReceiverName') ?><span style="color: #885DE5;"> *</span> <br>
                          <input
                            name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][name]"
                            index_item="<?= $receiverIndex ?>" class="receiver unNumber"
                            value="<?= $receiver['name'] ?>" type="text"
                            placeholder="<?= lang('Label.lbl_txtReceiverName') ?>"><br>
                          <span
                            class=" err_messages err_receiver_<?= $deliveryPointIndex.'_'.$receiverIndex ?>"><?php echo $getErrors['ward']; ?></span>
                        </li>
                        <li class="col-md-3 col-sm-6 or-cgc-1">
                          <?= lang('Label.lbl_txtReceiverDate') ?><span style="color: #885DE5;"> *</span> <br>
                          <input
                            name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][expectDate]"
                            index_item="<?= $deliveryPointIndex ?>" type="text" value="<?= $receiver['expectDate'] ?>"
                            class="orderdatePicker expectDate" style="padding-right: 10px;"><br>
                          <span
                            class=" err_messages err_expectDate_<?= $deliveryPointIndex ?>"><?php echo $getErrors['ward']; ?></span>
                        </li>
                        <li class="col-md-3 col-sm-6 or-cgc-1">
                          <?= lang('Label.lbl_txtReceiverTime') ?><span style="color: #885DE5;"> *</span> <br>
                          <input
                            name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][expectTime]"
                            index_item="<?= $receiverIndex ?>" type="time" value="<?= $receiver['expectTime'] ?>"
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
                            class="productName productName_<?= $deliveryPointIndex.'_'.$receiverIndex?>" type="text"
                            placeholder="<?= lang('Label.lbl_inputGoodName') ?>" id="qo-tensp-ht">
                          <span
                            class=" err_messages err_productName_<?= $deliveryPointIndex.'_'.$receiverIndex ?>"><?php echo $getErrors['ward']; ?></span>
                        </li>
                        <li class="col-md-3 col-sm-6">
                          <?= lang('Label.lbl_txtCod') ?><span style="color: #885DE5;">
                            *</span> <br>
                          <input index_item="<?= $receiverIndex ?>" onkeypress="return isNumber(event)" type="text"
                            value="0" class="or-cod productCOD_<?=  $deliveryPointIndex.'_'. $receiverIndex?>"
                            id="qo-cod-ht">
                          <span style="margin-left: -34px;"> đ</span>
                          <span
                            class=" err_messages err_productCod_<?= $deliveryPointIndex.'_'.$receiverIndex ?>"><?php echo $getErrors['ward']; ?></span>
                        </li>
                        <li class="col-md-3 col-sm-6 or-cgc-1">
                          <input index_item="<?= $receiverIndex ?>" checked name="checkProductValue"
                            id="checkProductValue_<?=  $deliveryPointIndex.'_'. $receiverIndex?>" type="checkbox"
                            class="regular-checkbox mb-0 checkProductValue" style="width: 10px;height: 10px;">
                          <label for="checkProductValue"><?= lang('Label.lbl_txtGoodValue') ?></label><span
                            style="color: #885DE5;"> *</span> <br>
                          <input index_item="<?= $receiverIndex ?>" type="text" value="0"
                            onkeypress="return isNumber(event)"
                            class="or-ttnh-input or-gtkg productValue_<?=  $deliveryPointIndex.'_'. $receiverIndex?>"
                            id="qo-khaigia-ht"><span style="margin-left: -34px;"> đ</span>
                          </br>
                          <span
                            class=" err_messages err_productValue_<?= $deliveryPointIndex.'_'.$receiverIndex ?>"><?php echo $getErrors['ward']; ?></span>
                        </li>
                      </ul>
                      <ul class="row">
                        <li class="col-md-6 col-sm-12">
                          <?= lang('Label.lbl_txtGoodType'); ?><span style="color: #885DE5;">
                            *</span> <br>
                          <select style="padding-right: 10px;" placeholder="Chọn loại hàng hóa"
                            id="productCategory_<?= $deliveryPointIndex.'_'. $receiverIndex ?>"
                            class="chosen-select productCategory_<?= $deliveryPointIndex.'_'. $receiverIndex ?>">
                            <option value="0">Chọn loại hàng hóa</option>
                            <?php foreach($arrProductCategory as $keyProductCate => $productCategory): ?>
                            <option value="<?= $keyProductCate ?>"><?= $productCategory ?></option>
                            <?php endforeach; ?>
                          </select>
                        </li>
                        <li class="col-md-3 col-sm-6">
                          <?= lang('Label.lbl_txtGoodQuantity'); ?><span style="color: #885DE5;">
                            *</span> <br>
                          <input value="1" onkeypress="return isNumber(event)" style="padding-right: 10px;"
                            id="qo-soluong-ht" class="productQuatity_<?= $deliveryPointIndex.'_'. $receiverIndex ?>">
                          <span
                            class=" err_messages err_productQuatity_<?= $deliveryPointIndex.'_'.$receiverIndex ?>"><?php echo $getErrors['ward']; ?></span>
                        </li>
                        <li class="col-md-3 col-sm-6">
                          <br>
                          <button type="button" class="or-lhh-btn saveProduct"
                            id="qo-btn-thh-1-<?= $deliveryPointIndex.'-'.$receiverIndex ?>"
                            deliveryPointIndex=<?= $deliveryPointIndex ?> receiverIndex=<?= $receiverIndex?>
                            productIndex=<?= count($receiver['items']) + 1 ?>><?= lang('Label.lbl_txtGoodSave') ?></button>
                          <button type="button" deliveryPointIndex=<?= $deliveryPointIndex ?>
                            receiverIndex=<?= $receiverIndex?> productIndex=<?= count($receiver['items']) + 1 ?>
                            class="or-lhh-btn qo-ed-a updateProduct"
                            id="qo-btn-thh-2-<?= $deliveryPointIndex.'-'.$receiverIndex ?>"><?= lang('Label.lbl_txtSaveInfo') ?></button>

                        </li>
                      </ul>

                    </li>
                  </ul>
                  <!-- Nếu có thêm mới hàng hóa thì phần này sẽ đươc hiện -->
                  <div style="width: 100%;" class="ttsp" id="ttsp_<?= $deliveryPointIndex.'_'.$receiverIndex ?>">
                    <?php
                                                $items = $receiver['items'];
                                                foreach($items as $keyItem => $item):
                                                    $productIndex = $keyItem + 1;
                                            ?>
                    <ul class="col-12" id="tdl-tthh-<?= $productIndex?>">
                      <li class="or-ttdh-add">
                        <ul class="row">
                          <li class="or-dh-tt col-sm-3 pl-2">
                            <span class="or-dh-stt" style="background: #885DE5;"><?= $productIndex?></span>
                            <span
                              id="ttct-cthh-name_<?= $deliveryPointIndex ?>_<?= $receiverIndex ?>_<?= $productIndex?>"><?= $item['productName'] ?></span>
                          </li>
                          <li class="or-dh-sl col-sm-1">
                            SL: <span
                              id="ttct-cthh-amount_<?= $deliveryPointIndex ?>_<?= $receiverIndex ?>_<?= $productIndex?>"><?= $item['productQuantity'] ?></span>
                          </li>
                          <li class="or-dh-sp col-sm-3">
                            <span
                              id="ttct-cthh-category_<?= $deliveryPointIndex ?>_<?= $receiverIndex ?>_<?= $productIndex?>"><?= $arrProductCategory[$item['productCategory']] ?></span>
                          </li>
                          <li class="or-dh-cod col-sm-2">
                            COD: <span
                              id="ttct-cthh-cod_<?= $deliveryPointIndex ?>_<?= $receiverIndex ?>_<?= $productIndex?>"><?= $item['productCod'] ?></span>đ
                          </li>
                          <li class="or-dh-kg col-sm-2">
                            Khai giá: <span
                              id="ttct-cthh-price_<?= $deliveryPointIndex ?>_<?= $receiverIndex ?>_<?= $productIndex?>"><?= $item['productValue'] ?></span>đ
                          </li>
                          <li class="or-dh-ed col-sm-1">
                            <img src="<?= base_url('/public/images/or-delete.png') ?>"
                              onclick="removeProduct('tdl-tthh-<?= $productIndex?>',<?= $receiverIndex ?>,<?= $productIndex?>)">
                            <img src="<?= base_url('/public/images/or-edit.png') ?>"
                              onclick="editProduct(<?= $deliveryPointIndex ?>,<?= $receiverIndex ?>,<?= $productIndex?>)">
                          </li>
                          <input index_item="<?= $productIndex?>"
                            class="productItem_<?= $receiverIndex ?>_<?= $productIndex?> productName_<?= $deliveryPointIndex ?>_<?= $receiverIndex ?>_<?= $productIndex?>"
                            name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][items][<?= $productIndex?>][productName]"
                            type="hidden" value="<?= $item['productName'] ?>">

                          <input index_item="<?= $productIndex?>"
                            class="productItem_<?= $receiverIndex ?>_<?= $productIndex?> cod_<?= $deliveryPointIndex ?>_<?= $receiverIndex ?>_<?= $productIndex?>"
                            name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][items][<?= $productIndex?>][cod]"
                            type="hidden" value="<?= $item['productCod'] ?>">

                          <input index_item="<?= $productIndex?>"
                            class="productItem_<?= $receiverIndex ?>_<?= $productIndex?> productValue_<?= $deliveryPointIndex ?>_<?= $receiverIndex ?>_<?= $productIndex?>"
                            name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][items][<?= $productIndex?>][productValue]"
                            type="hidden" value="<?= $item['productValue'] ?>">

                          <input index_item="<?= $productIndex?>"
                            class="productItem_<?= $receiverIndex ?>_<?= $productIndex?> category_<?= $deliveryPointIndex ?>_<?= $receiverIndex ?>_<?= $productIndex?>"
                            name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][items][<?= $productIndex?>][category]"
                            type="hidden" value="<?= $item['productCategory'] ?>">

                          <input index_item="<?= $productIndex?>"
                            class="productItem_<?= $receiverIndex ?>_<?= $productIndex?> quantity_<?= $deliveryPointIndex ?>_<?= $receiverIndex ?>_<?= $productIndex?>"
                            name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][items][<?= $productIndex?>][quantity]"
                            value="<?= $item['productQuantity'] ?>" type="hidden">
                        </ul>
                      </li>
                    </ul>
                    <?php endforeach; ?>
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
                      <input name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][length]"
                        value="<?= $receiver['length'] ?>" type="text" placeholder="Dài x rộng x cao"><span
                        style="margin-left: -34px;">Cm</span>
                    </li>
                  </ul>
                  <ul class="col-md-3 col-sm-6 or-ctdh-1">
                    <li>
                      <?= lang('Label.lbl_txtGoodWeight') ?><span style="color: #885DE5;">
                        *</span> <br>
                      <input value="<?= $receiver['weight'] ?>"
                        name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][weight]"
                        type="text" value=""><span style="margin-left: -50px;">Gram</span>
                    </li>
                  </ul>
                  <ul class="col-md-6 col-sm-12 or-ctdh-1">
                    <li>
                      <?= lang('Label.lbl_txtExtraNote') ?><span style="color: #885DE5;"> *</span>
                      <br>
                      <input name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][note]"
                        type="text"
                        value="<?= ($receiver['note'] != '') ? $receiver['note'] : 'Cho xem hàng, nếu khách không lấy thu 20k tiền ship' ?>"
                        class="or-ttnh-input1">
                    </li>
                  </ul>

                  <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                    <li class="or-cgc-1">
                      <?= lang('Label.lbl_txtPayerFee') ?><span style="color: #885DE5;"> *</span>
                      <br>
                      <input type="radio"
                        name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][isFree]"
                        class="or-radio-checked" id="orNtc1" value="1"
                        <?= ($receiver['isFree'] == 1) ? 'checked' : '' ?>>
                      <label for="orNtc1"> <?= lang('Label.lbl_txtPayerFeeSender') ?></label>
                      <br>

                      <input type="radio" value="0"
                        name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][isFree]"
                        <?= ($receiver['isFree'] == 0) ? 'checked' : '' ?> class="or-radio-checked" id="orNtc1a">
                      <label for="orNtc1a"><?= lang('Label.lbl_txtPayerFeeReceiver') ?></label>
                    </li>
                  </ul>
                  <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                    <li class="or-cgc-1"><?= lang('Label.lbl_txtPartialDelivery') ?><span style="color: #885DE5;">
                        *</span> <br>
                      <input type="radio" value="1" <?= ($receiver['partialDelivery'] == 1) ? 'checked' : '' ?>
                        name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][partialDelivery]"
                        class="or-radio-checked" id="gh1p1" checked>
                      <label for="gh1p1"><?= lang('Label.lbl_txtPartialDeliveryYes') ?>
                      </label><br>
                      <input type="radio" value="0" <?= ($receiver['partialDelivery'] == 0) ? 'checked' : '' ?>
                        name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][partialDelivery]"
                        class="or-radio-checked" id="gh1p1a"> <label
                        for="gh1p1a"><?= lang('Label.lbl_txtPartialDeliveryNo') ?></label>
                    </li>
                  </ul>
                  <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                    <li class="or-cgc-1">
                      <?= lang('Label.lbl_txtIsReturn') ?> <br>
                      <input type="radio" value="1" <?= ($receiver['isRefund'] == 1) ? 'checked' : '' ?>
                        name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][isRefund]"
                        class="or-radio-checked" id="dvch1" checked>
                      <label for="dvch1"><?= lang('Label.lbl_txtPartialDeliveryYes') ?></label>
                      <br>
                      <input type="radio" value="0" <?= ($receiver['isRefund'] == 0) ? 'checked' : '' ?>
                        name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][isRefund]"
                        class="or-radio-checked" id="dvch1a"> <label
                        for="dvch1a"><?= lang('Label.lbl_txtPartialDeliveryNo') ?></label>
                    </li>
                  </ul>
                  <ul class="col-xl-2 col-sm-3 or-ctdh-1 or-ctdh-2">
                    <li class="or-cgc-1">
                      <?= lang('Label.lbl_txtExtraServices') ?> <br>
                      <input type="checkbox"
                        <?= ($receiver['extraServices']['isDoorDeliver'] == 'on') ? 'checked' : '' ?>
                        name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][extraServices][isDoorDeliver]"
                        class="regular-checkbox or-radio-checked" id="dvthem1" /> <label
                        for="dvthem1"><?= lang('Label.lbl_txtIsDoorDeliver') ?></label>
                      <br>
                      <input type="checkbox" <?= ($receiver['extraServices']['isPorter'] == 'on') ? 'checked' : '' ?>
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
                        <option <?= ($receiver['requireNote'] == 1) ? 'selected' : '' ?> value="1">
                          <?= lang('Label.lbl_txtNoteRequired1') ?></option>
                        <option <?= ($receiver['requireNote'] == 1) ? 'selected' : '' ?> value="2">
                          <?= lang('Label.lbl_txtNoteRequired2') ?></option>
                        <option <?= ($receiver['requireNote'] == 1) ? 'selected' : '' ?> value="3">
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
                      productIndex='<?= $productIndex ?>' type="button"><?= lang('Label.lbl_txtFinish') ?></button>
                  </ul>
                </div>
                <!-- ========HẾT PHẦN SỬA HÀNG HÓA========= -->
              </div>
            </div>
            <div class="or-ttng row addReceiver_<?= $deliveryPointIndex ?> w100">
              <?php endforeach; ?>

            </div>
            <div class="btn-add-orders">
              <button type="button" deliveryPointIndex='<?= count($dataDeliveryPoint) ?>'
                receiverIndex='<?= count($receivers) + 1 ?>' productIndex='1'
                class="or-tctdn-btn addProductItem addProductItem_<?= $deliveryPointIndex ?>">
                <img src="<?php echo base_url('public/images/tdg2.png');?>" alt="" class="float-left pl-2">
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
        <?php
                endforeach;
            }else{ ?>
        <!-- New order -->
        <div class="ttdh-main">
          <div class="or-dgh-1 pb-3" style="margin-left: -40px;">
            <span class="or-dh-stt" style="background-color: #2DB1DB;"><?= $receiverIndex ?></span>
            <?= lang('Label.lbl_orderReceiver') ?>
          </div>
          <div class="or-ttdh row ">
            <ul class="or-dgh col-6">
              <li class="or-dgh-2">
                <input type="text" class="address_<?= $deliveryPointIndex ?>"
                  onblur="addAddressDetail(<?= $deliveryPointIndex ?>)" deliveryPointIndex="<?= $deliveryPointIndex ?>"
                  name="deliveryPoint[<?= $deliveryPointIndex ?>][address]" value="<?= $deliveryPoint['address'] ?>"
                  placeholder="<?= lang('Label.lbl_orderAddressReceiver'); ?>">
                <span class=" err_messages err_address_<?= $deliveryPointIndex ?>"><?php echo $getErrors['address']; ?>
              </li>
            </ul>
            <!-- Change Province -->

            <ul
              class="col-sm-6 row orDetail-input orderDetail-chosen pr-0 orderDetail_<?= $deliveryPointIndex ?> address_v2"
              style="padding-top: 24px;">
              <li class="col-md-4 mb-2 pr-0 provinceReceiver_<?= $deliveryPointIndex?>">
                <select name="deliveryPoint[<?= $deliveryPointIndex ?>][province]"
                  index_prov="<?= $deliveryPointIndex ?>" id="provinceReceiver_<?= $deliveryPointIndex?>"
                  class="form-control frm-lg chosen-select order_province_code_from ">
                  <option value="0"><?= lang('Label.lbl_orderWareHouseProvince'); ?></option>
                  <?php foreach($dataProvinces as $province): ?>
                  <option <?= ($deliveryPoint['province'] == $province['code'] ) ?'selected' : '' ?>
                    value="<?= $province['code']; ?>"> <?= $province['name']; ?>
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
                  index_dict="<?= $deliveryPointIndex ?>" placeholder="" id="districtReceiver_<?= $deliveryPointIndex?>"
                  class="form-control frm-lg chosen-select order_district_code_from ">
                  <option value="0"><?= lang('Label.lbl_orderWareHouseDistrict'); ?></option>
                </select>
                <span
                  class=" err_messages err_district_<?= $deliveryPointIndex?>"><?php echo $getErrors['district']; ?></span>
              </li>

              <li class="col-md-4 mb-2 pr-0 wardReceiver_<?= $receiverIndex?>">

                <select name="deliveryPoint[<?= $receiverIndex ?>][ward]" index_ward="<?= $receiverIndex ?>"
                  index_ward="<?= $receiverIndex ?>" id="wardReceiver_<?= $receiverIndex?>"
                  class="form-control frm-lg chosen-select order_ward_code_from ">
                  <option value="0"><?= lang('Label.lbl_orderWareHouseWard'); ?></option>
                </select>
                <span class=" err_messages err_ward_<?= $deliveryPointIndex?>"><?php echo $getErrors['ward']; ?></span>
              </li>
            </ul>
            <!-- After click hoàn thành ( filter order detail) -->
            <div class="or-ttng row  w100 afOrder_<?= $deliveryPointIndex?>">

            </div>
            <!-- End click hoàn thành  -->

            <!-- Order info -->
            <div class="or-ttng row pickupOrder_<?= $deliveryPointIndex.'_'.$receiverIndex ?>">
              <div class="chinhsua1 mb-1">
                <!-- ========HIỂN THỊ KHI CLICK VÀO SỬA ĐƠN HÀNG ========= -->
                <div id="orders" class="or-ttdh row qo-ttdhl receiver-<?= $deliveryPointIndex.'-'.$receiverIndex?>">
                  <ul class="or-dgh col-12 ">
                    <li class="or-dgh-1 pt-0 mt-0">
                      <span class="or-dh-stt" style="background: #F0A616;"><?= $receiverIndex ?></span><span
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
                          <?= lang('Label.lbl_txtReceiverPhone') ?><span style="color: #885DE5;"> *</span> <br>
                          <input
                            name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][phone]"
                            type="text" class="receiverPhone" index_item="<?= $receiverIndex ?>"
                            onkeypress="return isNumber(event)" placeholder="<?= lang('Label.ph_phone') ?>"><br>
                          <span
                            class=" err_messages err_receiverPhone_<?= $deliveryPointIndex.'_'.$receiverIndex ?>"><?php echo $getErrors['ward']; ?></span>
                        </li>

                        <li class="col-md-3 col-sm-6 or-cgc-1">
                          <?= lang('Label.lbl_txtReceiverName') ?><span style="color: #885DE5;"> *</span> <br>
                          <input
                            name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][name]"
                            index_item="<?= $receiverIndex ?>" class="receiver unNumber"
                            value="<?= $receiver['name'] ?>" type="text"
                            placeholder="<?= lang('Label.lbl_txtReceiverName') ?>"><br>
                          <span
                            class=" err_messages err_receiver_<?= $deliveryPointIndex.'_'.$receiverIndex ?>"><?php echo $getErrors['ward']; ?></span>
                        </li>
                        <li class="col-md-3 col-sm-6 or-cgc-1">
                          <?= lang('Label.lbl_txtReceiverDate') ?><span style="color: #885DE5;"> *</span> <br>
                          <input
                            name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][expectDate]"
                            index_item="<?= $deliveryPointIndex ?>" type="text" value="<?= $receiver['expectDate'] ?>"
                            class="orderdatePicker expectDate" style="padding-right: 10px;"><br>
                          <span
                            class=" err_messages err_expectDate_<?= $deliveryPointIndex ?>"><?php echo $getErrors['ward']; ?></span>
                        </li>
                        <li class="col-md-3 col-sm-6 or-cgc-1">
                          <?= lang('Label.lbl_txtReceiverTime') ?><span style="color: #885DE5;"> *</span> <br>
                          <input
                            name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][expectTime]"
                            index_item="<?= $receiverIndex ?>" type="time" value="<?= $receiver['expectTime'] ?>"
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
                            class="productName productName_<?= $deliveryPointIndex.'_'.$receiverIndex?>" type="text"
                            placeholder="<?= lang('Label.lbl_inputGoodName') ?>" id="qo-tensp-ht">
                          <span
                            class=" err_messages err_productName_<?= $deliveryPointIndex.'_'.$receiverIndex ?>"><?php echo $getErrors['ward']; ?></span>
                        </li>
                        <li class="col-md-3 col-sm-6">
                          <?= lang('Label.lbl_txtCod') ?><span style="color: #885DE5;">
                            *</span> <br>
                          <input index_item="<?= $receiverIndex ?>" onkeypress="return isNumber(event)" type="text"
                            value="0" class="or-cod productCOD_<?=  $deliveryPointIndex.'_'. $receiverIndex?>"
                            id="qo-cod-ht">
                          <span style="margin-left: -34px;"> đ</span>
                          <span
                            class=" err_messages err_productCod_<?= $deliveryPointIndex.'_'.$receiverIndex ?>"><?php echo $getErrors['ward']; ?></span>
                        </li>
                        <li class="col-md-3 col-sm-6 or-cgc-1">
                          <input index_item="<?= $receiverIndex ?>" checked name="checkProductValue"
                            id="checkProductValue_<?=  $deliveryPointIndex.'_'. $receiverIndex?>" type="checkbox"
                            class="regular-checkbox mb-0 checkProductValue" style="width: 10px;height: 10px;">
                          <label for="checkProductValue"><?= lang('Label.lbl_txtGoodValue') ?></label><span
                            style="color: #885DE5;"> *</span> <br>
                          <input index_item="<?= $receiverIndex ?>" type="text" value="0"
                            onkeypress="return isNumber(event)"
                            class="or-ttnh-input or-gtkg productValue_<?=  $deliveryPointIndex.'_'. $receiverIndex?>"
                            id="qo-khaigia-ht"><span style="margin-left: -34px;"> đ</span>
                          </br>
                          <span
                            class=" err_messages err_productValue_<?= $deliveryPointIndex.'_'.$receiverIndex ?>"><?php echo $getErrors['ward']; ?></span>
                        </li>
                      </ul>
                      <ul class="row">
                        <li class="col-md-6 col-sm-12">
                          <?= lang('Label.lbl_txtGoodType'); ?><span style="color: #885DE5;">
                            *</span> <br>
                          <select style="padding-right: 10px;" placeholder="Chọn loại hàng hóa"
                            id="productCategory_<?= $deliveryPointIndex.'_'. $receiverIndex ?>"
                            class="chosen-select productCategory_<?= $deliveryPointIndex.'_'. $receiverIndex ?>">
                            <option value="0">Chọn loại hàng hóa</option>
                            <?php foreach($arrProductCategory as $keyProductCate => $productCategory): ?>
                            <option value="<?= $keyProductCate ?>"><?= $productCategory ?></option>
                            <?php endforeach; ?>
                          </select>
                        </li>
                        <li class="col-md-3 col-sm-6">
                          <?= lang('Label.lbl_txtGoodQuantity'); ?><span style="color: #885DE5;">
                            *</span> <br>
                          <input value="1" onkeypress="return isNumber(event)" style="padding-right: 10px;"
                            id="qo-soluong-ht" class="productQuatity_<?= $deliveryPointIndex.'_'. $receiverIndex ?>">
                          <span
                            class=" err_messages err_productQuatity_<?= $deliveryPointIndex.'_'.$receiverIndex ?>"><?php echo $getErrors['ward']; ?></span>
                        </li>
                        <li class="col-md-3 col-sm-6">
                          <br>
                          <button type="button" class="or-lhh-btn saveProduct"
                            id="qo-btn-thh-1-<?= $deliveryPointIndex.'-'.$receiverIndex ?>"
                            deliveryPointIndex=<?= $deliveryPointIndex ?> receiverIndex=<?= $receiverIndex?>
                            productIndex=<?= $productIndex ?>><?= lang('Label.lbl_txtGoodSave') ?></button>
                          <button type="button" deliveryPointIndex=<?= $deliveryPointIndex ?>
                            receiverIndex=<?= $receiverIndex?> productIndex=<?= $productIndex ?>
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
                      <input name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][length]"
                        value="<?= $receiver['length'] ?>" type="text" placeholder="Dài x rộng x cao"><span
                        style="margin-left: -34px;">Cm</span>
                    </li>
                  </ul>
                  <ul class="col-md-3 col-sm-6 or-ctdh-1">
                    <li>
                      <?= lang('Label.lbl_txtGoodWeight') ?><span style="color: #885DE5;">
                        *</span> <br>
                      <input value="<?= $receiver['weight'] ?>"
                        name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][weight]"
                        type="text" value=""><span style="margin-left: -50px;">Gram</span>
                    </li>
                  </ul>
                  <ul class="col-md-6 col-sm-12 or-ctdh-1">
                    <li>
                      <?= lang('Label.lbl_txtExtraNote') ?><span style="color: #885DE5;"> *</span>
                      <br>
                      <input name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][note]"
                        type="text"
                        value="<?= ($receiver['note'] != '') ? $receiver['note'] : 'Cho xem hàng, nếu khách không lấy thu 20k tiền ship' ?>"
                        class="or-ttnh-input1">
                    </li>
                  </ul>

                  <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                    <li class="or-cgc-1">
                      <?= lang('Label.lbl_txtPayerFee') ?><span style="color: #885DE5;"> *</span>
                      <br>
                      <input type="radio"
                        name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][isFree]"
                        class="or-radio-checked" id="orNtc1" value="1"
                        <?= ($receiver['isFree'] == 1) ? 'checked' : '' ?>>
                      <label for="orNtc1"> <?= lang('Label.lbl_txtPayerFeeSender') ?></label>
                      <br>

                      <input type="radio" value="0"
                        name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][isFree]"
                        <?= ($receiver['isFree'] == 0) ? 'checked' : '' ?> class="or-radio-checked" id="orNtc1a">
                      <label for="orNtc1a"><?= lang('Label.lbl_txtPayerFeeReceiver') ?></label>
                    </li>
                  </ul>
                  <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                    <li class="or-cgc-1"><?= lang('Label.lbl_txtPartialDelivery') ?><span style="color: #885DE5;">
                        *</span> <br>
                      <input type="radio" value="1" <?= ($receiver['partialDelivery'] == 1) ? 'checked' : '' ?>
                        name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][partialDelivery]"
                        class="or-radio-checked" id="gh1p1" checked>
                      <label for="gh1p1"><?= lang('Label.lbl_txtPartialDeliveryYes') ?>
                      </label><br>
                      <input type="radio" value="0" <?= ($receiver['partialDelivery'] == 0) ? 'checked' : '' ?>
                        name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][partialDelivery]"
                        class="or-radio-checked" id="gh1p1a"> <label
                        for="gh1p1a"><?= lang('Label.lbl_txtPartialDeliveryNo') ?></label>
                    </li>
                  </ul>
                  <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                    <li class="or-cgc-1">
                      <?= lang('Label.lbl_txtIsReturn') ?> <br>
                      <input type="radio" value="1" <?= ($receiver['isRefund'] == 1) ? 'checked' : '' ?>
                        name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][isRefund]"
                        class="or-radio-checked" id="dvch1" checked>
                      <label for="dvch1"><?= lang('Label.lbl_txtPartialDeliveryYes') ?></label>
                      <br>
                      <input type="radio" value="0" <?= ($receiver['isRefund'] == 0) ? 'checked' : '' ?>
                        name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][isRefund]"
                        class="or-radio-checked" id="dvch1a"> <label
                        for="dvch1a"><?= lang('Label.lbl_txtPartialDeliveryNo') ?></label>
                    </li>
                  </ul>
                  <ul class="col-xl-2 col-sm-3 or-ctdh-1 or-ctdh-2">
                    <li class="or-cgc-1">
                      <?= lang('Label.lbl_txtExtraServices') ?> <br>
                      <input type="checkbox"
                        <?= ($receiver['extraServices']['isDoorDeliver'] == 'on') ? 'checked' : '' ?>
                        name="deliveryPoint[<?= $deliveryPointIndex ?>][receivers][<?= $receiverIndex ?>][extraServices][isDoorDeliver]"
                        class="regular-checkbox or-radio-checked" id="dvthem1" /> <label
                        for="dvthem1"><?= lang('Label.lbl_txtIsDoorDeliver') ?></label>
                      <br>
                      <input type="checkbox" <?= ($receiver['extraServices']['isPorter'] == 'on') ? 'checked' : '' ?>
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
                        <option <?= ($receiver['requireNote'] == 1) ? 'selected' : '' ?> value="1">
                          <?= lang('Label.lbl_txtNoteRequired1') ?></option>
                        <option <?= ($receiver['requireNote'] == 1) ? 'selected' : '' ?> value="2">
                          <?= lang('Label.lbl_txtNoteRequired2') ?></option>
                        <option <?= ($receiver['requireNote'] == 1) ? 'selected' : '' ?> value="3">
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
                      productIndex='<?= $productIndex ?>' type="button"><?= lang('Label.lbl_txtFinish') ?></button>
                  </ul>
                </div>
                <!-- ========HẾT PHẦN SỬA HÀNG HÓA========= -->
              </div>
            </div>
            <div class="or-ttng row addReceiver_<?= $deliveryPointIndex ?> w100">

            </div>
            <div class="btn-add-orders ">
              <button type="button" deliveryPointIndex='<?= $deliveryPointIndex ?>'
                receiverIndex='<?= $receiverIndex ?>' productIndex='1'
                class="or-tctdn-btn dpn addProductItem addProductItem_<?= $deliveryPointIndex ?>">
                <img src="<?php echo base_url('public/images/tdg2.png');?>" alt="" class="float-left pl-2">
                <?= lang('Label.lbl_addNewOrderProduct') ?>
              </button>
            </div>
          </div>
        </div>
        <div class="btn-add-orders ">
          <div>
            <img src="<?php echo base_url('public/images/Group284.png');?>" alt="" class="or-img-tdg">
          </div>
          <button type="button" class="or-tdg-btn" onclick="addNewPickupAddress()">
            <img src="<?php echo base_url('public/images/tdg2.png');?>" alt="" class="float-left pl-2">
            <?= lang('Label.lbl_txtExtraAddress') ?></button>
        </div>
        <?php }
                ?>

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
              <input name="expectShipperPhone" type="text" placeholder="<?= lang('Label.lbl_txtExpectShipperPhone') ?>">
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="or-btn-tt">
      <ul class="row">
        <li class="col-md-9 col-sm-6 col-0"></li>
        <li class="col-md-3 col-sm-6 col-12 or-ttnh-input">
          <span class="btn btnFinished" onclick="btnFinished()">Tiếp
            tục</span>
          <!-- <button>Tiếp tục</button> -->
        </li>
      </ul>
    </div>
  </form>
</section>

<style>
.dropdown .dropdown-menu .dropdown-item:hover {
  background-color: white;
  cursor: pointer;
}
</style>
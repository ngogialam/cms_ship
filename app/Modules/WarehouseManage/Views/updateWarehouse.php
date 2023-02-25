<section id="warehouse">
  <div class="warehouse-banner-title mt-1">
    <ul class="pl-0 mt-0">
      <li>
        <img src="<?php echo base_url('public/images/Home.png');?>" alt="">
      </li>
      <li class="mt-1">
        ><b class="fw500 "> <?= lang('Label.lbl_warehouse') ?> </b> > <span><?php echo $title ?></span>
      </li>
    </ul>
  </div>
  <div class="warehose-bd">
    <div class="wh-tl">
      <ul class="mb-0 d-flex">
        <li class="wh-ed-btn">
          <span>
            <?= lang('Label.lbl_warehouse') ?>
          </span>
          <label style="float: right;" class="switch ">
            <div class="check-status-sending-point">
                <input type="checkbox" class="<?= ($dataWareHouse['status']) ? 'checked'  : 'check'; ?>"
                <?= ($dataWareHouse['status']) ? 'checked' : ''; ?> id="togBtn" onclick="newFunction()">
              <div class="slider round" id="btn-checkbox-wh"></div>
            </div>
          </label>
        </li>
      </ul>
    </div>
    <form action="" class="form-100 mt-0" id="form-warehouse-user" method="POST" enctype="multipart/form-data">
      <div class="wh-add">
        <ul class="row m-0">
          <li class="col-md-4 crwh-info pt-2">
            <?= lang('Label.lbl_nameWarehouse') ?>
          </li>
          <input autocomplete="off" type="hidden" class="wareHouseStatus " name="status"
            value="<?= ($dataWareHouse['status']) ? $dataWareHouse['status'] : '0' ; ?>">
          <li class="col-md-7 pb-3">
            <input autocomplete="off" type="text" class="warehouseName" name="warehouseName"
              placeholder="<?= lang('Label.lbl_setNameWarehouse'); ?>"
              value="<?= ($dataWareHouse['name']) ? $dataWareHouse['name'] : '' ; ?>">
            <span class=" err_messages err_warehouseName"><?= $getErrors['warehouseName']; ?></span>
          </li>
          <li class="col-md-4 crwh-info pt-2">
            <?= lang('Label.lbl_senderName') ?>
          </li>
          <li class="col-md-7 pb-3">
            <input autocomplete="off" class="senderName" type="text" name="senderName"
              placeholder="<?= lang('Label.lbl_setNameSender'); ?>"
              value="<?= ($dataWareHouse['senderName']) ? $dataWareHouse['senderName'] : '' ?>">
            <span class=" err_messages err_senderName"><?= $getErrors['senderName']; ?></span>
          </li>
          <li class="col-md-4 crwh-info pt-2">
            <?= lang('Label.phone') ?>
          </li>
          <li class="col-md-7 pb-3">
            <input autocomplete="off" type="text" name="phone" class="senderPhone"
              oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
              placeholder="<?= lang('Label.lbl_phone'); ?>"
              value="<?= ($dataWareHouse['phone']) ? $dataWareHouse['phone'] : '' ?>">
            <span class=" err_messages err_senderPhone"><?= $getErrors['phone']; ?></span>
          </li>
          <li class="col-md-4 crwh-info pt-2">
            <?= lang('Label.lbl_senderAddress') ?>
          </li>

          <li class="col-md-7  update-warehouse-address">
            <select name="provinceCode" id="province" class="chosen-select province province_code_from "
              style="margin-right: 10px;">
              <option value="" class="frm-lg">
                <?= lang('Label.lbl_chooseProvince') ?>
              </option>
              <?php foreach($dataProvince as $province): ?>
              <option <?php echo ($dataWareHouse['provinceCode'] == $province['code']) ? 'selected' : '' ?>
                value="<?= $province['code']; ?>"> <?= $province['name']; ?>
              </option>
              <?php endforeach; ?>
            </select>

            <select name="districtId" id="district" class="chosen-select district district_code_from "
              style="margin-right: 10px;">
              <option value="" class="frm-lg">
                <?= lang('Label.lbl_chooseDistrict') ?>
              </option>
              <?php if(!empty($dataWards)):
                                foreach($dataDistrict as $district): ?>
              <option <?php echo ($dataWareHouse['districtId'] == $district['code']) ? 'selected' : '' ?>
                value="<?= $district['code']; ?>"> <?= $district['name']; ?>
              </option>
              <?php endforeach; endif; ?>

            </select>

          </li>
          <li class="col-md-4 crwh-info "></li>

          <li class="col-md-7  d-flex">
            <span class=" err_messages err_province"><?php echo $getErrors['provinceCode']; ?></span>
            <span class=" err_messages err_district"><?php echo $getErrors['districtId']; ?></span>
          </li>
          <li class="col-md-4 crwh-info">
          </li>
          <li class="col-md-7 pb-3 ">
          </li>
          <li class="col-md-4 crwh-info">
          </li>
          <li class="col-md-7 update-warehouse-address">
            <select name="wardId" id="ward" class=" chosen-select ward_code_from" style="margin-right: 10px;">
              <option value="" class="frm-lg">
                <?= lang('Label.lbl_chooseWard') ?>
              </option>
              <?php
                                if(!empty($dataWards)):
                            foreach($dataWards as $ward): ?>
              <option <?php echo ($dataWareHouse['wardId'] == $ward['code']) ? 'selected' : '' ?>
                value="<?= $ward['code']; ?>"> <?= $ward['name']; ?>
              </option>
              <?php endforeach; endif; ?>

            </select>

            <input autocomplete="off" placeholder="<?= lang('Label.lbl_detailAccount') ?>" name="address" type="text"
              class="address" value="<?= ($dataWareHouse['address']) ? $dataWareHouse['address'] : '' ?>">
          </li>
          <li class="col-md-4 crwh-info "></li>

          <li class="col-md-7  d-flex">
            <span class=" err_messages err_ward"><?php echo $getErrors['wardId']; ?></span>
            <span class=" err_messages err_address"><?= $getErrors['address']; ?></span>
          </li>

          <li class="col-md-4 crwh-info ">
          </li>
          <li class="col-md-7 mgt10">
            <label for="mainWareHouse">
              <input type="checkbox" value="1" id="mainWareHouse"
                <?= $dataWareHouse['isDefault'] == 1 ? 'checked' : ''  ?> class="frm-check" name="mainWareHouse">
              <span> <?= lang('Label.lbl_makeMainWareHouse'); ?></span>
            </label>

            <!-- <input class="frm-check" value="1" name="remember_pass" checked type="checkbox">
                        <span><?= lang('Label.lbl_rememberPassword') ?></span> -->
          </li>
          <li class="col-md-4 crwh-info "></li>

          <li class="col-md-7  d-flex">
            <span class=" err_messages"><?php echo $getErrors['statusMainWarehouse']; ?></span>
          </li>

          <li class="col-md-11 pb-4">
            <button type="submit" onclick="showLoader()"
              class="btn btn-add-update float-right"><?= lang('Label.lbl_update'); ?></button>
          </li>
        </ul>
      </div>
    </form>
  </div>
</section>
<script>
function newFunction() {
  var property = document.getElementById("togBtn");
  if (property.className !== 'checked') {
    $('.wareHouseStatus').val('1')
    $("#togBtn").addClass("checked");
    $("#btn-checkbox-wh").css('background-color', '#2DB1DB');

  } else {
    $("#togBtn").removeClass("checked");
    $('.wareHouseStatus').val('0')
    $("#btn-checkbox-wh").css('background-color', ' #F0A616');
  }
}
</script>
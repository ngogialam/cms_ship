<section id="warehouse">
    <div class="warehouse-banner-title">
        <ul class="pl-0">
            <li>
                <img src="<?php echo base_url('public/images/Home.png');?>" alt="">
            </li>
            <li class="mt-1">
                > <b> <?= lang('Label.lbl_warehouse') ?></b> > <span><?php echo $title ?></span>
            </li>
        </ul>
    </div>

    <div class="warehose-bd">
        <div class="wh-tl">
            <ul>
                <li>
                    <span>
                        <b> <?= lang('Label.lbl_createNewWareHouseTitle') ?></b>
                    </span>
                </li>
                <!-- <label class="switch">
          <input type="checkbox" <?= ($dataWareHouse['status']) ? 'checked' : ''; ?>>
          <span class="slider round"></span>
        </label> -->
            </ul>
        </div>
        <form action="" class="form100" id="form-warehouse-user" method="POST" enctype="multipart/form-data">
            <div class="wh-add">
                <ul class="row m-0">
                    <li class="col-md-4 crwh-info pt-2 ">
                        <?= lang('Label.lbl_nameWarehouse') ?>
                    </li>
                    <li class="col-md-7 pb-3">
                        <input autocomplete="off" type="text" class="warehouseName" name="warehouseName"
                            placeholder="<?= lang('Label.lbl_setNameWarehouse'); ?>"
                            value="<?= ($dataWareHouse['warehouseName']) ? $dataWareHouse['warehouseName'] : '' ; ?>">
                        <span class=" err_messages err_warehouseName"><?= $getErrors['warehouseName']; ?></span>
                    </li>
                    <li class="col-md-4 crwh-info pt-2">
                        <?= lang('Label.lbl_senderName') ?>
                    </li>
                    <li class="col-md-7 pb-3">
                        <input autocomplete="off" class="senderName fullName" type="text" name="senderName"
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

                    <li class="col-md-7 update-warehouse-address">
                        <select name="province" id="province" class="chosen-select province province_code_from w-50">
                            <option value="" class="frm-lg">
                                <?= lang('Label.lbl_chooseProvince') ?>
                            </option>
                            <?php foreach($dataProvince as $province): ?>
                            <option <?php echo ($dataWareHouse['province'] == $province['code']) ? 'selected' : '' ?>
                                value="<?= $province['code']; ?>"> <?= $province['name']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>

                        <select name="district" id="district" class="chosen-select district district_code_from w-50">
                            <option value="" class="frm-lg">
                                <?= lang('Label.lbl_chooseDistrict') ?>
                            </option>
                            <?php if(!empty($dataWards)):
                                foreach($dataDistrict as $district): ?>
                            <option <?php echo ($dataWareHouse['district'] == $district['code']) ? 'selected' : '' ?>
                                value="<?= $district['code']; ?>"> <?= $district['name']; ?>
                            </option>
                            <?php endforeach; endif; ?>

                        </select>

                    </li>
                    <li class="col-md-4 crwh-info "></li>

                    <li class="col-md-7  d-flex">
                        <span class=" err_messages err_province"><?php echo $getErrors['province']; ?></span>
                        <span class=" err_messages err_district"><?php echo $getErrors['district']; ?></span>
                    </li>


                    <li class="col-md-4 crwh-info">
                    </li>
                    <li class="col-md-7 pb-3 ">
                    </li>

                    <li class="col-md-4 crwh-info">
                    </li>
                    <li class="col-md-7 update-warehouse-address ">
                        <select name="ward" id="ward" class="w-50 chosen-select ward_code_from">
                            <option value="" class="frm-lg">
                                <?= lang('Label.lbl_chooseWard') ?>
                            </option>
                            <?php
                                if(!empty($dataWards)):
                            foreach($dataWards as $ward): ?>
                            <option <?php echo ($dataWareHouse['ward'] == $ward['code']) ? 'selected' : '' ?>
                                value="<?= $ward['code']; ?>"> <?= $ward['name']; ?>
                            </option>
                            <?php endforeach; endif; ?>

                        </select>

                        <input autocomplete="off" name="addressWarehouse"
                            placeholder="<?= lang('Label.lbl_detailAccount') ?>" type="text"
                            class="w-50 addressWarehouse"
                            value="<?= ($dataWareHouse['addressWarehouse']) ? $dataWareHouse['addressWarehouse'] : '' ?>">
                    </li>
                    <li class="col-md-4 crwh-info "></li>

                    <li class="col-md-7  d-flex">
                        <span class=" err_messages err_ward"><?php echo $getErrors['ward']; ?></span>
                        <span class=" err_messages err_addressWarehouse"><?= $getErrors['addressWarehouse']; ?></span>
                    </li>

                    <li class="col-md-4 crwh-info ">
                    </li>
                    <li class="col-md-7 mgt10">
                        <label>
                        <input type="checkbox" id="mainWareHouse" name="mainWareHouse" class="frm-check">
                        <span> <?= lang('Label.lbl_makeMainWareHouse'); ?> </span></label>
                    </li>
                    <li class="col-md-11  pb-4">
                        <button type="submit" onclick="showLoader()"
                            class="btn btn-add-update float-right"><?= lang('Label.lbl_add'); ?></button>
                    </li>
                </ul>
            </div>
        </form>
    </div>
</section>
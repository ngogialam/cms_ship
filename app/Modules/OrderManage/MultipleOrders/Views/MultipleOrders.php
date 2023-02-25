<!-- ===========BANNER========== -->
<div id="loading">
    <img id="loading-image" src="<?php echo base_url('public/assets/images/giphy.gif')?>" alt="Loading..." />
    <div class="my-progress-bar" style="display:none"></div>
</div>
<section id="orders" class="uploadOrderFiles">
    <div class="warehouse-banner-title row">
        <ul class="col-sm-3 pr-0 mb-0 ml-0">
            <li>
                <img src="<?php echo base_url('public/images/Home.png');?>" alt="">
            </li>
            <li class="mt2-config title-page">
                ><span> <?= lang('Label.lbl_order') ?> </span> > <span><?php echo $title ?></span>
            </li>
        </ul>
        <ul class="col-sm-6 row pr-0 mb-0 ml-0">
            <div class="txtStep col-md-4 col-sm-4 pl-0">
                <ul class="or-banner">
                    <li>
                        1
                    </li>
                    <li class="or-cgc-1">
                        <?= lang('Label.lbl_txtUploadFile') ?>
                    </li>
                </ul>
            </div>
            <div class="txtStep col-md-4 col-sm-4  pl-0">
                <ul class="or-banner1">
                    <li style="line-height: 19px;background:#2DB1DB;">
                        2
                    </li>
                    <li class="or-cgc-1">
                        <?= lang('Label.lbl_txtEnterInfo') ?>
                    </li>
                </ul>
            </div>
            <div class="txtStep col-md-4 col-sm-4  pl-0">
                <ul class="or-banner1">
                    <li style="line-height: 19px;">
                        3
                    </li>
                    <li class="or-cgc-1">
                        <?= lang('Label.lbl_confirmOrder') ?>
                    </li>
                </ul>
            </div>
        </ul>
    </div>
</section>
<!-- ===========END BANNER====== -->
<section id="quick-orders" style="height: 78%; padding: 0px 14px 0 15px;">
    <form action="" id="fast-orders" method="POST" enctype="multipart/form-data">

        <div class="qo-ttng row">
            <ul class="row col-sm-12 mb-0 pr-0">
                <li class="col-sm-4 qo-ttng-2">
                    <b> <?= lang('Label.lbl_txtInfoSender') ?></b>
                </li>
                <li class="col-sm-8 text-right pr-0">
                    <div class="dropdown orDetail-select-address">
                        <input class="dropdown-toggle choosePickUpAddressFastNew p-0 pr-2" type="button"
                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"
                            value="<?= (!empty($primaryPickupAddress)) ? $primaryPickupAddress->name : lang('Label.lbl_createNewWareHouse') ?>"
                            style="border: none; background: none;font-size: 13px; width: 190px;" />
                        <input type="hidden" class="pickupAddressId"
                            value="<?= (!empty($primaryPickupAddress)) ? $primaryPickupAddress->id : ''; ?>"
                            name="pickupAddressId">
                        <img src="<?php echo base_url('public/images/iconDownX.png');?>" alt="">

                        <div class="dropdown-menu choosenPickup" aria-labelledby="dropdownMenuButton">
                            <div class="dropdown-item pl-0 orDetail-data-select" href="#"
                                style="padding-left: 21px!important;" onclick="choosePickupAddressFast(0)">
                                <img src="<?php echo base_url('public/images/add.png');?>" alt="">
                                <span
                                    style="color: #885DE5;font-size: 14px; padding-left: 4px;"><?= lang('Label.lbl_newAddress') ?></span>
                            </div>
                            <?php if(!empty($pickupAddress)):
                                 foreach($pickupAddress as $warehouse): ?>
                            <?php if($warehouse->status == 1): ?>
                            <div class="dropdown-item pl-0  orDetail-data-select" href="#"
                                style="padding-left: 21px!important;"
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
                            <?php endif; endforeach; endif; ?>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- choose pickupAddress -->
            <div class="row pd20 w100 newPickupFast" <?= (empty($primaryPickupAddress)) ?'' :'style="display:none"' ?>>
                <ul class="col-sm-6 orDetail-input ">
                    <!-- Tên người gửi -->
                    <li>
                        <?= lang('Label.lbl_txtNamePickup') ?><span style="color: #885DE5;"> *</span>
                    </li>
                    <li>
                        <input type="text" class=" ipt pickupName" name="pickName"
                            value="<?php echo $dataParams['pickName'] ?>"
                            placeholder="<?= lang('Label.lbl_setNameWarehouse') ?>">
                        <span class=" err_messages err_pickupName"><?php echo $getErrors['pickName']; ?></span>
                    </li>
                </ul>
                <ul class="col-sm-6 orDetail-input">
                    <li>
                        <?= lang('Label.phone') ?><span style="color: #885DE5;"> *</span>
                    </li>
                    <li>
                        <!-- SĐT người gửi -->
                        <input type="text" class=" ipt pickPhone" name="pickPhone" onkeypress="return isNumber(event)"
                            value="<?php echo $dataParams['pickPhone'] ?>" placeholder="<?= lang('Label.ph_phone') ?>">

                        <span class=" err_messages err_pickPhone"><?php echo $getErrors['pickPhone']; ?></span>
                    </li>
                </ul>
                <ul class="col-sm-6 orDetail-input">
                    <!-- địa chỉ chi tiết -->
                    <li>
                        <?= lang('Label.lbl_senderAddress') ?><span style="color: #885DE5;"> *</span>
                    </li>
                    <li>
                        <input type="text" name="pickAddress" class="ipt pickAddress"
                            value="<?php echo $dataParams['pickAddress'] ?>"
                            placeholder="<?= lang('Label.lbl_inputDetailAddress') ?>">
                        <span class=" err_messages err_pickAddress"><?php echo $getErrors['pickAddress']; ?></span>
                    </li>
                </ul>
                <ul class="col-sm-6 row orDetail-input pr-0" style="padding-top: 30px;">
                    <!-- Tỉnh thành -->
                    <li class="col-md-4 mb-2 pr-0">
                        <select name="pickProvince" id="pickProvince"
                            class="form-control frm-lg pickProvince chosen-select province_code_from ">
                            <option value="0"><?= lang('Label.lbl_orderWareHouseProvince'); ?></option>
                            <?php foreach($dataProvinces as $province): ?>
                            <option <?php echo ($dataParams['pickProvince'] == $province['code']) ? 'selected' : '' ; ?>
                                value="<?= $province['code']; ?>"> <?= $province['name']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <span class=" err_messages err_province"><?php echo $getErrors['pickProvince']; ?></span>
                    </li>
                    <!-- Phường xã -->
                    <li class="col-md-4 mb-2 pr-0">
                        <select name="pickDistrict" id="pickDistrict"
                            class="form-control pickDistrict frm-lg chosen-select district_code_from ">
                            <option value=""><?= lang('Label.lbl_orderWareHouseDistrict'); ?></option>
                            <?php
                            if(!empty($dataDistricts)){
                                foreach($dataDistricts as $district): ?>
                            <option
                                <?php echo ($dataParams['pickDistrict'] == $district['code'] ) ? 'selected' : '' ; ?>
                                value="<?= $district['code']; ?>"> <?= $district['name']; ?>
                                <?php endforeach;
                            }
                        ?>
                        </select>
                        <span class=" err_messages err_district"><?php echo $getErrors['pickDistrict']; ?></span>
                    </li>
                    <!-- Quận huyện -->
                    <li class="col-md-4 mb-2 pr-0">
                        <select name="pickWard" id="pickWard"
                            class="form-control frm-lg pickWard chosen-select ward_code_from ">
                            <option value=""><?= lang('Label.lbl_orderWareHouseWard'); ?></option>
                            <?php
                            if(!empty($dataWards)){
                                foreach($dataWards as $ward): ?>
                            <option <?php echo ($dataParams['pickWard'] == $ward['code'] ) ? 'selected' : '' ; ?>
                                value="<?= $ward['code']; ?>"> <?= $ward['name']; ?>
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

        <div class="qo-choose-file">
            <ul class="row w-100 pr-0">
                <li class="col-sm-6 qo-ttng-2 ">
                    <b> <?= lang('Label.lbl_txtChooseFileOrders') ?></b>
                </li>
                <li class="col-sm-6 qo-choose-file-1 pr-0">
                    <a href="<?=base_url('files/HLS11121.xlsx')?>">
                        <?= lang('Label.lbl_txtDowloadFile') ?><img
                            src="<?php echo base_url('public/images/Download.png');?>" alt="">
                    </a>
                </li>
            </ul>
            <ul class="row w-100 fileUploadContent">
                <li class="col-lg-10 col-md-9 mb-12">
                    <input type="file" name="import_excel" id="import_excel"
                        class="inputfile inputfile-1 custom-file-input" aria-describedby="import_excel" />
                    <label for="import_excel" class="custom-file-upload "><?= lang('Label.lbl_txtSeletFile') ?></label>
                    <span class=" err_messages "><?php echo $getErrors['files']; ?></span>
                </li>
                <li class="col-lg-2 col-md-3 mb-12 multipleOrders-btn-upload">
                    <input class="btn btn-order-list  import-now" name='import' id="uploadFile" type="submit"
                        value="<?= lang('Label.lbl_txtUploadFile') ?>">
                </li>
            </ul>
        </div>
        <?php
            if(isset($arrErrorImport ) && !empty($arrErrorImport )):
        ?>
        <div class="fileOrderErrors">
            <div class="card block-order-item">
                <div class="card-body row">
                    <div class="col-lg-12">
                        <p class="error-large errorOrderFiles"><?= lang('Label.lbl_txtErrorFile') ?></p>
                        <?php foreach ($arrErrorImport as $k => $valError): ?>
                        <div class="oder-err-import"><span
                                class="fz13 rowOrders"><?= lang('Label.lbl_txtRowErrorFile') ?>
                                <?php echo $k; ?></span></div>
                        <?php foreach ($valError as $k2 => $valError2): ?>
                        <p class="fz13 errorDetail"><?php echo $valError2 ?></p>
                        <?php endforeach; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </form>
</section>
<script>
$(document).ready(function() {
    //Percentage circle loading 
    $("#uploadFile").click(function() {
        $('#loading-image').hide();
        $('#loading').show();
        $('.my-progress-bar').show();
        var fileToUpload = $('#import_excel').prop('files')[0];
        let timeLoading = 2000;
        if (typeof fileToUpload != 'undefined') {
            if (fileToUpload.size > 200000 && fileToUpload.size <= 451000) {
                // 1-50 đơn
                timeLoading = 4000;
            } else if (fileToUpload.size > 451000 && fileToUpload.size <= 452900) {
                // 51-100 đơn
                timeLoading = 6000;
            } else if (fileToUpload.size > 452900 && fileToUpload.size <= 454200) {
                // 101-150 đơn
                timeLoading = 8000;
            } else if (fileToUpload.size > 454200 && fileToUpload.size <= 455100) {
                // 151-200 đơn
                timeLoading = 10000;
            } else if (fileToUpload.size > 455100) {
                // >200 đơn
                timeLoading = 12000;
            }
        }
        $(".my-progress-bar").circularProgress({
            line_width: 10,
            color: "#885DE5",
            starting_position: 0, // 12.00 o' clock position, 25 stands for 3.00 o'clock (clock-wise)
            percent: 0, // percent starts from
            percentage: true,
            text: "",
        }).circularProgress('animate', 95, timeLoading);
    });
});
</script>
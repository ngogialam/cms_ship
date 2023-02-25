<section id="connectbank" class="mr-4 acc-info-detail">
    <!-- banner tài khoản -->
    <section id="info-bn">
        <div class="link-user">
            <ul>

                <li>
                    <img src="<?php echo base_url('public/images/Home.png');?>" alt="">
                </li>
                <li class="mt-1">
                    > <b><?= lang('Label.lbl_basicInformation') ?></b> >
                    </a><span> <?= $title ?> </span>
                </li>
            </ul>
        </div>
        <div class="info-banner mr-0"
            style="background-image: url('<?php echo base_url('public/images/bannerUser.png');?>');    ">
            <ul>
                <?php //echo base_url('public/assets/images/ava.png');?>
                <li style="cursor: pointer;" onclick="clickAddImage()">
                    <img src="<?= ($dataUser->avatar) ? $dataUser->avatar : base_url('public/assets/images/ava.png')?>"
                        alt="" style="width: 80px; height: 80px; border-radius: 50%;" id="photo">
                    <input type="file" style="display: none;" id="imageFile" onchange="uploadImage()">
                    <img src="<?php echo base_url('public/assets/images/ava.png');?>" id="preview" alt=""
                        class="d-none">
                    <img src="<?= base_url('public/images/iconCamera.png'); ?>" alt=""
                        style="margin-top: 55px;margin-left:-30px;">
                    <input type="text" value="<?= ($userLogin) ? $userLogin : '' ?>" id="userLogin" class="d-none">
                </li>
            </ul>
        </div>
    </section>

    <form action="" class="form-100 edit-account-info" id="form-user-info" method="POST">
        <section id="info-detail" class="row w-100 ">
            <!-- Thông tin cơ bản -->
            <div class="info-detail-1 col-md-6 p-0" id="edit-info">
                <div class="h-100">
                    <ul class="list-unstyled edit-info-left">
                        <li class="info-detail-2 pt-2">
                            <?= lang('Label.lbl_basicInformation') ?>
                        </li>

                        <li>
                            <input type="text" class="form-control frm-lg fullName"
                                value="<?= ($validate == 0) ? $dataUser->name : $dataPost['fullName'] ?>"
                                autocomplete="off" name="fullName" placeholder="<?= lang('Label.lbl_fullName') ?>">
                            <span class=" err_messages err_fullName"><?php echo $getErrors['fullName']; ?></span>
                        </li>

                        <li>
                            <input type="text" class="form-control frm-lg company"
                                value="<?= ($validate == 0) ?  $dataUser->company : $dataPost['company'] ?>"
                                autocomplete="off" name="company" placeholder="<?= lang('Label.lbl_shopName') ?>">
                            <span class=" err_messages err_shopName"><?php echo $getErrors['company']; ?></span>
                        </li>

                        <li>
                            <input type="text" class="form-control frm-lg "
                                value="<?= ($validate == 0) ? $dataUser->phoneOTP : $phoneOtp ?>" autocomplete="off"
                                disabled name="phone" placeholder="<?= lang('Label.lbl_phone') ?>">
                            <span class=" err_messages err_phone"><?php echo $getErrors['phone']; ?></span>
                        </li>

                        <li>
                            <input type="text" class="form-control frm-lg email"
                                value="<?= ($validate == 0) ? $dataUser->email : $dataPost['email'] ?>"
                                autocomplete="off" name="email" placeholder="<?= lang('Label.lbl_email') ?>">
                            <span class=" err_messages err_email"><?php echo $getErrors['email']; ?></span>
                        </li>

                        <li>
                            <input name="dob" placeholder="<?= lang('Label.lbl_dob') ?>"
                                value="<?= ($validate == 0) ?  str_replace('-','/', str_replace(' ','',$dataUser->birthday)) : $dataPost['dob'] ?>"
                                autocomplete="off" type="text" class="form-control frm-lg datePicker dob">
                            <span class=" err_messages err_dob"><?php echo $getErrors['dob']; ?></span>
                        </li>

                        <li>
                            <select name="sex" id="sex" class="form-control frm-lg chosen-select sex">
                                <option value="" class="frm-lg">
                                    <?= lang('Label.lbl_sex') ?>
                                </option>
                                <option
                                    <?php echo ($dataUser->sex == '1' || $dataPost['sex'] == 1 ) ? 'selected' : '' ?>
                                    value="1">
                                    <?= lang('Label.lbl_male') ?></option>
                                <option
                                    <?php echo ($dataUser->sex == '2' || $dataPost['sex'] == 2 ) ? 'selected' : '' ?>
                                    value="2">
                                    <?= lang('Label.lbl_female') ?></option>
                                <option
                                    <?php echo ($dataUser->sex == '3' || $dataPost['sex'] == 3 ) ? 'selected' : '' ?>
                                    value="2">
                                    <?= lang('Label.lbl_bedue') ?></option>
                            </select>
                            <span class=" err_messages err_sex"><?php echo $getErrors['sex']; ?></span>
                        </li>

                        <li>
                            <select name="province" id="province"
                                class="form-control frm-lg chosen-select province_code_from ">
                                <option value="" class="frm-lg">
                                    <?= lang('Label.lbl_chooseProvince') ?>
                                </option>
                                <?php foreach($dataProvince as $province): ?>
                                <option
                                    <?php echo ($dataUser->address->provinceCode == $province['code'] || $dataPost['province'] == $province['code'] ) ? 'selected' : '' ?>
                                    value="<?= $province['code']; ?>"> <?= $province['name']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <span class=" err_messages err_province"><?php echo $getErrors['province']; ?></span>
                        </li>
                        <!-- dataDistrict -->
                        <li>
                            <select name="district" id="district"
                                class="form-control frm-lg chosen-select district_code_from">
                                <option value="" class="frm-lg">
                                    <?= lang('Label.lbl_chooseDistrict') ?>
                                </option>
                                <?php if(!empty($dataDistrict)):
                                foreach($dataDistrict as $district): ?>
                                <option
                                    <?php echo ($dataUser->address->districtCode == $district['code'] || isset($dataPost['district']) && $dataPost['district'] == $district['code']) ? 'selected' : '' ?>
                                    value="<?= $district['code']; ?>"> <?= $district['name']; ?>
                                </option>
                                <?php endforeach; endif; ?>
                            </select>
                            <span class=" err_messages err_district"><?php echo $getErrors['district']; ?></span>
                        </li>

                        <li>
                            <select name="ward" id="ward" class="form-control frm-lg chosen-select ward_code_from">
                                <option value="" class="frm-lg">
                                    <?= lang('Label.lbl_chooseWard') ?>
                                </option>
                                <?php
                                if(!empty($dataWards)):
                            foreach($dataWards as $ward): ?>
                                <option <?php if($dataUser->address->wardCode == $ward['code'] || isset($dataPost['ward']) && $dataPost['ward'] == $ward['code']){
                                echo 'selected';
                            } 
                             ?> value="<?= $ward['code']; ?>"> <?= $ward['name']; ?>
                                </option>
                                <?php endforeach; endif; ?>
                            </select>
                            <span class=" err_messages err_ward"><?php echo $getErrors['ward']; ?></span>
                        </li>

                        <li>
                            <input type="text" class="form-control frm-lg address"
                                value="<?= ($validate == 0) ? $dataUser->address->address : $dataPost['address'] ; ?>"
                                name="address" placeholder="<?= lang('Label.lbl_detailAccount') ?>">
                            <span class=" err_messages err_address"><?php echo $getErrors['address']; ?></span>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End Thông tin cơ bản -->

            <!-- Thông tin hợp đồng -->
            <div class="info-detail-1 col-md-6 d-flex pr-0" id="edit-info-1">
                <div class="w-100">
                    <ul class="list-unstyled h-100 position-relative mgb15">
                        <!-- <li class=" nstyle">
                <b><?= lang('Label.lbl_cidInformation') ?> </b>
            </li> -->
                        <li class=" nstyle">
                            <b><?= lang('Label.lbl_infoContract') ?>: Cá nhân </b>
                        </li>

                        <!-- Đại diện -->
                        <li class="info-detail-new-2">
                            <?= lang('Label.lbl_surrogate').': '  ?>
                            <b><span> </span></b>
                        </li>

                        <!-- Chức vụ -->
                        <li class="info-detail-new-2">
                            <?= lang('Label.lbl_position').': '  ?>
                            <b><span> </span></b>
                        </li>

                        <!-- Địa chỉ -->
                        <li class="info-detail-new-2">
                            <?= lang('Label.lbl_infoAddress').' '  ?>
                            <b><span></span></b>
                        </li>

                        <!-- Ngày sinh -->
                        <li class="info-detail-new-2">
                            <?= lang('Label.lbl_dob').' '  ?>
                            <b><span></span></b>
                        </li>


                        <li class="info-detail-new-2">
                            <?= lang('Label.lbl_infoIdentity') .' '  ?>
                            <b>
                                <span></span></b>
                        </li>
                        <li class="info-detail-new-2">
                            <?= lang('Label.lbl_cidDate') .': ' ?>
                            <b> <span> </span></b>

                        </li>
                        <li class="info-detail-new-2">
                            <?= lang('Label.lbl_infoIdentityPlace').' ' ?>
                            <b> <span> </span></b>
                        </li>

                        <!-- Số tài khoản ngân hàng -->
                        <li class="info-detail-new-2">
                            <?= lang('Label.lbl_bankAccountNumber').' '  ?>
                            <b><span></span></b>
                        </li>

                        <!-- Ngân hàng -->
                        <li class="info-detail-new-2">
                            <?= lang('Label.lbl_openBankName').' '  ?>
                            <b><span></span></b>
                        </li>

                        <!-- Chi nhánh -->
                        <li class="info-detail-new-2">
                            <?= lang('Label.lbl_bankBranch').' '  ?>
                            <b><span></span></b>
                        </li>

                        <?php
                    
                    if($checkCookieAccount == 'success'){
                        ?>
                        <li class="txt_center w95 noti-success" style="display:none;">
                            <img src="<?php echo base_url('public/images/thanhcong.png');?>" alt=""><br>
                            <b><?= lang('Label.lbl_notifycation') ?></b><br>
                            <span><?= lang('Label.lbl_updateAccountSuccess') ?></span><br>
                            <?= lang('Label.lbl_thanks') ?>
                        </li>
                        <?php }else if($checkCookieAccount == 'false'){ ?>
                        <li class="txt_center w95 noti-false" style="display:none;">
                            <img src="<?php echo base_url('public/images/iconClose.png');?>" alt=""><br>
                            <b><?= lang('Label.lbl_notifycation') ?></b><br>
                            <span><?= lang('Label.lbl_updateAccountFail').'<br>'.$updateMessage ?></span><br>
                            <?= lang('Label.lbl_reUpdate') ?>
                        </li>

                        <?php } ?>

                    </ul>
                </div>
            </div>

            <div class="row w-100 m-0 p-0 mt-3 btn-edit-info-submit">
                <div class="col-sm-6 col-0"></div>
                <div class="col-sm-6 col-12">
                <!-- onclick="updateAccountInfo()" -->
                    <button type="submit" class="form-control frm-lg info-button"><?= lang('Label.lbl_txtNext') ?></button>
                </div>
            </div>
        </section>
    </form>

    <section>
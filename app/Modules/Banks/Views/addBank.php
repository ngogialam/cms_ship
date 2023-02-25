<section id="connectbank">
    <!-- banner tài khoản -->
    <section id="info-bn">
        <div class="link-user notifacation-wrapper">
            <ul>
                <li>
                    <a href="" style="list-style: none;color: black;"><img
                            src="<?php echo base_url('public/images/Home.png');?>" alt="">
                </li>
                <li class="mt-1">
                    > <?= lang('Label.account') ?> </a>> <span> <?= $title ?></span>
                </li>
            </ul>
            <div class="notification-container" id="notification-container">
                <div class="notification notification-danger">
                    <span class="notification-title-danger"></span>
                </div>
                <div class="notification notification-info">
                    <span class="notification-title-info"></span>
                </div>
            </div>
        </div>
        <div class="info-banner"
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


    <section id="info-detail" class="row addBank">
        <div class="info-detail-1 col-sm-6 p-0 pr-2">
            <div class="addbank-left">
                <ul class="list-unstyled pl-3 mb-0">
                    <li class="info-detail-2">
                        <?= $title ?>
                    </li>
                    <form action="" class="w-75" id="form-user-info" method="POST" enctype="multipart/form-data"
                        style="margin: 0px auto;">
                        <li class="pt-4 addBank-select-chosen">
                            <select name="bankCode" id="bankCode"
                                class="form-control frm-lg bankCode cn-bank-op chosen-select ">
                                <option value=""><?= lang('Label.lbl_chooseBank') ?></option>
                                <?php if(!empty($bankInfo)): ?>
                                <?php foreach($bankInfo as $bank): ?>
                                <option <?= ($dataPost['bankCode'] == $bank->bankCode) ? 'selected' : '' ;?>
                                    value="<?= $bank->bankCode ?>"><?= $bank->bankName. ' ('.$bank->shortName.')' ?>
                                </option>
                                <?php endforeach; endif; ?>
                                <?php ?>
                            </select>
                            <span class=" err_messages err_bankCode"><?php echo $getErrors['bankCode']; ?> </span>
                        </li>
                        <li style="margin-top: 10px;font-size: 12px;">
                            <label class="radio-inline pl-2" style="width: 50%;"><input value='0'
                                    <?= $dataPost['accountNoType'] == '0' ? 'checked' : '' ?> type="radio"
                                    name="accountNoType" checked style="width: auto;height: 11px;">
                                <?= lang('Label.lbl_accountNumber') ?></label>
                            <label class="radio-inline"><input value='1'
                                    <?= $dataPost['accountNoType'] == '1' ? 'checked' : '' ?> type="radio"
                                    name="accountNoType" style="width: auto;height: 11px;">
                                <?= lang('Label.lbl_cardNumber') ?></label>
                        </li>
                        <li>
                            <input name="accountNumber" value="<?= $dataPost['accountNumber'] ?>" id="accountNumber"
                                placeholder="<?= lang('Label.lbl_inputAccountNumber') ?> "
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                class="form-control frm-lg accountNumber" />
                            <span class=" err_messages err_accountNumber"><?php echo $getErrors['accountNumber']; ?>
                            </span>
                        </li>
                        <li>
                            <input name="accountName" id="accountName" value="<?= $dataPost['accountName'] ?>"
                                placeholder="<?= lang('Label.lbl_inputAccountName') ?>"
                                oninput="this.value = this.value.toUpperCase()"
                                class="form-control frm-lg i  accountName fullName">
                            <span class=" err_messages err_accountName"><?php echo $getErrors['accountName']; ?> </span>
                            <span class=" err_messages "><?php echo $dataError; ?></span>
                        </li>
                        <li>
                            <button class="cn-bank-btn" onclick="showLoader()"
                                style="width: 100%!important; margin-left: 0px!important;"><?= lang('Label.lbl_linkBankCod') ?></button>
                        </li>
                    </form>
                </ul>
            </div>
        </div>
        <div class="info-detail-1 addbank-right col-sm-6 p-0 pr-2 d-flex">
            <div>
                <ul class="list-unstyled  pl-3">
                    <li class="info-detail-2">
                        <img src="<?php echo base_url('public/images/Warning1.png');?>" alt="">
                        <?= lang('Label.lbl_warningToConnectBankCOD') ?>
                    </li>
                    <li class="cn-bank">
                        <?= lang('Label.lbl_conditionToConnectBankCOD') ?>
                        <ul>
                            <li class="conditionBank">
                                <?= lang('Label.lbl_conditionToConnectBankCOD3') ?>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </section>
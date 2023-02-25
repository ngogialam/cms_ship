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

    <form action="" class="form-100 edit-account-info" id="form-user-info" method="POST" >
        <section id="info-detail" class="row w-100 ">
            <!-- Thông tin cơ bản -->
            <div class="info-detail-1 col-md-6 p-0" id="">
                <div class="h-100">
                    <ul class="list-unstyled edit-info-left">
                        <li class="info-detail-2 pt-2">
                            <?= lang('Label.lbl_basicInformation') ?>
                        </li>

                        <li class="info-detail-new-2">
                            <?php echo lang('Label.lbl_infoName')?>
                            <b> <span> <?= $dataUserCache->name ?></span></b>

                        </li>
                        <li class="info-detail-new-2">
                            <?php echo  lang('Label.lbl_infoPhone') ?>
                            <b> <span> <?= $dataUserCache->phoneOTP ?></span></b>

                        </li>
                        <li class="info-detail-new-2">
                            <?php echo  lang('Label.lbl_shopName') .': '?>
                            <b><span> <?= $dataUserCache->company ?></span></b>

                        </li>
                        <li class="info-detail-new-2">
                            <?= lang('Label.lbl_email').': '?>
                            <b> <span> <?= $dataUserCache->email ?></span></b>

                        </li>
                        <li class="info-detail-new-2">
                            <?= lang('Label.lbl_dob').': '?>
                            <b> <span>
                                    <?= str_replace('-','/', str_replace(' ','',$dataUserCache->birthday)) ?></span></b>

                        </li>
                        <li class="info-detail-new-2">
                            <?= lang('Label.lbl_sex').': ' ;  ?>
                            <b><span>
                                    <?php
                        //  echo ($dataUserCache->sex == 1) ? lang('Label.lbl_male') : lang('Label.lbl_female') 
                         if($dataUserCache->sex == 1){
                            echo lang('Label.lbl_male') ;
                         }else if($dataUserCache->sex == 2){
                             echo lang('Label.lbl_female') ;
                         }else if($dataUserCache->sex == 3){
                             echo lang('Label.lbl_bedue') ;
                         }
                         ?></span></b>

                        </li>
                        <li class="info-detail-new-2">
                            <?= lang('Label.lbl_infoAddress') .' '; ?>
                            <b><span>
                                    <?php
                        echo ($dataUserCache->address->address) ? $dataUserCache->address->address .', ' : '' ;
                        echo ($dataUserCache->address->wardName) ? $dataUserCache->address->wardName .', ' : '' ;
                        echo ($dataUserCache->address->districtName) ? $dataUserCache->address->districtName .', ' : '' ;
                        echo ($dataUserCache->address->provinceName) ? $dataUserCache->address->provinceName  : '' ;
                         ?>
                                </span></b>

                        </li>
                    </ul>
                </div>
            </div>
            <!-- End Thông tin cơ bản -->

            <!-- Thông tin hợp đồng -->
            <div class="info-detail-1 col-md-6 d-flex pr-0" id="edit-info-1">
                <div class="w-100">
                    <ul class="list-unstyled h-100 mb-0">
                        <!-- <li class="info-detail-2  pt-2">
                        <?= lang('Label.lbl_cidInformation') ?>
                        </li>  -->

                        <li class="info-detail-2 pt-2">
                            <?= lang('Label.lbl_infoContract') ?>
                        </li>

                        <!-- Khách hàng cá nhân -->
                        <li class="row minh35">
                            <div class="col-md-6" style="padding-left: 35px;">
                                <label class="checkCustomer-user">
                                    <input type="radio" <?php echo (empty($contract)) ? 'checked' : '' ?>
                                        <?php echo (!empty($contract) && $contract->type == 1 ) ? 'checked' : ''  ?>
                                        value="1" name="contractType" id="">
                                    <span>
                                        <?= lang('Label.lbl_individualCustomers') ?>
                                    </span>
                                </label>
                            </div>
                            <!-- <div class="col-md-6 slctTypeContract">
                                <label class="checkCustomer-user">
                                    <input type="radio"
                                        <?php //echo (!empty($contract) && $contract->type == 2 ) ? 'checked' : ''  ?>
                                        value="2" name="contractType" id="">
                                    <span>
                                        <?php //echo lang('Label.lbl_businessCustomers') ?>
                                    </span>
                                </label>
                            </div> -->
                        </li>
                        <!-- Start cá nhân -->
                        <div class="personalContract pdlr15"
                            <?php echo (!empty($contract) && $contract->type == 2 ) ? 'style="display:none"' : ''  ?>>
                            <!-- Nguời đại diện -->
                            <li>
                                <input name="representativePerson" type="text"
                                    class="form-control frm-lg representativePerson"
                                    value="<?php echo (!empty($contract) && $contract->owner != '' ) ? $contract->owner : ''  ?>"
                                    autocomplete="off" placeholder="<?= lang('Label.lbl_surrogater') ?>">
                                <span
                                    class=" err_messages err_representativePerson "><?php echo $getErrors['representativePerson']; ?></span>
                            </li>

                            <!-- Chức vụ -->
                            <li>
                                <input name="personPosition" type="text" class="form-control frm-lg personPosition"
                                    value="<?php echo (!empty($contract) && $contract->position != '' ) ? $contract->position : ''  ?>"
                                    autocomplete="off" placeholder="<?= lang('Label.lbl_position') ?>">
                                <span
                                    class=" err_messages err_personPosition "><?php echo $getErrors['personPosition']; ?></span>
                            </li>

                            <!-- Địa chỉ nhà theo CMND -->
                            <li>
                                <textarea name="addressByID" class="form-control frm-lg" id="" cols="30" rows="3"
                                    placeholder="<?= lang('Label.lbl_addressCMTND') ?>"><?php echo (!empty($contract) && $contract->address != '' ) ? $contract->address : ''  ?></textarea>
                                <span class=" err_messages "><?php echo $getErrors['addressByID'] ?></span>
                            </li>

                            <!-- Ngày sinh -->
                            <li>
                                <input name="personDob" type="text" class="form-control datePicker frm-lg"
                                    value="<?php echo (!empty($contract) && $contract->dob != '' ) ? $contract->dob : ''  ?>"
                                    autocomplete="off" placeholder="<?= lang('Label.lbl_dob') ?>"></input>
                                <span class=" err_messages"> <?php echo $getErrors['personDob'] ?></span>
                            </li>

                            <li>
                                <input name="personId" type="text" class="form-control frm-lg"
                                    value="<?php echo (!empty($contract) && $contract->idCard != '' ) ? $contract->idCard : ''  ?>"
                                    autocomplete="off" placeholder="<?= lang('Label.lbl_cid') ?>"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    min="9">
                                <span class=" err_messages err_cid"><?php echo $getErrors['personId']; ?></span>
                            </li>
                            <li>
                                <input name="personIdDate" placeholder="<?= lang('Label.lbl_cidDate') ?>" type="text"
                                    class="form-control frm-lg datePicker cidDate" autocomplete="off"
                                    value="<?php echo (!empty($contract) && $contract->idCardDate != '' ) ? $contract->idCardDate : ''  ?>">
                                <span class=" err_messages err_cidDate"><?php echo $getErrors['personIdDate']; ?></span>
                            </li>
                            <li>
                                <input name="personIdAddress" type="text" class="form-control frm-lg cidPlace"
                                    value="<?php echo (!empty($contract) && $contract->idCardPlace != '' ) ? $contract->idCardPlace : ''  ?>"
                                    autocomplete="off" placeholder="<?= lang('Label.lbl_cidPlace') ?>">
                                <span
                                    class=" err_messages err_cidPlace"><?php echo $getErrors['personIdAddress']; ?></span>
                            </li>

                            <li class="edit-user-update-img">
                                <b>Vui lòng upload ảnh CMND hoặc CCCD</b>
                                <div class="d-flex">

                                    <div class="w45">
                                        <?php if(!empty($contract) && $contract->cardFrontUrl != ''){ ?>
                                        <label for="frontCid">
                                            <img for="frontCid" id="frontCidImg" class="frontCidImg w-100"
                                                src="<?php echo URL_API_UPLOADIMG.$contract->cardFrontUrl?>" alt="">
                                        </label>
                                        
                                        <?php }else{?>
                                        <label for="frontCid">
                                            <img for="frontCid" id="frontCidImg" class="frontCidImg w-100"
                                                src="<?php echo base_url('public/images/MT.svg');?>" alt="">
                                        </label>
                                        <?php } ?>
                                        <input type="hidden" name="oldFrontId" class = "oldFrontId"
                                            value="<?php echo $contract->cardFrontUrl;?>">
                                        <!-- onchange="loadFile(event,'frontCidImg','err_frontCidErr')" -->
                                        <input type="file" name="frontCid" class="imgDefault frontCid"
                                            onchange="uploadImgJs(event,'err_frontCidErr','',0,1, 'frontCidImg', 'oldFrontId' )"
                                             id="frontCid" />
                                        <p class="err_messagesp err_frontCidErr"> <?php echo $getErrors['frontCid'] ?>
                                        </p>
                                    </div>
                                    <div class="w45">
                                        <?php if(!empty($contract) && $contract->cardBackUrl != ''){ ?>
                                        <label for="backCid">
                                            <img for="backCid" id="backCidImg" class="backCidImg w-100"
                                                src="<?php echo URL_API_UPLOADIMG.$contract->cardBackUrl;?>" alt="">
                                        </label>
                                        
                                        <?php }else{?>
                                        <label for="backCid">
                                            <img for="backCid" id="backCidImg" class="backCidImg w-100"
                                                src="<?php echo base_url('public/images/MS.svg');?>" alt="">
                                        </label>
                                        <?php } ?>
                                        <input type="hidden" name="oldBackId" class="oldBackId"
                                            value="<?php echo $contract->cardBackUrl;?>">
                                        <!-- onchange="loadFile(event,'backCidImg','err_backCidErr')" -->
                                        <input type="file" name="backCid" class="imgDefault backCid"
                                        onchange="uploadImgJs(event,'err_backCidErr','',0,1, 'backCidImg','oldBackId' )"
                                             id="backCid" />
                                        <p class="err_messagesp err_backCidErr"> <?php echo $getErrors['backCid'] ?>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </div>
                        <!-- End cá nhân -->

                        <!-- Div doanh nghiệp -->
                        <div class="businessContract pdl15"
                            <?php echo (!empty($contract) && $contract->type == 2 ) ? 'style="display:block"' : 'style="display:none"'  ?>>
                            <!-- Tên công ty -->
                            <li>
                                <input name="companyName" type="text" class="form-control frm-lg companyName"
                                    value="<?php echo (!empty($contract) && $contract->companyName != '' ) ? $contract->companyName : ''  ?>"
                                    autocomplete="off" placeholder="<?= lang('Label.lbl_companyName') ?>">
                                <span
                                    class=" err_messages err_companyName "><?php echo $getErrors['companyName']; ?></span>
                            </li>

                            <!-- Nguời đại diện -->
                            <li>
                                <input name="representative" type="text" class="form-control frm-lg representative"
                                    value="<?php echo (!empty($contract) && $contract->owner != '' ) ? $contract->owner : ''  ?>"
                                    autocomplete="off" placeholder="<?= lang('Label.lbl_surrogater') ?>">
                                <span
                                    class=" err_messages err_representative "><?php echo $getErrors['representative']; ?></span>
                            </li>

                            <!-- Chức vụ -->
                            <li>
                                <input name="businessPosition" type="text" class="form-control frm-lg businessPosition"
                                    value="<?php echo (!empty($contract) && $contract->position != '' ) ? $contract->position : ''  ?>"
                                    autocomplete="off" placeholder="<?= lang('Label.lbl_position') ?>">
                                <span
                                    class=" err_messages err_businessPosition "><?php echo $getErrors['businessPosition']; ?></span>
                            </li>

                            <!-- Giấy ủy quyền -->
                            <li>
                                <input name="businessAuthority" type="text"
                                    class="form-control frm-lg businessAuthority"
                                    value="<?php echo (!empty($contract) && $contract->authorityNumber != '' ) ? $contract->authorityNumber : ''  ?>"
                                    autocomplete="off" placeholder="<?= lang('Label.lbl_authority') ?>">
                                <span
                                    class=" err_messages err_businessAuthority "><?php echo $getErrors['businessAuthority']; ?></span>
                            </li>

                            <!-- Địa chỉ nhà theo CMND -->
                            <li>
                                <textarea name="addressByBR" class="form-control frm-lg addressByBR" id="" cols="30"
                                    rows="3"
                                    placeholder="<?= lang('Label.lbl_addressBusinessRegistration') ?>"><?php echo (!empty($contract) && $contract->address != '' ) ? $contract->address : ''  ?></textarea>
                                <span
                                    class=" err_messages err_addressByBR "><?php echo $getErrors['addressByBR']; ?></span>
                            </li>


                            <li>
                                <input name="bsPhone" type="text" class="form-control frm-lg bsPhone"
                                    value="<?php echo (!empty($contract) && $contract->phone != '' ) ? $contract->phone : ''  ?>"
                                    autocomplete="off" placeholder="<?= lang('Label.lbl_bsPhone') ?>"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    min="9">
                                <span class=" err_messages err_bsPhone"><?php echo $getErrors['bsPhone']; ?></span>
                            </li>
                            <li>
                                <input name="bsFax" type="text" class="form-control frm-lg bsFax"
                                    value="<?php echo (!empty($contract) && $contract->fax != '' ) ? $contract->fax : ''  ?>"
                                    autocomplete="off" placeholder="<?= lang('Label.lbl_bsFax') ?>"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    min="9">
                                <span class=" err_messages err_bsFax"><?php echo $getErrors['bsFax']; ?></span>
                            </li>
                            <li>
                                <input name="bsTax" type="text" class="form-control frm-lg bsTax"
                                    value="<?php echo (!empty($contract) && $contract->taxCode != '' ) ? $contract->taxCode : ''  ?>"
                                    autocomplete="off" placeholder="<?= lang('Label.lbl_bsTax') ?>"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    min="9">
                                <span class=" err_messages err_bsTax"><?php echo $getErrors['bsTax']; ?></span>
                            </li>

                            <li class="edit-user-update-img ">
                                <b><?php echo lang('Label.lbl_bsImg') ?></b>
                                <div class="d-flex">
                                    <div class="w-100">
                                        <div class="countImgBs">
                                            
                                            <?php
                                                if(!empty($contract) && $contract->cardFrontUrl != ''){ ?>
                                                <div class="wrapImgAppend wrapImgAppend_0">
                                                    <span class="spanClose"
                                                        onclick="removeImgAppend(0)">x</span>
                                                    <img class="imgAppend inputImgBs_0"
                                                        src="<?php echo URL_API_UPLOADIMG.$contract->cardFrontUrl; ?>" alt="">
                                                    <input type="hidden" class="inputImgBs inputImgBs_0"
                                                        value="<?php echo $contract->cardFrontUrl; ?>" name="inputImg[]">
                                                </div>
                                                <?php if(!empty($contract) && $contract->cardBackUrl != ''){ ?>
                                                <div class="wrapImgAppend wrapImgAppend_1">
                                                    <span class="spanClose"
                                                        onclick="removeImgAppend(1)">x</span>
                                                    <img class="imgAppend inputImgBs_1"
                                                        src="<?php echo URL_API_UPLOADIMG.$contract->cardBackUrl; ?>" alt="">
                                                    <input type="hidden" class="inputImgBs inputImgBs_1"
                                                        value="<?php echo $contract->cardBackUrl; ?>" name="inputImg[]">
                                                </div>
                                                <?php } ?>
                                                <input type="hidden" name="checkImg" class="checkImg"
                                                value="1">
                                                <?php }else{ ?>
                                                    <?php $imgs = $dataPost['inputImg']; ?>
                                            <input type="hidden" name="checkImg" class="checkImg"
                                                value="<?= !empty($imgs) ? '1' : '0' ?>">
                                                    <?php } ?>

                                                <?php 
                                                if(!empty($imgs)){
                                                    foreach($imgs as $keyImg => $img){ ?>
                                            <div class="wrapImgAppend wrapImgAppend_<?= $keyImg ?>">
                                                <span class="spanClose"
                                                    onclick="removeImgAppend(<?= $keyImg ?>)">x</span>
                                                <img class="imgAppend inputImgBs_<?= $keyImg ?>"
                                                    src="<?php echo URL_API_UPLOADIMG.$img; ?>" alt="">
                                                <input type="hidden" class="inputImgBs inputImgBs_<?= $keyImg ?>"
                                                    value="'+res.data+'" name="inputImg[]">
                                            </div>
                                            <?php 
                                                    }
                                                }
                                            ?>
                                        </div>
                                        <label for="frontBsRegis">
                                            <img for="frontBsRegis" id="frontBsRegisImg" class="frontBsRegisImg w-100"
                                                src="<?php echo base_url('public/images/btn-add-img.svg');?>" alt="">
                                        </label>
                                        <input type="file" name="frontBsRegis" class="imgDefault frontBsRegis"
                                            onchange="uploadImgJs(event,'err_frontBsRegisErr','countImgBs')"
                                            id="frontBsRegis" />
                                    </div>
                                </div>
                                <p class="err_messagesp err_frontBsRegisErr">
                                    <?php echo $getErrors['bsRegister'] ?>
                                </p>
                            </li>
                        </div>

                        <li class="pdlr15" style="margin-bottom: 30px;">
                            <img src="<?php echo base_url('public/images/Warning.png');?>" alt="">
                            <span><?= lang('Label.lbl_noti') ?>: </span> <span
                                class="info-detail-9"><?= lang('Label.lbl_notiDetail') ?></span>
                        </li>

                        <li class="pdlr15" style="margin-bottom: 30px;">
                            <span><b><?= lang('Label.lbl_bankAccount') ?></b></span>
                        </li>

                        <li class="pdlr15" style="margin-bottom: 30px;">
                            <div class="dropdown orDetail-select-address">
                                <?php

                                    if(!empty($primaryBanks)){
                                        $bankAccount = (substr($primaryBanks->bankAccount, 0, 4));
                                        $bankAccount .=(substr($primaryBanks->bankAccount, 4, 4));
                                        $bankAccount .= (substr($primaryBanks->bankAccount, 8, 4));
                                        $bankAccount .=(substr($primaryBanks->bankAccount, 12, 4));
                                        $bankAccount .=(substr($primaryBanks->bankAccount, 16, 4));
                                ?>
                                <img class="bankLogo" style="width:50px" src="<?php echo $primaryBanks->imageBank;?>"
                                    alt="">
                                <input class="dropdown-toggle chooseBankFastNew p-0 pr-2 mgl20 " type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false"
                                    aria-expanded="false"
                                    value="<?= (!empty($primaryBanks)) ? $primaryBanks->bankShortName .' '.$primaryBanks->bankAccount  : lang('Label.lbl_chooseBank') ?>"
                                    style="border: none; background: none;font-size: 13px; width:72%; text-align:left" />
                                <input type="hidden" class="bankIdchosen"
                                    value="<?= (!empty($primaryBanks)) ? $primaryBanks->id : ''; ?>"
                                    name="bankIdchosen">
                                <img class="choseListBank cursorPointer dropdown-toggle" data-toggle="dropdown" src="<?php echo base_url('public/images/icon-slash.png');?>" alt="">
                                <?php }else{ ?>
                                    <img class="bankLogo" style="width:50px" src="<?php echo $primaryBanks->imageBank;?>"
                                    alt="">
                                <input class="dropdown-toggle chooseBankFastNew p-0 pr-2 mgl20 " type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false"
                                    aria-expanded="false" value=""
                                    style="border: none; background: none;font-size: 13px; width:72%; text-align:left" />
                                <input type="hidden" class="bankIdchosen" value="" name="bankIdchosen">
                                <img class="choseListBank cursorPointer dropdown-toggle" data-toggle="dropdown" src="<?php echo base_url('public/images/icon-slash.png');?>" alt="">
                                <?php 
                                    } ?>
                                <div class="dropdown-menu choosenPickup" aria-labelledby="dropdownMenuButton">
                                    <div class="dropdown-item pl-0 orDetail-data-select" href="#"
                                        style="padding-left: 21px!important;">
                                        <span
                                            style="color: #885DE5;font-size: 14px; padding-left: 4px;"><?= lang('Label.lbl_chooseBank') ?></span>
                                    </div>
                                    <div class="appendBankNew">
                                        <?php 
                                        if(!empty($listBanks)):
                                            foreach($listBanks as $bank): 
                                                ?>

                                        <div class="dropdown-item pl-0  orDetail-data-select" href="#"
                                            style="padding-left: 21px!important;"
                                            onclick="changeBanks(<?= $bank->id ?>,'<?= $bank->bankShortName ?>' , '<?= base_url("public/images/Bank_Logos/".$bank->bankShortName.".png") ?>','<?= $bank->bankAccount ?>' )">
                                            <span
                                                style="color: #28262B;font-size: 14px;"><?= $bank->bankShortName .' '.$bank->bankAccount ?></span>
                                            <br>
                                            <img src="<?php echo base_url('public/images/Bank_Logos/'.$bank->bankShortName.'.png');?>"
                                                alt="">
                                            <span style="color: #68656D;font-size: 12px;">
                                                <?php
                                                echo ($bank->bankShortName) ? $bank->bankShortName : '' ;
                                                ?>
                                            </span>
                                        </div>
                                        <?php endforeach; endif; ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="pdlr15 cursorPointer" style="padding-bottom:10px;" data-toggle="modal"
                            data-target="#addBanks">
                            <img src="<?= base_url('public/images/bank/Union.svg') ?>" alt=""
                                class="plusIcon iconAddBank">
                            <span class="mgl20"><?= lang('Label.lbl_addBankCod') ?></span>
                        </li>

                    </ul>

                </div>
            </div>

            <div class="modal" id="addBanks">
                <div class="modal-dialog" style="width:100%; margin:0 auto;padding:0px;">
                    <div class="modal-content" style="margin-top: 17%;">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title headerFalse">
                                <?=lang('Label.lbl_addBankContract')?>
                            </h5>
                            <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">

                            <div class="row modal-body-content">
                                <div class="col-12 pdt20 pdd20">
                                    <select name="bankCode" id="bankCode"
                                        class="form-control frm-lg bankCode cn-bank-op chosen-select ">
                                        <option value="0"><?= lang('Label.lbl_chooseBank') ?></option>
                                        <?php if(!empty($bankInfo)): ?>
                                        <?php foreach($bankInfo as $bank): ?>
                                        <option <?= ($dataPost['bankCode'] == $bank->bankCode) ? 'selected' : '' ;?>
                                            value="<?= $bank->bankCode ?>">
                                            <?= $bank->bankName. ' ('.$bank->shortName.')' ?>
                                        </option>
                                        <?php endforeach; endif; ?>
                                    </select>
                                    <span class=" err_messages err_bankCode"><?php echo $getErrors['bankCode']; ?>
                                    </span>
                                </div>

                                <div class="col-12 pdt20 pdd20">
                                    <input name="accountName" id="accountName" value="<?= $dataPost['accountName'] ?>"
                                        placeholder="<?= lang('Label.lbl_inputAccountName') ?>"
                                        oninput="this.value = this.value.toUpperCase()"
                                        class="form-control frm-lg i  accountName fullName">
                                    <span class=" err_messages err_accountName"><?php echo $getErrors['accountName']; ?>
                                    </span>
                                </div>

                                <div class="col-12 pdt20 pdd20">
                                    <label class="radio-inline pl-2" style="width: 50%;"><input value='0'
                                            <?= $dataPost['accountNoType'] == '0' ? 'checked' : '' ?> type="radio"
                                            name="accountNoType" checked style="width: auto;height: 11px;">
                                        <?= lang('Label.lbl_accountNumber') ?></label>
                                    <label class="radio-inline"><input value='1'
                                            <?= $dataPost['accountNoType'] == '1' ? 'checked' : '' ?> type="radio"
                                            name="accountNoType" style="width: auto;height: 11px;">
                                        <?= lang('Label.lbl_cardNumber') ?></label>
                                </div>

                                <div class="col-12 pdt20 pdd20">
                                    <input name="accountNumber" value="<?= $dataPost['accountNumber'] ?>"
                                        id="accountNumber" placeholder="<?= lang('Label.lbl_inputAccountNumber') ?> "
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                        class="form-control frm-lg accountNumber" />
                                    <span
                                        class=" err_messages err_accountNumber"><?php echo $getErrors['accountNumber']; ?>
                                    </span>
                                    <span class="err_messages err_allMess "></span>
                                </div>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer customize-approve">
                            <button type="button" class="btn btn-modal"
                                data-dismiss="modal"><?=lang('Label.modalClose');?></button>
                            <a class="btn btn-confirmCustom btn-ok" onclick="addBanksContract()"
                                href="javascript:void(0)">
                                <?=lang('Label.lbl_addBankCod')?></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row w-100 m-0 p-0 mt-3 btn-edit-info-submit">
                <div class="col-sm-6 col-0"></div>
                <div class="col-sm-6 col-12">
                    <!-- onclick="updateAccountInfo()" -->
                    <button type="submit"
                        class="form-control frm-lg info-button"><?= lang('Label.lbl_txtNext') ?></button>
                </div>
            </div>
        </section>
    </form>

    <section>
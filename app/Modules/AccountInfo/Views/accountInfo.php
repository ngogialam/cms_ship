<section id="connectbank" class="acc-info-detail">
    <?=view('layout/bannerAccount')?>
    <section id="info-detail-new" class="row">
        <div class="info-detail-new-1 col-md-6 pt-3 pl-0">
            <div class="pl-3 contactInfoWrap">
                <ul class="list-unstyled position-relative h-100">
                    <li class="nstyle">
                        <b><?= lang('Label.lbl_basicInformation') ?></b>
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
                        <b> <span> <?= str_replace('-','/', str_replace(' ','',$dataUserCache->birthday)) ?></span></b>

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

                    <li class="nstyle btn-accInfo position-absolute w-100 btn-edit-user-info">
                        <a href=" <?= base_url('/cap-nhap-thong-tin-tai-khoan'); ?>">
                            <button type="text" class="form-control frm-lg info-button btn-edit-50"
                                style="border-radius: 5px;"><?= lang('Label.lbl_edit') ?></button>
                        </a>
                    </li>
                    <!-- dataDistrict -->
                </ul>
            </div>
        </div>
        <div class="info-detail-new-1 info-detail-noti col-md-6 pt-3 pl-0">
            <div class="pl-3 contactInfoWrap">
                <ul class="list-unstyled h-100 position-relative mgb15">
                    <!-- <li class=" nstyle">
            <b><?= lang('Label.lbl_cidInformation') ?> </b>
          </li> -->
                    <li class=" nstyle">
                        <b><?= lang('Label.lbl_infoContract') ?>: </b>
                        <b><span><?php if(!empty($contract)){
                            if($contract->type == 1){
                                echo lang('Label.lbl_personal');
                            }else{
                                echo lang('Label.lbl_business');
                            }
                        } ?> </span></b>
                    </li>

                    <!-- Đại diện -->
                    <li class="info-detail-new-2">
                        <?= lang('Label.lbl_surrogate').': '  ?>
                        <b><span><?= (!empty($contract)) ? $contract->owner : '' ?> </span></b>
                    </li>
                    <?php if(!empty($contract)){
                            if($contract->type == 2){
                    ?>
                    <!-- Công ty -->
                    <li class="info-detail-new-2">
                        <?= lang('Label.lbl_companyName').': '  ?>
                        <b><span><?= (!empty($contract) && isset($contract->companyName)) ? $contract->companyName : '' ?> </span></b>
                    </li>
                    <?php } } ?>
                    <!-- Chức vụ -->
                    <li class="info-detail-new-2">
                        <?= lang('Label.lbl_position').': '  ?>
                        <b><span> <?= (!empty($contract)) ? $contract->position : '' ?> </span></b>
                    </li>

                    <!-- Địa chỉ -->
                    <li class="info-detail-new-2">
                        <?= lang('Label.lbl_infoAddress').' '  ?>
                        <b><span><?= (!empty($contract)) ? $contract->address : '' ?></span></b>
                    </li>

                    <!-- Ngày sinh -->
                    <li class="info-detail-new-2">
                        <?= lang('Label.lbl_dob').': '  ?>
                        <b><span><?= (!empty($contract)) ? $contract->dob : '' ?></span></b>
                    </li>
                    <?php if($contract->type == 1){  ?>
                    <li class="info-detail-new-2">
                        <?= lang('Label.lbl_infoIdentity') .' '  ?>
                        <b>
                            <span> <?= (!empty($contract)) ? $contract->idCard : '' ?> </span></b>
                    </li>
                    <li class="info-detail-new-2">
                        <?= lang('Label.lbl_cidDate') .': ' ?>
                        <b> <span><?= (!empty($contract)) ? $contract->idCardDate : '' ?></span></b>

                    </li>
                    <li class="info-detail-new-2">
                        <?= lang('Label.lbl_infoIdentityPlace').' ' ?>
                        <b> <span><?= (!empty($contract)) ? $contract->idCardPlace : '' ?> </span></b>
                    </li>
                    <?php } else{ ?>
                    <!-- Ngày sinh -->
                    <li class="info-detail-new-2">
                        <?= lang('Label.lbl_authorityerr').': '  ?>
                        <b><span><?= (!empty($contract)) ? $contract->authorityNumber : '' ?></span></b>
                    </li>

                    <!-- Số điện thoại theo đăng ký -->
                    <li class="info-detail-new-2">
                        <?= lang('Label.lbl_phoneBs').': '  ?>
                        <b><span><?= (!empty($contract)) ? $contract->phone : '' ?></span></b>
                    </li>

                    <!-- Số điện thoại theo đăng ký -->
                    <li class="info-detail-new-2">
                        <?= lang('Label.lbl_bsFax').': '  ?>
                        <b><span><?= (!empty($contract)) ? $contract->fax : '' ?></span></b>
                    </li>
                    <!-- Số điện thoại theo đăng ký -->
                    <li class="info-detail-new-2">
                        <?= lang('Label.lbl_bsTax').': '  ?>
                        <b><span><?= (!empty($contract)) ? $contract->taxCode : '' ?></span></b>
                    </li>
                    <?php } ?>

                    <!-- Số tài khoản ngân hàng -->
                    <?php
                            $bank = [];
                            if(!empty($contract)){
                                $bank = $contract->bankAccount;
                            }
                    ?>
                    <li class="info-detail-new-2">
                        <?= lang('Label.lbl_bankAccountNumber').' '  ?>
                        <b><span><?= (!empty($bank)) ? $bank->bankAccount : '' ?></span></b>
                    </li>

                    <!-- Ngân hàng -->
                    <li class="info-detail-new-2">
                        <?= lang('Label.lbl_openBankName').' '  ?>
                        <b><span><?= (!empty($bank)) ? $bank->bankName : '' ?></span></b>
                    </li>

                    <li class="info-detail-new-2">
                        <?= lang('Label.lbl_status').' '  ?>
                        <b><?php if(!empty($contract)){
                            if($contract->status == 1){
                                echo '<span style="color:#885DE5">'.lang('Label.lbl_contract1').'</span>';
                            }else if($contract->status == 2){
                                echo '<span style="color:red">'.lang('Label.lbl_contract2').'</span>';
                            }else{
                                echo '<span style="color:red">'.lang('Label.lbl_contract0').'</span>';
                            }
                        }else{
                            echo lang('Label.lbl_contractNull');
                        } ?></b>
                    </li>
                    <?php
                        if($contract->status == 2):
                    ?>
                    <li class="info-detail-new-2">
                    <?= lang('Label.lbl_contractReason').': '  ?>
                        <b><span><?= (!empty($contract)) ? $contract->rejectReason : '' ?></span></b>
                    </li>
                    <?php endif; ?>
                    

                    <?php
                    if(!empty($contract)){
                        if($contract->contractFileUrl){?> 
                            <div class="row" style="width: 100%;bottom: 3%;">
                            <div class="col-3"></div>
                            <div class="col-6">
                            <?php
                                if($contract->status == 2){
                            ?>
                                <a href="<?php echo base_url('cap-nhap-thong-tin-hop-dong') ?>">
                                    <button type="text" class="form-control frm-lg info-button"
                                    style="border-radius: 5px;">Chỉnh sửa hợp đồng</button>
                                </a>
                                <?php }else if($contract->status == 1) { ?>
                                    <button type="text" onclick="downloadContract('<?php echo URL_API_UPLOADIMG.$contract->contractFileUrl; ?>', 'contract_<?php echo $dataUserCache->username ?>')" class="form-control frm-lg info-button"
                                    style="border-radius: 5px;">Tải file hợp đồng</button>
                                    <input class="downloadContract" type="hidden" value="<?php echo URL_API_UPLOADIMG.$contract->contractFileUrl; ?>">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-3"></div>
                            <?php
                        }
                    }
                
                if($checkCookieAccount == 'success'){
                    ?>
                    <li class="txt_center w95 noti-success" style="display:none; list-style: none;">
                        <img src="<?php echo base_url('public/images/thanhcong.png');?>" alt=""><br>
                        <b><?= lang('Label.lbl_notifycation') ?></b><br>
                        <span><?= lang('Label.lbl_updateAccountSuccess') ?></span><br>
                        <?= lang('Label.lbl_thanks') ?>
                    </li>
                    <?php }else if($checkCookieAccount == 'false'){ ?>
                    <li class="txt_center w95 noti-false" style="display:none; list-style: none;">
                        <img src="<?php echo base_url('public/images/iconClose.png');?>" alt=""><br>
                        <b><?= lang('Label.lbl_notifycation') ?></b><br>
                        <span><?php echo lang('Label.lbl_updateAccountFail').'<br>'.$updateMessage ?></span><br>
                        <?= lang('Label.lbl_reUpdate') ?>
                    </li>

                    <?php } ?>
                    <?php
                        if(empty($contract)):
                    ?>
                    <?php
                        if($dataUserCache->company != ''){
                    ?>
                    <li class=" btn-accInfo w-100 btn-edit-user-info" style="list-style: none;">
                        <a href=" <?= base_url('/cap-nhap-thong-tin-hop-dong'); ?>">
                            <button type="text" class="form-control frm-lg info-button btn-edit-50"
                            style="border-radius: 5px;"><?= lang('Label.lbl_edit') ?></button>
                        </a>
                    </li>
                    <?php }else{?>
                        <li class="info-detail-new-2" style="color:red">
                            <?= lang('Label.lbl_errUpdateContract').' '  ?>
                        </li>
                    <?php } ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </section>

    <?php if ($checkCookieAccount == 'success') { ?>
    <script>
    $(document).ready(function() {
        $(".noti-success").fadeIn();
        $(".btn-accInfo").hide();

        // Set a timeout to hide the element again
        setTimeout(function() {
            $(".noti-success").hide();
            $(".btn-accInfo").show();
        }, 5000);
    });
    </script>
    <?php } ?>

    <?php if ($checkCookieAccount == 'false') { ?>
    <script>
    $(document).ready(function() {
        $(".noti-false").fadeIn();
        $(".btn-accInfo").hide();
        // Set a timeout to hide the element again
        setTimeout(function() {
            $(".noti-false").fadeOut();
            $(".btn-accInfo").show();
        }, 5000);
    });
    </script>
    <?php } ?>
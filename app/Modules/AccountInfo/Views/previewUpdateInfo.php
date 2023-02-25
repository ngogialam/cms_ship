<section id="connectbank" class="acc-info-detail">
    <?=view('layout/bannerAccount')?>
    <section id="info-detail-new" class="row">
        <div class="info-detail-new-1 col-md-6 pt-3 pl-0">
            <div class="pl-3">
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

                    <!-- dataDistrict -->
                </ul>
            </div>
        </div>
        <div class="info-detail-new-1 info-detail-noti col-md-6 pt-3 pl-0">
            <div class="pl-3">
                <ul class="list-unstyled h-100 position-relative mgb15">
                    <!-- <li class=" nstyle">
            <b><?= lang('Label.lbl_cidInformation') ?> </b>
          </li> -->
                    <li class=" nstyle">
                        <b><?= lang('Label.lbl_infoContract') ?>: <?php echo ($dataAccount->contractType == 2) ? lang('Label.lbl_business') : lang('Label.lbl_personal'); ?> </b>
                    </li>

                    <!-- Đại diện -->
                    <li class="info-detail-new-2">
                        <?= lang('Label.lbl_surrogate').': '  ?>
                        <b>
                            <span>
                                <?php 
                                    if($dataAccount->contractType == 1){
                                        echo ($dataAccount->representativePerson) ? $dataAccount->representativePerson : '';
                                    }else{
                                        echo ($dataAccount->representative) ? $dataAccount->representative : '';
                                    }
                                ?>
                            </span>
                        </b>
                    </li>

                    <!-- Chức vụ -->
                    <li class="info-detail-new-2">
                        <?= lang('Label.lbl_position').': '  ?>
                        <b><span> 
                            <?php 
                                if($dataAccount->contractType == 1){
                                    echo ($dataAccount->personPosition) ? $dataAccount->personPosition : '';
                                }else{
                                    echo ($dataAccount->businessPosition) ? $dataAccount->businessPosition : '';
                                }
                            ?>
                            </span></b>
                    </li>
                    
                    <!-- Địa chỉ -->
                    <li class="info-detail-new-2">
                        <?= lang('Label.lbl_infoAddress').' '  ?>
                        <b><span>
                            <?php 
                                if($dataAccount->contractType == 1){
                                    echo ($dataAccount->addressByID) ? $dataAccount->addressByID : '';
                                }else{
                                    echo ($dataAccount->addressByBR) ? $dataAccount->addressByBR : '';
                                }
                            ?>
                            </span></b>
                    </li>

                    <?php
                        if($dataAccount->contractType == 2){?>
                            <!-- Ngày sinh -->
                            <li class="info-detail-new-2">
                                <?= lang('Label.lbl_authorityerr').': '  ?>
                                <b><span><?php echo $dataAccount->businessAuthority; ?></span></b>
                            </li>

                            <!-- Số điện thoại theo đăng ký -->
                            <li class="info-detail-new-2">
                                <?= lang('Label.lbl_phoneBs').': '  ?>
                                <b><span><?php echo $dataAccount->bsPhone; ?></span></b>
                            </li>

                            <!-- Số điện thoại theo đăng ký -->
                            <li class="info-detail-new-2">
                                <?= lang('Label.lbl_bsFax').': '  ?>
                                <b><span><?php echo $dataAccount->bsFax; ?></span></b>
                            </li>
                            <!-- Số điện thoại theo đăng ký -->
                            <li class="info-detail-new-2">
                                <?= lang('Label.lbl_bsTax').': '  ?>
                                <b><span><?php echo $dataAccount->bsTax; ?></span></b>
                            </li>

                        <?php }else{ ?>
                            <!-- Ngày sinh -->
                            <li class="info-detail-new-2">
                                <?= lang('Label.lbl_dob').': '  ?>
                                <b><span><?php echo $dataAccount->personDob; ?></span></b>
                            </li>
                            <!-- Số CMT -->
                            <li class="info-detail-new-2">
                                <?= lang('Label.lbl_infoIdentity').' '  ?>
                                <b><span><?php echo $dataAccount->personId; ?></span></b>
                            </li>

                            <!-- Ngày cấp -->
                            <li class="info-detail-new-2">
                                <?= lang('Label.lbl_cidDate').': '  ?>
                                <b><span><?php echo $dataAccount->personIdDate; ?></span></b>
                            </li>

                            <!-- Nơi cấp -->
                            <li class="info-detail-new-2">
                                <?= lang('Label.lbl_infoIdentityPlace').' '  ?>
                                <b><span><?php echo $dataAccount->personIdAddress; ?></span></b>
                            </li>
                        <?php }
                    ?>

                    <!-- Số tài khoản ngân hàng -->
                    <li class="info-detail-new-2">
                        <?= lang('Label.lbl_bankAccountNumber').' '  ?>
                        <b><span><?php echo $listBanks->bankAccount ?></span></b>
                    </li>

                    <!-- Ngân hàng -->
                    <li class="info-detail-new-2">
                        <?= lang('Label.lbl_openBankName').' '  ?>
                        <b><span><?php echo $listBanks->bankShortName ?></span></b>
                    </li>

                    <!-- Chi nhánh -->
                    <!-- <li class="info-detail-new-2">
                        <?= lang('Label.lbl_bankBranch').' '  ?>
                        <b><span>Thanh Trì - Hà Nội</span></b>
                    </li> -->
                    <div class="row" style="position: absolute;width: 100%;bottom: 3%;">
                        <div class="col-4">
                            <a href=" <?= base_url('/ky-xac-nhan'); ?>">
                                <button type="text" class="form-control frm-lg btn-outline-sign btn signConfirm"
                                    style="border-radius: 25px;"><b><?= lang('Label.lbl_contractSign') ?></b></button>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href=" <?= base_url('/chi-tiet-hop-dong'); ?>" target="_blank">
                                <button type="text" class="form-control frm-lg btn-outline-detail btn signConfirm"
                                    style="border-radius: 25px;"><b><?= lang('Label.lbl_contractDetail') ?></b></button>
                            </a>
                        </div>
                    </div>
                </ul>
                
            </div>
        </div>
    </section>
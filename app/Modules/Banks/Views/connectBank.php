<section id="connectbank">
    <section id="info-bn">
        <div class="link-user notifacation-wrapper">
            <ul>
                <li>
                    <img src="<?php echo base_url('public/images/Home.png');?>" alt="">
                </li>
                <li class="mt2-config title-page">
                    > <span><?= lang('Label.account') ?></span> > <span> <?= $title ?></span>
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

    <section id="info-detail" class="row cnBank-pr">
        <div class="info-detail-1 col-md-6 p-0  ">
            <div class="divbg">
                <ul class="mb-0 list-unstyled">
                    <li class="info-detail-2">
                        <b class="fw500"> <?= lang('Label.lbl_bankLinkCOD'); ?></b>
                    </li>
                    <div style="max-height: 400px;"
                        class="<?php if(!empty($listBankCod)){ echo('order-detail-journey-body-main');}?>">
                        <?php if(empty($listBankCod)){?>
                        <a href="<?= base_url('/them-lien-ket') ?>">
                            <li style="background-image:url(<?php echo base_url('public/images/thenganhang.png');?>);background-repeat: round;"
                                class="cn-bank-card1">
                                <ul style="padding-top: 23%;" class="">
                                    <li style="padding-left: 44%;">
                                        <img src="<?php echo base_url('public/images/Union.png');?>" alt="">
                                    </li>
                                    <li style="padding-top:27px;color: #885DE5; text-align: center;">
                                        <?= lang('Label.lbl_withoutBankAccount'); ?>
                                    </li>

                                </ul>
                            </li>
                        </a>
                        <?php
          
            }else{ 
                foreach( $listBankCod as $bankCod){ ?>

                        <li style="background-image:url(<?php echo base_url('public/images/thenganhang.png');?>);margin: 0 auto"
                            class="cn-bank-card1">
                            <ul class="tlk-title-1">
                                <li style="position:relative">
                                    <img src="<?php echo base_url('public/images/Bank_Logos/'.$bankCod->bankShortName.'.png');?>"
                                        alt="">
                                        
                                    <span style="padding-left: 10px;"><?= $bankCod->bankShortName ?></span>
                                    
                                    <img class="cursorPointer" onclick="confirmRemoveBank(<?php echo $bankCod->id; ?>,'<?php echo $bankCod->bankShortName ?>')" style="position:absolute; right:-30px; top:60px" title="<?php echo lang('Label.alt_trash'); ?>" src="<?php echo base_url('public/assets/images/icons/icTrash.svg');?>">
                                </li>
                                <li class="tlk-title">
                                    <?php echo(substr($bankCod->bankAccount, 0, 4));?>
                                    <?php echo(substr($bankCod->bankAccount, 4, 4));?>
                                    <?php echo(substr($bankCod->bankAccount, 8, 4));?>
                                    <?php echo(substr($bankCod->bankAccount, 12, 4));?>
                                    <?php echo(substr($bankCod->bankAccount, 16, 4));?>
                                    <br>
                                    <span><?= $bankCod->bankAccountName ?></span>
                                </li>
                            </ul>
                        </li>
                        <?php } } ?>
                    </div>
                </ul>
            </div>
        </div>

        <div class="info-detail-1 col-md-6 pr-0 cnBank-pt pl-0 d-flex ">
            <div class="ml-md-3 ml-sm-0 w-100 divbg">
                <ul class="list-unstyled">
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
                    <?php if(!empty($listBankCod)): ?>
                    <li class="cn-all">
                        <img src="<?php echo base_url('public/images/Union1.png');?>" alt="" id="addaccount-bank">
                        <a
                            href="<?= base_url('/them-lien-ket') ?>"><button><?= lang('Label.lbl_addBankCod') ?></button></a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="modal" id="modalConfirmRevBank">
            <div class="modal-dialog" style="margin:0 auto">
                <div class="modal-content" style="margin-top: 17%;">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title headerFalse">
                            <?=lang('Label.lbl_notificationConfirm')?>
                        </h5>
                        <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row modal-body-content">
                            <div class="col-12 textCenter bodyOrderFalse">
                                <p class="fz13 notiText"> </p>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer customize-approve">
                        <button type="button" class="btn btn-modal btn-cancelCustom"
                            data-dismiss="modal"><?=lang('Label.lbl_txtCancel');?></button>
                        <button type="button" class="btn btn-modal btn-confirmCustom btnCfm btnCfmRmBank ">
                            <?=lang('Label.lbl_confirmOrder');?>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </section>
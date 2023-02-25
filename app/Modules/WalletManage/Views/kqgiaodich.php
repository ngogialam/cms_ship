<?=view('layout/bannerEwallet')?>
<!-- ===============BODY============== -->
<div style="background-color: white;">
    <div class="ew-rd-tt" style="width: 100%;">
        <span><?php echo $title?></span>
    </div>
    <div class="ew-kqgd">
        <ul>
            <li>
                <?php
                    // Status
                    // --1 : Thất bại
                    // --2 : Chờ chuyển tiền
                    // --3 : Đang xử lý 
                    if( isset($dataWithDraw) && $withDraw == 1 && $dataWithDraw->resultTransaction->status == 1){ ?>
                <img src="<?php echo base_url('public/images/iconClose.png');?>" alt="">
                <?php } else if( isset($dataWithDraw) && $withDraw == 1 && ($dataWithDraw->resultTransaction->status == 3 || $dataWithDraw->resultTransaction->status == 2 )){ ?>
                <img src="<?php echo base_url('public/images/thanhcong.png');?>" alt="">
                <?php //} else if( isset($dataWithDraw) && $withDraw == 1 && $dataWithDraw->resultTransaction->status == 2){ 
                    ?>
                <!-- <img src="<?php //echo base_url('public/images/Loi.png');?>" alt=""> -->
                <?php } ?>
            </li>
            <li class="ew-kqgd-txt1">
                <?= lang('Label.lbl_notifycation'); ?>
            </li>
            <li class="ew-kqgd-txt2">
                <?php if( isset($dataWithDraw) && $withDraw == 1 && $dataWithDraw->resultTransaction->status == 1){ ?>

                <?= lang('Label.lbl_withDrawFalse'); ?>
                <?php } else if( isset($dataWithDraw) && $withDraw == 1 && ($dataWithDraw->resultTransaction->status == 3 || $dataWithDraw->resultTransaction->status == 2)){ ?>

                <?= lang('Label.lbl_withDrawSuccess'); ?>
                <?php //} else if( isset($dataWithDraw) && $withDraw == 1 && $dataWithDraw->resultTransaction->status == 2){ 
                    ?>
                <? // lang('Label.lbl_withDrawPending'); ?>
                <?php } ?>
            </li>
            <li>
                <?= $dataWithDraw->bankInfo->bankShortName ?> - <?= $dataWithDraw->bankInfo->bankAccount ?> -
                <?= $dataWithDraw->bankInfo->bankAccountName ?>
            </li>
        </ul>
        <ul>
            <table class="ew-kq-tb">
                <tr>
                    <td>
                        <?= lang('Label.lbl_withDrawAmount') ?>
                    </td>
                    <td style="color:#F0A616 ;">
                        <?= number_format($dataWithDraw->resultTransaction->amount); ?> đ
                    </td>
                </tr>
                <tr>
                    <td>
                        <?= lang('Label.lbl_feeTransaction') ?>
                    </td>
                    <td style="color: #885DE5;">
                    <?php if( isset($dataWithDraw) && $withDraw == 1 && $dataWithDraw->resultTransaction->status == 1){ ?>
                            0 đ
                    <?php } else { ?>

                        <?= number_format($dataWithDraw->resultTransaction->cost); ?> đ
                    <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?= lang('Label.lbl_transId'); ?>
                    </td>
                    <td>
                        <b><?= $dataWithDraw->resultTransaction->transId; ?></b>
                    </td>
                </tr>
            </table>
        </ul>
        <ul>
            <li class="ew-kqgd-txt3">
                <?php if( isset($dataWithDraw) && $withDraw == 1 && $dataWithDraw->resultTransaction->status == 1){ ?>

                <?= lang('Label.lbl_withDrawDetailFalse'); ?>
                <?php } else if( isset($dataWithDraw) && $withDraw == 1 && ($dataWithDraw->resultTransaction->status == 3 || $dataWithDraw->resultTransaction->status == 2)){ ?>

                <?= lang('Label.lbl_withDrawDetailSuccess'); ?>
                <?php //} else if( isset($dataWithDraw) && $withDraw == 1 && $dataWithDraw->resultTransaction->status == 2){ 
                ?>
                <?php // lang('Label.lbl_withDrawDetailPending'); ?>
                <?php } ?>

            </li>

        </ul>
    </div>
    <div class="ew-kqgd-btn">
        <a href="<?php echo base_url('/vi-hola');?>"><button><?= lang('Label.lblcomeHome') ?></button></a>
    </div>
</div>

<section>
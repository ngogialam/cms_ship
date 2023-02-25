<?=view('layout/bannerEwallet')?>
<!-- ===============BODY============== -->
<div class="ew-xn row">
    <div class="ew-rd-tt  col-lg-5 col-ms-5 col-sm-5 col-12  xnrt-info">
        <span> <?= lang('Label.lbl_confirmWithDraw') ?></span>
        <div class="ew-slide2">
            <ul>
                <li>
                <?= lang('Label.lbl_dataAccountNumber') ?>
                </li>
                <li>
                    <span><?= number_format($dataOld->amount); ?></span> <b>đ</b>
                </li>
            </ul>
            <ul>
                <li>
                    <?= lang('Label.lbl_feeTransaction') ?>
                </li>
                <li>
                    <span><?= ($transactionFee) ? number_format($transactionFee) : number_format(CONFIG_FEE_WITHDRAW) ?>
                    </span>
                    </span> <b> đ</b>
                </li>
            </ul>
        </div>
    </div>
    <div class="ew-rd-tt col-lg-6 col-ms-6 col-sm-6 col-12 xnrt-info">
        <span><?= lang('Label.lbl_accountWithDraw') ?></span>
        <form action="" class="form-100" id="form-balance-fluctuations" method="POST" enctype="multipart/form-data">
            <div class="ew-slide1" style="background-image: url(<?php echo base_url('public/images/Frame14.png');?>);"
                style="width: 100%!important;">
                <table>
                    <tr>
                        <td>
                            <img src="<?php echo base_url('public/images/Bank_Logos/'.$BankCod->bankShortName.'.png');?>"
                                alt="" style="margin-top: 20px;">
                        </td>
                        <td class="ew-txt-card-1">
                            <?= $BankCod->bankShortName ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td class="ew-txt-card-2 ">
                            <span class="number-card-bank"><?= $BankCod->bankAccount ?></span>
                            <div class="ew-txt-card-3"><?= $BankCod->bankAccountName ?></div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="ew-rt-btn3">
                <button name="submit" onclick="showLoader()" class="btn form-control btn-primary btnDoit btn-submit-xngg">
                    <?= lang('Label.lbl_confirmOrder') ?></button>
            </div>
        </form>
    </div>
</div>

<section>

    <?php if($callModal == 1){ ?>
    <script>
    var message = '<?php echo lang('Label.err_211') ?>';
    openModal(message);
    </script>
    <?php } ?>
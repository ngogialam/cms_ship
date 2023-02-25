<?=view('layout/bannerEwallet')?>
<!-- ===============BODY============== -->
<div class="ew-bd">
    <div class="row" style="padding-bottom: 17px;">
        <div class="col-sm-4 bd-title-1 text-center">
            <ul class="m-1">
                <li>
                    <?= lang('Label.lbl_holdBalance'); ?>
                </li>
                <li>
                    <span><?= number_format($dataBalance->holdBalance) ?> đ</span>
                </li>
            </ul>
        </div>
        <div class="col-sm-4 bd-title-1">
            <ul class="m-1">
                <li>
                    <?= lang('Label.lbl_availableBalance'); ?>
                </li>
                <li>
                    <b><?= number_format($dataBalance->availableBalance) ?></b> <span>đ</span>
                </li>
            </ul>
        </div>
        <div class="col-sm-4 bd-title-1">
            <ul class="m-1">
                <li>
                    <?= lang('Label.lbl_creditBalance'); ?>
                </li>
                <li>
                    <span><?= number_format($dataBalance->creditBalance) ?> đ</span>
                </li>
            </ul>
        </div>
    </div>
</div>
<form action="" class="form-100" id="form-balance-fluctuations" method="POST" enctype="multipart/form-data"
    class="mt2-config title-page">
    <div class="ew-bd-lk mb-2">
        <div class="ew-bd-tt row w-100">
            <div class="col-md-10 col-sm-9 col-7 mr-0">
                <span><?= lang('Label.lbl_transactionHistory') ?></span>
            </div>
            <!-- onclick="exportExcelBalance()" -->
            <div class="col-md-2 col-sm-3 col-5 pl-0 dbsd-bnt-expExcel" onclick="exportExcelBalance()" >
                <button type="button" class="w-100"><?= lang('Label.lbl_exportExcel') ?></button>
            </div>
        </div>
        <div class="ew-bd-search">
            <ul class="row w-100 pl-0 ml-0">
                <li class="col-xl-4 col-md-12 lsgd-search-pl lsgd-search-ip1">
                    <input type="text" value="<?= ($dataPost['orderId'] ) ? $dataPost['orderId'] : '' ?>"
                        placeholder="<?= lang('Label.lbl_plhOrderId') ?>" class="orderId" name="orderId">
                </li>
                <li class="col-xl-2 col-md-3 col-6 p-xl-0 pr-md-0 pr-0 pt-2 pr-0 lsgd-search-pl">
                    <select name="transactionType" id="" class="chosen-select transactionType">
                        <option
                            <?php if($dataPost['transactionType'] == '-1' && isset($dataPost['transactionType'])) { echo  'selected'; } ?>
                            value="-1"><?= lang('Label.lbl_statusNull') ?></option>
                        <?php
                            foreach($dataTypeTransactionFilter as $key => $transactionType): ?>
                        <option
                            <?php if($dataPost['transactionType'] == $key && isset($dataPost['transactionType'])) { echo  'selected'; } ?>
                            value="<?= $key ?>"><?= $transactionType ?></option>
                        <?php endforeach;
                        ?>
                    </select>
                </li>
                <li class="col-xl-2 col-md-3 col-6 p-xl-0 pr-md-0 pt-2 pl-md-0 pr-0">
                    <select name="type" id="" class="chosen-select type">
                        <option <?php if($dataPost['type'] == '-1' && isset($dataPost['type'])) { echo  'selected'; } ?>
                            value="-1">
                            <?= lang('Label.lbl_statusNull') ?></option>
                        <option <?php if($dataPost['type'] == '0' && isset($dataPost['type'])) { echo  'selected'; } ?>
                            value="0">
                            <?= lang('Label.lbl_status0') ?></option>
                        <option <?php if($dataPost['type'] == '1' && isset($dataPost['type'])) { echo  'selected'; } ?>
                            value="1">
                            <?= lang('Label.lbl_status1') ?></option>
                    </select>
                </li>
                <li class="col-xl-1 col-md-3 col-6 p-xl-0 pr-sm-0 p-md-0 pr-0 lsgd-search-pl">
                    <input autocomplete="off" value="<?= ($dataPost['fromDate'] ) ? $dataPost['fromDate'] : '' ?>"
                        type="text" placeholder="<?= lang('Label.lbl_fromDate') ?>" name="fromDate" style="width: 97%;"
                        class="mt-xl-0 mt-2 datePicker fromDate">
                </li>
                <li class="col-xl-1 col-md-3 col-6 p-xl-0 p-md-0 pr-0">
                    <input autocomplete="off" value="<?= ($dataPost['toDate'] ) ? $dataPost['toDate'] : '' ?>"
                        type="text" placeholder="<?= lang('Label.lbl_toDate') ?>" name="toDate"
                        class="mt-xl-0 mt-2 datePicker toDate">
                </li>
                <li class="col-xl-2 col-md-12 pr-0">
                    <button type="submit"><?= lang('Label.lbl_search') ?></button>
                </li>
            </ul>
        </div>
</form>
<?php 
  if(empty($dataWallet)){?>
<div class="bdsd-lsbd">
    <div class="ew-bd-gd">
        <table class="ew-gd-1 pl-2">
            <tr>
                <td class="ew-gd-1a textCenter fontItalic" style="width: 100%;">
                    <?= lang('Label.lbl_nullData') ?>
                </td>

            </tr>
        </table>
    </div>
</div>
<?php }else{ 
    foreach($dataWallet as $walletLog):
?>

<div class="bdsd-lsbd">
    <div class="ew-bd-gd table-responsive">
        <table class="ew-gd-1 pl-2 table table-bordered">
            <tr>
                <td class="ew-gd-1a" style="width: 20%;">
                    <?= $walletLog->code; ?>
                </td>
                <td class="ew-gd-1b" style="width: 30%;">
                    <?= date("d/m/Y H:i:s ", strtotime($walletLog->createAt)); ?>
                </td>

                <td class="ew-gd-1c" style="width: 40%;">
                    <?= lang('Label.lbl_costFee'); ?><span
                        style="color: #885DE5;"><b><?= number_format($walletLog->cost); ?></b></span> <span>đ</span>
                </td>
                <td class="ew-gd-1d" style="width: 10%;">
                    <span style="<?php
          if($walletLog->status == 0){ echo 'color: #2DB1DB;'; } else if($walletLog->status == 1 || $walletLog->status == 4 || $walletLog->status == 5){ echo 'color: #DB2D2D;'; }else if($walletLog->status == 2 || $walletLog->status == 3){ echo 'color: #F0A616;'; }
        ?>">
                        <?php echo $dataTypeTransaction[$walletLog->status]; ?>
                    </span>
                </td>

            </tr>
            <tr>
                <td class="ew-gd-1a" style="width: 20%;">
                    <?= lang('Label.lbl_money') ?> 
                    <span style="<?php if($walletLog->type == 1 || $walletLog->type == 2 || $walletLog->type == 3){ echo 'color: #2DB1DB;'; } else{  echo 'color: #DB2D2D;'; } ?>">
                        <?= ($walletLog->type == 1 || $walletLog->type == 2 || $walletLog->type == 3) ? '+' : '-'; ?>
                        <?= number_format($walletLog->changeBase); ?>
                    </span>
                    <span>đ</span>
                </td>
                <td class="ew-gd-1b" style="width: 30%;">
                    <?= lang('Label.lbl_overBalance') ?>
                    <span style="color: #F0A616;">
                        <?= number_format($walletLog->toBase); ?>
                    </span> 
                    <span>đ</span>
                </td>
                <td class="ew-gd-1c" colspan="2" style="width: 50%;">
                    <span> <?= lang('Label.lbl_transactionType') ?>
                        <?= $walletLog->reason; ?>
                    </span>
                </td>
            </tr>
        </table>

    </div>
</div>
<?php endforeach; }
    ?>

</div>
<div class="pagination" style="justify-content: flex-end;">
    <?php if ($pager) :?>
    <?=$pages?>
    <?php endif ?>
</div>
<section>
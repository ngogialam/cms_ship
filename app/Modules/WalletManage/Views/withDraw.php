<?=view('layout/bannerEwallet')?>
<!-- ===============BODY============== -->
<form action="" autocomplete="off" class="form-100" id="form-balance-fluctuations" method="POST"
  enctype="multipart/form-data">
  <div class="ew-rt">
    <div class="ew-rd-tt" style="width: 86.7%;">
      <span><?= lang('Label.lbl_infoWithDraw') ?></span>
      <ul class="row pl-0" style="list-style: none;margin-bottom: 0px;">
        <li class="col-md-6">
          <span style="color: #6E6B7B;"><?= lang('Label.lbl_balanceWithDraw') ?>:</span> <span
            style="color: #F0A616; font-weight: 500;"><?= number_format($dataBalance->withDrawBalance) ?></span> đ
        </li>
        <input type="hidden" class="remainBalance" name="remainBalance" value="<?= $dataBalance->withDrawBalance; ?>">
        <li class="col-md-6 number-with-draw-main">
          <div class="number-with-draw">
            <input type="text" list="currency" <?php echo ($dataBalance->availableBalance <= 0) ?'disabled': '' ?>
              name="amount"
              value="<?php if(isset($dataPost['amount']) && $dataPost['amount']!='' ){ echo number_format($dataPost['amount']); } ?>"
              autocomplete="off" id="NumberWithDraw" class="NumberWithDraw autocomplete w-100"
              onkeyup="generateNumberAmount()"
              oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
              placeholder="<?= lang('Label.lbl_inputBalanceWithDraw') ?>">
              <span>đ</span>
          </div>
          <span class=" err_messages err_NumberWithDraw"><?= $getErrors['amount'] ?></span>
        </li>
      </ul>
      <div class="fee-withDraw" >
        <?= lang('Label.lbl_feeTransaction') ?>: 
         <span>
          <?= ($transactionFee) ? number_format($transactionFee) : number_format(CONFIG_FEE_WITHDRAW)  ?> <span class="kndt-comment">đ</span></span>
      </div>
      <span><?= lang('Label.lbl_accountBank') ?>
        
      </span>
    </div>

    <?php if(empty($listBankCod)){?>
    <div class="info-detail-1 pb-4 w-100 ml-4">
      <ul class="ml-0 list-unstyled w-1 00"
        style="background-image:url(<?php echo base_url('public/images/thenganhang.png');?>);background-repeat: no-repeat;">
        <li style="display: flex;flex-direction: column;align-items: center;width: 350px;padding: 70px 0px;">
          <a href="<?php $lang = get_cookie('__locale'); echo base_url($lang.'/them-lien-ket/2') ?>"
            style="color: #885DE5;text-decoration: none;"><img src="<?php echo base_url('public/images/Union.png');?>"
              alt=""></a>
          <span style="padding-top: 24px;"> <a
              href="<?php $lang = get_cookie('__locale'); echo base_url($lang.'/them-lien-ket/2') ?>"
              style="color: #885DE5;text-decoration: none;"><?= lang('Label.lbl_withoutBankAccount') ?></a></span>
        </li>
        <li><span class=" err_messages err_AccountNumber"><?= $getErrors['bankId'] ?></span></li>
        <input type="hidden" name="bankId" value="">

      </ul>
    </div>
    <?php }else { ?>
    <div id="owl-partners-introduce2" class="owl-carousel owl-theme wow owl-show-connect-banks" style="width: 88%;">
      <?php foreach( $listBankCod as $key => $bankCod): ?>
      <label for="check-select-card-<?= $bankCod->id ?>" class="w-100">
        <div
          style="background-image: url(<?= base_url('public/images/Frame14.png') ?>);     background-repeat: round; cursor: pointer;">
          <div class="ew-slide" style="position: relative;">
            <span class="img-bank" style="font-size: 14px;">
              <img src="<?php echo base_url('public/images/Bank_Logos/'.$bankCod->bankShortName.'.png');?>"
                alt=""><span><?= $bankCod->bankShortName ?></span></span>
            <input type="radio"
              <?php if((isset($dataPost['bankId']) && $dataPost['bankId'] == $bankCod->id ) || $key == 0 ) echo 'checked'; ?>
              name="bankId" class="AccountNumber" id="check-select-card-<?= $bankCod->id ?>"
              value="<?= $bankCod->id ?>">
            <ul class="ul-wr mb-0">
              <li class="number-bank"><span>
                <?php echo(substr($bankCod->bankAccount, 0, 4));?> 
                <?php echo(substr($bankCod->bankAccount, 4, 4));?>
                <?php echo(substr($bankCod->bankAccount, 8, 4));?>
                <?php echo(substr($bankCod->bankAccount, 12, 4));?>
                <?php echo(substr($bankCod->bankAccount, 16, 4));?></li>
              <li class="name-bank fz14"><span><?= $bankCod->bankAccountName ?></span></li>
            </ul>
          </div>
        </div>
      </label>
      <?php endforeach; ?>

    </div>
    <span class=" err_messages err_AccountNumber"><?= $getErrors['bankId'] ?></span>

    <?php  } ?>

    <div style="width: 88%;height: 45px; padding-bottom: 68px">
      <button class="btn-perform-withdraw"><?= lang('Label.lbl_doIt') ?></button>
    </div>
  </div>
</form>


<?php
if(!empty($listBankCod)){
  $countBank = count($listBankCod);
}else{
  $countBank = 1;
}
  if($countBank == 1 ){
    ?>
<script>
let config1400 = 1;
let config1200 = 1;
let config1000 = 1;
let config800 = 1;
let config600 = 1;
let config500 = 1.5;
let config400 = 1;
let config200 = 1;
</script>
<?php }else if($countBank == 2){ ?>
<script>
let config1400 = 2;
let config1200 = 2;
let config1000 = 2;
let config800 = 2;
let config600 = 1;
let config500 = 1.5;
let config400 = 1;
let config200 = 1;
</script>
<?php }else if($countBank >= 3){ ?>
<script>
let config1400 = 3.5;
let config1200 = 2.5;
let config1000 = 2;
let config800 = 2;
let config600 = 2;
let config500 = 1.5;
let config400 = 1;
let config200 = 1;
</script>
<?php }
?>
<script>
$("#owl-partners-introduce2").owlCarousel({
  rtl: false,
  loop: false,
  stagePadding: 10,
  margin: 0,
  autoplay: false,
  autoplayHoverPause: true,
  nav: true,
  dots: false,
  responsive: {
    200: {
      items: config200
    },
    400: {
      items: config400
    },
    500: {
      items: config500
    },
    600: {
      items: config600
    },
    800: {
      items: config800
    },
    1281: {
      items: config1200
    },
    1455: {
      items: config1400
    }
  }
});
// $("#owl-partners-introduce2").on('changed.owl.carousel', function(e) {
//   var current = e.item.index + 1;
//   total = e.item.count;
//   if (current === total) {
//     setTimeout(function(){ 
//       $('#owl-partners-introduce2').trigger("to.owl.carousel", [0, 500, true]);
//     }, 3000);
//   }
// });
</script>
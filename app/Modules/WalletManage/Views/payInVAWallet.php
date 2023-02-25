<?=view('layout/bannerEwallet')?>
<!-- ===============END banner========== -->


<!-- ===============BODY============== -->
<div style="background-color: white;">
  <div class="ew-rd-tt" style="width: 100%;">
    <span><b><?= lang('Label.lbl_payIntoVA'); ?></b></span>
  </div>
  <div class="ew-vi-va">
    <ul>
      <li class="firstVa">
        <p><b><?= lang('Label.lbl_notifycation'); ?></b></p>
        <?= lang('Label.lbl_customerPls'); ?> <br>
        <?= lang('Label.lbl_payInVaToUse'); ?>
      </li>
      <?php if(!empty($dataBankVA)){ ?>
      <li id="ew-vi-va">
        <div class="ew-vi-va-card" style="background-image: url(<?php echo base_url('public/images/Frame14.png');?>);">
          <ul>
            <li class="topup-VA-img">
              <img class="bankImg" src="<?= base_url('public/images/Bank_Logos/'.$dataBankVA->bankName.'.png'); ?>"
                alt="">
              <span class="bankName"><?= $dataBankVA->bankName; ?></span>
            </li>
            <li class="topup-VA-number-card">
              <span class="shopCode">
                <?php echo(substr($dataBankVA->shopCode, 0, 4));?>
                <?php echo(substr($dataBankVA->shopCode, 4, 4));?>
                <?php echo(substr($dataBankVA->shopCode, 8, 4));?>
                <?php echo(substr($dataBankVA->shopCode, 12, 4));?>
                <?php echo(substr($dataBankVA->shopCode, 16, 4));?></span>
            </li>
            <li class="topup-VA-username">
              <span class="userBankName"> <?= $dataBankVA->userName; ?></span>
            </li>
          </ul>
        </div>
      </li>

      <li class="firstVa" style="padding-bottom: 161px;padding-top: 21px;">
        <?= lang('Label.lbl_emergancyCallToHotline'); ?> <a href=""
          style="color: #F0A616;font-weight: bold; "><?= lang('Label.lbl_hotline'); ?></a>
        <?= lang('Label.lbl_toSupport'); ?>
      </li>
      <?php }else { ?>
      <li class="frstVa">
        <span class=" err_messages err_connectVA"></span>
      </li>
      <li class="firstVa">
        <button id="ew-vi-va-btn" class="active-va"><?= lang('Label.lbl_activeVA'); ?></button>
      </li>
      <?php } ?>
    </ul>
  </div>
</div>


<section>
  <!-- 
<script>
    function noneBody() {
        document.getElementById("ew-vi-va-none").style.display = "block";
        document.getElementById("ew-vi-va-none1").style.display = "block";
        document.getElementById("ew-vi-va-btn").style.display = "none";
      
    }
</script> -->
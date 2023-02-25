<?=view('layout/bannerEwallet')?>
<!-- ===============BODY============== -->
<div class="ew-xn">
  <div class="ew-rd-tt" style="width: 90%;">
    <span><?php echo $title?></span>
    <div class="ew-otp-bd">
      <ul>
        <li> 
          <span><?= lang('Label.lbl_verifyOTP') ?></span><br>
          <?= lang('Label.lbl_postNumberPhone') ?> <?= $dataUser->phoneOTP ?>
          <input type="hidden" class="phoneOtp" name="phoneOtp" value="<?= $dataUser->phoneOTP ?>">
          <input type="hidden" class="userName" name="userName" value="<?= $dataUser->username ?>">
        </li> 
        <li>
          <input type="text" id="withDrawOtp"
            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
            placeholder="Nhập mã OTP" style="width: 45%;background-color: white;" maxlength="6">
          <p style="margin-top:10px;" class=" err_messages err_phoneOtp"><?= $getErrors['phoneOtp'] ?></p>
        </li>
        <li>
          <?= lang('Label.lbl_sendtoOTP') ?><br>
          <span id="timer"> 120s</span>
        </li>
      </ul>
      <ul>
        <li class="ew-otp-btn">
          <input type="submit" value="<?= lang('Label.lbl_reSendOTP'); ?>" disabled class="reSendOtp" disabled>
        </li>
        <script>
        var count = 120;
        var counter = setInterval(timer, 1000);
        </script>
      </ul>
    </div>
  </div>
</div>
<section>
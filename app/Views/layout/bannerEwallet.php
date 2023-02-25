<section id="ewallet">
  <div class="ewallet-banner-title notifacation-wrapper">
    <ul>
      <li>
        <img src="<?php echo base_url('public/images/Home.png');?>" alt="">
      </li>
      <li class="mt2-config title-page">
        > <span><?= lang('Label.lbl_wallet') ?> </span> > <span> <?php echo $title?></span>
      </li>
    </ul>

    <?php 
        $checkNoti = get_cookie('__withDraw');
        setcookie ("__withDraw",'',time()+ (1) , '/');
    ?>
    <div class="notification-container" id="notification-container">
      <div class="notification notification-danger">

        <?php echo lang('Label.err_'.$checkNoti); ?>
      </div>
    </div>
  </div>
  <!-- ============Banner =================-->
  <div class="ewallet-banner" style="background-image: url('<?php echo base_url('public/images/bg1.png');?>');">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 ewallet-banner-left">
          <ul>
            <li class="ewallet-banner-left-1">
              <?= lang('Label.lbl_currentBalance') ?>
            </li>
            <li class="ewallet-banner-left-2">
            <?= ($dataUser->walletInfo->W73017ed33b64273d17b85efaa30e4492->remain_balance) ? number_format($dataUser->walletInfo->W73017ed33b64273d17b85efaa30e4492->remain_balance) : 0 ?> đ
            </li>
            <li class="ewallet-banner-left-3">
              <img src="<?php echo base_url('public/images/iconBonus.png');?>" alt="">
              <b><?= ($dataUser->walletInfo->W3696c56a1836f1c2bef27f2c35e4dbe7->remain_balance) ? number_format($dataUser->walletInfo->W3696c56a1836f1c2bef27f2c35e4dbe7->remain_balance) : 0 ?></b> <?= lang('Label.lbl_pointBonus') ?>
            </li>
          </ul>
        </div>

        <div class="col-sm-6 ewallet-banner-right">
          <a href="<?php echo base_url('/rut-tien');?>">
            <button><?= lang('Label.lbl_withDraw') ?></button></a>
          <a href="<?php echo base_url('/nap-tien');?>">
            <button style="background: #2DB1DB;"><?= lang('Label.lbl_payin') ?></button></a>
        </div>
      </div>
    </div>

  </div>
  <!-- ===============END banner========== -->

  <?php if ($checkNoti) { ?>
  <script>
  $(document).ready(function() {
    $(".notification-container").fadeIn();

    // Set a timeout to hide the element again
    setTimeout(function() {
      $(".notification-container").fadeOut();
    }, 5000);
  });
  </script>
  <?php } ?>
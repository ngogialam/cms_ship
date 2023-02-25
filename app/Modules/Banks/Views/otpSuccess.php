<section id="connectbank">
  <!-- banner tài khoản -->
  <section id="info-bn">
    <div class="link-user notifacation-wrapper">
      <ul>
        <li>
          <img src="<?php echo base_url('public/images/Home.png');?>" alt="">
        </li>
        <li class="mt-1">
          > <?= lang('Label.account') ?> </a>> <span> <?= $title ?></span>
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
          <img src="<?= ($dataUser->avatar) ? $dataUser->avatar : base_url('public/assets/images/ava.png')?>" alt=""
            id="photo">
          <input type="file" id="imageFile" onchange="uploadImage()">
          <img src="<?php echo base_url('public/assets/images/ava.png');?>" id="preview" alt="" class="d-none">
          <img src="<?= base_url('public/images/iconCamera.png'); ?>" alt="" class="imgAvata-header">
          <input type="text" value="<?= ($userLogin) ? $userLogin : '' ?>" id="userLogin" class="d-none">
        </li>
      </ul>
    </div>
  </section>

  <section id="info-detail" class="row ml-0 bankSuccess">
    <div class="info-detail-1 col-md-6 cnBank-pr pl-0">
      <div>
        <ul class="list-unstyled mb-0">
          <li class="info-detail-2">
            <?= $title ?>
          </li>
          <li class="cn-otp-txt pl-0">
            <img src="<?php echo base_url('public/images/thanhcong.png');?>" alt=""><br>
            <b><?= lang('Label.lbl_notifycation') ?></b><br>
            <span><?= lang('Label.lbl_linkBankCodSuccess') ?></span><br>
            <?= lang('Label.lbl_thanks') ?>
          </li>

          <li class="pl-0" style="min-height: 200px;">
            <?php $lang = get_cookie('__locale');  ?>
            <a href="<?= base_url($lang.'/lien-ket-ngan-hang') ?>"><button
                class="cn-bank-btn text-center"><?= lang('Label.lbl_listBankCod') ?></button></a>
          </li>
        </ul>
      </div>
    </div>
    <div class="info-detail-1 pl-0 col-md-6 cnBank-pr cnBank-pt d-flex">
      <div class="w-100">
        <ul class="list-unstyled  pl-md-3">
          <li class="info-detail-2">
            <img src="<?php echo base_url('public/images/Warning1.png');?>" alt="">
            <?= lang('Label.lbl_warningToConnectBankCOD') ?>
          </li>
          <li class="cn-bank">
            <?= lang('Label.lbl_conditionToConnectBankCOD') ?>
            <ul>
              <li class="conditionBank">
                <?= lang('Label.lbl_conditionToConnectBankCOD1') ?>
              </li>
              <li class="conditionBank">
                <?= lang('Label.lbl_conditionToConnectBankCOD2') ?>
              </li>
              <li class="conditionBank">
                <?= lang('Label.lbl_conditionToConnectBankCOD3') ?>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </section>
  <section>
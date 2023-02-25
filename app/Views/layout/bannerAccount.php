<section id="info-bn">
  <div class="link-user notifacation-wrapper">
    <ul>
      <li>
        <img src="<?php echo base_url('public/images/Home.png');?>" alt="">
      </li>
      <li class="mt-1">
        > <b><?= lang('Label.lbl_account') ?> </b>> <span> <?= $title ?> </span>
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
      <li>
        <img src="<?= ($dataUserCache->avatar) ? $dataUserCache->avatar : base_url('public/assets/images/ava.png')?>"
          alt="" class="banner-user-img" id="photo" onclick="clickAddImage()">
        <input type="file" style="display: none;" id="imageFile" onchange="uploadImage()">
        <img src="<?php echo base_url('public/assets/images/ava.png');?>" id="preview" alt="" class="d-none">
        <img src="<?= base_url('public/images/iconCamera.png'); ?>" alt="" class="banner-user-img-1" style=""
          onclick="clickAddImage()">
        <input type="text" value="<?= ($userLogin) ? $userLogin : '' ?>" id="userLogin" class="d-none">
      </li>
    </ul>
  </div>
</section>
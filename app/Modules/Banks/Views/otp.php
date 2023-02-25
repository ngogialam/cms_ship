<section id="connectbank">
  <!-- banner tài khoản -->
  <section id="info-bn">
    <div class="link-user notifacation-wrapper">
      <ul>
        <li>
          <a href="" style="list-style: none;color: black;"><img src="<?php echo base_url('public/images/Home.png');?>"
              alt="">
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
            style="width: 80px; height: 80px; border-radius: 50%;" id="photo">
          <input type="file" style="display: none;" id="imageFile" onchange="uploadImage()">
          <img src="<?php echo base_url('public/assets/images/ava.png');?>" id="preview" alt="" class="d-none">
          <img src="<?= base_url('public/images/iconCamera.png'); ?>" alt=""
            style="margin-top: 55px;margin-left:-30px;">
          <input type="text" value="<?= ($userLogin) ? $userLogin : '' ?>" id="userLogin" class="d-none">
        </li>
      </ul>
    </div>
  </section>

  <section id="info-detail" class="row ml-0 bankSuccess cnBank-pr">
    <div class="info-detail-1 col-sm-6 pr-0 pl-0 ">
      <div>
        <ul class="list-unstyled">
          <li class="info-detail-2">
            <?= $title ?>
          </li>
          <li class="cn-otp-txt">
            <span>Nhập mã OTP xác thực</span><br>
            được gửi đến số 0977177380
          </li>
          <li>
            <input class="form-control frm-lg i cn-bank-op w-75" placeholder="Nhập mã OTP" style="margin: 0px auto;" />
          </li>
          <li class="cn-otp-txt1">
            Gửi lại mã OTP sau<br>
            <span>30s</span>
          </li>
          <li>
            <button class="cn-bank-btn">Gửi lại mã OTP</button>
          </li>
        </ul>
      </div>
    </div>
    <div class="info-detail-1 col-sm-6 pr-1 d-flex w-100">
      <div>
        <ul class="list-unstyled pl-3">
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
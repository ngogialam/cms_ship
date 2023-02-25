<section id="connectbank" class="mr-4 acc-info-detail">
  <!-- banner tài khoản -->
  <section id="info-bn">
    <div class="link-user">
      <ul>
        <li>
          <img src="<?php echo base_url('public/images/Home.png');?>" alt="">
        </li>
        <li class="mt-1">
          > <b><?= lang('Label.lbl_basicInformation') ?></b> >
          </a><span> <?= $title ?> </span>
        </li>
      </ul>
    </div>
    <div class="info-banner mr-0"
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

  <form action="" class="form-100 edit-account-info" id="form-user-info" method="POST" enctype="multipart/form-data">
    <section id="info-detail" class="row w-100 signature-detail">
      <div class="col-12 title-signature">
        <h3>Ký xác nhận để hoàn thành hợp đồng </h3>
      </div>

      <div class="info-detail-1 col-md-6 p-0 signature-image-left">
        <div class="h-100 pb30">
          <div class="img-signature pt-2 pb-2">
            <span>Tải ảnh chữ ký</span>
          </div>
          <div class="img-signature-2">
            <img src="<?= base_url('public/images/img-signature.svg'); ?>" alt="" class="w80">
            <img src="<?= base_url('public/images/add-img-signature.svg'); ?>" alt="" class="w80">

          </div>
        </div>
      </div>
      <div class="info-detail-1 col-md-6 pr-0">
        <div class="pb30">
          <div class="img-signature pt-2 pb-2">
            <span>Ký trực tiếp</span>
          </div>
          <div class="img-signature-2">
            <div class="w-100 img-signature-3">
            </div>

            <div class="w-100 btn-signature">
                <button type="button" class="btn-signature-xn">Xác nhận</button>
                <button type="button" class="btn-signature-kl">Ký lại</button>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-submit-signature text-center col-12">
        <button>Hoàn thành</button>
      </div>

    </section>
  </form>
  <section>
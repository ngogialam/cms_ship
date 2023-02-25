<section id="warehouse">
  <div class="warehouse-banner-title">
    <ul class="p-0">
      <li>
        <img src="<?php echo base_url('public/images/Home.png');?>" alt="">
      </li>
      <li class="mt-1">
        ><b> <?= lang('Label.lbl_ticketManage') ?> </b> ><span><?php echo $title ?></span>
      </li>
    </ul>
  </div>
</section>

<section id="complain">
  <div class="tkn-hd-add">
    <span><?= lang('Label.lbl_createTichet') ?></span>
  </div>
  <form action="">
    <div class="tkn-bd row m-0">
      <ul class="col-sm-6">
        <li>
          <?= lang('Label.lbl_codeOrders') ?><span>*</span>
        </li>
        <li>
          <input type="text" name="maDonHang" placeholder="  <?= lang('Label.lbl_codeOrdersPlh') ?>"
            class="pl-3 mt-1 mb-1">
        </li>
        <li>
          <p class="pl-2"><?= lang('Label.lbl_infoNull') ?></p>
        </li>
        <li>
          <?= lang('Label.lbl_ticketType') ?><span>*</span>
        </li>
        <li>
          <select name="" id="" class="form-select pl-3 mt-1 mb-1 chosen-select">
            <option value="">Chọn loại khiếu nại</option>
            <option value="">Khiếu nại</option>
            <option value="">Đơn hàng có vấn đề</option>
          </select>
        </li>
        <li>
          <p class="pl-2"><?= lang('Label.lbl_infoNull') ?></p>
        </li>
        <li>
          <?= lang('Label.lbl_listReason') ?><span>*</span>
        </li>
        <li>
          <select name="lyDo" id="" class="form-select pl-3 mt-1 mb-1 chosen-select">
            <option value="">Chọn lý do</option>
            <option value="">Mất hàng</option>
            <option value="">Hàng hư hỏng</option>
            <option value="">Lý do khác</option>
          </select>
        </li>
        <li>
          <p class="pl-2"><?= lang('Label.lbl_infoNull') ?></p>
        </li>
      </ul>

      <!-- right -->
      <ul class="col-sm-6">
        <li>
          <?= lang('Label.lbl_descriptionDetail') ?>
        </li>
        <li>
          <textarea name="moTa" id="" cols="30" rows="10" placeholder=" <?= lang('Label.lbl_importContent') ?>"
            class="h-10 pl-3 mt-1 mb-1"></textarea>
        </li>
        <li>
          <?= lang('Label.lbl_chooseImage') ?>
        </li>
        <li class="row">
          <ul class="col-md-3 col-6 list-unstyled">
            <img src="<?php echo base_url('public/images/image.png');?>" alt="">
            <img src="<?php echo base_url('public/images/Group178.png');?>" alt=""
              class="position-absolute kn-right-after">
          </ul>
          <ul class="col-md-3 col-6 list-unstyled">

            <img src="<?php echo base_url('public/images/btn.png');?>" alt="">

          </ul>
          <ul class="col-md-3 col-6 list-unstyled">

            <img src="<?php echo base_url('public/images/btn.png');?>" alt="">

          </ul>

          <ul class="col-md-3 col-6 list-unstyled">

            <img src="<?php echo base_url('public/images/btn.png');?>" alt="">

          </ul>
        </li>
      </ul>
      <!-- ============== -->
      <ul class="col-md-8 col-sm-6"></ul>
      <ul class="col-md-2 col-sm-3 col-6">
        <li>
          <button class="w-100 tkn-btn-1"> <?= lang('Label.lbl_btnCancel') ?></button>
        </li>
      </ul>
      <ul class="col-md-2 col-sm-3 col-6">
        <li>
          <button class="w-100 tkn-btn-2"><?= lang('Label.lbl_sendTicket') ?></button>
        </li>
      </ul>
    </div>
  </form>
</section>
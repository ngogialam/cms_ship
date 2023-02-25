<section id="warehouse">
  <div class="warehouse-banner-title">
    <ul class="p-0">
      <li>
        <img src="<?php echo base_url('public/images/Home.png');?>" alt="">
      </li>
      <li class="mt-1">
        ><b> <?= lang('Label.lbl_ticketManage') ?> </b>> <span><?php echo $title ?></span>
      </li>
    </ul>
  </div>
</section>

<section id="listcomplain">

  <!-- Chưa có khiếu nại -->
  <div class="kkn pt-3 d-none">
    <ul class="pl-3">
      <li style="color: #885DE5;font-weight: 500;">
        <?php echo $title ?>
      </li>
    </ul>
    <ul style="display: flex;flex-direction: column;align-items: center;">
      <li>
        <img src="<?php echo base_url('public/images/icon_image.png');?>" alt="">
      </li>
      <li>
        <b><?= lang('Label.lbl_noTicket') ?> </b>
      </li>
      <li>
        <span><?= lang('Label.lbl_noTicketDetail') ?></span>
      </li>
      <li>
        <a href="<?php echo base_url('/tao-khieu-nai');?>"><button><?= lang('Label.lbl_sendTicket') ?></button></a>
      </li>
    </ul>
  </div>
  <!-- ======================= -->




  <!-- Tiêu đề + button gửi khiếu nại -->
  <div class="dskn-hd  pt-3  row">
    <ul class="col-6">
      <li>
        <?php echo $title ?>
      </li>
    </ul>
    <ul class="dskn-btn-1 col-6">
      <li>
        <button class="float-right mr-3"><?= lang('Label.lbl_sendTicket') ?></button>
      </li>
    </ul>
    <ul class="col-12 ">
      <li class="dskn-boder-bot mr-3"></li>
    </ul>
  </div>
  <!-- =============== -->


  <!-- filter khiếu nại -->
  <form class="" action="">
    <div class="dskn-filter row pr-3">
      <ul class="col-sm-4 col-6">
        <li>
          <?= lang('Label.lbl_processingStatus') ?>
        </li>
      </ul>
      <ul class="col-sm-8 col-6">
        <li>
          <?= lang('Label.lbl_ticketType') ?>
        </li>
      </ul>
      <ul class="col-sm-4  pr-sm-0 col-6">
        <li>
          <select name="status" id="" class="pl-2 chosen-select">
            <option value=""> <?= lang('Label.lbl_statusNull') ?></option>
            <option value=""> <?= lang('Label.lbl_notReceivedYet') ?></option>
            <option value=""> <?= lang('Label.lbl_typeTransaction2') ?></option>
            <option value=""> <?= lang('Label.lbl_processed') ?></option>
          </select>
        </li>
      </ul>
      <ul class="col-sm-4 pr-sm-0 pl-sm-1 col-6">
        <li>
          <select name="category " id="" class="pl-2 chosen-select">
            <option value=""> <?= lang('Label.lbl_statusNull') ?></option>
            <option value=""> <?= lang('Label.lbl_notReceivedYet') ?></option>
            <option value=""> <?= lang('Label.lbl_typeTransaction2') ?></option>
            <option value=""> <?= lang('Label.lbl_processed') ?></option>
          </select>
        </li>
      </ul>
      <ul class="col-sm-2 pr-sm-0 pl-sm-1 col-6">
        <li>
          <input type="text" class="datePicker pl-2 " placeholder="<?= lang('Label.lbl_fromDate') ?>" name="since"
            class="pl-2">
        </li>
      </ul>
      <ul class="col-sm-2 pl-sm-1 col-6">
        <li>
          <input type="text" class="datePicker pl-2" placeholder="<?= lang('Label.lbl_toDate') ?>" class="pl-2">
        </li>
      </ul>
      <ul class="col-sm-10 pr-sm-0 ">
        <li class="d-flex">
          <input type="search" placeholder="<?= lang('Label.lbl_codeOrdersPlh') ?>" class="pl-2"> <img
            src="<?php echo base_url('public/images/iconSearch.png');?>" alt="">
        </li>
      </ul>
      <ul class="col-sm-2 pl-sm-1">
        <li>
          <button><?= lang('Label.lbl_unfiltered') ?></button>
        </li>
      </ul>
    </div>
  </form>
  <!-- ================ -->


  <!-- Danh Sách khiếu lại -->
  <div class="dskn-bd ml-3 mr-3">
    <div class="dskn-kn-1 mb-2">
      <ul class="row pt-2 mb-1">
        <li class="col-md-2">
          <b>TK00001399844</b>
        </li>
        <li class="col-md-8">
          27/04/2021 18:09:22
        </li>
        <li class="col-md-2 dskn-qltt">
          <?= lang('Label.lbl_notReceivedYet') ?>
        </li>
      </ul>
      <ul class="row mb-1">
        <li class="col-md-2">
          <?= lang('Label.lbl_ticketType') ?>
        </li>
        <li class="col-md-10">
          <span>Lỗi kỹ thuật</span> - Hệ thống không báo trạng thái đơn không cập nhật được
        </li>
      </ul>
      <ul class="row ">
        <li class="col-md-2">
          <?= lang('Label.lbl_codeOrdersPlh') ?>
        </li>
        <li class="col-md-8">
          <span>S10724276.B.MB26.K1.D.12.87414502</span>
        </li>
        <li class="col-md-2 dskn-qltt">
          <a href="<?php echo base_url('/sua-khieu-nai');?>"><img src="<?php echo base_url('public/images/edit.png');?>"
              alt=""></a>
          <img src="<?php echo base_url('public/images/iconTrash.png');?>" alt="">
        </li>
      </ul>
    </div>
    <div class="dskn-kn-1 mb-2">
      <ul class="row pt-2 mb-1">
        <li class="col-md-2">
          <b>TK00001399844</b>
        </li>
        <li class="col-md-8">
          27/04/2021 18:09:22
        </li>
        <li class="col-md-2 dskn-qltt">
          <?= lang('Label.lbl_notReceivedYet') ?>
        </li>
      </ul>
      <ul class="row mb-1">
        <li class="col-md-2">
          <?= lang('Label.lbl_ticketType') ?>
        </li>
        <li class="col-md-10">
          <span>Lỗi kỹ thuật</span> - Hệ thống không báo trạng thái đơn không cập nhật được
        </li>
      </ul>
      <ul class="row ">
        <li class="col-md-2">
          <?= lang('Label.lbl_codeOrdersPlh') ?>
        </li>
        <li class="col-md-8">
          <span>S10724276.B.MB26.K1.D.12.87414502</span>
        </li>
        <li class="col-md-2 dskn-qltt">
          <a href="<?php echo base_url('/sua-khieu-nai');?>"><img src="<?php echo base_url('public/images/edit.png');?>"
              alt=""></a>
          <img src="<?php echo base_url('public/images/iconTrash.png');?>" alt="">
        </li>
      </ul>
    </div>
    <div class="dskn-kn-1 mb-2">
      <ul class="row pt-2 mb-1">
        <li class="col-md-2 ">
          <b>TK00001399844</b>
        </li>
        <li class="col-md-8">
          27/04/2021 18:09:22
        </li>
        <li class="col-md-2 dskn-qltt">
          <?= lang('Label.lbl_notReceivedYet') ?>
        </li>
      </ul>
      <ul class="row mb-1">
        <li class="col-md-2">
          <?= lang('Label.lbl_ticketType') ?>
        </li>
        <li class="col-md-10">
          <span>Lỗi kỹ thuật</span> - Hệ thống không báo trạng thái đơn không cập nhật được
        </li>
      </ul>
      <ul class="row ">
        <li class="col-md-2">
          <?= lang('Label.lbl_codeOrdersPlh') ?>
        </li>
        <li class="col-md-8">
          <span>S10724276.B.MB26.K1.D.12.87414502</span>
        </li>
        <li class="col-md-2 dskn-qltt">
          <a href="<?php echo base_url('/sua-khieu-nai');?>"><img src="<?php echo base_url('public/images/edit.png');?>"
              alt=""></a>
          <img src="<?php echo base_url('public/images/iconTrash.png');?>" alt="">
        </li>
      </ul>
    </div>
    <div class="dskn-kn-1 mb-2">
      <ul class="row pt-2 mb-1">
        <li class="col-md-2">
          <b>TK00001399844</b>
        </li>
        <li class="col-md-8">
          27/04/2021 18:09:22
        </li>
        <li class="col-md-2 dskn-qltt">
          <?= lang('Label.lbl_notReceivedYet') ?>
        </li>
      </ul>
      <ul class="row mb-1">
        <li class="col-md-2">
          <?= lang('Label.lbl_ticketType') ?>
        </li>
        <li class="col-md-10">
          <span>Lỗi kỹ thuật</span> - Hệ thống không báo trạng thái đơn không cập nhật được
        </li>
      </ul>
      <ul class="row ">
        <li class="col-md-2">
          <?= lang('Label.lbl_codeOrdersPlh') ?>
        </li>
        <li class="col-md-8">
          <span>S10724276.B.MB26.K1.D.12.87414502</span>
        </li>
        <li class="col-md-2 dskn-qltt">
          <a href="<?php echo base_url('/sua-khieu-nai');?>"><img src="<?php echo base_url('public/images/edit.png');?>"
              alt=""></a>
          <img src="<?php echo base_url('public/images/iconTrash.png');?>" alt="">
        </li>
      </ul>
    </div>
    <div class="dskn-kn-1 mb-2">
      <ul class="row pt-2 mb-1">
        <li class="col-md-2">
          <b>TK00001399844</b>
        </li>
        <li class="col-md-8">
          27/04/2021 18:09:22
        </li>
        <li class="col-md-2 dskn-qltt">
          <?= lang('Label.lbl_notReceivedYet') ?>
        </li>
      </ul>
      <ul class="row mb-1">
        <li class="col-md-2">
          <?= lang('Label.lbl_ticketType') ?>
        </li>
        <li class="col-md-10">
          <span>Lỗi kỹ thuật</span> - Hệ thống không báo trạng thái đơn không cập nhật được
        </li>
      </ul>
      <ul class="row ">
        <li class="col-md-2">
          <?= lang('Label.lbl_codeOrdersPlh') ?>
        </li>
        <li class="col-md-8">
          <span>S10724276.B.MB26.K1.D.12.87414502</span>
        </li>
        <li class="col-md-2 dskn-qltt">
          <a href="<?php echo base_url('/sua-khieu-nai');?>"><img src="<?php echo base_url('public/images/edit.png');?>"
              alt=""></a>
          <img src="<?php echo base_url('public/images/iconTrash.png');?>" alt="">
        </li>
      </ul>
    </div>
    <div class="dskn-kn-1 mb-2">
      <ul class="row pt-2 mb-1">
        <li class="col-md-2">
          <b>TK00001399844</b>
        </li>
        <li class="col-md-8">
          27/04/2021 18:09:22
        </li>
        <li class="col-md-2 dskn-qltt">
          <?= lang('Label.lbl_notReceivedYet') ?>
        </li>
      </ul>
      <ul class="row mb-1">
        <li class="col-md-2">
          <?= lang('Label.lbl_ticketType') ?>
        </li>
        <li class="col-md-10">
          <span>Lỗi kỹ thuật</span> - Hệ thống không báo trạng thái đơn không cập nhật được
        </li>
      </ul>
      <ul class="row ">
        <li class="col-md-2">
          <?= lang('Label.lbl_codeOrdersPlh') ?>
        </li>
        <li class="col-md-8">
          <span>S10724276.B.MB26.K1.D.12.87414502</span>
        </li>
        <li class="col-md-2 dskn-qltt">
          <a href="<?php echo base_url('/sua-khieu-nai');?>"><img src="<?php echo base_url('public/images/edit.png');?>"
              alt=""></a>
          <img src="<?php echo base_url('public/images/iconTrash.png');?>" alt="">
        </li>
      </ul>
    </div>
  </div>
</section>
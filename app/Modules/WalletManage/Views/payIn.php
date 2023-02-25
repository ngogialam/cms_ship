<?=view('layout/bannerEwallet')?>

<!-- ================No Account======== -->
<div class="payin-home" >
  <div class="ew-rd-tt w-100">
    <b> <span> <?= lang('Label.lbl_typePayIn'); ?></span></b>
  </div>
  <div class="ew-nt-bd">
    <div class="row">
      <div class="col-md-4">
        <a href="<?php echo base_url('/nap-tien-vi-VA');?>">
          <div class="ew-nt-bd1">
            <ul>
              <li>
                <img src="<?php echo base_url('public/images/ew-nt1.png');?>" alt="">
              </li>
              <li>
                <?= lang('Label.lbl_payIntoVA'); ?>
              </li>
            </ul>
          </div>
        </a>
      </div>
      <!-- <div class="col-md-4">
        <?php //echo base_url('/nap-tien-vi-Imedia');?>
        <a href="javascript:void(0)">
          <div class="ew-nt-bd1">
            <ul>
              <li>
                <img src="<?php echo base_url('public/images/ew-nt2.png');?>" alt="">
              </li>
              <li>
                <?= lang('Label.lbl_payinViaImedia'); ?>
              </li>
            </ul>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <?php //echo base_url('/nap-tien-dt');?>
        <a href="javascript:void(0)">
          <div class="ew-nt-bd1">
            <ul>
              <li>
                <img src="<?php echo base_url('public/images/ew-nt3.png');?>" alt="">
              </li>
              <li>
                <?= lang('Label.lbl_payinViaBankAccount'); ?>
              </li>
            </ul>
          </div>
        </a>
      </div> -->
    </div>
  </div>
</div>
<section>
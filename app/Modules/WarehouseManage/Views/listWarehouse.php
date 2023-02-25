<section id="warehouse">
  <div class="warehouse-banner-title notifacation-wrapper">
    <ul class="pl-0">
      <li>
        <img src="<?php echo base_url('public/images/Home.png'); ?>" alt="">
      </li>
      <li class="mt-1">
        ><b> <?= lang('Label.lbl_warehouse') ?> </b>> <span><?php echo $title ?></span>
      </li>
    </ul>

    <?php
    $checkNoti = get_cookie('__updateNoti');
    setcookie("__updateNoti", '', time() + (1), '/');
    ?>
    <div class="notification-container" id="notification-container">
      <div class="
            <?php
            if ($checkNoti == 'success') {
              echo 'notification notification-info';
            } else if ($checkNoti == 'false') {
              echo 'notification notification-danger';
            }
            ?>
         ">

        <?php
        if ($checkNoti == 'success') {
          echo lang('Label.lbl_updateSuccess');
        } else if ($checkNoti == 'false') {
          echo lang('Label.lbl_updateFalse');
        } ?>
      </div>

      <!-- <div class="notification notification-danger">
            <strong>Danger:</strong> Lorem ipsum dolor sit amet consectetur.
        </div> -->
    </div>
  </div>

  <div class="warehose-bd">
    <div class="wh-tl">
      <ul>
        <li style="padding-top: 10px;">
          <span class="add-warehouse-all">
            <a href="<?php echo base_url('them-kho-hang'); ?>">
              <img src="<?php echo base_url('public/images/Union.svg'); ?>" alt="">
              <span><?= lang('Label.lbl_newAddress') ?></span></a>
          </span>
          <select class="wh-tl-select statusWareHouse">
            <option <?= ($status == 1) ? 'selected' : '' ?> value="1">
              <?= lang('Label.lbl_wareHouseIsActive'); ?></option>
            <option <?= ($status == 0) ? 'selected' : '' ?> value="0">
              <?= lang('Label.lbl_wareHouseIsNotActive'); ?></option>
          </select>
        </li>
      </ul>
    </div>

    <?php
    if (empty($listWareHouse) && empty($primaryWarehouse) && $countWarehouse == 0) {
    ?>
      <div class="wh-kh-null">
        <ul>
          <li>
            <b><?= lang('Label.lbl_notifycation'); ?></b>
          </li>
          <li style="font-size: 13px;color: #514D5B;font-weight: 400;">
            <?= lang('Label.lbl_dontHaveWarehouse'); ?>
          </li>
          <li>
            <img src="<?php echo base_url('public/images/wh.png'); ?>" alt="">
          </li>
          <li>
            <a href="<?php echo base_url('/them-kho-hang'); ?>"><button><?= lang('Label.lbl_createWarehouse') ?></button></a>
          </li>
        </ul>
      </div>
    <?php } else if (empty($listWareHouse) && empty($primaryWarehouse) && $countWarehouse != 0) { ?>
      <div class="wh-kh-null">
        <ul>
          <li style="font-size: 13px;color: #514D5B;font-weight: 400;">
            <?= lang('Label.lbl_nullHaveWarehouse'); ?>
          </li>
        </ul>
      </div>
      <?php  } else {
      $lang = get_cookie('__locale');
      // Check main Warehouse
      if (!empty($primaryWarehouse)) {
      ?>
        <a class="hover-none" href="<?= base_url($lang . '/cap-nhat-kho-hang/' . $primaryWarehouse[0]->id); ?>" ?>
          <div class="wh-kh1 row">
            <ul class="col-sm-12">
              <li>
                <?= ($primaryWarehouse[0]->isDefault) ? lang('Label.lbl_isDefault') : lang('Label.lbl_isNotDefault') ?>
              </li>
            </ul>
            <ul class="wh-kh1-tl col-sm-4">
              <li class="ml-1">
                <img src="<?php echo base_url('public/images/wh-kh1a.png'); ?>" alt="">
              </li>
              <li>
                <?= $primaryWarehouse[0]->name; ?>
              </li>
            </ul>
            <ul class="wh-kh1-tl col-sm-4">
              <li>
                <img src="<?php echo base_url('public/images/wh-kh1b.png'); ?>" alt="">
              </li>
              <li>
                <?= $primaryWarehouse[0]->senderName; ?>
              </li>
            </ul>
            <ul class="wh-kh1-tl col-sm-4">
              <li>
                <img src="<?php echo base_url('public/images/wh-kh1c.png'); ?>" alt="">
              </li>
              <li>
                <?= $primaryWarehouse[0]->phone; ?>
              </li>
            </ul>
            <ul class="wh-kh1-tl col-sm-12">
              <li>
                <img src="<?php echo base_url('public/images/wh-kh1d.png'); ?>" alt="">
              </li>
              <li>

                <?php
                echo ($primaryWarehouse[0]->address) ? $primaryWarehouse[0]->address . ', ' : '';
                echo ($primaryWarehouse[0]->wardName) ? $primaryWarehouse[0]->wardName . ', ' : '';
                echo ($primaryWarehouse[0]->districtName) ? $primaryWarehouse[0]->districtName . ', ' : '';
                echo ($primaryWarehouse[0]->provinceName) ? $primaryWarehouse[0]->provinceName  : '';
                ?>
              </li>
            </ul>
          </div>
        </a>
      <?php
      }
      foreach ($listWareHouse as $wareHouse) {
      ?>
        <a class="hover-none" href="<?= base_url($lang . '/cap-nhat-kho-hang/' . $wareHouse->id); ?>" ?>
          <div class="wh-kh1 row">
            <ul class="col-sm-12">
              <li>
                <?= ($wareHouse->isDefault) ? lang('Label.lbl_isDefault') : lang('Label.lbl_isNotDefault') ?>
              </li>
            </ul>
            <ul class="wh-kh1-tl col-sm-4">
              <li class="ml-1">
                <img src="<?php echo base_url('public/images/wh-kh1a.png'); ?>" alt="">
              </li>
              <li>
                <?= $wareHouse->name; ?>
              </li>
            </ul>
            <ul class="wh-kh1-tl col-sm-4">
              <li>
                <img src="<?php echo base_url('public/images/wh-kh1b.png'); ?>" alt="">
              </li>
              <li>
                <?= $wareHouse->senderName; ?>
              </li>
            </ul>
            <ul class="wh-kh1-tl col-sm-4">
              <li>
                <img src="<?php echo base_url('public/images/wh-kh1c.png'); ?>" alt="">
              </li>
              <li>
                <?= $wareHouse->phone; ?>
              </li>
            </ul>
            <ul class="wh-kh1-tl col-sm-12">
              <li>
                <img src="<?php echo base_url('public/images/wh-kh1d.png'); ?>" alt="">
              </li>
              <li>
                <?php
                echo ($wareHouse->address) ? $wareHouse->address . ', ' : '';
                echo ($wareHouse->wardName) ? $wareHouse->wardName . ', ' : '';
                echo ($wareHouse->districtName) ? $wareHouse->districtName . ', ' : '';
                echo ($wareHouse->provinceName) ? $wareHouse->provinceName  : '';
                ?>
              </li>
            </ul>
          </div>
        </a>
    <?php }?> 
    <div class="pagination 111" style="justify-content: flex-end;">
            <?php if ($pager): ?>
            <?=$pages?>
            <?php endif?>
        </div>
    <?php 
    } ?>
  </div>

</section>


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
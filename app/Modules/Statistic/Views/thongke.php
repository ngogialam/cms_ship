<!-- TRANG THỐNG KÊ
    ====== An Tú DEV =========
-->
<section id="warehouse">
  <div class="warehouse-banner-title">
    <ul class="p-0">
      <li>
        <img src="<?php echo base_url('public/images/Home.png');?>" alt="">

      </li>
      <li class="mt-1">
        > <span><?php echo $title ?></span>
      </li>
    </ul>
  </div>
</section>

<section id="statistic">
  <div class="row m-0">
    <!-- Tiêu đề  + filter -->
    <div class="col-md-3 stt-title">
      <span><?= lang('Label.lbl_txtReportOrders')?></span>
    </div>
    <div class="col-md-9 row pl-0 pr-0">
      <div class="col-md-6 stt-title-1">
        <select name="" id="" class="chosen-select w-100">
          <option value=""><?= lang('Label.lbl_statusNull')?></option>
          <option value=""><?= lang('Label.lbl_sltsingleQuantityKm')?></option>
          <option value=""><?= lang('Label.lbl_sltsingleQuantityDg')?> </option>
        </select>
      </div>
      <div class="col-md-6 d-flex stt-title-2 w-100">
        <div class="lsod-filter-1">
          <input type="text" class="datePicker text-center" placeholder="<?= lang('Label.lbl_chooseDate')?>">
        </div>
        <div class="stt-title-4">
          <?= lang('Label.lbl_txtTo')?>
        </div>
        <div class="lsod-filter-1">
          <input type="text" class="datePicker text-center" placeholder="<?= lang('Label.lbl_chooseDate')?>">
        </div>
        <div class="stt-title-3">
          <button type="button" class="stt-title-3"><?= lang('Label.lbl_txtShow')?></button>
        </div>
      </div>
    </div>
    <!-- =================== -->

    <!-- Tổng thống kê -->
    <div class="col-sm-3 pl-0">
      <div class="stt-listStatistic stt-listStatistic-1 row ml-0 mr-0">
        <div class="col-md-3 stt-listStatistic-1-1"><img src="<?php echo base_url('public/images/carton-box2.png');?>"
            alt=""></div>
        <div class="col-md-3 stt-listStatistic-1-2 "><img src="<?php echo base_url('public/images/carton-box22.png');?>"
            alt=""></div>
        <div class="col-md-7"><span> <?= lang('Label.lbl_quantityOrder')?><br>41,500</span></div>
      </div>
    </div>
    <div class="col-sm-3 pl-0">
      <div class="stt-listStatistic stt-listStatistic-2 row ml-0 mr-0">
        <div class="col-md-3 stt-listStatistic-2-1"><img src="<?php echo base_url('public/images/carton-box3.png');?>"
            alt=""></div>
        <div class="col-md-3 stt-listStatistic-2-2"><img src="<?php echo base_url('public/images/carton-box33.png');?>"
            alt=""></div>
        <div class="col-md-7"><span> <?= lang('Label.lbl_quantityCOD')?> <br>520,240,500,000</span></div>
      </div>
    </div>
    <div class="col-sm-3 pl-0">
      <div class="stt-listStatistic stt-listStatistic-3 row ml-0 mr-0">
        <div class="col-md-3 stt-listStatistic-3-1"><img src="<?php echo base_url('public/images/carton-box4.png');?>"
            alt=""></div>
        <div class="col-md-3 stt-listStatistic-3-2"><img src="<?php echo base_url('public/images/carton-box44.png');?>"
            alt=""></div>
        <div class="col-md-7"><span> <?= lang('Label.lbl_feeShip')?><br> 89,020,050</span></div>
      </div>
    </div>
    <div class="col-sm-3 pl-0">
      <div class="stt-listStatistic stt-listStatistic-4 row ml-0 mr-0">
        <div class="col-md-3 stt-listStatistic-4-1"><img src="<?php echo base_url('public/images/carton-box5.png');?>"
            alt=""></div>
        <div class="col-md-3 stt-listStatistic-4-2"><img src="<?php echo base_url('public/images/carton-box55.png');?>"
            alt=""></div>
        <div class="col-md-7"><span> <?= lang('Label.lbl_deliverySuccessRate')?><br>98%</span></div>
      </div>
    </div>

    <!-- ================== -->


    <div class="col-md-3 pl-0">
      <div class="statistic-topSucc">
        <div class="statistic-topSucc-1">
          <span><?= lang('Label.lbl_topShipFalse')?></span>
        </div>
        <!-- top1 -->
        <div class="row statistic-topSucc-4 w-100">
          <div class="col-md-2 text-center">
            <img src="<?php echo base_url('public/images/thongke1.png');?>" alt="">
          </div>
          <div class="col-md-5 col-6 text-center">
            <span class="statistic-topSucc-2 ">Hà nội</span>
          </div>
          <div class="col-md-5 col-6 stt-value-order">
            <div class="d-flex float-right">
              <span class="statistic-topSucc-3">1200</span>

            </div>
          </div>
        </div>

        <!-- top2-->
        <div class="row statistic-topSucc-4 w-100">
          <div class="col-md-2 text-center">
            <img src="<?php echo base_url('public/images/thongke2.png');?>" alt="">
          </div>
          <div class="col-md-5 col-6 text-center">
            <span class="statistic-topSucc-2 ">Hà nội</span>
          </div>
          <div class="col-md-5 col-6 stt-value-order">
            <div class="d-flex float-right">
              <span class="statistic-topSucc-3">1200</span>

            </div>
          </div>
        </div>

        <!-- top3 -->
        <div class="row statistic-topSucc-4 w-100">
          <div class="col-md-2 text-center">
            <img src="<?php echo base_url('public/images/thongke3.png');?>" alt="">
          </div>
          <div class="col-md-5 col-6 text-center">
            <span class="statistic-topSucc-2 ">Hà nội</span>
          </div>
          <div class="col-md-5 col-6 stt-value-order">
            <div class="d-flex float-right">
              <span class="statistic-topSucc-3">1200</span>

            </div>
          </div>
        </div>

        <!-- top4 -->
        <div class="row statistic-topSucc-4 w-100">
          <div class="col-md-2 text-center">
            <img src="<?php echo base_url('public/images/thongke4.png');?>" alt="">
          </div>
          <div class="col-md-5 col-6 text-center">
            <span class="statistic-topSucc-2 ">Hà nội</span>
          </div>
          <div class="col-md-5 col-6 stt-value-order">
            <div class="d-flex float-right">
              <span class="statistic-topSucc-3">1200</span>

            </div>
          </div>
        </div>

        <!-- top5 -->
        <div class="row statistic-topSucc-4 w-100">
          <div class="col-md-2 text-center">
            <img src="<?php echo base_url('public/images/thongke5.png');?>" alt="">
          </div>
          <div class="col-md-5 col-6 text-center">
            <span class="statistic-topSucc-2 ">Hà nội</span>
          </div>
          <div class="col-md-5 col-6 stt-value-order">
            <div class="d-flex float-right">
              <span class="statistic-topSucc-3">1200</span>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 pl-0">
      <div class="statistic-topSucc">
        <div class="statistic-topSucc-1">
          <span><?= lang('Label.lbl_topShipFalse')?></span>
        </div>
        <!-- top1 -->
        <div class="row statistic-topSucc-4 w-100">
          <div class="col-md-2 text-center">
            <img src="<?php echo base_url('public/images/thongke1.png');?>" alt="">
          </div>
          <div class="col-md-5 col-6 text-center">
            <span class="statistic-topSucc-2 ">Hà nội</span>
          </div>
          <div class="col-md-5 col-6 stt-value-order">
            <div class="d-flex float-right">
              <span class="statistic-topSucc-3">1200</span>
              <img src="<?php echo base_url('public/images/info1.svg');?>" class="statistic-show-info" alt="">
            </div>
          </div>
        </div>

        <!-- top2-->
        <div class="row statistic-topSucc-4 w-100">
          <div class="col-md-2 text-center">
            <img src="<?php echo base_url('public/images/thongke2.png');?>" alt="">
          </div>
          <div class="col-md-5 col-6 text-center">
            <span class="statistic-topSucc-2 ">Hà nội</span>
          </div>
          <div class="col-md-5 col-6 stt-value-order">
            <div class="d-flex float-right">
              <span class="statistic-topSucc-3">1200</span>
              <img src="<?php echo base_url('public/images/info1.svg');?>" class="statistic-show-info" alt="">
            </div>
          </div>
        </div>

        <!-- top3 -->
        <div class="row statistic-topSucc-4 w-100">
          <div class="col-md-2 text-center">
            <img src="<?php echo base_url('public/images/thongke3.png');?>" alt="">
          </div>
          <div class="col-md-5 col-6 text-center">
            <span class="statistic-topSucc-2 ">Hà nội</span>
          </div>
          <div class="col-md-5 col-6 stt-value-order">
            <div class="d-flex float-right">
              <span class="statistic-topSucc-3">1200</span>
              <img src="<?php echo base_url('public/images/info1.svg');?>" class="statistic-show-info" alt="">
            </div>
          </div>
        </div>

        <!-- top4 -->
        <div class="row statistic-topSucc-4 w-100">
          <div class="col-md-2 text-center">
            <img src="<?php echo base_url('public/images/thongke4.png');?>" alt="">
          </div>
          <div class="col-md-5 col-6 text-center">
            <span class="statistic-topSucc-2 ">Hà nội</span>
          </div>
          <div class="col-md-5 col-6 stt-value-order">
            <div class="d-flex float-right">
              <span class="statistic-topSucc-3">1200</span>
              <img src="<?php echo base_url('public/images/info1.svg');?>" class="statistic-show-info" alt="">
            </div>
          </div>
        </div>

        <!-- top5 -->
        <div class="row statistic-topSucc-4 w-100">
          <div class="col-md-2 text-center">
            <img src="<?php echo base_url('public/images/thongke5.png');?>" alt="">
          </div>
          <div class="col-md-5 col-6 text-center">
            <span class="statistic-topSucc-2 ">Hà nội</span>
          </div>
          <div class="col-md-5 col-6 stt-value-order">
            <div class="d-flex float-right">
              <span class="statistic-topSucc-3">1200</span>
              <img src="<?php echo base_url('public/images/info1.svg');?>" class="statistic-show-info" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 pl-0 stt-chart">
      <div>
        <canvas id="myChart" class="w-100"></canvas>
      </div>
    </div>


  </div>
  <div class="col-12 pl-0 lsod-menu-1" id="listOders">
    <!--================ Menu  ======================== -->
    <!-- menu1 -->
    <div class="listOders-menu-dt listOders-menu-dt-default mt-2 ml-0">
      <ul class="row list-unstyled mb-0">
        <li class="col-md-2 col-sm-4 col-6">
          Tất cả <span class="span-detail-list"> 50000</span>
        </li>
        <li class="col-md-2 col-sm-4 col-6">
          Chờ duyệt<span class="span-detail-list"> 50000</span>
        </li>
        <li class="col-md-2 col-sm-4 col-6">
          Chờ lấy <span class="span-detail-list"> 50000</span>
        </li>
        <li class="col-md-2 col-sm-4 col-6">
          Đang giao <span class="span-detail-list"> 50000</span>
        </li>
        <li class="col-md-2 col-sm-4 col-6">
          Chờ hoàn <span class="span-detail-list"> 50000</span>
        </li>
        <li class="col-md-2 col-sm-4 col-6 lstOrder-btn-showFilter" onclick="showMenuFilter1()">
          Mở rộng<img src="<?php echo base_url('public/images/iconDownx.svg');?>" class="float-right pt-2 pr-2">
        </li>
      </ul>
    </div>

    <!-- menu2 -->
    <div class="listOders-menu-dt listOders-menu-dt-show mt-2 ml-0">
      <!-- dòng 1 -->
      <ul class="row list-unstyled mb-0">
        <li class="col-md-2 col-sm-4 col-6">
          Tất cả <span class="span-detail-list"> 50000</span>
        </li>
        <li class="col-md-2 col-sm-4 col-6">
          Chờ duyệt <span class="span-detail-list"> 50000</span>
        </li>
        <li class="col-md-2  col-sm-4 col-6">
          Chờ lấy <span class="span-detail-list"> 50000</span>
        </li>
        <li class="col-md-2  col-sm-4 col-6">
          Lấy thất bai <span class="span-detail-list"> 50000</span>
        </li>
        <li class="col-md-2  col-sm-4 col-6">
          Lưu kho <span class="span-detail-list"> 50000</span>
        </li>
        <li class="col-md-2  col-sm-4 col-6">
          Tất cả <span class="span-detail-list"> 50000</span>
        </li>
      </ul>

      <!-- Dòng 2 -->
      <ul class="row list-unstyled mb-0 listOders-hover-menu">
        <li class="col-md-2  col-sm-4 col-6">
          Đang giao <span class="span-detail-list"> 50000</span>
        </li>
        <li class="col-md-2  col-sm-4 col-6">
          Giao thất bại <span class="span-detail-list"> 50000</span>
        </li>
        <li class="col-md-2  col-sm-4 col-6">
          Delay giao <span class="span-detail-list"> 50000</span>
        </li>
        <li class="col-md-2  col-sm-4 col-6">
          Chờ hoàn <span class="span-detail-list"> 50000</span>
        </li>
        <li class="col-md-2 col-sm-4 col-6">
          Giao thành công <span class="span-detail-list"> 50000</span>
        </li>
        <li class="col-md-2 col-sm-4 col-6">
          Tất cả <span class="span-detail-list"> 50000</span>
        </li>
      </ul>

      <!-- Dòng 3 -->
      <ul class="row list-unstyled mb-0">
        <li class="col-md-2 col-sm-4 col-6">
          Chờ huỷ <span class="span-detail-list"> 50000</span>
        </li>
        <li class="col-md-2 col-sm-4 col-6">
          Huỷ <span class="span-detail-list"> 50000</span>
        </li>

        <li class="col-md-2 col-sm-4 col-6">
          Sai cân nặng <span class="span-detail-list"> 50000</span>
        </li>
        <li class="col-md-2 col-sm-4 col-6">
          Nội dung khác <span class="span-detail-list"> 50000</span>
        </li>
        <li class="col-md-2 col-sm-4 col-6">
          Nội dung khác <span class="span-detail-list"> 50000</span>
        </li>
        <li class="col-md-2 col-sm-4 col-6  lstOrder-btn-default" onclick="hideMenuFilter1()">
          Thu gọn <img src="<?php echo base_url('public/images/iconDownL.svg');?>" class="float-right pt-2 pr-2">
        </li>
      </ul>
    </div>
  </div>
</section>

<script>
new Chart("myChart", {
  type: 'line',
  data: {
    labels: ['02/05', '03/05', '04/05', '05/05', '06/05', '07/05'],
    datasets: [{
      data: [86, 114, 106, 106, 107, 400],
      label: "Xem theo lượng đơn",
      borderColor: "#2DB1DB",
      fill: false
    }, {
      data: [282, 350, 411, 502, 635, 809],
      label: "Xem theo tỉ trọng",
      borderColor: "#885DE5",
      fill: false
    }, ]
  },

});
</script>
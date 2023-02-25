<!-- Danh sách thông báo
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

<section id="orders-history" class="mr-0 container">
  <div class="row">
    <ul class="list-unstyled orht-ktls">
      <li class="text-uppercase text-center">
        <b><?= lang('Label.lbl_orderHistoryTitle'); ?></b>
      </li>
      <li class=" pt-3">
        <select class="chosen-select">
          <option value="0913222444"> Nguyễn Văn Hoàng</option>
          <option value="0913222555"> Phan Văn Nam </option>
          <option value="0913222666"> Nhữ Thị Hằng</option>
          <option value="0913222777"> Nhữ Thị Thảo </option>
        </select>
      </li>
    </ul>

    <!-- =============Người nhận an toàn================= -->
    <ul class="lsnn-detail list-unstyled">
      <li class="text-center">
        <span>0913222444 - </span>
        <span style="color: #885DE5;">Nguyễn Văn Hoàng</span>
      </li>
      <li class="text-center pt-2 ml-3 mr-3 pb-2" style="border-bottom: 0.5px dashed #BCB8C6;">
        <img src="<?php echo base_url('public/images/antoan.svg');?>" alt="">
        <br>
        <span style="color: #6FDB2D;">Người nhận an toàn</span>
      </li>
      <li class="text-center pt-2 pl-2 pr-2">
        Người nhận không có lịch sử từ chối nhận hàng trong [x] tháng gần đây.
      </li>
    </ul>
    <!-- =============END Người nhận an toàn================= -->

    <!-- =============Người nhận không an toàn================= -->
    <ul class="lsnn-detail list-unstyled pb-3">
      <li class="text-center">
        <span>0913222444 - </span>
        <span style="color: #885DE5;">Nguyễn Văn Hoàng</span>
      </li>
      <li class="text-center pt-2 ml-3 mr-3 pb-2" style="border-bottom: 0.5px dashed #BCB8C6;">
        <img src="<?php echo base_url('public/images/khongantoan.svg ');?>" alt="">
        <br>
        <span style="color: #F0A616;">Người nhận không an toàn</span>
      </li>
      <li class="text-center pt-2 pl-2 pr-2">
        Người nhận đã có <span style="color: #F0A616;">3 lần không nhận hàng</span> từ các shop trong [x] tháng
        gần đây.
      </li>
      <li>
        <ul class="row list-unstyled m-0 pt-2 ">
          <li class="col-sm-4  pr-0">
            07/06/2021 - 10:26
          </li>
          <li class="col-sm-4 lsnn-line">
          </li>
          <li class="col-sm-4 pr-0">
            Không nhận 1 đơn hàng
          </li>
        </ul>
        <ul class="row list-unstyled m-0 pt-2">
          <li class="col-sm-4  pr-0">
            07/06/2021 - 10:26
          </li>
          <li class="col-sm-4 lsnn-line">
          </li>
          <li class="col-sm-4 pr-0">
            Không nhận 1 đơn hàng
          </li>
        </ul>
        <ul class="row list-unstyled m-0 pt-2">
          <li class="col-sm-4 pr-0">
            07/06/2021 - 10:26
          </li>
          <li class="col-sm-4 lsnn-line">
          </li>
          <li class="col-sm-4 pr-0">
            Không nhận 1 đơn hàng
          </li>
        </ul>
      </li>
    </ul>
    <!-- =============END Người nhận không an toàn================= -->

    <!-- =============Người nhận nguy hiểm================= -->
    <ul class="lsnn-detail list-unstyled pb-3">
      <li class="text-center">
        <span>0913222444 - </span>
        <span style="color: #885DE5;">Nguyễn Văn Hoàng</span>
      </li>
      <li class="text-center pt-2 ml-3 mr-3 pb-2" style="border-bottom: 0.5px dashed #BCB8C6;">
        <img src="<?php echo base_url('public/images/nguyhiem.svg ');?>" alt="">
        <br>
        <span style="color: #DB2D2D;">Người nhận nguy hiểm</span>
      </li>
      <li class="text-center pt-2 pl-2 pr-2">
        Người nhận đã có <span style="color: #DB2D2D;">10 lần không nhận hàng</span> từ các shop trong [x] tháng
        gần đây.
      </li>
      <li>
        <ul class="row list-unstyled m-0 pt-2 ">
          <li class="col-sm-4  pr-0">
            07/06/2021 - 10:26
          </li>
          <li class="col-sm-4 lsnn-line">
          </li>
          <li class="col-sm-4 pr-0">
            Không nhận 1 đơn hàng
          </li>
        </ul>
        <ul class="row list-unstyled m-0 pt-2">
          <li class="col-sm-4  pr-0">
            07/06/2021 - 10:26
          </li>
          <li class="col-sm-4 lsnn-line">
          </li>
          <li class="col-sm-4 pr-0">
            Không nhận 1 đơn hàng
          </li>
        </ul>
        <ul class="row list-unstyled m-0 pt-2">
          <li class="col-sm-4 pr-0">
            07/06/2021 - 10:26
          </li>
          <li class="col-sm-4 lsnn-line">
          </li>
          <li class="col-sm-4 pr-0">
            Không nhận 1 đơn hàng
          </li>
        </ul>

        <ul class="row list-unstyled m-0 pt-2">
          <li class="col-sm-4 pr-0">
            07/06/2021 - 10:26
          </li>
          <li class="col-sm-4 lsnn-line">
          </li>
          <li class="col-sm-4 pr-0">
            Không nhận 1 đơn hàng
          </li>
        </ul>
        <ul class="row list-unstyled m-0 pt-2">
          <li class="col-sm-4 pr-0">
            07/06/2021 - 10:26
          </li>
          <li class="col-sm-4 lsnn-line">
          </li>
          <li class="col-sm-4 pr-0">
            Không nhận 1 đơn hàng
          </li>
        </ul>
      </li>
      <ul class="row list-unstyled m-0 pt-2">
        <li class="col-sm-4 pr-0">
          07/06/2021 - 10:26
        </li>
        <li class="col-sm-4 lsnn-line">
        </li>
        <li class="col-sm-4 pr-0">
          Không nhận 1 đơn hàng
        </li>
      </ul>
      <ul class="row list-unstyled m-0 pt-2">
        <li class="col-sm-4 pr-0">
          07/06/2021 - 10:26
        </li>
        <li class="col-sm-4 lsnn-line">
        </li>
        <li class="col-sm-4 pr-0">
          Không nhận 1 đơn hàng
        </li>
      </ul>
      <ul class="row list-unstyled m-0 pt-2">
        <li class="col-sm-4 pr-0">
          07/06/2021 - 10:26
        </li>
        <li class="col-sm-4 lsnn-line">
        </li>
        <li class="col-sm-4 pr-0">
          Không nhận 1 đơn hàng
        </li>
      </ul>
      <ul class="row list-unstyled m-0 pt-2">
        <li class="col-sm-4 pr-0">
          07/06/2021 - 10:26
        </li>
        <li class="col-sm-4 lsnn-line">
        </li>
        <li class="col-sm-4 pr-0">
          Không nhận 1 đơn hàng
        </li>
      </ul>
      <ul class="row list-unstyled m-0 pt-2">
        <li class="col-sm-4 pr-0">
          07/06/2021 - 10:26
        </li>
        <li class="col-sm-4 lsnn-line">
        </li>
        <li class="col-sm-4 pr-0">
          Không nhận 1 đơn hàng
        </li>
      </ul>
      <ul class="row list-unstyled m-0 pt-2">
        <li class="col-sm-4 pr-0">
          07/06/2021 - 10:26
        </li>
        <li class="col-sm-4 lsnn-line">
        </li>
        <li class="col-sm-4 pr-0">
          Không nhận 1 đơn hàng
        </li>
      </ul>
    </ul>
    <!-- =============END Người nhận nguy hiểm================= -->
  </div>
</section>
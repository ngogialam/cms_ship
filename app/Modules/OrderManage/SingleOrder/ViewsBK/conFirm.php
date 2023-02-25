<section id="orders">
  <div class="row warehouse-banner-title">
    <ul class="col-md-3 col-sm-12">
      <li>
        <img src="<?php echo base_url('public/images/Home.png');?>" alt="">
      </li>
      <li class="mt2-config title-page">
        ><span> <?= lang('Label.lbl_order'); ?> </span> > <span><?php echo $title ?></span>
      </li>
    </ul>
    <div class="row col-xl-6 col-md-12">
      <div class="col-4 pr-0 pl-0">
        <ul class="or-banner1">
          <li style="background: #2DB1DB!important;color: white!important;line-height: 20px;">
            1
          </li>
          <li style="color: #2DB1DB!important;" class="or-cgc-1">
            GN1
          </li>
        </ul>
      </div>
      <div class="col-4 pr-0 pl-0">
        <ul class="or-banner1">
          <li style="background: #2DB1DB!important;color: white!important;line-height: 20px;">
            2
          </li>
          <li style="color: #2DB1DB!important;" class="or-cgc-1">
            <?= lang('Label.lbl_setInfo'); ?>
          </li>
        </ul>
      </div>
      <div class=" col-4 pr-0 pl-0">
        <ul class="or-banner" style="margin-left: 18px;">
          <li>
            3
          </li>
          <li class="or-cgc-1">
            <?= lang('Label.lbl_confirmOrder'); ?>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="or-xndh-ttng ">
    <!-- Tiêu đề + chọn điểm gửi -->
    <ul style="display: flex;justify-content: space-between;margin-bottom: 0px;">
      <li>
        <b><?= lang('Label.lbl_txtInfoSender') ?></b>
      </li>
      <li style="margin-right: 20px;">
        <input class="dropdown-toggle choosePickUpAddress" type="button" id="dropdownMenuButton" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false" value="<?= lang('Label.lbl_createNewWareHouse') ?>"
          style="border: none; background: none;" />
        <input type="hidden" class="pickupAddressId" value="" name="pickupAddressId">
        <img src="<?php echo base_url('public/images/iconDownX.png');?>" alt="">

        <div class="dropdown-menu select-confirm-orderDetail" aria-labelledby="dropdownMenuButton">
          <div class="dropdown-item pl-0 orDetail-data-select" href="#" style="padding-left: 21px!important;"
            onclick="choosePickupAddress(0)">
            <img src="<?php echo base_url('public/images/add.png');?>" alt="">
            <span style="color: #885DE5;font-size: 14px; padding-left: 4px;"><?= lang('Label.lbl_newAddress') ?></span>
          </div>

          <div class="dropdown-item pl-0  orDetail-data-select" href="#" style="padding-left: 21px!important;"
            onclick="choosePickupAddress()">
            <span style="color: #28262B;font-size: 14px;">Tên kho hàng</span> <br>
            <span style="color: #68656D;font-size: 12px;">Địa chỉ kho hàng</span>
          </div>
        </div>
      </li>
    </ul>
    <!-- ================= -->

    <!-- Thông tin người gửi -->
    <ul class="row">
      <li class="col-sm-4">
        <img src="<?php echo base_url('public/images/wh-kh1a.png');?>" alt=""> Minshoes Hoàng Cầu
      </li>
      <li class="col-sm-4">
        <img src="<?php echo base_url('public/images/wh-kh1b.png');?>" alt=""> Hoàng Thanh Giang
      </li>
      <li class="col-sm-4">
        <img src="<?php echo base_url('public/images/wh-kh1c.png');?>" alt=""> 0987 262 081
      </li>
      <li class="col-12 mt-2" style="margin-left: -2px;">
        <img src="<?php echo base_url('public/images/wh-kh1d.png');?>" alt=""> Toà nhà PeakView, 36 Hoàng Cầu, Ô Chợ
        Dừa, Đống Đa, Hà Nội
      </li>
    </ul>

    <!-- ================= -->
  </div>



  <div class="or-ttdh row">
    <ul class="or-dgh col-12">
      <li>
        <b><?= lang('Label.lbl_infoOder') ?></b>
      </li>
    </ul>
    <!-- ===========Đơn thứ nhất====== -->
    <div class="col-12">
      <div class="col-12 or-xtdh-dc p-0">
        <div class="or-xtdh-1">
          <span class="or-dh-stt" style="background: #2DB1DB;">1</span>
          Tòa nhà PeakView, 36 Hoàng Cầu, Ô Chợ Dừa, Đống Đa, Hà Nội
        </div>

        <div class="row qo-ttdn-dt-1 qo-xndn-ttdh-1" id="qo-ed-1">
          <div class="col-md-3 col-12 d-flex">
            <ul class="list-unstyled p-0 mb-0 w-100">
              <li class="d-flex" style="height: 20px;">
                <span class="or-dgh-icon-2 stt-order"></span> 0912088777 <img
                  src="<?php echo base_url('public/images/antoan.svg');?>" class="tdn-btn-downx ">
              </li>
              <li style="margin-top: 7px;">
                Nguyễn Thị Phương Mai
              </li>
            </ul>
          </div>

          <div class="col-md-8 col-12 pr-0 qo-ttdn-xndh-inf">
            <ul class="row list-unstyled p-0 mb-0">
              <li class="col-md-4 p-0 tthh-title">
                Iphone 13 promax
              </li>
              <li class="col-md-2 p-1 ">
                <?= lang('Label.lbl_txtAmountDetailOrders') ?>: <span style="color: #885DE5;">200</span>
              </li>
              <li class="col-md-3 p-1">
                <?= lang('Label.lbl_txtCODDetailOrders') ?>: <span style="color: #F0A616;">40.000,000 đ</span>
              </li>
              <li class="col-md-3 p-1">
                <?= lang('Label.lbl_priceDeclaration') ?>: <span style="font-weight: 500;">40.000,000 đ</span>
              </li>
            </ul>
            <ul class="row list-unstyled p-0 mb-0">
              <li class="col-md-4 p-0 tthh-title">
                Iphone 13 promax
              </li>
              <li class="col-md-2 p-1 ">
                <?= lang('Label.lbl_txtAmountDetailOrders') ?>: <span style="color: #885DE5;">200</span>
              </li>
              <li class="col-md-3 p-1">
                <?= lang('Label.lbl_txtCODDetailOrders') ?>: <span style="color: #F0A616;">40.000,000 đ</span>
              </li>
              <li class="col-md-3 p-1">
                <?= lang('Label.lbl_priceDeclaration') ?>: <span style="font-weight: 500;">40.000,000 đ</span>
              </li>
              <li class="col-md-1 col-12 text-right">
              </li>
            </ul>
            <ul class="row list-unstyled p-0 mb-0">
              <li class="col-md-4 p-0 tthh-title">
                Iphone 13 promax
              </li>
              <li class="col-md-2 p-1 ">
                <?= lang('Label.lbl_txtAmountDetailOrders') ?>: <span style="color: #885DE5;">200</span>
              </li>
              <li class="col-md-3 p-1">
                <?= lang('Label.lbl_txtCODDetailOrders') ?>: <span style="color: #F0A616;">40.000,000 đ</span>
              </li>
              <li class="col-md-3 p-1">
                <?= lang('Label.lbl_priceDeclaration') ?>: <span style="font-weight: 500;">40.000,000 đ</span>
              </li>
              <li class="col-md-1 col-12 text-right">
              </li>
            </ul>
          </div>
          <div class="col-md-1 text-right">
            <!-- Các giá trị được thay đổi theo id  -->
            <img src="<?php echo base_url('public/images/iconDownx.svg');?>" id="qo-xndn-iconDown1"
              onclick="showInfo('qo-xndn-iconDown1','info-donhang-1')" class="pt-1 tdn-btn-downx">
            <img src="<?php echo base_url('public/images/iconDownL.svg');?>" id="qo-xndn-iconDown1a"
              class="qo-ed-a pt-1 tdn-btn-downx" onclick="noneInfo('qo-xndn-iconDown1','info-donhang-1')">
          </div>

          <div class="col-12 qo-tthh-ndn" id="info-donhang-1">
            <!-- id thay đổi theo số hàng hoá-->
            <div class="row w-100">
              <ul class="col-md-6" style="padding-left: 50px;">
                <li>
                  <?= lang('Label.lbl_txtSizeDetailOrders') ?>: <span> 20 x 10 x 10 </span>cm
                </li>
                <li>
                  <?= lang('Label.lbl_txtWeightDetailOrders') ?>: <span> 1000</span> gram
                </li>
                <li>
                  <?= lang('Label.lbl_txtReceivingTimeDetailOrders') ?>: <span>10:30 22/05/2021</span>
                </li>
                <li>
                  <?= lang('Label.lbl_txtExtraNote') ?>: <span>Cho xem hàng, nếu không nhận hàng thì trả tiền cho
                    shipper
                    30,000đ</span>
                </li>
              </ul>
              <ul class="col-md-6" style="padding-left: 50px;">
                <li>
                  <?= lang('Label.lbl_txtPayerFee') ?>: <span>Người gửi</span>
                </li>
                <li>
                  <?= lang('Label.lbl_txtPartialDelivery') ?>: <span>Có</span>
                </li>
                <li>
                  <?= lang('Label.lbl_txtIsReturn') ?>: <span>Có</span>
                </li>
                <li>
                  <?= lang('Label.lbl_txtExtraServices') ?>: <span>Bốc dỡ, Giao tận tay</span>
                </li>
                <li>
                  <?= lang('Label.lbl_txtRecieve') ?>: <span>Cho xem hàng, không cho thử</span>
                </li>
              </ul>
            </div>
          </div>
        </div>


        <div class="row qo-ttdn-dt-1 qo-xndn-ttdh-1" id="qo-ed-1" style="margin-top: 12px!important">
          <div class="col-md-3 col-12 d-flex">
            <ul class="list-unstyled p-0 mb-0 w-100">
              <li class="d-flex" style="height: 20px;">
                <span class="or-dgh-icon-2 stt-order"></span> 0912088777 <img
                  src="<?php echo base_url('public/images/antoan.svg');?>" class="tdn-btn-downx ">
              </li>
              <li style="margin-top: 7px;">
                Nguyễn Thị Phương Mai
              </li>
            </ul>
          </div>

          <div class="col-md-8 col-12 pr-0 qo-ttdn-xndh-inf">
            <ul class="row list-unstyled p-0 mb-0">
              <li class="col-md-4 p-0 tthh-title">
                Iphone 13 promax
              </li>
              <li class="col-md-2 p-1 ">
                <?= lang('Label.lbl_txtAmountDetailOrders') ?>: <span style="color: #885DE5;">200</span>
              </li>
              <li class="col-md-3 p-1">
                <?= lang('Label.lbl_txtCODDetailOrders') ?>: <span style="color: #F0A616;">40.000,000 đ</span>
              </li>
              <li class="col-md-3 p-1">
                <?= lang('Label.lbl_priceDeclaration') ?>: <span style="font-weight: 500;">40.000,000 đ</span>
              </li>
            </ul>
            <ul class="row list-unstyled p-0 mb-0">
              <li class="col-md-4 p-0 tthh-title">
                Iphone 13 promax
              </li>
              <li class="col-md-2 p-1 ">
                <?= lang('Label.lbl_txtAmountDetailOrders') ?>: <span style="color: #885DE5;">200</span>
              </li>
              <li class="col-md-3 p-1">
                <?= lang('Label.lbl_txtCODDetailOrders') ?>: <span style="color: #F0A616;">40.000,000 đ</span>
              </li>
              <li class="col-md-3 p-1">
                <?= lang('Label.lbl_priceDeclaration') ?>: <span style="font-weight: 500;">40.000,000 đ</span>
              </li>
              <li class="col-md-1 col-12 text-right">
              </li>
            </ul>
            <ul class="row list-unstyled p-0 mb-0">
              <li class="col-md-4 p-0 tthh-title">
                Iphone 13 promax
              </li>
              <li class="col-md-2 p-1 ">
                <?= lang('Label.lbl_txtAmountDetailOrders') ?>: <span style="color: #885DE5;">200</span>
              </li>
              <li class="col-md-3 p-1">
                <?= lang('Label.lbl_txtCODDetailOrders') ?>: <span style="color: #F0A616;">40.000,000 đ</span>
              </li>
              <li class="col-md-3 p-1">
                <?= lang('Label.lbl_priceDeclaration') ?>: <span style="font-weight: 500;">40.000,000 đ</span>
              </li>
              <li class="col-md-1 col-12 text-right">
              </li>
            </ul>
          </div>
          <div class="col-md-1 text-right">
            <!-- Các giá trị được thay đổi theo id  -->

            <img src="<?php echo base_url('public/images/iconDownx.svg');?>" id="qo-xndn-iconDown1"
              onclick="showInfo('qo-xndn-iconDown1','info-donhang-1')" class="pt-1 tdn-btn-downx">
            <img src="<?php echo base_url('public/images/iconDownL.svg');?>" id="qo-xndn-iconDown1a"
              class="qo-ed-a pt-1 tdn-btn-downx" onclick="noneInfo('qo-xndn-iconDown1','info-donhang-1')">
          </div>

          <div class="col-12 qo-tthh-ndn" id="info-donhang-1">
            <!-- id thay đổi theo số hàng hoá-->
            <div class="row w-100">
              <ul class="col-md-6" style="padding-left: 50px;">
                <li>
                  <?= lang('Label.lbl_txtSizeDetailOrders') ?>: <span> 20 x 10 x 10 </span>cm
                </li>
                <li>
                  <?= lang('Label.lbl_txtWeightDetailOrders') ?>: <span> 1000</span> gram
                </li>
                <li>
                  <?= lang('Label.lbl_txtReceivingTimeDetailOrders') ?>: <span>10:30 22/05/2021</span>
                </li>
                <li>
                  <?= lang('Label.lbl_txtExtraNote') ?>: <span>Cho xem hàng, nếu không nhận hàng thì trả tiền cho
                    shipper
                    30,000đ</span>
                </li>
              </ul>
              <ul class="col-md-6" style="padding-left: 50px;">
                <li>
                  <?= lang('Label.lbl_txtPayerFee') ?>: <span>Người gửi</span>
                </li>
                <li>
                  <?= lang('Label.lbl_txtPartialDelivery') ?>: <span>Có</span>
                </li>
                <li>
                  <?= lang('Label.lbl_txtIsReturn') ?>: <span>Có</span>
                </li>
                <li>
                  <?= lang('Label.lbl_txtExtraServices') ?>: <span>Bốc dỡ, Giao tận tay</span>
                </li>
                <li>
                  <?= lang('Label.lbl_txtRecieve') ?>: <span>Cho xem hàng, không cho thử</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- ===========Hết đơn 1=========  -->
      <!-- ===========Đơn thứ hai====== -->
      <div class="col-12 or-xtdh-dc p-0" style="margin-top: 12px;">
        <div class="or-xtdh-1">
          <span class="or-dh-stt" style="background: #2DB1DB;">1</span>
          Tòa nhà PeakView, 36 Hoàng Cầu, Ô Chợ Dừa, Đống Đa, Hà Nội
        </div>

        <div class="row qo-ttdn-dt-1 qo-xndn-ttdh-1" id="qo-ed-1">
          <div class="col-md-3 col-12 d-flex">
            <ul class="list-unstyled p-0 mb-0 w-100">
              <li class="d-flex" style="height: 20px;">
                <span class="or-dgh-icon-2 stt-order"></span> 0912088777 <img
                  src="<?php echo base_url('public/images/antoan.svg');?>" class="tdn-btn-downx ">
              </li>
              <li style="margin-top: 7px;">
                Nguyễn Thị Phương Mai
              </li>
            </ul>
          </div>

          <div class="col-md-8 col-12 pr-0 qo-ttdn-xndh-inf">
            <ul class="row list-unstyled p-0 mb-0">
              <li class="col-md-4 p-0 tthh-title">
                Iphone 13 promax
              </li>
              <li class="col-md-2 p-1 ">
                <?= lang('Label.lbl_txtAmountDetailOrders') ?>: <span style="color: #885DE5;">200</span>
              </li>
              <li class="col-md-3 p-1">
                <?= lang('Label.lbl_txtCODDetailOrders') ?>: <span style="color: #F0A616;">40.000,000 đ</span>
              </li>
              <li class="col-md-3 p-1">
                <?= lang('Label.lbl_priceDeclaration') ?>: <span style="font-weight: 500;">40.000,000 đ</span>
              </li>
            </ul>
            <ul class="row list-unstyled p-0 mb-0">
              <li class="col-md-4 p-0 tthh-title">
                Iphone 13 promax
              </li>
              <li class="col-md-2 p-1 ">
                <?= lang('Label.lbl_txtAmountDetailOrders') ?>: <span style="color: #885DE5;">200</span>
              </li>
              <li class="col-md-3 p-1">
                <?= lang('Label.lbl_txtCODDetailOrders') ?>: <span style="color: #F0A616;">40.000,000 đ</span>
              </li>
              <li class="col-md-3 p-1">
                <?= lang('Label.lbl_priceDeclaration') ?>: <span style="font-weight: 500;">40.000,000 đ</span>
              </li>
              <li class="col-md-1 col-12 text-right">
              </li>
            </ul>
            <ul class="row list-unstyled p-0 mb-0">
              <li class="col-md-4 p-0 tthh-title">
                Iphone 13 promax
              </li>
              <li class="col-md-2 p-1 ">
                <?= lang('Label.lbl_txtAmountDetailOrders') ?>: <span style="color: #885DE5;">200</span>
              </li>
              <li class="col-md-3 p-1">
                <?= lang('Label.lbl_txtCODDetailOrders') ?>: <span style="color: #F0A616;">40.000,000 đ</span>
              </li>
              <li class="col-md-3 p-1">
                <?= lang('Label.lbl_priceDeclaration') ?>: <span style="font-weight: 500;">40.000,000 đ</span>
              </li>
              <li class="col-md-1 col-12 text-right">
              </li>
            </ul>
          </div>
          <div class="col-md-1 text-right">
            <!-- Các giá trị được thay đổi theo id  -->

            <img src="<?php echo base_url('public/images/iconDownx.svg');?>" id="qo-xndn-iconDown1"
              onclick="showInfo('qo-xndn-iconDown1','info-donhang-1')" class="pt-1 tdn-btn-downx">
            <img src="<?php echo base_url('public/images/iconDownL.svg');?>" id="qo-xndn-iconDown1a"
              class="qo-ed-a pt-1 tdn-btn-downx" onclick="noneInfo('qo-xndn-iconDown1','info-donhang-1')">
          </div>

          <div class="col-12 qo-tthh-ndn" id="info-donhang-1">
            <!-- id thay đổi theo số hàng hoá-->
            <div class="row w-100">
              <ul class="col-md-6" style="padding-left: 50px;">
                <li>
                  <?= lang('Label.lbl_txtSizeDetailOrders') ?>: <span> 20 x 10 x 10 </span>cm
                </li>
                <li>
                  <?= lang('Label.lbl_txtWeightDetailOrders') ?>: <span> 1000</span> gram
                </li>
                <li>
                  <?= lang('Label.lbl_txtReceivingTimeDetailOrders') ?>: <span>10:30 22/05/2021</span>
                </li>
                <li>
                  <?= lang('Label.lbl_txtExtraNote') ?>: <span>Cho xem hàng, nếu không nhận hàng thì trả tiền cho
                    shipper
                    30,000đ</span>
                </li>
              </ul>
              <ul class="col-md-6" style="padding-left: 50px;">
                <li>
                  <?= lang('Label.lbl_txtPayerFee') ?>: <span>Người gửi</span>
                </li>
                <li>
                  <?= lang('Label.lbl_txtPartialDelivery') ?>: <span>Có</span>
                </li>
                <li>
                  <?= lang('Label.lbl_txtIsReturn') ?>: <span>Có</span>
                </li>
                <li>
                  <?= lang('Label.lbl_txtExtraServices') ?>: <span>Bốc dỡ, Giao tận tay</span>
                </li>
                <li>
                  <?= lang('Label.lbl_txtRecieve') ?>: <span>Cho xem hàng, không cho thử</span>
                </li>
              </ul>
            </div>
          </div>
        </div>


        <div class="row qo-ttdn-dt-1 qo-xndn-ttdh-1" id="qo-ed-1" style="margin-top: 12px!important">
          <div class="col-md-3 col-12 d-flex">
            <ul class="list-unstyled p-0 mb-0 w-100">
              <li class="d-flex" style="height: 20px;">
                <span class="or-dgh-icon-2 stt-order"></span> 0912088777 <img
                  src="<?php echo base_url('public/images/antoan.svg');?>" class="tdn-btn-downx ">
              </li>
              <li style="margin-top: 7px;">
                Nguyễn Thị Phương Mai
              </li>
            </ul>
          </div>

          <div class="col-md-8 col-12 pr-0 qo-ttdn-xndh-inf">
            <ul class="row list-unstyled p-0 mb-0">
              <li class="col-md-4 p-0 tthh-title">
                Iphone 13 promax
              </li>
              <li class="col-md-2 p-1 ">
                <?= lang('Label.lbl_txtAmountDetailOrders') ?>: <span style="color: #885DE5;">200</span>
              </li>
              <li class="col-md-3 p-1">
                <?= lang('Label.lbl_txtCODDetailOrders') ?>: <span style="color: #F0A616;">40.000,000 đ</span>
              </li>
              <li class="col-md-3 p-1">
                <?= lang('Label.lbl_priceDeclaration') ?>: <span style="font-weight: 500;">40.000,000 đ</span>
              </li>
            </ul>
            <ul class="row list-unstyled p-0 mb-0">
              <li class="col-md-4 p-0 tthh-title">
                Iphone 13 promax
              </li>
              <li class="col-md-2 p-1 ">
                <?= lang('Label.lbl_txtAmountDetailOrders') ?>: <span style="color: #885DE5;">200</span>
              </li>
              <li class="col-md-3 p-1">
                <?= lang('Label.lbl_txtCODDetailOrders') ?>: <span style="color: #F0A616;">40.000,000 đ</span>
              </li>
              <li class="col-md-3 p-1">
                <?= lang('Label.lbl_priceDeclaration') ?>: <span style="font-weight: 500;">40.000,000 đ</span>
              </li>
              <li class="col-md-1 col-12 text-right">
              </li>
            </ul>
            <ul class="row list-unstyled p-0 mb-0">
              <li class="col-md-4 p-0 tthh-title">
                Iphone 13 promax
              </li>
              <li class="col-md-2 p-1 ">
                <?= lang('Label.lbl_txtAmountDetailOrders') ?>: <span style="color: #885DE5;">200</span>
              </li>
              <li class="col-md-3 p-1">
                <?= lang('Label.lbl_txtCODDetailOrders') ?>: <span style="color: #F0A616;">40.000,000 đ</span>
              </li>
              <li class="col-md-3 p-1">
                <?= lang('Label.lbl_priceDeclaration') ?>: <span style="font-weight: 500;">40.000,000 đ</span>
              </li>
              <li class="col-md-1 col-12 text-right">
              </li>
            </ul>
          </div>
          <div class="col-md-1 text-right">
            <!-- Các giá trị được thay đổi theo id  -->

            <img src="<?php echo base_url('public/images/iconDownx.svg');?>" id="qo-xndn-iconDown1"
              onclick="showInfo('qo-xndn-iconDown1','info-donhang-1')" class="pt-1 tdn-btn-downx">
            <img src="<?php echo base_url('public/images/iconDownL.svg');?>" id="qo-xndn-iconDown1a"
              class="qo-ed-a pt-1 tdn-btn-downx" onclick="noneInfo('qo-xndn-iconDown1','info-donhang-1')">
          </div>

          <div class="col-12 qo-tthh-ndn" id="info-donhang-1">
            <!-- id thay đổi theo số hàng hoá-->
            <div class="row w-100">
              <ul class="col-md-6" style="padding-left: 50px;">
                <li>
                  <?= lang('Label.lbl_txtSizeDetailOrders') ?>: <span> 20 x 10 x 10 </span>cm
                </li>
                <li>
                  <?= lang('Label.lbl_txtWeightDetailOrders') ?>: <span> 1000</span> gram
                </li>
                <li>
                  <?= lang('Label.lbl_txtReceivingTimeDetailOrders') ?>: <span>10:30 22/05/2021</span>
                </li>
                <li>
                  <?= lang('Label.lbl_txtExtraNote') ?>: <span>Cho xem hàng, nếu không nhận hàng thì trả tiền cho
                    shipper
                    30,000đ</span>
                </li>
              </ul>
              <ul class="col-md-6" style="padding-left: 50px;">
                <li>
                  <?= lang('Label.lbl_txtPayerFee') ?>: <span>Người gửi</span>
                </li>
                <li>
                  <?= lang('Label.lbl_txtPartialDelivery') ?>: <span>Có</span>
                </li>
                <li>
                  <?= lang('Label.lbl_txtIsReturn') ?>: <span>Có</span>
                </li>
                <li>
                  <?= lang('Label.lbl_txtExtraServices') ?>: <span>Bốc dỡ, Giao tận tay</span>
                </li>
                <li>
                  <?= lang('Label.lbl_txtRecieve') ?>: <span>Cho xem hàng, không cho thử</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- ===========Hết đơn thứ hai=========  -->
    </div>
  </div>
</section>


<section class="row" id="orders">
  <!-- Thông tin tài xế -->
  <div class="or-tttx row w-100">
    <ul class="col-md-2 mb-0 col-sm-12 or-tttx-1">
      <li>
        <b><?= lang('Label.lbl_txtShipperInfo') ?></b>
      </li>
    </ul>
    <ul class="col-md-3 mb-0 col-4 or-tttx-2 or-cgc-1">
      <li>
        <?= lang('Label.lbl_txtShipperPhone') ?>
      </li>
    </ul>
    <ul class="col-md-7 mb-0 col-8 or-tttx-3">
      <li>
        <input type="text" placeholder="  <?= lang('Label.lbl_txtExpectShipperPhone') ?>">
      </li>
    </ul>
  </div>
  <!-- ======================== -->


  <div class="col-12 p-0">
    <div class="xnd-ttcp">
      <!-- Phương thức thanh toán -->
      <ul style="margin-right: -20px;">
        <li>
          <?= lang('Label.lbl_feeInfo') ?>
        </li>
      </ul>
      <ul class="w-100">
        <li class="position-relative" style="cursor: pointer;" data-toggle="modal" data-target="#modalPaymentMethods">
          <img src="<?php echo base_url('public/images/iconMoney.png');?>" alt="">
          <input placeholder="<?= lang('Label.lbl_paymentMethods') ?>" style="cursor: pointer;">
          <span class="paymentMethods">Số dư ví Hola <img src="<?php echo base_url('public/images/iconDownX.png');?>"
              alt="" style="margin-top: 9px;"></span>
        </li>

        <div class="modal fade" id="modalPaymentMethods" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background:#FFFFFF;">
              <div class="modal-header text-center " style="border: none;">
                <h5 class="modal-title w-100" id="exampleModalLongTitle" style="color:#885DE5; font-weight: 500;">
                  PHƯƠNG
                  THỨC THANH TOÁN<li
                    style="width: 50%;height: 1px;background: #BCB8C6; margin: 0 auto;margin-top: 10px;">
                </h5>

                </li>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <label for="check-payment" class="w-100">
                  <div class="d-flex">
                    <ul style="width: 13%;" class="pl-0">
                      <li>
                        <img src="<?php echo base_url('public/images/vihola.png');?>" alt="">
                      </li>
                    </ul>
                    <ul style="width: 78%;">
                      <li style="font-weight: 500; font-size: 13px;">
                        Sử dụng số dư ví Hola
                      </li>
                      <li style="font-size: 12px;color:#858388;">
                        Số dư ví Hola không đủ để thanh toán,<br>
                        vui lòng Nạp thêm tiền <a href="/nap-tien"> ở đây</a>
                      </li>
                    </ul>
                    <ul style="width: 9%;">
                      <li>
                        <input type="checkbox" name="" id="check-payment">
                      </li>
                    </ul>
                  </div>
                </label>


                <label for="check-payment-1" class="w-100">
                  <div class="d-flex">
                    <ul style="width: 13%;" class="pl-0">
                      <li>
                        <img src="<?php echo base_url('public/images/tienmat.png');?>" alt="">
                      </li>
                    </ul>
                    <ul style="width: 78%;">
                      <li style="font-weight: 500; font-size: 13px;padding-top: 20px;">
                        Sử dụng số dư ví Hola
                      </li>

                    </ul>
                    <ul style="width: 9%;">
                      <li style="padding-top: 12px;">
                        <input type="checkbox" name="" id="check-payment-1">
                      </li>
                    </ul>
                  </div>
                </label>
              </div>
              <div class="modal-footer" style="border: none;">
                <button type="button" class="btn btn-secondary w-50 btn-confirm-payment" data-dismiss="modal">Áp
                  dụng</button>
              </div>
            </div>
          </div>
        </div>
      </ul>
      <!-- ================== -->

      <!-- Chọn mã giảm giá -->
      <ul style="width: 100%;">
        <img src="<?php echo base_url('public/images/xnd-mgg.png');?>" alt="">
        <input placeholder="<?= lang('Label.lbl_chooseVoucher') ?>">
      </ul>
      <!-- ================= -->

      <div class="xtd-full-fee row" style="margin-top: 14px; margin-right: 12px;">
        <div id="owl-partners-xndh-6" class="owl-carousel owl-theme wow" data-wow-delay="0.6s">
          <div class="ew-slide">
            <ul>
              <li>
                Gói cước
              </li>
              <li>
                <input list="goi-cuoc" name="goi-cuoc" placeholder="GN4H">
                <datalist id="goi-cuoc">
                  <option value="GN4H"> Nội thành 4h</option>
                  <option value="GN2H"> Nội thành 2h</option>
                  <option value="GN1H"> Nội thành 1h</option>
                  <option value="NTGN"> Nội thành giao ngay</option>
                </datalist>
              </li>
            </ul>
          </div>
          <div class="ew-slide">
            <ul>
              <li>
                Phí vận chuyển
              </li>
              <li>
                <b> 140,000 </b>đ
              </li>
            </ul>
          </div>
          <div class="ew-slide">
            <ul>
              <li>
                Phí khai giá
              </li>
              <li>
                <b> 140,000 </b>đ
              </li>
            </ul>
          </div>
          <div class="ew-slide">
            <ul>
              <li>
                Phí thu hộ
              </li>
              <li>
                <b> 140,000 </b>đ
              </li>
            </ul>
          </div>
          <div class="ew-slide">
            <ul>
              <li>
                Phí lấy hàng
              </li>
              <li>
                <b> 140,000 </b>đ
              </li>
            </ul>
          </div>
          <div class="ew-slide">
            <ul>
              <li>
                Phí bốc dỡ
              </li>
              <li>
                <b> 140,000 </b>đ
              </li>
            </ul>
          </div>
          <div class="ew-slide">
            <ul>
              <li>
                Phí Giao tận tay
              </li>
            </ul>
            <ul>
              <li>
                <b> 140,000 </b> đ
              </li>
            </ul>
          </div>
          <div class="ew-slide">
            <ul>
              <li>
                Tổng phí
              </li>
            </ul>
            <ul>
              <li style="color: #885DE5;">
                <b> 170,000,000 </b> đ
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Tổng tiền -->
      <ul class="row" style="margin-top: 14px; margin-right: 12px;">
        <li class="col-sm-4">
          <?= lang('Label.lbl_priceDeclaration') ?> <br>
          <b> <span style="color:  #885DE5;">50,000,000</span> <span style="color: #6e6e7b;">đ</span></b>
        </li>
        <li class="col-sm-4">
          <?= lang('Label.lbl_totalCOD') ?> <br>
          <b> <span style="color:  #F0A616;">1,700,000</span> <span style="color: #6e6e7b;">đ</span></b>
        </li>
        <li class="col-sm-4">
          <?= lang('Label.lbl_totalRevenue') ?><br>
          <b><span style="color:  #885DE5;">1,750,000,000 </span><span style="color: #6e6e7b;">đ</span></b>
        </li>
      </ul>
      <!-- ============== -->
    </div>
  </div>

  <div class="row xnd-btn-ttx pr-0 col-12">
    <div class="col-md-8">
    </div>
    <div class="col-md-2 pr-0 col-6  ttx-btn-1">
      <button class="mt-3"> <?= lang('Label.lbl_createOrders') ?></button>
    </div>
    <div class="col-md-2 ttx-btn-2 pr-0 col-6">
      <button class="mt-3"> <?= lang('Label.lbl_findShipper') ?></button>
    </div>
  </div>
</section>

<style>
.btn-secondary:not(:disabled):not(.disabled):active,
.btn-secondary:not(:disabled):not(.disabled).active,
.show>.btn-secondary.dropdown-toggle {
  color: white;
}
</style>
<section id="orders">
  <div class="warehouse-banner-title">
    <ul class="ml-0 pl-0 mb-0">
      <li>
        <img src="<?php echo base_url('public/images/Home.png');?>">
      </li>
      <li class="mt2-config title-page">
        > <span> <?= lang('Label.lbl_order'); ?> </span> > <span> <?php echo $title ?></span>
      </li>
    </ul>
  </div>
</section>

<section id="listOders" style="padding: 13px 26px 0 15px">
  <div class="listOders-search">
    <ul class="row list-unstyled">
      <li class="col-md-7 col-sm-12">
        <input type="text" placeholder="Nhập mã đơn hàng, số điện thoại, tên người nhận">
      </li>
      <li class="col-md-2 col-sm-4 mt-sm-2">
        <input type="text" placeholder="Từ ngày" class="datePicker">
      </li>
      <li class="col-md-2 col-sm-4">
        <input type="text" placeholder="Đến ngày" class="datePicker">
      </li>
      <li class="col-md-1 col-sm-4">
        <button type="button" class="lsod-submit-search">Tìm kiếm</button>
      </li>
    </ul>
  </div>
  <!--================ Menu  ======================== -->
  <!-- menu1 -->
  <div class="listOders-menu-dt listOders-menu-dt-show mt-2 ">
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
      <li class="col-md-2 col-sm-4 col-6 lstOrder-btn-showFilter" onclick="showMenuFilter()">
        Mở rộng<img src="<?php echo base_url('public/images/iconDownx.svg');?>" class="float-right pt-1 pr-2">
      </li>
    </ul>
  </div>

  <!-- menu2 -->
  <div class="listOders-menu-dt listOders-menu-dt-default mt-2">
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
      <li class="col-md-2 col-sm-4 col-6  lstOrder-btn-default" style="color:#8D869D" onclick="hideMenuFilter()">
        Thu gọn <img src="<?php echo base_url('public/images/iconDownL.svg');?>" class="float-right pt-1 pr-2">
      </li>
    </ul>
  </div>
  <!--=============== END Menu  =====================-->
  <div class="lstOders-line"></div>

  <div>
    <ul class="row list-unstyled">
      <li class="col-md-11">
        <ul class="row list-unstyled listOders-search-1">
          <li class="col-md-3 col-sm-6 d-flex">
            <input type="checkbox" class="selectAll mt-2 ml-1 mr-3" onclick="selectAll()">
            <select name="" id="" class="chosen-select w-100" style="height:36px">
              <option value="">Chức năng chung</option>
              <option value="">Duyệt tất cả</option>
              <option value="">Duyệt đơn đã chọn</option>
              <option value="">Xoá tất cả đơn hàng</option>
              <option value="">Xoá tất đơn đã chọn</option>
            </select>
          </li>
          <li class="col-md-3 col-sm-6 listOders-search-2">
            <div>Tổng đơn: <span style="color: #2DB1DB;">1,900,000</span></div>
          </li>
          <li class="col-md-3 col-sm-6 listOders-search-2">
            <div>Tổng COD: <span style="color:#F0A616"> 350,000,000 đ</span></div>
          </li>
          <li class="col-md-3 col-sm-6 listOders-search-2">
            <div>Tổng phí: <span style="color: #885DE5;">500,000,000 đ</span></div>
          </li>
        </ul>
      </li>
      <li class="col-md-1 pl-0" style="padding-right: 9px;">
        <input type="button" value="Xuất excel" class="lsod-exportExcel">
      </li>
    </ul>
  </div>

  <!--=================== Danh Sách Đơn Hàng=============== -->
  <div class="listOders-bd-1 pt-2 d-flex" style="margin-right: -12px;">
    <div class="listOrders-checkbox">
      <input type="checkbox" class="myCheckBox">
    </div>
    <div class="w-100 mb-2 ">
      <div class="mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0 ">
          <li>
            <span class="listOders-bd-stt">1</span>
          </li>
          <li class="pl-2">
            <b>S10724276.B.MB26.K1.D.12.87414502</b>
          </li>
          <li>
            <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;" class="mt-0">
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right ">
            (27/04/2021 18:09:22)
            <span style="color:#885DE5;">Chờ duyệt</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2  listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
            <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;display: none;">
          </li>
          <li class="pl-2">
            <span style="color: #514D5B;font-weight: 600;">NT6H</span>
          </li>
          <li>
            <span style="color: #514D5B;font-weight: 600;">10 </span>đơn
            (<span style="color: #2DB1DB;">5 đơn GTT</span>) - 3 điểm
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right list-icon">
            <img src="<?php echo base_url('public/images/mayin.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/delete.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/edit.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/iconDown11.png');?>" onclick="showInfoDetail(1)"
              id="btn-showdetail-1" class="btn-showDetail">
            <img src="<?php echo base_url('public/images/iconDownL.png');?>" onclick="noneInfoDetail(1)"
              id="btn-nonedetail-1" class="btn-noneDetail">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1">
            Gửi từ: Moon Store - 0912333444
            <br>
            Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/$.png');?>" alt=""
              style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
          </li>
          <li class="pl-2 pt-1">
            <span class="pr-1">COD: 2,480,000 đ</span>
            <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
              <span class="pl-1">Phí: 20,000 đ</span>
              <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                data-target="#myModal">
              <!-- The Modal -->
              <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;    ">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body ">
                      <ul class="row list-unstyled pl-3 pr-3">
                        <li class="col-md-6">
                          Phí vận chuyển
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí khai giá
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí thu hộ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí lấy hàng
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí bốc giỡ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>

                      </ul>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer text-center" style="margin: 0px auto;">
                      Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                    </div>

                  </div>
                </div>
              </div>
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right listOrders-btn-xndh">
            <div>
              <img src="<?php echo base_url('public/images/ship_icon1.png');?>" class="listOders-icon-block">
              <img src="<?php echo base_url('public/images/ship_icon2.png');?>" class="listOders-icon-none">
              <span>Tìm tài xế</span>
            </div>
          </li>
        </ul>
      </div>

      <div id="lstOr-detail-1">
        <div class="lstOders-line-detail"></div>

        <div class="listOders-bd-1 pt-2 d-flex mt-2 listOrders-detail-1">
          <div class="w-100 mb-2 ">
            <div class="mr-2 listOders-bd-3">
              <ul class="list-unstyled d-flex mb-0 ">
                <li>
                  <span class="listOders-bd-stt">1</span>
                </li>
                <li class="pl-2">
                  <b>S10724276.B.MB26.K1.D.12.87414502</b>
                </li>
                <li>
                  <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;"
                    class="mt-0">
                </li>
              </ul>
              <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
                <li class="w-100 text-right ">
                  (27/04/2021 18:09:22)
                  <span style="color:#885DE5;">Chờ người gửi mang hàng ra bưu cục</span>
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2  listOders-bd-3">
              <ul class="list-unstyled d-flex mb-0">
                <li>
                  <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px;display: none;">
                  <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px;">
                </li>
                <li class="pl-2">
                  <span style="color: #514D5B;font-weight: 600;">NT6H</span>
                </li>
                <li class="pl-3">
                  (<span style="color: #2DB1DB;">GTT</span>)
                </li>
              </ul>
              <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
                <li class="w-100 text-right list-icon">
                  <img src="<?php echo base_url('public/images/mayin.png');?>">
                  <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
                  <img src="<?php echo base_url('public/images/delete.png');?>">
                  <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
                  <img src="<?php echo base_url('public/images/edit.png');?>">
                  <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
                  <img src="<?php echo base_url('public/images/iconDown11.png');?>">
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2">
              <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
                <li>
                  <img src="<?php echo base_url('public/images/carton-box1.png');?>" alt=""
                    style="width: 18px; height: 18px;margin-left: 0px">
                </li>
                <li class="pl-2 pt-1 listOrders-img-huydon">
                  Hàng hoá: <span style="color: #885DE5;">Đèn trang trí noel (x3), Khuyên tai (x2),...</span>
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2">
              <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
                <li>
                  <img src="<?php echo base_url('public/images/iconUser.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px">
                </li>
                <li class="pl-2 pt-1 listOrders-img-huydon">
                  Người nhận: Nguyễn Thị Lan Anh - 0977.177.177
                  <img src="<?php echo base_url('public/images/btnMessage.png');?>" alt="" style="height: 27px;">
                  <img src="<?php echo base_url('public/images/btnCall.png');?>" alt="">
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2">
              <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
                <li>
                  <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px">
                </li>
                <li class="pl-2 pt-1 listOrders-img-huydon">
                  Địa chỉ nhận: Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2 listOders-bd-3">
              <ul class="list-unstyled d-flex mb-0">
                <li>
                  <img src="<?php echo base_url('public/images/$.png');?>" alt=""
                    style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
                </li>
                <li class="pl-2 pt-1">
                  <span class="pr-1">COD: 2,480,000 đ</span>
                  <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
                    <span class="pl-1">Phí: 20,000 đ</span>
                    <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                      style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                      data-target="#myModal">
                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                      <div class="modal-dialog">
                        <div class="modal-content" style="margin-top: 67%;    ">
                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                            <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                          </div>
                          <!-- Modal body -->
                          <div class="modal-body ">
                            <ul class="row list-unstyled pl-3 pr-3">
                              <li class="col-md-6">
                                Phí vận chuyển
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí khai giá
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí thu hộ
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí lấy hàng
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí bốc giỡ
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>

                            </ul>
                          </div>
                          <!-- Modal footer -->
                          <div class="modal-footer text-center" style="margin: 0px auto;">
                            Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                          </div>
                        </div>
                      </div>
                    </div>
                </li>
              </ul>
              <ul class="list-unstyled d-flex mb-0" style="width: 50%;" data-toggle="modal" data-target="#cancelOrder">
                <li class="w-100 text-right listOrders-btn-xndh">
                  <div class="pt-2">
                    <span>Huỷ đơn</span>
                  </div>
                </li>
              </ul>
              <div class="modal" id="cancelOrder">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title modal-title-cancelOrder">Thông báo huỷ đơn</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body mt-0 pt-0 pb-0">
                      <ul class="list-unstyled pl-3 pr-3 text-center " style="line-height: 19px;">
                        Bạn có chắc muốn hủy đơn hàng <br>
                        <span class="font-weight-bold">GN88848139199109</span> <br>
                        này không?
                      </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer modal-footer-cancelOrder text-center">
                      <button>Đồng ý</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="listOders-bd-1 pt-2 d-flex mt-2 listOrders-detail-1">
          <div class="w-100 mb-2 ">
            <div class="mr-2 listOders-bd-3">
              <ul class="list-unstyled d-flex mb-0 ">
                <li>
                  <span class="listOders-bd-stt">1</span>
                </li>
                <li class="pl-2">
                  <b>S10724276.B.MB26.K1.D.12.87414502</b>
                </li>
                <li>
                  <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;"
                    class="mt-0">
                </li>
              </ul>
              <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
                <li class="w-100 text-right ">
                  (27/04/2021 18:09:22)
                  <span style="color:#885DE5;">Chờ người gửi mang hàng ra bưu cục</span>
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2  listOders-bd-3">
              <ul class="list-unstyled d-flex mb-0">
                <li>
                  <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px;display: none;">
                  <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px;">
                </li>
                <li class="pl-2">
                  <span style="color: #514D5B;font-weight: 600;">NT6H</span>
                </li>
                <li class="pl-3">
                  (<span style="color: #2DB1DB;">GTT</span>)
                </li>
              </ul>
              <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
                <li class="w-100 text-right list-icon">
                  <img src="<?php echo base_url('public/images/mayin.png');?>">
                  <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
                  <img src="<?php echo base_url('public/images/delete.png');?>">
                  <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
                  <img src="<?php echo base_url('public/images/edit.png');?>">
                  <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
                  <img src="<?php echo base_url('public/images/iconDown11.png');?>">
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2">
              <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
                <li>
                  <img src="<?php echo base_url('public/images/carton-box1.png');?>" alt=""
                    style="width: 18px; height: 18px;margin-left: 0px">
                </li>
                <li class="pl-2 pt-1 listOrders-img-huydon">
                  Hàng hoá: <span style="color: #885DE5;">Đèn trang trí noel (x3), Khuyên tai (x2),...</span>
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2">
              <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
                <li>
                  <img src="<?php echo base_url('public/images/iconUser.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px">
                </li>
                <li class="pl-2 pt-1 listOrders-img-huydon">
                  Người nhận: Nguyễn Thị Lan Anh - 0977.177.177
                  <img src="<?php echo base_url('public/images/btnMessage.png');?>" alt="" style="height: 27px;">
                  <img src="<?php echo base_url('public/images/btnCall.png');?>" alt="">
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2">
              <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
                <li>
                  <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px">
                </li>
                <li class="pl-2 pt-1 listOrders-img-huydon">
                  Địa chỉ nhận: Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2 listOders-bd-3">
              <ul class="list-unstyled d-flex mb-0">
                <li>
                  <img src="<?php echo base_url('public/images/$.png');?>" alt=""
                    style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
                </li>
                <li class="pl-2 pt-1">
                  <span class="pr-1">COD: 2,480,000 đ</span>
                  <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
                    <span class="pl-1">Phí: 20,000 đ</span>
                    <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                      style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                      data-target="#myModal">
                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                      <div class="modal-dialog">
                        <div class="modal-content" style="margin-top: 67%;    ">
                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                            <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                          </div>
                          <!-- Modal body -->
                          <div class="modal-body ">
                            <ul class="row list-unstyled pl-3 pr-3">
                              <li class="col-md-6">
                                Phí vận chuyển
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí khai giá
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí thu hộ
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí lấy hàng
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí bốc giỡ
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>

                            </ul>
                          </div>
                          <!-- Modal footer -->
                          <div class="modal-footer text-center" style="margin: 0px auto;">
                            Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                          </div>
                        </div>
                      </div>
                    </div>
                </li>
              </ul>
              <ul class="list-unstyled d-flex mb-0" style="width: 50%;" data-toggle="modal" data-target="#cancelOrder">
                <li class="w-100 text-right listOrders-btn-xndh">
                  <div class="pt-2">
                    <span>Huỷ đơn</span>
                  </div>
                </li>
              </ul>
              <div class="modal" id="cancelOrder">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title modal-title-cancelOrder">Thông báo huỷ đơn</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body mt-0 pt-0 pb-0">
                      <ul class="list-unstyled pl-3 pr-3 text-center " style="line-height: 19px;">
                        Bạn có chắc muốn hủy đơn hàng <br>
                        <span class="font-weight-bold">GN88848139199109</span> <br>
                        này không?
                      </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer modal-footer-cancelOrder text-center">
                      <button>Đồng ý</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="listOders-bd-1 pt-2 d-flex mt-2 listOrders-detail-1">
          <div class="w-100 mb-2 ">
            <div class="mr-2 listOders-bd-3">
              <ul class="list-unstyled d-flex mb-0 ">
                <li>
                  <span class="listOders-bd-stt">1</span>
                </li>
                <li class="pl-2">
                  <b>S10724276.B.MB26.K1.D.12.87414502</b>
                </li>
                <li>
                  <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;"
                    class="mt-0">
                </li>
              </ul>
              <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
                <li class="w-100 text-right ">
                  (27/04/2021 18:09:22)
                  <span style="color:#885DE5;">Chờ người gửi mang hàng ra bưu cục</span>
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2  listOders-bd-3">
              <ul class="list-unstyled d-flex mb-0">
                <li>
                  <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px;display: none;">
                  <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px;">
                </li>
                <li class="pl-2">
                  <span style="color: #514D5B;font-weight: 600;">NT6H</span>
                </li>
                <li class="pl-3">
                  (<span style="color: #2DB1DB;">GTT</span>)
                </li>
              </ul>
              <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
                <li class="w-100 text-right list-icon">
                  <img src="<?php echo base_url('public/images/mayin.png');?>">
                  <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
                  <img src="<?php echo base_url('public/images/delete.png');?>">
                  <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
                  <img src="<?php echo base_url('public/images/edit.png');?>">
                  <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
                  <img src="<?php echo base_url('public/images/iconDown11.png');?>">
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2">
              <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
                <li>
                  <img src="<?php echo base_url('public/images/carton-box1.png');?>" alt=""
                    style="width: 18px; height: 18px;margin-left: 0px">
                </li>
                <li class="pl-2 pt-1 listOrders-img-huydon">
                  Hàng hoá: <span style="color: #885DE5;">Đèn trang trí noel (x3), Khuyên tai (x2),...</span>
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2">
              <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
                <li>
                  <img src="<?php echo base_url('public/images/iconUser.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px">
                </li>
                <li class="pl-2 pt-1 listOrders-img-huydon">
                  Người nhận: Nguyễn Thị Lan Anh - 0977.177.177
                  <img src="<?php echo base_url('public/images/btnMessage.png');?>" alt="" style="height: 27px;">
                  <img src="<?php echo base_url('public/images/btnCall.png');?>" alt="">
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2">
              <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
                <li>
                  <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px">
                </li>
                <li class="pl-2 pt-1 listOrders-img-huydon">
                  Địa chỉ nhận: Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2 listOders-bd-3">
              <ul class="list-unstyled d-flex mb-0">
                <li>
                  <img src="<?php echo base_url('public/images/$.png');?>" alt=""
                    style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
                </li>
                <li class="pl-2 pt-1">
                  <span class="pr-1">COD: 2,480,000 đ</span>
                  <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
                    <span class="pl-1">Phí: 20,000 đ</span>
                    <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                      style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                      data-target="#myModal">
                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                      <div class="modal-dialog">
                        <div class="modal-content" style="margin-top: 67%;    ">
                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                            <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                          </div>
                          <!-- Modal body -->
                          <div class="modal-body ">
                            <ul class="row list-unstyled pl-3 pr-3">
                              <li class="col-md-6">
                                Phí vận chuyển
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí khai giá
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí thu hộ
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí lấy hàng
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí bốc giỡ
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>

                            </ul>
                          </div>
                          <!-- Modal footer -->
                          <div class="modal-footer text-center" style="margin: 0px auto;">
                            Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                          </div>
                        </div>
                      </div>
                    </div>
                </li>
              </ul>
              <ul class="list-unstyled d-flex mb-0" style="width: 50%;" data-toggle="modal" data-target="#cancelOrder">
                <li class="w-100 text-right listOrders-btn-xndh">
                  <div class="pt-2">
                    <span>Huỷ đơn</span>
                  </div>
                </li>
              </ul>
              <div class="modal" id="cancelOrder">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title modal-title-cancelOrder">Thông báo huỷ đơn</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body mt-0 pt-0 pb-0">
                      <ul class="list-unstyled pl-3 pr-3 text-center " style="line-height: 19px;">
                        Bạn có chắc muốn hủy đơn hàng <br>
                        <span class="font-weight-bold">GN88848139199109</span> <br>
                        này không?
                      </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer modal-footer-cancelOrder text-center">
                      <button>Đồng ý</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="listOders-bd-1 pt-2 d-flex mt-2 listOrders-detail-1">
          <div class="w-100 mb-2 ">
            <div class="mr-2 listOders-bd-3">
              <ul class="list-unstyled d-flex mb-0 ">
                <li>
                  <span class="listOders-bd-stt">1</span>
                </li>
                <li class="pl-2">
                  <b>S10724276.B.MB26.K1.D.12.87414502</b>
                </li>
                <li>
                  <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;"
                    class="mt-0">
                </li>
              </ul>
              <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
                <li class="w-100 text-right ">
                  (27/04/2021 18:09:22)
                  <span style="color:#885DE5;">Chờ người gửi mang hàng ra bưu cục</span>
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2  listOders-bd-3">
              <ul class="list-unstyled d-flex mb-0">
                <li>
                  <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px;display: none;">
                  <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px;">
                </li>
                <li class="pl-2">
                  <span style="color: #514D5B;font-weight: 600;">NT6H</span>
                </li>
                <li class="pl-3">
                  (<span style="color: #2DB1DB;">GTT</span>)
                </li>
              </ul>
              <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
                <li class="w-100 text-right list-icon">
                  <img src="<?php echo base_url('public/images/mayin.png');?>">
                  <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
                  <img src="<?php echo base_url('public/images/delete.png');?>">
                  <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
                  <img src="<?php echo base_url('public/images/edit.png');?>">
                  <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
                  <img src="<?php echo base_url('public/images/iconDown11.png');?>">
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2">
              <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
                <li>
                  <img src="<?php echo base_url('public/images/carton-box1.png');?>" alt=""
                    style="width: 18px; height: 18px;margin-left: 0px">
                </li>
                <li class="pl-2 pt-1 listOrders-img-huydon">
                  Hàng hoá: <span style="color: #885DE5;">Đèn trang trí noel (x3), Khuyên tai (x2),...</span>
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2">
              <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
                <li>
                  <img src="<?php echo base_url('public/images/iconUser.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px">
                </li>
                <li class="pl-2 pt-1 listOrders-img-huydon">
                  Người nhận: Nguyễn Thị Lan Anh - 0977.177.177
                  <img src="<?php echo base_url('public/images/btnMessage.png');?>" alt="" style="height: 27px;">
                  <img src="<?php echo base_url('public/images/btnCall.png');?>" alt="">
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2">
              <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
                <li>
                  <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px">
                </li>
                <li class="pl-2 pt-1 listOrders-img-huydon">
                  Địa chỉ nhận: Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2 listOders-bd-3">
              <ul class="list-unstyled d-flex mb-0">
                <li>
                  <img src="<?php echo base_url('public/images/$.png');?>" alt=""
                    style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
                </li>
                <li class="pl-2 pt-1">
                  <span class="pr-1">COD: 2,480,000 đ</span>
                  <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
                    <span class="pl-1">Phí: 20,000 đ</span>
                    <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                      style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                      data-target="#myModal">
                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                      <div class="modal-dialog">
                        <div class="modal-content" style="margin-top: 67%;    ">
                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                            <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                          </div>
                          <!-- Modal body -->
                          <div class="modal-body ">
                            <ul class="row list-unstyled pl-3 pr-3">
                              <li class="col-md-6">
                                Phí vận chuyển
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí khai giá
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí thu hộ
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí lấy hàng
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí bốc giỡ
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>

                            </ul>
                          </div>
                          <!-- Modal footer -->
                          <div class="modal-footer text-center" style="margin: 0px auto;">
                            Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                          </div>
                        </div>
                      </div>
                    </div>
                </li>
              </ul>
              <ul class="list-unstyled d-flex mb-0" style="width: 50%;" data-toggle="modal" data-target="#cancelOrder">
                <li class="w-100 text-right listOrders-btn-xndh">
                  <div class="pt-2">
                    <span>Huỷ đơn</span>
                  </div>
                </li>
              </ul>
              <div class="modal" id="cancelOrder">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title modal-title-cancelOrder">Thông báo huỷ đơn</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body mt-0 pt-0 pb-0">
                      <ul class="list-unstyled pl-3 pr-3 text-center " style="line-height: 19px;">
                        Bạn có chắc muốn hủy đơn hàng <br>
                        <span class="font-weight-bold">GN88848139199109</span> <br>
                        này không?
                      </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer modal-footer-cancelOrder text-center">
                      <button>Đồng ý</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===================END Danh Sách Đơn Hàng=============== -->
  <!--=================== Danh Sách Đơn Hàng=============== -->
  <div class="listOders-bd-1 pt-2 d-flex mt-2" style="margin-right: -12px;">
    <div class="listOrders-checkbox">
      <input type="checkbox" class="myCheckBox">
    </div>
    <div class="w-100 mb-2 ">
      <div class="mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0 ">
          <li>
            <span class="listOders-bd-stt">1</span>
          </li>
          <li class="pl-2">
            <b>S10724276.B.MB26.K1.D.12.87414502</b>
          </li>
          <li>
            <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;" class="mt-0">
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right ">
            (27/04/2021 18:09:22)
            <span style="color:#885DE5;">Chờ duyệt</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2  listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;display: none;">
            <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;">
          </li>
          <li class="pl-2">
            <span style="color: #514D5B;font-weight: 600;">NT6H</span>
          </li>
          <li>
            <span style="color: #514D5B;font-weight: 600;">10 </span>đơn
            (<span style="color: #2DB1DB;">5 đơn GTT</span>) - 3 điểm
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right list-icon">
            <img src="<?php echo base_url('public/images/mayin.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/delete.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/edit.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/iconDown11.png');?>">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1">
            Gửi từ: Moon Store - 0912333444
            <br>
            Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/$.png');?>" alt=""
              style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
          </li>
          <li class="pl-2 pt-1">
            <span class="pr-1">COD: 2,480,000 đ</span>
            <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
              <span class="pl-1">Phí: 20,000 đ</span>
              <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                data-target="#myModal">
              <!-- The Modal -->
              <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;    ">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body ">
                      <ul class="row list-unstyled pl-3 pr-3">
                        <li class="col-md-6">
                          Phí vận chuyển
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí khai giá
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí thu hộ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí lấy hàng
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí bốc giỡ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>

                      </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer text-center" style="margin: 0px auto;">
                      Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                    </div>
                  </div>
                </div>
              </div>
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right listOrders-btn-xndh">
            <div class="pt-2">
              <!-- <img src="<?php echo base_url('public/images/ship_icon1.png');?>" class="listOders-icon-block">
              <img src="<?php echo base_url('public/images/ship_icon2.png');?>" class="listOders-icon-none"> -->
              <span>Duyệt đơn</span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!--===================END Danh Sách Đơn Hàng=============== -->

  <!--=================== Danh Sách Đơn Hàng=============== -->
  <div class="listOders-bd-1 pt-2 d-flex mt-2" style="margin-right: -12px;">
    <div class="listOrders-checkbox">
      <input type="checkbox" class="myCheckBox">
    </div>
    <div class="w-100 mb-2 ">
      <div class="mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0 ">
          <li>
            <span class="listOders-bd-stt">1</span>
          </li>
          <li class="pl-2">
            <b>S10724276.B.MB26.K1.D.12.87414502</b>
          </li>
          <li>
            <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;" class="mt-0">
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right ">
            (27/04/2021 18:09:22)
            <span style="color:#885DE5;">Tìm tài xế</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2  listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;display: none;">
            <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;">
          </li>
          <li class="pl-2">
            <span style="color: #514D5B;font-weight: 600;">NT6H</span>
          </li>
          <li>
            <span style="color: #514D5B;font-weight: 600;">10 </span>đơn
            (<span style="color: #2DB1DB;">5 đơn GTT</span>) - 3 điểm
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right list-icon">
            <img src="<?php echo base_url('public/images/mayin.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/delete.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/edit.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/iconDown11.png');?>">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1">
            Gửi từ: Moon Store - 0912333444
            <br>
            Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/$.png');?>" alt=""
              style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
          </li>
          <li class="pl-2 pt-1">
            <span class="pr-1">COD: 2,480,000 đ</span>
            <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
              <span class="pl-1">Phí: 20,000 đ</span>
              <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                data-target="#myModal">
              <!-- The Modal -->
              <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;    ">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body ">
                      <ul class="row list-unstyled pl-3 pr-3">
                        <li class="col-md-6">
                          Phí vận chuyển
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí khai giá
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí thu hộ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí lấy hàng
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí bốc giỡ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>

                      </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer text-center" style="margin: 0px auto;">
                      Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                    </div>
                  </div>
                </div>
              </div>
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right listOrders-btn-xndh">
            <div class="listOrders-btn-dangtim">
              <img src="<?php echo base_url('public/images/ship_icon11.png');?>" class="listOders-icon-block">
              <img src="<?php echo base_url('public/images/ship_icon2.png');?>" class="listOders-icon-none">
              <span style="color: #F0A616;">Đang tìm ...</span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!--===================END Danh Sách Đơn Hàng=============== -->
  <!--=================== Danh Sách Đơn Hàng=============== -->
  <div class="listOders-bd-1 pt-2 d-flex mt-2" style="margin-right: -12px;">
    <div class="listOrders-checkbox">
      <input type="checkbox" class="myCheckBox">
    </div>
    <div class="w-100 mb-2 ">
      <div class="mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0 ">
          <li>
            <span class="listOders-bd-stt">1</span>
          </li>
          <li class="pl-2">
            <b>S10724276.B.MB26.K1.D.12.87414502</b>
          </li>
          <li>
            <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;" class="mt-0">
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right ">
            (27/04/2021 18:09:22)
            <span style="color:#885DE5;">Chờ người gửi mang hàng ra bưu cục</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2  listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;display: none;">
            <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;">
          </li>
          <li class="pl-2">
            <span style="color: #514D5B;font-weight: 600;">NT6H</span>
          </li>
          <li>
            <span style="color: #514D5B;font-weight: 600;">10 </span>đơn
            (<span style="color: #2DB1DB;">5 đơn GTT</span>) - 3 điểm
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right list-icon">
            <img src="<?php echo base_url('public/images/mayin.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/delete.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/edit.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/iconDown11.png');?>">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconUser.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Shipper: Nguyễn Hải Phong - 0912333444
            <img src="<?php echo base_url('public/images/btnMessage.png');?>" alt="" style="height: 27px;">
            <img src="<?php echo base_url('public/images/btnCall.png');?>" alt="">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Gửi từ: Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/$.png');?>" alt=""
              style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
          </li>
          <li class="pl-2 pt-1">
            <span class="pr-1">COD: 2,480,000 đ</span>
            <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
              <span class="pl-1">Phí: 20,000 đ</span>
              <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                data-target="#myModal">
              <!-- The Modal -->
              <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;    ">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body ">
                      <ul class="row list-unstyled pl-3 pr-3">
                        <li class="col-md-6">
                          Phí vận chuyển
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí khai giá
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí thu hộ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí lấy hàng
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí bốc giỡ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>

                      </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer text-center" style="margin: 0px auto;">
                      Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                    </div>
                  </div>
                </div>
              </div>
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;" data-toggle="modal" data-target="#cancelOrder">
          <li class="w-100 text-right listOrders-btn-xndh">
            <div class="pt-2">
              <span>Huỷ đơn</span>
            </div>
          </li>
        </ul>
        <div class="modal" id="cancelOrder">
          <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 67%;">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title modal-title-cancelOrder">Thông báo huỷ đơn</b></h4>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body mt-0 pt-0 pb-0">
                <ul class="list-unstyled pl-3 pr-3 text-center " style="line-height: 19px;">
                  Bạn có chắc muốn hủy đơn hàng <br>
                  <span class="font-weight-bold">GN88848139199109</span> <br>
                  này không?
                </ul>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer modal-footer-cancelOrder text-center">
                <button>Đồng ý</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===================END Danh Sách Đơn Hàng=============== -->
  <!--=================== Danh Sách Đơn Hàng=============== -->
  <div class="listOders-bd-1 pt-2 d-flex mt-2" style="margin-right: -12px;">
    <div class="listOrders-checkbox">
      <input type="checkbox" class="myCheckBox">
    </div>
    <div class="w-100 mb-2 ">
      <div class="mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <span class="listOders-bd-stt">1</span>
          </li>
          <li class="pl-2">
            <b>S10724276.B.MB26.K1.D.12.87414502</b>
          </li>
          <li>
            <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;" class="mt-0">
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right ">
            (27/04/2021 18:09:22)
            <span style="color:#885DE5;">Lưu nháp</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2  listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
            <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;display: none;">
          </li>
          <li class="pl-2">
            <span style="color: #514D5B;font-weight: 600;">NT6H</span>
          </li>
          <li>
            <span style="color: #514D5B;font-weight: 600;">10 </span>đơn
            (<span style="color: #2DB1DB;">5 đơn GTT</span>) - 3 điểm
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right list-icon">
            <img src="<?php echo base_url('public/images/mayin.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/delete.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/edit.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/iconDown11.png');?>" onclick="showInfoDetail(1)"
              id="btn-showdetail-1" class="btn-showDetail">
            <img src="<?php echo base_url('public/images/iconDownL.png');?>" onclick="noneInfoDetail(1)"
              id="btn-nonedetail-1" class="btn-noneDetail">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1">
            Gửi từ: Moon Store - 0912333444
            <br>
            Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/$.png');?>" alt=""
              style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
          </li>
          <li class="pl-2 pt-1">
            <span class="pr-1">COD: 2,480,000 đ</span>
            <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
              <span class="pl-1">Phí: 20,000 đ</span>
              <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                data-target="#myModal">
              <!-- The Modal -->
              <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;    ">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body ">
                      <ul class="row list-unstyled pl-3 pr-3">
                        <li class="col-md-6">
                          Phí vận chuyển
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí khai giá
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí thu hộ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí lấy hàng
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí bốc giỡ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>

                      </ul>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer text-center" style="margin: 0px auto;">
                      Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                    </div>

                  </div>
                </div>
              </div>
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right listOrders-btn-xndh">
            <div>

              <span>Tiếp tục</span>
            </div>
          </li>
        </ul>
      </div>

      <div id="lstOr-detail-1">
        <div class="lstOders-line-detail"></div>
        <div class="listOders-bd-1 pt-2 d-flex mt-2 listOrders-detail-1">
          <div class="w-100 mb-2 ">
            <div class="mr-2 listOders-bd-3">
              <ul class="list-unstyled d-flex mb-0 ">
                <li>
                  <span class="listOders-bd-stt">1</span>
                </li>
                <li class="pl-2">
                  <b>S10724276.B.MB26.K1.D.12.87414502</b>
                </li>
                <li>
                  <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;"
                    class="mt-0">
                </li>
              </ul>
              <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
                <li class="w-100 text-right ">
                  (27/04/2021 18:09:22)
                  <span style="color:#885DE5;">Chờ người gửi mang hàng ra bưu cục</span>
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2  listOders-bd-3">
              <ul class="list-unstyled d-flex mb-0">
                <li>
                  <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px;display: none;">
                  <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px;">
                </li>
                <li class="pl-2">
                  <span style="color: #514D5B;font-weight: 600;">NT6H</span>
                </li>
                <li class="pl-3">
                  (<span style="color: #2DB1DB;">GTT</span>)
                </li>
              </ul>
              <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
                <li class="w-100 text-right list-icon">
                  <img src="<?php echo base_url('public/images/mayin.png');?>">
                  <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
                  <img src="<?php echo base_url('public/images/delete.png');?>">
                  <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
                  <img src="<?php echo base_url('public/images/edit.png');?>">
                  <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
                  <img src="<?php echo base_url('public/images/iconDown11.png');?>">
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2">
              <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
                <li>
                  <img src="<?php echo base_url('public/images/carton-box1.png');?>" alt=""
                    style="width: 18px; height: 18px;margin-left: 0px">
                </li>
                <li class="pl-2 pt-1 listOrders-img-huydon">
                  Hàng hoá: <span style="color: #885DE5;">Đèn trang trí noel (x3), Khuyên tai (x2),...</span>
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2">
              <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
                <li>
                  <img src="<?php echo base_url('public/images/iconUser.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px">
                </li>
                <li class="pl-2 pt-1 listOrders-img-huydon">
                  Người nhận: Nguyễn Thị Lan Anh - 0977.177.177
                  <img src="<?php echo base_url('public/images/btnMessage.png');?>" alt="" style="height: 27px;">
                  <img src="<?php echo base_url('public/images/btnCall.png');?>" alt="">
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2">
              <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
                <li>
                  <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px">
                </li>
                <li class="pl-2 pt-1 listOrders-img-huydon">
                  Địa chỉ nhận: Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2 listOders-bd-3">
              <ul class="list-unstyled d-flex mb-0">
                <li>
                  <img src="<?php echo base_url('public/images/$.png');?>" alt=""
                    style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
                </li>
                <li class="pl-2 pt-1">
                  <span class="pr-1">COD: 2,480,000 đ</span>
                  <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
                    <span class="pl-1">Phí: 20,000 đ</span>
                    <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                      style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                      data-target="#myModal">
                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                      <div class="modal-dialog">
                        <div class="modal-content" style="margin-top: 67%;    ">
                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                            <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                          </div>
                          <!-- Modal body -->
                          <div class="modal-body ">
                            <ul class="row list-unstyled pl-3 pr-3">
                              <li class="col-md-6">
                                Phí vận chuyển
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí khai giá
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí thu hộ
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí lấy hàng
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí bốc giỡ
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>

                            </ul>
                          </div>
                          <!-- Modal footer -->
                          <div class="modal-footer text-center" style="margin: 0px auto;">
                            Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                          </div>
                        </div>
                      </div>
                    </div>
                </li>
              </ul>
              <ul class="list-unstyled d-flex mb-0" style="width: 50%;" data-toggle="modal" data-target="#cancelOrder">
                <li class="w-100 text-right listOrders-btn-xndh">
                  <div class="pt-2">
                    <span>Huỷ đơn</span>
                  </div>
                </li>
              </ul>
              <div class="modal" id="cancelOrder">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title modal-title-cancelOrder">Thông báo huỷ đơn</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body mt-0 pt-0 pb-0">
                      <ul class="list-unstyled pl-3 pr-3 text-center " style="line-height: 19px;">
                        Bạn có chắc muốn hủy đơn hàng <br>
                        <span class="font-weight-bold">GN88848139199109</span> <br>
                        này không?
                      </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer modal-footer-cancelOrder text-center">
                      <button>Đồng ý</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="listOders-bd-1 pt-2 d-flex mt-2 listOrders-detail-1">
          <div class="w-100 mb-2 ">
            <div class="mr-2 listOders-bd-3">
              <ul class="list-unstyled d-flex mb-0 ">
                <li>
                  <span class="listOders-bd-stt">1</span>
                </li>
                <li class="pl-2">
                  <b>S10724276.B.MB26.K1.D.12.87414502</b>
                </li>
                <li>
                  <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;"
                    class="mt-0">
                </li>
              </ul>
              <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
                <li class="w-100 text-right ">
                  (27/04/2021 18:09:22)
                  <span style="color:#885DE5;">Chờ người gửi mang hàng ra bưu cục</span>
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2  listOders-bd-3">
              <ul class="list-unstyled d-flex mb-0">
                <li>
                  <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px;display: none;">
                  <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px;">
                </li>
                <li class="pl-2">
                  <span style="color: #514D5B;font-weight: 600;">NT6H</span>
                </li>
                <li class="pl-3">
                  (<span style="color: #2DB1DB;">GTT</span>)
                </li>
              </ul>
              <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
                <li class="w-100 text-right list-icon">
                  <img src="<?php echo base_url('public/images/mayin.png');?>">
                  <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
                  <img src="<?php echo base_url('public/images/delete.png');?>">
                  <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
                  <img src="<?php echo base_url('public/images/edit.png');?>">
                  <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
                  <img src="<?php echo base_url('public/images/iconDown11.png');?>">
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2">
              <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
                <li>
                  <img src="<?php echo base_url('public/images/carton-box1.png');?>" alt=""
                    style="width: 18px; height: 18px;margin-left: 0px">
                </li>
                <li class="pl-2 pt-1 listOrders-img-huydon">
                  Hàng hoá: <span style="color: #885DE5;">Đèn trang trí noel (x3), Khuyên tai (x2),...</span>
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2">
              <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
                <li>
                  <img src="<?php echo base_url('public/images/iconUser.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px">
                </li>
                <li class="pl-2 pt-1 listOrders-img-huydon">
                  Người nhận: Nguyễn Thị Lan Anh - 0977.177.177
                  <img src="<?php echo base_url('public/images/btnMessage.png');?>" alt="" style="height: 27px;">
                  <img src="<?php echo base_url('public/images/btnCall.png');?>" alt="">
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2">
              <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
                <li>
                  <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px">
                </li>
                <li class="pl-2 pt-1 listOrders-img-huydon">
                  Địa chỉ nhận: Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2 listOders-bd-3">
              <ul class="list-unstyled d-flex mb-0">
                <li>
                  <img src="<?php echo base_url('public/images/$.png');?>" alt=""
                    style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
                </li>
                <li class="pl-2 pt-1">
                  <span class="pr-1">COD: 2,480,000 đ</span>
                  <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
                    <span class="pl-1">Phí: 20,000 đ</span>
                    <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                      style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                      data-target="#myModal">
                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                      <div class="modal-dialog">
                        <div class="modal-content" style="margin-top: 67%;    ">
                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                            <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                          </div>
                          <!-- Modal body -->
                          <div class="modal-body ">
                            <ul class="row list-unstyled pl-3 pr-3">
                              <li class="col-md-6">
                                Phí vận chuyển
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí khai giá
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí thu hộ
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí lấy hàng
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí bốc giỡ
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>

                            </ul>
                          </div>
                          <!-- Modal footer -->
                          <div class="modal-footer text-center" style="margin: 0px auto;">
                            Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                          </div>
                        </div>
                      </div>
                    </div>
                </li>
              </ul>
              <ul class="list-unstyled d-flex mb-0" style="width: 50%;" data-toggle="modal" data-target="#cancelOrder">
                <li class="w-100 text-right listOrders-btn-xndh">
                  <div class="pt-2">
                    <span>Huỷ đơn</span>
                  </div>
                </li>
              </ul>
              <div class="modal" id="cancelOrder">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title modal-title-cancelOrder">Thông báo huỷ đơn</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body mt-0 pt-0 pb-0">
                      <ul class="list-unstyled pl-3 pr-3 text-center " style="line-height: 19px;">
                        Bạn có chắc muốn hủy đơn hàng <br>
                        <span class="font-weight-bold">GN88848139199109</span> <br>
                        này không?
                      </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer modal-footer-cancelOrder text-center">
                      <button>Đồng ý</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="listOders-bd-1 pt-2 d-flex mt-2 listOrders-detail-1">
          <div class="w-100 mb-2 ">
            <div class="mr-2 listOders-bd-3">
              <ul class="list-unstyled d-flex mb-0 ">
                <li>
                  <span class="listOders-bd-stt">1</span>
                </li>
                <li class="pl-2">
                  <b>S10724276.B.MB26.K1.D.12.87414502</b>
                </li>
                <li>
                  <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;"
                    class="mt-0">
                </li>
              </ul>
              <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
                <li class="w-100 text-right ">
                  (27/04/2021 18:09:22)
                  <span style="color:#885DE5;">Chờ người gửi mang hàng ra bưu cục</span>
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2  listOders-bd-3">
              <ul class="list-unstyled d-flex mb-0">
                <li>
                  <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px;display: none;">
                  <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px;">
                </li>
                <li class="pl-2">
                  <span style="color: #514D5B;font-weight: 600;">NT6H</span>
                </li>
                <li class="pl-3">
                  (<span style="color: #2DB1DB;">GTT</span>)
                </li>
              </ul>
              <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
                <li class="w-100 text-right list-icon">
                  <img src="<?php echo base_url('public/images/mayin.png');?>">
                  <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
                  <img src="<?php echo base_url('public/images/delete.png');?>">
                  <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
                  <img src="<?php echo base_url('public/images/edit.png');?>">
                  <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
                  <img src="<?php echo base_url('public/images/iconDown11.png');?>">
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2">
              <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
                <li>
                  <img src="<?php echo base_url('public/images/carton-box1.png');?>" alt=""
                    style="width: 18px; height: 18px;margin-left: 0px">
                </li>
                <li class="pl-2 pt-1 listOrders-img-huydon">
                  Hàng hoá: <span style="color: #885DE5;">Đèn trang trí noel (x3), Khuyên tai (x2),...</span>
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2">
              <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
                <li>
                  <img src="<?php echo base_url('public/images/iconUser.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px">
                </li>
                <li class="pl-2 pt-1 listOrders-img-huydon">
                  Người nhận: Nguyễn Thị Lan Anh - 0977.177.177
                  <img src="<?php echo base_url('public/images/btnMessage.png');?>" alt="" style="height: 27px;">
                  <img src="<?php echo base_url('public/images/btnCall.png');?>" alt="">
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2">
              <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
                <li>
                  <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px">
                </li>
                <li class="pl-2 pt-1 listOrders-img-huydon">
                  Địa chỉ nhận: Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2 listOders-bd-3">
              <ul class="list-unstyled d-flex mb-0">
                <li>
                  <img src="<?php echo base_url('public/images/$.png');?>" alt=""
                    style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
                </li>
                <li class="pl-2 pt-1">
                  <span class="pr-1">COD: 2,480,000 đ</span>
                  <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
                    <span class="pl-1">Phí: 20,000 đ</span>
                    <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                      style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                      data-target="#myModal">
                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                      <div class="modal-dialog">
                        <div class="modal-content" style="margin-top: 67%;    ">
                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                            <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                          </div>
                          <!-- Modal body -->
                          <div class="modal-body ">
                            <ul class="row list-unstyled pl-3 pr-3">
                              <li class="col-md-6">
                                Phí vận chuyển
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí khai giá
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí thu hộ
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí lấy hàng
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí bốc giỡ
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>

                            </ul>
                          </div>
                          <!-- Modal footer -->
                          <div class="modal-footer text-center" style="margin: 0px auto;">
                            Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                          </div>
                        </div>
                      </div>
                    </div>
                </li>
              </ul>
              <ul class="list-unstyled d-flex mb-0" style="width: 50%;" data-toggle="modal" data-target="#cancelOrder">
                <li class="w-100 text-right listOrders-btn-xndh">
                  <div class="pt-2">
                    <span>Huỷ đơn</span>
                  </div>
                </li>
              </ul>
              <div class="modal" id="cancelOrder">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title modal-title-cancelOrder">Thông báo huỷ đơn</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body mt-0 pt-0 pb-0">
                      <ul class="list-unstyled pl-3 pr-3 text-center " style="line-height: 19px;">
                        Bạn có chắc muốn hủy đơn hàng <br>
                        <span class="font-weight-bold">GN88848139199109</span> <br>
                        này không?
                      </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer modal-footer-cancelOrder text-center">
                      <button>Đồng ý</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="listOders-bd-1 pt-2 d-flex mt-2 listOrders-detail-1">
          <div class="w-100 mb-2 ">
            <div class="mr-2 listOders-bd-3">
              <ul class="list-unstyled d-flex mb-0 ">
                <li>
                  <span class="listOders-bd-stt">1</span>
                </li>
                <li class="pl-2">
                  <b>S10724276.B.MB26.K1.D.12.87414502</b>
                </li>
                <li>
                  <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;"
                    class="mt-0">
                </li>
              </ul>
              <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
                <li class="w-100 text-right ">
                  (27/04/2021 18:09:22)
                  <span style="color:#885DE5;">Chờ người gửi mang hàng ra bưu cục</span>
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2  listOders-bd-3">
              <ul class="list-unstyled d-flex mb-0">
                <li>
                  <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px;display: none;">
                  <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px;">
                </li>
                <li class="pl-2">
                  <span style="color: #514D5B;font-weight: 600;">NT6H</span>
                </li>
                <li class="pl-3">
                  (<span style="color: #2DB1DB;">GTT</span>)
                </li>
              </ul>
              <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
                <li class="w-100 text-right list-icon">
                  <img src="<?php echo base_url('public/images/mayin.png');?>">
                  <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
                  <img src="<?php echo base_url('public/images/delete.png');?>">
                  <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
                  <img src="<?php echo base_url('public/images/edit.png');?>">
                  <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
                  <img src="<?php echo base_url('public/images/iconDown11.png');?>">
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2">
              <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
                <li>
                  <img src="<?php echo base_url('public/images/carton-box1.png');?>" alt=""
                    style="width: 18px; height: 18px;margin-left: 0px">
                </li>
                <li class="pl-2 pt-1 listOrders-img-huydon">
                  Hàng hoá: <span style="color: #885DE5;">Đèn trang trí noel (x3), Khuyên tai (x2),...</span>
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2">
              <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
                <li>
                  <img src="<?php echo base_url('public/images/iconUser.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px">
                </li>
                <li class="pl-2 pt-1 listOrders-img-huydon">
                  Người nhận: Nguyễn Thị Lan Anh - 0977.177.177
                  <img src="<?php echo base_url('public/images/btnMessage.png');?>" alt="" style="height: 27px;">
                  <img src="<?php echo base_url('public/images/btnCall.png');?>" alt="">
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2">
              <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
                <li>
                  <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
                    style="width: 20px; height: 20px;margin-left: 0px">
                </li>
                <li class="pl-2 pt-1 listOrders-img-huydon">
                  Địa chỉ nhận: Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
                </li>
              </ul>
            </div>
            <div class="pt-1 mr-2 listOders-bd-3">
              <ul class="list-unstyled d-flex mb-0">
                <li>
                  <img src="<?php echo base_url('public/images/$.png');?>" alt=""
                    style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
                </li>
                <li class="pl-2 pt-1">
                  <span class="pr-1">COD: 2,480,000 đ</span>
                  <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
                    <span class="pl-1">Phí: 20,000 đ</span>
                    <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                      style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                      data-target="#myModal">
                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                      <div class="modal-dialog">
                        <div class="modal-content" style="margin-top: 67%;    ">
                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                            <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                          </div>
                          <!-- Modal body -->
                          <div class="modal-body ">
                            <ul class="row list-unstyled pl-3 pr-3">
                              <li class="col-md-6">
                                Phí vận chuyển
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí khai giá
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí thu hộ
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí lấy hàng
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>
                              <li class="col-md-6">
                                Phí bốc giỡ
                              </li>
                              <li class="col-md-6 text-right">
                                <b>40,000đ</b>
                              </li>

                            </ul>
                          </div>
                          <!-- Modal footer -->
                          <div class="modal-footer text-center" style="margin: 0px auto;">
                            Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                          </div>
                        </div>
                      </div>
                    </div>
                </li>
              </ul>
              <ul class="list-unstyled d-flex mb-0" style="width: 50%;" data-toggle="modal" data-target="#cancelOrder">
                <li class="w-100 text-right listOrders-btn-xndh">
                  <div class="pt-2">
                    <span>Huỷ đơn</span>
                  </div>
                </li>
              </ul>
              <div class="modal" id="cancelOrder">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title modal-title-cancelOrder">Thông báo huỷ đơn</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body mt-0 pt-0 pb-0">
                      <ul class="list-unstyled pl-3 pr-3 text-center " style="line-height: 19px;">
                        Bạn có chắc muốn hủy đơn hàng <br>
                        <span class="font-weight-bold">GN88848139199109</span> <br>
                        này không?
                      </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer modal-footer-cancelOrder text-center">
                      <button>Đồng ý</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===================END Danh Sách Đơn Hàng=============== -->

  <!--=================== Danh Sách Đơn Hàng Đang Giao=============== -->
  <div class="listOders-bd-1 pt-2 d-flex mt-2 ml-0 listOrders-detail-1" style="margin-right: -12px;">
    <div style="padding-right: 20px;" class="pt-1">
      <input type="checkbox" class="myCheckBox">
    </div>
    <div class="w-100 mb-2 ">
      <div class="mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0 ">
          <li>
            <span class="listOders-bd-stt">1</span>
          </li>
          <li class="pl-2">
            <b>S10724276.B.MB26.K1.D.12.87414502</b>
          </li>
          <li>
            <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;" class="mt-0">
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right ">
            (27/04/2021 18:09:22)
            <span style="color:#885DE5;">Đang giao</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2  listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;display: none;">
            <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;">
          </li>
          <li class="pl-2">
            <span style="color: #514D5B;font-weight: 600;">NT6H</span>
          </li>
          <li class="pl-3">
            (<span style="color: #2DB1DB;">GTT</span>)
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right list-icon">
            <img src="<?php echo base_url('public/images/mayin.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/delete.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/edit.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/iconDown11.png');?>">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/carton-box1.png');?>" alt=""
              style="width: 18px; height: 18px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Hàng hoá: <span style="color: #885DE5;">Đèn trang trí noel (x3), Khuyên tai (x2),...</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconUser.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Người nhận: Nguyễn Thị Lan Anh - 0977.177.177
            <img src="<?php echo base_url('public/images/btnMessage.png');?>" alt="" style="height: 27px;">
            <img src="<?php echo base_url('public/images/btnCall.png');?>" alt="">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Địa chỉ nhận: Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/$.png');?>" alt=""
              style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
          </li>
          <li class="pl-2 pt-1">
            <span class="pr-1">COD: 2,480,000 đ</span>
            <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
              <span class="pl-1">Phí: 20,000 đ</span>
              <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                data-target="#myModal">
              <!-- The Modal -->
              <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;    ">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body ">
                      <ul class="row list-unstyled pl-3 pr-3">
                        <li class="col-md-6">
                          Phí vận chuyển
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí khai giá
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí thu hộ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí lấy hàng
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí bốc giỡ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>

                      </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer text-center" style="margin: 0px auto;">
                      Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                    </div>
                  </div>
                </div>
              </div>
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;" data-toggle="modal" data-target="#cancelOrder">
          <li class="w-100 text-right listOrders-btn-xndh">
            <div class="pt-2">
              <span>Xác nhận</span>
            </div>
          </li>
        </ul>
        <div class="modal" id="cancelOrder">
          <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 67%;">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title modal-title-cancelOrder">Thông báo huỷ đơn</b></h4>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body mt-0 pt-0 pb-0">
                <ul class="list-unstyled pl-3 pr-3 text-center " style="line-height: 19px;">
                  Bạn có chắc muốn hủy đơn hàng <br>
                  <span class="font-weight-bold">GN88848139199109</span> <br>
                  này không?
                </ul>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer modal-footer-cancelOrder text-center">
                <button>Đồng ý</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===================END Danh Sách Đơn Hàng Đang Giao=============== -->

  <!--=================== Danh Sách Đơn Hàng Lấy Thất Bại=============== -->
  <div class="listOders-bd-1 pt-2 d-flex mt-2 ml-0 listOrders-detail-1" style="margin-right: -12px;">
    <div style="padding-right: 20px;" class="pt-1">
      <input type="checkbox" class="myCheckBox">
    </div>
    <div class="w-100 mb-2">
      <div class="mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0 ">
          <li>
            <span class="listOders-bd-stt">1</span>
          </li>
          <li class="pl-2">
            <b>S10724276.B.MB26.K1.D.12.87414502</b>
          </li>
          <li>
            <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;" class="mt-0">
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right ">
            (27/04/2021 18:09:22)
            <span style="color:#885DE5;">Lấy hàng thất bại </span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2  listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;display: none;">
            <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;">
          </li>
          <li class="pl-2">
            <span style="color: #514D5B;font-weight: 600;">NT6H</span>
          </li>
          <li class="pl-3">
            (<span style="color: #2DB1DB;">GTT</span>)
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right list-icon">
            <img src="<?php echo base_url('public/images/mayin.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/delete.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/edit.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/iconDown11.png');?>">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/carton-box1.png');?>" alt=""
              style="width: 18px; height: 18px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Hàng hoá: <span style="color: #885DE5;">Đèn trang trí noel (x3), Khuyên tai (x2),...</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconUser.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Người nhận: Nguyễn Thị Lan Anh - 0977.177.177
            <img src="<?php echo base_url('public/images/btnMessage.png');?>" alt="" style="height: 27px;">
            <img src="<?php echo base_url('public/images/btnCall.png');?>" alt="">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Địa chỉ nhận: Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2 listOders-bd-3 btn-double">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/$.png');?>" alt=""
              style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
          </li>
          <li class="pl-2 pt-1">
            <span class="pr-1">COD: 2,480,000 đ</span>
            <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
              <span class="pl-1">Phí: 20,000 đ</span>
              <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                data-target="#myModal">
              <!-- The Modal -->
              <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;    ">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body ">
                      <ul class="row list-unstyled pl-3 pr-3">
                        <li class="col-md-6">
                          Phí vận chuyển
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí khai giá
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí thu hộ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí lấy hàng
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí bốc giỡ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>

                      </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer text-center" style="margin: 0px auto;">
                      Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                    </div>
                  </div>
                </div>
              </div>
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;" data-toggle="modal" data-target="#cancelOrder">
          <li class="w-100 text-right listOrders-btn-xndh">
            <div class="pt-2 ml-2">
              <span>Xác nhận</span>
            </div>
            <div class="pt-2">
              <span>Huỷ đơn</span>
            </div>
          </li>
        </ul>

        <div class="modal" id="cancelOrder">
          <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 67%;">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title modal-title-cancelOrder">Thông báo huỷ đơn</b></h4>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body mt-0 pt-0 pb-0">
                <ul class="list-unstyled pl-3 pr-3 text-center " style="line-height: 19px;">
                  Bạn có chắc muốn hủy đơn hàng <br>
                  <span class="font-weight-bold">GN88848139199109</span> <br>
                  này không?
                </ul>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer modal-footer-cancelOrder text-center">
                <button>Đồng ý</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===================END Danh Sách Đơn Hàng Lấy Thất Bại=============== -->


  <!--=================== Danh Sách Đơn Hàng Lưu Kho=============== -->
  <div class="listOders-bd-1 pt-2 d-flex mt-2 ml-0 listOrders-detail-1" style="margin-right: -12px;">
    <div style="padding-right: 20px;" class="pt-1">
      <input type="checkbox" class="myCheckBox">
    </div>
    <div class="w-100 mb-2 ">
      <div class="mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0 ">
          <li>
            <span class="listOders-bd-stt">1</span>
          </li>
          <li class="pl-2">
            <b>S10724276.B.MB26.K1.D.12.87414502</b>
          </li>
          <li>
            <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;" class="mt-0">
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right ">
            (27/04/2021 18:09:22)
            <span style="color:#885DE5;">Lưu kho </span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2  listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;display: none;">
            <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;">
          </li>
          <li class="pl-2">
            <span style="color: #514D5B;font-weight: 600;">NT6H</span>
          </li>
          <li class="pl-3">
            (<span style="color: #2DB1DB;">GTT</span>)
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right list-icon">
            <img src="<?php echo base_url('public/images/mayin.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/delete.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/edit.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/iconDown11.png');?>">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/carton-box1.png');?>" alt=""
              style="width: 18px; height: 18px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Hàng hoá: <span style="color: #885DE5;">Đèn trang trí noel (x3), Khuyên tai (x2),...</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconUser.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Người nhận: Nguyễn Thị Lan Anh - 0977.177.177
            <img src="<?php echo base_url('public/images/btnMessage.png');?>" alt="" style="height: 27px;">
            <img src="<?php echo base_url('public/images/btnCall.png');?>" alt="">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Địa chỉ nhận: Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/$.png');?>" alt=""
              style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
          </li>
          <li class="pl-2 pt-1">
            <span class="pr-1">COD: 2,480,000 đ</span>
            <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
              <span class="pl-1">Phí: 20,000 đ</span>
              <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                data-target="#myModal">
              <!-- The Modal -->
              <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;    ">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body ">
                      <ul class="row list-unstyled pl-3 pr-3">
                        <li class="col-md-6">
                          Phí vận chuyển
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí khai giá
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí thu hộ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí lấy hàng
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí bốc giỡ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>

                      </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer text-center" style="margin: 0px auto;">
                      Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                    </div>
                  </div>
                </div>
              </div>
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;" data-toggle="modal" data-target="#cancelOrder">
          <li class="w-100 text-right listOrders-btn-xndh">
            <div class="pt-2 ml-2">
              <span>Xác nhận</span>
            </div>
            <div class="pt-2">
              <span>Huỷ đơn</span>
            </div>
          </li>
        </ul>
        <div class="modal" id="cancelOrder">
          <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 67%;">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title modal-title-cancelOrder">Thông báo huỷ đơn</b></h4>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body mt-0 pt-0 pb-0">
                <ul class="list-unstyled pl-3 pr-3 text-center " style="line-height: 19px;">
                  Bạn có chắc muốn hủy đơn hàng <br>
                  <span class="font-weight-bold">GN88848139199109</span> <br>
                  này không?
                </ul>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer modal-footer-cancelOrder text-center">
                <button>Đồng ý</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===================END Danh Sách Đơn Hàng Lưu Kho=============== -->

  <!--=================== Danh Sách Đơn Hàng Giao Thất Bại  =============== -->
  <div class="listOders-bd-1 pt-2 d-flex mt-2 ml-0 listOrders-detail-1" style="margin-right: -12px;">
    <div style="padding-right: 20px;" class="pt-1">
      <input type="checkbox" class="myCheckBox">
    </div>
    <div class="w-100 mb-2 ">
      <div class="mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0 ">
          <li>
            <span class="listOders-bd-stt">1</span>
          </li>
          <li class="pl-2">
            <b>S10724276.B.MB26.K1.D.12.87414502</b>
          </li>
          <li>
            <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;" class="mt-0">
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right ">
            (27/04/2021 18:09:22)
            <span style="color:#885DE5;">Lấy thất bại </span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2  listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;display: none;">
            <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;">
          </li>
          <li class="pl-2">
            <span style="color: #514D5B;font-weight: 600;">NT6H</span>
          </li>
          <li class="pl-3">
            (<span style="color: #2DB1DB;">GTT</span>)
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right list-icon">
            <img src="<?php echo base_url('public/images/mayin.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/delete.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/edit.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/iconDown11.png');?>">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/carton-box1.png');?>" alt=""
              style="width: 18px; height: 18px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Hàng hoá: <span style="color: #885DE5;">Đèn trang trí noel (x3), Khuyên tai (x2),...</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconUser.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Người nhận: Nguyễn Thị Lan Anh - 0977.177.177
            <img src="<?php echo base_url('public/images/btnMessage.png');?>" alt="" style="height: 27px;">
            <img src="<?php echo base_url('public/images/btnCall.png');?>" alt="">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Địa chỉ nhận: Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/$.png');?>" alt=""
              style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
          </li>
          <li class="pl-2 pt-1">
            <span class="pr-1">COD: 2,480,000 đ</span>
            <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
              <span class="pl-1">Phí: 20,000 đ</span>
              <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                data-target="#myModal">
              <!-- The Modal -->
              <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;    ">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body ">
                      <ul class="row list-unstyled pl-3 pr-3">
                        <li class="col-md-6">
                          Phí vận chuyển
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí khai giá
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí thu hộ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí lấy hàng
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí bốc giỡ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>

                      </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer text-center" style="margin: 0px auto;">
                      Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                    </div>
                  </div>
                </div>
              </div>
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;" data-toggle="modal" data-target="#cancelOrder">
          <li class="w-100 text-right listOrders-btn-xndh">
            <div class="pt-2 ml-2">
              <span>Chuyển hoàn</span>
            </div>
          </li>
        </ul>
        <div class="modal" id="cancelOrder">
          <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 67%;">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title modal-title-cancelOrder">Thông báo huỷ đơn</b></h4>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body mt-0 pt-0 pb-0">
                <ul class="list-unstyled pl-3 pr-3 text-center " style="line-height: 19px;">
                  Bạn có chắc muốn hủy đơn hàng <br>
                  <span class="font-weight-bold">GN88848139199109</span> <br>
                  này không?
                </ul>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer modal-footer-cancelOrder text-center">
                <button>Đồng ý</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===================END Danh Sách Đơn Hàng Giao Thất Bại =============== -->

  <!--=================== Danh Sách Đơn Hàng Delay Giao  =============== -->
  <div class="listOders-bd-1 pt-2 d-flex mt-2 ml-0 listOrders-detail-1" style="margin-right: -12px;">
    <div style="padding-right: 20px;" class="pt-1">
      <input type="checkbox" class="myCheckBox">
    </div>
    <div class="w-100 mb-2 ">
      <div class="mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0 ">
          <li>
            <span class="listOders-bd-stt">1</span>
          </li>
          <li class="pl-2">
            <b>S10724276.B.MB26.K1.D.12.87414502</b>
          </li>
          <li>
            <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;" class="mt-0">
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right ">
            (27/04/2021 18:09:22)
            <span style="color:#885DE5;">Lưu kho - Delay giao </span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2  listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;display: none;">
            <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;">
          </li>
          <li class="pl-2">
            <span style="color: #514D5B;font-weight: 600;">NT6H</span>
          </li>
          <li class="pl-3">
            (<span style="color: #2DB1DB;">GTT</span>)
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right list-icon">
            <img src="<?php echo base_url('public/images/mayin.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/delete.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/edit.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/iconDown11.png');?>">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/carton-box1.png');?>" alt=""
              style="width: 18px; height: 18px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Hàng hoá: <span style="color: #885DE5;">Đèn trang trí noel (x3), Khuyên tai (x2),...</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconUser.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Người nhận: Nguyễn Thị Lan Anh - 0977.177.177
            <img src="<?php echo base_url('public/images/btnMessage.png');?>" alt="" style="height: 27px;">
            <img src="<?php echo base_url('public/images/btnCall.png');?>" alt="">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Địa chỉ nhận: Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/$.png');?>" alt=""
              style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
          </li>
          <li class="pl-2 pt-1">
            <span class="pr-1">COD: 2,480,000 đ</span>
            <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
              <span class="pl-1">Phí: 20,000 đ</span>
              <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                data-target="#myModal">
              <!-- The Modal -->
              <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;    ">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body ">
                      <ul class="row list-unstyled pl-3 pr-3">
                        <li class="col-md-6">
                          Phí vận chuyển
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí khai giá
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí thu hộ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí lấy hàng
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí bốc giỡ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>

                      </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer text-center" style="margin: 0px auto;">
                      Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                    </div>
                  </div>
                </div>
              </div>
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;" data-toggle="modal" data-target="#cancelOrder">
          <li class="w-100 text-right listOrders-btn-xndh">
            <div class="pt-2 ml-2">
              <span>Chuyển hoàn</span>
            </div>
          </li>
        </ul>
        <div class="modal" id="cancelOrder">
          <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 67%;">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title modal-title-cancelOrder">Thông báo huỷ đơn</b></h4>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body mt-0 pt-0 pb-0">
                <ul class="list-unstyled pl-3 pr-3 text-center " style="line-height: 19px;">
                  Bạn có chắc muốn hủy đơn hàng <br>
                  <span class="font-weight-bold">GN88848139199109</span> <br>
                  này không?
                </ul>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer modal-footer-cancelOrder text-center">
                <button>Đồng ý</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===================END Danh Sách Đơn Hàng Delay Giao =============== -->

  <!--=================== Danh Sách Đơn Hàng Chờ Hoàn =============== -->
  <div class="listOders-bd-1 pt-2 d-flex mt-2 ml-0 listOrders-detail-1" style="margin-right: -12px;">
    <div style="padding-right: 20px;" class="pt-1">
      <input type="checkbox" class="myCheckBox">
    </div>
    <div class="w-100 mb-2 ">
      <div class="mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0 ">
          <li>
            <span class="listOders-bd-stt">1</span>
          </li>
          <li class="pl-2">
            <b>S10724276.B.MB26.K1.D.12.87414502</b>
          </li>
          <li>
            <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;" class="mt-0">
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right ">
            (27/04/2021 18:09:22)
            <span style="color:#885DE5;">Gửi yêu cầu chuyển hoàn</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2  listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;display: none;">
            <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;">
          </li>
          <li class="pl-2">
            <span style="color: #514D5B;font-weight: 600;">NT6H</span>
          </li>
          <li class="pl-3">
            (<span style="color: #2DB1DB;">GTT</span>)
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right list-icon">
            <img src="<?php echo base_url('public/images/mayin.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/delete.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/edit.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/iconDown11.png');?>">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/carton-box1.png');?>" alt=""
              style="width: 18px; height: 18px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Hàng hoá: <span style="color: #885DE5;">Đèn trang trí noel (x3), Khuyên tai (x2),...</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconUser.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Người nhận: Nguyễn Thị Lan Anh - 0977.177.177
            <img src="<?php echo base_url('public/images/btnMessage.png');?>" alt="" style="height: 27px;">
            <img src="<?php echo base_url('public/images/btnCall.png');?>" alt="">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Địa chỉ nhận: Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/$.png');?>" alt=""
              style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
          </li>
          <li class="pl-2 pt-1">
            <span class="pr-1">COD: 2,480,000 đ</span>
            <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
              <span class="pl-1">Phí: 20,000 đ</span>
              <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                data-target="#myModal">
              <!-- The Modal -->
              <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;    ">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body ">
                      <ul class="row list-unstyled pl-3 pr-3">
                        <li class="col-md-6">
                          Phí vận chuyển
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí khai giá
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí thu hộ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí lấy hàng
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí bốc giỡ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>

                      </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer text-center" style="margin: 0px auto;">
                      Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                    </div>
                  </div>
                </div>
              </div>
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;" data-toggle="modal" data-target="#cancelOrder">
          <li class="w-100 text-right listOrders-btn-xndh">
            <div class="pt-2 ml-2">
              <span>Xác nhận</span>
            </div>
            <div class="pt-2">
              <span>Huỷ đơn</span>
            </div>
          </li>
        </ul>
        <div class="modal" id="cancelOrder">
          <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 67%;">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title modal-title-cancelOrder">Thông báo huỷ đơn</b></h4>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body mt-0 pt-0 pb-0">
                <ul class="list-unstyled pl-3 pr-3 text-center " style="line-height: 19px;">
                  Bạn có chắc muốn hủy đơn hàng <br>
                  <span class="font-weight-bold">GN88848139199109</span> <br>
                  này không?
                </ul>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer modal-footer-cancelOrder text-center">
                <button>Đồng ý</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===================END Danh Sách Đơn Hàng Chờ Hoàn=============== -->

  <!--=================== Danh Sách Đơn Hàng Giao Thành Công =============== -->
  <div class="listOders-bd-1 pt-2 d-flex mt-2 ml-0 listOrders-detail-1" style="margin-right: -12px;">
    <div style="padding-right: 20px;" class="pt-1">
      <input type="checkbox" class="myCheckBox">
    </div>
    <div class="w-100 mb-2 ">
      <div class="mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0 ">
          <li>
            <span class="listOders-bd-stt">1</span>
          </li>
          <li class="pl-2">
            <b>S10724276.B.MB26.K1.D.12.87414502</b>
          </li>
          <li>
            <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;" class="mt-0">
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right ">
            (27/04/2021 18:09:22)
            <span style="color:#2DB1DB;"> Giao thành công</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2  listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;display: none;">
            <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;">
          </li>
          <li class="pl-2">
            <span style="color: #514D5B;font-weight: 600;">NT6H</span>
          </li>
          <li class="pl-3">
            (<span style="color: #2DB1DB;">GTT</span>)
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right list-icon">
            <img src="<?php echo base_url('public/images/mayin.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/delete.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/edit.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/iconDown11.png');?>">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/carton-box1.png');?>" alt=""
              style="width: 18px; height: 18px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Hàng hoá: <span style="color: #885DE5;">Đèn trang trí noel (x3), Khuyên tai (x2),...</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconUser.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Người nhận: Nguyễn Thị Lan Anh - 0977.177.177
            <img src="<?php echo base_url('public/images/btnMessage.png');?>" alt="" style="height: 27px;">
            <img src="<?php echo base_url('public/images/btnCall.png');?>" alt="">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Địa chỉ nhận: Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/$.png');?>" alt=""
              style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
          </li>
          <li class="pl-2 pt-1">
            <span class="pr-1">COD: 2,480,000 đ</span>
            <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
              <span class="pl-1">Phí: 20,000 đ</span>
              <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                data-target="#myModal">
              <!-- The Modal -->
              <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;    ">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body ">
                      <ul class="row list-unstyled pl-3 pr-3">
                        <li class="col-md-6">
                          Phí vận chuyển
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí khai giá
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí thu hộ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí lấy hàng
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí bốc giỡ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>

                      </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer text-center" style="margin: 0px auto;">
                      Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                    </div>
                  </div>
                </div>
              </div>
          </li>
        </ul>

        <div class="modal" id="cancelOrder">
          <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 67%;">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title modal-title-cancelOrder">Thông báo huỷ đơn</b></h4>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body mt-0 pt-0 pb-0">
                <ul class="list-unstyled pl-3 pr-3 text-center " style="line-height: 19px;">
                  Bạn có chắc muốn hủy đơn hàng <br>
                  <span class="font-weight-bold">GN88848139199109</span> <br>
                  này không?
                </ul>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer modal-footer-cancelOrder text-center">
                <button>Đồng ý</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===================END Danh Sách Đơn Hàng Giao Thành Công=============== -->

  <!--=================== Danh Sách Đơn Hàng Đang Hoàn =============== -->
  <div class="listOders-bd-1 pt-2 d-flex mt-2 ml-0 listOrders-detail-1" style="margin-right: -12px;">
    <div style="padding-right: 20px;" class="pt-1">
      <input type="checkbox" class="myCheckBox">
    </div>
    <div class="w-100 mb-2 ">
      <div class="mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0 ">
          <li>
            <span class="listOders-bd-stt">1</span>
          </li>
          <li class="pl-2">
            <b>S10724276.B.MB26.K1.D.12.87414502</b>
          </li>
          <li>
            <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;" class="mt-0">
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right ">
            (27/04/2021 18:09:22)
            <span style="color:#885DE5;"> Đang hoàn</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2  listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;display: none;">
            <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;">
          </li>
          <li class="pl-2">
            <span style="color: #514D5B;font-weight: 600;">NT6H</span>
          </li>
          <li class="pl-3">
            (<span style="color: #2DB1DB;">GTT</span>)
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right list-icon">
            <img src="<?php echo base_url('public/images/mayin.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/delete.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/edit.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/iconDown11.png');?>">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/carton-box1.png');?>" alt=""
              style="width: 18px; height: 18px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Hàng hoá: <span style="color: #885DE5;">Đèn trang trí noel (x3), Khuyên tai (x2),...</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconUser.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Người nhận: Nguyễn Thị Lan Anh - 0977.177.177
            <img src="<?php echo base_url('public/images/btnMessage.png');?>" alt="" style="height: 27px;">
            <img src="<?php echo base_url('public/images/btnCall.png');?>" alt="">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Địa chỉ nhận: Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/$.png');?>" alt=""
              style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
          </li>
          <li class="pl-2 pt-1">
            <span class="pr-1">COD: 2,480,000 đ</span>
            <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
              <span class="pl-1">Phí: 20,000 đ</span>
              <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                data-target="#myModal">
              <!-- The Modal -->
              <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;    ">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body ">
                      <ul class="row list-unstyled pl-3 pr-3">
                        <li class="col-md-6">
                          Phí vận chuyển
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí khai giá
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí thu hộ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí lấy hàng
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí bốc giỡ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>

                      </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer text-center" style="margin: 0px auto;">
                      Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                    </div>
                  </div>
                </div>
              </div>
          </li>
        </ul>

        <div class="modal" id="cancelOrder">
          <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 67%;">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title modal-title-cancelOrder">Thông báo huỷ đơn</b></h4>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body mt-0 pt-0 pb-0">
                <ul class="list-unstyled pl-3 pr-3 text-center " style="line-height: 19px;">
                  Bạn có chắc muốn hủy đơn hàng <br>
                  <span class="font-weight-bold">GN88848139199109</span> <br>
                  này không?
                </ul>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer modal-footer-cancelOrder text-center">
                <button>Đồng ý</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===================END Danh Sách Đơn Hàng Đang Hoàn=============== -->
  <!--=================== Danh Sách Đơn Hàng Hoàn Thất Bại=============== -->
  <div class="listOders-bd-1 pt-2 d-flex mt-2 ml-0 listOrders-detail-1" style="margin-right: -12px;">
    <div style="padding-right: 20px;" class="pt-1">
      <input type="checkbox" class="myCheckBox">
    </div>
    <div class="w-100 mb-2 ">
      <div class="mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0 ">
          <li>
            <span class="listOders-bd-stt">1</span>
          </li>
          <li class="pl-2">
            <b>S10724276.B.MB26.K1.D.12.87414502</b>
          </li>
          <li>
            <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;" class="mt-0">
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right ">
            (27/04/2021 18:09:22)
            <span style="color:#885DE5;"> Hoàn thất bại</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2  listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;display: none;">
            <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;">
          </li>
          <li class="pl-2">
            <span style="color: #514D5B;font-weight: 600;">NT6H</span>
          </li>
          <li class="pl-3">
            (<span style="color: #2DB1DB;">GTT</span>)
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right list-icon">
            <img src="<?php echo base_url('public/images/mayin.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/delete.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/edit.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/iconDown11.png');?>">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/carton-box1.png');?>" alt=""
              style="width: 18px; height: 18px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Hàng hoá: <span style="color: #885DE5;">Đèn trang trí noel (x3), Khuyên tai (x2),...</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconUser.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Người nhận: Nguyễn Thị Lan Anh - 0977.177.177
            <img src="<?php echo base_url('public/images/btnMessage.png');?>" alt="" style="height: 27px;">
            <img src="<?php echo base_url('public/images/btnCall.png');?>" alt="">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Địa chỉ nhận: Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/$.png');?>" alt=""
              style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
          </li>
          <li class="pl-2 pt-1">
            <span class="pr-1">COD: 2,480,000 đ</span>
            <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
              <span class="pl-1">Phí: 20,000 đ</span>
              <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                data-target="#myModal">
              <!-- The Modal -->
              <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;    ">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body ">
                      <ul class="row list-unstyled pl-3 pr-3">
                        <li class="col-md-6">
                          Phí vận chuyển
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí khai giá
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí thu hộ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí lấy hàng
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí bốc giỡ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>

                      </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer text-center" style="margin: 0px auto;">
                      Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                    </div>
                  </div>
                </div>
              </div>
          </li>
        </ul>

        <div class="modal" id="cancelOrder">
          <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 67%;">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title modal-title-cancelOrder">Thông báo huỷ đơn</b></h4>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body mt-0 pt-0 pb-0">
                <ul class="list-unstyled pl-3 pr-3 text-center " style="line-height: 19px;">
                  Bạn có chắc muốn hủy đơn hàng <br>
                  <span class="font-weight-bold">GN88848139199109</span> <br>
                  này không?
                </ul>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer modal-footer-cancelOrder text-center">
                <button>Đồng ý</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===================END Danh Sách Đơn Hàng Hoàn Thất Bại=============== -->
  <!--=================== Danh Sách Đơn Hàng Delay Trả =============== -->
  <div class="listOders-bd-1 pt-2 d-flex mt-2 ml-0 listOrders-detail-1" style="margin-right: -12px;">
    <div style="padding-right: 20px;" class="pt-1">
      <input type="checkbox" class="myCheckBox">
    </div>
    <div class="w-100 mb-2 ">
      <div class="mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0 ">
          <li>
            <span class="listOders-bd-stt">1</span>
          </li>
          <li class="pl-2">
            <b>S10724276.B.MB26.K1.D.12.87414502</b>
          </li>
          <li>
            <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;" class="mt-0">
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right ">
            (27/04/2021 18:09:22)
            <span style="color:#885DE5;"> Delay trả</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2  listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;display: none;">
            <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;">
          </li>
          <li class="pl-2">
            <span style="color: #514D5B;font-weight: 600;">NT6H</span>
          </li>
          <li class="pl-3">
            (<span style="color: #2DB1DB;">GTT</span>)
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right list-icon">
            <img src="<?php echo base_url('public/images/mayin.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/delete.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/edit.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/iconDown11.png');?>">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/carton-box1.png');?>" alt=""
              style="width: 18px; height: 18px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Hàng hoá: <span style="color: #885DE5;">Đèn trang trí noel (x3), Khuyên tai (x2),...</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconUser.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Người nhận: Nguyễn Thị Lan Anh - 0977.177.177
            <img src="<?php echo base_url('public/images/btnMessage.png');?>" alt="" style="height: 27px;">
            <img src="<?php echo base_url('public/images/btnCall.png');?>" alt="">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Địa chỉ nhận: Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/$.png');?>" alt=""
              style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
          </li>
          <li class="pl-2 pt-1">
            <span class="pr-1">COD: 2,480,000 đ</span>
            <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
              <span class="pl-1">Phí: 20,000 đ</span>
              <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                data-target="#myModal">
              <!-- The Modal -->
              <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;    ">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body ">
                      <ul class="row list-unstyled pl-3 pr-3">
                        <li class="col-md-6">
                          Phí vận chuyển
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí khai giá
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí thu hộ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí lấy hàng
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí bốc giỡ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>

                      </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer text-center" style="margin: 0px auto;">
                      Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                    </div>
                  </div>
                </div>
              </div>
          </li>
        </ul>

        <div class="modal" id="cancelOrder">
          <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 67%;">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title modal-title-cancelOrder">Thông báo huỷ đơn</b></h4>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body mt-0 pt-0 pb-0">
                <ul class="list-unstyled pl-3 pr-3 text-center " style="line-height: 19px;">
                  Bạn có chắc muốn hủy đơn hàng <br>
                  <span class="font-weight-bold">GN88848139199109</span> <br>
                  này không?
                </ul>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer modal-footer-cancelOrder text-center">
                <button>Đồng ý</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===================END Danh Sách Đơn Hàng Delay trả=============== -->

  <!--=================== Danh Sách Đơn Hàng Đã Hoàn =============== -->
  <div class="listOders-bd-1 pt-2 d-flex mt-2 ml-0 listOrders-detail-1" style="margin-right: -12px;">
    <div style="padding-right: 20px;" class="pt-1">
      <input type="checkbox" class="myCheckBox">
    </div>
    <div class="w-100 mb-2 ">
      <div class="mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0 ">
          <li>
            <span class="listOders-bd-stt">1</span>
          </li>
          <li class="pl-2">
            <b>S10724276.B.MB26.K1.D.12.87414502</b>
          </li>
          <li>
            <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;" class="mt-0">
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right ">
            (27/04/2021 18:09:22)
            <span style="color:#885DE5;"> Delay trả</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2  listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;display: none;">
            <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;">
          </li>
          <li class="pl-2">
            <span style="color: #514D5B;font-weight: 600;">NT6H</span>
          </li>
          <li class="pl-3">
            (<span style="color: #2DB1DB;">GTT</span>)
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right list-icon">
            <img src="<?php echo base_url('public/images/mayin.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/delete.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/edit.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/iconDown11.png');?>">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/carton-box1.png');?>" alt=""
              style="width: 18px; height: 18px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Hàng hoá: <span style="color: #885DE5;">Đèn trang trí noel (x3), Khuyên tai (x2),...</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconUser.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Người nhận: Nguyễn Thị Lan Anh - 0977.177.177
            <img src="<?php echo base_url('public/images/btnMessage.png');?>" alt="" style="height: 27px;">
            <img src="<?php echo base_url('public/images/btnCall.png');?>" alt="">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Địa chỉ nhận: Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/$.png');?>" alt=""
              style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
          </li>
          <li class="pl-2 pt-1">
            <span class="pr-1">COD: 2,480,000 đ</span>
            <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
              <span class="pl-1">Phí: 20,000 đ</span>
              <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                data-target="#myModal">
              <!-- The Modal -->
              <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;    ">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body ">
                      <ul class="row list-unstyled pl-3 pr-3">
                        <li class="col-md-6">
                          Phí vận chuyển
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí khai giá
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí thu hộ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí lấy hàng
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí bốc giỡ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>

                      </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer text-center" style="margin: 0px auto;">
                      Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                    </div>
                  </div>
                </div>
              </div>
          </li>
        </ul>

        <div class="modal" id="cancelOrder">
          <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 67%;">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title modal-title-cancelOrder">Thông báo huỷ đơn</b></h4>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body mt-0 pt-0 pb-0">
                <ul class="list-unstyled pl-3 pr-3 text-center " style="line-height: 19px;">
                  Bạn có chắc muốn hủy đơn hàng <br>
                  <span class="font-weight-bold">GN88848139199109</span> <br>
                  này không?
                </ul>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer modal-footer-cancelOrder text-center">
                <button>Đồng ý</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===================END Danh Sách Đơn Hàng Đã Hoàn=============== -->
  <!--=================== Danh Sách Đơn Hàng Đơn Có Vấn Đề =============== -->
  <div class="listOders-bd-1 pt-2 d-flex mt-2 ml-0 listOrders-detail-1" style="margin-right: -12px;">
    <div style="padding-right: 20px;" class="pt-1">
      <input type="checkbox" class="myCheckBox">
    </div>
    <div class="w-100 mb-2 ">
      <div class="mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0 ">
          <li>
            <span class="listOders-bd-stt">1</span>
          </li>
          <li class="pl-2">
            <b>S10724276.B.MB26.K1.D.12.87414502</b>
          </li>
          <li>
            <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;" class="mt-0">
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right ">
            (27/04/2021 18:09:22)
            <span style="color:#885DE5;"> Kiện có hàng cấm</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2  listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;display: none;">
            <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;">
          </li>
          <li class="pl-2">
            <span style="color: #514D5B;font-weight: 600;">NT6H</span>
          </li>
          <li class="pl-3">
            (<span style="color: #2DB1DB;">GTT</span>)
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right list-icon">
            <img src="<?php echo base_url('public/images/mayin.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/delete.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/edit.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/iconDown11.png');?>">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/carton-box1.png');?>" alt=""
              style="width: 18px; height: 18px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Hàng hoá: <span style="color: #885DE5;">Đèn trang trí noel (x3), Khuyên tai (x2),...</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconUser.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Người nhận: Nguyễn Thị Lan Anh - 0977.177.177
            <img src="<?php echo base_url('public/images/btnMessage.png');?>" alt="" style="height: 27px;">
            <img src="<?php echo base_url('public/images/btnCall.png');?>" alt="">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Địa chỉ nhận: Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/$.png');?>" alt=""
              style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
          </li>
          <li class="pl-2 pt-1">
            <span class="pr-1">COD: 2,480,000 đ</span>
            <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
              <span class="pl-1">Phí: 20,000 đ</span>
              <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                data-target="#myModal">
              <!-- The Modal -->
              <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;    ">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body ">
                      <ul class="row list-unstyled pl-3 pr-3">
                        <li class="col-md-6">
                          Phí vận chuyển
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí khai giá
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí thu hộ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí lấy hàng
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí bốc giỡ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>

                      </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer text-center" style="margin: 0px auto;">
                      Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                    </div>
                  </div>
                </div>
              </div>
          </li>
        </ul>

        <div class="modal" id="cancelOrder">
          <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 67%;">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title modal-title-cancelOrder">Thông báo huỷ đơn</b></h4>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body mt-0 pt-0 pb-0">
                <ul class="list-unstyled pl-3 pr-3 text-center " style="line-height: 19px;">
                  Bạn có chắc muốn hủy đơn hàng <br>
                  <span class="font-weight-bold">GN88848139199109</span> <br>
                  này không?
                </ul>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer modal-footer-cancelOrder text-center">
                <button>Đồng ý</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===================END Danh Sách Đơn Hàng Đơn Có Vấn Đề=============== -->

  <!--=================== Danh Sách Đơn Hàng Đơn Chờ Huỷ=============== -->
  <div class="listOders-bd-1 pt-2 d-flex mt-2 ml-0 listOrders-detail-1" style="margin-right: -12px;">
    <div style="padding-right: 20px;" class="pt-1">
      <input type="checkbox" class="myCheckBox">
    </div>
    <div class="w-100 mb-2 ">
      <div class="mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0 ">
          <li>
            <span class="listOders-bd-stt">1</span>
          </li>
          <li class="pl-2">
            <b>S10724276.B.MB26.K1.D.12.87414502</b>
          </li>
          <li>
            <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;" class="mt-0">
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right ">
            (27/04/2021 18:09:22)
            <span style="color:#885DE5;"> Đơn huỷ bởi chủ shop</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2  listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;display: none;">
            <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;">
          </li>
          <li class="pl-2">
            <span style="color: #514D5B;font-weight: 600;">NT6H</span>
          </li>
          <li class="pl-3">
            (<span style="color: #2DB1DB;">GTT</span>)
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right list-icon">
            <img src="<?php echo base_url('public/images/mayin.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/delete.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/edit.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/iconDown11.png');?>">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/carton-box1.png');?>" alt=""
              style="width: 18px; height: 18px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Hàng hoá: <span style="color: #885DE5;">Đèn trang trí noel (x3), Khuyên tai (x2),...</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconUser.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Người nhận: Nguyễn Thị Lan Anh - 0977.177.177
            <img src="<?php echo base_url('public/images/btnMessage.png');?>" alt="" style="height: 27px;">
            <img src="<?php echo base_url('public/images/btnCall.png');?>" alt="">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Địa chỉ nhận: Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/$.png');?>" alt=""
              style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
          </li>
          <li class="pl-2 pt-1">
            <span class="pr-1">COD: 2,480,000 đ</span>
            <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
              <span class="pl-1">Phí: 20,000 đ</span>
              <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                data-target="#myModal">
              <!-- The Modal -->
              <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;    ">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body ">
                      <ul class="row list-unstyled pl-3 pr-3">
                        <li class="col-md-6">
                          Phí vận chuyển
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí khai giá
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí thu hộ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí lấy hàng
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí bốc giỡ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>

                      </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer text-center" style="margin: 0px auto;">
                      Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                    </div>
                  </div>
                </div>
              </div>
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right listOrders-btn-xndh">
            <div>
              <span>Xác nhận</span>
            </div>
          </li>
        </ul>
        <div class="modal" id="cancelOrder">
          <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 67%;">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title modal-title-cancelOrder">Thông báo huỷ đơn</b></h4>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body mt-0 pt-0 pb-0">
                <ul class="list-unstyled pl-3 pr-3 text-center " style="line-height: 19px;">
                  Bạn có chắc muốn hủy đơn hàng <br>
                  <span class="font-weight-bold">GN88848139199109</span> <br>
                  này không?
                </ul>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer modal-footer-cancelOrder text-center">
                <button>Đồng ý</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===================END Danh Sách Đơn Hàng Đơn Chờ Huỷ=============== -->

  <!--=================== Danh Sách Đơn Hàng  Huỷ=============== -->
  <div class="listOders-bd-1 pt-2 d-flex mt-2 ml-0 listOrders-detail-1" style="margin-right: -12px;">
    <div style="padding-right: 20px;" class="pt-1">
      <input type="checkbox" class="myCheckBox">
    </div>
    <div class="w-100 mb-2 ">
      <div class="mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0 ">
          <li>
            <span class="listOders-bd-stt">1</span>
          </li>
          <li class="pl-2">
            <b>S10724276.B.MB26.K1.D.12.87414502</b>
          </li>
          <li>
            <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;" class="mt-0">
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right ">
            (27/04/2021 18:09:22)
            <span style="color:#885DE5;"> Đơn vị vận chuyển huỷ đơn hàng</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2  listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;display: none;">
            <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;">
          </li>
          <li class="pl-2">
            <span style="color: #514D5B;font-weight: 600;">NT6H</span>
          </li>
          <li class="pl-3">
            (<span style="color: #2DB1DB;">GTT</span>)
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right list-icon">
            <img src="<?php echo base_url('public/images/mayin.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/delete.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/edit.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/iconDown11.png');?>">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/carton-box1.png');?>" alt=""
              style="width: 18px; height: 18px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Hàng hoá: <span style="color: #885DE5;">Đèn trang trí noel (x3), Khuyên tai (x2),...</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconUser.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Người nhận: Nguyễn Thị Lan Anh - 0977.177.177
            <img src="<?php echo base_url('public/images/btnMessage.png');?>" alt="" style="height: 27px;">
            <img src="<?php echo base_url('public/images/btnCall.png');?>" alt="">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Địa chỉ nhận: Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/$.png');?>" alt=""
              style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
          </li>
          <li class="pl-2 pt-1">
            <span class="pr-1">COD: 2,480,000 đ</span>
            <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
              <span class="pl-1">Phí: 20,000 đ</span>
              <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                data-target="#myModal">
              <!-- The Modal -->
              <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;    ">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body ">
                      <ul class="row list-unstyled pl-3 pr-3">
                        <li class="col-md-6">
                          Phí vận chuyển
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí khai giá
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí thu hộ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí lấy hàng
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí bốc giỡ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>

                      </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer text-center" style="margin: 0px auto;">
                      Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                    </div>
                  </div>
                </div>
              </div>
          </li>
        </ul>

        <div class="modal" id="cancelOrder">
          <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 67%;">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title modal-title-cancelOrder">Thông báo huỷ đơn</b></h4>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body mt-0 pt-0 pb-0">
                <ul class="list-unstyled pl-3 pr-3 text-center " style="line-height: 19px;">
                  Bạn có chắc muốn hủy đơn hàng <br>
                  <span class="font-weight-bold">GN88848139199109</span> <br>
                  này không?
                </ul>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer modal-footer-cancelOrder text-center">
                <button>Đồng ý</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===================END Danh Sách Đơn Hàng  Huỷ=============== -->

  <!--=================== Danh Sách Đơn Hàng Đơn Sai Cân Nặng=============== -->
  <div class="listOders-bd-1 pt-2 d-flex mt-2 ml-0 listOrders-detail-1" style="margin-right: -12px;">
    <div style="padding-right: 20px;" class="pt-1">
      <input type="checkbox" class="myCheckBox">
    </div>
    <div class="w-100 mb-2 ">
      <div class="mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0 ">
          <li>
            <span class="listOders-bd-stt">1</span>
          </li>
          <li class="pl-2">
            <b>S10724276.B.MB26.K1.D.12.87414502</b>
          </li>
          <li>
            <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;" class="mt-0">
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right ">
            (27/04/2021 18:09:22)
            <span style="color:#885DE5;"> Sai cân nặng</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2  listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;display: none;">
            <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;">
          </li>
          <li class="pl-2">
            <span style="color: #514D5B;font-weight: 600;">NT6H</span>
          </li>
          <li class="pl-3">
            (<span style="color: #2DB1DB;">GTT</span>)
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right list-icon">
            <img src="<?php echo base_url('public/images/mayin.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/delete.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/edit.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/iconDown11.png');?>">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/carton-box1.png');?>" alt=""
              style="width: 18px; height: 18px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Hàng hoá: <span style="color: #885DE5;">Đèn trang trí noel (x3), Khuyên tai (x2),...</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconUser.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Người nhận: Nguyễn Thị Lan Anh - 0977.177.177
            <img src="<?php echo base_url('public/images/btnMessage.png');?>" alt="" style="height: 27px;">
            <img src="<?php echo base_url('public/images/btnCall.png');?>" alt="">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Địa chỉ nhận: Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/$.png');?>" alt=""
              style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
          </li>
          <li class="pl-2 pt-1">
            <span class="pr-1">COD: 2,480,000 đ</span>
            <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
              <span class="pl-1">Phí: 20,000 đ</span>
              <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                data-target="#myModal">
              <!-- The Modal -->
              <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;    ">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body ">
                      <ul class="row list-unstyled pl-3 pr-3">
                        <li class="col-md-6">
                          Phí vận chuyển
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí khai giá
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí thu hộ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí lấy hàng
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí bốc giỡ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>

                      </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer text-center" style="margin: 0px auto;">
                      Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                    </div>
                  </div>
                </div>
              </div>
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right listOrders-btn-xndh">
            <div>
              <span>Chuyển hoàn</span>
            </div>
          </li>
        </ul>
        <div class="modal" id="cancelOrder">
          <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 67%;">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title modal-title-cancelOrder">Thông báo huỷ đơn</b></h4>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body mt-0 pt-0 pb-0">
                <ul class="list-unstyled pl-3 pr-3 text-center " style="line-height: 19px;">
                  Bạn có chắc muốn hủy đơn hàng <br>
                  <span class="font-weight-bold">GN88848139199109</span> <br>
                  này không?
                </ul>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer modal-footer-cancelOrder text-center">
                <button>Đồng ý</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===================END Danh Sách Đơn Hàng Sai Cân Nặng=============== -->

  <!--=================== Danh Sách Đơn Hàng Nội Dung Khác=============== -->
  <div class="listOders-bd-1 pt-2 d-flex mt-2 ml-0 listOrders-detail-1" style="margin-right: -12px;">
    <div style="padding-right: 20px;" class="pt-1">
      <input type="checkbox" class="myCheckBox">
    </div>
    <div class="w-100 mb-2 ">
      <div class="mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0 ">
          <li>
            <span class="listOders-bd-stt">1</span>
          </li>
          <li class="pl-2">
            <b>S10724276.B.MB26.K1.D.12.87414502</b>
          </li>
          <li>
            <img src="<?php echo base_url('public/images/copy.png');?>" style="width: 16px; height: 16px;" class="mt-0">
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right ">
            (27/04/2021 18:09:22)
            <span style="color:#885DE5;"> Nội dung khác</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2  listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/Rocket.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;display: none;">
            <img src="<?php echo base_url('public/images/Time.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px;">
          </li>
          <li class="pl-2">
            <span style="color: #514D5B;font-weight: 600;">NT6H</span>
          </li>
          <li class="pl-3">
            (<span style="color: #2DB1DB;">GTT</span>)
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
          <li class="w-100 text-right list-icon">
            <img src="<?php echo base_url('public/images/mayin.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/delete.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/edit.png');?>">
            <img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
            <img src="<?php echo base_url('public/images/iconDown11.png');?>">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/carton-box1.png');?>" alt=""
              style="width: 18px; height: 18px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Hàng hoá: <span style="color: #885DE5;">Đèn trang trí noel (x3), Khuyên tai (x2),...</span>
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconUser.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Người nhận: Nguyễn Thị Lan Anh - 0977.177.177
            <img src="<?php echo base_url('public/images/btnMessage.png');?>" alt="" style="height: 27px;">
            <img src="<?php echo base_url('public/images/btnCall.png');?>" alt="">
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2">
        <ul class="list-unstyled d-flex mb-0" style="cursor: pointer; width: 100%; font-size: 13px;">
          <li>
            <img src="<?php echo base_url('public/images/iconLocation11.png');?>" alt=""
              style="width: 20px; height: 20px;margin-left: 0px">
          </li>
          <li class="pl-2 pt-1 listOrders-img-huydon">
            Địa chỉ nhận: Số 36, Tòa Vinahud, Trung Yên 9, Quận Cầu giấy, Hà Nội
          </li>
        </ul>
      </div>
      <div class="pt-1 mr-2 listOders-bd-3">
        <ul class="list-unstyled d-flex mb-0">
          <li>
            <img src="<?php echo base_url('public/images/$.png');?>" alt=""
              style="width: 14px; height: 16px;margin-left: 0px" class="mt-2">
          </li>
          <li class="pl-2 pt-1">
            <span class="pr-1">COD: 2,480,000 đ</span>
            <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
              <span class="pl-1">Phí: 20,000 đ</span>
              <img src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1" data-toggle="modal"
                data-target="#myModal">
              <!-- The Modal -->
              <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content" style="margin-top: 67%;    ">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title" style="margin: 0px auto;"><b>Thông tin cước phí</b></h4>
                      <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body ">
                      <ul class="row list-unstyled pl-3 pr-3">
                        <li class="col-md-6">
                          Phí vận chuyển
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí khai giá
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí thu hộ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí lấy hàng
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>
                        <li class="col-md-6">
                          Phí bốc giỡ
                        </li>
                        <li class="col-md-6 text-right">
                          <b>40,000đ</b>
                        </li>

                      </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer text-center" style="margin: 0px auto;">
                      Tổng phí: <span style="color: #885DE5;">12,540,000đ</span>
                    </div>
                  </div>
                </div>
              </div>
          </li>
        </ul>

        <div class="modal" id="cancelOrder">
          <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 67%;">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title modal-title-cancelOrder">Thông báo huỷ đơn</b></h4>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body mt-0 pt-0 pb-0">
                <ul class="list-unstyled pl-3 pr-3 text-center " style="line-height: 19px;">
                  Bạn có chắc muốn hủy đơn hàng <br>
                  <span class="font-weight-bold">GN88848139199109</span> <br>
                  này không?
                </ul>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer modal-footer-cancelOrder text-center">
                <button>Đồng ý</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===================END Danh Sách Đơn Hàng Nội Dung Khác=============== -->

</section>
<script>
function showInfoDetail(id) {
  var idShow = 'lstOr-detail-' + id;
  var btnShow = 'btn-showdetail-' + id;
  var btnNone = 'btn-nonedetail-' + id;
  console.log(btnShow);
  $('#' + idShow).show();
  $('#' + btnShow).hide();
  $('#' + btnNone).show();
}

function noneInfoDetail(id) {
  var idShow = 'lstOr-detail-' + id;
  var btnShow = 'btn-showdetail-' + id;
  var btnNone = 'btn-nonedetail-' + id;
  console.log(btnShow);
  $('#' + idShow).hide();
  $('#' + btnShow).show();
  $('#' + btnNone).hide();
}


var index = 1;

function selectAll() {

  if (index % 2 != 0) {
    $('.myCheckBox').prop('checked', true);
  } else {
    $('.myCheckBox').prop('checked', false);
  }
  index++;
}
</script>
</script>
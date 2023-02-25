<section id="orders">
  <div class="warehouse-banner-title">
    <ul>
      <li>
        <img src="<?php echo base_url('public/images/Home.png');?>">
      </li>
      <li class="mt2-config title-page">
        > <span> Đơn hàng </span> >  <span> <?php echo $title ?></span>
      </li>
    </ul>
  </div>
</section>

<section id="listOders">
  <div class="listOders-search ">
    <ul class="row list-unstyled">
      <li class="col-md-6 col-sm-12">
        <input type="text" placeholder="Nhập mã đơn hàng, số điện thoại, tên người nhận">
      </li>
      <li class="col-md-2 col-sm-4">
        <input type="text">
      </li>
      <li class="col-md-2 col-sm-4">
        <input type="text">
      </li>
      <li class="col-md-2 col-sm-4">
        <input type="button" value="Tìm kiếm" class="lsod-submit-search">
      </li>
    </ul>
    <ul class="row list-unstyled">
      <li class="col-md-10">
        <ul class="row list-unstyled listOders-search-1">
          <li class="col-md-3 col-sm-6 d-flex">
            <input type="checkbox" class="btn-checkbox " onclick="selectAll()">
            <select name="" id="" class="chosen-select" style="height: 40px;">
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
      <li class="col-md-2">
        <input type="button" value="Xuất excel" style="background-color: #E9E6F8;color:#885DE5 ;">
      </li>
    </ul>
  </div>
  <div class="lstOders-line"></div>
  <!--=================== Danh Sách Đơn Hàng=============== -->
  <div class="listOders-bd-1 pt-2 d-flex mb-2" style="margin-right: -12px;">
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
            <span style="color: #514D5B;font-weight: 500;padding-left: 10px;">10 </span>đơn
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
            <span class="pr-1">COD: <span class="txt-cod">2,480,000</span> đ</span>
            <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
              <span class="pl-1">Phí: <span class="txt-fee">20,000</span> đ</span>
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
          <li class="w-100 text-right listOrders-btn-xndh1">
            <div>
              <span>Từ chối</span>
            </div>
            <div>
              <span>Xác nhận</span>
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
                <li class="w-100 text-right listOrders-btn-xndh1">
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
                <li class="w-100 text-right listOrders-btn-xndh1">
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
                <li class="w-100 text-right listOrders-btn-xndh1">
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
                <li class="w-100 text-right listOrders-btn-xndh1">
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
  <div class="listOders-bd-1 pt-2 d-flex mb-2" style="margin-right: -12px;">
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
            <span style="color: #514D5B;font-weight: 500;padding-left: 10px;">10 </span>đơn
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
            <span class="pr-1">COD: <span class="txt-cod">2,480,000</span> đ</span>
            <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
              <span class="pl-1">Phí: <span class="txt-fee">20,000</span> đ</span>
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
          <li class="w-100 text-right listOrders-btn-xndh1">
            <div>
              <span>Từ chối</span>
            </div>
            <div>
              <span>Xác nhận</span>
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
                <li class="w-100 text-right listOrders-btn-xndh1">
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
                <li class="w-100 text-right listOrders-btn-xndh1">
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
                <li class="w-100 text-right listOrders-btn-xndh1">
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
                <li class="w-100 text-right listOrders-btn-xndh1">
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
  <div class="listOders-bd-1 pt-2 d-flex mb-2" style="margin-right: -12px;">
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
            <span style="color: #514D5B;font-weight: 500;padding-left: 10px;">10 </span>đơn
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
            <span class="pr-1">COD: <span class="txt-cod">2,480,000</span> đ</span>
            <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
              <span class="pl-1">Phí: <span class="txt-fee">20,000</span> đ</span>
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
          <li class="w-100 text-right listOrders-btn-xndh1">
            <div>
              <span>Từ chối</span>
            </div>
            <div>
              <span>Xác nhận</span>
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
                <li class="w-100 text-right listOrders-btn-xndh1">
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
                <li class="w-100 text-right listOrders-btn-xndh1">
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
                <li class="w-100 text-right listOrders-btn-xndh1">
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
                <li class="w-100 text-right listOrders-btn-xndh1">
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
  <div class="listOders-bd-1 pt-2 d-flex mb-2" style="margin-right: -12px;">
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
            <span style="color: #514D5B;font-weight: 500;padding-left: 10px;">10 </span>đơn
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
            <span class="pr-1">COD: <span class="txt-cod">2,480,000</span> đ</span>
            <span><img src="<?php echo base_url('public/images/lineEdit.png');?>" class="list-icon-line mb-1">
              <span class="pl-1">Phí: <span class="txt-fee">20,000</span> đ</span>
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
          <li class="w-100 text-right listOrders-btn-xndh1">
            <div>
              <span>Từ chối</span>
            </div>
            <div>
              <span>Xác nhận</span>
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
                <li class="w-100 text-right listOrders-btn-xndh1">
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
                <li class="w-100 text-right listOrders-btn-xndh1">
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
                <li class="w-100 text-right listOrders-btn-xndh1">
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
                <li class="w-100 text-right listOrders-btn-xndh1">
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
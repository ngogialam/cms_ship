<section id="orders" style="padding: 14px 14px 0 15px;">
  <div class="warehouse-banner-title row">
    <ul class="col-md-3" style="margin-bottom: 9px;">
      <li>
        <img src="<?php echo base_url('public/images/Home.png');?>" alt="">
      </li>
      <li class="mt2-config title-page">
        > <span> <?= lang('Label.lbl_order') ?> </span> > <span><?php echo $title ?></span>
      </li>
    </ul>
    <div class="col-md-6 row" style="margin-bottom: 9px;">
      <div class="col-4 pr-0">
        <ul class="or-banner1 ol-0">
          <li style="background: #2DB1DB!important;color: white!important">
            1
          </li>
          <li style="color: #2DB1DB!important;" class="or-cgc-1">
            GN1
          </li>
        </ul>
      </div>
      <div class=" col-4 pr-0">
        <ul class="or-banner">
          <li>
            2
          </li>
          <li class="or-cgc-1 ">
            Nhập thông tin
          </li>
        </ul>
      </div>
      <div class="col-4 pr-0 pl-0">
        <ul class="or-banner1">
          <li>
            3
          </li>
          <li class="or-cgc-1">
            Xác nhận
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="d-flex main-orders">
    <div class="line-left-orders">
      <div>
        <img src="<?php echo base_url('public/images/Polygon8.png');?>" alt="">
      </div>
    </div>
    <div>
      <form action="">
        <div class=" or-ttng row">
          <div class="col-md-6  col-sm-12  or-ttng-left">
            <ul>
              <li>
                <b>Thông tin người gửi</b>
              </li>
            </ul>

            <ul>
              <li>
                Tên người gửi<span style="color: #885DE5;">*</span>
              </li>
              <li>
                <input type="text" placeholder="Nhập tên người gửi">
              </li>
            </ul>
            <ul>
              <li>
                Địa chỉ lấy hàng<span style="color: #885DE5;">*</span>
              </li>
              <li>
                <input type="text" placeholder="Nhập địa chỉ chi tiết">
              </li>
            </ul>
          </div>
          <div class="col-md-6 col-sm-12 or-ttng-right">
            <ul style="margin-bottom: 9px">
              <li style="height: 30px;">
                <select name="" id="" class="chosen-select">
                  <option value="">Thêm điểm gửi mới</option>
                  <option value="">Toà nhà Petro Việt Nam</option>
                  <option value="">Toà nhà Petro</option>

                </select>
              </li>
            </ul>
            <ul class="mb-0">
              <li>
                Số điện thoại<span style="color: #885DE5;">*</span>
                <span style="float: right;"><input type="checkbox" class="regular-checkbox"
                    style="width: 10px; height: 10px;"> Lưu kho mới</span>
              </li>
              <li>
                <input type="text" placeholder="Nhập địa chỉ lấy hàng">
              </li>
            </ul>
            <ul class="row or-" style="margin-top: 40px;">
              <li class="col-md-4 mb-2">
                <select name="" id="" class="form-control frm-lg chosen-select province_code_from ">
                  <option value="">Tỉnh/Thành</option>
                </select>
              </li>
              <li class="col-md-4 mb-2">
                <select name="" id="" class="form-control frm-lg chosen-select province_code_from ">
                  <option value="">Quận/Huyện</option>
                </select>
              </li>
              <li class="col-md-4 mb-2">
                <select name="" id="" class="form-control frm-lg chosen-select province_code_from ">
                  <option value="">Phường/Xã</option>
                </select>
              </li>
            </ul>
          </div>
        </div>
        <div id="ttdh-main">
          <div class="or-dgh-1 pb-3" style="margin-left: -40px;">
            <span class="or-dh-stt" style="background-color: #2DB1DB;">1</span> Điểm giao hàng
          </div>
          <div class="or-ttdh row">
            <ul class="or-dgh col-6">
              <li class="or-dgh-2">
                <input type="text" placeholder="Nhập địa chỉ người nhận">
              </li>
            </ul>
            <div class="chinhsua1 mb-1">
              <!-- ========HIỂN THỊ KHI CLICK VÀO SỬA ĐƠN HÀNG ========= -->
              <div id="orders" class="or-ttdh row qo-ttdhl">
                <ul class="or-dgh col-12 ">
                  <li class="or-dgh-1 pt-0 mt-0">
                    <span class="or-dh-stt" style="background: #F0A616;">1</span><span style="color: #68656D;">Thêm
                      đơn hàng chi tiết</span>
                  </li>
                  <li class="or-ttnh">
                    <ul>
                      <li class="or-ttnh-tt">
                        Thông tin nhận hàng
                      </li>
                    </ul>
                    <ul class="row">
                      <li class="col-md-3 col-sm-6 or-cgc-1">
                        Số điện thoại người nhận<span style="color: #885DE5;">*</span> <br>
                        <input type="text" placeholder="Nhập số điện thoại">
                      </li>
                      <li class="col-md-3 col-sm-6 or-cgc-1">
                        Tên người nhận<span style="color: #885DE5;">*</span> <br>
                        <input type="text" placeholder="Tên người nhận">
                      </li>
                      <li class="col-md-3 col-sm-6 or-cgc-1">
                        Ngày nhận<span style="color: #885DE5;">*</span> <br>
                        <input type="date" style="padding-right: 10px;">
                      </li>
                      <li class="col-md-3 col-sm-6 or-cgc-1">
                        Thời gian nhận<span style="color: #885DE5;">*</span> <br>
                        <input type="time" class="or-ttnh-input">
                      </li>
                    </ul>
                  </li>
                  <li class="or-ttnh">
                    <ul>
                      <li class="or-ttnh-tt">
                        Thông tin hàng hóa
                      </li>
                    </ul>
                    <ul class="row">
                      <li class="col-md-6 col-sm-12">
                        Tên hàng hóa<span style="color: #885DE5;">*</span> <br>
                        <input type="text" placeholder="Nhập tên hàng hóa" id="qo-tensp-ht">
                      </li>
                      <li class="col-md-3 col-sm-6">
                        Tiền COD<span style="color: #885DE5;">*</span> <br>
                        <input type="text" placeholder="0" class="or-cod" id="qo-cod-ht">
                        <span style="margin-left: -34px;">đ</span>
                      </li>
                      <li class="col-md-3 col-sm-6 or-cgc-1">
                        <input type="checkbox" class="regular-checkbox" style="width: 10px;height: 10px;">
                        Giá trị hàng hóa<span style="color: #885DE5;">*</span> <br>
                        <input type="text" placeholder="0" class="or-ttnh-input or-gtkg" id="qo-khaigia-ht"><span
                          style="margin-left: -34px;">đ</span>
                      </li>
                    </ul>
                    <ul class="row">
                      <li class="col-md-6 col-sm-12">
                        Loại hàng hóa<span style="color: #885DE5;">*</span> <br>
                        <input list="loai-hh" name="loai-hh" style="padding-right: 10px;"
                          placeholder="Chọn loại hàng hóa" id="qo-loaisp-ht">
                        <datalist id="loai-hh">
                          <option value="Quần áo trẻ em"></option>
                          <option value="Giày thể thao nam"></option>
                          <option value="Loại hàng hóa"></option>
                          <option value="Vợt cầu lông"></option>
                        </datalist>
                      </li>
                      <li class="col-md-3 col-sm-6">
                        Số lượng<span style="color: #885DE5;">*</span> <br>
                        <input style="padding-right: 10px;" id="qo-soluong-ht">

                      </li>
                      <li class="col-md-3 col-sm-6">
                        <br>
                        <button type="button" class="or-lhh-btn" id="qo-btn-thh-1"
                          onclick="themhanghoa('qo-tensp-ht','qo-soluong-ht','qo-loaisp-ht','qo-cod-ht','qo-khaigia-ht','ttsp')">Lưu</button>
                        <button type="button" class="or-lhh-btn qo-ed-a" id="qo-btn-thh-2">Sửa thông tin</button>

                      </li>
                    </ul>
                  </li>
                </ul>
                <!-- Nếu có thêm mới hàng hóa thì phần này sẽ đươc hiện -->
                <div style="width: 100%;" class="ttsp" id="ttsp">

                </div>
                <!-- END hàng hóa -->

                <ul class="col-12">
                  <li class="or-dvht">
                    Dịch vụ hỗ trợ
                  </li>
                </ul>
                <ul class="col-md-3 col-sm-6 or-ctdh-1">
                  <li>
                    Kích thước hàng hóa<span style="color: #885DE5;">*</span> <br>
                    <input type="text" placeholder="Dài x rộng x cao"><span style="margin-left: -34px;">Cm</span>
                  </li>
                </ul>
                <ul class="col-md-3 col-sm-6 or-ctdh-1">
                  <li>
                    Khối lượng<span style="color: #885DE5;">*</span> <br>
                    <input type="text" value="200"><span style="margin-left: -50px;">Gram</span>
                  </li>
                </ul>
                <ul class="col-md-6 col-sm-12 or-ctdh-1">
                  <li>
                    Ghi chú thêm<span style="color: #885DE5;">*</span> <br>
                    <input type="text" value="Cho xem hàng, nếu khách không lấy thu 20k tiền ship"
                      class="or-ttnh-input1">
                  </li>
                </ul>

                <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                  <li class="or-cgc-1">
                    Người trả cước<span style="color: #885DE5;">*</span> <br>
                    <input type="radio" name="" class="or-radio-checked" id="orNtc1" checked> <label for="orNtc1">
                      Người
                      gửi</label><br>
                    <input type="radio" name="" class="or-radio-checked" id="orNtc1a"> <label for="orNtc1a">Người
                      nhận</label>
                  </li>
                </ul>
                <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                  <li class="or-cgc-1">Giao hàng 1 phần<span style="color: #885DE5;">*</span> <br>
                    <input type="radio" name="gh1p" class="or-radio-checked" id="gh1p1" checked> <label for="gh1p1">Có
                    </label><br>
                    <input type="radio" name="gh1p" class="or-radio-checked" id="gh1p1a"> <label
                      for="gh1p1a">Không</label>
                  </li>
                </ul>
                <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                  <li class="or-cgc-1">
                    Dịch vụ chuyển hoàn <br>
                    <input type="radio" name="dichVuch" class="or-radio-checked" id="dvch1" checked> <label
                      for="dvch1">Có</label> <br>
                    <input type="radio" name="dichVuch" class="or-radio-checked" id="dvch1a"> <label
                      for="dvch1a">Không</label>
                  </li>
                </ul>
                <ul class="col-xl-2 col-sm-3 or-ctdh-1 or-ctdh-2">
                  <li class="or-cgc-1">
                    Dịch vụ thêm <br>
                    <input type="checkbox" class="regular-checkbox or-radio-checked" id="dvthem1" checked /> <label
                      for="dvthem1">Giao tận tay</label>
                    <br>
                    <input type="checkbox" class="regular-checkbox or-radio-checked" id="dvthem1a" /> <label
                      for="dvthem1a">Bốc
                      dỡ</label>
                  </li>
                </ul>
                <ul class="col-xl-4 col-sm-12 or-ctdh-1">
                  <li>
                    Ghi chú bắt buộc<span style="color: #885DE5;">*</span> <br>
                    <select style="width: 100%;">
                      <option value="">Cho xem hàng, không cho thử</option>
                      <option value="">Không cho xem hàng</option>
                      <option value="">Cho thử hàng</option>
                    </select>
                  </li>
                </ul>
                <ul class="col-md-6 col-sm-0">
                </ul>
                <ul class="col-md-3 col-sm-6 or-ctdh-btn1">
                  <button type="button" onclick="chinhsuanone('chinhsua1','qo-ed-1')">Hủy bỏ</button>
                </ul>
                <ul class="col-md-3 col-sm-6  or-ctdh-btn2">
                  <button type="button">Hoàn thành</button>
                </ul>
              </div>
              <!-- ========HẾT PHẦN SỬA HÀNG HÓA========= -->
            </div>
          </div>
        </div>
        <div class="btn-add-orders">
          <div>
            <img src="<?php echo base_url('public/images/Group284.png');?>" alt="" class="or-img-tdg">
          </div>
          <button type="button" class="or-tdg-btn" onclick="themdiemgiao()">
            <img src="<?php echo base_url('public/images/tdg2.png');?>" alt="" class="float-left pl-2">
            Thêm điểm giao</button>
        </div>


        <div class="or-tttx row">
          <ul class="col-md-3 col-sm-12 or-tttx-1">
            <div class="or-tttx-in-line">
              <img src="<?php echo base_url('public/images/Rectangle88.png');?>" alt="">
            </div>
            <li>
              <b>Thông tin tài xế</b>
            </li>
          </ul>
          <ul class="col-md-3 col-4 or-tttx-2 or-cgc-1">
            <li>
              Số điện thoại tài xế
            </li>
          </ul>
          <ul class="col-md-6  col-8 or-tttx-3">
            <li>
              <input type="text" placeholder="Nhận số điện thoại tài xế nếu có">
            </li>
          </ul>
        </div>
      </form>
    </div>
  </div>
  <div class="or-btn-tt">
    <ul class="row">
      <li class="col-md-9 col-sm-6 col-0"></li>
      <li class="col-md-3 col-sm-6 col-12 or-ttnh-input">
        <button>Tiếp tục</button>
      </li>
    </ul>
  </div>
</section>


<script>
var index = 2;
var slhh = 1;
var sldh = 1;
xoahanghoa = (idDelete) => {
  document.getElementById(idDelete).remove();
}
// $('.123').find('option').css("height", "20px");
themhanghoa = (ten, sl, lh, cod, kg, ttsp) => {
  var name = document.getElementById(ten).value;
  var amount = document.getElementById(sl).value;
  var category = document.getElementById(lh).value;
  var cod = document.getElementById(cod).value;
  var price = document.getElementById(kg).value;
  if (name == '') {
    alert('Bạn chưa nhập tên hàng hoá !')
  } else if (amount == '') {
    alert('Số lượng chưa được nhập !')
  } else if (category == '') {
    alert('Loại hàng chưa được nhập !')
  } else if (cod == '') {
    alert('Chưa có COD')
  } else if (price == '') {
    alert('Khai giá đang bị để trống')
  } else {
    $("#" + ttsp).append(`
          <ul class="col-12" id="tdl-tthh-${slhh}">
              <li class="or-ttdh-add">
                  <ul class="row">
                      <li class="or-dh-tt col-sm-3 pl-2">
                          <span class="or-dh-stt" style="background: #885DE5;">${slhh}</span>
                          <span id="ttct-cthh-name${slhh}">${name}</span>
                      </li>
                      <li class="or-dh-sl col-sm-1">
                          SL: <span id="ttct-cthh-amount${slhh}">${amount}</span>
                      </li>
                      <li class="or-dh-sp col-sm-3">
                          <span id="ttct-cthh-category${slhh}">${category}</span>
                      </li>
                      <li class="or-dh-cod col-sm-2">
                          COD: <span id="ttct-cthh-cod${slhh}">${cod}</span>đ
                      </li>
                      <li class="or-dh-kg col-sm-2">
                          Khai giá: <span id="ttct-cthh-price${slhh}">${price}</span>đ
                      </li>
                      <li class="or-dh-ed col-sm-1">
                          <img src="<?php echo base_url('public/images/or-delete.png');?>" onclick="xoahanghoa('tdl-tthh-${slhh}')">
                          <img src="<?php echo base_url('public/images/or-edit.png');?>" onclick="suahanghoa('${slhh}')">
                      </li>
                  </ul>
              </li>
          </ul>`);
    slhh++;
  }
}

// Sửa thông tin nhập vào
suahanghoa = (gt) => {
  document.getElementById('qo-btn-thh-1').style.display = "none";
  document.getElementById('qo-btn-thh-2').style.display = "block";
  document.getElementById('qo-tensp-ht').value = document.getElementById('ttct-cthh-name' + gt).innerHTML;
}


function themdiemgiao() {
  $("#ttdh-main").append(`
      <div class="or-dgh-1 pb-3" style="margin-left: -40px;">
              <span class="or-dh-stt" style="background-color: #2DB1DB;">${index}</span> Điểm giao hàng
            </div>
            <div class="or-ttdh row">
              <ul class="or-dgh col-6">
                <li class="or-dgh-2">
                  <input type="text" placeholder="Nhập địa chỉ người nhận">
                </li>
              </ul>
              <div id="ttdh-main" class="chinhsua1 mb-1">
                <!-- ========HIỂN THỊ KHI CLICK VÀO SỬA ĐƠN HÀNG ========= -->
                <div id="orders" class="or-ttdh row qo-ttdhl">
                  <ul class="or-dgh col-12 ">
                    <li class="or-dgh-1 pt-0 mt-0">
                      <span class="or-dh-stt" style="background: #F0A616;">1</span><span style="color: #68656D;">Thêm
                        đơn hàng chi tiết</span>
                    </li>
                    <li class="or-ttnh">
                      <ul>
                        <li class="or-ttnh-tt">
                          Thông tin nhận hàng
                        </li>
                      </ul>
                      <ul class="row">
                          <li class="col-md-3 col-sm-6 or-cgc-1">
                              Số điện thoại người nhận<span style="color: #885DE5;">*</span> <br>
                              <input type="text" placeholder="Nhập số điện thoại">
                          </li>
                          <li class="col-md-3 col-sm-6 or-cgc-1">
                              Tên người nhận<span style="color: #885DE5;">*</span> <br>
                              <input type="text" placeholder="Tên người nhận">
                          </li>
                          <li class="col-md-3 col-sm-6 or-cgc-1">
                              Ngày nhận<span style="color: #885DE5;">*</span> <br>
                              <input type="date" style="padding-right: 10px;">
                          </li>
                          <li class="col-md-3 col-sm-6 or-cgc-1">
                              Thời gian nhận<span style="color: #885DE5;">*</span> <br>
                              <input type="time" class="or-ttnh-input">
                          </li>
                      </ul>
                  </li>
                  <li class="or-ttnh">
                      <ul>
                          <li class="or-ttnh-tt">
                              Thông tin hàng hóa
                          </li>
                      </ul>
                      <ul class="row">
                          <li class="col-md-6 col-sm-12">
                              Tên hàng hóa<span style="color: #885DE5;">*</span> <br>
                              <input type="text" placeholder="Nhập tên hàng hóa" id="qo-tensp-ht${index}">
                          </li>
                          <li class="col-md-3 col-sm-6">
                              Tiền COD<span style="color: #885DE5;">*</span> <br>
                              <input type="text" placeholder="0" class="or-cod" id="qo-cod-ht${index}">
                              <span style="margin-left: -34px;">đ</span>
                          </li>
                          <li class="col-md-3 col-sm-6 or-cgc-1">
                              <input type="checkbox" class="regular-checkbox" style="width: 10px;height: 10px;">
                              Giá trị hàng hóa<span style="color: #885DE5;">*</span> <br>
                              <input type="text" placeholder="0" class="or-ttnh-input or-gtkg"
                                  id="qo-khaigia-ht${index}"><span style="margin-left: -34px;">đ</span>
                          </li>
                      </ul>
                      <ul class="row">
                          <li class="col-md-6 col-sm-12">
                              Loại hàng hóa<span style="color: #885DE5;">*</span> <br>
                              <input list="loai-hh" name="loai-hh" style="padding-right: 10px;"
                                  placeholder="Chọn loại hàng hóa" id="qo-loaisp-ht${index}">
                              <datalist id="loai-hh">
                                  <option value="Quần áo trẻ em"></option>
                                  <option value="Giày thể thao nam"></option>
                                  <option value="Loại hàng hóa"></option>
                                  <option value="Vợt cầu lông"></option>
                              </datalist>
                          </li>
                          <li class="col-md-3 col-sm-6">
                              Số lượng<span style="color: #885DE5;">*</span> <br>
                              <input list="browsers" name="browser" style="padding-right: 10px;" id="qo-soluong-ht${index}">
                              <datalist id="browsers">
                                  <option value="5">
                                  <option value="10">
                                  <option value="15">
                                  <option value="20">
                                  <option value="25">
                              </datalist>
                          </li>
                          <li class="col-md-3 col-sm-6">
                              <br>
                              <button  type="button" class="or-lhh-btn" id="qo-btn-thh-1"
                                  onclick="themhanghoa('qo-tensp-ht${index}','qo-soluong-ht${index}','qo-loaisp-ht${index}','qo-cod-ht${index}','qo-khaigia-ht${index}','ttsp${index}')">Thêm
                                  hàng hóa</button>
                              <button  type="button" class="or-lhh-btn qo-ed-a" id="qo-btn-thh-2">Sửa thông tin</button>
                          </li>
                      </ul>
                  </li>
              </ul>
              <div style="width: 100%;" class="ttsp" id="ttsp${index}">
              </div>
              <ul class="col-12">
                  <li class="or-dvht">
                      Dịch vụ hỗ trợ
                  </li>
              </ul>
              <ul class="col-md-3 col-sm-6 or-ctdh-1">
                  <li>
                      Kích thước hàng hóa<span style="color: #885DE5;">*</span> <br>
                      <input type="text" placeholder="Dài x rộng x cao"><span style="margin-left: -34px;">Cm</span>
                  </li>
              </ul>
              <ul class="col-md-3 col-sm-6 or-ctdh-1">
                  <li>
                      Khối lượng<span style="color: #885DE5;">*</span> <br>
                      <input type="text" value="200"><span style="margin-left: -50px;">Gram</span>
                  </li>
              </ul>
              <ul class="col-md-6 col-sm-12 or-ctdh-1">
                  <li>
                      Ghi chú thêm<span style="color: #885DE5;">*</span> <br>
                      <input type="text" value="Cho xem hàng, nếu khách không lấy thu 20k tiền ship"
                          class="or-ttnh-input1">
                  </li>
              </ul>
              <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                  <li class="or-cgc-1">
                      Người trả cước<span style="color: #885DE5;">*</span> <br>
                      <input type="radio" name="orNtc-${index}" class="or-radio-checked" id="orNtc-${index}" checked> <label
                          for="orNtc-${index}"> Người
                          gửi</label><br>
                      <input type="radio" name="orNtc-${index}" class="or-radio-checked" id="orNtc-${index}-a"> <label
                          for="orNtc-${index}-a">Người
                          nhận</label>
                  </li>
              </ul>
              <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                  <li class="or-cgc-1">Giao hàng 1 phần<span style="color: #885DE5;">*</span> <br>
                      <input type="radio" name="gh1p${index}" class="or-radio-checked" id="gh1p-${index}" checked> <label
                          for="gh1p-${index}">Có </label><br>
                      <input type="radio" name="gh1p${index}" class="or-radio-checked" id="gh1p-${index}-a"> <label
                          for="gh1p-${index}-a">Không</label>
                  </li>
              </ul>
              <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                  <li class="or-cgc-1">
                      Dịch vụ chuyển hoàn <br>
                      <input type="radio" name="dichVuch${index}" class="or-radio-checked" id="dvch-${index}" checked> <label
                          for="dvch-${index}">Có</label> <br>
                      <input type="radio" name="dichVuch${index}" class="or-radio-checked" id="dvch-${index}-a"> <label
                          for="dvch-${index}-a">Không</label>
                  </li>
              </ul>
              <ul class="col-xl-2 col-sm-3 or-ctdh-1 or-ctdh-2">
                  <li class="or-cgc-1">
                      Dịch vụ thêm <br>
                      <input type="checkbox" class="regular-checkbox or-radio-checked" id="dvthem-${index}" checked /> <label
                          for="dvthem-${index}">Giao tận tay</label>
                      <br>
                      <input type="checkbox" class="regular-checkbox or-radio-checked" id="dvthem-${index}-a" /> <label
                          for="dvthem-${index}-a">Bốc dỡ</label>
                  </li>
              </ul>
              <ul class="col-xl-4 col-sm-12 or-ctdh-1">
                  <li>
                      Ghi chú bắt buộc<span style="color: #885DE5;">*</span> <br>
                      <select style="width: 100%;">
                          <option value="">Cho xem hàng, không cho thử</option>
                          <option value="">Không cho xem hàng</option>
                          <option value="">Cho thử hàng</option>
                      </select>
                  </li>
              </ul>
              <ul class="col-md-6 col-sm-0">
              </ul>
              <ul class="col-md-3 col-sm-6 or-ctdh-btn1">
                  <button type="button" onclick="chinhsuanone("chinhsua","qo-ed-1")">Hủy bỏ</button>
              </ul>
              <ul class="col-md-3 col-sm-6  or-ctdh-btn2">
                  <button type="button">Hoàn thành</button>
              </ul>

          </div>`);
  index++;
}
</script>
<!-- Trang hỗ trợ 
    ====== An Tú DEV =========
-->
<section id="warehouse">
  <div class="warehouse-banner-title">
    <ul class="p-0">
      <li>
        <img src="<?php echo base_url('public/images/Home.png');?>" alt="">
      </li>
      <li class="mt2-config title-page">
        > <span><?php echo $title ?> </span>
      </li>
    </ul>
  </div>
</section>

<section id="journeys">
  <div id="jn-search">
    <ul class="list-unstyled">
      <li class="position-relative">
        <input type="text" placeholder="Vui nhập mã đơn hàng" class="w-100 pl-3">
        <img src="<?php echo base_url('public/images/Close.png');?>" alt="" class="position-absolute"
          style="width: 10px; height: 10px;right: 49px;top: 12px;">
        <img src="<?php echo base_url('public/images/Line5.png');?>" alt="" class="position-absolute"
          style="width: 1px; height: 18px;right: 38px;top: 7px;">
        <img src="<?php echo base_url('public/images/iconSearch.png');?>" alt="" class="position-absolute"
          style="width: 16px; height: 16px;right: 9px;top: 7px;">
      </li>
      <li class="mt-2 pl-2">
        Có thể nhập tối đa 30 mã, mỗi mã cách nhau bởi dấu phẩy
      </li>
    </ul>
  </div>


  <div id="jn-info" class="row m-0 ">
    <ul class="col-md-6 list-unstyled jn-if-left">
      <li id="orders" class="pt-3 jn-if-left-tt mb-2">
        <span class="or-dh-stt" style="background-color: #8D869D;">1</span>
        <b>S10724276.B.MB26.K1.D.12.874216502</b>
        <img src="<?php echo base_url('public/images/copy.svg');?>" alt="">
      </li>
      <li class="jn-if-left-1 pl-1 pr-1">
        <ul class="list-unstyled">
          <li class="jn-if-left-tt1">
            Thông tin người gửi
          </li>
          <li class="jn-if-ng">
            <img src="<?php echo base_url('public/images/Union.svg');?>" alt="">
            *** Mai - ***177
          </li>
          <li class="jn-if-ng mb-3">
            <img src="<?php echo base_url('public/images/maps.svg');?>" alt="">
            *** Quận Cầu Giấy, Hà Nội (2km)
          </li>
        </ul>
        <ul class="list-unstyled" style="border-top: 0.5px dashed #BCB8C6;box-sizing: border-box;">
          <li class="jn-if-left-tt1">
            Bên nhận
          </li>
          <li class="jn-if-ng">
            <img src="<?php echo base_url('public/images/Union.svg');?>" alt="">
            *** Phong - ***444
          </li>
          <li class="jn-if-ng mb-3">
            <img src="<?php echo base_url('public/images/maps.svg');?>" alt="">
            *** Quận Đống Đa, Hà Nội (8km)
          </li>
        </ul>
        <ul class="list-unstyled" style="border-top: 0.5px dashed #BCB8C6;box-sizing: border-box;">
          <li class="jn-if-left-tt1">
            Thông tin hàng hoá
          </li>
          <li class="ml-3">
            Sản phẩm: <span style="color: #885DE5;">Giày thể thao nam</span>
          </li>
          <li class="mb-3">
            <ul class="row jn-if-ng" style="padding-left: 60px;list-style: disc;">
              <li class="col-md-6 pl-0">
                Kích thước: <span style="color: #885DE5;">20 x 10 x 10 </span>cm
              </li>
              <li class="col-md-6 pl-0">
                Khối lượng: <span style="color: #885DE5;">100</span> gr
              </li>
              <li class="col-md-6 pl-0">
                Người trả cước: <span style="color: #885DE5;">Người gửi</span>
              </li>
              <li class="col-md-6 pl-0">
                Thu hộ COD: <span style="color: #F0A616;">350,000 </span> đ
              </li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
    <ul class="col-md-6 jn-if-right">
      <li class="pt-3">
        <img src="<?php echo base_url('public/images/tdl-bd.svg');?>" style="width: 25px;height: 25px;">
        <b>GH1H</b>
        <span class="float-right jn-if-right-status" style="color: #885DE5;">Chờ duyệt</span>
      </li>
      <li class="pt-3">
        <span>Hành trình đơn hàng</span>
      </li>
      <li>
        <ul class="row list-unstyled" style="font-size: 13px;">
          <li class="col-md-1 ">
            <img src="<?php echo base_url('public/images/Vector.svg');?>" style="width: 20px;height: 20px;margin: 0px;">
          </li>
          <li class="col-md-2 pt-2" style="font-weight: 500;">
            05/05/2021 <br>10:20
          </li>
          <li class="col-md-7 ml-2 pt-2">
            <span style="color: #2DB1DB;">Đã giao hàng và thu hộ 36,900,000 đ <br></span>
            Nội dung comment
          </li>
          <li class="col-md-1 pt-2">
            <img src="<?php echo base_url('public/images/iconImage.svg');?>" style="width: 24px;height: 24px;">
          </li>
        </ul>
        <ul class="row list-unstyled " style="font-size: 13px;">
          <li class="col-md-1">
            <img src="<?php echo base_url('public/images/hinhtron.png');?>"
              style="width: 9px;height: 9px;margin: 0 auto;">
          </li>
          <li class="col-md-2 pt-2" style="font-weight: 500;">
            05/05/2021 <br>10:20
          </li>
          <li class="col-md-7 ml-2 pt-2">
            <span style="color: #2DB1DB;">Đã giao hàng và thu hộ 36,900,000 đ <br></span>
            Nội dung comment
          </li>
          <li class="col-md-1 pt-2">
            <img src="<?php echo base_url('public/images/iconImage.svg');?>" style="width: 24px;height: 24px;">
          </li>
        </ul>
        <ul class="row list-unstyled " style="font-size: 13px;">
          <li class="col-md-1">
            <img src="<?php echo base_url('public/images/hinhtron.png');?>"
              style="width: 9px;height: 9px;margin: 0 auto;">
          </li>
          <li class="col-md-2 pt-2" style="font-weight: 500;">
            05/05/2021 <br>10:20
          </li>
          <li class="col-md-7 ml-2 pt-2">
            <span style="color: #2DB1DB;">Đã giao hàng và thu hộ 36,900,000 đ <br></span>
            Nội dung comment
          </li>
          <li class="col-md-1 pt-2">
            <img src="<?php echo base_url('public/images/iconImage.svg');?>" style="width: 24px;height: 24px;">
          </li>
        </ul>
        <ul class="row list-unstyled " style="font-size: 13px;">
          <li class="col-md-1">
            <img src="<?php echo base_url('public/images/hinhtron.png');?>"
              style="width: 9px;height: 9px;margin: 0 auto;">
          </li>
          <li class="col-md-2 pt-2" style="font-weight: 500;">
            05/05/2021 <br>10:20
          </li>
          <li class="col-md-7 ml-2 pt-2">
            <span style="color: #2DB1DB;">Đã giao hàng và thu hộ 36,900,000 đ <br></span>
            Nội dung comment
          </li>
          <li class="col-md-1 pt-2">
            <img src="<?php echo base_url('public/images/iconImage.svg');?>" style="width: 24px;height: 24px;">
          </li>
        </ul>
        <ul class="row list-unstyled " style="font-size: 13px;">
          <li class="col-md-1">
            <img src="<?php echo base_url('public/images/hinhtron.png');?>"
              style="width: 9px;height: 9px;margin: 0 auto;">
          </li>
          <li class="col-md-2 pt-2" style="font-weight: 500;">
            05/05/2021 <br>10:20
          </li>
          <li class="col-md-7 ml-2 pt-2">
            <span style="color: #2DB1DB;">Đã giao hàng và thu hộ 36,900,000 đ <br></span>
            Nội dung comment
          </li>
          <li class="col-md-1 pt-2">
            <img src="<?php echo base_url('public/images/iconImage.svg');?>" style="width: 24px;height: 24px;">
          </li>
        </ul>
        <ul class="row list-unstyled " style="font-size: 13px;">
          <li class="col-md-1">
            <img src="<?php echo base_url('public/images/hinhtron.png');?>"
              style="width: 9px;height: 9px;margin: 0 auto;">
          </li>
          <li class="col-md-2 pt-2" style="font-weight: 500;">
            05/05/2021 <br>10:20
          </li>
          <li class="col-md-7 ml-2 pt-2">
            <span style="color: #2DB1DB;">Đã giao hàng và thu hộ 36,900,000 đ <br></span>
            Nội dung comment
          </li>
          <li class="col-md-1 pt-2">
            <img src="<?php echo base_url('public/images/iconImage.svg');?>" style="width: 24px;height: 24px;">
          </li>
        </ul>
      </li>
    </ul>
  </div>



  <div id="jn-info1" class="row m-0 jn-info">
    <ul class="col-md-6 list-unstyled jn-if-left">
      <li id="orders" class="pt-3 jn-if-left-tt mb-2">
        <span class="or-dh-stt" style="background-color: #8D869D;">1</span>
        <b>S10724276.B.MB26.K1.D.12.874216502</b>
        <img src="<?php echo base_url('public/images/copy.svg');?>" alt="">
      </li>
      <li class="jn-if-left-1 pl-1 pr-1">
        <ul class="list-unstyled">
          <li class="jn-if-left-tt1">
            Thông tin người gửi
          </li>
          <li class="jn-if-ng">
            <img src="<?php echo base_url('public/images/Union.svg');?>" alt="">
            *** Mai - ***177
          </li>
          <li class="jn-if-ng mb-3">
            <img src="<?php echo base_url('public/images/maps.svg');?>" alt="">
            *** Quận Cầu Giấy, Hà Nội (2km)
          </li>
        </ul>
        <ul class="list-unstyled" style="border-top: 0.5px dashed #BCB8C6;box-sizing: border-box;">
          <li class="jn-if-left-tt1">
            Bên nhận
          </li>
          <li class="jn-if-ng">
            <img src="<?php echo base_url('public/images/Union.svg');?>" alt="">
            *** Phong - ***444
          </li>
          <li class="jn-if-ng mb-3">
            <img src="<?php echo base_url('public/images/maps.svg');?>" alt="">
            *** Quận Đống Đa, Hà Nội (8km)
          </li>
        </ul>
        <ul class="list-unstyled" style="border-top: 0.5px dashed #BCB8C6;box-sizing: border-box;">
          <li class="jn-if-left-tt1">
            Thông tin hàng hoá
          </li>
          <li class="ml-3">
            Sản phẩm: <span style="color: #885DE5;">Giày thể thao nam</span>
          </li>
          <li class="mb-3">
            <ul class="row jn-if-ng" style="padding-left: 60px;list-style: disc;">
              <li class="col-md-6 pl-0">
                Kích thước: <span style="color: #885DE5;">20 x 10 x 10 </span>cm
              </li>
              <li class="col-md-6 pl-0">
                Khối lượng: <span style="color: #885DE5;">100</span> gr
              </li>
              <li class="col-md-6 pl-0">
                Người trả cước: <span style="color: #885DE5;">Người gửi</span>
              </li>
              <li class="col-md-6 pl-0">
                Thu hộ COD: <span style="color: #F0A616;">350,000 </span> đ
              </li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
    <ul class="col-md-6 jn-if-right">
      <li class="pt-3">
        <img src="<?php echo base_url('public/images/tdl-bd.svg');?>" style="width: 25px;height: 25px;">
        <b>GH1H</b>
        <span class="float-right jn-if-right-status" style="color: #885DE5;">Chờ duyệt</span>
      </li>
      <li class="pt-3">
        <span>Hành trình đơn hàng</span>
      </li>
      <li>
        <ul class="row list-unstyled" style="font-size: 13px;">
          <li class="col-md-1 ">
            <img src="<?php echo base_url('public/images/Vector.svg');?>" style="width: 20px;height: 20px;margin: 0px;">
          </li>
          <li class="col-md-2 pt-2" style="font-weight: 500;">
            05/05/2021 <br>10:20
          </li>
          <li class="col-md-7 ml-2 pt-2">
            <span style="color: #2DB1DB;">Đã giao hàng và thu hộ 36,900,000 đ <br></span>
            Nội dung comment
          </li>
          <li class="col-md-1 pt-2">
            <img src="<?php echo base_url('public/images/iconImage.svg');?>" style="width: 24px;height: 24px;">
          </li>
        </ul>
        <ul class="row list-unstyled " style="font-size: 13px;">
          <li class="col-md-1">
            <img src="<?php echo base_url('public/images/hinhtron.png');?>"
              style="width: 9px;height: 9px;margin: 0 auto;">
          </li>
          <li class="col-md-2 pt-2" style="font-weight: 500;">
            05/05/2021 <br>10:20
          </li>
          <li class="col-md-7 ml-2 pt-2">
            <span style="color: #2DB1DB;">Đã giao hàng và thu hộ 36,900,000 đ <br></span>
            Nội dung comment
          </li>
          <li class="col-md-1 pt-2">
            <img src="<?php echo base_url('public/images/iconImage.svg');?>" style="width: 24px;height: 24px;">
          </li>
        </ul>
        <ul class="row list-unstyled " style="font-size: 13px;">
          <li class="col-md-1">
            <img src="<?php echo base_url('public/images/hinhtron.png');?>"
              style="width: 9px;height: 9px;margin: 0 auto;">
          </li>
          <li class="col-md-2 pt-2" style="font-weight: 500;">
            05/05/2021 <br>10:20
          </li>
          <li class="col-md-7 ml-2 pt-2">
            <span style="color: #2DB1DB;">Đã giao hàng và thu hộ 36,900,000 đ <br></span>
            Nội dung comment
          </li>
          <li class="col-md-1 pt-2">
            <img src="<?php echo base_url('public/images/iconImage.svg');?>" style="width: 24px;height: 24px;">
          </li>
        </ul>
        <ul class="row list-unstyled " style="font-size: 13px;">
          <li class="col-md-1">
            <img src="<?php echo base_url('public/images/hinhtron.png');?>"
              style="width: 9px;height: 9px;margin: 0 auto;">
          </li>
          <li class="col-md-2 pt-2" style="font-weight: 500;">
            05/05/2021 <br>10:20
          </li>
          <li class="col-md-7 ml-2 pt-2">
            <span style="color: #2DB1DB;">Đã giao hàng và thu hộ 36,900,000 đ <br></span>
            Nội dung comment
          </li>
          <li class="col-md-1 pt-2">
            <img src="<?php echo base_url('public/images/iconImage.svg');?>" style="width: 24px;height: 24px;">
          </li>
        </ul>
        <ul class="row list-unstyled " style="font-size: 13px;">
          <li class="col-md-1">
            <img src="<?php echo base_url('public/images/hinhtron.png');?>"
              style="width: 9px;height: 9px;margin: 0 auto;">
          </li>
          <li class="col-md-2 pt-2" style="font-weight: 500;">
            05/05/2021 <br>10:20
          </li>
          <li class="col-md-7 ml-2 pt-2">
            <span style="color: #2DB1DB;">Đã giao hàng và thu hộ 36,900,000 đ <br></span>
            Nội dung comment
          </li>
          <li class="col-md-1 pt-2">
            <img src="<?php echo base_url('public/images/iconImage.svg');?>" style="width: 24px;height: 24px;">
          </li>
        </ul>
        <ul class="row list-unstyled " style="font-size: 13px;">
          <li class="col-md-1">
            <img src="<?php echo base_url('public/images/hinhtron.png');?>"
              style="width: 9px;height: 9px;margin: 0 auto;">
          </li>
          <li class="col-md-2 pt-2" style="font-weight: 500;">
            05/05/2021 <br>10:20
          </li>
          <li class="col-md-7 ml-2 pt-2">
            <span style="color: #2DB1DB;">Đã giao hàng và thu hộ 36,900,000 đ <br></span>
            Nội dung comment
          </li>
          <li class="col-md-1 pt-2">
            <img src="<?php echo base_url('public/images/iconImage.svg');?>" style="width: 24px;height: 24px;">
          </li>
        </ul>
      </li>
    </ul>
  </div>
</section>
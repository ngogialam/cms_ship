<section id="orders">
    <div class="warehouse-banner-title">
        <ul>
            <li>
                <img src="<?php echo base_url('public/images/Home.png');?>" alt="">
            </li>
            <li class="mt2-config title-page">
                > <span> Tài khoản </span> > <span><?php echo $title ?></span>
            </li>
        </ul>
    </div>
    <div class="orders-title row">
        <div class=" col-md-3 col-sm-12  or-tdl-txt">
            TẠO ĐƠN LẺ
        </div>
        <div class="col-md-2 col-sm-4">
            <ul class="or-banner1">
                <li style="background: #2DB1DB!important;color: white!important">
                    1
                </li>
                <li style="color: #2DB1DB!important;" class="or-cgc-1">
                    GN1
                </li>
            </ul>
        </div>
        <div class=" col-md-2 col-sm-4">
            <ul class="or-banner">
                <li>
                    2
                </li>
                <li class="or-cgc-1">
                    Nhập thông tin
                </li>
            </ul>
        </div>

        <div class=" col-md-2 col-sm-4">
            <ul class="or-banner1">
                <li>
                    3
                </li>
                <li class="or-cgc-1">
                    Xác nhận
                </li>
            </ul>
        </div>
        <div class=" col-md-3 col-sm-12 or-btn">
            <button>
                Tạo đơn nhanh <img src="<?php echo base_url('public/images/tdl-bd3.png');?>" alt="">
            </button>
        </div>
    </div>

    <div class="or-ttng row">
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
                    Số điện thoại<span style="color: #885DE5;">*</span>
                </li>
                <li>
                    <input type="text" placeholder="Nhập số điện thoại">
                </li>
            </ul>
        </div>
        <div class="col-md-6 col-sm-12 or-ttng-right">
            <ul style="margin-bottom: 17px">
                <li style="height: 23px;">
                    <select name="" id="">
                        <option value="">
                            Chọn kho hàng
                        </option>
                        <option value="">
                            Kho hàng 1
                        </option>
                        <option value="">
                            Kho hàng 2
                        </option>
                    </select>
                </li>
            </ul>
            <ul>
                <li>
                    Địa chỉ lấy hàng<span style="color: #885DE5;">*</span>
                    <span style="float: right;"><input type="checkbox" class="regular-checkbox"
                            style="width: 10px; height: 10px;"> Lưu kho mới</span>
                </li>
                <li>
                    <input type="text" placeholder="Nhập địa chỉ lấy hàng">
                </li>
            </ul>
        </div>
    </div>

    <div class="or-ttdh row">
        <ul class="or-dgh col-6">
            <li>
                <b>Thông tin đơn hàng</b>
            </li>
            <li class="or-dgh-1">
                <span class="or-dh-stt">1</span> Điểm giao hàng
            </li>
            <li class="or-dgh-2">
                <input type="text" placeholder="Nhập địa chỉ người nhận">
            </li>
        </ul>

        <!-- Nếu có thêm mới hàng hóa thì phần này sẽ đươc hiện -->

        <ul class="col-12">
            <li class="col-12" style="border-top: 0.5px dashed #BCB8C6;"></li>
        </ul>

        <ul class="col-12">
            <li class="or-ttdh-add">
                <ul>
                    <li class="or-dh-tt ">
                        <span class="or-dh-stt">1</span>
                        <span class="or-dh-sdt"> 0912088777</span> <img
                            src="<?php echo base_url('public/images/or-dh-sdt.png');?>" alt=""><br>
                        <span class="or-dh-name ">Phạm Phương Hà My</span>
                    </li>
                    <li class="or-dh-sp ">
                        <span>Quần áo trẻ em</span>
                        <br><span>Iphone 13 promax trắng 256G </span>
                        <br><span>Laptop Mackbook Pro M1 2021</span>
                    </li>
                    <li class="or-dh-sl">
                        SL: <span> 2</span>
                        <br>SL: <span> 1</span>
                        <br>SL: <span> 2</span>
                    </li>
                </ul>

                <ul>
                    <li class="or-dh-cod ">
                        COD: <span> 4.000,000 </span>đ
                        <br>COD: <span> 4.000,000 </span>đ
                        <br>COD: <span> 4.000,000 </span>đ
                    </li>
                    <li class="or-dh-kg ">
                        Khai giá: <span>4.000,000 </span>đ
                        <br>Khai giá: <span>4.000,000</span> đ
                        <br>Khai giá: <span>4.000,000</span>đ
                    </li>
                    <li class="or-dh-ed ">
                        <img src="<?php echo base_url('public/images/or-delete.png');?>" alt="">
                        <img src="<?php echo base_url('public/images/or-edit.png');?>" alt=""
                            onclick="suathongtinhanghoa()">
                    </li>

                </ul>
            </li>
        </ul>


        <!-- END hàng hóa -->
        <div class="col-md-3 or-themdonct">
            <button class="or-themdonct-btn" onclick="hienthithemhanghoa()">
                <img src="<?php echo base_url('public/images/themdonct.png');?>" alt="" class="or-themdonct-bl">
                <img src="<?php echo base_url('public/images/tdg2.png');?>" alt="" class="or-themdonct-none">
                Thêm đơn hàng chi tiết
            </button>
        </div>

        <ul class="or-line-bottom1">
            <li>
                <ul></ul>
            </li>
        </ul>

        <!-- ========HIỂN THỊ KHI CLICK VÀO THÊM ĐƠN HÀNG CHI TIẾT========= -->
        <div class="or-ttdh row " id="or-themhanghoa-detail">
            <ul class="or-dgh col-6">
                <li>
                    <b>Thông tin đơn hàng</b>
                </li>
                <li class="or-dgh-1">
                    <span class="or-dh-stt">1</span> Điểm giao hàng
                </li>
                <li class="or-dgh-2">
                    <input type="text" placeholder="Nhập địa chỉ người nhận">
                </li>
            </ul>



            <ul class="or-dgh col-12">
                <li class="or-dgh-1" style="margin-top: -17px">
                <span class="or-dh-stt">1</span> Thêm đơn hàng chi tiết
                </li>
                <li class="or-ttnh">
                    <ul>
                        <li class="or-ttnh-tt">
                            Thông tin nhận hàng
                        </li>
                    </ul>
                    <ul class="row">
                        <li class="col-md-3 col-sm-6 or-cgc-1">
                            Nhập số điện thoại người nhận<span style="color: #885DE5;">*</span> <br>
                            <input type="text" placeholder="Nhập số điện thoại" name="" id="">
                        </li>
                        <li class="col-md-3 col-sm-6 or-cgc-1">
                            Tên người nhận<span style="color: #885DE5;">*</span> <br>
                            <input type="text" placeholder="Tên người nhận" name="" id="">
                        </li>
                        <li class="col-md-3 col-sm-6 or-cgc-1">
                            Ngày nhận mong muốn<span style="color: #885DE5;">*</span> <br>
                            <input type="date" name="" id="" style="padding-right: 10px;">
                        </li>
                        <li class="col-md-3 col-sm-6 or-cgc-1">
                            Thời gian mong muốn<span style="color: #885DE5;">*</span> <br>
                            <input type="time" name="" id="" class="or-ttnh-input">
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
                            <input type="text" placeholder="Nhập số điện thoại" name="" id="">
                        </li>
                        <li class="col-md-3 col-sm-6">
                            Tiền COD<span style="color: #885DE5;">*</span> <br>
                            <input type="number" placeholder="0" name="" id="" class="or-cod"><span
                                style="margin-left: -34px;">đ</span>
                        </li>
                        <li class="col-md-3 col-sm-6 or-cgc-1">
                            <input type="checkbox" class="regular-checkbox" style="width: 10px;height: 10px;"> Giá trị
                            khai giá<span style="color: #885DE5;">*</span> <br>
                            <input type="number" placeholder="0" class="or-ttnh-input or-gtkg"><span
                                style="margin-left: -34px;">đ</span>
                        </li>

                    </ul>
                    <ul class="row">
                        <li class="col-md-6 col-sm-12">
                            Loại hàng hóa<span style="color: #885DE5;">*</span> <br>
                            <input list="loai-hh" name="loai-hh" style="padding-right: 10px;"
                                placeholder="Loại hàng hóa">
                            <datalist id="loai-hh">
                                <option value="Loại hàng hóa" style="width: 10px;"></option>
                                <option value="Loại hàng hóa"></option>
                                <option value="Loại hàng hóa"></option>
                                <option value="Loại hàng hóa"></option>
                            </datalist>


                        </li>
                        <li class="col-md-3 col-sm-6">
                            Số lượng<span style="color: #885DE5;">*</span> <br>
                            <input list="browsers" name="browser" style="padding-right: 10px;padding-bottom: 10px;">
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
                            <button class="or-lhh-btn">Thêm hàng hóa</button>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Nếu có thêm mới hàng hóa thì phần này sẽ đươc hiện -->
            <ul class="col-12">
                <li class="or-ttdh-add">
                    <ul>
                        <li class="or-dh-tt">
                            <span class="or-dh-stt" style="background: #885DE5;">1</span>
                            <span>Quần áo trẻ em</span>
                        </li>
                        <li class="or-dh-sl">
                            SL: <span> 2</span>

                        </li>
                        <li class="or-dh-sp">
                            <span>Hàng tiêu dùng</span>

                        </li>

                        <li class="or-dh-cod">
                            COD: <span> 4.000,000 </span>đ

                        </li>
                        <li class="or-dh-kg">
                            Khai giá: <span>4.000,000 </span>đ

                        </li>
                        <li class="or-dh-ed">
                            <a href=""><img src="<?php echo base_url('public/images/or-delete.png');?>" alt=""></a>
                            <a href=""><img src="<?php echo base_url('public/images/or-edit.png');?>" alt=""></a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="col-12">
                <li class="or-ttdh-add">
                    <ul>
                        <li class="or-dh-tt">
                            <span class="or-dh-stt" style="background: #885DE5;">1</span>
                            <span>Quần áo trẻ em</span>
                        </li>
                        <li class="or-dh-sl">
                            SL: <span> 2</span>

                        </li>
                        <li class="or-dh-sp">
                            <span>Hàng tiêu dùng</span>

                        </li>

                        <li class="or-dh-cod">
                            COD: <span> 4.000,000 </span>đ

                        </li>
                        <li class="or-dh-kg">
                            Khai giá: <span>4.000,000 </span>đ

                        </li>
                        <li class="or-dh-ed">
                            <a href=""><img src="<?php echo base_url('public/images/or-delete.png');?>" alt=""></a>
                            <a href=""><img src="<?php echo base_url('public/images/or-edit.png');?>" alt=""></a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- END hàng hóa -->



            <ul class="col-12">
                <li>
                    <ul>
                        <li class="or-dvht">
                            Dịch vụ hỗ trợ
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="col-md-3 col-sm-6 or-ctdh-1">
                <li>

                    <ul>
                        <li>
                            Kích thước hàng hóa<span style="color: #885DE5;">*</span> <br>
                            <input type="text" placeholder="Dài x Rộng x Cao"><span
                                style="margin-left: -34px;">Cm</span>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="col-md-3 col-sm-6 or-ctdh-1">
                <li>
                    <ul>
                        <li>
                            Khối lượng<span style="color: #885DE5;">*</span> <br>
                            <input type="text" placeholder="Khối lượng"><span style="margin-left: -50px;">Gram</span>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="col-md-6 col-sm-12 or-ctdh-1">
                <li>
                    <ul>
                        <li>
                            Ghi chú thêm<span style="color: #885DE5;">*</span> <br>
                            <input type="text" placeholder="Nhập ghi chú thêm" class="or-ttnh-input1">
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                <li>
                    <ul>
                        <li class="or-cgc-1">
                            Người trả cước<span style="color: #885DE5;">*</span> <br>
                            <input type="radio" name="or-ntc" class="or-radio-checked"> Người gửi<br>
                            <input type="radio" name="or-ntc" class="or-radio-checked"> Người nhận
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                <li>
                    <ul>
                        <li class="or-cgc-1">
                            Giao hàng 1 phần<span style="color: #885DE5;">*</span> <br>
                            <input type="radio" name="or-ntc1" class="or-radio-checked"> Có <br>
                            <input type="radio" name="or-ntc1" class="or-radio-checked"> Không
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                <li>
                    <ul>
                        <li class="or-cgc-1">
                            Dịch vụ chuyển hoàn <br>
                            <input type="radio" name="or-ntc2" class="or-radio-checked"> Có <br>
                            <input type="radio" name="or-ntc2" class="or-radio-checked"> Không
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="col-xl-2 col-sm-3 or-ctdh-1 or-ctdh-2">
                <li>
                    <ul>
                        <li class="or-cgc-1">
                            Dịch vụ thêm <br>
                            <input type="checkbox" class="regular-checkbox or-radio-checked" /> Giao tận tay <br>
                            <input type="checkbox" class="regular-checkbox or-radio-checked" /> Bốc dỡ
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="col-xl-4 col-sm-12 or-ctdh-1">
                <li>
                    <ul>
                        <li>
                            Ghi chú bắt buộc<span style="color: #885DE5;">*</span> <br>
                            <select name="" id="" style="width: 100%;">
                                <option value="">Cho xem hàng, không cho thử</option>
                                <option value="">Không cho xem hàng</option>
                                <option value="">Cho thử hàng</option>
                            </select>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="col-md-6 col-sm-0">
            </ul>
            <ul class="col-md-3 col-sm-6 or-ctdh-btn1">
                <button>Hủy bỏ</button>
            </ul>
            <ul class="col-md-3 col-sm-6  or-ctdh-btn2">
                <button>Hoàn thành</button>
            </ul>
            <ul class="or-line-bottom">
                <li>
                    <ul></ul>
                </li>
            </ul>

        </div>
        <!-- ========HẾT PHẦN HIỂN THỊ KHI CLICK VÀO THÊM ĐƠN HÀNG CHI TIẾT========= -->


        <!-- ========HIỂN THỊ KHI CLICK VÀO SỬA ĐƠN HÀNG ========= -->
        <div class="or-ttdh row " id="or-suahanghoa-detail">
            <ul class="or-dgh col-6">

                <li class="or-dgh-1">
                <span class="or-dh-stt">1</span> Điểm giao hàng
                </li>
                <li class="or-dgh-2">
                    <input type="text" placeholder="Nhập địa chỉ người nhận">
                </li>
            </ul>

            <ul class="col-12">

                <li class="or-ttdh-add">
                    <ul>
                        <li class="or-dh-tt ">
                            <span class="or-dh-stt">1</span>
                            <span class="or-dh-sdt"> 0912088777</span> <img
                                src="<?php echo base_url('public/images/or-dh-sdt.png');?>" alt=""><br>
                            <span class="or-dh-name">Phạm Phương Hà My</span>
                        </li>
                        <li class="or-dh-sp ">
                            <span>Quần áo trẻ em</span>
                            <br><span>Iphone 13 promax trắng 256G </span>
                            <br><span>Laptop Mackbook Pro M1 2021</span>
                        </li>
                        <li class="or-dh-sl">
                            SL: <span> 2</span>
                            <br>SL: <span> 1</span>
                            <br>SL: <span> 2</span>
                        </li>
                    </ul>

                    <ul>
                        <li class="or-dh-cod ">
                            COD: <span> 4.000,000 </span>đ
                            <br>COD: <span> 4.000,000 </span>đ
                            <br>COD: <span> 4.000,000 </span>đ
                        </li>
                        <li class="or-dh-kg ">
                            Khai giá: <span>4.000,000 </span>đ
                            <br>Khai giá: <span>4.000,000</span> đ
                            <br>Khai giá: <span>4.000,000</span>đ
                        </li>
                        <li class="or-dh-ed ">
                            <a href=""><img src="<?php echo base_url('public/images/or-delete.png');?>" alt=""></a>
                            <a href=""><img src="<?php echo base_url('public/images/or-edit.png');?>" alt=""></a>
                        </li>

                    </ul>
                </li> 
            </ul>


            <ul class="or-dgh col-12">
                <li class="or-dgh-1" style="margin-top: -17px">
                <span class="or-dh-stt">2</span> Sửa đơn hàng chi tiết
                </li>
                <li class="or-ttnh">
                    <ul>
                        <li class="or-ttnh-tt">
                            Thông tin nhận hàng
                        </li>
                    </ul>
                    <ul class="row">
                        <li class="col-md-3 col-sm-6 or-cgc-1">
                            Nhập số điện thoại người nhận<span style="color: #885DE5;">*</span> <br>
                            <input type="text" placeholder="Nhập số điện thoại" name="" id="">
                        </li>
                        <li class="col-md-3 col-sm-6 or-cgc-1">
                            Tên người nhận<span style="color: #885DE5;">*</span> <br>
                            <input type="text" placeholder="Tên người nhận" name="" id="">
                        </li>
                        <li class="col-md-3 col-sm-6 or-cgc-1">
                            Ngày nhận mong muốn<span style="color: #885DE5;">*</span> <br>
                            <input type="date" name="" id="" style="padding-right: 10px;">
                        </li>
                        <li class="col-md-3 col-sm-6 or-cgc-1">
                            Thời gian mong muốn<span style="color: #885DE5;">*</span> <br>
                            <input type="time" name="" id="" class="or-ttnh-input">
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
                            <input type="text" placeholder="Nhập số điện thoại" name="" id="">
                        </li>
                        <li class="col-md-3 col-sm-6">
                            Tiền COD<span style="color: #885DE5;">*</span> <br>
                            <input type="number" placeholder="0" name="" id="" class="or-cod"><span
                                style="margin-left: -34px;">đ</span>
                        </li>
                        <li class="col-md-3 col-sm-6 or-cgc-1">
                            <input type="checkbox" class="regular-checkbox" style="width: 10px;height: 10px;"> Giá trị
                            khai giá<span style="color: #885DE5;">*</span> <br>
                            <input type="number" placeholder="0" class="or-ttnh-input or-gtkg"><span
                                style="margin-left: -34px;">đ</span>
                        </li>

                    </ul>
                    <ul class="row">
                        <li class="col-md-6 col-sm-12">
                            Loại hàng hóa<span style="color: #885DE5;">*</span> <br>
                            <input list="loai-hh" name="loai-hh" style="padding-right: 10px;"
                                placeholder="Loại hàng hóa">
                            <datalist id="loai-hh">
                                <option value="Loại hàng hóa" style="width: 10px;"></option>
                                <option value="Loại hàng hóa"></option>
                                <option value="Loại hàng hóa"></option>
                                <option value="Loại hàng hóa"></option>
                            </datalist>


                        </li>
                        <li class="col-md-3 col-sm-6">
                            Số lượng<span style="color: #885DE5;">*</span> <br>
                            <input list="browsers" name="browser" style="padding-right: 10px;padding-bottom: 10px;"
                                placeholder="1">
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
                            <button class="or-lhh-btn">Thêm hàng hóa</button>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Nếu có thêm mới hàng hóa thì phần này sẽ đươc hiện -->
            <ul class="col-12">
                <li class="or-ttdh-add">
                    <ul>
                        <li class="or-dh-tt">
                            <span class="or-dh-stt" style="background: #885DE5;">1</span>
                            <span>Quần áo trẻ em</span>
                        </li>
                        <li class="or-dh-sl">
                            SL: <span> 2</span>

                        </li>
                        <li class="or-dh-sp">
                            <span>Hàng tiêu dùng</span>

                        </li>

                        <li class="or-dh-cod">
                            COD: <span> 4.000,000 </span>đ

                        </li>
                        <li class="or-dh-kg">
                            Khai giá: <span>4.000,000 </span>đ

                        </li>
                        <li class="or-dh-ed">
                            <a href=""><img src="<?php echo base_url('public/images/or-delete.png');?>" alt=""></a>
                            <a href=""><img src="<?php echo base_url('public/images/or-edit.png');?>" alt=""></a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="col-12">
                <li class="or-ttdh-add">
                    <ul>
                        <li class="or-dh-tt">
                            <span class="or-dh-stt" style="background: #885DE5;">1</span>
                            <span>Quần áo trẻ em</span>
                        </li>
                        <li class="or-dh-sl">
                            SL: <span> 2</span>

                        </li>
                        <li class="or-dh-sp">
                            <span>Hàng tiêu dùng</span>

                        </li>

                        <li class="or-dh-cod">
                            COD: <span> 4.000,000 </span>đ

                        </li>
                        <li class="or-dh-kg">
                            Khai giá: <span>4.000,000 </span>đ

                        </li>
                        <li class="or-dh-ed">
                            <a href=""><img src="<?php echo base_url('public/images/or-delete.png');?>" alt=""></a>
                            <a href=""><img src="<?php echo base_url('public/images/or-edit.png');?>" alt=""></a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- END hàng hóa -->



            <ul class="col-12">
                <li>
                    <ul>
                        <li class="or-dvht">
                            Dịch vụ hỗ trợ
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="col-md-3 col-sm-6 or-ctdh-1">
                <li>

                    <ul>
                        <li>
                            Kích thước hàng hóa<span style="color: #885DE5;">*</span> <br>
                            <input type="text" placeholder="Dài x Rộng x Cao"><span
                                style="margin-left: -34px;">Cm</span>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="col-md-3 col-sm-6 or-ctdh-1">
                <li>
                    <ul>
                        <li>
                            Khối lượng<span style="color: #885DE5;">*</span> <br>
                            <input type="text" placeholder="Khối lượng"><span style="margin-left: -50px;">Gram</span>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="col-md-6 col-sm-12 or-ctdh-1">
                <li>
                    <ul>
                        <li>
                            Ghi chú thêm<span style="color: #885DE5;">*</span> <br>
                            <input type="text" placeholder="Nhập ghi chú thêm" class="or-ttnh-input1">
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                <li>
                    <ul>
                        <li class="or-cgc-1">
                            Người trả cước<span style="color: #885DE5;">*</span> <br>
                            <input type="radio" name="or-ntc" class="or-radio-checked"> Người gửi<br>
                            <input type="radio" name="or-ntc" class="or-radio-checked"> Người nhận
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                <li>
                    <ul>
                        <li class="or-cgc-1"> <span style="color: #885DE5;">*</span> <br>
                            <input type="radio" name="or-ntc1" class="or-radio-checked"> Có <br>
                            <input type="radio" name="or-ntc1" class="or-radio-checked"> Không
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="col-xl-2 col-sm-3 or-ctdh-1">
                <li>
                    <ul>
                        <li class="or-cgc-1">
                            Dịch vụ chuyển hoàn <br>
                            <input type="radio" name="or-ntc2" class="or-radio-checked"> Có <br>
                            <input type="radio" name="or-ntc2" class="or-radio-checked"> Không
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="col-xl-2 col-sm-3 or-ctdh-1 or-ctdh-2">
                <li>
                    <ul>
                        <li class="or-cgc-1">
                            Dịch vụ thêm <br>
                            <input type="checkbox" class="regular-checkbox or-radio-checked" /> Giao tận tay <br>
                            <input type="checkbox" class="regular-checkbox or-radio-checked" /> Bốc dỡ
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="col-xl-4 col-sm-12 or-ctdh-1">
                <li>
                    <ul>
                        <li>
                            Ghi chú bắt buộc<span style="color: #885DE5;">*</span> <br>
                            <select name="" id="" style="width: 100%;">
                                <option value="">Cho xem hàng, không cho thử</option>
                                <option value="">Không cho xem hàng</option>
                                <option value="">Cho thử hàng</option>
                            </select>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="col-md-6 col-sm-0">
            </ul>
            <ul class="col-md-3 col-sm-6 or-ctdh-btn1">
                <button>Hủy bỏ</button>
            </ul>
            <ul class="col-md-3 col-sm-6  or-ctdh-btn2">
                <button>Hoàn thành</button>
            </ul>
            <ul class="or-line-bottom">
                <li>
                    <ul></ul>
                </li>
            </ul>

        </div>
        <!-- ========HẾT PHẦN SỬA HÀNG HÓA========= -->



        <ul class="col-md-3 col-2">
        </ul>
        <ul class="col-md-6 col-sm-8">
            <li>
                <button class="or-tdg-btn">
                    <img src="<?php echo base_url('public/images/tdg.png');?>" alt="" class="or-tdg-btn-bl">
                    <img src="<?php echo base_url('public/images/tdg2.png');?>" alt="" class="or-tdg-btn-no">
                    Thêm điểm giao</button>
            </li>
        </ul>
        <ul class="col-md-3 col-2">
        </ul>
    </div>


    <div class="or-tttx row">
        <ul class="col-md-3 col-sm-12 or-tttx-1">
            <li>
                <ul>
                    <li>
                        <b>Thông tin tài xế</b>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="col-md-3 col-4 or-tttx-2 or-cgc-1">
            <li>
                <ul>
                    <li>
                        Số điện thoại tài xế
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="col-md-6  col-8 or-tttx-3">
            <li>
                <ul>
                    <li>
                        <input type="text" placeholder="Nhận số điện thoại tài xế nếu có">
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="or-btn-tt">
        <ul>
            <li>
                <ul class="row">
                    <li class="col-md-9 col-sm-6 col-0"></li>
                    <li class="col-md-3 col-sm-6 col-12 or-ttnh-input">
                        <button>Tiếp tục</button>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</section>


<script>
function hienthithemhanghoa() {
    document.getElementById("or-themhanghoa-detail").style.display = "inherit";
}

function suathongtinhanghoa() {
    document.getElementById("or-suahanghoa-detail").style.display = "inherit";
}
</script>
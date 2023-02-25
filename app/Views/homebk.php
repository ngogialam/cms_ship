<!-- partial:partials/_navbar.html -->
<div class="main-panel">
    <div class="content-wrapper">
        <form method="get" action="">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-content-title">Danh sách đơn hàng</h2>
                    <div class="row">
                        <div class="form-group col-md-4 pdr">
                            <input type="text" name="orderID" class="form-control" placeholder="Mã vận đơn/ SĐT">
                        </div>
                        <div class="form-group col-md-2 pdr">
                            <select class="form-control pdm chosen-select" name="regionID" data-placeholder="Chọn Vùng">
                                <option value="">Chọn Vùng</option>
                                <option value="51">Vùng 3.1 - Hoàn Kiếm</option>
                                <option value="52">Vùng 3.2 - Hoàn Kiếm</option>
                                <option value="53">Vùng 3.1 - Hoàn Kiếm</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2 pdr">
                            <select class="form-control pdm chosen-select" name="areaID" data-placeholder="Chọn Phường">
                                <option value="">Chọn Phường</option>
                                <option value="v51">Vùng 3.1 - Hoàn Kiếm</option>
                                <option value="v52">Vùng 3.2 - Hoàn Kiếm</option>
                                <option value="v53">Vùng 3.1 - Hoàn Kiếm</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2 pdr">
                            <select class="form-control pdm chosen-select" name="shipperID"
                                data-placeholder="Chọn Shipper">
                                <option value="">Chọn Shipper</option>
                                <option value="v51">Shipper 1</option>
                                <option value="v52">Shipper 2</option>
                                <option value="v53">Shipper 3</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" name="fromDate" class="form-control pdm fromDate" id="daterangepicker"
                                placeholder="Từ ngày - đến ngày" value="">
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="form-group col-md-4">
                            <select class="form-control pdm chosen-select" style="width: auto;" name="shipperID"
                                data-placeholder="Chọn Shipper">
                                <option value="">Chọn khách hàng</option>
                                <option value="1">Khách hàng lẻ</option>
                                <option value="2">Khách hàng đối tác</option>
                            </select>
                        </div>
                    </div> -->
                    <div class="row mgbt">
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="pr-1 mb-4 mb-xl-0">

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-9 col-xs-12">
                            <div class="d-flex align-items-center justify-content-md-end">
                                <div class="pr-1 mb-4 mb-xl-0">
                                    <button type="submit" class="btn btn-primary btn-icon-text">Tìm kiếm</button>
                                </div>
                                <div class="pr-1 mb-4 mb-xl-0">
                                    <a class="btn btn-danger bth-cancel btn-icon-text"
                                        href="http://192.168.100.194:2024/quan-ly-don-hang">Bỏ lọc</a>
                                </div>
                                <div class="pr-1 mb-4 mb-xl-0">
                                    <button type="submit" name="excel" value="1" class="btn btn-info btn-excel">
                                        Xuất Excel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mgbt tab-status">
                        <div class="col-md-2 col-sm-6 col-xs-12  pdr">
                            <a href="<?= base_url('quan-ly-don-hang/tat-ca') ?>"
                                class=" tab-menu btn btn-inverse-primary btn-fw  <?php echo ($link_active == 'tat-ca') ? ' activeStatus' : '' ?>">Tất
                                cả <span><?= $countOrderByStatus['TOTAL'] ?? "0" ?></span></a>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12  pdr">
                            <a href="<?= base_url('quan-ly-don-hang/cho-lay-hang') ?>"
                                class=" tab-menu btn btn-inverse-primary btn-fw <?php echo ($link_active == 'cho-lay-hang') ? ' activeStatus' : '' ?>">Chờ
                                lấy hàng <span><?= $countOrderByStatus['CHO_LAY_HANG'] ?? "0" ?></span></a>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12  pdr">
                            <a href="<?= base_url('quan-ly-don-hang/delay-lay-hang') ?>"
                                class=" tab-menu btn btn-inverse-primary btn-fw <?php echo ($link_active == 'delay-lay-hang') ? ' activeStatus' : '' ?>">Delay
                                lấy hàng <span><?= $countOrderByStatus['DELAY_LAY_HANG'] ?? "0" ?></span></a>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12  pdr">
                            <a href="<?= base_url('quan-ly-don-hang/lay-hang-that-bai') ?>"
                                class=" tab-menu btn btn-inverse-primary btn-fw <?php echo ($link_active == 'lay-hang-that-bai') ? ' activeStatus' : '' ?>">Lấy
                                thất bại <span><?= $countOrderByStatus['LAY_HANG_THAT_BAI'] ?? "0" ?></span></a>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12  pdr">
                            <a href="<?= base_url('quan-ly-don-hang/lay-hang-thanh-cong') ?>"
                                class=" tab-menu btn btn-inverse-primary btn-fw <?php echo ($link_active == 'lay-hang-thanh-cong') ? ' activeStatus' : '' ?>">Lấy
                                thành công <span><?= $countOrderByStatus['LAY_HANG_THANH_CONG'] ?? "0" ?></span></a>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12 ">
                            <a href="<?= base_url('quan-ly-don-hang/luu-kho') ?>"
                                class=" tab-menu btn btn-inverse-primary btn-fw <?php echo ($link_active == 'luu-kho') ? ' activeStatus' : '' ?>">Lưu
                                kho <span><?= $countOrderByStatus['LUU_KHO'] ?? "0" ?></span></a>
                        </div>

                    </div>
                    <div class="row mgbt tab-status">
                        <div class="col-md-2 col-sm-6 col-xs-12  pdr">
                            <a href="<?= base_url('quan-ly-don-hang/dang-luan-chuyen') ?>"
                                class=" tab-menu btn btn-inverse-primary btn-fw <?php echo ($link_active == 'dang-luan-chuyen') ? ' activeStatus' : '' ?>">Luân
                                chuyển <span><?= $countOrderByStatus['DANG_LUAN_CHUYEN'] ?? "0" ?></span></a>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12  pdr">
                            <a href="<?= base_url('quan-ly-don-hang/dang-giao') ?>"
                                class=" tab-menu btn btn-inverse-primary btn-fw <?php echo ($link_active == 'dang-giao') ? ' activeStatus' : '' ?>">Đang
                                giao <span><?= $countOrderByStatus['DANG_GIAO'] ?? "0" ?></span></a>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12  pdr">
                            <a href="<?= base_url('quan-ly-don-hang/delay-don-giao') ?>"
                                class=" tab-menu btn btn-inverse-primary btn-fw <?php echo ($link_active == 'delay-don-giao') ? ' activeStatus' : '' ?>">Delay
                                giao hàng <span><?= $countOrderByStatus['DELAY_GIAO'] ?? "0" ?></span></a>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12  pdr">
                            <a href="<?= base_url('quan-ly-don-hang/yeu-cau-phat-lai') ?>"
                                class=" tab-menu btn btn-inverse-primary btn-fw <?php echo ($link_active == 'yeu-cau-phat-lai') ? ' activeStatus' : '' ?>">Yêu
                                cầu phát lại <span><?= $countOrderByStatus['YEU_CAU_PHAT_LAI'] ?? "0" ?></span></a>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12  pdr">
                            <a href="<?= base_url('quan-ly-don-hang/da-giao') ?>"
                                class=" tab-menu btn btn-inverse-primary btn-fw <?php echo ($link_active == 'da-giao') ? ' activeStatus' : '' ?>">Đã
                                giao <span><?= $countOrderByStatus['DA_GIAO'] ?? "0" ?></span></a>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12 ">
                            <a href="<?= base_url('quan-ly-don-hang/giao-that-bai') ?>"
                                class=" tab-menu btn btn-inverse-primary btn-fw <?php echo ($link_active == 'giao-that-bai') ? ' activeStatus' : '' ?>">Giao
                                thất bại <span><?= $countOrderByStatus['GIAO_THAT_BAI'] ?? "0" ?></span></a>
                        </div>

                    </div>
                    <div class="row mgbt tab-status">
                        <div class="col-md-2 col-sm-6 col-xs-12  pdr">
                            <a href="<?= base_url('quan-ly-don-hang/cho-hoan') ?>"
                                class=" tab-menu btn btn-inverse-primary btn-fw <?php echo ($link_active == 'cho-hoan') ? ' activeStatus' : '' ?>">Chờ
                                hoàn <span><?= $countOrderByStatus['CHO_HOAN'] ?? "0" ?></span></a>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12  pdr">
                            <a href="<?= base_url('quan-ly-don-hang/delay-don-hoan') ?>"
                                class=" tab-menu btn btn-inverse-primary btn-fw <?php echo ($link_active == 'delay-don-hoan') ? ' activeStatus' : '' ?>">Delay
                                đơn hoàn <span><?= $countOrderByStatus['DELAY_HOAN'] ?? "0" ?></span></a>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12  pdr">
                            <a href="<?= base_url('quan-ly-don-hang/dang-hoan') ?>"
                                class=" tab-menu btn btn-inverse-primary btn-fw <?php echo ($link_active == 'dang-hoan') ? ' activeStatus' : '' ?>">Đang
                                hoàn <span><?= $countOrderByStatus['DANG_HOAN'] ?? "0" ?></span></a>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12  pdr">
                            <a href="<?= base_url('quan-ly-don-hang/hoan-that-bai') ?>"
                                class=" tab-menu btn btn-inverse-primary btn-fw <?php echo ($link_active == 'hoan-that-bai') ? ' activeStatus' : '' ?>">Hoàn
                                thất bại <span><?= $countOrderByStatus['HOAN_THAT_BAI'] ?? "0" ?></span></a>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12  pdr">
                            <a href="<?= base_url('quan-ly-don-hang/da-hoan') ?>"
                                class=" tab-menu btn btn-inverse-primary btn-fw <?php echo ($link_active == 'da-hoan') ? ' activeStatus' : '' ?>">Đã
                                hoàn <span><?= $countOrderByStatus['DA_HOAN'] ?? "0" ?></span></a>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12 ">
                            <a href="<?= base_url('quan-ly-don-hang/don-huy') ?>"
                                class=" tab-menu btn btn-inverse-primary btn-fw <?php echo ($link_active == 'don-huy') ? ' activeStatus' : '' ?>">Đơn
                                hủy <span><?= $countOrderByStatus['HUY'] ?? "0" ?></span></a>
                        </div>

                    </div>

                    <div class="row mgbt tab-status">
                        
                        <div class="col-md-2 col-sm-6 col-xs-12  pdr">
                            <a href="<?= base_url('quan-ly-don-hang/don-co-van-de') ?>"
                                class=" tab-menu btn btn-inverse-primary btn-fw <?php echo ($link_active == 'don-co-van-de') ? ' activeStatus' : '' ?>">Đơn
                                có vấn đề <span><?= $countOrderByStatus['DON_CO_VAN_DE'] ?? "0" ?></span></a>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12  pdr">
                            <a href="<?= base_url('quan-ly-don-hang/da-tieu-huy') ?>"
                                class=" tab-menu btn btn-inverse-primary btn-fw <?php echo ($link_active == 'luu-kho-cho-tieu-huy') ? ' activeStatus' : '' ?>">Đã
                                tiêu hủy <span><?= $countOrderByStatus['DA_TIEU_HUY'] ?? "0" ?></span></a>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12 pdr">
                            <a href="<?= base_url('quan-ly-don-hang/da-den-bu') ?>"
                                class=" tab-menu btn btn-inverse-primary btn-fw <?php echo ($link_active == 'da-den-bu') ? ' activeStatus' : '' ?>">Đã
                                đền bù <span><?= $countOrderByStatus['DA_DEN_BU'] ?? "0" ?></span></a>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12 pdr">
                            <a href="<?= base_url('quan-ly-don-hang/yeu-cau-chuyen-hoan-tu-dong') ?>"
                                class=" tab-menu btn btn-inverse-primary btn-fw <?php echo ($link_active == 'yeu-cau-chuyen-hoan-tu-dong') ? ' activeStatus' : '' ?>">Y/C
                                chuyển hoàn TĐ
                                <span><?= $countOrderByStatus['YEU_CAU_CHUYEN_HOAN_TU_DONG'] ?? "0" ?></span></a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-3 col-xs-12 thao-tac-chung">
                            <?php if ($type != 4) { ?>
                            <div class="dropdown open">
                                <button class="dropdown-toggle action-all btn btn-info btn-icon-text" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="true">Chức Năng chung</button>
                                <div class="dropdown-menu" aria-labelledby="dropdownAction" x-placement="bottom-start">
                                    <?php if ($check_show_save_multi > 0) { ?>
                                    <div class="dropdown-item action-item">
                                        <i class="icon ico-print"></i>
                                        <a href="javascript:;" data-toggle="modal" onclick="save_multi_item()">Lưu kho
                                            đơn hàng đã chọn</a>
                                    </div>
                                    <?php } ?>

                                    <?php if (!empty($status_get) && in_array('505', $status_get)) { ?>
                                    <div class="dropdown-item action-item">
                                        <i class="icon ico-resend"></i>
                                        <a href="javascript:;" onclick="redelivery_multi_item()">Yêu cầu phát lại đơn
                                            hàng đã chọn</a>
                                    </div>
                                    <?php } ?>

                                    <div class="dropdown-item action-item">
                                        <i class="icon ico-print"></i>
                                        <a href="javascript:;" data-toggle="modal" onclick="check_multi_print_item()">In
                                            đơn hàng đã chọn</a>
                                    </div>

                                    <div class="dropdown-item action-item">
                                        <i class="icon ico-print"></i>
                                        <a href="javascript:;" data-toggle="modal"
                                            onclick="check_multi_print_item_all()">In tất cả đơn hàng</a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class=" col-md-4 col-sm-12 col-lg-2 col-xs-12 total-wrap">
                            <span class="report-item-text">Tổng đơn:</span>
                            <span class="report-item-value text-order"><?php echo number_format($total) ?></span>
                        </div>
                        <div class=" col-md-4 col-sm-12 col-lg-2 col-xs-12 total-wrap">
                            <span class="report-item-text">Tổng COD:</span>
                            <span class="report-item-value text-cod"><?php echo number_format($total_cod) ?></span>
                        </div>
                        <div class=" col-md-4 col-sm-12 col-lg-2 col-xs-12 total-wrap">
                            <span class="report-item-text">Tổng Phí:</span>
                            <span class="report-item-value text-fee"><?php echo number_format($total_fee) ?></span>
                        </div>

                    </div>
                </div>
            </div>
        </form>
        <div class="card mt-2">
            <div class="card-body">
                <div class="row">
                    <div class="checkbox-size">
                        <input type="checkbox">
                    </div>
                    <div class="col">
                        <div class="line-info">
                            <div class="info1">
                                <div><strong><i class="mdi mdi-book-multiple" aria-hidden="true"></i>
                                        3085.R.HNI.1150.HNI.1150.210901200011</strong> | Bưu tá: HN-BC2-Nguyễn Xuân Mạnh
                                    | Kho 1</div>
                                <div><i class="mdi mdi-account"></i> <strong>Người nhận:</strong> Phương Hà 001 -
                                    0981234567</div>
                                <div><i class="mdi mdi-map-marker"></i> <strong>Địa chỉ:</strong> Số 14 ngõ 31 mai động,
                                    hoàng mai hà nội, hoàng mai, hà nội </div>
                                <div><i class="mdi mdi-currency-usd"></i> <strong>Người trả phí:</strong> Người nhận |
                                    <strong>COD:</strong> <span style="color: #425CA7;">1,440,000 đ</span> |
                                    <strong>Tổng phí:</strong> <span style="color: red;">17,200 đ</span> | <strong>Tổng
                                        tiền:</strong><span style="color:green"> 17,200 đ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="line-info">
                            <div class="info2">
                                <div><span style="color:#2803f1;">Giao thất bại - người nhận hẹn lại ngày
                                        giao-5113</span> <strong>|</strong> (07/09/2021 <span
                                        style="color:#ff7600fa">15:29:05</span>)</div>
                                <div><i class="mdi mdi-account"></i> <strong>Người gửi:</strong> Phương Hà 001 -
                                    0981234567</div>
                                <div><i class="mdi mdi-map-marker"></i> <strong>Địa chỉ:</strong> Số 14 ngõ 31 mai động,
                                    hoàng mai hà nội, hoàng mai, hà nội </div>
                                <div><button type="submit" class="btt"><i class="fas fa-headset"></i> Hỗ trợ </button> |
                                    <button type="submit" class="btt"><i class="fas fa-angle-right"></i> Chi
                                        tiết</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <div class="row">
                    <div class="checkbox-size">
                        <input type="checkbox">
                    </div>
                    <div class="col">
                        <div class="line-info">
                            <div class="info1">
                                <div><strong><i class="mdi mdi-book-multiple" aria-hidden="true"></i>
                                        3085.R.HNI.1150.HNI.1150.210901200011</strong> | Bưu tá: HN-BC2-Nguyễn Xuân Mạnh
                                    | Kho 1</div>
                                <div><i class="mdi mdi-account"></i> <strong>Người nhận:</strong> Phương Hà 001 -
                                    0981234567</div>
                                <div><i class="mdi mdi-map-marker"></i> <strong>Địa chỉ:</strong> Số 14 ngõ 31 mai động,
                                    hoàng mai hà nội, hoàng mai, hà nội </div>
                                <div><i class="mdi mdi-currency-usd"></i> <strong>Người trả phí:</strong> Người nhận |
                                    <strong>COD:</strong> <span style="color: #425CA7;">1,440,000 đ</span> |
                                    <strong>Tổng phí:</strong> <span style="color: red;">17,200 đ</span> | <strong>Tổng
                                        tiền:</strong><span style="color:green"> 17,200 đ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="line-info">
                            <div class="info2">
                                <div><span style="color:#2803f1;">Giao thất bại - người nhận hẹn lại ngày
                                        giao-5113</span> <strong>|</strong> (07/09/2021 <span
                                        style="color:#ff7600fa">15:29:05</span>)</div>
                                <div><i class="mdi mdi-account"></i> <strong>Người gửi:</strong> Phương Hà 001 -
                                    0981234567</div>
                                <div><i class="mdi mdi-map-marker"></i> <strong>Địa chỉ:</strong> Số 14 ngõ 31 mai động,
                                    hoàng mai hà nội, hoàng mai, hà nội </div>
                                <div><button type="submit" class="btt"><i class="fas fa-headset"></i> Hỗ trợ </button> |
                                    <button type="submit" class="btt"><i class="fas fa-angle-right"></i> Chi
                                        tiết</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <div class="row">
                    <div class="checkbox-size">
                        <input type="checkbox">
                    </div>
                    <div class="col">
                        <div class="line-info">
                            <div class="info1">
                                <div><strong><i class="mdi mdi-book-multiple" aria-hidden="true"></i>
                                        3085.R.HNI.1150.HNI.1150.210901200011</strong> | Bưu tá: HN-BC2-Nguyễn Xuân Mạnh
                                    | Kho 1</div>
                                <div><i class="mdi mdi-account"></i> <strong>Người nhận:</strong> Phương Hà 001 -
                                    0981234567</div>
                                <div><i class="mdi mdi-map-marker"></i> <strong>Địa chỉ:</strong> Số 14 ngõ 31 mai động,
                                    hoàng mai hà nội, hoàng mai, hà nội </div>
                                <div><i class="mdi mdi-currency-usd"></i> <strong>Người trả phí:</strong> Người nhận |
                                    <strong>COD:</strong> <span style="color: #425CA7;">1,440,000 đ</span> |
                                    <strong>Tổng phí:</strong> <span style="color: red;">17,200 đ</span> | <strong>Tổng
                                        tiền:</strong><span style="color:green"> 17,200 đ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="line-info">
                            <div class="info2">
                                <div><span style="color:#2803f1;">Giao thất bại - người nhận hẹn lại ngày
                                        giao-5113</span> <strong>|</strong> (07/09/2021 <span
                                        style="color:#ff7600fa">15:29:05</span>)</div>
                                <div><i class="mdi mdi-account"></i> <strong>Người gửi:</strong> Phương Hà 001 -
                                    0981234567</div>
                                <div><i class="mdi mdi-map-marker"></i> <strong>Địa chỉ:</strong> Số 14 ngõ 31 mai động,
                                    hoàng mai hà nội, hoàng mai, hà nội </div>
                                <div><button type="submit" class="btt"><i class="fas fa-headset"></i> Hỗ trợ </button> |
                                    <button type="submit" class="btt"><i class="fas fa-angle-right"></i> Chi
                                        tiết</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="card mt-2">
      <div class="card-body">
        <div class="row">
          <div class="col-6">
            <div><strong><i class="mdi mdi-book-multiple" aria-hidden="true"></i> 3085.R.HNI.1150.HNI.1150.210901200011</strong> | Bưu tá: HN-BC2-Nguyễn Xuân Mạnh | Kho 1</div>
            <div><i class="mdi mdi-account"></i> <strong>Người nhận:</strong> Phương Hà 001 - 0981234567</div>
            <div><i class="mdi mdi-map-marker"></i> <strong>Địa chỉ:</strong> Số 14 ngõ 31 mai động, hoàng mai hà nội, hoàng mai, hà nội </div>
            <div><i class="mdi mdi-currency-usd"></i> <strong>Người trả phí:</strong> Người nhận | <strong>COD:</strong> <span style="color: #425CA7;">1,440,000 đ</span> | <strong>Tổng phí:</strong> <span style="color: red;">17,200 đ</span> | <strong>Tổng tiền:</strong><span style="color:green"> 17,200 đ</span></div>
          </div>
          <div class="col-6">
            <div class="info2">
              <div><span style="color:#2803f1;">Giao thất bại - người nhận hẹn lại ngày giao-5113</span> <strong>|</strong> (07/09/2021 <span style="color:#ff7600fa">15:29:05</span>)</div>
              <div><i class="mdi mdi-account"></i> <strong>Người nhận:</strong> Phương Hà 001 - 0981234567</div>
              <div><i class="mdi mdi-map-marker"></i> <strong>Địa chỉ:</strong> Số 14 ngõ 31 mai động, hoàng mai hà nội, hoàng mai, hà nội </div>
              <div><button type="submit" class="btt"><i class="fas fa-headset"></i> Hỗ trợ </button> | <button type="submit" class="btt"><i class="fas fa-angle-right"></i> Chi tiết</button></div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    </div>
</div>

<!-- main-panel ends -->
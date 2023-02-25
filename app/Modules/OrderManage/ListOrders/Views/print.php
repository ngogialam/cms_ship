
<div class="no-print" style="text-align: center; margin: 30px 0;">
    <a href="javascript:window.print()" class="btn btn-warning-custom">In đơn hàng</a>
</div>

<?php 
$i = 0;
foreach($arr_order as $order){
    $i++;
    
    $detaiStore = $modelOrderManagerNewModels->findStoreById($order['STORE_ID']);
    
    $PARTNER_ORDER_ID = $order['PARTNER_ORDER_ID'];
    if($PARTNER_ORDER_ID == ''){
        $PARTNER_ORDER_ID = 'Chưa có mã';
    }else{
        
        if($order['TRANSPORTER_CODE'] == 'GTK'){
            $exPartnerOrder     = explode('.', $PARTNER_ORDER_ID);
            if(!empty($exPartnerOrder)){
                $PARTNER_ORDER_ID   = end($exPartnerOrder);
            }            
        }
    }
    
//    $barCode = base_url()."tao-bar-code?text=$PARTNER_ORDER_ID&print=true&size=620";
?>

<script>
    var $ = jQuery;
    $(document).ready(function() {
        function processBar(stt, total) {
            elem = $(".order-print-<?php echo $order['ORDER_ID'];?>");
            if (elem) {
                if (stt == total) {
                    elem.style.width = 100 + "%";
                    elem.innerHTML = 100 + "%";
                    $(".order-print-<?php echo $order['ORDER_ID'];?>").remove();

                    window.print();
                } else {
                    width = ((stt / total) * 100).toFixed(0);
                    elem.style.width = width + "%";
                    elem.innerHTML = width * 1 + "%";
                }
            }
        }
    });
    
</script>

    <div class="container wrap-print-order" style="page-break-after: always;">
        <div class="row header-print">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <div class="logo_holaship">
                    <img src="<?php echo base_url(); ?>/public/images/logo.png" />
                </div>
<!--                <div class="logo_nvc logo_<?php // echo $order['TRANSPORTER_CODE']; ?>">
                    <img src="<?php // echo base_url(); ?>/public/images/logo-dvvc/<?php // echo $order['TRANSPORTER_CODE']; ?>_Color.png" />
                </div>                -->
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 wrap-barcode">
                
                <div class="ng-order">
                    <p><?= lang('Label.lbl_codeOrders') ?>: <b><?php echo $order['ORDER_ID'];?></b></p>
                    <p>Mã đơn NVC: <b><?php echo $PARTNER_ORDER_ID;?></b></p>
                </div>
                <div class="ng-img-barcode">
                    <?php if($order['PARTNER_ORDER_ID'] != ''):?>
                        <img class="barcode-img order-print-<?php echo $order['ORDER_ID'];?>" onload="processBar(parseInt( 1 ), parseInt( 1 ))" alt='Barcode <?php echo $PARTNER_ORDER_ID;?>' src='https://barcode.ghn.vn/api/v1/barcode/generate?code=<?php echo $PARTNER_ORDER_ID?>&type=C128A&width=620&height=80'/>
                    <?php endif;?>
                </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 wrap-qrcode">
                <div class="qr-code">
                    <img src="<?php echo base_url('/public/images/QRcode.png'); ?>" />
                </div>
            </div>
        </div>
        <div class="content-print">
            <div class="row wrap-address wrap-content-print">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 left-cont">
                    <h3>Người gửi:</h3>
                    <p><?php echo $order['SENDER_NAME']; ?></p>
                    <p><?php echo $detaiStore ? $detaiStore['ADDRESS'].', '.$detaiStore['DISTRICT_NAME'].', '.$detaiStore['PROVINCE_NAME'] : ''; ?></p>
                    <p>SĐT: <?php echo substr($order['SENDER_TEL'],0,6).'xxxx'; ?></p>
                    
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <h3>Người nhận:</h3>
                    <p><b><?php echo $order['RECEIVER_NAME']; ?></b></p>
                    <p><b><?php echo $order['RECEIVER_ADDRESS'].', '.$order['RECEIVER_DISTRICT_NAME'].', '.$order['PROVINCE_NAME']; ?></b></p>
                    <p><b>SĐT: <?php echo substr($order['RECEIVER_PHONE'],0,6).'xxxx'; ?></b></p>
                    
                </div>
            </div>
            
            <div class="row wrap-noidung wrap-content-print">
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 left-cont">
                    <h3>Nội dung hàng hóa:</h3>
                    <p class="des-text-print">
                        <?php echo $order['PRODUCT_NAME'];?>
                    </p>
                </div>
                
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 right-cont">
                    <h3>Sort code/ Mã bưu cục đến:</h3>
                    <p style="font-size: 25px;">
                        <b style="word-break: break-all; line-height: 25px;}"><?php echo $order['PARTNER_SORT_CODE']; ?></b>
                    </p>
                </div>
            </div>
            
            <div class="row wrap-ghichu wrap-content-print">
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 left-cont">
                    <h3>Ghi chú hàng hóa:</h3>
                    <p class="des-text-print">
                        <?php echo $order['COMMENTS'];?>
                    </p>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 right-cont">
                    <h3>Ghi chú bắt buộc:</h3>
                    <p class="des-text-print">
                        <?php 
                        if($order['CHECK_FLG'] == 1){
                            echo 'Không cho xem hàng';
                        }else if($order['CHECK_FLG'] == 2){
                            echo 'Cho thử hàng';
                        }else if($order['CHECK_FLG'] == 3){
                            echo 'Cho xem hàng, không cho thử';
                        }
                        ?>
                    </p>
                </div>
            </div>
            
            <div class="row wrap-tienthu wrap-content-print">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h3>Tiền thu người nhận:</h3>
                    <p class="money_cod">
                        <?php 
                        if($order['ORDER_PAYMENT'] == 1){
                            echo number_format($order['REAL_COLLECT_ON_BEHALF']) . ' VNĐ';
                        }else{
                            echo number_format($order['REAL_COLLECT_ON_BEHALF'] + (int)$order['TRANSPORT_FEE'] + (int)$order['COD_FEE']+ (int)$order['INSURANCE_FEE']) . ' VNĐ';
                        }
                        ?>
                    </p>
                </div>
            </div>
            
            <div class="row wrap-qc-pr wrap-content-print">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 left-cont">
                    <h3>Thông tin về HolaShip.vn</h3>
                    <p>- Nhận COD ngay khi đơn hàng giao thành công</span></p>
                    <p>- Nhân viên chăm sóc khách hàng riêng 24/7</p>
                    <p>Hotline <b>HOTLINE</b></p>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 right-cont">
                    <div class="wrap-chuky">
                        <h3>Chữ ký người nhận</h3>
                        <em>Xác nhận hàng nguyên vẹn, không móp/méo, bể/vỡ</em>
                        
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="number-order-print">Đơn hàng số: <b><?php echo $i . '<span class="total-order-print">/' . count($arr_order) . '</span>';?></b></div>
                </div>
            </div>            
        </div>
    </div>
<?php 
}?>

<div class="no-print" style="text-align: center; margin: 30px 0;">
    <a href="javascript:window.print()" class="btn btn-warning-custom">In đơn hàng</a>
</div>
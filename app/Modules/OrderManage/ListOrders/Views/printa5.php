<!-- <div class="no-print" style=" margin: 30px 0;">
    <a href="javascript:window.print()" class="btn btn-warning-custom">In đơn hàng</a>
</div> -->
<?php 
    $i = 0;
    foreach($dataOrder as $order){
        $i++;
        $ORDER_ID = $order->barCodePrint; 
        
        $totalPhi = $order->totalDetailFee;
        $totalCod = $order->totalDetailCod;
        $totalPhaiThu   = $totalCod + $totalPhi;
        $barCode = '';
        $QRCode = '';
        if($ORDER_ID != ''){
            $QRCode = base_url('generate-qrcode?text='.$ORDER_ID.'&print=true&x=5&y=4');
            $barCode = base_url('generate-barcode?text='.$ORDER_ID.'&print=true&size=55&sizefactor=2');
            // $barCode ='https://online-gateway.ghn.vn/barcode/api/v1/barcode/generate?code='.$ORDER_ID.'&amp;type=C128A&amp;width=820&amp;height=80';
         }

?>

<div class="container wrap-print-order" style="page-break-after: always;">
    <div class="row header-print">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="text-align: center; margin: auto;">
            <img src="<?= base_url('/public/images/login/IMD_COLOR.jpg'); ?>" />
                <p>https://holaship.vn</p>
                <p><b><?= HOTLINE; ?></b></p>
        </div>
        <div class="col-6 wrap-barcode" style="margin:auto 0; text-align:center">

            <div class="ng-img-barcode">
                <?php if($barCode != ''):?>
                <img src="<?= $barCode ?>" />
                <?php endif;?>
            </div>
              <div class="ng-order">
               <!-- <p><?= lang('Label.lbl_codeOrders') ?>: <b><?php echo $ORDER_ID;?></b></p>-->
                <p><?= lang('Label.lbl_codeOrders') ?>: <b><?php echo $order->carrierOrderCode;?></b></p>
                <p style="padding-top: 10px;">Đơn hàng số: <b><?php echo($i)?>/<?php echo count($dataOrder); ?></b></p>
            </div> 
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 wrap-qrcode">
            <div class="qr-code">
                <img src="<?= $QRCode ?>">
            </div>
        </div>
    </div>
    <div class="content-print">
        <div class="row wrap-address wrap-content-print">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 left-cont">
                <h3><?= lang('Label.lbl_txtPayerFeeSender') ?>:</h3>
                <p><?php echo $order->shopName; ?></p>
                <p>
                    <?php echo $order ? $order->shopAddress .', '.$order->shopWard.', '.$order->shopDistrict.', '.$order->shopProvince : ''; ?>
                </p>
                <p><?= lang('Label.lbl_prtSDT') ?>: <?php echo substr($order->shopPhone,0,6).'xxxx'; ?></p>

            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <h3><?= lang('Label.lbl_txtPayerFeeReceiver') ?>:</h3>
                <p><?php echo $order->deliveryName; ?></p>
                <p>
                    <?php echo $order ? $order->deliveryAddress .', '. $order->deliveryWard.', '.$order->deliveryDistrict.', '.$order->deliveryProvince : ''; ?>
                </p>
                <p><?= lang('Label.lbl_prtSDT') ?>: <?php echo substr($order->deliveryPhone,0,6).'xxxx'; ?></p>

            </div>
        </div>

        <div class="row wrap-noidung wrap-content-print">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 left-cont">
                <h3><?= lang('Label.lbl_prtDetailItems') ?>:</h3>
                <p class="des-text-print" style="font-size: 20px;">
                    <?php 
          $items = $order->products;
          $nameProduct = '';
        foreach($items as $keyItem =>$item): ?>

                    <?php $nameProduct .= $item->name .', ';?>
                    <?php endforeach; ?>
                    <?php echo rtrim($nameProduct,', ') ?>
                </p>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 right-cont">
                <h3><?= lang('Label.lbl_txtGoodWeight') ?>:</h3>
                <p style="font-size: 20px;">
                    <b
                        style="word-break: break-all; line-height: 25px;}"><?php echo number_format($order->weight,0,""," ") .' gram'; ?></b>
                </p>
            </div>
        </div>

        <div class="row wrap-ghichu wrap-content-print">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 left-cont">
                <h3><?= lang('Label.lbl_prtNote') ?>:</h3>
                <p class="des-text-print">
                    <?php echo  $order->note;?>
                </p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 right-cont">
                <h3><?= lang('Label.lbl_txtNoteRequired') ?>:</h3>
                <p class="des-text-print">
                    <?php 
          echo $requiredNoteArr[$order->requireNote];
          ?>
                </p>
            </div>
        </div>

        <div class="row wrap-tienthu wrap-content-print">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 left-cont">
                <h3><?= lang('Label.lbl_prtRevenue') ?>:</h3>
                <p class="money_cod" style="font-size: 20px;">
                    <?php echo number_format($order->moneyToCollect,0,""," "). ' đ';?>
                </p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 right-cont">
                <h3><?= lang('Label.lbl_prtSortCode') ?>:</h3>
                <br>
                <p class="des-text-print">
                    <?php echo $order->carrierShortCode;?>
                </p>
            </div>
        </div>

        <div class="row wrap-qc-pr wrap-content-print">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 left-cont">
                <h3>Thông tin về HolaShip.vn</h3>
                <p>- Nhận COD ngay khi đơn hàng giao thành công</span></p>
                <p>- Nhân viên chăm sóc khách hàng riêng 24/7</p>
                <p>- Có thể lên đơn qua Pancake và TPos</p>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 right-cont">
                <div class="wrap-chuky">
                    <h3>Chữ ký người nhận</h3>
                    <em>Xác nhận hàng nguyên vẹn, không móp/méo, bể/vỡ</em>

                </div>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-lg-12">
                <div class="number-order-print">Đơn hàng số: <b><?php //echo($i)?>/<?php echo count($dataOrder); ?></b>
                </div>
            </div>
        </div> -->
    </div>
</div>
<?php } ?>

<script>
setTimeout(function() {
    window.print();
}, 1000);
</script> 
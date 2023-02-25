<div class="no-print" style="text-align: center; margin: 30px 0;">
    <a href="javascript:window.print()" class="btn btn-warning-custom">In đơn hàng</a>
</div>
<?php 
    $i = 0;
    foreach($dataOrder as $order){
      $i++;
      $PARTNER_ORDER_ID = $order->shopPhone;
      if($PARTNER_ORDER_ID == ''){
          $PARTNER_ORDER_ID = 'Chưa có mã';
      }
      $ORDER_ID = $order->barCodePrint; 
      $barCode = '';
      $QRCode = '';
      if($ORDER_ID != ''){
        $QRCode = base_url('generate-qrcode?text='.$ORDER_ID.'&print=true&x=5&y=4');
        $barCode = base_url('generate-barcode?text='.$ORDER_ID.'&print=true&size=55&sizefactor=2');
      }
      
?>


<div class="container wrap-print-order" style="page-break-after: always;">
    <div class="row">
        <div class="col-sm-4 mgl30 pdt5">
            <div class="logo_holaship number-order-print">
                <img src="<?php echo base_url(); ?>/public/images/hola_logo_BLACK.png" style=" width:100%"
                    alt="logo HolaShip">
            </div>
        </div>
        <div class="col-md 5 txt-cen-title">
            <div class="number-order-print"><b class="fs14"><?= HOTLINE ?></b></div>
            <div class="number-order-print">Đơn hàng số: <?php echo($i)?>/<?php echo count($dataOrder); ?></b>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div id="barcode">
                <?php if($barCode != ''): ?>
                <img src="<?php echo $barCode ?>" />
                <?php endif; ?>
                <p style="padding: 5px"><b> <?php echo $order->carrierOrderCode;?></b></p>
            </div>
        </div>
    </div>
    <div class="row wrap-address wrap-content-print max-address-send">
        <div class="col-sm-12">
            <div class="row pdr15">
                <h3 class="showDot-tit">Người gửi: <span class="title"> <?php echo $order->shopName;?> -
                        <?php echo 'xxxxxx'.substr($order->shopPhone,6,10); ?> </span></h3>
            </div>
        </div>
    </div>
    <div class="row wrap-address wrap-content-print max-address-receive">
        <div class="col-sm-12">
            <div class="row pdr15">
                <h3 class="showDot-tit">Người nhận: <span class="title"> <?php echo $order->deliveryName;?> -
                        <?php echo 'xxxxxx'.substr($order->deliveryPhone,6,10); ?></span></h3>
                <p class="showDots">
                    <?php echo $order ? $order->deliveryAddress .', '. $order->deliveryWard.', '.$order->deliveryDistrict.', '.$order->deliveryProvince : ''; ?>
                </p>
            </div>
        </div>
    </div>

    <div class="row wrap-noidung wrap-content-print">
        <div class="col-sm-6 left-cont">
            <div class="row ">
                <p class="border-dad border-dad-fee-vc">
                    Phí NN: <b class="fee-style"><?php echo number_format($order->totalFee)  . ' đ';?></b>
                </p>
                <p class="border-dad border-dad-cod">
                    Thu hộ: <b class="fee-style"><?php echo number_format($order->cod)  . ' đ';?></b>
                </p>
            </div>
        </div>

        <div class="col-sm-6 right-cont">
            <div class="row ">
                <p class="pdl5">Tổng tiền:</p>
                <p class="full-width center">
                    <b class="fee-style"><?php echo number_format($order->moneyToCollect) . ' đ';?></b>
                </p>
            </div>
        </div>
    </div>

    <div class="row wrap-ghichu wrap-content-print max-hh">
        <div class="col-sm-12">
            <div class="row pdr15">
                <p class="showDots-send"> <span class="text-weight">Ghi chú:</span> <?php echo $order->note;?> </p>
                </p>
            </div>
        </div>
    </div>
    <div class="row wrap-ghichu wrap-content-print max-hh ">
        <div class="col-sm-12 ">
            <div class="row pdr15">
                <p class="showDots-send"> <span class="text-weight"> Hàng hóa: </span>
                    <?php 
          $items = $order->products;
          $nameProduct = '';
        foreach($items as $keyItem =>$item): ?>

                    <?php $nameProduct .= $item->name .', ';?>
                    <?php endforeach; ?>
                    <?php echo rtrim($nameProduct,', ') ?>
                </p>
            </div>
        </div>
    </div>
    <div class="row wrap-ghichu wrap-content-print">

        <div class="col-sm-7 right-cont left-cont " style="max-height: 120px;">
            <div class="row pdl5 pdt3">
                <p class="full-width des-text-print">
                    <?php 
                        echo $requiredNoteArr[$order->requireNote];
                    ?>
                </p>
            </div>
            <div class="row pdl5 pdt3 wrap-content-print">
                <h3>Mã bưu cục đến:</h3>
                <p>
                    <?php echo $order->carrierShortCode;?>
                </p>
            </div>
            <div class="col-sm-6 left-cont wrap-content-print" style="height: 111px;">
                <div class="row ">
                    <h3>NN ký:</h3>
                    <p class="full-width center text-sign">

                    </p>
                </div>
            </div>
            <div class="col-sm-6 wrap-content-print">
                <div class="row pdt3">
                    <p class="full-width des-text-print">
                    <p style="width: 100%;"><b><?php echo number_format($order->weight,0,""," ") .' gram'; ?> </b></p>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-4 right-cont p-sort-code" style="margin:0 auto;">
            <!-- <p style="font-size:25px;"><?php //echo $QRCode; ?> -->
            <img src="<?php echo $QRCode?>" title="QRCode orderID" style="margin: 12px 0px;;" />
            </p>
        </div>
    </div>

</div>

<?php } ?>
<script>
setTimeout(function() {
    window.print();
}, 1000);
</script>
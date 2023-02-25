<div class="no-print" style="text-align: center; margin: 30px 0;">
    <a href="javascript:window.print()" class="btn btn-warning-custom">In đơn hàng</a>
</div>

<!-- Đơn nhỏ -->
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
        if ($ORDER_ID != '') {
            $QRCode = base_url('generate-qrcode?text='.$ORDER_ID.'&print=true&x=2&y=4');
            $barCode = base_url('generate-barcode?text='.$ORDER_ID.'&print=true&size=25&sizefactor=1');
        }
?>

<div class="container wrap-print-order " style="page-break-after: always;">
    <div class="row " style="padding-top: 5px;">
        <div class="col-sm-4 col-sm-offset-1 mgl30">
            <div class="logo_holaship">
                <img style="width:100%" src="<?php echo base_url(); ?>/public/images/hola_logo_BLACK.png" style=""
                    alt="logo HolaShip">
            </div>
        </div>
        <div class="col-sm-5 txt-center">
            <div class="number-order-print fs11"><b><?= HOTLINE ?></b></div>
            <div class="number-order-print">
                <p class="t-title"> Đơn hàng số: <?php echo($i)?>/<?php echo count($dataOrder); ?> </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div id="barcode">
                <?php if($barCode != ''): ?>
                <img src="<?php echo $barCode ?>" />
                <?php endif; ?>
                <p style="padding: 3px"><b><?php echo $order->carrierOrderCode;?></b></p>
            </div>
        </div>
    </div>
    <div class="row wrap-address wrap-content-print">
        <div class="col-sm-12 pdr5 max-address">
            <div class="row">
                <h3 class="showDots-note">Người gửi: <span class="title"> <?php echo $order->shopName;?> -
                        <?php echo 'xxxxxx'.substr($order->shopPhone,6,10); ?> </span></h3>
            </div>
        </div>
    </div>
    <div class="row wrap-address wrap-content-print">
        <div class="col-sm-12 pdr5 max-address-receive">
            <div class="row">
                <h3 class="showDots-note"> Người nhận: <span class="title"> <?php echo $order->deliveryName;?> -
                        <?php echo 'xxxxxx'.substr($order->deliveryPhone,6,10); ?></span></h3>

                <p class="showDots-receive">
                    <?php echo ($order->deliveryAddress .','.$order->deliveryWard.",".$order->deliveryDistrict.", ".$order->deliveryProvince) ?></p>
            </div>
        </div>
    </div>
    <div class="row wrap-noidung wrap-content-print">
        <div class="col-sm-7 left-cont">
            <div class="row ">
                <p class="border-dad border-dad-fee-vc">
                    Phí NN: <b class="fee-style"><?php echo number_format($order->totalFee ,0,""," ")  . ' đ';?></b>
                </p>
                <p class="border-dad border-dad-cod">
                    Thu hộ: <b class="fee-style"><?php echo number_format($order->cod ,0,""," ")  . ' đ';?></b>
                </p>
            </div>
        </div>
        <div class="col-sm-5 ">
            <div class="row pdl5">
                <p>Tổng tiền:</p>
                <p class="full-width" style="font-size: 11px;font-weight:700;">
                    <?php echo number_format($order->moneyToCollect ,0,""," ") . ' đ';?>
                </p>
            </div>
        </div>
    </div>
    <div class="row wrap-ghichu wrap-content-print ">
        <div class="col-sm-12 ">
            <div class="row" style="height: 14px;padding-top: 2px;line-height:12px;">
                <p class="showDots-note"> <span class="text-weight"> Ghi chú: </span><?php echo $order->note;?></p>
            </div>
        </div>
    </div>
    <div class="row wrap-ghichu wrap-content-print ">
        <div class="col-sm-12 ">
            <div class="row max-hh">
                <p class="showDots-note"> <span class="text-weight"> Hàng hóa: </span>
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
    <div class="row wrap-sign wrap-content-print">

        <div class="col-sm-9 p-sort-code left-cont">
            <p class="full-width des-text-print">
                <?php echo $requiredNoteArr[$order->requireNote]; ?>
            </p>
            <div class="wrap-content-print col-12">
                <div class="col-sm-8 left-cont " style="height: 30px;">
                    <div class="row ">
                        <div class="col-sm-6">
                            <h3>NN ký:</h3>
                        </div>
                        <div class="col-sm-6">
                            <p class="full-width center text-sign"></p>
                        </div>

                    </div>
                </div>
                <div class="col-sm-4 " style="text-align: center;padding-top: 5px;">
                    <!-- <h3 class="text-weight">Cân nặng:</h3> -->
                    <p style="width: 100%;"><b><?php echo number_format($order->weight,0,""," ") .' gram'; ?></b></p>
                </div>
            </div>
        </div>

        <div class="col-sm-3 p-sort-code" style="margin-top: 2px;">
            <div>
                <p style="font-size:18px;"><img src="<?php echo $QRCode?>" title="QRCode orderID"
                        style="padding-left: 2px;" /></p>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<div class="no-print" style="text-align: center; margin: 30px 0;">
    <a href="javascript:window.print()" class="btn btn-warning-custom">In đơn hàng</a>
</div>
<script>
setTimeout(function() {
    window.print();
}, 1000);
</script>
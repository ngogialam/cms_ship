<!-- End Hero -->
<link rel="stylesheet" href="<?php echo base_url('public/css/mainShop.css?v=' .microtime(true)) ?>">
<section id="consultOrders" data-aos="fade-up" data-aos-duration="1000">
    <div class="consultOrders-wrap container p-0" style="margin-top:26px; background:white;">
        <div class="searchInputOrder w-100 pt-3">
            <p class="fz15 colorPurple">Tra cứu hành trình đơn hàng</p>
            <!-- <form class="search-bar inner-addon right-addon w-100" method="GET">
                <button class="btnSearch" type="submit">
                    <i class=" fa fa-search searchIcon"></i>
                </button>
                <input type="text" name="searchOrders" value="<?php //echo $order; ?>"
                    class="form-control input-order-home" id="searchOrders"
                    placeholder="Có thể nhập 30 mã đơn, mỗi đơn cách nhau bởi dấu phẩy">
            </form>
            <div class="labelSearchBar m-0">
                <span>
                    Có thể nhập 30 mã đơn, mỗi đơn cách nhau bởi dấu phẩy
                </span>
            </div> -->
        </div>
    </div>
    <?php
     if(!empty($dataDetailOrders)){ 
             foreach($dataDetailOrders as $dataDetailOrder){
          ?>
            <section class="container order-detail">
                <div class="itemSearchOrder row">
                    <div class="order-detail-left col-md-6 ">
                        <div class="row order-detail-bd-title">
                            <div class="code-orders-detail col-7">
                                <div id="orders" class="jn-if-left-tt">
                                    <b class="code-order-detail">
                                        <?php
                                $countLength = strlen($dataDetailOrder->carrierOrderId);
                                $carrierOrder = $dataDetailOrder->carrierOrderId;
                                if($countLength > 14){
                                    $carrierOrderId = explode('.', $dataDetailOrder->carrierOrderId);
                                    $carrierOrder  = end($carrierOrderId);
                                }
                                echo $carrierOrder;
                            ?>
                                    </b>
                                    <img src="<?php echo base_url('public/assets/images/icons/icCopy.svg');?>" alt=""
                                        onclick="copyTextOrderId('<?=$carrierOrder?>')">
                                </div>
                                <div class="modal fade" id="copyModal" role="dialog" style="top: 40%;">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <img class="imgErrorDetailOrder"
                                                    src="<?php echo base_url('public/images/copySuccess.svg'); ?>" alt="">
                                                <br>
                                                <span class="spanErrorDetailOrder">
                                                    Sao chép mã vận <br>
                                                    đơn thành công
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5 order-detail-icon pl-md-0">
                            </div>
                        </div>

                        <div class="order-detail-info">
                            <!-- Thông tin người nhận, người gửi -->
                            <div class="info-detail-sender">
                                <div class="info-detail-sender-1">
                                    <b> <?= lang('Label.lbl_txtPayerFeeSender'); ?></b>
                                </div>

                                <div class="d-flex info-detail-sender-2">
                                    <img class="info-detail-sender-img"
                                        src="<?php echo base_url('public/images/manager.png');?>">
                                    <div>
                                        <span><?= $dataDetailOrder->shopName .' - '. $dataDetailOrder->shopPhone ?></span>
                                    </div>
                                </div>

                                <div class="d-flex info-detail-sender-2 ">
                                    <img class="info-detail-sender-img" src="<?php echo base_url('public/images/place.png');?>">
                                    <div>
                                        <span>
                                            <?php
                                        echo '*** ' ;
                                        echo ($dataDetailOrder->shopWard) ? $dataDetailOrder->shopWard .', ' : '' ;
                                        echo ($dataDetailOrder->shopDistrict) ? $dataDetailOrder->shopDistrict .', ' : '' ;
                                        echo ($dataDetailOrder->shopProvince) ? $dataDetailOrder->shopProvince  : '' ;
                                    ?>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="info-detail-recipient">
                                <div class="info-detail-sender-1 pst-rlt">
                                    <b><?= lang('Label.lbl_txtPayerFeeReceiver'); ?></b>
                                </div>

                                <div class="d-flex info-detail-sender-2">
                                    <img class="info-detail-sender-img"
                                        src="<?php echo base_url('public/images/manager.png');?>">
                                    <div>
                                        <span><?= $dataDetailOrder->consignee .' - '. $dataDetailOrder->phone ?></span>
                                    </div>
                                </div>

                                <div class="d-flex info-detail-sender-2 ">
                                    <img class=" info-detail-sender-img"
                                        src="<?php echo base_url('public/images/place.png');?>">
                                    <div>
                                        <span>
                                            <?php
                                        echo ($dataDetailOrder->deliveryAddress) ? $dataDetailOrder->deliveryAddress .', ' : '' ;
                                        echo ($dataDetailOrder->deliveryWard) ? $dataDetailOrder->deliveryWard .', ' : '' ;
                                        echo ($dataDetailOrder->deliveryDistrict) ? $dataDetailOrder->deliveryDistrict .', ' : '' ;
                                        echo ($dataDetailOrder->deliveryProvince) ? $dataDetailOrder->deliveryProvince  : '' ;
                                    ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <!--End thông tin người nhận, gửi  -->
                            <!-- Thông tin hàng hoá -->
                            <div class="info-order-detail-1 pst-rlt">
                                <div>
                                    <b><?= lang('Label.lbl_txtInfoOrder'); ?></b>
                                </div>
                                <div>
                                    <div class="info-order-detail-4 row">
                                        <div class="col-12">
                                            <span class="infoOrderDetail">Sản phẩm: </span>
                                            <span class="colorPurple">
                                                <?php
                                                    $arrProducts = $dataDetailOrder->products;
                                                    $productName = '';
                                                    foreach($arrProducts as $keyProduct => $product):
                                                        $productQuantity = ' (x'.$product->quantity.') ';
                                                        $productName .= $product->name. $productQuantity.', ' ;
                                                    endforeach; 
                                                    echo rtrim( $productName, ", ");
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- End Thông tin hàng hoá -->
                        </div>
                    </div>

                    <div class="order-detail-right col-md-6">
                        <div class="status-order-detail">
                            <div class="d-flex">
                                <div>
                                    <img src="<?php echo base_url('public/images/Time.svg');?>" alt="">
                                </div>

                                <div class="info-fee-1">
                                    <b><?= $dataDetailOrder->packName ?></b>
                                </div>
                                <div class="info-fee-1 curentStatus colorPurple">
                                    <b><span class="status-order-detail-1"><?= $dataDetailOrder->statusMobile->name ?></span></b>
                                </div>
                            </div>
                        </div>
                        <!-- End chi tiết giao hàng -->
                        <!--Hành trình đơn hàng  -->
                        <div class="order-detail-journey jouneyTop">
                            <div class="order-detail-journey-title">
                                <b><?= lang('Label.lbl_orderTrackings') ?> </b>
                            </div>
                            <div class="order-detail-journey-body-main">
                                <div class="order-detail-journey-body ">
                                    <div class="order-detail-journey-line">
                                    </div>
                                    <div class="order-detail-journey-detail w-100">
                                        <?php
                                    //Hành trình tiếp
                                            $dataTracking = $dataDetailOrder->trackings;
                                            if(!empty($dataTracking)):
                                                foreach($dataTracking as $keyTracking => $tracking):
                                        ?>

                                        <?php if($keyTracking == 0){ ?>
                                            <div class="w-100  order-detail-journey-detail-flex">
                                                <div class="order-detail-journey-top">
                                                    <img src="<?php echo base_url('public/images/Vector.svg');?>" alt=""
                                                        class="order-detail-journey-timeline">
                                                </div>
                                                <div class="order-detail-journey-w25">
                                                    <span>
                                                        <b><?= date("d/m/Y ", strtotime($tracking->createdDate)); ?></b> <br>
                                                        <span
                                                            class="order-detail-journey-font"><?= date("H:i ", strtotime($tracking->createdDate)); ?></span>
                                                    </span>
                                                </div>
                                                <div class="order-detail-journey-w65">
                                                    <b
                                                        class="order-detail-journey-false"><?= $tracking->statusName ?></b><br>
                                                    <span class="order-detail-journey-font"><?= $tracking->note ?></span>
                                                </div>
                                                <!-- <div class="order-detail-journey-w10 text-center">
                                                    <img src="<?php //echo base_url('public/images/iconImage.svg');?>" alt=""
                                                        class="order-detail-journey-timeline">
                                                </div> -->
                                            </div>
                                        <?php }else { ?>
                                            <div class="w-100 order-detail-journey-detail-flex order-detail-journey-2">
                                                <div class="order-detail-journey-w16">
                                                        <!-- <img src="<?php //echo base_url('public/images/Vector.svg');?>" alt=""
                                                        class="order-detail-journey-timeline-2"> -->
                                                        <img src="<?php echo base_url('public/images/hinhtron.png');?>" alt=""
                                                        class="order-detail-journey-timeline-2">
                                                </div>
                                                <div class="order-detail-journey-w25">
                                                    <span><?= date("d/m/Y ", strtotime($tracking->createdDate)); ?><br>
                                                        <span
                                                            class="order-detail-journey-font"><?= date("H:i ", strtotime($tracking->createdDate)); ?></span>
                                                    </span>
                                                </div>
                                                <div class="order-detail-journey-w65">
                                                    <?= $tracking->statusName ?><br>
                                                    <span class="order-detail-journey-font"><?=  $tracking->note ?></span>
                                                </div>
                                                <!-- <div class="order-detail-journey-w10 text-center">
                                                    <img src="<?php //echo base_url('public/images/iconImage.svg');?>" alt=""
                                                        class="order-detail-journey-timeline">
                                                </div>  -->
                                            </div>
                                        <?php } ?>
                                        <?php
                                        //End hành trình tiếp
                                            endforeach;
                                            endif;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End hành trình đơn hàng  -->
                    </div>
                </div>
            </section>
        <?php } ?>
    <?php }else{ ?>

    <div class="itemOrder-null">
        <img src="<?php echo base_url('public/images/nullSearchOrder.png') ?>" alt="">
        <p class="searchNull1"><?php echo lang('Label.lbl_searchNull1') ?></p>
        <p class="searchNull2"><?php echo lang('Label.lbl_searchNull2') ?></p>
        <p class="searchNull2"><?php echo lang('Label.lbl_searchNull3') ?></p>
    </div>

    <?php } ?>
</section>


<script>
var width = $(window).width()
if (width > 992) {
    var position = $(window).scrollTop();
    console.log("run");
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 1000) {
            // console.log("Chạm ngưỡng");
            $("#home-vsc-left").addClass("slideInLeft")
            $("#home-vsc-right").addClass("slideInRight")
            // $('#').show();
        }
        if (scroll > position) {
            $('#header').css({
                'height': '50px'
            });

        } else {
            $('#header').css({
                'height': '60px'
            });
        }
        position = scroll;
    });
}

AOS.init();
</script>
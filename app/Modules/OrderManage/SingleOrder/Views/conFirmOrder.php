<section id="orders">
    <div class="row warehouse-banner-title notifacation-wrapper">
        <ul class="col-md-3 col-sm-12">
            <li>
                <img src="<?php echo base_url('public/images/Home.png');?>" alt="">
            </li>
            <li class="mt2-config title-page">
                ><span> <?= lang('Label.lbl_order'); ?> </span>> <span><?php echo $title ?></span>
            </li>
        </ul>
        <div class="col-md-6 row" style="margin-bottom: 9px;">
            <div class="col-4 pr-0">
                <ul class="or-banner1 ol-0">
                    <li style="background: #2DB1DB!important;color: white!important;line-height: 20px;">1</li>
                    <li style="color: #2DB1DB!important;" class="or-cgc-1"><?=$dataOrders->packName;?></li>
                </ul>
            </div>
            <div class=" col-4 pr-0">
                <ul class="or-banner1 ol-0">
                    <li style="background: #2DB1DB!important;color: white!important;line-height: 20px;">2</li>
                    <li style="color: #2DB1DB!important;" class="or-cgc-1"><?= lang('Label.lbl_setInfo'); ?></li>
                </ul>
            </div>
            <div class="col-4 pr-0 ">
                <ul class="or-banner">
                    <li style="line-height: 20px;">3</li>
                    <li class="or-cgc-1"><?= lang('Label.lbl_confirmOrder'); ?></li>
                </ul>
            </div>
        </div>
        <?php 
            $checkNoti = get_cookie('__createOrder');
            $checkNoti = explode('^_^', $checkNoti);
            setcookie ("__createOrder",'',time()+ (1) , '/');
        ?>
        <div class="notification-container" id="notification-container">
            <div
                class="<?php echo($checkNoti[0] == 'success') ? 'notification notification-info' : 'notification notification-danger' ?>">
                <?php 
                    if($checkNoti[0] == 'success'){
                        if (!empty($checkNoti[1])) {
                            echo lang('Label.err_'.$checkNoti[1]);
                        }else {
                            echo lang('Label.lbl_txtCreateOrderSuccess');
                        }
                    }else if($checkNoti[0] == 'false'){
                        if (!empty($checkNoti[1])) {
                            echo lang('Label.err_'.$checkNoti[1]);
                        }else {
                            echo lang('Label.lbl_txtCreateOrderFalse');
                        }
                    } 
                ?>
            </div>
        </div>
    </div>

    <div class="or-xndh-ttng ">
        <!-- Tiêu đề + chọn điểm gửi -->
        <ul style="display: flex;justify-content: space-between;margin-bottom: 0px;">
            <li>
                <b><?= lang('Label.lbl_txtInfoSender') ?></b>
            </li>
        </ul>
        <!-- ================= -->

        <!-- Thông tin người gửi -->
        <ul class="row">
            <li class="col-sm-4">
                <img src="<?php echo base_url('public/images/wh-kh1a.png');?>" alt=""> <?= $dataPickupDefault->name ?>
            </li>
            <li class="col-sm-4">
                <img src="<?php echo base_url('public/images/wh-kh1b.png');?>" alt="">
                <?= $dataPickupDefault->senderName ?>
            </li>
            <li class="col-sm-4">
                <img src="<?php echo base_url('public/images/wh-kh1c.png');?>" alt=""><?= $dataPickupDefault->phone ?>
            </li>
            <li class="col-12 mt-2" style="margin-left: -2px;">
                <img src="<?php echo base_url('public/images/wh-kh1d.png');?>" alt="">
                <?php
                    echo ($dataPickupDefault->address) ? $dataPickupDefault->address .', ' : '' ;
                    echo ($dataPickupDefault->wardName) ? $dataPickupDefault->wardName .', ' : '' ;
                    echo ($dataPickupDefault->districtName) ? $dataPickupDefault->districtName .', ' : '' ;
                    echo ($dataPickupDefault->provinceName) ? $dataPickupDefault->provinceName  : '' ;
                ?>
            </li>
        </ul>

        <!-- ================= -->
    </div>



    <div class="or-ttdh row">
        <ul class="or-dgh col-12">
            <li>
                <b><?= lang('Label.lbl_infoOder') ?></b>
            </li>
        </ul>
        <?php 
            // Loop deliveryPoint
            $totalProductValue = 0;
            $totalProductCOD = 0;
            $totalReceiverPay = 0;
            $dataLists = $dataOrders->deliveryPoint;
            foreach($dataLists as $keyPoint => $valuePoint):
                $pointIndex = $keyPoint +1;
        ?>

        <!-- ===========Đơn thứ nhất====== -->
        <div class="col-12 pointSuccesss">
            <div class="col-12 or-xtdh-dc p-0">
                <div class="or-xtdh-1">
                    <span class="or-dh-stt" style="background: #2DB1DB;"><?= $pointIndex ?></span>
                    <span>
                        <?= $valuePoint->deliveryAddress ?>
                    </span>
                    <span class="colorPurple">
                        <?php
                        // print_r($dataDeliveryGeocoding[$keyReceiver]);die;
                        if(!empty($dataDeliveryGeocoding) && isset($dataDeliveryGeocoding[$keyPoint])&& $dataDeliveryGeocoding[$keyPoint]->deliveryGeocoding !=''){
                                echo '('. $dataDeliveryGeocoding[$keyPoint]->deliveryGeocoding->display_distance.')';
                            }
                        ?>
                    </span>
                </div>
                <?php
                    // Loop receiver
                    $dataReceivers = $valuePoint->receivers;
                    foreach($dataReceivers as $keyReceiver => $valueReceiver):
                        $keyReceiverIndex = $keyReceiver + 1 ;
                        // calulate totalReceiverPay
                        // if(!empty($dataFees)){
                        //     if($valueReceiver->isFree == 2){
                        //         $totalReceiverPay += $dataFees->totalFee;
                        //     }
                        // }
                ?>
                <div class="row qo-ttdn-dt-1 qo-bg-w qo-xndn-ttdh-1" id="qo-ed-1">
                    <div class="col-md-3 col-12 d-flex">
                        <ul class="list-unstyled p-0 mb-0 w-100">
                            <li class="d-flex" style="height: 20px;">
                                <span class="or-dgh-icon-2 stt-order"><?=$keyReceiverIndex?></span>
                                <span> <?= $valueReceiver->receiverPhone ?> </span>
                                <img src="<?php echo base_url('public/images/antoan.svg');?>" class="tdn-btn-downx ">
                            </li>
                            <li style="margin-top: 7px; padding-left: 30px;">
                                <span><?= $valueReceiver->receiverName ?></span>
                                
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8 col-12 pr-0 qo-ttdn-xndh-inf row  w-100">
                        <?php
                        // Loop receiver
                        $dataItems = $valueReceiver->items;
                        foreach($dataItems as $keyItem => $valueItem):
                    ?>
                      
                            <div class="col-sm-4 col-6">
                                <span><?= $valueItem->productName ?></span>
                            </div>
                            <div class="col-sm-2 col-6">
                                <?= lang('Label.lbl_txtAmountDetailOrders') ?>:
                                <span style="color: #885DE5;"><?= $valueItem->productQuantity ?></span>
                            </div>
                            <div class="col-sm-3 col-6">
                                <?= lang('Label.lbl_txtCODDetailOrders') ?>:
                                <span
                                    style="color: #F0A616;"><?= number_format($valueItem->productCOD * $valueItem->productQuantity) ?>
                                    đ</span>
                            </div>
                            <div class="col-sm-3 col-6">
                                <?= lang('Label.lbl_priceDeclaration') ?>:
                                <span
                                    style="font-weight: 500;"><?= number_format($valueItem->productValue * $valueItem->productQuantity) ?>
                                    đ</span>
                            </div>
                      
                        <?php
                        $totalProductValue += $valueItem->productValue * $valueItem->productQuantity;
                        $totalProductCOD += $valueItem->productCOD * $valueItem->productQuantity;
                        // End loop item
                        endforeach;
                    ?>
                    </div>
                    <div class="col-md-1 text-right">
                        <!-- Các giá trị được thay đổi theo id  -->
                        <img src="<?php echo base_url('public/images/iconDownx.svg');?>"
                            id="iconDown_<?= $pointIndex.'_'.$keyReceiverIndex ?>"
                            onclick="showInfo(<?= $pointIndex ?>, <?= $keyReceiverIndex ?>)" class="pt-1 tdn-btn-downx">
                        <img src="<?php echo base_url('public/images/iconDownL.svg');?>"
                            id="iconUp_<?= $pointIndex.'_'.$keyReceiverIndex ?>" class="qo-ed-a pt-1 tdn-btn-downx"
                            onclick="hideInfo(<?= $pointIndex ?>, <?= $keyReceiverIndex ?>)">
                    </div>

                    <div class="col-12 qo-tthh-ndn" id="info-donhang-<?= $pointIndex.'_'.$keyReceiverIndex ?>">
                        <!-- id thay đổi theo số hàng hoá-->
                        <div class="row w-100">
                            <ul class="col-md-6" style="padding-left: 50px;list-style-type: disc;">
                                <li>
                                    <?= lang('Label.lbl_txtSizeDetailOrders') ?>:
                                    <span>
                                        <?= $valueReceiver->length .'-'.$valueReceiver->width.'-'.$valueReceiver->height ?>
                                    </span>cm
                                </li>
                                <li>
                                    <?= lang('Label.lbl_txtWeightDetailOrders') ?>:
                                    <span> <?= number_format( $valueReceiver->weight,0,"","."); ?></span> gram
                                </li>
                                <li>
                                    <?= lang('Label.lbl_txtReceivingTimeDetailOrders') ?>:
                                    <span><?= $valueReceiver->expectTime.' '.$valueReceiver->expectDate ?></span>
                                </li>
                                <li>
                                    <?= lang('Label.lbl_txtExtraNote') ?>:
                                    <span><?= $valueReceiver->note ?></span>
                                </li>
                                <li>
                                    <?= lang('Label.lbl_txtNoteRequired') ?>:
                                    <span>
                                        <?= isset($requiredNoteArr[$valueReceiver->requireNote]) ? $requiredNoteArr[$valueReceiver->requireNote] : '' ?>
                                    </span>
                                </li>
                            </ul>
                            <ul class="col-md-6" style="padding-left: 50px;list-style-type: disc;">
                                <li>
                                    <?= lang('Label.lbl_txtPayerFee') ?>:
                                    <span><?= ($valueReceiver->isFree == 1) ? lang('Label.lbl_txtPayerFeeSender') : lang('Label.lbl_txtPayerFeeReceiver'); ?></span>
                                </li>
                                <?php if($dataOrders->packType == 1){ ?>
                                <li>
                                    <?= lang('Label.lbl_txtPartialDelivery') ?>:
                                    <span><?= ($valueReceiver->partialDelivery == 1)? lang('Label.lbl_txtYes') : lang('Label.lbl_txtNo'); ?></span>
                                </li>
                                <?php } ?>
                                <li>
                                    <?= lang('Label.lbl_txtIsReturn') ?>:
                                    <span>
                                        <?= ($valueReceiver->isRefund == 1)? lang('Label.lbl_txtYes') : lang('Label.lbl_txtNo'); ?>
                                    </span>
                                </li>
                                <?php if($dataOrders->packType == 2 ){ ?>
                                 <!-- <li>
                                    <?php //echo lang('Label.lbl_txtIsBack')?>:
                                    <span>
                                        <?php //echo ($valueReceiver->isReturn == 1)? lang('Label.lbl_txtYes') : lang('Label.lbl_txtNo'); ?>
                                    </span>
                                </li>  -->
                                <li>
                                    <?= lang('Label.lbl_txtExtraServices') ?>:
                                    <span>
                                        <?php if ($valueReceiver->extraServices[0]->isDoorDeliver == 1 && $valueReceiver->extraServices[0]->isPorter == 1) {
                                                echo lang('Label.lbl_txtIsDoorDeliver').', '.lang('Label.lbl_txtIsPorter');
                                            }elseif($valueReceiver->extraServices[0]->isDoorDeliver == 1) {
                                                echo lang('Label.lbl_txtIsDoorDeliver');
                                            }elseif($valueReceiver->extraServices[0]->isPorter == 1){
                                                echo lang('Label.lbl_txtIsPorter');
                                            } ?>
                                    </span>
                                </li>
                                <?php }else{ ?>
                                <li>
                                    <?= lang('Label.lbl_txtPickupType') ?>:
                                    <span><?= ($dataOrders->pickupType == 1) ? lang('Label.lbl_txtYes') : lang('Label.lbl_txtNo'); ?></span>
                                </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                </div>
                <?php
                    // End loop receiver
                    endforeach;
                ?>

            </div>
            <!-- ===========Hết đơn 1=========  -->
        </div>

        <?php
            // End loop delivery point
            endforeach;
        ?>
    </div>

</section>


<form action="" id="form-confirm-single-order" method="POST">
    <section class="row mt-3" id="orders">
        <!-- Thông tin tài xế -->
        <?php if($dataOrders->packType == 2){ ?>
        <!-- <div class="or-tttx pb-3 row w-100">
            <ul class="col-md-3 mb-0 col-sm-12 or-tttx-1">
                <li>
                    <b><?php //echo lang('Label.lbl_txtShipperInfo') ?></b>
                </li>
            </ul>
            <ul class="col-md-3 mb-0 col-4 or-tttx-2 or-cgc-1 cfor-tttx-responsive">
                <li>
                    <?php //echo lang('Label.lbl_txtShipperPhone') ?>
                </li>
            </ul>
            <ul class="col-md-6 mb-0 col-sm-8 col-12 or-tttx-3">
                <li>
                    <input type="text" name="expectShipperPhone"
                        placeholder="<?php //echo lang('Label.lbl_txtExpectShipperPhone') ?>"
                        value="<?php //echo $dataOrders->expectShipperPhone?>">
                </li>
            </ul>
        </div> -->
        <?php } ?>
        <!-- ======================== -->

        <div class="w-100 wrapperOrderListFees">
            <div class="orderPayment row w-100">
                <ul style="margin-right: -20px;">
                    <li>
                        <span class="fz-13 colorPurple">
                            <?= lang('Label.lbl_feeInfo') ?>
                        </span>
                    </li>
                </ul>
                <!-- Chọn phương thức thành toán -->
                <div class="row w-100 listPack ml-0">
                    <select name="orderPaymentType" class="chosen-select w100 orderPaymentType"
                        style="padding-left: 4%;">
                        <option <?= ($value['paymentType'] == 2) ? 'selected' : '' ?> value="2">
                            <?php echo lang('Label.lbl_txtPaymentTypeHolaWallet') ?></option>
                            <?php if($dataOrders->packType == 2): ?>
                        <option <?php echo ($value['paymentType'] == 1) ? 'selected' : '' ?> value="1">
                            <?php echo lang('Label.lbl_txtPaymentTypeCash') ?></option>
                            <?php endif; ?>
                    </select>
                    <span class=" err_messages err_orderPaymentType"></span>

                </div>
                <!-- Chọn mã giảm giá -->
                <div class="row listPack">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 qo-ttdh-1">
                        <div class="row listPackages">
                            <div class="col-12">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- List Other Fees -->

            <div class="xtd-full-fee row" style="margin-right: 12px;">
                <div class="col-lg-3 col-md-3">
                    <ul>
                        <li><?= lang('Label.lbl_txtFees') ?></li>
                        <li>
                            <select name="feeOrder" onchange="singleOrderChangeFees(<?= $typeOrder ?>)"
                                class="chosen-select feeOrder w100" style="padding-left: 4%;">
                                <?php if(!empty($listPackage)){
                                foreach($listPackage as $keyListPackage => $Package):
                                    if(in_array($dataUser->username,$dataAccountTest) && in_array($Package->code,$dataPackCodeTest) ){ ?> 
                                        <option <?= ($dataOrders->packCode == $Package->code) ? 'selected' : '' ?>
                                        value="<?= $Package->code ?>"><?= $Package->name; ?></option>
                                    <?php 
                                    }
                                    if(!in_array($Package->code,$dataPackCodeTest)){
                            ?>
                                <option <?= ($dataOrders->packCode == $Package->code) ? 'selected' : '' ?>
                                    value="<?= $Package->code ?>"><?= $Package->name; ?></option>
                                <?php } endforeach; } ?>
                            </select>
                        </li>
                    </ul>
                </div>
                <div id="owl-fees" class="owl-carousel owl-theme wow col-lg-7 col-md-7"  data-wow-delay="0.6s"
                    <?php echo(empty($dataFees))? 'style="display: none;"' : '' ?>>

                    <?php
                        if(!empty($dataFees) && isset($dataFees->fees)): 
                            foreach($dataFees->fees as $key => $feeDetail ):
                                if($feeDetail != 0):
                     ?>
                    <div class="ew-slide">
                        <ul>
                            <li><?= lang('Label.lbl_'.$key) ?></li>
                        </ul>
                        <ul>
                            <li><b><span class="<?= $key ?>"> <?= number_format($feeDetail) ?> </span> đ</b></li>
                        </ul>
                    </div>
                    <?php endif; endforeach; endif; ?>
                </div>
                <div class="col-lg-2 col-md-2 total_fee" <?php echo(empty($dataFees))? 'style="display: none;"' : '' ?>>
                    <div class="ew-slide">
                        <ul>
                            <li><?= lang('Label.lbl_txtTotalFee') ?></li>
                        </ul>
                        <ul>
                            <li><b><span class="orderTotalFee colorPurple"> <?= number_format($dataFees->totalFee) ?>
                                    </span> đ</b>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 error_fee"
                    <?php echo(!empty($dataFees) && empty($dataFeesErrors) ) ? 'style="display: none;"' : '' ?>>
                    <ul>
                        <li class="feeErrors"><?= $dataFeesErrors->message ?></li>
                    </ul>
                </div>
            </div>
            <div>
                <div class="xnd-ttcp">
                    <!-- Tổng tiền -->
                    <ul class="row" style="margin-top: 14px; margin-right: 12px;">
                        <li class="col-sm-4">
                            <?= lang('Label.lbl_priceDeclaration') ?> <br>
                            <b> <span style="color:  #885DE5;"><?= number_format($totalProductValue) ?></span> <span
                                    style="color: #6e6e7b;">đ</span></b>
                        </li>
                        <li class="col-sm-4">
                            <?= lang('Label.lbl_totalCOD') ?> <br>
                            <b> <span class="totalProductCOD" totalCOD="<?= $totalProductCOD?>"
                                    style="color:  #F0A616;"><?= number_format($totalProductCOD) ?></span> <span
                                    style="color: #6e6e7b;">đ</span></b>

                        </li>
                        <li class="col-sm-4">
                            <?= lang('Label.lbl_totalRevenue') ?><br>
                            <b><span style="color:  #885DE5;" class="totalReceiverPay">
                                    <?php
                    // if($valueReceiver->isFree == 1){
                    //     echo number_format($totalProductCOD);
                    // }else{
                        echo number_format($dataFees->totalMoneyCollect);
                    // }
                    ?>

                                </span><span style="color: #6e6e7b;"> đ</span></b>
                        </li>
                    </ul>
                    <!-- ============== -->
                </div>

            </div>
        </div>
        <div class="row xnd-btn-ttx pr-0 col-12">
            <div class="col-md-8">
            </div>
            <div class="col-md-2 pr-0 col-6  ttx-btn-1">
                <!-- <button type="button" name="createOrder" onclick="saveOrderDraft()" class="mt-3 ">
           lang('Label.lbl_saveOrderDraft') ?></button> -->
            </div>
            <?php if ($dataOrders->packType == 2) {?>
            <div class="col-md-2 ttx-btn-2 pr-0 col-6">
                <button type="button" name="findDriver" onclick="singleOrderCreateOrder(<?= $typeOrder ?>)"
                    class="mt-3  createOrders" <?php echo(empty($dataFees))? 'disabled' : '' ?>>
                    <?= lang('Label.lbl_findShipper') ?></button>
            </div>
            <?php }else { ?>
            <div class="col-md-2 ttx-btn-2 pr-0 col-6">
                <button type="button" name="createOrders" onclick="singleOrderCreateOrder(<?= $typeOrder ?>)"
                    class="mt-3 createOrders" <?php echo(empty($dataFees))? 'disabled' : '' ?>>
                    <?= ($typeOrder == 1) ? lang('Label.lbl_update') :  lang('Label.lbl_createOrders') ?></button>
            </div>
            <?php }?>
        </div>
    </section>
</form>

<style>
.btn-secondary:not(:disabled):not(.disabled):active,
.btn-secondary:not(:disabled):not(.disabled).active,
.show>.btn-secondary.dropdown-toggle {
    color: white;
}
</style>

<?php if ($checkNoti) { ?>

<?php } ?>

<!-- modal -->
<div class="modal" id="modalNotiOrderSingle" style="background: rgb(218 218 218 / 75%);">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 17%;">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title headerFalse"></h5>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row modal-body-content">
                    <div class="col-12 textCenter bodyOrderFalse">
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer customize-approve">
            </div>
        </div>
    </div>
</div>
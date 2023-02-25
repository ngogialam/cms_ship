<section id="orders">
    <div class="warehouse-banner-title notifacation-wrapper">
        <ul class="ml-0 pl-0 mb-0">
            <li>
                <img src="<?php echo base_url('public/images/Home.png');?>">
            </li>
            <li class="mt2-config title-page">
                > <a href="<?php echo base_url('danh-sach-don-hang');?>"> <?= lang('Label.lbl_order'); ?> </a> > <span>
                    <?php echo $title ?></span>
            </li>
        </ul>
        <?php 
            $checkNoti = get_cookie('__updateOrder_'.$orderId);
            $checkNoti = explode('^_^', $checkNoti);
            setcookie ('__updateOrder_'.$orderId,'',time()+ (1) , '/');
        ?>
        <div class="notification-container" id="notification-container">
            <div class="
                <?php 
                    if($checkNoti[0] == 'success'){
                        echo 'notification notification-info';
                    }else if($checkNoti[0] == 'false'){
                        echo 'notification notification-danger';
                    }
                ?>
            ">
                <?php 
                if($checkNoti[0] == 'success'){
                    if (!empty($checkNoti[1])) {
                        echo $checkNoti[1];
                    }else {
                        echo lang('Label.lbl_updateSuccess');
                    }
                }else if($checkNoti[0] == 'false'){
                    if (!empty($checkNoti[1])) {
                        echo $checkNoti[1];
                        // echo lang('Label.err_'.$checkNoti[1]);
                    }else {
                        echo lang('Label.lbl_updateFalse');
                    }
                } 
            ?>
            </div>
        </div>
</section>
<section id="order-detail" class="row">
    <!--Chi tiết đơn hàng -->
    <div class="order-detail-left col-md-6 ">
        <div class="row order-detail-bd-title">
            <div class="code-orders-detail col-7">
                <div id="orders" class="jn-if-left-tt">
                    <span class="or-dh-stt">1</span>
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
                <a href="<?php echo FANPAGE_SHIP; ?>" target="_blank" title="Hỗ trợ">
                    <img class="cursorPointer" title="<?php echo lang('Label.alt_support'); ?>"
                        src="<?php echo base_url('public/assets/images/icon/icSp.svg');?>">
                </a>
                <a href="javascript:;" onclick="chooseSizePrint(1,<?= $dataDetailOrder->svcOrderDetailCode ?>)"
                    title="In đơn hàng">
                    <img class="cursorPointer" title="<?php echo lang('Label.alt_print'); ?>"
                        src="<?php echo base_url('public/assets/images/icons/icPrint.svg');?>">
                </a>
                <?php if($dataDetailOrder->status == 900): ?>
                <a href="<?php echo base_url('vi/chinh-sua-don-hang/' . $dataDetailOrder->svcOrderId . '/1') ?>"
                    title="In đơn hàng">
                    <img class="cursorPointer" title="<?php echo lang('Label.alt_edit_1'); ?>"
                        src="<?php echo base_url('public/assets/images/icons/icEdit.svg');?>">
                </a>
                <a href="javascript:;"
                    onclick="deleteOrderModalConfirm(<?= $dataDetailOrder->svcOrderId ?>,<?= $dataDetailOrder->svcOrderDetailCode ?>)"
                    title="In đơn hàng">
                    <img class="cursorPointer" title="<?php echo lang('Label.alt_trash'); ?>"
                        src="<?php echo base_url('public/assets/images/icons/icTrash.svg');?>">
                </a>
                <?php endif; ?>
                <!-- <img class="cursorPointer" title="<?php echo lang('Label.alt_support'); ?>"
                    src="<?php echo base_url('public/assets/images/icons/icSp.svg');?>"> -->
            </div>
        </div>

        <!-- Thông tin người nhận, người gửi -->
        <div class="order-detail-info">
            <div class="info-detail-sender">
                <div class="info-detail-sender-1">
                    <b> <?= lang('Label.lbl_txtPayerFeeSender'); ?></b>
                </div>

                <div class="d-flex info-detail-sender-2">
                    <img class="info-detail-sender-img" src="<?php echo base_url('public/images/manager.png');?>">
                    <div>
                        <span><?= $dataDetailOrder->shopName .' - '. $dataDetailOrder->shopPhone ?></span>
                    </div>
                </div>

                <div class="d-flex info-detail-sender-2 ">
                    <img class="info-detail-sender-img" src="<?php echo base_url('public/images/place.png');?>">
                    <div>
                        <span>
                            <?php
                                echo ($dataDetailOrder->shopAddress) ? $dataDetailOrder->shopAddress .', ' : '' ;
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
                    <?php if(in_array($dataDetailOrder->status, $arrEditReceiver) && in_array('RECEIVER_INFO', $action) && $dataDetailOrder->type != 2): ?>
                    <img onclick="modalEditReceiver()" class="cursorPointer pst-ab-r"
                        alt="<?= lang('Label.edit_receiver'); ?>" title="<?php echo lang('Label.edit_receiver'); ?>"
                        src="<?php echo base_url('public/assets/images/icons/icEdit.svg');?>">
                    <?php endif; ?>
                </div>

                <div class="d-flex info-detail-sender-2">
                    <img class="info-detail-sender-img" src="<?php echo base_url('public/images/manager.png');?>">
                    <div>
                        <span><?= $dataDetailOrder->consignee .' - '. $dataDetailOrder->phone ?></span>
                    </div>
                </div>

                <div class="d-flex info-detail-sender-2 ">
                    <img class=" info-detail-sender-img" src="<?php echo base_url('public/images/place.png');?>">
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
        </div>
        <!--End thông tin người nhận, gửi  -->

        <!-- Cước phí -->
        <div class="info-fee ">
            <div class="info-fee-title pst-rlt">
                <b> <?= lang('Label.lbl_fee'); ?></b>
                <?php if(in_array($dataDetailOrder->status,$arrEditCod) && in_array('COD', $action) && $dataDetailOrder->type != 2): ?>
                <img onclick="modalEditGoodsInfo()" class="cursorPointer pst-ab-r"
                    alt="<?= lang('Label.lbl_txtChangeCod') ?>" title="<?= lang('Label.lbl_txtChangeCod') ?>"
                    src="<?php echo base_url('/public/assets/images/icons/icEdit.svg') ?>">
                <?php endif; ?>
            </div>

            <div class="d-flex">
                <div>
                    <img src="<?php echo base_url('public/images/Time.svg');?>" alt="">
                </div>

                <div class="info-fee-1">
                    <b><?= $dataDetailOrder->packName ?></b>
                    <?= ($dataDetailOrder->isPartDelivery == 1 )? '(<span class="info-fee-2">GTT</span>)' : '' ?> <br>
                    <?= lang('Label.lbl_txtPayerFee'); ?>:
                    <?= ($dataDetailOrder->isFree == 1 )? lang('Label.lbl_txtPayerFeeSender') : lang('Label.lbl_txtPayerFeeReceiver') ?>
                </div>

            </div>

            <div class="d-flex">
                <div class="info-fee-1" style="padding-left: 31px;">
                    <?= lang('Label.lbl_methodPayment'); ?>:
                    <?= ($dataDetailOrder->paymentType == 1 )? lang('Label.lbl_methodPayment_1') : lang('Label.lbl_methodPayment_2') ?>
                </div>
            </div>

            <div class="d-flex">
                <div class="info-fee-3">
                    <img src="<?php echo base_url('public/images/tien.svg');?>" alt="">
                </div>

                <div class="info-fee-4 w-100">
                    <div class="info-fee-cod ">
                        <?= lang('Label.lbl_txtCODDetailOrders'); ?>: <b class="info-fee-icon-1">
                            <?= number_format($dataDetailOrder->totalCod) ?></b> đ

                        <img src="<?php echo base_url('public/images/line5.png');?>" alt="" class="info-fee-line">
                    </div>

                    <div class="info-fee-change-cod">
                        <?= lang('Label.lbl_txtFee'); ?>: <b
                            class="info-fee-icon-2"><?= number_format($dataDetailOrder->totalFee) ?></b> đ
                        <img class="cursorPointer" src="<?php echo base_url('public/images/Info.svg');?>" alt=""
                            data-toggle="modal" data-target="#modalInfoFee">
                    </div>
                    <!-- The Modal Fee -->
                    <div class="modal" id="modalInfoFee">
                        <div class="modal-dialog">
                            <div class="modal-content " style="margin-top: 17%;">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title" style="margin: 0px auto;">
                                        <b><?= lang('Label.lbl_feeInfo') ?></b>
                                    </h4>
                                    <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <?php
                                        $arrOrderFees = $dataDetailOrder->fees;
                                        if (!empty($arrOrderFees)) {
                                            foreach ($arrOrderFees as $orderFee):
                                    ?>
                                    <div class="row modal-body-content">
                                        <div class="col-6">
                                            <?= $orderFee->feeName ?>
                                        </div>
                                        <div class="col-6 textAlignRight">
                                            <span>
                                                <b><?= number_format($orderFee->feeValue) ?>đ</b>
                                            </span>
                                        </div>
                                    </div>
                                    <?php
                                    endforeach;
                                        }
                                    ?>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer text-center" style="margin: 0px auto;">
                                    <?= lang('Label.lbl_txtTotalFee') ?>: <span
                                        style="color: #885DE5;"><?= number_format($dataDetailOrder->totalFee)?>đ</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End cước phí -->

        <!-- Thông tin hàng hoá -->
        <div class="info-order-detail">
            <div class="info-order-detail-1 pst-rlt">
                <div>
                    <b><?= lang('Label.lbl_txtInfoOrder'); ?></b>
                    <?php
                        if(in_array($dataDetailOrder->status,$arrEditSize) && in_array('WEIGHT', $action) && $dataDetailOrder->type != 2):
                    ?>
                    <img onclick="modalEditSize()" class="cursorPointer pst-ab-r"
                        alt=" <?= lang('Label.edit_SizeInfo') ?>" title="<?php echo lang('Label.edit_SizeInfo'); ?>"
                        src="<?php echo base_url('public/assets/images/icons/icEdit.svg');?>">
                    <?php endif; ?>
                </div>
                <div class="info-order-detail-2">
                    <!-- Product detail -->
                    <?php
                        $arrProducts = $dataDetailOrder->products;
                        foreach($arrProducts as $keyProduct => $product):
                    ?>
                    <div class="info-order-detail-3 row">
                        <div class="col-sm-5 ">
                            <span> &#8226;</span> <?= $product->name ?>
                            <?= ($product->quantity == 1) ? '(x'.$product->quantity.')' : '(x'.$product->quantity. ')' ?>
                        </div>
                        <div class="col-sm-3 info-order-detail-3a" style="padding:0px;">
                            <?php echo (isset($arrProductCategory[$product->productCateId])) ? $arrProductCategory[$product->productCateId] : '' ?>
                        </div>
                        <div class="col-sm-4 info-order-detail-3a">
                            <?= lang('Label.lbl_detailProductValue'); ?>:
                            <b><?= number_format($product->value * $product->quantity) ?></b> đ
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="info-order-detail-4 row">
                        <div class="col-sm-6">
                            <span></span> <?= lang('Label.lbl_txtSizeDetailOrders'); ?>: <span
                                class="info-fee-2"><?= $dataDetailOrder->length.'-'.$dataDetailOrder->width.'-'.$dataDetailOrder->height ?></span>Cm
                        </div>
                        <div class="col-sm-6 info-order-detail-3a">
                            <?= lang('Label.lbl_txtWeightDetailOrders'); ?>: <span
                                class="info-fee-2"><?= number_format($dataDetailOrder->weight) ?></span>Gr
                        </div>
                    </div>
                </div>
            </div>
            <div class="info-order-detail-1 pt-2">
                <div>
                    <b><?= lang('Label.lbl_txtSupportServices'); ?></b>
                </div>

                <div class="info-order-detail-5">
                    <?php

                    //1 same price
                    //2 km
                        if($dataDetailOrder->type != 2):
                    ?>
                    <div class="info-order-detail-3">
                        <div>
                            <span> &#8226;</span> <?= lang('Label.lbl_txtPartialDelivery') ?>:
                            <span
                                class="info-fee-2"><?= ($dataDetailOrder->isPartDelivery == 1) ? lang('Label.lbl_txtYes') : lang('Label.lbl_txtNo') ?></span>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="info-order-detail-3">
                        <div>
                            <span> &#8226;</span> <?= lang('Label.lbl_txtIsReturn') ?>:
                            <span
                                class="info-fee-2"><?= ($dataDetailOrder->isRefund == 1) ? lang('Label.lbl_txtYes') : lang('Label.lbl_txtNo') ?></span>
                        </div>
                    </div>
                    <?php

                    //1 same price
                    //2 km
                        if($dataDetailOrder->type == 2):
                    ?>
                    <!-- <div class="info-order-detail-3">
                        <div>

                            <span> &#8226;</span> <?php //echo lang('Label.lbl_txtIsBack') ?>:
                            <span class="info-fee-2">
                            <span
                                class="info-fee-2"><?php //echo ($dataDetailOrder->isReturn == 1) ? lang('Label.lbl_txtYes') : lang('Label.lbl_txtNo') ?></span>
                            </span>
                        </div>
                    </div> -->
                    <div class="info-order-detail-3">
                        <div>

                            <span> &#8226;</span> <?= lang('Label.lbl_txtExtraServices') ?>:
                            <span class="info-fee-2">
                                <?php
                                    $textExtra = '';
                                    if($dataDetailOrder->isPorter == 1){
                                        $textExtra .= lang('Label.lbl_txtIsPorter').', ';
                                    }
                                    if($dataDetailOrder->isDoorDelivery == 1){
                                        $textExtra .= lang('Label.lbl_txtIsDoorDeliver');
                                    }
                                    if($textExtra == ''){
                                        echo lang('Label.lbl_txtNo');
                                    }
                                ?>
                            </span>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php
                        if($dataDetailOrder->type == 1):
                    ?>
                    <div class="info-order-detail-3">
                        <div>
                            <span> &#8226;</span> <?= lang('Label.lbl_txtPickupType') ?>:
                            <span class="info-fee-2">
                                <?= ($dataDetailOrder->pickType == 1) ? lang('Label.lbl_txtYes') : lang('Label.lbl_txtNo');
                                    
                                ?>
                            </span>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="info-order-detail-3">
                        <div>
                            <span> &#8226;</span> <?= lang('Label.lbl_txtNoteRequired') ?>:
                            <span class="info-fee-2">
                                <?php
                                    if($dataDetailOrder->requiredNote == 1){
                                        echo lang('Label.lbl_txtNoteRequired1');            
                                    }else if($dataDetailOrder->requiredNote == 2){
                                        echo lang('Label.lbl_txtNoteRequired2');            
                                    }else if($dataDetailOrder->requiredNote == 3){
                                        echo lang('Label.lbl_txtNoteRequired3');            
                                    }
                                ?>
                            </span>
                        </div>
                    </div>

                    <div class="info-order-detail-4 row">
                        <div class="col-12">
                            <span></span> <?= lang('Label.lbl_txtExtraNote') ?>:
                            <span class="info-fee-2"><?= $dataDetailOrder->note ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End thông tin hàng hoá -->


        <!-- Vận chuyển -->
        <div class="info-order-shipper">
            <div class="info-order-shipper-1">
                <div>
                    <b><?= lang('Label.lbl_shipper'); ?> (Shipper)</b>
                </div>
                <div class="info-order-shipper-3">
                    <span>
                        <img src="<?php echo base_url('public/images/shipper.svg');?>" alt="">
                        <span><?= (!empty($dataDetailOrder->shipper)) ? $dataDetailOrder->shipper->name .' - '. $dataDetailOrder->shipper->phone : lang('Label.alt_dontHaveShipper') ?></span>
                    </span>
                    <span>
                        <img src="<?php echo base_url('public/images/btnCall.png');?>" alt=""
                            class="info-order-shipper-4">
                        <!-- <img src="<?php echo base_url('public/images/btnMessage.png');?>" alt=""
                            class="info-order-shipper-4"> -->
                    </span>
                </div>
            </div>

            <div class="info-order-shipper-2">
                <div>
                    <b><?= lang('Label.lbl_orderContact'); ?></b>
                </div>

                <!-- <div class="info-order-history-call">
                    <div class="info-order-history-call-1 row">
                        <div class="col-sm-6">
                            15/15/2020 13:05:09
                        </div>

                        <div class="col-sm-6 info-order-history-call-2">
                            Người nhận không nghe máy
                        </div>

                        <div class="col-sm-12">
                            Tài xế: Nguyễn Hoàng - 0912000111
                        </div>
                    </div>

                    <div class="info-order-history-call-1 row">
                        <div class="col-sm-6">
                            15/15/2020 13:05:09
                        </div>

                        <div class="col-sm-6 info-order-history-call-2">
                            Người nhận không nghe máy
                        </div>

                        <div class="col-sm-12">
                            Tài xế: Nguyễn Hoàng - 0912000111
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <!-- End vận chuyện -->
    </div>

    <div class="order-detail-right col-md-6">
        <!-- Chi tiết giao hàng -->
        <div class="status-order-detail">
            <div>
                <span class="status-order-detail-1"><?= $dataDetailOrder->statusMobile->name ?></span><br>
                <span class="status-order-detail-2"><?php echo $dataDetailOrder->statusMobile->note ?></span>
            </div>
            <div class="status-order-detail-body">
                <?php
                // Load ảnh giao 1 phần
                $partialRequest = $dataDetailOrder->partialRequest;
                if(!empty($partialRequest)) { ?>
                <?php 
                     $imgSuccess = $partialRequest->imgSuccess;
                     $imgReturn = $partialRequest->imgReturn;
                     $totalcount =  count($imgReturn) + count($imgSuccess);
                    if($totalcount>4){
            
                     ?>
                <div id="owl-imgs-order-detail" class="owl-carousel owl-theme wow" data-wow-delay="0.6s">
                    <?php }?>
                    <?php
                        
                    
                        if(!empty($imgSuccess)){
                            foreach ($imgSuccess as $keyS => $imageS) { ?>

                    <img onclick="modalPopupImage('success_<?= $keyS ?>')" src="<?php echo $imageS;?>" alt=""
                        class="status-order-detail-img success_<?= $keyS ?>">
                    <?php
                            }
                        }
                        if(!empty($imgReturn)){
                           
                            foreach ($imgReturn as $keyR => $imageR) { ?>

                    <img onclick="modalPopupImage('return_<?=  $keyR ?>')" src="<?php echo $imageR;?>" alt=""
                        class="status-order-detail-img return_<?=  $keyR ?>">
                    <?php } ?>
                    <?php }  ?>

                    <?php if($totalcount>4){ ?>
                </div>
                <?php }?>
                <div class="col-lg-10 col-md-10 col-sm-12 partialCod row">
                    <div class="col-6 detailPatialCod fs13">
                        <p class="fs13"> <?= lang('Label.lbl_codPartialOld') ?> </p>
                        <p class="colorPurple fs13 fw600"> <?= number_format($partialRequest->expectCod); ?> đ </p>
                    </div>
                    <div class="col-6 detailPatialCod fs13">
                        <p class="fs13"> <?= lang('Label.lbl_codPartialNew') ?> </p>
                        <p class="colorOrange fs13 fw600"> <?= number_format($partialRequest->partialCod); ?> đ </p>
                    </div>
                </div>
                <?php
                }else{
                    $dataImages = $dataTrackingCurrent->images;
                        if (!empty($dataImages)) {
                            foreach ($dataImages as $keyImageStatus => $image) {
                                ?>
                <img onclick="modalPopupImage('imageDetailStatus_<?php echo $keyImageStatus ?>')"
                    src="<?php echo $image; ?>" alt=""
                    class="status-order-detail-img imageDetailStatus_<?php echo $keyImageStatus ?>">
                <?php
                            }
                        } else { ?>
                <img src="<?php echo base_url('public/images/orderImageDefault.svg');?>" alt=""
                    class="status-order-detail-img">
                <?php }
                    } ?>


            </div>
            <div class="status-order-detail-button">
                <?php
                    if (in_array($dataDetailOrder->status, $arrConfirm) ||!empty($partialRequest) ) {
                ?>
                <button type="button" <?php 
                    echo (!empty($partialRequest)) ? 'onclick="showPartialConfirm('.$dataDetailOrder->svcOrderDetailCode.','.$partialRequest->id.',1)"' : '' ;
                ?> class="status-order-detail-confirm"><?= lang('Label.lbl_confirmOrder') ?></button>
                <button type="button" <?php 
                    echo (!empty($partialRequest)) ? 'onclick="showPartialConfirm('.$dataDetailOrder->svcOrderDetailCode.','.$partialRequest->id.',2)"' : '' ;
                ?> class="status-order-detail-confirm"><?= lang('Label.lbl_rejectOrder') ?></button>
                <?php
                    }
                    if (in_array($dataDetailOrder->status, $arrCancel)) {
                ?>
                <button type="button"
                    onclick="showCancelOrderDetail(<?= $dataDetailOrder->svcOrderDetailCode ?>, '<?php echo $carrierOrder; ?>', 1)"
                    class="status-order-detail-cancel"><?= lang('Label.lbl_cancelOrder') ?></button>
                <?php
                    }
                    if (in_array($dataDetailOrder->status, $arrReturn) && in_array('REFUND_REQ', $action)) {
                ?>
                <button type="button" data-toggle="modal"
                    data-target="#refundOrder_<?= $dataDetailOrder->svcOrderDetailCode ?>"
                    class="status-order-detail-cancel"><?= lang('Label.lbl_return') ?></button>
                <?php
                    }
                    if (in_array($dataDetailOrder->status, $arrReturnAndCommunate)) {
                ?>
                <button type="button" class="status-order-detail-cancel"><?= lang('Label.lbl_communicate') ?></button>
                <?php
                    }
                    if (in_array($dataDetailOrder->status, $arrReDelivery) && in_array('RE_DELIVERY', $action)) {
                ?>
                <button type="button" class="status-order-detail-cancel" data-toggle="modal"
                    data-target="#reDelivery_<?= $dataDetailOrder->svcOrderDetailCode ?>"><?= lang('Label.lbl_reDelivery') ?></button>
                <?php } ?>

                <?php
                        if ($dataDetailOrder->status == 900) {
                            if ($dataDetailOrder->type == 1) {
                    ?>
                <button type="button" class="status-order-detail-cancel"
                    onclick="ApprovalOrder(<?php echo $dataDetailOrder->svcOrderId ?>, <?= $orderId ?>)"><?= lang('Label.lbl_approveOrver') ?></button>

                <?php } ?>
                <button type="button" class="status-order-detail-cancel"
                    onclick="deleteOrderModalConfirm(<?php echo $dataDetailOrder->svcOrderId ?>, <?= $dataDetailOrder->svcOrderDetailCode ?>)"><?= lang('Label.lbl_deleteIntersectiondetail') ?></button>
                <?php } ?>

            </div>
        </div>
        <!-- End chi tiết giao hàng -->



        <!--Hành trình đơn hàng  -->
        <div class="order-detail-journey ">
            <div class="order-detail-journey-title">
                <b><?= lang('Label.lbl_orderTrackings') ?> </b>
            </div>
            <div class="order-detail-journey-body-main">
                <div class="order-detail-journey-body ">
                    <div class="order-detail-journey-line">
                    </div>
                    <div class="order-detail-journey-detail w-100">

                        <?php if(!empty($arrTracking)): ?>

                        <?php
                            //Hành trình hiện tại
                            if(!empty($dataTrackingCurrent)):
                        ?>
                        <div class="w-100  order-detail-journey-detail-flex">
                            <div class="order-detail-journey-top">
                                <img src="<?php echo base_url('public/images/Vector.svg');?>" alt=""
                                    class="order-detail-journey-timeline">
                            </div>
                            <div class="order-detail-journey-w25">
                                <span>
                                    <b><?= date("d/m/Y ", strtotime($dataTrackingCurrent->createdDate)); ?></b> <br>
                                    <span
                                        class="order-detail-journey-font"><?= date("H:i ", strtotime($dataTrackingCurrent->createdDate)); ?></span>
                                </span>
                            </div>
                            <div class="order-detail-journey-w65">
                                <b class="order-detail-journey-false"><?= $dataTrackingCurrent->statusName ?></b><br>
                                <span class="order-detail-journey-font"><?= $dataTrackingCurrent->note ?></span>
                            </div>
                            <!-- <div class="order-detail-journey-w10 text-center">
                                <img src="<?php //echo base_url('public/images/iconImage.svg');?>" alt=""
                                    class="order-detail-journey-timeline">
                            </div> -->
                        </div>
                        <?php
                            //End hành trình hiện tại
                            endif;
                            ?>
                        <?php
                            //Hành trình tiếp
                            if(!empty($dataTracking)):
                                foreach($dataTracking as $tracking):
                        ?>
                        <div class="w-100 order-detail-journey-detail-flex order-detail-journey-2">
                            <div class="order-detail-journey-w16">
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
                        <?php
                            //End hành trình tiếp
                            endforeach;
                            endif;
                        ?>
                        <?php
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!--End hành trình đơn hàng  -->
    </div>



    <!-- END chi tiết đơn hàng -->

</section>

<!-- Modal  -->
<div class="modal modal-edit" id="modalEditReceiver">
    <div class="modal-dialog-edit">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" style="margin: 0px auto;">
                    <b><?= lang('Label.edit_receiver') ?></b>
                </h4>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row modal-body-content mgb15">
                    <div class="col-6">
                        <input name="receiverName" type="text" class="qo-ttgh-1-sl receiverName_0_0"
                            onblur="ValidateReceiverName(0, 0)"
                            value="<?= ($dataDetailOrder->consignee) ? $dataDetailOrder->consignee : '' ?>">
                        <span class=" err_messages err_receiverName_0_0"></span>
                    </div>
                    <div class="col-6">
                        <input name="receiverPhone" type="text" class="qo-ttgh-1-sl receiverPhone_0_0"
                            onblur="ValidateReceiverPhone(0, 0)" onkeypress="return isNumber(event)"
                            value="<?= ($dataDetailOrder->phone) ? $dataDetailOrder->phone : '' ?>">
                        <span class=" err_messages err_receiverPhone_0_0"></span>
                    </div>
                </div>

                <div class="row modal-body-content mgb15">
                    <div class="col-12">
                        <input name="receiverAddress" type="text" class="qo-ttgh-1-sl receiverAddress_0"
                            onchange="changeReceiverAddress(0)"
                            value="<?= ($dataDetailOrder->deliveryAddress) ? $dataDetailOrder->deliveryAddress : '' ?>">
                        <span class=" err_messages err_receiverAddress"></span>
                    </div>
                </div>
                <div class="row modal-body-content mgb15">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cpdw provinceReceiver_0">
                        <select name="receiverProvinceCode" id="pickProvince_0" onchange="changeProvinceAddress(0)"
                            index_prov='0'
                            class="form-control frm-lg pickProvince chosen-select order_province_code_list ">
                            <option value="0"><?= lang('Label.lbl_orderWareHouseProvince'); ?></option>
                            <?php foreach($dataProvinces as $province): ?>
                            <option
                                <?= ($dataDetailOrder->deliveryProvinceCode == $province['code']) ? 'selected': ''  ?>
                                value="<?= $province['code']; ?>"> <?= $province['name']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <span class=" err_messages err_pickProvince"></span>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cpdw districtReceiver_0">
                        <select name="receiverDistrictCode" id="pickDistrict_0" onchange="changeDistrictAddress(0)"
                            index_dict='0'
                            class="form-control frm-lg pickDistrict chosen-select order_district_code_list ">
                            <option value=""><?= lang('Label.lbl_orderWareHouseDistrict'); ?></option>
                            <?php
                            if(!empty($dataPickDistricts)){
                                foreach($dataPickDistricts as $district): ?>
                            <option
                                <?= ($dataDetailOrder->deliveryDistrictCode == $district['code']) ? 'selected': ''  ?>
                                value="<?= $district['code']; ?>"> <?= $district['name']; ?>
                                <?php endforeach;
                            }
                        ?>
                        </select>
                        <span class=" err_messages err_pickDistrict"></span>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cpdw wardReceiver_0">
                        <select name="receiverWardCode" id="pickWard_0" index_ward='0'
                            class="form-control frm-lg pickWard chosen-select order_ward_code_list ">
                            <option value=""><?= lang('Label.lbl_orderWareHouseWard'); ?></option>
                            <?php
                            if(!empty($dataPickWards)){
                                foreach($dataPickWards as $ward): ?>
                            <option <?= ($dataDetailOrder->deliveryWardCode == $ward['code']) ? 'selected': ''  ?>
                                value="<?= $ward['code']; ?>"> <?= $ward['name']; ?>
                                <?php endforeach;
                            }
                        ?>
                        </select>
                        <span class=" err_messages err_pickWard"></span>
                    </div>
                    <input type="hidden" class="province_find_pro_0" value="">
                    <input type="hidden" class="district_find_pro_0" value="">
                    <input type="hidden" class="wards_find_pro_0" value="">
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-detail-page-modal"
                        data-dismiss="modal"><?= lang('Label.lbl_txtCancel'); ?></button>
                    <button type="button" onclick="changeReceiverInfo(<?= $dataDetailOrder->svcOrderDetailCode ?>)"
                        class="btn btn-confirmCustom btn-ok btn-detail-page-modal-2"><?= lang('Label.lbl_confirmOrder') ?></button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-edit" id="modalEditGoodsInfo">
    <div class="modal-dialog-edit">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" style="margin: 0px auto;">
                    <b><?= lang('Label.edit_GoodsInfo') ?></b>
                </h4>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="modal-body-content mgb15">
                    <div class="productDetail mgb15">
                        <?php
                            foreach($arrProducts as $keyProduct => $product):
                        ?>
                        <div class="row productItem pst-rlt">
                            <div class="col-lg-3">
                                <span class="success_productName_<?= $keyProduct?>">
                                    <?= $product->name ?>
                                </span>
                            </div>
                            <div class="col-lg-1">
                                <?= lang('Label.lbl_detailQuantity') ?>:
                                <span class="colorPurple success_productQuantity_<?= $keyProduct ?>">
                                    <?= $product->quantity ?>
                                </span>
                            </div>
                            <div class="col-lg-3">
                                <span class="success_productCate_<?= $keyProduct?>">
                                    <?= (isset($arrProductCategory[$product->productCateId])) ? $arrProductCategory[$product->productCateId] : '' ?>
                                </span>
                            </div>
                            <div class="col-lg-2">
                                <?= lang('Label.lbl_detailCOD') ?>:
                                <span class="colorOrange success_cod_<?= $keyProduct?>">
                                    <?= number_format($product->cod * $product->quantity) ?>
                                </span> đ
                            </div>
                            <div class="col-lg-2">
                                <?= lang('Label.lbl_detailProductValue') ?>:
                                <span class="success_productValue_<?= $keyProduct?>">
                                    <?= number_format($product->value * $product->quantity) ?> đ
                                </span>
                            </div>
                            <div class="col-lg-1 pst-ab-tr">
                                <!-- <img class="cursorPointer" src="/public/images/or-delete.png"  data-toggle="modal" data-target="#confirm-delete"> -->
                                <img class="cursorPointer"
                                    src="<?= base_url('public/assets/images/icons/icEdit.svg') ?>"
                                    onclick="editProductOrderDetail(<?= $keyProduct ?>)">
                            </div>
                        </div>
                        <input type="hidden" value="<?= $product->name ?>" class="productName_<?= $keyProduct ?>">
                        <input type="hidden" value="<?= $product->cod?>" class="productCod_<?= $keyProduct ?>">
                        <input type="hidden" value="<?= $product->value?>" class="productValue_<?= $keyProduct ?>">
                        <input type="hidden" value="<?= $product->productCateId ?>"
                            class="productCateId_<?= $keyProduct ?>">
                        <input type="hidden" value="<?= $product->quantity ?>"
                            class="productQuantity_<?= $keyProduct ?>">
                        <?php endforeach; ?>
                    </div>
                    <div class="editProduct mgb15" style="display:none">
                        <div class="row ">
                            <div class="col-md-6">
                                <?= lang('Label.lbl_txtGoodName') ?><span style="color: #885DE5;">*</span> <br>
                                <!-- product name -->
                                <input name="productName" disabled vallue="" class="productName productTextName"
                                    type="text" placeholder="<?= lang('Label.lbl_inputGoodName') ?>" id="qo-tensp-ht">
                                <span>
                            </div>
                            <div class="col-md-3">
                                <?= lang('Label.lbl_txtCod') ?><span style="color: #885DE5;">*</span> <br>
                                <!-- product COD -->
                                <input name="productCOD" value="0" onkeypress="return isNumberWithoutDash(event)"
                                    onkeyup="returnFormatValue(0, 0, 0,'productTextCOD','2')" type="text"
                                    class="productCod productTextCOD productTextCOD_0_0">
                                <span style="margin-left: -34px;"> đ</span>
                                <span class=" err_messages err_productCOD_<?= $keyProduct  ?>"></span>
                            </div>
                            <div class="col-md-3">
                                <label> <input name="checkProductValue" id="checkProductValue" value="1" checked
                                        type="checkbox" class="regular-checkbox mb-0 frm-check checkProductValue "
                                        style="width: 10px;height: 10px;">
                                    <span></span><?= lang('Label.lbl_txtGoodValue') ?></label><span
                                    style="color: #885DE5;"> *</span> <br>
                                <!-- product value -->
                                <input name="productValue" value="0" disabled type="text"
                                    onkeypress="return isNumberWithoutDash(event)" class="or-ttnh-input or-gtkg productTextValue">
                                <span style="margin-left: -34px;"> đ</span></br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?= lang('Label.lbl_txtGoodType'); ?><span style="color: #885DE5;">*</span> <br>
                                <!-- product category -->
                                <select name="productCategory" style="padding-right: 10px;"
                                    placeholder="Chọn loại hàng hóa" disabled id="productCategory"
                                    class="chosen-select productCategory productTextCategory">
                                    <option value="0"><?= lang('Label.lbl_txtCategory') ?></option>
                                    <?php foreach($arrProductCategory as $keyProductCate => $productCategory): ?>
                                    <option value="<?= $keyProductCate ?>"><?= $productCategory ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <?= lang('Label.lbl_txtGoodQuantity'); ?><span style="color: #885DE5;">
                                    *</span> <br>
                                <!-- product quantity -->
                                <input name="productQuantity" value="1" disabled onkeypress="return isNumberWithoutDash(event)"
                                    style="padding-right: 10px;" id="qo-soluong-ht"
                                    class="productQuantity productTextQuantity">
                            </div>
                            <div class="col-md-3">
                                <br>
                                <!-- btn save -->
                                <button type="button" class="btn btn-confirmCustom saveProduct btn-ok w100"
                                    onclick="saveProductOrderDetail(-1)">
                                    <?= lang('Label.lbl_txtGoodSave') ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer" style="border-top:none">
                    <button type="button" class="btn btn-default btn-detail-page-modal"
                        data-dismiss="modal"><?= lang('Label.lbl_txtCancel'); ?></button>
                    <button type="button" onclick="changeGoodsInfo(<?= $dataDetailOrder->svcOrderDetailCode ?>, <?php echo $dataDetailOrder->type ?>)"
                        class="btn btn-confirmCustom btn-ok btn-detail-page-modal-2"><?= lang('Label.lbl_confirmOrder') ?></button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Thông tin kích thước -->
<div class="modal modal-edit" id="modalEditSize">
    <div class="modal-dialog-edit">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" style="margin: 0px auto;">
                    <b><?= lang('Label.edit_SizeInfo') ?></b>
                </h4>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="productSupport">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <?= lang('Label.lbl_txtGoodSize') ?><span style="color: #885DE5;"> *</span>
                            <br>
                            <!-- length -->
                            <input
                                value="<?= $dataDetailOrder->length.'-'.$dataDetailOrder->width.'-'. $dataDetailOrder->height ?>"
                                class="productSize editSize_0 size_0_0" onkeypress="return isNumber(event)"
                                onblur="ValidateSize(0, 0)" type="text" placeholder="Dài-rộng-cao">
                            <span style="margin-left: -34px;">Cm</span>
                            <br>
                            <span class=" err_messages err_size_0_0"> </span>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <?= lang('Label.lbl_txtGoodWeight') ?><span style="color: #885DE5;">
                                *</span> <br>
                            <!-- weight -->
                            <input value="<?= number_format($dataDetailOrder->weight,0,"",".");?>"
                                class="productWeight editWWeight_0" onkeypress="return isNumber(event)"
                                onkeyup="returnFormatValue(0, 0, 0,'editWWeight','1')" type="text">
                            <span style="margin-left: -50px;">Gram</span>
                            <br>
                            <span class=" err_messages err_weight"> </span>
                        </div>
                        <input type="hidden" value="<?= count($arrProducts) ?>" class="lengthProducts">
                        <input type="hidden" value="<?= $dataDetailOrder->weight ?>" class="weight_0">
                        <input type="hidden" value="<?= $dataDetailOrder->length ?>" class="length_0">
                        <input type="hidden" value="<?= $dataDetailOrder->width ?>" class="width_0">
                        <input type="hidden" value="<?= $dataDetailOrder->height ?>" class="height_0">
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-detail-page-modal"
                        data-dismiss="modal"><?= lang('Label.lbl_txtCancel'); ?></button>
                    <button type="button" onclick="changeSizeInfo(<?= $dataDetailOrder->svcOrderDetailCode ?>)"
                        class="btn btn-confirmCustom btn-ok btn-detail-page-modal-2"><?= lang('Label.lbl_confirmOrder') ?></button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="refundOrder_<?= $dataDetailOrder->svcOrderDetailCode ?>">
    <div class="modal-dialog">
        <div class="modal-content anto" style="margin-top: 17%;">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title headerFalse">
                    <?= lang('Label.lbl_notificationConfirm') ?>
                </h5>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row modal-body-content">
                    <div class="col-12 textCenter bodyOrderFalse">
                        <p class="fz13"><?= lang('Label.lbl_confirmRefundOrder') ?></p>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer customize-approve btn-detail-page-modal-2">
                <button type="button" class="btn btn-modal"
                    data-dismiss="modal"><?= lang('Label.lbl_txtCancel'); ?></button>

                <button type="button" class="btn btn-modal btn-confirmCustom btn-detail-page-modal-2"
                    onclick="refundOrder(<?= $dataDetailOrder->svcOrderDetailCode ?>, 1)">
                    <?= lang('Label.lbl_confirmOrder'); ?>
                </button>
            </div>

        </div>
    </div>
</div>

<div class="modal" id="reDelivery_<?= $dataDetailOrder->svcOrderDetailCode ?>">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 17%;">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title headerFalse">
                    <?= lang('Label.lbl_notificationConfirm') ?>
                </h5>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row modal-body-content">
                    <div class="col-12 textCenter bodyOrderFalse">
                        <p class="fz13"><?= lang('Label.lbl_confirmReDelivery') ?></p>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer customize-approve">
                <button type="button" class="btn btn-modal btn-detail-page-modal-2"
                    data-dismiss="modal"><?= lang('Label.lbl_txtCancel'); ?></button>

                <button type="button" class="btn btn-modal btn-confirmCustom btn-detail-page-modal-2"
                    onclick="reDelivery(<?= $dataDetailOrder->svcOrderDetailCode ?>, 1)">
                    <?= lang('Label.lbl_confirmOrder'); ?>
                </button>
            </div>

        </div>
    </div>
</div>
<div class="modal" id="modalOrder">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 17%;">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title headerFalse">
                    <?= lang('Label.lbl_notificationConfirm') ?>
                </h5>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row modal-body-content">
                    <div class="col-12 textCenter bodyOrderFalse">
                        <p class="fz13 notiText"></p>
                        <p class="fz13 orderText"></p>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer customize-approve">
                <button type="button" class="btn btn-modal btn-detail-page-modal-2"
                    data-dismiss="modal"><?= lang('Label.lbl_txtCancel'); ?></button>

                <button type="button" class="btn btn-modal btn-confirmCustom btn-detail-page-modal-2">
                    <?= lang('Label.lbl_confirmOrder'); ?>
                </button>
            </div>

        </div>
    </div>
</div>
<div class="modal" id="modalOrderPrint">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 17%;">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title headerFalse">
                    <?=lang('Label.lbl_notificationConfirm')?>
                </h5>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row modal-body-content">
                    <div class="col-12 textCenter bodyOrderPrint">
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer customize-approve">
                <button type="button" class="btn btn-modal btn-cancelCustom btn-detail-page-modal-2"
                    data-dismiss="modal"><?=lang('Label.lbl_txtCancel');?></button>
                <button type="button" data-dismiss="modal"
                    class="btn btn-modal btn-confirmCustom btnCfm btn-detail-page-modal-2">
                    <?=lang('Label.lbl_confirmOrder');?>
                </button>
            </div>

        </div>
    </div>
</div>

<!-- Modal Images -->

<!-- The Modal -->
<div class="modal" id="modalPopupImage">
    <div class="modal-dialog">
        <div class="modal-content modal-show-img">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title headerFalse">
                    <?= lang('Label.lbl_imageDetail') ?>
                </h5>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row modal-body-content">
                    <!-- style="height:250px;max-width: 100%;" -->
                    <img id="imageDetail" class="img-responsive" alt="Image">

                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer customize-approve">
                <button type="button" class="btn btn-modal btn-detail-page-modal-2"
                    data-dismiss="modal"><?= lang('Label.modalClose'); ?></button>
            </div>

        </div>
    </div>
</div>
<div class="modal" id="resultApproveOrder">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 17%;">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title headerFalse">
                    <?=lang('Label.lbl_approveOrverFalse')?>
                </h5>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <div class="row modal-body-content">
                    <div class="col-12 textCenter bodyOrderFalse">
                        <div class="showRemain" style="display:none">
                            <p class="fz13"><?=lang('Label.lbl_approveOrverFalse1')?></p>
                            <p class="fz13"><?=lang('Label.lbl_approveOrverFalse2')?> <span
                                    class="colorPurple minimumToConfirm">
                                </span></p>
                            <p class="fz13"><?=lang('Label.lbl_approveOrverFalse3')?></p>
                        </div>
                        <div class="otherReasons" style="display:none">
                            <p class="fz13 otherReasonsDetail"></p>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer customize-approve">
                <button type="button" class="btn btn-modal"
                    onclick="reload()"><?=lang('Label.lbl_manageOrder');?></button>
                <a class="btn btn-confirmCustom btn-ok" href="<?=base_url('/nap-tien');?>">
                    <?=lang('Label.lbl_wallet')?></a>
            </div>

        </div>
    </div>
</div>
<div class="modal" id="modalOrderPrint">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 17%;">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title headerFalse">
                    <?=lang('Label.lbl_notificationConfirm')?>
                </h5>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row modal-body-content">
                    <div class="col-12 textCenter bodyOrderPrint">
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer customize-approve">
                <button type="button" class="btn btn-modal btn-cancelCustom"
                    data-dismiss="modal"><?=lang('Label.lbl_txtCancel');?></button>
                <button type="button" data-dismiss="modal" class="btn btn-modal btn-confirmCustom btnCfm ">
                    <?=lang('Label.lbl_confirmOrder');?>
                </button>
            </div>

        </div>
    </div>
</div>

<!-- modal -->
<div class="modal" id="modalConfirmChangeRefund" style="background: rgb(218 218 218 / 75%);">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 17%;">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title headerFalse">Thông báo</h5>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row modal-body-content">
                    <div class="col-12 textCenter bodyOrderFalse ">
                        <p class="bodyCheckCodValueText"><?php echo lang('Label.lbl_checkConfirmChangeRefund') ?></p>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer customize-approve">
                <button type="button" data-dismiss="modal" class="btn btn-modal btn-confirmChangeRefund"> <?= lang('Label.lbl_confirmOrder'); ?> </button>
            </div>
        </div>
    </div>
</div>

<?php if ($checkNoti) { ?>
<script>
$(document).ready(function() {
    $(".notification-container").fadeIn();

    // Set a timeout to hide the element again
    setTimeout(function() {
        $(".notification-container").fadeOut();
    }, 5000);
});
</script>
<?php } ?>
<script>
$("#owl-imgs-order-detail").owlCarousel({
    loop: false,
    stagePadding: 10,
    margin: 0,
    autoplay: false,
    smartSpeed: 200,
    autoplaySpeed: 3000,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    nav: false,
    dots: false,
    responsive: {
        200: {
            items: 1
        },
        300: {
            items: 1.8
        },
        400: {
            items: 2.8
        },
        500: {
            items: 3.8
        },
        600: {
            items: 5.8
        },
        768: {
            items: 2.8
        },
        1000: {
            items: 2.8
        },
        1200: {
            items: 3.8
        },

        1455: {
            items: 5.8
        }
    }
});
</script>
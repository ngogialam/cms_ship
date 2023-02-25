<?php
$lang = get_cookie('__locale');
if ($lang != '') {
    $preUri = $lang;
} else {
    $preUri = 'vi';
}
?>
<section id="orders">
    <div class="warehouse-banner-title notifacation-wrapper">
        <ul class="ml-0 pl-0 mb-0">
            <li>
                <img src="<?php echo base_url('public/images/Home.png'); ?>">
            </li>
            <li class="mt2-config title-page">
                > <span> <?=lang('Label.lbl_order');?> </span> > <span> <?php echo $title ?></span>
            </li>
        </ul>
        <?php
                $checkNoti = get_cookie('__createOrder');
                $checkNoti = explode('^_^', $checkNoti);
                setcookie("__createOrder", '', time() + (1), '/');
            ?>
        <div class="notification-container" id="notification-container">
            <div class="
                <?php
                        if ($checkNoti[0] == 'success') {
                            echo 'notification notification-info';
                        } else if ($checkNoti[0] == 'false') {
                            echo 'notification notification-danger';
                        }
                    ?>
            ">
                <?php
                    if ($checkNoti[0] == 'success') {
                        if (!empty($checkNoti[2])) {
                            echo $checkNoti[2];
                        }else if (!empty($checkNoti[1])) {
                            echo lang('Label.err_' . $checkNoti[1]);
                        } else {
                            echo lang('Label.lbl_txtCreateOrderSuccess');
                        }
                    } else if ($checkNoti[0] == 'false') {
                        if (!empty($checkNoti[2])) {
                            echo $checkNoti[2];
                        }else if (!empty($checkNoti[1])) {
                            echo lang('Label.err_' . $checkNoti[1]);
                        } else {
                            echo lang('Label.lbl_txtCreateOrderFalse');
                        }
                    }
                ?>
            </div>
        </div>
</section>

<form action="" id="form-search-order" method="GET" enctype="multipart/form-data">
    <section id="listOders" style="padding: 13px 26px 0 15px">
        <?php 
        // if($returnMenu != 3){
           echo view('App\Modules\OrderManage\ListOrders\Views\menuBar');
        // }
        ?>
        <div class="menuBarOrder">
            <div class="totalCountOrder w-100 pr-0">
                <div class="row wrapCountOrder w100 ml-0">
                    <?php
                    if($returnMenu != 3){
                ?>
                    <div class="col-lg-3 col-md-3 col-sm-6 d-flex dropdown listOders-search">
                        <?php if ($segment != 'tat-ca' && $segment != '' && $segment != null && $segment != 'cho-huy') {?>
                        <div style="width: 30px;">
                            <label>
                                <input type="checkbox" class="selectAll mt-2 frm-check"
                                    onclick="selectAll()"><span></span> </label>
                        </div>

                        <button class="dropdown-toggle action-all fz13 w-100" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"><?=lang('Label.lbl_chucNangChung')?></button>
                        <div class="dropdown-menu" aria-labelledby="dropdownAction" x-placement="bottom-start">
                            <?php if ($segment == 'cho-duyet') {?>
                            <div class="dropdown-item action-item">
                                <i class="icon ico-approved"></i>
                                <a href="javascript:;" class="fz13" title="" data-toggle="modal"
                                    data-target="#modalApproveAll"><?=lang('Label.lbl_duyetDonChon')?></a>
                            </div>

                            <div class="dropdown-item action-item">
                                <i class="icon ico-approved"></i>
                                <a href="javascript:;" class="fz13" title=""
                                    onclick="checkmultiApprovalNewAll()"><?=lang('Label.lbl_duyetTatCa')?></a>
                            </div>
                            <?php }?>
                            <?php if ($segment != 'huy' && $segment != 'hoan-that-bai') {?>
                            <div class="dropdown-item action-item" onclick="showPrintOrderModal(1)">
                                <i class="icon ico-approved"></i>
                                <a href="javascript:;"  class="fz13" title=""><?=lang('Label.lbl_inDonChon')?></a>
                            </div>

                            <div class="dropdown-item action-item" onclick="showPrintOrderAllModal(3,'<?=$segment?>')">
                                <i class="icon ico-approved"></i>
                                <a href="javascript:;" class="fz13" title=""><?=lang('Label.lbl_inTatca')?></a>
                            </div>
                            <?php }?>

                            <?php if ($segment == 'huy') {?>
                            <div class="dropdown-item action-item" onclick="deleteOrderAllModal('<?= $segment ?>')">
                                <i class="icon ico-approved"></i>
                                <!-- data-toggle="modal" data-target="#modalApproveAll" -->
                                <a href="javascript:;"  class="fz13" title=""><?=lang('Label.lbl_xoaTatCa')?></a>
                            </div>

                            <div class="dropdown-item action-item" onclick="DeleteOrderMulti()">
                                <i class="icon ico-approved"></i>
                                <a href="javascript:;"  class="fz13" title=""><?=lang('Label.lbl_xoaDonChon')?></a>
                            </div>
                            <?php }?>
                        </div>
                        <?php }?>
                    </div>
                    <?php } ?>
                    <div
                        class="col-lg-3 col-md-3 col-sm-6 listOders-search-2 listOders-marginright listOders-marginright-1">
                        <div>
                            <?=lang('Label.txt_totalOrder')?>:
                            <span
                                style="color: #2DB1DB;"><?=(!empty($listAllData) && isset($listAllData->totalOrder)) ? $listAllData->totalOrder : '0'?></span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 listOders-search-2 listOders-marginright ">
                        <div>
                            <?=lang('Label.totalCOD')?>:
                            <span style="color:#F0A616">
                                <?=(!empty($listAllData) && isset($listAllData->totalCod)) ? number_format($listAllData->totalCod) : '0'?>
                                đ</span>
                        </div>
                    </div>
                    <div
                        class="col-lg-3 col-md-3 col-sm-6 listOders-search-2 listOders-marginright listOders-marginright-1">
                        <div>
                            <?=lang('Label.totalFees')?>:
                            <span
                                style="color: #885DE5;"><?=(!empty($listAllData) && isset($listAllData->totalFee)) ? number_format($listAllData->totalFee) : '0'?>
                                đ</span>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                if($returnMenu != 3){
            ?>
            <div class="btnExportExcel">
                <input type="button" value="<?php echo lang('Label.lbl_exportExcel') ?>"
                    onclick="exportExcelListOrder('<?= $segment; ?>')" class="lsod-exportExcel">
            </div>
            <?php } ?>
        </div>


        <!--=================== Danh Sách Đơn Hàng=============== -->
        <?php
$listDataOrders = $listAllData->data;
if (!empty($listDataOrders)) {
    foreach ($listDataOrders as $keyOrder => $valueOrderDetail):
        $actionArr = explode(',', $valueOrderDetail->action);
        ?>
        <div class="listOders-bd-1 pt-2 d-flex bg-cw" style="width: 100.7%;">
            <?php if ($segment == 'huy') {?>
            <div class="listOrders-checkbox">
                <label>
                    <input type="checkbox" name="check[]" value="<?=$valueOrderDetail->svcOrderDetailCode?>"
                        class="checkOrder frm-check"><span></span>
                </label>
            </div>
            <?php }?>
            <div class="w-100 mb-2 d-flex">

                <div class="w-100">
                    <div class="mr-2 listOders-bd-3">

                        <ul class="list-unstyled  mb-0 ">
                            <span>
                                <?php
                                    $countLength = strlen($valueOrderDetail->carrierOrderId);
                                    $carrierOrder = $valueOrderDetail->carrierOrderId;
                                    if($countLength > 14){
                                        $carrierOrderId = explode('.', $valueOrderDetail->carrierOrderId);
                                        $carrierOrder  = end($carrierOrderId);
                                    }
                                ?>
                                <li onclick="copyTextOrderId('<?=$carrierOrder?>')">
                                    <img src="<?php echo base_url('public/images/copy.svg'); ?>"
                                        style="width: 18px; height: 20px;" class="mt-0 cursorPointer">
                                </li>
                                <li class="pl-2 <?php if (!$valueOrderDetail->carrierOrderId) {echo 'spaceW';}?>">
                                    <?php if ($valueOrderDetail->carrierOrderId): ?>
                                    <a class="orderDetail"
                                        href="<?=base_url($preUri . '/chi-tiet-don-hang/' . $valueOrderDetail->svcOrderDetailCode)?>">
                                        <b> <?php echo $carrierOrder; ?></b>
                                    </a>
                                    <?php endif;?>
                                </li>
                            </span>
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

                            <span>
                                <li class="pl-2">
                                    <?php if ($valueOrderDetail->type == 1) {?>
                                    <img src="<?php echo base_url('public/images/Rocket.png'); ?>" alt=""
                                        style="width: 18px; height: 18px;margin-left: 0px">
                                    <?php } else {?>
                                    <img src="<?php echo base_url('public/images/Time.png'); ?>" alt=""
                                        style="width: 20px; height: 20px;margin-left: 0px;">
                                    <?php }?>
                                </li>
                                <li class="pl-2">
                                    <span
                                        style="color: #514D5B;font-weight: 500;"><?=$valueOrderDetail->packName?></span>
                                </li>
                            </span>
                            <li class="pl-3">
                                <?=($valueOrderDetail->isPartDelivery == 1) ? '(<span class="info-fee-2">GH1P</span>)' : ''?>
                                <br>
                            </li>


                        </ul>
                        <ul class="list-unstyled d-flex mb-0 listOders-detail-status" style="width: 50%;">
                            <li class="w-100">
                                <span>
                                    (<?=$valueOrderDetail->createAt?>)
                                </span>
                                <span style="color:#885DE5;"><?=$valueOrderDetail->statusMobile->name?></span>
                            </li>
                        </ul>
                    </div>
                    <div class=" mr-2 listOders-bd-3">
                        <ul class="list-unstyled d-flex mb-0" style=" width: 100%; font-size: 13px;">
                            <li>
                                <img src="<?php echo base_url('public/assets/images/icons/iconReceiver.svg'); ?>" alt=""
                                    style="width: 15px; height: 20px;margin-left: 0px">
                            </li>
                            <li class="pl-2 pt-1 listOrders-img-huydon d-flex">
                                <span>
                                    <?=lang('Label.lbl_txtPayerFeeReceiver')?>:
                                    <span>
                                        <?=$valueOrderDetail->consignee . ' - ' . $valueOrderDetail->phone?>
                                    </span>
                                </span>
                                <span class="list-orders-img-mobie">
                                    <!-- <img class="cursorPointer" src="<?php echo base_url('public/images/btnMessage.png'); ?>" alt=""
					                    style="height: 27px;"> -->
                                    <a href="tel:<?php echo $valueOrderDetail->phone; ?>"><img class="cursorPointer"
                                            src="<?php echo base_url('public/images/btnCall.png'); ?>" alt=""></a>
                                </span>
                            </li>
                        </ul>
                        <ul class="list-unstyled d-flex mb-0 jt-fl" style="width: 50%;">
                            <?php if (in_array($valueOrderDetail->status, $arrPrint)) {?>
                            <a href="javascript:;"
                                onclick="chooseSizePrint(1,<?=$valueOrderDetail->svcOrderDetailCode?>)"
                                style="float:left" title="In đơn hàng">
                                <li class="pdr-13 cursorPointer">
                                    <img class="cursorPointer vtc-mid"
                                        src="<?php echo base_url('public/assets/images/icon/icPrint.svg'); ?>">
                                    <span class="pdr-8 vtc-mid text-black"><?=lang('Label.alt_print')?></span>
                                    <img src="<?php echo base_url('public/images/lineEdit.png'); ?>"
                                        class="list-icon-line">
                                </li>
                            </a>

                            <?php }?>
                            <?php if (!in_array($valueOrderDetail->status, $arrNotSupport)) {?>
                            <!-- <li class="pdr-13 cursorPointer">
                                <img class="cursorPointer vtc-mid" src="<?php //echo base_url('public/assets/images/icon/icSp.svg'); ?>">
                                <span class="pdr-8 vtc-mid"><?php // echo lang('Label.alt_support')?></span>
                                <img src="<?php //echo base_url('public/images/lineEdit.png'); ?>" class="list-icon-line">
                            </li> -->
                            <?php }?>
                            <?php if ($valueOrderDetail->status == 900) {?>
                            <!-- <li class="pdr-13 cursorPointer">
                                <img class="cursorPointer vtc-mid" src="<?php //echo base_url('public/assets/images/icon/icEdit.svg');?>">
                                <span class="pdr-8 vtc-mid"><?php //echo lang('Label.alt_edit_1') ?></span>
                                <img src="<?php //echo base_url('public/images/lineEdit.png');?>" class="list-icon-line">
                                </li> -->
                            <?php }?>
                            
                            <li class="orderDetail">
                                <a
                                    href="<?=base_url($preUri . '/chi-tiet-don-hang/' . $valueOrderDetail->svcOrderDetailCode)?>">
                                    <img src="<?php echo base_url('public/images/iconDown11.png'); ?>">
                                    <?=lang('Label.alt_detail')?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="mr-2 listOders-bd-3">
                        <ul class="list-unstyled d-flex mb-0">
                            <li>
                                <img src="<?php echo base_url('public/assets/images/icons/dollar.svg'); ?>" alt=""
                                    style="width: 15px; height: 16px; margin-top:4px;">
                            </li>
                            <li class="pl-2 pt-1">
                                <span class="pr-1">COD: <span
                                        class="colorOrange fw500"><?=number_format($valueOrderDetail->totalDetailCod)?>
                                    </span>đ</span>
                                <span><img src="<?php echo base_url('public/images/lineEdit.png'); ?>"
                                        class="list-icon-line mb-1">
                                    <span class="pl-1"><?=lang('Label.lbl_txtFee')?>:
                                        <span
                                            class="colorPurple fw500"><?=number_format($valueOrderDetail->totalDetailFee)?></span>
                                        đ</span>
                                    <img src="<?php echo base_url('public/images/Info.svg'); ?>" alt=""
                                        style="width: 20px; height: 20px;margin-left: 0px"
                                        class="mb-1 ml-1 cursorPointer" data-toggle="modal"
                                        data-target="#myModal_<?=$keyOrder . '_' . $keyProductDetail?>">
                                    <!-- The Modal -->
                                    <div class="modal" id="myModal_<?=$keyOrder . '_' . $keyProductDetail?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="margin-top: 17%;    ">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title" style="margin: 0px auto;">
                                                        <b><?=lang('Label.lbl_feeInfo')?></b>
                                                    </h4>
                                                    <button type="button" class="close m-0 p-0"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <?php $totalFeesDetail = 0;
                                                        $arrDetailFees = $valueOrderDetail->detailFees;
                                                        if (!empty($arrDetailFees)) {
                                                            foreach ($arrDetailFees as $detailFees):
                                                    ?>
                                                    <div class="row modal-body-content">
                                                        <div class="col-6">
                                                            <?=$detailFees->feeName?>
                                                        </div>
                                                        <div class="col-6 textAlignRight">
                                                            <span>
                                                                <b><?=number_format($detailFees->feeValue)?> đ</b>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <?php
                                                        $totalFeesDetail += $detailFees->feeValue;
                                                            endforeach;
                                                        }
                                                    ?>
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="modal-footer text-center " style="margin: 0px auto;">
                                                    <?=lang('Label.lbl_txtTotalFee')?> : <span style="color: #885DE5;"
                                                        class="fw500 pl-1">
                                                        <?=number_format($totalFeesDetail)?>
                                                    </span>&#160;đ
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </li>
                        </ul>
                        <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
                            <li class="w-100 text-right listOrders-btn-xndh">
                                <?php // if ($valueOrderDetail->status == 900) { ?>
                                <!-- <div class="findShipper mgl15" onclick="ApprovalOrder(<?php // $valueOrderDetail->svcOrderDetailCode ?>, 2)">
                                  <span><?php // lang('Label.lbl_approveOrver') ?></span>
                              </div> -->

                                <?php // }  ?>
                                <?php
                                    if (in_array($valueOrderDetail->status, $arrConfirm)) {
                                ?>
                                <!-- <div class="pt-2 mgl15"> <span><?php //echo lang('Label.lbl_confirmOrder')?></span></div> -->
                                <?php
                                    }
                                        if (in_array($valueOrderDetail->status, $arrCancel)) {
                                ?>
                                <div class="pt-2 mgl15"
                                    onclick="showCancelOrderDetail(<?=$valueOrderDetail->svcOrderDetailCode?>, '<?php echo $carrierOrder ?>')">
                                    <span><?=lang('Label.lbl_cancelOrder')?></span>
                                </div>
                                <?php
                                    }
                                        if (in_array($valueOrderDetail->status, $arrReturn) && in_array('REFUND_REQ', $actionArr)) {
                                ?>
                                <div class="pt-2 mgl15" data-toggle="modal"
                                    data-target="#refundOrder_<?=$valueOrderDetail->svcOrderDetailCode?>">
                                    <span><?=lang('Label.lbl_return')?></span>
                                </div>
                                <?php
                                    }
                                        if (in_array($valueOrderDetail->status, $arrReturnAndCommunate)) {
                                ?>
                                <div class="pt-2 mgl15">
                                    <span><?=lang('Label.lbl_communicate')?></span>
                                </div>
                                <?php
                                    }
                                        if (in_array($valueOrderDetail->status, $arrReDelivery) && in_array('RE_DELIVERY', $actionArr)) {
                                ?>
                                <div class="pt-2 mgl15" data-toggle="modal"
                                    data-target="#reDelivery_<?=$valueOrderDetail->svcOrderDetailCode?>">
                                    <span><?=lang('Label.lbl_reDelivery')?></span>
                                </div>
                                <?php }?>
                                <?php
                                   if ($valueOrderDetail->status == 900) {
                                        if ($valueOrderDetail->type == 1) {
                                ?>
                                <div class="findShipper mgl15"
                                    onclick="ApprovalOrder(<?php echo $valueOrderDetail->svcOrderId ?>, 1)">
                                    <span><?php echo lang('Label.lbl_approveOrver')?></span>
                                </div>

                                <?php } elseif ($valueOrderDetail->type == 2) {?>
                                <!-- <div class="findShipper mgl15"
                                    onclick="ApprovalOrder(<?php //echo $valueOrderDetail->svcOrderId ?>, 1)">
                                    <img src="<?php //echo base_url('public/images/ship_icon1.png'); ?>"
                                        class="listOders-icon-block">
                                    <img src="<?php //echo base_url('public/images/ship_icon2.png'); ?>"
                                        class="listOders-icon-none">
                                    <span><?php //echo lang('Label.lbl_findShipper')?></span>
                                </div> -->
                                <?php } ?>
                                <?php } ?>
                                <?php
                                   if ($segment == 'huy') {
                                ?>
                                <div class="findShipper mgl15"
                                    onclick="deleteOrderModalConfirm(<?php echo $valueOrderDetail->svcOrderId ?>, 2)">
                                    <span><?php echo lang('Label.lbl_deleteIntersectiondetail')?></span>
                                </div>
                                <?php } ?>
                            </li>
                        </ul>

                        <div class="modal" id="refundOrder_<?=$valueOrderDetail->svcOrderDetailCode?>">
                            <div class="modal-dialog">
                                <div class="modal-content" style="margin-top: 17%;">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h5 class="modal-title headerFalse">
                                            <?=lang('Label.lbl_notificationConfirm')?>
                                        </h5>
                                        <button type="button" class="close m-0 p-0"
                                            data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <div class="row modal-body-content">
                                            <div class="col-12 textCenter bodyOrderFalse">
                                                <p class="fz13"><?=lang('Label.lbl_confirmRefundOrder')?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer customize-approve">
                                        <button type="button" class="btn btn-modal"
                                            data-dismiss="modal"><?=lang('Label.lbl_txtCancel');?></button>

                                        <button type="button" class="btn btn-modal btn-confirmCustom "
                                            onclick="refundOrder(<?=$valueOrderDetail->svcOrderDetailCode?>)">
                                            <?=lang('Label.lbl_confirmOrder');?>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="modal" id="reDelivery_<?=$valueOrderDetail->svcOrderDetailCode?>">
                            <div class="modal-dialog">
                                <div class="modal-content" style="margin-top: 17%;">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h5 class="modal-title headerFalse">
                                            <?=lang('Label.lbl_notificationConfirm')?>
                                        </h5>
                                        <button type="button" class="close m-0 p-0"
                                            data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <div class="row modal-body-content">
                                            <div class="col-12 textCenter bodyOrderFalse">
                                                <p class="fz13"><?=lang('Label.lbl_confirmReDelivery')?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer customize-approve">
                                        <button type="button" class="btn btn-modal"
                                            data-dismiss="modal"><?=lang('Label.lbl_txtCancel');?></button>

                                        <button type="button" class="btn btn-modal btn-confirmCustom "
                                            onclick="reDelivery(<?=$valueOrderDetail->svcOrderDetailCode?>)">
                                            <?=lang('Label.lbl_confirmOrder');?>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end list order detail -->
            <!-- </div> -->
            <!-- </div> -->
        </div>


        <?php
// endforeach listorder
    endforeach;
} else {?>
        <div class="listOders-bd-1 dontHaveOrver d-flex">
            <?=lang('Label.lbl_dontHaveOrder')?>
        </div>
        <?php }?>
        <div class="pagination" style="justify-content: flex-end;">
            <?php if ($pager): ?>
            <?=$pages?>
            <?php endif?>
        </div>
        <!--===================END Danh Sách Đơn Hàng=============== -->
        <!--=================== Danh Sách Đơn Hàng=============== -->

    </section>
    <div class="modal" id="cancelOrder">
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
                        <div class="col-12 textCenter bodyOrderFalse">
                            <p class="fz13"><?=lang('Label.lbl_confirmCancel')?></p>
                            <p class="fz13 orderText"></p>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer customize-approve">
                    <button type="button" class="btn btn-modal"
                        data-dismiss="modal"><?=lang('Label.lbl_txtCancel');?></button>

                    <button type="button" class="btn btn-modal btn-confirmCustom "
                        onclick="refundOrder(<?=$valueOrderDetail->svcOrderDetailCode?>)">
                        <?=lang('Label.lbl_confirmOrder');?>
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
                    <button type="button" class="btn btn-modal btn-cancelCustom"
                        data-dismiss="modal"><?=lang('Label.lbl_txtCancel');?></button>
                    <button type="button" data-dismiss="modal" class="btn btn-modal btn-confirmCustom btnCfm ">
                        <?=lang('Label.lbl_confirmOrder');?>
                    </button>
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
    <div class="modal" id="modalOrder">
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
                        <div class="col-12 textCenter bodyOrderFalse">
                            <p class="fz13 notiText"></p>
                            <p class="fz13 orderText"></p>
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
    <div class="modal <?php echo ($showNotiContract == 1) ? 'showModalContract' : '' ?> " id="notiShowContract" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 17%;">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title headerFalse">
                        <?=lang('Label.lbl_notificationConfirm')?>
                    </h5>
                    <button type="button" onclick="closeModalContract()" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row modal-body-content">
                        <div class="col-12 textCenter notiContractBody">
                            <p class="fz13 modalNotiContract "> <?php echo lang('Label.txt_updateContractNow1'); ?></p>
                            <p class="fz13 modalNotiContract "> <?php echo lang('Label.txt_updateContractNow2'); ?></p>
                            <p class="fz13 modalNotiContract "> <?php echo lang('Label.txt_updateContractNow3'); ?></p>
                            <p class="fz13 modalNotiContract "> <?php echo lang('Label.txt_updateContractNow4'); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer customize-approve">
                    <button type="button" class="btn btn-modal btn-modalClose" onclick="closeModalContract()"
                        data-dismiss="modal"><?=lang('Label.modalClose');?></button>
                    <a class="btn btn-modal btn-confirmCustom btnCfm" href="<?php echo base_url('/thong-tin-tai-khoan') ?>"><?=lang('Label.lbl_updateContractNow');?></a>
                </div>

            </div>
        </div>
    </div>
</form>


<script>
function showInfoDetail(id) {
    var idShow = 'lstOr-detail-' + id;
    var btnShow = 'btn-showdetail-' + id;
    var btnNone = 'btn-nonedetail-' + id;
    console.log(btnShow);
    $('#' + idShow).show();
    $('#' + btnShow).hide();
    $('#' + btnNone).show();
}

function noneInfoDetail(id) {
    var idShow = 'lstOr-detail-' + id;
    var btnShow = 'btn-showdetail-' + id;
    var btnNone = 'btn-nonedetail-' + id;
    console.log(btnShow);
    $('#' + idShow).hide();
    $('#' + btnShow).show();
    $('#' + btnNone).hide();
}


var index = 1;

function selectAll() {

    if (index % 2 != 0) {
        $('.checkOrder').prop('checked', true);
    } else {
        $('.checkOrder').prop('checked', false);
    }
    index++;
}

// function choose_print_size(orderId) {
//     $('#choose-print-size-' + orderId).modal('show');
// }

// $('[data-toggle="tooltip"]').tooltip({});
    </script>
<script type="text/javascript">
    var countShowContact = 1;
    </script>
<?php if($showNotiContract == 1){ ?>
    <script type="text/javascript">
        // $(window).on('load', function() {
            // $('#notiShowContract').modal('show');
        // });
    // </script>
<?php }?>

<?php if ($checkNoti) {?>
<script>
$(document).ready(function() {
    $(".notification-container").fadeIn();

    // Set a timeout to hide the element again
    setTimeout(function() {
        $(".notification-container").fadeOut();
    }, 5000);
});
</script>
<?php }?>
<section id="orders">
    <div class="warehouse-banner-title notifacation-wrapper">
        <ul class="ml-0 pl-0 mb-0">
            <li>
                <img src="<?php echo base_url('public/images/Home.png'); ?>">
            </li>
            <li class="mt2-config title-page">
                > <span><?=lang('Label.lbl_order');?></span> > <span> <?php echo $title ?></span>
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
        <!--================ Menu  ======================== -->
        <?=view('App\Modules\OrderManage\ListOrders\Views\menuBar')?>
        <!--=============== END Menu  =====================-->
        <div class="menuBarOrder">
            <div class="totalCountOrder w-100 pr-0">
                <div class="row wrapCountOrder w100 ml-0">
                    <div class="col-lg-3 col-md-3 col-sm-6 d-flex dropdown listOders-search">
                        <?php if ($segment != 'tat-ca') {?>
                        <div style="width: 30px;">
                            <label>
                                <input type="checkbox" class="selectAll mt-2 frm-check" onclick="selectAll()">
                                <span></span>
                            </label>
                        </div>

                        <button class="dropdown-toggle action-all fz13 w-100" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"><?=lang('Label.lbl_chucNangChung')?></button>
                        <div class="dropdown-menu" aria-labelledby="dropdownAction" x-placement="bottom-start">
                            <?php if ($segment == 'cho-duyet') {?>
                            <div class="dropdown-item action-item" onclick="ApprovalOrderMulti()">
                                <i class="icon ico-approved"></i>
                                <a href="javascript:;" class="fz13" title=""><?=lang('Label.lbl_duyetDonChon')?></a>
                            </div>

                            <div class="dropdown-item action-item" onclick="checkmultiApprovalNewAll()">
                                <i class="icon ico-approved"></i>
                                <a href="javascript:;" class="fz13" title=""><?=lang('Label.lbl_duyetTatCa')?></a>
                            </div>
                            <div class="dropdown-item action-item" onclick="DeleteOrderMulti()">
                                <i class="icon ico-approved"></i>
                                <a href="javascript:;" class="fz13"
                                    title=""><?php echo lang('Label.lbl_xoaDonChon') ?></a>
                            </div>

                            <div class="dropdown-item action-item" onclick="deleteOrderAllModal('<?= $segment ?>')">
                                <i class="icon ico-approved"></i>
                                <a href="javascript:;" class="fz13"
                                    title=""><?php echo lang('Label.Label.lbl_xoaTatCa') ?></a>
                            </div>
                            <?php }?>
                            <?php if ($segment == 'cho-lay') {?>
                            <div class="dropdown-item action-item" onclick="cancelOrderModal()">
                                <i class="icon ico-approved"></i>
                                <a href="javascript:;" class="fz13" title=""><?=lang('Label.lbl_huyDonChon')?></a>
                            </div>

                            <div class="dropdown-item action-item" onclick="cancelOrderAllModal()">
                                <i class="icon ico-approved"></i>
                                <a href="javascript:;" class="fz13" title=""><?=lang('Label.lbl_huyTatca')?></a>
                            </div>

                            <?php }?>
                            <div class="dropdown-item action-item" onclick="showPrintOrderModal(2)">
                                <i class="icon ico-approved"></i>
                                <a href="javascript:;" class="fz13" title=""><?=lang('Label.lbl_inDonChon')?></a>
                            </div>

                            <div class="dropdown-item action-item" onclick="showPrintOrderAllModal(3,'<?=$segment?>')">
                                <i class="icon ico-approved"></i>
                                <a href="javascript:;" class="fz13" title=""><?=lang('Label.lbl_inTatca')?></a>
                            </div>
                        </div>
                        <?php }?>
                    </div>
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
            <div class="btnExportExcel">
                <input type="button" value="<?php echo lang('Label.lbl_exportExcel') ?>"
                    onclick="exportExcelListOrder('<?= $segment; ?>')" class="lsod-exportExcel">
            </div>
        </div>
        <?php
            $listDataOrders = $listAllData->data;
            if (!empty($listDataOrders)) {
                foreach ($listDataOrders as $keyOrder => $valueOrder):
            $countReceiver = count($valueOrder->orderDetails);
        ?>
        <div class="listOders-bd-1 pt-2 d-flex bg-cw pd-smorder  listorder-cholay-responsive" style="width: 100.7%;">
            <div class="listOrders-checkbox">
                <?php if ($valueOrder->orderStatus != 1001 && $valueOrder->orderStatus != 909): ?>
                <label>
                    <input type="checkbox" name="check[]" value="<?=$valueOrder->svcOrderId?>"
                        class="checkOrder frm-check"><span></span></label>
                <?php endif;?>
            </div>
            <div class="w-100 mb-2 mg-smorder mg-smorder-detail">
                <?php
                    if($valueOrder->type == 2):
                    ?>
                <div class="mr-2 listOders-bd-3 1">
                    <ul class="list-unstyled  mb-0 ">
                        <li>
                            <!-- <span class="listOders-bd-stt"><?php // ($keyOrder + 1) ?></span> -->
                            <?php
                                // $countLength = strlen($valueOrder->carrierOrderId);
                                // $carrierOrder = $valueOrder->carrierOrderId;
                                // if($countLength > 14){
                                //     $carrierOrderId = explode('.', $valueOrder->carrierOrderId);
                                //     $carrierOrder  = end($carrierOrderId);
                                // }
                                $carrierOrder = $valueOrder->svcOrderId;
                            ?>
                            <img src="<?php echo base_url('public/images/copy.svg'); ?>"
                                style="width: 18px; height: 20px;" class="mt-0 cursorPointer"
                                onclick="copyTextOrderId('<?= $carrierOrder ?>')">

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

                        </li>
                        <li class="pl-2 spaceW">
                            <b><?php echo $carrierOrder?></b>
                        </li>
                        <li class="pl-2">
                            <?php if ($valueOrder->type == 1) {?>
                            <img src="<?php echo base_url('public/images/Rocket.png'); ?>" alt=""
                                style="width: 18px; height: 18px;margin-left: 0px">
                            <?php } else {?>
                            <img src="<?php echo base_url('public/images/Time.png'); ?>" alt=""
                                style="width: 20px; height: 20px;margin-left: 0px;">
                            <?php }?>
                        </li>

                        <li class="pl-2">
                            <span style="color: #514D5B; font-weight:500"><?=$valueOrder->packName?></span>
                        </li>
                        <li class="pl-2">
                            <?php
                                $textTotalIsDoorDelivery = '';
                                $textTotalIsPartial = '';
                                if ($valueOrder->totalIsDoorDelivery > 0) {
                                    $textTotalIsDoorDelivery .= $valueOrder->totalIsDoorDelivery . ' GTT';
                                }
                                if ($valueOrder->totalIsPartial > 0) {
                                    $textTotalIsPartial .= $valueOrder->totalIsPartial . ' GH1P';
                                }
                                echo $valueOrder->totalOrderDetail . ' ' . lang('Label.don') . ' ';
                                if ($textTotalIsDoorDelivery != '' && $textTotalIsPartial != '') {
                                    echo '(<span style="color: #2DB1DB;">' . $textTotalIsDoorDelivery . ' - ' . $textTotalIsPartial . '</span>) ';
                                } else if ($textTotalIsDoorDelivery != '') {
                                    echo '(<span style="color: #2DB1DB;">' . $textTotalIsDoorDelivery . '</span>) ';
                                } else if ($textTotalIsPartial != '') {
                                    echo '(<span style="color: #2DB1DB;">' . $textTotalIsPartial . '</span>) ';
                                }
                            ?>
                            -
                            <?=$valueOrder->totalAddressDelivery?>
                            <?=lang('Label.alt_points')?>
                        </li>
                    </ul>
                    <ul class="list-unstyled d-flex mb-0" style="width: 40%;">
                        <li class="w-100  timeOrder">
                            <span>
                                (<?=$valueOrder->createAt;?>)
                                <?php //date("d/m/Y H:i:s ", strtotime($valueOrder->createAt)); ?>
                            </span>
                            <span class="textStatuss" style="color:#885DE5;"><?=$valueOrder->statusMobile->name ?></span>
                        </li>
                    </ul>
                </div>
                <div class="mr-2 listOders-bd-3 2">
                    <ul class="list-unstyled d-flex mb-0" style=" width: 100%; font-size: 13px;">
                        <li>
                            <img src="<?php echo base_url('public/assets/images/icons/iconReceiver.svg'); ?>" alt=""
                                style="width: 15px; height: 20px;">
                        </li>
                        <li class="pl-2 pt-1">
                            <?=lang('Label.sendFrom')?>: <?=$valueOrder->shopName?> - <?=$valueOrder->shopPhone?>
                        </li>
                    </ul>
                    <ul class="list-unstyled d-flex mb-0 jt-fl" style="width: 50%;">
                        <?php if (in_array($valueOrder->orderStatus, $arrPrint)) {?>

                        <a href="javascript:;" onclick="chooseSizePrint(2,<?=$valueOrder->svcOrderId?>)"
                            style="float:left" title="In đơn hàng">
                            <li class="pdr-13 cursorPointer">
                                <img class="cursorPointer vtc-mid"
                                    src="<?php echo base_url('public/assets/images/icon/icPrint.svg'); ?>">
                                <span class="pdr-8 vtc-mid text-black"><?=lang('Label.alt_print')?></span>
                                <img src="<?php echo base_url('public/images/lineEdit.png'); ?>" class="list-icon-line">
                            </li>
                        </a>
                        <?php }?>
                        <?php if (in_array($valueOrder->orderStatus, $arrNotSupport)) {?>
                        <!-- <li class="pdr-13 cursorPointer"> -->
                        <!-- <img class="cursorPointer vtc-mid" src="<?php //echo base_url('public/assets/images/icon/icSp.svg'); ?>">
              <span class="pdr-8 vtc-mid"><?php //echo lang('Label.alt_support')?></span>
              <img src="<?php //echo base_url('public/images/lineEdit.png'); ?>" class="list-icon-line"> -->
                        <!-- </li> -->
                        <?php }?>
                        <?php if (in_array($valueOrder->orderStatus, $arrEdit) && $valueOrder->orderStatus == 900) {?>
                        <li class="pdr-13 cursorPointer">
                            <a class="orderDetail" 
                            href="javascript:;" onclick="chooseSizePrint(2,'<?php echo $valueOrder->svcOrderId; ?> ')">
                                <img class="cursorPointer vtc-mid"
                                    src="<?php echo base_url('public/assets/images/icons/icPrint.svg'); ?>">
                                <span class="pdr-8 vtc-mid"><?=lang('Label.alt_print')?></span>
                            </a>

                            <img src="<?php echo base_url('public/images/lineEdit.png'); ?>" class="list-icon-line">
                        </li>
                        <li class="pdr-13 cursorPointer">
                            <?php if($valueOrder->type == 1): ?>
                                <a class="orderDetail 111"
                                href="<?php echo base_url('vi/chinh-sua-don-hang/' . $valueOrder->svcOrderId . '/1') ?>">
                                <img class="cursorPointer vtc-mid"
                                src="<?php echo base_url('public/assets/images/icon/icEdit.svg'); ?>">
                                <span class="pdr-8 vtc-mid"><?php echo lang('Label.alt_edit_1')?></span>
                            </a>
                            
                            <img src="<?php echo base_url('public/images/lineEdit.png'); ?>" class="list-icon-line">
                            <?php endif; ?>
                        </li>
                        <?php }?>
                        <li class="">
                            <span class="cursorPointer btn-showdetail-<?=$valueOrder->svcOrderId?>"
                                onclick="showInfoDetail(<?=$valueOrder->svcOrderId?>)">
                                <img class="cursorPointer vtc-mid "
                                    src="<?php echo base_url('public/assets/images/icon/icShow.svg'); ?>">
                                <span class="vtc-mid"><?=lang('Label.alt_detail')?></span>
                            </span>
                            <span class="cursorPointer btn-noneDetail btn-nonedetail-<?=$valueOrder->svcOrderId?>"
                                onclick="noneInfoDetail(<?=$valueOrder->svcOrderId?>)">
                                <img src="<?php echo base_url('public/assets/images/icon/icDown.svg'); ?>"
                                    class="cursorPointer vtc-mid">
                                <span class="vtc-mid"><?=lang('Label.alt_detail')?></span>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="mr-2 listOders-bd-3 3">
                    <ul class="list-unstyled  mb-0">
                        <li>
                            <img src="<?php echo base_url('public/assets/images/icons/dollar.svg'); ?>" alt=""
                                class="imgCod">
                        </li>
                        <li class="pl-2 pt-1">
                            <span class="pr-1 ">COD: <span class="colorOrange fw600">
                                    <?=number_format($valueOrder->totalCod)?>
                                </span> đ</span>
                            <span><img src="<?php echo base_url('public/images/lineEdit.png'); ?>"
                                    class="list-icon-line mb-1">
                                <span class="pl-1">Phí: <span
                                        class="colorPurple fw600"><?=number_format($valueOrder->totalFee)?></span>
                                    đ</span>
                                <img src="<?php echo base_url('public/images/Info.svg'); ?>" alt=""
                                    style="width: 20px; height: 20px;margin-left: 0px" class="mb-1 ml-1 cursorPointer"
                                    data-toggle="modal" data-target="#myModal_<?=$keyOrder?>">
                                <!-- The Modal Fee -->
                                <div class="modal" id="myModal_<?=$keyOrder?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content" style="margin-top: 17%;">

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
                                                <?php
                                                    $arrOrderFees = $valueOrder->orderFees;
                                                    if (!empty($arrOrderFees)) {
                                                        foreach ($arrOrderFees as $orderFee):
                                                ?>
                                                <div class="row modal-body-content">
                                                    <div class="col-6">
                                                        <?=$orderFee->feeName?>
                                                    </div>
                                                    <div class="col-6 textAlignRight">
                                                        <span>
                                                            <b><?=number_format($orderFee->feeValue)?>đ</b>
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
                                                <?=lang('Label.lbl_txtTotalFee')?>: <span
                                                    style="color: #885DE5;"><?=number_format($valueOrder->totalFee)?>
                                                    đ</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                        </li>
                    </ul>
                    <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
                        <li class="w-100 text-right listOrders-btn-xndh <?=$valueOrder->type?>">
                            <?php
                                if ($valueOrder->orderStatus == 900) {
                                    if ($valueOrder->type == 1) {
                            ?>
                            <div class="findShipper mgl15"
                                onclick="ApprovalOrder(<?php echo $valueOrder->svcOrderId ?>, 1)">
                                <span><?=lang('Label.lbl_approveOrver')?></span>
                            </div>

                            <?php } elseif ($valueOrder->type == 2) {?>
                            <div class="findShipper mgl15"
                                onclick="ApprovalOrder(<?php echo $valueOrder->svcOrderId ?>, 1)">
                                <img src="<?php echo base_url('public/images/ship_icon1.png'); ?>"
                                    class="listOders-icon-block">
                                <img src="<?php echo base_url('public/images/ship_icon2.png'); ?>"
                                    class="listOders-icon-none">
                                <span><?=lang('Label.lbl_findShipper')?></span>
                            </div>
                            <?php }?>
                            <div class="findShipper mgl15"
                                onclick="deleteOrderModalConfirm(<?php echo $valueOrder->svcOrderId ?>)">
                                <span><?=lang('Label.lbl_deleteIntersectiondetail')?></span>
                            </div>
                            <?php  } ?>
                            <?php if (in_array($valueOrder->orderStatus, $arrCancel)) {?>
                            <div class="pt-2 mgl15" onclick="showCancelOrder(<?=$valueOrder->svcOrderId?>)">
                                <span><?=lang('Label.lbl_cancelOrder')?></span>
                            </div>
                            <?php }?>

                            <?php if ($valueOrder->orderStatus == 1001) {?>
                            <div class="findShipper-call mgl15">
                                <img src="<?php echo base_url('public/assets/images/iconShipper.svg'); ?>">
                                <span class="clr-or"><?=lang('Label.lbl_findingShipper')?></span>
                            </div>
                            <?php }?>
                        </li>
                    </ul>
                </div>
                <?php
                    endif;
                ?>
                <div
                    class=" <?= ($valueOrder->type == 2) ? 'lstOr-detail-1' : '' ?> lstOr-detail-<?=$valueOrder->svcOrderId?>">
                    <?php if($valueOrder->type == 2):  ?>
                    <div class="lstOders-line-detail"></div>
                    <?php endif; ?>
                    <!-- list order detail -->
                    <?php
                        $listOrdersDetail = $valueOrder->orderDetails;
                            foreach ($listOrdersDetail as $keyListOrdersDetail => $valueOrderDetail):
                                
                                $countLength = strlen($valueOrderDetail->carrierOrderId);
                                $carrierOrder = $valueOrderDetail->carrierOrderId;
                                if($countLength > 14){
                                    $carrierOrderId = explode('.', $valueOrderDetail->carrierOrderId);
                                    $carrierOrder  = end($carrierOrderId);
                                }
                                if($valueOrderDetail->type == 2){
                                    $carrierOrder = $valueOrderDetail->svcOrderDetailCode;
                                }
                    ?>
                    <!-- off viền đơn con -->
                    <div class="listOders-bd-1 d-flex pl-0  bg-cw"
                        style="<?= ($valueOrder->type == 1) ? 'border:none' : '' ?>">
                        <div class="w-100 <?= ($valueOrder->type == 2) ? 'pd10' : '' ?> ">
                            <div class="mr-2 listOders-bd-3 4 ">
                                <ul class="list-unstyled mb-0 ">
                                    <!-- data-toggle="modal" data-target="#copyModal" -->
                                    <li>
                                        <!-- <span class="listOders-bd-stt"><?php // ($keyOrder + 1) ?></span> -->
                                        <img src="<?php echo base_url('public/images/copy.svg'); ?>"
                                            style=" width: 22px; height: 17px;" class="mt-0 cursorPointer"
                                            onclick="copyTextOrderId('<?=$carrierOrder?>')">

                                        <div class="modal fade" id="copyModal" role="dialog" style="top: 40%;">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <img class="imgErrorDetailOrder"
                                                            src="<?php echo base_url('public/images/copySuccess.svg'); ?>"
                                                            alt="">
                                                        <br>
                                                        <span class="spanErrorDetailOrder">
                                                            Sao chép mã vận <br>
                                                            đơn thành công
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li
                                        class="pl-2 3 <?php if (!$valueOrderDetail->carrierOrderId && $valueOrderDetail->type == 1) {echo 'spaceW';}?>">
                                        <?php if($valueOrderDetail->type == 1){ ?>
                                        <a class="orderDetail"
                                            href=" <?=base_url($preUri . '/chi-tiet-don-hang/' . $carrierOrder) ?> ">
                                            <?php }else{ ?>
                                            <a class="orderDetail"
                                                href=" <?=base_url($preUri . '/chi-tiet-don-hang/' . $carrierOrder) ?> ">
                                                <?php } ?>
                                                <b><?php //echo ($valueOrderDetail->type == 1 ) ? $carrierOrder : ''; ?>
                                                </b>
                                                <b><?= $carrierOrder ; ?> </b>
                                            </a>
                                    </li>
                                    <li class="pl-2">
                                        <?php if ($valueOrder->type == 1) {?>
                                        <img src="<?php echo base_url('public/images/Rocket.png'); ?>" alt=""
                                            style="width: 18px; height: 18px;margin-left: 0px">
                                        <?php } else {?>
                                        <img src="<?php echo base_url('public/images/Time.png'); ?>" alt=""
                                            style="width: 20px; height: 20px;margin-left: 0px;display: none;">
                                        <?php }?>
                                    </li>
                                    <li class="pl-2">
                                        <span style="color: #514D5B;font-weight: 500;"><?=$valueOrder->packName?></span>
                                    </li>
                                    <li class="pl-2">
                                        <?php
                                            if ($valueOrderDetail->isDoorDelivery == 1 && $valueOrderDetail->isPartDelivery == 1) {
                                                echo '(<span style="color: #2DB1DB;">GTT - GH1P</span>)';
                                            } else if ($valueOrderDetail->isDoorDelivery == 1) {
                                                echo '(<span style="color: #2DB1DB;">GTT</span>)';
                                            } else if ($valueOrderDetail->isPartDelivery == 1) {
                                                echo '(<span style="color: #2DB1DB;">GH1P</span>)';
                                            }
                                        ?>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
                                    <li class="w-100 text-right timeOrder">
                                        <span>
                                            <?=$valueOrderDetail->createAt?>
                                        </span>
                                        <span
                                            style="color:#885DE5;"><?=$arrStatus[$valueOrderDetail->status]->description?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="mr-2 listOders-bd-3 5">
                                <ul class="list-unstyled d-flex mb-0" style=" width: 100%; font-size: 13px;">
                                    <li>
                                        <img src="<?php echo base_url('public/images/iconUser.png'); ?>" alt=""
                                            style="width: 20px; height: 20px;margin-left: 0px">
                                    </li>
                                    <li class="pl-2 pt-1 listOrders-img-huydon d-flex">
                                        <span>
                                            <?=lang('Label.lbl_txtPayerFeeReceiver').': ' ?>
                                            <?= ' '.$valueOrderDetail->consignee . ' - ' . $valueOrderDetail->phone?>
                                        </span>
                                        <!-- <img class="cursorPointer" src="<?php //echo base_url('public/images/btnMessage.png');?>" alt=""
                      style="height: 27px;"> -->
                                        <a href="tel:<?php echo $valueOrderDetail->phone; ?>"
                                            class="cursorPointer-call"><img class="cursorPointer "
                                                src="<?php echo base_url('public/images/btnCall.png'); ?>" alt=""></a>
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
                    <img class="cursorPointer vtc-mid"
                      src="<?php //echo base_url('public/assets/images/icon/icSp.svg'); ?>">
                    <span class="pdr-8 vtc-mid"><?php //echo lang('Label.alt_support')?></span>
                    <img src="<?php //echo base_url('public/images/lineEdit.png'); ?>" class="list-icon-line">
                  </li> -->
                                    <?php }?>
                                    <?php
                    if (in_array($valueOrderDetail->status, $arrEdit) && $valueOrderDetail->status == 900 ) {?>
                                    <li class="pdr-13 cursorPointer">
                                        
                                    <!-- href="<?php //echo base_url('vi/in-van-don/1/a5/' . $valueOrderDetail->svcOrderDetailCode ) ?>"> -->
                                        <a class="orderDetail" 
                                            
                                            href="javascript:;" onclick="chooseSizePrint(1,'<?php echo $valueOrderDetail->svcOrderDetailCode; ?> ')">
                                            <img class="cursorPointer vtc-mid"
                                                src="<?php echo base_url('public/assets/images/icons/icPrint.svg'); ?>">
                                            <span class="pdr-8 vtc-mid"><?=lang('Label.alt_print')?></span>
                                        </a>
                                    </li>
                                    <?php if($valueOrder->type == 1): ?>
                                    <li class="pdr-13 cursorPointer">
                                        <a class="orderDetail 222"
                                            href="<?php echo base_url('vi/chinh-sua-don-hang/' . $valueOrder->svcOrderId . '/1') ?>">
                                            <img class="cursorPointer vtc-mid"
                                                src="<?php echo base_url('public/assets/images/icon/icEdit.svg'); ?>">
                                            <span class="pdr-8 vtc-mid"><?php echo lang('Label.alt_edit_1') ?></span>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    <?php }?>
                                    <li class="orderDetail">
                                        <a
                                            href="<?=base_url($preUri . '/chi-tiet-don-hang/' . $valueOrderDetail->svcOrderDetailCode)?>">
                                            <img src="<?php echo base_url('public/images/iconDown11.png'); ?>">
                                            <?=lang('Label.alt_detail')?></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- <div class="pt-1 mr-2">
                    <ul class="list-unstyled d-flex mb-0" style=" width: 100%; font-size: 13px;">
                        <li>
                            <img src="<?php echo base_url('public/images/iconLocation11.svg'); ?>" alt=""
                                style="width: 18px; height: 18px;margin-left: 0px">
                        </li>
                        <li class="pl-2 pt-1 w-100">
                            <?php //echo lang('Label.lbl_receiverAddress1')?>:
                            <span>
                                <?php //echo $valueOrderDetail->deliveryAddress?>
                            </span>
                        </li>
                    </ul>
                </div> -->
                            <div class="mr-2 listOders-bd-3 6">
                                <ul class="list-unstyled d-flex mb-0">
                                    <li>
                                        <img src="<?php echo base_url('public/assets/images/icons/dollar.svg'); ?>"
                                            alt="" style="width: 17px; height: 16px;" class="mt-1">
                                    </li>
                                    <li class="pl-2 pt-1">
                                        <span class="pr-1">COD: <span
                                                class="colorOrange"><?=number_format($valueOrderDetail->totalDetailCod)?></span>
                                            đ</span>
                                        <span><img src="<?php echo base_url('public/images/lineEdit.png'); ?>"
                                                class="list-icon-line mb-1">
                                            <span class="pl-1">Phí:
                                                <span class="colorPurple fw600">
                                                    <?=number_format($valueOrderDetail->totalDetailFee)?> đ </span>
                                            </span>
                                            <img src="<?php echo base_url('public/images/Info.svg'); ?>" alt=""
                                                style="width: 20px; height: 20px;margin-left: 0px"
                                                class="mb-1 ml-1 cursorPointer" data-toggle="modal"
                                                data-target="#myModal_<?=$keyOrder . '_' . $keyListOrdersDetail?>">
                                            <!-- The Modal -->
                                            <div class="modal" id="myModal_<?=$keyOrder . '_' . $keyListOrdersDetail?>">
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
                                                            <?php
                                  $totalFeeDetail = 0;
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
                                                                        <b><?=number_format($detailFees->feeValue)?>đ</b>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <?php $totalFeeDetail += $detailFees->feeValue;endforeach;}?>
                                                        </div>
                                                        <!-- Modal footer -->
                                                        <div class="modal-footer text-center" style="margin: 0px auto;">
                                                            <span
                                                                style="color: #885DE5;"><?=lang('Label.lbl_txtTotalFee')?>:
                                                                <?=number_format($totalFeeDetail)?> đ</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex mb-0" style="width: 50%;">
                                    <?php if (in_array($valueOrderDetail->status, $arrCancel)): ?>
                                    <li class="w-100 text-right listOrders-btn-xndh">
                                        <div class="pt-2 mgl15"
                                            onclick="showCancelOrderDetail(<?=$valueOrderDetail->svcOrderDetailCode?>, '<?php echo $carrierOrder ?>')">
                                            <span><?=lang('Label.lbl_cancelOrder')?></span>
                                        </div>
                                    </li>
                                    <?php endif;?>
                                    <?php if ($valueOrderDetail->status == 900): ?>
                                    <li class="w-100 text-right listOrders-btn-xndh">
                                        <?php
                    if($valueOrder->type == 1):
                    ?>
                                        <div class="pt-2 mgl15" onclick="ApprovalOrder(<?=$valueOrder->svcOrderId?>)">
                                            <span><?=lang('Label.lbl_approveOrver')?></span>
                                        </div>
                                        <?php endif; ?>
                                        <!-- <div class="pt-2 mgl15 "
                                            onclick="deleteOrderModalConfirm(<?php //echo $valueOrder->svcOrderId?>)">
                                            <span><?php //echo lang('Label.lbl_deleteIntersectiondetail')?></span>
                                        </div> -->
                                    </li>
                                    <?php endif;?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
//End list order detail foreach
    endforeach;
    ?>
                    <!-- end list order detail -->
                </div>
            </div>
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
        <!--================ === Danh Sách Đơn Hàng=============== -->

    </section>

</form>

<div class="modal" id="resultApproveOrder">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 17%;">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title headerFalse">
                    <?=lang('Label.lbl_resultApproveOrver')?>
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
                                </span> <span> <?=lang('Label.lbl_payInOrder3')?> </span></p>
                        </div>
                        <div class="otherReasons" style="display:none">
                            <p class="fz13 otherReasonsDetail"></p>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer customize-approve">
                <button type="button" class="btn btn-modal" onclick="reload()"><?=lang('Label.modalClose');?></button>
                <a class="btn btn-confirmCustom btn-ok btnvi" style="display:none" href="<?=base_url('/nap-tien');?>">
                    <?=lang('Label.lbl_wallet')?></a>
            </div>

        </div>
    </div>
</div>
<div class="modal" id="resultApproveMultiOrder">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 17%;">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title headerFalse">
                    <?=lang('Label.lbl_resultApproveOrver')?>
                </h5>
                <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row modal-body-content">
                    <div class="col-12 textCenter bodyOrderFalse">
                        <p class="fz13">
                            <?=lang('Label.lbl_txtYes')?>
                            <span class="numberSuccess"> </span>
                            <?=lang('Label.lbl_approveOrderMulti1')?>
                            <span class="numberError"> </span>
                            <?=lang('Label.lbl_approveOrderMulti2')?>
                        </p>
                        <p> </p>
                        <div class="showRemain" style="display:none">
                            <p class="fz13">
                                <?=lang('Label.lbl_payInOrder1')?>
                            </p>
                            <p class="fz13">
                                <?=lang('Label.lbl_payInOrder2')?>
                                <strong class="colorPurple minimumToConfirm"> </strong>
                                <?=lang('Label.lbl_payInOrder3')?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer customize-approve">
                <button type="button" class="btn btn-modal" onclick="reload()"><?=lang('Label.modalClose');?></button>
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

<div class="modal" id="modalOrderResponse">
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
                        <div class="col-12 textCenter showFalse">

                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer customize-approve">
                <button type="button" data-dismiss="modal" class="btn btn-modal btn-confirmCustom ">
                    <?=lang('Label.lbl_confirmOrder');?>
                </button>
            </div>

        </div>
    </div>
</div>
<script>
function showInfoDetail(id) {
    var idShow = 'lstOr-detail-' + id;
    var btnShow = 'btn-showdetail-' + id;
    var btnNone = 'btn-nonedetail-' + id;
    console.log(btnShow);
    $('.' + idShow).show();
    $('.' + btnShow).hide();
    $('.' + btnNone).show();
}

function noneInfoDetail(id) {
    var idShow = 'lstOr-detail-' + id;
    var btnShow = 'btn-showdetail-' + id;
    var btnNone = 'btn-nonedetail-' + id;
    console.log(btnShow);
    $('.' + idShow).hide();
    $('.' + btnShow).show();
    $('.' + btnNone).hide();
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
</script>
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
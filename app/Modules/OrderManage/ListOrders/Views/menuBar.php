<?php
$lang = get_cookie('__locale');
if ($lang != '') {
    $preUri = $lang;
} else {
    $preUri = 'vi';
}
?>
<div class="listOders-search ">
    <ul class="row list-unstyled listOders-search-responsive" >
        
        <?php
                if($returnMenu != 3){
            ?>
        <li class="col-md-3 col-sm-12 list-order-menu">
            <input type="text" class="searchKey" name="searchKey" value="<?=$dataPost['searchKey']?>"
                placeholder="<?=lang('Label.plh_searchOrder')?>">
        </li>
        <li class="col-md-2 col-sm-12 list-order-menu">
            <select name="shopAddressId" id="shopAddressId" class="form-control frm-lg chosen-select shopAddressId ">
                <option value="0"><?= lang('Label.lbl_listPickup'); ?></option>
                <?php foreach($listPickupAddress as $pickupAddress): ?>
                    <option <?= ($dataPost['shopAddressId'] == $pickupAddress->id) ?'selected' : '' ?> value="<?= $pickupAddress->id ?>"><?= $pickupAddress->name . ' - '. $pickupAddress->phone ?></option>
                <?php endforeach; ?>
            </select>
        </li>
        <li class="col-md-2 col-sm-12 list-order-menu">
            <select name="packCode" id="packCode" class="form-control frm-lg chosen-select packCode">
                <option value="0"><?= lang('Label.lbl_listPackType'); ?></option>
                <?php 
                    if(!empty($listPackages)):
                        foreach ($listPackages as $package):
                    ?>
                    <option <?= ($dataPost['packCode'] == $package->code) ? 'selected' : '' ?> value="<?= $package->code ?>"><?= $package->name; ?></option>
                <?php endforeach; endif; ?>
            </select>
        </li>
        <li class="col-lg-2 col-md-2 col-sm-4 list-order-menu-1 list-order-menu-2">
            <input type="text" name="fromDate" value="<?=$dataPost['fromDate']?>" autocomplete="off"
                placeholder="<?=lang('Label.lbl_fromDate')?>" class="datePicker fromDate">
        </li>
        <li class="col-lg-2 col-md-2 col-sm-4 list-order-menu-1 list-order-menu-3">
            <input type="text" name="toDate" value="<?=$dataPost['toDate']?>" autocomplete="off"
                placeholder="<?=lang('Label.lbl_toDate')?>" class="datePicker toDate">
        </li>
        <?php }else { ?>
            <li class="col-md-6 col-sm-12 list-order-menu">
                <input type="text" class="searchKey" name="searchKey" value="<?=$dataPost['searchKey']?>"
                    placeholder="<?=lang('Label.plh_searchOrder')?>">
            </li>
        <?php } ?>
        <li class="col-md-1 col-sm-4 list-order-menu-1 list-order-menu-3 pr-0">
            <button type="submit" class="lsod-submit-search"><?=lang('Label.lbl_search')?></button>
        </li>
    </ul>
</div>
<!--================ Menu  ======================== -->
<!-- menu1 -->
<?php
    if($returnMenu != 3){
?>
<div
    class="listOders-menu-dt extentMenu0 <?=($extentMenu == 0) ? 'listOders-menu-dt-show' : 'listOders-menu-dt-default'?>  mt-2 ">
    <div class="row mg0">
        <a class="col-lg-2 col-md-2 col-sm-4 col-6 orderMenuShort <?=($segment == 'tat-ca' || $segment == '') ? 'orderMenuShortActive' : ''?>"
            href="<?=base_url($preUri . '/danh-sach-don-hang/tat-ca');?>">
            <?=lang('Label.stt_tatCa')?>
            <span class="span-detail-list colorPurple">
                <?=(!empty($dataTotalOrder) && isset($dataTotalOrder[0]) ? $dataTotalOrder[0] : '0')?></span>
        </a>
        <a class="col-lg-2 col-md-2 col-sm-4 col-6 orderMenuShort <?=($segment == 'cho-duyet') ? 'orderMenuShortActive' : ''?>"
            href="<?=base_url($preUri . '/danh-sach-don-hang/cho-duyet');?>">
            <?=lang('Label.stt_choDuyet')?>
            <span class="span-detail-list colorPurple">
                <?=(!empty($dataTotalOrder) && isset($dataTotalOrder[900]) ? $dataTotalOrder[900] : '0')?></span>
        </a>
        <a class="col-lg-2 col-md-2 col-sm-4 col-6 orderMenuShort <?=($segment == 'cho-lay') ? 'orderMenuShortActive' : ''?>"
            href="<?=base_url($preUri . '/danh-sach-don-hang/cho-lay');?>">
            <?=lang('Label.stt_choLay')?>
            <span class="span-detail-list colorPurple">
                <?=(!empty($dataTotalOrder) && isset($dataTotalOrder[100]) ? $dataTotalOrder[100] : '0')?></span>
        </a>
        <a class="col-lg-2 col-md-2 col-sm-4 col-6 orderMenuShort <?=($segment == 'dang-giao') ? 'orderMenuShortActive' : ''?>"
            href="<?=base_url($preUri . '/danh-sach-don-hang/dang-giao');?>">
            <?=lang('Label.stt_dangGiao')?>
            <span class="span-detail-list colorPurple">
                <?=(!empty($dataTotalOrder) && isset($dataTotalOrder[500]) ? $dataTotalOrder[500] : '0')?></span>
        </a>
        <a class="col-lg-2 col-md-2 col-sm-4 col-6 orderMenuShort <?=($segment == 'cho-hoan') ? 'orderMenuShortActive' : ''?>"
            href="<?=base_url($preUri . '/danh-sach-don-hang/cho-hoan');?>">
            <?=lang('Label.stt_choHoan')?>
            <span class="span-detail-list colorPurple">
                <?=(!empty($dataTotalOrder) && isset($dataTotalOrder[505]) ? $dataTotalOrder[505] : '0')?></span>
        </a>
        <div class="col-lg-2 col-md-2 col-sm-4 col-6 lstOrder-btn-showFilter orderMenuShort" onclick="showMenuFilter()">
            <span class="colorPurple"> <?=lang('Label.stt_moRong')?> </span>
            <img src="<?php echo base_url('public/images/iconDownx.svg'); ?>" class="float-right pt-1 pr-2">
        </div>
    </div>
</div>
<!-- menu2 -->
<div
    class="listOders-menu-dt extentMenu1 <?=($extentMenu == 0) ? 'listOders-menu-dt-default' : 'listOders-menu-dt-show'?> mt-2">
    <!-- dòng 1 -->
    <div class="row mg0">
        <a class="col-lg-2 col-md-2 col-sm-4 col-6 orderMenuShort <?=($segment == 'tat-ca' || $segment == '') ? 'orderMenuShortActive' : ''?>"
            href="<?=base_url($preUri . '/danh-sach-don-hang/tat-ca');?>">
            <?=lang('Label.stt_tatCa')?>
            <span class="span-detail-list colorPurple">
                <?=(!empty($dataTotalOrder) && isset($dataTotalOrder[0]) ? $dataTotalOrder[0] : '0')?></span>
        </a>
        <a class="col-lg-2 col-md-2 col-sm-4 col-6 orderMenuShort <?=($segment == 'cho-duyet') ? 'orderMenuShortActive' : ''?>"
            href="<?=base_url($preUri . '/danh-sach-don-hang/cho-duyet');?>">
            <?=lang('Label.stt_choDuyet')?>
            <span class="span-detail-list colorPurple">
                <?=(!empty($dataTotalOrder) && isset($dataTotalOrder[900]) ? $dataTotalOrder[900] : '0')?></span>
        </a>
        <a class="col-lg-2 col-md-2 col-sm-4 col-6 orderMenuShort <?=($segment == 'cho-lay') ? 'orderMenuShortActive' : ''?>"
            href="<?=base_url($preUri . '/danh-sach-don-hang/cho-lay');?>">
            <?=lang('Label.stt_choLay')?>
            <span class="span-detail-list colorPurple">
                <?=(!empty($dataTotalOrder) && isset($dataTotalOrder[100]) ? $dataTotalOrder[100] : '0')?></span>
        </a>
        <a class="col-lg-2 col-md-2 col-sm-4 col-6 orderMenuShort <?=($segment == 'lay-that-bai') ? 'orderMenuShortActive' : ''?>"
            href="<?=base_url($preUri . '/danh-sach-don-hang/lay-that-bai');?>">
            <?=lang('Label.stt_layThatBai')?> <span class="span-detail-list colorPurple">
                <?=(!empty($dataTotalOrder) && isset($dataTotalOrder[102]) ? $dataTotalOrder[102] : '0')?></span>
        </a>
        <a class="col-lg-2 col-md-2 col-sm-4 col-6 orderMenuShort <?=($segment == 'luu-kho') ? 'orderMenuShortActive' : ''?>"
            href="<?=base_url($preUri . '/danh-sach-don-hang/luu-kho');?>">
            <?=lang('Label.stt_luuKho')?> <span class="span-detail-list colorPurple">
                <?=(!empty($dataTotalOrder) && isset($dataTotalOrder[200]) ? $dataTotalOrder[200] : '0')?></span>
        </a>
        <a class="col-lg-2 col-md-2 col-sm-4 col-6 orderMenuShort <?=($segment == 'dang-giao') ? 'orderMenuShortActive' : ''?>"
            href="<?=base_url($preUri . '/danh-sach-don-hang/dang-giao');?>">
            <?=lang('Label.stt_dangGiao')?> <span class="span-detail-list colorPurple">
                <?=(!empty($dataTotalOrder) && isset($dataTotalOrder[500]) ? $dataTotalOrder[500] : '0')?></span>
        </a>
    </div>
    <!-- Dòng 2 -->
    <div class="row mg0 listOders-hover-menu">
        <a class="col-lg-2 col-md-2 col-sm-4 col-6 orderMenuShort <?=($segment == 'giao-that-bai') ? 'orderMenuShortActive' : ''?>"
            href="<?=base_url($preUri . '/danh-sach-don-hang/giao-that-bai');?>">
            <?=lang('Label.stt_giaoThatBai')?>
            <span class="span-detail-list colorPurple">
                <?=(!empty($dataTotalOrder) && isset($dataTotalOrder[511]) ? $dataTotalOrder[511] : '0')?></span>
        </a>
        <a class="col-lg-2 col-md-2 col-sm-4 col-6 orderMenuShort <?=($segment == 'cho-hoan') ? 'orderMenuShortActive' : ''?>"
            href="<?=base_url($preUri . '/danh-sach-don-hang/cho-hoan');?>">
            <?=lang('Label.stt_choHoan')?>
            <span class="span-detail-list colorPurple">
                <?=(!empty($dataTotalOrder) && isset($dataTotalOrder[505]) ? $dataTotalOrder[505] : '0')?></span>
        </a>
        <a class="col-lg-2 col-md-2 col-sm-4 col-6 orderMenuShort <?=($segment == 'giao-thanh-cong') ? 'orderMenuShortActive' : ''?>"
            href="<?=base_url($preUri . '/danh-sach-don-hang/giao-thanh-cong');?>">
            <?=lang('Label.stt_giaoThanhCong')?>
            <span class="span-detail-list colorPurple">
                <?=(!empty($dataTotalOrder) && isset($dataTotalOrder[501]) ? $dataTotalOrder[501] : '0')?></span>
        </a>
        <a class="col-lg-2 col-md-2 col-sm-4 col-6 orderMenuShort <?=($segment == 'dang-hoan') ? 'orderMenuShortActive' : ''?>"
            href="<?=base_url($preUri . '/danh-sach-don-hang/dang-hoan');?>">
            <?=lang('Label.stt_dangHoan')?>
            <span class="span-detail-list colorPurple">
                <?=(!empty($dataTotalOrder) && isset($dataTotalOrder[502]) ? $dataTotalOrder[502] : '0')?></span>
        </a>
        <a class="col-lg-2 col-md-2 col-sm-4 col-6 orderMenuShort <?=($segment == 'hoan-that-bai') ? 'orderMenuShortActive' : ''?>"
            href="<?=base_url($preUri . '/danh-sach-don-hang/hoan-that-bai');?>">
            <?=lang('Label.stt_hoanThatBai')?>
            <span class="span-detail-list colorPurple">
                <?=(!empty($dataTotalOrder) && isset($dataTotalOrder[905]) ? $dataTotalOrder[905] : '0')?></span>
        </a>
        <a class="col-lg-2 col-md-2 col-sm-4 col-6 orderMenuShort <?=($segment == 'da-hoan') ? 'orderMenuShortActive' : ''?>"
            href="<?=base_url($preUri . '/danh-sach-don-hang/da-hoan');?>">
            <?=lang('Label.stt_daHoan')?>
            <span class="span-detail-list colorPurple">
                <?=(!empty($dataTotalOrder) && isset($dataTotalOrder[504]) ? $dataTotalOrder[504] : '0')?></span>
        </a>
    </div>
    <!-- Dòng 3 -->
    <div class="row mg0">
        <a class="col-lg-2 col-md-2 col-sm-4 col-6 orderMenuShort <?=($segment == 'co-van-de') ? 'orderMenuShortActive' : ''?>"
            href="<?=base_url($preUri . '/danh-sach-don-hang/co-van-de');?>">
            <?=lang('Label.stt_coVanDe')?> <span class="span-detail-list colorPurple">
                <?=(!empty($dataTotalOrder) && isset($dataTotalOrder[2006]) ? $dataTotalOrder[2006] : '0')?></span>
        </a>
        <a class="col-lg-2 col-md-2 col-sm-4 col-6 orderMenuShort <?=($segment == 'cho-huy') ? 'orderMenuShortActive' : ''?>"
            href="<?=base_url($preUri . '/danh-sach-don-hang/cho-huy');?>">
            <?=lang('Label.stt_choHuy')?> <span class="span-detail-list colorPurple">
                <?=(!empty($dataTotalOrder) && isset($dataTotalOrder[901]) ? $dataTotalOrder[901] : '0')?></span>
        </a>
        <a class="col-lg-2 col-md-2 col-sm-4 col-6 orderMenuShort <?=($segment == 'huy') ? 'orderMenuShortActive' : ''?>"
            href="<?=base_url($preUri . '/danh-sach-don-hang/huy');?>">
            <?=lang('Label.stt_huy')?> <span class="span-detail-list colorPurple">
                <?=(!empty($dataTotalOrder) && isset($dataTotalOrder[924]) ? $dataTotalOrder[924] : '0')?></span>
        </a>
        <a class="col-lg-2 col-md-2 col-sm-4 col-6 orderMenuShort <?=($segment == 'sai-can-nang') ? 'orderMenuShortActive' : ''?>"
            href="<?=base_url($preUri . '/danh-sach-don-hang/sai-can-nang');?>">
            <?=lang('Label.stt_saiCanNang')?> <span class="span-detail-list colorPurple">
                <?=(!empty($dataTotalOrder) && isset($dataTotalOrder[923]) ? $dataTotalOrder[923] : '0')?></span>
        </a>
        <a class="col-lg-2 col-md-2 col-sm-4 col-6 orderMenuShort">
           
        </a>
        <!-- <a class="col-lg-2 col-md-2 col-sm-4 col-6 orderMenuShort <?php // ($segment == 'luu-nhap') ? 'orderMenuShortActive' : '' ?>"
      href="<?php // base_url($preUri.'/danh-sach-don-hang/luu-nhap'); ?>">
      <?php // lang('Label.stt_luuNhap') ?> <span class="span-detail-list colorPurple"> 0</span>
    </a> -->
        <div class="col-lg-2 col-md-2 col-sm-4 col-6 lstOrder-btn-default orderMenuShort lstOrder-btn-showFilter"
            onclick="hideMenuFilter()">
            <span class="colorPurple"> <?=lang('Label.stt_thuGon')?> </span>
             <img src="<?php echo base_url('public/images/iconDownL.svg'); ?>"
                class="float-right pt-1 pr-2">
        </div>
    </div>
</div>

<?php } ?>
<!--=============== END Menu  =====================-->
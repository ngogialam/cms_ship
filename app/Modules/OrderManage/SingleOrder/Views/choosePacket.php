<section id="orders" class="">
    <div class="warehouse-banner-title row">
        <ul class="col-xl-3 col-12 mb-0">
            <li>
                <img src="<?php echo base_url('public/images/Home.png');?>">
            </li>
            <li class="mt2-config title-page">
                ><span> <?= lang('Label.lbl_order') ?> </span>> <span><?php echo $title ?></span>
            </li>
        </ul>
        <div class="col-xl-6 col-12 row steps-order">
            <div class="col-sm-4">
                <ul class="or-banner ">
                    <li>
                        1
                    </li>
                    <li class="or-cgc-1">
                        <?= lang('Label.lbl_choosePackage') ?>
                    </li>
                </ul>
            </div>
            <div class="col-sm-4">
                <ul class="or-banner1 ">
                    <li style="line-height: 17px;">
                        2
                    </li>
                    <li class="or-cgc-1" style="line-height: 21px;">
                        <?= lang('Label.lbl_setInfo') ?>
                    </li>
                </ul>
            </div>
            <div class="col-sm-4">
                <ul class="or-banner1 ">
                    <li style="line-height: 17px;">
                        3
                    </li>
                    <li class="or-cgc-1" style="line-height: 21px;">
                        <?= lang('Label.lbl_confirmOrder') ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="orders-body row " style="margin-top: 11px!important;">
        <?php //if($onPackage == 1 ){  ?>
        <div class="col-md-6 cgc-home-left">
            <ul style="height: 28px;">
                <li>
                    <?= lang('Label.lbl_orderKM') ?>
                </li>
            </ul>
            <?php 
              if(!empty($listPackageKm)){ 
                foreach($listPackageKm as $postageKm): 
                ?>
                <ul class="orders-bd-tt choosePostage" packageType="<?= $postageKm->type ?>"
                packageCode="<?= $postageKm->code ?>" packageName="<?= $postageKm->name ?>">
                <li>
                    <ul class="orders-bd-tt1">
                        <li>
                            <img src="<?php echo base_url('public/images/tdl-bd.png');?>" alt="">
                        </li>
                    </ul>
                    <ul class="orders-bd-tt2">
                        <li>
                            <?= $postageKm->name; ?>
                        </li>
                        <li>
                            <?= lang('Label.lbl_sapoPackage') . $postageKm->time . 'H'; ?>
                        </li>
                    </ul>
                    <ul class="orders-bd-tt3">
                        <li>
                            <img src="<?php echo base_url('public/images/info.png');?>" alt="" data-toggle="modal"
                                data-target="#exampleModal">
                        </li>
                    </ul>
                </li>
                <input type="hidden" class="postageCode" name="postageCode" value="<?= $postageKm->code ?>">
            </ul>
            <?php  endforeach; } ?>

        </div>
        <?php //} ?>
        <div class="col-md-6 cgc-home-right">
            <ul style="height: 28px;">
                <li>
                    <?= lang('Label.lbl_orderSamePrice') ?>
                </li>
            </ul>
            <?php 
              if(!empty($listPackageSp)){ 
                foreach($listPackageSp as $postageSp): 
                if(in_array($dataUser->username,$dataAccountTest) && in_array($postageSp->code,$dataPackCodeTest) ){
                    //package test
                ?>
            <ul class="orders-bd-tt choosePostage" packageType="<?= $postageSp->type ?>"
                packageCode="<?= $postageSp->code ?>" packageName="<?= $postageSp->name ?>">
                <li>
                    <ul class="orders-bd-tt1">
                        <li>
                            <img src="<?php echo base_url('public/images/tdl-bd.png');?>" alt="">
                        </li>
                    </ul>
                    <ul class="orders-bd-tt2 orders-bd-tt-detail">
                        <li>
                            <?= $postageSp->name; ?>
                        </li>
                        <!-- <li><?php //echo lang('Label.lbl_sapoPackage') . $postageSp->time . 'H'; ?></li> -->
                    </ul>
                    <ul class="orders-bd-tt3">
                        <li>
                            <img src="<?php echo base_url('public/images/info.png');?>" alt="" data-toggle="modal"
                                data-target="#exampleModal">
                        </li>
                    </ul>
                </li>
            </ul>
            <?php }
                if(!in_array($postageSp->code,$dataPackCodeTest)){
            ?>
            <ul class="orders-bd-tt choosePostage" packageType="<?= $postageSp->type ?>"
                packageCode="<?= $postageSp->code ?>" packageName="<?= $postageSp->name ?>">
                <li>
                    <ul class="orders-bd-tt1">
                        <li>
                            <img src="<?php echo base_url('public/images/tdl-bd.png');?>" alt="">
                        </li>
                    </ul>
                    <ul class="orders-bd-tt2 orders-bd-tt-detail">
                        <li>
                            <?= $postageSp->name; ?>
                        </li>
                        <!-- <li><?php //echo lang('Label.lbl_sapoPackage') . $postageSp->time . 'H'; ?></li> -->
                    </ul>
                    <ul class="orders-bd-tt3">
                        <li>
                            <img src="<?php echo base_url('public/images/info.png');?>" alt="" data-toggle="modal"
                                data-target="#exampleModal">
                        </li>
                    </ul>
                </li>
            </ul>
            <?php } endforeach; } ?>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Th??ng tin g??i c?????c ?????ng gi??</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Giao h??ng n???i th??nh trong 1 gi???<br>
                            B???ng gi??<br>
                            Th???i gian: t???i ??a 1 gi??? (??p d???ng v???i ????n h??ng d?????i 6 km) <br>
                            S??? ??i???m giao h??ng t???i ??a: 5 <br>
                            Ph?? m???i ??i???m giao th??m: 5,000?? <br>
                            Ph?? qu??ng ???????ng: <br>
                            - 4 km ?????u: 23,000?? <br>
                            - Tr??n 4 km: 5,000??/km <br>
                            M???c COD t???i ??a: 10,000,000?? <br>
                            Ph?? COD: <br>
                            - COD < 2,000,000??: mi???n ph?? <br>
                                - COD >= 2,000,000??: 0.8% x Gi?? tr??? COD <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="or-btn-modal">Ch???n</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
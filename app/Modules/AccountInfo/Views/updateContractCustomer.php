<script src="<?php echo base_url('public/assets/js/cropImage.js') ?>"></script>
<link rel="stylesheet" href="<?= base_url('public/assets/css/cropImage.css') ?>">
<section id="connectbank" class="mr-4 acc-info-detail">
    <!-- banner tài khoản -->
    <section id="info-bn">
        <div class="link-user">
            <ul>
                <li>
                    <img src="<?php echo base_url('public/images/Home.png'); ?>" alt="">
                </li>
                <li class="mt-1">
                    > <b><?= lang('Label.lbl_basicInformation') ?></b> >
                    </a><span> <?= $title ?> </span>
                </li>
            </ul>
        </div>
        <div class="info-banner mr-0" style="background-image: url('<?php echo base_url('public/images/bannerUser.png'); ?>');    ">
            <ul>
                <?php //echo base_url('public/assets/images/ava.png');
                ?>
                <li style="cursor: pointer;" onclick="clickAddImage()">
                    <img src="<?= ($dataUser->avatar) ? $dataUser->avatar : base_url('public/assets/images/ava.png') ?>" alt="" style="width: 80px; height: 80px; border-radius: 50%;" id="photo">
                    <input type="file" style="display: none;" id="imageFile" onchange="uploadImage()">
                    <img src="<?php echo base_url('public/assets/images/ava.png'); ?>" id="preview" alt="" class="d-none">
                    <img src="<?= base_url('public/images/iconCamera.png'); ?>" alt="" style="margin-top: 55px;margin-left:-30px;">
                    <input type="text" value="<?= ($userLogin) ? $userLogin : '' ?>" id="userLogin" class="d-none">
                </li>
            </ul>
        </div>
    </section>

    <form action="" class="form-100 edit-account-info" id="form-user-info" method="POST" enctype="multipart/form-data">
        <section id="info-detail" class="row w-100 signature-detail">
            <div class="col-12 title-signature">
                <h3>Ký xác nhận để hoàn thành hợp đồng </h3>
            </div>
            <?php
            $checkNoti = get_cookie('__updateContract');
            $checkNoti = explode('^_^', $checkNoti);
            // setcookie("__updateContract", '', time() + (60));
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
                        if (!empty($checkNoti[1])) {
                            echo $checkNoti[1];
                        } else {
                            echo lang('Label.lbl_updateSuccess');
                        }
                    } else if ($checkNoti[0] == 'false') {
                        if (!empty($checkNoti[1])) {
                            echo $checkNoti[1];
                            // echo lang('Label.err_'.$checkNoti[1]);
                        } else {
                            echo lang('Label.lbl_updateFalse');
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="info-detail-1 col-md-4 p-0 signature-image-left">
                <div class=" pb30">
                    <div class="img-signature pt-2 pb-2">
                        <span>Chọn khách hàng</span>
                    </div>
                    <div>
                        <select name="userIdContract" placeholder="Chọn khách hàng" id="userIdContract" class="chosen-select pr10 w100 userIdContract">
                            <option value="0">Chọn khách hàng</option>
                            <?php
                            if (!empty($dataListUser)) :
                                foreach ($dataListUser as $itemUser) :
                            ?>
                                    <option value="<?php echo $itemUser->userId ?>"><?= $itemUser->owner . '-' . $itemUser->phone ?></option>
                            <?php endforeach;
                            endif; ?>
                        </select>
                        <span class=" err_messages errUserIdContract"></span>
                    </div>
                </div>

                <div class="h-100 pb30">
                    <div class="img-signature pt-2 pb-2">
                        <span>Tải ảnh chữ ký</span>
                    </div>
                    <div class="img-signature-2">
                        <label for="imgSignature">
                            <img for="imgSignature" class="imgSignaturePreview " style="width:80px;" src="<?= base_url('public/images/add-img-signature.svg'); ?>" data-typeImg="1" alt="">
                        </label>
                        <input type="hidden" class="typeImage" value="">

                        <input type="file" name="imgSignature" class="imgDefault imgSignature" onchange="loadFile(event,'imgSignatureImg','err_imgSignatureErr',1)" id="imgSignature" />
                        <p class="err_messagesp err_imgSignatureErr"> <?php echo $getErrors['imgSignature'] ?>

                            <input type="hidden" name="imgSignatureValue" class="imgSignatureValue" value="">
                            <input type="hidden" class="imgSignaturePath" name="imgSignaturePath" value="">
                            <input type="hidden" class="imgSignatureType" name="imgSignatureType" value="0">
                        </p>
                    </div>
                    <div class=" pt-2 pb-2">
                        </br>
                        <span class="purpleColor" style="margin-top: 15px;">
                            Lưu ý:
                        </span>
                        </br>
                        <span class="purpleColor">
                            - Vui lòng chụp chữ ký với nền trắng.
                        </span>
                        </br>
                        <span class="purpleColor">
                            - Chọn cắt ảnh trước khi ấn hoàn thành.
                        </span>
                    </div>
                    <div id="result">

                    </div>
                </div>
            </div>
            <div class="info-detail-1 col-md-8 pr-0">
                <div class="pb30">
                    <div class="img-signature pt-2 pb-2">
                        <span>Cắt chữ ký</span>
                    </div>
                    <div class="img-signature-2">

                        <div class="w-100 btn-signature">
                            <button type="button" class="btn-signature-xn btnCrop" value="Crop">
                                <span class="docs-tooltip" data-toggle="tooltip" title="">
                                    Cắt ảnh
                                </span>
                            </button>
                            <button type="button" class="btn-signature-xn btnZoomIn" title="Phóng to">
                                <span class="fa fa-search-plus"></span>
                                </span>
                            </button>
                            <button type="button" class="btn-signature-xn btnZoomOut" title="Thu nhỏ">
                                <span class="fa fa-search-minus"></span>
                                </span>
                            </button>
                            <button type="button" id="btnReset" class="btn-signature-kl" onclick="resetImg()">Ký lại</button>
                        </div>
                        <div style="margin-top:15px">
                            <canvas id="canvas" style="width:50%">
                                Your browser does not support the HTML5 canvas element.
                            </canvas>
                        </div>

                        <div class="w-100 btn-signature">
                            <button type="button" class="btn-signature-xn btnCrop" value="Crop">
                                <span class="docs-tooltip" data-toggle="tooltip" title="">
                                    Cắt ảnh
                                </span>
                            </button>
                            <button type="button" class="btn-signature-xn btnZoomIn" title="Phóng to">
                                <span class="fa fa-search-plus"></span>
                                </span>
                            </button>
                            <button type="button" class="btn-signature-xn btnZoomOut" title="Thu nhỏ">
                                <span class="fa fa-search-minus"></span>
                                </span>
                            </button>
                            <button type="button" id="btnReset" class="btn-signature-kl" onclick="resetImg()">Ký lại</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-submit-signature text-center col-12">
                <button style="margin:0 auto; margin-top:15px;" type="button" class="form-control frm-lg info-button btnUpdateContract" disabled>Hoàn thành</button>
            </div>
        </section>
    </form>
    <section>

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
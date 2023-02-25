<section id="warehouse" class="h-100">
    <div class="warehouse-banner-title notifacation-wrapper">
        <ul class="pl-0">
            <li>
                <img src="<?php echo base_url('public/images/Home.png');?>" alt="">
            </li>
            <li class="mt-1">
                ><b> <?= lang('Label.lbl_securitySetting'); ?> </b> > <span><?php echo $title ?></span>
            </li>
        </ul>

        <?php 
            $checkNoti = get_cookie('__update');
            $checkNoti = explode('^_^', $checkNoti);
            setcookie ("__update",'',time()+ (1) , '/');
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
                        }else {
                            echo lang('Label.lbl_updateFalse');
                        }
                    } 
                ?>
            </div>
        </div>
    </div>
    <form action="" id="form-search-user" method="POST" enctype="multipart/form-data" class="h-100">
        <div class="us-doimk">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <div class="change-pass-input">
                            <input class=" form-control frm-lg " id="password" autocomplete="off" name="currentPassword"
                                value="<?php echo $listValues['currentPassword']; ?>"
                                data-msg="<?= lang('Label.lbl_checkChars') ?>"
                                placeholder="<?= lang('Label.lbl_currentPassword') ?>" type="password"
                                onblur="validate('password')" >
                            <span toggle="#password-field" class="fa fa-fw field-icon-eye toggle-password toggle-password-1 fa-eye"
                                onclick="showPass('password','toggle-password-1')" ></span>
                            <span class="changePass-err err_password password"><?php echo $getErrors['currentPassword']; ?></span>
                        </div>

                        <div class="change-pass-input">
                            <input class="form-control frm-lg" id="validatePassNew" autocomplete="off"
                                value="<?php echo $listValues['newPassword']; ?>"
                                data-msg="<?= lang('Label.lbl_checkChars') ?>"
                                placeholder="<?= lang('Label.lbl_newPassword') ?>" name="newPassword" type="password"
                                onblur="validate('validatePassNew')" onchange="checkPass('validatePassNew')">
                            <span toggle="#password-field" class="fa fa-fw field-icon-eye toggle-password toggle-password-2 fa-eye"
                                onclick="showPass('validatePassNew','toggle-password-2')"></span>
                            <span
                                class="changePass-err err_password validatePassNew"><?php echo $getErrors['newPassword']; ?></span>
                        </div>

                        <div class="change-pass-input">
                            <input class="form-control frm-lg pass_log_id" id="repassword"
                                value="<?php echo $listValues['reNewPassword']; ?>"
                                data-msg="<?= lang('Label.lbl_checkChars') ?>"
                                placeholder="<?= lang('Label.lbl_reNewPassword') ?>" name="reNewPassword" type="password"
                                onblur="validate('repassword')" onchange="checkRePass('repassword')">
                            <span toggle="#password-field" class="fa fa-fw field-icon-eye toggle-password toggle-password-3 fa-eye"
                                onclick="showPass('repassword','toggle-password-3')"></span>
                            <span
                                class="changePass-err err_password err_repassword repassword"><?php echo $getErrors['repassword']; ?></span>
                        </div>
                        <div class="btn-changePass">
                            <button type="submit"><?= lang('Label.lbl_update') ?></button>
                        </div>
                        <div class="col-md-2">
                        </div>
                    </div>
                </div>
            </div>
    </form>
</section>
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
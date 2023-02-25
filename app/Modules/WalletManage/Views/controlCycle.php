<section id="warehouse" class="h-100">
    <div class="warehouse-banner-title notifacation-wrapper">
        <ul class="pl-0">
            <li>
                <img src="<?php echo base_url('public/images/Home.png');?>" alt="">
            </li>
            <li class="mt-1">
                ><b> <?= lang('Label.lbl_wallet'); ?> </b> > <span><?php echo $title ?></span>
            </li>
        </ul>

        <?php 
            $checkNoti = get_cookie('__updateCycle');
            $checkNoti = explode('^_^', $checkNoti);
            setcookie ("__updateCycle",'',time()+ (1) , '/');
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
    <form action="" id="form-search-user" method="POST" class="h-100">
        <div class="us-doimk">
            <div class="container">

                <div class="form-group row pdn controlCycleWrap">
                    <label for="newsTitle" class="col-sm-3 col-form-label"> <?php echo lang('Label.lbl_controlCycle') ?>
                        <span style="color: red">(*)</span></label>
                    <div class="col-sm-9">
                        <select name="controlCycle" id="controlCycle" class="chosen-select w100 controlCycle"
                            style="padding-left: 4%;">
                            <option value="0">
                                <?php echo lang('Label.lbl_controlCycle') ?></option>
                            <?php foreach($arrCross as $keyCross => $cross): ?>
                            <option <?php echo ($userControl == $keyCross ) ? 'selected' : '' ?>
                                value="<?php echo $keyCross ?>"><?php echo $cross; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span
                            class="changePass-err err_password password"><?php echo $getErrors['controlCycle']; ?></span>
                        <div class="btn-changePass" style="margin-top:20px">
                            <button type="submit"><?= lang('Label.lbl_update') ?></button>
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
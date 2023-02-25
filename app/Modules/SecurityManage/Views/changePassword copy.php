<section id="warehouse">
    <div class="warehouse-banner-title">
        <ul>
            <li>
                <img src="<?php echo base_url('public/images/Home.png');?>" alt="">
            </li>
            <li class="mt2-config title-page">
                <a href="<?php echo base_url('/trang-ca-nhan');?>" >
                 > <span> Tài khoản  </span> >
                </a><span><?php echo $title ?></span>
            </li>
        </ul>
    </div>
    <div class="us-doimk">
        <ul>
            <form action="" id="form-search-user" method="POST" enctype="multipart/form-data">
                <li>
                    <input type="text" name="currentPasswodd" placeholder="<?= lang('Label.lbl_currentPassword'); ?>">
                </li>
                <li>
                    <input type="text" name="newPassword" placeholder="<?= lang('Label.lbl_newPassword'); ?>">
                </li>
                <li>
                    <input type="text" name="reNewPassword" placeholder="<?= lang('Label.lbl_reNewPassword'); ?>">
                </li>
                <li>
                    <button type="submit"><?= lang('Label.lbl_update') ?></button>
                </li>
            </form>
        </ul>
    </div>
</section>
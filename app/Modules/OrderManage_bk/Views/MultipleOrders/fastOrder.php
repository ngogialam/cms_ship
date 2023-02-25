<!-- ===========BANNER========== -->
<section id="orders">
    <div class="warehouse-banner-title">
        <ul>
            <li>
                <img src="<?php echo base_url('public/images/Home.png');?>" alt="">
            </li>
            <li class="mt2-config title-page">
               > <span> Tài khoản </span> ><span><?php echo $title ?></span>
            </li>
        </ul>
    </div>
    <div class="orders-title row">
        <div class=" col-md-3 col-sm-12 p-0 pl-1 or-tdl-txt">
            <?php echo $title ?>
        </div>
        <div class=" col-md-2 col-sm-4 p-0 pl-1">
            <ul class="or-banner">
                <li>
                    1
                </li>
                <li class="or-cgc-1">
                    Upload file
                </li>
            </ul>
        </div>
        <div class=" col-md-2 col-sm-4 p-0 pl-1">
            <ul class="or-banner1">
                <li>
                    2
                </li>
                <li class="or-cgc-1">
                    Nhập thông tin
                </li>
            </ul>
        </div>
        <div class="col-md-2 col-sm-4 p-0 pl-1">
            <ul class="or-banner1">
                <li>
                    3
                </li>
                <li class="or-cgc-1">
                    Xác nhận
                </li>
            </ul>
        </div>
        <div class=" col-md-3 col-sm-12 or-btn">
            <button>
                Tạo đơn nhanh <img src="<?php echo base_url('public/images/tdl-bd3.png');?>" alt="">
            </button>
        </div>
    </div>
</section>
<!-- ===========END BANNER====== -->

<section id="quick-orders" style="height: 78%;">
    <div class="qo-ttng row">
        <ul class="row col-sm-12" style="margin-bottom: 0px;     padding-right: 0px;">
            <li class="col-sm-10 qo-ttng-2">
                <b>Thông tin người gửi</b>
            </li>
            <li class="col-sm-2">
                <input list="chon-kh" name="chon-kh" placeholder="Chọn kho hàng" class="qo-ckh">
                <datalist id="chon-kh">
                    <option value="Tòa nhà Petro Việt Nam" style="width: 10px;"> Láng Hạ, Thành Công, Ba Đình, Hà Nội
                    </option>
                    <option value="Tòa nhà Petroland"> 12 Tân Trào, Tân Phú, Quận 7, Tp Hồ Chí Minh</option>
                </datalist>
            </li>
        </ul>
        <ul class="col-sm-5 qo-dcng">
            <li>
                <img src="<?php echo base_url('public/images/qo-img-1.png');?>" alt="">   Minshoes Hoàng Cầu
            </li>
            <li>
                <img src="<?php echo base_url('public/images/manager.png');?>" alt="">   Hoàng Thanh Giang
            </li>
        </ul>
        <ul class="col-sm-7 qo-dcng">
            <li>
                <img src="<?php echo base_url('public/images/phone.png');?>" alt="">  0912 333 444
            </li>
            <li>
                <img src="<?php echo base_url('public/images/place.png');?>" alt="">  Tòa nhà PeakView, 36 Hoàng Cầu, Ô Chợ Dừa, Đống Đa, Hà Nội
            </li>
        </ul>
    </div>
    <div class="qo-choose-file" >
        <ul class="row" style="width: 101.7%;">
            <li class="col-sm-6 qo-ttng-2 ">
                <b> Chọn file đơn hàng</b>
            </li>
            <li class="col-sm-6 qo-choose-file-1" >
                Tải file mẫu đơn <img src="<?php echo base_url('public/images/Download.png');?>" alt="">
            </li>
        </ul>
        <ul class="row">
            <li class="col-sm-10">
                <input type="file" id="chooseFile" class="d-none" onchange="change()">

                <span onclick="chooseFile()">
                    <input type="text" placeholder="Chọn file định dạng .xls hoặc .xlsx" id="chooseFileOK" value="" readonly>
                </span>
            </li>
            <li class="col-sm-2">
                <button> Upload file</button>
            </li>
        </ul>

</section>
<script>
    function chooseFile(){
        document.getElementById("chooseFile").click();
    }
    function change(e){
        const image = event.target.files[0];
        document.getElementById('chooseFileOK').value = event.target.files[0].name
        const reader = new FileReader();
        reader.readAsDataURL(image);
        reader.onload = (e) => {
        this.avatarDefault = e.target.result;
      };
    }

    
</script>
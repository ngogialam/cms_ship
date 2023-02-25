<footer class="footer">
  <div class="footer-wrap">
    <div class="w-100 clearfix">
      <span class="d-block text-center text-sm-left d-sm-inline-block ftlink">Copyright © 2021 <a
          href="https://holaship.vn/vi/lien-he" target="_blank">HolaShip</a>, All rights reserved.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a href="#">Điều khoản & Quy
          định</a></span>
    </div>
  </div>
</footer>


<div class="modal fade" id="modalCallVA" role="dialog">
    <div class="modal-dialog">
    </div>
</div>

<?php if(empty($auth)){ ?> 
<script>
    $.ajax({
    url: '/checkVA',
    type: 'post',
    dataType: 'json',
    data: {},
    success: function(res) {
        console.log(res)
        if (res.success) {
            $("#modalCallVA").html(res.html);
        } else {
            console.log("err");
            console.log(res)
        }

    },
    error: function() {}
});
</script>
<?php }?>

<!-- endinject -->
<!-- End custom js for this page -->

<script src="<?php echo base_url('public/assets/js/hoverable-collapse.js') ?>"></script>
<script src="<?php echo base_url('public/assets/js/misc.js') ?>"></script>

<script src="<?php echo base_url('public/assets/js/dashboard.js') ?>"></script>
<script src="<?php echo base_url('public/assets/js/todolist.js') ?>"></script>
<script src="<?php echo base_url('public/assets/js/off-canvas.js') ?>"></script>
<script src="<?php echo base_url('public/assets/js/vendor.bundle.base.js') ?>"></script>
<script src="<?php echo base_url('public/assets/js/chart.js') ?>"></script>

<script src="<?php echo base_url('public/assets/js/jquery.datetimepicker.full.min.js') ?>"></script>
<script src="<?=base_url('public/assets/chosen/chosen.jquery.js') ?>"></script>
<script src="<?=base_url('public/assets/chosen/docsupport/init.js'); ?>"></script>

<script src="<?php echo base_url('public/assets/js/mainAfter.js?v='.microtime(true).''); ?>"></script>
<script src="<?php echo base_url('public/assets/js/mainjs.js?v='.microtime(true).''); ?>"></script>
<script src="<?php echo base_url('public/assets/js/orderjs.js?v='.microtime(true).''); ?>"></script>
<script src="<?php echo base_url('public/assets/js/fastOrder.js?v='.microtime(true).''); ?>"></script>
<script src="<?php echo base_url('public/assets/js/listOrder.js?v='.microtime(true).''); ?>"></script>
<script src="<?php echo base_url('public/assets/js/orderSingle.js?v='.microtime(true).''); ?>"></script>
<script src="<?php echo base_url('public/assets/js/orderKm.js?v='.microtime(true).''); ?>"></script>
<script src="<?php echo base_url('public/assets/js/loading_circle.js?v='.microtime(true).''); ?>"></script>

<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-storage.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-analytics.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script src="<?php echo base_url('public/js/uploadImg.js?v='.microtime(true).''); ?>"></script>
<script src="<?php echo base_url('public/js/loader.js?v='.microtime(true)) ?>"></script>

<!-- Check tài khoản thụ hường ngân hàng -->
<?php 
    // numberAccountBank
    if($_SESSION['numberAccountBank'] != ''){
    $numberAccountBank = $_SESSION['numberAccountBank'];
?>
<script>

$(document).ready(function() {
  let numberOfAccountBank =
    $("#owl-partners-introduce2").owlCarousel({
      rtl: false,
      loop: true,
      stagePadding: 10,
      margin: 48,
      autoplay: false,
      smartSpeed: 200,
      autoplaySpeed: 1500,
      autoplayHoverPause: true,
      nav: false,
      dots: false,
      responsive: {
        200: {
          items: 1
        },
        400: {
          items: 1
        },

        753: {
          items: 2
        },
        991: {
          items: 2
        },
        1200: {
          items: 2
        },
        1500: {
          items: 3
        }
      }
    })
});
</script>
<?php 
    }else{
        $numberAccountBank = 0;
    }
?>

<script>
AOS.init();
</script>
</body>

</html>
<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/css/stisla-master/assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>assets/css/stisla-master/third_party/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/css/stisla-master/third_party/summernote-master/dist/summernote-bs4.js"></script>

<!-- Template JS File -->
<script src="<?php echo base_url(); ?>assets/css/stisla-master/assets/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>assets/css/stisla-master/assets/js/custom.js"></script>

<!-- Page Specific JS File -->
<!-- <script src="<?php echo base_url(); ?>assets/css/stisla-master/assets/js/page/components-chat-box.js"></script> -->

<script>
  $(document).ready(function(){
  $(window).scroll(function () {
      if ($(this).scrollTop() > 50) {
        $('#back-to-top').fadeIn();
      } else {
        $('#back-to-top').fadeOut();
      }
    });
    // scroll body to 0px on click
    $('#back-to-top').click(function () {
      $('body,html').animate({
        scrollTop: 0
      }, 1000);
      return false;
    });
});
</script>
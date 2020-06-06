<!DOCTYPE html>
<html lang="en">

<!-- Header -->
<?php $this->load->view('header'); ?>

<body>
  <div id="app">
    <div class="main-wrapper">

      <!-- Navbar -->
      <div class="navbar-bg "></div>
      <?php $this->load->view('navbar'); ?>

      <!-- Sidebar -->
      <?php $this->load->view('sidebar'); ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">

          <div class="card card-primary">
            <div class="row">
              <div class="card-header col-12">
                <div class="col-lg-6 col-md-12">
                  <h4 class="mr-2">Tweet</h4>
                </div>
                <div class="col-lg-6 col-md-12 ">
                  <div id="card-header-form ">
                    <input type="text" name="search" id="search" class="form-control col-lg-6 col-md-12 float-right" placeholder="Search">
                  </div> 
                </div>
              </div>
            </div>
          </div>
          <div class="section-body">
            <div class="row" id="tweet-body">
              <div id="tweet-post"></div>
              <div class="col-12">
                <div id="paging-tweet"></div>
              </div>
            </div>
          </div>
          <button class="btn btn-primary floating-button" onClick="formTweet()">
            <i class="fa fa-paper-plane fa-2x"></i>
          </button>
        </section>
      </div>

      <!-- Footer -->
      <?php 
      $this->load->view('footer'); 
      $this->load->view('tweet/modal_tweet');
      ?>
    </div>
  </div>

  <!-- JS Script -->
  <?php $this->load->view('js-script'); ?>
  <script>
    var base_url = '<?php echo base_url(); ?>';
  </script>
  <script>
    $('.summernote-simple').summernote({
      placeholder: "What's happening?",
      // height: 100,
      toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['view', ['fullscreen', 'codeview']]
      ]
    });

  </script>
  <script src="<?php echo base_url(); ?>plugins/jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/toastr-master/build/toastr.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/clipboard-js/dist/clipboard.min.js"></script>
  <script src="<?php echo base_url(); ?>js/tweet/timeline_tweet.js?v=1.0.2" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>js/tweet/send_tweet.js?v=1.0.6" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>js/tweet/copy_tweet.js?v=1.0.1" type="text/javascript"></script>
</body>
</html>
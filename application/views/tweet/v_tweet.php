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
          <div class="section-header">
            <h1>Tweet</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Tweet & Activities</h2>  
            <div class="row">
              <div class="col-12">
                <div class="activities">
                  <div class="activity">
                    <img src="<?php echo base_url('images/profil_picture/asl.jpg'); ?>" class="activity-icon shadow-primary profil-pic">
                    <div class="activity-detail">
                      <div class="mb-2"><a href=""><h6>Khai Zulfa</h6></a></div>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum lacinia felis et eros aliquam, a auctor velit dignissim. Proin aliquam sapien et enim pharetra placerat. Sed feugiat tempor rhoncus. Donec nec nulla a arcu venenatis accumsan. Pellentesque consectetur, tortor ac laoreet feugiat, arcu odio congue risus, sit amet pellentesque risus velit mollis ante.</p>
                      <div class="mb-2">
                        <span class="text-job text-primary">2 min ago</span>
                        <span class="bullet"></span>
                        <a class="text-job" href="#">View</a>
                        <div class="float-right dropdown">
                          <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                          <div class="dropdown-menu">
                            <div class="dropdown-title">Options</div>
                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i> Detail</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item has-icon text-danger" data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?" data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i> Archive</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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
  <script src="<?php echo base_url(); ?>js/tweet/send_tweet.js?v=1.0.0" type="text/javascript"></script>
</body>
</html>
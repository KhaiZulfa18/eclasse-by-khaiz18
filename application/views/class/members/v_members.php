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
                  <h4 class="mr-2">Members</h4>
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
            <h2 class="section-title">Members</h2>
            <div id="tabel-data"></div>
            <div id="paging"></div>
          </div>
        </section>
      </div>

      <!-- Footer -->
      <?php $this->load->view('footer'); ?>
    </div>
  </div>

  <!-- JS Script -->
  <?php $this->load->view('js-script'); ?>
  <script>
    var base_url = '<?php echo base_url(); ?>';
  </script>
  <script src="<?php echo base_url(); ?>plugins/jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
  <script src="<?php echo base_url(); ?>js/class/members/members.js?v=1.0.0" type="text/javascript"></script>
</body>
</html>
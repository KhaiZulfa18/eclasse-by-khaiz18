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
            <h1>List Member</h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- <div class="card-header">
                    <h4>Simple Table</h4>
                  </div> -->
                  <div class="card-body">
                    <div class="row">
                      <div class="form-group col-12 col-md-4">
                        <select class="form-control" id="gender" name="gender">
                          <option value="">Gender</option>
                          <option value="1">Male</option>
                          <option value="2">Female</option>
                        </select>
                      </div>
                      <div class="form-group col-12 col-md-4">
                        <select class="form-control" id="status" name="status">
                          <option value="1">All</option>
                          <option value="2">Just Admin</option>
                        </select>
                      </div>
                      <div class="form-group col-12 col-md-4">
                        <input type="text" name="search" id="search" placeholder="Search" class="form-control">
                      </div>
                    </div>
                    <div class="table-responsive">
                      <div id="tabel-data"></div>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <div id="paging"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

      <!-- Footer -->
      <?php 
        $this->load->view('footer');
        $this->load->view('modal');
      ?>
    </div>
  </div>

  <!-- JS Script -->
  <?php $this->load->view('js-script'); ?>
  <script>
    var base_url = '<?php echo base_url(); ?>';
  </script>
  <script src="<?php echo base_url(); ?>plugins/jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
  <script src="<?php echo base_url(); ?>js/dashboard/list_member.js?v=1.0.1" type="text/javascript"></script>
</body>
</html>
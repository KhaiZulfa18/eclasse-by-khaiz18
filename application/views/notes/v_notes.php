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
            <h1>Note</h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="form-group float-right col-12 col-md-4">
                        <input type="text" name="search" id="search" placeholder="Search" class="form-control">
                      </div>
                    </div>
                    <div id="tabel-data"></div>
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
        $this->load->view('notes/modal_delete_notes');
      ?>
    </div>
  </div>

  <!-- JS Script -->
  <?php $this->load->view('js-script'); ?>
  <script>
    var base_url = '<?php echo base_url(); ?>';
  </script>
  <script src="<?php echo base_url(); ?>plugins/jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
  <script src="<?php echo base_url(); ?>js/notes/pinned_note.js?v=1.0.0" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>js/notes/list_note.js?v=1.0.1" type="text/javascript"></script>
</body>
</html>
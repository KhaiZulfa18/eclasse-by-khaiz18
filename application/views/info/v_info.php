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
            <h1>Profile Class</h1>
          </div>

          <div class="section-body">
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card profile-widget">
                  <div class="profile-widget-header">
                    <?php $logo = (!empty($class->logo)) ? $class->logo : 'logokz.png'; ?>
                    <img alt="image" src="<?= base_url('images/class_logo/'.$logo); ?>" class="rounded-circle profile-widget-picture profile-img">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Years</div>
                        <div class="profile-widget-item-value"><?= $class->years; ?></div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Members</div>
                        <div class="profile-widget-item-value"><?= $members; ?></div>
                      </div>
                    </div>
                  </div>
                  <div class="profile-widget-description">
                    <div class="profile-widget-name"><h3><?= $class->class; ?></h3></div>
                    <?= $class->school; ?>
                    <div class="row col-lg-12 mt-4">
                      <div class="col-lg-4 col-md-6 mt-4">
                        <a href="mailto:<?= $class->email; ?>" target="_blank" class="btn btn-block btn-social btn-primary mr-1">
                          <span class="fa fa-envelope"></span>
                          <?= $class->email; ?>
                        </a>
                      </div>
                      <div class="col-lg-4 col-md-6 mt-4">
                        <a href="<?= $class->link_instagram; ?>" target="_blank" class="btn btn-block btn-social btn-info mr-1">
                          <span class="fab fa-instagram"></span>
                          <?= $class->instagram; ?>
                        </a>
                      </div>
                      <div class="col-lg-4 col-md-6 mt-4">
                        <a href="<?= $class->link_group_wa; ?>" target="_blank" class="btn btn-block btn-social btn-success mr-1">
                          <span class="fab fa-whatsapp"></span>
                          Join WhatsApp Group
                        </a>
                      </div>
                    </div>
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
      ?>
    </div>
  </div>

  <!-- JS Script -->
  <?php $this->load->view('js-script'); ?>
  <script>
    var base_url = '<?php echo base_url(); ?>';
  </script>
</body>
</html>
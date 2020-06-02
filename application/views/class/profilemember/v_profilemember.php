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
            <h1><?= $user->name; ?></h1>
          </div>

          <div class="section-body">
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card profile-widget">
                  <div class="profile-widget-header">
                    <img alt="image" src="<?= base_url('images/profil_picture/'.$user->profil_picture); ?>" class="rounded-circle profile-widget-picture profile-img">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Posts</div>
                        <div class="profile-widget-item-value">187</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Followers</div>
                        <div class="profile-widget-item-value">6,8K</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label"></div>
                        <div class="profile-widget-item-value">2,1K</div>
                      </div>
                    </div>
                  </div>
                  <div class="profile-widget-description">
                    <div class="profile-widget-name"><h3><?= $user->name; ?></h3></div>
                    <?= $user->bio; ?>
                    <div class="row col-lg-12">
                      <div class="col-lg-4 col-md-6 mt-sm-4">
                        <h6><i class="fa fa-envelope mr-3"></i><?= $user->email; ?></h6>
                      </div>
                      <div class="col-lg-4 col-md-6 mt-sm-4">
                        <h6><i class="fa fa-phone mr-3"></i><?= $user->phone; ?></h6>
                      </div>
                      <div class="col-lg-4 col-md-6 mt-sm-4">
                        <h6><i class="fa fa-envelope mr-3"></i><?= $user->loc_of_birth.', '.date_indo($user->date_of_birth); ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-center">
                    <div class="font-weight-bold mb-2">Follow Me On</div>
                    <?php foreach ($account as $data) {  ?>
                      <a href="<?php $link = (!empty($data->link)) ? $data->link : '#'; echo $link; ?>" class="btn btn-social-icon btn-<?= $data->type; ?> mr-1">
                        <i class="fab fa-<?= $data->type; ?>"></i>
                      </a>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

      <!-- Footer -->
      <?php $this->load->view('footer'); ?>
    </div>
  </div>

  <!-- JS Script -->
  <?php $this->load->view('js-script'); ?>
</body>
</html>
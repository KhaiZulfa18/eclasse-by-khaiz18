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
            <h1>My Profile</h1>
          </div>

          <div class="section-body">
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card profile-widget">
                  <div class="profile-widget-header">
                    <img alt="image" src="<?= base_url('images/profil_picture/'.$user->profil_picture); ?>" class="rounded-circle profile-widget-picture profile-img">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Tweets</div>
                        <div class="profile-widget-item-value"><?= $tweet_count; ?></div>
                      </div>
                    </div>
                  </div>
                  <div class="profile-widget-description">
                    <div class="profile-widget-name"><h3><?= $user->name; ?></h3></div>
                    <?= $user->bio; ?>
                    <div class="row mt-4">
                      <div class="col-lg-3 col-md-3 mt-sm-4 mt-2">
                        <a href="mailto:<?= $user->email; ?>" class="btn btn-block btn-social btn-primary">
                          <span class="fa fa-envelope"></span>
                          <?= $user->email; ?>
                        </a>
                      </div>
                      <div class="col-lg-3 col-md-3 mt-sm-4 mt-2">
                        <a href="<?= chatWa($user->phone,$user->name); ?>" class="btn btn-block btn-social btn-success">
                          <span class="fab fa-whatsapp"></span>
                          <?= $user->phone; ?>
                        </a>
                      </div>
                      <div class="col-lg-3 col-md-3 mt-sm-4 mt-2">
                        <button class="btn btn-block btn-social btn-info">
                          <span class="fa fa-book"></span>
                          <?= $user->loc_of_birth.', '.date_indo($user->date_of_birth); ?>
                        </a>
                      </div>
                      <div class="col-lg-3 col-md-3 mt-sm-4 mt-2">
                        <button class="btn btn-block btn-social btn-warning">
                          <span class="fa fa-map"></span>
                          <?= $user->address; ?>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-center">
                    <div class="font-weight-bold mb-2">Follow Me On</div>
                    <div class="row">
                      <?php foreach ($account as $data) {  ?>
                        <div class="col-lg-3 col-md-3 col-sm-4 mt-4">
                          <a href="<?php $link = (!empty($data->link)) ? $data->link : '#'; echo $link; ?>" target="_blank" class="btn btn-block btn-social btn-<?= $data->type; ?> mr-1">
                            <span class="fab fa-<?= $data->type; ?>"></span>
                            <?= $data->name; ?>
                          </a>
                        </div>
                      <?php } ?>
                      <div class="col-lg-3 col-md-3 col-sm-4 mt-4">
                        <button class="btn btn-block btn-social btn-primary mr-1" onClick="addAccount('<?php echo $user->id_user; ?>')">
                          <i class="fa fa-plus"></i>
                          Add Account
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <h2 class="section-title">Tweet by <?= $user->name; ?></h2>
            <div class="row" id="tweet-body">
              <div id="tweet-post"></div>
              <div class="col-12">
                <div id="paging-tweet"></div>
              </div>
            </div>
          </div>
        </section>
      </div>

      <!-- Footer -->
      <?php 
      $this->load->view('footer'); 
      $this->load->view('modal'); 
      $this->load->view('tweet/modal_tweet'); 
      ?>
    </div>
  </div>

  <!-- JS Script -->
  <?php $this->load->view('js-script'); ?>
  <script>
    var base_url = '<?php echo base_url(); ?>';
  </script>
  <script src="<?php echo base_url(); ?>plugins/jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/clipboard-js/dist/clipboard.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/toastr-master/build/toastr.min.js"></script>
  <script src="<?php echo base_url(); ?>js/profile/add_account.js?v=1.0.2" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>js/profile/my_tweet.js?v=1.0.2" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>js/tweet/copy_tweet.js?v=1.0.1" type="text/javascript"></script>
</body>
</html>
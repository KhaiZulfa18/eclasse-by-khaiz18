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
            <h1>Home</h1>
          </div>

          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                  <i class="fas fa-code"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Class</h4>
                  </div>
                  <div class="card-body">
                    <?= $profile_class->class; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Members</h4>
                  </div>
                  <div class="card-body">
                    <?= $member_count ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-comment-dots"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>My Tweets</h4>
                  </div>
                  <div class="card-body">
                    <?= $tweet_count; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Pinned Notes  <i class="fas fa-star"></i></h4>
                </div>
                <div class="card-body">
                  <ul class="list-unstyled list-unstyled-border">
                  <?php foreach ($pinned_notes as $data){ ?>
                    <li class="media">
                      <img class="mr-3 rounded-circle" width="50" src="<?= base_url('images/profil_picture/'.$data->profil_pic) ?>" alt="avatar">
                      <div class="media-body">
                        <div class="float-right text-primary"><?= date_ago($data->created_at); ?></div>
                        <div class="media-title"><?= $data->name ?></div>
                        <span><?= $data->note;  ?></span>
                      </div>
                    </li>
                  <?php } ?>
                  </ul>
                  <div class="text-center pt-1 pb-1">
                    <a href="<?= base_url('info/notes'); ?>" class="btn btn-primary btn-lg btn-round">
                      View All Notes
                    </a>
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
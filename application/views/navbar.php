<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
  </form>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
      <img alt="image" src="<?= base_url('images/profil_picture/'.$this->session->userdata('profil_pic')); ?>" class="rounded-circle mr-1 profile-pic">
      <div class="d-sm-none d-lg-inline-block">Hi, <?= $this->session->userdata('name'); ?></div></a>
      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-title"><?= $this->session->userdata('name'); ?></div>
        <a href="<?= base_url('profile'); ?>" class="dropdown-item has-icon">
          <i class="fas fa-user"></i> Profile
        </a>
        <a href="<?= base_url('tweet'); ?>" class="dropdown-item has-icon">
          <i class="fas fa-comment-dots"></i> Tweet
        </a>
        <a href="<?= base_url('profile/setting_profile') ?>" class="dropdown-item has-icon">
          <i class="fas fa-cog"></i> Settings
        </a>
        <div class="dropdown-divider"></div>
        <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item has-icon text-danger">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </div>
    </li>
  </ul>
</nav>
<a id="back-to-top" href="#" class="btn btn-primary btn-sm back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>
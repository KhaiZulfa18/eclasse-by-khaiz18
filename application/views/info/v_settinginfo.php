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
            <h1>Info Settings</h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header">
                    <h4>Settings</h4>
                  </div>
                  <div class="card-body">
                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#profile_class_Setting" role="tab" aria-controls="profile" aria-selected="true">Profile Class</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="logo-tab4" data-toggle="tab" href="#logo_class_setting" role="tab" aria-controls="logo" aria-selected="true">Logo Class</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <form id="setting-form">
                  <div class="card" id="settings-card">
                    <div class="tab-content no-padding" id="myTab2Content">
                      <div class="tab-pane fade show active" id="profile_class_Setting" role="tabpanel" aria-labelledby="home-tab4">
                        <div class="card-header">
                          <h4>Profile Class</h4>
                        </div>
                        <div class="card-body" id="form-update-profile">
                          <form class="form-profile-setting">
                            <div class="row">
                              <div class="form-group col-lg-6 col-md-12">
                                <label>Class</label>
                                <input type="text" class="form-control" name="class" id="class" placeholder="Class Name" value="<?= $class->class; ?>">
                              </div>
                              <div class="form-group col-lg-6 col-md-12">
                                <label>School</label>
                                <input type="text" class="form-control" name="school" id="school" placeholder="School" value="<?= $class->school; ?>">
                              </div>
                              <div class="form-group col-lg-6 col-md-12">
                                <label>Years</label>
                                <input type="text" class="form-control" name="years" id="years" placeholder="Years" value="<?= $class->years; ?>">
                              </div>
                              <div class="form-group col-lg-6 col-md-12">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?= $class->email; ?>">
                              </div>
                              <div class="form-group col-lg-6 col-md-12">
                                <label>Instagram</label>
                                <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Instagram" value="<?= $class->instagram; ?>">
                              </div>
                              <div class="form-group col-lg-6 col-md-12">
                                <label>Link Instagram</label>
                                <input type="text" class="form-control" name="link_instagram" id="link_instagram" placeholder="Link Instagram" value="<?= $class->link_instagram; ?>">
                              </div>
                              <div class="form-group col-lg-6 col-md-12">
                                <label>Link Group WA</label>
                                <input type="text" class="form-control" name="link_group_wa" id="link_group_wa" placeholder="Link Group WA" value="<?= $class->link_group_wa; ?>">
                              </div>
                              <div class="form-group col-lg-12 col-md-12">
                                <div id="attention-profile"></div>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="card-footer bg-whitesmoke text-md-right">
                          <?php if ($this->session->userdata('level')>2) { ?>
                            <button class="btn btn-primary" type="button" id="btnSaveChanges">Save Changes</button>
                          <?php }else{ ?>
                            <button class="btn btn-secondary disabled" type="button" id="">No Permission</button>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="logo_class_setting" role="tabpanel" aria-labelledby="logo-tab4">
                        <div class="card-header">
                          <h4>Logo Class</h4>
                        </div>
                        <div class="card-body" id="form-update-photo">
                          <div class="col-lg-12 text-center">
                            <?php $logo = (!empty($class->logo)) ? $class->logo : 'eclasse-logo.jpg'; ?>
                            <img src="<?= base_url('images/class_logo/'.$logo); ?>" class="rounded-circle profile-img-lg">
                          </div>
                          <div class="form-group mt-3">
                            <label>Change Logo</label>
                            <div class="custom-file">
                              <div class="col-lg-12 col-md-12">
                                <!-- <input type="file" class="custom-file-input form-control" name="picture" id="picture"> -->
                                <!-- <label class="custom-file-label" for="picture">Choose file</label> -->
                                <input type="file" name="picture" id="picture">
                              </div>
                            </div>
                          </div>
                          <div class="form-group col-lg-12 col-md-12">
                            <div id="attention-photo"></div>
                          </div>
                        </div>
                        <div class="card-footer bg-whitesmoke text-md-right">
                          <?php if ($this->session->userdata('level')>2) { ?>
                            <button class="btn btn-danger" type="button" id="btnDeletePhoto">Empty Logo</button>
                            <button class="btn btn-primary" type="button" id="btnUpdatePhoto">Change Logo</button>
                          <?php }else{ ?>
                            <button class="btn btn-secondary disabled" type="button" id="">No Permission</button>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
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
  <script type="text/javascript">
    var base_url = '<?php echo base_url(); ?>';
  </script>
  <script src="<?php echo base_url(); ?>plugins/jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
  <script src="<?php echo base_url(); ?>js/settings/info_settings.js?v=1.0.0" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>js/settings/update_logo.js?v=1.0.0" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>js/settings/empty_logo.js?v=1.0.0" type="text/javascript"></script>
</body>
</html>
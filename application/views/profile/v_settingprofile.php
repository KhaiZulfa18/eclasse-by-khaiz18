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
            <h1>Settings</h1>
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
                        <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#profile_setting" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="picture-tab4" data-toggle="tab" href="#profilepic_setting" role="tab" aria-controls="profilepic" aria-selected="false">Photo Profile</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#password_setting" role="tab" aria-controls="password" aria-selected="false">Password</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#account_setting" role="tab" aria-controls="account" aria-selected="false">Account Socmed</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <form id="setting-form">
                  <div class="card" id="settings-card">
                    <div class="tab-content no-padding" id="myTab2Content">
                      <div class="tab-pane fade show active" id="profile_setting" role="tabpanel" aria-labelledby="home-tab4">
                        <div class="card-header">
                          <h4>Profile Settings</h4>
                        </div>
                        <div class="card-body" id="form-update-profile">
                          <form class="form-profile-setting">
                            <div class="row">
                              <div class="form-group col-lg-6 col-md-12">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?= $user->name; ?>">
                              </div>
                              <div class="form-group col-lg-6 col-md-12">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?= $user->username; ?>">
                              </div>
                              <div class="form-group col-lg-6 col-md-12">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?= $user->email; ?>">
                              </div>
                              <div class="form-group col-lg-6 col-md-12">
                                <label>Phone</label>
                                <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?= $user->phone; ?>">
                              </div>
                              <div class="form-group col-lg-6 col-md-12">
                                <label>Place of Birth</label>
                                <input type="text" class="form-control" name="loc_of_birth" id="loc_of_birth" placeholder="Place of Birth" value="<?= $user->loc_of_birth; ?>">
                              </div>
                              <div class="form-group col-lg-6 col-md-12">
                                <label>Date of Birth</label>
                                <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="<?= $user->date_of_birth; ?>">
                              </div>
                              <div class="form-group  col-lg-6 col-md-12">
                                <label>Gender</label>
                                <select class="form-control" id="gender">
                                  <option value="">-- Choose Your Gender --</option>
                                  <option value="1"<?php if($user->gender==1){ echo "selected"; } ?>>Male</option>
                                  <option value="2"<?php if($user->gender==2){ echo "selected"; } ?>>Female</option>
                                </select>
                              </div>
                              <div class="form-group col-lg-12 col-md-12">
                                <label>Bio</label>
                                <textarea class="form-control" id="bio" name="bio" placeholder="Bio"><?= $user->bio; ?></textarea>
                              </div>
                              <div class="form-group col-lg-12 col-md-12">
                                <label>Address</label>
                                <textarea class="form-control" id="address" name="address" placeholder="Address"><?= $user->address; ?></textarea>
                              </div>
                              <div class="form-group col-lg-12 col-md-12">
                                <div id="attention-profile"></div>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="card-footer bg-whitesmoke text-md-right">
                          <button class="btn btn-primary" type="button" id="btnUpdateProfile">Update Profile</button>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="password_setting" role="tabpanel" aria-labelledby="profile-tab4">
                        <div class="card-header">
                          <h4>Password Settings</h4>
                        </div>
                        <div class="card-body" id="form-update-password">
                          <form class="form-profile-setting">
                            <div class="row">
                              <div class="form-group col-lg-6 col-md-12">
                                <label>Your Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Your Password">
                              </div>
                              <div class="form-group col-lg-6 col-md-12">
                                <label>New Password</label>
                                <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="New Password">
                              </div>
                              <div class="form-group col-lg-6 col-md-12">
                                <label>Confirm New Password</label>
                                <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm New Password">
                              </div>
                              <div class="form-group col-lg-12 col-md-12">
                                <div id="attention-password"></div>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="card-footer bg-whitesmoke text-md-right">
                          <button class="btn btn-secondary" type="button">Reset</button>
                          <button class="btn btn-primary" type="button" id="btnUpdatePassword">Update Password</button>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="profilepic_setting" role="tabpanel" aria-labelledby="contact-tab4">
                        <div class="card-header">
                          <h4>Profile Picture</h4>
                        </div>
                        <div class="card-body" id="form-update-photo">
                          <div class="col-lg-12 text-center">
                            <img src="<?= base_url('images/profil_picture/'.$user->profil_picture); ?>" class="rounded-circle profile-img-lg">
                          </div>
                          <div class="form-group mt-3">
                            <label>Change Photo</label>
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
                          <button class="btn btn-primary" type="button" id="btnUpdatePhoto">Change Photo</button>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="account_setting" role="tabpanel" aria-labelledby="contact-tab4">
                        <div class="card-header">
                          <h4>Account Socmed Setting</h4>
                        </div>
                        <div class="card-body">
                          <table class="table table-striped table-md">
                            <tbody>
                              <tr>
                                <th width="20%">##</th>
                                <th width="50%">Name</th>
                                <th width="30%">Action</th>
                              </tr>
                              <?php foreach ($account as $data) { ?>
                              <tr>
                                <td class="text-center"><button class="btn btn-social-icon btn-primary"><i class="fab fa-<?= $data->type; ?>"></i></button></td>
                                <td><?= $data->name; ?></td>
                                <td class="text-center">
                                  <button type="button" class="btn btn-md btn-danger" onClick="deleteAcc('<?php echo $data->id; ?>','<?php echo $data->name; ?>')">
                                    <i class="fa fa-trash"></i>
                                  </button>
                                </td>
                              </tr>
                            <?php } ?>
                            </tbody>
                          </table>
                        </div>
                        <div class="card-footer bg-whitesmoke text-md-right">
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
      <?php $this->load->view('modal'); ?>
    </div>
  </div>

  <!-- JS Script -->
  <?php $this->load->view('js-script'); ?>
  <script type="text/javascript">
    var base_url = '<?php echo base_url(); ?>';
    var id_user = '<?php echo $user->id_user; ?>';
  </script>
  <script src="<?php echo base_url(); ?>plugins/jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
  <script src="<?php echo base_url(); ?>js/profile/update_profile.js?v=1.0.2" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>js/profile/update_password.js?v=1.0.3" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>js/profile/update_photo.js?v=1.0.0" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>js/profile/delete_acc.js?v=1.0.0" type="text/javascript"></script>
</body>
</html>
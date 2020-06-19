<!DOCTYPE html>
<html lang="en">

<!-- Header -->
<?php $this->load->view('header'); ?>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-1">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <?php $logo = (!empty($profile_class->logo)) ? $profile_class->logo : 'eclasse-logo.jpg'; ?>
              <img src="<?= base_url('images/class_logo/'.$logo); ?>" alt="logo" width="100" class="shadow-light rounded-circle class-img">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body" >
                <form id="form">
                  <div class="row">
                    <div class="form-group col-lg-6 col-md-12">
                      <label>Username</label>
                      <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                    </div>
                    <div class="form-group col-lg-6 col-md-12">
                      <label>Password</label>
                      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                    <div class="form-group col-lg-6 col-md-12">
                      <label>Name</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                    </div>
                    <div class="form-group col-lg-6 col-md-12">
                      <label>Email</label>
                      <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="form-group col-lg-6 col-md-12">
                      <label>Phone</label>
                      <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone">
                    </div>
                    <div class="form-group col-lg-6 col-md-12">
                      <label>Place of Birth</label>
                      <input type="text" class="form-control" name="loc_of_birth" id="loc_of_birth" placeholder="Place of Birth">
                    </div>
                    <div class="form-group col-lg-6 col-md-12">
                      <label>Date of Birth</label>
                      <input type="date" class="form-control" name="date_of_birth" id="date_of_birth">
                    </div>
                    <div class="form-group col-lg-6 col-md-12">
                      <label>Gender</label>
                      <select class="form-control" id="gender">
                        <option value="">-- Choose Your Gender --</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                      </select>
                    </div>
                    <div class="form-group col-lg-6 col-md-12">
                      <label>Bio</label>
                      <textarea class="form-control" id="bio" name="bio" placeholder="Bio"></textarea>
                    </div>
                    <div class="form-group col-lg-6 col-md-12">
                      <label>Address</label>
                      <textarea class="form-control" id="address" name="address" placeholder="Address"></textarea>
                    </div>
                    <div class="form-group col-lg-6 col-md-12">
                      <label>Photo</label>
                      <div class="custom-file">
                        <div class="">
                          <!-- <input type="file" class="custom-file-input form-control" name="picture" id="picture"> -->
                          <!-- <label class="custom-file-label" for="picture">Choose file</label> -->
                          <input type="file" name="picture" id="picture">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-lg-12 col-md-12">
                    <div id="attention"></div>
                  </div>
                  <div class="form-group">
                    <button type="button" id="btnRegister" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Have an account? <a href="<?= base_url('auth'); ?>">Login</a>
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- JS Script -->
  <?php $this->load->view('js-script'); ?>
  <script type="text/javascript">
    var base_url = '<?php echo base_url(); ?>';
    // $(document).ready(function () {
    //   bsCustomFileInput.init();
    // });
    </script>
  <script src="<?php echo base_url(); ?>plugins/jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
  <script src="<?php echo base_url(); ?>js/auth/register.js?v=1.0.6" type="text/javascript"></script>
</body>
</html>
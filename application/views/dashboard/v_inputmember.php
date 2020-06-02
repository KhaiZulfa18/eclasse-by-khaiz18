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
            <h1>Add Member</h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add Member</h4>
                  </div>
                  <div class="card-body">
                    <form class="" id="form">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control col-lg-6 col-md-12" name="username" id="username" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control col-lg-6 col-md-12" name="password" id="password" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control col-lg-6 col-md-12" name="name" id="name" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control col-lg-6 col-md-12" name="email" id="email" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="number" class="form-control col-lg-6 col-md-12" name="phone" id="phone" placeholder="Phone">
                      </div>
                      <div class="form-group">
                        <label>Place of Birth</label>
                        <input type="text" class="form-control col-lg-6 col-md-12" name="loc_of_birth" id="loc_of_birth" placeholder="Place of Birth">
                      </div>
                      <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" class="form-control col-lg-6 col-md-12" name="date_of_birth" id="date_of_birth">
                      </div>
                      <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control col-lg-6 col-md-12" id="gender">
                          <option value="">-- Choose Your Gender --</option>
                          <option value="1">Male</option>
                          <option value="2">Female</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Bio</label>
                        <textarea class="form-control col-lg-6 col-md-12" id="bio" name="bio" placeholder="Bio"></textarea>
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control col-lg-6 col-md-12" id="address" name="address" placeholder="Address"></textarea>
                      </div>
                      <div class="form-group">
                        <label>Photo</label>
                        <div class="custom-file">
                          <div class="col-lg-6 col-md-12">
                            <!-- <input type="file" class="custom-file-input form-control" name="picture" id="picture"> -->
                            <!-- <label class="custom-file-label" for="picture">Choose file</label> -->
                            <input type="file" name="picture" id="picture">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="card-footer text-right col-lg-6 col-md-12">
                    <div id="attention"></div>
                    <button class="btn btn-primary mr-1" type="button" id="btnsave"><i class="fa fa-save"></i>&nbsp;Add</button>
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
  <script type="text/javascript">
    var base_url = '<?php echo base_url(); ?>';
    // $(document).ready(function () {
    //   bsCustomFileInput.init();
    // });
    </script>
  <script src="<?php echo base_url(); ?>plugins/jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
  <script src="<?php echo base_url(); ?>js/dashboard/add_member.js?v=1.0.6" type="text/javascript"></script>
</body>
</html>
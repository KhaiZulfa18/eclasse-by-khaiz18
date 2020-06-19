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
            <h1>Create Note</h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Create Note</h4>
                  </div>
                  <div class="card-body">
                    <form class="" id="form">
                      <div class="form-group col-12 col-lg-12 col-md-12">
                        <label>Notes</label>
                        <textarea class="summernote" id="notes"></textarea>
                      </div>
                      <div class="form-group col-12 col-lg-12 col-md-12">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" name="pinned" class="custom-control-input" tabindex="3" id="pinned">
                          <label class="custom-control-label" for="pinned">Pinned Note</label>
                        </div>
                      </div>                    
                    </form>
                  </div>
                  <div class="card-footer text-right">
                    <div id="attention-note"></div>
                    <a href="<?= base_url('info/notes') ?>" class="btn btn-secondary mr-1" type="button" ><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
                    <button class="btn btn-primary mr-1" type="button" id="btnCreate"><i class="fa fa-save"></i>&nbsp;Create</button>
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
  <script>
    var base_url = '<?php echo base_url(); ?>';
    $('.summernote').summernote({
      placeholder: "Create a Note",
      height: 200,
      minHeight: null,
      maxHeight: null,
      focus: true,
      toolbar: [
      ['font', ['bold', 'underline', 'clear']],
      ['fontname', ['fontname']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['insert', ['link']],
      ['view', ['undo','redo','fullscreen']],
      ],
      dialogsInBody: true
    });
  </script>
  <script src="<?php echo base_url(); ?>plugins/jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
  <script src="<?php echo base_url(); ?>js/notes/create_note.js?v=1.0.1" type="text/javascript"></script>
</body>
</html>
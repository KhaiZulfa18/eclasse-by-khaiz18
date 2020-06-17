<!DOCTYPE html>
<html lang="en">

<!-- Header -->
<?php $this->load->view('header'); ?>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="page-error">
          <div class="page-inner">
            <h1>404</h1>
            <div class="page-description">
              The page you were looking for could not be found.
            </div>
            <div class="page-search">
              <div class="mt-3">
                <a class="btn btn-primary" href="<?= base_url('home'); ?>">Back to Home</a>
              </div>
            </div>
          </div>
        </div>
        <div class="simple-footer mt-5">
          Copyright &copy; <a href="mondayy.site">Khai Zulfa</a> 2020
        </div>
      </div>
    </section>
  </div>

<!-- JS Script -->
<?php $this->load->view('js-script'); ?>
</body>
</html>
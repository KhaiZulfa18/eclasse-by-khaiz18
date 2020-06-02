<div class="row">
  <?php foreach ($list_members as $data) {  ?>
  <div class="col-12 col-sm-6 col-md-6 col-lg-4">
    <article class="article article-style-b">
      <div class="article-header">
        <div class="article-image text-center" style="background-image: url(<?php echo base_url('images/profil_picture/'.$data->profil_picture); ?>);">
          <img class="img-fluid h-100 w-auto" src="<?php echo base_url('images/profil_picture/'.$data->profil_picture); ?>">
        </div>
      </div>
      <div class="article-details">
        <div class="article-title">
          <h2><a href="#"><?= $data->name; ?></a></h2>
        </div>
        <p><?= $data->bio; ?></p>
        <span><i class="fa fa-envelope"></i>&nbsp;<?= $data->email; ?></span><br>
        <span><i class="fa fa-phone"></i>&nbsp;<?= $data->phone; ?></span>
        <div class="article-cta mt-3">
          <a href="#" class="btn btn-success"><i class="fab fa-whatsapp"></i>&nbsp;Chat</a>
          <a href="<?= base_url('classes/member/'.base64_encode($data->id_user)); ?>" class="btn btn-primary">View Profile</a>
        </div>
      </div>
    </article>
  </div>
  <?php } ?>
</div>
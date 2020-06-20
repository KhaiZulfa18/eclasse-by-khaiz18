<div class="col-12">
  <?php 
  if (!empty($list_tweet)) {
    foreach ($list_tweet as $data) { ?>
      <div class="activities">
        <div class="activity">
          <?php if($this->session->userdata('id_user')==$data->id_user){  ?>
          <a href="<?= base_url('profile'); ?>">
          <?php }else{ ?>
          <a href="<?= base_url('classes/member/'.base64_encode($data->id_user)); ?>">
          <?php } ?>
            <img src="<?php echo base_url('images/profil_picture/'.$data->profil_pic); ?>" class="activity-icon shadow-primary profil-post">
          </a>
          <div class="activity-detail">
            <?php if($this->session->userdata('id_user')==$data->id_user){  ?>
            <div class="mb-2"><a href="<?= base_url('profile'); ?>"><h6><?= $data->name; ?></h6></a></div>
            <?php }else{ ?>
            <div class="mb-2"><a href="<?= base_url('classes/member/'.base64_encode($data->id_user)); ?>"><h6><?= $data->name; ?></h6></a></div>
            <?php } ?>
            <p><?= $data->tweet; ?></p>
            <div class="mb-2">
              <span class="text-job text-primary"><?= format_tanggal_indo($data->created_at);  ?></span>
              <span class="bullet"></span>
              <a class="text-job"><?= date_ago($data->created_at); ?></a>
              <div class="float-right dropdown mr-2">
                <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="dropdown-title">Options</div>
                  <a class="dropdown-item has-icon copy-button" data-clipboard-action="copy" data-clipboard-text="<?= $data->plain_tweet; ?>"><i class="fas fa-copy"></i> Copy Tweet</a>
                  <?php if ($data->user==$this->session->userdata('id_user')) { ?>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item has-icon text-danger" onClick="deleteTweet('<?php echo $data->id_tweet; ?>','<?php echo $noPage; ?>')"><i class="fas fa-trash-alt"></i> Delete</a>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php }
  }else{ ?>
    <div class="activities">
      <div class="activity">
        <div class="text-primary">
          <h3>Tweet Not Found</h3>
        </div>
      </div>
    </div>
  <?php } ?>
</div>
<div class="col-12">
  <?php foreach ($list_tweet as $data) { ?>
    <div class="activities">
      <div class="activity">
        <a href="<?= base_url('classes/member/'.base64_encode($data->id_user)); ?>">
          <img src="<?php echo base_url('images/profil_picture/'.$data->profil_pic); ?>" class="activity-icon shadow-primary profil-pic">
        </a>
        <div class="activity-detail">
          <div class="mb-2"><a href="<?= base_url('classes/member/'.base64_encode($data->id_user)); ?>"><h6><?= $data->name; ?></h6></a></div>
          <p><?= $data->tweet; ?></p>
          <!-- <p class="" id="<?= 'tweet'.$data->id_tweet; ?>"><?= $data->plain_tweet; ?></p> -->
          <div class="mb-2">
            <span class="text-job text-primary"><?= format_tanggal_indo($data->created_at);  ?></span>
            <span class="bullet"></span>
            <a class="text-job" href="#">View</a>
            <div class="float-right dropdown">
              <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Options</div>
                <a href="<?= base_url('classes/member/'.base64_encode($data->id_user)); ?>" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
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
  <?php } ?>
</div>
<ul class="list-unstyled list-unstyled-border">
  <?php foreach ($list_notes as $data){ 
    $status = ($data->status==2) ? '<i class="fas fa-star"></i>' : '';
    ?>
    <li class="media">
      <img class="mr-3 rounded-circle" width="50" src="<?= base_url('images/profil_picture/'.$data->profil_pic) ?>" alt="avatar">
      <div class="media-body">
        <div class="float-right text-primary"><?= date_ago($data->created_at); ?></div>
        <div class="media-title"><?= $data->name ?>&nbsp; <?= $status; ?> </div>
        <span><?= $data->note;  ?></span>
        <div class="mb-2">
          <span class="text-job text-primary"><?= format_tanggal_indo($data->created_at);  ?></span>
          <!-- <span class="bullet"></span> -->
          <!-- <a class="text-job"><?= date_ago($data->created_at); ?></a> -->
          <div class="float-right dropdown mr-2">
            <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Options</div>
              <?php if ($this->session->userdata('level')>2) { ?>
                <?php if($data->status==1){ ?>
                <a class="dropdown-item has-icon copy-button" onClick="pinnedNote('<?= $data->id_note; ?>','<?= $noPage; ?>')"><i class="fas fa-thumb-tack"></i> Pinned Notes</a>
                <?php }elseif($data->status==2){ ?>
                <a class="dropdown-item has-icon copy-button" onClick="unpinnedNote('<?= $data->id_note; ?>','<?= $noPage; ?>')"><i class="fas fa-thumb-tack"></i> Unpinned Notes</a>
                <?php } ?>
              <?php } ?>
              <?php if ($data->user==$this->session->userdata('id_user')) { ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item has-icon text-danger" onClick="deleteNote('<?php echo $data->id_note; ?>','<?php echo $noPage; ?>')"><i class="fas fa-trash-alt"></i> Delete</a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </li>
  <?php } ?>
</ul>
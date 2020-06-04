<table class="table table-bordered table-md">
  <tr>
    <th>No</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Gender</th>
    <th>Address</th>
    <?php if ($this->session->userdata('level')>1) { ?>
    <th>Level</th>
    <th>Action</th>
    <?php } ?>
  </tr>
  <?php
  if($noPage==1){
    $no = 1;
  } else {
    $no = $offset+1;
  }

  foreach ($list_member as $data) {
      $gender = $data->gender;
  ?>
  <tr>
    <td class="text-center"><?= $no; ?></td>
    <td><?= $data->name; ?></td>
    <td><?= $data->email; ?></td>
    <td><?= $data->phone; ?></td>
    <td>
      <?php if ($gender=='1'){ echo "Male";}elseif ($gender=='2') { echo "Female";}else{ echo "-"; } ?>
    </td>
    <td><?= $data->address; ?></td>
    <?php if ($this->session->userdata('level')>1) { ?>
    <td>
      <?php if ($data->level==1) { ?>
      <div class="badge badge-secondary">Member</div>
      <?php }elseif($data->level==2){ ?>
      <div class="badge badge-success">Admin</div>
      <?php }elseif($data->level==3){  ?>
      <div class="badge badge-primary">Super-Admin</div>
      <?php } ?>
    </td>
    <?php } ?>
    <?php if ($this->session->userdata('level')>1) { ?>
    <td class="text-center">
      <div class="btn-group mb-3" role="group">
      <?php if ($this->session->userdata('level')>$data->level) { ?>
        <button class="btn btn-success" onClick="updateLevel('<?php echo $data->id_user; ?>','<?php echo $noPage; ?>','<?php echo $data->name; ?>')"><i class="fa fa-key"></i></button>
      <?php }else{ ?>
        <button class="btn btn-success"><i class="fa fa-shield-alt"></i></button>
      <?php } ?>
        <button class="btn btn-danger" onClick="deleteData('<?php echo $data->id_user; ?>','<?php echo $noPage; ?>','<?php echo $data->name; ?>')"><i class="fa fa-trash"></i></button>
      </div>
    </td>
    <?php } ?>
  </tr>
  <?php $no++; } ?>
</table>
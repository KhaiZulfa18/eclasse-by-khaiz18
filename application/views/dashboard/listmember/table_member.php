<table class="table table-bordered table-md">
  <tr>
    <th>No</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Gender</th>
    <th>Address</th>
    <th>Status</th>
    <th>Action</th>
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
    <td>
      <?php if ($data->status<=1) { ?>
      <div class="badge badge-success">Active</div>
      <?php }else{ ?>
      <div class="badge badge-danger">Non-Active</div>
      <?php }  ?>
    </td>
    <td class="text-center">
      <div class="btn-group mb-3" role="group">
        <button class="btn btn-primary"><i class="fa fa-edit"></i></button>
        <button class="btn btn-danger" onClick="deleteData('<?php echo $data->id_user; ?>','<?php echo $noPage; ?>','<?php echo $data->name; ?>')"><i class="fa fa-trash"></i></button>
      </div>
    </td>
  </tr>
  <?php $no++; } ?>
</table>
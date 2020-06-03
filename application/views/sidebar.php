<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?php echo base_url(); ?>"><i class="fas fa-code"></i>&nbsp;Eclasse</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?php echo base_url(); ?>"><i class="fas fa-code"></i></a>
    </div>
    <ul class="sidebar-menu">
      <!-- Home -->
      <li class="menu-header">Home</li>
      <li class="<?php if($main_menu=="home"){ echo "active"; } ?>"><a class="nav-link" href="<?php echo base_url(); ?>"><i class="fas fa-home"></i><span>Home</span></a></li>
      <!-- Class -->
      <li class="menu-header">Class</li>
      <li class="<?php if($main_menu=="class"){ echo "active"; } ?>"><a class="nav-link" href="<?php echo base_url('classes'); ?>"><i class="fas fa-code"></i><span>Class</span></a></li>
      <!-- Tweet -->
      <li class="menu-header">Tweet</li>
      <li class="<?php if($main_menu=="tweet"){ echo "active"; } ?>"><a class="nav-link" href="<?php echo base_url('tweet'); ?>"><i class="fas fa-comment"></i><span>Tweet</span></a></li>
      <!-- Information -->
      <li class="menu-header">Information</li>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-info-circle"></i> <span>Information</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="layout-default.html">Agenda</a></li>
          <li><a class="nav-link" href="layout-transparent.html">Note</a></li>
        </ul>
      </li>
      <!-- Dashboard -->
      <li class="menu-header">Dashboard</li>
      <li class="nav-item dropdown <?php if($main_menu=="member"){ echo "active"; } ?>">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user-plus"></i> <span>Member</span></a>
        <ul class="dropdown-menu">
        <?php if ($this->session->userdata('level')>1) { ?>
          <li><a class="nav-link" href="<?php echo base_url('home/add_member'); ?>">Add Member</a></li>
        <?php } ?>
          <li><a class="nav-link" href="<?php echo base_url('home/list_member'); ?>">List Member</a></li>
        </ul>
      </li>
      <?php if ($this->session->userdata('level')>1) { ?>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-plus"></i> <span>Information</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="layout-default.html">Add Agenda</a></li>
          <li><a class="nav-link" href="layout-default.html">List Agenda</a></li>
          <li><a class="nav-link" href="layout-transparent.html">Add Note</a></li>
          <li><a class="nav-link" href="layout-transparent.html">List Note</a></li>
        </ul>
      </li>
      <?php } ?>
    </ul>
  </aside>
</div>
<nav class="navbar navbar-expand-lg ">
  <a class="navbar-brand" href="#"> <strong>[<sup>.</sup>} talento.tms</strong> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link " href="#" ><i class="fa fa-arrow-left"></i> <span class="sr-only">(current)</span></a>

      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-arrows-alt"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-search"></i></a>
      </li>
</ul>
<span href="#">FR</span>
    <a href="#" id ="notification">
      <i class='fa fa-bell'></i>
      <span id ="span-notification">10</span>
    </a>
</div>
<div class="dropdown">
  <a href="#" id ="profile-active" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     <img src=<?php echo theme_path('images/logo.png')?>  class="img-profile rounded-circle" alt="logo">
     <span id ="span-profile-active" >12</span>
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="#">About</a>
      <a class="dropdown-item" href="<?php echo url_for('admin/changeUserPassword');?>"><?php echo __('Change Password'); ?></a>
      <a class="dropdown-item" href="<?php echo url_for('auth/logout'); ?>"><?php echo __('Logout'); ?></a>
  </div>
</div>
</nav>



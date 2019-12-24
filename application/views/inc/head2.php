<header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>dashboard" class="logo"><b>BHOND </b>OLSHOP</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
              </li>
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url('upload/'.$this->session->userdata('foto')); ?>" class="user-image"><span class="hidden-xs"><?php echo $this->session->userdata('nama'); ?></span>
                </a>

                <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            <img src="<?php echo base_url('upload/'.$this->session->userdata('foto')) ?>" class="img-circle">
            <p>
              <?php echo $this->session->userdata('level'); ?>
              <p>
              <?php echo $this->session->userdata('nama'); ?>
            </p>
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <center><div>
              <a href="<?php echo base_url() ?>new_admin/profile/<?php echo $this->session->userdata('id_user'); ?>" class="btn btn-default btn-flat"><i class="fa fa-user" aria-hidden="true"></i> Edit Profil</a>
            </div></center>
          </li>
        </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
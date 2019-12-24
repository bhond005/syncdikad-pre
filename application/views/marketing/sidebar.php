<section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
         <!-- <img src="<?php echo base_url(); ?>upload/bhond005.jpg" class="img-circle" alt="User Image" /> -->
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('upload/'.$this->session->userdata('foto')); ?>" alt="User Image"/>

            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('nama'); ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li>
              <a href="<?php echo base_url(); ?>dashboard">
                <i class="fa fa-home"></i> <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>kategori">
                <i class="fa fa-tag"></i> <span>Kategori</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>merk">
                <i class="fa fa-diamond"></i> <span>Merk</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>produk">
                <i class="fa fa-photo"></i> <span>Produk</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>new_admin">
                <i class="fa fa-user"></i> <span>Tambah Admin</span> <small class="label pull-right bg-green">new</small>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>login/logout">
                <i class="fa fa-sign-out"></i> <span>Keluar</span> 
              </a>
            </li>
            
            <li class="header">Ini merupakan halaman Admin Pengelola Web Bhond Olshop</li>
            <!-- <li><a href="#"><i class="fa fa-circle-o text-danger"></i> Important</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-warning"></i> Warning</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-info"></i> Information</a></li> -->
          </ul>
        </section>
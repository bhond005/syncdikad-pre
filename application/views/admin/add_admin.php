<!DOCTYPE html>
<html>
<head>
  <link href="<?php echo base_url(); ?>assets/dist/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <?php $this->load->view('inc/head'); ?>
  
</head>
<body class="skin-blue">
  <!-- wrapper di bawah footer -->
  <div class="wrapper">

    <?php $this->load->view('inc/head2'); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <?php $this->load->view('inc/sidebar'); ?>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <b>TAMBAH DATA ADMIN</b>
        </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">FORM TAMBAH ADMIN</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>new_admin/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">

                    <div class="form-group">
                      <label for="">Foto</label>
                        <input type="file" class="form-control" value="" id="" name="foto" placeholder="">                        
                    </div>

                    <div class="form-group">
                      <label for="">Nama Lengkap</label>
                        <input type="text" class="form-control" value="" id="" name="nama" placeholder="Isikan Nama Lengkap" required>
                    </div>

                    <div class="form-group">
                      <label for="">Username</label>
                        <input type="text" class="form-control" value="" id="" name="nama_user" placeholder="Isikan Username" required>                        
                    </div>
                    <div class="form-group">
                      <label for="">Password</label>
                        <input type="text" class="form-control" value="" id="" name="pass_user" placeholder="Isikan Password" required>                        
                    </div>
                    <div class="form-group">
                      <label for="">Level : &nbsp;</label>
                        <input type="radio" values="Admin" id="radio1" name="level"><label for="">Admin</label>
                        <input type="radio" values="MArketing" id="radio2" name="level"><label for="">Marketing</label>           
                    </div>

                  </div>
                  
                  
                </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat" required>Simpan</button>
                  <a href="<?php echo base_url(); ?>new_admin" class="btn btn-warning btn-block btn-flat" required>Batal</a>
                </div><!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          </section><!-- right col -->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <!-- <b>Version</b> 2.0 -->
        </div>
        <strong>Copyright &copy; 2019 <a href="#"></a></strong>
        <strong><p class="pull-right">Designed by <span>bhond005 and Developed by Trisnatya Mahardhika</span></p></strong>
      </footer>
  </div><!-- ./wrapper -->
  <!-- page script -->
  

    
    <?php $this->load->view('inc/footer'); ?>
</body>
</html>
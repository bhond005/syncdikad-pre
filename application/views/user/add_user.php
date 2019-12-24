<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <?php $this->load->view('incsite/head3'); ?>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <link href="<?php echo base_url(); ?>assets/dist/css/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" /
        <!-- Theme style -->
</head>

<body class="skin-blue">
  <?php $this->load->view('incsite/head2'); ?>
  
  <CENTER> <h1><b>REGISTRASI</b></h1> </CENTER>
      <section class="content">
          <section class="col-lg-12">
              <div class="box-body chat" id="chat-box">
                  <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>new_user/savedata" method="POST" enctype="multipart/form-data">
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
                    
                      </div>
       
                  </div><!-- /.item -->

                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                        <a href="<?php echo base_url(); ?>site" class="btn btn-primary btn-block btn-flat">Batal</a>
                      </div><!-- /.col -->
                  </form>
                  </div><!-- /.box (chat box) -->
      </section><!-- /.Left col -->

  <?php $this->load->view('incsite/footer'); ?>
  <?php $this->load->view('incsite/footer2'); ?>
    
</body>



</html>
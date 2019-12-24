<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <?php $this->load->view('incsite/head'); ?>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <link href="<?php echo base_url(); ?>assets/dist/css/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" /
        <!-- Theme style -->
</head>

<body class="skin-blue">
  <?php $this->load->view('incsite/head4'); ?>
  <CENTER> <h1><b>Edit User</b></h1> </CENTER>
      <section class="content">

          <section class="col-lg-12">
            <div class="box">
              <div class="box-body chat" id="chat-box">
                  <div class="item">
                      <form role="form" action="<?php echo base_url(); ?>new_user/edit" method="POST" enctype="multipart/form-data">
                          <div class="col-lg-6">

                              <div class="form-group">
                                <label for="">Foto</label>
                                <input type="hidden" name="photo" value="<?php echo $this->session->userdata('foto'); ?>">
                                <input type="file" class="form-control" value="" id="" name="foto" placeholder="">                     
                              </div>

                              <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" id="" name="nama" placeholder="Isikan Nama Lengkap" required>
                              </div>

                              <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama_user'); ?>" id="" name="nama_user" placeholder="Isikan Username" required>
                              </div>

                              <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" class="form-control" value="<?php echo $this->session->userdata('pass_user'); ?>" id="" name="pass_user" placeholder="Isikan Password" required> 
                              </div>
                          </div>
                  
                    <!-- Profile Image -->
                    <div class="box box-primary pull-right" style="width:300px; height:150px" >
                        <div class="box-body box-profile">
                            <center><img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('upload/'.$this->session->userdata('foto')); ?>" alt="User profile picture"></center>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item" style="text-align:center">
                                    <p><?php echo $this->session->userdata('nama')?></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
           </div>
      </section>
                      <div class="form-group">
                          <button onclick="return confirm('Anda akan Logout untuk merefresh data.');" type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                          <a href="<?php echo base_url(); ?>site" class="btn btn-primary btn-block btn-flat">Batal</a>
                      </div>
              </div>
          </section>


  <?php $this->load->view('incsite/footer'); ?>
  <?php $this->load->view('incsite/footer2'); ?>
     
</body>



</html>
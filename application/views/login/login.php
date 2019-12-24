<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login | SYNCDIKAD OLSHOP</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <link href="<?php echo base_url(); ?>assets/dist/css/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" /
        <!-- Theme style -->
    

  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <b>WELCOME..!!!</b>
      </div><!-- /.login-logo -->
      <div class="login-box-body">

        <p class="login-box-msg" class="uppercase"><?php echo $info; ?></p>

        <form action="<?php echo base_url(); ?>login/proseslog" id="form-login" method="post" accept-charset="utf-8">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="Nama Pengguna" required/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" value="" name="pass_user" id="pass_user" placeholder="Password" required/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            
            <div class="col-xs-4">
              <input type="submit" name="login" value="Login" id="submit-login" class="btn btn-primary btn-block btn-flat" />
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="button" class="btn btn-default get">  <a href="<?php echo base_url(); ?>"><b> Back</b></a></button>
            </div>
          
          </div>
        </form>
      </div><!-- /.login-box-body -->
      <br>Belum punya Akun? <a href="<?php echo base_url(); ?>new_user"><b> Register</b></a> disini</br>
    </div><!-- /.login-box -->
    </body>
    <!-- jQuery 2.1.3 -->
    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <?php $this->load->view('incsite/footer'); ?>
  
</html>

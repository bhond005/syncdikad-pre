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
    <style type="text/css">
    .log{
      margin-left: 355px;
    }
            @media (max-width: 680px) {
            .log {
                margin-left: 0px;
                } 
            #slider{
              display: none;
            }    
            }
    </style>

<?php $this->load->view('incsite/head4'); ?>
<body class="skin-blue">
  <CENTER> <h1><b>MASUKAN ALAMAT PENGIRIMAN</b></h1> </CENTER>
      <section class="content">

          <section class="col-lg-12">
            <div class="box">
              <div class="box-body chat" id="chat-box">
                  <div class="item">
                      <form role="form" action="<?php echo base_url(); ?>site2/transaksi" method="POST" enctype="multipart/form-data">
                          <div class="col-lg-6">

                              <div class="form-group">
                                <label for="">Nama Penerima</label>
                                <input type="text" class="form-control" value="" id="" name="nama" placeholder="Nama Penerima" required>
                              </div>

                              <div class="form-group">
                                <label for="">Alamat Lengkap</label>
                                <input type="alamat" class="form-control" value="" id="" name="alamat" placeholder="Alamat Lengkap" required>
                              </div>

                              <div class="form-group">
                                <label for="">Kota</label>
                                <input type="text" class="form-control" value="" id="" name="kota" placeholder="Kota" required>
                              </div>

                              <div class="form-group">
                                <label for="">No Handphone</label>
                                <input type="number" class="form-control" value="" id="" name="no_telp" placeholder="No Handphone" required> 
                              </div>

                              <div class="form-group">
                              <input type="hidden" class="form-control" value="1" id="" name="jumlah" placeholder="" required>
                              <input type="hidden" name="tgl_input_trans" value="<?php echo $tgl_input_trans; ?>" />
                              <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('nama'); ?>" />
                              </div>

                          </div>

                  
                    <!-- Profile Image -->
                    <div class="box box-primary pull-right" style="width:500px; height:300px" >
                        <div class="box-body box-profile">

                          <?php foreach($data_produk as $row){ ?>
                              <div class="product-details"><!--product-details-->
                                  <div class="col-sm-5">
                                      <div class="view-product">
                                        <img style="width:156px; height:171px" src="<?php echo base_url(); ?>assets/upload/<?php echo $row['foto']; ?>" alt="" />
                                      </div>

                                  </div>
                                  <div class="col-sm-7">
                                        <h2><?php echo $row['judul']; ?></h2>
                                        <p><b>Stok:</b> <?php echo $row['jumlah']; ?></p>
                                        <p><b>Kondisi:</b> <?php echo $row['kondisi']; ?></p>
                                        <p><b>Merk:</b> <?php echo $row['merk']; ?></p>
                                        <p><b>Keterangan:</b> <?php echo $row['ket']; ?></p>
                                        <input type="hidden" name="id_produk" value="<?php echo $row['id_produk']; ?>" />
                                        <input type="hidden" name="foto" value="<?php echo $row['foto']; ?>" />
                                        <input type="hidden" name="harga" value="<?php echo $row['harga']; ?>" />
                                  </div><!--/product-information-->
                                          <h2><b><?php echo currency_format($row['harga']); ?></b></h2>
                              </div>
                          <?php } ?>

                        </div><!--/product-details-->
                      </div>
                      <div>
      <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Jumlah Beli</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach($data_keranjang as $row2){ ?>
            <tr>
                <td><?php echo $row2['judul']; ?></td>
                <td><?php echo currency_format($row2['harga']); ?></td>
                <td><?php echo $row2['jml']; ?></td>
                <td><?php echo currency_format($row2['harga'] * $row2['jml']); ?></td>
                <td><a href="<?php echo base_url(); ?>site2/hapusker/<?php echo $row2['id_keranjang']; ?>" class="btn btn-sm btn-danger">x</a></td>
            </tr>        
          <?php } ?>
            
        </tfoot>
    </table>
                      </div>

                      <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-block btn-flat"><a class="fa fa-shopping-cart"> Beli Sekarang</a></button>
                          <a href="<?php echo base_url(); ?>site" class="btn btn-primary btn-block btn-flat">Batal</a>
                      </div>


                    </div>
                </div>
           </div>
      </section>
                      
              </div>
          </section>


  <?php $this->load->view('incsite/footer'); ?>
  <?php $this->load->view('incsite/footer2'); ?>
     
</body>



</html>
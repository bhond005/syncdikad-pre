<div class="col-sm-9 padding-right">
					<?php foreach($data_produk as $row){ ?>
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img style="width:266px; height=281px" src="<?php echo base_url(); ?>assets/upload/<?php echo $row['foto']; ?>" alt="" />
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="<?php echo base_url(); ?>assets/site/images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo $row['judul']; ?></h2>
								<span>
									<span><?php echo currency_format($row['harga']); ?></span>
								
								</span>
								<!-- <p><b>Tersedia:</b> <?php echo $row['judul']; ?></p> -->
								<p><b>Di Update Tanggal:</b> <?php echo date('d M Y H:i:s',strtotime($row['tgl_input_pro'])); ?></p>
								<p><b>Stok:</b> <?php echo $row['jumlah']; ?></p>
								<p><b>Kondisi:</b> <?php echo $row['kondisi']; ?></p>
								<p><b>Merk:</b> <?php echo $row['merk']; ?></p>
								<p><b>Keterangan:</b> <?php echo $row['ket']; ?></p>
							</div><!--/product-information-->
							 <form role="form" action="<?php echo base_url(); ?>site2/mkeranjang" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="id_produk" value="<?php echo $row['id_produk']; ?>">
								<input type="hidden" name="namabarang" value="<?php echo $row['judul']; ?>">
								<input type="hidden" name="harga" value="<?php echo $row['harga']; ?>">
								<div class="row">
								<div class="col-md-4">
								<input type="number" class="form-control" name="jmlbeli" value="">
								</div>
								</div>
							
							<!-- <button type="button" class="btn btn-default get"><a href="<?php// echo base_url(); ?>alamat-<?php //echo strtolower(str_replace(' ','-',preg_replace("/[^a-zA-Z0-9\s]/", "", $row['judul']))).'-'.$row['id_produk']; ?>" class="fa fa-shopping-cart"> Beli Sekarang</a></button> -->

							<button type="submit" class="btn btn-default get"><a class="fa fa-shopping-cart"> Beli Sekarang</a></button>
							</form>

						</div>
					</div><!--/product-details-->
					<?php } ?>
				</div>
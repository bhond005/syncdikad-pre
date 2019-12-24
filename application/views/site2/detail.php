<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('incsite/head'); ?>
</head><!--/head-->

<body>
	<?php $this->load->view('incsite/head4'); ?>
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php $this->load->view('incsite/sidebar2'); ?>
				</div>
				
				<?php $this->load->view('incsite/detail_produk2'); ?>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2019.</p>
					<p class="pull-right">Designed by <span>bhond005 and Developed by Trisnatya Mahardhika</span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	<?php $this->load->view('incsite/footer2'); ?>
</body>
</html>
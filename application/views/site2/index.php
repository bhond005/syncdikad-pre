<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('incsite/head'); ?>
</head><!--/head-->
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
<body>
	<?php $this->load->view('incsite/head4'); ?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php $this->load->view('incsite/sidebar2'); ?>
				</div>
				
				<?php $this->load->view('incsite/produk2'); ?>
			</div>
		</div>
	</section>
	
	<?php $this->load->view('incsite/footer'); ?>
  	<?php $this->load->view('incsite/footer2'); ?>
    
</body>
</html>
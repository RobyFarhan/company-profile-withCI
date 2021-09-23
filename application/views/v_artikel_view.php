<!DOCTYPE html>
<html>
	<head>
		
	<!-- js-->
	<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/modernizr.custom.js"></script>
	<title>Shipping a Transportation Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta charset="utf-8" />
	<meta name="keywords" content="Shipping Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
                                   Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script> 
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		     }, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //for-mobile-apps -->
	 <link href="<?php echo base_url();?>assets/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
	<!--banner slider  -->
	<link href="<?php echo base_url();?>assets/css/JiSlider.css" rel="stylesheet">
	<!-- //banner-slider -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/flexslider.css" type="text/css" media="screen" property="" />
	 <link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="//fonts.googleapis.com/css?family=Rubik:400,500,700,900" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
		
	</head> 
	

	<div>
	<br> <br>
		<div class="container">
		<div style="margin-top: 20px">
		<div class="row">
		<div class="col-sm-6" style="background-color:#fff;">
			<form class="form-horizontal" enctype="multipart/form-data">
				<input type="hidden" id="artikel_id" name="artikel_id" value="<?php echo $dt_view[0]->artikel_id;?>" readonly />
				<div>
					<div style="margin-bottom: 20px";>	
						<h1 style="text-align:center" id="judul" name="judul" readonly> <?php echo $dt_view[0]->artikel_judul;?></h1>
					</div>
				</div>
				<div>
					<div style="margin-bottom: 20px";>		
						<img id="output" width="300" height="200" src="<?php echo base_url().$dt_view[0]->artikel_image; ?>" class="img-artikel">
					</div>
				</div>
				<div>
					<div style="margin-bottom: 20px";>
						
						<p style="text-align:justify" id="deskripsi" name="deskripsi" readonly><?php echo html_entity_decode($dt_view[0]->artikel_isi);?></p>
					</div>
				</div>	
			</form>
		</div>
		</div>
		</div>	
	</div>
	</div>
	<div class="clearfix"></div>
	<div style="padding-top: 30px;padding-left: 30px; margin-bottom: 20px;">
		<button type="button" class="btn btn-success" name="icon-back" id="icon-back">Kembali</button>
	</div>
	<br> <br>
</html>





	
<script>
	//untuk aksi button kembali
	$("#icon-back").on("click", function(){
		window.location.replace('<?php echo base_url();?>Dashboard/list_artikel');
	});
	
	var loadFile = function(event) {
	var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
	};
</script>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Produk Kami </title>
	<link rel="stylesheet" href="assets/css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Crimson+Pro" rel="stylesheet">
</head>
	
	
	<div class="container mt-2">
			<div class="inner_sec_info_wthree_agile py-5">
				<div class="row help_full py-sm-4">

					<div class="col-md-6 pt-lg-5 mt-lg-5 banner_bottom_left">
						<h3>Profil</h3>
						<h1 style="text-align:center" id="judul" name="judul" readonly> <?php echo $dt_view[0]->judul_profil;?></h1>
						<p class="mb-3">Patasindo adalah pellentesque convallis diam consequat magna vulputate malesuada. Cras a ornare elit. Nulla viverra pharetra sem, eget
							pulvinar neque pharetra ac. Lorem Ipsum convallis diam consequat magna vulputate malesuada. Cras a ornare elit. Nulla
							viverra pharetra sem, eget pulvinar neque pharetra ac.
						</p>
					</div>
					<div class="col-md-6 banner_bottom_grid help">
						<img src="<?php echo base_url(); ?>assets/images/2.png" alt=" " class="img-fluid" width="304" height="236">
					</div>
					<div class="clearfix"></div>
					<div style="padding-top: 30px;padding-left: 30px; margin-bottom: 20px;">
					<button type="button" class="btn btn-success" name="icon-back" id="icon-back">Kembali</button>
					</div>
				</div>
			</div>
		</div>
		
	

	
	
<script>
	//untuk aksi button kembali
	$("#icon-back").on("click", function(){
		window.location.replace('<?php echo base_url();?>');
	});
	
	var loadFile = function(event) {
	var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
	};
</script>
</html>	
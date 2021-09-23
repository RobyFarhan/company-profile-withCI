<!DOCTYPE html>
<html>
	<head>
		<!-- js-->
		<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/modernizr.custom.js"></script>
		
		<!-- Start ckeditor -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
		<!-- End ckeditor -->
	</head> 

	<div>
		<h1>Tambah Produk</h1>
		<br />
		<div>
			<form class="form-horizontal" action="<?php echo base_url(); ?>About/produk_add" method="post" enctype="multipart/form-data">
				<div>
					<label>Nama Produk</label>
					<input type="text" id="judul" name="judul" placeholder="Nama Produk" maxlength="100" autocomplete="off" required />
				</div>
				<div>
					<label>Isi Produk</label>
					<textarea class="ckeditor" id="deskripsi" name="deskripsi"></textarea>
				</div>
				<div align="center">
					<button type="submit"><i class="fa fa-save"></i> Simpan</button>
				</div>
				</form>
		</div>
	</div>
	<div class="clearfix"></div>
	<div style="padding-top: 30px;padding-left: 30px;">
		<button type="button" name="icon-back" id="icon-back">Kembali</button>
	</div>
</html>
	
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
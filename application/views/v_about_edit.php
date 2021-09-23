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
		<h1>Ubah Produk</h1>
		<br />
		<div>
			<form class="form-horizontal" action="<?php echo base_url(); ?>About/update_produk" method="post" enctype="multipart/form-data">
				<input type="hidden" id="id_produk" name="id_produk" value="<?php echo $dt_edit[0]->id_produk;?>" readonly />
				<div>
					<label>Nama Produk</label>
					<input type="text" id="nama" name="nama" value="<?php echo $dt_edit[0]->id_produk;?>" maxlength="100" autocomplete="off" required />
				</div>
				<div>
					<label>Isi Produk</label>
					<textarea class="ckeditor" id="deskripsi" name="deskripsi"><?php echo $dt_edit[0]->isi_produk;?></textarea>
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
		window.location.replace('<?php echo base_url();?>About/list_produk');
	});
	
	var loadFile = function(event) {
	var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
	};
</script>
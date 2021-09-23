<!DOCTYPE html>
<html>
	<div class="content-wrapper">

	<div>
		<section class="content-header">
		
		<h1>
			Artikel
			<small>Manajemen Artikel</small>
		</h1>
		<br />
		<section class="content">
		<div class="col-lg-12">
		<div class="box box-primary">
		<div>
		<div class="box-body">
			<form class="form-horizontal" action="<?php echo base_url(); ?>Dashboard/artikel_add" method="post" enctype="multipart/form-data">
				<div>
					<label>Judul Artikel</label>
					<input type="text" id="judul" name="judul" placeholder="Judul Artikel" maxlength="100" autocomplete="off" required />
				</div> <br/>
				<div>
					<label>Isi Artikel</label>
					<textarea class="ckeditor" id="deskripsi" name="deskripsi"></textarea>
				</div> <br/>
				<div>
					<label>Foto Artikel</label>
					<input type="file" id="cover" name="cover" accept="image/*" onchange="loadFile(event)" required />
					<img id="output" width="200" height="200" />					
				</div> <br/>
				<div align="center">
					<button type="submit"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</form>
		</div>
		</div>
		</div>
		</section>
		</div>
		</section>
	</div>
	<div class="clearfix"></div>
	<div style="padding-top: 30px;padding-left: 30px;">
		<button type="button" name="icon-back" id="icon-back">Kembali</button>
	</div>
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

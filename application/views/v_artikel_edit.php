<!DOCTYPE html>
<html>
	<head>
		<!-- Start ckeditor -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
		<!-- End ckeditor -->
	</head> 
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Artikel
			<small>Manajemen Artikel</small>
		</h1>
	</section>	
	</br>
	<section class="content">
		<div>
		<div class="box box-primary">
			<div class="box-body">
		
		
			<form class="form-horizontal" action="<?php echo base_url(); ?>Dashboard/update_artikel" method="post" enctype="multipart/form-data">
				<input type="hidden" id="artikel_id" name="artikel_id" value="<?php echo $dt_edit[0]->artikel_id;?>" readonly />
				<div class="box-body">
				<div>
					<label>Judul Artikel</label> </br>
					<input type="text" id="judul" name="judul" value="<?php echo $dt_edit[0]->artikel_judul;?>" maxlength="100" autocomplete="off" size="70" required />
				</div>
				</div>
				<div class="box-body">
				<div>
					<label>Isi Artikel</label>
					<textarea class="ckeditor" id="deskripsi" name="deskripsi"><?php echo $dt_edit[0]->artikel_isi;?></textarea>
				</div>
				</div>
				<div class="box-body">
				<div>
					<label>Foto Artikel</label>
					<input type="file" id="cover" name="cover" accept="image/*" onchange="loadFile(event)" /> </br>
					<img id="output" width="200" height="200" src="<?php echo base_url().$dt_edit[0]->artikel_image; ?>" />
				</div>
				<div align="center">
					<button type="submit"><i class="fa fa-save"></i> Simpan</button>
				</div>
				</div>
			</form>
			
			
			</div>
		</div>
		</div>
	
</section>
</div>

<!--
	<?php	print_r(md5('patasindo')); ?>
	-->
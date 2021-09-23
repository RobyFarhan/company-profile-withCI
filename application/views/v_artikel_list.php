<!DOCTYPE html>
<html>
	<head>
		<!-- js-->
		<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/modernizr.custom.js"></script>
	</head> 

	<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Artikel
			<small>Manajemen Artikel</small>
		</h1>
	</section>	
		<section class="content">
			<div class="row">
				<div class="col-lg-12">
				 <div style="padding-top: 5px;">
				  <button type="button" class="btn btn-primary" name="icon-add" id="icon-add">Tambah Artikel</button>
				 </div>
				 <br/>
				  <div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Artikel</h3>
					</div>
					<div class="box-body">
						<table border="1px" width="100%">
							<thead>
								<tr>			
									<th style= "padding: 8px">No</th>
									<th style= "padding: 8px">Judul Artikel</th>
									<th style= "padding: 8px">Foto Artikel</th>
									<th style= "padding: 8px">Tgl Create Artikel</th>
									<th style= "padding: 8px">Aksi Artikel</th>
								</tr> 
							</thead>
							<tbody>
								<?php 
								$i=1; foreach($list_artikel as $dt){ ?>
								<tr>				
								    <td style="text-align:center;"><?php echo $i; ?></td>
									<td style= "padding: 8px"><?php echo $dt['artikel_judul']; ?></td>
									<td style= "padding: 8px"><img width="130" height="100" src="<?php echo base_url().''.$dt['artikel_image']; ?>"></td>
									<td style= "padding: 8px"><?php echo date('d-M-Y H:i:s', strtotime($dt['artikel_tanggal'])); ?></td>
									<td style="text-align:center;">
										<a href="<?php echo base_url() ?>Dashboard/edit_artikel/<?php echo $dt['artikel_id'] ?>" title="Ubah Data <?php echo $dt['artikel_judul']; ?> "> Ubah </a>&nbsp;
										<a href="<?php echo base_url() ?>Dashboard/view_artikel/<?php echo $dt['artikel_id'] ?>" title="Lihat Data <?php echo $dt['artikel_judul']; ?> "> Lihat </a>&nbsp;
										<a href="<?php echo base_url() ?>Dashboard/delete_artikel/<?php echo $dt['artikel_id'] ?>" title="Hapus Data <?php echo $dt['artikel_judul']; ?> "> Hapus </a>
									</td>
								</tr>
								<?php $i++; } ?>
							</tbody>
						</table>
						
					</div>
				  </div> 
				</div>
		</div>
		<script>
		//untuk aksi button add
			$("#icon-add").on("click", function(){
			window.location.replace('<?php echo base_url();?>Dashboard/add_artikel');
			});
		</script>

		
		</section>
</div>

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
			Profil
			<small>Editor</small>
		</h1>
	</section>	
		<section class="content">
			<div class="row">
				<div class="col-lg-12">
				 
				  <div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Profil</h3>
					</div>
					<div class="box-body">
						<table border="1px" width="100%">
							<thead>
								<tr>			
									<th style= "padding: 8px">No</th>
									<th style= "padding: 8px">Judul </th>
									<th style= "padding: 8px">Foto Profil</th>
									<th style= "padding: 8px">Aksi Profil</th>
								</tr> 
							</thead>
							<tbody>
								<?php $i=1; foreach($profil_perusahaan as $pp){ ?>
								<tr>				
								    <td style="text-align:center;"><?php echo $i; ?></td>
									<td style= "padding: 8px"><?php echo $pp['judul_profil']; ?></td>
									<td style= "padding: 8px"><img width="130" height="100" src="<?php echo base_url().''.$pp['gambar_profil']; ?>"></td>
									<td style= "text-align:center;">
										<a href="<?php echo base_url() ?>Dashboard/edit_profil/<?php echo $pp['id_profil'] ?>" title="Ubah Data <?php echo $pp['judul_profil']; ?> "> Ubah </a>&nbsp;
										<a href="<?php echo base_url() ?>Dashboard/view_profil/<?php echo $pp['id_profil'] ?>" title="Lihat Data <?php echo $pp['judul_profil']; ?> "> Lihat </a>&nbsp;
										<a href="<?php echo base_url() ?>Dashboard/delete_profil/<?php echo $pp['id_profil'] ?>" title="Hapus Data <?php echo $pp['judul_profil']; ?> "> Hapus </a>
									</td>
								</tr>
								<?php $i++; } ?>
							</tbody>
						</table>
					</div>
				  </div> 
				</div>
		</div>
		</section>
</div>

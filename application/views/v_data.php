<!DOCTYPE html>
<html>
<head>
<title>Membuat Pagination Pada CodeIgniter | MalasNgoding.com</title>
</head>
<body>
<h1>Membuat Pagination Pada CodeIgniter | MalasNgoding.com</h1>
<table border="1">
	<tr>
		<th>no</th>
		<th>judul</th>
		<th>isi</th>
		<th>tanggal</th>
	</tr>
		<?php
		$no = $this->uri->segment('3') + 1;
		foreach($tabel_artikel as $u){
		?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $u->artikel_judul ?></td>
		<td><?php echo $u->artikel_isi ?></td>
		<td><?php echo $u->artikel_tanggal ?></td>
	</tr>
		<?php } ?>
</table>
<br/>
		<?php echo $this->config->item("num_links"); ?>
</body>
</html>
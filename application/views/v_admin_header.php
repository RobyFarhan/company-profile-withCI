<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Malas Ngoding | Dashboard</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/bower_components/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/bower_components/morris.js/morris.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/bower_components/jvectormap/jquery-jvectormap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/kreasiku.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<header class="main-header">			
			<a href="<?php echo base_url(); ?>" class="logo">
				<span class="logo-mini"><b>MN</b></span>
				<span class="logo-lg"><b>Patasindo</b>Admin</span>
			</a>
			
			<nav class="navbar navbar-static-top">
				
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?php echo base_url(); ?>assets/images/kevinhart.jpg" class="user-image" alt="User Image">
								<span class="hidden-xs">HAK AKSES : <b><?php echo $this->session->userdata('level') ?></b></span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-header">
									<img src="<?php echo base_url(); ?>assets/images/kevinhart.jpg" class="img-circle" alt="User Image">
									<p>
										<?php echo $this->session->userdata('username') ?>
										<small>Hak akses : <?php echo $this->session->userdata('level') ?></small>
									</p>
								</li>
								
								<li class="user-footer">
									<div class="pull-right">
										<a href="<?php echo base_url().'dashboard/logout' ?>" class="btn btn-default btn-flat">Keluar</a>
									</div>
								</li>
							</ul>
						</li>
						
					</ul>
				</div>
			</nav>
		</header>
		<aside class="main-sidebar">
			<section class="sidebar">
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?php echo base_url(); ?>assets/images/kevinhart.jpg" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<?php 
						$id_user = $this->session->userdata('id');
						$user = $this->db->query("select * from m_user where id='$id_user'")->row();
						?>
						<p><?php echo $user->nama; ?></p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
				
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">MAIN NAVIGATION</li>
					<li>
						<a href="<?php echo base_url().'dashboard' ?>">
							<i class="fa fa-dashboard"></i>
							<span>DASHBOARD</span>


						</a>
					</li>
					
					<li>
						<a href="<?php echo base_url().'dashboard/artikel' ?>">
							<i class="fa fa-pencil"></i>
							<span>ARTIKEL</span>
						</a>
					</li>
					
					<li>
						<a href="<?php echo base_url().'dashboard/profil' ?>">
							<i class="fa fa-pencil"></i>
							<span>PERUSAHAAN</span>
						</a>
					</li>
					
					<li>
						<a href="<?php echo base_url().'dashboard/ganti_password' ?>">
							<i class="fa fa-pencil"></i>
							<span>GANTI PASSWORD</span>
						</a>
					</li>

					<li>
						<a href="<?php echo base_url().'dashboard/keluar' ?>">
							<i class="fa fa-share"></i>
							<span>KELUAR</span>
						</a>
					</li>
				</ul>
			</section>
		</aside>
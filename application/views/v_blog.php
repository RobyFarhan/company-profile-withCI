<html>
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

	<!-- header -->
	<section class="w3layouts-header py-2">
		<div class="container">
			  <!-- header -->
        <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-gradient-secondary">

                    <h1>
                        <a class="navbar-brand" href="<?php echo base_url();?>">
                          Shipping 
                            
                        </a>
                    </h1>
                    <button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-lg-auto text-center">
                            <li class="nav-item active  mr-3">
                                <a class="nav-link" href="<?php echo base_url();?>">Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item  mr-3">
                                <a class="nav-link" href="about.html">about</a>
                            </li>
							 <li class="nav-item  mr-3">
                                <a class="nav-link" href="services.html">Services</a>
                            </li>
                            <li class="nav-item dropdown mr-3">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Pages
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="gallery.html">Gallery</a>
									<a class="dropdown-item" href="typo.html">Typography</a>
                                </div>
                            </li>
                            <li class="nav-item mr-3">
                                <div class="ab_button">
									<a class="btn btn-primary btn-lg hvr-underline-from-left" href="<?php echo base_url();?>login">Sign In </a>
								</div>
                            </li>
							
                        </ul>
                    </div>

                </nav>
        </header>
        <!-- //header -->

		</div>
	</section>
	<!-- //header -->
	
	

	<div class="row">
		<div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Blog
            </h3>
            <p class="subtitle-a">
              Artikel Terbaru Dari Kami.
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
	</div>
<div class="container">	
	<div class="row">

		<?php 
			$no = 1;
			foreach($tbl_artikel as $u){ 
		?>
		
		<div class="col-md-4">
			<div class="card card-blog">
			<a href="<?php echo base_url() ?>Artikel/view_artikel/<?php echo $u->artikel_id ?>" title="Lihat Data <?php echo $u->artikel_judul ?> "> 
				<div class="hover06 column">
				<figure> <img src="<?php echo $u->artikel_image?>" width="350" height="333">  </figure> 
				</div>
				<h4 class="s-title"> <?php echo $u->artikel_judul?> </h4>
				<p class="tanggal-post"> <?php echo $u->artikel_tanggal?> </p>
			</div> </a>&nbsp;
		</div>
		<?php } ?>
	</div>
</div>
</html>


http://localhost/malasngoding/crud

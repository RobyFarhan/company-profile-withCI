<!DOCTYPE html>
<html>
	<head>
		<!-- js-->
		<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/modernizr.custom.js"></script>
	</head> 


<!--/ Section Blog Star /-->
  <section id="blog" class="blog-mf sect-pt4 route">
    <div class="container">
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
      <div class="row"> 
	  <?php foreach($list_artikel as $a){ ?>  
        <div class="col-md-4"> 
          <div class="card card-blog">
              <div class="card-img"> 
			  <a href="<?php echo base_url() ?>Artikel/view_artikel/<?php echo $a['artikel_id'] ?>" title="Lihat Data <?php echo $a['artikel_judul']; ?> ">
                <img height="170" class="img-fluid" src="<?php echo base_url().''.$a['artikel_image']; ?>">
              </div>
              <div class="card-body">
                <div class="card-category-box">
					<h4 class="card-title"> <?php echo $a['artikel_judul']; ?>
				</div>
              <div class="card-footer">          
                <div class="post-date">
					<span class="ion-ios-clock-outline"></span> <?php echo date('d-M-Y H:i:s', strtotime($a['artikel_tanggal']));?>
                </div>
				</a>
              </div> 
              </div> 
          </div>  <br/>
		</div> 
		<?php } ?>  
      </div>
	</div>
	

  </section>
  <!--/ Section Blog End /-->

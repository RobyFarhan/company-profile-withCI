<!-- footer -->
	<footer>
		<section class="footer py-md-4">
			<div class="container py-1 mt-2">
				<div class="row footer_inner_info_w3ls_agileits">
					<div class="col-md-3 footer-left">
						<h2><a href="<?php echo base_url(); ?>"> Customer Care</a></h2>
						<p class="mb-3 mt-3">Lorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora.</p>
						<ul class="social-nav footer-social social two">
							<li>
								<a href="http://pekagroup.id/">
									<i class="fab fa-facebook-f" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="http://pekagroup.id/">
									<i class="fab fa-twitter" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="http://pekagroup.id/">
									<i class="fab fa-instagram" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="http://pekagroup.id/">
									<i class="fab fa-pinterest" aria-hidden="true"></i>
								</a>
							</li>
						</ul>
					</div>

<!-- USEFUL LINKS -->
					<div class="col-md-2 sign-gd">
						<h4>Useful Links</h4>
						<ul>
							<li><a href="<?php echo base_url(); ?>">Home</a></li>
							<li><a href="about.html">About</a></li>
							<li><a href="services.html">Services</a></li>
							<li><a href="gallery.html">Gallery</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</div>
			<!-- INSTAGRAM OFF 		
					<div class="col-md-4 sign-gd flickr-post">
						<h4>Instagram</span></h4>
						<ul>
							<li><a href="#"><img src="<?php echo base_url(); ?>assets/images/g1.jpg" alt=" " class="img-fluid" /></a></li>
							<li><a href="#"><img src="<?php echo base_url(); ?>assets/images/g2.jpg" alt=" " class="img-fluid" /></a></li>
							<li><a href="#"><img src="<?php echo base_url(); ?>assets/images/g3.jpg" alt=" " class="img-fluid" /></a></li>
							<li><a href="#"><img src="<?php echo base_url(); ?>assets/images/g2.jpg" alt=" " class="img-fluid" /></a></li>
							<li><a href="#"><img src="<?php echo base_url(); ?>assets/images/g1.jpg" alt=" " class="img-fluid" /></a></li>
							<li><a href="#"><img src="<?php echo base_url(); ?>assets/images/g3.jpg" alt=" " class="img-fluid" /></a></li>
							<li><a href="#"><img src="<?php echo base_url(); ?>assets/images/g2.jpg" alt=" " class="img-fluid" /></a></li>
							<li><a href="#"><img src="<?php echo base_url(); ?>assets/images/g3.jpg" alt=" " class="img-fluid" /></a></li>
							<li><a href="#"><img src="<?php echo base_url(); ?>assets/images/g1.jpg" alt=" " class="img-fluid" /></a></li>
						</ul>
					</div> -->
					<div class="col-md-3 sign-gd-two">
						<h4>Contact Information</h4>
						<div class="address">
							<div class="address-grid">
								<div class="address-left">
									<i class="fa fa-phone" aria-hidden="true"></i>
								</div>
								<div class="address-right">
									<h6>Phone Number</h6>
									<p>+1 234 567 8901</p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="address-grid">
								<div class="address-left">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</div>
								<div class="address-right">
									<h6>Email Address</h6>
									<p>Email :<a href="mailto:example@email.com"> mail@example.com</a></p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="address-grid">
								<div class="address-left">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
								</div>
								<div class="address-right">
									<h6>Location</h6>
									<p>1234k Avenue,Block-4,New York City.

									</p>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<!-- //footer -->
	</footer>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Shipping</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="agileits-w3layouts-info">
						<img src="<?php echo base_url(); ?>assets/images/g1.jpg" class="img-fluid" alt="" />
						<p>Duis venenatis, turpis eu bibendum porttitor, sapien quam ultricies tellus, ac rhoncus risus odio eget nunc. Pellentesque ac fermentum diam. Integer eu facilisis nunc, a iaculis felis. Pellentesque pellentesque tempor enim, in dapibus turpis porttitor quis. </p>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	<!-- //Modal -->

	<!-- js -->
	<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.3.min.js"></script>
	<!-- //js-->
	<!--banner-slider-->
	<script src="<?php echo base_url(); ?>assets/js/JiSlider.js"></script>
	<script>
		$(window).load(function() {
			$('#JiSlider').JiSlider({
				color: '#fff',
				start: 1,
				reverse: false
			}).addClass('ff')
		})
	</script>
	<!-- //banner-slider -->
	<!-- flexSlider -->
	<script defer src="<?php echo base_url(); ?>assets/js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(window).load(function() {
			$('.flexslider').flexslider({
				animation: "slide",
				start: function(slider) {
					$('body').removeClass('loading');
				}
			});
		});
	</script>
	<!-- //flexSlider -->

	<!-- start-smooth-scrolling -->
	<script src="<?php echo base_url(); ?>assets/js/move-top.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/easing.js"></script>
	<script>
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->
	<!-- stats -->
	<script src="<?php echo base_url(); ?>assets/js/jquery.waypoints.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
	<!-- //stats -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function() {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<script src="<?php echo base_url(); ?>assets/js/SmoothScroll.min.js"></script>
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
</body>

</html>
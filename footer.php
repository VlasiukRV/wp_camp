	</div><!-- close .container -->
	<div class="clearfix"></div>
	</div><!-- close #main -->
    <style>.cph{
	float:right; font-family:Economica,sans-serif; font-size:15px; margin-top:-23px;}</style>
	  <?php if(is_front_page()){  
	  ?><div style="full_map; display:none;">
   <?php  echo do_shortcode('[google-map-sc width="100%" height="380" align="center"]'); ?>
 </div><?php } ?>

	<footer>
		<div class="container">
			<?php if(of_get_option('footer_widgets', '1')): ?>
				<div id="footer-widgets" >
				<div class="footer-<?php echo of_get_option('footer_widgets_column', '4'); ?>-column">
				<?php if ( ! dynamic_sidebar( 'Footer Widgets' ) ) : ?>
				<?php endif; // end sidebar widget area ?>
				</div>
				</div>
			<div class="clearfix"></div>
			<?php endif; ?>
            <?php  echo do_shortcode('[cn-social-icon]'); ?>
			<div style="font-size:15px;" class="cph" id="copyright">
            <a style="color:white;" href="http://www.morecrossdigital.com/" target="_blank"> Website Design by Morecross Internet Solutions, Corby </a>
				<?php //echo of_get_option('copyright', '&copy; 2013 All Rights Reserved. Designed by <a href="http://progressionstudios.com/" target="_blank">Progression Studios</a>.'); ?>
			</div><!-- close #copyright -->
		</div><!-- close  .container -->
		<div class="clearfix"></div>
		<div id="footer-dotted"></div>
        <p  style="font-family:Economica,sans-serif; font-size:15px;" color:white; align="center"><a style="color:white;" href="<?php echo site_url(); ?> ">Home</a>     |      <a style="color:white;" href="<?php echo site_url(); ?>/about-us">About Us</a>     |      <a style="color:white;" href="<?php echo site_url(); ?>/products">Products</a>     |      <a style="color:white;" href="<?php echo site_url(); ?>/suppliers">Suppliers</a>    |       <a style="color:white;" href="<?php echo site_url(); ?>/enquiry">Enquiry</a>     |      <a style="color:white;" href="<?php echo site_url(); ?>/contact-us">Contact us</a></p>
<p  style="font-family:Economica,sans-serif; font-size:15px;" align="center">Copyright &copy; LYNBROOK LIMITED 2014. All rights reserved.</p>


	</footer>
	
	<script type="text/javascript">
	jQuery(document).ready(function($) {
	    $('.flexslider').flexslider({
			animation: "<?php echo of_get_option('animation', 'fade'); ?>",              //String: Select your animation type, "fade" or "slide"
			slideDirection: "<?php echo of_get_option('slide_direction', 'horizontal'); ?>",   //String: Select the sliding direction, "horizontal" or "vertical"
			slideshow: <?php echo of_get_option('autoplay', true); ?>,                //Boolean: Animate slider automatically
			slideshowSpeed: <?php echo of_get_option('transition', 6500); ?>,           //Integer: Set the speed of the slideshow cycling, in milliseconds
			animationDuration: 500,         //Integer: Set the speed of animations, in milliseconds
			directionNav: <?php echo of_get_option('nextprev', false); ?>,             //Boolean: Create navigation for previous/next navigation? (true/false)
			controlNav: <?php echo of_get_option('controllingnavigation', true); ?>,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
			keyboardNav: true,              //Boolean: Allow slider navigating via keyboard left/right keys
			mousewheel: false,              //Boolean: Allow slider navigating via mousewheel
			prevText: "Previous",           //String: Set the text for the "previous" directionNav item
			nextText: "Next",               //String: Set the text for the "next" directionNav item
			pausePlay: false,               //Boolean: Create pause/play dynamic element
			pauseText: 'Pause',             //String: Set the text for the "pause" pausePlay item
			playText: 'Play',               //String: Set the text for the "play" pausePlay item
			randomize: false,               //Boolean: Randomize slide order
			slideToStart: 0,                //Integer: The slide that the slider should start on. Array notation (0 = first slide)
			useCSS: true,
			animationLoop: true,            //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
			pauseOnAction: true,            //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
			pauseOnHover: false            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
			
	    });
	});
	</script>
	<?php if(of_get_option('tracking_code')): ?>
		<?php echo '<script type="text/javascript">'; ?>
		<?php echo of_get_option('tracking_code'); ?>
		<?php echo '</script>'; ?>
	<?php endif; ?>
	<?php wp_footer(); ?>
</body>
</html>
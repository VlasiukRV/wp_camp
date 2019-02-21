<?php get_header(); ?>
		<div id="content">

				<h2><?php echo of_get_option('404_error', '404 Page Not Found'); ?></h2>

				<br>
				<div class="404-error">
				<?php echo of_get_option('404_error_text', 'The page you are looking is not available. You can customize this text in the Theme Options Panel'); ?>
				</div>
				
				<br><br>
				
		<div class="clearfix"></div>
		</div><!-- close #content -->
<?php get_footer(); ?>
<?php
// Template Name: Homepage with Blog
get_header(); ?>
			
			<?php include 'slider.php'; ?>	
			
			<?php if(of_get_option('fw_blog', 'no') == 'no'): ?><div id="container-sidebar"><?php endif; ?>

				<h2><?php echo of_get_option('blog_tagline', 'Our Blog'); ?></h2>

				<?php



				if ( get_query_var('paged') ) {
				    $paged = get_query_var('paged');
				} else if ( get_query_var('page') ) {
				    $paged = get_query_var('page');
				} else {
				    $paged = 1;
				}



				query_posts( array( 'post_type' => 'post', 'paged' => $paged
				 ) );


				// begin the loop
				if ( have_posts() ) : while ( have_posts() ) : the_post();


				?>
				<?php
				global $more;
				$more = 0;
				?>
				
				<?php get_template_part( 'content', 'blog' ); ?>
				
				<?php endwhile; ?>
				<?php
				endif;

				// reset loop
				wp_reset_postdata();
				?>

				<?php kriesi_pagination($pages = '', $range = 2); ?>

			<?php if(of_get_option('fw_blog', 'no') == 'no'): ?></div><!-- close #container-sidebar --><?php endif; ?>

	<?php if(of_get_option('fw_blog', 'no') == 'no'): ?><?php get_sidebar(); ?><?php endif; ?>
<?php get_footer(); ?>
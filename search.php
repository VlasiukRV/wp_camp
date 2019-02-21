<?php get_header(); ?>
		<div id="content">
			

			<?php if(of_get_option('blog_sidebar', '1')): ?><div id="container-sidebar"><?php endif; ?>
				<?php if (function_exists('progression_breadcrumbs')) progression_breadcrumbs(); ?>
				
				<h2><?php printf( __( 'Search Results for: %s', 'progression' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'blog' ); ?>
				
				
				<?php endwhile; else: ?>
					<p><em><?php _e('Sorry, no posts matched your criteria.','progression'); ?></em></p>
				<?php endif; ?> 
				
				
				
				
				<?php kriesi_pagination($pages = '', $range = 2); ?>
				
				<?php if(of_get_option('blog_sidebar', '1')): ?></div><!-- close #container-sidebar --><?php endif; ?>


				<?php if(of_get_option('blog_sidebar', '1')): ?><?php get_sidebar(); ?><?php endif; ?>
			
		<div class="clearfix"></div>
		</div><!-- close #content -->
<?php get_footer(); ?>
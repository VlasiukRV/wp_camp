<?php get_header(); ?>
		<div id="content">
			
			
			<?php if(of_get_option('blog_sidebar', '1')): ?><div id="container-sidebar"><?php endif; ?>
				
				<?php if (function_exists('progression_breadcrumbs')) progression_breadcrumbs(); ?>
				
				<?php if ( have_posts() ) : ?>
					<?php
						the_post();
					?>
					
					<h2><?php printf( __( 'Author: %s', 'progression' ), get_the_author() ); ?></h2>
					
					<?php endif; ?>

					<?php
						rewind_posts();
						 get_template_part( 'loop', 'author' );
					?>
					
					<?php while(have_posts()): the_post(); ?>
					<?php get_template_part( 'content', 'blog' ); ?>
					<?php endwhile; ?>
				
				<?php kriesi_pagination($pages = '', $range = 2); ?>
				
				<?php if(of_get_option('blog_sidebar', '1')): ?></div><!-- close #container-sidebar --><?php endif; ?>


				<?php if(of_get_option('blog_sidebar', '1')): ?><?php get_sidebar(); ?><?php endif; ?>
			
		<div class="clearfix"></div>
		</div><!-- close #content -->
<?php get_footer(); ?>
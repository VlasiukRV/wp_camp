<?php get_header(); ?>
		<div id="content">
			
			<?php if(of_get_option('blog_sidebar', '1')): ?><div id="container-sidebar"><?php endif; ?>
				
				<?php if (function_exists('progression_breadcrumbs')) progression_breadcrumbs(); ?>
				
				<h2>
					<?php if(is_day()): ?>
						<?php printf(__('Daily Archives: %s', 'progression'), get_the_date()); ?>
					<?php elseif(is_month()) : ?>
						<?php printf(__('Monthly Archives: %s', 'progression'), get_the_date('F Y')); ?>
					<?php elseif(is_year()) : ?>
						<?php printf(__('Yearly Archives: %s', 'progression'), get_the_date('Y')); ?>
					<?php elseif(is_category()): ?>
						<?php printf(__('%s Category', 'progression'), single_cat_title('', false)); ?>
					<?php elseif(is_tag()): ?>
						<?php printf(__('Tag: %s', 'progression'), single_cat_title('', false)); ?>
					<?php else: ?>
						<?php _e('Blog Archives', 'progression'); ?>
					<?php endif; ?>
				</h2>
				
				<div class="archive-description">
					 <?php echo category_description(); ?>
				</div>
				
				
				<?php while(have_posts()): the_post(); ?>
				
				<?php get_template_part( 'content', 'blog' ); ?>
				
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
				<div class="clearfix"></div>
				<?php kriesi_pagination($pages = '', $range = 2); ?>
				
				<?php if(of_get_option('blog_sidebar', '1')): ?></div><!-- close #container-sidebar --><?php endif; ?>


				<?php if(of_get_option('blog_sidebar', '1')): ?><?php get_sidebar(); ?><?php endif; ?>
			
		<div class="clearfix"></div>
		</div><!-- close #content -->
<?php get_footer(); ?>
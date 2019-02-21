<?php get_header(); ?>
	<?php if(of_get_option('blog_sidebar_single', '1')): ?><div id="container-sidebar"><?php endif; ?>
		
			<?php if (function_exists('progression_breadcrumbs')) progression_breadcrumbs(); ?>
			
			<?php $page_for_posts = get_option('page_for_posts'); ?>
			<h2><?php echo get_the_title($page_for_posts); ?></h2>
			
			<?php while(have_posts()): the_post(); ?>
			<div <?php post_class(); ?>>
				<div class="item-container">
					<?php if(get_post_meta($post->ID, 'videoembed_videoembed', true)): ?>
					<div class="video-border">
					<?php echo get_post_meta($post->ID, 'videoembed_videoembed', true) ?>
					</div>
					<?php else: ?>
					<?php if(has_post_thumbnail()): ?>
					<div class="item-container-image item-container-spacer">
						<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
						<a href="<?php echo $image[0]; ?>" class="hover-icon2" rel="prettyPhoto">
							<div class="zoom-icon2">zoom</div>
							<?php the_post_thumbnail('blog-image'); ?>
						</a>
					</div>
					<?php endif; ?>
					<?php endif; ?>
					<div class="item-container-content">
						<h4 class="blog-heading"><?php the_title(); ?></h4>
						<div class="blog-details"><?php _e('Written by','progression'); ?> <?php the_author_posts_link(); ?> <span>:</span> <?php _e('Posted on','progression'); ?> <a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>"><?php the_time('F j, Y'); ?></a> <span>:</span> <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></div>
						<?php the_content(); ?>
						
						<?php the_tags(__( '<div class="tag-cloud"><span>Tags</span>: ', 'progression' ), ', ', '</div>'); ?>
					</div><!-- close .item-container-content -->
				</div><!-- close .item-container -->
			</div><!-- close .blog-post -->

			<?php comments_template(); ?>
			<?php posts_nav_link(); ?>
			
			<?php endwhile; ?>

			<?php //kriesi_pagination($pages = '', $range = 2); ?>

			<?php if(of_get_option('blog_sidebar_single', '1')): ?></div><!-- close #container-sidebar --><?php endif; ?>

<?php if(of_get_option('blog_sidebar_single', '1')): ?><?php get_sidebar(); ?><?php endif; ?>
<?php get_footer(); ?>
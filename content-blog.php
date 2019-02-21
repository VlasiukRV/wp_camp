<div <?php post_class(); ?>>
	<div class="item-container">
		<?php if(has_post_thumbnail()): ?>
		<div class="item-container-image item-container-spacer">
			<a href="<?php the_permalink(); ?>" class="hover-icon2">
			<div class="zoom-icon2 zoom-icon-article2">zoom</div>
			<?php the_post_thumbnail('blog-image'); ?>
			</a>
		</div>
		<?php else: ?>
		<?php if(get_post_meta($post->ID, 'videoembed_videoembed', true)): ?>
		<div class="video-border">
		<?php echo get_post_meta($post->ID, 'videoembed_videoembed', true) ?>
		</div>
		<?php endif; ?>
		<?php endif; ?>
		<div class="item-container-content">
			<h4 class="blog-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			<div class="blog-details"><?php _e('Written by','progression'); ?> <?php the_author_posts_link(); ?> <span>:</span> <?php _e('Posted on','progression'); ?> <a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>"><?php the_time('F j, Y'); ?></a> <span>:</span> <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></div>
			
			<?php the_content('',FALSE,''); ?>

			<?php if(has_more()) { ?>
				<p><a href="<?php the_permalink(); ?>" class="def-button arrow-button more-button-blog"><?php _e('Read More','progression'); ?></a></p>
			<?php } ?>
			<?php the_tags(__( '<div class="tag-cloud"><span>Tags</span>: ', 'progression' ), ', ', '</div>'); ?>
		</div><!-- close .item-container-content -->
	</div><!-- close .item-container -->
</div><!-- close .blog-post -->
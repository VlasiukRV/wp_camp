<div class="item-container">
	
	<?php if(has_post_thumbnail()): ?>
	<div class="item-container-image item-container-spacer">
		<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
		
		<?php if(get_post_meta($post->ID, 'portfoliooptions_externallink', true)): ?>
		<a href="<?php echo get_post_meta($post->ID, 'portfoliooptions_externallink', true) ?>" class="hover-icon2">
			<div class="zoom-icon2 zoom-icon-article2">zoom</div>
		<?php else: ?>
		<?php if(get_post_meta($post->ID, 'portfoliooptions_lightbox', true)): ?>
			<a href="<?php echo get_post_meta($post->ID, 'portfoliooptions_lightbox', true) ?>" rel="prettyPhoto[gallery]" class="hover-icon2">
				<div class="zoom-icon2">zoom</div>
		<?php else: ?>
		<a href="<?php echo $image[0]; ?>" rel="prettyPhoto[gallery]" class="hover-icon2">
			<div class="zoom-icon2">zoom</div>
		<?php endif; ?>
		<?php endif; ?>
			<?php the_post_thumbnail('portfolio-thumb'); ?>
		</a>
	</div>
	<?php else: ?>
		
	<?php if(get_post_meta($post->ID, 'portfoliooptions_videoembed', true)): ?>
		<div class="portfolio-video">
			<?php echo get_post_meta($post->ID, 'portfoliooptions_videoembed', true) ?>
		</div>
	<?php endif; ?>
	
	<?php endif; ?>
	
	<div class="item-container-content">
		<h4 class="aligncenter">
			<?php if(get_post_meta($post->ID, 'portfoliooptions_externallink', true)): ?>
			<a href="<?php echo get_post_meta($post->ID, 'portfoliooptions_externallink', true) ?>">
			<?php else: ?>
			<a href="<?php the_permalink(); ?>">
			<?php endif; ?>
			<?php the_title(); ?>
			</a>
		</h4>
		<h6 class="aligncenter"><?php echo get_the_excerpt(); ?></h6>
	</div><!-- close .item-container-content -->
</div><!-- close .item-container -->
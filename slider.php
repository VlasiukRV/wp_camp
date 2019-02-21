<div class="flex-slider-border">
<div class="flexslider">
	<ul class="slides">
		
		<?php
		$portfolio_type = get_the_term_list( $post->ID, 'portfolio_type' );
		$args = array(
			'showposts' => -1,
			'post_type' => 'portfolio',
			'tax_query' => array(
				array(
					'taxonomy' => 'portfolio_type',
					'field' => 'name',
					'terms'    => $portfolio_type
				)
			)
		);
		$featured = new WP_Query($args);
		?>

		<?php while($featured->have_posts()): $featured->the_post(); ?>
		<?php $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'featured-slider-scaled'); ?>
		
		
		<?php if(get_post_meta($post->ID, 'portfoliooptions_lightbox', true)): ?>
			<li>
	    		<a href="<?php echo get_post_meta($post->ID, 'portfoliooptions_lightbox', true) ?>" rel="prettyPhoto[gallery]">
					<img src="<?php echo $thumbnail[0]; ?>" alt="<?php the_title(); ?>" />
				</a>
				<?php
				$cc = get_the_excerpt();
				if($cc != '') { ?>
					<p class="flex-caption"><?php echo get_the_excerpt(); ?></p>
				<?php } else { ?>
				<?php } ?>
	    	</li>
		<?php else: ?>
		<?php if(get_post_meta($post->ID, 'portfoliooptions_videoembed', true)): ?>
			<li>
				<?php echo get_post_meta($post->ID, 'portfoliooptions_videoembed', true) ?>
	    	</li>
		<?php else: ?>	
			<li>
	    		<?php if(get_post_meta($post->ID, 'portfoliooptions_externallink', true)): ?>
					<a href="<?php echo get_post_meta($post->ID, 'portfoliooptions_externallink', true) ?>">
    					<img src="<?php echo $thumbnail[0]; ?>" alt="<?php the_title(); ?>" />
					</a>
					<?php else: ?>
					<img src="<?php echo $thumbnail[0]; ?>" alt="<?php the_title(); ?>" />
				<?php endif; ?>
				<?php
				$cc = get_the_excerpt();
				if($cc != '') { ?>
					<p class="flex-caption"><?php echo get_the_excerpt(); ?></p>
				<?php } else { ?>
				<?php } ?>
	    	</li>
	
		<?php endif; ?>
		<?php endif; ?>
		<?php endwhile; ?>
		
	</ul>
</div>
</div>
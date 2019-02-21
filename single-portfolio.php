<?php get_header(); ?>
		<?php if(of_get_option('portfolio_post_template', '0')): ?><div id="container-sidebar"><?php endif; ?>
			
			<div id="breadcrumb"><a href="<?php echo site_url(); ?>"><?php _e('Home','progression'); ?></a> / <?php echo $post->post_title; ?></div>
			
			<?php while(have_posts()): the_post(); ?>
			<h2><?php the_title(); ?></h2>
			<?php if(of_get_option('portfolio_post_template', '1')): ?><div class="grid3columnbig"><?php endif; ?>
				<div class="flex-slider-border">
				<div class="flexslider">
					<ul class="slides">
						<?php if(get_post_meta($post->ID, 'portfoliooptions_videoembed', true)): ?>
								<li>
									<?php echo get_post_meta($post->ID, 'portfoliooptions_videoembed', true) ?>
								</li>
						<?php else: ?>
							
						<?php
						$args = array(
						    'post_type' => 'attachment',
						    'numberposts' => '-1',
						    'post_status' => null,
						    'post_parent' => $post->ID,
							'orderby' => 'menu_order',
							'order' => 'ASC'
						);
						$attachments = get_posts($args);
						foreach($attachments as $attachment):
						?>
						<?php $image_full2 = wp_get_attachment_image_src($attachment->ID, 'full'); ?>
						<?php $image_full = wp_get_attachment_image_src($attachment->ID, 'portfolio-single'); ?>
						<li>
							<div class="slider-reuse">
								<div class="item-container-image">
									<a href="<?php echo $image_full2[0]; ?>" class="hover-icon2" rel="prettyPhoto[gallery]">
									<div class="zoom-icon2">zoom</div>
				    				<img src="<?php echo $image_full[0]; ?>" alt="<?php echo $attachment->post_title; ?>" class="rounded" />
									</a>
								</div>
							</div><!-- close .slider-reuse -->
						</li>
						<?php endforeach; ?>
						<?php endif; ?>
				    </ul>
				</div>
				</div>
			<?php if(of_get_option('portfolio_post_template', '1')): ?></div><?php endif; ?>
			
			<?php if(of_get_option('portfolio_post_template', '1')): ?><div class="grid3column lastcolumn"><?php endif; ?>
			<div class="single-spacing">	<?php the_content(); ?></div>
			<?php if(of_get_option('portfolio_post_template', '1')): ?></div><?php endif; ?>
			<div class="clearfix"></div>
			<?php endwhile; ?>

			
			<?php //kriesi_pagination($pages = '', $range = 2); ?>
			
			<?php if(of_get_option('portfolio_post_template', '0')): ?></div><!-- close #container-sidebar --><?php endif; ?>
			
		<?php if(of_get_option('portfolio_post_template', '0')): ?><?php get_sidebar(); ?><?php endif; ?>
<?php get_footer(); ?>
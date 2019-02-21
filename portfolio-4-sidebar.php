<?php
// Template Name: Portfolio Four Column w/ Sidebar
get_header(); ?>
		<div id="container-sidebar">
			<?php if (function_exists('progression_breadcrumbs')) progression_breadcrumbs(); ?>
			<h2><?php the_title(); ?></h2>
			<?php get_template_part( 'child-pages' ); ?>
			
			<?php while(have_posts()): the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>

			<div class="portfolio-items-page">

			<?php
			$portfolio_type = get_the_term_list( $post->ID, 'portfolio_type' );
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'posts_per_page' => '20',
				'post_type' => 'portfolio',
				'tax_query' => array(
					array(
						'taxonomy' => 'portfolio_type',
						'field' => 'name',
						'terms' => $portfolio_type
					)
				),
				'paged' => $paged
			);
			$portfolio = new WP_Query($args);
			$portfolio_count = $portfolio->post_count;
			$count = 1;
			$count_2 = 1;
			while($portfolio->have_posts()): $portfolio->the_post();
				if($count >= 5) { $count = 1; }
			?>
			<div class="grid4column<?php if($count == 4): echo ' lastcolumn'; endif; ?> <?php echo strtolower($tax); ?> all">
				
				<?php get_template_part( 'content', 'portfolio' ); ?>
				
			</div>
			<?php if($count == 4): ?><div class="clearfix"></div><?php endif; ?>
			<?php $count ++; $count_2++; endwhile; ?>

			</div>
<div class="clearfix"></div>
			<?php kriesi_pagination($portfolio->max_num_pages, $range = 2); ?>
			
			<div class="clearfix"></div>
		</div><!-- close #container-sidebar -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
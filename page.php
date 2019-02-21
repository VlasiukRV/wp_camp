<?php get_header(); ?>
	<div id="container-sidebar">
		
		<?php if (function_exists('progression_breadcrumbs')) progression_breadcrumbs(); ?>
		
		<?php while(have_posts()): the_post(); ?>
		<h2><?php the_title(); ?></h2>

		<?php get_template_part( 'child-pages' ); ?>

		<?php the_content(); ?>
		
		<?php wp_link_pages(); ?>
		<?php endwhile; ?>
	</div><!-- close #container-sidebar -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
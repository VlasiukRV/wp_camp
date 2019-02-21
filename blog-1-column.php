<?php while(have_posts()): the_post(); ?>
	
<?php get_template_part( 'content', 'blog' ); ?>


<?php endwhile; ?>
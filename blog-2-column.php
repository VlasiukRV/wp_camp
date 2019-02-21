

<div class="portfolio-items-page">
	
	<?php
	if ( have_posts() ) :
		$count = 1;
		$count_2 = 1;
	?>

<?php while ( have_posts() ) : the_post();
if($count >= 3) { $count = 1; }
?>
<div class="grid2column<?php if($count == 2): echo ' lastcolumn'; endif; ?>">

<?php get_template_part( 'content', 'blog' ); ?>

</div><!-- close .grid2column -->
<?php if($count == 2): ?><div class="clearfix"></div><?php endif; ?>
<?php $count ++; $count_2++; endwhile; ?>
<?php endif; ?>
</div>
<div class="clearfix"></div>

<?php
add_action('widgets_init', 'pyre_homepage_commerce_load_widgets');

function pyre_homepage_commerce_load_widgets()
{
	register_widget('Pyre_Latest_Commerce_Media_Widget');
}

class Pyre_Latest_Commerce_Media_Widget extends WP_Widget {
	
	function __construct()
	{
		$widget_ops = array('classname' => 'pyre_homepage_media-product', 'description' => 'Latest Product Posts');

		$control_ops = array('id_base' => 'pyre_homepage_media-widget-product');

		parent::__construct('pyre_homepage_media-widget-product', 'Camp: Homepage Latest Products', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		global $post;
		
		extract($args);
		
		$title = $instance['title'];
		$posts = $instance['posts'];
		$columns = $instance['columns'];
		
		echo $before_widget;
		?>
		
		<?php if($title): ?>
		<h2><?php echo $title; ?></h2>
		<?php endif; ?>

		<?php
		$args = array( 'post_type' => 'product', 'posts_per_page' => $posts,
		'tax_query' => array(
			array(
				'taxonomy' => 'product_cat',
				'field' => 'slug',
				'terms' => 'featured',
				'operator' => 'NOT IN'
			)
		)
		);
		$loop = new WP_Query( $args );
		$count = 1;
		$count_2 = 1;
		while ( $loop->have_posts() ) : $loop->the_post(); global $product;
		if($count >= $columns+1) { $count = 1; }
		 ?>

		
		<div class="portfolio-items-page">
		<div class="grid<?php echo $columns; ?>column<?php if($count == $columns): echo ' lastcolumn'; endif; ?>">
		<div class="woocommerce">
			<ul class="products">
				<?php woocommerce_get_template_part( 'content', 'product' ); ?>
</ul>
</div>
		</div><!-- close .grid -->
		</div><!-- close .portfolio-items-page -->
		
		<?php if($count == $columns): ?><div class="clearfix"></div><?php endif; ?>
		<?php $count ++; $count_2++; endwhile; ?>
		
		<div class="clearfix"></div>
		<div class="homepage-spacer"></div>
		
		
		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['posts'] = $new_instance['posts'];
		$instance['columns'] = $new_instance['columns'];
		
		return $instance;
	}

	function form($instance)
	{
		
		$defaults = array('title' => 'Latest Products', 'posts' => 4, 'columns' => 4);
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('posts'); ?>">Number of posts:</label>
			<input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" value="<?php echo $instance['posts']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('columns'); ?>">Number of columns (2-4):</label>
			<input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('columns'); ?>" name="<?php echo $this->get_field_name('columns'); ?>" value="<?php echo $instance['columns']; ?>" />
		</p>
	<?php }
}
?>
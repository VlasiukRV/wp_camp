<?php
add_action('widgets_init', 'pyre_homepage_featured_text_widgets');

function pyre_homepage_featured_text_widgets()
{
	register_widget('Pyre_Homepage_featured_text_Widget');
}

class Pyre_Homepage_featured_text_Widget extends WP_Widget {
	
	function __construct()
	{
		$widget_ops = array('classname' => 'pyre_homepage_featured_text_widgets', 'description' => 'Homepage Featured Text Spot');

		$control_ops = array('id_base' => 'pyre_homepage_featured_text_widgets');

		parent::__construct('pyre_homepage_featured_text_widgets', 'Camp: Homepage Featured Text', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		global $post;
		
		extract($args);
		
		$title = $instance['title'];
		$content_area = $instance['content_area'];
		$button_text = $instance['button_text'];
		$button_link = $instance['button_link'];
		$button_targets = $instance['button_targets'];
		
		echo $before_widget;
		?>
		
		
		</div><!-- close .container -->
		<div class="clearfix"></div>
		<div class="content-highlight">
			<div class="container">
			
				<h3><?php echo $title; ?></h3>
				
				<?php if($button_text): ?>
				<?php if($button_link): ?>
				<div class="alignright homepage-adjust">
					<a href="<?php echo $button_link; ?>" class="def-button arrow-button" target="<?php if($button_targets): ?><?php echo $button_targets; ?><?php endif; ?>"><?php echo $button_text; ?></a>
				</div>
				<?php endif; ?>
				<?php endif; ?>

				<?php if($content_area): ?>
					<?php echo $content_area; ?>
				<?php endif; ?>
				
				
			</div>
		</div><!-- close .content-highlight -->
		<div class="container">
<div class="homepage-spacer"></div>
		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['content_area'] = $new_instance['content_area'];
		$instance['button_text'] = $new_instance['button_text'];
		$instance['button_link'] = $new_instance['button_link'];
		$instance['button_targets'] = $new_instance['button_targets'];
		
		return $instance;
	}

	function form($instance)
	{
		
		$defaults = array('title' => 'Featured Text', 'content_area' => '', 'button_text' => '', 'button_link' => '', 'button_targets' => '');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('content_area'); ?>">Content:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('content_area'); ?>" name="<?php echo $this->get_field_name('content_area'); ?>" value="<?php echo $instance['content_area']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('button_text'); ?>">Button Text:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('button_text'); ?>" name="<?php echo $this->get_field_name('button_text'); ?>" value="<?php echo $instance['button_text']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('button_link'); ?>">Button Link:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('button_link'); ?>" name="<?php echo $this->get_field_name('button_link'); ?>" value="<?php echo $instance['button_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('button_targets'); ?>">Button Target:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('button_targets'); ?>" name="<?php echo $this->get_field_name('button_targets'); ?>" value="<?php echo $instance['button_targets']; ?>" />
		</p>

	<?php }
}
?>
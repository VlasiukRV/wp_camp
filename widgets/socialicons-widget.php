<?php
add_action('widgets_init', 'socialicons_load_widgets');

function socialicons_load_widgets()
{
	register_widget('Socialicons_Widget');
}

class Socialicons_Widget extends WP_Widget {
	
	function __construct()
	{
		$widget_ops = array('classname' => 'socialicons', 'description' => '');

		$control_ops = array('id_base' => 'socialicons-widget');

		parent::__construct('socialicons-widget', 'Camp: Social Icons', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);

		echo $before_widget;

		if($title) {
			echo  $before_title.$title.$after_title;
		} ?>
		<div class="social-icons">
		<?php if(of_get_option('rss_link')): ?>
		<a class="rss" href="<?php echo of_get_option('rss_link'); ?>" target="_blank">r</a>
		<?php endif; ?>
		<?php if(of_get_option('facebook_link')): ?>
		<a class="facebook" href="<?php echo of_get_option('facebook_link'); ?>" target="_blank">f</a>
		<?php endif; ?>
		<?php if(of_get_option('twitter_link')): ?>
		<a class="twitter" href="<?php echo of_get_option('twitter_link'); ?>" target="_blank">l</a>
		<?php endif; ?>
		<?php if(of_get_option('skype_link')): ?>
		<a class="skype" href="<?php echo of_get_option('skype_link'); ?>" target="_blank">h</a>
		<?php endif; ?>
		<?php if(of_get_option('vimeo_link')): ?>
		<a class="vimeo" href="<?php echo of_get_option('vimeo_link'); ?>" target="_blank">v</a>
		<?php endif; ?>
		<?php if(of_get_option('flickr_link')): ?>
		<a class="flickr" href="<?php echo of_get_option('flickr_link'); ?>" target="_blank">n</a>
		<?php endif; ?>
		<?php if(of_get_option('tumblr_link')): ?>
		<a class="tumblr" href="<?php echo of_get_option('tumblr_link'); ?>" target="_blank">t</a>
		<?php endif; ?>
		<?php if(of_get_option('dribbble_link')): ?>
		<a class="dribbble" href="<?php echo of_get_option('dribbble_link'); ?>" target="_blank">d</a>
		<?php endif; ?>
		<?php if(of_get_option('google_link')): ?>
		<a class="google" href="<?php echo of_get_option('google_link'); ?>" target="_blank">g</a>
		<?php endif; ?>
		<?php if(of_get_option('linkedin_link')): ?>
		<a class="linkedin" href="<?php echo of_get_option('linkedin_link'); ?>" target="_blank">i</a>
		<?php endif; ?>
		<?php if(of_get_option('youtube_link')): ?>
		<a class="youtube" href="<?php echo of_get_option('youtube_link'); ?>" target="_blank">x</a>
		<?php endif; ?>
		</div>
		<?php echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'Social Icons');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
	<?php
	}
}
?>
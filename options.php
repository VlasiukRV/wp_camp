<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'progression'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$animations = array(
		'fade' => __('Fade', 'progression'),
		'slide' => __('Slide', 'progression')
	);
	

	
	$animation_true = array(
		'true' => __('On', 'progression'),
		'false' => __('Off', 'progression')
	);
	

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'progression'),
		'two' => __('Pancake', 'progression'),
		'three' => __('Omelette', 'progression'),
		'four' => __('Crepe', 'progression'),
		'five' => __('Waffle', 'progression')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );
		
	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __('Basic', 'progression'),
		'type' => 'heading');
		
	
	$options[] = array(
		'name' => __('Copyright', 'progression'),
		'desc' => __('Choose your copyright text here. ', 'progression'),
		'id' => 'copyright',
		'std' => '&copy; 2013 All Rights Reserved. Developed by <a href="http://themeforest.net/user/ProgressionStudios/?ref=ProgressionStudios" target="_blank">Progression Studios</a>.',
		'type' => 'textarea');
	
	
	
	
	$options[] = array(
		'name' => __('Display Footer Widgets', 'progression'),
		'desc' => __('Select this checkbox to enable the footer widgets.', 'progression'),
		'id' => 'footer_widgets',
		'std' => '1',
		'type' => 'checkbox');	
	
	
	$options[] = array(
		'name' => __('Footer Widget Column Count', 'progression'),
		'desc' => __('Choose how many columns you want to use for our footer widgets (1-4 Columns).', 'progression'),
		'id' => 'footer_widgets_column',
		'std' => '4',
		'class' => 'mini',
		'type' => 'text');
	
	
	$options[] = array(
		'name' => __('Display Sidebar on Homepage', 'progression'),
		'desc' => __('Select this checkbox to display the sidebar on the homepage.', 'progression'),
		'id' => 'home_sidebar',
		'std' => '0',
		'type' => 'checkbox');
	
	$options[] = array(
		'name' => __('Display Sidebar on Blog, Archives, and Search', 'progression'),
		'desc' => __('Select this checkbox to display the sidebar in the blog pages.', 'progression'),
		'id' => 'blog_sidebar',
		'std' => '1',
		'type' => 'checkbox');
	
	
	$options[] = array(
		'name' => __('Display Sidebar on Blog Post pages', 'progression'),
		'desc' => __('Select this checkbox to display the sidebar in the blog post pages.', 'progression'),
		'id' => 'blog_sidebar_single',
		'std' => '1',
		'type' => 'checkbox');	
	
	
	
	$options[] = array(
		'name' => __('Enable Search Form in the Header?', 'progression'),
		'desc' => __('Select checkbox to have search display in the header.', 'progression'),
		'id' => 'search_form_header',
		'std' => '1',
		'type' => 'checkbox');

	
	$options[] = array(
		'name' => __('Search All Pages or Just Products?', 'progression'),
		'desc' => __('Select checkbox to search all pages.', 'progression'),
		'id' => 'search_form_products',
		'std' => '1',
		'type' => 'checkbox');
	
	$options[] = array(
		'name' => __('Display Bread Crumbs', 'progression'),
		'desc' => __('Select this checkbox to enable bread-crumb navigation.', 'progression'),
		'id' => 'bread_crumb_nav',
		'std' => '0',
		'type' => 'checkbox');
	
	
	$options[] = array(
		'name' => __('Shop', 'progression'),
		'type' => 'heading');
	

	
	$options[] = array(
		'name' => __('Products Per Page on Shop', 'progression'),
		'desc' => __('Choose how many many products will show up per page on the shop index.', 'progression'),
		'id' => 'shop_products_pagination',
		'std' => '12',
		'class' => 'mini',
		'type' => 'text');
	
	

	
	$options[] = array(
		'name' => __('Columns on Shop', 'progression'),
		'desc' => __('Choose how many columns you want in the shop (2-4 columns).', 'progression'),
		'id' => 'shop_cols',
		'std' => '4',
		'class' => 'mini',
		'type' => 'text');
		

			
	
	$options[] = array(
		'name' => __('Display Sidebar on Shop Index', 'progression'),
		'desc' => __('Select this checkbox to display the sidebar on the Shop Index and Product Pages.', 'progression'),
		'id' => 'fw_shop',
		'std' => '1',
		'type' => 'checkbox');
	


	
	$options[] = array(
		'name' => __('Blog/Portfolio', 'progression'),
		'type' => 'heading');
	
	
	
	$options[] = array(
		'name' => __('Blog Index Column', 'progression'),
		'desc' => __('Check this box to display 1 column.  Uncheck this box to display the blog in two columns.', 'progression'),
		'id' => 'blog_page_template',
		'std' => '1',
		'type' => 'checkbox');
	
	


	
	$options[] = array(
		'name' => __('Display Hover Images on Portfolio, Shop, and Blog Posts', 'progression'),
		'desc' => __('Select this checkbox to display the hover icons on the portfolio, shop and blog.', 'progression'),
		'id' => 'hover_images_shopping2',
		'std' => '1',
		'type' => 'checkbox');
	
	
	$options[] = array(
		'name' => __('Display sidebar on portfolio post page?', 'progression'),
		'desc' => __('Check to display sidebar on portfolio post page.', 'progression'),
		'id' => 'portfolio_post_template',
		'std' => '0',
		'type' => 'checkbox');	
	

	
	
	$options[] = array(
		'name' => __('Widgets', 'progression'),
		'type' => 'heading');
		
	

	
	$options[] = array(
		'name' => __('Widget Area Social Icons', 'progression'),
		'desc' => __('These icons will display in the custom social icons widget of your theme.  Leave the text area blank and the icon will disappear automatically.', 'progression'),
		'type' => 'info');
		
	
	$options[] = array(
		'name' => __('RSS Link in Social Icons Widget', 'progression'),
		'desc' => __('Social Icon will display/hide automatically in the social icons widget.', 'progression'),
		'id' => 'rss_link',
		'std' => '',
		'type' => 'text');
		
	
	$options[] = array(
		'name' => __('Facebook Link in Social Icons Widget', 'progression'),
		'desc' => __('Social Icon will display/hide automatically in the social icons widget.', 'progression'),
		'id' => 'facebook_link',
		'std' => '',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Twitter Link in Social Icons Widget', 'progression'),
		'desc' => __('Social Icon will display/hide automatically in the social icons widget.', 'progression'),
		'id' => 'twitter_link',
		'std' => '',
		'type' => 'text');
	
	
	$options[] = array(
		'name' => __('Skype Link in Social Icons Widget', 'progression'),
		'desc' => __('Social Icon will display/hide automatically in the social icons widget.', 'progression'),
		'id' => 'skype_link',
		'std' => '',
		'type' => 'text');
		
		
	$options[] = array(
		'name' => __('Vimeo Link in Social Icons Widget', 'progression'),
		'desc' => __('Social Icon will display/hide automatically in the social icons widget.', 'progression'),
		'id' => 'vimeo_link',
		'std' => '',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('LinkedIn Linkin Social Icons Widget', 'progression'),
		'desc' => __('Social Icon will display/hide automatically in the social icons widget.', 'progression'),
		'id' => 'linkedin_link',
		'std' => '',
		'type' => 'text');
	
	
	$options[] = array(
		'name' => __('Dribbble Link in Social Icons Widget', 'progression'),
		'desc' => __('Social Icon will display/hide automatically in the social icons widget.', 'progression'),
		'id' => 'dribbble_link',
		'std' => '',
		'type' => 'text');
	
	

	
	$options[] = array(
		'name' => __('Flickr Link in Social Icons Widget', 'progression'),
		'desc' => __('Social Icon will display/hide automatically in the social icons widget.', 'progression'),
		'id' => 'flickr_link',
		'std' => '',
		'type' => 'text');
	
	
	$options[] = array(
		'name' => __('Google Link in Social Icons Widget', 'progression'),
		'desc' => __('Social Icon will display/hide automatically in the social icons widget.', 'progression'),
		'id' => 'google_link',
		'std' => '',
		'type' => 'text');	

	

	
	
	$options[] = array(
		'name' => __('Appearance', 'progression'),
		'type' => 'heading');
	
	$options[] = array(
		'name' => __('Logo', 'progression'),
		'desc' => __('Use the upload button to upload your sites logo and then click <strong>Use this image</strong>.', 'progression'),
		'id' => 'logo',
		"std" => get_template_directory_uri() . "/images/logo.png",
		'type' => 'upload');
	
	
	$options[] = array(
		'name' => __('Logo Width', 'progression'),
		'desc' => __('Choose your logo width in pixels.  Default is 120.', 'progression'),
		'id' => 'logo_width',
		'std' => '120',
		'class' => 'mini',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('FavIcon', 'progression'),
		'desc' => __('Use the upload button to upload your favicon (bookmark icon) and then click <strong>Use this image</strong>.', 'progression'),
		'id' => 'favicon',
		'type' => 'upload');
	

	
	
	$options[] = array(
		'name' => __('Navigation Background Image', 'progression'),
		'desc' => __('se the upload button to upload your sites navigation background image. There is a template for this file in your download "Misc > Templates > navigaiton-bg.psd".  Also check the documentation if you need help with this.', 'progression'),
		'id' => 'navigation_bg_image',
		"std" => get_template_directory_uri() . "/images/navigation-bg.png",
		'type' => 'upload');
		
	
	$options[] = array(
		'name' => __('Sub-Navigation Hover Background Color', 'progression'),
		'desc' => __('Choose the default menu hover background color.  Default - #df723c', 'progression'),
		'id' => 'background_color',
		"std" => "#df723c",
		'type' => 'color');
	
	
	$options[] = array(
		'name' => __('Header Background Color', 'progression'),
		'desc' => __('Top header background color above navigation.  Default - #713d26', 'progression'),
		'id' => 'header_bg_color',
		"std" => "#713d26",
		'type' => 'color');
	
	$options[] = array(
		'name' => __('Body Background Color', 'progression'),
		'desc' => __('Main body background color.  Default - #ebe7df', 'progression'),
		'id' => 'body_bg_color',
		"std" => "#ebe7df",
		'type' => 'color');
	
	$options[] = array(
		'name' => __('Default Link Color', 'progression'),
		'desc' => __('Choose your link color.  Default - #78bea1', 'progression'),
		'id' => 'link_color',
		"std" => "#78bea1",
		'type' => 'color');
	
	$options[] = array(
		'name' => __('Default Heading Colors', 'progression'),
		'desc' => __('Choose your default heading font color.  Default - #5b5b5b', 'progression'),
		'id' => 'heading_colors',
		"std" => "#5b5b5b",
		'type' => 'color');
	
	$options[] = array(
		'name' => __('Button Background', 'progression'),
		'desc' => __('Choose our button background color. - #f4f4ef', 'progression'),
		'id' => 'background_button',
		"std" => "#f4f4ef",
		'type' => 'color');
	
	$options[] = array(
		'name' => __('Button Background Hover', 'progression'),
		'desc' => __('Choose our button hover background color.  Default - #db5f32', 'progression'),
		'id' => 'background_button_hover',
		"std" => "#db5f32",
		'type' => 'color');
	
	$options[] = array(
		'name' => __('Main Highlight Box Background Color', 'progression'),
		'desc' => __('Choose your background color for the highlight boxes.  Default - #f7f6f2', 'progression'),
		'id' => 'box_default_bg',
		"std" => "#f7f6f2",
		'type' => 'color');
	
	$options[] = array(
		'name' => __('Main Highlight Box Border Color', 'progression'),
		'desc' => __('Choose your border color for the highlight boxes.  Default - #c8c7c2', 'progression'),
		'id' => 'box_default_border',
		"std" => "#c8c7c2",
		'type' => 'color');
	
	$options[] = array(
		'name' => __('Featured Slider Background Color', 'progression'),
		'desc' => __('Choose your background color for the featured slider.  Default - #ffffff', 'progression'),
		'id' => 'flexslider_background',
		"std" => "#ffffff",
		'type' => 'color');
	
	$options[] = array(
		'name' => __('Featured Slider Border Color', 'progression'),
		'desc' => __('Choose your border color for the featured slider.  Default - #c8c7c2', 'progression'),
		'id' => 'flexslider_border',
		"std" => "#c8c7c2",
		'type' => 'color');
	
	

	
	$options[] = array(
		'name' => __('Navigation And Heading H3-H6 Font', 'progression'),
		'desc' => __('Choose a Main Navigation Font.  Default - Economica', 'progression'),
		'id' => 'navigation_font',
		'std' => 'Economica',
		'class' => 'mini',
		'type' => 'text');

	
	$options[] = array(
		'name' => __('Navigation Sub-Menu Font', 'progression'),
		'desc' => __('Choose a Sub-Menu navigation Font.  Default - Doppio One', 'progression'),
		'id' => 'submenu_font',
		'std' => 'Doppio One',
		'class' => 'mini',
		'type' => 'text');
	
	
	$options[] = array(
		'name' => __('Heading Font H1-H2', 'progression'),
		'desc' => __('Choose the H1-H2 Heading Font.  Default - Dosis', 'progression'),
		'id' => 'heading_font',
		'std' => 'Dosis',
		'class' => 'mini',
		'type' => 'text');
	
	
	$options[] = array(
		'name' => __('Photo Zoom Icon Background Image', 'progression'),
		'desc' => __('Upload your hover icon background image for images.  Photoshop template included in your theme files zoom-icon.psd.', 'progression'),
		'id' => 'photo_zoom_icon',
		"std" => get_template_directory_uri() . "/images/zoom-icon.png",
		'type' => 'upload');
	
	
	$options[] = array(
		'name' => __('Article Zoom Icon Background Image', 'progression'),
		'desc' => __('Upload your hover icon background image for articles/links.  Photoshop template included in your theme files zoom-icon.psd.', 'progression'),
		'id' => 'article_zoom_icon',
		"std" => get_template_directory_uri() . "/images/zoom-icon-article.png",
		'type' => 'upload');
	
	
	$options[] = array(
		'name' => __('Retina Photo Zoom Icon Background Image', 'progression'),
		'desc' => __('Upload your hover icon background image for photographs.  Photoshop template included in your theme files zoom-icon@2x.psd.  <strong>Note</strong>:  This is for retina displays as the icons are 200% larger.  If you don not want to support retina displays, just upload the default icons again to this spot.', 'progression'),
		'id' => 'retina_photo_zoom_icon',
		"std" => get_template_directory_uri() . "/images/zoom-icon@2x.png",
		'type' => 'upload');
	
	
	$options[] = array(
		'name' => __('Retina Article Zoom Icon Background Image', 'progression'),
		'desc' => __('Upload your hover icon background image for articles/links.  Photoshop template included in your theme files zoom-icon@2x.psd.  <strong>Note</strong>: This is for retina displays as the icons are 200% larger.  If you don not want to support retina displays, just upload the default icons again to this spot.', 'progression'),
		'id' => 'retina_article_zoom_icon',
		"std" => get_template_directory_uri() . "/images/zoom-icon-article@2x.png",
		'type' => 'upload');
	
	
	
	
	
	$options[] = array(
		'name' => __('Tools', 'progression'),
		'type' => 'heading');
	
	
	$options[] = array(
		'name' => __('Homepage Title', 'progression'),
		'desc' => __('Enter a title for the homepage, leave blank if you want to use an auto generated one or a third party plugin.', 'progression'),
		'id' => 'home_title',
		'std' => '',
		'type' => 'text');
		
	
	$options[] = array(
		'name' => __('Homepage Meta Description', 'progression'),
		'desc' => __('Enter a description for the homepage, about 140 characters.', 'progression'),
		'id' => 'home_meta',
		'std' => '',
		'type' => 'text');
		

		
	
	$options[] = array(
		'name' => __('Tracking Code', 'progression'),
		'desc' => __('Paste your tracking code here e.g. Google Analytics etc... without &lt;script&gt; tags.', 'progression'),
		'id' => 'tracking_code',
		'std' => '',
		'type' => 'textarea');
		
	
	$options[] = array(
		'name' => __('404 Error Message Heading', 'progression'),
		'desc' => __('Enter your custom 404 error heading.', 'progression'),
		'id' => '404_error',
		'std' => '404 Page Not Found',
		'type' => 'textarea');
		
	
	$options[] = array(
		'name' => __('404 Error Message Text', 'progression'),
		'desc' => __('Enter your custom 404 error message.', 'progression'),
		'id' => '404_error_text',
		'std' => 'The page you are looking is not available. You can customize this text in the Theme Options Panel',
		'type' => 'textarea');
	
	$options[] = array(
		'name' => __('Custom CSS Code', 'progression'),
		'desc' => __('Paste custom JavaScript code here without &lt;style&gt;&lt;/style&gt; tags.', 'progression'),
		'id' => 'custom_css',
		'std' => '',
		'type' => 'textarea');
	
	
	$options[] = array(
		'name' => __('Custom Javascript Code', 'progression'),
		'desc' => __('Paste custom JavaScript code here without &lt;script&gt;&lt;/script&gt; tags.', 'progression'),
		'id' => 'custom_js',
		'std' => '',
		'type' => 'textarea');
	
	$options[] = array(
		'name' => __('Slider', 'progression'),
		'type' => 'heading');
	

	
	
	$options[] = array(
		'name' => __('Featured Slider Animation', 'progression'),
		'desc' => __('Choose your slider animation between fade and slide.', 'progression'),
		'id' => 'animation',
		'std' => 'fade',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $animations);
		

	$options[] = array(
		'name' => __('Featured Slider Autoplay', 'progression'),
		'desc' => __('Choose to have your slide show autoplay or not.', 'progression'),
		'id' => 'autoplay',
		'std' => 'true',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $animation_true);
	
	
	$options[] = array(
		'name' => __('Featured Slider Autoplay Speed', 'progression'),
		'desc' => __('Choose how long each slide will show (in milliseconds)', 'progression'),
		'id' => 'transition',
		'std' => '6500',
		'class' => 'mini',
		'type' => 'text');
		
	
	$options[] = array(
		'name' => __('Featured Slider Next / Previous Buttons', 'progression'),
		'desc' => __('Choose to turn the next/previous buttons on or off. ', 'progression'),
		'id' => 'nextprev',
		'std' => 'true',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $animation_true);
		

	
	$options[] = array(
		'name' => __('Featured Slider Thumbnail Navigation Buttons', 'progression'),
		'desc' => __('Choose to display the navigation bullets on the bottom left of the slideshow. ', 'progression'),
		'id' => 'controllingnavigation',
		'std' => 'true',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $animation_true);
	
	

		
	return $options;
}

/*
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>



<?php
}
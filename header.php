<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>  <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]--><head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<?php if(is_front_page() && of_get_option('home_title')): ?>
	<title><?php echo of_get_option('home_title'); ?></title>
	<?php else: ?>
	<title><?php bloginfo('name'); ?> <?php wp_title(' - ', true, 'left'); ?></title>
	<?php endif; ?>
	<?php if(is_front_page() && of_get_option('home_meta')): ?>
    <meta name="description" content="<?php echo of_get_option('home_meta'); ?>" /> 
	<?php endif; ?>
	<meta name="viewport" content="width=device-width">
	<?php if(of_get_option('favicon')): ?>
	<link href="<?php echo of_get_option('favicon'); ?>" rel="shortcut icon" /> 
	<?php endif; ?>
	
	<?php wp_head(); ?>
	
	<?php echo '<style type="text/css">'; ?>
	nav {background: url(<?php echo of_get_option('navigation_bg_image', get_template_directory_uri() . '/images/navigation-bg.png'); ?>);}
	header {background-color:<?php echo of_get_option('header_bg_color', "#713d26"); ?>;  }
	body, #main {background-color:<?php echo of_get_option('body_bg_color', "#ebe7df"); ?>;}
	span.cost-highlight, a, a:visited , body #main .container nav.woocommerce-breadcrumb a{color:<?php echo of_get_option('link_color', "#78bea1"); ?>;}
	.sf-menu li.sfHover li a, .sf-menu li.sfHover li a:visited, .sf-menu li.sfHover li li a, .sf-menu li.sfHover li li a:visited, .sf-menu li.sfHover li li li a, .sf-menu li.sfHover li li li a:visited, .sf-menu li.sfHover li li li li a, .sf-menu li.sfHover li li li li a:visited {background:<?php echo of_get_option('background_color', "#df723c"); ?>; }
	h1, h2, h3, h4, h5, h6 {color:<?php echo of_get_option('heading_colors', "#5b5b5b"); ?>;}
	body #respond p.form-submit input#submit, body footer .widget-butt, body .pagination a, body #main .container button.button, body #main .container a.button, body #main .def-button, body #main .container input.button, body #respond input#submit, body input.wpcf7-submit {background-color:<?php echo of_get_option('background_button', "#f4f4ef"); ?>;}
	body #respond p.form-submit input#submit:hover, body #main .container input.button:hover, body #main .container a.button:hover, body #main .container button.button:hover, footer .def-button:hover, body .pagination a.selected, body .pagination a:hover, body #main .def-button:hover, body #sidebar .def-button:hover, body #respond input#submit:hover, body input.wpcf7-submit:hover {background-color:<?php echo of_get_option('background_button_hover', "#db5f32"); ?>;}
	#sidebar .social-icons a, #sidebar .social-icons a:hover {color:<?php echo of_get_option('background_button_hover', "#db5f32"); ?>;}
	.item-container {border:1px solid <?php echo of_get_option('box_default_border', "#c8c7c2"); ?>;background:<?php echo of_get_option('box_default_bg', "#f7f6f2"); ?>;}
	.flex-slider-border { border:1px solid <?php echo of_get_option('flexslider_border', "#c8c7c2"); ?>; background:<?php echo of_get_option('flexslider_background', "#ffffff"); ?>; }
	.sf-menu, h3, h4, h5, h6 {font-family: '<?php echo of_get_option('navigation_font', 'Economica'); ?>', sans-serif; }
	#login-header-area, .sf-menu li.sfHover li a, .sf-menu li.sfHover li a:visited, .sf-menu li.sfHover li li a, .sf-menu li.sfHover li li a:visited, .sf-menu li.sfHover li li li a, .sf-menu li.sfHover li li li a:visited, .sf-menu li.sfHover li li li li a, .sf-menu li.sfHover li li li li a:visited {font-family: '<?php echo of_get_option('submenu_font', 'Doppio One'); ?>', sans-serif; }
	h1, h2, footer h4 {font-family: '<?php echo of_get_option('heading_font', 'Dosis'); ?>', sans-serif; }
	
	.zoom-icon2 {background-image: url(<?php echo of_get_option('photo_zoom_icon', get_template_directory_uri() . '/images/zoom-icon.png'); ?>);}
	.zoom-icon-article2 {background-image:url(<?php echo of_get_option('article_zoom_icon', get_template_directory_uri() . '/images/zoom-icon-article.png'); ?>);}
	@media screen and (-webkit-min-device-pixel-ratio: 1.5) {
	.zoom-icon2 {background-image:url(<?php echo of_get_option('retina_photo_zoom_icon', get_template_directory_uri() . '/images/zoom-icon@2x.png'); ?>);}
	.zoom-icon-article2 {background-image:url(<?php echo of_get_option('retina_article_zoom_icon', get_template_directory_uri() . '/images/zoom-icon-article@2x.png'); ?>);}
	}
	<?php if(of_get_option('bread_crumb_nav', '0')): ?><?php else: ?>body #breadcrumb, body nav.woocommerce-breadcrumb, p.woocommerce-result-count {display:none;}<?php endif; ?>
	<?php if(of_get_option('hover_images_shopping2', '1')): ?><?php else: ?>.zoom-icon2 {display:none !important;}<?php endif; ?>
		
	
	body #logo, body #logo img {max-width:<?php echo of_get_option('logo_width', '120'); ?>px; }
	<?php if(of_get_option('custom_css')): ?><?php echo of_get_option('custom_css'); ?><?php endif; ?>
	<?php echo '</style>'; ?>
	
	<?php if(of_get_option('custom_js')): ?>
	<?php echo '<script type="text/javascript">'; ?>
	<?php echo of_get_option('custom_js'); ?>
	<?php echo '</script>'; ?>
    
<style>header .social-icons {
    display: inline-block;
    height: 25px;
    margin-top: -7px;
}
</style>
	<?php endif; ?>
</head>
<body <?php body_class(''); ?>>
	
	<header>
		<div class="header-bevel">
		<div class="header-gradient">
		<div class="header-container">
			<div style="color:white; text-align:center;" id="logo"><a href="<?php echo site_url(); ?>"><img src="<?php echo of_get_option('logo', get_template_directory_uri() . '/images/logo.png'); ?>" alt="<?php bloginfo('name'); ?>"></a>  <p style="text-align:center;   color: white;  font-family:Arial, Helvetica, sans-serif; text-transform:uppercase;    font-size: 21px;">Motorist Centre Corby</p><br/><p id="pid"  style="text-align: center; color: white; font-family: Arial, Helvetica, sans-serif; text-transform: ;font-size: 18px; width: 122%; margin-left: -31px !important; margin-top: -28px;"  >73 Occupation Road, Corby. NN17 1EE &nbsp;&nbsp;&nbsp; Tel: <a style="color:white;" href="tel://01536 408 109">01536 408 109</a></p>
</div>
      <div id="ri-nav-bar">
				<div class="s-icons">
                 <table class="cnss-social-icon" style="width:36px" border="0" cellspacing="0" cellpadding="0"><tbody><tr><td style="width:36px"><a target="_blank" title="Facebook - Moto" href="https://www.facebook.com/pages/Moto-Tec-Motorist-Centre/369647673165020"><img src="http://www.moto-tec.co/wp-content/uploads//1416908032_f.png" border="0" width="32" height="32" alt="Facebook - Moto" style="opacity: 1;"></a></td></tr></tbody></table>																																																											</div>

									<form method="get" class="searchf" action="http://www.moto-tec.co/">
		<label for="s" class="assistive-text">Search:</label>
		<input type="text" class="field" name="s" id="s" placeholder="Search...">
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="Search">
	</form>

				
			</div>
			<div style="color: white; font-family: Arial, Helvetica, sans-serif; line-height:25px;" class="cp" ><br/>Store Opening Hours:<br/><br/>M-F: &nbsp;8:30pm till 6:00pm<br/>
Sat: &nbsp;9:00pm till 5:00pm<br/>
Sun: &nbsp;10:00am till 1:00pm<br/></div>
			<?php get_template_part( 'cart', 'progression' ); ?>
			<div class="clearfix"></div>
            
		</div><!-- close .header-container -->
		</div><!-- close .header-gradient -->
		</div><!-- close .header-bevel -->

		<nav>
		<div class="header-container">
			<?php wp_nav_menu(array('theme_location' => 'main_nav', 'depth' => 4, 'menu_class' => 'sf-menu')); ?>
			
			<div id="right-nav-bar">
				<div class="social-icons">
                 <?php  echo do_shortcode('[cn-social-icon]'); ?>
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

				<?php if(of_get_option('search_form_header', '1')): ?>
				<?php get_search_form(); ?>
				<?php endif; ?>

			</div><!-- close #right-nav-bar -->
			<div class="clearfix"></div>
		</div><!-- close .header-container -->
		</nav>
		<div class="clearfix"></div>
		
	</header>

	<div id="main">
	<div id="header-divider"></div>
	<div class="container">
<?php
// Template Name: Contact
get_header(); ?>
<style>
#container-sidebar {
    float: left;
    width: 100%;
}</style>
<?php
//If the form is submitted
if(isset($_POST['submit'])) {
	
	$comments = $_POST['message'];

	//Check to make sure that the name field is not empty
	if(trim($_POST['contactname']) == '') {
		$hasError = true;
	} else {
		$name = trim($_POST['contactname']);
	}


	//Check to make sure sure that a valid email address is submitted
	if(trim($_POST['email']) == '')  {
		$hasError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	//If there is no error, send the email
	if(!isset($hasError)) {
		$emailTo = get_post_meta($post->ID, 'contactpage_emailaddress', true); //Put your own email address here
		$body = "Name: $name \n\nEmail: $email \n\nComments:\n $comments";
		$headers = 'From: '.get_bloginfo('name').' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, get_bloginfo('name'), $body, $headers);
		$emailSent = true;
	}
}
?>
		<div id="container-sidebar">
			
			<?php if (function_exists('progression_breadcrumbs')) progression_breadcrumbs(); ?>
			
			<?php while(have_posts()): the_post(); ?>
			<h2><?php the_title(); ?></h2>

			<?php get_template_part( 'child-pages' ); ?>
			
			<?php if(get_post_meta($post->ID, 'contactpage_mapaddress', true)): ?>
			<div class="item-container">
				<div class="item-container-image">
                <div id="map-contact">
					 
					<?php echo do_shortcode("[ready_google_map id='1']"); ?>
                   
					</div>
				</div>
			</div><!-- close .item-container -->
			<?php endif; ?>
			
			
			<?php the_content(); ?>

			<?php endwhile; ?>
			
			<?php if(get_post_meta($post->ID, 'contactpage_emailaddress', true)): ?>
			<div id="contact-wrapper">
				<script type="text/javascript">
					jQuery(document).ready(function(){
						jQuery("#contactform").validate();
					});
				</script>
				<?php if(isset($hasError)) { //If errors are found ?>
					<p class="error"><?php _e('Please check if you have filled all the fields with valid information. Thank you.','progression'); ?></p>
				<?php } ?>

				<?php if(isset($emailSent) && $emailSent == true) { //If email is sent ?>
					<p class="success"><?php _e('Email Successfully Sent!','progression'); ?></p>
					<p class="success2"><?php _e('Thank you for using my contact form! I will be in touch with you soon.','progression'); ?></p>
				<?php } ?>
				<form method="post" action="<?php echo get_permalink(); ?>" id="contactform">
					<div class="contact-form-border-input">
					    <label for="name"><?php _e('Name','progression'); ?>:<span class="required">*</span></label>
						<input type="text" size="28" name="contactname" id="contactname" value="" class="required" />
					</div>
					<div class="contact-form-border-input">
						<label for="email"><?php _e('Email','progression'); ?>:<span class="required">*</span></label>
						<input type="text" size="28" name="email" id="email" value="" class="required email" />
					</div>
					<div class="contact-form-border">
						<label for="message"><?php _e('Message','progression'); ?>:</label>
						<textarea rows="10" cols="38" name="message" id="message"></textarea>
					</div>
				    <input type="submit" value="<?php _e('Send Message','progression'); ?>" name="submit" class="def-button" />
				</form>
			</div><!-- close #contact-wrapper -->
			<div class="clearfix"></div>
			<?php endif; ?>
			
			
			


		</div><!-- close #container-sidebar -->
<?php // get_sidebar(); ?>
<?php get_footer(); ?>
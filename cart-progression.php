<?php if(function_exists('woocommerce_product_dropdown_categories')): ?>
<?php global $woocommerce; ?>
<ul id="login-header-area">
	<?php
	$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
	if ( $myaccount_page_id  && !is_user_logged_in()) {
	  $myaccount_page_url = get_permalink( $myaccount_page_id );
	?>
	<li><a href="<?php echo $myaccount_page_url; ?>" class="login-header"><?php _e('Login', 'progression'); ?></a></li>
	<?php
	}
	$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
	if ( $myaccount_page_id && is_user_logged_in()) {
	  $logout_url = wp_logout_url( get_permalink( $myaccount_page_id ) );
	  if ( get_option( 'woocommerce_force_ssl_checkout' ) == 'yes' )
	    $logout_url = str_replace( 'http:', 'https:', $logout_url );
	?>
	<li><a href="<?php echo $logout_url; ?>" class="login-header"><?php _e('Logout', 'progression'); ?></a></li>
	<?php } ?>
	<li><a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="cart-header"><?php _e('Your Basket', 'progression'); ?> <?php echo sprintf(_n('(%d)', '(%d)', $woocommerce->cart->cart_contents_count, 'progression'), $woocommerce->cart->cart_contents_count);?></a></li>
	<li><a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>" class="check-header"><?php _e('Checkout', 'progression'); ?></a></li>
</ul><!-- close #login-header-area -->
<?php endif; ?>
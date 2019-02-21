<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce;

?>

	<?php if ( has_post_thumbnail() ) : ?>
		
		<div class="item-container">
			<div class="item-container-image images">
		
		<a class="woocommerce-main-image zoom hover-icon2" itemprop="image" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" rel="prettyPhoto[product-gallery]" >
		<div class="zoom-icon2">zoom</div>
		<?php echo get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) ) ?></a>
		</div>
		</div>
	<?php else : ?>
			<div class="item-container">
				<div class="item-container-image images">
			<img src="<?php echo woocommerce_placeholder_img_src(); ?>" alt="Placeholder" />
			</div>
			</div>

	<?php endif; ?>

	<?php do_action('woocommerce_product_thumbnails'); ?>


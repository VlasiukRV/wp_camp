<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>


<li class="product column-<?php echo of_get_option('shop_cols', '4'); ?> <?php
	if ( $woocommerce_loop['loop'] % $woocommerce_loop['columns'] == 0 )
		echo 'last';
	elseif ( ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] == 0 )
		echo 'first';
	?>">
	
	<div class="item-container">
	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

		<div class="product-thumbnail-iceberg item-container-image">
			<a href="<?php the_permalink(); ?>" class="hover-icon2">
				<div class="zoom-icon2 zoom-icon-article2">zoom</div>
		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
		?>
		
		</a>
		</div>
		
		<div class="item-container-content">
		
		<h4 class="aligncenter"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		
		<div class="aligncenter">
		
		<h5><?php _e('Price:','progression'); ?>
		<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
		?></h5>
		



	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
	</div>
	
	</div><!-- close .item-container-content -->
</div><!-- close .item-container -->
	
</li>
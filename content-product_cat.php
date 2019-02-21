<?php
/**
 * The template for displaying product category thumbnails within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product_cat.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Increase loop count
$woocommerce_loop['loop']++;
?>
<li class="product column-<?php echo of_get_option('shop_cols', '4'); ?> <?php
	if ( $woocommerce_loop['loop'] % $woocommerce_loop['columns'] == 0 )
		echo 'last';
	elseif ( ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] == 0 )
		echo 'first';
	?>">
	
	<div class="item-container">
	
	<?php do_action( 'woocommerce_before_subcategory', $category ); ?>

	<div class="product-thumbnail-iceberg item-container-image">
		<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>" class="hover-icon2">
			<div class="zoom-icon2 zoom-icon-article2">zoom</div>

		<?php
			/**
			 * woocommerce_before_subcategory_title hook
			 *
			 * @hooked woocommerce_subcategory_thumbnail - 10
			 */
			do_action( 'woocommerce_before_subcategory_title', $category );
		?>
		
		</a>
		</div>
		
		<div class="item-container-content">

		<h4 class="aligncenter"><a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">
			<?php
				echo $category->name;

				if ( $category->count > 0 )
					echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . $category->count . ')</mark>', $category );
			?></a>
		</h4>

		<?php
			/**
			 * woocommerce_after_subcategory_title hook
			 */
			do_action( 'woocommerce_after_subcategory_title', $category );
		?>



	<?php do_action( 'woocommerce_after_subcategory', $category ); ?>
	
		</div><!-- close .item-container-content -->
	</div><!-- close .item-container -->

</li>
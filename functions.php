<?php

// Post Thumbnails
add_theme_support('post-thumbnails');
add_image_size('featured-slider-scaled', 1120, 356, true);
add_image_size('blog-image', 1120, 440, true);
add_image_size('portfolio-thumb', 528, 296, true);
add_image_size('portfolio-single', 1120, 480, true);


/**
 * Make theme available for translation
 * Translations can be filed in the /languages/ directory
 * If you're building a theme based on progression, use a find and replace
 * to change 'progression' to the name of your theme in all the template files
 */
load_theme_textdomain( 'progression', get_template_directory() . '/languages' );


/* 
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}


/**
 * Registering Custom Meta Boxes 
 * https://github.com/tammyhart/Reusable-Custom-WordPress-Meta-Boxes
 * Include the file that creates the class and a file that instantiates the class
 */
require( get_template_directory() . '/metaboxes/meta_box.php' );
require( get_template_directory() . '/inc/custom_meta_boxes.php' );




// Include widgets
require( get_template_directory() . '/widgets/widgets.php' );


// Shortcodes
include_once('shortcodes.php');

//Custom menus
register_nav_menu('main_nav','Main Navigation');

// Shortcodes
include_once('shortcodes.php');



// Register Widgetized Areas
if(function_exists('register_sidebar')) {
	register_sidebar(array(
		'id' => 'sidebar',
		'name' => 'Sidebar',
		'before_widget' => '<div class="sidebar-padding %2$s widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
	
	register_sidebar(array(
		'id' => 'woo-commerce-sidebar',
		'name' => 'WooCommerce Sidebar',
		'before_widget' => '<div  id="%1$s" class="sidebar-padding %2$s widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
	
	register_sidebar(array(
		'id' => 'homepage-widgets',
		'name' => 'Homepage Widgets',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));

	register_sidebar(array(
		'id' => 'footer-widgets',
		'name' => 'Footer Widgets',		
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));

	
}

add_theme_support( 'automatic-feed-links' );
add_editor_style('');
if ( ! isset( $content_width ) ) $content_width = 640;

// Register custom post types
add_action('init', 'pyre_init');
function pyre_init() {
	register_post_type(
		'portfolio',
		array(
			'labels' => array(
				'name' => 'Portfolio',
				'singular_name' => 'Portfolio'
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'portfolio-type'),
			'supports' => array('title', 'editor', 'excerpt', 'thumbnail','comments'),
			'can_export' => true,
		)
	);

	// let's register taxonomies for portfolio custom posts
	register_taxonomy('portfolio_type', 'portfolio', array('hierarchical' => true, 'label' => 'Types', 'query_var' => true, 'rewrite' => true));
}





add_theme_support( 'woocommerce' ) ;




/**
 * WooCommerce Filters
 *
 * @since progression 1.0
 */

// Display 24 products per page. Goes in functions.php
//add_filter('loop_shop_per_page', create_function('$cols', 'return of_get_option("shop_products_pagination");;'));
add_filter('loop_shop_per_page', 'show_products_pagination');
if(!function_exists('show_products_pagination') {
	function () {
		return of_get_option("shop_products_pagination");
	}
})


// Adjust Shop Column Count
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return of_get_option("shop_cols");
	}
}


// Ajaxy Cart in Header
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
		<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="cart-header"><?php _e('Your Basket', 'progression'); ?> <?php echo sprintf(_n('(%d)', '(%d)', $woocommerce->cart->cart_contents_count, 'progression'), $woocommerce->cart->cart_contents_count);?></a>
	<?php

	$fragments['.cart-header'] = ob_get_clean();

	return $fragments;

}




// Create bread-crumbs
function progression_breadcrumbs() {
 
  $delimiter = ' / ';
  $home = 'Home'; // text for the 'Home' link
  $before = ''; // tag before the current crumb
  $after = ''; // tag after the current crumb
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 
	echo $before . '<div id="breadcrumb">' . $after;

 
    global $post;
    $homeLink = home_url();
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
}




if ( ! function_exists( 'progressionstudios_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyeleven_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Eleven 1.0
 */
function progressionstudios_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'woocommerce' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'woocommerce' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s on %2$s <span class="says">said:</span>', 'woocommerce' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'woocommerce' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'woocommerce' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'woocommerce' ); ?></em>
					<br />
				<?php endif; ?>

			</div>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'woocommerce' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for twentyeleven_comment()



// More Link on Posts
function has_more($post=NULL)
{
	if(!isset($post)) {
		global $post;
	}
	
	if(strpos($post->post_content, '<!--more-->') !== false) {
		return true;
	}
	
	return false;
}







/**
 * Enqueue scripts and styles
 */
function progression_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css', array( 'style' ) );
	wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Economica:700|Dosis:700|Doppio+One', array( 'style' ) );

	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/libs/modernizr-2.6.2.min.js', false, '20120206', false );
	wp_enqueue_script( 'plugins', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ), '20120206', false );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '20120206', false );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	if ( is_page_template('contact-full-width.php' && 'contact.php')  ) {
		wp_enqueue_script( 'google-maps', 'http://maps.google.com/maps/api/js?sensor=true', false, '20120206', false );
		wp_enqueue_script( 'go-mapsapi', get_template_directory_uri() . '/js/jquery.gomap-1.3.2.min.js', array( 'google-maps' ), '20120206', false );
	}
	
}
add_action( 'wp_enqueue_scripts', 'progression_scripts' );






// Pagination
function kriesi_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'><span class='arrows'>&laquo;</span></a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'><span class='arrows'>&lsaquo;</span></a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<a href='#' class='selected'>".$i."</a>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'><span class='arrows'>&rsaquo;</span></a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'><span class='arrows'>&raquo;</span></a>";
         echo "</div>\n";
     }
}

add_filter( 'add_to_cart_text', 'woo_custom_cart_button_text' ); // < 2.1
 
function woo_custom_cart_button_text() {
return __( 'Add To Basket', 'woocommerce' );
} 

/*///////////////////woo */
add_filter( 'woocommerce_add_to_cart_message', 'custom_add_to_cart_message' );
function custom_add_to_cart_message() {
global $woocommerce;

// Output success messages
if (get_option('woocommerce_cart_redirect_after_add')=='yes') :

$return_to = get_permalink(woocommerce_get_page_id('shop'));

$message = sprintf('<a href="%s" class="button">%s</a> %s', $return_to, __('Continue     Shopping &rarr;', 'woocommerce'), __('Product successfully added to your Basket.', 'woocommerce') );

else :

$message = sprintf('<a href="%s" class="button">%s</a> %s',     get_permalink(woocommerce_get_page_id('cart')), __('View Basket &rarr;', 'woocommerce'), __('Product successfully added to your Basket.', 'woocommerce') );

endif;

return $message;
}
/*-----------------put in function.php------------------------*/

add_action('admin_menu', 'servicebox_menu');
function servicebox_menu()
{
add_menu_page('HomePage Product', 'HomePage Product', 'manage_options', 'manage_servicebox', 'manage_servicebox');
add_submenu_page('manage_servicebox','Add Products', 'Add Products', 'manage_options', 'add_servicebox', 'add_servicebox');

}
function manage_servicebox()
{
include("theme_options/servicebox/servicebox_options.php");
}
function add_servicebox()
{
include("theme_options/servicebox/add_servicebox.php");
}

/*-----------------put in function.php------------------------*/
/*----------------- contact Information manage function------------------------*/
/*add_action('admin_menu', 'contact_menu');
function contact_menu()
{
add_menu_page('Header Address', 'Header Address', 'manage_options', 'manage_contact', 'manage_contact');
add_submenu_page('manage_contact','Add Header', 'Add Header', 'manage_options', 'add_contact', 'add_contact');
}
function contact_options()
{
include("theme_options/contact/add_contact.php");
}
function add_contact()
{
include("theme_options/contact/add_contact.php");
}*/
/*-----------------put in function.php------------------------*/

/*add_action('admin_menu', 'productbox_menu');
function productbox_menu()
{
add_menu_page('Our Product', 'Our Product', 'manage_options', 'manage_productbox', 'manage_productbox');
add_submenu_page('manage_productbox','Add Product Image', 'Add Product Image', 'manage_options', 'add_productbox', 'add_productbox');

}
function manage_productbox()
{
include("theme_options/productbox/produtbox_options.php");
}
function add_productbox()
{
include("theme_options/productbox/add_productbox.php");
}
*/
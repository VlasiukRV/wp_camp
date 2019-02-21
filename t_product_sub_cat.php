<?php
// Template Name: Sub Product Category
get_header(); ?>
<style>
#container-sidebar {
    float: left;
    width: 100%;
}

body #main li.product.column-4 {
    margin-right: 5%;
    width: 8.2%;
}
.item-container {
border:none !important;
background:none !important;
/* border: 1px solid #c8c7c2; */
/* background: #f7f6f2; */
}
.item-container {
/* margin: 0px 0px 20px 0px; */
-moz-border-radius: 4px;
border:none !important;
border-radius:0px !important;
padding:0px !important;

/* -webkit-border-radius: 4px; */
/* border-radius: 4px; */
/* padding: 9px; */
/* border: 1px solid #c8c7c2; */
/* background: #f7f6f2; */
-moz-box-shadow: none !important;
 -webkit-box-shadow: none !important;*/
  box-shadow: none !important; 
}
.item-container-content {
padding: 0px !important;
}
.aligncenter {
text-align: center;
margin: 0px auto 10px auto;
display: block;
font-size: 12px;
font-weight: bold;
text-indent: inherit;
/* text-decoration: underline; */
font-family: arial;
}
.woocommerce ul.products li.product a img, .woocommerce-page ul.products li.product a img{
margin-bottom:21px !important;}
</style>
<div style=" background: none repeat scroll 0 0 white;
    border: 1px solid #c4c4c4;
    padding: 10px; margin-left:-11px;" class="container">


		
		<?php if (function_exists('progression_breadcrumbs')) progression_breadcrumbs(); ?>
		
		<?php while(have_posts()): the_post(); ?>
		<h2><?php the_title(); ?></h2>

		<?php get_template_part( 'child-pages' ); ?>

		<?php the_content(); ?>
		
		<?php wp_link_pages(); ?>
		<?php endwhile; ?>
	</div>
    
    
    
<?php get_footer(); ?>
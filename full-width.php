<?php
// Template Name: Full Width
get_header(); ?>
<!--<style>.banner {
	background:#003a70;
	background-repeat: no-repeat;
	height: 208px;
	position: relative;
}
banner img{width:100%;}
.like {
	background-image: url("images/like.png");
	background-position: left top;
	background-repeat: no-repeat;
	border: medium none;
	cursor: pointer;
	
}
#like_form {
	bottom:10px;
	position:absolute;
	
}</style>
<?php
$feat_image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
if($feat_image!=''){
?>

<div class="banner" style="background-image:url(<?php //echo $feat_image; ?>)" > <a href="#" id="join-btn"></a>
  <div id="like_form">
  <h2 style="font-size::40px; text-align:center; color:white;"></h2>
  
    
  </div>
  <div class="clear"></div>
</div>
<?php } ?>
<!-- banner end -->

<div style=" background: none repeat scroll 0 0 white;
    border: 1px solid #c4c4c4;
    padding: 10px; margin-left:-11px;" class="container">
<h2><?php the_title(); ?></h2>


<?php while(have_posts()): the_post(); ?>
	

	<?php get_template_part( 'child-pages' ); ?>					

	<?php the_content(); ?>

	<?php endwhile; ?>
    </div>
<?php get_footer(); ?>
<?php include_once("config.php"); ?>
<?php
// Template Name: Homepage
get_header(); ?>
<style>#logo-slider-wraper{ left: 0px !important;
    position: relative;
    width: 1116px !important;}
    
    .c_bg {
 background: #fff;
    clear: both;
    margin: 0 auto;
    min-height: 180px;
    padding: 1% 0;
    width: 100%;
}
#container{
 margin: 0 auto;
    width: 1140px;
	}
    .item-container {
    background: none repeat scroll 0 0 #f7f6f2;
    border: 0px !important;
}
.item-container {
    background: none repeat scroll 0 0 #f7f6f2;
    border: 0px !important;
    border-radius: 4px;
    box-shadow: 0px !important;
    margin: 0 0 20px;
	display:inline-block;
   }
#browseButton{
margin-right:-9px;}</style>
    <div class="flexslider">
	<?php 
    echo do_shortcode("[metaslider id=16]"); 
?>
</div>
			
			
			
			<?php if(of_get_option('home_sidebar', '0')): ?><div id="container-sidebar"><?php endif; ?>
			
			<?php while(have_posts()): the_post(); ?>
			<?php the_content(); ?>
			<?php endwhile; ?>
			
			<?php
			if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Widgets')): 
			endif;
			?>
			<?php if(get_post_meta($post->ID, 'contactpage_mapaddress', true)): ?>
          <h3>ALL PRODUCTS</h3>  
            <div class="all-products">
             <?php $query= mysql_query("select * from  cus_service_box where status='Active' ");
	while($row=mysql_fetch_array($query) )
	{
	?>
<div class="ProductSup subp"><div class="ProdSup"><div class="ProdSupup"><div class="ProdSupdown">
<span><a title="<?php echo $row[title];?>" href="<?php echo $row[linked];?>"><?php echo $row[title];?></a></span><p><a title="<?php echo $row[title];?>" href="<?php echo $row[linked];?>"><img align="right" title="Service Parts" alt="Service Parts" src="<?php echo content_url();?>/uploads/servicebox/<?php echo $row[image];?>"></a></p>
<?php echo substr($row[detail],0,500) ;?>

<a title="" href="<?php echo $row[linked];?>"><span id="browseButton"> Show All</span></a>
</div></div></div> </div>
 <?php }	?>

<div style="clear:both;"></div>
</div>
		
	
		</div><!-- close .container -->
        
		<div style="clear:both;"></div>
		<div class="content-highlight">
            
			<div class="container">
                
            <h3>The Moto Tec Store is located in Corby - with easy access and free parking!</h3>
			
		<div class="item-container">
				<div class="item-container-image">
                
                <a href="http://moto-tec.co/contact-us/"><img style="width:100%;" width="100%" src="http://www.moto-tec.co/wp-content/uploads/2014/12/mototecmap.jpg"><img></a>
					 
					<?php //echo do_shortcode("[ready_google_map id='1']"); ?>
                   
					
				</div>
			</div>
               
            </div><!-- close .item-container -->	
				
				    <div style="clear:both;"></div>
			</div>
            <div style="clear:both;"></div>
		</div><!-- close .content-highlight -->
		<div class="container">
<div class="homepage-spacer"></div>	<?php endif; ?>	
			<?php if(of_get_option('home_sidebar', '0')): ?></div><!-- close #container-sidebar --><?php endif; ?>
  <h3>Featured Suppliers</h3>                      			<?php if(of_get_option('home_sidebar', '0')): ?><?php get_sidebar(); ?><?php endif; ?>
<?php 
    echo do_shortcode("[metaslider id=75]"); 
?>
<div class="clear"></div>
<?php //logo_slider(); ?>
<div class="clear"></div>



	
<?php get_footer(); ?>
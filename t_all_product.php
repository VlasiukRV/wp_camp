<?php include_once("config.php"); ?>
<?php
// Template Name: All Product Shop
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


<div class="banner" style="background-image:url(<?php //echo $feat_image; ?>)" > <a href="#" id="join-btn"></a>
  <div id="like_form">
  <h2 style="font-size::40px; text-align:center; color:white;"></h2>
  
    
  </div>
  <div class="clear"></div>
</div>

<!-- banner end -->

<div style=" background: ;
    border: ;
    padding: ;" class="container">
<h2><?php the_title(); ?></h2>
<div style="clear:both;"></div>
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


</div>

<div style="clear:both;"></div>
	
    </div>
<?php get_footer(); ?>
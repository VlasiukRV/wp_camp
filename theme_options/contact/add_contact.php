<?php mysql_query("CREATE TABLE IF NOT EXISTS `cus_testimonials` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `linked` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  
  PRIMARY KEY (`img_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
");?>

<div class="wrap">
  <div id="icon-themes" class="icon32"><br>
  </div>
  <h2>contact Options</h2>
  <div class="widget-liquid-left">
    <div id="widgets-left">
      <div id="available-widgets" class="widgets-holder-wrap ui-droppable">
        <div class="sidebar-name">
          <div class="sidebar-name-arrow"><br>
          </div>
        </div>
        <div class="widget-holder">
          <p class="description">Add / Manage  contact here</p>
          <div id="widget-list">
            <div class="clear"></div>
            <div class="clear"></div>
            <?php  
/*****/
if(isset($_POST['submit']))
{
$home_image=$_FILES['home_image']['name'];
if($_POST[title]!=='' && $home_image!=='')
{
$t=time();

 		//upload image
		$dhnd_image_dir = ABSPATH.'wp-content/uploads/slider/';
		$dhnd_image_url_base = get_bloginfo('wpurl').'wp-content/uploads/slider/';
		$path = ABSPATH."wp-content/uploads/slider/";
		$spl_id=$t.'_';
		$file_img_name=$spl_id.$_FILES['home_image']['name'];
		$target = $dhnd_image_dir;		
		$target = $target.$spl_id. basename( $_FILES['home_image']['name']) ;
 	
	if($_FILES['home_image']['name']!='') 
	{
	move_uploaded_file($_FILES['home_image']['tmp_name'],$target);
	$query=",image='$file_img_name' ";
	}
	else
	{
		$query="";
	}
  
		 

   $in="insert into cus_contact set  linked='$_POST[linked]', detail='$_POST[detail]' $query";
	mysql_query($in) or die(mysql_error());
	$msg="Information Entered";
	?>
            <script>window.location='admin.php?page=add_contact&msg=added';</script>
            <?php
 }

	else
	{
		$msg='Image Title and image are madatory';
	}
}
 ?>
            <?php  
/*****/
if(isset($_POST['edit']))
{
$home_image=$_FILES['home_image']['name'];
if($_POST[title]!=='')
{
$t=time();

 		//upload image
		$dhnd_image_dir = ABSPATH.'wp-content/uploads/slider/';
		$dhnd_image_url_base = get_bloginfo('wpurl').'wp-content/uploads/slider/';
		$path = ABSPATH."wp-content/uploads/slider/";
		$spl_id=$t.'_';
		$file_img_name=$spl_id.$_FILES['home_image']['name'];
		$target = $dhnd_image_dir;		
		$target = $target.$spl_id. basename( $_FILES['home_image']['name']) ;
 	
	if($_FILES['home_image']['name']!='') 
	{
	move_uploaded_file($_FILES['home_image']['tmp_name'],$target);
	$query=", image='$file_img_name'";
	}
	else
	{
		$query=" ";
	}
	
	
	 
	
 
	 $in="update cus_contact set  linked='$_POST[linked]', detail='$_POST[detail]' $query where img_id='$_POST[img_id]'";
	mysql_query($in) or die(mysql_error());
	$msg="Information Updated"; ?>
            <script>window.location='admin.php?page=add_contact&msg=updated&do=edit&img_id=<?php echo $_POST[img_id];?>';</script>
            <?php
 }

	else
	{
		$msg='Image Title Is Mandatory';
	}
}
 ?>
            <div style="clear:both;"></div>
            <div  class="form-box">
              <!--form to add product-->
              <?php //get pre vales
if($_GET['do']=='edit')
	{
	//fetch values
	$q="select * from cus_contact where img_id='$_GET[img_id]'";
	$v=mysql_query($q) or die(mysql_error());
	$r=mysql_fetch_array($v);
	echo $r[title1];
	}
?>
              <form action="" method="post" name="form1" enctype="multipart/form-data" >
                <br />
                <span style="color:#F00;"><?php echo $msg;?></span>
                <table width="600" border="0" cellspacing="5" cellpadding="5">
                  <input name="img_id" type="hidden" value="<?php echo $r[img_id]; ?>"  size="40" />
                  <p style="color:#F00;">
                    <?php if($_GET[msg]=="added"){ echo "Information added !";}?>
                    <?php if($_GET[msg]=="updated"){ echo "Information updated !";}?>
                  </p>
                  <?php if($_GET['do']=="edit") {?>
                  <tr>
                    <td colspan="2">&nbsp;</td>
                  </tr>
                  <?php } ?>
                  
                  
                  
                  
                  
                  
                  <tr>
                    <td><strong>Title</strong></td>
                    <td valign="top"><input name="title" type="text"  value="<?php echo $r[title]; ?>"   size="40" />
                    </td>
                  </tr>
                  
                  
                  <tr>
                    <td><strong>Detail</strong></td>
                    <td valign="top"><?php $settings = array( 'detail' => false ); wp_editor( $r['detail'], 'detail', $settings ); ?>
                    </td>
                  </tr>
                  
                  
                  
                  
                  
                  
                  
                   
                  
                  
                  <tr>
                    <td></td>
                    <td valign="top"><?php if($_GET['do']=="edit") {?>
                      <input name="edit" type="submit"  value="Submit" size="40" />
                      <?php }  else {?>
                      <input name="submit" type="submit"  value="Submit" size="40" />
                      <?php } ?>
                    </td>
                  </tr>
                </table>
              </form>
            </div>
          </div>
          <br class="clear">
        </div>
        <br class="clear">
      </div>
    </div>
  </div>
  <br class="clear">
</div>

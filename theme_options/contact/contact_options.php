<?php mysql_query("CREATE TABLE IF NOT EXISTS `cus_contact` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `linked` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  
    
  PRIMARY KEY (`img_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
");?>
<?php $url=content_url(); $url1=get_bloginfo('template_url');?>
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
if($_GET['do']=="status"){  
if($_GET[s]=="Active"){$st="Inactive";}
if($_GET[s]=="Inactive"){$st="Active";}
mysql_query("update cus_contact set status='$st' where img_id='$_GET[img_id]'");
}

if($_GET['do']=="del"){  
  mysql_query("delete from cus_contact where img_id='$_GET[img_id]'");
}
?>
            <div style="clear:both;"></div>
            <div class="text-box" style="width:880px;">
<?php 
if(!empty($_GET[Start]))
{
	$Start = $_GET[Start];
}
else
{
	$Start = '0';
}
$ByPage = '20';
$qnav="select * from cus_contact "; 


$i=0;
$q="select * from cus_contact order by img_id desc  limit $Start, $ByPage "; 
$v=mysql_query($q) or die(mysql_error());
while($r=mysql_fetch_array($v))
{
	$i=$i+1;
	if($r[status]=="Active")
	{
		$img="$url1/images/active.png";
	}
		if($r[status]=="Inactive")
	{
		$img="$url1/images/inactive.png";
	}
	
	echo "<div  style=\" padding:5px; border:5px solid #ddd;    width:805px; margin-bottom:10px;\">
	 
<div style=\"width:100%; float:right;\"><strong>$r[title] $r[sub_title]</strong> 
<p>Detail To : $r[detail]</p>
  
<p align=\"right\"><br/><br/><br/> <a href=\"admin.php?page=add_contact&do=edit&img_id=$r[img_id]\">
<img src=\"$url1/images/edit.png\" ></a>
<a href=\"admin.php?page=manage_contact&do=status&img_id=$r[img_id]&s=$r[status]\">
<img src=\"$img\"></a> <a href=\"admin.php?page=manage_contact&do=del&img_id=$r[img_id]\">
<img src=\"$url1/images/del.png\" ></a></p></div><div class=\"clear\"></div></div>";
  }?>
              <?php if($i%4==0)
  { ?>
              <div class="clear"></div>
              <?php } ?>
              <?php //page nav	
 $rnav=mysql_query($qnav) or die(mysql_error());
 $rows=mysql_num_rows($rnav);

 if($rows > $ByPage)
			{
				$Navigation1 .= " ";

				$pages = ceil($rows/$ByPage);

				for($i1 = 0; $i1 <= ($pages); $i1++)
				{
					$PageStart = $ByPage*$i1;
						//	$PageStart1=$ByPage*$i-1;
					$i21 = $i1+1 ;
	                if($pageStart=="$Start")
					{
					$id="id=\"selected\"";
					}
					if($PageStart <= $Start)
					{
						$links[] = "<a href=\"admin.php?page=manage_contact&Start=$PageStart\" $id>$i21</a> \n\t";
					}
					elseif($PageStart < $rows)
					{
						$links[] = "<a href=\"admin.php?page=manage_contact&Start=$PageStart\">$i21</a>\n\t ";	
					}
				}

				$links21 = implode("  ", $links);
		
				$Navigation1 .= $links21;

				$Navigation1 .= "\n";
			}
           echo "<div class=\"navi\">$Navigation1</div>";
 /**********************************/
?>
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

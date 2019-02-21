<?php error_reporting(0); ob_start(); ?>
 <?php
$url="http://".$_SERVER['SERVER_NAME'];
if($url=="http://localhost")
{
 
$db_host = "localhost";
 
//enter your MySQL database username
 $db_username = "root";
 //enter your MySQL database password
$db_password = "";
 //enter your MySQL database name
$db_name = "moto";
}
else
{
$db_host = "moto-tec.co.mysql";
 
//enter your MySQL database username
 $db_username = "moto_tec_co";
 //enter your MySQL database password
$db_password = "aTsKEg6d";
 //enter your MySQL database name
$db_name = "moto_tec_co";	
}
 		  ////////////////////////////////////////////////////////////
		 //////         do not edit below this line	///////
		///////////////////////////////////////////////////////////

//connect to the database server
$connection = mysql_connect($db_host, $db_username, $db_password) or die(mysql_error());

//select database
$db = mysql_select_db($db_name, $connection);

session_start();

$t=time();


?> 
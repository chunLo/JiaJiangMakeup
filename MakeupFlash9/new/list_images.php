<?php

// output a list of images in the database

$db = 'sunny.chunhuanglo.com';
$user = 'sunlo_sunny';
$password = 'v71022032';

mysql_connect($db,$user,$password) or die(mysql_error());
mysql_select_db('sunlo_sunny');

$query = "SELECT name,id from images";
$result = mysql_query($query);

while($row = mysql_fetch_assoc($result))
{
	/*
	echo("<a href='show_image.php?img_id=");
	echo($row['id']);
	echo("'>");
	echo($row['name']);
	echo("</a><br />");
	*/
	echo("<a href='show_image.php?img_id=");
	echo($row['id']);
	echo("'>");	
	
	//echo("<img src='show_thumb.php?img_id=");
	echo($row['name']);
	//echo("'>");
	echo("</a>");
	echo("<br />");
	
	
	
	// echo($row['name'] . ' ' . $row['id'] . '<br />');
	
}



mysql_close();



?>
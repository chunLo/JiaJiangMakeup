<?php

// show a single image by dumping JPEG data to browser

if (!empty($_GET['img_id']))
{
	$db = 'sunny.chunhuanglo.com';
	$user = 'sunlo_sunny';
	$password = 'v71022032';

	mysql_connect($db,$user,$password) or die(mysql_error());
	mysql_select_db('sunlo_sunny');
	
	$id = $_GET['img_id'];
	$query = "SELECT image_data from images where id = $id";
	
	$result = mysql_query($query);
	
	if ($result)	
	{
		$row = mysql_fetch_assoc($result);
		header('Content-type: image/jpeg');
		echo($row['image_data']);
	}


	mysql_close();
}



?>
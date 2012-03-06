<?php

if (!empty($_FILES))
{
	$con = mysql_connect('sunny.chunhuanglo.com','sunlo_sunny','v71022032');
	if (!$con)
	{
		die(mysql_error());
	}
	
	mysql_select_db('sunlo_sunny');
	
	$tmp_name = $_FILES['Filedata']['tmp_name'];
	$filename = $_FILES['Filedata']['name'];
	//$tags = mysql_real_escape_string($_POST['tags']);
	
	$fp = fopen($tmp_name,'r');
	$content = fread($fp,filesize($tmp_name));
	fclose($fp);
			
	$content = addslashes($content);
	
	$query = "INSERT INTO images (name,image_data) values ('$filename','$content')";
	$result = mysql_query($query);	
	
	mysql_close();
}


?>
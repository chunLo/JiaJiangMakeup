<?php


$data = $GLOBALS['HTTP_RAW_POST_DATA'];

$response = Array();

if (is_null($data)) {
	$response['result'] = 0;
	$response['text'] = "no data";
} 
else 
{   //$file = fopen("save_pic.png", "w") or die("cannotOpen"); //一定要""
	
	$con = mysql_connect('sunny.chunhuanglo.com','sunlo_sunny','v71022032');
	if (!$con)
	{
		die(mysql_error());
	}
	
	mysql_select_db('sunlo_sunny');
    
	$blob = file_get_contents('php://input');//input photo data
	
	$query = "INSERT INTO images (name,image_data) VALUES ('save_pic','" . mysql_real_escape_string($blob) . "')";
	$result = mysql_query($query);	
	
	$response['result'] = 1;
	$response['text'] = mysql_insert_id();
	
	
	// echo(mysql_insert_id());
	mysql_close();
	
	// fclose($file);
	
	
} 

// {result:1, text:9}
echo(json_encode($response));


?>

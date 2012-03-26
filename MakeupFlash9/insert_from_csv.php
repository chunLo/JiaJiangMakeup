<?php

// open a file
$fp = fopen('books.csv','r');

// connect to the DB
$con = mysql_connect('sunny.chunhuanglo.com','sunlo_sunny','v71022032');
if (!$con)
{
	die(mysql_error());
}

mysql_select_db('sunlo_sunny');

$line = fgets($fp);

// run through each line
while($line)
{
	// echo($line . '<br />');
	// parse the line 
	
	$parts = explode(',',$line);

	// grab the first part of the line
	$book = $parts[0];
	
	// get rid of any WHITESPACE
	$book = trim($book);
	
	// handle any special characters 
	$book = addslashes($book);
	
	
	$author = addslashes(trim($parts[1]));

	$query = "INSERT into books (title,author) VALUES ('$book','$author')";
	
	echo($query . '<br />');
	
	$result = mysql_query($query);
	
	if (!$result)
	{
		echo('ERRROR! ' . mysql_error());
	}

	$line = fgets($fp);
}

mysql_close();


// insert the data into the DB

fclose($fp);

?>

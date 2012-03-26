<?php

function select_max_id($id="id",$my_table="cms_pages")
{
  $db = new clsDBcms();//You may have different connection class 

  $SQL = "SELECT MAX($id) FROM ".$my_table;
  $db->query($SQL);
  if ($db->next_record())
  {
     $max_id = $db->f(0);
  }
$db->close();
return $max_id;
} 

?>

<?php 
include("hw2sql.php");
$delete_number= $_GET['number'];

$sql="DELETE FROM `hhc102u_contacts`.`contacts` WHERE `contacts`.`number` = '$delete_number'";
$result=mysql_query($sql);

header("Location:hw2.php");
?>
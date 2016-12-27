<?php
include("hw3sql.php");
$Ac = htmlspecialchars($_POST['ac']);
$Pw = htmlspecialchars($_POST['pw']);
$sql = "INSERT INTO `hhc102u_board`.`member`(`mid`,`account`,`password`,`lv`) VALUES(NULL,'$Ac','$Pw',2)";
mysql_query($sql);
header("Location:member.php");
?>
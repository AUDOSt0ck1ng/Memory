<?php 
include("hw2sql.php");
$new_name = htmlspecialchars($_POST['nameby']);
$new_email = htmlspecialchars($_POST['emailby']);
$new_phone = htmlspecialchars($_POST['phoneby']);
$new_gender = htmlspecialchars($_POST['genderby']);
$new_birthday = htmlspecialchars($_POST['birthdayby']);
$new_address = htmlspecialchars($_POST['addressby']);

$sql="INSERT INTO `hhc102u_contacts`.`contacts` (`number`, `name`, `gender`, `phone`, `address`, `email`, `birthday`) VALUES (NULL,'$new_name','$new_gender','$new_phone','$new_address','$new_email','$new_birthday');";
$result=mysql_query($sql);

header("Location:hw2.php");
?>
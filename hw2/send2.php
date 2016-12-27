<?php 
include("hw2sql.php");
$new_name = htmlspecialchars($_POST['nameby']);
$new_email = htmlspecialchars($_POST['emailby']);
$new_phone = htmlspecialchars($_POST['phoneby']);
$new_gender = htmlspecialchars($_POST['genderby']);
$new_birthday = htmlspecialchars($_POST['birthdayby']);
$new_address = htmlspecialchars($_POST['addressby']);

$user_number = $_GET['number'];

$sql="UPDATE `hhc102u_contacts`.`contacts` SET `name` = '$new_name', `gender` = '$new_gender', `phone` = '$new_phone', `address` = '$new_address', `email` = '$new_email' , `birthday` = '$new_birthday' WHERE `contacts`.`number` = $user_number;";
$result=mysql_query($sql);

header("Location:hw2.php");

?>
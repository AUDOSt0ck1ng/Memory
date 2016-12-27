<?php
include("hw3sql.php");

$User = $_POST['user'];
$Ulv = $_POST['ulv'];
$Article = htmlspecialchars($_POST['articleby']);

if(strcmp($Article,"")!=0){
	$datetime = date ("Y-m-d H:i:s" , mktime(date('H')+8, date('i'), date('s'), date('m'), date('d'), date('Y'))) ; 
	$sql = "INSERT INTO `hhc102u_board`.`board`(`pid`,`name`,`content`,`file`,`time`) VALUES(NULL,'$User','$Article',NULL,'$datetime')";
	$result = mysql_query($sql) or die(mysql_error());
}
	?>
<!DOCTYPE html>
<html>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
		<title>Article Done</title>
		<link rel="stylesheet" href="hw3css.css">
</head>

	<div align="center">
		<form method = "post" action="hw3.php">
			<input type="hidden" class="user" name="user" value="<?php echo $User;?>">
			<input type="hidden" class="ulv" name="ulv" value="<?php echo $Ulv;?>">
			<button type="submit">continue</button>
		</form>
	</div>

</html>
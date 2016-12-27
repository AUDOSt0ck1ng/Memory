<?php
include("hw3sql.php");
$Parent = $_POST['parentby'];
$User = $_POST['user'];
$Ulv = $_POST['ulv'];
$Message = htmlspecialchars($_POST['messageby']);
if(strcmp($Message,"")!=0){
	if(strcmp($User,"guest")!=0){
		$datetime = date ("Y-m-d H:i:s" , mktime(date('H')+8, date('i'), date('s'), date('m'), date('d'), date('Y'))) ;
		$sql = "INSERT INTO `hhc102u_board`.`message`(`pid`,`name`,`text`,`file`,`time`,`parent`) VALUES(NULL,'$User','$Message',NULL,'$datetime','$Parent')";
		$result = mysql_query($sql) or die(mysql_error());
		?>
<!DOCTYPE html>
<html>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
		<title>Message Done</title>
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
		
		<?
	}

	else{
		echo "guest can't not leave a message.";
		echo '<meta http-equiv="refresh" content="2;url=hw3.php">';
	}
}
else {header("Location:hw3.php");}
?>
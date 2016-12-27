<?php
include("hw3sql.php");
$Ac = htmlspecialchars($_POST['ac']);
$Pw = htmlspecialchars($_POST['pw']);
$sql = "SELECT *  FROM `hhc102u_board`.`member` WHERE `account` = '$Ac';";
$result = mysql_query($sql) or die(mysql_error());
$row=mysql_fetch_array($result);

if(strcmp($row[2],$Pw) == 0){//success
$Ulv = $row[3];
?>
<!DOCTYPE html>
<html>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
		<title>Member login</title>
		<link rel="stylesheet" href="hw3css.css">
</head>

	<div align="center">
		<form method = "post" action="hw3.php">
			<input type="hidden" class="user" name="user" value="<?php echo $Ac;?>">
			<input type="hidden" class="ulv" name="ulv" value="<?php echo $Ulv;?>">
			<button type="submit">continue</button>
		</form>
	</div>

</html>
<?php
}
else{
	header("Location:member.php");
}
?>
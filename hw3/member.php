<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
		<title>Member login</title>
		<link rel="stylesheet" href="hw3css.css">
	</head>
	<div class="backpic">
		<div align="center" class="login_item" valign="center">
			<h>Login</h><br>
			<form method="post" action="msend.php">
				<input type="text" class="ac" name="ac" placeholder="Account">
				<input type="text" class="pw" name="pw" placeholder="Password">
				<button type="submit">go</buttont>
			</form>
		</div>		
		<div align="center" class="buildmember_item" valign="center">
			<h>Quickly build an Account</h><br>
			<form method="post" action="addac.php">
				<input type="text" class="ac" name="ac" placeholder="Account">
				<input type="text" class="pw" name="pw" placeholder="Password">
				<button type="submit">build</buttont>
			</form>
		</div>
	</div>	
</html>
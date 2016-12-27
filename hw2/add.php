<?php 
	include("hw2sql.php");?>
<!DOCTYPE html>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
		<link rel="shortcut icon" href="123ddd.png" type="image/x-icon">
		<title> ADD+ </title>
		<link rel="stylesheet" href="hw2css.css">
	</head>
	<body>
		<header align="center">
			<h>ADD+</h>
		</header>
		<container>
			<section class="all">
				<section class="menu" align="center">
					<h1>ADD+ Data
					<li><a class="back" a style="text-decoration: none" href="hw2.php">Back</a>
					</h1>
					<form method="post" action="send.php">
						<p1><li class="rd">*</li>Name </p1><input type="text" name="nameby" placeholder="Annie..." required><br>
						<p1><li class="rd">*</li>Email </p1><input type="text" name="emailby" placeholder="Annie@..."required><br>
						<p1><li class="rd">*</li>Phone </p1><input type="text" name="phoneby" placeholder="09XXXXXXXX"required><br>
						<p1><li class="rd">*</li>Gender </p1><input type="radio" name="genderby" value="M"><p1>Male</p1><input type="radio" name="genderby"value="F" checked><p1>Female</p1><br>
						<p1><li class="rd">*</li>Birthday </p1><input type="date" name="birthdayby"required><br>
						<p1>Address </p1><input type="text" name="addressby" placeholder="The right-side bush..."><br>
						<input type="reset" value="Clear">
						<input type="submit"value="Build">
					</form>
				</section>
			</section>
		</container>
		
	</body>
</html>

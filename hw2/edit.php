<?php
	include("hw2sql.php");
	$order_number = $_GET['number'];
	$sql="SELECT * FROM `contacts` WHERE `number` = '$order_number'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
?>
<!DOCTYPE html>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
		<link rel="shortcut icon" href="123ddd.png" type="image/x-icon">
		<title>Edit </title>
		<link rel="stylesheet" href="hw2css.css">
	</head>
	<body>
		<header align="center">
			<h><?echo $row[1];?></h>
		</header>
		<container>
			<section class="all">
				<section class="menu" align="center">
					<h1><?echo $row[1];?>'s Data
					<li><a class="back" a style="text-decoration: none" href="hw2.php">Back</a>
					</h1>
					<form method="post" action="send2.php?number=<?php echo $row[0];?>">
						<p1>Name </p1><input type="text" name="nameby" value="<?php echo $row[1]?>" required><br>
						<p1>Email </p1><input type="text" name="emailby" value="<?php echo $row[5]?>" required><br>
						<p1>Phone </p1><input type="text" name="phoneby" value="<?php echo $row[3]?>" required><br>
						<p1>Gender </p1><input type="radio" name="genderby" value="M"<?php if($row[2]=='M'){echo"checked";}?>><p1>Male</p1><input type="radio" name="genderby"value="F"<?php if($row[2]=='F'){echo"checked";} ?>><p1>Female</p1><br>
						<p1>Birthday </p1><input type="date" name="birthdayby" value="<?php echo $row[6]?>" required><br>
						<p1>Address </p1><input type="text" name="addressby" value="<?php echo $row[4]?>"><br>
						<input type="reset" value="Clear">
						<input type="submit"value="Build">
					</form>
				</section>
			</section>
		</container>
		
	</body>
</html>

<?php
	include("hw2sql.php");
	$order_number = $_GET['number'];
	$sql="SELECT * FROM `contacts` WHERE `number` = '$order_number'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
?>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
		<link rel="shortcut icon" href="123ddd.png" type="image/x-icon">
		<title> Personal Data </title>
		<link rel="stylesheet" href="hw2css.css">
	</head>
	<body>
		<header align="center">
			<h><?echo $row[1];?></h>
		</header>
		<container>
			<section class="all">
				<section class="menu" align="center">
					<h1>
						<?echo $row[1];?>'s Data
						<li><a class="back" a style="text-decoration: none" href="hw2.php">Back</a>
					</h1>
					<table class="DataTable" align="center">
						<th>Item</th>
						<th>Data</th>
						<tbody>
							<tr>
								<td align="center" class="p2">Gender</td>
								<td align="center" class="p4"><?if($row[2]=='M'){echo "Male";}else{echo "Female";}?></td><br>
							</tr>
							<tr>
								<td align="center" class="p3">Birthday</td>
								<td align="center" class="p5"><?echo $row[6];?></td><br>
							</tr>
							<tr>
								<td align="center" class="p2">Email</td>
								<td align="center" class="p4"><?echo $row[5];?></td><br>
							</tr>
							<tr>
								<td align="center" class="p3">Phone</td>
								<td align="center" class="p5"><?echo $row[3];?></td><br>
							</tr>
							<tr>
								<td align="center" class="p2">Address</td>
								<td align="center" class="p4"><?echo $row[4];?></td><br>
							</tr>
						</tbody>
					</table>
				</section>
			</section>
		</container>
	</body>
</html>
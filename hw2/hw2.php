<?php
	$dc = $_GET['dc'];
	$dp = $_GET['dp'];
		if(empty($dc)){
			$dc=0;//number of last item;
			$dp=1;//page counter;
		}
	$how_many = 0;//how many items have been taken in this page;
include("hw2sql.php");?>
<!DOCTYPE html>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
		<link rel="shortcut icon" href="123ddd.png" type="image/x-icon">
		<title>Audo's Contacts</title>
		<link rel="stylesheet" href="hw2css.css">
	</head>

	<body>
		<header align="center">
			<h>Audo's Contacts</h>
			<form method="get" action="search.php">
				<input type="text" class="search" name="searchby" placeholder="SEARCH...">
			</form>
		</header>
		
		<container>
			<section class="all">
				<section class="menu">
					<h1>
						Software-Design classmate
						<a class="add" a style="text-decoration: none" href="add.php">Add+</a>
					</h1>
					<table>
						<th class="other">Name</th>
						<th class="other">Email</th>
						<th class="other">Phone</th>
						<th class ="func">Detail</th>
						<th class ="func">Edit</th>
						<th class ="func">Delete</th>
						<tbody>
							<?php
								$td = 0;//total data;
								$sql = "SELECT * FROM `contacts`";
								
								$index_p = 1;
								
								$p[0]=0;
								$result = mysql_query($sql);
								
								while($row=mysql_fetch_array($result)){
									$td+=1;
									if($td%5 == 0){
										$p[$index_p] = $row[0];
										$index_p+=1;
									}
								}
								$tp=$td/5;
								if($td%5 != 0){
									$tp+=1;
								}
								$sql = "SELECT * FROM `contacts` WHERE `contacts`.`number`>".$dc;
								$result = mysql_query($sql);
								while($row = mysql_fetch_array($result)){
									if($how_many++ >=5){
										break;
									}
							?>
									<script>
										var dnumber;
										function myFunction(dnumber){
											var r = confirm("Are you sure?");
											if (r == true) {
												console.log(dnumber);
												var url = "send3.php?number=" + dnumber;
												location.href = url;
											}
										}
									</script>
								<tr>
									<td align="center"><p><?php echo $row[1];?></p></td>
									<td align="center"><p><?php echo $row[5];?></p></td>
									<td align="center"><p><?php echo $row[3];?></p></td>
									<td align="center"><a class="detail" a style="text-decoration: none" href="detail.php?<?php echo "number=".$row[0]?>"></a></td>
									<td align="center"><a class="edit" a style="text-decoration: none" href="edit.php?<?php echo "number=".$row[0]?>"></a></td>
									<td align="center"><p class="delete" onClick="myFunction(<?echo $row[0];?>)"></p></td>
								</tr>
							<?php	
								}
								$dc = $row[0];//update the number of last item;
							?>
						</tbody>
					</table>
					</section>
			</section>
		</container>
		<footer>
			<section class="page">
				<ul>
				<?php for($i=1;$i<=$tp;$i++){?>
				<li><a class="page" a style="text-decoration: none" href="hw2.php?<?php echo "dc=".$p[$i-1]."&dp=".$i;?>"><?php echo $i;?></a></li>
				<?}?>
				</ul>
			</section>
		</footer>
	</body>
</html>
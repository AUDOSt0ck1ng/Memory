<?php
	$Search =htmlspecialchars($_POST['searchby']);
	$User = $_POST['user'];
	$Ulv = $_POST['ulv'];
	$Si = $_POST['si'];
	if(empty($User)){$User = "guest";}
	if(empty($Ulv)){$Ulv=1;}
	if(empty($Si)){$Si = 0;}
include("hw3sql.php");?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
		<title>Audo's Board</title>
		<link rel="stylesheet" href="hw3css.css">
		<link rel="shortcut icon" href="free-icons.jpg" type="image/x-icon">
	</head>

	<body>
		<div class="backpic">
			<div class="bhead" align="center">
			<h>Audo's Board</h>
			<br>
			<div class="log">
			<form method="post" action = "member.php">
				<input type="submit" name="sb" value="login">
			</form>
			<br><p>Hi, <?php echo $User;?><br>Lv:<?php echo $Ulv;?></p>
			</div>
			</div>
			<header align="center">
				<h>Search Article</h>
				<form method="post">
					<input type="text" class="search" name="searchby" placeholder="SEARCH...">
					<input type="hidden" class="user" name="user" value="<?php echo $User;?>">
					<input type="hidden" class="userlv" name="ulv" value="<?php echo $Ulv;?>">
				</form>
				
			</header>
			
			<div class="container">
				<section class="all" align="center">
						<section class ="big">
							<section class="small1">
							<form method="post" action="adda.php">
								<textarea class="addarticle" rows="5" cols="60" name="articleby" onfocus="this.select()" placeholder="Write some article here..."></textarea>
								<input type="hidden" class="user" name="user" value="<?php echo $User;?>">
								<input type="hidden" class="userlv" name="ulv" value="<?php echo $Ulv;?>">
								<button type="submit">done</button>
							</form>
							</section>
						</section>
						
						
						<?php //??:board	??1:message
							$counter = 0;
							$sql = "SELECT * FROM `board`";//1
							if(!empty($Search)){$sql = "SELECT * FROM `board` WHERE CONCAT(`name`,`content`) LIKE '%$Search%'";}
							$result = mysql_query($sql);
							while($row=mysql_fetch_array($result)){
								$counter++;
							}
							$counter = $counter/5+1;
							
							$sql = "SELECT * FROM `board` ORDER BY `time` DESC LIMIT 5 OFFSET ".$Si;//2
							if(!empty($Search)){$sql = "SELECT * FROM `board` WHERE CONCAT(`name`,`content`) LIKE '%$Search%'  ORDER BY `time` DESC LIMIT 5 OFFSET ".$Si;}
							$result = mysql_query($sql);
							while($row=mysql_fetch_array($result)){
						?>
							<section class="big">
								<div><p class="poster">Poster: <?php echo $row[1]?></p></div>	
								<section class="small1">	
									<div class="content"><?php echo $row[2]?></div>
								</section>	
							<?php 
									$sql1 = "SELECT * FROM `message` WHERE `parent`=".$row[0]." ORDER BY `time` ASC";
									$result1 = mysql_query($sql1);
									while($row1=mysql_fetch_array($result1)){
							?>
								<section class="small2">
									<div class="text"><div class="ttime"><?php 
									echo $row1[4][0];echo $row1[4][1];
									echo $row1[4][2];echo $row1[4][3];
									echo $row1[4][4];echo $row1[4][5];
									echo $row1[4][6];echo $row1[4][7];
									echo $row1[4][8];echo $row1[4][9];
									echo " ";
									?></div> 
									<?php 
									echo $row1[1];
									?> : 
									<?php
									echo $row1[2]
									?>
									</div>
								</section>
							<?php   }
							?>
								<section class="small2">
									<form method="post" action="addm.php">
									<textarea class="addmessage" rows="1" cols="60" name="messageby" onfocus="this.select()" placeholder="Write some message here..."></textarea>
									<input type="hidden" class="parentby" name="parentby" value="<?php echo $row[0];?>">
									<input type="hidden" class="user" name="user" value="<?php echo $User;?>">
									<input type="hidden" class="userlv" name="ulv" value="<?php echo $Ulv;?>">
									<button type="submit">done</button>
									</form>
								</section>
							</section>
							<section class="big2" align="center">
								<div class="time"><p1><?echo $row[4];?></p1></div>
							</section>
							<?php
							}
							?>
							<section class="page" align="center">	
								<ul>
								<?php for($i=1;$i<=$counter;$i++){?>
									<li>
										<form method="post">
										<input type="hidden" class="search" name="searchby" value="<?php echo$Search;?>">
										<input type="hidden" class="page" name="si" value="<?php echo (5*($i-1));?>">
										<input type="hidden" class="user" name="user" value="<?php echo $User;?>">
										<input type="hidden" class="userlv" name="ulv" value="<?php echo $Ulv;?>">
										<input type="submit" name="sb" value="<?php echo$i?>">
										</form>
									</li>
								<?}?>
								</ul>
							</section>	
					
				</section>
			</div>		
		</div>
	</body>
</html>
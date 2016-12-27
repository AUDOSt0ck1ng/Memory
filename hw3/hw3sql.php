<?php
	$db_server = "mysql.cs.ccu.edu.tw";
	$db_name = "hhc102u_board";
	$db_user = "hhc102u";
	$db_passwd = "xurihrij";

	$link=mysql_connect($db_server, $db_user ,$db_passwd)or die("cannot connec1111.");
	
	if(!mysql_select_db("hhc102u_board")) { die("mysql_select_db failed");}
	if(!mysql_select_db($db_name)) {die("cannot use.");}
		//mysql_query("set names utf8");
?>

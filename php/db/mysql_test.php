<?php
	include "mysql.php";
	include "../jump.php";
	
	$m = new mysql;
	$m->link_db("blog");
	$sqltext = "insert into x_blog (name) VALUES('11')";
	$m->executeSql_insert($sqltext);
	$sqltext2 = "select * from x_blog";
	$m->excuteSql_read($sqltext2);
	$m->close();

	$j = new jump;
	$j->view("../../Index.html");
?>
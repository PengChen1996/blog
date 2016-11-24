<?php
	include "../db/mysql.php";

	$m = new mysql;
	$m->link_db("blog");

	$ip = $_POST["ip"];
	$address = $_POST["address"];
	date_default_timezone_set('Etc/GMT-8');//设置时区
	$date = date('Y/m/d H:i:s');
	$sqltext = "insert into x_visitor (ip,address,date) VALUES('$ip','$address','$date')";
	$m->executeSql_insert($sqltext);
	$m->close();
?>
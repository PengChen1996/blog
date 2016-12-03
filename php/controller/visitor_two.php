<?php
	include "../db/mysql.php";

	$m = new mysql;
	$m->link_db("blog");

	$ip = GetIP();
	date_default_timezone_set('Etc/GMT-8');//设置时区
	$date = date('Y/m/d H:i:s');
	$sqltext = "insert into x_visitor (ip,address,date) VALUES('$ip','visitor_two','$date')";
	$m->executeSql_insert($sqltext);
	$m->close();

	function GetIP(){
		if(!empty($_SERVER["HTTP_CLIENT_IP"])){
		  $cip = $_SERVER["HTTP_CLIENT_IP"];
		}
		elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
		  $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		}
		elseif(!empty($_SERVER["REMOTE_ADDR"])){
		  $cip = $_SERVER["REMOTE_ADDR"];
		}
		else{
		  $cip = "无法获取！";
		}
		return $cip;
	}
?>
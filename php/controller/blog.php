<?php
	include "db/mysql.php";

	class blog{
		function insert(){
			$da = $_POST["da"];
			$m = new mysql;
			$m->link_db("blog");
			$sqltext = "insert into x_blog (name) VALUES('$da')";
			$m->executeSql_insert($sqltext);
			$m->close();
		}
		function insert2(){
			$m = new mysql;
			$m->link_db("blog");
			$sqltext = "insert into x_blog (name) VALUES('32323')";
			$m->executeSql_insert($sqltext);
			$m->close();
		}
	}

?>
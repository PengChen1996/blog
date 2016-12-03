<?php
	include "db/mysql.php";
	date_default_timezone_set('Etc/GMT-8');//设置时区

	class blog_model{
		function m_insert(){
			$title = $_POST["title"];
			$content = $_POST["content"];
			$year = date('Y');
			$array = array('一','二','三','四','五','六','七','八','九','十','十一','十二');
			$month = $array[date('m')-1];
			$day = date('d');
			$his = date('H:i:s');

			$m = new mysql;
			$m->link_db("blog");
			$sqltext= "insert into x_blog (title,content,year,month,day,his,status) VALUES('$title','$content','$year','$month','$day','$his',0)";
			$m->executeSql_insert($sqltext);
			$m->close();
		}
		function m_select(){
			$startcount = $_POST['startcount'];
			$pagesize = $_POST['pagesize'];
			$m = new mysql;
			$m->link_db("blog");
			$sqltext = "select * from x_blog where status=0 ORDER BY id desc limit $startcount,$pagesize";
			$result = $m->excuteSql_read($sqltext);
			// var_dump($result);
			$m->close();
			return $result;
		}
	}
?>
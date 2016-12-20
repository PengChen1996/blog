<?php
	include "db/mysql.php";
	date_default_timezone_set('Etc/GMT-8');//设置时区

	class blog_model{
		function m_insert(){
			$title = $_POST["title"];
			$content = $_POST["content"];
			$content =  str_replace ( "'", "\'", $content);		//将字符串中的'(单引号)替换成\'(反斜杠单引号)，保证插入不会出错;
			$year = date('Y');
			$array = array('一','二','三','四','五','六','七','八','九','十','十一','十二');
			$month = $array[date('m')-1];
			$day = date('d');
			$his = date('H:i:s');

			$m = new mysql;
			$m->link_db("blog");
			$sqltext= "insert into x_blog (title,content,year,month,day,his,eye,comment,voted,unvoted,status) 
					VALUES ('$title','$content','$year','$month','$day','$his',1,1,1,0,0)";
			$m->executeSql_insert($sqltext);
			$m->close();
		}
		function m_select(){
			$startcount = $_POST['startcount'];
			$pagesize = $_POST['pagesize'];
			$m = new mysql;
			$m->link_db("blog");
			$sqltext_blog = "select * from x_blog where status=0 ORDER BY id desc limit $startcount,$pagesize";
			$result_blog = $m->excuteSql_read($sqltext_blog);
			// var_dump($result_blog);	//array
			$sqltext_count = "select * from x_blog where status=0";
			$result_count = $m->excuteSql_count($sqltext_count);
			// var_dump($result_count);	//int
			$arr_result = array();
			$arr_result['count'] = $result_count;
			$arr_result['blog'] = $result_blog;
			// var_dump($arr_result);	//
			$m->close();
			return $arr_result;
		}
		function m_select_one(){
			$m = new mysql;
			$m->link_db("blog");
			$id = $_POST['id'];
			$sqltext ="select * from x_blog where id=$id";
			$result = $m->excuteSql_read($sqltext);
			$m->close();
			return $result;
		}
	}
?>


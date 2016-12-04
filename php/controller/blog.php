<?php
	include "model/blog_model.php";
	//http://localhost/myblog/php/uri.php/blog/blog/insert

	class blog{
		function insert(){
			$o = new blog_model;
			$o->m_insert();
		}
		function select(){
			$o = new blog_model;
			$result = $o->m_select();
			// var_dump($result);
			echo json_encode($result);
		}
		function select_one(){
			$o = new blog_model;
			$result = $o->m_select_one();
			// var_dump($result);
			echo json_encode($result);
		}
	}

?>
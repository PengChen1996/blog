<?php
// http://localhost/myblog/php/uri.php/blog/blog/insert
	$uri = @$_SERVER['REQUEST_URI'];
	// echo "$uri";
	$seg = array_slice(explode('/', $uri), 4);
	$file_name = array_shift($seg);
	$class_name = array_shift($seg);
	$function_name = array_shift($seg);
	// echo "<br>$file_name<br>$class_name<br>$function_name<br>";
	if(isset($file_name)&&isset($class_name)&&isset($function_name)){
		include_once("controller/$file_name.php");
		$obj = new $class_name();
		$obj->$function_name();
	}else{
		echo("url error!<br>");
		echo "example:http://localhost/myblog/php/uri.php/file_name/class_name/function_name<br>";
		echo "example:http://localhost/myblog/php/uri.php/blog/blog/insert<br>";
	}
?>
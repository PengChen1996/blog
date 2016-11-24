<?php
	class jump{
		function view($url){
			header("Location: $url");
			exit;
		}
	}
?>



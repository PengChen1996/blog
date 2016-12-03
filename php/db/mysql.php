<?php
	class mysql{
		private $servername;
		private $username;
		private $password;
		private $conn;
		function mysql(){
			$this->username = "root";
			$this->password = "123456cp";
			$this->servername = "localhost";
		}
		function link_db($dbname){
			if ($dbname==""){
            	$dbname="blog";
            }
			$this->conn = new mysqli($this->servername, $this->username, $this->password, $dbname);
			if ($this->conn->connect_error) {
			    die("link_db_error " . $this->conn->connect_error);
			} 
		}
		function executeSql_insert($sql){
			$result = $this->conn->query($sql);
//			echo $result;
			if($result === TRUE){
				echo "execute sql is success";
//				echo $result->num_rows;
			}
			else{
				echo "execute sql is fail";
				echo "<br>Error: " . $sql . "<br>" . $this->conn->error;
			}
		}
		function excuteSql_read($sql){
			$result = $this->conn->query($sql);
			if ($result->num_rows > 0) {
			    // 输出每行数据
			    $arr = array();
			    while($row = $result->fetch_assoc()) {
			    	$arr[$row["id"]] = $row;
			    }
			    return $arr;
			} else {
			    echo "0 result";
			}
		}
		function excuteSql_count($sql){
			$result = $this->conn->query($sql);
			if ($result->num_rows > 0) {
				$count = $result->num_rows;
				// var_dump($count);
				return $count;
			}
			else{
				echo "0 result";
			}
		}
		//关闭 执行完需要关闭数据库
		function close(){
			$this->conn->close();
		}
	}
?>
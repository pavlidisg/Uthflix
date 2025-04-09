<?php
	function db_connect(){
		static $conn;
		if(!isset($conn)){
			define('DB_SERVER', 'localhost');
			define('DB_USER', 'simple_user');
			define('DB_PASS', '123456789');
			define('DB_NAME', 'db2');

			$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
			if($conn===false){
				return mysqli_connect_error();
				die();
			}
		}
		return $conn;
	}
?>
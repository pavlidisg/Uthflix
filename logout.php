<?php
	session_start();
	if(isset($_SESSION['id'])){
		session_unset();
		session_destroy();
		header("Refresh:1; url=index.php");
		die();
	}else{
		header("Refresh:2; url=index.php");
		echo "Unauthorized access<br>";
		die();
	}
?>
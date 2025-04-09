<?php 
	session_start();
    if(!isset($_SESSION['id'])){
		header("Refresh:1; url=index.php");
		echo 'failed';
		die();
	}else{
		$id=$_SESSION['id'];
		$role = $_SESSION['role'];
		if($role == 'user'){
			require_once('dbfusers.php');
		}else if($role == 'prods'){
			require_once('dbfprods.php');
		}else if($role=="admin"){
			require_once('dbfadmins.php');
		}
		$conn=db_connect();
	}
?>
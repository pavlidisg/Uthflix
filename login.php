<?php
	session_start();
	if(isset($_SESSION['id'])){
		header("Refresh:0; url=uthflix.php");
	}
    if(isset($_POST['login'])){
		require_once('dbfguest.php');
		$conn=db_connect();
		$uname=$_POST['uname'];
		$pass=md5($_POST['psw']);
		$sql="select * from users where username='$uname' and password='$pass' ";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>1){
		    header("Refresh:1; url=login.php");
			echo 'Αποτυχία εισόδου';
			die();			
		}
		if(mysqli_num_rows($result)==1){
			$row=mysqli_fetch_assoc($result);
			$_SESSION['id'] = $row['id'];
			$_SESSION['role'] = $row['role'];
			header("Refresh:1; url=uthflix.php");
		}else{
			header("Refresh:2; url=login.php");
			echo 'Αποτυχία εισόδου';
		}
		
		mysqli_close($conn);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<style>

	</style>
</head>
	<body>
		<div class="container" style="margin-top: 15px;">
			<form style="text-align: center;" method="POST">
				<b>Είσοδος</b> <br>
				  
				  <label for="prods">Όνομα χρήστη</label>
				  <input type="text" id="uname" name="uname" required><br>
				  <label for="prods">Κωδικός</label>
				  <input type="password" id="psw" name="psw" required><br>
				  
				  <button name="login" type="submit" >Είσοδος</button>
			</form>
		</div>
	</body>
</html>
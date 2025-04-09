<?php
	session_start();
    if(isset($_POST['register'])){
		require_once('dbfguest.php');
		$conn=db_connect();
		$uname=$_POST['uname'];
		$pass=$_POST['psw'];
        $role=$_POST['regas'];
		if($role=='s_user'){
			$role='user';
		}else{
			$role='prods';
		}
		$sql="insert into users (username,password,role)
			values ('$uname','$pass','$role')";
		if(mysqli_query($conn,$sql)){
			header("Refresh:2; url=login.php");
			echo 'Επιτυχία εγγραφής';
		}else{
			echo 'Αποτυχία εγγραφής';
			die();
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
				<b>Εγγραφή ως:</b> <br>
				  <label for="s_user">Απλός χρήστης</label>
				  <input type="radio" id="simple_user" name="regas" value="s_user" checked><br>Ή<br>
				  <label for="prods">Εταιρεία παραγωγής</label>
				  <input type="radio" id="prods" name="regas" value="prods"><br><br>
				  
				  <label for="prods">Όνομα χρήστη</label>
				  <input type="text" id="uname" name="uname" required><br>
				  <label for="prods">Κωδικός</label>
				  <input type="password" id="psw" name="psw" required><br><br><br>
				  
				  <button name="register" type="submit" >Εγγραφή</button>
			</form>
		</div>
	</body>
</html>
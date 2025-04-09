<?php 
	session_start();
    if(isset($_SESSION['id'])){
		header("Refresh:0; url=uthflix.php");
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
		<div class="container" style="text-align:center;">
			<button style="margin: 10px;"  onclick="window.location.href='login.php';">login</button>
			<button style="margin: 10px;"  onclick="window.location.href='register.php';" >register</button>
		</div>
	</body>
</html>
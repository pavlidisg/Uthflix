<?php 
	include('idrole.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
	<body>
	<?php
		date_default_timezone_set('Europe/Athens');
		$cdate = date("Y-m-d H:i");
		$sql="SELECT * FROM notif_movies WHERE user_id=".$id;
		$result=mysqli_query($conn,$sql); 
		if(!$result){
			echo mysqli_error($conn);
		}
		if(($num_rows = mysqli_num_rows($result))>0){
			while($row=mysqli_fetch_assoc($result)){ 
				$dt=$row['datetime'];
				if($dt <= $cdate){?>
					<i class="fa fa-exclamation-circle" style="color:red"></i>
					<?php
				}
			}
		}
		
		$sql="SELECT * FROM notif_series WHERE user_id=".$id;
		$result=mysqli_query($conn,$sql); 
		if(!$result){
			echo mysqli_error($conn);
		}
		if(($num_rows = mysqli_num_rows($result))>0){
			while($row=mysqli_fetch_assoc($result)){ 
				$dt=$row['datetime'];
				if($dt <= $cdate){?>
					<i class="fa fa-exclamation-circle" style="color:red"></i>
					<?php
				}
			}
		}
	?>
	</body>
</html>

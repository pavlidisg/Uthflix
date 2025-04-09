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
	<div class="container" style="margin-top:20px;">
		<a style="float:right;margin:7px;" href="logout.php"><strong>logout</strong></a>
		<button onclick="window.location.href='favorites.php';" style="float:right;margin:7px;"> &#10084;</button>
		<a style="float:right;margin:7px;" href="uthflix.php"><strong>home</strong></a>
		
		<h5>Uthflix</h5><hr>
	</div>
		<div class="container" style="padding:7px;margin-top:10px;">
			<h5><b>Ειδοποιήσεις</b></h5><br> <?php
			$sql="SELECT m.name,m.id,m.release_date,nm.datetime FROM movies m INNER JOIN notif_movies nm ON nm.m_id=m.id WHERE nm.user_id=".$id;
			$result=mysqli_query($conn,$sql); 
				if(!$result){
					echo mysqli_error($conn);
				}
				if(($num_rows = mysqli_num_rows($result))>0){
					echo "<b>ΤΑΙΝΙΕΣ</b> (".$num_rows.")<hr>";
					while($row=mysqli_fetch_assoc($result)){ ?>
						<div style="margin:5px;border:1px solid black;padding:7px;width:40%;overflow:auto;">
							<b>Παρακολούθηση της ταινίας: </b>
							<button onclick="window.location.href='show-movies-series.php?type=movies&mid=<?php echo $row['id'];?>&<?php echo $row['name'];?>'">
							<h6><strong><?php echo $row['name']." (".$row['release_date'].")"; ?>
							</strong></h6></button><br>
							<b> Για τις: </b><?php echo $row['datetime'];?>
							<form method="POST">
								<button type="submit" name="dnm" style="margin:5px;float:right;" value="<?php echo $row['id'];?>">Διαγραφή ειδοποίησης</button>
							</form>
						</div><br>
						
				<?php
					}
				}

			$sql="SELECT s.name,s.id,s.release_date,ns.datetime FROM series s INNER JOIN notif_series ns ON ns.s_id=s.id WHERE ns.user_id=".$id;
			$result=mysqli_query($conn,$sql); 
				if(!$result){
					echo mysqli_error($conn);
				}
				if(($num_rows = mysqli_num_rows($result))>0){
					echo "<b>ΣΕΙΡΕΣ</b> (".$num_rows.")<hr>";
					while($row=mysqli_fetch_assoc($result)){ ?>
						<div style="margin:5px;border:1px solid black;padding:7px;width:40%;overflow:auto;">
							<b>Παρακολούθηση της σειράς: </b>
							<button onclick="window.location.href='show-movies-series.php?type=series&mid=<?php echo $row['id'];?>&<?php echo $row['name'];?>'">
							<h6><strong><?php echo $row['name']." (".$row['release_date'].")"; ?>
							</strong></h6></button><br>
							<b> Για τις: </b><?php echo $row['datetime'];?>
							<form method="POST">
								<button type="submit" name="dns" style="margin:5px;float:right;" value="<?php echo $row['id'];?>">Διαγραφή ειδοποίησης</button>
							</form>
						</div><br>
						
				<?php
					}
				}
			?>
		<div> <?php
		if(isset($_POST['dnm'])){
			header("Refresh:1");
			$m_id=$_POST['dnm'];
			$sql="DELETE FROM notif_movies WHERE m_id=".$m_id." AND user_id=".$id;
			if(!mysqli_query($conn,$sql)){							
				echo "error";
				die();
			} 	
		}
		
		if(isset($_POST['dns'])){
			header("Refresh:1");
			$s_id=$_POST['dns'];
			$sql="DELETE FROM notif_series WHERE s_id=".$s_id." AND user_id=".$id;
			if(!mysqli_query($conn,$sql)){							
				echo "error";
				die();
			} 	
		}
		?>
	</body>
</html>
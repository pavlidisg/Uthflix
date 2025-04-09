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
		<button onclick="window.location.href='notifications.php';" style="float:right;margin:7px;"> &#128276;<span id="emn" class="emn"></span></button>
		<a style="float:right;margin:7px;" href="uthflix.php"><strong>home</strong></a>
		
		<h5>Uthflix</h5><hr>
	</div>
		<div class="container" style="padding:7px;margin-top:10px;">
			<h5><b>Αγαπημένα</b></h5><br> <?php
			$sql="SELECT m.name,m.id,m.release_date FROM movies m INNER JOIN favms_list f ON f.ms_id=m.id WHERE f.user_id=".$id;
			$result=mysqli_query($conn,$sql); 
				if(!$result){
					echo mysqli_error($conn);
				}
				if(($num_rows = mysqli_num_rows($result))>0){
					echo "<b>ΤΑΙΝΙΕΣ</b> (".$num_rows.")<hr>";
					while($row=mysqli_fetch_assoc($result)){ ?>
						<div style="margin:5px;border:1px solid black;padding:7px;width:40%;overflow:auto;">
							<button onclick="window.location.href='show-movies-series.php?type=movies&mid=<?php echo $row['id'];?>&<?php echo $row['name'];?>'">
							<h6><strong><?php echo $row['name']." (".$row['release_date'].")"; ?>
							</strong></h6></button>
							<form method="POST">
								<button type="submit" name="delfavm" style="margin:5px;float:right;" value="<?php echo $row['id'];?>">Διαγραφή από  &#10084;</button>
							</form>
						</div><br>
						
				<?php
					}
				}

			$sql="SELECT s.name,s.id,s.release_date FROM series s INNER JOIN fav_series_list f ON f.series_id=s.id WHERE f.user_id=".$id;
			$result=mysqli_query($conn,$sql); 
				if(!$result){
					echo mysqli_error($conn);
				}
				if($num_rows = mysqli_num_rows($result)>0){
					echo "<b>ΣΕΙΡΕΣ</b> (".$num_rows.")<hr>";
					while($row=mysqli_fetch_assoc($result)){ ?>
						<div style="margin:5px;border:1px solid black;padding:7px;width:40%;overflow:auto;">
							<button onclick="window.location.href='show-movies-series.php?type=series&mid=<?php echo $row['id'];?>&<?php echo $row['name'];?>'">
							<h6><strong><?php echo $row['name']." (".$row['release_date'].")"; ?>
							</strong></h6></button>
							<form method="POST">
								<button type="submit" name="delfavs" style="margin:5px;float:right;" value="<?php echo $row['id'];?>">Διαγραφή από  &#10084;</button>
							</form>
						</div><br>
						
				<?php
						
					}
				}
			?>
		<div> <?php
		if(isset($_POST['delfavm'])){
			header("Refresh:1");
			$m_id=$_POST['delfavm'];
			$sql="DELETE FROM favms_list WHERE ms_id=".$m_id." AND user_id=".$id;
			if(!mysqli_query($conn,$sql)){							
				echo "error";
				die();
			} 	
		}
		
		if(isset($_POST['delfavs'])){
			header("Refresh:1");
			$m_id=$_POST['delfavs'];
			$sql="DELETE FROM fav_series_list WHERE series_id=".$m_id." AND user_id=".$id;
			if(!mysqli_query($conn,$sql)){							
				echo "error";
				die();
			} 	
		}
		?>
	</body>
</html>

<script  src="alljs.js" ></script>
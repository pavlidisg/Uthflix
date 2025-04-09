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
		<?php 
			if($role=="user"){
		?>
		<button onclick="window.location.href='notifications.php';" style="float:right;margin:7px;"> &#128276;<span id="emn" class="emn"></span></button>
		<button onclick="window.location.href='favorites.php';" style="float:right;margin:7px;"> &#10084;</button>
		<?php
			}
		?>
		<a style="float:right;margin:7px;" href="uthflix.php"><strong>home</strong></a>
		
		<h5>Uthflix</h5><hr>
	</div>
		<?php
		if(!isset($_GET['eid'])){
			header("Refresh:1; url=uthflix.php");
			die();
		}else{?>
			<div class="container" style="padding:7px;margin-top:10px;">
			<?php
			$ep_id=$_GET['eid'];
				$sql="SELECT * FROM s_episodes WHERE id=".$ep_id;
				$sql_avg="SELECT AVG(rating) FROM users_s_ep_rate WHERE ep_id=".$ep_id;
				$sql_ur="SELECT rating FROM users_s_ep_rate WHERE ep_id=".$ep_id." AND user_id=".$id;
				
				$result=mysqli_query($conn,$sql); 
				if(!$result){
					echo mysqli_error($conn);
				}
				if(mysqli_num_rows($result)>0){
					$row=mysqli_fetch_assoc($result)
					?>
						<h4><?php echo $row['name'];?></h4><br>
						<?php echo "Δειάρκεια επισοδείου: ".$row['duration']." min."?>
						
						<button style="margin-left:10px;float:right;" type="button"onclick="showHide(0)">&#11088;</button>
						<span style="float:right;"><b>Βαθμολογία: </b>
						<?php
							$result_avg=mysqli_query($conn,$sql_avg); 
							$row_avg=mysqli_fetch_assoc($result_avg);
							$avg = round($row_avg['AVG(rating)'],1); echo $avg."/10";
							 ?>
							</span><br>
							
						<div class="sh" style="display:none;float:right;margin:10px;padding:6px;border:0.2px solid black;">
							<form method="POST">
								<input type="range" min="1" max="10" value="0" name="rate" id="rrange" class="slider"><br>
								Βαθμολογία: <span id="rv"></span>/10<br>
								<?php
									$result_ur=mysqli_query($conn,$sql_ur); 
									if(mysqli_num_rows($result_ur)>0){
										$row_ur=mysqli_fetch_assoc($result_ur); 
										echo "Η προηγούμενη βαθμολογία σας είναι: ".$row_ur['rating']."<br>";
										?>
										<button name="updateumv" style="margin-left:5px;size:25%;" type="submit">Αλλαγή βαθμολογίας</button>
										<button name="delrate" style="margin-left:5px;color:red;size:25%;" type="submit">Διαγραφή βαθμολογίας</button>
										<?php
									}else{?>
										<button name="movierate" style="margin-left:5px;" type="submit">&#8594;</button>
									<?php } ?>
								<br>
							</form>
						</div>
						<br><br>
						<b>Περιγραφή: </b><?php echo $row['description'];?><br><br>
						<br><br>

						<h5><b>Σχόλια:</b></h5>
					<?php
							$sql="SELECT * FROM s_ep_comments WHERE ep_id=".$ep_id;

							$result=mysqli_query($conn,$sql); 
							if(!$result){
								echo mysqli_error($conn);
							}
							if(mysqli_num_rows($result)>0){
								while($row=mysqli_fetch_assoc($result)){
									echo $row['name']."<br><br>";									
									if($row['user_id'] == $_SESSION['id']){ ?>
									<form method="POST">
										<button style="float:right;color:red;" name="delcomm" type="submit" value="<?php echo $row['id']; ?>">Διαγραφή</button> 
									</form> <?php
									}
									echo $row['comment']."<hr>";

								}
							}else{
								echo "Δεν υπάρχουν σχόλια!";
							}
						?><br>
						<hr>
						<form method="post">
						  <div class="container col-sm-6" >
							<hr>
							<label style="margin-top:15px;" for="name"><b>Name</b></label><br>
							<input type="text" placeholder="Enter your name" name="name" required><br>

							<label style="margin-top:15px;" for="text"><b>Comment</b></label>
							<textarea placeholder="Type your comment" style="width: 100%;" name="comm" required></textarea>

							<button name="subcom" type="submit" >Υποβολή</button>

						  </div>
						</form>
						<?php
						if(isset($_POST['subcom'])){
							header("Refresh:1");
							$name=$_POST['name'];
							$comm=$_POST['comm'];
								$sql="INSERT INTO s_ep_comments (ep_id,comment,name,user_id) VALUES ('$ep_id','$comm','$name','$id')";
							if(!mysqli_query($conn,$sql)){
								echo "could not post comment due to error";
								die();
							}
						}
						
						if(isset($_POST['delcomm'])){
							header("Refresh:1");
							$com_id=$_POST['delcomm'];
							$sql="DELETE FROM s_ep_comments WHERE id=".$com_id;
							if(!mysqli_query($conn,$sql)){
								echo "could not delete comment due to error";
								die();
							}
						}
						
						if(isset($_POST['movierate'])){
							header("Refresh:1");
							$rate=$_POST['rate'];		
							$sql="INSERT INTO users_s_ep_rate (user_id,ep_id,rating) VALUES ('$id','$ep_id','$rate')";
							if(!mysqli_query($conn,$sql)){
								echo "error";
								die();
							} 	
						}
						
						if(isset($_POST['updateumv'])){
							header("Refresh:1");
							$rate=$_POST['rate'];
							$sql="UPDATE users_s_ep_rate SET rating=".$rate." WHERE ep_id=".$ep_id." AND user_id=".$id;
							if(!mysqli_query($conn,$sql)){
								echo "error";
								die();
							} 	
						}
						
						if(isset($_POST['delrate'])){
							header("Refresh:1");
							$rate=$_POST['rate'];
							$sql="DELETE FROM users_s_ep_rate WHERE ep_id=".$ep_id." AND user_id=".$id;
							if(!mysqli_query($conn,$sql)){
								echo "error";
								die();
							} 	
						}
				}?>
				</div>
				<?php
		}
		?>
	</body>
</html>

<script  src="alljs.js" ></script>


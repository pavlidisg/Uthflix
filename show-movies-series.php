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
		if(!isset($_GET['mid']) && !isset($_GET['type'])){
			header("Refresh:1; url=uthflix.php");
			die();
		}else{?>
			<div class="container" style="padding:7px;margin-top:10px;">
			<?php
			$m_id=$_GET['mid'];
			$type=$_GET['type'];
			if($type=="movies"){
				$sql="SELECT * FROM movies WHERE id=".$m_id;
				$sql_fav="SELECT * FROM favms_list WHERE ms_id=".$m_id." AND user_id=".$id;
				$sql_avg="SELECT AVG(rating) FROM users_rating_movies WHERE m_id=".$m_id;
				$sql_ur="SELECT rating FROM users_rating_movies WHERE m_id=".$m_id." AND user_id=".$id;
			}else{
				$sql="SELECT * FROM series WHERE id=".$m_id;
				$sql_fav="SELECT * FROM fav_series_list WHERE series_id=".$m_id." AND user_id=".$id;
				$sql_avg="SELECT AVG(rating) FROM users_rating_series WHERE s_id=".$m_id;
				$sql_ur="SELECT rating FROM users_rating_series WHERE s_id=".$m_id." AND user_id=".$id;
			}
				$result=mysqli_query($conn,$sql); 
				if(!$result){
					echo mysqli_error($conn);
				}
				if(mysqli_num_rows($result)>0){
					$row=mysqli_fetch_assoc($result);
					?>
						<h4><?php echo $row['name']." (".$row['release_date'].")";?></h4>
						<?php 
						if($role=="prods"){ ?>
							<form style="display:inline-block;" method="POST">
								Νέo Όνομα: <input type="text" id="new_name" name="new_name">
								<button type="submit" name="updatename" >Αλλαγή ονόματος</button>
							</form>
							<form method="POST">
								Νέo έτος κυκλοφορίας: <input type="number" id="new_rd" name="new_rd">
								<button type="submit" name="updaterd">Αλλαγή έτους κυκλοφορίας</button>
							</form>
					<?php
						}
						if($role=="user"){
						?>
						<form method="POST">
								<?php					
									$result_fav=mysqli_query($conn,$sql_fav); 
									if(mysqli_num_rows($result_fav)>0){
										$row_fav=mysqli_fetch_assoc($result_fav);?>
										<button name="delfavm" type="submit">Διαγραφή από &#10084;</button>
										<?php
									}else{?>
										<button name="addfavm" type="submit">&#10084;</button>
									<?php } ?>
						</form>
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
						<?php
							}
						?>
						<br><br>
						<b>Περιγραφή: </b><?php echo $row['description'];?>
						<?php
						if($role=="prods"){?>
						<form method="POST">
							Νέα περιγραφή: <input type="text" id="new_des" name="new_des">
							<button type="submit" name="updatedes">Αλλαγή περιγραφής</button>
						</form>
						<?php }
						?>
						<br><br><?php
							if($type=="movies"){
								$sql="SELECT c.name,c.id FROM cast as c JOIN cast_movies ON c_id=c.id WHERE m_id=".$m_id;
							}else{
								$sql="SELECT c.name,c.id FROM cast as c JOIN cast_series ON c_id=c.id WHERE s_id=".$m_id;
							}
							$result=mysqli_query($conn,$sql); 
							if(!$result){
								echo mysqli_error($conn);
							}?>
							<b>Ηθοποιοί:</b>
							<?php
							if(mysqli_num_rows($result)>0){
								$rr=0;
								while($row=mysqli_fetch_assoc($result)){
									if($rr==0){
										echo $row['name'];
										$rr=1;
									}else{
										echo ", ".$row['name'];
									}
									if($role=="prods"){?>
										<form style="display:inline-block;" method="POST">
											<button type="submit" name="delcm" style="background-color:red;color:white;" value="<?php echo $row['id'];?>">Διαγραφή</button>
										</form>
										
									<?php
									}
								}
							}
						if($role=="prods"){
						?>
						<button type="button" onclick="ccf()">&plus;</button>
						<div style="display:none;" id="acb">
							<form style="display:inline-block;"  method="POST">
								<span id="cf"> </span>
								<button type="submit" name="addcast">Προσθήκη ηθοποιού</button>
							</form>
						</div>
						<?php
						} ?>
						<br>
						<?php
							if($type=="movies"){
								$sql="SELECT d.name,d.id FROM directors as d JOIN dir_movies ON dir_id=d.id WHERE mov_id=".$m_id;
							}else{
								$sql="SELECT d.name,d.id FROM directors as d JOIN dir_series ON dir_id=d.id WHERE s_id=".$m_id;
							}
							$result=mysqli_query($conn,$sql); 
							if(!$result){
								echo mysqli_error($conn);
							}?>
							<b>Σκηνοθέτης-ες:</b>
							<?php
							if(mysqli_num_rows($result)>0){
								$rr=0;
								while($row=mysqli_fetch_assoc($result)){
									if($rr==0){
										echo $row['name'];
										$rr=1;
									}else{
										echo ", ".$row['name'];
									}
									if($role=="prods"){?>
										<form style="display:inline-block;" method="POST">
											<button type="submit" name="deldir" style="background-color:red;color:white;" value="<?php echo $row['id'];?>">Διαγραφή</button>
										</form>
									<?php
									}
								}
							}
						if($role=="prods"){
						?>
						<button type="button" onclick="cdf()">&plus;</button>
						<div style="display:none;" id="adb">
							<form style="display:inline-block;" method="POST">
								<span id="df"> </span> 
								<button type="submit" name="adddir">Προσθήκη σκηνοθέτη</button>
							</form>	
						</div>
						<?php
						} ?>
						<br>
						<?php
							if($type=="movies"){
								$sql="SELECT w.name,w.id FROM writers as w JOIN writers_movies ON wr_id=w.id WHERE mov_id=".$m_id;
							}else{
								$sql="SELECT w.name,w.id FROM writers as w JOIN writers_series ON wr_id=w.id WHERE s_id=".$m_id;
							}
							$result=mysqli_query($conn,$sql); 
							if(!$result){
								echo mysqli_error($conn);
							}?>
							<b>Συγγραφείς:</b>
							<?php
							if(mysqli_num_rows($result)>0){
								$rr=0;
								while($row=mysqli_fetch_assoc($result)){
									if($rr==0){
										echo $row['name'];
										$rr=1;
									}else{
										echo ", ".$row['name'];
									}
									if($role=="prods"){?>
										<form style="display:inline-block;" method="POST">
											<button type="submit" name="delwr" style="background-color:red;color:white;" value="<?php echo $row['id'];?>">Διαγραφή</button>
										</form>
										
									<?php
									}
								}
							}
						if($role=="prods"){	
						?>
						<button type="button" onclick="cwf()">&plus;</button>
						<div style="display:none;" id="awb">
							<form style="display:inline-block;" method="POST">
								<span id="wf"> </span> 
								<button type="submit" name="addwr">Προσθήκη συγγραφέα</button>
							</form>
						</div>
						<br><br>
						<?php
						}
							//Για τα επισόδεια σειρών
							if($type=="series"){
								$sql="SELECT seasons FROM series WHERE id=".$m_id;
								$result=mysqli_query($conn,$sql); 
								if(!$result){
									echo mysqli_error($conn);
								}
								$row=mysqli_fetch_assoc($result);?>
								<br><b>ΕΠΙΣΟΔΕΙΑ</b>
								<form method="POST">
									<label for="s_e"><b>ΣΕΖΟΝ:</b></label>
									  <select name="s_e" id="s_e">
									  <?php
										$s = $row['seasons'];	
										$s_count =1;
										do{?>
											<option value="<?php echo $s_count;?>"><?php echo $s_count; ?></option>
											<?php
											$s_count++;
										}while($s_count <= $s);
									  ?>
									  </select>
									  <button type="submit" name="selseason" >&#8594;</button>
								</form>
								<?php
								
								if(isset($_POST['selseason'])){
									$seas=$_POST['s_e'];
									$sql="SELECT * FROM s_episodes WHERE series_id=".$m_id." AND season=".$seas;
									$result=mysqli_query($conn,$sql); 
									if(!$result){
										echo mysqli_error($conn);
									}
									if(mysqli_num_rows($result)>0){
										while($row=mysqli_fetch_assoc($result)){
									
									?>
											<div style="margin:5px;border:1px solid black;padding:7px;">
												<button onclick="window.location.href='show-episode.php?eid=<?php echo $row['id'];?>&<?php echo $row['name'];?>'">
												<h4><strong><?php echo $row['name'] ?>
												</strong></h4></button>
												<b>Σ:</b><?php echo $row['season']; ?><b>E:</b><?php echo $row['ep_number']; ?><br>
												<b>Βαθμολογία: </b>
												<?php 	
												
													$sql_avg="SELECT AVG(rating) FROM users_s_ep_rate WHERE ep_id=".$row['id'];
													$result_avg=mysqli_query($conn,$sql_avg); echo mysqli_error($conn);
													$row_avg=mysqli_fetch_assoc($result_avg);
													$avg = round($row_avg['AVG(rating)'],1); echo $avg."/10"; 
													
											
												?><br>
												<b>Περιγραφή: </b><?php echo $row['description']; ?>
											</div>
							<?php
										}
									}
								}
								
							}
						if($role=="user"){
						?>
						
						
						<br><br>
						<h5><b>Σχόλια:</b></h5>
					<?php
					
						if($type=="movies"){
								$sql="SELECT * FROM movie_comments WHERE m_id=".$m_id;
							}else{
								$sql="SELECT * FROM s_comments WHERE s_id=".$m_id;
							}
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
							}
						if(isset($_POST['subcom'])){
							header("Refresh:1");
							$name=$_POST['name'];
							$comm=$_POST['comm'];
							if($type=="movies"){
								$sql="INSERT INTO movie_comments (m_id,comment,name,user_id) VALUES ('$m_id','$comm','$name','$id')";
							}else{
								$sql="INSERT INTO s_comments (s_id,comment,name,user_id) VALUES ('$m_id','$comm','$name','$id')";
							}
							if(!mysqli_query($conn,$sql)){
								echo "could not post comment due to error";
								die();
							}
						}
						
						if(isset($_POST['delcomm'])){
							
							$com_id=$_POST['delcomm'];
							if($type=="movies"){
								$sql="DELETE FROM movie_comments WHERE id=".$com_id;
							}else{
								$sql="DELETE FROM s_comments WHERE id=".$com_id;
							}
							if(!mysqli_query($conn,$sql)){
								echo "could not delete comment due to error";
								die();
							}
						}
						
						if(isset($_POST['movierate'])){
							header("Refresh:1");
							$rate=$_POST['rate'];
							if($type=="movies"){
								$sql="INSERT INTO users_rating_movies (user_id,m_id,rating) VALUES ('$id','$m_id','$rate')";
							}else{
								$sql="INSERT INTO users_rating_series (user_id,s_id,rating) VALUES ('$id','$m_id','$rate')";
							}
							if(!mysqli_query($conn,$sql)){
								echo "error";
								die();
							} 	
						}
						
						if(isset($_POST['updateumv'])){
							
							$rate=$_POST['rate'];
							if($type=="movies"){
								$sql="UPDATE users_rating_movies SET rating=".$rate." WHERE m_id=".$m_id." AND user_id=".$id;
							}else{
								$sql="UPDATE users_rating_series SET rating=".$rate." WHERE s_id=".$m_id." AND user_id=".$id;
							}
							if(!mysqli_query($conn,$sql)){
								echo "error";
								die();
							} 	
						}
						
						if(isset($_POST['delrate'])){
							
							$rate=$_POST['rate'];
							if($type=="movies"){
								$sql="DELETE FROM users_rating_movies WHERE m_id=".$m_id." AND user_id=".$id;
							}else{
								$sql="DELETE FROM users_rating_series WHERE s_id=".$m_id." AND user_id=".$id;
							}
							if(!mysqli_query($conn,$sql)){
								echo "error";
								die();
							} 	
						}
						
						if(isset($_POST['addfavm'])){
							header("Refresh:1");
							if($type=="movies"){
								$sql="INSERT INTO favms_list (user_id,ms_id) VALUES ('$id','$m_id')" ;
							}else{
								$sql="INSERT INTO fav_series_list (user_id,series_id) VALUES ('$id','$m_id')" ;	
							}
							if(!mysqli_query($conn,$sql)){							
								echo "error";
								die();
							} 	
						}
						
						if(isset($_POST['delfavm'])){
							
							if($type=="movies"){
								$sql="DELETE FROM favms_list WHERE ms_id=".$m_id." AND user_id=".$id;
							}else{
								$sql="DELETE FROM fav_series_list WHERE series_id=".$m_id." AND user_id=".$id;
							}
							if(!mysqli_query($conn,$sql)){							
								echo "error";
								die();
							} 	
						}
						
						if($role=="prods"){
							
							//Διαγραφή σχέσης ηθοποιός-ταινία(ή σειρά)
							if(isset($_POST['delcm'])){
								
								$cms_id = $_POST['delcm'];
								if($type=="movies"){
									$sql = "DELETE FROM cast_movies WHERE c_id=".$cms_id." AND m_id=".$m_id;
								}else{
									$sql = "DELETE FROM cast_series WHERE c_id=".$cms_id." AND s_id=".$m_id;
								}
								if(!mysqli_query($conn,$sql)){							
									echo "error";
									die();
								} 	
							}
							
							//Διαγραφή σχέσης συγγραφέας-ταινία(ή σειρά)
							if(isset($_POST['delwr'])){
								
								$cms_id = $_POST['delwr'];
								if($type=="movies"){
									$sql = "DELETE FROM writers_movies WHERE wr_id=".$cms_id." AND mov_id=".$m_id;
								}else{
									$sql = "DELETE FROM writers_series WHERE wr_id=".$cms_id." AND s_id=".$m_id;
								}
								if(!mysqli_query($conn,$sql)){							
									echo "error";
									die();
								} 	
							}
							
							//Διαγραφή σχέσης σκηνοθέτης-ταινία(ή σειρά)
							if(isset($_POST['deldir'])){
								
								$cms_id = $_POST['deldir'];
								if($type=="movies"){
									$sql = "DELETE FROM dir_movies WHERE dir_id=".$cms_id." AND mov_id=".$m_id;
								}else{
									$sql = "DELETE FROM dir_series WHERE dir_id=".$cms_id." AND s_id=".$m_id;
								}
								if(!mysqli_query($conn,$sql)){							
									echo "error ".mysqli_error($conn);
									die();
								} 	
							}
							
							//Αλλαγή περιγραφής ταινίας ή σειράς
							if(isset($_POST['updatedes'])){
								
								$new_des = $_POST['new_des'];
								if($type=="movies"){
									$sql="UPDATE movies SET description='".$new_des."' WHERE id=".$m_id;
								}else{
									$sql="UPDATE series SET description='".$new_des."' WHERE id=".$m_id;
								}
								if(!mysqli_query($conn,$sql)){							
									echo "error ".mysqli_error($conn);
									die();
								} 	
							}
							
							//Αλλαγή ονόματος ταινίας ή σειράς
							if(isset($_POST['updatename'])){
								
								$new_name= $_POST['new_name'];
								if($type=="movies"){
									$sql="UPDATE movies SET name='".$new_name."' WHERE id=".$m_id;
								}else{
									$sql="UPDATE series SET name='".$new_name."' WHERE id=".$m_id;
								}
								if(!mysqli_query($conn,$sql)){							
									echo "error ".mysqli_error($conn);
									die();
								} 	
							}
							
							//Αλλαγή έτους κυκλοφορίας ταινίας ή σειράς
							if(isset($_POST['updaterd'])){
								
								$new_rd= $_POST['new_rd'];
								if($type=="movies"){
									$sql="UPDATE movies SET release_date='".$new_rd."' WHERE id=".$m_id;
								}else{
									$sql="UPDATE series SET release_date='".$new_rd."' WHERE id=".$m_id;
								}
								if(!mysqli_query($conn,$sql)){							
									echo "error ".mysqli_error($conn);
									die();
								} 	
							}
							
							//Προσθήκη ηθοποιού για ταινία/σειρά
							if(isset($_POST['addcast'])){
								$new_cast= $_POST['cast'];
								if($new_cast==""){
									echo "κενό όνομα";
									die();
								}
								foreach($new_cast as $c){
									$sql="INSERT INTO cast (name) VALUES ('$c')";
									if(!mysqli_query($conn,$sql)){
										$sql="SELECT id FROM cast WHERE name='".$c."'";
										$result=mysqli_query($conn,$sql); 
										if(!$result){
											echo mysqli_error($conn);
										}else{
											$row=mysqli_fetch_assoc($result);
											$cast_id = $row['id'];
											if($type=="movies"){
												$sql="INSERT INTO cast_movies (c_id,m_id) VALUES ('$cast_id','$m_id')";
											}else{
												$sql="INSERT INTO cast_series (c_id,s_id) VALUES ('$cast_id','$m_id')";
											}
											if(!mysqli_query($conn,$sql)){
												echo "error";
											}
										}
									}else{
										$last_id = mysqli_insert_id($conn);
										if($type=="movies"){
											$sql="INSERT INTO cast_movies (c_id,m_id) VALUES ('$last_id','$m_id')";
										}else{
											$sql="INSERT INTO cast_series (c_id,s_id) VALUES ('$last_id','$m_id')";
										}
										if(!mysqli_query($conn,$sql)){
											echo "error";
										}
									}
								}	
							}
							
							//Προσθήκη σκηνοθέτη για ταινία/σειρά
							if(isset($_POST['adddir'])){
								$new_dir= $_POST['dirs'];
								if($new_dir==""){
									echo "κενό όνομα";
									die();
								}
								foreach($new_dir as $c){
									$sql="INSERT INTO directors (name) VALUES ('$c')";
									if(!mysqli_query($conn,$sql)){
										$sql="SELECT id FROM directors WHERE name='".$c."'";
										$result=mysqli_query($conn,$sql); 
										if(!$result){
											echo mysqli_error($conn);
										}else{
											$row=mysqli_fetch_assoc($result);
											$cast_id = $row['id'];
											if($type=="movies"){
												$sql="INSERT INTO dir_movies (dir_id,mov_id) VALUES ('$cast_id','$m_id')";
											}else{
												$sql="INSERT INTO dir_series (dir_id,s_id) VALUES ('$cast_id','$m_id')";
											}
											if(!mysqli_query($conn,$sql)){
												echo "error";
											}
										}
									}else{
										$last_id = mysqli_insert_id($conn);
										if($type=="movies"){
											$sql="INSERT INTO dir_movies (dir_id,mov_id) VALUES ('$last_id','$m_id')";
										}else{
											$sql="INSERT INTO dir_series (dir_id,s_id) VALUES ('$last_id','$m_id')";
										}
										if(!mysqli_query($conn,$sql)){
											echo "error";
										}
									}
								}
							}
							
							//Προσθήκη συγγραφέα για ταινία/σειρά
							if(isset($_POST['addwr'])){
								$new_wr= $_POST['wrs'];
								if($new_wr==""){
									echo "κενό όνομα";
									die();
								}
								
								foreach($new_wr as $c){
									$sql="INSERT INTO writers (name) VALUES ('$c')";
									if(!mysqli_query($conn,$sql)){
										$sql="SELECT id FROM writers WHERE name='".$c."'";
										$result=mysqli_query($conn,$sql); 
										if(!$result){
											echo mysqli_error($conn);
										}else{
											$row=mysqli_fetch_assoc($result);
											$cast_id = $row['id'];
											if($type=="movies"){
												$sql="INSERT INTO writers_movies (wr_id,mov_id) VALUES ('$cast_id','$m_id')";
											}else{
												$sql="INSERT INTO writers_series (wr_id,s_id) VALUES ('$cast_id','$m_id')";
											}
											if(!mysqli_query($conn,$sql)){
												echo "error";
											}
										}
									}else{
										$last_id = mysqli_insert_id($conn);
										if($type=="movies"){
											$sql="INSERT INTO writers_movies (wr_id,mov_id) VALUES ('$last_id','$m_id')";
										}else{
											$sql="INSERT INTO writers_series (wr_id,s_id) VALUES ('$last_id','$m_id')";
										}
										if(!mysqli_query($conn,$sql)){
											echo "error";
										}
									}
							    }
							}
							
						}
				}
		}
		?>
		</div>
	</body>
</html>

<?php	
if($role=="user"){ ?>
	<script src="jssmsuser.js" ></script>
<?php
}else{?>
	<script src="jssmsprod.js"></script>
<?php } ?>

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
	<div style="margin-top:35px;" class="container">
	<?php 
// -----------------------------------------------------------------------------------            ADMINS           -----------------------------------------------------------------------------------------
		if($role=="admin"){ ?>
		<a style="float:right;margin:7px;" href="logout.php"><strong>logout</strong></a>
			<div class="container">
				<table style="width:100%;">
					<tr>
						<th>ID</th>
						<th>ΟΝΟΜΑ</th>
						<th>ΡΟΛΟΣ</th>
						<th>ΑΛΛΑΓΗ ΡΟΛΟΥ</th>
						<th>ΔΙΑΓΡΑΦΗ</th>
					</tr>
				<?php
					$sql="SELECT * FROM users";
					$result=mysqli_query($conn,$sql); 
						if(mysqli_num_rows($result)>0){
							while($row=mysqli_fetch_assoc($result)){ ?>
									<tr>
										<td><?php echo $row['id'];?></td>
										<td><?php echo $row['username'];?></td>
										<td><?php echo $row['role'];?></td>
									<?php
										if($row['role']!="admin"){ ?>
										<td>
											<form method="POST">
												<input type="text" name="new_role" style="width:20%;">
												<button type="submit" value="<?php echo $row['id'];?>" name="updaterole">ΑΛΛΑΓΗ</button>
											</form>
										</td>
										<form method="POST">
											<td><button type="submit" value="<?php echo $row['id'];?>" name="deluser">ΔΙΑΓΡΑΦΗ ΧΡΗΣΤΗ</button></td>
										</form>
								  <?php } ?>
									</tr>

						<?php
							}
						}
					
				?>
				</table>
			</div>
	<?php		
			if(isset($_POST['updaterole'])){
				$users_id = $_POST['updaterole'];
				$new_role = $_POST['new_role'];
				if($new_role==""){
					echo "Συμπληρώστε το πεδίο.";
					die();
				}
				$sql="UPDATE users SET role='".$new_role."' WHERE id=".$users_id;
				if(!mysqli_query($conn,$sql)){
					echo mysqli_error($conn);
					die();
				}
			}
			
			if(isset($_POST['deluser'])){
				$users_id = $_POST['deluser'];
				
				//πριν απο την διαγραφή του χρήστη γίνεται διαγραφή όλων των δεδομένων από τους πίνακες που σχετίζονται με αυτόν.
				$sql="DELETE FROM movie_comments WHERE user_id=".$users_id; 
				if(!mysqli_query($conn,$sql)){
					echo "error".mysqli_error($conn);
					die();
				}
				$sql="DELETE FROM notif_movies WHERE user_id=".$users_id; 
				if(!mysqli_query($conn,$sql)){
					echo "error".mysqli_error($conn);
					die();
				}
				$sql="DELETE FROM users_rating_movies WHERE user_id=".$users_id; 
				if(!mysqli_query($conn,$sql)){
					echo "error".mysqli_error($conn);
					die();
				}
				$sql="DELETE FROM favms_list WHERE user_id=".$users_id; 
				if(!mysqli_query($conn,$sql)){
					echo "error".mysqli_error($conn);
					die();
				}
							
				
				$sql="DELETE FROM fav_series_list WHERE user_id=".$users_id;
				if(!mysqli_query($conn,$sql)){
					echo "error".mysqli_error($conn);
					die();
				}
			
				$sql="DELETE FROM notif_series WHERE user_id=".$users_id;
				if(!mysqli_query($conn,$sql)){
					echo "error".mysqli_error($conn);
					die();
				}
				
				$sql="DELETE FROM users_rating_series WHERE user_id=".$users_id;
				if(!mysqli_query($conn,$sql)){
					echo "error".mysqli_error($conn);
					die();
				}
				
				$sql="DELETE FROM s_ep_comments WHERE user_id=".$users_id;
				if(!mysqli_query($conn,$sql)){
					echo "error".mysqli_error($conn);
					die();
				}
				
				$sql="DELETE FROM users_s_ep_rate WHERE user_id=".$users_id;
				if(!mysqli_query($conn,$sql)){
					echo "error".mysqli_error($conn);
					die();
				}
				$sql="DELETE FROM s_comments WHERE user_id=".$users_id;
				if(!mysqli_query($conn,$sql)){
					echo "error".mysqli_error($conn);
					die();
				}
				$sql="DELETE FROM users WHERE id=".$users_id;
				if(!mysqli_query($conn,$sql)){
					echo "error".mysqli_error($conn);
					die();
				}
			}
// --------------------------------------------------------------------------------------             PRODUCERS               -------------------------------------------------------------------------
		}else if($role=='prods'){?>
			<a style="float:right;margin:7px;" href="logout.php"><strong>logout</strong></a>
			
			<div class="container" style="margin-top:20px;"> <!-- Div για την εμφάνιση και επεξεργασία ταινιών/σειρών. -->
				<h5>Uthflix</h5><hr><?php
				$sql="";
				?>
				<button style="margin:5px;" type="button"onclick="showHide(0)">Επεξεργασία ταινιών/σειρών</button>
				<button style="margin:5px;" type="button"onclick="showHide(1)">Εισαγωγή νέας σειράς/ταινίας</button>
				<div class="sh" style="display:none;margin:13px;">
					<h4>ΤΑΙΝΙΕΣ</h4>
					<?php
						$sql="SELECT * FROM movies";
						$result=mysqli_query($conn,$sql); 
						if(mysqli_num_rows($result)>0){
							while($row=mysqli_fetch_assoc($result)){?>
								<button onclick="window.location.href='show-movies-series.php?type=movies&mid=<?php echo $row['id'];?>&<?php echo $row['name'];?>'">
								<h4><strong><?php echo $row['name']." (".$row['release_date'].")"; ?></strong></h4></button>
								<form method="POST">
									<button type="submit" name="delmovie" style="background-color:red;" value="<?php echo $row['id'];?>">Διαγραφή ταινίας</button><br>
								</form>
								<hr>
						<?php		
							}
						}else{
							echo "κανένα αποτέλεσμα";
						}
					?>
					<hr>
					<h4>ΣΕΙΡΕΣ</h4>
					<?php
						$sql="SELECT * FROM series";
						$result=mysqli_query($conn,$sql); 
						if(mysqli_num_rows($result)>0){
							while($row=mysqli_fetch_assoc($result)){?>
								<button onclick="window.location.href='show-movies-series.php?type=series&mid=<?php echo $row['id'];?>&<?php echo $row['name'];?>'">
								<h4><strong><?php echo $row['name']." (".$row['release_date'].")"; ?></strong></h4></button>
								<form method="POST">
									<button type="submit" name="delseries" style="background-color:red;" value="<?php echo $row['id'];?>">Διαγραφή Σειράς</button><br>
								</form>
								<hr>
						<?php		
							}
						}else{
							echo "κανένα αποτέλεσμα";
						}
					?>
				</div>
				<?php
						//Διαγραφή ταινίας - διαγράφει όλα τα στοιχεία των πινάκων που εχουν συσχέτιση με την ταινια.
						if(isset($_POST['delmovie'])){
							$m_id=$_POST['delmovie'];
							$sql="DELETE FROM cast_movies WHERE m_id=".$m_id; 
							if(!mysqli_query($conn,$sql)){
								echo "error".mysqli_error($conn);
								die();
							}
							$sql="DELETE FROM cat_movies WHERE m_id=".$m_id; 
							if(!mysqli_query($conn,$sql)){
								echo "error".mysqli_error($conn);
								die();
							}
							$sql="DELETE FROM dir_movies WHERE mov_id=".$m_id;
							if(!mysqli_query($conn,$sql)){
								echo "error".mysqli_error($conn);
								die();
							}
							$sql="DELETE FROM writers_movies WHERE mov_id=".$m_id;
							if(!mysqli_query($conn,$sql)){
								echo "error".mysqli_error($conn);
								die();
							}
							$sql="DELETE FROM movie_comments WHERE m_id=".$m_id; 
							if(!mysqli_query($conn,$sql)){
								echo "error".mysqli_error($conn);
								die();
							}
							$sql="DELETE FROM notif_movies WHERE m_id=".$m_id; 
							if(!mysqli_query($conn,$sql)){
								echo "error".mysqli_error($conn);
								die();
							}
							$sql="DELETE FROM users_rating_movies WHERE m_id=".$m_id; 
							if(!mysqli_query($conn,$sql)){
								echo "error".mysqli_error($conn);
								die();
							}
							$sql="DELETE FROM favms_list WHERE ms_id=".$m_id; 
							if(!mysqli_query($conn,$sql)){
								echo "error".mysqli_error($conn);
								die();
							}
							$sql="DELETE FROM movies WHERE id=".$m_id;
							if(!mysqli_query($conn,$sql)){
								echo "error".mysqli_error($conn);
								die();
							}
							header("Refresh:1");
						}
						
						//Διαγραφή σειρας και επισοδείων - διαγράφει όλα τα στοιχεία των πινάκων που εχουν συσχέτιση με την σειρά.
						if(isset($_POST['delseries'])){
							$m_id=$_POST['delseries'];
							//διαγραφή των συσχετίσεων σειράς-ηθοποιών
							$sql="DELETE FROM cast_series WHERE s_id=".$m_id; 
							if(!mysqli_query($conn,$sql)){
								echo "error".mysqli_error($conn);
								die();
							}
							//διαγραφή των συσχετίσεων σειράς-κατηγορίας
							$sql="DELETE FROM cat_series WHERE s_id=".$m_id; 
							if(!mysqli_query($conn,$sql)){
								echo "error".mysqli_error($conn);
								die();
							}
							//διαγραφή των συσχετίσεων σειράς-σκηνοθετών
							$sql="DELETE FROM dir_series WHERE s_id=".$m_id;
							if(!mysqli_query($conn,$sql)){
								echo "error".mysqli_error($conn);
								die();
							}
							//διαγραφή των συσχετίσεων σειράς-συγγραφέων
							$sql="DELETE FROM writers_series WHERE s_id=".$m_id;
							if(!mysqli_query($conn,$sql)){
								echo "error".mysqli_error($conn);
								die();
							}
							//διαγραφή των συσχετίσεων σειράς-αγαπημένα
							$sql="DELETE FROM fav_series_list WHERE series_id=".$m_id;
							if(!mysqli_query($conn,$sql)){
								echo "error".mysqli_error($conn);
								die();
							}
							//διαγραφή των συσχετίσεων σειράς-ειδοποίησης
							$sql="DELETE FROM notif_series WHERE s_id=".$m_id;
							if(!mysqli_query($conn,$sql)){
								echo "error".mysqli_error($conn);
								die();
							}
							//διαγραφή των συσχετίσεων σειράς-χρηστών-αξιολόγησης
							$sql="DELETE FROM s_comments WHERE s_id=".$m_id;
							if(!mysqli_query($conn,$sql)){
								echo "error".mysqli_error($conn);
								die();
							}
							//διαγραφή των συσχετίσεων σειράς-χρηστών-αξιολόγησης
							$sql="DELETE FROM users_rating_series WHERE s_id=".$m_id;
							if(!mysqli_query($conn,$sql)){
								echo "error".mysqli_error($conn);
								die();
							}
							//διαγραφή των συσχετίσεων επεισόδειο-σχόλια/αξιολόγηση.
							$sql="SELECT id FROM s_episodes WHERE series_id=".$m_id;
							if(!($result = mysqli_query($conn,$sql))){
								echo "error count ".mysqli_error($conn);
								die();
							}else{
								if(mysqli_num_rows($result)>0){
									while($row=mysqli_fetch_assoc($result)){
										$ep_id = $row['id'];
										$sql_delsepc="DELETE FROM s_ep_comments WHERE ep_id=".$ep_id;
										if(!mysqli_query($conn,$sql_delsepc)){
											echo "error! ".mysqli_error($conn);
											die();
										}
										$sql_delusepr="DELETE FROM users_s_ep_rate WHERE ep_id=".$ep_id;
										if(!mysqli_query($conn,$sql_delusepr)){
											echo "error! ".mysqli_error($conn);
											die();
										}
									}
								}
							}
							
							$sql="DELETE FROM s_episodes WHERE series_id=".$m_id;
							if(!mysqli_query($conn,$sql)){
								echo "error ".mysqli_error($conn);
								die();
							}
							$sql="DELETE FROM series WHERE id=".$m_id;
							if(!mysqli_query($conn,$sql)){
								echo "error".mysqli_error($conn);
								die();
							}
							header("Refresh:1");
						}
				?>
				
		<!-- Div για την εισαγωγή ταινιών/σειρών. -->
				<div class="sh" style="display:none;margin:13px;"> 
					<form method="POST">
						<input type="radio" id="movies" name="mos" onclick="shm()" value="movies" checked>
						<label for="movies">Movies</label><br>
						<input type="radio" id="series" name="mos" onclick="shs()" value="series">
						<label for="series">Series</label><br>
						ΟΝΟΜΑ: <input type="text" id="name" name="name"><br>
						<div id="m" class="m">
							ΔΕΙΑΡΚΕΙΑ (ΛΕΠΤΑ): <input type="number" min=0 id="dur" name="dur"><br>
						</div>
						ΕΤΟΣ ΚΥΚΛΟΦΟΡΙΑΣ: <input type="number" min=1900  max=2021 id="rd" name="rd"><br>
						ΠΕΡΙΓΡΑΦΗ: <input type="text" id="des" name="des"><br>
						Ηθοποιοί: <input type="text" name="cast[]"> <span id="cf"> </span> <button type="button" onclick="ccf()">&plus;</button><br>
						Σκηνοθέτες: <input type="text" name="dirs[]"> <span id="df"> </span> <button type="button" onclick="cdf()">&plus;</button><br>
						Συγγραφεις: <input type="text" name="wrs[]">  <span id="wf"> </span>  <button type="button" onclick="cwf()">&plus;</button><br>
						Κατηγορίες: <input type="text" name="cat[]">  <span id="cf2"> </span> <button type="button" onclick="ccf2()">&plus;</button><br><br>

						<div style="display:none" id="s" class="s">
							Αριθμός Σεζόν: <input type="number" id="nos" min=0 name="nos"><br>
							Αριθμός Επισοδείων: <input type="number" id="noe" min=0 name="noe"><br><br>
							<b>Προσθήκη Επισοδείων:</b><br><br>
							
							Όνομα επισοδείου : <input type="text" id="ep_name" name="ep_name[]"><br> 
							Δειάρκεια επισοδείου(ΛΕΠΤΑ): <input type="number" min=0 id="ep_dur" name="ep_dur[]"><br>
							Αριθμός επισοδείου: <input type="number" min=1 id="ep_num" name="ep_num[]"><br>
							Αριθμός Σεζόν: <input type="number" min=1 id="s_num" name="s_num[]"><br>
							ΠΕΡΙΓΡΑΦΗ: <input type="text" id="ep_des" name="ep_des[]"><br>
							
							<span id="cnef"></span>  <button type="button" onclick="cep()">&plus;</button><br>
						</div>
						
						
						
						<br>
						<button type="submit" name="addms">Προσθήκη</button>
					</form>
				</div>
			</div>
		<?php
		
			if(isset($_POST['addms'])){
				$mos= $_POST['mos'];
				$nm = $_POST['name'];
				$rd = $_POST['rd'];
				$des = $_POST['des'];
				$cast = $_POST['cast'];
				$dirs = $_POST['dirs'];
				$wrs = $_POST['wrs'];
				$cat = $_POST['cat'];
				if($nm=="" || $rd=="" || $des=="" || $cast=="" || $cat=="" || $wrs=="" || $dirs=="" ){
					echo "Συμπληρώστε όλα τα στοιχέια";
					die();
				}
				if($mos=="movies"){
					$dur = $_POST['dur'];
					if($dur==""){
					echo "Συμπληρώστε όλα τα στοιχέια";
					die();
				}
					$sql="INSERT INTO movies (name,duration,release_date,description) VALUES ('$nm','$dur','$rd','$des')";
				}else{
					$nos=$_POST['nos'];
					$noe=$_POST['noe'];
					$sql="INSERT INTO series (name,release_date,description,seasons,episodes) VALUES ('$nm','$rd','$des','$nos','$noe')";
				}
					if(!mysqli_query($conn,$sql)){
						echo "error".mysqli_error($conn);
						die();
					}
					$m_id = mysqli_insert_id($conn);
					if($mos=="series"){
						$cnt=0;
						$ep_name = $_POST['ep_name'];
						$ep_dur = $_POST['ep_dur'];
						$ep_num = $_POST['ep_num'];
						$ep_des = $_POST['ep_des'];
						$s_num = $_POST['s_num'];
						
						foreach($ep_name as $en){
							$sql="INSERT INTO s_episodes (name,ep_number,duration,series_id,season,description) VALUES ('$en','$ep_num[$cnt]','$ep_dur[$cnt]','$m_id','$s_num[$cnt]','$ep_des[$cnt]')";
							if(!mysqli_query($conn,$sql)){
								echo "Το επεισόδειο με όνομα: ".$en." υπάρχει ήδη ή υπάρχει σφάλμα!<br>";
							}
							$cnt++;
						}
					}
					
						//για εισαγωγή ηθοποιών.
						foreach($cast as $c){
							$sql="INSERT INTO cast (name) VALUES ('$c')";
							if(!mysqli_query($conn,$sql)){
								$sql="SELECT id FROM cast WHERE name='".$c."'";
								$result=mysqli_query($conn,$sql); 
								if(!$result){
									echo mysqli_error($conn);
								}else{
									$row=mysqli_fetch_assoc($result);
									$cast_id = $row['id'];
									if($mos=="movies"){
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
								if($mos=="movies"){
									$sql="INSERT INTO cast_movies (c_id,m_id) VALUES ('$last_id','$m_id')";
								}else{
									$sql="INSERT INTO cast_series (c_id,s_id) VALUES ('$last_id','$m_id')";
								}
								if(!mysqli_query($conn,$sql)){
									echo "error";
								}
							}
						}
						
						//για εισαγωγή σκηνοθετών.
						foreach($dirs as $c){
							$sql="INSERT INTO directors (name) VALUES ('$c')";
							if(!mysqli_query($conn,$sql)){
								$sql="SELECT id FROM directors WHERE name='".$c."'";
								$result=mysqli_query($conn,$sql); 
								if(!$result){
									echo mysqli_error($conn);
								}else{
									$row=mysqli_fetch_assoc($result);
									$cast_id = $row['id'];
									if($mos=="movies"){
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
								if($mos=="movies"){
									$sql="INSERT INTO dir_movies (dir_id,mov_id) VALUES ('$last_id','$m_id')";
								}else{
									$sql="INSERT INTO dir_series (dir_id,s_id) VALUES ('$last_id','$m_id')";
								}
								if(!mysqli_query($conn,$sql)){
									echo "error";
								}
							}
						}
						
						//για εισαγωγή συγγραφέων.
						foreach($wrs as $c){
							$sql="INSERT INTO writers (name) VALUES ('$c')";
							if(!mysqli_query($conn,$sql)){
								$sql="SELECT id FROM writers WHERE name='".$c."'";
								$result=mysqli_query($conn,$sql); 
								if(!$result){
									echo mysqli_error($conn);
								}else{
									$row=mysqli_fetch_assoc($result);
									$cast_id = $row['id'];
									if($mos=="movies"){
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
								if($mos=="movies"){
									$sql="INSERT INTO writers_movies (wr_id,mov_id) VALUES ('$last_id','$m_id')";
								}else{
									$sql="INSERT INTO writers_series (wr_id,s_id) VALUES ('$last_id','$m_id')";
								}
								if(!mysqli_query($conn,$sql)){
									echo "error";
								}
							}
						}
						
						//για εισαγωγή κατηγορίας.
						foreach($cat as $c){
							$sql="INSERT INTO categories (cat) VALUES ('$c')";
							if(!mysqli_query($conn,$sql)){
								$sql="SELECT id FROM categories WHERE cat='".$c."'";
								$result=mysqli_query($conn,$sql); 
								if(!$result){
									echo mysqli_error($conn);
								}else{
									$row=mysqli_fetch_assoc($result);
									$cast_id = $row['id'];
									if($mos=="movies"){
										$sql="INSERT INTO cat_movies (c_id,m_id) VALUES ('$cast_id','$m_id')";
									}else{
										$sql="INSERT INTO cat_series (c_id,s_id) VALUES ('$cast_id','$m_id')";
									}
									if(!mysqli_query($conn,$sql)){
										echo "error";
									}
								}
							}else{
								$last_id = mysqli_insert_id($conn);
								if($mos=="movies"){
									$sql="INSERT INTO cat_movies (c_id,m_id) VALUES ('$last_id','$m_id')";
								}else{
									$sql="INSERT INTO cat_series (c_id,s_id) VALUES ('$last_id','$m_id')";
								}
								if(!mysqli_query($conn,$sql)){
									echo "error";
								}
							}
						}
					
			}
// ------------------------------------------------------------------------------------------        USERS         ---------------------------------------------------------------------------------
		}else{
	?>
		<a style="float:right;margin:7px;" href="logout.php"><strong>logout</strong></a>
		<button onclick="window.location.href='notifications.php';" style="float:right;margin:7px;">&#128276;<span id="emn" class="emn"></span></button>
		<button type="submit" onclick="window.location.href='favorites.php';" style="float:right;margin:7px;"> &#10084;</button>
		<span style="float:right;margin-right:15px;">
		<?php 
			date_default_timezone_set('Europe/Athens');
			echo date("Y-m-d H:i");
		?>
		 </span>
	</div>
		<div class="container" style="margin-top:20px;">
		<h5>Uthflix</h5><hr>
		<form method="POST">
		<button style="margin:5px;" type="button"onclick="showHide(0)">Είδος</button>
			<div class="sh" style="display:none;margin:13px;" id="mos">
				<input type="radio" id="movies" name="mos" value="movies" checked>
				<label for="movies">Movies</label><br>
				<input type="radio" id="series" name="mos" value="series">
				<label for="series">Series</label>
			</div><br>
			
			<button style="margin:5px;" type="button"onclick="showHide(1)">Κατηγορίες</button>
			<div class="sh" style="display:none;margin:13px;">
			<?php
				$sql="select * from categories ORDER BY cat ASC";
				$result=mysqli_query($conn,$sql); 
				if(mysqli_num_rows($result)>0){
					while($row=mysqli_fetch_assoc($result)){
					$id2=$row['id'];
					$cat=$row['cat']; ?>
						<input type="checkbox" id="<?php echo $cat ?>" name="categories[]" value="<?php echo $id2 ?>">
						<label for="<?php echo $cat ?>"><?php echo $cat ?></label><br>
				<?php
					}
				}?>
			</div><br>
			
			<button style="margin:5px;" type="button"onclick="showHide(2)">Ηθοποιοί</button>
			<div class="sh" style="display:none;margin:13px;">
			<?php
				$sql="select * from cast ORDER BY name ASC";
				$result=mysqli_query($conn,$sql); 
				if(mysqli_num_rows($result)>0){
					while($row=mysqli_fetch_assoc($result)){
					$id2=$row['id'];
					$nm=$row['name']; ?>
						<input type="checkbox" id="<?php echo $nm ?>" name="cast[]" value="<?php echo $id2 ?>">
						<label for="<?php echo $nm ?>"><?php echo $nm ?></label><br>
				<?php
					}
				}?>
			</div><br>
			
			<button style="margin:5px;" type="button"onclick="showHide(3)">Συγγραφεις</button>
			<div class="sh" style="display:none;margin:13px;">
			<?php
				$sql="select * from writers ORDER BY name ASC";
				$result=mysqli_query($conn,$sql); 
				if(mysqli_num_rows($result)>0){
					while($row=mysqli_fetch_assoc($result)){
					$id2=$row['id'];
					$nm=$row['name']; ?>
						<input type="checkbox" id="<?php echo $nm ?>" name="writers[]" value="<?php echo $id2 ?>">
						<label for="<?php echo $nm ?>"><?php echo $nm ?></label><br>
				<?php
					}
				}?>
			</div><br>
			
			<button style="margin:5px;" type="button"onclick="showHide(4)">Σκηνοθέτες</button>
			<div class="sh" style="display:none;margin:13px;">
			<?php
				$sql="select * from directors ORDER BY name ASC";
				$result=mysqli_query($conn,$sql); 
				if(mysqli_num_rows($result)>0){
					while($row=mysqli_fetch_assoc($result)){
					$id2=$row['id'];
					$nm=$row['name']; ?>
						<input type="checkbox" id="<?php echo $nm ?>" name="directors[]" value="<?php echo $id2 ?>">
						<label for="<?php echo $nm ?>"><?php echo $nm ?></label><br>
				<?php
					}
				}?>
			</div><br>
			
			<button style="margin:5px;" type="button"onclick="showHide(5)">Έτος κυκλοφορίας</button>
			<div class="sh" style="display:none;margin:13px;">
			<?php
				$sql="SELECT DISTINCT release_date FROM movies UNION SELECT DISTINCT release_date FROM series ORDER BY release_date ASC;";
				$result=mysqli_query($conn,$sql); 
				if(mysqli_num_rows($result)>0){
					while($row=mysqli_fetch_assoc($result)){
					$year=$row['release_date']; ?>
						<input type="checkbox" id="<?php echo $year ?>" name="year[]" value="<?php echo $year ?>">
						<label for="<?php echo $year ?>"><?php echo $year ?></label><br>
				<?php
					}
				}?>
			</div><br>
			
			<button style="margin: 10px;" type="submit" name="lmsboc" >&#8594;</button>
		</form>
		
		<div>
		
		</div>
		
		<?php
			if(isset($_POST['lmsboc'])){

				$type=$_POST['mos'];
				if($type == 'movies'){
					$sql = "SELECT DISTINCT movies.* FROM movies";
					$n="movies.id";
					$_SESSION['type']="movies";
				}else{
					$sql = "SELECT DISTINCT series.* FROM series";
					$n="series.id";
					$_SESSION['type'] = "series";
				}
				
				if(!empty($_POST["categories"])){
					$ctr=0;
					$cs = $_POST["categories"];
					if($type == 'movies'){
						$sql = $sql." INNER JOIN cat_movies ON ".$n."=cat_movies.m_id AND (cat_movies.c_id=";
						$n="cat_movies.m_id";
						$n2="cat_movies";
					}else{
						$sql = $sql." INNER JOIN cat_series ON ".$n."=cat_series.s_id AND (cat_series.c_id=";
						$n="cat_series.s_id";
						$n2="cat_series";
					}
					foreach($cs as $c){
						if($ctr == 0){
							$sql = $sql."".$c;
							$ctr=1;
						}else{
							$sql = $sql." AND ".$n2.".c_id=".$c;
						}
					}
					$sql=$sql.")";
				}
				
				if(!empty($_POST["cast"])){
					$ctr=0;
					$as = $_POST["cast"];
					if($type == 'movies'){
						$sql = $sql." INNER JOIN cast_movies ON ".$n."=cast_movies.m_id AND (cast_movies.c_id=";
						$n="cast_movies.m_id";
						$n2="cast_movies";
					}else{
						$sql = $sql." INNER JOIN cast_series ON ".$n."=cast_series.s_id AND (cast_series.c_id=";
						$n="cast_series.s_id";
						$n2="cast_series";
					}
					foreach($as as $a){
						if($ctr == 0){
							$sql = $sql."".$a;
							$ctr=1;
						}else{
							$sql = $sql." AND ".$n2.".c_id=".$a;
						}
					}
					$sql=$sql.")";
				}
				
				if(!empty($_POST["writers"])){
					$ctr=0;
					$ws = $_POST["writers"];
					if($type == 'movies'){
						$sql = $sql." INNER JOIN writers_movies ON ".$n."=writers_movies.mov_id AND (writers_movies.wr_id=";
						$n="writers_movies.mov_id";
						$n2="writers_movies";
					}else{
						$sql = $sql." INNER JOIN writers_series ON ".$n."=writers_series.s_id AND (writers_series.wr_id=";
						$n="writers_series.s_id";
						$n2="writers_series";
					}
					foreach($ws as $w){
						if($ctr == 0){
							$sql = $sql."".$w;
							$ctr=1;
						}else{
							$sql = $sql." AND ".$n2.".wr_id=".$w;
						}
					}
					$sql=$sql.")";
				}
				
				if(!empty($_POST["directors"])){
					$ctr=0;
					$dirs = $_POST["directors"];
					if($type == 'movies'){
						$sql = $sql." INNER JOIN dir_movies ON ".$n."=dir_movies.mov_id AND (dir_movies.dir_id=";
						$n="dir_movies.mov_id";
						$n2="dir_movies";
					}else{
						$sql = $sql." INNER JOIN dir_series ON ".$n."=dir_series.s_id AND (dir_series.dir_id=";
						$n="dir_series.s_id";
						$n2="dir_series";
					}
					foreach($dirs as $nms){
						if($ctr == 0){
							$sql = $sql."".$nms;
							$ctr=1;
						}else{
							$sql = $sql." AND ".$n2.".dir_id=".$nms;
						}
					}
					$sql=$sql.")";
				}
				
				if(!empty($_POST["year"])){
					$ctr=0;
					$year = $_POST["year"];
					if($type == 'movies'){
						$sql = $sql." WHERE movies.release_date=";
						$n2="movies";
					}else{
						$sql = $sql." WHERE series.release_date=";
						$n2="series";
					}
					foreach($year as $y){
						if($ctr == 0){
							$sql = $sql."".$y;
							$ctr=1;
						}else{
							$sql = $sql." AND ".$n2.".release_date=".$y;
						}
					}
				}
					
				$result=mysqli_query($conn,$sql); 
				if(!$result){
					echo mysqli_error($conn);
				}
				if(mysqli_num_rows($result)>0){
					$counter=6;
					while($row=mysqli_fetch_assoc($result)){
						if($type=="movies"){ ?>
							<div style="margin:5px;border:1px solid black;padding:7px;">
								<button onclick="window.location.href='show-movies-series.php?type=<?php echo $type?>&mid=<?php echo $row['id'];?>&<?php echo $row['name'];?>'">
								<h4><strong><?php echo $row['name']." (".$row['release_date'].")"; ?>
								</strong></h4></button>
								<form method="POST">
								<?php
									$sql_fav="SELECT * FROM favms_list WHERE ms_id=".$row['id']." AND user_id=".$id;
									$result_fav=mysqli_query($conn,$sql_fav); 
									if(mysqli_num_rows($result_fav)>0){
										$row_fav=mysqli_fetch_assoc($result_fav);?>
										<button style="float:right;margin:7px;" name="delfavm" type="submit" value="<?php echo $row['id'];?>">Διαγραφή από &#10084;</button>
										<?php
									}else{?>
										<button style="float:right;margin:7px;" name="addfavm" type="submit" value="<?php echo $row['id'];?>">&#10084;</button>
									<?php } ?>
								</form>
								<?php
											$sql_fav="SELECT * FROM notif_movies WHERE m_id=".$row['id']." AND user_id=".$id;
											$result_fav=mysqli_query($conn,$sql_fav); 
											if(mysqli_num_rows($result_fav)==0){ ?>
												<button style="float:right;margin:7px;" type="button"onclick="showHide(<?php echo $counter ?>)"><i class='far fa-calendar-plus'>&#xf271;</i></button><br>
											<?php }else{ ?>
											<form method="POST">
												<button style="float:right;margin:5px;" type="submit" name="deldt" value="<?php echo $row['id'];?>">Διαγραφή ειδοποίησης</button>
											</form>
											<?php }?>	
								<div class="sh" style="display:none;margin:13px;float:right;">
									<form method="POST">
										<b>Προσθήκη ειδοποίησης για: </b>
										<input type="date" name="date" required>
										<input type="time" name="time" required>
										<button type="submit" name="dt" value="<?php echo $row['id'];?>">&plus;</button>
									</form>
								</div>
								<b>Δειάρκεια: </b><?php echo $row['duration']." min."; ?><br>
								<b>Βαθμολογία: </b>
								<?php 	
								
									$sql_avg="SELECT AVG(rating) FROM users_rating_movies WHERE m_id=".$row['id'];
									$result_avg=mysqli_query($conn,$sql_avg); 
									$row_avg=mysqli_fetch_assoc($result_avg);
									$avg = round($row_avg['AVG(rating)'],1); echo $avg."/10"; 
							
								?><br>
								<b>Περιγραφή: </b><?php echo $row['description']; ?>
							</div>
						<?php
						}else{ ?>
							<div style="margin:5px;border:1px solid black;padding:7px;">
								<button onclick="window.location.href='show-movies-series.php?type=<?php echo $type?>&mid=<?php echo $row['id'];?>&<?php echo $row['name'];?>'">
								<h4><strong><?php echo $row['name']." (".$row['release_date'].")"; ?>
								</strong></h4></button>
								<form method="POST">
								<?php
									$sql_fav="SELECT * FROM fav_series_list WHERE series_id=".$row['id']." AND user_id=".$id;
									$result_fav=mysqli_query($conn,$sql_fav); 
									if(mysqli_num_rows($result_fav)>0){
										$row_fav=mysqli_fetch_assoc($result_fav);?>
										<button style="float:right;margin:7px;" name="delfavm" type="submit" value="<?php echo $row['id'];?>">Διαγραφή από &#10084;</button>
										<?php
									}else{?>
										<button style="float:right;margin:7px;" name="addfavm" type="submit" value="<?php echo $row['id'];?>">&#10084;</button>
									<?php } ?>
								</form>
								<?php
											$sql_fav="SELECT * FROM notif_series WHERE s_id=".$row['id']." AND user_id=".$id;
											$result_fav=mysqli_query($conn,$sql_fav); 
											if(mysqli_num_rows($result_fav)==0){ ?>
												<button style="float:right;margin:7px;" type="button"onclick="showHide(<?php echo $counter ?>)"><i class='far fa-calendar-plus'>&#xf271;</i></button><br>
											<?php }else{ ?>
											<form method="POST">
												<button style="float:right;margin:5px;" type="submit" name="deldt" value="<?php echo $row['id'];?>">Διαγραφή ειδοποίησης</button>
											</form>
											<?php }?>	
								<div class="sh" style="display:none;margin:13px;float:right;">
									<form method="POST">
										<b>Προσθήκη ειδοποίησης για: </b>
											<input type="date" name="date" required>
											<input type="time" name="time" required>
											<button type="submit" name="dt" value="<?php echo $row['id'];?>">&plus;</button>
									</form>
								</div>
								<b>Σεζόν: </b><?php echo $row['seasons']; ?><br>
								<b>Επισόδεια: </b><?php echo $row['episodes']; ?><br>
								<b>Βαθμολογία: </b>
								<?php 	
								
									$sql_avg="SELECT AVG(rating) FROM users_rating_series WHERE s_id=".$row['id'];
									$result_avg=mysqli_query($conn,$sql_avg); 
									$row_avg=mysqli_fetch_assoc($result_avg);
									$avg = round($row_avg['AVG(rating)'],1); echo $avg."/10"; 
							
								?><br>
								<b>Περιγραφή: </b><?php echo $row['description']; ?>
							</div>
						<?php
						}
						$counter++;
					}
				}else{
					echo "Κανένα αποτέλεσμα.";
				}

			}
		?>
		
		</div>
		<?php
			if(isset($_POST['addfavm'])){
				$m_id=$_POST['addfavm'];
				if($_SESSION['type']=="movies"){
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
				$m_id=$_POST['delfavm'];
				if($_SESSION['type']=="movies"){
					$sql="DELETE FROM favms_list WHERE ms_id=".$m_id." AND user_id=".$id;
				}else{
					$sql="DELETE FROM fav_series_list WHERE series_id=".$m_id." AND user_id=".$id;
				}
				if(!mysqli_query($conn,$sql)){							
					echo "error";
					die();
				} 	
			}
			
			if(isset($_POST['dt'])){
				$ms_id=$_POST['dt'];
				$date=$_POST['date'];
				$time=$_POST['time'];
				$dtime=$date." ".$time;
				if($_SESSION['type']=="movies"){
					$sql="INSERT INTO notif_movies (user_id,m_id,datetime) VALUES ('$id','$ms_id','$dtime')" ;
				}else{
					$sql="INSERT INTO notif_series (user_id,s_id,datetime) VALUES ('$id','$ms_id','$dtime')" ;
				}
				if(!mysqli_query($conn,$sql)){	
					echo mysqli_error($conn);			
					echo "error";
					die();
				} 	
			}
			
			if(isset($_POST['deldt'])){
				$ms_id=$_POST['deldt'];
				if($_SESSION['type']=="movies"){
					$sql="DELETE FROM notif_movies WHERE m_id=".$ms_id." AND user_id=".$id;
				}else{
					$sql="DELETE FROM notif_series WHERE s_id=".$ms_id." AND user_id=".$id;
				}
				if(!mysqli_query($conn,$sql)){							
					echo "error";
					die();
				} 	
			}
		}
		
		
		?>
	</body>
</html>

<script>
var x = document.getElementsByClassName("sh");

function showHide(k) {
  if (x[k].style.display === "none") {
    x[k].style.display = "block";
  } else {
    x[k].style.display = "none";
  }
}

</script>

<?php	
if($role=="user"){ ?>
<script>
	$.ajaxSetup ({
        cache: false
    });
	
    $(document).ready(function(){
        $('#emn').load('shownotification.php');
        setInterval(function(){
            $('#emn').load('shownotification.php');
        },10000); 
    });
</script>
<?php
}else{?>
	<script src="jsprods.js" ></script>
<?php } ?>
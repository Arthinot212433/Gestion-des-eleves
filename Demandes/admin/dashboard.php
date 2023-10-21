<?php 
	include('inc/head.php'); 

?>
<body>
	<nav class="navbar navbar-toggleable-sm navbar-inverse bg-inverse p-0">
		<div class="container">
			<button class="navbar-toggler toggler-right" data-target="#mynavbar" data-toggle="collapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a href="#" class="navbar-brand mr-3">Gestion des demandes de matériel</a>
			<div class="collapse navbar-collapse" id="mynavbar">
				
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown mr-3">
						
						<!-- <li class="nav-item">
							<a href="logout.php" class="nav-link"><i class="fa fa-power-off"></i> Deconnecter</a>
						</li> -->
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!--This Is Header-->
	<header id="main-header" class="bg-danger py-2 text-white">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h3><i class="fa fa-user-secret"></i> Tableau de contrôle</h3>
				</div>
			</div>
		</div>
	</header>
	<!--This is section-->
	<section id="sections" class="py-2 mb-2">
		<div class="container">
			<div class="row">
				<div class="col-md"></div>
				<div class="col-md-2">
					<a href="#" class="btn btn-warning btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addPostModal"><i class="fa fa-spinner"></i> Demande en cours</a>
				</div>
				<div class="col-md-2">
					<a href="#" class="btn btn-success btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addCateModal"><i class="fa fa-check"></i> Approuvée</a>
				</div>
				<div class="col-md-2">
					<a href="#" class="btn btn-primary btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addUsertModal"><i class="fa fa-th"></i> Total Demande</a>
				</div>
				
				<div class="col-md-2">
					<a href="#" class="btn btn-info btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#viewEmpModal"><i class="fa fa-eye"></i> visualiser ....</a>
				</div>
				<div class="col-md"></div>
			</div>
		</div>
	
	</section>
	<!-- Designed and developed by Habibur Rahman Mahid -->
	<!----Section2 for showing Post Model ---->
	<section id="post">
		<div>
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<th>#</th>
					<th>Nom</th>
					<th>Departement</th>
					<th>Date</th>
					<th>Raison</th>
					<th>Statut</th>
				</thead>
					<tbody>
					<?php 
						$sql = "SELECT * FROM leaves ORDER BY id DESC";
						$que = mysqli_query($con,$sql);
						$cnt = 1;
						while ($result = mysqli_fetch_assoc($que)) {
							
						?>

						
					<tr>
						<td><?php echo $cnt;?></td>
						<td><?php echo $result['name']; ?></td>
						<td><?php echo $result['department']; ?></td>
						<td><?php echo $result['leavedate']; ?></td>
						<td><?php echo $result['leavereason']; ?></td>
						<td>
							<?php 
							if ($result['status'] == 0) {
								echo "<span class='badge badge-warning'>En attend</span>";
							}
							else{
								echo "<span class='badge badge-success'>Approuveé</span>";
							}
					$cnt++;	}
							?>
						</td>
					</tr>
					
					</tbody>
			</table>
		</div>
		
	</section>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<!----Section3 footer ---->
	<section id="main-footer" class="text-center text-white bg-inverse mt-4 p-4">
		<div class="container">
			<div class="row">
				<div class="col">
				<p class="lead">&copy; <?php echo date("Y")?> SOLM</p>
				</div>
			</div>
		</div>
	</section>
	<!-- Designed and developed by Habibur Rahman Mahid -->
	
	<!-- Creating Modal -->
    <!-- Header Post -->
	<div class="modal fade" id="addPostModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-warning text-white">
					<div class="modal-title">
						<h5>En instance</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
				<table class="table table-bordered table-hover table-striped">
							<thead>
								<th>#</th>
								<th>Nom</th>
								<th>Departement</th>
								<th>Date</th>
								<th>Raison</th>
								<th>Statut</th>
								<th>Action</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM leaves WHERE status = 0";
									$que = mysqli_query($con,$sql);
									$cnt = 1;
									while ($result = mysqli_fetch_assoc($que)) {
									?>

									
							 	<tr>
									<td><?php echo $cnt;?></td>
							 		<td><?php echo $result['name']; ?></td>
							 		<td><?php echo $result['department']; ?></td>
							 		<td><?php echo $result['leavedate']; ?></td>
							 		<td><?php echo $result['leavereason']; ?></td>
							 		<td>
							 			<?php 
							 			if ($result['status'] == 0) {
							 				echo "En attend";
							 				?>
							 				</td>
							 		<td>
							 			<form action="accept.php?id=<?php echo $result['id']; ?>" method="POST">
							 				<input type="hidden" name="appid" value="<?php echo $result['id']; ?>">
							 				<input type="submit" class="btn btn-sm btn-success" name="approve" value="Approuver">
							 			</form>
							 		</td>
							 				<?php
							 			}
							 			else{
							 				echo "Approuvé";
							 			}
							 	$cnt++;	}
							 		 ?>
							 		
							 	</tr>

							 </tbody>
						</table>
					
				</div>
				
			</form>
			</div>
		</div>
	</div>
	<!-- Designed and developed by Habibur Rahman Mahid -->
	<!--Modal Category-->
	<div class="modal fade" id="addCateModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-success text-white">
					<div class="modal-title">
						<h5>Demande approuvés</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
				<table class="table table-bordered table-hover table-striped">
							<thead>
								<th>#</th>
								<th>Nom</th>
								<th>Departement</th>
								<th>Date</th>
								<th>Raison</th>
								<th>Statut</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM leaves WHERE status = 1";
									$que = mysqli_query($con,$sql);
									$cnt = 1;
									while ($result = mysqli_fetch_assoc($que)) {
									?>

									
							 	<tr>
									<td><?php echo $cnt;?></td>
							 		<td><?php echo $result['name']; ?></td>
							 		<td><?php echo $result['department']; ?></td>
							 		<td><?php echo $result['leavedate']; ?></td>
							 		<td><?php echo $result['leavereason']; ?></td>
							 		<td>
							 			<?php 
							 			if ($result['status'] == 0) {
											echo "<span class='badge badge-warning'>En attend</span>";
							 			}
							 			else{
											echo "<span class='badge badge-success'>Approuveé</span>";
							 			}
							 	$cnt++;	}
							 		 ?>
							 		</td>
							 	</tr>

							 </tbody>
						</table>
					
				</div>
			
			</div>
		</div>
	</div>
	<!-- Designed and developed by Habibur Rahman Mahid -->
	<!-- User Modal -->
	<div class="modal fade" id="addUsertModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-primary text-white">
					<div class="modal-title">
						<h5>Total demandes</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
				<table class="table table-bordered table-hover table-striped">
							<thead>
								<th>#</th>
								<th>Nom</th>
								<th>Departement</th>
								<th>Date</th>
								<th>Raison</th>
								<th>Statut</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM leaves ORDER BY id DESC";
									$que = mysqli_query($con,$sql);
									$cnt = 1;
									while ($result = mysqli_fetch_assoc($que)) {
									?>

									
							 	<tr>
									 <td><?php echo $cnt;?></td>
							 		<td><?php echo $result['name']; ?></td>
							 		<td><?php echo $result['department']; ?></td>
							 		<td><?php echo $result['leavedate']; ?></td>
							 		<td><?php echo $result['leavereason']; ?></td>
							 		<td>
							 			<?php 
							 			if ($result['status'] == 0) {
											echo "<span class='badge badge-warning'>En attend</span>";
							 			}
							 			else{
											echo "<span class='badge badge-success'>Approuveé</span>";
							 			}
							 	$cnt++;	}
							 		 ?>
							 		</td>
							 	</tr>

							 </tbody>
						</table>
				</div>
				
			</div>
		</div>
	</div>


	<!-- Add Users Modal -->
	


	<!-- View Employee Modal -->
	<div class="modal fade" id="viewEmpModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-info text-white">
					<div class="modal-title">
						<h5>Listes des .....</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
				<table class="table table-bordered table-hover table-striped">
							<thead>
								<th>#</th>
								<th>Nom</th>
								<th>Departement</th>
								<th>Email</th>
								<th>Action</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM users";
									$que = mysqli_query($con,$sql);
									$cnt = 1;
									while ($result = mysqli_fetch_assoc($que)) {
									?>

									
							 	<tr>
									<td><?php echo $cnt;?></td>
							 		<td><?php echo $result['name']; ?></td>
							 		<td><?php echo $result['department']; ?></td>
							 		<td><?php echo $result['email']; ?></td>
									 <td><a href="deletemp.php?id=<?php echo $result["id"]; ?>"><button type="button" class="btn btn-danger" style="border-radius:0%;">Suprimer</button></a> </td>
							 	</tr>

							 </tbody>
							 <?php $cnt++; }?>
						</table>
				</div>
				
			</div>
		</div>
	</div>
  
  
  <script src="js/jquery.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
  <script>
	CKEDITOR.replace('editor1');
  </script>
  <!-- Designed and developed by Habibur Rahman Mahid -->
</body>
</html>

<?php 
	if (isset($_POST['adduser'])){
		$name = $_POST['name'];
		$department = $_POST['department'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$password = md5($_POST['password']);


		$sql = "INSERT INTO users(name,department,email,password)VALUES('$name','$department','$email','$password')";

		$run = mysqli_query($con,$sql);

		if($run == true){
			
			echo "<script> 
					alert('Utilisateur ajouté');
					window.open('dashboard.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Failed');
			</script>";
		}
	}
	
 ?>

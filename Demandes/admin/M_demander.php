<?php
include('inc/head.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <title>AF</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
      <link rel="stylesheet" href="../../style.css">
      <!-- Inclure Font Awesome depuis un CDN -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
  <div class="video-bg">
      <video width="320" height="240" autoplay loop muted>
        <source src="https://assets.codepen.io/3364143/7btrrd.mp4" type="video/mp4">

      </video>
  </div>
<div class="dark-light">
    <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
     <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" /></svg>
   </div>
<div class="app">
 <div class="header">
 <div class="menu-circle"><img class="image" src="../../aff.jpg"></div>
  <div class="header-menu">

  </div>
        <div class="search-bar">
            <form class="search-bar" action="Adherent.php" method="POST">
                <!-- Champ caché pour indiquer une recherche -->
                <input type="hidden" name="submit" value="true">
                <input type="text" placeholder="Search" name="search">
            </form>
        </div>
  <div class="header-profile">
   <div class="notification">
    <span class="notification-number">3</span>
    <svg viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
     <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 01-3.46 0" />
    </svg>
   </div>
   <svg viewBox="0 0 512 512" fill="currentColor">
    <path d="M448.773 235.551A135.893 135.893 0 00451 211c0-74.443-60.557-135-135-135-47.52 0-91.567 25.313-115.766 65.537-32.666-10.59-66.182-6.049-93.794 12.979-27.612 19.013-44.092 49.116-45.425 82.031C24.716 253.788 0 290.497 0 331c0 7.031 1.703 13.887 3.006 20.537l.015.015C12.719 400.492 56.034 436 106 436h300c57.891 0 106-47.109 106-105 0-40.942-25.053-77.798-63.227-95.449z" />
   </svg>
   <img class="profile-img" src="https://images.unsplash.com/photo-1600353068440-6361ef3a86e8?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="">
  </div>
 </div>
 <div class="wrapper">
  <div class="left-side">
   <div class="side-wrapper">
    <div class="side-menu">
   <h3>Département</h3>  
   <br><br>
     <form method="get" action="../../direction.php">
        <button class="btnPe active" type="submit" style="width: 150px;">Direction</button>
    </form>
    <br><br>
     <form method="get" action="../../pedagogie.php">
          <button class="btnPe" type="submit" style="width: 150px;">Pédagogie</button>
      </form>
      <br><br>
    <form method="get" action="">
        <button class="btnPe" type="submit" style="width: 150px;">Bibliothèque</button>
    </form>
    <br><br>
    <form method="get" action="../../logistique.php">
        <button class="btnPe" type="submit" style="width: 150px;">Logistique</button>
    </form>
    <form method="get" action="../../index.php">
        <button class="image-button" type="submit" name="logout"></button>
        
    </form>
    </div>
   </div>
  </div>
  <div class="main-container">
   <div class="main-header">
   
    <div class="header-menu">
    <a class="main-header-link " href="#">Pointage</a>
     <a class="main-header-link" href="">Caisse</a>
     <a class="main-header-link" href="">Agenda</a>
     <a class="main-header-link" href="">Statistique</a>
     <a class="main-header-link" href="">Exporter pdf</a>
     <a class="main-header-link is-active" href="/Gestion_des_eleves/Demandes/M_demander.php">Materiel demandé</a>

    </div>
   </div>                    
            <section id="sections" class="py-2 mb-2">
                    <div class="container-demander">
                        <div class="row">
                            <div class="col-md"></div>
                            <div class="col-md-3">
                                <a href="#" class="btn btn-warning btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addPostModal"><i class="fa fa-spinner"></i> Demande en cours</a>
                            </div>
                            <div class="col-md-2">
                                <a href="#" class="btn btn-success btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addCateModal"><i class="fa fa-check"></i> Approuvée</a>
                            </div>
                            <div class="col-md-2">
                                <a href="#" class="btn btn-primary btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addUsertModal"><i class="fa fa-th"></i> Total Demande</a>
                            </div>
                            
                            <div class="col-md-3">
                                <a href="#" class="btn btn-info btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#viewEmpModal"><i class="fa fa-eye"></i> visualiser ....</a>
                            </div>
                            <div class="col-md"></div>
                        </div>
                    </div>
                
            </section>
						
                    <div class="content-wrapper">
                    <div>
                        <table class="table table-hover table-striped">
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
						
						<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
																	
        </div>
  </div>
 </div>
 <div class="overlay-app"></div>

</div>
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
                        <table class="table table-hover table-striped">
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
					window.open('M_demander.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Failed');
			</script>";
		}
	}
	
 ?>
		<!-- partial -->
		<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script  src="../../script.js"></script>
</body>
</html>

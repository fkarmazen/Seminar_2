<?php
    include('session.php');
   	//include("config.php");

  ?>



<!DOCTYPE html>
<html>
<head>
	<title>admin site</title>
	<?php include_once "../bootstrapInclude.php" ?>
	<link rel="stylesheet" href="../css/style.css" />

</head>
<body class="body">
	<div class="wrapper">
		<div class="header">

			<!-- Navigation with inline setting-->
			<nav class="navbar navbar-default navbar-fixed-top" style="background:white;">
 				 <div class="container-fluid">
    		<!-- Brand and toggle get grouped for better mobile display -->
			     	<div class="navbar-header">
			    		<div class="logo">
							<a href="../index.php"><img src="../photos/logo.png" width="100px" height="auto"></a>
						</div>
			    	</div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				      	<ul class="nav navbar-nav" id="navigacija">
								<li><a href="../index.php">Početna</a></li>
								<li><a href="../destinacije.php">Destinacije</a></li>
								<li><a href="../plovila.php">Plovila</a></li>
								<li><a href="../kontakt.php">Kontakt</a></li>
						</ul>
						<div class="button" ><a href="logout.php">Logout</a></div>
					</div>
				</div>
			</nav>
		</div>

		<!--Body with user reservation or admin tools -->
		<div class="main_user">
			<?php

				$con = mysqli_connect("localhost","root","root","ribar_jet") or die ("Niste  povezani s bazom");
				//naredba da prihvaća hrvatska slova iz baze
				mysqli_set_charset($con,"utf8");

				//$us = $_SESSION["login_user"];

				//echo $us;

				//$query = "SELECT id FROM korisnik WHERE username = '$us';";

				//$res = mysqli_query($con,$query);

				/*foreach ($res as $r) {
					//echo $r['id'];
				}*/

				

				if ($result = $con->query("SELECT * FROM rezervacije;")){
					while($row =  mysqli_fetch_assoc($result)){

						echo '<div class="ponuda">';

							echo '<div class="text_destinacije">';
								//text rezervacije 
								echo "<p>broj rezervacije : ". $row['id'].'<br>'. " vrsta plovila: ".$row['id_plovila'].'<br>'. " polazak: ". $row['polazak_dat'] .'<br>'. "odredište: " .$row['id_odredista'].'<br>'." id korisnika: ". $row['id_korisnik']."</p>";
							 echo '</div>';
						echo '</div>';
						

					}

				}else echo "0 results"; 



			?>
		</div>

		<!--Classic footer with credentials -->
		<div class="footer">
			<p>Copyright Mihelčić/Karmazen </p>
		</div>
	</div>
</body>
</html>	
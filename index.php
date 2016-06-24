<?php

	include("admin/config.php");
  	session_start();
  	$user_login;
   

?>


<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<?php include_once "bootstrapInclude.php" ?>
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
							<a href="index.php"><img src="photos/logo.png" width="100px" height="auto"></a>
						</div>
			    	</div>

			   		 <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				      	<ul class="nav navbar-nav" id="navigacija">
								<li><a href="index.php">Početna</a></li>
								<li><a href="destinacije.php">Destinacije</a></li>
								<li><a href="plovila.php">Plovila</a></li>
								<li><a href="kontakt.php">Kontakt</a></li>
						</ul>


						<div class="login_forma">
							<form action="admin/login.php" method="post">
								<p>
									Username: 
			                        <input type="text" name="username" id="username" value="" />
			                    </p>
			                    <p>
			                        Password:
			                        <input type="password" name="password" id="password" value="" />
			                    </p>
					            <p>
					                <input type="submit" value="Submit" />
					            </p>
							</form>
						</div>
					</div>
				</div>
			</nav>

			
		</div>

		<!--Header picture under header -->
		<div class="header_slika">
			<img src="photos/slika1.jpg" width="960px" height="480px">
		</div>

		<!--Body with selection of destination or boat-type -->
		<div class="main">

			<!-- Destination selection-->	
			<div class="index_jedrilice">
				<div class="slika_index">
					<img src="photos/jedrilica1.jpg" width="300px" height="248px">
				</div>
				<div class="index_odabir">
					<h3>Odaberite destinaciju</h3>

					<!--reservation of destionation button , redirection to selection of destionation for rent -->
					<div class="button1">
							<a href="destinacije.php">Odabir destinacije</a>
					</div>
				</div>
			</div>


			<!-- Boat-type selection-->
			<div class="index_jetski">
				<div class="slika_index">
					<img src="photos/Yamaha zr1.jpg" width="300px" height="248px">
				</div>
				<div class="index_odabir">
					<h3>Odaberite željeno plovilo</h3>

					<!--reservation of destionation button , redirection to selection of boat for rent -->
					<div class="button">
							<a href="plovila.php">Odabir plovila</a>
					</div>
				</div>
			</div>
		</div>

		<!--Classic footer with credentials -->
		<div class="footer">
			<p>Copyright Mihelčić/Karmazen </p>
		</div>
	</div>
</body>
</html>	
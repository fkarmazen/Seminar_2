<!DOCTYPE html>
<html>
<head>
	<title>Kontakt</title>
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
					</div>
				</div>
			</nav>
		</div>

		<!--Body with informations about owner with map of location of company -->
		<div class="main_kontakt">
			<div class="info">
				<p>
					 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tristique congue orci sed vestibulum. Praesent tempor sapien at neque sodales, id ornare mauris ullamcorper. Pellentesque ac leo eros. Mauris id sagittis sapien. Fusce consectetur feugiat libero auctor vulputate. Ut sapien libero, rutrum eu gravida et, aliquam in velit. Nunc magna mi, aliquet id congue ac, varius sit amet nulla. Proin fringilla magna ut mi iaculis, imperdiet egestas mauris placerat.

					Nulla quis dolor malesuada, lobortis sem at, hendrerit justo. Quisque a odio a dui porta egestas. Suspendisse potenti. Donec rhoncus mauris odio, sed gravida turpis facilisis id. Sed ante massa, dignissim eleifend sodales nec, mollis id ex. Donec volutpat sapien eu ex malesuada vestibulum. Donec aliquet a mi in finibus. Integer a tincidunt velit, a porta nisi. Phasellus nulla dolor, faucibus non nunc nec, tristique bibendum lacus. Donec vitae vestibulum nisl. 
				</p>
			</div>

			<!-- Map of company location-->
			<div class="mapa">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d23476.46607219907!2d18.0757756!3d42.6495239!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x134b8ba20835e87d%3A0x0400ad50862bd500!2sDubrovnik!5e0!3m2!1shr!2shr!4v1465145076792" width="450" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>

		<div class="footer">
			<p>Copyright Mihelčić/Karmazen </p>
		</div>
	</div>
</body>
</html>	
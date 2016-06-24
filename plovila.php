<?php
// Start the session
session_start();
$cookie_destination;
$cookie_boat = "";
$naziv_lokacije;
?>

<script>
    function setCookie(cname, cvalue, exdays) {
				    var d = new Date();
				    d.setTime(d.getTime() + (exdays*24*60*60*1000));
				    var expires = "expires="+d.toUTCString();
				    document.cookie = cname + "=" + cvalue + "; " + expires;
				}
	function deleteCookie(cname, cvalue, exdays) {
				    var d = new Date();
				    d.setTime(d.getTime() + (exdays*24*60*60*1000));
				    var expires = "expires="+d.toUTCString();
				    document.cookie = cname + "=" + cvalue + "; " + expires;
				}
</script>

<?php
	$con = mysqli_connect("localhost","root","root","ribar_jet") or die ("Niste  povezani s bazom");

	mysqli_set_charset($con,"utf8");

	$query = "SELECT * FROM bazne_luke";

	$res = mysqli_query($con,$query);

	$query1 = "SELECT DISTINCT model FROM plovila";	

	$result1 = mysqli_query($con,$query1);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Plovila</title>
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
								<li><a href="index.php">Pocetna</a></li>
								<li><a href="destinacije.php">Destinacije</a></li>
								<li><a href="plovila.php">Plovila</a></li>
								<li><a href="kontakt.php">Kontakt</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>

		<!--Body with boats and reservation form -->
		<div class="main_plovila">

			<!--Reservation form , should be fixed-->
			<div class="fixed_rezervacija">
					<form action="prihvat.php" method="post">
						  Destincija:<br>
						  <select name="plovilo" onchange="getId(this.value)">
						  <option>Izaberite plovilo...</option>
						  <?php 
						  	foreach ($result1 as $row1) 
						  	{
								echo "<option value='$row1[model]'>$row1[model]</option>";
						  	}
						  ?>
						  </select>

						  <br><br>
						  <select name="dest" id="destDrop" >
						  	<option>Prvo izaberite plovilo...</option>
						  	<option value=""></option>
						  </select><br><br>
						  First name:<br>
						  <input type="text" name="firstname" placeholder="ime">
						  <br><br>
						  Last name:<br>
						  <input type="text" name="lastname" placeholder="prezime">
						  <br><br>
						  Email:<br>
						  <input type="email" name="email" placeholder="email">
						  <br><br>
						  Contact number:<br>
						  <input type="text" name="mobitel" placeholder="broj mobitela">
						  <br><br>
						  <div class="container" style="width:200px;right:15px;">
									<div class="row" >
								        <div class='col-sm-6' style="width:200px;right:15px;">
								            <div class="form-group">
								                <div class='input-group date' id='datetimepicker1'>
								                    <input type='text' class="form-control" name="datetimepicker1" />
								                    <span class="input-group-addon">
								                        <span class="glyphicon glyphicon-calendar" ></span>
								                    </span>
								                </div>
								            </div>
								        </div>
									        <script type="text/javascript">
									            $(function () {
									                $('#datetimepicker1').datetimepicker(
									                {
															format: 'DD/MM/YYYY HH:mm'
													});
									            });
									        </script>
								    </div>
								</div>
						  <br><br>

						  <input type="submit" value="Submit" class="button">
					</form>
			</div>


			<!--Body with boats options -->
			<div class="plovila_ponuda">
			<div class="button" onclick="deleteCookie('cookie_destination','',10)">
					<a href="plovila.php">Prikaži sve</a>
				</div>	
				</br>

				<?php  
								if ($result = $con->query("SELECT * FROM plovila")) {
								    // output data of each row

								    while($row = mysqli_fetch_assoc($result)) {
								    		if($row['trenutna_luka_id'] == $_COOKIE['cookie_destination'] ){


								    			//jedna cijela ponuda
								    			echo '<div class="ponuda">';
								    				//slika destinacije
								    				echo '<div class="img_plovila">';
													echo '<img src="photos/'.$row["model"].'.jpg" width="310px" height="230px">';
													echo '</div>';

													echo '<div class="text_plovila">';
														//text opis luke 
										       			 echo "<h3>".$row["model"]."</h3>"."Opis plovila:</br>"."Sirina plovila: ".$row["sirina"]."</br>Dužina plovila: ".$row["duzina"]."</br>Broj osoba: ".$row["broj_osoba"]."</br></br></p>";

														//<!--reservation of a boat button , redirection to selection of a destination for rent with selected boat-->
														echo '<div class="button" onclick="setCookie(\'cookie_boat\', \''.$row["trenutna_luka_id"].'\' ,10)">';
															echo '<a href="destinacije.php">Odabir destinacije</a>';
														echo '</div>';
													echo '</div>';

									       		 echo '</div>';
									       		 
									       	
								    		}else if($_COOKIE['cookie_destination']  == ""){
								    			//jedna cijela ponuda
								    			echo '<div class="ponuda">';
								    				//slika destinacije
								    				echo '<div class="img_plovila">';
													echo '<img src="photos/'.$row["model"].'.jpg" width="310px" height="230px">';
													echo '</div>';

													echo '<div class="text_plovila">';
														//text opis luke 
										       			 echo "<h3>".$row["model"]."</h3>"."Opis plovila:</br>"."Sirina plovila: ".$row["sirina"]."</br>Dužina plovila: ".$row["duzina"]."</br>Broj osoba: ".$row["broj_osoba"]."</br></br></p>";

														//<!--reservation of a boat button , redirection to selection of a destination for rent with selected boat-->
														echo '<div class="button" onclick="setCookie(\'cookie_boat\', \''.$row["trenutna_luka_id"].'\' ,10)">';
															echo '<a href="destinacije.php">Odabir destinacije</a>';
														echo '</div>';
													echo '</div>';

									       		 echo '</div>';
									       		 
								   			 }
								   		}
								} else {
								    echo "0 results";
								}

					?>

				
			</div>
			
		</div>
		<div class="footer">
			<p>Copyright Mihelčić/Karmazen </p>
		</div>
	</div>
	<script>
		function getId(val)
		{
			//alert(val);
			$.ajax({
				type: "POST",
				url: "destData.php",
				data: "iid="+val,
				success: function(data){
					$("#destDrop").html(data);
			}
			});
		}
	</script>
</body>
</html>	
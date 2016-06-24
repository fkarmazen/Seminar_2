<?php
// Start the session
session_start();
$cookie_destination;
$cookie_boat = "";
$naziv_lokacije;
?>



<?php  
			$con = mysqli_connect("localhost","root","root","ribar_jet") or die ("Niste  povezani s bazom");
			//naredba da prihvaća hrvatska slova iz baze
			mysqli_set_charset($con,"utf8");

			$query1 = "SELECT * FROM bazne_luke";

			$result1 = mysqli_query($con,$query1);

?>

<script>
    function setCookie(cname, cvalue, exdays) {
				    var d = new Date();
				    d.setTime(d.getTime() + (exdays*24*60*60*1000));
				    var expires = "expires="+d.toUTCString();
				    document.cookie = cname + "=" + cvalue + "; " + expires;
				}
	//----> funkcija koja brise cookie gumbom
	function deleteCookie(cname, cvalue, exdays) {
				    var d = new Date();
				    d.setTime(d.getTime() + (exdays*24*60*60*1000));
				    var expires = "expires="+d.toUTCString();
				    document.cookie = cname + "=" + cvalue + "; " + expires;
				}
</script>
	
<!DOCTYPE html>
<html>
<head>
	<title>Destinacije</title>
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
    </div><!-- /.navbar-collapse -->
</nav>


		<!--Body with destinations and reservation form -->
		<div class="main_destinacije">

			<!--Reservation form , should be fixed-->
			<div class="fixed_rezervacija">
					<form action="prihvat.php" method="post">
						  Destincija:<br>
						  <select name="destinacija" onchange="getId(this.value)">
						  <option>Izaberite destinaciju...</option>
						  <?php 
						  	foreach ($result1 as $row1) 
						  	{
								echo "<option value='$row1[id]'>$row1[naziv]</option>";
						  	}
						  ?>
						  </select>

						  <br><br>
						  <select name="model" id="modelDrop" >
						  	<option>Prvo izaberite destinaciju...</option>
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


			<!--Destionation options-->
			<div class="destinacije_ponuda">
						<div class="button" onclick="deleteCookie('cookie_boat','',10)" >
							<a href="destinacije.php">Prikaži sve</a>
						</div>
						</br>

						<?php 
								if ($result = $con->query("SELECT * FROM bazne_luke")) {
								    // output data of each row
								    while($row = mysqli_fetch_assoc($result)) {
								    			
								    		// ->Provjerava imamo cookie koji je postavljen  
								    		if($row['id'] === $_COOKIE['cookie_boat']){
								    			echo '<div class="ponuda">';
								    				//slika destinacije
								    				echo '<div class="img_destinacije">';
														echo '<img src="photos/'.$row["naziv"].'.jpg" width="310px" height="230px">';
													echo '</div>';

													echo '<div class="text_destinacije">';
														//text opis luke 
										       			 echo "<h3>".$row["naziv"]."</h3>".$row["luka_info"]."</p>";

														//<!--reservation of a boat button , redirection to selection of a destination for rent with selected boat-->
														echo '<div class="button" onclick="setCookie(\'cookie_destination\', \''.$row["id"].'\' ,3)" >';
															echo '<a href="plovila.php">Odabir plovila</a>';
														echo '</div>';

													echo '</div>';	
										   		 echo '</div>';
								    		
								    	}else if($_COOKIE['cookie_boat']  == ""){
								    			//jedna cijela ponuda
								    			echo '<div class="ponuda">';
								    				//slika destinacije
								    				echo '<div class="img_destinacije">';
														echo '<img src="photos/'.$row["naziv"].'.jpg" width="310px" height="230px">';
													echo '</div>';

													echo '<div class="text_destinacije">';
														//text opis luke 
										       			 echo "<h3>".$row['naziv']."</h3>".$row['luka_info']."</p>";

														//<!--reservation of a boat button , redirection to selection of a destination for rent with selected boat-->
														echo '<div class="button" onclick="setCookie(\'cookie_destination\', \''.$row["id"].'\' ,10)" >';
															echo '<a href="plovila.php">Odabir plovila</a>';
														echo '</div>';

													echo '</div>';	
										   		 echo '</div>';
								   			 }
								    }
								} else echo "0 results";
							
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
				url: "modelData.php",
				data: "iid="+val,
				success: function(data){
					$("#modelDrop").html(data);
			}
			});
		}
	</script>
</body>
</html>	
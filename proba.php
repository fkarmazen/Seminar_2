<?php
// Start the session
session_start();
$cookie_destination;
$cookie_boat;
?>

<?php  
			$con = mysqli_connect("localhost","root","","ribar_jet") or die ("Niste  povezani s bazom");
			//naredba da prihvaća hrvatska slova iz baze
			mysqli_set_charset($con,"utf8");

			$query1 = "SELECT * FROM bazne_luke";
			$query2 = "SELECT model FROM plovila INNER JOIN bazne_luke ON bazne_luke.id = plovila.trenutna_luka_id";

			$result1 = mysqli_query($con,$query1);
			$result2 = mysqli_query($con,$query2);

?>


<script>
    function SetCookie(c_name,value,expiredays)
        {
            var exdate=new Date()
            exdate.setDate(exdate.getDate()+expiredays)
            document.cookie=c_name+ "=" +escape(value)+
            ((expiredays==null) ? "" : ";expires="+exdate.toGMTString())
    		location.reload()
        }
</script>
<?php

echo "Pozdrav " . $_GET["datetimepicker1"];

?>
<!DOCTYPE html>
<html>
<head>
	<title>PROBA</title>
	<?php include_once "bootstrapInclude.php" ?>
	<style> 
@font-face {
   font-family: myFont;
   src: url(sailor.ttf);
}

</style>
</head>
<body class="body">
	<div class="wrapper">
		<div class="header">
		<br><br><br><br><br><br><br><br>
		<p class="bok">lALALALALLALAALAL</p>



			<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="index.php">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


		<!--Body with destinations and reservation form -->
		<div class="main_destinacije">

			<!--Reservation form , should be fixed-->
			<div class="fixed_rezervacija">
						<form action="">
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
						  <div class="container">
    <div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker2').datetimepicker({
                    format: 'mm/DD/YYYY HH:mm'
                });
            });
        </script>
    </div>
</div>
						  <br><br>

						  <input type="submit" value="Submit">
						</form>
				</div>

			<!--Destionation options-->
			<div class="destinacije_ponuda">

				
						<?php
								if ($result = $con->query("SELECT * FROM bazne_luke")) {
								    // output data of each row
								    while($row = mysqli_fetch_assoc($result)) {
								    			//div ponude
								    			echo '<div class="ponuda">';
								    				//slika destinacije
								    				echo '<div class="img_destinacije">';
													echo '<img src="photos/'.$row["naziv"].'.jpg" width="310px" height="230px">';
													echo '</div>';

													echo '<div class="text_destinacije">';
														//text opis luke 
										       			 echo "<h3>".$row["naziv"]."</h3>".$row["luka_info"]."</p>";

														//<!--reservation of a boat button , redirection to selection of a destination for rent with selected boat-->
														echo '<div class="button" onClick="SetCookie("$cookie_destination","$row["naziv"]","-1")>';
															echo '<a href="plovila.php">Odabir plovila</a>';
															//setcookie('cookie_destination', $row['id'], time()+ (60*15),"/");

														echo '</div>';
														//if(!isset($_COOKIE[$cookie_destination])) echo "Cookie " . $cookie_destination . "is set!<br>";
													echo '</div>';
													
									       		 echo '</div>';
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
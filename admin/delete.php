<?php
   $con = mysqli_connect("localhost","root","","ribar_jet") or die ("Niste  povezani s bazom");
			//naredba da prihvaća hrvatska slova iz baze
			mysqli_set_charset($con,"utf8");


	if(!empty($_POST["iid"])){
			$rezervacijaId = $_POST["iid"];
			$query = "DELETE FROM rezervacije WHERE id = $rezervacijaId";
			$res = mysqli_query($con,$query);}
?>
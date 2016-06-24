<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<!--Dohvat podataka iz plovila.php i destinacije.php-->
	<?php
	error_reporting(0);
	$con = mysqli_connect("localhost","root","root","ribar_jet") or die ("Niste  povezani s bazom");

	mysqli_set_charset($con,"utf8");

	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$date = $_POST["datetimepicker1"];
	$date1 = $_POST["datetimepicker1"];
	$plovilo = $_POST["plovilo"];
	$dest = $_POST["dest"];
	$destinacija = $_POST["destinacija"];
	$model = $_POST["model"];

	if(!empty($plovilo) or !empty($dest)){

	$modelId = mysqli_query($con,"SELECT plovila.id FROM plovila INNER JOIN bazne_luke ON plovila.trenutna_luka_id = bazne_luke.id WHERE model = '$plovilo' AND trenutna_luka_id = '$dest';");

	$sql = mysqli_query($con,"INSERT INTO korisnik (ime, prezime, email,tip_korisnika_id) VALUES ('$firstname','$lastname','$email','2');");
	
	$korisnikId = mysqli_query($con,"SELECT id FROM korisnik WHERE email = '$email';");

	foreach ($modelId as $row1) {
		echo $row1['id'] .'<br>';
	}

	foreach ($korisnikId as $key) {
		echo $key['id'] .'<br>';
	}
	
	$rez = "INSERT INTO rezervacije (id_plovila,polazak_dat,dolazak_dat,id_odredista,id_korisnik) VALUES ('$row1[id]','$date1','$date1','$dest','$key[id]');";
	

	if ($con->query($rez) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $rez . "<br>" . $con->error;
	}
}
	else{
	$unosDest = mysqli_query($con,"INSERT INTO korisnik (ime, prezime, email,tip_korisnika_id) VALUES ('$firstname','$lastname','$email','2');");
	
	$korId = mysqli_query($con,"SELECT id FROM korisnik WHERE email = '$email';");

	foreach ($korId as $k) {
		echo $k['id'] .'<br>';
	}


	$unosRez = "INSERT INTO rezervacije (id_plovila,polazak_dat,dolazak_dat,id_odredista,id_korisnik) VALUES ('$model','$date','$date','$destinacija','$k[id]');";

	if ($con->query($unosRez) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $unosRez . "<br>" . $con->error;
	}

	echo '<br>'."Pozdrav " .'<br>'. $_POST["firstname"] .'<br>'. $_POST["lastname"] ."<br>". $_POST["email"] ."<br>". $_POST["mobitel"] ."<br>". $_POST["destinacija"] ."<br>". $_POST["model"] ."<br>". $_POST["datetimepicker1"];
	}
	?>



</body>
</html>
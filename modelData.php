<?php  
			$con = mysqli_connect("localhost","root","root","ribar_jet") or die ("Niste  povezani s bazom");
			//naredba da prihvaća hrvatska slova iz baze
			mysqli_set_charset($con,"utf8");

			if(!empty($_POST["iid"])){
				$lukaId = $_POST["iid"];
				$query = "SELECT * FROM plovila WHERE trenutna_luka_id = $lukaId";
				$res = mysqli_query($con,$query);


				echo "<option>Izaberite dostupno plovilo...</option>";
				foreach ($res as $row) 
				{
					echo "<option value='$row[id]'>$row[model]</option>";
				}
			}
?>
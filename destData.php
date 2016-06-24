<?php  
			$con = mysqli_connect("localhost","root","root","ribar_jet") or die ("Niste  povezani s bazom");
			//naredba da prihvaća hrvatska slova iz baze
			mysqli_set_charset($con,"utf8");

			if(!empty($_POST["iid"])){
				$lukaId = $_POST["iid"];
				$query = "SELECT * FROM bazne_luke INNER JOIN plovila ON plovila.trenutna_luka_id = bazne_luke.id WHERE model = '$lukaId' ";
				$res = mysqli_query($con,$query);


				echo "<option>Izaberite destinaciju...</option>";
				foreach ($res as $row) 
				{
					echo "<option value='$row[trenutna_luka_id]'>$row[naziv]</option>";
				}
			}
?>
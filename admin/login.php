<?php
   include("config.php");
   session_start();
   $login_user;




   if($_SERVER["REQUEST_METHOD"] == "POST") {
	      // username and password sent from form 

	      $myusername = mysqli_real_escape_string($db,$_POST['username']);
	      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 

	      $sql = "SELECT id FROM korisnik WHERE username = '$myusername' and password = '$mypassword'";
	      $result = mysqli_query($db,$sql);
	      $row = mysqli_fetch_assoc($result);

	      //$sql2 = ;
	      //$result2 = mysqli_query($db,"SELECT tip_korisnika_id FROM korisnik WHERE id = 2 ");
	      //$row2 = mysqli_fetch_assoc($result2);

	      $login_user = $myusername;
	      
	      
	      $count = mysqli_num_rows($result);
	      
	      // If result matched $myusername and $mypassword, table row must be 1 row
			echo $myusername ." ". $mypassword;
			//echo "</br></br></br>";


			$query="SELECT * FROM korisnik ";


	      if($count === 1) {
	      		//echo "</br></br></br>";
		      	$_SESSION['login_user'] = $myusername;


		      	//echo "</br></br></br>";
		      	if ($result = mysqli_query($db, $query)){
		      		//echo $myusername."Unutar ifa </br>"; 

		      		 while ($row2 = mysqli_fetch_assoc($result)) {

		      		 	//echo $myusername."unustar petlje </br>";

			   			if($myusername == $row2['username'] && $row2['tip_korisnika_id'] === '1'){
			      			//echo $row2['ime']."</br>".$row2['prezime']."</br>".$row2['username']."</br>".$row2['password'];
			      			header("location:admin.php");
			      			//echo "Kurac";
			   			}else if($myusername == $row2['username'] && $row2['tip_korisnika_id'] === '2'){
			   				header("location:user.php");
			   			}
		       		}
		       	}


	      }else {
	      	header("location:../index.php");
	      }
   }



/* check connection */

 


?>

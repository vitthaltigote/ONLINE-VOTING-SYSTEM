				<?php

				$hostname="localhost";
				$username= "root";
				$password= "";
				$database="db_evoting";
				//db connection
				// $conn = mysqli_connect($hostname, $username, $password, $database);	
				// UserInput Test
					function test_input($data) {
					  $data = trim($data);
					  $data = stripslashes($data);
					  $data = htmlspecialchars($data);
					
					  return $data;
					}	

								

?>
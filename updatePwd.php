
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

    <style>
      .headerFont{
        font-family: 'Ubuntu', sans-serif;
        font-size: 24px;
      }

      .subFont{
        font-family: 'Raleway', sans-serif;
        font-size: 14px;
        
      }
      
      .specialHead{
        font-family: 'Oswald', sans-serif;
      }

      .normalFont{
        font-family: 'Roboto Condensed', sans-serif;
      }
    </style>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	
	<div class="container">
  	<nav class="navbar navbar-default navbar-fixed-top navbar-inverse
    " role="navigation">
      <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="navbar-header">
          <a href="index.html" class="navbar-brand headerFont text-lg"><strong>eVoting</strong></a>
        </div>

        <div class="collapse navbar-collapse" id="example-nav-collapse">
          <ul class="nav navbar-nav">
            <!-- 
            <li><a href="#featuresTab"><span class="subFont"><strong>Features</strong></span></a></li>
            <li><a href="#feedbackTab"><span class="subFont"><strong>Feedback</strong></span></a></li>
            <li><a href="#"><span class="subFont"><strong>About</strong></span></a></li>
        	-->
          </ul>
          

          <button type="submit" class="btn btn-success navbar-right navbar-btn"><span class="normalFont"><strong>Admin Panel</strong></span></button>
        </div>

      </div> <!-- end of container -->
    </nav>

    
    <div class="container" style="padding-top:150px;">
    	<div class="row">
    		<div class="col-sm-4"></div>
    		<div class="col-sm-4 text-center" style="border:2px solid gray;padding:50px;">

<?php

// Credentials
            $hostname= "localhost";
            $username= "root";
            $password= "";
            $database= "db_evoting";
// establish db connection
          
	$conn= mysqli_connect($hostname, $username, $password, $database);

  //or
  //  $conn = new mysqli($hostname, $username, $password, $database);

  // Check connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
                    
// ..................................................................................................................................................................................
// fetch data
// ..................................................................................................................................................................................
                    // UserInput Test
                      function test_input($data,$conn) {
                        $data = trim($data);
                              //  This line removes any leading or trailing whitespace from the input data using the trim() function.
                              //  This ensures that there are no unintended spaces that could interfere with the data processing.
                        $data = stripslashes($data);
                              // This line removes backslashes (\) from the input data. Backslashes are commonly used to escape characters, but in some contexts, they can cause issues if not handled properly. 
                              // This function ensures that backslashes are not misinterpreted.
                        $data = htmlspecialchars($data);
                              // This line converts special characters like <, >, &, etc., into their HTML entity equivalents. 
                              // This step is crucial for preventing Cross-Site Scripting (XSS) attacks where an attacker tries to inject malicious scripts into your w
                        $data = mysqli_real_escape_string($conn, $data);
                              // 'mysqli_real_escape_string function to escape special characters in the input data to prevent SQL injection attacks.
                              // It requires two parameters: the first parameter $conn is assumed to be a mysqli database connection object,
                              // and the second parameter is the input data to be sanitized.
                        return $data;
                      } 


 // ..................................................................................................................................................................................
	// Fetch Data
	if(empty($_POST['existingPassword']) || empty($_POST['newPassword']))//we ensure all fields are not empty
	{
		$error= "Fields Recquired.";
	}
	else
	{
		$old= test_input($_POST['existingPassword']);
		$new= test_input($_POST['newPassword']);
	}
// ..................................................................................................................................................................................
	
  
  //Establish Connection

	// Select Database
	//$db= mysql_select_db($db_evoting, $conn);

	// ******************************
	// ADD USER NAME FIELD HERE-- FROM SESSION
	//**********************************

	$sql="SELECT * FROM db_evoting.tbl_admin WHERE admin_password='".$old."'";/// check old pass is match in table
	$query= mysqli_query($conn, $sql);

	$rows= mysqli_num_rows($query);/// if any row are present function return true
	if($rows==1)
	{
		// Given Password is Valid
		$sql="UPDATE db_evoting.tbl_admin SET admin_password='$new' WHERE admin_username='admin'"; // =============EDIT 
	
    if($query= mysqli_query($conn, $sql))//if query is satishfied then update successfully
		{
			// Successfully Changed
			echo "<img src='images/success.png' width='70' height='70'>";
			echo "<h3 class='text-info specialHead text-center'><strong> SUCCESSFULLY CHANGED.</strong></h3>";
			echo "<a href='cpanel.php' class='btn btn-primary'> <span class='glyphicon glyphicon-ok'></span> <strong> Finish</strong> </a>";
		}
	}
	else
	{
		$error= "Old-Password is Incorrect";

		echo "<img src='images/error.png' width='70' height='70'>";
		echo "<h3 class='text-info specialHead text-center'><strong> $error</strong></h3>";
		echo "<a href='index.html' class='btn btn-primary'> <span class='glyphicon glyphicon-ok'></span> <strong> Finish</strong> </a>";

	}

	mysqli_close($conn);
// finally close connection .
?>

	
    		</div>
    		<div class="col-sm-4"></div>
    	</div>
    </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>



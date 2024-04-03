	<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    /* display: flex; */
    /* justify-content: center;
    align-items: center; */
    height: 100vh;
    background-color: #f5f5f5;
}
header{
    margin-top: 0px;
    padding-top: 10px;
    width: 100%;
}
a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}


nav {
          /* position: fixed; */
           width:100%;
            background-color: #444;
            color: #fff;
            /* padding: 10px; */
           
           
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            
        }
        nav ul li {
          /* we have to set list tag attribute  display :inline;  in <ul>*/
            display: inline; 
            margin-right: 20px;
        }
        nav ul li a {
            color: #c6f545;
            text-decoration: none;
        }
        .dropbtn {
          background-color: #04AA6D;
          color: white;
          padding: 16px;
          font-size: 16px;
          border: none;
        }

        .dropdown {
          position: relative;
          display: inline-block;
        }

        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #01b881;
          
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }

        .dropdown-content a {
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
        }

        .dropdown-content a:hover {background-color: #ddd;}

        .dropdown:hover .dropdown-content {display: block;}

        .dropdown:hover .dropbtn {background-color: #3e8e41;}


        </style>
    </head>
    <body>
        <div>
        <header>
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li class="dropdown">
                <a href="services.html">Services</a>
                <div class="dropdown-content">
                    <a href="#">election</a>
                    <a href="https://www.eci.gov.in/">Election commission of india</a>
                </div>
            </li>
            <li><a href="admin.html">results</a></li>
            <li><a href="nomination.html">nominations</a></li>
            <li><a href="aboutus.html">About</a></li>
            <li><a href="contactUs.html">Contact</a></li>
            <li class="dropdown">
        
              <button class="dropbtn">LogIn</button>
              <div class="dropdown-content">
                <a href="voterlogin.html">Voter LogIn</a>
                <a href="voterlogin.html">Candidate LogIn</a>
                <a href="admin.html">Admin LogIn</a>
            </div>
            </li>

        </ul>
    </nav>
</header>
    
        </div>
        <br>
        <div>
        <?php
// include or required method 
          require('config.php');
// we can write a config file code block directly insted of require method
// ////////////////////////////////////////////////////////////////////////////////////
// $hostname="localhost";
// 				$username= "root";
// 				$password= "";
// 				$database="db_evoting";

// 				// UserInput Test
// 					function test_input($data) {
// 					  $data = trim($data);
// 					  $data = stripslashes($data);
// 					  $data = htmlspecialchars($data);
					
// 					  return $data;
// 					}	
// ////////////////////////////////////////////////////////////////////////////////////							
				
          

    if(isset($_POST["username"]) && isset($_POST["voter_id"]) && isset($_POST["password"]))
    {
        // by test_input() method we save it in another variables after cleaning of user inserted data as we require.
        $name= test_input($_POST["username"]);
        $userid= test_input($_POST["voter_id"]);
        $password= test_input($_POST["password"]);
    }
    else
        {
            echo "<br>All Field Recquired";
        }
				
       $DB_HOST= "localhost";
       $DB_USER="root";
       $DB_PASSWORD="";
       $DB_NAME="db_evoting";
	

        $conn= @mysqli_connect($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_NAME)
        or die("Couldn't Connect to Database :");
				
          if($conn)
          {
            echo"<h1 align='center'>good luck\n\n<h1><br><br>";
          }
				$sql= "INSERT INTO db_evoting.voter_register (username,voter_id,password) VALUES('".$name."','".$userid."','".$password."');";
       
				if(mysqli_query($conn, $sql)){
					// echo "<img src='images/vote.png' align='center' width='70' height='70'>";
					echo "<h3 class='text-info specialHead text-center' align='center'><strong> YOU'VE  SUCCESSFULLY   REGISTERD.</strong></h3>";
                }
				else
				{
					echo "<img src='images/error.png' width='70' height='70'>";
					echo "<h3 class='text-info specialHead text-center'><strong> SORRY! WE'VE SOME ISSUE..</strong></h3>";
					echo "<a href='index.html' class='btn btn-primary'> <span class='glyphicon glyphicon-ok'></span> <strong> Finish</strong> </a>";
				}

				
				?>

        </div>
    </body>
    </html>
    		
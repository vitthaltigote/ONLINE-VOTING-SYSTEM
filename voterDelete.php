<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Nomination Panel</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

    <style>
      .headerFont{
        font-family: 'Ubuntu',sans-serif;
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
        
    nav{
        background-color:#333; 
        padding-top: 10px;
        width:100%;
        height:40px;
        padding-left: 10px;
        list-style-type: none;

    
    }
    nav ul {
        list-style-type: none;
        padding: 0;
    }

    nav ul li {
        display: inline;
        margin-right: 20px;
    }
    nav ul li a {
        color: #fff;
        text-decoration: none;
    }
    .htitle{
      background-color: #333;
      height:auto;
      margin-top: 3%;
      width: 100%;
      align-content: center;

    }
    h2{
      height:fit-content;
      color: #fff;
      text-align: center;
      font-size: 2cm;
    }
    footer{
    margin-bottom: 10px;
    padding-bottom: 0%;
    text-align: center;
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
	
  	<nav class="navbar navbar-default navbar-fixed-top navbar-inverse
    " role="navigation">
      <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="navbar-header">
          <a href="./index.html" class="navbar-brand headerFont text-lg"><strong>eVoting</strong></a>
        </div>

        <div class="collapse navbar-collapse" id="example-nav-collapse">
          <ul class="nav navbar-nav">
            
            <li><a href="./voterlist.php"><span class="subFont"><strong>voterlist</strong></span></a></li>
            <!-- <li><a href="#feedbackTab"><span class="subFont"><strong>Feedback</strong></span></a></li>
            <li><a href="#"><span class="subFont"><strong>About</strong></span></a></li> -->
        	
          </ul>
          <a href="./index.html" >
          <button type="submit" class="btn btn-success navbar-right navbar-btn"><span class="normalFont"><strong>Log Out</strong></span></button></a>
        </div>

      </div> <!-- end of container -->
    </nav>
<div class="htitle">

<h2 align='center'>Voter delete process</h2>

</div>
<!-- logic of delete voter -->
<?php

    include('config.php');

if(isset($_GET['id']))
{
    $id=$_GET['id'];

    $query="delete from `tbl_users` where `id`= '$id'";
    $result= mysqli_query($conn,$query);
  if(!$result)
  {
  die("query failed");
  }
else
  header('location:cpanel.php?delete_msg= you have delete voter successfully.');
  }
?>

        <footer>
                <p>&copy; <?php echo date("Y"); ?> Voting Website. All rights reserved.</p>
        </footer>

  </body>
</html>
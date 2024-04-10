<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>voter List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
   
    /* height: 100vh; */
    background-color: #f5f5f5;
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
    #records{
        margin-top: 0%;
        padding:0%;
        display:grid;
        background-color:lavender;

    }

    </style>
</head>
<body>
  
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
<h2 align="center">Voter List</h2>
    <div id="records">
        <table class="table" border=2px solid black>
            <thead>
            <tr>
            <th>id</th>
            <th>full_name</th>
            <th>email</th>
            <th>voter_id</th>
            <th>vote_for</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
            </thead>
            <tbody>
                <!-- table tbody end -->
        <?php
        
            require('config.php');
// create connection
            $conn = mysqli_connect($hostname, $username, $password, $database);
 // check connection
            if($conn->connect_error)
            {
                die("connection failed: ".$conn->connect_error);
            }
            else
            {
 // read data form database
                $sql ='SELECT * FROM tbl_users';
                
                $result= $conn->query($sql);

                
                // echo "<table class='table'>
                // <thead >
                // <tr>
                //     <th>id</th>
                //     <th>full_name</th>
                //     <th>email</th>
                //     <th>voter_id</th>
                //     <th>vote_for</th>
                // </tr>
                // </thead>
                // </table>";

                while($row= mysqli_fetch_assoc($result)){

                echo"
               <tr>
                <td>" .$row['id']."</td>
                <td>" .$row['full_name']."</td>
                <td>" .$row['email']."</td>
                <td>" .$row['voter_id']."</td>
                <td>" .$row['voted_for']."</td>
                <td><a href='voterUpdate.php?id=$row[id]' class='btn btn-success'>Update</a></td>
                <td><a href='voterDelete.php?id=$row[id]' class='btn btn-danger'>Delete</a></td>
                </tr><br><br>";

                
                }
            }
        ?></tbody>
        </table>  
    </div>
</body>
</html>
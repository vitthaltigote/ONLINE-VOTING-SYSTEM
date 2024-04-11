
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
    <!-- logic of delete voter -->
<?php

include('config.php');

    $conn = mysqli_connect($hostname, $username, $password, $database);	
    if($conn)
    
if(isset($_GET['id']))
{
$id=$_GET['id'];
// echo "$id";
  $query="DELETE FROM `tbl_users` WHERE `id`= '$id'";
  $result= mysqli_query($conn,$query);
if($result)
  {
     echo "<script>alert('Record Deleted successful');</script>";
        header('location:adminVoterlist.php');
  }
else
  {
    echo"something going wrong...";
}
}
?>
</body>
</html>



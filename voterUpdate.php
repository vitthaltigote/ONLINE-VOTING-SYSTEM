<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>voter update</h1>
    <?php

    include('config.php');

    $conn = mysqli_connect($hostname, $username, $password, $database);	
if(isset($_GET['id']))
{
$id=$_GET['id'];
    // echo"$id";

}

    ?>
</body>
</html>
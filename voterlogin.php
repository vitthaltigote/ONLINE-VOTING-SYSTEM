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
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f5f5f5;
}


.container {
    /* background-color: #f8edab;
    padding: 10px;
    border-radius: 5px;
    width: 200px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
    /* ////////////////////// */
       

        
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
</style>
</head>
<body>
    <div class="container">

    <?php
session_start();


        // Credentials
        $hostname= "localhost";
        $username= "root";
        $password= "";
        $database= "db_evoting";


        // UserInput Test
        function test_input($data) {
        // for remove white space and other character from input
            $data = trim($data);
        //  for clean up data retrieved from a database or from an HTML
             $data = stripslashes($data);
        // Convert the predefined characters "<" (less than) and ">" (greater than) to HTML entities
             $data = htmlspecialchars($data);
        
        return $data;
        } 
// Database connection
$conn= mysqli_connect($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM voter_register WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION["username"] = $username;
        header("Location: vault.html");
    } else {
        echo "Invalid username or password<br><br>
        <a href='voterlogin.html'>go back to login page</a>";
    }
}

$conn->close();
?>

    </div>
</body>
</html>
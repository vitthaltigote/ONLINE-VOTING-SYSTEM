<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <style>
        .profile
        {
            width: fit-content;
            height:fit-content;
        }
    </style>
</head>
<body>
    <div class:"profile">
        

<?php
// Step 1: Connect to the database

require('config.php');
// create connection
            $conn = mysqli_connect($hostname, $username, $password, $database);
 // check connection
            if($conn->connect_error)
            {
                die("connection failed: ".$conn->connect_error);
            }

// Step 2: Prepare SQL query to fetch data by ID
$username = $_POST['username']; //in 'id' named input box data used by POST method

$sql = "SELECT * FROM tbl_users WHERE full_name = $username";

// Step 3: Execute the query
$result = $conn->query($sql);

// Step 4: Fetch the result and if fetched data more than 0 result
if ($result->num_rows > 0) {
    // Step 5: Process the fetched data
    while($row = $result->fetch_assoc()) {
        echo "<br>ID: " . $row["id"]. "<br> - Name: " . $row["full_name"]. "<br> - Email: " . $row["email"]." <br>- voter id: " . $row["voter_id"]. "<br><br><br>";
        // You can access other columns in a similar manner
    }
} else {
    echo "0 results";
}

// Step 6: Close the connection
$conn->close();
?>

    </div>
    
</body>
</html>


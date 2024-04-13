<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>voter update in process</h1>
<?php

    include('config.php');

    $conn = mysqli_connect($hostname, $username, $password, $database);	
    $id=$_GET['id'];
if(isset($_GET['id']))
{

$select= "select*from tbl_user where id=$id";
$result=mysqli_query($conn,$select);
$row=mysqli_fetch_array($result);
}
?>

<form action="" method="POST">
          <div class="form-group">
            <label>Voter's Name :</label><br>
            
            <input type="text" name="voterName" pattern="[A-Za-z]{6,}" title="Enter Your Full Name" placeholder="Enter Your Full Name" class="form-control" required/><br>

            <label>Voter's Registered Email ID :</label><br>
            <input type="text" name="voterEmail" placeholder="Enter Your Email ID" class="form-control"/><br>

            <label>Voter's Card No. :</label><br>
            <input id="id1" type="text" name="voterID" pattern="[0-9].{6,}" placeholder="Enter Your Voter Uniquie ID" class="form-control" required/><br>
            
            <h3 class="normalFont">Selet Any One of Them,</h3>
            <div class="radio">
              <label for="">
                <input type="radio" name="selectedCandidate" value="BJP"> <strong>Bhartiya Janta Party (BJP)</strong>
              </label><br>

              <label for="">
                <input type="radio" name="selectedCandidate" value="INC"> <strong>Congress (INC)</strong> 
              </label><br>
              
              <label for="">
                <input type="radio" name="selectedCandidate" value="AAP"> <strong>YSR Congress (YSRCP)</strong>
              </label><br>

              <label for="">
                <input type="radio" name="selectedCandidate" value="TMC"> <strong>JanaSena (JNS)</strong>
              </label><br>
              <br>
              <hr>
              <button type="submit" name="submit" class="btn btn-primary"><strong>Submit</strong></button>
              <button type="reset" class="btn btn-default">Decline</button>
            </div>
          </div>
          </form>

          <?php

//we already establish connection and checked it

                	$name= test_input($_POST["voterName"]);
                    $email= test_input($_POST["voterEmail"]);
                    $voterID= test_input($_POST["voterID"]);
                    $selection= test_input($_POST["selectedCandidate"]);

                $update= " UPDATE FROM tbl_user full_name= $name,email= $email,voter_id= $voterID,voted_for= $selection WHERE id=$id";
                $result=mysqli_query($conn,$update);
               if($result)
               {
                echo" updated successfully ";
               }
                else{
                    echo"something going wrong";
                }
          ?>
</body>
</html>
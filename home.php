<?php 
session_start();
include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <div style= "text-align: center; padding:15px;">
        <p style="font-size: 50px;" font-weight: bold;>
        Hello  <?php
        if(isset($_SESSION['email'])){
            $email=$_SESSION['email'];
            $query= mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
            while($row=mysqli_fetch_array($query)){
                echo $row['fname']." ".$row['lname'];
            }
        }
        ?>
        :)

        </p>

        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
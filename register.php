<?php
include 'connect.php';
if(isset($_POST['signUp'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

    $checkEmail="SELECT * FROM users WHERE email='$email'";
    $result=$conn->query($checkEmail);
    if($result->num_rows>0){
        echo "Email already exists";
        exit();
    }
    else{
        $insertQuery="INSERT INTO users (fname,lname,email,password) VALUES ('$fname','$lname','$email','$password')";
        if($conn->query($insertQuery)===TRUE){
            header('Location: index.php');
        }
        else{
            echo "Error: $conn->error";
    }  
    
    }
}

if (isset($_POST['signIn'])) {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

    $sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        session_start();
        $row=$result->fetch_assoc();
        $_SESSION['email']=$row['email'];
        header('Location: home.php');
        exit();
    }
    else{
        echo "Invalid email or password";
    }
    
}
?>
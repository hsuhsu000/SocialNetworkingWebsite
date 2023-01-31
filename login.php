<?php
session_start();
include("includes/connection.php");
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $user = "select * from users where user_email = '$email'";
    $query = mysqli_query($con,$user);
    while($row = mysqli_fetch_array($query)){
        $e_pass = $row['user_pass'];
        $hash = password_verify($pass, $e_pass);
    }
    if($hash){
        $_SESSION['user_email'] = $email;
        header("location: home.php");
    }else{
        echo "<script>alert('Your Email or Password is incorrect.Please Try again!')
        </script>";
    }
}
?>
<?php
session_start();
include("includes/connection.php");
if(isset($_POST['forgot'])){
    $email = $_POST['email'];
    $recover = $_POST['recover'];

    $user = "select * from users where user_email = '$email' AND
    recovery_account = '$recover' AND status='verified'";
    $query = mysqli_query($con,$user);
    $check_user = mysqli_num_rows($query);

    if($check_user == 1){
        $_SESSION['user_email'] = $email;
        header("location: update_password.php");
    }else{
        echo "<script>alert('Your answer is incorrect.Please Try again!')
        </script>";
    }
}
?>
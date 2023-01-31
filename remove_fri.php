<?php
$con = mysqli_connect("localhost","root","","social_networking_website");

if(isset($_GET['u_id'])){
    $user_id = $_GET['u_id'];
    $delete_fri = "delete from friends where friend_user_id='$user_id'";
    $run_delete = mysqli_query($con, $delete_fri);
    if($run_delete){
        echo "<script>alert('Your friend has been removed.')</script>";
        echo "<script>window.open('add_fri.php','_self')</script>";
    }
    
    $delete_fri2 = "delete from friends where user_id='$user_id'";
    $run_delete = mysqli_query($con, $delete_fri2);
    if($run_delete){
        echo "<script>alert('Your friend has been removed.')</script>";
        echo "<script>window.open('add_fri.php','_self')</script>";
    }
}
?>
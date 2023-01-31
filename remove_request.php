<?php
$con = mysqli_connect("localhost","root","","social_networking_website");

if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $delete_request = "delete from friend_request where sender_id='$user_id'";
    $run_delete = mysqli_query($con, $delete_request);
    if($run_delete){
        echo "<script>alert('The friend request has been removed.')</script>";
        echo "<script>window.open('accept_request.php','_self')</script>";
    }
}
?>
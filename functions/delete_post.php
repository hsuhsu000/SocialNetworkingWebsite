<?php
$con = mysqli_connect("localhost","root","","social_networking_website");

if(isset($_GET['post_id'])){
    $post_id = $_GET['post_id'];
    $delete_post = "delete from posts where post_id='$post_id'";
    $run_delete = mysqli_query($con, $delete_post);
    if($run_delete){
        echo "<script>alert('Your post has been deleted.')</script>";
        echo "<script>window.open('../view_profile.php', '_self')</script>";
    }
}
?>
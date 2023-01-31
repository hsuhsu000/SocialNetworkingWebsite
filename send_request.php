<!DOCTYPE html>
<?php
session_start();
include("includes/navigation.php");
?>
<html>
    <head>
        <?php
            $user = $_SESSION['user_email'];
            $get_user = "select * from users where user_email='$user'";
            $run_user = mysqli_query($con,$get_user);
            $result_user = mysqli_fetch_array($run_user);
            $user_name = $result_user['user_name'];
			$sender_id = $result_user['user_id'];        
            
        ?>
        <title>Request</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style/style.css">
    </head>
<body>
    <?php
    if(isset($_GET['user_id'])){
        $receiver_id = $_GET['user_id'];//add user id
        $get_receiver_name = "select * from users where user_id=$sender_id";
        $run_receiver = mysqli_query($con,$get_receiver_name);
        $row_receiver = mysqli_fetch_array($run_receiver);
        $receiver_name =  $row_receiver['user_name'];
        $receiver_image =  $row_receiver['user_image'];
        $receive_request = "insert into friend_request(receiver_id,sender_id,sender_name,sender_image)values('$receiver_id',
        '$sender_id','$receiver_name','$receiver_image')";
        $run_receive_request = mysqli_query($con,$receive_request);
        if($run_receive_request){
            echo "<script>alert('You sent a friend request!')</script>";
            echo "<script>window.open('search_fri.php','_parent')</script>";
        }     
    }
        
    ?>
</body>
</html>
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
			$user_id = $result_user['user_id'];        
            
        ?>
        <title>Friend Requests</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style/style.css">
    </head>
<body>
    <center><h3><strong>Friend Requests</strong></h3></center>
    <?php
    if(isset($_GET['user_id'])){
        $sender_id = $_GET['user_id'];
        $get_sender_name = "select * from users where user_id=$sender_id";
        $run_sender = mysqli_query($con,$get_sender_name);
        $row_sender = mysqli_fetch_array($run_sender);
        $sender_name =  $row_sender['user_name'];
        $sender_image =  $row_sender['user_image'];
        echo $sender_image;
        $accept_request = "insert into friend_request(receiver_id,sender_id,sender_name,sender_image)values('$receiver_id','$sender_id',
        '$sender_name','$sender_image')";
        $run_accept_request = mysqli_query($con,$accept_request);
        if($run_accept_request){
            echo "<script>alert('You accepted a friend request!')</script>";
            echo "<script>window.open('accept_request.php','_self')</script>";
        }     
    }

        $select_fri = "select * from friends where user_id='$user_id'";
        $run_fri = mysqli_query($con,$select_fri);

        global $fri_id;
        while($row = mysqli_fetch_array($run_fri)){
            $fri_id = $row['friend_user_id'];
        }

        $select = "select * from friend_request where receiver_id='$user_id'";
        $run_select = mysqli_query($con,$select);

        while($row = mysqli_fetch_array($run_select)){
            $sender_name = $row['sender_name'];
            $sender_image = $row['sender_image'];   
            $sender_id = $row['sender_id']; 

            if($fri_id != $sender_id){
                echo"
                <div class='row'>
                    <div class ='col-md-2'></div>

                    <div class='col-md-2'>
                    <a href='view_profile.php?u_id=$sender_id'>
                    <img src='profile_pic/$sender_image' class='img-circle' width='100px' height'100px'
                    ' style='float:left; ,margin:1px;'/>
                    </a>
                    </div><br><br>

                    <div class='col-md-3'>
                    <strong><h3 style='text-transform: capitalize;'>$sender_name</h3></strong>
                    </div>  

                    <div class='col-md-1'>
                    <a href='add_fri.php?user_id=$sender_id'>
                    <strong><button class='btn btn-info' type='' name='' id='add_friend'>
                    Confirm</button></strong>
                    </a>
                    </div>
                    
                    <div class='col-md-1'>
                    <a href='remove_request.php?user_id=$sender_id'>
                    <strong><button class='btn btn-info' type='' name='' id='add_friend'>
                    Decline</button></strong>
                    </a>
                    </div> 

                    <div class='col-md-1'>  
                    <a href='view_fri_profile.php?user_id=$sender_id'>
                    <strong><button class='btn btn-info' id='view_friend_profile'>
                    View profile</button></strong>
                    </a>
                    </div>      

                    <div class='col-md-3'></div>           
                </div><br> 
                ";
            }
            
    }
    ?>
</body>
</html>
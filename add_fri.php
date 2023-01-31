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
        <title>Friends</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style/style.css">
    </head>
<body>
    <center><h3><strong>Your Friend List</strong></h3></center>
    <?php
    // global $friend_user_id;
    if(isset($_GET['user_id'])){
        $friend_user_id = $_GET['user_id'];
        $get_fri_name = "select * from users where user_id=$friend_user_id";
        $run_friend = mysqli_query($con,$get_fri_name);
        $row_friend = mysqli_fetch_array($run_friend);
        $friend_name = $row_friend['user_name'];
        $friend_image = $row_friend['user_image'];
        echo $friend_image;
        $add_fri = "insert into friends(user_id,friend_user_id,friend_name,friend_image)values('$user_id','$friend_user_id',
        '$friend_name','$friend_image')";
        $run_add_fri = mysqli_query($con,$add_fri);
        if($run_add_fri){
            echo "<script>alert('You added a friend!')</script>";
            echo "<script>window.open('add_fri.php','_self')</script>";
        }     
    }
        $select = "select * from friends where user_id='$user_id'";
        $run_select = mysqli_query($con,$select);

        while($row = mysqli_fetch_array($run_select)){
            $friend_name = $row['friend_name'];
            $friend_image = $row['friend_image'];   
            $friend_user_id = $row['friend_user_id']; 
            echo"
                <div class='row'>
                    <div class ='col-md-2'></div>

                    <div class='col-md-2'>
                    <img src='profile_pic/$friend_image' class='img-circle' width='100px' height'100px'
                    ' style='float:left; ,margin:1px;'/>
                    </div><br><br>

                    <div class='col-md-3'>
                    <strong><h3 style='text-transform: capitalize;'>$friend_name</h3></strong>
                    </div>  

                    <div class='col-md-1'>
                    <a href='remove_fri.php?u_id=$friend_user_id'>
                    <strong><button class='btn btn-info' type='' name='' id='add_friend'>
                    UnFriend</button></strong>
                    </a>
                    </div> 

                    <div class='col-md-1'>  
                    <a href='view_fri_profile.php?user_id=$friend_user_id'>
                    <strong><button class='btn btn-info' id='view_friend_profile'>
                    View profile</button></strong>
                    </a>
                    </div>      

                    <div class='col-md-3'></div>           
                </div><br> 
                ";
    }
    $select = "select * from friends where friend_user_id='$user_id'";
    $run_select = mysqli_query($con,$select);

    while($row = mysqli_fetch_array($run_select)){
        $own_id = $row['user_id'];
        $user = "select * from users where user_id='$own_id'";
        $run_user = mysqli_query($con,$user);
        while($row2 = mysqli_fetch_array($run_user)){
            $friend_user_id = $row2['user_id'];
            $friend_name = $row2['user_name'];
            $friend_image = $row2['user_image'];
            echo"
                <div class='row'>
                    <div class ='col-md-2'></div>

                    <div class='col-md-2'>
                    <img src='profile_pic/$friend_image' class='img-circle' width='100px' height'100px'
                    ' style='float:left; ,margin:1px;'/>
                    </div><br><br>

                    <div class='col-md-3'>
                    <strong><h3 style='text-transform: capitalize;'>$friend_name</h3></strong>
                    </div>  

                    <div class='col-md-1'>
                    <a href='remove_fri.php?u_id=$friend_user_id'>
                    <strong><button class='btn btn-info' type='' name='' id='add_friend'>
                    UnFriend</button></strong>
                    </a>
                    </div> 

                    <div class='col-md-1'>  
                    <a href='view_fri_profile.php?user_id=$friend_user_id'>
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
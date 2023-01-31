<!DOCTYPE html>
<?php
session_start();
include("includes/navigation.php");
?>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <script src='main.js'></script>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link rel="stylesheet" type="text/css" href="style/chat.css">
</head>
<style>
#message-box{
    width: 100%;
}
</style>
<body>
    <div class="container">
        <div class="card chat-app">
            <div id="plist" class="people-list">         
                <ul class="list-unstyled chat-list mt-2 mb-0">
                <?php
                    $user = "select * from users";
                    $run_user = mysqli_query($con, $user);
                    while($row_user = mysqli_fetch_array($run_user)){
                        $user_id = $row_user['user_id'];
                        $user_name = $row_user['user_name'];
                        $first_name = $row_user['f_name'];
                        $last_name = $row_user['l_name'];
                        $user_image = $row_user['user_image'];
                        echo"
                            <div class='container-fluid'>
                                <a style='text-decoration: none;cursor:pointer;color:#3897F0;' href='chat.php?chat_id=$user_id'>
                                    <img class='img-circle' src='profile_pic/$user_image' width='80px' height='50px' title='$user_name'><strong>&nbsp $first_name $last_name</strong><br><br>
                                </a>
                            </div>
                        ";
                    }
                ?>
                </ul>
            </div>
            <div class="chat">
                <div class="chat-header clearfix">
                    <div class="row">  
                        <?php
                            if(isset($_GET['chat_id'])){
                                $chat_id = $_GET['chat_id'];
                                $user = "select * from users where user_id = $chat_id";
                                $run_user = mysqli_query($con, $user);
                                while($row_user = mysqli_fetch_array($run_user)){
                                    $user_id = $row_user['user_id'];
                                    $user_name = $row_user['user_name'];
                                    $first_name = $row_user['f_name'];
                                    $last_name = $row_user['l_name'];
                                    $user_image = $row_user['user_image'];
                                    echo"
                                        <div class='col-sm-6'>
                                            <a href='javascript:void(0);' data-toggle='modal' data-target='#view_info'>
                                                <img src='profile_pic/$user_image' alt='avatar'>
                                            </a>
                                            <div class='chat-about'>
                                                <h6 class='mb-0'>$first_name $last_name</h6>
                                            </div>
                                        </div>
                                    ";
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="chat-history">
                <?php
                global $receiver_msg;
                if(isset($_GET['chat_id'])){
                    global $con;
                    $get_id = $_GET['chat_id'];
                    $get_user = "select * from users where user_id='$get_id'";
                    $run_user = mysqli_query($con,$get_user);
                    $row_user = mysqli_fetch_array($run_user);
                    $receiver_msg = $row_user['user_id'];
                    $receiver_name = $row_user['user_name'];
                    // echo $receiver_name;
                }

                $user = $_SESSION['user_email'];
                $get_user = "select * from users where user_email='$user'";
                $run_user = mysqli_query($con,$get_user);
                $row = mysqli_fetch_array($run_user);
                $sender_msg = $row['user_id'];
                $sender_name = $row['user_name'];

				$sel_msg = "select * from messages where (receiver='$receiver_msg' AND sender='$sender_msg') OR 
                (sender='$receiver_msg' AND sender='$receiver_msg') ORDER by 1 ASC";
				$run_msg = mysqli_query($con, $sel_msg);

				while($row_msg = mysqli_fetch_array($run_msg)){
					$receiver = $row_msg['receiver'];
					$sender = $row_msg['sender'];
					$message = $row_msg['message'];
					$date = $row_msg['send_date'];
			    ?>
                    <ul class="mb-0">                            
                        <?php 
                            if($sender == $receiver_msg AND $receiver == $sender_msg){
                            echo "
                                <li class='clearfix'>
                                <div class='message other-message float-right'>$message</div>   
                                </li>
                            ";}
                            else if($receiver == $receiver_msg AND $sender == $sender_msg){
                            echo "
                                <li class='clearfix'>
                                <div class='message my-message'>$message</div>  
                                </li>
                            ";} 
                        ?>                              						
                <?php
                }
                ?>
                    </ul>
                </div>

                <div class="chat-message clearfix">
                    <div class="input-group mb-0">
                        <form action="" method="POST">
                            <input type="text" class="form-control" id="message-box" name="msg_box" placeholder="Enter text here...">  
                            <span class="input-group-text"><button id="send-btn" name="send"><i class="fa fa-send"></i></button></span> 
                        </form>                                 
                    </div>
                </div>

                <?php
				if(isset($_POST['send'])){
					$msg = htmlentities($_POST['msg_box']);
					
					$insert = "insert into messages(receiver,sender,message,send_date) values ('$receiver_msg','$sender_msg','$msg',NOW())";
					$run_insert = mysqli_query($con,$insert);
                    if($run_insert){
                        echo "<script>window.open('chat.php?chat_id=$user_id','_self')</script>";
                    }
				}
			    ?>
        </div>
    </div>
</body>
</html>
<?php
include("includes/connection.php");
include("functions/all_functions.php");

$user = $_SESSION['user_email'];
$get_user = "select * from users where user_email='$user'";
$run_user = mysqli_query($con,$get_user);
$result_user = mysqli_fetch_array($run_user);

$user_id = $result_user['user_id'];
$user_name = $result_user['user_name'];
$first_name = $result_user['f_name'];
$last_name = $result_user['l_name'];
$user_pass = $result_user['user_pass'];
$user_email = $result_user['user_email'];
$user_country = $result_user['user_country'];
$user_gender = $result_user['user_gender'];
$user_birthday = $result_user['user_birthday'];
$user_image = $result_user['user_image'];
$user_cover = $result_user['user_cover'];
$recovery_account = $result_user['recovery_account'];

$user_posts = "select * from posts where user_id='$user_id'";
$run_posts = mysqli_query($con,$user_posts);
$posts = mysqli_num_rows($run_posts);
?>

<html>
<head>
    <title>Home</title>
    <meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/style.css">
   
</head>
<style>

.navbar
{
font-size:20px;
background: linear-gradient(to right, #ddd6f3, #faaca8); 
}

</style>
<body>

<!-- LOGO -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h2 style='color:darkblue; font-weight:bold; font-family:Stencil Std;'>WeConnect</h2>
        </div>
        <div class="col-md-6">
            <div style="float:right; font-size:30px; padding-top:20px;">
                <a href="search_fri.php"><span class="glyphicon glyphicon-search"></span></a>
                <a href="chat.php?u_id="><span class="glyphicon glyphicon-comment"></span></a>
            </div>
            
        </div>
    </div>
</div>

<!-- Navigation bar -->
<div class="container-fluid" >
    <nav class="navbar" style='box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;'>
        <ul class="nav navbar-nav" style='font-weight:bold;'>
            <li><a href="view_profile.php?<?php echo 'u_id=$user_id';?>" style='color:black; text-transform:capitalize'>
            <?php echo"$first_name $last_name"; ?></a></li>
            <li><a href="home.php" style='color:black'>NewsFeed</a></li>
            <li><a href="add_fri.php" style='color:black'>Friends</a></li>
            <li><a href="accept_request.php" style='color:black'>Requests</a></li>
            <li><a href="view_profile.php" style='color:black'>View Profile</a></li>
            <li><a href="logout.php" style='color:black'>Logout</a></li>
        </ul>
    </nav>
</div>

</body>
</html>
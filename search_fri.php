<!DOCTYPE html>
<?php
session_start();
include("includes/navigation.php");
$user = $_SESSION['user_email'];
$get_user = "select * from users where user_email='$user'";
$run_user = mysqli_query($con,$get_user);
$result_user = mysqli_fetch_array($run_user);

$user_name = $result_user['user_name'];
$user_image = $result_user['user_image'];
?>

<html>
<head>
    <title>Search Friends</title>
    <meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/style.css">
   
</head>
<body>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form class="find_form" action="">		
                    <input type="text" class="form-control"  placeholder="Search Friend" name="find_user" id="find_user">
                    <button class="btn btn-info" type="submit" name="find_user_btn" id="find_user_btn">
                    Search</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div><br><br>
        <?php find_user(); ?>
    </div>
</div>
</body>
</html>
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
    <title>Home</title>
    <meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/style.css">
   
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <center>
                    <form action="home.php?id=<?php echo $user_id; ?>" method="post" enctype="multipart/form-data">
                        
                        <div class="col-md-2">
                        <p style="margin-left: 85px;"><img src='profile_pic/<?php echo $user_image; ?>' class='img-circle' width='58px'
                        height='58px'></p>
                        </div>
                        <div class="col-md-7">
                            <textarea class="form-control" rows="2" name="content" placeholder="What's in your mind?"></textarea>
                            
                        </div>
                        <div class="col-md-3" style="margin-top:2px;">
                            <label class="btn btn-warning" id="select_image">
                            Select Image
                            <input type="file" name="upload_image" size="40">
                            </label>
                        </div> 
                        <div class="col-md-12">
                            <button class="btn" name="post_btn" id="post_btn">
                                Post
                            </button>
                        </div> 
                    </form>
                <?php insertPost(); ?>
                </center>
            </div>
        </div>
    </div>
    
    <!-- NewsFeed -->
    <div class="row">
        <div class="col-md-12"  >
            <center><h2><strong>NewsFeed</strong></h2><br></center>
        
            <?php echo show_posts(); ?>
        </div>
        </div>
    </div>
</body>
</html>
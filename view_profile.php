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
        <title>ViewProfile</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style/style.css">
    </head>
    <style>
		#cover-img{
			height: 400px;
			width: 100%;
		}#profile-img{
			position: absolute;
			top: 140px;
			left: 40px;
		}
		#update_profile{
			cursor: pointer;
			margin-left: 80px;
			box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
			transition: all300ms ease;
			border-radius: 20px;
			background: linear-gradient(to right, #ddd6f3, #faaca8);
			transform: translate(-50%, -50%);
		}	
		#update_profile:hover{
			box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset,
			rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
			background: linear-gradient(to right, #ddd6f3, #faaca8);
		}
		#button_profile{
			top: 50px;
			margin-left: 75px;
			margin-top:5px;
			cursor: pointer;
			color:black; 
			box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
			transition: all300ms ease;
			border-radius: 20px;
			background: linear-gradient(to right, #ddd6f3, #faaca8);
			transform: translate(-50%, -50%);
		}
		#button_profile:hover{
			box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset,
			rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
			background: linear-gradient(to right, #ddd6f3, #faaca8);
		}
		#button_eprofile{
			top: 50px;
			margin-left: 92px;
			margin-top:10px;
			cursor: pointer;
			color:black; 
			box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
			transition: all300ms ease;
			border-radius: 20px;
			background: linear-gradient(to right, #ddd6f3, #faaca8);
			transform: translate(-50%, -50%);
		}
		#button_eprofile:hover{
			box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset,
			rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
			background: linear-gradient(to right, #ddd6f3, #faaca8);
		}
		#select_cover{
			position:absolute;
			top:10px;
			right:20px;
			margin-top: 5px;
			cursor: pointer;
			box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
			transition: all300ms ease;
			border-radius: 20px;
			background: linear-gradient(to right, #ddd6f3, #faaca8);
			transform: translate(-50%, -50%);
		}	
		#select_cover:hover{
			box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset,
			rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
			background: linear-gradient(to right, #ddd6f3, #faaca8);
		}
		#update_cover{
			position:absolute;
			top:40px;
			right:2px;
			color:black;
			cursor: pointer;
			box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
			transition: all300ms ease;
			border-radius: 20px;
			background: linear-gradient(to right, #ddd6f3, #faaca8);
			transform: translate(-50%, -50%);
		}
		#update_cover:hover{
			box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset,
			rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
			background: linear-gradient(to right, #ddd6f3, #faaca8);
		}
		#user-info{
			background-color: white;
			text-align: center;
			left: 0.8%; 
			border-style: solid; 
			border-radius: 5px; 
			border-color: black;
		}

    </style>
    <body>
        <div class="row">
        <div class="col-md-2">	
	    </div>
        <div class="col-md-8">
        <?php
			echo"
			<div>
				<div><img id='cover-img' class='img-rounded' src='cover/$user_cover' alt='cover'></div>
				<form action='view_profile.php' method='post' enctype='multipart/form-data'>

				<label id='select_cover'> Select Cover
				<input type='file' name='user_cover' size='60' />
				</label><br><br>
				<button id='update_cover' name='submit' class='btn btn-info'>Update Cover</button>
				</form>
			</div>
			<div id='profile-img'>
				<img src='profile_pic/$user_image' alt='Profile' class='img-circle' width='180px' height='185px'>
				<form action='view_profile.php?user_id='$user_id' method='post' enctype='multipart/form-data'>

				<label id='update_profile'> Select Profile
				<input type='file' name='user_image' size='60' />
				</label><br><br>
				<button id='button_profile' name='update' class='btn btn-info'>Update Profile</button>
				</form>
			</div><br>
			";
		?>
        <?php

			if(isset($_POST['submit'])){
				$user_cover = $_FILES['user_cover']['name'];
				$image_tmp = $_FILES['user_cover']['tmp_name'];

				if($user_cover==''){
					echo "<script>alert('Please Select Cover Image')</script>";
					echo "<script>window.open('view_profile.php?user_id=$user_id' , '_self')</script>";
					exit();
				}else{
					move_uploaded_file($image_tmp, "cover/$user_cover");
					$update = "update users set user_cover='$user_cover' where user_id='$user_id'";

					$run = mysqli_query($con, $update);

					if($run){
					echo "<script>alert('Your cover has been updated!')</script>";
					echo "<script>window.open('view_profile.php?user_id=$user_id' , '_self')</script>";
					}
				}

			}

		?>
        </div> 

        <?php
		    if(isset($_POST['update'])){

				$user_image = $_FILES['user_image']['name'];
				$image_tmp = $_FILES['user_image']['tmp_name'];

				if($user_image==''){
					echo "<script>alert('Please select image first!')</script>";
					echo "<script>window.open('view_profile.php?user_id=$user_id' , '_self')</script>";
					exit();
				}else{
					move_uploaded_file($image_tmp, "profile_pic/$user_image");
					$update = "update users set user_image='$user_image' where user_id='$user_id'";

					$run = mysqli_query($con, $update);

					if($run){
					echo "<script>alert('Your profile has been updated!')</script>";
					echo "<script>window.open('view_profile.php?user_id=$user_id' , '_self')</script>";
					}
				}

			}
	    ?>
        <div class="col-md-2">
	    </div>
    </div>
    <div class="row">
	<div class="col-md-2">
	</div>
	
	<div class="col-md-2" id="user-info">
		<?php
		echo"
			<center><h2><strong>About</strong></h2></center>
			<center><h4 style='text-transform: capitalize;'><strong>$first_name $last_name</strong></h4></center>
			<p><strong>Lives In: </strong> $user_country</p><br>
			<p><strong>Gender: </strong> $user_gender</p><br>
			<p><strong>Date of Birth: </strong> $user_birthday</p><br>
		";
		?>
	<a href= "edit_profile.php"><button id='button_eprofile' name='editpp' class='btn btn-info'>Edit Profile Info</button></a>

	</div>
	
	<div class="col-md-6">
		<!-- display posts -->
		<?php
		global $con;
		if(isset($_GET['u_id'])){
			$u_id = $_GET['u_id'];
		}
		$get_posts = "select * from posts where user_id='$user_id' ORDER by 1 DESC LIMIT 5";
		$run_posts = mysqli_query($con,$get_posts);
		while($result_posts = mysqli_fetch_array($run_posts)){
			$post_id = $result_posts['post_id'];
			$user_id = $result_posts['user_id'];
			$content = $result_posts['post_content'];
			$upload_image = $result_posts['upload_image'];
			$post_date = $result_posts['post_date'];
			$user = "select * from users where user_id='$user_id' AND posts='yes'";
			$run_user = mysqli_query($con,$user);
			$result_user = mysqli_fetch_array($run_user);
			$user_name = $result_user['user_name'];
            $f_name = $result_user['f_name'];
            $l_name = $result_user['l_name'];
			$user_image = $result_user['user_image'];

			if($content == "" && strlen($upload_image) >= 1){
				echo"
				<div id='post_item'>
					<div class='row'>
						<div class='col-md-2>
							<p><img src='users/$user_image' class='img-circle' width='100px'
							height='100px'></p>
						</div>
						<div class='col-md-6'>
							<h3 style='text-transform: capitalize;'><a style='text-decoration:none; color: black;'
							href='view_profile.php?user_id=$user_id'><strong><p>$f_name $l_name</p></strong></a></h3>
							<strong>$post_date</strong>
						</div>	
						<div class='col-md-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-md-12'>
							<img id='post_image' src='post_images/$upload_image'>
						</div>
					</div><br>
					<a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn 
					btn-danger'>Delete</button></a>
				</div><br><br>
				";
			}

			else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
				echo"
				<div id='post_item'>
					<div class='row'>
						<div class='col-md-2>
							<p><img src='users/$user_image' class='img-circle' width='100px'
							height='100px'></p>
						</div>
						<div class='col-md-6'>
							<h3 style='text-transform: capitalize;'><a style='text-decoration:none; color: black;'
							href='view_profile.php?user_id=$user_id'><strong><p>$f_name $l_name</p></strong></a></h3>
							<strong>$post_date</strong>
						</div>	
						<div class='col-md-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-md-12'>
							<h3><p>$content</p></h3>
							<img id='post_image' src='post_images/$upload_image' style='min-width: 100%; max-width: 50%;
							border: 1px solid black;'>
						</div>
					</div><br>
					<a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn 
					btn-danger'>Delete</button></a>
				</div><br><br>
				";
			}

			else{
				echo"
				<div id='post_item'>
					<div class='row'>
						
						<div class='col-md-6'>
							<h3 style='text-transform: capitalize; color: black;'><a style='text-decoration:none; color: black;'
							href='view_profile.php?u_id=$user_id'><strong>$f_name $l_name</strong></a></h3>
							<strong>$post_date</strong>
						</div>	
						
					</div>
					<div class='row'>
						
						<div class='col-md-6'>
							<h3><p>$content</p></h3>
						</div>
						
				</div>
				";

				global $con;
				if(isset($_GET['user_id'])){
					$user_id = $_GET['user_id'];
				}
				$get_posts = "select user_email from users where user_id='$user_id'";
				$run_user = mysqli_query($con,$get_posts);
				$result = mysqli_fetch_array($run_user);

				$user_email = $result['user_email'];

				$user = $_SESSION['user_email'];
				$get_user = "select * from users where user_email='$user'";
				$run_user = mysqli_query($con,$get_user);
				$result = mysqli_fetch_array($run_user);

				$user_id = $result['user_id'];
				$user_email = $result['user_email'];
				if($user_email != $user_email){
					echo "<script>window.open('view_profile.php?user_id=$user_id','_self')</script>";
				}else{
					echo"
					<a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn 
					btn-danger'>Delete</button></a>
					</div><br><br>
					";
				}
			}
			include("functions/delete_post.php");
		}

		?>
	</div>
	<div class='col-md-2'>
	</div>
    </div>
    </body>
</html>


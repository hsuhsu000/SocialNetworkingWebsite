<!DOCTYPE html>
<html>
    <head>
        <title>WeConnect</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="style/style.css">
    </head>
    <style>
	#signup{
		box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
		transition: all300ms ease;
		border-radius: 20px;
		background: linear-gradient(to right, #ddd6f3, #faaca8);
		width: 50%;
	}
	#signup:hover{
		box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset,
		rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
		background: linear-gradient(to right, #ddd6f3, #faaca8);
		width: 50%;
	}
	#login{
		box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
		transition: all300ms ease;
		border-radius: 20px;
		background: linear-gradient(to right, #ddd6f3, #faaca8);
		width: 50%;
	}
	#login:hover{
		box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset,
		rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
		background: linear-gradient(to right, #ddd6f3, #faaca8);
		width: 50%;
	}
</style>
    <body>
		<br>
       <div class="row">
			<div class="col-md-6" style="padding-left: 50px;">
				<img src="imgs/index.png" width='100%' height='90%'>
			</div>
			
			<div class="col-md-5" style="padding-left:50px;">
				<br><br><br><br><br><br><br><br>
				<center>
				<h2 style='color:darkblue; font-weight:bold; font-family:Stencil Std;'>WeConnect</h2>
				<br><h3>Welcome to WeConnect,<br> Join Our Community Today!</h3>,
				<form method="post" action="">
					<br>
					<button id="signup" class="btn btn-lg" name="signup">Sign up</button><br><br>
					<?php
					if(isset($_POST['signup'])){
						header('location: signup.php');
					}
					?>
					<button id="login" class="btn btn-lg" name="login">Login</button><br><br>
					<?php
					if(isset($_POST['login'])){
						header('location: signin.php');
					}
					?>
				</form>
				</center>
			</div>
        </div>
    </body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Signin</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<style>
	.main-content{
		width: 50%;
		height: 50%;
		margin: 10px auto;
		border: 2px solid #e6e6e6;
		padding: 40px 50px; 
		box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;    
	}
    #signup{
		box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
		transition: all300ms ease;
		border-radius: 20px;
		background: linear-gradient(to right, #ddd6f3, #faaca8);
		
	}
	#signup:hover{
		box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset,
		rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
		background: linear-gradient(to right, #ddd6f3, #faaca8);
		
	}
	#signin{
		box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
		transition: all300ms ease;
		border-radius: 20px;
		background: linear-gradient(to right, #ddd6f3, #faaca8);
		
	}
	#signin:hover{
		box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset,
		rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
		background: linear-gradient(to right, #ddd6f3, #faaca8);
		
	}
</style>
<body>
<div class="row">
	<div class="col-md-12">
		<div class="title">
		<br><br><br><br><br><br>
		<center><h2 style='color:darkblue; font-weight:bold; font-family:Stencil Std;'>
		You can Login Here!</h2></center><br>
		</div>
	</div>
</div> 

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="main-content">			
			<div class="l-part">
				<form action="" method="post">
					<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="email" name="email" placeholder="Email" required="required" class="form-control input-md"><br>
					</div><br>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" name="pass" placeholder="Password" required="required" class="form-control input-md"><br>
					</div>
					<center>
					<a style="text-decoration: none;float: right;color: #187FAB;" data-toggle="tooltip" title="" href="forgot.php">Forget Password</a><br><br>
					<button id="signin" class="btn btn-lg" name="login" style='margin-right:30px;'>Login</button>
                    <?php
                       include('login.php');
                    ?>
                    <button id="signup" class="btn btn-lg" name="signup"><a href="signup.php" style='text-decoration:none; color:black;'>SignUp<a></button>
                    <?php
                        if(isset($_POST['signup'])){
                            header("location: signup.php");
                        }
                    ?>	
					</center>				
				</form>
			</div>
	</div>
	<div class="col-md-2"></div>
</div>
</body>
</html>
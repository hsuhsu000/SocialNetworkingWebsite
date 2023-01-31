<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<style>
	.row{
		width: 100%;
		background-color: b4fbc5;
	}
	.main-content{
		margin: 10px auto;
		padding: 40px 50px;
	}
	#header{
		margin-top:50px;
        border: 10px #62f185; 
        border-style: outset;
        text-align:center;
		width:30%;
		margin-left: 35%;
	}
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

</style>
<body>

<div class="row">
		<div class="col-md-12" id="header">			
		<center><h2 style='color:darkblue; font-weight:bold; font-family:Stencil Std;'>
			Create an account!</h2></center>
		</div>
		<div class="col-md-12">
			<div class="main-content">
				<div class="col-md-6"><img src="imgs/signup.jpg" width=400px"></div>
				<div class="col-md-6">
				<form action="" method="post">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
						<input type="text" class="form-control" placeholder="First Name" name="first_name" required="required"
						value="<?php echo isset($_POST['first_name']) ? htmlspecialchars($_POST['first_name'], ENT_QUOTES) : ''; ?>">
					</div><br>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
						<input type="text" class="form-control" placeholder="Last Name" name="last_name" required="required"
						value="<?php echo isset($_POST['last_name']) ? htmlspecialchars($_POST['last_name'], ENT_QUOTES) : ''; ?>">
					</div><br>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input id="email" type="email" class="form-control" placeholder="Email" name="u_email" required="required"
						value="<?php echo isset($_POST['u_email']) ? htmlspecialchars($_POST['u_email'], ENT_QUOTES) : ''; ?>">
					</div><br>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input id="password" type="password" class="form-control" placeholder="Password" name="u_pass" required="required"
						value="<?php echo isset($_POST['u_pass']) ? htmlspecialchars($_POST['u_pass'], ENT_QUOTES) : ''; ?>">
						
					</div><br><p style="color: red;">Password should be at least 9 characters in length and should include at least one upper case letter, one number, and one special character.</p>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input id="pass_conf" type="password" class="form-control" placeholder="Confirm Password" name="u_passconf" required="required"
						value="<?php echo isset($_POST['u_passconf']) ? htmlspecialchars($_POST['u_passconf'], ENT_QUOTES) : ''; ?>">
					</div><br>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
						<select class="form-control" name="u_country" required="required" value="<?php echo isset($_POST['u_country']) ? htmlspecialchars($_POST['u_country'], ENT_QUOTES) : ''; ?>">
							<option disabled>Select your Country</option>
							<option>United States of America</option>
							<option>India</option>
							<option>Japan</option>
							<option>UK</option>
							<option>France</option>
							<option>Germany</option>
							<option>Myanmar</option>
						</select>
					</div><br>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
						<input type="date" class="form-control input-md" placeholder="Email" name="u_birthday" required="required"
						value="<?php echo isset($_POST['u_birthday']) ? htmlspecialchars($_POST['u_birthday'], ENT_QUOTES) : ''; ?>">
					</div><br>
					<div class="input-group" style="display: center;">
					
					<label class="radio-inline">
					<input type="radio" name="u_gender" checked value="male">Male
					</label>
					<label class="radio-inline" style="padding-left: 180px">
					<input type="radio" name="u_gender" value="female">Female
					</label>
					<label class="radio-inline float-end" style="padding-left: 170px;">
					<input type="radio" name="u_gender" value="other">Other
					</label>
					
					</div><br>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
						<select class="form-control" name="que" required="required" value="<?php echo isset($_POST['que']) ? htmlspecialchars($_POST['que'], ENT_QUOTES) : ''; ?>">
							<option disabled>Security Question</option>
							<option>What is your favorite color</option>
							<option>What is your favorite actor</option>
							<option>What is your favorite movies</option>
							<option>What is your favorite food</option>
							<option>What is your favorite cake</option>
							
						</select>

					</div><br>
					
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
						<input type="text" class="form-control" placeholder="answer" name="recovery_account" required="required"
						value="<?php echo isset($_POST['recovery_account']) ? htmlspecialchars($_POST['recovery_account'], ENT_QUOTES) : ''; ?>">
					</div><br>

					<a style="text-decoration: none;float: right;color: #187FAB;" data-toggle="tooltip" title="Signin" href="signin.php"> Already have an account? <b> Signin </b>Here!!</a><br><br>

					<center><button id="signup" class="btn btn-lg" name="sign_up">Signup</button></center>
					<?php include("insert_user.php"); ?>	
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>
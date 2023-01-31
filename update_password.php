<!DOCTYPE html>
<?php
session_start();
include("includes/connection.php");
$user = $_SESSION['user_email'];
$get_user = "select * from users where user_email='$user'";
$run_user = mysqli_query($con,$get_user);
$result_user = mysqli_fetch_array($run_user);

//$password = $result_user['user_pass'];
//$confirmpassword = $result_user['confirm_password'];



?>
<html>
<head>
	<title>update_password</title>
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
		width: 40%;
	}
	#signup:hover{
		box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset,
		rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
		background: linear-gradient(to right, #ddd6f3, #faaca8);
		width: 40%;
	}
	#signin{
		box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
		transition: all300ms ease;
		border-radius: 20px;
		background: linear-gradient(to right, #ddd6f3, #faaca8);
		width: 40%;
	}
	#signin:hover{
		box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset,
		rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
		background: linear-gradient(to right, #ddd6f3, #faaca8);
		width: 40%;
	}
	#confirm{
		box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
		transition: all300ms ease;
		border-radius: 20px;
		background: linear-gradient(to right, #ddd6f3, #faaca8);
		width: 40%;
	}
	#confirm:hover{
		box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset,
		rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
		background: linear-gradient(to right, #ddd6f3, #faaca8);
		width: 40%;
	}
    
</style>
<body>
<div class="row">
        <div class="col-md-12">
            <div class="title">
            <br><br><br><br><br><br>
			<center><h2 style='color:darkblue; font-weight:bold; font-family:Stencil Std;'>
			You can update your password here!</h2></center><br>
            </div>
        </div>
       </div> 

<div class="row">
	<div class="col-md-12">
		<div class="main-content">
			
			<div class="l-part">
				<form action="" method="post">
                <div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					<input id="password" type="password" class="form-control" placeholder="Password" name="u_pass" required="required">
				</div><br>
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					<input id="pass_conf" type="password" class="form-control" placeholder="Confirm Password" name="u_passconf" required="required">
				</div><br>
					<center>
					<button id="confirm" class="btn btn-lg" name="update" style='margin-right:30px;'>Confirm account</button>      
					</center>				
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>

<?php


if(isset($_POST['update']))
{
    $u_pass= htmlentities($_POST['u_pass']);
    $confirm = htmlentities($_POST['u_passconf']);
	$pwd_hash = password_hash($u_pass, PASSWORD_BCRYPT);
	$pwd_hash1 = password_hash($confirm, PASSWORD_BCRYPT);

    $update= "update users set user_pass='$pwd_hash', confirm_password='$pwd_hash1' where user_email='$user'" ;
      $run = mysqli_query($con,$update);
      if($run == 1 && $pwd_hash == $pwd_hash1)
      {
		echo "<script> alert('Entered password are same')</script>";
      }
      else
      {
		echo"<script>alert('Your Password is Updated')</script>";
        echo"<script>window.open('home.php','_self')</script>";
      }

      
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>forget password</title>
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
   
	
	#forgot{
		box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
		transition: all300ms ease;
		border-radius: 20px;
		background: linear-gradient(to right, #ddd6f3, #faaca8);
		width: 40%;
	}
	#forgot:hover{
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
			You Should fill correct answer!</h2></center><br>
            </div>
        </div>
       </div> 

<div class="row">
	<div class="col-md-12">
		<div class="main-content">
			
			<div class="l-part">
				<form action="" method="post">
                <div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="email" name="email" placeholder="Email" required="required" class="form-control input-md"><br>
					</div><br>
                <div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
						<select class="form-control" name="que" required="required">
							<option disabled>Security Question</option>
							<option>What is your favorite color</option>
							<option>What is your favorite actor</option>
							<option>What is your favorite movies</option>
							<option>UWhat is your favorite food</option>
							<option>What is your favorite cake</option>
							
						</select><br><br>

				</div><br>
				<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
						<input type="text" class="form-control" placeholder="answer" name="recover" required="required">
				</div><br>
					<center>
					
					<button id="forgot" class="btn btn-lg" name="forgot" style='margin-right:30px;'>recovery account</button>
                    <?php
                       include('recover_account.php');
                    ?>
                    
					</center>				
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>
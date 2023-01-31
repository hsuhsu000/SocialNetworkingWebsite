<!DOCTYPE html>
<?php
include("includes/connection.php");
global $get_user_id;
if(isset($_GET['post_id'])){
    global $con;
    $post_id = $_GET['post_id'];    
}
 
?>
<html>
<head>
	<title>Report</title>
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
    #report{
		box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
		transition: all300ms ease;
		border-radius: 20px;
		background: linear-gradient(to right, #ddd6f3, #faaca8);
		width: 40%;
	}
	#report:hover{
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
			You can Report here</h2></center><br>
            </div>
        </div>
       </div> 

<div class="row">
	<div class="col-md-12">
		<div class="main-content">
			
			<div class="l-part">
            <form action='report_add.php?post_id=<?php echo $post_id ?>' method='post' class='form-inline'>
                <div class="input-group" style="display: center;" name = "report">
					
                    <label class="radio-inline">
                    <input type="radio" name="u_report" value="Hateful & Abusive" >Hateful & Abusive
                    </label><br>
                    <label class="radio-inline">
                    <input type="radio" name="u_report" value="Captions issue">Captions issue
                    </label><br>
                    <label class="radio-inline">
                    <input type="radio" name="u_report" value="Misinformation">Misinformation
                    </label><br>
                    <label class="radio-inline">
                    <input type="radio" name="u_report" value="Spam or Misleading">Spam or Misleading
                    </label><br>
                    <label class="radio-inline">
                    <input type="radio" name="u_report" value="Bullying & Harrasment">Bullying & Harrasment 
                    </label><br>
                    <label class="radio-inline">
                    
                
                </div><br>
					<center>
					<button id="report" class="btn btn-info btn-lg" name="report" style='margin-right:30px;'>Report</button>
					</center>				
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>
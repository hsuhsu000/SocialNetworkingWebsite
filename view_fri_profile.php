<!DOCTYPE html>
<?php
session_start();
include("includes/navigation.php");
?>
<html>
    <head>
        <title>Friend Profile</title>
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
    <div>
	<div class="row">
        <div class="col-sm-2">	
	    </div>
        <div class="col-sm-8">
        <?php
		if(isset($_GET['user_id'])){
			$user_id = $_GET['user_id'];
			$get_user = "select * from users where user_id='$user_id'";
            $run_user = mysqli_query($con,$get_user);
			$result_user = mysqli_fetch_array($run_user);
			$user_cover = $result_user['user_cover'];
			$user_image = $result_user['user_image'];
		}
			echo"
			<div>
				<div><img id='cover-img' class='img-rounded' src='cover/$user_cover' alt='cover'></div>
			</div>
			<div id='profile-img'>
				<img src='profile_pic/$user_image' alt='Profile' class='img-circle' width='180px' height='185px'>
			</div><br>
			";
		?>
        <div class="col-sm-4">
	    </div>
    </div>
	</div>

    <div class="row">
	<div class="col-sm-2">
	</div>
	
	<div class="col-sm-2" id="user-info">
		<?php
		if(isset($_GET['user_id'])){
			$user_id = $_GET['user_id'];
			$get_user = "select * from users where user_id='$user_id'";
            $run_user = mysqli_query($con,$get_user);
			$result_user = mysqli_fetch_array($run_user);
			$first_name = $result_user['f_name'];
			$last_name = $result_user['l_name'];
			$user_country = $result_user['user_country'];
			$user_gender = $result_user['user_gender'];
			$user_birthday = $result_user['user_birthday'];
		}
		echo"
			<center><h2><strong>About</strong></h2></center>
			<center><h4 style='text-transform: capitalize;'><strong>$first_name $last_name</strong></h4></center>
			<p><strong>Lives In: </strong> $user_country</p><br>
			<p><strong>Gender: </strong> $user_gender</p><br>
			<p><strong>Date of Birth: </strong> $user_birthday</p><br>
		";
		?>

	</div>
	
	<div class="col-sm-6">
		<!-- display posts -->
		<?php
		global $con;
		if(isset($_GET['user_id'])){
			$user_id = $_GET['user_id'];

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
						<div class='col-sm-2>
							<p><img src='users/$user_image' class='img-circle' width='100px'
							height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3 style='text-transform: capitalize;'><a style='text-decoration:none; color: black;'
							href='view_fri_profile.php?user_id=$user_id'><strong><p>$f_name $l_name</p></strong></a></h3>
							<strong>$post_date</strong>
						</div>	
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<img id='post_image' src='post_images/$upload_image'>
						</div>
					</div><br>

					<div class='row'>
                        <div class='col-md-1'></div>
                        <div class='col-md-1' style='display:inline-block;white-space: nowrap;'>
                        <a href='functions/reaction.php?post_id=$post_id'>
                            <span class='glyphicon glyphicon-heart' id='reaction'></span>
                        </a>";

                        $select = "select * from reaction where post_id='$post_id'";
                        $query = mysqli_query($con, $select);
                        while($row = mysqli_fetch_array($query)){
                            $count = $row['count'];
                            echo $count;
                        }

                        echo "</div>
                        <div class='col-md-9' >  
                            <form action='view_fri_profile.php?post_id=$post_id' method='post' class='form-inline'>
                            <textarea placeholder='Write your comment here!' class='pb-cmnt-textarea'
                            name='comment' id='comment_box'></textarea>
                            <button class='btn btn-info pull-right' name='reply' id='comment_button'>Comment</button>
                            </form>     
                        </div> 
                        <div class='col-md-1'></div>                  
                    </div>

                    <div class='row'>
                        <div class='col-md-1'></div>
                        <div class='col-md-10'>";                           
                            include("show_comment.php");
                            $get_com = "select * from comments where post_id='$post_id' ORDER by 1 DESC";
                            $run_com = mysqli_query($con, $get_com);
                            while($row = mysqli_fetch_array($run_com)){
                                $com = $row['comment'];
                                $com_name = $row['comment_user'];
                                $date = $row['comment_date'];
                                echo"                                 
                                    <div class='panel panel-info'>
                                    <div class='panel-body'>
                                        <div>
                                            <h4><strong>$com_name:</strong>&nbsp;&nbsp;<span style='font-size:15px; float:right;'>$date</span></h4>
                                            <p style='font-size: 18px;'>$com</p>
                                        </div>
                                    </div>
                                    </div>          
                                ";
                            }
                        echo "</div>
                        <div class='col-md-1'></div>
                    </div><br>

				</div><br><br>
				";
			}

			else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
				echo"
				<div id='post_item'>
					<div class='row'>
						<div class='col-sm-2>
							<p><img src='users/$user_image' class='img-circle' width='100px'
							height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3 style='text-transform: capitalize;'><a style='text-decoration:none; color: black;'
							href='view_fri_profile.php?user_id=$user_id'><strong><p>$f_name $l_name</p></strong></a></h3>
							<strong>$post_date</strong>
						</div>	
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<h3><p>$content</p></h3>
							<img id='post_image' src='post_images/$upload_image' style='min-width: 100%; max-width: 50%;
							border: 1px solid black;'>
						</div>
					</div><br>

					<div class='row'>
                        <div class='col-md-1'></div>
                        <div class='col-md-1' style='display:inline-block;white-space: nowrap;'>
                        <a href='functions/reaction.php?post_id=$post_id'>
                            <span class='glyphicon glyphicon-heart' id='reaction'></span>
                        </a>";

                        $select = "select * from reaction where post_id='$post_id'";
                        $query = mysqli_query($con, $select);
                        while($row = mysqli_fetch_array($query)){
                            $count = $row['count'];
                            echo $count;
                        }

                        echo "</div>
                        <div class='col-md-9' >  
                            <form action='view_fri_profile.php?post_id=$post_id' method='post' class='form-inline'>
                            <textarea placeholder='Write your comment here!' class='pb-cmnt-textarea'
                            name='comment' id='comment_box'></textarea>
                            <button class='btn btn-info pull-right' name='reply' id='comment_button'>Comment</button>
                            </form>     
                        </div> 
                        <div class='col-md-1'></div>                  
                    </div>

                    <div class='row'>
                        <div class='col-md-1'></div>
                        <div class='col-md-10'>";                           
                            include("show_comment.php");
                            $get_com = "select * from comments where post_id='$post_id' ORDER by 1 DESC";
                            $run_com = mysqli_query($con, $get_com);
                            while($row = mysqli_fetch_array($run_com)){
                                $com = $row['comment'];
                                $com_name = $row['comment_user'];
                                $date = $row['comment_date'];
                                echo"                                 
                                    <div class='panel panel-info'>
                                    <div class='panel-body'>
                                        <div>
                                            <h4><strong>$com_name:</strong>&nbsp;&nbsp;<span style='font-size:15px; float:right;'>$date</span></h4>
                                            <p style='font-size: 18px;'>$com</p>
                                        </div>
                                    </div>
                                    </div>          
                                ";
                            }
                        echo "</div>
                        <div class='col-md-1'></div>
                    </div><br>
				</div><br><br>
				";
			}

			else{
				echo"
				<div id='post_item'>
					<div class='row'>
						
						<div class='col-sm-6'>
							<h3 style='text-transform: capitalize; color: black;'><a style='text-decoration:none; color: black;'
							href='view_fri_profile.php?u_id=$user_id'><strong>$f_name $l_name</strong></a></h3>
							<strong>$post_date</strong>
						</div>	
						
					</div>
					<div class='row'>
						
						<div class='col-sm-6'>
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
					<div class='row'>
                        <div class='col-md-1'></div>
                        <div class='col-md-1' style='display:inline-block;white-space: nowrap;'>
                        <a href='functions/reaction.php?post_id=$post_id'>
                            <span class='glyphicon glyphicon-heart' id='reaction'></span>
                        </a>";

                        $select = "select * from reaction where post_id='$post_id'";
                        $query = mysqli_query($con, $select);
                        while($row = mysqli_fetch_array($query)){
                            $count = $row['count'];
                            echo $count;
                        }

                        echo "</div>
                        <div class='col-md-9' >  
                            <form action='view_fri_profile.php?post_id=$post_id' method='post' class='form-inline'>
                            <textarea placeholder='Write your comment here!' class='pb-cmnt-textarea'
                            name='comment' id='comment_box'></textarea>
                            <button class='btn btn-info pull-right' name='reply' id='comment_button'>Comment</button>
                            </form>     
                        </div> 
                        <div class='col-md-1'></div>                  
                    </div>

					<div class='row'>
						<div class='col-md-1'></div>
						<div class='col-md-10'>";                           
							include("show_comment.php");
							$get_com = "select * from comments where post_id='$post_id' ORDER by 1 DESC";
							$run_com = mysqli_query($con, $get_com);
							while($row = mysqli_fetch_array($run_com)){
								$com = $row['comment'];
								$com_name = $row['comment_user'];
								$date = $row['comment_date'];
								echo"                                 
									<div class='panel panel-info'>
									<div class='panel-body'>
										<div>
											<h4><strong>$com_name:</strong>&nbsp;&nbsp;<span style='font-size:15px; float:right;'>$date</span></h4>
											<p style='font-size: 18px;'>$com</p>
										</div>
									</div>
									</div>          
								";
							}
						echo "</div>
						<div class='col-md-1'></div>
					</div><br>
					</div><br><br>
					";
				}
			}
		}

		?>
	</div>
	<div class='col-sm-2'>
	</div>
    </div>
    </body>
</html>


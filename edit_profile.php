<!DOCTYPE html>
<?php
session_start();
include("includes/navigation.php");
$user = $_SESSION['user_email'];
$get_user = "select * from users where user_email='$user'";
$run_user = mysqli_query($con,$get_user);
$result_user = mysqli_fetch_array($run_user);

$firstname = $result_user['f_name'];
$lastname = $result_user['l_name'];
$username = $result_user['user_name'];
$password = $result_user['user_pass'];
$user_gender = $result_user['user_gender'];
?>
<html>
    <head>
        <title>Edit Account Setting</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style/style.css">
    </head>
    <body>
        <div class = "row">
            <div class = "col-sm-2"></div>
            <div class="col-sm-8">
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="table table-bordered table-hover">
                        <tr align = "center">
                            <td colspan="6" class="active"><h2>Edit Your Profile</h2></td>
                        </tr>
                        <tr>
                            <td style-"font-weight:bold;">Change Your Firstname</td>
                            <td>
                                <input class= "form-control" type="text" name="f_name" required value="<?php echo $firstname; ?>"> 
                            </td>
                        </tr>
                        <tr>
                            <td style-"font-weight:bold;">Change Your Lastname</td>
                            <td>
                                <input class= "form-control" type="text" name="l_name" required value="<?php echo $lastname; ?>"> 
                            </td>
                        </tr
                        <tr>
                            <td style-"font-weight:bold;">Change Your Username</td>
                            <td>
                                <input class= "form-control" type="text" name="u_name" required value="<?php echo $username; ?>"> 
                            </td>
                        </tr>
                        <tr>
                            <td style-"font-weight:bold;">Email</td>
                            <td>
                                <input class= "form-control" type="text" name="u_email" required value="<?php echo $user_email; ?>"> 
                            </td>
                        </tr>
                        <tr>
                            <td style-"font-weight:bold;">Password</td>
                            <td>
                                <input class= "form-control" type="password" name="u_pass" id="mypass" required value="<?php echo $user_pass; ?>"> 
                                <!-- <input type= "checkbox" onclick="show_password()"><strong>Show Password</strong> -->
                            </td>
                        </tr>
                        <tr>
                            <td style-"font-weight:bold;">Country</td>
                            <td>
                                <select class ="form-control" name="u_country">
                                    <option><?php echo $user_country; ?></option>
                                    <option>United States of America</option>
							        <option>India</option>
							        <option>Japan</option>
							        <option>UK</option>
							        <option>France</option>
							        <option>Germany</option>
							        <option>Myanmar</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style-"font-weight:bold;">Gender</td>
                            <td>
                                <select class ="form-control" name="u_gender">
                                    <option><?php echo $user_gender; ?></option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style-"font-weight:bold;">Birthday</td>
                            <td>
                                <input class= "form-control" type="date" name="u_birthday" required value="<?php echo $user_birthday; ?>"> 
                            </td>
                        </tr>
                     
                        <tr align="center">
                            <td colspan="6">
                                <input type="submit" id="update" class="btn btn-info" name="update" style="width:250px;" value="Update">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
<div class="col-sm-2" ></div>
    </body>
</html>
<?php
if(isset($_POST['update']))
{
    $f_name= htmlentities($_POST['f_name']);
    $l_name= htmlentities($_POST['l_name']);
    $u_name= htmlentities($_POST['u_name']);
    $u_pass= htmlentities($_POST['u_pass']);
    $u_email= htmlentities($_POST['u_email']);
    $u_country= htmlentities($_POST['u_country']);
    $u_gender= htmlentities($_POST['u_gender']);
    $u_birthday= htmlentities($_POST['u_birthday']);

    $update= "update users set f_name='$f_name',l_name='$l_name', user_name='$u_name',
     user_pass='$u_pass', user_email='$u_email', user_country='$u_country',
      user_gender='$u_gender', user_birthday='$u_birthday' where user_id='$user_id'" ;

      $run = mysqli_query($con,$update);

      if($run)
      {
        echo"<script>alert('Your Profile is Updated')</script>";
        echo"<script>window.open('view_profile.php','_self')</script>";
      }
}
?>



    
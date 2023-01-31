<?php
include("includes/connection.php");
    
    if(isset($_POST['sign_up'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $pass = $_POST['u_pass'];
        $pass_conf = $_POST['u_passconf'];
        $email = $_POST['u_email'];
        $country = $_POST['u_country'];
        $gender = $_POST['u_gender'];
        $birthday = $_POST['u_birthday'];
        $status = "verified";
        $posts = "no";
        $recovery = $_POST['recovery_account'];


        $username = strtolower($first_name." ".$last_name);
        $check_username_query = "select user_name from users where user_email='$email'";
        $run_username = mysqli_query($con,$check_username_query);

        $uppercase = preg_match('@[A-Z]@', $pass);
        $lowercase = preg_match('@[a-z]@', $pass);
        $number    = preg_match('@[0-9]@', $pass);
        $specialChars = preg_match('@[^\w]@', $pass);
        $pwd_hash = password_hash($pass, PASSWORD_BCRYPT);
        $pwd_hash = password_hash($pass_conf, PASSWORD_BCRYPT);
        


        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) < 9){
            echo "<script> alert('Password should be at least 9 characters in length and should include at least one upper case letter, one number, and one special character.')</script>";
            
            
        }
        else{
            echo "<script>'Strong password.'</script>";
            if($pwd_hash != $pwd_hash){
                echo "<script> alert('Entered password are same')</script>";
                
            }
    
            $check_email = "select * from users where user_email='$email'";
            $run_email = mysqli_query($con,$check_email);
    
            $check = mysqli_num_rows($run_email);
    
            if($check == 1){
                echo "<script>alert('Email already exist, Please try using another email')</script>";
                echo "<script>window.open('signup.php','_self')</script>";
                exit();
            }
    
            if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $email)) {
                echo "<script>alert('Your email is a valid email address')</script>";
            }
            else
            {
                echo "<script>alert('Your email is NOT a valid email address')</script>";
            }
            
                
    
            $rand = rand(1, 3); //Random number between 1 and 3
                if($rand == 1)
                    $profile_pic = "p1.png";
                else if($rand == 2)
                    $profile_pic = "p2.png";
                else if($rand == 3)
                    $profile_pic = "p3.png";
                
            $insert = "insert into users(f_name,l_name,user_name,user_pass,confirm_password,user_email,
            user_country,user_gender,user_birthday,user_image,user_cover,status,posts,recovery_account)
            values('$first_name','$last_name','$username','$pwd_hash','$pwd_hash',
            '$email','$country','$gender','$birthday','$profile_pic','default-cover.jpg','$status','$posts','$recovery')";
            $query = mysqli_query($con,$insert);
    
            if($query){
                echo "<script>alert('Well Done $first_name, now you can explore WeConnect website!')</script>";
                echo "<script>window.open('signin.php','_self')</script>";
            }
            else{
                echo "<script>alert('Registration failed, please try again!')</script>";
                echo "<script>window.open('signup.php','_self')</script>";
            }
        }
    

        }


        
   
?>
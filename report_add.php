<?php
include("includes/connection.php");
global $get_user_id;
if(isset($_GET['post_id'])){
    global $con;
        $get_post_id = $_GET['post_id'];
        $user = "select * from posts where post_id='$get_post_id'";
        $query = mysqli_query($con,$user);
        while($row = mysqli_fetch_array($query)){
            $get_user_id = $row['user_id'];
        }
        // $row = mysqli_fetch_array($user);
        $report = $_POST['u_report'];
        $insert = "insert into report(post_id,user_id,report_sen)
                values('$get_post_id','$get_user_id','$report')";
        $query = mysqli_query($con,$insert);

        if($query){
            echo "<script>alert('Your report is submit')</script>";
            echo "<script>window.open('home.php','_self')</script>";
        }
        else{
             echo "<script>alert('error')</script>";
        }
        

}
    

        


        
   
?>
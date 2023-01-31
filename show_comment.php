<?php
 global $get_post_id;
    if(isset($_GET['post_id'])){
        global $con;
       
        $get_post_id = $_GET['post_id'];
        $posts = "select * from posts where post_id='$get_post_id'";
        $run_posts = mysqli_query($con,$posts);
        $result_posts = mysqli_fetch_array($run_posts);
        // $user_id = $result_posts['post_id'];
    
        $user_comment = $_SESSION['user_email'];
        $commenter = "select * from users where user_email='$user_comment'";
        $run_commenter = mysqli_query($con,$commenter);
        $result_commenter = mysqli_fetch_array($run_commenter);
        $commenter_id = $result_commenter['user_id'];
        $commenter_name = $result_commenter['user_name']; 
       
    }
    

    if(isset($_POST['reply'])){
        $comment = htmlentities($_POST['comment']);
    
        if($comment == ""){
            echo "<script>alert('Enter your comment!')</script>";
            echo "<script>window.open('view_fri_profile.php')</script>";
        }else{
            $insert = "insert into comments (post_id,user_id,comment,comment_user,comment_date)values
            ('$get_post_id','$commenter_id','$comment','$commenter_name',NOW())";
    
            $run = mysqli_query($con, $insert);
            echo "<script>alert('Your comment Added!')</script>";
            echo "<script>window.open('view_fri_profile.php','_self')</script>";
        }
    }
       
?>
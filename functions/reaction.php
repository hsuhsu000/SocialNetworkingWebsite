<?php
    $con = mysqli_connect("localhost","root","","social_networking_website");
    if(isset($_GET['post_id'])){
        global $con;
        global $pid;
        $post_id = $_GET['post_id'];
        // $count = 0;
        $select = "select * from reaction where post_id='$post_id'";
        $query = mysqli_query($con, $select);
        $row = mysqli_fetch_array($query);
        if(mysqli_num_rows($query) > 0){//data exist >> insert and select
            $pid = $row['post_id'];
            if($post_id != $pid){
                $insert = "insert into reaction(post_id) values($post_id)";    
                $query = mysqli_query($con,$insert);   
                 
                $select = "select * from reaction where post_id='$post_id'";
                $query = mysqli_query($con, $select);
                $row = mysqli_fetch_array($query);
                $countt = $row['count'] + 1;
                $update = "update reaction set count='$countt' where post_id='$post_id'";
                $query = mysqli_query($con,$update);
                
                if($query){
                    echo "<script>window.open('../home.php','_self')</script>";
                    exit();
                }
                
            }
            else{
                $select = "select * from reaction where post_id='$post_id'";
                $query = mysqli_query($con, $select);
                $row = mysqli_fetch_array($query);
                $countt = $row['count'] + 1;
                $update = "update reaction set count='$countt' where post_id='$post_id'";
                $query = mysqli_query($con,$update);

                if($query){
                    echo "<script>window.open('../home.php','_self')</script>";
                    exit();
                }
            }
        }
        else{
            $insert = "insert into reaction(post_id) values($post_id)";    
                $query = mysqli_query($con,$insert);   
                 
                $select = "select * from reaction where post_id='$post_id'";
                $query = mysqli_query($con, $select);
                $row = mysqli_fetch_array($query);
                $countt = $row['count'] + 1;
                $update = "update reaction set count='$countt' where post_id='$post_id'";
                $query = mysqli_query($con,$update);
                
                if($query){
                    echo "<script>window.open('../home.php','_self')</script>";
                    exit();
                }
        }
        
    }

    

?>
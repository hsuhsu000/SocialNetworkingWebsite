<?php

$con = mysqli_connect("localhost","root","","social_networking_website") 
or die("Connection was not established");

function insertPost(){
    if(isset($_POST['post_btn'])){
        global $con;
        global $user_id;

        $content = $_POST['content'];
        $upload_image = $_FILES['upload_image']['name'];
		$image_tmp = $_FILES['upload_image']['tmp_name'];
        echo $upload_image;
        echo $content;
        if(strlen($content) > 250){
			echo "<script>alert('Please Use no more than 250 words!')</script>";
			echo "<script>window.open('home.php', '_self')</script>";
		}
        else{
            if(strlen($upload_image) >=1 && strlen($content) >=1){
                move_uploaded_file($image_tmp, "post_images/$upload_image");
                $insert_post = "insert into posts (user_id,post_content,upload_image,post_date)
                values('$user_id','$content','$upload_image',NOW())";

                $result = mysqli_query($con, $insert_post);
                if($result){
                    echo "<script>alert('You uploaded a post!')</script>";
                    echo "<script>window.open('home.php', '_self')</script>";

                    $update_post = "update users set posts='yes' where user_id='$user_id'";
                    $update_result = mysqli_query($con, $update_post);
                }
                exit();
            }
            else{
                if($upload_image == '' && $content == ''){
                    echo "<script>alert('Error uploading!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";
                }
                else{
                    if($content == ''){
                        move_uploaded_file($image_tmp, "post_images/$upload_image");
                        $insert_post = "insert into posts (user_id,post_content,upload_image,post_date)
                        values('$user_id','','$upload_image',NOW())";

                        $result = mysqli_query($con, $insert_post);
                        if($result){
                            echo "<script>alert('You uploaded a post!')</script>";
                            echo "<script>window.open('home.php', '_self')</script>";

                            $update_post = "update users set posts='yes' where user_id='$user_id'";
                            $update_result = mysqli_query($con, $update_post);
                        }
                        exit();
                    }
                    else{
                        move_uploaded_file($image_tmp, "post_images/$upload_image");
                        $insert_post = "insert into posts (user_id,post_content,upload_image,post_date)
                        values('$user_id','$content','$upload_image',NOW())";

                        $result = mysqli_query($con, $insert_post);
                        if($result){
                            echo "<script>alert('You uploaded a post!')</script>";
                            echo "<script>window.open('home.php', '_self')</script>";

                            $update_post = "update users set posts='yes' where user_id='$user_id'";
                            $update_result = mysqli_query($con, $update_post);
                        }
                       
                    }
                }
            }

        }
        
    }
}


function show_posts(){
    global $con;
    //page reached by page visitor
    

    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];  
    } 

    $limit_post = 5;  
    $first_page = ($page-1) * $limit_post;
    
    $show_posts = "select * from posts ORDER by 1 DESC LIMIT $first_page, $limit_post";
    $result_posts = mysqli_query($con,$show_posts);
    while($posts = mysqli_fetch_array($result_posts)){
        $post_id = $posts['post_id'];
        $user_id = $posts['user_id'];
        $content = substr($posts['post_content'],0,40);
        $upload_image = $posts['upload_image'];
        $post_date = $posts['post_date'];

        $get_user = "select * from users where user_id='$user_id' AND
        posts='yes'";
        $run_user = mysqli_query($con,$get_user);
        $result_user = mysqli_fetch_array($run_user);
        $first_name = $result_user['f_name'];
        $last_name = $result_user['l_name'];
        $user_image = $result_user['user_image'];

        if(strlen($content) >= 1 && strlen($upload_image) >= 1){
            echo"
            <div class='row'>
                <div class='col-md-3'></div>
                <div class='col-md-6' id='post_item'>
                    <div class='row'>
                        <div class='col-md-1'></div>
                        <div class='col-md-2'>
                            <p><img src='profile_pic/$user_image' class='img-circle'
                            width='55px' height='55px'></p>
                        </div>
                        <div class='col-md-9'>
                            <span style='text-transform: capitalize; font-size: 20px;'><strong>$first_name $last_name</strong><br>
                            </span>$post_date
                            <form action='report.php?post_id=$post_id' method='POST'>
                            <button id='comment_button' class='btn btn-info pull-right' name='report' >
                            Report</button>
                            </form>
                        </div>
                    </div>
                    
                    <div class='row'>
                        <div class='col-md-1'></div>
                        <div class='col-md-10'>
                            <p>$content</p>
                            <img id='post_image' src='post_images/$upload_image'>
                        </div>
                        <div class='col-md-1'></div>
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
                            <form action='home.php?post_id=$post_id' method='post' class='form-inline'>
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
                </div><br>
                <div class='col-md-3'></div>
            </div><br><br>
            ";
        }
        else if($content == '' && strlen($upload_image) >=1){
            echo"
            <div class='row'>
                <div class='col-md-3'></div>
                <div class='col-md-6' id='post_item'>
                    <div class='row'>
                        <div class='col-md-1'></div>
                        <div class='col-md-2'>
                            <p><img src='profile_pic/$user_image' class='img-circle'
                            width='55px' height='55px'></p>
                        </div>
                        <div class='col-md-9'>
                            <span style='text-transform: capitalize; font-size: 20px;'><strong>$first_name $last_name</strong><br>
                            </span>$post_date
                            <form action='report.php?post_id=$post_id' method='POST'>
                            <button id='comment_button' class='btn btn-info pull-right' name='report' >
                            Report</button>
                            </form>
                        </div>
                    </div>
                    
                    <div class='row'>
                        <div class='col-md-1'></div>
                        <div class='col-md-10'>          
                            <img id='post_image' src='post_images/$upload_image'>
                        </div>
                        <div class='col-md-1'></div>
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
                            <form action='home.php?post_id=$post_id' method='post' class='form-inline'>
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
                   
                </div><br>
                <div class='col-md-3'></div>
            </div><br><br>
            ";
        }
        else{
            echo"
            <div class='row'>
                <div class='col-md-3'></div>
                <div class='col-md-6' id='post_item'>
                    <div class='row'>
                        <div class='col-md-1'></div>
                        <div class='col-md-2'>
                            <p><img src='profile_pic/$user_image' class='img-circle'
                            width='55px' height='55px'></p>
                        </div>
                        <div class='col-md-9'>
                            <span style='text-transform: capitalize; font-size: 20px;'><strong>$first_name $last_name</strong><br>
                            </span>$post_date
                            <form action='report.php?post_id=$post_id' method='POST'>
                            <button id='comment_button' class='btn btn-info pull-right' name='report' >
                            Report</button>
                            </form>
                        </div>
                    </div>
                    
                    <div class='row'>
                        <div class='col-md-1'></div>
                        <div class='col-md-10'>
                            <p>$content</p>
                        </div>
                        <div class='col-md-1'></div>
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
                            <form action='home.php?post_id=$post_id' method='post' class='form-inline'>
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
                    
                </div><br>
                <div class='col-md-3'></div>
            </div><br><br>
            ";
        }
        
        
    }
      
    //pagination
    $query = "select * from posts";
    $result = mysqli_query($con,$query);
    $number_of_post = mysqli_num_rows($result);
    $number_of_page = ceil($number_of_post / $limit_post);
    echo"
    <center>
    <nav aria-label='Page navigation'>
    <ul class='pagination' id='pagination'>
        <li><a href='home.php?page=1'>1</a></li>";

    for ($i=2; $i<=$number_of_page; $i++){
        echo "<li><a href='home.php?page=$i'>$i</a></li>";
    }

}


function find_user(){
    global $con;

    if (isset($_GET['find_user_btn'])) {
        $search = htmlentities($_GET['find_user']);
        $get = "select * from users where f_name like '%$search%' OR
        l_name like '%$search%' OR user_name like '%$search%'";
    }
    else{
        $user = $_SESSION['user_email'];
        $get = "select * from users where user_email != '$user'";
    }
    $run =mysqli_query($con, $get);

    while ($row=mysqli_fetch_array($run)){
        $userid = $row['user_id'];
        $firstname =$row['f_name'];
        $lastname =$row['l_name'];
        $username = $row['user_name'];
        $userimage =$row['user_image'];

        echo"
        <div class='row'>
            <div class ='col-md-2'></div>

            <div class='col-md-2'>
            <a href='view_profile.php?u_id=$userid'>
            <img src='profile_pic/$userimage' class='img-circle' width='150px' height'140px'
            title='$username' style='float:left; ,margin:1px;'/>
            </a>
            </div><br><br>

            <div class='col-md-3'>
            <strong><h3>$firstname $lastname</h3></strong>
            </div>  

            <div class='col-md-1'>
            <a href='send_request.php?user_id=$userid'>
            <strong><button class='btn btn-info' type='' name='' id='add_friend'>
            Add Friend</button></strong>
            </a>
            </div> 

            <div class='col-md-1'>  
            <a href='view_fri_profile.php?user_id=$userid'>
            <strong><button class='btn btn-info' id='view_friend_profile'>
            View profile</button></strong>
            </a>
            </div>    

            <div class='col-md-3'></div>           

        </div><br> 
        ";

    }

    $user = $_SESSION['user_email'];
    $get1 = "select * from users where user_email = '$user'";
    $run =mysqli_query($con, $get1);
    global $u_id;
    while ($row=mysqli_fetch_array($run)){
        $u_id = $row['user_id'];
    }
    $select = "select * from friends where user_id=$u_id";
    $select_run = mysqli_query($con,$select);
    global $fri_id;
    while ($row=mysqli_fetch_array($select_run)){
        $fri_id = $row['friend_user_id'];
    }

    $select = "select * from friend_request where receiver_id='$u_id'";
    $run_select = mysqli_query($con,$select);
    global $sender_id;
    while($row = mysqli_fetch_array($run_select)){
        $sender_name = $row['sender_name'];
        $sender_image = $row['sender_image'];   
        $sender_id = $row['sender_id']; 

    }

    $select = "select * from users where user_id='$fri_id'";
    $runn = mysqli_query($con,$select);
    while($row = mysqli_fetch_array($runn)){
        $sender_name = $row['user_name'];
        $sender_image = $row['user_image'];   
        $sender_id = $row['user_id'];
        
        
        echo"
        <div class='row'>
            <div class ='col-md-2'></div>

            <div class='col-md-2'>
            <a href='view_profile.php?u_id=$sender_id'>
            <img src='profile_pic/$sender_image' class='img-circle' width='150px' height'140px'
            title='$sender_name' style='float:left; ,margin:1px;'/>
            </a>
            </div><br><br>

            <div class='col-md-3'>
            <strong><h3>$sender_name</h3></strong>
            </div>  

            <div class='col-md-1'>
            <a href='send_request.php?user_id=$sender_id'>
            <strong><button class='btn btn-info' type='' name='' id='add_friend'>
            Add Friend</button></strong>
            </a>
            </div> 

            <div class='col-md-1'>  
            <a href='view_fri_profile.php?user_id=$sender_id'>
            <strong><button class='btn btn-info' id='view_friend_profile'>
            View profile</button></strong>
            </a>
            </div>    

            <div class='col-md-3'></div>           

        </div><br> 
        ";
    }
    
}

?>
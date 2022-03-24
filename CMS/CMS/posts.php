<?php include "includes/header.php";?>





  



<!-- Page Content -->
    

            <!-- Blog Entries  -->
            <div >
<section id="field1">
     
                         
               
               
<?php
    
    
    if(isset($_GET['p_id'])){
        
        $get_post_id = $_GET['p_id'];
    }
  
    
//    Fetching data from 'posts' table and dynamically applying to blog posts
    
//                $query = "SELECT * FROM posts WHERE post_id = {$get_post_id}";
    
                $query = "SELECT posts.post_id, posts.post_title, posts.post_user, posts.post_date, posts.post_image, posts.post_content, ";
        $query .= "posts.post_author, users.username ";
        $query .= " FROM posts ";
        $query .= " LEFT JOIN users ON posts.post_user = users.user_id WHERE post_id = {$get_post_id}";
    
    
    
    
                $select_all_posts = mysqli_query($connection, $query);
    
    while($post_row = mysqli_fetch_assoc($select_all_posts)){
        $post_title = $post_row['post_title'];
        $post_author = $post_row['username'];
        $post_date = date('d.m.Y', strtotime($post_row['post_date']));
        $post_content = $post_row['post_content'];
        $post_image = $post_row['post_image'];
        
?>
        
                
                <br>
                <br>
                <br>
                <br>
                <br>
                <!-- Blog Posts -->
                <h2>
                    <p id="title_t"> <?php echo $post_title ?></p>
                </h2>
                <p id="title_a" class="lead">by: <span id="title_a_a"><?php echo $post_author ?></span>
                    
                </p>
<p id="title_d"><span id="title_d_d">Date:&nbsp;</span><?php echo $post_date ?></p>
                
                <img class="img-post" src="images/<?php if(!empty($post_image)){
            
                echo $post_image;
                } else {
                          echo "../dImage/default_image.jpg";                 
                        }                   
                ?>">
                
                <div id="title_c"><?php echo $post_content ?></div>
                
                
        
        
<!--    end the while loop      -->
  <?php  }  ?>
 
                <hr>

                
             </section>
            </div>
     
            <!-- Blog Sidebar  -->
<div>
<?php include "includes/sidebar.php"?>

   </div>        
<?php include "includes/footer.php";?> 



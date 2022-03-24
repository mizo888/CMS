
<!-- Page Header -->

<?php include "includes/admin_header.php";?>






    

            <!-- Blog Entries  -->
            <div >
<section id="field1">
               
               
               
               <?php
    
   
                if(isset($_POST['submit'])){
                    
                   $search = $_POST['search'];
                    
                    
                    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                    $search_query = mysqli_query($connection, $query);
                    
                    
                    
                    if(!$search_query){
                        die("Search failed" . mysqli_error($connection));
                                    
                    }
                    $count = mysqli_num_rows($search_query);
                    if($count == 0){
                        echo "No Results --- try these tags: first, second";
                    }else{
                        
//    Fetching data from 'posts' table and dynamically applying to blog posts   
                
    
    while($post_row = mysqli_fetch_assoc($search_query)){
        $post_title = $post_row['post_title'];
        $post_author = $post_row['post_author'];
        $post_date = $post_row['post_date'];
        $post_content = $post_row['post_content'];
        
        
//        If character numbers are greater than 150 only show 150
//        if (strlen($post_content) >  150)
//   $post_content = substr($post_content, 0, 147) . '...';
        
        ?>
        
        <h1 class="page-header">
                    
                    <small></small>
                </h1>

                <!-- Blog Posts -->
                <h2>
                    <a ><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a ><?php echo $post_author ?></a>
                </p>
                <p><span class=""></span><?php echo $post_date ?></p>
                <hr>
                <img class="img-post" src="../images/road-with-yellow-lines_1112-907.jpg" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
<!--                <a class="button2" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>-->
                
                <hr>
        
        
<!--    end the while loop      -->
  <?php  }  
                    }
                    
                    }
                
    ?>       
                

                <hr>

                <!-- Pager -->
<!--
                <ul class="pager">
                    <li class="previous">
                        <a href="#">Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer</a>
                    </li>
                </ul>
-->
             </section>
            </div>
            
            
            

        
<div>
       <?php include "includes/sidebar.php"?>

   </div>
       

        

    
<?php include "includes/footer.php";?> 



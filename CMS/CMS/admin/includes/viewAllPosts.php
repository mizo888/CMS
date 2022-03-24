<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Document</title>
    
<!--    Java script code to add pop up for delete post-->
    
    <script language="javascript" type="text/javascript">

    function getConfirmation()
    {
        var retVal = confirm("Are you sure you want to delete this post ?");
        if (retVal == true)
        {
            
            return true;
        } 
        else
        {
            
            return false;
        }
    }
</script>
    
    
</head>
<body>
 
   
</body>
</html>
<div style="margin-top: 100px;">
<h3 id="h3" style="font-family: Arial, Helvetica, sans-serif;">Blog posts list</h3>
<!--   deleting posts-->
<?php
if(isset($_GET['delete'])){

    if(isset($_SESSION['password'])){
        
    if($_SESSION['role'] == 'admin'){      // stopping mysql injection unless user has admin role
    
    
    $post_delete = $_GET['delete'];
    
    $query = "DELETE FROM posts WHERE post_id = {$post_delete} ";
    $delete_query = mysqli_query($connection, $query);
//    header("Location:postOptionsTable.php");
    header( "refresh:0.1;postOptionsTable.php" );
     
    }
    
    }
    
    
    }
?>

   
   
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Author id</th>
            <th>Title</th>
            <th>Date</th>
<!--            <th>Tags</th>-->
            <th style="text-align: center;">Actions</th>
<!--            <th>Delete</th>-->
        </tr>
    </thead>
    
    
<!--       Selecting all from 'posts' table and aplying it to rows in our table-->
             
    <?php
        
        
//        $query = "SELECT * FROM posts ORDER by post_id DESC";
        $query = "SELECT posts.post_id, posts.post_title, posts.post_user, posts.post_date, posts.post_image, posts.post_content, ";
        $query .= "posts.post_author, users.username ";
        $query .= " FROM posts ";
        $query .= " LEFT JOIN users ON posts.post_user = users.user_id ORDER BY posts.post_date DESC ";
        
        
        $select_posts = mysqli_query($connection, $query);
        
        while($row = mysqli_fetch_assoc($select_posts)){
           $post_id = $row['post_id']; 
            $post_author = $row['username'];     // LEFT JOIN
            $post_title = $row['post_title'];         
           $post_user = $row['post_user'];
//           $post_user = $row['post_user'];
           $post_date = date('d.m.Y', strtotime($row['post_date']));
//           $post_date = $row['post_date'];
//           $post_tags = $row['post_tags'];
 

        
        echo "<tr>";
        ?>    
        <?php  
            
            echo "<td>$post_id </td>";


//        if(!empty($post_author)) {

             echo "<td>$post_author</td>";


//        } elseif(!empty($post_user)) {
//
            echo "<td>$post_user</td>";
//
//
//        }


         
                
                
                
                
            
            echo "<td>{$post_title}</td>";
            
            
            
            
            
            
            echo "<td>{$post_date}</td>";
//            echo "<td>{$post_tags}</td>";
            echo "<td style='text-align: center;'><a class='material-icons' href='postOptionsTable.php?source=edit_post&p_id={$post_id}'>edit</a>  <a class='material-icons' onclick=\"return getConfirmation();\" href='postOptionsTable.php?delete={$post_id}'>delete</a></td>"; // echoing update button on each row so we can access update page
            
            
            
//            echo "<td><a onclick=\"return getConfirmation();\" href='postOptionsTable.php?delete={$post_id}'>delete</a></td>"; // echoing delete button on each row. Using delete button will delete posts from database by id.
            
            
                        
        echo "</tr>";
      
        }
        
        ?>
   

    
</table>
</div>






<!--Deleting posts query-->








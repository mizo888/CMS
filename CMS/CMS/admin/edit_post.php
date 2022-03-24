
<?php
if(isset($_POST['update_post'])){
   header( "Location:postOptionsTable.php" );
    }
  
?>
<!-- If cancel is pressed, redirect-->
<?php
if(isset($_POST['cancel'])){
   header( "Location:postOptionsTable.php ");
    }
  
?>


<?php





//Query to get post p_id from viewAllPosts to be updated and edited

if(isset($_GET['p_id'])){
    
$get_post_id = $_GET['p_id'];
    
    
}
//Query to display post contents in the edit post form

$query = "SELECT * FROM posts WHERE post_id = $get_post_id ";
        $select_posts_by_id = mysqli_query($connection, $query);
        
        while($row = mysqli_fetch_assoc($select_posts_by_id)){
           $post_id = $row['post_id'];          
           $post_author = $row['post_author'];
           $post_title = $row['post_title'];
//           $post_date = $row['post_date'];
           $post_date = date('d.m.Y', strtotime($row['post_date']));          
           $post_tags = $row['post_tags'];
           $post_content = $row['post_content'];
           $post_image = $row['post_image'];

        }

if(isset($_POST['update_post'])){   // set new values
    
    $post_title = escape ($_POST['title']);
//    $post_author = $_POST['author'];
//    $post_tags = $_POST['post_tags'];
    $post_content = escape ($_POST['post_content']);
    $post_date = escape ($_POST['date']);
    $format_date = escape (date("Y.m.d", strtotime($post_date)));
    $post_image = escape ($_FILES['image']['name']);
    $post_image_temp = escape ($_FILES['image']['tmp_name']);
    
    
    move_uploaded_file($post_image_temp, "../images/$post_image" );
    
    if(empty($post_image)) {
        
        $query = "SELECT * FROM posts ";
        $select_image = mysqli_query($connection,$query);
            
        while($row = mysqli_fetch_array($select_image)) {
            
           $post_image = $row['post_image'];
        
        }
      
}
    
   
    
    $query = "UPDATE posts SET ";    // Query to update values in edit post form
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_date = '{$format_date}', ";
//    $query .= "post_author = '{$post_author}', ";
//    $query .= "post_tags = '{$post_tags}', ";
    $query .= "post_image = '{$post_image}', ";
    $query .= "post_content = '{$post_content}' ";
    $query .= "WHERE post_id = '{$get_post_id}' ";
    
    $result = mysqli_query($connection, $query);
    
}
//if(isset($_POST['remove_image']))
//$path = '../images/$post_image';
//if (is_file($path)) {
//    unlink($path);
//}


?>
 
<!--<section style="margin-top: 0px;">-->

 
 <!-- Form for updating posts-->
 <div style="margin-top: 80px;">
 <form autocomplete="off" class="font" action="" method="post" enctype="multipart/form-data">
  <div class="add_post_form"> 
   <h4 id="h4" class="font">Update blog post</h4> 
    <label class="l_cl" for="title">Title</label>
    <input onkeydown="return event.key != 'Enter';" value="<?php echo $post_title; ?>" type="text" id="fname" name="title" placeholder="Title ..">
  
    <label class="l_cl" for="post_content">Content</label>
    <textarea id="size" name="post_content" placeholder="Write .." style="height:330px" cols="30" rows="10"><?php echo $post_content; ?></textarea>
    
</div>
  <div class="add_post_form_date">
   <label class="l_cl" for="date">Date</label>
   <input onkeydown="return event.key != 'Enter';" value="<?php echo $post_date; ?>" type="text" name="date" id="my_date_picker" placeholder="dd.mm.yy">
  </div>   
<label class="label_e" for="">Featured image</label>
<div id="reload">
 <img class="d_s" id="output" src="../images/<?php echo $post_image; ?>"/>
 </div> 
<div class="add_post_form_image">
 <label class="img_file" for="file" style="cursor: pointer;" id="rem">New image</label>
 <input onkeydown="return event.key != 'Enter';" type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;">    
<a class="img_rem" id="removeImage" href="#" name="remove_image">Remove image</a>
</div>
 


<!--used for redirecting an image to <img> tag instead loading an image next to input type=file-->
<script> 
var loadFile = function(event) {           
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};
</script>
    
<div class="add_post_form_publish">
    <input onkeydown="return event.key != 'Enter';" onclick="history.go(-1)" class="btn_pub" type="submit" value="Cancel" name="cancel">
    <input onkeydown="return event.key != 'Enter';" onclick="javascript: preventDefault();" id="u_post" type="submit" value="Update post" name="update_post">    
</div> 

</form>
</div>
<!--</section>-->
<script>
    
    //used for removing image in edit_post page
   
   $("#removeImage").click(function(e) {
   e.preventDefault(); // prevent default action of link
   $('#output').attr('src', ""); //clear image src
   $("#file").val(""); // clear image input value

 });

</script>
 
 
<!--DATE PICKER-->
<script type="text/javascript">
    $(function () {
        $('#my_date_picker').datepicker({ dateFormat: 'dd.mm.yy' });
    });
</script>
 
<!--
 $id = $_GET['imageid'];
    if(isset($_POST['remove_image'])){
        $image = "SELECT * FROM posts WHERE post_id = '$id' ";
        $query = mysqli_query($connection,$query);
        $after = mysqli_fetch_assoc($query);
        }
    
    if ($after['image'] != 'default.png') {
        unlink('../images/'.$after['image']);
    }
$delete = "DELETE FROM posts WHERE post_id = $id ";
    $query = mysqli_query($connection, $delete);
-->

<?php include "includes/admin_header.php";?>
<?php include "includes/functions.php";?>



<?php
if(isset($_POST['create_post'])){
   header( "refresh:0.1;postOptionsTable.php" );
    }
  
?>







<?php
   
//Query to insert data into add posts form
   if(isset($_POST['create_post'])) {
   

//            $name=time();
            $post_title = escape ($_POST['title']);
            $post_author = escape ($_POST['author']);
            $post_user = escape ($_POST['post_user']);
            $post_content = escape ($_POST['post_content']);  
            $post_date = escape ($_POST['date']);
//            $result = explode('-', $post_date);
//            $date = $result[2];
//            $month = $result[1];
//            $year = $result[0];
//            echo $new = $date.'-'.$month.'-'.$year;
            $format_date = escape (date('Y.m.d', strtotime($post_date)));
            $post_image = ($_FILES['image']['name']);
            $post_image_temp = ($_FILES['image']['tmp_name']);
       
       
            move_uploaded_file($post_image_temp, "../images/$post_image" );
       
       
    
       
       $query = "INSERT INTO posts(post_title, post_date, post_user, post_author, post_image, post_content) ";
       $query .= "VALUES('{$post_title}', '{$format_date}', '{$post_user}', '{$post_author}', '{$post_image}','{$post_content}' ) ";

       $create_post_query = mysqli_query($connection, $query);
       
       
   }



?>



<!--<body>-->
    



<div style="margin-top: 80px;">

                   <!--addPost form-->

<form autocomplete="off"  class="font" action="" method="post" enctype="multipart/form-data">
 
  <div class="add_post_form"> 
      <h4 id="h4" class="font">New blog post</h4>
    <label class="l_cl" for="title">Title</label>
    <span style="color:red;">*</span>
    <input onkeydown="return event.key != 'Enter';" type="text" id="fname" name="title" placeholder="Title .." required>
  
    <label class="l_cl" for="post_content">Content</label>
    <span style="color:red;">*</span>
    <div>
    <textarea  id="size" name="post_content" placeholder="Write .." style="height:330px" cols="30" rows="10" required></textarea>
    </div>
    
    
<!--
    <div>
      <label for="users">Users</label>  
       <select name="post_user" id=""> 
-->
    
    
<?php


        
//    $query = "SELECT * FROM users ";
////    $query = "SELECT * FROM users WHERE user_id = '53' ";
////    $query = "SELECT UserID FROM User WHERE Username = ".$_SESSION['username'].";";
//    $select_users = mysqli_query($connection, $query);
//    
//    while($row = mysqli_fetch_assoc($select_users)){
//    
//    
//   $user_id = $row['user_id'];
////   $username = $row['username'];
//       
//    echo "<option value='$user_id'>{$user_id}</option>";
////    echo "<input style='display: none' name='post_user' type='text' value='$user_id'>";   
//}

?>
    
<!--        Displaying current user id from posts table ---post_user--- row based on session-->
   <input type="text" name="post_user" value="<?php echo $_SESSION['user_id']; ?>" style="display: none">
    

   
   
   
    
<!--
    </select>
</div>
-->

    
  <!--        Displaying author name in blogs based on session-->

<input type="text" id="fname" name="author" value="<?php echo $_SESSION['username']; ?>" placeholder="author" required style="display: none">  

</div>
 
  
    
    
<!--
    <div class="add_post_form_date">
   <label class="l_cl" for="date" >Date</label>
   <input type="date" name="date" placeholder="" required>
  </div>   
-->

<div class="add_post_form_date">
   <label class="l_cl" for="date">Date</label>
   <span style="color:red;">*</span>
   <input onkeydown="return event.key != 'Enter';" type="text" id="my_date_picker" name="date" placeholder="dd.mm.yy" required>
   
  </div> 


<!--onfocus="(this.type='date')"-->


<!--onerror='this.style.display = "none"'-->

<div id="reload">
<!--<div class="abc"></div>-->

 <img label="sdsd" class="d_s" id="output" />
 
 </div> 
<label class="label" for="">Featured image</label>
<div class="add_post_form_image">
 <label  class="img_file" for="file" style="cursor: pointer;" id="rem">Select image</label>
 <input onkeydown="return event.key != 'Enter';"  type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;">    

<a class="img_rem" id="removeImage" href="#">Remove image</a>
</div>

    

<!-- used for showing an image-->
<script>
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};
</script>
    
<div class="add_post_form_publish" id="input-icons">
    <input onkeydown="return event.key != 'Enter';" class="btn_pub" onclick="history.go(-1)" type="submit" value="Cancel" name="cancel">
    <i class="fa fa-pencil"></i>
    <input onclick="return getConfirmation()" onkeydown="return event.key != 'Enter';" class="input-field" id="u_post" type="submit" value="Publish post" name="create_post" >    
</div> 

</form>
</div>
<!--
</div>
</body>
-->
<script>
    
    //used for removing image in addPost page
   
   $("#removeImage").click(function(e) {
   e.preventDefault(); // prevent default action of link
   $('#output').attr('src', ""); //clear image src
   $("#file").val(""); // clear image input value

 });

    
//    <!--DATE PICKER-->
    
</script>
<script type="text/javascript">
    $(function () {
        $('#my_date_picker').datepicker({ dateFormat: 'dd.mm.yy' });
    });
</script>

  
<!--  upload default image-->
  
<script>
 $('img').on('error', function sd(){
      $(this).attr('src', '../dImage/default_image.jpg');
  });       
</script>

<script language="javascript" type="text/javascript">

    function getConfirmation()
    {
        var retVal = confirm("Are you sure you want to publish this post ?");
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



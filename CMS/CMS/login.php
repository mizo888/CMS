<?php include "includes/db.php";?>
<?php session_start(); ?>
<?php
//error_reporting(0);
?>

<?php



if(isset($_POST['login'])){
                                    // Getting data from login page
    
  $username = $_POST['username'];
  $password = $_POST['password'];                  
//  $user_id = $_POST['user_id']; 
    
    if(!empty($username) && !empty($password)){

  $username = mysqli_real_escape_string($connection, $username );
  $password = mysqli_real_escape_string($connection, $password );
//  $user_id = mysqli_real_escape_string($connection, $user_id );

  $query = "SELECT * FROM users WHERE username = '{$username}' ";
  $select_user_query = mysqli_query($connection, $query);
    
  if(mysqli_num_rows($select_user_query) != 0)
  
  {

    while($row = mysqli_fetch_array($select_user_query)){         //Looping through table of users
    
$db_id = $row['user_id'];
$db_username = $row['username'];
$db_password = $row['password'];
$db_role = $row['role'];
    
}
//    $password = crypt($password, $db_password);

//if($username === $db_username && $password === $db_password){   //Redirecting users based on their credentials
if(password_verify($password, $db_password)){   //Redirecting users based on their credentials
    
    $_SESSION['username'] = $db_username;
    $_SESSION['password'] = $db_password;
    $_SESSION['role'] = $db_role;
    $_SESSION['user_id'] = $db_id;
    
    header("Location: ./admin ");    
}

         
  }
    else {  
    $l_message = "Invalid username or password!";  
    }


} else {  
    $l_message = "* Fields are required!";  
}
} else { $l_message = "";}

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    
<link rel="stylesheet" href="css/css.css" type="text/css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>





<body class="login_bgrnd">
    

  
    

<div class="login_form">
  <form action="" method="post">
    <span class="v_span"><?php echo $l_message; ?></span>
    <br>
    <br>
    <br>
    <label class="cl_c" for="username">Username</label>
    <span style="color:red;">*</span>
    <input  type="text" id="" name="username" placeholder="username ..">
    


    <label class="cl_c" for="password">Password</label>
    <span style="color:red;">*</span>
    <input  type="password" id="" name="password" placeholder="password ..">

      <button class="btn_login" type="submit" name="login">Proceed to login</button>
  </form>
</div>
    
   
</body>
</html>



<!--
 if(!$select_user_query){
        
        die ("failed" . mysqli_error($connection));
    }-->




<!--
//if($username === $db_username && $password === $db_password){   //Redirecting users based on their credentials
if(password_verify($password, $db_password)){   //Redirecting users based on their credentials
    
    $_SESSION['username'] = $db_username;
    $_SESSION['password'] = $db_password;
    $_SESSION['role'] = $db_role;
    $_SESSION['user_id'] = $db_id;
    
    header("Location: ./admin ");    
}

         
  }
    else {  
    $l_message = "Invalid username or password!";  
    }


} else {  
    $l_message = "* Fields are required!";  
}
} else { $l_message = "";}
-->

<?php

function escape($string) {

global $connection;

return mysqli_real_escape_string($connection, trim($string));


}

?>






<?php
//
//function loginUser($username, $password){
//    
//  global $connection;  
//    
//    
//  $query = "SELECT * FROM users WHERE username = '{$username}' ";
//    
//    $select_user_query = mysqli_query($connection, $query);
//    
//    if(!$select_user_query){
//        
//        die("FAILED" . mysqli_error($connection));
//    }
// 
//    
//    while($row = mysqli_fetch_array($select_user_query, MYSQLI_ASSOC)) {
//        
//        $db_id = $row['user_id'];
//        $db_username = $row['username'];
//        $db_password = $row['password'];
//        $db_role = $row['role'];
//        
//    }
//    
//    
//    if(password_verify($password, $db_password)){
//        
//        $_SESSION['username'] = $db_username;
//        $_SESSION['password'] = $db_password;
//        $_SESSION['role'] = $db_role;
//        $_SESSION['user_id'] = $db_id;
//        
//        
//        echo "Logged in";
//        
//        header("Location: ../../admin/ ");
//    }
//    
//    else {
//        
//        
//        echo "Failed to login";
//        
//        header("Location: ../index.php/ ");
//    }
//    
//  
//    
//}
//
//
//
//
//
//
//function showLoginFormErrors($form_errors){
//    
//    global $connection;
//    
//    foreach($form_errors as $err_msg){
//        
//        echo "$err_msg";
//    }
//    
//    
//    
//    
//}

?>



















<?php
//function redirect($location){
//
//
//  return header("Location:" . $location);
//
//}
?>
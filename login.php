<?php
 session_start();
 //get database connection
  include("includes/database.php");
  
if($_SERVER["REQUEST_METHOD"]=="POST"){
  //user email or username
  $user_email = $_POST["user"];
  
  //check if the user entered an emal address
  if(filter_var($user_email,FILTER_VALIDATE_EMAIL)){
    
    // if true, user entered an email
    $query = "SELECT * FROM accounts WHERE email='$user_email'";
  }
  else{
    //if false, user enter a username
     $query = "SELECT * FROM accounts WHERE username='$user_email'";
  }
  
  $password = $_POST["password"];
 
 //construct query with email variable
   // $query = "SELECT * FROM accounts WHERE email='$email'";
 
   //create array to store errors
  $errors = array();
  
  //run query
  $userdata = $connection->query($query);
  
  //check the result
  if($userdata->num_rows > 0){
    $user = $userdata->fetch_assoc();
    
    if(password_verify($password,$user["password"])===false){
      $errors["account"] = "email or password incorrect";
    }
    else{
      $message = "You have been logged in";
      $username = $user["username"];
      $_SESSION["username"] = $username;
      $email = $user["email"];
      $_SESSION["email"] = $email;
      //create account id as a session variable
      $account_id = $user["id"];
       $_SESSION["id"] = $account_id;
    }
  }
  else{
    $errors["account"] = "there is no user with the supplied credentials";
  }
}

//print_r($errors);
//echo "<br>$message";
?>
<!doctype html>
<html>
  <head>
    <?php
$page_title = "Login to your Account";
include("includes/head.php");
?>
</head>
    <body>
      <?php include("includes/navigation.php"); ?>
     <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form id="login-form" action="login.php" method="post">
            <h1>Login to your account</h1>
            <div class="form-group">
              <label for="user">Email Address</label>
              <input class="form-control" type="text" id="user" name="user" placeholder="you@email.com or email address">
            </div>
            <div class="form-group">
              <label for="password">Your Password</label>
              <input class="form-control" type="password" id="password" name="password" placeholder="your password">
            </div>
            
            
            <p>Don't have an account? <a href="register.php">Sign-up</a></button>
                      </p>
            <div class="text-center">
              <button type="submit" name="submit" value="login" class="btn btn-info">Login</button>
            </div>
           </form>
           <?php
          if(count($errors) > 0 || $message){
            //see which class to be used with alert
            if(count($errors) > 0){ 
              $class="alert-warning";
              $feedback = implode(" ",$errors);
            }
            if($message){
              $class="alert-success";
              $feedback = $message;
            }
            echo "<div class=\"alert $class\">
              $feedback
            </div>";
          }
          ?>
          
         </div>
       </div>
     </div>
    </body>
</html>
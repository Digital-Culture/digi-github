<?php
include("database.php");
//query to create an account
$username = "jane88";
$email = "jane88@gmail.com";
$password = password_hash("password",PASSWORD_DEFAULT);
$account_query = "INSERT INTO accounts (username,email,password,status,created) VALUES('$username','$email','$password',1,NOW())";
//run the query
$result = $connection->query($account_query);
if(!$result){
  echo "account creation failed";
}
?>

<!doctype html>
<html>
   <?php 
   $page_title = "Home Page";
   include("/includes/head.php");
   ?>
    <body>
        <div class="container">
            <div class="row">
            <div class="col-md-6 col-sm-6">
                <h2><i class="fa fa-battery-full" aria-hidden="true"></i>
                Column One
                </h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
             <div class="col-md-6 col-sm-6">
                  <i class="fa fa-battery-quarter" aria-hidden="true"></i>
                <h2>Column Two</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
            </div>
        </div>
        <footer>
            <div class="container">
               <div class="row">
                   <div class="col-md-4">
                       <h3>This is a footer</h3>
                   </div>
               </div>
            </div>
        </footer>
    </body>
</html>
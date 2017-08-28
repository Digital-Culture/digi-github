<?php
session_start();
include("includes/database.php");
//query to create an account
/*$username = "jane88";
$email = "jane88@gmail.com";
$password = password_hash("password",PASSWORD_DEFAULT);
$account_query = "INSERT INTO accounts (username,email,password,status,created) VALUES('$username','$email','$password',1,NOW())";
//run the query
$result = $connection->query($account_query);
if(!$result){
  echo "account creation failed";
}*/

//get products from database
$product_query = "SELECT 
products.id,
products.name,
products.description,
products.price,
images.image_file
FROM products 
INNER JOIN products_images 
ON products.id=products_images.product_id
INNER JOIN images
ON images.image_id = products_images.image_id";
$product_statement = $connection->prepare($product_query);
$product_statement->execute();
$result = $product_statement->get_result();

$cat_query = "SELECT category_id,category_name FROM categories";
$cat_statement = $connection->prepare($cat_query);
$cat_statement->execute();
$cat_result = $cat_statement->get_result();
?>

<!doctype html>
<html>
   <?php 
   $page_title = "Home Page";
   include("includes/head.php");
   ?>
    <?php include("includes/navigation.php"); ?>    
    <div class="container">
      <div class="row">
        <div class="col-md-2">
          <h3>Categories</h3>
          
           <nav>
            <ul class="nav nav-stacked nav-pills">
            <?php
            $cat_selected = 1;
            if($cat_result->num_rows > 0){
              while($cat_row = $cat_result->fetch_assoc()){
                $cat_id = $cat_row["category_id"];
                $cat_name = $cat_row["category_name"];
                if($cat_selected==$cat_id){
                  $active = "class=\"active\"";
                }
                else{
                  $active = "";
                }
                echo "<li $active data-id=\"$cat_id\">
                <a href=\"index.php?category=$cat_id\">$cat_name</a>
                </li>";
              }
            }
            ?>
            </ul>
          </nav>
          
          
        </div>
        <div class="col-md-10">
          <div class="row">
          <?php
          if($result->num_rows > 0){
            $counter = 0;
            while($row = $result->fetch_assoc()){
              $counter++;
              if($counter==1){
                echo "<div class=\"row\">";
              }
              $name = $row["name"];
              $id = $row["id"];
              $description = $row["description"];
              $price = $row["price"];
              $image = $row["image_file"];
              echo "<div class=\"col-md-3\">
              <img class=\"img-responsive\" src=\"products_images/$image\">
              <h3>$name</h3>
              <h4>$price</h4>
              <p>$description</p>
              </div>";
              
              if($counter==4){
                echo "</div>";
                $counter=0;
              }
            }
          }
          ?>
          </div>
        </div>
      </div>
    </div>
   
  
          
           <!-- <div class="row">
            <div class="col-md-6 col-sm-6">
                <h2><i class="fa fa-battery-full" aria-hidden="true"></i>
                Column One
                </h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
             <div class="col-md-6 col-sm-6">
                  
                <h2><i class="fa fa-battery-quarter" aria-hidden="true"></i>
                Column Two</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
            </div>
        </div>-->
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
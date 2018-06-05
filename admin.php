<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  header("location:index.php");
}

if($_SESSION["type"]!="admin") {
  header("location:index.php");
}

include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin || STAR ANTIQUE CENTER </title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">STAR ANTIQUE CENTER </a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
         
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="AddItem.php">Add Item</a></li>';
            echo '<li><a href="DeleteItem.php">Delete Item</a></li>';
            echo '<li><a href="ChangePrice.php">Update Price</a></li>';
            echo '<li><a href="ChangeName.php">Update Name</a></li>';
            echo '<li><a href="ChangeQuantity.php">Update Quantity</a></li>';
            echo '<li><a href="all_orders.php">View All Orders</a></li>';
            echo '<li><a href="create_admin_acct.php">Create Admin Acct</a></li>';

            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>

<li style="position:  width:80%; background-color:white; left:750px; top:1px" class="categories">
    <form method="POST" action=''>
    <input type="submit" id= "submit_btn" name="Jewelries"  value="Jewelries">
    <input type="submit" name="Frames"  value="Frames">
    <input type="submit" name="Pottery"  value="Pottery">
    <input type="submit" name="Watches"  value="Watches">
    <input type="submit" name="Furniture"  value="Furniture">

    <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <h3>Hey Admin!</h3>
        <?php
        
        if (isset($_POST['Jewelries']))  $result = $mysqli->query('SELECT * FROM products where product_code LIKE "%J%" '); 
              elseif (isset($_POST['Frames'])) $result = $mysqli->query('SELECT * FROM products where product_code LIKE "%Fr%" '); 
              elseif (isset($_POST['Pottery'])) $result = $mysqli->query('SELECT * FROM products where product_code LIKE "%P%" '); 
              elseif (isset($_POST['Furniture'])) $result = $mysqli->query('SELECT * FROM products where product_code LIKE "%Furn%" '); 
              elseif (isset($_POST['Watches'])) $result = $mysqli->query('SELECT * FROM products where product_code LIKE "%W%" '); 
              else $result = $mysqli->query('SELECT * FROM products where product_code LIKE "%J%" '); 
        
        
        
          if($result) {
            while($obj = $result->fetch_object()) {
              echo '<div class="large-4 columns">';
              echo '<p><h3>'.$obj->product_name.'</h3></p>';
              echo '<img src="images/products/'.$obj->product_img_name.'"/>';
              echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
              echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
              echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
              echo '<p><strong>Price</strong>: $'.$obj->price.'</p>';
              echo '<div class="large-6 columns" style="padding-left:0;">';
              echo '<form method="post" name="update-quantity" action="admin-update.php">';
              echo '</div>';
              echo '<div class="large-6 columns">';
             
    

              echo '</div>';
              echo '</div>';
            }
          }
          
  
        ?>



      </div>
    </div>


    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;">&copy; STAR ANTIQUE CENTER. All Rights Reserved.</p>
        </footer>

      </div>
    </div>





    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>

<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}



if($_SESSION["type"]==="admin") {
  header("location:admin.php");
}




include 'config.php';

?>


<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Password Recovery || LBtasker</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body style="background-color:azure; ">

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a style="color: orange; " href="index.php">LBtasker</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
         
          <?php

          if(isset($_SESSION['username'])){
            echo '<li class="active"><a href="account.php">My Account</a></li>';
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




    <div class="row" style="margin-top:30px;">
      <div class="small-12">
        

        <p><h4>Password Recovery Form</h4></p>

        <p><strong><span style="color:red; ">*Please fill out the form below with some information from your account and enter you new password.</span><br> If all the information entered is correct, you password will be updated automatically. </strong></p>
      </div>
    </div>


    <form method="POST" action="change_password.php" style="margin-top:30px;">
      <div class="row">
        <div class="small-12">

          <div class="row">
            <div class="small-3 columns">
              <label for="right-label" class="right inline">First Name</label>
            </div>
            <div class="small-8 columns end">
              <?php

                $result = $mysqli->query('SELECT * FROM users');

                if($result === FALSE){
                  die(mysql_error());
                }

                if($result) {
                  $obj = $result->fetch_object();
                  echo '<input type="text" id="right-label"  name="fname" required>';

                  echo '</div>';
                    echo '</div>';

                  echo '<div class="row">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">Last Name</label>';
                  echo '</div>';
                  echo '<div class="small-8 columns end">';

                  echo '<input type="text" id="right-label"  name="lname" required>';

                  echo '</div>';
                  echo '</div>';

                  echo '<div class="row">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">Address</label>';
                  echo '</div>';
                  echo '<div class="small-8 columns end">';
                  echo '<input type="text" id="right-label"  name="address" required>';



                  echo '</div>';
                  echo '</div>';

                  echo '<div class="row">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">City</label>';
                  echo '</div>';
                  echo '<div class="small-8 columns end">';
                  echo '<input type="text" id="right-label"  name="city" required>';
                  echo '</div>';
                  echo '</div>';

                  echo '<div class="row">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">ZIP Code</label>';
                  echo '</div>';
                  echo '<div class="small-8 columns end">';

                  echo '<input type="text" id="right-label"  name="pin" required>';

                  echo '</div>';
                  echo '</div>';

                  echo '<div class="row">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">Email</label>';
                  echo '</div>';

                  echo '<div class="small-8 columns end">';


                  echo '<input type="email" id="right-label" name="email" required>';

                  echo '</div>';
                  echo '</div>';
              }


              echo '<hr/>' ; 
              echo '<div class="row">';
              echo '<div class="small-3 columns">';
              echo '<label for="right-label" class="right inline" style="position:absolute; top:10px; left:170px; width:100px;   "><strong>New Password</strong></label>';
              echo '</div>';
              echo '<div class="small-8 columns end">';
              echo '<br><br>' ; 
              echo '<input type="password" id="right-label" name="pwd" style="position:absolute; top:20px; left:300px;" required>';

              echo '</div>';
              echo '</div>';
              
             
          ?>

          <div class="row">
            <div class="small-4 columns">

            </div>
            <div class="small-8 columns">
              <input type="submit" id="right-label" value="Reset Password" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px; position:absolute; top:150px;left:100px; ">
            </div>
          </div>
        </div>
      </div>
    </form>



    <div class="row" style="margin-top:30px;">
      <div class="small-12">



       

      </div>
    </div>



<?php

          ?>


    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>

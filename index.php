<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LBtasker</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body style="background-color:azure; " >

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a style="font-family:Times New Roman; font-size:30px; color:orange; " href="index.php">LBtasker </a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section" >
      <!-- Right Nav Section -->
          <ul class="right">
        
          <!-- User can see details only after he/she logs in -->
          <?php 

          if(isset($_SESSION['username'])){
            echo '<li><a href="MainBoard.php">MY LIST</a></li>';
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

    
    <img src="https://media1.tenor.com/images/c75f9ed414bfac2d71f9d02634e6dcea/tenor.gif?itemid=9679893" width="400"  height="200" style="position:absolute; top:50px; left:0px;">
    
      
    <style>

.w3-lobster {
    font-family: "Lobster", serif;
    position: absolute; 
    left: 450px; 
    width: 800px; 
    height: 600px; 
    top:100px; 
    background-color: azure;
}
</style>
<body>

<div class="w3-container w3-lobster">
  <center><p class="w3-xxxlarge">Stay Organized!</p></center>
</div>
 <center><p style="color:red; position:absolute; top:200px; left:670px;"class="w3-xxlarge">Prioritize your tasks.</p></center>
  <center><p style="color:red ;position:absolute; top:250px; left:680px; "class="w3-xxlarge">Meet the deadlines.</p></center>
 <center><p style="position:absolute; top:350px; left:450px; font-size:20px; ">Your tasks can sometimes be overwhelming, but there is always a way to deal with them. <span style="color:orange; ">LBtasker</span> lets you keep track of everything in one place.</p></center>

    <div class="row" style="margin-top:10px;">
      <div class="small-12">

        <footer style="margin-top:10px;">
          <center><a style="  font-family:Lobster; position:absolute; top:550px; left:710px; font-size:1.5em;">&copy; LBtasker. All Rights Reserved.</a></center>
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

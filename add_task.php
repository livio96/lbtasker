<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])){
  header("location:index.php");
}
?>

<html>

    
<head>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
</head>
    
<body style="background-color:azure; ">

     <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a style="font-family:Lobster; font-size:30px; color:orange; " href="index.php">LBtasker </a></h1>
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

    <p style="font-size:30px; position:absolute; left:40%; top:50px;  " > <strong> + Add a Task</strong> </p>
    <form action="Add_discussion.php" method="post"> 
    <br/><br/><br/>
    
    <strong style="position:absolute; top:150px; left:280px; color:orange;  ">*Task Title : </strong>
    <input  style=" width:40%; position:absolute; top:150px; left:400px; font-size:20px; " name="enter_p_name" type="text" maxlength="100" required="required" >
    <br/>
    <strong style="position:absolute; top:205px; left:300px; color:orange;  ">Due Date/Time  (Optional) </strong>
    <input  style=" width:20%; position:absolute; top:200px; left:550px; font-size:15px; " name="enter_due_date" type="text" maxlength="21" placeholder="e.g. 02/02/2018 5:50 PM" >
    <br />
   
    <input style="postion:absolute; top: 300px; "class="button" type="submit" name="submit_up_button" value="+ Add Task">
  </form>
    
   

    
    
</body>
<style type="text/css">
.button {
    background-color: #4CAF50; /* Green */
    position: absolute; 
    top: 200px; 
    left: 580px; 
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
    
.button2 {
    background-color: red; /* Red */
    position: absolute; 
    top:0px; 
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
</style> 
    
  <div class="row" style="margin-top:10px;">
      <div class="small-12">

        <footer style="margin-top:10px;">
          <center><a style="  font-family:Lobster; position:absolute; top:550px; left:450px; font-size:1.5em;">&copy; LBtasker. All Rights Reserved.</a></center>
        </footer>

      </div>
    </div>


</html>


<?php

$flag = 0 ; 

$db_username = 'lbtasker_liviob';
$db_password = 'Chelseafc2';
$db_name = 'lbtasker_lbtasker';
$db_host = 'localhost';

$subject = "" ; 
$due_date = "NO DUE DATE" ; 
$sql = "" ; 
//$group_id = "" ; 



if (isset($_POST['submit_up_button'])) 
$subject=$_POST['enter_p_name'];


if (isset($_POST['submit_up_button'])) 
$due_date=$_POST['enter_due_date'];


if (isset($_POST['submit_up_button'])) 
$flag= 1 ; 

$email = $_SESSION['username'] ; 


// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if($flag==1) {
$sql = "INSERT INTO tasks (Title, due_date, email)
VALUES ('$subject', '$due_date', '$email')"; 

if ($conn->query($sql) === TRUE) {
    $flag = 0 ;
    //echo "<p style='color:green; '> Discussion posted successfully </p>";
    header('Location: MainBoard.php');
    
} 
    
}



/*else {
    echo "Error: " . $sql . "<br>" . $conn->error;
} */

$conn->close();
?>
<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above
ob_start();
session_start();
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
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
body {
  margin: 0;
  min-width: 250px;
}

/* Include the padding and border in an element's total width and height */
* {
  box-sizing: border-box;
}

/* Remove margins and padding from the list */
ul {
  margin: 0;
  padding: 0;
}

/* Style the list items */
ul li {
  cursor: pointer;
  position: relative;
  padding: 12px 8px 12px 40px;
  list-style-type: none;
  background: #eee;
  font-size: 18px;
  transition: 0.2s;
  
  /* make the list items unselectable */
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Set all odd list items to a different color (zebra-stripes) */
ul li:nth-child(odd) {
  background: #f9f9f9;
}

/* Darker background-color on hover */
ul li:hover {
  background: #ddd;
}

/* When clicked on, add a background color and strike out text */
ul li.checked {
  background: #888;
  color: #fff;
  text-decoration: line-through;
}

/* Add a "checked" mark when clicked on */
ul li.checked::before {
  content: '';
  position: absolute;
  border-color: #fff;
  border-style: solid;
  border-width: 0 2px 2px 0;
  top: 10px;
  left: 16px;
  transform: rotate(45deg);
  height: 15px;
  width: 7px;
}

/* Style the close button */
.close {
  position: absolute;
  right: 0;
  top: 0;
  padding: 12px 16px 12px 16px;
}

.close:hover {
  background-color: #f44336;
  color: white;
}

/* Style the header */
.header {
  background-color: orange;
  padding: 10px 20px;
  color: white;
  text-align: center;
  
}

/* Clear floats after the header */
.header:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the input */
input {
  border: none;
  width: 75%;
  padding: 10px;
  float: left;
  font-size: 16px;
}

    
.addBtn {
   background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 50%;
}

.addBtn:hover {background-color: #3e8e41}

.addBtn:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

</style>
</head>
<body style="background-color: azure;">
    

      <!-- Right Nav Section -->
        <ul class="right">
          <?php

          if(isset($_SESSION['username'])){ 
          }
          else{
            echo '<li class="active"><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
  
<div id="myDIV" class="header">
  <h2 style="margin:3px">My To Do List</h2>
  <br>
  <a class="addBtn" href="add_task.php">+ Add a Task</a>
  
  <form action="MainBoard.php" method="post">
  <input style=" height:5%; font-size:14px; width:10%; position:absolute; left:79%; top:29%; border:solid;  " placeholder="Enter Task #" name="id_entered" type="text" size="40">

  <input  style="background-color: red; /*  */border: none;color: white;padding: 4px; text-decoration: none;display: inline-block;font-size: 12px;margin: 2px 1px;cursor: pointer; position:absolute; left:89%; top:29%; width:11%; height:4.7%;"  type="submit" value=" Delete Task" name="del_button">
    </form>
  <a style="background-color: black; /* Green */border: none;color: white;padding: 10px; text-decoration: none;display: inline-block;font-size: 12px;margin: 2px 1px;cursor: pointer; position:absolute; left:90%; top:0%;width:10%; height:6%;" href="logout.php"><strong>Log Out </strong></a>

</div>
<br><br><br>

 <div class="row" style="margin-top:10px;">
      <div class="small-12">

        <footer style="margin-top:10px;">
          <center><a style="  font-family:Lobster; position:absolute; top:650px; left:470px; font-size:1.1em;">&copy; LBtasker. All Rights Reserved.</a></center>
        </footer>

      </div>
    </div>


  <?php

$flag = 0 ; 
$db_username = 'root';
$db_password = '';
$db_name = 'Antiques';
$db_host = 'localhost';
$email = $_SESSION['username'] ; 
    

    

$i=0;
    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    
          $result = "" ; 
          $delete_sql = "" ; 
          $id = "" ; 
          $result = $conn->query("SELECT task_id , Title, due_date FROM tasks Where email LIKE '".$email."%'");
           
          if($result){

            while($obj = $result->fetch_object()) {


                
                
              echo '<div><p style="cursor: pointer;position: relative; padding: 1px 2px 3px 20px;background: #eee;font-size: 18px;transition: 0.2s; width:100%; "> <span style="color:red;">'.$obj->task_id.'.   </span>'.$obj->Title.' <span style="color: green ; position:absolute; left:650px; ">  Due: '.$obj->due_date.' </span>  </p></div>';
 
            } 
          }

        
        
    
               ?>


<?php


$currency = '$';
    
$db_username = 'root';
$db_password = '';
$db_name = 'Antiques';
$db_host = 'localhost';
$email = $_SESSION['username'] ; 
$id_entered = "" ; 


$p_code = "" ; 
$flag= 0 ; 

if (isset($_POST['del_button'])) 
$id_entered=$_POST['id_entered'];


if (isset($_POST['del_button'])) 
$flag=1; 



$conn = new mysqli($db_host, $db_username, $db_password, $db_name);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//if($flag==1)
$del_sql = "DELETE FROM tasks WHERE task_id ='" . $id_entered . "' ";
    


if ($conn->query($del_sql) === TRUE and $flag===1) {
   header("location:MainBoard.php");
  $flag = 0 ; 
} elseif ($conn->query($del_sql) === FALSE ){
  echo '<script language="javascript">';
  echo 'alert("Something went wrong! Please, make sure that task # field is not empty")';  //not showing an alert box.
  echo '</script>';
}

mysqli_close($conn);
?>
    
</body>
    

</html>

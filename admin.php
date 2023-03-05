<!DOCTYPE html>
<html>
<head>
  <title>Add New Student</title>
  <link rel="stylesheet" href="admin.css">
</head> 
<body>
  <?php
  session_start();   //to start session
  include("connection.php");  //to include connection files
  
  error_reporting(0);   //to remove unnecessary error like undefine array
  
  ?>
<!-- -----------------------navigation Bar--------------------->
<div class="container">
    <div class="nav">
        <ul>
        <li><a href="logout.php">Log-Out</a></li>
        <li><a href="changepass.php">Change Password</a></li>
        <li><a href="table.php">Students</a></li>
        <li><a href="new.php">Add new student</a></li>
        <li><a href="home.php">Home</a></li>
        </ul>
    </div>
        
    <div class="box">
    <h2 class="heading">Log-In</h2><br>
    <form action="" method="POST">    
<!-- post is use to get input from user -->
    Username:<input type="text" name="uname"><br>
    Password:<input type="text" name="pass"><br><br>

    <input type="submit" name="submit" value="Login">
  
  </form> 
   
    </div>
<?php
if(isset($_POST["submit"])){      //to conform submit button is click or not
  $uname = $_POST["uname"];
  $pass = $_POST["pass"];
  //------------------username validation--------------  
      if(!empty($uname)){
        $un=1;
      }
//------------------Password validation--------------     
    if(!empty($pass)){
      $ps=1;
    }
    if($un==1 && $ps==1){
      $query = "SELECT * FROM admin;";
      $run = mysqli_query($conn, $query);
      $data=mysqli_fetch_assoc($run);
    
        if($data['username'] == $uname && $data['password'] == $pass){
//--------------------------After complete validation----------------------- 
          $_SESSION["name"] = $uname;
          header("Location: home.php");
        }else{
          echo "<script>alert('Please enter valid username & password')</script>";
        }
      }else{
        echo "<script>alert('Required both username & password')</script>";
      }
      
    }
        
      
?>
</body>
</html>
<?php
session_start();
if(isset($_SESSION['id'])){
    header('location:admin/dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
    h1,a{
        float:left;
        color:black;
    }
        .container{
            text-align: center;
        }
        button{
            text-align: center;
        }
    </style>
</head>
<body>
    
    <form action="login.php" method="post"> 
    <div class="container">
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Username" style="text-align: center;"  name="username" required><br><br>
    
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Password"  style="text-align: center;" name="password" required><br><br>
    
        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember Me
        </label><br><br>
        <button type="submit" name="login" value="ogin">Login</button>
      </div>
    </form>
    <h1><a href="index.php">Back To Homepage</a></h1>
    
</body>
</html>
<?php
include 'dbconnect.php';
     
     if (isset($_POST['login']))
     {
         $username = $_POST['username'];
         $password = $_POST['password'];
    
     $sql="SELECT * FROM admin WHERE username='$username' and password='$password'" ;
     $result=mysqli_query($conn,$sql);
     $row=mysqli_num_rows($result);
     
     
     if($row <1){
         
         ?>
         <script> 
            alert('username password does not match');
            window.open('login.php','_self');
        </script>
        
       <?php

     }
     else {
         $data = mysqli_fetch_assoc($result);
         $id = $data['id'];
         echo "id=".$id;
         
          
         $_SESSION['id']=$id;
         header('location:admin/dashboard.php');
     }
    }
    ?>
    <!-- INSERT INTO `admin` (`id`, `username`, `password`) VALUES (NULL, 'Raovishal040@g', 'Raovishal040@g'); -->
<?php

session_start();
if(isset($_SESSION['id'])){
    echo "";
}

 else{
    header('location: ../login.php');
 }

?>
<?php
include ('header.php');
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
        *{
            margin:0;
            padding:0;
        }
    .adminnav{
        background-color: pink;
        color: black;
        text-align:center;
        
    }
   
    .dashboard{
        text-align:center;
    }
    h2{
        text-align:right;
        margin-right:45px;
    }
    
    </style>
</head>
<body>

<div class="adminnav">
<h1>Welcome To Admin Dashboard</h1>
<h2><a href="logout.php">Log Out</a></h2>
</div><br><br>

<div class="dashboard">
    <a href="adddata.php"><h1>Insert Data</h1></a><br><br>
    <a href="updatedata.php"><h1>Show Data</h1></a><br><br>
    <a href="deletedata.php"><h1>Delete Data</h1></a>
</div>
    
</body>
</html>
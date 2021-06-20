
<!-- // // INSERT INTO `adddata`(`id`, `genbanknumber`, `fastasequence`, `restrictionenzymename`, `proteinname`, `image1`, `image2`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]') -->

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
include ('headertitle.php');
 
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
    .data,textarea{
        text-align:center;
    padding-inline-end: 20px;
     


    }
    input{
        padding:12px;
        width:50%;
    }
    </style>
</head>
<body>
    <form action="adddata.php" enctype="multipart/form-data" method="post"> 
    
   <div class="data">
   genbank number: <input type="text"  name="genbanknumber" placeholder="Enter genbank number"><br><br>
   fasta sequence: <br> <textarea name="fastasequence"  cols="60" rows="10"></textarea><br><br>
   nameofsequence: <input type="text" name="nameofsequence" placeholder="Enter nameofsequence"><br><br>
  given by: <input type="text" name="givenby"><br><br>
  
  center image: <input type="file" name="image1"><br><br>
   right image:<input type="file" name="image2"><br><br>
   
   <input type="submit" value="submit" name="submit"><br><br>
   </div>

   </form>
</body>
</html>
<?php

if(isset($_POST['submit'])){
    include ('../dbconnect.php');

    $genbanknumber=$_POST['genbanknumber'];
    $fastasequence=$_POST['fastasequence'];
    $nameofsequence=$_POST['nameofsequence'];
    $imagename=$_FILES['image1']['name'];
    $tempname=$_FILES['image1']['tmp_name'];
    $imagename2=$_FILES['image2']['name'];
    $tempname2=$_FILES['image2']['tmp_name'];
    $givenby=$_POST['givenby'];

    move_uploaded_file($tempname,"../images/$imagename");
    move_uploaded_file($tempname2,"../images/$imagename2");
  

    $qry="INSERT INTO `adddata`(`genbanknumber`, `fastasequence`, `nameofsequence`,`image1`, `image2`,`givenby`) VALUES ('$genbanknumber','$fastasequence',' $nameofsequence','$imagename','$imagename2','$givenby')";

    $run=mysqli_query($conn,$qry);
    if($run == true){
        ?>
        <script>
        alert ('Data inserted successfully');
        </script>
        <?php
    }

}

?>


 
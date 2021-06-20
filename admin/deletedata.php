<!-- after login when click on update data -->
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <style>
      .table{
         align-items: center;
         text-align: center;
      }
   </style>
</head>
<body>
   
</body>
</html>
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
<form action="deletedata.php" method="post">

<div class="data" style="text-align: center;">
   genbank number: <input type="text"  name="genbanknumber" placeholder="Enter genbank number"><br><br>
   <!-- fasta sequence: <br> <textarea name="fastasequence"  cols="60" rows="10"></textarea><br><br>
   restrictionenzyme name: <input type="text" name="restrictionenzymename" placeholder="Enter restrictionenzymename"><br><br><hr>
   
  center image: <input type="file" name="image1"><br><br>
   right image:<input type="file" name="image2"><br><br> -->
   <input type="submit" value="search" name="submit"><br><br>
   </div>
</form>

 <table align="center" width= 80% border="2px" style="margin-top: 10px;">
   <tr  align = "center">
      <th>No</th>
      <th>genbanknumber</th>
      <th>fastasequence</th>
      <th>restrictionenzymename</th>
      <th>image1</th>
      <th>image2</th>
   </tr>

   <?php
    if(isset($_POST['submit'])){
       include ('../dbconnect.php');
       $genbanknumber=$_POST['genbanknumber'];
      //  $fastasequence=$_POST['fastasequence'];
      //  $restrictionenzymename=$_POST['restrictionenzymename'];
      //  $image1=$_POST['image1'];
      //  $image2=$_POST['image2'];

       $sql="SELECT * FROM `adddata` WHERE `genbanknumber`='$genbanknumber'";

       $run=mysqli_query($conn,$sql);
       if(mysqli_num_rows($run)<1) {
          echo"<tr><td colspan = '7'>NO Records Found</td></tr>";

       }
       else{
          $count=0;
          while($data=mysqli_fetch_assoc($run)){
             $count++;
             ?>
            
             <tr align = "center">
                <td><?php echo $count; ?></td>
                <td><?php echo $data['genbanknumber'];?></td>
                <td><?php echo $data['fastasequence'];?></td>
                <td><?php echo $data['nameofsequence'];?></td>
                <td><img src = "../images/<?php echo $data ['image1']; ?>"style = "max-width:100px" /></td>
                <td><img src = "../images/<?php echo $data ['image2']; ?>"style = "max-width:100px" /></td>
                <td><a href="deleteform.php?sid=<?php echo $data ['id']; ?>">Delete</a></td>
            </tr>
          
          <?php
        
         }
      }
   }
   ?>
</table>

    
 
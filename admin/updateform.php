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
include ('../dbconnect.php');

$sid=$_GET['sid'];
$sql="SELECT * FROM `adddata` WHERE `id`='$sid'";
$run=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($run);
 
?> 
<form action="updatednewdata.php" method="post">

<div class="data" style="text-align: center;">
   genbank number: <input type="text"  name="genbanknumber" value = <?php echo $data['genbanknumber'];?>><br><br>

   fasta sequence: <br> <textarea name="fastasequence" value = <?php echo $data['fastasequence'];?>  cols="60" rows="10"></textarea><br><br>

   restrictionenzyme name: <input type="text" name="restrictionenzymename"  value = <?php echo $data['restrictionenzymename'];?> ><br><br><hr>

 

  center image: <input type="file" name="image1"><br><br>
   right image:<input type="file" name="image2"><br><br>
   <input type="hidden" name = "sid" value = "<?php echo $data['id']; ?>" />

   <input type="submit" value="submit" name="submit"><br><br>
   </div>
</form>
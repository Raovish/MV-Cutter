<?php
 
 
include ('../dbconnect.php');
 

$id=$_REQUEST['sid'];
$qry="DELETE FROM `adddata` WHERE `id`='$id';";


 
 
 

$run=mysqli_query($conn,$qry);
if($run == true){
    ?>
    <script>
    alert ('Data Deleted successfully');
    window.open('deletedata.php','_self');
    </script>
    <?php
}
 
?>
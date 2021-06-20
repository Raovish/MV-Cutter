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
      input{
         margin-left:45%;
         font-size:22px;
          
      }
      input:hover{
         background-color:	gray;

      }
      html{
         background-color:	#F8F8F8;
      }
   </style>
</head>
<body>
    
</body>
</html>
<form action="homedata.php" method="post">

 
   <input type="submit"  value="ClickMe" name="submit" <h1>&nbsp;&nbsp;Copy and search it on homepage  <a href="index.php">Home</a></h1> <br><br>
   </div>
</form>

 <table align="center" width= 80% border="2px" style="margin-top: 10px;">
   <tr  align = "center">
      <th>S.No</th>
      <th>Genbanknumber</th>
      <th>Fastasequence</th>
      <th>Name of sequence</th>
    
      
   </tr>

   <?php
    if(isset($_POST['submit'])){
       include ('dbconnect.php');
      
      

       $sql="SELECT * FROM `adddata`";

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
                
            </tr>
          
          <?php
        
         }
      }
   }
   ?>
</table>

    
 
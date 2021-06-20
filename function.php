<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
     
   .genbank{
         font-size:22px;
         display:inline-block !important;
         margin-left:580px;
         font-weight:bold;
        
       
    }
    .givenby{
        font-size:22px;
         display:inline-block !important;
         margin-top:10px;


    }
    .image1{
        margin-left:350px;

    }
    .image2{
        margin-left:1200px;

    }
    .enzymename{
        margin-left:350px;
        font-size:22px;
        text-overflow: ellipsis;



    }
    
    
     
    </style>
</head>
<body>
 
 
 
 
 
     
     
   </tr>

   <?php
    if(isset($_POST['submit'])){
       include ('dbconnect.php');
       $genbanknumber=$_POST['genbanknumber'];
          $nameofsequence=$_POST['nameofsequence'];
          
    //    $fastasequence=$_POST['fastasequence'];
        
        
      //  $image1=$_POST['image1'];
      //  $image2=$_POST['image2'];

    //   $sql="SELECT * FROM `adddata` WHERE `genbanknumber`='$genbanknumber' AND `nameofsequence` LIKE '%$nameofsequence%'";
      $sql="SELECT * FROM `adddata` WHERE `genbanknumber` LIKE '%$genbanknumber%' AND `nameofsequence` LIKE '%$nameofsequence%'";

       $run=mysqli_query($conn,$sql);
       if(mysqli_num_rows($run)<1) {
          echo"<tr><td colspan = '7'><h1>Trying to Show! <br>Try another Sequence please....</h1></td></tr>";

       }
       else{
          
          while($data=mysqli_fetch_assoc($run)){
              
             ?>
            
              
               <div class="genbank">Sequence Number &nbsp; :&nbsp;<?php echo $data['genbanknumber'];?></div><hr style="height:2px;border-width:0;color:gray;background-color:red"><br>

               <div class="image2"><img src = "images/<?php echo $data ['image2']; ?>"style = "max-width:300px"/></div>
                
                <div class="givenby"><tr>Given By&nbsp; : <br> &nbsp;<?php echo $data['givenby'];?> </div><br>
              
         
                <div class="image1"><img src = "images/<?php echo $data ['image1']; ?>"style = "max-width:700px" /></div><br> 
                 
                <div class="enzymename">Enzyme Name &nbsp; :&nbsp;<?php echo $data['nameofsequence'];?></div>

                 
           
          
          <?php
        
         }
      }
   }
   ?>
</table>

    
 
</body>
</html>
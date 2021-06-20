<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
 html{
   background-color:#F4F3F2;
 }

	input[type=text], select, textarea {
  width: 100%;   
  padding: 12px; 
  background-color: #262626;
  color:white;
  border: 1px solid gray;  
  border-radius: 4px; /* Rounded borders */
  box-sizing: border-box; /* Make sure that padding and width stays in place */
  /* margin-top: 6px; Add a top margin */
  margin-bottom: 16px; /* Bottom margin */
   resize: vertical     */
   /* Allow the user to vertically resize the textarea (not horizontally) */
} 
html{
  background-color: #262626;
  color:white; 

}

/* Style the submit button with a specific background color etc */
 
h1{
	text-align:center;
	font-size:42px;

}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
  background-color: #45a049;
}

/* Add a background color and some padding around the form */
.container {
  border-radius: 5px ;
  /* background-color:#fff; */
  padding: 10px;
  color:white;
  
}
input[type=submit]{
	background-color:black;
         color:white;
	font-size:22px;

}
label{
	font-size:22px;
	font-weight:bold;
}
 
 
	</style>
</head>
<body>
<h1>Connect with us</h1><br><hr style="height:2px;border-width:0;color:gray;background-color:red">

<h2>Send your request</h2>
<div class="container">
<form action="contact.php" method="post"> 

    <label for="firstname">Name</label>
    <input type="text" id="firstname" name="firstname" placeholder="Your name.."required>

    <label for="email">Email</label>
    <input type="text" id="email" name="email" placeholder="Your email.." required>

    <label for="country">Country</label>
    <input type="text" id="country" name="country" placeholder="Your country..">

     

    <label for="subject">Message</label>
    <textarea id="subject" name="subject" placeholder="Feel free to give us feedback.." style="height:200px"></textarea>

    <input type="submit" value="Submit" name="submit">

  </form>
</div>
</body>
</html>
<?php

if(isset($_POST['submit'])){
    include ('dbconnect.php');

    $firstname=$_POST['firstname'];
    $email=$_POST['email'];
    $country=$_POST['country'];
    $subject=$_POST['subject'];
   
    

    $qry="INSERT INTO `contact`(`firstname`, `email`, `country`,`subject`) VALUES ('$firstname','$email',' $country','$subject')";


	 
    $run=mysqli_query($conn,$qry);
    if($run == true){
        ?>
        <script>
        alert ('Form Submitted successfully');
        </script>
        <?php
    }
	else{
		echo "Fill the form again";
	}

}

?>
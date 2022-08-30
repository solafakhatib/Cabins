<?php
 session_start();
 // connect to database
 $db=mysqli_connect("localhost" ,"root" ,"" , "test");
 if(isset($_POST['reg_btn'])){
   //session_start();
   $FirstName = mysql_real_escape_string($_POST['FirstName']);
   $LastName = mysql_real_escape_string($_POST['LastName']);
   $phoneNum = mysql_real_escape_string($_POST['phoneNum']);
   $email = mysql_real_escape_string($_POST['email']);


   $sql="INSERT INTO client(FirstName ,LastName,phoneNum,email) VALUES ('$FirstName','$LastName','$phoneNum','$email')";
   mysqli_query($db ,$sql);
   header('Location: test.php');
 }

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

  </head>
  <body>
<div class="header">
  <h1>Add Client</h1>
</div>

<form  method="post" action="reg.php">
  <table >
    <tr>
      <td>FirstName:</td>
      <td><input type="text" name="FirstName" class="textInput" required></td>
    </tr>

    <tr>
      <td>LastName:</td>
      <td><input type="text" name="LastName" class="textInput" required ></td>
    </tr>
    <tr>
      <td>phoneNum :</td>
      <td><input type="text" name="phoneNum" class="textInput" required ></td>
    </tr>
    <tr>
      <td>email:</td>
      <td><input type="email" name="email" class="textInput" required ></td>
    </tr>

    <tr>
      <td></td>
      <td><button type="submit" name="reg_btn" value="submit" >submit</button>
      <button type="button" class="btn btn-info" onclick="window.location='test.php'">Cancel</button></td>
    </tr>


  </table>
</form>
  </body>
</html>

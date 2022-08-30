<!-- //delete clients -->

<?php
$conn = mysqli_connect("localhost" ,"root" ,"" , "test");

$sql= "DELETE FROM client WHERE id= '".$_GET['id']."'";
if(mysqli_query($conn,$sql)){
  header("Location: Clients.php");
}
else {
  echo "Not Deleted";
}

 ?>

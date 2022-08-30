<?php
$hostname="localhost";
$dbname="test";
$username="root";
$password="";
$query="";
$quan="";

 // connect to database
$conn=mysqli_connect("localhost" ,"root" ,"" , "test");
if(!$conn){
  die("connection Failed:" .mysqli_connect_error());
}
 if(isset($_POST['search'])){
   //session_start();
   $txtStartDate = mysql_real_escape_string($_POST['txtStartDate']);
   $txtEndDate = mysql_real_escape_string($_POST['txtEndDate']);
  // $txtStartDate =$_POST['txtStartDate'];




   $query=mysqli_query($conn,"SELECT orders.id ,client.FirstName ,client.LastName,client.phoneNum,client.email ,orders.start,orders.end, orders.price FROM orders,client WHERE `start` BETWEEN '$txtStartDate'and '$txtEndDate' AND client.id=orders.client ORDER BY `start`") ;
$sum= "SELECT SUM(`price`) FROM `orders`  WHERE `start` BETWEEN '$txtStartDate'and '$txtEndDate'";
$rere=mysqli_query($conn,$sum);
$rere = $rere->fetch_array();
$quan = intval($rere[0]);
   $count=mysqli_num_rows($query);
 }


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Ben Ananim</title>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />


<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
<link rel="stylesheet" href="css/jquery-ui.css" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
<!--fonts-->
<link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

<!--//fonts-->

</head>
<body>
<!-- header -->
<div class="w3_navigation">
	<div class="container">
		<nav class="navbar navbar-default">
			<div class="navbar-header navbar-left">
				<h1><a class="navbar-brand" href="cal.php">Ben <span>Ananim</span><p class="logo_w3l_agile_caption"></p></a></h1>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
				<nav class="menu menu--iris">
					<ul class="nav navbar-nav menu__list">
						<li class="menu__item menu__item"><a href="Clients.php" class="menu__link scroll">Clients</a></li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Orders <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="cal.php">calendar</li>
								<li><a href="orders.php">orders</li>
						</ul>
						</li>
						<li class="menu__item menu__item--current"><a href="reportbydate.php" class="menu__link scroll">Reports</a></li>
						<li class="menu__item"><a href="login.php" class="menu__link scroll">LogOut</a></li>


					</ul>
				</nav>
			</div>
		</nav>

	</div>
</div>
<!-- //header -->

<form method="post">
  <input type="date" name="txtStartDate">
  <input type="date" name="txtEndDate">
  <p>
    <input type="submit" name="search" value="search orders">
    <button type="button" name="button">Export to pdf</button>

  </p>
  <table class="table">
    <tr>

      <th>FirstName</th>
      <th>LastName</th>
      <th>phoneNum</th>
      <th>email</th>
      <th>start</th>
      <th>end</th>
<th>price</th>


    </tr>
  <?php

  if($count="0")
  {
    echo '<h2>Noo </h2>';
  }
  else {
  while ($row = mysqli_fetch_array($query)) {

    echo '<tbody id="myTable"><tr>

   <td>' .$row["FirstName"] . '</td>
   <td>' .$row["LastName"] . '</td>
   <td>' .$row["phoneNum"] . '</td>
   <td>' .$row["email"] . '</td>

   <td>' .$row["start"] . '</td>
   <td>' .$row["end"].'</td>
   <td>' .$row["price"].'</td>



</tr>
<tr></tr>
</tbody>';


    // code...
  }
  }
echo '<h2>Income  :</h2><h2>'.$quan.'</h2>';
   ?>


</form>
</body>
</html>

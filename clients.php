<!-- // clientssssss  -->
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

   header('Location: clients.php');
 }

 ?>
<!DOCTYPE html>
<html lang="en">

<head>

<!-- //for-mobile-apps -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />





</head>

<body>
<!-- header -->
<div class="banner-top">



		</div>
	<div class="w3_navigation">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<h1><a class="navbar-brand" href="index.php">Ben <span>Ananim</span><p class="logo_w3l_agile_caption"></p></a></h1>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="menu menu--iris">
						<ul class="nav navbar-nav menu__list">
              <li class="menu__item menu__item--current"><a href="Clients.php" class="menu__link scroll">Clients</a></li>
              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Orders <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="cal.php">calendar</li>
                  <li><a href="orders.php">orders</li>
              </ul>
              </li>
              <li class="menu__item"><a href="reportbydate.php" class="menu__link scroll">Reports</a></li>
              <li class="menu__item"><a href="login.php" class="menu__link scroll">LogOut</a></li>


						</ul>
					</nav>
				</div>
			</nav>

		</div>
	</div>
<!-- //header -->
		<!-- banner -->
	<div id="home" class="w3ls-banner">

	<!-- //banner -->
<!--//Header-->
<!-- //Modal1 -->


	<div class="container">
<br>

				<h4>Clients Details</h4>
				<p>Type something in the input field to search the table for first names, last names or emails:</p>
				  <input class="form-control" id="myInput" type="text" placeholder="Search..">
				<form  method="post" name="sentMessage" id="contactForm" >

<br>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Client</button>

<br>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4>Clients Details</h4>
        <form  method="post" name="sentMessage" id="contactForm" >

                    <div class="control-group form-group">

                                      <label class="contact-p1">FirstName:</label>
                                      <input type="text" class="form-control" name="FirstName"  required >
                                      <p class="help-block"></p>

                              </div>
                              <div class="control-group form-group">

                                                <label class="contact-p1">LastName:</label>
                                                <input type="text" class="form-control" name="LastName"  required >
                                                <p class="help-block"></p>

                                        </div>
                    <div class="control-group form-group">

                            <label class="contact-p1">phoneNum:</label>
                            <input type="tel" class="form-control" name="phoneNum"  required >
              <p class="help-block"></p>

                    </div>
                    <div class="control-group form-group">

                            <label class="contact-p1">email:</label>
                            <input type="email" class="form-control" name="email"  required >
              <p class="help-block"></p>

                    </div>
<div class="modal-footer">
                    <input type="submit" name="reg_btn" value="Add" class="btn btn-primary">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
      </div>


      </div>
    </div>
  </div>
</div>



            <br>
				    <table class="table">
				      <tr>
				        <th>id</th>
				        <th>FirstName</th>
				        <th>LastName</th>
				        <th>phoneNum</th>
				        <th>email</th>
				        <th>update</th>
                 <th>Delete</th>

				      </tr>
				</form>

				<?php
				$conn = mysqli_connect("localhost" ,"root" ,"" , "test");
				if ($conn -> connect_error){
					die("Connection failed :". $conn->connect_error);
				}
				$sql= "SELECT id, FirstName, LastName, phoneNum, email FROM client";
				$res =$conn ->query($sql);
				if($res->num_rows > 0){
					while ($row = $res ->fetch_assoc()) {

						echo '<tbody id="myTable"> <tr><td>'.$row["id"].'</td>
						<td>' .$row["FirstName"] . '</td>
						<td>' .$row["LastName"] . '</td>
						<td>' .$row["phoneNum"].'</td>
						<td>'.$row["email"].'</td>

						<td><a type="button" href="update.php?id=' . $row['id'] . '">Edit</a></td>
<td><a  href=delete.php?id='.$row["id"].'>Delete</a></td>
				</tr>';

					}
				echo " </tbody></table>";
				}
				else {
				 echo "0 result";
				}
				$conn -> close();
				 ?>




	</div>


<!-- //smooth scrolling -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>
</html>

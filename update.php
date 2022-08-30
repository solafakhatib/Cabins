<?php
include('db.php');

/*

EDIT.PHP

Allows user to edit specific entry in database

*/



// creates the edit record form

// since this form is used multiple times in this file, I have made it a function that is easily reusable

function renderForm($id, $firstname, $lastname,$phoneNum,$email, $error)

{

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Ben Ananim</title>


<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<!--fonts-->
<link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<!--//fonts-->
</head>


<body>
  <?php
  // if there are any errors, display them
  if ($error != '')

  {

  echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

  }

  ?>


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
							<li class="menu__item "><a href="index.php" class="menu__link">Home</a></li>
							<li class="menu__item menu__item--current"><a href="Clients.php" class="menu__link scroll">Clients</a></li>
							<li class="menu__item"><a href="orders.php" class="menu__link scroll">Orders</a></li>
							<li class="menu__item"><a href="reports.php" class="menu__link scroll">Reports</a></li>
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

<section class="contact-w3ls" id="contact">
	<div class="container">
		<div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile2" data-aos="flip-left">
			<div class="contact-agileits">
				<h4>Clients Details</h4>
				<form  method="post" name="sentMessage" id="contactForm" >

              <div class="control-group form-group">
<input type="hidden" name="id" value="<?php echo $id; ?>"/>


</div>
                    <div class="control-group form-group">

                                      <label class="contact-p1">FirstName:</label>
                                        <input type="text" class="form-control" name="FirstName" value="<?php echo $firstname; ?>"/>

                                      <p class="help-block"></p>

                              </div>
                              <div class="control-group form-group">

                                                <label class="contact-p1">LastName:</label>
                                            <input type="text" class="form-control" name="LastName" value="<?php echo $lastname; ?>"/>
                                                <p class="help-block"></p>

                                        </div>
                    <div class="control-group form-group">

                            <label class="contact-p1">phoneNum:</label>
                          <input type="tel" class="form-control" name="phoneNum" value="<?php echo $phoneNum; ?>"/>

							<p class="help-block"></p>

                    </div>
                    <div class="control-group form-group">

                            <label class="contact-p1">email:</label>
                              <input type="email" class="form-control" name="email"  value="<?php echo $email; ?>"/>
							<p class="help-block"></p>

                    </div>
<input type="submit" name="submit" value="Edit" class="btn btn-primary">
<input type="submit" name="submit"  value="Cancel" class="btn btn-primary" onclick="window.location='Clients.php'">

				</form>


			</div>
		</div>

	</div>
</section>

<!-- //smooth scrolling -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
</body>
</html>
<?php

}







// connect to the database





// check if the form has been submitted. If it has, process the form and save it to the database

if (isset($_POST['submit']))

{

// confirm that the 'id' value is a valid integer before getting the form data

if (is_numeric($_POST['id']))

{

// get form data, making sure it is valid

$id = $_POST['id'];

$firstname = mysql_real_escape_string(htmlspecialchars($_POST['FirstName']));

$lastname = mysql_real_escape_string(htmlspecialchars($_POST['LastName']));

$phoneNum = mysql_real_escape_string(htmlspecialchars($_POST['phoneNum']));

$email = mysql_real_escape_string(htmlspecialchars($_POST['email']));


// check that firstname/lastname fields are both filled in

if ($firstname == '' || $lastname == ''||$phoneNum==''||$email=='')

{

// generate error message

$error = 'ERROR: Please fill in all required fields!';



//error, display form

renderForm($id, $firstname, $lastname,$phoneNum,$email, $error);

}

else

{

// save the data to the database

mysql_query("UPDATE client SET firstname='$firstname', lastname='$lastname',phoneNum='$phoneNum',email='$email' WHERE id='$id'")

or die(mysql_error());



// once saved, redirect back to the view page

header("Location: clients.php");

}

}

else

{

// if the 'id' isn't valid, display an error

echo 'Error!';

}

}

else

// if the form hasn't been submitted, get the data from the db and display the form

{



// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)

{

// query db

$id = $_GET['id'];

$result = mysql_query("SELECT * FROM client WHERE id=$id")

or die(mysql_error());

$row = mysql_fetch_array($result);



// check that the 'id' matches up with a row in the databse

if($row)

{



// get data from db

$firstname = $row['FirstName'];

$lastname= $row['LastName'];

$phoneNum=$row['phoneNum'];

$email=$row['email'];


// show form

renderForm($id, $firstname, $lastname,$phoneNum,$email, '');

}

else

// if no match, display result

{

echo "No results!";

}

}

else

// if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error

{

echo 'Error!';

}

}

?>

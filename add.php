
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
<!-- header -->
<div class="banner-top">

			<div class="contact-bnr-w3-agile">
				<ul>
					<li class="s-bar">
						<div class="search">
							<input class="search_box" type="checkbox" id="search_box">
							<label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
							<div class="search_form">
								<form action="#" method="post">
									<input type="search" name="Search" placeholder=" " required=" " />
									<input type="submit" value="Search">
								</form>
							</div>
						</div>
					</li>
				</ul>
			</div>

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
							<li class="menu__item"><a href="#team" class="menu__link scroll">Orders</a></li>
							<li class="menu__item"><a href="#gallery" class="menu__link scroll">Reports</a></li>
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

                    <input type="submit" name="reg_btn" value="Add" class="btn btn-primary">

				</form>



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


			</div>
		</div>

	</div>
</section>

<!-- //smooth scrolling -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
</body>
</html>

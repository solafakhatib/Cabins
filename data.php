<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//$conn = mysqli_connect("localhost" ,"root" ,"" , "test");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM client";
$r = $conn->query($sql);




 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
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
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
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
   <meta name="viewport" content="width=device-width, initial-scale=1">

 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


   <!-- Bootstrap Core CSS To delete -->

 <!-- FullCalendar -->
 <link href='css/fullcalendar.css' rel='stylesheet' />



</head>
   <body>
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
                   <li class="menu__item menu__item--current"><a href="index.php" class="menu__link">Home</a></li>
                   <li class="menu__item "><a href="Clients.php" class="menu__link">Clients</a></li>
                   <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Orders <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                     <li><a href="cal.php">calendar</li>
                       <li><a href="orders.php">orders</li>
                   </ul>
                   </li>
                   <li class="menu__item"><a href="#gallery" class="menu__link scroll">Reports</a></li>
                   <li class="menu__item"><a href="index" class="menu__link scroll">LogOut</a></li>


                </ul>
              </nav>
            </div>
          </nav>

        </div>
      </div>
     <div class="form-group">
     <label for="title" class="col-sm-2 control-label">Name</label>
     <div class="col-sm-10">
       <select name="title" class="form-control" id="title">
     <?php while($row1 =mysqli_fetch_array($r)):; ?>
     <option value=""><?php echo $row1[1]. " " . $row1[2]; ?></option>
   <?php endwhile; ?>
       </select>
     </div>
     </div>

   </body>
 </html>

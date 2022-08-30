<!-- //finallllllllllll calendar  -->
<?php
require_once('bdd.php');
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

$sql2 = "SELECT * FROM client";
$r = $conn->query($sql2);

$sql3 = "SELECT * FROM cabin";
$col = $conn->query($sql3);



$sql = "SELECT id, title, start, end,color FROM orders ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">

<head>
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

  <!-- header -->
  <div class="banner-top">

        <div class="contact-bnr-w3-agile">
          <ul>


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
                  <li class="menu__item "><a href="Clients.php" class="menu__link">Clients</a></li>
                  <li class="menu__item menu__item--current "><a href="Clients.php" class="menu__link">orders</a></li>
                  <!-- <li class="menu__item menu__item--current"><a class="menu__item menu__item--current" data-toggle="dropdown" href="#">Orders <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="cal.php">calendar</li>
                      <li><a href="orders.php">orders</li>
                  </ul>
                  </li> -->
                  <li class="menu__item"><a href="reportbydate.php" class="menu__link scroll">Reports</a></li>
                  <li class="menu__item"><a href="login.php" class="menu__link scroll">LogOut</a></li>

                </ul>
              </nav>
            </div>
          </nav>

        </div>
      </div>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1></h1>
                <br><br>
                <div id="calendar" class="col-centered">
                </div>
            </div>

        </div>
        <!-- /.row -->

		<!-- Modal -->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="addEvent.php">

			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Event</h4>
			  </div>
			  <div class="modal-body">

          <div class="form-group">
          <label for="client" class="col-sm-2 control-label">client Name</label>
          <div class="col-sm-10">
            <select name="client" class="form-control" id="client">
              <option value="">Choose</option>
          <?php while($row1 =mysqli_fetch_array($r)):; ?>
         <option value="<?php echo $row1[0]; ?>"><?php echo $row1[1]. " " . $row1[2]; ?></option>
        <?php endwhile; ?>
            </select>
          </div>
          </div>

          <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Title</label>
          <div class="col-sm-10">
            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
          </div>
          </div>


          <div class="form-group">
             <label for="color" class="col-sm-2 control-label">color</label>
             <div class="col-sm-10">
               <input type="checkbox" style="color:#0071c5;" name="color[]" value="#0071c5"/>Cabin1
               <input type="checkbox" style="color:#008000;" name="color[]" value="#008000"/>Cabin2
               <input type="checkbox" style="color:#FFD700;" name="color[]" value="#FFD700"/>Cabin3
               <input type="checkbox" style="color:#FF0000;" name="color[]" value="#FF0000"/>Cabin4
             </div>
             </div>



				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Start date</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">End date</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>

          <div class="form-group">
          <label for="price" class="col-sm-2 control-label">Price</label>
          <div class="col-sm-10">
            <input type="text" name="price" class="form-control" id="price" placeholder="price">
          </div>
          </div>


			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>



		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="editEventTitle.php">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Event</h4>
			  </div>
			  <div class="modal-body">

				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
					</div>
				  </div>

          <div class="form-group">
         <label for="color" class="col-sm-2 control-label">cabin</label>
         <div class="col-sm-10">

           <input type="checkbox" style="color:#0071c5;" name="color[]" value="#0071c5"/>Cabin1
           <input type="checkbox" style="color:#008000;" name="color[]" value="#008000"/>Cabin2
           <input type="checkbox" style="color:#FFD700;" name="color[]" value="#FFD700"/>Cabin3
           <input type="checkbox" style="color:#FF0000;" name="color[]" value="#FF0000"/>Cabin4
         </div>
         </div>

                      <!-- <div class="form-group">
            					<label for="price" class="col-sm-2 control-label">price</label>
            					<div class="col-sm-10">
            					  <input type="text" name="price" class="form-control" id="price" placeholder="price">
            					</div>
            				  </div> -->
				    <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox"  name="delete"> Delete event</label>
						  </div>
						</div>
					</div>

				  <input type="hidden" name="id" class="form-control" id="id">


			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	<!-- FullCalendar -->
	<script src='js/moment.min.js'></script>
	<script src='js/fullcalendar.min.js'></script>

	<script>

  $(document).ready(function() {
   $('#calendar').fullCalendar({
    editable:true,
    header:{
     left:'',
     center:'title'
  //   right:''
    },
    events: 'load.php',
    selectable:true,
    selectHelper:true,
    eventLimit: true, // allow "more" link when too many events



    select: function(start, end) {

      $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD '));
      $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD '));
      $('#ModalAdd').modal('show');
    },
    eventRender: function(event, element) {
      element.bind('dblclick', function() {
        $('#ModalEdit #id').val(event.id);
        $('#ModalEdit #title').val(event.title);
        $('#ModalEdit #color').val(event.color);
        $('#ModalEdit #client').val(event.client);
//  $('#ModalEdit #price').val(event.price);
        $('#ModalEdit').modal('show');
      });
    },
    eventDrop: function(event, delta, revertFunc) { // si changement de position

      edit(event);

    },
    eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

      edit(event);

    },


  });

  function edit(event){
    start = event.start.format('YYYY-MM-DD HH:mm:ss');
    if(event.end){
      end = event.end.format('YYYY-MM-DD HH:mm:ss');
    }else{
      end = start;
    }

    id =  event.id;

    Event = [];
    Event[0] = id;
    Event[1] = start;
    Event[2] = end;

    $.ajax({
     url: 'editEventDate.php',
     type: "POST",
     data: {Event:Event},
     success: function(rep) {
        if(rep == 'OK'){
          alert('Saved');
        }else{
          alert('Could not be saved. try again.');
        }
      }
    });
  }

});
  </script>

</script>

</body>

</html>

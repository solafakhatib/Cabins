
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>


    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
      <link rel="stylesheet" href="css/jquery-ui.css" />
      <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
      <script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>

      <!--//fonts-->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


        <!-- Bootstrap Core CSS To delete -->

    	<!-- FullCalendar -->
    	<link href='css/fullcalendar.css' rel='stylesheet' />








  </head>
  <script>

  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
     right:'prev,next',
     center:'title',
     left:''
    },
    events: 'load.php',
    selectable:true,
    selectHelper:true,



    select: function(start, end, allDay)
    {
     var title = prompt("Enter Cabin Number:");
     var client =prompt("Enter client:");

     //var cabin =prompt("Enter cabin");
     if(title)
     {
      var start = $.fullCalendar.formatDate(start, "Y-MM-DD ");
      var end = $.fullCalendar.formatDate(end, "Y-MM-DD ");
      $.ajax({
       url:"insca.php",
       type:"POST",
       data:{title:title,start:start, end:end ,client:client},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Added Successfully");
       }
      })
     }
    },
    editable:true,
    eventResize:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD ");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
     var title = event.title;
     var client = event.client;
     //var cabin = event.cabin;
     var id = event.id;
     $.ajax({
      url:"updca.php",
      type:"POST",
      data:{title:title, start:start, client:client,end:end, id:id},
      success:function(){
       calendar.fullCalendar('refetchEvents');
       alert('Event Update');
      }
     })
    },

    eventDrop:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD ");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"updca.php",
      type:"POST",
      data:{title:title, start:start, end:end, client:client,id:id},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
       alert("Event Updated");
      }
     });
    },

    eventClick:function(event)
    {
     if(confirm("Are you sure you want to remove it?"))
     {
      var id = event.id;
      $.ajax({
       url:"delca.php",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Event Removed");
       }
      })
     }
    },

   });
  });

  </script>
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
                  <li class="menu__item "><a href="Clients.php" class="menu__link">Clients</a></li>
                    <li class="menu__item menu__item--current "><a href="Clients.php" class="menu__link">Orders</a></li>
                  <!-- <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Orders <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="cal.php">calendar</li>
                      <li><a href="orders.php">orders</li>
                  </ul>
                  </li> -->
                  <li class="menu__item"><a href="reportbydate.php" class="menu__link scroll">Reports</a></li>
                  <li class="menu__item"><a href="index" class="menu__link scroll">LogOut</a></li>


    						</ul>
    					</nav>
    				</div>
    			</nav>

    		</div>
    	</div>
    <!-- //header -->
    	<div id="home" class="w3ls-banner">
	<div class="container">
    <h1>Orders</h1>
    <p>Type something in the input field to search the table for first names, last names or emails:</p>

    <input   id="myInput" type="search" placeholder="Search.." required=" ">

        <p></p>
        <table class="table">
          <tr>

            <th>FirstName</th>
            <th>LastName</th>
            <th>phoneNum</th>
            <th>email</th>
            <th>cabin</th>
            <th>start</th>
            <th>end</th>
            <th>price</th>
            <th>Add price</th>

          </tr>
          <?php
          $conn = mysqli_connect("localhost" ,"root" ,"" , "test");
          if ($conn -> connect_error){
            die("Connection failed :". $conn->connect_error);
          }
        //  $sql= "SELECT id, title, start_event, end_event, client FROM events";
          $sql2="SELECT orders.id ,client.FirstName ,client.LastName,client.phoneNum,client.email,cabin2.name ,orders.start,orders.end,orders.price FROM client,orders,cabin2 WHERE client.id=orders.client AND orders.color=cabin2.color ORDER BY orders.start";
    //    $sql3="SELECT orders.id ,cabin2.color ,orders.start,orders.end,cabin2.name FROM cabin,orders WHERE cabin2.color=orders.color ORDER BY orders.start";

          $res =$conn ->query($sql2);
          if($res->num_rows > 0){
            while ($row = $res ->fetch_assoc()) {

               echo '<tbody id="myTable"><tr>

              <td>' .$row["FirstName"] . '</td>
              <td>' .$row["LastName"] . '</td>
              <td>' .$row["phoneNum"] . '</td>
              <td>' .$row["email"] . '</td>
              <td>' .$row["name"] . '</td>
              <td>' .$row["start"] . '</td>
              <td>' .$row["end"].'</td>
              <td>' .$row["price"].'</td>
              <td><a type="button" href="upor.php?id=' . $row['id'] . '">Add</a></td>




          </tr> </tbody>';

            }
          echo " </table>";
          }
          else {
           echo "0 result";
          }
          $conn -> close();
           ?>


    </table>
      </div>
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
</div>
</div>
  </body>
</html>

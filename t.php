
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <title>Clients Table</title>
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
    <div class="container">

  <h1>Orders</h1>
  <p>Type something in the input field to search the table for first names, last names or emails:</p>
    <input class="form-control" id="myInput" type="text" placeholder="Search..">

<button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal">Add ordar</button>


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">
        <form  method="post" action="calendar.php">
          <br />
          <h2 align="center"><a href="#"></a></h2>
          <br />
          <div class="container">
           <div id="calendar"></div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <p></p>
    <table class="table">
      <tr>

        <th>cabin</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>phoneNum</th>
        <th>email</th>
        <th>start_event</th>
        <th>end_event</th>



      </tr>
      <?php
      $conn = mysqli_connect("localhost" ,"root" ,"" , "test");
      if ($conn -> connect_error){
        die("Connection failed :". $conn->connect_error);
      }
    //  $sql= "SELECT id, title, start_event, end_event, client FROM events";
      $sql2="SELECT events.id,events.title ,client.FirstName ,client.LastName,client.phoneNum,client.email,events.start_event,events.end_event FROM client,events WHERE client.id=events.client";
      $res =$conn ->query($sql2);
      if($res->num_rows > 0){
        while ($row = $res ->fetch_assoc()) {

           echo '<tbody id="myTable"><tr>
          <td>' .$row["title"] . '</td>
          <td>' .$row["FirstName"] . '</td>
          <td>' .$row["LastName"] . '</td>
          <td>' .$row["phoneNum"] . '</td>
          <td>' .$row["email"] . '</td>
          <td>' .$row["start_event"] . '</td>
          <td>' .$row["end_event"].'</td>


          <td><button type="button" name="delete_btn" data-id3="'.$row["id"].'" class="btn btn-s btn-danger btn_delete">x</button>
          <button type="button" name="delete_btn" data-id3="'.$row["id"].'" class="btn btn-s btn-info btn_delete">Edit</button></td>
 <td><a href=delete.php?id='.$row["id"].'>Delete</a></td>
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
  </body>
</html>

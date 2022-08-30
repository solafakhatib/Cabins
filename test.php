
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
    <title>Clients Table</title>
  </head>
  <body>
    <div class="container">

  <h1>Clients</h1>
  <p>Type something in the input field to search the table for first names, last names or emails:</p>
    <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <button type="button" class="btn btn-info" onclick="window.location='reg.php'">Add Client</button>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Large Modal</button>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add CLient</h4>
      </div>
      <div class="modal-body">
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

        <th>FirstName</th>
        <th>LastName</th>
        <th>phoneNum</th>
        <th>email</th>
        <th>update</th>

      </tr>
      <?php
      $conn = mysqli_connect("localhost" ,"root" ,"" , "test");
      if ($conn -> connect_error){
        die("Connection failed :". $conn->connect_error);
      }
      $sql= "SELECT id, FirstName, LastName, phoneNum, email FROM client";
      $res =$conn ->query($sql);
      if($res->num_rows > 0){
        while ($row = $res ->fetch_assoc()) {

          echo '<tbody id="myTable"><tr>
          <td>' .$row["FirstName"] . '</td>
          <td>' .$row["LastName"] . '</td>
          <td>' .$row["phoneNum"].'</td>
          <td>'.$row["email"].'</td>
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

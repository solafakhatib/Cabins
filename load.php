<?php

//load.php

$connect = new PDO('mysql:host=localhost;dbname=test', 'root', '');

$data = array();

$query = "SELECT * FROM orders ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["title"],
  'start'   => $row["start"],
  'end'   => $row["end"],
  'color'   => $row["color"]

 );
}

echo json_encode($data);

?>

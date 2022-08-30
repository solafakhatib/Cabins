<!-- //add new event relate to calendar  -->
<?php

// Connexion à la base de données
require_once('bdd.php');
//echo $_POST['title'];
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end'])  &&isset($_POST['color'])&&isset($_POST['client'])&&isset($_POST['price'])){

	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$a = $_POST['color'];
	$color=implode(',',$a);
	$client = $_POST['client'];
	$price = $_POST['price'];


	$sql = "INSERT INTO orders(title, start, end,color,client,price) values ('$title', '$start', '$end', '$color','$client','$price')";
	//$req = $bdd->prepare($sql);
//	$req->execute();

	echo $sql;

	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	 header('Location: cal.php');

	}

}

header('Location: '.$_SERVER['HTTP_REFERER']);


?>

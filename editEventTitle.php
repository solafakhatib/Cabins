<!-- //relate to edit calendar  -->

<?php

$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
if (isset($_POST['delete']) && isset($_POST['id'])){


	 $query = "
	 DELETE from orders WHERE id=:id
	 ";
	 $statement = $bdd->prepare($query);
	 $statement->execute(
	  array(
	   ':id' => $_POST['id']
	  )
	 );
	}

elseif (isset($_POST['title']) && isset($_POST['color']) && isset($_POST['id'])){

	$id = $_POST['id'];
	$title = $_POST['title'];
	$b = $_POST['color'];
	$color=implode(',',$b);

	//	$color = $_POST['color'];



	$sql = "UPDATE orders SET  title = '$title' ,color = '$color'  WHERE id = $id ";


	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}
header('Location: cal.php');


?>

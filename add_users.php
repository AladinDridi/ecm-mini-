<?php

// Connexion à la base de données
require_once('bdd.php');
//echo $_POST['title'];
if (((isset($_POST['username']) && (isset($_POST['userspwd']) (isset($_POST['submit']))){
	
	$username = $_POST['username'];
	$pwd = $_POST['password'];
	$sql = "INSERT INTO users(username, password) values ('$username', '$pwd')";
	//$req = $bdd->prepare($sql);
	//$req->execute();
	
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
	} else {echo "success"};

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>

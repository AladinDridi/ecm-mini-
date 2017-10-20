<?php

// Connexion à la base de données
require_once('bdd.php');
if($_POST)
{
if ( isset($_POST['chapitres']) && isset($_POST['usernames']) && isset($_POST['datedebut']) && isset($_POST['Datefin'])&& isset($_POST['days'])&& isset($_POST['stattus'])&&isset($_POST['projects'])){
$chapitre=$_POST['chapitres'];
 $assign=$_POST['usernames'];
 $datedebut=$_POST['datedebut'];
 $datefin=$_POST['Datefin'];
 $jours=$_POST['days'];
 $status=$_POST['stattus'];
 $projectnames=$_POST['projects'];
$sql = "INSERT INTO taches (chapitres,username,Date_debut,Date_fin,jours,status,projects) VALUES ('$chapitre','$assign','$datedebut','$datefin','$jours','$status','$projectnames')";
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
	}

}}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>

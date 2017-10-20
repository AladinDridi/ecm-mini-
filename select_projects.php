<?php
require_once('bdd.php');


$sql3 = "SELECT project_name FROM projets";

$req3 = $bdd->prepare($sql3);

$req3->execute();

$projets=$req3->fetchall();
$option2 ='';
foreach ($projets as $projet){
  $option2 .= '<option value = "'.utf8_decode($projet['project_name']).'">'.utf8_decode($projet['project_name']).'</option>';
}
?>
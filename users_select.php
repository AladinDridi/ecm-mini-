<?php
require_once('bdd.php');


$sql2 = "SELECT username FROM users ";

$req2 = $bdd->prepare($sql2);

$req2->execute();

$users=$req2->fetchall();
$option ='';
foreach ($users as $user){
  $option .= '<option value = "'.utf8_decode($user['username']).'">'.utf8_decode($user['username']).'</option>';
}
?>

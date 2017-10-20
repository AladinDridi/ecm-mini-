<?php
if($_POST)
{
$host="localhost";
$user="root";
$pass="";
$db="calendar";
$conn=mysqli_connect($host,$user,$pass,$db);    
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
    $projectnames=$_POST['projects'];
 $chapitres=$_POST['chapitres'];
 $assign=$_POST['usernames'];
 $datedebut=$_POST['datedebut'];
 $datefin=$_POST['Datefin'];
 $jours=$_POST['days'];
 $status=$_POST['stattus'];
// attempt insert query execution
// attempt insert query execution
$sql = "INSERT INTO projets (chapitres, username,Date_debut,Date_fin,jours,status,projects) VALUES ('$chapitres','$assign','$datedebut','$datefin','$jours','$status,$projectnames')";

if(mysql_query($conn,$sql)){
    echo"success";
} 
else{
    echo "oops erreur";
}
mysqli_close($conn);
}
?>
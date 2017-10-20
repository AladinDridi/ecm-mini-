<?php
require_once('bdd.php');
   $id=$_POST['id'];
	$sql = "UPDATE taches SET  status ='achevé' WHERE id='$id'";
    $query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}else{
		die ('OK');

}
        header('Location::filtrer_taches.php');

?>
<script>
function redirect(){
    window.location.href='http://localhost/ecm-mini/filtrer_taches.php';
    return "";
}
window.onload=function(){redirect();}

</script>

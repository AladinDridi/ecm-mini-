<?php 

session_start();
$user=$_SESSION['username'];
if(!$_SESSION['auth']){
    
    header('location:login.php');
}

?>
<h1>Welcome are you authenticated...!</h1> 
<h5><?php echo $user; ?></h5>